<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Details';
$pageIcon = 'fas fa-clipboard-list';
$pageHeading = 'Exam Details';
$activePage = 'exam-database';

// Detect portal from URL to set appropriate routes
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$portalPrefix = strpos($currentUri, '/staff/') !== false ? '/staff' : '/admin';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="<?php echo $portalPrefix; ?>/exam-database" class="breadcrumb-link">
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

<!-- Exam Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="examTitle">Mathematics Monthly Assessment</h3>
                <span class="exam-id" id="examId">EX010</span>
            </div>
            <div class="exam-badges" id="examBadges">
                <span class="badge tutorial-badge" id="examType">Monthly</span>
                <span class="badge active-badge" id="examStatus">Active</span>
                <span class="badge grade-badge" id="examGrade">Grade 10</span>
                <span class="badge class-badge" id="examClass">Class A</span>
            </div>
        </div>
    </div>

    <!-- Core Exam Summary (aligned with creation fields) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Exam Summary</h4>
            <button class="simple-btn" onclick="editExam()"><i class="fas fa-edit"></i> Edit Exam</button>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Exam Name:</label>
                <span id="detailName">Mathematics Monthly Assessment</span>
            </div>
            <div class="detail-row">
                <label>Exam ID:</label>
                <span id="detailId">EX010</span>
            </div>
            <div class="detail-row">
                <label>Type:</label>
                <span id="detailType">Monthly (100 marks)</span>
            </div>
            <div class="detail-row">
                <label>Grade:</label>
                <span id="detailGrade">Grade 10</span>
            </div>
            <div class="detail-row">
                <label>Class:</label>
                <span id="detailClass">Class A</span>
            </div>
            <div class="detail-row">
                <label>Status:</label>
                <span id="detailStatus">Active</span>
            </div>
        </div>
    </div>

    <!-- Exam Schedule (matches create-exam table) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-calendar-alt"></i> Exam Schedule</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTableBody">
                        <tr>
                            <td>Mathematics</td>
                            <td>100</td>
                            <td>2025-01-20</td>
                            <td>09:00</td>
                            <td>Room 201</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Exam Results Table -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-bar"></i> Exam Results</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table responsive-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Math</th>
                            <th>Phys</th>
                            <th>Chem</th>
                            <th>Bio</th>
                            <th>Eng</th>
                            <th>Myan</th>
                            <th>Total</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody id="examResultsTable">
                        <!-- Exam results will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Edit Exam Modal -->
<div id="editExamModal" class="simple-modal-overlay" style="display:none;" onclick="if(event.target === this) closeEditExamModal();">
    <div class="simple-modal-content" style="max-width: 900px; max-height: 90vh; overflow-y: auto;" onclick="event.stopPropagation();">
        <div class="simple-modal-header">
            <h3><i class="fas fa-edit"></i> Edit Exam</h3>
            <button class="simple-modal-close" onclick="closeEditExamModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-modal-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label for="modalExamName">Exam Name</label>
                        <input type="text" id="modalExamName" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalExamId">Exam ID</label>
                        <input type="text" id="modalExamId" class="form-input" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalExamType">Exam Type</label>
                        <select id="modalExamType" class="form-select">
                            <option value="Tutorial">Tutorial (25)</option>
                            <option value="Monthly">Monthly (100)</option>
                            <option value="Semester">Semester (100)</option>
                            <option value="Final">Final (100)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modalGrade">Grade</label>
                        <select id="modalGrade" class="form-select">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modalClass">Class</label>
                        <select id="modalClass" class="form-select">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Exam Schedule Section -->
            <div style="margin-top: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 style="margin: 0; font-size: 1rem; font-weight: 600;"><i class="fas fa-calendar-alt"></i> Exam Schedule</h4>
                    <button class="simple-btn" onclick="addModalSubjectRow()" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                        <i class="fas fa-plus"></i> Add Subject
                    </button>
                </div>
                <div class="simple-table-container">
                    <table class="basic-table" id="modalScheduleTable">
                        <thead>
                            <tr>
                                <th style="width:22%;">Subject</th>
                                <th style="width:12%;">Marks</th>
                                <th style="width:15%;">Date</th>
                                <th style="width:13%;">Start Time</th>
                                <th style="width:13%;">End Time</th>
                                <th style="width:18%;">Room</th>
                                <th style="width:7%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="modalScheduleBody">
                            <!-- Schedule rows will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="simple-modal-actions">
            <button class="simple-btn secondary" onclick="closeEditExamModal()">Cancel</button>
            <button class="simple-btn" onclick="saveExamDraft()">
                <i class="fas fa-save"></i> Save as Draft
            </button>
            <button class="simple-btn primary" onclick="saveExamAndActivate()">
                <i class="fas fa-check"></i> Save & Activate
            </button>
        </div>
    </div>
