<?php
$className = $_GET['class'] ?? '1A';
// Extract grade and class letter from className (e.g., "1A" -> grade: "1", classLetter: "A")
preg_match('/^(\d+)([A-Z])$/i', $className, $matches);
$gradeNumber = $matches[1] ?? '1';
$classLetter = $matches[2] ?? 'A';
$gradeName = 'Grade ' . $gradeNumber;
$pageTitle = 'Smart Campus Nova Hub - Class Details: ' . $classLetter;
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Details';
$activePage = 'academic';

// Subject codes and names
$subjectNames = [
    'MATH001' => 'Mathematics',
    'ENG001' => 'English',
    'SCI001' => 'Science',
    'HIS001' => 'History',
    'ART001' => 'Art & Craft',
    'PHY001' => 'Physics',
    'CHEM001' => 'Chemistry',
    'BIO001' => 'Biology'
];

// Teacher directory mapped by subject code
$teacherDirectory = [
    'MATH001' => [
        ['id' => 'T001', 'name' => 'Ms. Sarah Johnson', 'department' => 'Mathematics'],
        ['id' => 'T003', 'name' => 'Mr. David Chen', 'department' => 'Mathematics'],
        ['id' => 'T011', 'name' => 'Mr. Brian Turner', 'department' => 'Mathematics']
    ],
    'ENG001' => [
        ['id' => 'T002', 'name' => 'Mr. David Lee', 'department' => 'Languages'],
        ['id' => 'T004', 'name' => 'Ms. Jennifer Lee', 'department' => 'Languages'],
        ['id' => 'T013', 'name' => 'Mr. Michael Carter', 'department' => 'Languages'],
        ['id' => 'T014', 'name' => 'Ms. Olivia Park', 'department' => 'Languages']
    ],
    'SCI001' => [
        ['id' => 'T005', 'name' => 'Ms. Emily Chen', 'department' => 'Science'],
        ['id' => 'T006', 'name' => 'Mr. David Lee', 'department' => 'Science'],
        ['id' => 'T007', 'name' => 'Dr. Helen Murray', 'department' => 'Science'],
        ['id' => 'T008', 'name' => 'Ms. Priya Patel', 'department' => 'Science']
    ],
    'HIS001' => [
        ['id' => 'T004', 'name' => 'Mr. Robert Kim', 'department' => 'Social Studies'],
        ['id' => 'T015', 'name' => 'Ms. Lisa Anderson', 'department' => 'Social Studies']
    ],
    'ART001' => [
        ['id' => 'T009', 'name' => 'Mr. Robert Kim', 'department' => 'Arts'],
        ['id' => 'T010', 'name' => 'Ms. Alicia Gomez', 'department' => 'Arts'],
        ['id' => 'T012', 'name' => 'Ms. Claire Young', 'department' => 'Arts']
    ]
];

// Current teachers in class (initial data)
$classTeachers = [
    ['id' => 'T001', 'name' => 'Ms. Sarah Johnson', 'subjectCode' => 'MATH001', 'subjectName' => 'Mathematics', 'department' => 'Mathematics'],
    ['id' => 'T002', 'name' => 'Mr. David Lee', 'subjectCode' => 'ENG001', 'subjectName' => 'English', 'department' => 'Languages'],
    ['id' => 'T005', 'name' => 'Ms. Emily Chen', 'subjectCode' => 'SCI001', 'subjectName' => 'Science', 'department' => 'Science'],
    ['id' => 'T004', 'name' => 'Mr. Robert Kim', 'subjectCode' => 'HIS001', 'subjectName' => 'History', 'department' => 'Social Studies']
];

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

<!-- Class Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="batch-info">
            <h1>Class <?php echo htmlspecialchars($classLetter); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
                <span class="meta-info"><?php echo htmlspecialchars($gradeName); ?></span>
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
        'title' => 'Class Name',
        'value' => $classLetter,
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Grade',
        'value' => $gradeName,
        'icon' => 'fas fa-graduation-cap',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '30',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Class Teacher',
        'value' => 'Ms. Sarah Johnson',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'orange'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Teachers in Class',
        'value' => count($classTeachers),
        'icon' => 'fas fa-users-cog',
        'iconColor' => 'teal'
    ]); ?>
