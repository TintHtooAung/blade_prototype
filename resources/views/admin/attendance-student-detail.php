<?php
$pageTitle = 'Smart Campus Nova Hub - Student Attendance Details';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Attendance Details';
$activePage = 'attendance-student';
$studentId = $_GET['student'] ?? 'S001';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/attendance/student" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Student Attendance
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

<!-- Student Information Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Student: <?php echo htmlspecialchars($studentId); ?></h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Student ID</th><td id="studentId"><?php echo htmlspecialchars($studentId); ?></td></tr>
                <tr><th>Full Name</th><td id="studentName">-</td></tr>
                <tr><th>Grade</th><td id="studentGrade">-</td></tr>
                <tr><th>Class</th><td id="studentClass">-</td></tr>
                <tr><th>Academic Year</th><td id="academicYear">2024 - 2025</td></tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Attendance Summary Section -->
<div class="simple-section">
    <div class="simple-header">
        <h4><i class="fas fa-chart-line"></i> Attendance Summary</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Overall Attendance %</th><td><span id="overallPercentage" class="percentage-badge high">-</span></td></tr>
                <tr><th>Total Days</th><td id="totalDays">-</td></tr>
                <tr><th>Days Present</th><td id="daysPresent">-</td></tr>
                <tr><th>Days Absent</th><td id="daysAbsent">-</td></tr>
                <tr><th>Days Late</th><td id="daysLate">-</td></tr>
                <tr><th>Days on Leave</th><td id="daysLeave">-</td></tr>
                <tr><th>Leaves Allowed</th><td id="leavesAllowed">-</td></tr>
                <tr><th>Leave Remaining</th><td id="leaveRemaining">-</td></tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Monthly Attendance Breakdown -->
<div class="simple-section">
    <div class="simple-header">
        <h4><i class="fas fa-calendar-alt"></i> Monthly Attendance Breakdown</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Days</th>
                    <th>Attendance %</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Late</th>
                    <th>Leave</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="monthlyAttendanceTable">
                <!-- Monthly attendance data will be populated by JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Daily Attendance Records -->
<div class="simple-section">
    <div class="simple-header">
        <h4><i class="fas fa-calendar-day"></i> Recent Attendance Records</h4>
        <div style="display: flex; gap: 8px; align-items: center;">
            <label for="dateRangeFilter" style="margin: 0; white-space: nowrap; font-size: 14px;">Filter:</label>
            <select id="dateRangeFilter" class="filter-select" onchange="filterAttendanceRecords()" style="height: 36px; padding: 8px 12px; margin: 0;">
                <option value="30">Last 30 Days</option>
                <option value="60">Last 60 Days</option>
                <option value="90">Last 90 Days</option>
                <option value="all">All Records</option>
            </select>
        </div>
    </div>
    <div class="simple-table-container" style="overflow-x: auto;">
        <table class="basic-table responsive-table period-attendance-table">
            <thead>
                <tr>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Day</th>
                    <th colspan="3" class="period-group-header">Morning</th>
                    <th class="break-header">Break</th>
                    <th colspan="4" class="period-group-header">Evening</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">Notes</th>
                </tr>
                <tr>
                    <th>P1</th>
                    <th>P2</th>
                    <th>P3</th>
                    <th class="break-header"></th>
                    <th>P4</th>
                    <th>P5</th>
                    <th>P6</th>
                    <th>P7</th>
                </tr>
            </thead>
            <tbody id="dailyAttendanceTable">
                <!-- Daily attendance records will be populated by JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<script>
const studentId = '<?php echo htmlspecialchars($studentId); ?>';

