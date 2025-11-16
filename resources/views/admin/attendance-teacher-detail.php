<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Attendance';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Attendance Details';
$activePage = 'attendance-teacher';
$teacherId = $_GET['teacher'] ?? 'T001';
$selectedDate = $_GET['date'] ?? date('Y-m-d');

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/attendance/teacher" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Teacher Attendance
    </a>
</div>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2>Teacher Attendance History</h2>
    </div>
</div>

<!-- Date Filter -->
<div class="simple-section" style="margin-bottom: 24px;">
    <div class="simple-header">
        <h3>Attendance Records</h3>
        <div class="simple-actions">
            <div class="filter-group" style="display: flex; align-items: center; gap: 8px; flex-direction: row;">
                <label for="attendanceDateFilter" style="margin: 0; white-space: nowrap;">Select Date:</label>
                <input type="date" id="attendanceDateFilter" class="filter-select" value="<?php echo htmlspecialchars($selectedDate); ?>" onchange="filterAttendanceByDate(this.value)" style="height: 36px; padding: 8px 12px; margin: 0;">
            </div>
            <button class="simple-btn secondary" onclick="setTodayDate()" title="Today" style="height: 36px; padding: 8px 16px; margin: 0;">
                <i class="fas fa-calendar-day"></i> Today
            </button>
        </div>
    </div>
</div>

<!-- Teacher Info and Attendance Records -->
<div id="teacherAttendanceContainer" class="teacher-attendance-container">
    <!-- Teacher info and records will be dynamically generated -->
</div>

<script>
// Teacher data
const teachers = {
    'T001': { id: 'T001', name: 'Dr. Emily Parker', department: 'Mathematics', email: 'emily.parker@school.edu', leavesAllowed: 12 },
    'T002': { id: 'T002', name: 'Mr. David Lee', department: 'History', email: 'david.lee@school.edu', leavesAllowed: 12 },
    'T003': { id: 'T003', name: 'Ms. Sarah Chen', department: 'English', email: 'sarah.chen@school.edu', leavesAllowed: 12 },
    'T004': { id: 'T004', name: 'Prof. James Wilson', department: 'Science', email: 'james.wilson@school.edu', leavesAllowed: 12 },
    'T005': { id: 'T005', name: 'Ms. Lisa Wong', department: 'Art', email: 'lisa.wong@school.edu', leavesAllowed: 12 },
    'T006': { id: 'T006', name: 'Mr. Michael Brown', department: 'Physical Education', email: 'michael.brown@school.edu', leavesAllowed: 12 },
    'T007': { id: 'T007', name: 'Dr. Helen Thompson', department: 'Chemistry', email: 'helen.thompson@school.edu', leavesAllowed: 12 },
    'T008': { id: 'T008', name: 'Mr. Robert Kim', department: 'Music', email: 'robert.kim@school.edu', leavesAllowed: 12 },
    'T009': { id: 'T009', name: 'Daw Khin Khin', department: 'Mathematics', email: 'khinkhin@school.edu', leavesAllowed: 12 },
    'T010': { id: 'T010', name: 'Ms. Sarah Johnson', department: 'English', email: 'sarah.johnson@school.edu', leavesAllowed: 12 },
    'T011': { id: 'T011', name: 'U Aung Myint', department: 'Physics', email: 'aungmyint@school.edu', leavesAllowed: 12 },
    'T012': { id: 'T012', name: 'Daw Mya Mya', department: 'Chemistry', email: 'myamya@school.edu', leavesAllowed: 12 }
};

// Sample attendance records - in production, this would come from the database
const attendanceRecords = {
    '<?php echo date('Y-m-d'); ?>': {
        'T001': { status: 'present', time: '08:15', notes: '' },
        'T002': { status: 'present', time: '08:10', notes: '' },
        'T003': { status: 'leave', time: '', notes: 'Approved leave' },
        'T004': { status: 'absent', time: '', notes: 'Sick leave' },
        'T005': { status: 'present', time: '08:20', notes: '' },
        'T006': { status: 'present', time: '08:05', notes: '' },
        'T007': { status: 'absent', time: '', notes: 'Family emergency' },
        'T008': { status: 'present', time: '08:25', notes: '' },
        'T009': { status: 'present', time: '08:12', notes: '' },
        'T010': { status: 'present', time: '08:08', notes: '' },
        'T011': { status: 'present', time: '08:18', notes: '' },
        'T012': { status: 'present', time: '08:14', notes: '' }
    }
};

