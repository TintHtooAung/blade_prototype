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

$defaultAssignedClasses = [
    'MATH' => [
        ['id' => '1A', 'name' => 'Class 1A', 'grade' => 'Grade 1', 'teacher' => 'Mr. John Smith', 'room' => 'Room 101'],
        ['id' => '1B', 'name' => 'Class 1B', 'grade' => 'Grade 1', 'teacher' => 'Mr. David Chen', 'room' => 'Room 102']
    ],
    'ENG' => [
        ['id' => '1A', 'name' => 'Class 1A', 'grade' => 'Grade 1', 'teacher' => 'Ms. Sarah Johnson', 'room' => 'Room 101'],
        ['id' => '2A', 'name' => 'Class 2A', 'grade' => 'Grade 2', 'teacher' => 'Ms. Jennifer Lee', 'room' => 'Room 201']
    ],
    'SCI' => [
        ['id' => '2B', 'name' => 'Class 2B', 'grade' => 'Grade 2', 'teacher' => 'Mr. David Lee', 'room' => 'Room 202'],
        ['id' => '3A', 'name' => 'Class 3A', 'grade' => 'Grade 3', 'teacher' => 'Ms. Emily Chen', 'room' => 'Room 301']
    ],
    'ART' => [
        ['id' => '4A', 'name' => 'Class 4A', 'grade' => 'Grade 4', 'teacher' => 'Ms. Alicia Gomez', 'room' => 'Art Studio 1']
    ]
];

$allClassOptions = [
    ['id' => '1A', 'name' => 'Class 1A', 'grade' => 'Grade 1', 'room' => 'Room 101'],
    ['id' => '1B', 'name' => 'Class 1B', 'grade' => 'Grade 1', 'room' => 'Room 102'],
    ['id' => '1C', 'name' => 'Class 1C', 'grade' => 'Grade 1', 'room' => 'Room 103'],
    ['id' => '2A', 'name' => 'Class 2A', 'grade' => 'Grade 2', 'room' => 'Room 201'],
    ['id' => '2B', 'name' => 'Class 2B', 'grade' => 'Grade 2', 'room' => 'Room 202'],
    ['id' => '3A', 'name' => 'Class 3A', 'grade' => 'Grade 3', 'room' => 'Room 301'],
    ['id' => '3B', 'name' => 'Class 3B', 'grade' => 'Grade 3', 'room' => 'Room 302'],
    ['id' => '4A', 'name' => 'Class 4A', 'grade' => 'Grade 4', 'room' => 'Room 401'],
    ['id' => '5A', 'name' => 'Class 5A', 'grade' => 'Grade 5', 'room' => 'Room 501']
];

$teacherDirectory = [
    'MATH' => ['Mr. John Smith', 'Mr. David Chen', 'Ms. Alicia Gomez', 'Mr. Brian Turner'],
    'ENG'  => ['Ms. Sarah Johnson', 'Ms. Jennifer Lee', 'Mr. Michael Carter', 'Ms. Olivia Park'],
    'SCI'  => ['Ms. Emily Chen', 'Mr. David Lee', 'Dr. Helen Murray', 'Ms. Priya Patel'],
    'ART'  => ['Ms. Alicia Gomez', 'Mr. Robert Kim', 'Ms. Claire Young'],
    'default' => ['Mr. John Smith', 'Ms. Sarah Johnson', 'Mr. David Lee', 'Ms. Emily Chen']
];

