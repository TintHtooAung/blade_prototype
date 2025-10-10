<?php
$pageTitle = 'Smart Campus Nova Hub - Create Exam Scheduler';
$pageIcon = 'fas fa-calendar-plus';
$pageHeading = 'Create Exam (Scheduler)';
$activePage = 'exam-database';

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

<!-- Exam Management -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Exam Management</h3>
        <div class="simple-actions">
            <button id="toggleExamForm" class="simple-btn"><i class="fas fa-plus"></i> Create Draft Exam</button>
            <button id="activateAll" class="simple-btn secondary"><i class="fas fa-bolt"></i> Activate All Draft Exams</button>
                </div>
            </div>

    <!-- Inline Scheduler (hidden by default) -->
    <div id="examForm" class="preview-card" style="display:none;">
        <div class="preview-header">
            <div class="preview-title"><i class="fas fa-calendar-plus"></i> Configure Exam</div>
                </div>
        <div class="preview-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="examName">Exam Name</label>
                        <input type="text" id="examName" class="form-input" placeholder="Enter exam name">
                    </div>
                    <div class="form-group">
                        <label for="examId">Exam ID</label>
                        <input type="text" id="examId" class="form-input" placeholder="e.g., EX011">
                    </div>
                    <div class="form-group">
                        <label for="examType">Exam Type</label>
                        <select id="examType" class="filter-select">
                            <option value="tutorial">Tutorial (25)</option>
                            <option value="monthly">Monthly (100)</option>
                            <option value="semester">Semester (100)</option>
                            <option value="final">Final (100)</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <select id="grade" class="filter-select">
                            <option>Grade 7</option>
                            <option>Grade 8</option>
                            <option>Grade 9</option>
                            <option>Grade 10</option>
                            <option>Grade 11</option>
                            <option>Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <select id="class" class="filter-select">
                            <option>Class A</option>
                            <option>Class B</option>
                            <option>Class C</option>
                            <option>Class D</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Subjects auto-loaded from Grade/Class -->
            <div class="simple-table-container" style="margin-top:12px;">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Subject</th>
                            <th style="width: 15%;">Marks</th>
                            <th style="width: 20%;">Date</th>
                            <th style="width: 20%;">Start Time</th>
                            <th style="width: 15%;">Room</th>
                        </tr>
                    </thead>
                    <tbody id="subjectRows"></tbody>
                </table>
            </div>
                </div>
        <div class="form-actions">
            <button id="cancelExam" class="simple-btn secondary"><i class="fas fa-times"></i> Cancel</button>
            <button id="saveSchedule" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                </div>
            </div>

    <!-- Scheduled Exams List -->
    <div class="simple-header" style="margin-top:16px;">
        <h4>Scheduled Exams</h4>
            </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Type</th>
                    <th>Grade</th>
                    <th>Class</th>
                    <th>Subjects</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="scheduledTbody">
                <tr>
                    <td><strong>EX011</strong></td>
                    <td>Sample Scheduled Exam</td>
                    <td>Monthly</td>
                    <td>Grade 10</td>
                    <td>Class A</td>
                    <td>Multiple</td>
                    <td><span class="status-badge draft">Draft</span></td>
                    <td>
                        <button class="simple-btn-icon edit-exam" title="Edit"><i class="fas fa-edit"></i></button>
                        <button class="simple-btn-icon" title="Delete" onclick="this.closest('tr').remove();"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="activationNote" class="muted" style="margin-top:8px; display:none;">All draft exams have been activated. They will appear under Active Exams in the Exam Database.</div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const examForm = document.getElementById('examForm');
    const toggleFormBtn = document.getElementById('toggleExamForm');
    const cancelBtn = document.getElementById('cancelExam');
    const rowsBody = document.getElementById('subjectRows');
    const saveBtn = document.getElementById('saveSchedule');
    const scheduledTbody = document.getElementById('scheduledTbody');
    const activateAllBtn = document.getElementById('activateAll');
    const activationNote = document.getElementById('activationNote');
    const gradeSelect = document.getElementById('grade');
    const classSelect = document.getElementById('class');

    let editingRow = null;

    // Subject mapping by grade and class
    const subjectsByGradeClass = {
        'Grade 7': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography'],
        'Grade 8': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics'],
        'Grade 9': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics', 'Chemistry'],
        'Grade 10': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics', 'Chemistry', 'Biology'],
        'Grade 11': ['Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'Economics'],
        'Grade 12': ['Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'Economics', 'Computer Science']
    };

    function loadSubjects() {
        const grade = gradeSelect.value;
        const subjects = subjectsByGradeClass[grade] || [];
        rowsBody.innerHTML = '';
        
        subjects.forEach(subject => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${subject}</strong></td>
                <td><input type="number" class="form-input" value="100"></td>
                <td><input type="date" class="form-input"></td>
                <td><input type="time" class="form-input"></td>
                <td><input type="text" class="form-input" placeholder="Room"></td>
            `;
            rowsBody.appendChild(tr);
        });
    }

    function bindRowActions(tr) {
        const editBtn = tr.querySelector('.edit-exam');
        if (editBtn) {
            editBtn.addEventListener('click', function(e) {
                e.preventDefault();
                editingRow = tr;
                document.getElementById('examId').value = tr.children[0].innerText.trim();
                document.getElementById('examName').value = tr.children[1].innerText.trim();
                const typeText = tr.children[2].innerText.trim().toLowerCase();
                document.getElementById('examType').value = (['tutorial','monthly','semester','final'].includes(typeText) ? typeText : 'monthly');
                document.getElementById('grade').value = tr.children[3].innerText.trim();
                document.getElementById('class').value = tr.children[4].innerText.trim();
                examForm.style.display = 'block';
                loadSubjects();
            });
        }
    }

    Array.from(scheduledTbody.querySelectorAll('tr')).forEach(bindRowActions);

    // Load subjects when grade or class changes
    gradeSelect.addEventListener('change', loadSubjects);
    classSelect.addEventListener('change', loadSubjects);

    toggleFormBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const willShow = examForm.style.display === 'none';
        examForm.style.display = willShow ? 'block' : 'none';
        if (willShow) loadSubjects();
        if (!willShow) editingRow = null;
    });

    cancelBtn.addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('examName').value = '';
        document.getElementById('examId').value = '';
        document.getElementById('examType').value = 'tutorial';
        document.getElementById('grade').value = 'Grade 7';
        document.getElementById('class').value = 'Class A';
        rowsBody.innerHTML = '';
        examForm.style.display = 'none';
        editingRow = null;
    });

    saveBtn.addEventListener('click', function(e){
        e.preventDefault();
        const examName = document.getElementById('examName').value.trim();
        const examId = document.getElementById('examId').value.trim();
        const examType = document.getElementById('examType').value;
        const grade = document.getElementById('grade').value;
        const klass = document.getElementById('class').value;
        if (!examName || !examId) { alert('Please provide Exam Name and Exam ID.'); return; }

        const subjectCount = rowsBody.children.length;

        if (editingRow) {
            editingRow.children[0].innerHTML = `<strong>${examId}</strong>`;
            editingRow.children[1].innerText = examName;
            editingRow.children[2].innerText = examType.charAt(0).toUpperCase() + examType.slice(1);
            editingRow.children[3].innerText = grade;
            editingRow.children[4].innerText = klass;
            editingRow.children[5].innerText = subjectCount > 1 ? 'Multiple' : 'Single';
        } else {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${examId}</strong></td>
                <td>${examName}</td>
                <td>${(examType.charAt(0).toUpperCase() + examType.slice(1))}</td>
                <td>${grade}</td>
                <td>${klass}</td>
                <td>${subjectCount > 1 ? 'Multiple' : 'Single'}</td>
                <td><span class="status-badge draft">Draft</span></td>
                <td>
                    <button class="simple-btn-icon edit-exam" title="Edit"><i class="fas fa-edit"></i></button>
                    <button class="simple-btn-icon" title="Delete" onclick="this.closest('tr').remove();"><i class="fas fa-trash"></i></button>
                </td>
            `;
            scheduledTbody.appendChild(tr);
            bindRowActions(tr);
        }

        document.getElementById('examName').value = '';
        document.getElementById('examId').value = '';
        rowsBody.innerHTML = '';
        examForm.style.display = 'none';
        editingRow = null;
        alert('Exam saved as draft!');
    });

    activateAllBtn.addEventListener('click', function(e){
        e.preventDefault();
        const rows = Array.from(scheduledTbody.querySelectorAll('tr'));
        let activated = 0;
        rows.forEach(tr => {
            const statusCell = tr.children[6];
            if (!statusCell) return;
            const badge = statusCell.querySelector('.status-badge');
            if (badge && badge.classList.contains('draft')) {
                badge.classList.remove('draft');
                badge.classList.add('paid');
                badge.textContent = 'Active';
                activated++;
            }
        });
        if (activated > 0) {
            activationNote.style.display = 'block';
            alert('All draft exams have been activated. They will appear in Active Exams.');
        } else {
            alert('No draft exams to activate.');
        }
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
