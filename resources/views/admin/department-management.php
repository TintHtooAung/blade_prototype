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
</div>

<div class="detail-management-section" style="margin-top: 12px;">
    <div class="section-header">
        <h3 class="section-title">Departments</h3>
        <button class="simple-btn" id="toggleDepartmentForm"><i class="fas fa-plus"></i> Add Department</button>
    </div>

    <!-- Inline Create Department Form -->
    <div id="departmentForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-building"></i> Create Department</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="deptCode">Department Code</label>
                    <input type="text" id="deptCode" class="form-input" placeholder="e.g., LANG">
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="deptName">Department Name</label>
                    <input type="text" id="deptName" class="form-input" placeholder="e.g., Language Teachers">
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelDepartment" class="simple-btn secondary">Cancel</button>
                <button id="saveDepartment" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>

    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th class="nowrap">Department Code</th>
                    <th>Department Name</th>
                    <th>Staff</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="deptTableBody">
                <tr>
                    <td class="department-code"><a href="/admin/academic/department-detail/PRIMARY" class="department-link"><strong>PRIMARY</strong></a></td>
                    <td class="department-name">Primary Teachers</td>
                    <td class="student-count">15</td>
                    <td class="actions-cell">
                        <a class="action-icon view" href="/admin/academic/department-detail/PRIMARY" title="View"><i class="fas fa-eye"></i></a>
                        <button class="action-icon delete" title="Delete" onclick="deleteDepartment('PRIMARY')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="department-code"><a href="/admin/academic/department-detail/LANG" class="department-link"><strong>LANG</strong></a></td>
                    <td class="department-name">Language Teachers</td>
                    <td class="student-count">8</td>
                    <td class="actions-cell">
                        <a class="action-icon view" href="/admin/academic/department-detail/LANG" title="View"><i class="fas fa-eye"></i></a>
                        <button class="action-icon delete" title="Delete" onclick="deleteDepartment('LANG')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
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

<script>
document.addEventListener('DOMContentLoaded', function(){
    const toggle=document.getElementById('toggleDepartmentForm');
    const form=document.getElementById('departmentForm');
    const cancel=document.getElementById('cancelDepartment');
    const save=document.getElementById('saveDepartment');
    function toggleForm(e){ e.preventDefault(); form.style.display = (form.style.display==='none')?'block':'none'; }
    if(toggle) toggle.addEventListener('click', toggleForm);
    if(cancel) cancel.addEventListener('click', function(e){ e.preventDefault(); form.style.display='none'; });
    if(save) save.addEventListener('click', function(e){ e.preventDefault();
        const code=(document.getElementById('deptCode').value||'').trim(); if(!code){ alert('Enter department code'); return; }
        const name=(document.getElementById('deptName').value||'').trim(); if(!name){ alert('Enter department name'); return; }
        const tbody=document.getElementById('deptTableBody');
        const tr=document.createElement('tr');
        tr.innerHTML=`
            <td class="department-code"><a href="/admin/academic/department-detail/${code}" class="department-link"><strong>${code}</strong></a></td>
            <td class="department-name">${name}</td>
            <td class="student-count">0</td>
            <td class="actions-cell">
                <a class="action-icon view" href="/admin/academic/department-detail/${code}" title="View"><i class="fas fa-eye"></i></a>
                <button class="action-icon delete" title="Delete" onclick="deleteDepartment('${code}')"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
        form.style.display='none';
        alert('Saved (draft).');
    });
});

function deleteDepartment(deptId) {
    if (!confirm(`Delete department ${deptId}?`)) return;
    alert(`Department ${deptId} deleted (mock).`);
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>