</div>

<script>
// Portal prefix for navigation
const portalPrefix = '<?php echo $portalPrefix; ?>';

// Get exam ID from URL
const urlParams = new URLSearchParams(window.location.search);
const examId = urlParams.get('id');

// Current exam data (will be populated when loading)
let currentExamData = null;

// Sample exam data
const sampleExams = {
    'EX001': {
        id: 'EX001',
        name: 'Mathematics Tutorial 1',
        type: 'Tutorial',
        grade: 'Grade 9',
        class: 'A',
        status: 'Upcoming',
        subjects: ['Mathematics'],
        schedule: [
            { subject: 'Mathematics', marks: 25, date: '2025-01-15', startTime: '09:00', endTime: '10:00', room: 'Room 201' }
        ]
    },
    'EX002': {
        id: 'EX002',
        name: 'Mid-term Exam',
        type: 'Monthly',
        grade: 'Grade 10',
        class: 'B',
        status: 'Upcoming',
        subjects: ['Mathematics', 'Science', 'English', 'History', 'Geography', 'Physics'],
        schedule: [
            { subject: 'Mathematics', marks: 100, date: '2025-01-20', startTime: '09:00', endTime: '11:00', room: 'Room 201' },
            { subject: 'Science', marks: 100, date: '2025-01-22', startTime: '10:30', endTime: '12:30', room: 'Lab A' },
            { subject: 'English', marks: 100, date: '2025-01-24', startTime: '08:30', endTime: '10:30', room: 'Room 105' }
        ]
    },
    'EX003': {
        id: 'EX003',
        name: 'Science Tutorial',
        type: 'Tutorial',
        grade: 'Grade 9',
        class: 'B',
        status: 'Upcoming',
        subjects: ['Science'],
        schedule: [
            { subject: 'Science', marks: 25, date: '2025-01-18', startTime: '10:00', endTime: '11:00', room: 'Lab B' }
        ]
    },
    'EX008': {
        id: 'EX008',
        name: 'English Monthly Test',
        type: 'Monthly',
        grade: 'Grade 11',
        class: 'A',
        status: 'Active',
        subjects: ['English'],
        schedule: [
            { subject: 'English', marks: 100, date: '2025-01-25', startTime: '09:00', endTime: '11:00', room: 'Room 105' }
        ]
    },
    'EX010': {
        id: 'EX010',
        name: 'Mathematics Monthly Assessment',
        type: 'Monthly',
        grade: 'Grade 10',
        class: 'A',
        status: 'Active',
        subjects: ['Mathematics'],
        schedule: [
            { subject: 'Mathematics', marks: 100, date: '2025-01-20', startTime: '09:00', endTime: '11:00', room: 'Room 201' }
        ]
    }
};

