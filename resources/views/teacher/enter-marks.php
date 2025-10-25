<?php
$pageTitle = 'Smart Campus Nova Hub - Enter Marks';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Enter Marks';
$activePage = 'enter-marks';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Enter Marks Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Enter Student Marks</h3>
        <div class="simple-actions">
            <div class="filter-group">
                <label for="examFilter">Select Exam:</label>
                <select id="examFilter" class="form-select compact" onchange="loadExamStudents()">
                    <option value="">Choose Exam...</option>
                    <option value="EX001">Mathematics Tutorial 1 - Grade 9-A</option>
                    <option value="EX002">Mid-term Exam - Grade 10-B</option>
                    <option value="EX003">Science Tutorial - Grade 9-B</option>
                    <option value="EX004">Chemistry Lab Test - Grade 11-A</option>
                    <option value="EX005">Final Exam - Science - Grade 12-A</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="classFilter">Filter by Class:</label>
                <select id="classFilter" class="form-select compact" onchange="filterStudentsByClass()">
                    <option value="all">All Classes</option>
                    <option value="Grade 9-A">Grade 9-A</option>
                    <option value="Grade 9-B">Grade 9-B</option>
                    <option value="Grade 10-A">Grade 10-A</option>
                    <option value="Grade 10-B">Grade 10-B</option>
                    <option value="Grade 11-A">Grade 11-A</option>
                    <option value="Grade 11-B">Grade 11-B</option>
                    <option value="Grade 12-A">Grade 12-A</option>
                    <option value="Grade 12-B">Grade 12-B</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Marks Entry Form -->
    <div id="marksEntryForm" class="marks-entry-section" style="display: none;">
        <div class="exam-info-card">
            <div class="exam-details">
                <h4 id="selectedExamName">Selected Exam</h4>
                <div class="exam-meta">
                    <span class="exam-type" id="selectedExamType">Type</span>
                    <span class="exam-class" id="selectedExamClass">Class</span>
                    <span class="exam-subject" id="selectedExamSubject">Subject</span>
                </div>
            </div>
            <div class="exam-actions">
                <button class="simple-btn secondary" onclick="markAllAbsent()">
                    <i class="fas fa-times"></i> Mark All Absent
                </button>
                <button class="simple-btn primary" onclick="saveAllMarks()">
                    <i class="fas fa-save"></i> Save All Marks
                </button>
            </div>
        </div>

        <div class="marks-table-container">
            <table class="marks-table" id="marksTable">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Marks</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="marksTableBody">
                    <!-- Student marks will be populated here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- No Exam Selected Message -->
    <div id="noExamSelected" class="no-selection-message">
        <div class="message-icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <h3>Select an Exam to Enter Marks</h3>
        <p>Choose an exam from the dropdown above to start entering student marks.</p>
    </div>
</div>

<style>
/* Filter Groups */
.filter-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-group label {
    font-size: 0.9rem;
    font-weight: 500;
    color: #666;
    margin: 0;
    white-space: nowrap;
}

.form-select.compact {
    padding: 6px 10px;
    font-size: 0.85rem;
    min-width: 200px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background: #fff;
    cursor: pointer;
    transition: all 0.2s ease;
}

.form-select.compact:hover {
    border-color: #1976d2;
}

.form-select.compact:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.2);
}

/* Exam Info Card */
.exam-info-card {
    background: #f8f9fa;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.exam-details h4 {
    margin: 0 0 8px 0;
    color: #333;
    font-size: 1.1rem;
}

.exam-meta {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}

.exam-meta span {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 500;
}

.exam-type {
    background: #e3f2fd;
    color: #1976d2;
}

.exam-class {
    background: #f3e5f5;
    color: #7b1fa2;
}

.exam-subject {
    background: #e8f5e9;
    color: #2e7d32;
}

.exam-actions {
    display: flex;
    gap: 12px;
}

/* Marks Table */
.marks-table-container {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
}