// Student data mapping
const studentData = {
    'S001': { name: 'John Doe', grade: '9', class: 'A', leavesAllowed: 15 },
    'S002': { name: 'Jane Smith', grade: '9', class: 'A', leavesAllowed: 15 },
    'S003': { name: 'Mike Johnson', grade: '9', class: 'A', leavesAllowed: 15 },
    'S004': { name: 'Sarah Williams', grade: '9', class: 'B', leavesAllowed: 15 },
    'S005': { name: 'Alex Brown', grade: '9', class: 'B', leavesAllowed: 15 },
    'S006': { name: 'Emily Davis', grade: '10', class: 'A', leavesAllowed: 12 },
    'S007': { name: 'David Wilson', grade: '10', class: 'A', leavesAllowed: 12 },
    'S008': { name: 'Lisa Anderson', grade: '10', class: 'B', leavesAllowed: 12 },
    'S009': { name: 'Tom Martinez', grade: '10', class: 'B', leavesAllowed: 12 },
    'S010': { name: 'Amy Taylor', grade: '11', class: 'A', leavesAllowed: 10 },
    'S011': { name: 'Chris Lee', grade: '11', class: 'A', leavesAllowed: 10 },
    'S012': { name: 'Jessica White', grade: '11', class: 'B', leavesAllowed: 10 },
    'S013': { name: 'Ryan Harris', grade: '12', class: 'A', leavesAllowed: 10 },
    'S014': { name: 'Olivia Clark', grade: '12', class: 'A', leavesAllowed: 10 },
    'S015': { name: 'Daniel Lewis', grade: '12', class: 'B', leavesAllowed: 10 },
    'S016': { name: 'Sophia Walker', grade: '12', class: 'B', leavesAllowed: 10 }
};

// Monthly attendance data
const monthlyAttendanceData = {
    'S001': [
        { month: 'September 2024', totalDays: 22, present: 22, absent: 0, late: 0, leave: 0, percentage: 100, status: 'Excellent' },
        { month: 'October 2024', totalDays: 23, present: 22, absent: 1, late: 0, leave: 0, percentage: 96, status: 'Good' },
        { month: 'November 2024', totalDays: 20, present: 20, absent: 0, late: 1, leave: 0, percentage: 100, status: 'Excellent' },
        { month: 'December 2024', totalDays: 18, present: 17, absent: 1, late: 0, leave: 0, percentage: 94, status: 'Good' },
        { month: 'January 2025', totalDays: 21, present: 21, absent: 0, late: 0, leave: 0, percentage: 100, status: 'Excellent' },
        { month: 'February 2025', totalDays: 19, present: 18, absent: 1, late: 0, leave: 0, percentage: 95, status: 'Good' }
    ],
    'S002': [
        { month: 'September 2024', totalDays: 22, present: 20, absent: 2, late: 0, leave: 0, percentage: 91, status: 'Good' },
        { month: 'October 2024', totalDays: 23, present: 21, absent: 2, late: 1, leave: 0, percentage: 91, status: 'Good' },
        { month: 'November 2024', totalDays: 20, present: 19, absent: 1, late: 0, leave: 0, percentage: 95, status: 'Good' },
        { month: 'December 2024', totalDays: 18, present: 16, absent: 2, late: 0, leave: 0, percentage: 89, status: 'Good' },
        { month: 'January 2025', totalDays: 21, present: 20, absent: 1, late: 0, leave: 0, percentage: 95, status: 'Good' },
        { month: 'February 2025', totalDays: 19, present: 18, absent: 1, late: 0, leave: 0, percentage: 95, status: 'Good' }
    ]
};

// Calculate status based on Period 1 and Period 4
function calculateStatus(period1, period4) {
    const p1 = period1.toLowerCase();
    const p4 = period4.toLowerCase();
    
    // Status codes: PP, PL, PA, LL, LP, LA, AA, AP, AL
    if (p1 === 'present' && p4 === 'present') return { code: 'PP', label: 'Morning Present, Evening Present', color: 'green' };
    if (p1 === 'present' && p4 === 'leave') return { code: 'PL', label: 'Morning Present, Evening Leave', color: 'green' };
    if (p1 === 'present' && p4 === 'absent') return { code: 'PA', label: 'Morning Present, Evening Absent', color: 'red' };
    if (p1 === 'leave' && p4 === 'leave') return { code: 'LL', label: 'Morning Leave, Evening Leave', color: 'orange' };
    if (p1 === 'leave' && p4 === 'present') return { code: 'LP', label: 'Morning Leave, Evening Present', color: 'green' };
    if (p1 === 'leave' && p4 === 'absent') return { code: 'LA', label: 'Morning Leave, Evening Absent', color: 'orange' };
    if (p1 === 'absent' && p4 === 'absent') return { code: 'AA', label: 'Morning Absent, Evening Absent', color: 'red' };
    if (p1 === 'absent' && p4 === 'present') return { code: 'AP', label: 'Morning Absent, Evening Present', color: 'green' };
    if (p1 === 'absent' && p4 === 'leave') return { code: 'AL', label: 'Morning Absent, Evening Leave', color: 'red' };
    
    return { code: '--', label: 'Unknown', color: 'gray' };
}

