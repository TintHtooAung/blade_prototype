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

<script>
// Portal prefix for navigation
const portalPrefix = '<?php echo $portalPrefix; ?>';

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
        window.location.href = `${portalPrefix}/exam-database`;
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
    
    // Load exam results
    loadExamResults(examId);
}

function editExam() {
    window.location.href = `${portalPrefix}/exam-edit?id=${examId}`;
}

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