$allTeacherOptions = [
    ['id' => 'T001', 'name' => 'Mr. John Smith', 'department' => 'Mathematics', 'email' => 'john.smith@novahub.edu', 'phone' => '+1-555-0101', 'status' => 'Active'],
    ['id' => 'T002', 'name' => 'Ms. Sarah Johnson', 'department' => 'Languages', 'email' => 'sarah.johnson@novahub.edu', 'phone' => '+1-555-0102', 'status' => 'Active'],
    ['id' => 'T003', 'name' => 'Mr. David Chen', 'department' => 'Mathematics', 'email' => 'david.chen@novahub.edu', 'phone' => '+1-555-0103', 'status' => 'Active'],
    ['id' => 'T004', 'name' => 'Ms. Jennifer Lee', 'department' => 'Languages', 'email' => 'jennifer.lee@novahub.edu', 'phone' => '+1-555-0104', 'status' => 'Active'],
    ['id' => 'T005', 'name' => 'Ms. Emily Chen', 'department' => 'Science', 'email' => 'emily.chen@novahub.edu', 'phone' => '+1-555-0105', 'status' => 'Active'],
    ['id' => 'T006', 'name' => 'Mr. David Lee', 'department' => 'Science', 'email' => 'david.lee@novahub.edu', 'phone' => '+1-555-0106', 'status' => 'Active'],
    ['id' => 'T007', 'name' => 'Dr. Helen Murray', 'department' => 'Science', 'email' => 'helen.murray@novahub.edu', 'phone' => '+1-555-0107', 'status' => 'Active'],
    ['id' => 'T008', 'name' => 'Ms. Priya Patel', 'department' => 'Science', 'email' => 'priya.patel@novahub.edu', 'phone' => '+1-555-0108', 'status' => 'Active'],
    ['id' => 'T009', 'name' => 'Mr. Robert Kim', 'department' => 'Arts', 'email' => 'robert.kim@novahub.edu', 'phone' => '+1-555-0109', 'status' => 'Active'],
    ['id' => 'T010', 'name' => 'Ms. Alicia Gomez', 'department' => 'Arts', 'email' => 'alicia.gomez@novahub.edu', 'phone' => '+1-555-0110', 'status' => 'Active'],
    ['id' => 'T011', 'name' => 'Mr. Brian Turner', 'department' => 'Mathematics', 'email' => 'brian.turner@novahub.edu', 'phone' => '+1-555-0111', 'status' => 'Active'],
    ['id' => 'T012', 'name' => 'Ms. Claire Young', 'department' => 'Arts', 'email' => 'claire.young@novahub.edu', 'phone' => '+1-555-0112', 'status' => 'Active'],
    ['id' => 'T013', 'name' => 'Mr. Michael Carter', 'department' => 'Languages', 'email' => 'michael.carter@novahub.edu', 'phone' => '+1-555-0113', 'status' => 'Active'],
    ['id' => 'T014', 'name' => 'Ms. Olivia Park', 'department' => 'Languages', 'email' => 'olivia.park@novahub.edu', 'phone' => '+1-555-0114', 'status' => 'Active']
];

$defaultSubjectTeachers = [
    'MATH' => [
        ['id' => 'T001', 'name' => 'Mr. John Smith', 'department' => 'Mathematics', 'email' => 'john.smith@novahub.edu', 'phone' => '+1-555-0101', 'status' => 'Active'],
        ['id' => 'T003', 'name' => 'Mr. David Chen', 'department' => 'Mathematics', 'email' => 'david.chen@novahub.edu', 'phone' => '+1-555-0103', 'status' => 'Active']
    ],
    'ENG' => [
        ['id' => 'T002', 'name' => 'Ms. Sarah Johnson', 'department' => 'Languages', 'email' => 'sarah.johnson@novahub.edu', 'phone' => '+1-555-0102', 'status' => 'Active'],
        ['id' => 'T004', 'name' => 'Ms. Jennifer Lee', 'department' => 'Languages', 'email' => 'jennifer.lee@novahub.edu', 'phone' => '+1-555-0104', 'status' => 'Active']
    ],
    'SCI' => [
        ['id' => 'T005', 'name' => 'Ms. Emily Chen', 'department' => 'Science', 'email' => 'emily.chen@novahub.edu', 'phone' => '+1-555-0105', 'status' => 'Active'],
        ['id' => 'T006', 'name' => 'Mr. David Lee', 'department' => 'Science', 'email' => 'david.lee@novahub.edu', 'phone' => '+1-555-0106', 'status' => 'Active']
    ],
    'ART' => [
        ['id' => 'T009', 'name' => 'Mr. Robert Kim', 'department' => 'Arts', 'email' => 'robert.kim@novahub.edu', 'phone' => '+1-555-0109', 'status' => 'Active'],
        ['id' => 'T010', 'name' => 'Ms. Alicia Gomez', 'department' => 'Arts', 'email' => 'alicia.gomez@novahub.edu', 'phone' => '+1-555-0110', 'status' => 'Active']
    ]
];