// Monthly attendance summary (for display)
const monthlySummary = {
    'T001': { totalDays: 22, present: 22, absent: 0, leave: 0, percentage: 100.0 },
    'T002': { totalDays: 22, present: 22, absent: 0, leave: 0, percentage: 100.0 },
    'T003': { totalDays: 22, present: 20, absent: 0, leave: 2, percentage: 90.9 },
    'T004': { totalDays: 22, present: 19, absent: 3, leave: 0, percentage: 86.4 },
    'T005': { totalDays: 22, present: 21, absent: 1, leave: 0, percentage: 95.5 },
    'T006': { totalDays: 22, present: 22, absent: 0, leave: 0, percentage: 100.0 },
    'T007': { totalDays: 22, present: 20, absent: 2, leave: 0, percentage: 90.9 },
    'T008': { totalDays: 22, present: 22, absent: 0, leave: 0, percentage: 100.0 },
    'T009': { totalDays: 22, present: 22, absent: 0, leave: 0, percentage: 100.0 },
    'T010': { totalDays: 22, present: 21, absent: 1, leave: 0, percentage: 95.5 },
    'T011': { totalDays: 22, present: 21, absent: 1, leave: 0, percentage: 95.5 },
    'T012': { totalDays: 22, present: 22, absent: 0, leave: 0, percentage: 100.0 }
};

// Initialize teacher attendance display
function initializeTeacherAttendance() {
    const teacherId = '<?php echo htmlspecialchars($teacherId); ?>';
    const teacher = teachers[teacherId] || teachers['T001'];
    const container = document.getElementById('teacherAttendanceContainer');
    const selectedDate = document.getElementById('attendanceDateFilter').value;
    
    // Get today's record
    const dateRecords = attendanceRecords[selectedDate] || {};
    const todayRecord = dateRecords[teacherId] || { status: null, time: '', notes: '' };
    
    // Get monthly summary
    const summary = monthlySummary[teacherId] || { totalDays: 0, present: 0, absent: 0, leave: 0, percentage: 0 };
    
    container.innerHTML = `
        <!-- Teacher Info Card -->
        <div class="teacher-info-card">
            <div class="teacher-avatar-large">
                ${teacher.name.split(' ').map(n => n[0]).join('').substring(0, 2)}
            </div>
            <div class="teacher-details-large">
                <h3>${teacher.name}</h3>
                <p class="teacher-dept"><i class="fas fa-building"></i> ${teacher.department} Department</p>
                <p class="teacher-email"><i class="fas fa-envelope"></i> ${teacher.email}</p>
            </div>
            <div class="teacher-stats-large">
                <div class="stat-box">
                    <div class="stat-value">${summary.percentage.toFixed(1)}%</div>
                    <div class="stat-label">Monthly Attendance</div>
                </div>
            </div>
        </div>
        
        <!-- Today's Attendance -->
        <div class="simple-section" style="margin-top: 24px;">
            <div class="simple-header">
                <h3>Today's Attendance - ${formatDate(selectedDate)}</h3>
            </div>
            <div class="simple-table-container">
                <table class="basic-table">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">Status</th>
                            <td>${getStatusBadge(todayRecord.status || 'not-recorded')}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>${todayRecord.time || '-'}</td>
                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td>${todayRecord.notes || '-'}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Monthly Summary -->
        <div class="simple-section" style="margin-top: 24px;">
            <div class="simple-header">
                <h3>Monthly Summary - ${new Date().toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</h3>
            </div>
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-icon present">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="summary-content">
                        <div class="summary-value">${summary.present}</div>
                        <div class="summary-label">Present Days</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon absent">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="summary-content">
                        <div class="summary-value">${summary.absent}</div>
                        <div class="summary-label">Absent Days</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon leave">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <div class="summary-content">
                        <div class="summary-value">${summary.leave}</div>
                        <div class="summary-label">Leave Days</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon total">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="summary-content">
                        <div class="summary-value">${summary.totalDays}</div>
                        <div class="summary-label">Total Days</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon allowed">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="summary-content">
                        <div class="summary-value">${teacher.leavesAllowed || 12}</div>
                        <div class="summary-label">Leaves Allowed</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon remaining ${getLeaveRemainingClass(teacher.leavesAllowed || 12, summary.leave)}">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="summary-content">
                        <div class="summary-value">${Math.max(0, (teacher.leavesAllowed || 12) - summary.leave)}</div>
                        <div class="summary-label">Leave Remaining</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Attendance History Table -->
        <div class="simple-section" style="margin-top: 24px;">
            <div class="simple-header">
                <h3>Attendance History</h3>
            </div>
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${generateAttendanceHistory(teacherId)}
                    </tbody>
                </table>
            </div>
        </div>
    `;
}

