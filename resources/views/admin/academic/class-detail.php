<?php
$className = $_GET['class'] ?? '1A';
$pageTitle = 'Smart Campus Nova Hub - Class Details: ' . $className;
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

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

<!-- Class Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="batch-info">
            <h1>Class <?php echo htmlspecialchars($className); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editClassBtn">
            <i class="fas fa-edit"></i> Edit Class
        </button>
        <button class="action-btn-header delete" id="deleteClassBtn">
            <i class="fas fa-trash"></i> Delete Class
        </button>
    </div>
</div>

<!-- Class Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '30',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Subjects',
        'value' => '8',
        'icon' => 'fas fa-book',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Class Teacher',
        'value' => 'Ms. Sarah Johnson',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'blue'
    ]); ?>
</div>

<!-- Edit Class Form -->
<div id="editClassForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Class</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editClassName">Class Name</label>
                <input type="text" id="editClassName" class="form-input" value="<?php echo htmlspecialchars($className); ?>">
            </div>
            <div class="form-group">
                <label for="editClassGrade">Grade</label>
                <input type="text" id="editClassGrade" class="form-input" value="Grade 1">
            </div>
            <div class="form-group">
                <label for="editClassRoom">Room</label>
                <input type="text" id="editClassRoom" class="form-input" value="Room 101">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="editClassTeacher">Class Teacher</label>
                <input type="text" id="editClassTeacher" class="form-input" value="Ms. Sarah Johnson">
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditClass" class="simple-btn secondary">Cancel</button>
            <button id="saveEditClass" class="simple-btn primary"><i class="fas fa-check"></i> Update Class</button>
        </div>
    </div>
</div>

<!-- Class Information Section removed; details moved to header meta -->

<!-- Schedule Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Schedule</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>School Hours</label>
            <span>8:00 AM - 2:00 PM</span>
        </div>
        <div class="stat-detail">
            <label>Break Time</label>
            <span>10:00 AM - 10:30 AM</span>
        </div>
        <div class="stat-detail">
            <label>Lunch Time</label>
            <span>12:00 PM - 1:00 PM</span>
        </div>
    </div>
</div>

