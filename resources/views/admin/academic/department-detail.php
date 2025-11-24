<?php
$deptCode = $_GET['dept'] ?? 'PRIMARY';
$pageTitle = 'Smart Campus Nova Hub - Department Details: ' . $deptCode;
$pageIcon = 'fas fa-building';
$pageHeading = 'Department Details';
$activePage = 'academic';

// Department data mapping
$deptData = [
    'PRIMARY' => ['name' => 'Primary Teachers', 'building' => 'Building A', 'count' => '15'],
    'LANG' => ['name' => 'Language Teachers', 'building' => 'Building B', 'count' => '8'],
    'ICT' => ['name' => 'ICT Staff', 'building' => 'Building C', 'count' => '5'],
    'ADMIN' => ['name' => 'Administrative Staff', 'building' => 'Main Building', 'count' => '12'],
    'MAINT' => ['name' => 'Maintenance & Security', 'building' => 'Service Building', 'count' => '10'],
];
$dept = $deptData[$deptCode] ?? $deptData['PRIMARY'];

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/department-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Department Management
    </a>
</div>

<!-- Department Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="batch-info">
            <h1 id="deptTitle"><?php echo htmlspecialchars($deptCode); ?> - <?php echo htmlspecialchars($dept['name']); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editDeptBtn">
            <i class="fas fa-edit"></i> Edit Department
        </button>
        <button class="action-btn-header delete" id="deleteDeptBtn">
            <i class="fas fa-trash"></i> Delete Department
        </button>
    </div>
</div>