$assignedClasses = $defaultAssignedClasses[$subjectCode] ?? $defaultAssignedClasses['MATH'];
$assignedTeachers = $defaultSubjectTeachers[$subjectCode] ?? $defaultSubjectTeachers['MATH'];
$teacherOptions = $teacherDirectory[$subjectCode] ?? $teacherDirectory['default'];
$uniqueTeachersCount = count($assignedTeachers);
$assignedClassesCount = count($assignedClasses);

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

<!-- Assign Teacher Modal -->
<div id="assignTeacherModal" class="simple-modal-overlay" style="display:none;">
    <div class="simple-modal-content" style="max-width: 520px;">
        <div class="simple-modal-header">
            <h3><i class="fas fa-user-plus"></i> Assign Teacher</h3>
            <button class="simple-modal-close" onclick="closeAssignTeacherModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-modal-body">
            <div class="form-section" style="padding:0;">
                <div class="form-group">
                    <label for="assignSubjectTeacherSelect">Select Teacher</label>
                    <select id="assignSubjectTeacherSelect" class="form-select">
                        <option value="">Select teacher</option>
                    </select>
                </div>
                <div class="info-hint" style="background:#f3f4f6; border-radius:8px; padding:12px; font-size:0.9rem; color:#4b5563;">
                    <i class="fas fa-info-circle" style="margin-right:8px; color:#2563eb;"></i>
                    Assigned teachers will appear across schedules and grading dashboards for this subject.
                </div>
            </div>
        </div>
        <div class="simple-modal-actions">
            <button class="simple-btn secondary" id="cancelAssignTeacherBtn">Cancel</button>
            <button id="assignTeacherSaveBtn" class="simple-btn primary">
                <i class="fas fa-check"></i> Assign Teacher
            </button>
        </div>
    </div>
</div>