// Generate period attendance for a day
function generatePeriodAttendance() {
    const statuses = ['present', 'present', 'present', 'present', 'present', 'leave', 'absent'];
    const periods = [];
    
    for (let i = 1; i <= 7; i++) {
        periods.push(statuses[Math.floor(Math.random() * statuses.length)]);
    }
    
    return periods;
}

// Generate daily attendance records with period data
function generateDailyRecords(studentId, days = 30) {
    const records = [];
    const today = new Date();
    const notes = ['', '', '', '', 'Medical appointment', 'Family emergency', 'Late arrival'];
    
    for (let i = 0; i < days; i++) {
        const date = new Date(today);
        date.setDate(date.getDate() - i);
        
        // Skip weekends
        if (date.getDay() === 0 || date.getDay() === 6) continue;
        
        const periods = generatePeriodAttendance();
        const status = calculateStatus(periods[0], periods[3]); // Period 1 and Period 4
        const note = Math.random() > 0.7 ? notes[Math.floor(Math.random() * notes.length)] : '';
        
        records.push({
            date: date.toISOString().split('T')[0],
            day: date.toLocaleDateString('en-US', { weekday: 'short' }),
            periods: periods,
            status: status,
            note: note
        });
    }
    
    return records.reverse();
}

// Calculate summary statistics based on status codes
function calculateSummary(monthlyData, dailyRecords) {
    let totalDays = 0;
    let totalPresent = 0;
    let totalAbsent = 0;
    let totalLate = 0;
    let totalLeave = 0;
    
    // Count from daily records using status codes
    const statusCounts = {
        PP: 0, // Present-Present (count as present)
        PL: 0, // Present-Leave (count as present)
        PA: 0, // Present-Absent (count as absent)
        LL: 0, // Leave-Leave (count as leave)
        LP: 0, // Leave-Present (count as present)
        LA: 0, // Leave-Absent (count as absent)
        AA: 0, // Absent-Absent (count as absent)
        AP: 0, // Absent-Present (count as present)
        AL: 0  // Absent-Leave (count as absent)
    };
    
    dailyRecords.forEach(record => {
        if (record.status && record.status.code) {
            statusCounts[record.status.code] = (statusCounts[record.status.code] || 0) + 1;
            totalDays++;
        }
    });
    
    // Calculate totals based on status codes
    totalPresent = statusCounts.PP + statusCounts.PL + statusCounts.LP + statusCounts.AP;
    totalAbsent = statusCounts.PA + statusCounts.LA + statusCounts.AA + statusCounts.AL;
    totalLeave = statusCounts.LL;
    
    const overallPercentage = totalDays > 0 ? Math.round((totalPresent / totalDays) * 100) : 0;
    
    return {
        totalDays,
        totalPresent,
        totalAbsent,
        totalLate,
        totalLeave,
        overallPercentage,
        statusCounts
    };
}

// Calculate leave remaining
function calculateLeaveRemaining(leavesAllowed, totalLeave) {
    const remaining = leavesAllowed - totalLeave;
    return Math.max(0, remaining); // Ensure it doesn't go negative
}

