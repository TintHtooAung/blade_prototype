<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Details';
$pageIcon = 'fas fa-clipboard-list';
$pageHeading = 'Exam Details';
$activePage = 'exam-results';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/teacher/exam-results" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Exam Results
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

    <!-- Core Exam Summary -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Exam Summary</h4>
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

    <!-- Exam Schedule -->
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
        status: 'Active',
        subjects: ['Mathematics']
    },
    'EX002': {
        id: 'EX002',
        name: 'Mid-term Exam',
        type: 'Monthly',
        grade: 'Grade 10',
        class: 'B',
        status: 'Active',
        subjects: ['Mathematics', 'Science', 'English', 'History', 'Geography', 'Physics']
    },
    'EX003': {
        id: 'EX003',
        name: 'Science Tutorial',
        type: 'Tutorial',
        grade: 'Grade 9',
        class: 'B',
        status: 'Active',
        subjects: ['Science']
    },
    'EX004': {
        id: 'EX004',
        name: 'Chemistry Lab Test',
        type: 'Tutorial',
        grade: 'Grade 11',
        class: 'A',
        status: 'Active',
        subjects: ['Chemistry']
    },
    'EX005': {
        id: 'EX005',
        name: 'Final Exam - Science',
        type: 'Final',
        grade: 'Grade 12',
        class: 'A',
        status: 'Ended',
        subjects: ['Mathematics', 'Physics', 'Chemistry', 'Biology', 'English', 'Myanmar', 'History']
    },
    'EX006': {
        id: 'EX006',
        name: 'Mathematics Monthly Test',
        type: 'Monthly',
        grade: 'Grade 10',
        class: 'A',
        status: 'Ended',
        subjects: ['Mathematics']
    },
    'EX007': {
        id: 'EX007',
        name: 'Physics Tutorial 2',
        type: 'Tutorial',
        grade: 'Grade 11',
        class: 'B',
        status: 'Ended',
        subjects: ['Physics']
    },
    'EX008': {
        id: 'EX008',
        name: 'English Monthly Test',
        type: 'Monthly',
        grade: 'Grade 11',
        class: 'A',
        status: 'Active',
        subjects: ['English']
    },
    'EX009': {
        id: 'EX009',
        name: 'Physics Semester Exam',
        type: 'Semester',
        grade: 'Grade 12',
        class: 'A',
        status: 'Active',
        subjects: ['Physics', 'Chemistry', 'Mathematics', 'Biology', 'English']
    },
    'EX010': {
        id: 'EX010',
        name: 'Chemistry Semester Exam',
        type: 'Semester',
        grade: 'Grade 11',
        class: 'A',
        status: 'Ended',
        subjects: ['Chemistry']
    }
};