<!-- Subject Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($subjectCode); ?> - <?php echo htmlspecialchars($subjectName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge core" id="subjectCategoryBadge" style="background-color: #fef3c7; color: #92400e; border: 1px solid #f59e0b;">
                    Core Subject
                </span>
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
        'value' => $uniqueTeachersCount,
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Classes Assigned',
        'value' => $assignedClassesCount,
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
</div>

<!-- Edit Subject Modal -->
<div id="editSubjectModal" class="simple-modal-overlay" style="display:none;">
    <div class="simple-modal-content" style="max-width: 600px;">
        <div class="simple-modal-header">
            <h3><i class="fas fa-edit"></i> Edit Subject</h3>
            <button class="simple-modal-close" onclick="closeEditSubjectModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-modal-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalSubjectCode">Subject Code</label>
                        <input type="text" id="modalSubjectCode" class="form-input">
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label for="modalSubjectName">Subject Name</label>
                        <input type="text" id="modalSubjectName" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalSubjectCategory">Category</label>
                        <select id="modalSubjectCategory" class="form-select">
                            <option value="Core">Core</option>
                            <option value="Elective">Elective</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalSubjectGrade">Grade</label>
                        <input type="text" id="modalSubjectGrade" class="form-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="simple-modal-actions">
            <button class="simple-btn secondary" onclick="closeEditSubjectModal()">Cancel</button>
            <button id="saveEditSubjectModal" class="simple-btn primary"><i class="fas fa-check"></i> Update Subject</button>
        </div>
    </div>
</div>

<!-- Subject Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subject Information</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Subject Name</td>
                    <td><span id="subjectNameValue"><?php echo htmlspecialchars($subjectName); ?></span></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Category</td>
                    <td><span id="subjectCategoryValue">Core Subject</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Teachers Assigned to Subject -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Teachers Assigned to <?php echo htmlspecialchars($subjectName); ?></h3>
        <div class="section-actions">
            <button class="add-btn" id="assignTeacherBtn">
                <i class="fas fa-user-plus"></i>
                Assign Teacher
            </button>
        </div>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th style="width:120px;">Actions</th>
                </tr>
            </thead>
            <tbody id="subjectTeachersTableBody">
                <?php if (empty($assignedTeachers)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center; color:#6b7280;">No teachers assigned yet.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($assignedTeachers as $teacher): ?>
                        <tr data-teacher-id="<?php echo htmlspecialchars($teacher['id']); ?>">
                            <td>
                                <a href="<?php echo $portalPrefix; ?>/teacher-profile/<?php echo htmlspecialchars($teacher['id']); ?>" class="grade-link" style="font-weight:600; color:#007AFF;">
                                    <?php echo htmlspecialchars($teacher['name']); ?>
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($teacher['department']); ?></td>
                            <td><?php echo htmlspecialchars($teacher['email']); ?></td>
                            <td><?php echo htmlspecialchars($teacher['phone']); ?></td>
                            <td>
                                <span class="status-badge active"><?php echo htmlspecialchars($teacher['status']); ?></span>
                            </td>
                            <td>
                                <button class="icon-btn delete-icon" data-remove-teacher="<?php echo htmlspecialchars($teacher['id']); ?>" title="Remove teacher">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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
const subjectData = <?php echo json_encode([
    'code' => $subjectCode,
    'name' => $subjectName,
    'category' => 'Core',
    'grade' => 'Grade 1'
]); ?>;
const portalPrefix = <?php echo json_encode($portalPrefix); ?>;
let assignedClasses = <?php echo json_encode($assignedClasses); ?>;
let assignedTeachers = <?php echo json_encode($assignedTeachers); ?>;
const availableClasses = <?php echo json_encode($allClassOptions); ?>;
const teacherOptions = <?php echo json_encode($teacherOptions); ?>;
const availableTeacherOptions = <?php echo json_encode($allTeacherOptions); ?>;

document.addEventListener('DOMContentLoaded', function(){
    const editSubjectBtn = document.getElementById('editSubjectBtn');
    const editSubjectModal = document.getElementById('editSubjectModal');
    const modalSubjectCode = document.getElementById('modalSubjectCode');
    const modalSubjectName = document.getElementById('modalSubjectName');
    const modalSubjectCategory = document.getElementById('modalSubjectCategory');
    const modalSubjectGrade = document.getElementById('modalSubjectGrade');
    const subjectNameHeading = document.querySelector('.batch-info h1');
    const subjectCategoryBadge = document.getElementById('subjectCategoryBadge');
    const subjectNameValue = document.getElementById('subjectNameValue');
    const subjectCategoryValue = document.getElementById('subjectCategoryValue');
    const saveEditSubjectBtn = document.getElementById('saveEditSubjectModal');
    
    function fillSubjectModal() {
        modalSubjectCode.value = subjectData.code;
        modalSubjectName.value = subjectData.name;
        modalSubjectCategory.value = subjectData.category;
        modalSubjectGrade.value = subjectData.grade;
    }
    
    function updateSubjectBadge() {
        if (!subjectCategoryBadge) return;
        subjectCategoryBadge.textContent = `${subjectData.category} Subject`;
    }
    
    function openEditSubjectModal() {
        fillSubjectModal();
        editSubjectModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    window.closeEditSubjectModal = function() {
        editSubjectModal.style.display = 'none';
        document.body.style.overflow = '';
    };
    
    editSubjectModal.addEventListener('click', function(e) {
        if (e.target === editSubjectModal) {
            closeEditSubjectModal();
        }
    });
    
    editSubjectBtn.addEventListener('click', openEditSubjectModal);
    
    saveEditSubjectBtn.addEventListener('click', function() {
        const newCode = modalSubjectCode.value.trim();
        const newName = modalSubjectName.value.trim();
        const newCategory = modalSubjectCategory.value.trim();
        const newGrade = modalSubjectGrade.value.trim();
        
        if (!newCode || !newName || !newCategory || !newGrade) {
            alert('Please fill in all fields');
            return;
        }
        
        subjectData.code = newCode;
        subjectData.name = newName;
        subjectData.category = newCategory;
        subjectData.grade = newGrade;
        
        if (subjectNameHeading) subjectNameHeading.textContent = `${subjectData.code} - ${subjectData.name}`;
        if (subjectNameValue) subjectNameValue.textContent = subjectData.name;
        if (subjectCategoryValue) subjectCategoryValue.textContent = `${subjectData.category} Subject`;
        updateSubjectBadge();
        
        closeEditSubjectModal();
        showActionStatus('Subject updated successfully!', 'success');
    });
    
    updateSubjectBadge();
    
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

    function refreshAssignmentStats() {
        const teachersStat = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-number');
        const classesStat = document.querySelector('.detail-stats-grid .stat-card:nth-child(3) .stat-number');
        const teacherCount = assignedTeachers ? assignedTeachers.length : 0;
        const classCount = assignedClasses.length;
        if (teachersStat) teachersStat.textContent = teacherCount;
        if (classesStat) classesStat.textContent = classCount;
    }

    // Teacher assignment functionality
    const assignTeacherBtn = document.getElementById('assignTeacherBtn');
    const assignTeacherModal = document.getElementById('assignTeacherModal');
    const assignSubjectTeacherSelect = document.getElementById('assignSubjectTeacherSelect');
    const assignTeacherSaveBtn = document.getElementById('assignTeacherSaveBtn');
    const cancelAssignTeacherBtn = document.getElementById('cancelAssignTeacherBtn');
    const teachersTableBody = document.getElementById('subjectTeachersTableBody');

    function getUnassignedTeachers() {
        const assignedIds = assignedTeachers.map(teacher => teacher.id);
        return availableTeacherOptions.filter(teacher => !assignedIds.includes(teacher.id));
    }

    function populateAssignTeacherOptions() {
        if (!assignSubjectTeacherSelect) return;
        assignSubjectTeacherSelect.innerHTML = '<option value="">Select teacher</option>';
        const unassigned = getUnassignedTeachers();
        unassigned.forEach(teacher => {
            const option = document.createElement('option');
            option.value = teacher.id;
            option.textContent = `${teacher.name} · ${teacher.department}`;
            assignSubjectTeacherSelect.appendChild(option);
        });
        if (!unassigned.length) {
            const option = document.createElement('option');
            option.value = '';
            option.disabled = true;
            option.textContent = 'All available teachers are already assigned';
            assignSubjectTeacherSelect.appendChild(option);
        }
    }

    function renderAssignedTeachersRows() {
        if (!teachersTableBody) return;
        teachersTableBody.innerHTML = '';

        if (!assignedTeachers.length) {
            const row = document.createElement('tr');
            const cell = document.createElement('td');
            cell.colSpan = 6;
            cell.textContent = 'No teachers assigned yet.';
            cell.style.textAlign = 'center';
            cell.style.color = '#6b7280';
            row.appendChild(cell);
            teachersTableBody.appendChild(row);
            return;
        }

        assignedTeachers.forEach(teacher => {
            const row = document.createElement('tr');
            row.setAttribute('data-teacher-id', teacher.id);
            row.innerHTML = `
                <td>
                    <a href="${portalPrefix}/teacher-profile/${teacher.id}" class="grade-link" style="font-weight:600; color:#007AFF;">
                        ${teacher.name}
                    </a>
                </td>
                <td>${teacher.department}</td>
                <td>${teacher.email}</td>
                <td>${teacher.phone}</td>
                <td>
                    <span class="status-badge active">${teacher.status || 'Active'}</span>
                </td>
                <td>
                    <button class="icon-btn delete-icon" data-remove-teacher="${teacher.id}" title="Remove teacher">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            const removeBtn = row.querySelector('[data-remove-teacher]');
            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    confirmRemoveTeacher(teacher.id);
                });
            }
            teachersTableBody.appendChild(row);
        });
    }

    function confirmRemoveTeacher(teacherId) {
        const teacher = assignedTeachers.find(item => item.id === teacherId);
        if (!teacher) return;

        showConfirmDialog({
            title: 'Remove Teacher',
            message: `Remove ${teacher.name} from ${subjectData.name}?`,
            confirmText: 'Remove',
            confirmIcon: 'fas fa-user-minus',
            onConfirm: function() {
                assignedTeachers = assignedTeachers.filter(item => item.id !== teacherId);
                renderAssignedTeachersRows();
                refreshAssignmentStats();
                showActionStatus(`${teacher.name} removed from subject successfully!`, 'success');
            }
        });
    }

    function openAssignTeacherModal() {
        populateAssignTeacherOptions();
        if (assignTeacherModal) {
            assignTeacherModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeAssignTeacherModal() {
        if (assignTeacherModal) {
            assignTeacherModal.style.display = 'none';
            document.body.style.overflow = '';
        }
        if (assignSubjectTeacherSelect) assignSubjectTeacherSelect.value = '';
    }

    window.closeAssignTeacherModal = closeAssignTeacherModal;

    if (assignTeacherBtn) {
        assignTeacherBtn.addEventListener('click', openAssignTeacherModal);
    }

    if (assignTeacherModal) {
        assignTeacherModal.addEventListener('click', function(e) {
            if (e.target === assignTeacherModal) {
                closeAssignTeacherModal();
            }
        });
    }

    if (cancelAssignTeacherBtn) {
        cancelAssignTeacherBtn.addEventListener('click', function() {
            closeAssignTeacherModal();
        });
    }

    if (assignTeacherSaveBtn) {
        assignTeacherSaveBtn.addEventListener('click', function() {
            const selectedTeacherId = assignSubjectTeacherSelect ? assignSubjectTeacherSelect.value : '';

            if (!selectedTeacherId) {
                alert('Please select a teacher to assign.');
                return;
            }

            if (assignedTeachers.some(teacher => teacher.id === selectedTeacherId)) {
                alert('This teacher is already assigned to the subject.');
                return;
            }

            const teacherMeta = availableTeacherOptions.find(teacher => teacher.id === selectedTeacherId);
            if (!teacherMeta) {
                alert('Unable to locate selected teacher.');
                return;
            }

            assignedTeachers.push(teacherMeta);
            renderAssignedTeachersRows();
            refreshAssignmentStats();
            closeAssignTeacherModal();
            if (typeof showActionStatus === 'function') {
                showActionStatus('Teacher assigned to subject successfully!', 'success');
            }
        });
    }

    refreshAssignmentStats();
    renderAssignedClassesRows();
    renderAssignedTeachersRows();
});
</script>

<style>
/* Simple Modal Styles */
.simple-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 0.2s ease;
}

.simple-modal-content {
    background: #ffffff;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    max-height: 90vh;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    animation: slideUp 0.3s ease;
    overflow: hidden;
}

.simple-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid #e0e7ff;
}

.simple-modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1d1d1f;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.simple-modal-header h3 i {
    color: #4A90E2;
}

.simple-modal-close {
    background: none;
    border: none;
    font-size: 1.25rem;
    color: #86868b;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.simple-modal-close:hover {
    background: #f8fafc;
    color: #1d1d1f;
}

.simple-modal-body {
    padding: 1.5rem;
    overflow-y: auto;
    flex: 1;
}

.simple-modal-body .form-group {
    margin-bottom: 1.25rem;
}

.simple-modal-body .form-group:last-child {
    margin-bottom: 0;
}

.simple-modal-body .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #1d1d1f;
    font-size: 0.9rem;
}

.simple-modal-body .form-group .form-input,
.simple-modal-body .form-group .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1d1d1f;
    transition: all 0.2s ease;
}

.simple-modal-body .form-group .form-input:focus,
.simple-modal-body .form-group .form-select:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.simple-modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    padding: 1.5rem;
    border-top: 1px solid #e0e7ff;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.simple-btn.secondary.danger {
    background: #fee2e2;
    border: 1px solid #fecaca;
    color: #b91c1c;
}

.simple-btn.secondary.danger:hover {
    background: #fecaca;
    color: #7f1d1d;
}

.simple-btn.small {
    padding: 0.35rem 0.75rem;
    font-size: 0.85rem;
}

/* Delete Icon Button */
.icon-btn.delete-icon {
    background: none;
    border: none;
    color: #d32f2f;
    cursor: pointer;
    padding: 8px;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.icon-btn.delete-icon:hover {
    background: #ffebee;
    color: #b71c1c;
    transform: scale(1.1);
}
</style>