.marks-table {
    width: 100%;
    border-collapse: collapse;
}

.marks-table th {
    background: #f5f5f5;
    padding: 12px 16px;
    text-align: left;
    font-weight: 600;
    color: #333;
    border-bottom: 1px solid #e0e0e0;
}

.marks-table td {
    padding: 12px 16px;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
}

.marks-table tbody tr:hover {
    background: #f8f9fa;
}

/* Student Info */
.student-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.student-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1976d2, #42a5f5);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    font-weight: 600;
    flex-shrink: 0;
}

.student-details h5 {
    margin: 0 0 2px 0;
    font-size: 0.95rem;
    color: #333;
}

.student-details p {
    margin: 0;
    font-size: 0.8rem;
    color: #666;
}

/* Marks Input */
.marks-input-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.marks-input {
    width: 80px;
    padding: 6px 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
    font-size: 0.9rem;
    font-weight: 500;
}

.marks-input:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.2);
}

.marks-separator {
    color: #666;
    font-weight: 500;
}

.max-marks {
    color: #666;
    font-size: 0.8rem;
}

/* Status Badge */
.status-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
}

.status-badge.present {
    background: #e8f5e9;
    color: #2e7d32;
}

.status-badge.absent {
    background: #ffebee;
    color: #c62828;
}

.status-badge.pending {
    background: #fff3e0;
    color: #ef6c00;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 4px;
}

.action-btn.primary {
    background: #1976d2;
    color: #fff;
}

.action-btn.primary:hover {
    background: #1565c0;
}

.action-btn.secondary {
    background: #f5f5f5;
    color: #666;
    border: 1px solid #ddd;
}

.action-btn.secondary:hover {
    background: #e0e0e0;
}

