<?php
$pageTitle = 'Smart Campus Nova Hub - Create Exam Scheduler';
$pageIcon = 'fas fa-calendar-plus';
$pageHeading = 'Create Draft Exam';
$activePage = 'exams';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/exam-database" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Exam Database
    </a>
</div>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Create Exam Section -->
<div class="simple-section">
    <div class="simple-header" style="align-items: center;">
        <h3>Create New Exam</h3>
        <div style="display: flex; align-items: center; gap: 12px;">
            <select id="gradeSelect" class="form-select" style="min-width: 160px; height: 38px; background: #fff; border: 1px solid #ddd; padding: 8px 12px; font-size: 0.9rem;">
                <option value="">Select Grade</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
            <select id="classSelect" class="form-select" style="min-width: 160px; height: 38px; background: #fff; border: 1px solid #ddd; padding: 8px 12px; font-size: 0.9rem;">
                <option value="">Select Class</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                        </select>
            <button class="simple-btn" id="createExamBtn" style="white-space: nowrap;"><i class="fas fa-plus"></i> Create Draft Exam</button>
                    </div>
                </div>
            </div>

<!-- Draft Exams List -->
<div class="simple-section" style="margin-top:12px;">
    <div class="simple-header">
        <h4>Draft Exams</h4>
        <button id="activateAllBtn" class="simple-btn secondary"><i class="fas fa-bolt"></i> Activate All Drafts</button>
                        </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Grade/Class</th>
                    <th>Subjects</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="draftExamsList">
                <tr class="no-exams-row"><td colspan="6">No draft exams yet</td></tr>
            </tbody>
        </table>
                        </div>
                        </div>

<!-- Exams Container (Inline) -->
<div id="examsContainer"></div>

<style>
/* Inline Exam Form */
.exam-inline-form {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-top: 16px;
    overflow: hidden;
}

.exam-form-header {
    background: #f8f9fa;
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.exam-form-header h3 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
}

.exam-form-actions {
    display: flex;
    gap: 8px;
}

.exam-form-body {
    padding: 20px;
}
</style>

<script>
let examCounter = 1;

