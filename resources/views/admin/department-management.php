<?php
$pageTitle = 'Smart Campus Nova Hub - Department Management';
$pageIcon = 'fas fa-building';
$pageHeading = 'Department Management';
$activePage = 'departments';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn" onclick="openCreateDepartmentModal()">
            <i class="fas fa-plus"></i> Add Department
        </button>
    </div>
</div>

<div class="detail-management-section" style="margin-top: 12px;">
    <div class="section-header">
        <h3 class="section-title">Departments</h3>
    </div>

    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th></th>
                    <th class="nowrap">Department Code</th>
                    <th>Department Name</th>
                    <th>Staff</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="deptTableBody">
                <tr>
                    <td class="expand-cell"></td>
                    <td class="department-code"><a href="/admin/academic/department-detail/PRIMARY" class="department-link"><strong>PRIMARY</strong></a></td>
                    <td class="department-name">Primary Teachers</td>
                    <td class="student-count">15</td>
                    <td class="actions-cell">
                        <a class="action-icon view" href="/admin/academic/department-detail/PRIMARY" title="View"><i class="fas fa-eye"></i></a>
                        <button class="action-icon delete" title="Delete" onclick="deleteDepartment('PRIMARY')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="expand-cell"></td>
                    <td class="department-code"><a href="/admin/academic/department-detail/LANG" class="department-link"><strong>LANG</strong></a></td>
                    <td class="department-name">Language Teachers</td>
                    <td class="student-count">8</td>
                    <td class="actions-cell">
                        <a class="action-icon view" href="/admin/academic/department-detail/LANG" title="View"><i class="fas fa-eye"></i></a>
                        <button class="action-icon delete" title="Delete" onclick="deleteDepartment('LANG')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="expand-cell"></td>
                    <td class="department-code"><a href="/admin/academic/department-detail/ICT" class="department-link"><strong>ICT</strong></a></td>
                    <td class="department-name">ICT Staff</td>
                    <td class="student-count">5</td>
                    <td class="actions-cell">
                        <a class="action-icon view" href="/admin/academic/department-detail/ICT" title="View"><i class="fas fa-eye"></i></a>
                        <button class="action-icon delete" title="Delete" onclick="deleteDepartment('ICT')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Create Department Modal -->
<div id="createDepartmentModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-building"></i> Create New Department</h4>
            <button class="icon-btn" onclick="closeCreateDepartmentModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="deptCode">Department Code *</label>
                        <input type="text" id="deptCode" class="form-input" placeholder="e.g., LANG">
                        <small style="color: #666; font-size: 12px;">Short code for the department</small>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label for="deptName">Department Name *</label>
                        <input type="text" id="deptName" class="form-input" placeholder="e.g., Language Teachers">
                        <small style="color: #666; font-size: 12px;">Full name of the department</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeCreateDepartmentModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveNewDepartment()">
                <i class="fas fa-check"></i> Save Department
            </button>
        </div>
    </div>
</div>

<script>
// Department data for cards
const departmentData = {
    'PRIMARY': { name: 'Primary Teachers', count: 15, icon: 'fa-chalkboard-teacher', color: 'blue' },
    'LANG': { name: 'Language Teachers', count: 8, icon: 'fa-language', color: 'purple' },
    'ICT': { name: 'ICT Staff', count: 5, icon: 'fa-laptop-code', color: 'teal' }
};

// Create Department Modal Functions
function openCreateDepartmentModal() {
    clearDepartmentForm();
    document.getElementById('createDepartmentModal').style.display = 'flex';
}

function closeCreateDepartmentModal() {
    document.getElementById('createDepartmentModal').style.display = 'none';
    clearDepartmentForm();
}

function clearDepartmentForm() {
    document.getElementById('deptCode').value = '';
    document.getElementById('deptName').value = '';
}

function saveNewDepartment() {
    const code = (document.getElementById('deptCode').value || '').trim().toUpperCase();
    if (!code) {
        if (typeof showToast === 'function') {
            showToast('Please enter department code', 'warning');
        } else {
            alert('Please enter department code');
        }
        return;
    }
    
    const name = (document.getElementById('deptName').value || '').trim();
    if (!name) {
        if (typeof showToast === 'function') {
            showToast('Please enter department name', 'warning');
        } else {
            alert('Please enter department name');
        }
        return;
    }
    
    // Check if department code already exists
    if (departmentData[code]) {
        if (typeof showToast === 'function') {
            showToast(`Department code "${code}" already exists`, 'warning');
        } else {
            alert(`Department code "${code}" already exists`);
        }
        return;
    }
    
    // Add to department data
    departmentData[code] = { 
        name: name, 
        count: 0, 
        icon: 'fa-building', 
        color: 'green' 
    };
    
    const tbody = document.getElementById('deptTableBody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td class="expand-cell"></td>
        <td class="department-code"><a href="/admin/academic/department-detail/${code}" class="department-link"><strong>${code}</strong></a></td>
        <td class="department-name">${name}</td>
        <td class="student-count">0</td>
        <td class="actions-cell">
            <a class="action-icon view" href="/admin/academic/department-detail/${code}" title="View"><i class="fas fa-eye"></i></a>
            <button class="action-icon delete" title="Delete" onclick="deleteDepartment('${code}')"><i class="fas fa-trash"></i></button>
        </td>`;
    tbody.prepend(tr);
    
    if (typeof showToast === 'function') {
        showToast(`Department "${name}" added successfully`, 'success');
    } else {
        alert('Department added successfully.');
    }
    
    closeCreateDepartmentModal();
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const createModal = document.getElementById('createDepartmentModal');
    if (createModal) {
        createModal.addEventListener('click', function(e) {
            if (e.target === createModal) {
                closeCreateDepartmentModal();
            }
        });
    }
});

function deleteDepartment(deptId) {
    if (!confirm(`Delete department ${deptId}?`)) return;
    
    // Remove from data
    if (departmentData[deptId]) {
        delete departmentData[deptId];
    }
    
    // Remove from table
    const rows = document.querySelectorAll('#deptTableBody tr');
    rows.forEach(row => {
        const codeCell = row.querySelector('.department-code strong');
        if (codeCell && codeCell.textContent === deptId) {
            row.remove();
        }
    });
    
    alert(`Department ${deptId} deleted successfully.`);
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>