<!-- Subjects in Class Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subjects in Class <?php echo htmlspecialchars($className); ?></h3>
        <div class="section-actions">
            <button class="add-btn" id="assignExistingSubjectBtn">
                <i class="fas fa-link"></i>
                Assign Existing
            </button>
            <button class="add-btn" id="createNewSubjectBtn">
                <i class="fas fa-plus"></i>
                Create New
            </button>
        </div>
    </div>
    
    <!-- Assign Existing Subject Modal -->
    <div id="assignExistingSubjectModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; width:900px; max-width:94vw; border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow:hidden;">
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; border-bottom:1px solid #e2e8f0;">
                <h3 style="margin:0; font-size:16px;">Assign Existing Subject</h3>
                <button id="closeAssignExistingModal" class="simple-btn" style="padding:6px 10px;">Close</button>
            </div>
            <div style="padding:12px 16px;">
                <input type="text" id="subjectSearch" class="form-input" placeholder="Search subjects or teachers..." style="margin-bottom:12px;">
                <div style="max-height:400px; overflow:auto; border:1px solid #e2e8f0; border-radius:6px;">
                    <table class="basic-table" style="margin:0;">
                        <thead><tr><th style="width:40px;"></th><th>Subject Code</th><th>Subject Name</th><th>Category</th><th>Grade</th><th>Teacher</th></tr></thead>
                        <tbody id="existingSubjectsBody"></tbody>
                    </table>
                </div>
                <div style="margin-top:12px; text-align:right;">
                    <button id="assignSelectedSubjectBtn" class="simple-btn primary"><i class="fas fa-link"></i> Assign Selected</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Create New Subject Form (placed directly under header) -->
    <div id="createNewSubjectForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-book"></i> Create Subject</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="newSubjectCode">Subject Code</label>
                    <input type="text" id="newSubjectCode" class="form-input" placeholder="e.g., MATH">
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="newSubjectName">Subject Name</label>
                    <input type="text" id="newSubjectName" class="form-input" placeholder="e.g., Mathematics">
                </div>
                <div class="form-group">
                    <label for="newSubjectCategory">Category</label>
                    <select id="newSubjectCategory" class="form-select">
                        <option value="Core">Core</option>
                        <option value="Elective">Elective</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="newSubjectGrade">Grade</label>
                    <input type="text" id="newSubjectGrade" class="form-input" placeholder="e.g., Grade 1">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label for="newSubjectTeachersSearch">Assign Teachers</label>
                    <input type="text" id="newSubjectTeachersSearch" class="form-input" placeholder="Search by name or ID">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <div id="newSubjectTeachersList" style="max-height:220px; overflow:auto; border:1px solid #e2e8f0; border-radius:6px;">
                        <table class="basic-table" style="margin:0;">
                            <thead><tr><th style="width:40px;"></th><th>Name</th><th>ID</th></tr></thead>
                            <tbody id="newSubjectTeachersBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelCreateNewSubject" class="simple-btn secondary">Cancel</button>
                <button id="saveCreateNewSubject" class="simple-btn primary"><i class="fas fa-check"></i> Create & Assign</button>
            </div>
        </div>
    </div>

    <div class="grades-grid" id="subjectsGrid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="<?php echo $portalPrefix; ?>/academic/subject-detail/MATH" class="grade-link">Mathematics</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
                
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Mr. John Smith</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">9:00 AM - 10:00 AM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="<?php echo $portalPrefix; ?>/academic/subject-detail/ENG" class="grade-link">English Language</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
                
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Sarah Johnson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">10:30 AM - 11:30 AM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="<?php echo $portalPrefix; ?>/academic/subject-detail/SCI" class="grade-link">Science</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
                
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Dr. Wilson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">11:30 AM - 12:30 PM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="<?php echo $portalPrefix; ?>/academic/subject-detail/ART" class="grade-link">Art & Craft</a>
                <span class="category-badge elective">Elective</span>
            </div>
            <div class="grade-card-body">
                
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Anna Rodriguez</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">1:00 PM - 2:00 PM</span>
                </div>
            </div>
        </div>
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
    // Demo data for existing subjects with their assigned teachers
    const demoSubjects = [
        { 
            code: 'MATH', 
            name: 'Mathematics', 
            category: 'Core', 
            grade: 'Grade 1',
            teachers: [
                { id: 'T001', name: 'Mr. John Smith' },
                { id: 'T002', name: 'Ms. Sarah Johnson' }
            ]
        },
        { 
            code: 'ENG', 
            name: 'English Language', 
            category: 'Core', 
            grade: 'Grade 1',
            teachers: [
                { id: 'T003', name: 'Dr. Wilson' }
            ]
        },
        { 
            code: 'SCI', 
            name: 'Science', 
            category: 'Core', 
            grade: 'Grade 1',
            teachers: [
                { id: 'T004', name: 'Ms. Anna Rodriguez' },
                { id: 'T005', name: 'Mr. David Brown' }
            ]
        },
        { 
            code: 'ART', 
            name: 'Art & Craft', 
            category: 'Elective', 
            grade: 'Grade 1',
            teachers: [
                { id: 'T006', name: 'Ms. Emily Davis' }
            ]
        },
        { 
            code: 'PE', 
            name: 'Physical Education', 
            category: 'Core', 
            grade: 'Grade 1',
            teachers: [
                { id: 'T007', name: 'Mr. Michael Johnson' }
            ]
        },
        { 
            code: 'MUS', 
            name: 'Music', 
            category: 'Elective', 
            grade: 'Grade 1',
            teachers: [
                { id: 'T008', name: 'Ms. Lisa Wilson' }
            ]
        }
    ];

    // Demo data for teachers
    const demoTeachers = [
        { id: 'T001', name: 'Mr. John Smith' },
        { id: 'T002', name: 'Ms. Sarah Johnson' },
        { id: 'T003', name: 'Dr. Wilson' },
        { id: 'T004', name: 'Ms. Anna Rodriguez' },
        { id: 'T005', name: 'Mr. David Brown' }
    ];

    // Elements
    const assignExistingBtn = document.getElementById('assignExistingSubjectBtn');
    const createNewBtn = document.getElementById('createNewSubjectBtn');
    const assignModal = document.getElementById('assignExistingSubjectModal');
    const createForm = document.getElementById('createNewSubjectForm');
    const closeModalBtn = document.getElementById('closeAssignExistingModal');
    const cancelCreateBtn = document.getElementById('cancelCreateNewSubject');
    const saveCreateBtn = document.getElementById('saveCreateNewSubject');
    const assignSelectedBtn = document.getElementById('assignSelectedSubjectBtn');
    const grid = document.getElementById('subjectsGrid');
    const subjectSearch = document.getElementById('subjectSearch');
    const teacherSearch = document.getElementById('newSubjectTeachersSearch');
    const existingSubjectsBody = document.getElementById('existingSubjectsBody');
    const newSubjectTeachersBody = document.getElementById('newSubjectTeachersBody');

    // Assign Existing Subject functionality
    assignExistingBtn && assignExistingBtn.addEventListener('click', function(e){
        e.preventDefault();
        assignModal.style.display = 'flex';
        renderExistingSubjects(demoSubjects);
    });

    closeModalBtn && closeModalBtn.addEventListener('click', function(e){
        e.preventDefault();
        assignModal.style.display = 'none';
    });

    // Create New Subject functionality
    createNewBtn && createNewBtn.addEventListener('click', function(e){
        e.preventDefault();
        createForm.style.display = 'block';
        renderTeachers(demoTeachers);
    });

    cancelCreateBtn && cancelCreateBtn.addEventListener('click', function(e){
        e.preventDefault();
        createForm.style.display = 'none';
    });

    // Search functionality
    subjectSearch && subjectSearch.addEventListener('input', function(){
        const searchTerm = this.value.toLowerCase();
        const filtered = demoSubjects.filter(subject => 
            subject.name.toLowerCase().includes(searchTerm) || 
            subject.code.toLowerCase().includes(searchTerm) ||
            subject.teachers.some(teacher => teacher.name.toLowerCase().includes(searchTerm))
        );
        renderExistingSubjects(filtered);
    });

    teacherSearch && teacherSearch.addEventListener('input', function(){
        const searchTerm = this.value.toLowerCase();
        const filtered = demoTeachers.filter(teacher => 
            teacher.name.toLowerCase().includes(searchTerm) || 
            teacher.id.toLowerCase().includes(searchTerm)
        );
        renderTeachers(filtered);
    });

    // Assign selected existing subject
    assignSelectedBtn && assignSelectedBtn.addEventListener('click', function(e){
        e.preventDefault();
        const selectedRadio = document.querySelector('#existingSubjectsBody input[type="radio"]:checked');
        if (!selectedRadio) {
            alert('Please select a subject and teacher to assign');
            return;
        }
        
        const subjectRow = selectedRadio.closest('tr');
        const code = subjectRow.cells[1].textContent;
        const name = subjectRow.cells[2].textContent;
        const category = subjectRow.cells[3].textContent;
        const teacher = subjectRow.cells[5].textContent;
        
        // Check if subject is already assigned
        const existingCards = grid.querySelectorAll('.grade-detail-card');
        const isAlreadyAssigned = Array.from(existingCards).some(card => 
            card.querySelector('.grade-link').textContent === name
        );
        
        if (isAlreadyAssigned) {
            alert('This subject is already assigned to this class');
            return;
        }
        
        const card = document.createElement('div');
        card.className = 'grade-detail-card';
        card.innerHTML = `
            <div class="grade-card-header">
                <a href="/admin/academic/subject-detail/${code}" class="grade-link">${name}</a>
                <span class="category-badge ${category.toLowerCase()}">${category}</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">${teacher}</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">-</span>
                </div>
            </div>`;
        grid && grid.prepend(card);
        assignModal.style.display = 'none';
        alert('Subject assigned successfully');
    });

    // Create and assign new subject
    saveCreateBtn && saveCreateBtn.addEventListener('click', function(e){
        e.preventDefault();
        const code = (document.getElementById('newSubjectCode').value || '').trim();
        const name = (document.getElementById('newSubjectName').value || '').trim();
        const category = document.getElementById('newSubjectCategory').value || 'Core';
        const grade = (document.getElementById('newSubjectGrade').value || '').trim();
        
        if (!code || !name || !grade) {
            alert('Please fill in all required fields');
            return;
        }

        const selectedTeachers = Array.from(document.querySelectorAll('#newSubjectTeachersBody input[type="checkbox"]:checked'))
            .map(cb => cb.closest('tr').cells[1].textContent);
        
        const card = document.createElement('div');
        card.className = 'grade-detail-card';
        card.innerHTML = `
            <div class="grade-card-header">
                <a href="/admin/academic/subject-detail/${code}" class="grade-link">${name}</a>
                <span class="category-badge ${category.toLowerCase()}">${category}</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">${selectedTeachers.length > 0 ? selectedTeachers.join(', ') : '-'}</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">-</span>
                </div>
            </div>`;
        grid && grid.prepend(card);
        createForm.style.display = 'none';
        alert('Subject created and assigned successfully');
    });

    // Helper functions
    function renderExistingSubjects(subjects) {
        if (!existingSubjectsBody) return;
        let html = '';
        subjects.forEach(subject => {
            subject.teachers.forEach(teacher => {
                html += `
                    <tr>
                        <td><input type="radio" name="selectedSubject" value="${subject.code}-${teacher.id}"></td>
                        <td>${subject.code}</td>
                        <td>${subject.name}</td>
                        <td>${subject.category}</td>
                        <td>${subject.grade}</td>
                        <td>${teacher.name}</td>
                    </tr>
                `;
            });
        });
        existingSubjectsBody.innerHTML = html;
    }

    function renderTeachers(teachers) {
        if (!newSubjectTeachersBody) return;
        newSubjectTeachersBody.innerHTML = teachers.map(teacher => `
            <tr>
                <td><input type="checkbox" value="${teacher.id}"></td>
                <td>${teacher.name}</td>
                <td>${teacher.id}</td>
            </tr>
        `).join('');
    }
    
    // Edit Class functionality
    const editClassBtn = document.getElementById('editClassBtn');
    const editClassForm = document.getElementById('editClassForm');
    const cancelEditClassBtn = document.getElementById('cancelEditClass');
    const saveEditClassBtn = document.getElementById('saveEditClass');
    
    editClassBtn.addEventListener('click', function() {
        editClassForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL and clean it up immediately
    if (window.location.search.includes('edit=true')) {
        editClassForm.style.display = 'block';
        // Remove edit parameter from URL immediately
        const cleanUrl = window.location.pathname + window.location.search.replace(/[?&]edit=true/, '').replace(/[?&]$/, '');
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    cancelEditClassBtn.addEventListener('click', function() {
        editClassForm.style.display = 'none';
    });
    
    saveEditClassBtn.addEventListener('click', function() {
        const newName = document.getElementById('editClassName').value.trim();
        const newGrade = document.getElementById('editClassGrade').value.trim();
        const newRoom = document.getElementById('editClassRoom').value.trim();
        const newTeacher = document.getElementById('editClassTeacher').value.trim();
        
        if (!newName || !newGrade || !newRoom || !newTeacher) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = `Class ${newName}`;
        
        // Hide form
        editClassForm.style.display = 'none';
        
        showActionStatus('Class updated successfully!', 'success');
    });
    
    // Delete Class functionality
    const deleteClassBtn = document.getElementById('deleteClassBtn');
    deleteClassBtn.addEventListener('click', function() {
        const className = 'Class <?php echo htmlspecialchars($className); ?>';
        showConfirmDialog({
            title: 'Delete Class',
            message: `Are you sure you want to delete ${className}? This will remove all students from this class and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-door-open',
            onConfirm: function() {
                showActionStatus('Class deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '<?php echo $portalPrefix; ?>/academic-management';
                }, 1500);
            }
        });
    });
});
</script>