function loadExamDetails() {
    if (!examId) {
        alert('Exam ID not found');
        window.location.href = '/teacher/exam-results';
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
    
    // Determine marks based on type
    let marks = '100';
    if (exam.type === 'Tutorial') marks = '25';
    else if (exam.type === 'Monthly') marks = '100';
    else if (exam.type === 'Semester') marks = '100';
    else if (exam.type === 'Final') marks = '100';
    
    document.getElementById('detailType').textContent = `${exam.type} (${marks} marks)`;
    document.getElementById('detailGrade').textContent = exam.grade;
    document.getElementById('detailClass').textContent = 'Class ' + exam.class;
    document.getElementById('detailStatus').textContent = exam.status;
    
    // Update status badge color
    const statusBadge = document.getElementById('examStatus');
    statusBadge.className = 'badge';
    if (exam.status === 'Active') statusBadge.className += ' active-badge';
    else if (exam.status === 'Ended') statusBadge.className += ' grade-badge';
    else if (exam.status === 'Upcoming') statusBadge.className += ' tutorial-badge';
    
    // Load exam results
    loadExamResults(examId);
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
        { rank: 1, rollNo: '011', name: 'Kyaw Myo Htun', math: 96, phys: 94, chem: 92, bio: 95, eng: 88, myan: 90, total: 555, grade: 'A+' },
        { rank: 2, rollNo: '012', name: 'Thin Thin Aye', math: 94, phys: 93, chem: 91, bio: 94, eng: 87, myan: 89, total: 548, grade: 'A+' },
        { rank: 3, rollNo: '013', name: 'Min Khant Zaw', math: 92, phys: 90, chem: 89, bio: 92, eng: 85, myan: 88, total: 536, grade: 'A+' },
        { rank: 4, rollNo: '014', name: 'Htet Htet Aung', math: 90, phys: 88, chem: 87, bio: 90, eng: 84, myan: 86, total: 525, grade: 'A' },
        { rank: 5, rollNo: '015', name: 'Nay Lin Tun', math: 88, phys: 86, chem: 85, bio: 88, eng: 82, myan: 84, total: 513, grade: 'A' }
    ],
    'EX003': [
        { rank: 1, rollNo: '021', name: 'Myo Min Htun', math: 0, phys: 0, chem: 0, bio: 98, eng: 0, myan: 0, total: 98, grade: 'A+' },
        { rank: 2, rollNo: '022', name: 'Aye Myat Mon', math: 0, phys: 0, chem: 0, bio: 96, eng: 0, myan: 0, total: 96, grade: 'A+' },
        { rank: 3, rollNo: '023', name: 'Zaw Zaw Lin', math: 0, phys: 0, chem: 0, bio: 94, eng: 0, myan: 0, total: 94, grade: 'A+' }
    ],
    'EX004': [
        { rank: 1, rollNo: '031', name: 'Lin Htet Kyaw', math: 0, phys: 0, chem: 24, bio: 0, eng: 0, myan: 0, total: 24, grade: 'A+' },
        { rank: 2, rollNo: '032', name: 'Phyu Phyu Win', math: 0, phys: 0, chem: 23, bio: 0, eng: 0, myan: 0, total: 23, grade: 'A+' },
        { rank: 3, rollNo: '033', name: 'Khant Si Thu', math: 0, phys: 0, chem: 22, bio: 0, eng: 0, myan: 0, total: 22, grade: 'A+' }
    ],
    'EX005': [
        { rank: 1, rollNo: '041', name: 'Aung Aung Min', math: 100, phys: 98, chem: 97, bio: 99, eng: 95, myan: 96, total: 585, grade: 'A+' },
        { rank: 2, rollNo: '042', name: 'Su Su Win', math: 99, phys: 97, chem: 96, bio: 98, eng: 94, myan: 95, total: 579, grade: 'A+' },
        { rank: 3, rollNo: '043', name: 'Kyaw Zin Htet', math: 98, phys: 96, chem: 95, bio: 97, eng: 93, myan: 94, total: 573, grade: 'A+' }
    ]
};

function loadExamResults(examId) {
    const results = examResultsData[examId] || [];
    const tbody = document.getElementById('examResultsTable');
    
    if (!tbody) return;
    
    if (results.length === 0) {
        tbody.innerHTML = '<tr><td colspan="11" style="text-align: center; padding: 20px; color: #6b7280;">No results available yet</td></tr>';
        return;
    }
    
    tbody.innerHTML = results.map(result => `
        <tr>
            <td><strong>${result.rank}</strong></td>
            <td>${result.rollNo}</td>
            <td>${result.name}</td>
            <td>${result.math > 0 ? result.math : '-'}</td>
            <td>${result.phys > 0 ? result.phys : '-'}</td>
            <td>${result.chem > 0 ? result.chem : '-'}</td>
            <td>${result.bio > 0 ? result.bio : '-'}</td>
            <td>${result.eng > 0 ? result.eng : '-'}</td>
            <td>${result.myan > 0 ? result.myan : '-'}</td>
            <td><strong>${result.total}</strong></td>
            <td><span class="status-badge ${result.grade === 'A+' ? 'active' : result.grade === 'A' ? 'pending' : 'inactive'}">${result.grade}</span></td>
        </tr>
    `).join('');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', loadExamDetails);
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>