function loadExamDetails() {
    if (!examId) {
        alert('Exam ID not found');
        window.location.href = `${portalPrefix}/exam-database`;
        return;
    }

    const exam = sampleExams[examId] || sampleExams['EX010'];
    
    // Store current exam data globally
    currentExamData = exam;
    
    if (!exam) {
        // Default to sample data if exam not found
        console.log('Exam not found, using default data');
        return;
    }

    // Update page content
    document.getElementById('examTitle').textContent = exam.name;
    document.getElementById('examId').textContent = exam.id;
    document.getElementById('examType').textContent = exam.type;
    document.getElementById('examStatus').textContent = exam.status;
    document.getElementById('examGrade').textContent = exam.grade;
    document.getElementById('examClass').textContent = 'Class ' + exam.class;
    
    document.getElementById('detailName').textContent = exam.name;
    document.getElementById('detailId').textContent = exam.id;
    document.getElementById('detailType').textContent = `${exam.type} (${exam.type === 'Tutorial' ? '25' : '100'} marks)`;
    document.getElementById('detailGrade').textContent = exam.grade;
    document.getElementById('detailClass').textContent = 'Class ' + exam.class;
    document.getElementById('detailStatus').textContent = exam.status;
    
    // Update status badge color
    const statusBadge = document.getElementById('examStatus');
    statusBadge.className = 'badge';
    if (exam.status === 'Upcoming') statusBadge.className += ' active-badge';
    if (exam.status === 'Active') statusBadge.className += ' tutorial-badge';
    if (exam.status === 'Completed') statusBadge.className += ' grade-badge';
    
    // Update schedule table
    if (exam.schedule && exam.schedule.length > 0) {
        const scheduleBody = document.getElementById('scheduleTableBody');
        scheduleBody.innerHTML = exam.schedule.map(item => `
            <tr>
                <td>${item.subject}</td>
                <td>${item.marks}</td>
                <td>${item.date}</td>
                <td>${item.startTime}</td>
                <td>${item.room}</td>
            </tr>
        `).join('');
    }
    
    // Load exam results
    loadExamResults(examId);
}