<!-- Department Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Department Code',
        'value' => $deptCode,
        'icon' => 'fas fa-building',
        'iconColor' => 'blue'
    ]); ?>
    <?php echo renderStatCard([
        'title' => 'Members',
        'value' => $dept['count'],
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
    
</div>

<!-- Edit Department Form -->
<div id="editDeptForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Department</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editDeptCode">Department Code</label>
                <input type="text" id="editDeptCode" class="form-input" value="<?php echo htmlspecialchars($deptCode); ?>">
            </div>
            <div class="form-group">
                <label for="editDeptName">Department Name</label>
                <input type="text" id="editDeptName" class="form-input" value="<?php echo htmlspecialchars($dept['name']); ?>">
            </div>
            <div class="form-group">
                <label for="editDeptBuilding">Building</label>
                <input type="text" id="editDeptBuilding" class="form-input" value="<?php echo htmlspecialchars($dept['building']); ?>">
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditDept" class="simple-btn secondary">Cancel</button>
            <button id="saveEditDept" class="simple-btn primary"><i class="fas fa-check"></i> Update Department</button>
        </div>
    </div>
</div>

<?php
// Build staff lists per department (demo data)
$staffLists = [
    'PRIMARY' => [
        ['name' => 'Ms. Sarah Johnson', 'role' => 'Department Head', 'url' => '/admin/teacher-profile?id=T001'],
        ['name' => 'Mr. Alan Brown', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T010'],
        ['name' => 'Ms. Jennifer Lee', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T011'],
    ],
    'LANG' => [
        ['name' => 'Dr. Emily Chen', 'role' => 'Department Head', 'url' => '/admin/teacher-profile?id=T002'],
        ['name' => 'Mr. Paolo Rossi', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T012'],
        ['name' => 'Ms. Ayesha Khan', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T013'],
    ],
    'ICT' => [
        ['name' => 'Mr. David Kumar', 'role' => 'IT Manager', 'url' => '/admin/staff-profile?id=E001'],
        ['name' => 'Ms. Priya Singh', 'role' => 'Sysadmin', 'url' => '/admin/staff-profile?id=E010'],
        ['name' => 'Mr. Wei Zhang', 'role' => 'Support Engineer', 'url' => '/admin/staff-profile?id=E011'],
    ],
    'ADMIN' => [
        ['name' => 'Ms. Lisa Park', 'role' => 'Office Manager', 'url' => '/admin/staff-profile?id=E002'],
        ['name' => 'Mr. Omar Ali', 'role' => 'Clerk', 'url' => '/admin/staff-profile?id=E012'],
        ['name' => 'Ms. Nina Patel', 'role' => 'Receptionist', 'url' => '/admin/staff-profile?id=E013'],
    ],
    'MAINT' => [
        ['name' => 'Mr. Robert Jones', 'role' => 'Facilities Manager', 'url' => '/admin/staff-profile?id=E003'],
        ['name' => 'Mr. John Doe', 'role' => 'Security Lead', 'url' => '/admin/staff-profile?id=E014'],
        ['name' => 'Ms. Maria Lopez', 'role' => 'Custodian', 'url' => '/admin/staff-profile?id=E015'],
    ],
];
$staff = $staffLists[$deptCode] ?? [];
?>

<!-- Department Staff Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Member</h3>
        <div class="section-actions">
            <button class="simple-btn primary" onclick="openAddStaffDialog()" style="height: 36px; padding: 8px 16px; display: inline-flex; align-items: center; gap: 6px;">
                <i class="fas fa-plus"></i> New Member
            </button>
        </div>
    </div>
    <div class="simple-table-container">
        <table class="basic-table" id="staffTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th style="width: 100px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody id="staffGrid">
                <?php foreach ($staff as $index => $member): ?>
                <tr data-staff-id="<?php echo $index; ?>" style="cursor:pointer;" onclick="window.location.href='<?php echo htmlspecialchars($member['url']); ?>'">
                    <td>
                        <a href="<?php echo htmlspecialchars($member['url']); ?>" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">
                            <?php echo htmlspecialchars($member['name']); ?>
                        </a>
                    </td>
                    <td>
                        <span class="type-badge"><?php echo htmlspecialchars($member['role']); ?></span>
                    </td>
                    <td style="text-align: center;">
                        <button class="action-icon delete" onclick="event.stopPropagation(); removeStaff(<?php echo $index; ?>)" title="Remove from Department">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Staff Dialog -->
<div id="addStaffDialog" class="receipt-dialog-overlay" style="display: none;">
    <div class="receipt-dialog-content" style="max-width: 700px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-user-plus"></i> Add Member to Department</h3>
            <button class="receipt-close" onclick="closeAddStaffDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <div class="form-section">
                <div class="form-group">
                    <label for="staffSearchInput">Search Staff</label>
                    <div style="position: relative;">
                        <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6b7280; pointer-events: none; z-index: 1;"></i>
                        <input type="text" id="staffSearchInput" class="form-input" placeholder="Search by name, ID, or department..." oninput="searchStaff(this.value)" style="padding-left: 40px;">
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Member</label>
                    <div id="staffSearchResults" style="max-height: 400px; overflow-y: auto; border: 1px solid #e5e7eb; border-radius: 8px; background: #fff;">
                        <div style="padding: 20px; text-align: center; color: #6b7280;">
                            <i class="fas fa-search" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                            <p>Start typing to search for members</p>
                        </div>
                    </div>
                </div>
                <div id="selectedStaffInfo" style="display: none; padding: 16px; background: #f9fafb; border-radius: 8px; margin-top: 16px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div id="selectedStaffAvatar" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px;"></div>
                        <div style="flex: 1;">
                            <div id="selectedStaffName" style="font-weight: 600; font-size: 16px; color: #111827; margin-bottom: 4px;"></div>
                            <div id="selectedStaffDetails" style="font-size: 14px; color: #6b7280;"></div>
                        </div>
                        <button onclick="clearSelectedStaff()" class="simple-btn secondary" style="height: 32px; padding: 6px 12px;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeAddStaffDialog()" style="height: 36px; padding: 8px 16px;">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="addSelectedStaff()" id="addStaffBtn" disabled style="height: 36px; padding: 8px 16px;">
                <i class="fas fa-check"></i> Add Member
            </button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // Edit Department functionality
    const editBtn = document.getElementById('editDeptBtn');
    const editForm = document.getElementById('editDeptForm');
    const cancelEditBtn = document.getElementById('cancelEditDept');
    const saveEditBtn = document.getElementById('saveEditDept');
    const deptTitle = document.getElementById('deptTitle');
    
    editBtn.addEventListener('click', function() {
        editForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL and clean it up immediately
    if (window.location.search.includes('edit=true')) {
        editForm.style.display = 'block';
        // Remove edit parameter from URL immediately
        const cleanUrl = window.location.pathname + window.location.search.replace(/[?&]edit=true/, '').replace(/[?&]$/, '');
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    cancelEditBtn.addEventListener('click', function() {
        editForm.style.display = 'none';
    });
    
    saveEditBtn.addEventListener('click', function() {
        const newCode = document.getElementById('editDeptCode').value.trim();
        const newName = document.getElementById('editDeptName').value.trim();
        const newBuilding = document.getElementById('editDeptBuilding').value.trim();
        
        if (!newCode || !newName || !newBuilding) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        deptTitle.textContent = newCode + ' - ' + newName;
        
        // Hide form
        editForm.style.display = 'none';
        
        showActionStatus('Department updated successfully!', 'success');
    });
    
    // Delete Department functionality
    const deleteDeptBtn = document.getElementById('deleteDeptBtn');
    deleteDeptBtn.addEventListener('click', function() {
        const deptName = deptTitle.textContent;
        showConfirmDialog({
            title: 'Delete Department',
            message: `Are you sure you want to delete the ${deptName} department? This will remove all staff from this department and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-building',
            onConfirm: function() {
                showActionStatus('Department deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '/admin/department-management';
                }, 1500);
            }
        });
    });
    
    // Show delete icons on hover
    const staffRows = document.querySelectorAll('#staffTable tbody tr');
    staffRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            const deleteBtn = this.querySelector('.action-icon.delete');
            if (deleteBtn) {
                deleteBtn.style.opacity = '1';
            }
        });
        row.addEventListener('mouseleave', function() {
            const deleteBtn = this.querySelector('.action-icon.delete');
            if (deleteBtn) {
                deleteBtn.style.opacity = '0.7';
            }
        });
    });
});

// Available members (in production, this would come from an API)
const availableStaff = [
    // Teachers
    { id: 'T001', name: 'Dr. Emily Parker', department: 'Mathematics', type: 'teacher', role: 'Teacher', email: 'emily.parker@school.edu' },
    { id: 'T002', name: 'Mr. David Lee', department: 'History', type: 'teacher', role: 'Teacher', email: 'david.lee@school.edu' },
    { id: 'T003', name: 'Ms. Sarah Chen', department: 'English', type: 'teacher', role: 'Teacher', email: 'sarah.chen@school.edu' },
    { id: 'T004', name: 'Prof. James Wilson', department: 'Science', type: 'teacher', role: 'Teacher', email: 'james.wilson@school.edu' },
    { id: 'T005', name: 'Ms. Lisa Wong', department: 'Art', type: 'teacher', role: 'Teacher', email: 'lisa.wong@school.edu' },
    { id: 'T006', name: 'Mr. Michael Brown', department: 'Physical Education', type: 'teacher', role: 'Teacher', email: 'michael.brown@school.edu' },
    { id: 'T007', name: 'Dr. Helen Thompson', department: 'Chemistry', type: 'teacher', role: 'Teacher', email: 'helen.thompson@school.edu' },
    { id: 'T008', name: 'Mr. Robert Kim', department: 'Music', type: 'teacher', role: 'Teacher', email: 'robert.kim@school.edu' },
    { id: 'T009', name: 'Daw Khin Khin', department: 'Mathematics', type: 'teacher', role: 'Teacher', email: 'khinkhin@school.edu' },
    { id: 'T010', name: 'Ms. Sarah Johnson', department: 'English', type: 'teacher', role: 'Teacher', email: 'sarah.johnson@school.edu' },
    { id: 'T011', name: 'U Aung Myint', department: 'Physics', type: 'teacher', role: 'Teacher', email: 'aungmyint@school.edu' },
    { id: 'T012', name: 'Daw Mya Mya', department: 'Chemistry', type: 'teacher', role: 'Teacher', email: 'myamya@school.edu' },
    { id: 'T013', name: 'Ms. Ayesha Khan', department: 'Language', type: 'teacher', role: 'Teacher', email: 'ayesha.khan@school.edu' },
    { id: 'T014', name: 'Mr. Paolo Rossi', department: 'Language', type: 'teacher', role: 'Teacher', email: 'paolo.rossi@school.edu' },
    { id: 'T015', name: 'Mr. Alan Brown', department: 'Primary', type: 'teacher', role: 'Teacher', email: 'alan.brown@school.edu' },
    { id: 'T016', name: 'Ms. Jennifer Lee', department: 'Primary', type: 'teacher', role: 'Teacher', email: 'jennifer.lee@school.edu' },
    // Staff
    { id: 'E001', name: 'Mr. David Kumar', department: 'IT Support', type: 'staff', role: 'IT Manager', email: 'david.kumar@school.edu' },
    { id: 'E002', name: 'Ms. Lisa Park', department: 'Administration', type: 'staff', role: 'Office Manager', email: 'lisa.park@school.edu' },
    { id: 'E003', name: 'Mr. Robert Jones', department: 'Maintenance', type: 'staff', role: 'Facilities Manager', email: 'robert.jones@school.edu' },
    { id: 'E004', name: 'Ms. Priya Singh', department: 'IT Support', type: 'staff', role: 'Sysadmin', email: 'priya.singh@school.edu' },
    { id: 'E005', name: 'Mr. Wei Zhang', department: 'IT Support', type: 'staff', role: 'Support Engineer', email: 'wei.zhang@school.edu' },
    { id: 'E006', name: 'Mr. Omar Ali', department: 'Administration', type: 'staff', role: 'Clerk', email: 'omar.ali@school.edu' },
    { id: 'E007', name: 'Ms. Nina Patel', department: 'Administration', type: 'staff', role: 'Receptionist', email: 'nina.patel@school.edu' },
    { id: 'E008', name: 'Mr. John Doe', department: 'Security', type: 'staff', role: 'Security Lead', email: 'john.doe@school.edu' },
    { id: 'E009', name: 'Ms. Maria Lopez', department: 'Maintenance', type: 'staff', role: 'Custodian', email: 'maria.lopez@school.edu' },
    { id: 'E010', name: 'Ms. Priya Singh', department: 'IT Support', type: 'staff', role: 'Sysadmin', email: 'priya.singh@school.edu' },
    { id: 'E011', name: 'Mr. Wei Zhang', department: 'IT Support', type: 'staff', role: 'Support Engineer', email: 'wei.zhang@school.edu' },
    { id: 'E012', name: 'Mr. Omar Ali', department: 'Administration', type: 'staff', role: 'Clerk', email: 'omar.ali@school.edu' },
    { id: 'E013', name: 'Ms. Nina Patel', department: 'Administration', type: 'staff', role: 'Receptionist', email: 'nina.patel@school.edu' },
    { id: 'E014', name: 'Mr. John Doe', department: 'Security', type: 'staff', role: 'Security Lead', email: 'john.doe@school.edu' },
    { id: 'E015', name: 'Ms. Maria Lopez', department: 'Maintenance', type: 'staff', role: 'Custodian', email: 'maria.lopez@school.edu' }
];

let selectedStaffMember = null;

// Open Add Staff Dialog
function openAddStaffDialog() {
    const dialog = document.getElementById('addStaffDialog');
    if (dialog) {
        dialog.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        // Clear form
        document.getElementById('staffSearchInput').value = '';
        clearSelectedStaff();
        // Show all staff initially
        displayStaffResults(availableStaff);
    }
}

// Close Add Staff Dialog
function closeAddStaffDialog() {
    const dialog = document.getElementById('addStaffDialog');
    if (dialog) {
        dialog.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Search Staff
function searchStaff(query) {
    const searchTerm = query.toLowerCase().trim();
    
    if (!searchTerm) {
        displayStaffResults(availableStaff);
        return;
    }
    
    const filtered = availableStaff.filter(staff => {
        return staff.name.toLowerCase().includes(searchTerm) ||
               staff.id.toLowerCase().includes(searchTerm) ||
               staff.department.toLowerCase().includes(searchTerm) ||
               staff.role.toLowerCase().includes(searchTerm);
    });
    
    displayStaffResults(filtered);
}

// Display Staff Results
function displayStaffResults(staffList) {
    const resultsContainer = document.getElementById('staffSearchResults');
    
    if (staffList.length === 0) {
        resultsContainer.innerHTML = `
            <div style="padding: 20px; text-align: center; color: #6b7280;">
                <i class="fas fa-user-slash" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                <p>No members found</p>
            </div>
        `;
        return;
    }
    
    resultsContainer.innerHTML = staffList.map(staff => {
        const initials = staff.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
        const baseUrl = staff.type === 'teacher' ? '/admin/teacher-profile?id=' : '/admin/staff-profile?id=';
        const isAlreadyAdded = Array.from(document.querySelectorAll('#staffGrid tr')).some(row => {
            const link = row.querySelector('a');
            return link && link.href.includes(staff.id);
        });
        
        return `
            <div class="staff-result-item ${isAlreadyAdded ? 'disabled' : ''}" onclick="${isAlreadyAdded ? '' : `selectStaff('${staff.id}')`}" style="padding: 12px 16px; border-bottom: 1px solid #e5e7eb; cursor: ${isAlreadyAdded ? 'not-allowed' : 'pointer'}; display: flex; align-items: center; gap: 12px; transition: background-color 0.2s; ${isAlreadyAdded ? 'opacity: 0.5;' : ''}">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, ${staff.type === 'teacher' ? '#4A90E2' : '#10b981'} 0%, ${staff.type === 'teacher' ? '#357abd' : '#059669'} 100%); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; flex-shrink: 0;">
                    ${initials}
                </div>
                <div style="flex: 1; min-width: 0;">
                    <div style="font-weight: 600; color: #111827; margin-bottom: 2px;">${staff.name}</div>
                    <div style="font-size: 13px; color: #6b7280;">
                        <span class="type-badge" style="margin-right: 8px;">${staff.role}</span>
                        <span>${staff.department}</span>
                    </div>
                </div>
                ${isAlreadyAdded ? '<span style="color: #10b981; font-size: 12px;"><i class="fas fa-check-circle"></i> Added</span>' : '<i class="fas fa-chevron-right" style="color: #9ca3af;"></i>'}
            </div>
        `;
    }).join('');
    
    // Add hover effect
    resultsContainer.querySelectorAll('.staff-result-item:not(.disabled)').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f9fafb';
        });
        item.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
}

// Select Staff
function selectStaff(staffId) {
    const staff = availableStaff.find(s => s.id === staffId);
    if (!staff) return;
    
    selectedStaffMember = staff;
    
    const infoDiv = document.getElementById('selectedStaffInfo');
    const nameDiv = document.getElementById('selectedStaffName');
    const detailsDiv = document.getElementById('selectedStaffDetails');
    const avatarDiv = document.getElementById('selectedStaffAvatar');
    const addBtn = document.getElementById('addStaffBtn');
    
    const initials = staff.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    
    avatarDiv.textContent = initials;
    avatarDiv.style.background = `linear-gradient(135deg, ${staff.type === 'teacher' ? '#4A90E2' : '#10b981'} 0%, ${staff.type === 'teacher' ? '#357abd' : '#059669'} 100%)`;
    nameDiv.textContent = staff.name;
    detailsDiv.innerHTML = `<span class="type-badge">${staff.role}</span> • ${staff.department} • ${staff.id}`;
    
    infoDiv.style.display = 'block';
    addBtn.disabled = false;
    
    // Scroll to selected staff info
    infoDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

// Clear Selected Staff
function clearSelectedStaff() {
    selectedStaffMember = null;
    document.getElementById('selectedStaffInfo').style.display = 'none';
    document.getElementById('addStaffBtn').disabled = true;
}

// Add Selected Staff
function addSelectedStaff() {
    if (!selectedStaffMember) {
        alert('Please select a member');
        return;
    }
    
    const tbody = document.getElementById('staffGrid');
    const newIndex = tbody.children.length;
    const baseUrl = selectedStaffMember.type === 'teacher' ? '/admin/teacher-profile?id=' : '/admin/staff-profile?id=';
    
    const newRow = document.createElement('tr');
    newRow.setAttribute('data-staff-id', selectedStaffMember.id);
    newRow.style.cursor = 'pointer';
    newRow.onclick = function() {
        window.location.href = baseUrl + selectedStaffMember.id;
    };
    
    newRow.innerHTML = `
        <td>
            <a href="${baseUrl}${selectedStaffMember.id}" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">
                ${selectedStaffMember.name}
            </a>
        </td>
        <td>
            <span class="type-badge">${selectedStaffMember.role}</span>
        </td>
        <td style="text-align: center;">
            <button class="action-icon delete" onclick="event.stopPropagation(); removeStaff('${selectedStaffMember.id}')" title="Remove from Department">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    
    tbody.appendChild(newRow);
    
    // Update staff count
    const staffCountElement = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-value');
    if (staffCountElement) {
        const currentCount = parseInt(staffCountElement.textContent) || 0;
        staffCountElement.textContent = currentCount + 1;
    }
    
    closeAddStaffDialog();
    showActionStatus(`${selectedStaffMember.name} added to department successfully!`, 'success');
}

// Remove Staff
function removeStaff(staffIdOrIndex) {
    // Try to find by staff ID first, then by index
    let row = document.querySelector(`#staffTable tbody tr[data-staff-id="${staffIdOrIndex}"]`);
    
    if (!row) {
        // If not found, try as index (for existing PHP-generated rows)
        const rows = document.querySelectorAll('#staffTable tbody tr');
        const index = parseInt(staffIdOrIndex);
        if (!isNaN(index) && rows[index]) {
            row = rows[index];
        }
    }
    
    if (!row) return;
    
    const staffName = row.querySelector('td:first-child a').textContent.trim();
    
    showConfirmDialog({
        title: 'Remove Staff',
        message: `Are you sure you want to remove ${staffName} from this department?`,
        confirmText: 'Remove',
        confirmIcon: 'fas fa-user-minus',
        onConfirm: function() {
            row.remove();
            
            // Update staff count
            const staffCountElement = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-value');
            if (staffCountElement) {
                const currentCount = parseInt(staffCountElement.textContent) || 0;
                staffCountElement.textContent = Math.max(0, currentCount - 1);
            }
            
            showActionStatus('Member removed successfully!', 'success');
        }
    });
}

// Close dialog when clicking overlay
document.addEventListener('DOMContentLoaded', function() {
    const addStaffDialog = document.getElementById('addStaffDialog');
    if (addStaffDialog) {
        addStaffDialog.addEventListener('click', function(e) {
            if (e.target === addStaffDialog) {
                closeAddStaffDialog();
            }
        });
    }
    
    // Close dialog on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const dialog = document.getElementById('addStaffDialog');
            if (dialog && dialog.style.display === 'flex') {
                closeAddStaffDialog();
            }
        }
    });
});

</script>

<style>
/* Section Actions Styles */
.section-actions {
    display: flex;
    gap: 8px;
}

/* Staff Table Styles */
#staffTable tbody tr {
    transition: background-color 0.2s ease;
}

#staffTable tbody tr:hover {
    background-color: #f8fafc;
}

.type-badge {
    font-size: 0.8rem;
    padding: 4px 12px;
    background: #f3f4f6;
    color: #6b7280;
    border-radius: 6px;
    font-weight: 500;
    display: inline-block;
}

/* Action Icon Styles */
.action-icon {
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 14px;
    opacity: 0.7;
}

.action-icon.delete {
    background: #FFEBEE;
    color: #F44336;
}

.action-icon.delete:hover {
    background: #FFCDD2;
    color: #D32F2F;
    opacity: 1;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(244, 67, 54, 0.2);
}

/* Section Header Styles */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.section-title {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    color: #111827;
}

/* Staff Search Results Styles */
#staffSearchResults {
    max-height: 400px;
    overflow-y: auto;
}

#staffSearchResults::-webkit-scrollbar {
    width: 6px;
}

#staffSearchResults::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

#staffSearchResults::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

#staffSearchResults::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.staff-result-item:not(.disabled):hover {
    background-color: #f9fafb !important;
}

.staff-result-item.disabled {
    cursor: not-allowed !important;
}

#selectedStaffInfo {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>