</div>


<!-- Class Information Section removed; details moved to header meta -->

<!-- Time-table Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Time-table</h3>
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

<!-- Teachers in Class Section -->
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px; display: flex; justify-content: space-between; align-items: center;">
        <h4><i class="fas fa-chalkboard-teacher"></i> Teachers in Class</h4>
        <button class="add-btn" id="addTeacherBtn" style="margin: 0;">
            <i class="fas fa-plus"></i> Assign Teacher
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody id="classTeachersTableBody">
                <?php if (empty($classTeachers)): ?>
                    <tr>
                        <td colspan="4" style="text-align:center; color:#6b7280;">No teachers assigned yet.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($classTeachers as $teacher): ?>
                        <tr data-teacher-id="<?php echo htmlspecialchars($teacher['id']); ?>" data-subject-code="<?php echo htmlspecialchars($teacher['subjectCode']); ?>">
                            <td data-label="Teacher ID">
                                <a href="<?php echo $portalPrefix; ?>/teacher-profile/<?php echo htmlspecialchars($teacher['id']); ?>" style="text-decoration: none; color: #1976d2;"><?php echo htmlspecialchars($teacher['id']); ?></a>
                            </td>
                            <td data-label="Name">
                                <a href="<?php echo $portalPrefix; ?>/teacher-profile/<?php echo htmlspecialchars($teacher['id']); ?>" style="text-decoration: none; color: #1976d2;"><?php echo htmlspecialchars($teacher['name']); ?></a>
                            </td>
                            <td data-label="Subject">
                                <a href="<?php echo $portalPrefix; ?>/subject-detail/<?php echo htmlspecialchars($teacher['subjectCode']); ?>" style="text-decoration: none; color: #1976d2;">
                                    <strong><?php echo htmlspecialchars($teacher['subjectCode']); ?></strong> - <?php echo htmlspecialchars($teacher['subjectName']); ?>
                                </a>
                            </td>
                            <td data-label="Department"><?php echo htmlspecialchars($teacher['department']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Assign Teacher Modal -->
<div id="addTeacherModal" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 520px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-user-plus"></i> Assign Teacher to Class</h3>
            <button class="receipt-close" onclick="closeAddTeacherModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="addTeacherForm">
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label for="addTeacherSubjectSelect">Select Subject Code *</label>
                        <select id="addTeacherSubjectSelect" class="form-select" required>
                            <option value="">Select subject code</option>
                            <?php foreach ($subjectNames as $code => $name): ?>
                                <option value="<?php echo htmlspecialchars($code); ?>"><?php echo htmlspecialchars($code); ?> - <?php echo htmlspecialchars($name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label for="addTeacherSelect">Select Teacher *</label>
                        <select id="addTeacherSelect" class="form-select" disabled required>
                            <option value="">First select a subject code</option>
                        </select>
                    </div>
                </div>
                <div class="info-hint" style="background:#f3f4f6; border-radius:8px; padding:12px; font-size:0.9rem; color:#4b5563; margin-top: 16px;">
                    <i class="fas fa-info-circle" style="margin-right:8px; color:#2563eb;"></i>
                    Select a subject code first, then choose a teacher who teaches that subject.
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" id="cancelAddTeacherBtn">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button id="addTeacherSaveBtn" class="simple-btn primary">
                <i class="fas fa-check"></i> Assign Teacher
            </button>
        </div>
    </div>
</div>

<!-- Students in Class Section -->
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user-graduate"></i> Students in Class <?php echo htmlspecialchars($classLetter); ?></h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU001" style="text-decoration: none; color: #1976d2;">STU001</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU001" style="text-decoration: none; color: #1976d2;">John Doe</a>
                    </td>
                    <td data-label="Phone">+1-555-0101</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU002" style="text-decoration: none; color: #1976d2;">STU002</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU002" style="text-decoration: none; color: #1976d2;">Jane Smith</a>
                    </td>
                    <td data-label="Phone">+1-555-0102</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU003" style="text-decoration: none; color: #1976d2;">STU003</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU003" style="text-decoration: none; color: #1976d2;">Michael Johnson</a>
                    </td>
                    <td data-label="Phone">+1-555-0103</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU004" style="text-decoration: none; color: #1976d2;">STU004</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU004" style="text-decoration: none; color: #1976d2;">Emily Davis</a>
                    </td>
                    <td data-label="Phone">+1-555-0104</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU005" style="text-decoration: none; color: #1976d2;">STU005</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU005" style="text-decoration: none; color: #1976d2;">David Wilson</a>
                    </td>
                    <td data-label="Phone">+1-555-0105</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU006" style="text-decoration: none; color: #1976d2;">STU006</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU006" style="text-decoration: none; color: #1976d2;">Sarah Brown</a>
                    </td>
                    <td data-label="Phone">+1-555-0106</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU007" style="text-decoration: none; color: #1976d2;">STU007</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU007" style="text-decoration: none; color: #1976d2;">Robert Taylor</a>
                    </td>
                    <td data-label="Phone">+1-555-0107</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU008" style="text-decoration: none; color: #1976d2;">STU008</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU008" style="text-decoration: none; color: #1976d2;">Lisa Anderson</a>
                    </td>
                    <td data-label="Phone">+1-555-0108</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU009" style="text-decoration: none; color: #1976d2;">STU009</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU009" style="text-decoration: none; color: #1976d2;">James Martinez</a>
                    </td>
                    <td data-label="Phone">+1-555-0109</td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU010" style="text-decoration: none; color: #1976d2;">STU010</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU010" style="text-decoration: none; color: #1976d2;">Maria Garcia</a>
                    </td>
                    <td data-label="Phone">+1-555-0110</td>
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
// Data from PHP
const subjectNames = <?php echo json_encode($subjectNames); ?>;
const teacherDirectory = <?php echo json_encode($teacherDirectory); ?>;
const portalPrefix = <?php echo json_encode($portalPrefix); ?>;
let classTeachers = <?php echo json_encode($classTeachers); ?>;

document.addEventListener('DOMContentLoaded', function(){
    // Close Class Dialog function
    window.closeClassDialog = function() {
        document.getElementById('classDialog').style.display = 'none';
        document.body.style.overflow = '';
    };
    
    // Edit Class functionality
    const editClassBtn = document.getElementById('editClassBtn');
    const classDialog = document.getElementById('classDialog');
    
    editClassBtn.addEventListener('click', function() {
        // Open dialog with current data
        const classLetter = '<?php echo htmlspecialchars($classLetter); ?>';
        const gradeName = '<?php echo htmlspecialchars($gradeName); ?>';
        document.getElementById('classDialogTitle').textContent = 'Edit Class';
        document.getElementById('className').value = classLetter;
        document.getElementById('classGrade').value = gradeName;
        document.getElementById('classRoom').value = 'Room 101'; // Get from actual data
        document.getElementById('classTeacher').value = 'Ms. Sarah Johnson'; // Get from actual data
        classDialog.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
    
    // Close modal when clicking outside
    classDialog.addEventListener('click', function(e) {
        if (e.target === classDialog) {
            closeClassDialog();
        }
    });
    
    // Override saveClass function for detail page
    window.saveClass = function() {
        const newName = document.getElementById('className').value.trim();
        const newGrade = document.getElementById('classGrade').value.trim();
        const newRoom = document.getElementById('classRoom').value.trim();
        const newTeacher = document.getElementById('classTeacher').value.trim();
        
        if (!newName || !newGrade) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Extract grade number from "Grade X" format
        const gradeMatch = newGrade.match(/Grade\s+(\d+)/i);
        const gradeNum = gradeMatch ? gradeMatch[1] : '1';
        
        // Update page title (just the letter)
        document.querySelector('.batch-info h1').textContent = `Class ${newName}`;
        
        // Update grade in meta info
        const metaInfo = document.querySelector('.batch-meta .meta-info');
        if (metaInfo) {
            metaInfo.textContent = newGrade;
        }
        
        // Update stat cards
        const classCard = document.querySelector('.detail-stats-grid .stat-card:first-child .stat-number');
        const gradeCard = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-number');
        if (classCard) classCard.textContent = newName;
        if (gradeCard) gradeCard.textContent = newGrade;
        
        // Update section title
        const sectionTitle = document.querySelector('.simple-section .simple-header h4');
        if (sectionTitle && sectionTitle.textContent.includes('Students in Class')) {
            sectionTitle.innerHTML = `<i class="fas fa-user-graduate"></i> Students in Class ${newName}`;
        }
        
        // Close dialog
        closeClassDialog();
        
        showActionStatus('Class updated successfully!', 'success');
    };
    
    // Delete Class functionality
    const deleteClassBtn = document.getElementById('deleteClassBtn');
    deleteClassBtn.addEventListener('click', function() {
        const classDisplay = 'Class <?php echo htmlspecialchars($classLetter); ?> (<?php echo htmlspecialchars($gradeName); ?>)';
        showConfirmDialog({
            title: 'Delete Class',
            message: `Are you sure you want to delete ${classDisplay}? This will remove all students from this class and cannot be undone.`,
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

    // Add Teacher functionality
    const addTeacherBtn = document.getElementById('addTeacherBtn');
    const addTeacherModal = document.getElementById('addTeacherModal');
    const addTeacherSubjectSelect = document.getElementById('addTeacherSubjectSelect');
    const addTeacherSelect = document.getElementById('addTeacherSelect');
    const addTeacherSaveBtn = document.getElementById('addTeacherSaveBtn');
    const cancelAddTeacherBtn = document.getElementById('cancelAddTeacherBtn');
    const classTeachersTableBody = document.getElementById('classTeachersTableBody');

    // Function to render teachers table
    function renderTeachersTable() {
        if (!classTeachersTableBody) return;
        classTeachersTableBody.innerHTML = '';

        if (!classTeachers.length) {
            const row = document.createElement('tr');
            const cell = document.createElement('td');
            cell.colSpan = 4;
            cell.textContent = 'No teachers assigned yet.';
            cell.style.textAlign = 'center';
            cell.style.color = '#6b7280';
            row.appendChild(cell);
            classTeachersTableBody.appendChild(row);
            return;
        }

        classTeachers.forEach(teacher => {
            const row = document.createElement('tr');
            row.setAttribute('data-teacher-id', teacher.id);
            row.setAttribute('data-subject-code', teacher.subjectCode);

            row.innerHTML = `
                <td data-label="Teacher ID">
                    <a href="${portalPrefix}/teacher-profile/${teacher.id}" style="text-decoration: none; color: #1976d2;">${teacher.id}</a>
                </td>
                <td data-label="Name">
                    <a href="${portalPrefix}/teacher-profile/${teacher.id}" style="text-decoration: none; color: #1976d2;">${teacher.name}</a>
                </td>
                <td data-label="Subject">
                    <a href="${portalPrefix}/subject-detail/${teacher.subjectCode}" style="text-decoration: none; color: #1976d2;">
                        <strong>${teacher.subjectCode}</strong> - ${teacher.subjectName}
                    </a>
                </td>
                <td data-label="Department">${teacher.department}</td>
            `;
            classTeachersTableBody.appendChild(row);
        });

        // Update teacher count stat
        const teacherCountStat = document.querySelector('.detail-stats-grid .stat-card:nth-child(5) .stat-number');
        if (teacherCountStat) {
            teacherCountStat.textContent = classTeachers.length;
        }
    }

    // Function to populate teacher dropdown based on selected subject
    function populateTeacherOptions(subjectCode) {
        if (!addTeacherSelect) return;
        addTeacherSelect.innerHTML = '<option value="">Select teacher</option>';

        if (!subjectCode || !teacherDirectory[subjectCode]) {
            addTeacherSelect.disabled = true;
            return;
        }

        addTeacherSelect.disabled = false;
        const teachers = teacherDirectory[subjectCode];
        
        // Filter out teachers already assigned to this class
        const assignedTeacherIds = classTeachers.map(t => t.id);
        
        teachers.forEach(teacher => {
            if (!assignedTeacherIds.includes(teacher.id)) {
                const option = document.createElement('option');
                option.value = teacher.id;
                option.textContent = `${teacher.name} (${teacher.department})`;
                option.setAttribute('data-teacher-name', teacher.name);
                option.setAttribute('data-teacher-department', teacher.department);
                addTeacherSelect.appendChild(option);
            }
        });

        if (addTeacherSelect.options.length === 1) {
            addTeacherSelect.innerHTML = '<option value="">No available teachers for this subject</option>';
            addTeacherSelect.disabled = true;
        }
    }

    // Handle subject selection change
    if (addTeacherSubjectSelect) {
        addTeacherSubjectSelect.addEventListener('change', function() {
            const selectedSubject = this.value;
            populateTeacherOptions(selectedSubject);
            if (addTeacherSelect) {
                addTeacherSelect.value = '';
            }
        });
    }

    // Open Add Teacher Modal
    function openAddTeacherModal() {
        if (addTeacherModal) {
            addTeacherModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            if (addTeacherSubjectSelect) addTeacherSubjectSelect.value = '';
            if (addTeacherSelect) {
                addTeacherSelect.value = '';
                addTeacherSelect.disabled = true;
                addTeacherSelect.innerHTML = '<option value="">First select a subject code</option>';
            }
        }
    }

    // Close Add Teacher Modal
    window.closeAddTeacherModal = function() {
        if (addTeacherModal) {
            addTeacherModal.style.display = 'none';
            document.body.style.overflow = '';
        }
        if (addTeacherSubjectSelect) addTeacherSubjectSelect.value = '';
        if (addTeacherSelect) {
            addTeacherSelect.value = '';
            addTeacherSelect.disabled = true;
            addTeacherSelect.innerHTML = '<option value="">First select a subject code</option>';
        }
    };

    // Event listeners
    if (addTeacherBtn) {
        addTeacherBtn.addEventListener('click', openAddTeacherModal);
    }

    if (addTeacherModal) {
        addTeacherModal.addEventListener('click', function(e) {
            if (e.target === addTeacherModal) {
                closeAddTeacherModal();
            }
        });
    }

    if (cancelAddTeacherBtn) {
        cancelAddTeacherBtn.addEventListener('click', closeAddTeacherModal);
    }

    if (addTeacherSaveBtn) {
        addTeacherSaveBtn.addEventListener('click', function() {
            const selectedSubject = addTeacherSubjectSelect ? addTeacherSubjectSelect.value : '';
            const selectedTeacherId = addTeacherSelect ? addTeacherSelect.value : '';

            if (!selectedSubject || !selectedTeacherId) {
                alert('Please select both a subject code and a teacher');
                return;
            }

            // Check if this teacher-subject combination already exists
            const exists = classTeachers.some(t => 
                t.id === selectedTeacherId && t.subjectCode === selectedSubject
            );

            if (exists) {
                alert('This teacher is already assigned to this subject for this class.');
                return;
            }

            // Get teacher details
            const selectedOption = addTeacherSelect.options[addTeacherSelect.selectedIndex];
            const teacherName = selectedOption.getAttribute('data-teacher-name');
            const teacherDepartment = selectedOption.getAttribute('data-teacher-department');
            const subjectName = subjectNames[selectedSubject] || selectedSubject;

            // Add to classTeachers array
            const newTeacher = {
                id: selectedTeacherId,
                name: teacherName,
                subjectCode: selectedSubject,
                subjectName: subjectName,
                department: teacherDepartment
            };

            classTeachers.push(newTeacher);
            renderTeachersTable();
            closeAddTeacherModal();

            if (typeof showActionStatus === 'function') {
                showActionStatus('Teacher added to class successfully!', 'success');
            } else {
                alert('Teacher added to class successfully!');
            }
        });
    }
});
</script>