function editExam() {
    if (!currentExamData) {
        showToast('Exam data not loaded', 'error');
        return;
    }
    
    // Populate modal with current exam data
    document.getElementById('modalExamName').value = currentExamData.name;
    document.getElementById('modalExamId').value = currentExamData.id;
    document.getElementById('modalExamType').value = currentExamData.type;
    document.getElementById('modalGrade').value = currentExamData.grade;
    document.getElementById('modalClass').value = currentExamData.class;
    
    // Populate schedule table
    const modalScheduleBody = document.getElementById('modalScheduleBody');
    if (currentExamData.schedule && currentExamData.schedule.length > 0) {
        modalScheduleBody.innerHTML = currentExamData.schedule.map(item => `
            <tr>
                <td><input type="text" class="form-input" value="${item.subject}"></td>
                <td><input type="number" class="form-input" value="${item.marks}"></td>
                <td><input type="date" class="form-input" value="${item.date}"></td>
                <td><input type="time" class="form-input" value="${item.startTime}"></td>
                <td><input type="time" class="form-input" value="${item.endTime || ''}"></td>
                <td><input type="text" class="form-input" value="${item.room}"></td>
                <td>
                    <button class="simple-btn-icon" onclick="removeModalRow(this)" title="Remove">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    } else {
        modalScheduleBody.innerHTML = '';
    }
    
    // Show modal
    document.getElementById('editExamModal').style.display = 'flex';
}

function closeEditExamModal() {
    document.getElementById('editExamModal').style.display = 'none';
}

function addModalSubjectRow() {
    const modalScheduleBody = document.getElementById('modalScheduleBody');
    const examType = document.getElementById('modalExamType').value;
    const defaultMarks = examType === 'Tutorial' ? 25 : 100;
    
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="text" class="form-input" placeholder="Subject name"></td>
        <td><input type="number" class="form-input" value="${defaultMarks}"></td>
        <td><input type="date" class="form-input"></td>
        <td><input type="time" class="form-input"></td>
        <td><input type="time" class="form-input"></td>
        <td><input type="text" class="form-input" placeholder="Room"></td>
        <td>
            <button class="simple-btn-icon" onclick="removeModalRow(this)" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    modalScheduleBody.appendChild(row);
}

function removeModalRow(btn) {
    if (typeof showConfirmDialog === 'function') {
        showConfirmDialog({
            title: 'Remove Subject',
            message: 'Are you sure you want to remove this subject from the exam?',
            confirmText: 'Remove',
            confirmIcon: 'fas fa-trash',
            onConfirm: () => {
                btn.closest('tr').remove();
            }
        });
    } else {
        if (confirm('Are you sure you want to remove this subject from the exam?')) {
            btn.closest('tr').remove();
        }
    }
}

function saveExamDraft() {
    const examData = collectModalExamData();
    if (!examData) return;
    
    examData.status = 'Draft';
    
    // Update current exam data
    currentExamData = examData;
    
    // Update page display
    updateExamDisplay(examData);
    
    // Close modal
    closeEditExamModal();
    
    // Show success message
    if (typeof showToast === 'function') {
        showToast(`Exam "${examData.name}" (${examData.id}) saved as draft successfully`, 'success');
    } else {
        alert(`Exam "${examData.name}" (${examData.id}) saved as draft successfully`);
    }
}

function saveExamAndActivate() {
    const examData = collectModalExamData();
    if (!examData) return;
    
    // Validate required fields
    const examName = document.getElementById('modalExamName').value.trim();
    if (!examName) {
        if (typeof showToast === 'function') {
            showToast('Please enter exam name', 'warning');
        } else {
            alert('Please enter exam name');
        }
        return;
    }
    
    const rows = document.querySelectorAll('#modalScheduleBody tr');
    let valid = true;
    rows.forEach(row => {
        const inputs = row.querySelectorAll('input');
        if (!inputs[0].value || !inputs[2].value || !inputs[3].value) {
            valid = false;
        }
    });
    
    if (!valid) {
        if (typeof showToast === 'function') {
            showToast('Please fill all required fields (Subject, Date, Start Time)', 'warning');
        } else {
            alert('Please fill all required fields (Subject, Date, Start Time)');
        }
        return;
    }
    
    examData.status = 'Active';
    
    // Update current exam data
    currentExamData = examData;
    
    // Update page display
    updateExamDisplay(examData);
    
    // Close modal
    closeEditExamModal();
    
    // Show success message
    if (typeof showToast === 'function') {
        showToast(`Exam "${examData.name}" (${examData.id}) saved and activated successfully`, 'success');
    } else {
        alert(`Exam "${examData.name}" (${examData.id}) saved and activated successfully`);
    }
}

function collectModalExamData() {
    const examName = document.getElementById('modalExamName').value.trim();
    const examIdValue = document.getElementById('modalExamId').value;
    const examType = document.getElementById('modalExamType').value;
    const grade = document.getElementById('modalGrade').value;
    const classValue = document.getElementById('modalClass').value;
    
    const schedule = [];
    const rows = document.querySelectorAll('#modalScheduleBody tr');
    rows.forEach(row => {
        const inputs = row.querySelectorAll('input');
        schedule.push({
            subject: inputs[0].value,
            marks: parseInt(inputs[1].value) || 100,
            date: inputs[2].value,
            startTime: inputs[3].value,
            endTime: inputs[4].value || '',
            room: inputs[5].value
        });
    });
    
    return {
        id: examIdValue,
        name: examName,
        type: examType,
        grade: grade,
        class: classValue,
        schedule: schedule
    };
}

function updateExamDisplay(examData) {
    // Update page content
    document.getElementById('examTitle').textContent = examData.name;
    document.getElementById('examId').textContent = examData.id;
    document.getElementById('examType').textContent = examData.type;
    document.getElementById('examStatus').textContent = examData.status;
    document.getElementById('examGrade').textContent = examData.grade;
    document.getElementById('examClass').textContent = 'Class ' + examData.class;
    
    document.getElementById('detailName').textContent = examData.name;
    document.getElementById('detailId').textContent = examData.id;
    document.getElementById('detailType').textContent = `${examData.type} (${examData.type === 'Tutorial' ? '25' : '100'} marks)`;
    document.getElementById('detailGrade').textContent = examData.grade;
    document.getElementById('detailClass').textContent = 'Class ' + examData.class;
    document.getElementById('detailStatus').textContent = examData.status;
    
    // Update status badge color
    const statusBadge = document.getElementById('examStatus');
    statusBadge.className = 'badge';
    if (examData.status === 'Upcoming') statusBadge.className += ' active-badge';
    if (examData.status === 'Active') statusBadge.className += ' tutorial-badge';
    if (examData.status === 'Completed') statusBadge.className += ' grade-badge';
    if (examData.status === 'Draft') statusBadge.className += ' active-badge';
    
    // Update schedule table
    if (examData.schedule && examData.schedule.length > 0) {
        const scheduleBody = document.getElementById('scheduleTableBody');
        scheduleBody.innerHTML = examData.schedule.map(item => `
            <tr>
                <td>${item.subject}</td>
                <td>${item.marks}</td>
                <td>${item.date}</td>
                <td>${item.startTime}</td>
                <td>${item.room}</td>
            </tr>
        `).join('');
}
}

// Auto-update marks when exam type changes in modal
document.addEventListener('DOMContentLoaded', function() {
    const examTypeSelect = document.getElementById('modalExamType');
    if (examTypeSelect) {
        examTypeSelect.addEventListener('change', function() {
            const marks = this.value === 'Tutorial' ? 25 : 100;
            document.querySelectorAll('#modalScheduleBody input[type="number"]').forEach(input => {
                input.value = marks;
            });
        });
    }
});

// Mock exam results data
const examResultsData = {
    'EX001': [
        { rank: 1, rollNo: '001', name: 'Aung Kyaw Min', math: 98, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 98, grade: 'A+' },
        { rank: 2, rollNo: '002', name: 'Su Myat Noe', math: 95, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 95, grade: 'A+' },
        { rank: 3, rollNo: '003', name: 'Thant Zin Oo', math: 92, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 92, grade: 'A+' },
        { rank: 4, rollNo: '004', name: 'Aye Chan Myae', math: 88, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 88, grade: 'A' },
        { rank: 5, rollNo: '005', name: 'Zaw Myo Htun', math: 85, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 85, grade: 'A' }
    ],
    'EX002': [
        { rank: 1, rollNo: '001', name: 'Aung Kyaw Min', math: 95, phys: 92, chem: 88, bio: 90, eng: 85, myan: 87, total: 537, grade: 'A+' },
        { rank: 2, rollNo: '002', name: 'Su Myat Noe', math: 93, phys: 89, chem: 85, bio: 87, eng: 90, myan: 88, total: 532, grade: 'A+' },
        { rank: 3, rollNo: '003', name: 'Thant Zin Oo', math: 90, phys: 87, chem: 82, bio: 85, eng: 88, myan: 85, total: 517, grade: 'A+' },
        { rank: 4, rollNo: '004', name: 'Aye Chan Myae', math: 87, phys: 84, chem: 80, bio: 82, eng: 85, myan: 83, total: 501, grade: 'A' },
        { rank: 5, rollNo: '005', name: 'Zaw Myo Htun', math: 84, phys: 81, chem: 78, bio: 80, eng: 82, myan: 80, total: 485, grade: 'A' }
    ],
    'EX003': [
        { rank: 1, rollNo: '001', name: 'Aung Kyaw Min', math: 0, phys: 0, chem: 0, bio: 95, eng: 0, myan: 0, total: 95, grade: 'A+' },
        { rank: 2, rollNo: '002', name: 'Su Myat Noe', math: 0, phys: 0, chem: 0, bio: 92, eng: 0, myan: 0, total: 92, grade: 'A+' },
        { rank: 3, rollNo: '003', name: 'Thant Zin Oo', math: 0, phys: 0, chem: 0, bio: 89, eng: 0, myan: 0, total: 89, grade: 'A+' },
        { rank: 4, rollNo: '004', name: 'Aye Chan Myae', math: 0, phys: 0, chem: 0, bio: 86, eng: 0, myan: 0, total: 86, grade: 'A' },
        { rank: 5, rollNo: '005', name: 'Zaw Myo Htun', math: 0, phys: 0, chem: 0, bio: 83, eng: 0, myan: 0, total: 83, grade: 'A' }
    ],
    'EX008': [
        { rank: 1, rollNo: '001', name: 'Aung Kyaw Min', math: 0, phys: 0, chem: 0, bio: 0, eng: 94, myan: 0, total: 94, grade: 'A+' },
        { rank: 2, rollNo: '002', name: 'Su Myat Noe', math: 0, phys: 0, chem: 0, bio: 0, eng: 91, myan: 0, total: 91, grade: 'A+' },
        { rank: 3, rollNo: '003', name: 'Thant Zin Oo', math: 0, phys: 0, chem: 0, bio: 0, eng: 88, myan: 0, total: 88, grade: 'A+' },
        { rank: 4, rollNo: '004', name: 'Aye Chan Myae', math: 0, phys: 0, chem: 0, bio: 0, eng: 85, myan: 0, total: 85, grade: 'A' },
        { rank: 5, rollNo: '005', name: 'Zaw Myo Htun', math: 0, phys: 0, chem: 0, bio: 0, eng: 82, myan: 0, total: 82, grade: 'A' }
    ]
};

function loadExamResults(examId) {
    const results = examResultsData[examId] || [];
    const resultsTable = document.getElementById('examResultsTable');
    
    if (results.length === 0) {
        resultsTable.innerHTML = '<tr><td colspan="11" style="text-align: center; padding: 20px; color: #666;">No results available yet</td></tr>';
        return;
    }
    
    resultsTable.innerHTML = results.map(result => `
        <tr>
            <td data-label="Rank">
                ${result.rank <= 3 ? 
                    `<span class="rank-badge ${result.rank === 1 ? 'gold' : result.rank === 2 ? 'silver' : 'bronze'}">${result.rank}</span>` : 
                    result.rank
                }
            </td>
            <td data-label="Roll No"><strong>${result.rollNo}</strong></td>
            <td data-label="Student Name"><strong>${result.name}</strong></td>
            <td data-label="Math">${result.math > 0 ? `<span class="subject-marks ${result.math >= 80 ? 'distinction' : ''}">${result.math}</span>` : '-'}</td>
            <td data-label="Phys">${result.phys > 0 ? `<span class="subject-marks ${result.phys >= 80 ? 'distinction' : ''}">${result.phys}</span>` : '-'}</td>
            <td data-label="Chem">${result.chem > 0 ? `<span class="subject-marks ${result.chem >= 80 ? 'distinction' : ''}">${result.chem}</span>` : '-'}</td>
            <td data-label="Bio">${result.bio > 0 ? `<span class="subject-marks ${result.bio >= 80 ? 'distinction' : ''}">${result.bio}</span>` : '-'}</td>
            <td data-label="Eng">${result.eng > 0 ? `<span class="subject-marks ${result.eng >= 80 ? 'distinction' : ''}">${result.eng}</span>` : '-'}</td>
            <td data-label="Myan">${result.myan > 0 ? `<span class="subject-marks ${result.myan >= 80 ? 'distinction' : ''}">${result.myan}</span>` : '-'}</td>
            <td data-label="Total"><strong>${result.total}</strong></td>
            <td data-label="Grade"><span class="status-badge ${result.grade === 'A+' ? 'paid' : result.grade === 'A' ? 'active' : 'draft'}">${result.grade}</span></td>
        </tr>
    `).join('');
}

// Load exam details on page load
document.addEventListener('DOMContentLoaded', loadExamDetails);
</script>

<?php
$content = ob_get_clean();

// Detect portal from URL to use appropriate layout
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';

include __DIR__ . '/../components/' . $layout;
?>
