<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Exam';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Exam';
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

<!-- Edit Exam Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3>Edit: Mathematics Monthly Assessment</h3>
                <span class="exam-id">EX010</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Monthly</span>
                <span class="badge active-badge">Draft</span>
            </div>
        </div>
    </div>

    <!-- Core Exam Information (Editable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Exam Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Exam Name</label>
                        <input type="text" class="form-input" id="examName" value="Mathematics Monthly Assessment">
                    </div>
                    <div class="form-group">
                        <label>Exam ID</label>
                        <input type="text" class="form-input" id="examId" value="EX010" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Exam Type</label>
                        <select class="form-select" id="examType">
                            <option value="Tutorial">Tutorial (25)</option>
                            <option value="Monthly" selected>Monthly (100)</option>
                            <option value="Semester">Semester (100)</option>
                            <option value="Final">Final (100)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <select class="form-select" id="grade">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10" selected>Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-select" id="class">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Exam Schedule (Editable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-calendar-alt"></i> Exam Schedule</h4>
            <button class="simple-btn" onclick="addSubjectRow()"><i class="fas fa-plus"></i> Add Subject</button>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table" id="scheduleTable">
                    <thead>
                        <tr>
                            <th style="width:25%;">Subject</th>
                            <th style="width:15%;">Marks</th>
                            <th style="width:20%;">Date</th>
                            <th style="width:15%;">Start Time</th>
                            <th style="width:20%;">Room</th>
                            <th style="width:5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleBody">
                        <tr>
                            <td><input type="text" class="form-input" value="Mathematics"></td>
                            <td><input type="number" class="form-input" value="100"></td>
                            <td><input type="date" class="form-input" value="2025-01-20"></td>
                            <td><input type="time" class="form-input" value="09:00"></td>
                            <td><input type="text" class="form-input" value="Room 201"></td>
                            <td>
                                <button class="simple-btn-icon" onclick="removeRow(this)" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-input" value="Science"></td>
                            <td><input type="number" class="form-input" value="100"></td>
                            <td><input type="date" class="form-input" value="2025-01-22"></td>
                            <td><input type="time" class="form-input" value="10:30"></td>
                            <td><input type="text" class="form-input" value="Lab A"></td>
                            <td>
                                <button class="simple-btn-icon" onclick="removeRow(this)" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-input" value="English"></td>
                            <td><input type="number" class="form-input" value="100"></td>
                            <td><input type="date" class="form-input" value="2025-01-24"></td>
                            <td><input type="time" class="form-input" value="08:30"></td>
                            <td><input type="text" class="form-input" value="Room 105"></td>
                            <td>
                                <button class="simple-btn-icon" onclick="removeRow(this)" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="window.location.href='/admin/exam-database'">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="saveDraft()">
                    <i class="fas fa-save"></i> Save as Draft
                </button>
                <button class="simple-btn primary" onclick="saveAndActivate()">
                    <i class="fas fa-check"></i> Save & Activate
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function addSubjectRow() {
    const tbody = document.getElementById('scheduleBody');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="text" class="form-input" placeholder="Subject name"></td>
        <td><input type="number" class="form-input" value="100"></td>
        <td><input type="date" class="form-input"></td>
        <td><input type="time" class="form-input"></td>
        <td><input type="text" class="form-input" placeholder="Room"></td>
        <td>
            <button class="simple-btn-icon" onclick="removeRow(this)" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    tbody.appendChild(row);
}

function removeRow(btn) {
    showConfirmDialog({
        title: 'Remove Subject',
        message: 'Are you sure you want to remove this subject from the exam?',
        confirmText: 'Remove',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            btn.closest('tr').remove();
        }
    });
}

function saveDraft() {
    // Collect form data
    const examData = {
        id: document.getElementById('examId').value,
        name: document.getElementById('examName').value,
        type: document.getElementById('examType').value,
        grade: document.getElementById('grade').value,
        class: document.getElementById('class').value,
        status: 'draft',
        schedule: []
    };
    
    // Collect schedule data
    const rows = document.querySelectorAll('#scheduleBody tr');
    rows.forEach(row => {
        const inputs = row.querySelectorAll('input');
        examData.schedule.push({
            subject: inputs[0].value,
            marks: inputs[1].value,
            date: inputs[2].value,
            time: inputs[3].value,
            room: inputs[4].value
        });
    });
    
    console.log('Save draft:', examData);
    // Backend: POST /api/exams/{id} with status=draft
    
    alert('Exam saved as draft successfully!');
    window.location.href = '/admin/exam-database';
}

function saveAndActivate() {
    // Validate all fields
    const examName = document.getElementById('examName').value;
    if (!examName.trim()) {
        alert('Please enter exam name');
        return;
    }
    
    const rows = document.querySelectorAll('#scheduleBody tr');
    let valid = true;
    rows.forEach(row => {
        const inputs = row.querySelectorAll('input');
        if (!inputs[0].value || !inputs[2].value || !inputs[3].value) {
            valid = false;
        }
    });
    
    if (!valid) {
        alert('Please fill all required fields (Subject, Date, Time)');
        return;
    }
    
    // Collect and save with active status
    const examData = {
        id: document.getElementById('examId').value,
        name: document.getElementById('examName').value,
        type: document.getElementById('examType').value,
        grade: document.getElementById('grade').value,
        class: document.getElementById('class').value,
        status: 'active',
        schedule: []
    };
    
    rows.forEach(row => {
        const inputs = row.querySelectorAll('input');
        examData.schedule.push({
            subject: inputs[0].value,
            marks: inputs[1].value,
            date: inputs[2].value,
            time: inputs[3].value,
            room: inputs[4].value
        });
    });
    
    console.log('Save and activate:', examData);
    // Backend: POST /api/exams/{id} with status=active
    
    alert('Exam saved and activated successfully!');
    window.location.href = '/admin/exam-database';
}

// Auto-update marks when exam type changes
document.getElementById('examType').addEventListener('change', function() {
    const marks = this.value === 'Tutorial' ? 25 : 100;
    document.querySelectorAll('#scheduleBody input[type="number"]').forEach(input => {
        input.value = marks;
    });
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