/* No Selection Message */
.no-selection-message {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.message-icon {
    font-size: 3rem;
    color: #ddd;
    margin-bottom: 20px;
}

.no-selection-message h3 {
    margin: 0 0 8px 0;
    color: #333;
}

.no-selection-message p {
    margin: 0;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .simple-actions {
        flex-direction: column;
        gap: 12px;
    }
    
    .filter-group {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }
    
    .form-select.compact {
        min-width: 100%;
    }
    
    .exam-info-card {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }
    
    .exam-actions {
        width: 100%;
        justify-content: center;
    }
    
    .marks-table-container {
        overflow-x: auto;
    }
    
    .marks-table {
        min-width: 600px;
    }
}
</style>

<script>
// Enter Marks Functions

let currentExam = null;
let currentStudents = [];
let marksData = {};

// Sample exam data
const examData = {
    'EX001': {
        id: 'EX001',
        name: 'Mathematics Tutorial 1',
        type: 'Tutorial',
        class: 'Grade 9-A',
        subject: 'Mathematics',
        maxMarks: 50,
        students: [
            { id: 'S001', name: 'John Smith', class: 'Grade 9-A', marks: null, status: 'pending' },
            { id: 'S002', name: 'Sarah Johnson', class: 'Grade 9-A', marks: null, status: 'pending' },
            { id: 'S003', name: 'Mike Davis', class: 'Grade 9-A', marks: null, status: 'pending' },
            { id: 'S004', name: 'Emma Wilson', class: 'Grade 9-A', marks: null, status: 'pending' },
            { id: 'S005', name: 'Alex Brown', class: 'Grade 9-A', marks: null, status: 'pending' }
        ]
    },
    'EX002': {
        id: 'EX002',
        name: 'Mid-term Exam',
        type: 'Monthly',
        class: 'Grade 10-B',
        subject: 'Multiple Subjects',
        maxMarks: 100,
        students: [
            { id: 'S006', name: 'Jessica Lee', class: 'Grade 10-B', marks: null, status: 'pending' },
            { id: 'S007', name: 'David Garcia', class: 'Grade 10-B', marks: null, status: 'pending' },
            { id: 'S008', name: 'Anna Taylor', class: 'Grade 10-B', marks: null, status: 'pending' },
            { id: 'S009', name: 'Chris Martinez', class: 'Grade 10-B', marks: null, status: 'pending' },
            { id: 'S010', name: 'Mia Anderson', class: 'Grade 10-B', marks: null, status: 'pending' }
        ]
    },
    'EX003': {
        id: 'EX003',
        name: 'Science Tutorial',
        type: 'Tutorial',
        class: 'Grade 9-B',
        subject: 'Science',
        maxMarks: 40,
        students: [
            { id: 'S011', name: 'James Wilson', class: 'Grade 9-B', marks: null, status: 'pending' },
            { id: 'S012', name: 'Sophie Clark', class: 'Grade 9-B', marks: null, status: 'pending' },
            { id: 'S013', name: 'Ryan Murphy', class: 'Grade 9-B', marks: null, status: 'pending' },
            { id: 'S014', name: 'Olivia White', class: 'Grade 9-B', marks: null, status: 'pending' },
            { id: 'S015', name: 'Daniel Green', class: 'Grade 9-B', marks: null, status: 'pending' }
        ]
    }
};

function loadExamStudents() {
    const examId = document.getElementById('examFilter').value;
    
    if (!examId) {
        document.getElementById('marksEntryForm').style.display = 'none';
        document.getElementById('noExamSelected').style.display = 'block';
        return;
    }
    
    currentExam = examData[examId];
    if (!currentExam) return;
    
    // Update exam info
    document.getElementById('selectedExamName').textContent = currentExam.name;
    document.getElementById('selectedExamType').textContent = currentExam.type;
    document.getElementById('selectedExamClass').textContent = currentExam.class;
    document.getElementById('selectedExamSubject').textContent = currentExam.subject;
    
    // Load students
    currentStudents = [...currentExam.students];
    renderMarksTable();
    
    // Show form
    document.getElementById('marksEntryForm').style.display = 'block';
    document.getElementById('noExamSelected').style.display = 'none';
}

function renderMarksTable() {
    const tbody = document.getElementById('marksTableBody');
    tbody.innerHTML = '';
    
    currentStudents.forEach(student => {
        const row = document.createElement('tr');
        const initials = student.name.split(' ').map(n => n[0]).join('');
        
        row.innerHTML = `
            <td><strong>${student.id}</strong></td>
            <td>
                <div class="student-info">
                    <div class="student-avatar">${initials}</div>
                    <div class="student-details">
                        <h5>${student.name}</h5>
                        <p>${student.id}</p>
                    </div>
                </div>
            </td>
            <td>${student.class}</td>
            <td>
                <div class="marks-input-group">
                    <input type="number" 
                           class="marks-input" 
                           id="marks_${student.id}" 
                           value="${student.marks || ''}" 
                           max="${currentExam.maxMarks}" 
                           min="0" 
                           onchange="updateStudentMarks('${student.id}', this.value)"
                           placeholder="0">
                    <span class="marks-separator">/</span>
                    <span class="max-marks">${currentExam.maxMarks}</span>
                </div>
            </td>
            <td>
                <span class="status-badge ${student.status}">${student.status}</span>
            </td>
            <td>
                <div class="action-buttons">
                    <button class="action-btn secondary" onclick="markStudentAbsent('${student.id}')">
                        <i class="fas fa-times"></i> Absent
                    </button>
                    <button class="action-btn primary" onclick="markStudentPresent('${student.id}')">
                        <i class="fas fa-check"></i> Present
                    </button>
                </div>
            </td>
        `;
        
        tbody.appendChild(row);
    });
}

function updateStudentMarks(studentId, marks) {
    const student = currentStudents.find(s => s.id === studentId);
    if (student) {
        student.marks = marks ? parseInt(marks) : null;
        student.status = marks ? 'present' : 'pending';
        
        // Update status badge
        const row = document.querySelector(`#marks_${studentId}`).closest('tr');
        const statusBadge = row.querySelector('.status-badge');
        statusBadge.textContent = student.status;
        statusBadge.className = `status-badge ${student.status}`;
    }
}

function markStudentPresent(studentId) {
    const student = currentStudents.find(s => s.id === studentId);
    if (student) {
        student.status = 'present';
        const statusBadge = document.querySelector(`#marks_${studentId}`).closest('tr').querySelector('.status-badge');
        statusBadge.textContent = 'present';
        statusBadge.className = 'status-badge present';
    }
}

function markStudentAbsent(studentId) {
    const student = currentStudents.find(s => s.id === studentId);
    if (student) {
        student.status = 'absent';
        student.marks = null;
        
        const marksInput = document.getElementById(`marks_${studentId}`);
        marksInput.value = '';
        
        const statusBadge = marksInput.closest('tr').querySelector('.status-badge');
        statusBadge.textContent = 'absent';
        statusBadge.className = 'status-badge absent';
    }
}

function markAllAbsent() {
    if (confirm('Mark all students as absent? This will clear all entered marks.')) {
        currentStudents.forEach(student => {
            student.status = 'absent';
            student.marks = null;
        });
        renderMarksTable();
    }
}

function saveAllMarks() {
    const hasMarks = currentStudents.some(student => student.marks !== null);
    
    if (!hasMarks) {
        alert('Please enter marks for at least one student before saving.');
        return;
    }
    
    if (confirm('Save all marks for this exam? This action cannot be undone.')) {
        // TODO: Send data to backend
        console.log('Saving marks:', {
            examId: currentExam.id,
            students: currentStudents
        });
        
        alert('Marks saved successfully!');
        
        // Reset form
        document.getElementById('examFilter').value = '';
        document.getElementById('marksEntryForm').style.display = 'none';
        document.getElementById('noExamSelected').style.display = 'block';
    }
}

function filterStudentsByClass() {
    const selectedClass = document.getElementById('classFilter').value;
    
    if (selectedClass === 'all') {
        renderMarksTable();
        return;
    }
    
    const filteredStudents = currentStudents.filter(student => student.class === selectedClass);
    const tbody = document.getElementById('marksTableBody');
    tbody.innerHTML = '';
    
    filteredStudents.forEach(student => {
        const row = document.createElement('tr');
        const initials = student.name.split(' ').map(n => n[0]).join('');
        
        row.innerHTML = `
            <td><strong>${student.id}</strong></td>
            <td>
                <div class="student-info">
                    <div class="student-avatar">${initials}</div>
                    <div class="student-details">
                        <h5>${student.name}</h5>
                        <p>${student.id}</p>
                    </div>
                </div>
            </td>
            <td>${student.class}</td>
            <td>
                <div class="marks-input-group">
                    <input type="number" 
                           class="marks-input" 
                           id="marks_${student.id}" 
                           value="${student.marks || ''}" 
                           max="${currentExam.maxMarks}" 
                           min="0" 
                           onchange="updateStudentMarks('${student.id}', this.value)"
                           placeholder="0">
                    <span class="marks-separator">/</span>
                    <span class="max-marks">${currentExam.maxMarks}</span>
                </div>
            </td>
            <td>
                <span class="status-badge ${student.status}">${student.status}</span>
            </td>
            <td>
                <div class="action-buttons">
                    <button class="action-btn secondary" onclick="markStudentAbsent('${student.id}')">
                        <i class="fas fa-times"></i> Absent
                    </button>
                    <button class="action-btn primary" onclick="markStudentPresent('${student.id}')">
                        <i class="fas fa-check"></i> Present
                    </button>
                </div>
            </td>
        `;
        
        tbody.appendChild(row);
    });
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Set default state
    document.getElementById('marksEntryForm').style.display = 'none';
    document.getElementById('noExamSelected').style.display = 'block';
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>