// Generate attendance history rows
function generateAttendanceHistory(teacherId) {
    const rows = [];
    const today = new Date();
    const summary = monthlySummary[teacherId] || { totalDays: 22, present: 20, absent: 2, leave: 0 };
    
    // Generate last 30 days of records
    for (let i = 0; i < 30; i++) {
        const date = new Date(today);
        date.setDate(date.getDate() - i);
        const dateString = date.toISOString().split('T')[0];
        const dayName = date.toLocaleDateString('en-US', { weekday: 'short' });
        
        // Determine status based on summary distribution
        let status = 'present';
        if (i < summary.absent) {
            status = 'absent';
        } else if (i < summary.absent + summary.leave) {
            status = 'leave';
        }
        
        const time = status === 'present' ? '08:' + String(Math.floor(Math.random() * 20) + 5).padStart(2, '0') : '';
        const notes = status === 'absent' ? 'Sick leave' : status === 'leave' ? 'Approved leave' : '';
        
        rows.push(`
            <tr>
                <td>${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                <td>${dayName}</td>
                <td>${getStatusBadge(status)}</td>
                <td>${time || '-'}</td>
                <td>${notes || '-'}</td>
            </tr>
        `);
    }
    
    return rows.join('');
}

// Get leave remaining class for styling
function getLeaveRemainingClass(leavesAllowed, totalLeave) {
    const remaining = leavesAllowed - totalLeave;
    if (remaining <= 3) return 'low';
    if (remaining <= 5) return 'medium';
    return 'high';
}

// Get status badge HTML
function getStatusBadge(status) {
    const badges = {
        'present': '<span class="status-badge paid">Present</span>',
        'absent': '<span class="status-badge overdue">Absent</span>',
        'leave': '<span class="status-badge draft">Leave</span>',
        'not-recorded': '<span class="status-badge">Not Recorded</span>'
    };
    return badges[status] || '<span class="status-badge">-</span>';
}

// Format date for display
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
}

// Filter by date
function filterAttendanceByDate(dateString) {
    if (!dateString) return;
    const url = new URL(window.location);
    url.searchParams.set('date', dateString);
    window.location.href = url.toString();
}

// Set today's date
function setTodayDate() {
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    const dateFilter = document.getElementById('attendanceDateFilter');
    if (dateFilter) {
        dateFilter.value = dateString;
        filterAttendanceByDate(dateString);
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeTeacherAttendance();
});
</script>

<style>
.teacher-attendance-container {
    margin-top: 24px;
}

.teacher-info-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 24px;
    margin-bottom: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.teacher-avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 28px;
    flex-shrink: 0;
}

.teacher-details-large h3 {
    margin: 0 0 8px 0;
    font-size: 24px;
    font-weight: 700;
    color: #111827;
}

.teacher-dept, .teacher-email {
    margin: 4px 0;
    font-size: 14px;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 8px;
}

.teacher-dept i, .teacher-email i {
    color: #4A90E2;
    width: 16px;
}

.teacher-stats-large {
    margin-left: auto;
}

.stat-box {
    text-align: center;
    padding: 16px 24px;
    background: #f9fafb;
    border-radius: 8px;
}

.stat-value {
    font-size: 32px;
    font-weight: 700;
    color: #111827;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 13px;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.summary-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.2s ease;
}

.summary-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.summary-icon.present {
    background: #ecfdf5;
    color: #10b981;
}

.summary-icon.absent {
    background: #fef2f2;
    color: #ef4444;
}

.summary-icon.leave {
    background: #eff6ff;
    color: #3b82f6;
}

.summary-icon.total {
    background: #f3f4f6;
    color: #6b7280;
}

.summary-icon.allowed {
    background: #e0f2f1;
    color: #14b8a6;
}

.summary-icon.remaining {
    background: #ecfdf5;
    color: #10b981;
}

.summary-icon.remaining.low {
    background: #fef2f2;
    color: #ef4444;
}

.summary-icon.remaining.medium {
    background: #fffbeb;
    color: #f59e0b;
}

.summary-icon.remaining.high {
    background: #ecfdf5;
    color: #10b981;
}

.summary-content {
    flex: 1;
}

.summary-value {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
    line-height: 1;
    margin-bottom: 4px;
}

.summary-label {
    font-size: 13px;
    color: #6b7280;
}

.status-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
}

.status-badge.paid {
    background: #ecfdf5;
    color: #10b981;
}

.status-badge.overdue {
    background: #fef2f2;
    color: #ef4444;
}

.status-badge.draft {
    background: #eff6ff;
    color: #3b82f6;
}

@media (max-width: 768px) {
    .teacher-info-card {
        flex-direction: column;
        text-align: center;
    }
    
    .teacher-stats-large {
        margin-left: 0;
        width: 100%;
    }
    
    .summary-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

