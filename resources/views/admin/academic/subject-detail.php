<?php
$subjectCode = $_GET['subject'] ?? 'MATH';
$subjectNames = [
    'MATH' => 'Mathematics',
    'ENG' => 'English Language', 
    'SCI' => 'Science',
    'ART' => 'Art & Craft'
];
$subjectName = $subjectNames[$subjectCode] ?? 'Unknown Subject';
$pageTitle = 'Smart Campus Nova Hub - Subject Details: ' . $subjectName;
$pageIcon = 'fas fa-book';
$pageHeading = 'Subject Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';
include __DIR__ . '/../../components/academic-dialogs.php';

// Determine portal and prefix
$uri = $_SERVER['REQUEST_URI'] ?? '';
$isStaffPortal = strpos($uri, '/staff/') === 0;
$portalPrefix = $isStaffPortal ? '/staff' : '/admin';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="<?php echo $portalPrefix; ?>/academic-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Academic Management
    </a>
</div>

<!-- Subject Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($subjectName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge core" style="background-color: #fef3c7; color: #92400e; border: 1px solid #f59e0b;">Core Subject</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editSubjectBtn">
            <i class="fas fa-edit"></i> Edit Subject
        </button>
        <button class="action-btn-header delete" id="deleteSubjectBtn">
            <i class="fas fa-trash"></i> Delete Subject
        </button>
    </div>
</div>

<!-- Subject Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Grade',
        'value' => 'Grade 1',
        'icon' => 'fas fa-graduation-cap',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Teachers Assigned',
        'value' => '2',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Classes Assigned',
        'value' => '4',
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
</div>


<!-- Subject Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subject Information</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Subject Name</label>
            <span><?php echo htmlspecialchars($subjectName); ?></span>
        </div>
        <div class="year-detail">
            <label>Category</label>
            <span>Core Subject</span>
        </div>
    </div>
</div>

<!-- Teachers Section -->
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-chalkboard-teacher"></i> Teachers</h4>
        <div class="section-actions">
        <button class="add-btn" id="addTeacherBtn">
            <i class="fas fa-plus"></i>
            Add Teacher
        </button>
        </div>
    </div>
    
    <!-- Add Teacher Modal -->
    <div id="addTeacherModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; width:500px; max-width:94vw; border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow:hidden;">
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; border-bottom:1px solid #e2e8f0;">
                <h3 style="margin:0; font-size:16px;">Add Teacher</h3>
                <button id="closeAddTeacherModal" class="simple-btn" style="padding:6px 10px;">Close</button>
            </div>
            <div style="padding:16px;">
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="addTeacherSelect">Select Teacher</label>
                            <select id="addTeacherSelect" class="form-select">
                                <option value="">Choose a teacher...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions" style="margin-top:16px;">
                        <button id="cancelAddTeacher" class="simple-btn secondary">Cancel</button>
                        <button id="saveAddTeacherBtn" class="simple-btn primary"><i class="fas fa-plus"></i> Add Teacher</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>Teacher ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="teachersTableBody">
                <tr>
                    <td data-label="Teacher Name">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T001" style="text-decoration: none; color: #1976d2;">
                            <?php echo $subjectCode == 'MATH' ? 'Mr. John Smith' : 'Ms. Sarah Johnson'; ?>
                        </a>
                    </td>
                    <td data-label="Teacher ID">T001</td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="action-icon delete" title="Remove Teacher" onclick="removeTeacher('T001', this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Teacher Name">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T002" style="text-decoration: none; color: #1976d2;">
                            <?php echo $subjectCode == 'MATH' ? 'Ms. Sarah Johnson' : 'Mr. David Chen'; ?>
                        </a>
                    </td>
                    <td data-label="Teacher ID">T002</td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="action-icon delete" title="Remove Teacher" onclick="removeTeacher('T002', this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

// Include appropriate layout based on portal
$layoutPath = __DIR__ . '/../../components/' . ($isStaffPortal ? 'staff-layout.php' : 'admin-layout.php');
include $layoutPath;
?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // Demo data for all available teachers
    const allTeachers = [
        { id: 'T001', name: 'Mr. John Smith' },
        { id: 'T002', name: 'Ms. Sarah Johnson' },
        { id: 'T003', name: 'Dr. Wilson' },
        { id: 'T004', name: 'Ms. Anna Rodriguez' },
        { id: 'T005', name: 'Mr. David Brown' },
        { id: 'T006', name: 'Ms. Emily Davis' },
        { id: 'T007', name: 'Mr. Michael Johnson' },
        { id: 'T008', name: 'Ms. Lisa Wilson' }
    ];
    
    // Currently assigned teachers (will be updated dynamically)
    let assignedTeachers = [
        { id: 'T001', name: '<?php echo $subjectCode == 'MATH' ? 'Mr. John Smith' : 'Ms. Sarah Johnson'; ?>' },
        { id: 'T002', name: '<?php echo $subjectCode == 'MATH' ? 'Ms. Sarah Johnson' : 'Mr. David Chen'; ?>' }
    ];
    
    // Elements
    const addTeacherBtn = document.getElementById('addTeacherBtn');
    const addTeacherModal = document.getElementById('addTeacherModal');
    const closeAddTeacherModal = document.getElementById('closeAddTeacherModal');
    const cancelAddTeacher = document.getElementById('cancelAddTeacher');
    const saveAddTeacherBtn = document.getElementById('saveAddTeacherBtn');
    const addTeacherSelect = document.getElementById('addTeacherSelect');
    const teachersTableBody = document.getElementById('teachersTableBody');

    // Add Teacher functionality
    addTeacherBtn && addTeacherBtn.addEventListener('click', function(e){
        e.preventDefault();
        addTeacherModal.style.display = 'flex';
        populateTeacherSelectForAdd(allTeachers, assignedTeachers);
    });

    closeAddTeacherModal && closeAddTeacherModal.addEventListener('click', function(e){
        e.preventDefault();
        addTeacherModal.style.display = 'none';
    });

    cancelAddTeacher && cancelAddTeacher.addEventListener('click', function(e){
        e.preventDefault();
        addTeacherModal.style.display = 'none';
    });

    // Save Add Teacher
    saveAddTeacherBtn && saveAddTeacherBtn.addEventListener('click', function(e){
        e.preventDefault();
        const selectedTeacherId = addTeacherSelect.value;
        
        if (!selectedTeacherId) {
            alert('Please select a teacher');
            return;
        }
        
        const teacher = allTeachers.find(t => t.id === selectedTeacherId);
        if (!teacher) {
            alert('Invalid teacher selection');
            return;
        }
        
        // Check if teacher is already assigned
        if (assignedTeachers.some(t => t.id === teacher.id)) {
            alert('This teacher is already assigned to this subject');
            return;
        }
        
        // Add to assigned teachers
        assignedTeachers.push(teacher);
        
        // Add row to table
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Teacher Name">
                <a href="<?php echo $portalPrefix; ?>/teacher-profile/${teacher.id}" style="text-decoration: none; color: #1976d2;">${teacher.name}</a>
            </td>
            <td data-label="Teacher ID">${teacher.id}</td>
            <td data-label="Actions" class="actions-cell">
                <button class="action-icon delete" title="Remove Teacher" onclick="removeTeacher('${teacher.id}', this)">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        teachersTableBody.appendChild(row);
        
        // Update teacher count in stats
        const teacherCountCard = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-number');
        if (teacherCountCard) {
            teacherCountCard.textContent = assignedTeachers.length;
        }
        
        addTeacherModal.style.display = 'none';
        showActionStatus('Teacher added successfully!', 'success');
    });

    // Remove Teacher function
    window.removeTeacher = function(teacherId, btn) {
        showConfirmDialog({
            title: 'Remove Teacher',
            message: 'Are you sure you want to remove this teacher from this subject?',
            confirmText: 'Remove',
            confirmIcon: 'fas fa-trash',
            onConfirm: function() {
                // Remove from assigned teachers
                assignedTeachers = assignedTeachers.filter(t => t.id !== teacherId);
                
                // Remove row from table
                const row = btn.closest('tr');
                if (row) {
                    row.remove();
                }
                
                // Update teacher count in stats
                const teacherCountCard = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-number');
                if (teacherCountCard) {
                    teacherCountCard.textContent = assignedTeachers.length;
                }
                
                showActionStatus('Teacher removed successfully!', 'success');
            }
        });
    };

    // Helper function to populate teacher select (excluding already assigned)
    function populateTeacherSelectForAdd(allTeachers, assignedTeachers) {
        if (!addTeacherSelect) return;
        const assignedIds = assignedTeachers.map(t => t.id);
        const availableTeachers = allTeachers.filter(t => !assignedIds.includes(t.id));
        
        addTeacherSelect.innerHTML = '<option value="">Choose a teacher...</option>' + 
            availableTeachers.map(teacher => `<option value="${teacher.id}">${teacher.name} (${teacher.id})</option>`).join('');
    }
    
    // Close Subject Dialog function
    window.closeSubjectDialog = function() {
        document.getElementById('subjectDialog').style.display = 'none';
    };
    
    // Edit Subject functionality
    const editSubjectBtn = document.getElementById('editSubjectBtn');
    
    editSubjectBtn.addEventListener('click', function() {
        // Open dialog with current data
        const subjectCode = '<?php echo htmlspecialchars($subjectCode); ?>';
        const subjectName = '<?php echo htmlspecialchars($subjectName); ?>';
        document.getElementById('subjectDialogTitle').textContent = 'Edit Subject';
        document.getElementById('subjectCode').value = subjectCode;
        document.getElementById('subjectName').value = subjectName;
        document.getElementById('subjectCategory').value = 'Core'; // Get from actual data
        document.getElementById('subjectGrade').value = 'Grade 1'; // Get from actual data
        document.getElementById('subjectDialog').style.display = 'flex';
    });
    
    // Override saveSubject function for detail page
    window.saveSubject = function() {
        const newCode = document.getElementById('subjectCode').value.trim();
        const newName = document.getElementById('subjectName').value.trim();
        const newCategory = document.getElementById('subjectCategory').value.trim();
        const newGrade = document.getElementById('subjectGrade').value.trim();
        
        if (!newCode || !newName || !newCategory) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = newName;
        
        // Close dialog
        document.getElementById('subjectDialog').style.display = 'none';
        
        showActionStatus('Subject updated successfully!', 'success');
    };
    
    // Delete Subject functionality
    const deleteSubjectBtn = document.getElementById('deleteSubjectBtn');
    deleteSubjectBtn.addEventListener('click', function() {
        const subjectName = '<?php echo htmlspecialchars($subjectName); ?>';
        showConfirmDialog({
            title: 'Delete Subject',
            message: `Are you sure you want to delete ${subjectName}? This will remove it from all classes and schedules and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-book',
            onConfirm: function() {
                showActionStatus('Subject deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '/admin/academic-management';
                }, 1500);
            }
        });
    });
});
</script>
