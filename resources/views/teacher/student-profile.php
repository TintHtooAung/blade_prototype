<?php
$pageTitle = 'Smart Campus Nova Hub - Student Profile';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Profile';
$activePage = 'students';
$id = $_GET['id'] ?? 'S000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/teacher/student-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Student Profiles
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

<div class="simple-section">
    <div class="simple-header">
        <h3>Profile: <?php echo htmlspecialchars($id); ?></h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Student ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td>Placeholder Name</td></tr>
                <tr><th>Class</th><td>Grade 10-A</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
            </tbody>
        </table>
    </div>

    <!-- Exam Results -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-clipboard-list"></i> Exam Results</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Type</th>
                    <th>Date</th>
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

    <!-- Attendance Summary -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-calendar-check"></i> Attendance Summary</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Days</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Late</th>
                    <th>Attendance %</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="attendanceSummaryTable">
                <!-- Attendance data will be populated by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Academic Performance -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-chart-line"></i> Academic Performance</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Current GPA</th><td><strong>3.8</strong></td></tr>
                <tr><th>Class Rank</th><td>5th out of 30 students</td></tr>
                <tr><th>Best Subject</th><td>Mathematics (A+)</td></tr>
                <tr><th>Improvement Area</th><td>English Literature</td></tr>
                <tr><th>Participation Score</th><td><span class="status-badge paid">Excellent</span></td></tr>
                <tr><th>Behavior Rating</th><td><span class="status-badge active">Good</span></td></tr>
            </tbody>
        </table>
    </div>

</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';

// Load exam results and attendance data
document.addEventListener('DOMContentLoaded', function() {
    // Mock exam results data
    const examResultsData = {
        'S000': [
            { examName: 'Mid-term Exam', type: 'Monthly', date: '2024-10-15', math: 95, phys: 92, chem: 88, bio: 90, eng: 85, myan: 87, total: 537, grade: 'A+' },
            { examName: 'Quiz 1', type: 'Tutorial', date: '2024-10-08', math: 98, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 98, grade: 'A+' },
            { examName: 'Quiz 2', type: 'Tutorial', date: '2024-10-22', math: 0, phys: 94, chem: 0, bio: 0, eng: 0, myan: 0, total: 94, grade: 'A+' },
            { examName: 'Final Exam', type: 'Final', date: '2024-11-20', math: 92, phys: 89, chem: 91, bio: 88, eng: 90, myan: 85, total: 535, grade: 'A+' }
        ],
        'S001': [
            { examName: 'Mid-term Exam', type: 'Monthly', date: '2024-10-15', math: 78, phys: 82, chem: 75, bio: 80, eng: 94, myan: 88, total: 497, grade: 'A' },
            { examName: 'Quiz 1', type: 'Tutorial', date: '2024-10-08', math: 72, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 72, grade: 'B+' },
            { examName: 'Quiz 2', type: 'Tutorial', date: '2024-10-22', math: 0, phys: 85, chem: 0, bio: 0, eng: 0, myan: 0, total: 85, grade: 'A' },
            { examName: 'Final Exam', type: 'Final', date: '2024-11-20', math: 80, phys: 78, chem: 82, bio: 79, eng: 92, myan: 86, total: 497, grade: 'A' }
        ]
    };

    // Mock attendance data
    const attendanceData = {
        'S000': [
            { month: 'September 2024', totalDays: 22, present: 22, absent: 0, late: 0, percentage: 100, status: 'Excellent' },
            { month: 'October 2024', totalDays: 23, present: 22, absent: 1, late: 0, percentage: 96, status: 'Good' },
            { month: 'November 2024', totalDays: 20, present: 20, absent: 0, late: 1, percentage: 100, status: 'Excellent' },
            { month: 'December 2024', totalDays: 18, present: 17, absent: 1, late: 0, percentage: 94, status: 'Good' }
        ],
        'S001': [
            { month: 'September 2024', totalDays: 22, present: 20, absent: 2, late: 0, percentage: 91, status: 'Good' },
            { month: 'October 2024', totalDays: 23, present: 21, absent: 2, late: 1, percentage: 91, status: 'Good' },
            { month: 'November 2024', totalDays: 20, present: 19, absent: 1, late: 0, percentage: 95, status: 'Good' },
            { month: 'December 2024', totalDays: 18, present: 16, absent: 2, late: 0, percentage: 89, status: 'Good' }
        ]
    };

    // Load exam results for this student
    const studentExamResults = examResultsData[profileId] || examResultsData['S000'];
    const examResultsTable = document.getElementById('examResultsTable');
    examResultsTable.innerHTML = '';

    studentExamResults.forEach(exam => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Exam Name">${exam.examName}</td>
            <td data-label="Type">${exam.type}</td>
            <td data-label="Date">${exam.date}</td>
            <td data-label="Math">${exam.math > 0 ? exam.math : '-'}</td>
            <td data-label="Phys">${exam.phys > 0 ? exam.phys : '-'}</td>
            <td data-label="Chem">${exam.chem > 0 ? exam.chem : '-'}</td>
            <td data-label="Bio">${exam.bio > 0 ? exam.bio : '-'}</td>
            <td data-label="Eng">${exam.eng > 0 ? exam.eng : '-'}</td>
            <td data-label="Myan">${exam.myan > 0 ? exam.myan : '-'}</td>
            <td data-label="Total"><strong>${exam.total}</strong></td>
            <td data-label="Grade"><span class="status-badge ${exam.grade === 'A+' ? 'paid' : exam.grade === 'A' ? 'active' : 'draft'}">${exam.grade}</span></td>
        `;
        examResultsTable.appendChild(row);
    });

    // Load attendance data for this student
    const studentAttendance = attendanceData[profileId] || attendanceData['S000'];
    const attendanceTable = document.getElementById('attendanceSummaryTable');
    attendanceTable.innerHTML = '';

    studentAttendance.forEach(month => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Month">${month.month}</td>
            <td data-label="Total Days">${month.totalDays}</td>
            <td data-label="Present">${month.present}</td>
            <td data-label="Absent">${month.absent}</td>
            <td data-label="Late">${month.late}</td>
            <td data-label="Attendance %"><strong>${month.percentage}%</strong></td>
            <td data-label="Status"><span class="status-badge ${month.status === 'Excellent' ? 'paid' : 'active'}">${month.status}</span></td>
        `;
        attendanceTable.appendChild(row);
    });
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/teacher-layout.php';
?>
