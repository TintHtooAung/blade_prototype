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

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/academic-management" class="breadcrumb-link">
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

<!-- Edit Subject Form -->
<div id="editSubjectForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Subject</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editSubjectCode">Subject Code</label>
                <input type="text" id="editSubjectCode" class="form-input" value="<?php echo htmlspecialchars($subjectCode); ?>">
            </div>
            <div class="form-group" style="flex:2;">
                <label for="editSubjectName">Subject Name</label>
                <input type="text" id="editSubjectName" class="form-input" value="<?php echo htmlspecialchars($subjectName); ?>">
            </div>
            <div class="form-group">
                <label for="editSubjectCategory">Category</label>
                <select id="editSubjectCategory" class="form-select">
                    <option value="Core" selected>Core</option>
                    <option value="Elective">Elective</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="editSubjectGrade">Grade</label>
                <input type="text" id="editSubjectGrade" class="form-input" value="Grade 1">
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditSubject" class="simple-btn secondary">Cancel</button>
            <button id="saveEditSubject" class="simple-btn primary"><i class="fas fa-check"></i> Update Subject</button>
        </div>
    </div>
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

<!-- Classes Teaching Subject Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes Teaching <?php echo htmlspecialchars($subjectName); ?></h3>
        <button class="add-btn" id="assignClassBtn">
            <i class="fas fa-plus"></i>
            Assign Class
        </button>
    </div>
    
    <!-- Assign Class Modal -->
    <div id="assignClassModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; width:600px; max-width:94vw; border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow:hidden;">
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; border-bottom:1px solid #e2e8f0;">
                <h3 style="margin:0; font-size:16px;">Assign Class to Subject</h3>
                <button id="closeAssignClassModal" class="simple-btn" style="padding:6px 10px;">Close</button>
            </div>
            <div style="padding:16px;">
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="assignClassSelect">Select Class</label>
                            <select id="assignClassSelect" class="form-select">
                                <option value="">Choose a class...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="assignTeacherSelect">Select Teacher</label>
                            <select id="assignTeacherSelect" class="form-select">
                                <option value="">Choose a teacher...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions" style="margin-top:16px;">
                        <button id="cancelAssignClass" class="simple-btn secondary">Cancel</button>
                        <button id="assignSelectedClassBtn" class="simple-btn primary"><i class="fas fa-link"></i> Assign Class</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grades-grid" id="classesGrid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/1A" class="grade-link">Class 1A</a>
                <span class="grade-info">Grade 1</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? 'Mr. John Smith' : 'Ms. Sarah Johnson'; ?></span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">Room 101</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/1B" class="grade-link">Class 1B</a>
                <span class="grade-info">Grade 1</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? 'Mr. David Chen' : 'Ms. Jennifer Lee'; ?></span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">Room 102</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // Get subject grade from the page (Grade 1 in this case)
    const subjectGrade = 'Grade 1';
    
    // Demo data for available classes (filtered by grade)
    const allClasses = [
        { name: 'Class 1A', grade: 'Grade 1', room: 'Room 101', teacher: 'Mr. John Smith' },
        { name: 'Class 1B', grade: 'Grade 1', room: 'Room 102', teacher: 'Ms. Sarah Johnson' },
        { name: 'Class 1C', grade: 'Grade 1', room: 'Room 103', teacher: 'Mr. David Chen' },
        { name: 'Class 2A', grade: 'Grade 2', room: 'Room 201', teacher: 'Dr. James Wilson' },
        { name: 'Class 2B', grade: 'Grade 2', room: 'Room 202', teacher: 'Ms. Emily Rodriguez' },
        { name: 'Class 3A', grade: 'Grade 3', room: 'Room 301', teacher: 'Mr. Michael Brown' }
    ];
    
    // Demo data for subject teachers (teachers assigned to this subject)
    const subjectTeachers = [
        { id: 'T001', name: 'Mr. John Smith' },
        { id: 'T002', name: 'Ms. Sarah Johnson' },
        { id: 'T003', name: 'Dr. Wilson' },
        { id: 'T004', name: 'Ms. Anna Rodriguez' }
    ];
    
    // Filter classes by subject grade
    const availableClasses = allClasses.filter(cls => cls.grade === subjectGrade);
    
    // Elements
    const assignClassBtn = document.getElementById('assignClassBtn');
    const assignModal = document.getElementById('assignClassModal');
    const closeModalBtn = document.getElementById('closeAssignClassModal');
    const cancelAssignBtn = document.getElementById('cancelAssignClass');
    const assignSelectedBtn = document.getElementById('assignSelectedClassBtn');
    const classSelect = document.getElementById('assignClassSelect');
    const teacherSelect = document.getElementById('assignTeacherSelect');
    const classesGrid = document.getElementById('classesGrid');

    // Assign Class functionality
    assignClassBtn && assignClassBtn.addEventListener('click', function(e){
        e.preventDefault();
        assignModal.style.display = 'flex';
        populateClassSelect(availableClasses);
        populateTeacherSelect(subjectTeachers);
    });

    closeModalBtn && closeModalBtn.addEventListener('click', function(e){
        e.preventDefault();
        assignModal.style.display = 'none';
    });

    cancelAssignBtn && cancelAssignBtn.addEventListener('click', function(e){
        e.preventDefault();
        assignModal.style.display = 'none';
    });


    // Assign selected class
    assignSelectedBtn && assignSelectedBtn.addEventListener('click', function(e){
        e.preventDefault();
        const selectedClass = classSelect.value;
        const selectedTeacher = teacherSelect.value;
        
        if (!selectedClass || !selectedTeacher) {
            alert('Please select both a class and a teacher');
            return;
        }
        
        // Find the selected class and teacher data
        const classData = availableClasses.find(cls => cls.name === selectedClass);
        const teacherData = subjectTeachers.find(teacher => teacher.name === selectedTeacher);
        
        if (!classData || !teacherData) {
            alert('Invalid selection');
            return;
        }
        
        // Check if class is already assigned
        const existingCards = classesGrid.querySelectorAll('.grade-detail-card');
        const isAlreadyAssigned = Array.from(existingCards).some(card => 
            card.querySelector('.grade-link').textContent === classData.name
        );
        
        if (isAlreadyAssigned) {
            alert('This class is already assigned to this subject');
            return;
        }
        
        const card = document.createElement('div');
        card.className = 'grade-detail-card';
        card.innerHTML = `
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/${classData.name.replace('Class ', '')}" class="grade-link">${classData.name}</a>
                <span class="grade-info">${classData.grade}</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">${teacherData.name}</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">${classData.room}</span>
                </div>
            </div>`;
        classesGrid && classesGrid.appendChild(card);
        assignModal.style.display = 'none';
        alert('Class assigned successfully');
    });

    // Helper functions
    function populateClassSelect(classes) {
        if (!classSelect) return;
        classSelect.innerHTML = '<option value="">Choose a class...</option>' + 
            classes.map(cls => `<option value="${cls.name}">${cls.name} - ${cls.room}</option>`).join('');
    }

    function populateTeacherSelect(teachers) {
        if (!teacherSelect) return;
        teacherSelect.innerHTML = '<option value="">Choose a teacher...</option>' + 
            teachers.map(teacher => `<option value="${teacher.name}">${teacher.name}</option>`).join('');
    }
    
    // Edit Subject functionality
    const editSubjectBtn = document.getElementById('editSubjectBtn');
    const editSubjectForm = document.getElementById('editSubjectForm');
    const cancelEditSubjectBtn = document.getElementById('cancelEditSubject');
    const saveEditSubjectBtn = document.getElementById('saveEditSubject');
    
    editSubjectBtn.addEventListener('click', function() {
        editSubjectForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('edit') === 'true') {
        editSubjectForm.style.display = 'block';
        // Clean up URL by removing the edit parameter
        urlParams.delete('edit');
        const newUrl = urlParams.toString() ? window.location.pathname + '?' + urlParams.toString() : window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
    
    cancelEditSubjectBtn.addEventListener('click', function() {
        editSubjectForm.style.display = 'none';
    });
    
    saveEditSubjectBtn.addEventListener('click', function() {
        const newCode = document.getElementById('editSubjectCode').value.trim();
        const newName = document.getElementById('editSubjectName').value.trim();
        const newCategory = document.getElementById('editSubjectCategory').value.trim();
        const newGrade = document.getElementById('editSubjectGrade').value.trim();
        
        if (!newCode || !newName || !newCategory || !newGrade) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = newName;
        
        // Hide form
        editSubjectForm.style.display = 'none';
        
        showActionStatus('Subject updated successfully!', 'success');
    });
    
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