const subjectsByGrade = {
    'Grade 7': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography'],
    'Grade 8': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics'],
    'Grade 9': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics', 'Chemistry'],
    'Grade 10': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics', 'Chemistry', 'Biology'],
    'Grade 11': ['Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'Economics'],
    'Grade 12': ['Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'Economics', 'Computer Science']
};

document.getElementById('createExamBtn').addEventListener('click', function() {
    const grade = document.getElementById('gradeSelect').value;
    const classLetter = document.getElementById('classSelect').value;
    
    if (!grade || !classLetter) {
        alert('Please select both Grade and Class');
        return;
    }
    
    const className = `${grade}-${classLetter}`;
    createExamForm(grade, className);
    document.getElementById('gradeSelect').value = '';
    document.getElementById('classSelect').value = '';
});

function createExamForm(grade, className) {
    const examId = 'exam-' + Date.now();
    const container = document.getElementById('examsContainer');
    const subjects = subjectsByGrade[grade] || [];
    
    // Default marks: 25 for single subject (tutorial), 100 for multiple subjects
    const defaultMarks = subjects.length === 1 ? 25 : 100;
    
    const subjectRows = subjects.map(subject => `
        <tr>
            <td><strong>${subject}</strong></td>
            <td><input type="number" class="form-input marks-input" value="${defaultMarks}"></td>
            <td><input type="date" class="form-input"></td>
            <td><input type="time" class="form-input"></td>
            <td><input type="text" class="form-input" placeholder="Room"></td>
        </tr>
    `).join('');
    
    const formHTML = `
        <div class="exam-inline-form" id="${examId}">
            <div class="exam-form-header">
                <h3>${className}</h3>
                <div class="exam-form-actions">
                    <button class="simple-btn secondary" onclick="saveExam('${examId}')"><i class="fas fa-save"></i> Save Draft</button>
                    <button class="icon-btn" onclick="removeExamForm('${examId}')"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="exam-form-body">
                <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                            <label>Exam Name</label>
                            <input type="text" class="form-input" id="name-${examId}" placeholder="e.g., Mid-term Exam">
                        </div>
                        <div class="form-group">
                            <label>Exam ID</label>
                            <input type="text" class="form-input" id="id-${examId}" placeholder="e.g., EX${String(examCounter).padStart(3, '0')}" value="EX${String(examCounter).padStart(3, '0')}">
                    </div>
                    <div class="form-group">
                            <label>Exam Type</label>
                            <select class="form-select" id="type-${examId}" onchange="updateMarks('${examId}', this.value)">
                                <option value="Tutorial">Tutorial (25)</option>
                                <option value="Monthly">Monthly (100)</option>
                                <option value="Semester">Semester (100)</option>
                                <option value="Final">Final (100)</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="simple-table-container" style="margin-top:16px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th style="width:30%;">Subject</th>
                                <th style="width:15%;">Marks</th>
                                <th style="width:20%;">Date</th>
                                <th style="width:20%;">Start Time</th>
                                <th style="width:15%;">Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${subjectRows}
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
    `;
    
    container.insertAdjacentHTML('beforeend', formHTML);
    examCounter++;
    
    document.getElementById(examId).scrollIntoView({behavior: 'smooth'});
}

function updateMarks(examId, examType) {
    const form = document.getElementById(examId);
    const marksInputs = form.querySelectorAll('.marks-input');
    
    // Tutorial = 25 marks, others = 100 marks
    const newMarks = examType === 'Tutorial' ? 25 : 100;
    
    marksInputs.forEach(input => {
        input.value = newMarks;
    });
}

function saveExam(examId) {
    const form = document.getElementById(examId);
    const examName = document.getElementById(`name-${examId}`).value.trim();
    const examIdValue = document.getElementById(`id-${examId}`).value.trim();
    const examType = document.getElementById(`type-${examId}`).value;
    const gradeClass = form.querySelector('.exam-form-header h3').textContent.trim();
    
    if (!examName || !examIdValue) {
        alert('Please enter Exam Name and Exam ID');
        return;
    }
    
    const subjects = form.querySelectorAll('tbody tr').length;
    
    // Add to list
    const tbody = document.getElementById('draftExamsList');
    const noRow = tbody.querySelector('.no-exams-row');
    if (noRow) noRow.remove();
    
    const tr = document.createElement('tr');
    tr.dataset.examId = examId;
    tr.innerHTML = `
        <td><strong>${examIdValue}</strong></td>
        <td>${examName}</td>
        <td>${gradeClass}</td>
        <td>${subjects} subjects</td>
        <td><span class="status-badge draft">Draft</span></td>
        <td>
            <button class="simple-btn-icon" onclick="editExam('${examId}')" title="Edit"><i class="fas fa-edit"></i></button>
            <button class="simple-btn-icon" onclick="deleteExam('${examId}')" title="Delete"><i class="fas fa-trash"></i></button>
        </td>
    `;
    tbody.appendChild(tr);
    
    // Hide form
    form.style.display = 'none';
    alert('Exam saved as draft!');
}

function editExam(examId) {
    const form = document.getElementById(examId);
    if (form) {
        form.style.display = 'block';
        form.scrollIntoView({behavior: 'smooth'});
    }
}

function deleteExam(examId) {
    showConfirmDialog({
        title: 'Delete Exam',
        message: 'Are you sure you want to delete this exam? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            document.getElementById(examId)?.remove();
            document.querySelector(`tr[data-exam-id="${examId}"]`)?.remove();
            
            const tbody = document.getElementById('draftExamsList');
            if (!tbody.querySelector('tr')) {
                tbody.innerHTML = '<tr class="no-exams-row"><td colspan="6">No draft exams yet</td></tr>';
            }
        }
    });
}

function removeExamForm(examId) {
    showConfirmDialog({
        title: 'Discard Exam',
        message: 'Are you sure you want to discard this exam? All changes will be lost.',
        confirmText: 'Discard',
        confirmIcon: 'fas fa-times',
        onConfirm: () => {
            document.getElementById(examId)?.remove();
        }
    });
}

document.getElementById('activateAllBtn').addEventListener('click', function() {
    const rows = document.querySelectorAll('#draftExamsList tr:not(.no-exams-row)');
    let count = 0;
    
    rows.forEach(row => {
        const badge = row.querySelector('.status-badge');
        if (badge && badge.classList.contains('draft')) {
            badge.classList.remove('draft');
            badge.classList.add('paid');
            badge.textContent = 'Active';
            count++;
        }
    });
    
    if (count > 0) {
        alert(`${count} exam(s) activated successfully!`);
    } else {
        alert('No draft exams to activate');
    }
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
