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
    <a href="/admin/academic-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Academic Management
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
        'title' => 'Staff Members',
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
        <h3 class="section-title">Department Staff</h3>
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
                        <button class="remove-staff-btn" onclick="event.stopPropagation(); removeStaff(<?php echo $index; ?>)" title="Remove from Department" style="display:none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                    window.location.href = '/admin/academic-management';
                }, 1500);
            }
        });
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

/* Remove Staff Button Styles */
.remove-staff-btn {
    background: #ff4757;
    color: white;
    border: none;
    border-radius: 6px;
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
}

.remove-staff-btn:hover {
    background: #ff3742;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

</style>