// Load student data
function loadStudentData() {
    const student = studentData[studentId] || { name: 'Unknown Student', grade: '-', class: '-', leavesAllowed: 15 };
    
    document.getElementById('studentName').textContent = student.name;
    document.getElementById('studentGrade').textContent = `Grade ${student.grade}`;
    document.getElementById('studentClass').textContent = student.class;
    
    // Initialize leaves allowed
    const leavesAllowed = student.leavesAllowed || 15;
    document.getElementById('leavesAllowed').textContent = leavesAllowed;
    
    // Load monthly attendance
    const monthlyData = monthlyAttendanceData[studentId] || monthlyAttendanceData['S001'];
    const monthlyTable = document.getElementById('monthlyAttendanceTable');
    monthlyTable.innerHTML = '';
    
    monthlyData.forEach(month => {
        const percentageClass = month.percentage >= 95 ? 'high' : month.percentage >= 90 ? 'medium' : 'low';
        const statusClass = month.status === 'Excellent' ? 'paid' : 'active';
        
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Month"><strong>${month.month}</strong></td>
            <td data-label="Total Days">${month.totalDays}</td>
            <td data-label="Attendance %"><span class="percentage-badge ${percentageClass}">${month.percentage}%</span></td>
            <td data-label="Present"><span class="stat-badge present">${month.present}</span></td>
            <td data-label="Absent"><span class="stat-badge absent">${month.absent}</span></td>
            <td data-label="Late"><span class="stat-badge late">${month.late}</span></td>
            <td data-label="Leave">${month.leave}</td>
            <td data-label="Status"><span class="status-badge ${statusClass}">${month.status}</span></td>
        `;
        monthlyTable.appendChild(row);
    });
    
    // Summary will be updated when daily records are loaded
}

// Get period badge HTML
function getPeriodBadge(status) {
    const statusLower = status.toLowerCase();
    if (statusLower === 'present') {
        return '<span class="period-badge present">P</span>';
    } else if (statusLower === 'leave') {
        return '<span class="period-badge leave">L</span>';
    } else if (statusLower === 'absent') {
        return '<span class="period-badge absent">A</span>';
    }
    return '<span class="period-badge">-</span>';
}

// Get status badge HTML
function getStatusBadge(status) {
    if (!status || !status.code) return '<span class="status-code-badge">--</span>';
    
    const colorClass = {
        'green': 'status-green',
        'red': 'status-red',
        'orange': 'status-orange',
        'gray': 'status-gray'
    }[status.color] || 'status-gray';
    
    return `<span class="status-code-badge ${colorClass}" title="${status.label}">${status.code}</span>`;
}

// Load daily attendance records
function loadDailyRecords(days = 30) {
    const records = generateDailyRecords(studentId, days);
    const dailyTable = document.getElementById('dailyAttendanceTable');
    dailyTable.innerHTML = '';
    
    if (records.length === 0) {
        dailyTable.innerHTML = '<tr><td colspan="12" style="text-align: center; padding: 40px; color: #6b7280;">No attendance records found.</td></tr>';
        return;
    }
    
    records.forEach(record => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Date"><strong>${record.date}</strong></td>
            <td data-label="Day">${record.day}</td>
            <td data-label="P1">${getPeriodBadge(record.periods[0])}</td>
            <td data-label="P2">${getPeriodBadge(record.periods[1])}</td>
            <td data-label="P3">${getPeriodBadge(record.periods[2])}</td>
            <td data-label="Break" class="break-cell">-</td>
            <td data-label="P4">${getPeriodBadge(record.periods[3])}</td>
            <td data-label="P5">${getPeriodBadge(record.periods[4])}</td>
            <td data-label="P6">${getPeriodBadge(record.periods[5])}</td>
            <td data-label="P7">${getPeriodBadge(record.periods[6])}</td>
            <td data-label="Status">${getStatusBadge(record.status)}</td>
            <td data-label="Notes">${record.note || '-'}</td>
        `;
        dailyTable.appendChild(row);
    });
    
    // Update summary with new records
    updateSummaryWithRecords(records);
}

// Update summary with daily records
function updateSummaryWithRecords(records) {
    const summary = calculateSummary(monthlyAttendanceData[studentId] || monthlyAttendanceData['S001'], records);
    const percentageClass = summary.overallPercentage >= 95 ? 'high' : summary.overallPercentage >= 90 ? 'medium' : 'low';
    
    // Get student data for leaves allowed
    const student = studentData[studentId] || { leavesAllowed: 15 };
    const leavesAllowed = student.leavesAllowed || 15;
    const leaveRemaining = calculateLeaveRemaining(leavesAllowed, summary.totalLeave);
    
    document.getElementById('overallPercentage').textContent = `${summary.overallPercentage}%`;
    document.getElementById('overallPercentage').className = `percentage-badge ${percentageClass}`;
    document.getElementById('totalDays').textContent = summary.totalDays;
    document.getElementById('daysPresent').textContent = summary.totalPresent;
    document.getElementById('daysAbsent').textContent = summary.totalAbsent;
    document.getElementById('daysLate').textContent = summary.totalLate;
    document.getElementById('daysLeave').textContent = summary.totalLeave;
    document.getElementById('leavesAllowed').textContent = leavesAllowed;
    
    // Display leave remaining with appropriate styling
    const leaveRemainingEl = document.getElementById('leaveRemaining');
    leaveRemainingEl.textContent = leaveRemaining;
    if (leaveRemaining <= 3) {
        leaveRemainingEl.className = 'leave-remaining low';
    } else if (leaveRemaining <= 5) {
        leaveRemainingEl.className = 'leave-remaining medium';
    } else {
        leaveRemainingEl.className = 'leave-remaining high';
    }
}

