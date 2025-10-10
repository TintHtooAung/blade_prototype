<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Details';
$pageIcon = 'fas fa-clipboard-list';
$pageHeading = 'Exam Details';
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

    <!-- Results Overview -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-bar"></i> Results Overview</h4>
        </div>
        <div class="exam-detail-content">
            <div class="results-summary">
                <div class="summary-item">
                    <span class="summary-number">35</span>
                    <span class="summary-label">Total Students</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">30</span>
                    <span class="summary-label">Results Available</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">5</span>
                    <span class="summary-label">Pending Results</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">85%</span>
                    <span class="summary-label">Completion Rate</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Results Table -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-table"></i> Student Results</h4>
            <button class="simple-btn" onclick="viewResults()"><i class="fas fa-chart-bar"></i> View Full Results</button>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>S001</strong></td>
                            <td>Student data will be loaded from database</td>
                            <td>Results pending</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td><strong>S002</strong></td>
                            <td>Student data will be loaded from database</td>
                            <td>Results pending</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Get exam ID from URL
const urlParams = new URLSearchParams(window.location.search);
const examId = urlParams.get('id');

// Sample exam data
const sampleExams = {
    'EX001': {
        id: 'EX001',
        name: 'Mathematics Tutorial 1',
        type: 'Tutorial',
        grade: 'Grade 9',
        class: 'A',
        status: 'Upcoming',
        subjects: ['Mathematics']
    },
    'EX002': {
        id: 'EX002',
        name: 'Mid-term Exam',
        type: 'Monthly',
        grade: 'Grade 10',
        class: 'B',
        status: 'Upcoming',
        subjects: ['Mathematics', 'Science', 'English', 'History', 'Geography', 'Physics']
    },
    'EX003': {
        id: 'EX003',
        name: 'Science Tutorial',
        type: 'Tutorial',
        grade: 'Grade 9',
        class: 'B',
        status: 'Upcoming',
        subjects: ['Science']
    },
    'EX008': {
        id: 'EX008',
        name: 'English Monthly Test',
        type: 'Monthly',
        grade: 'Grade 11',
        class: 'A',
        status: 'Active',
        subjects: ['English']
    }
};

function loadExamDetails() {
    if (!examId) {
        alert('Exam ID not found');
        window.location.href = '/admin/exam-database';
        return;
    }

    const exam = sampleExams[examId];
    
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
}

function editExam() {
    window.location.href = `/admin/exam-edit?id=${examId}`;
}

function viewResults() {
    window.location.href = `/admin/exam-results?id=${examId}`;
}

// Load exam details on page load
document.addEventListener('DOMContentLoaded', loadExamDetails);
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