// Filter attendance records
function filterAttendanceRecords() {
    const filterValue = document.getElementById('dateRangeFilter').value;
    const days = filterValue === 'all' ? 365 : parseInt(filterValue);
    loadDailyRecords(days);
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadStudentData();
    loadDailyRecords(30);
});
</script>

<style>
.stat-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    min-width: 60px;
    text-align: center;
}

.stat-badge.present {
    background: #ecfdf5;
    color: #10b981;
}

.stat-badge.absent {
    background: #fef2f2;
    color: #ef4444;
}

.stat-badge.late {
    background: #fffbeb;
    color: #f59e0b;
}

.stat-badge.leave {
    background: #eff6ff;
    color: #3b82f6;
}

.percentage-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    min-width: 60px;
    text-align: center;
}

.percentage-badge.high {
    background: #ecfdf5;
    color: #10b981;
}

.percentage-badge.medium {
    background: #fffbeb;
    color: #f59e0b;
}

.percentage-badge.low {
    background: #fef2f2;
    color: #ef4444;
}

.status-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.status-badge.paid {
    background: #ecfdf5;
    color: #10b981;
}

.status-badge.active {
    background: #eff6ff;
    color: #3b82f6;
}

.status-badge.draft {
    background: #f3f4f6;
    color: #6b7280;
}

/* Period Attendance Table Styles */
.period-attendance-table {
    min-width: 900px;
}

.period-group-header {
    background: #f0f9ff;
    text-align: center;
    font-weight: 600;
    color: #1e40af;
}

.break-header {
    background: #f9fafb;
    text-align: center;
    font-weight: 500;
    color: #6b7280;
    width: 40px;
}

.break-cell {
    background: #f9fafb;
    text-align: center;
    color: #9ca3af;
}

.period-badge {
    display: inline-block;
    width: 28px;
    height: 28px;
    border-radius: 4px;
    text-align: center;
    line-height: 28px;
    font-weight: 700;
    font-size: 12px;
}

.period-badge.present {
    background: #ecfdf5;
    color: #10b981;
}

.period-badge.leave {
    background: #fffbeb;
    color: #f59e0b;
}

.period-badge.absent {
    background: #fef2f2;
    color: #ef4444;
}

.status-code-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 13px;
    text-align: center;
    min-width: 40px;
    letter-spacing: 0.5px;
}

.status-code-badge.status-green {
    background: #ecfdf5;
    color: #10b981;
}

.status-code-badge.status-red {
    background: #fef2f2;
    color: #ef4444;
}

.status-code-badge.status-orange {
    background: #fffbeb;
    color: #f59e0b;
}

.status-code-badge.status-gray {
    background: #f3f4f6;
    color: #6b7280;
}

.leave-remaining {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    min-width: 40px;
    text-align: center;
}

.leave-remaining.high {
    background: #ecfdf5;
    color: #10b981;
}

.leave-remaining.medium {
    background: #fffbeb;
    color: #f59e0b;
}

.leave-remaining.low {
    background: #fef2f2;
    color: #ef4444;
}

@media (max-width: 768px) {
    .responsive-table {
        font-size: 14px;
    }
    
    .period-attendance-table {
        min-width: 700px;
    }
    
    .period-badge {
        width: 24px;
        height: 24px;
        line-height: 24px;
        font-size: 11px;
    }
}
</style>

<?php
$content = ob_get_clean();
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';
include __DIR__ . '/../components/' . $layout;
?>

