<?php
$pageTitle = 'Smart Campus Nova Hub - Class Attendance';
$pageIcon = 'fas fa-user-check';
$pageHeading = 'Class Attendance Details';
$activePage = 'attendance-student';
$className = $_GET['class'] ?? 'Grade 9-A';
$selectedDate = $_GET['date'] ?? date('Y-m-d');

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
        <h2><?php echo htmlspecialchars($className); ?> - Attendance History</h2>
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

<!-- Attendance Records Container -->
<div id="attendanceRecordsContainer" class="attendance-records-container">
    <!-- Records will be dynamically generated based on schedule -->
</div>

<script>
// Class schedule data - mapped from schedule planner structure
const classSchedule = {
    'Grade 9-A': [
        { time: '08:00-09:00', subject: 'Mathematics', teacher: 'Daw Khin Khin', room: 'A101' },
        { time: '09:00-10:00', subject: 'English', teacher: 'Ms. Sarah Johnson', room: 'A102' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Physics', teacher: 'U Aung Myint', room: 'LAB001' },
        { time: '11:30-12:30', subject: 'Chemistry', teacher: 'Daw Mya Mya', room: 'LAB002' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Biology', teacher: 'U Zaw Win', room: 'LAB003' },
        { time: '14:30-15:30', subject: 'Myanmar', teacher: 'Daw Aye Aye', room: 'A103' }
    ],
    'Grade 9-B': [
        { time: '08:00-09:00', subject: 'English', teacher: 'Ms. Sarah Johnson', room: 'A102' },
        { time: '09:00-10:00', subject: 'Mathematics', teacher: 'Daw Khin Khin', room: 'A101' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'History', teacher: 'U Kyaw Soe', room: 'A104' },
        { time: '11:30-12:30', subject: 'Geography', teacher: 'Daw Nu Nu', room: 'A105' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Physics', teacher: 'U Aung Myint', room: 'LAB001' },
        { time: '14:30-15:30', subject: 'Chemistry', teacher: 'Daw Mya Mya', room: 'LAB002' }
    ],
    'Grade 10-A': [
        { time: '08:00-09:00', subject: 'Advanced Mathematics', teacher: 'Dr. Anderson', room: 'A201' },
        { time: '09:00-10:00', subject: 'Literature', teacher: 'Ms. Garcia', room: 'A202' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Physics', teacher: 'Dr. Lee', room: 'LAB003' },
        { time: '11:30-12:30', subject: 'Chemistry', teacher: 'Ms. Martinez', room: 'LAB004' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Programming', teacher: 'Mr. Kim', room: 'LAB005' },
        { time: '14:30-15:30', subject: 'Art', teacher: 'Ms. Rodriguez', room: 'ART001' }
    ],
    'Grade 10-B': [
        { time: '08:00-09:00', subject: 'Mathematics', teacher: 'Mr. Johnson', room: 'Room 201' },
        { time: '09:00-10:00', subject: 'English', teacher: 'Ms. Williams', room: 'Room 102' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Science', teacher: 'Dr. Brown', room: 'Room 104' },
        { time: '11:30-12:30', subject: 'History', teacher: 'Mr. Smith', room: 'Room 103' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Physical Education', teacher: 'Coach Wilson', room: 'Gym' },
        { time: '14:30-15:30', subject: 'Art', teacher: 'Ms. Davis', room: 'Room 105' }
    ],
    'Grade 11-A': [
        { time: '08:00-09:00', subject: 'Calculus', teacher: 'Dr. Thompson', room: 'A301' },
        { time: '09:00-10:00', subject: 'Advanced English', teacher: 'Ms. White', room: 'A302' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Advanced Physics', teacher: 'Dr. Clark', room: 'LAB006' },
        { time: '11:30-12:30', subject: 'Biology', teacher: 'Dr. Lewis', room: 'LAB007' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Data Structures', teacher: 'Mr. Hall', room: 'LAB008' },
        { time: '14:30-15:30', subject: 'Economics', teacher: 'Ms. Adams', room: 'A303' }
    ],
    'Grade 11-B': [
        { time: '08:00-09:00', subject: 'Mathematics', teacher: 'Mr. Johnson', room: 'Room 201' },
        { time: '09:00-10:00', subject: 'English', teacher: 'Ms. Williams', room: 'Room 102' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Science', teacher: 'Dr. Brown', room: 'Room 104' },
        { time: '11:30-12:30', subject: 'History', teacher: 'Mr. Smith', room: 'Room 103' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Physical Education', teacher: 'Coach Wilson', room: 'Gym' },
        { time: '14:30-15:30', subject: 'Art', teacher: 'Ms. Davis', room: 'Room 105' }
    ],
    'Grade 12-A': [
        { time: '08:00-09:00', subject: 'Advanced Mathematics', teacher: 'Dr. Anderson', room: 'A401' },
        { time: '09:00-10:00', subject: 'English Literature', teacher: 'Ms. Garcia', room: 'A402' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Physics', teacher: 'Dr. Lee', room: 'LAB009' },
        { time: '11:30-12:30', subject: 'Chemistry', teacher: 'Ms. Martinez', room: 'LAB010' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Computer Science', teacher: 'Mr. Kim', room: 'LAB011' },
        { time: '14:30-15:30', subject: 'Economics', teacher: 'Ms. Adams', room: 'A403' }
    ],
    'Grade 12-B': [
        { time: '08:00-09:00', subject: 'Mathematics', teacher: 'Mr. Johnson', room: 'Room 201' },
        { time: '09:00-10:00', subject: 'English', teacher: 'Ms. Williams', room: 'Room 102' },
        { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
        { time: '10:30-11:30', subject: 'Science', teacher: 'Dr. Brown', room: 'Room 104' },
        { time: '11:30-12:30', subject: 'History', teacher: 'Mr. Smith', room: 'Room 103' },
        { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
        { time: '13:30-14:30', subject: 'Physical Education', teacher: 'Coach Wilson', room: 'Gym' },
        { time: '14:30-15:30', subject: 'Art', teacher: 'Ms. Davis', room: 'Room 105' }
    ]
};

// Sample attendance records data - in production, this would come from the database
const attendanceRecords = {
    '<?php echo date('Y-m-d'); ?>': {
        'Grade 9-A': {
            'Mathematics': [
                { id: 'S001', name: 'John Smith', status: 'present', time: '08:05', notes: '' },
                { id: 'S002', name: 'Sarah Johnson', status: 'present', time: '08:02', notes: '' },
                { id: 'S003', name: 'Mike Davis', status: 'present', time: '08:03', notes: '' },
                { id: 'S004', name: 'Emma Wilson', status: 'present', time: '08:01', notes: '' },
                { id: 'S005', name: 'Alex Brown', status: 'present', time: '08:04', notes: '' },
                { id: 'S006', name: 'Lisa Anderson', status: 'absent', time: '', notes: 'Sick' },
                { id: 'S007', name: 'David Lee', status: 'present', time: '08:06', notes: '' },
                { id: 'S008', name: 'Sophia Martinez', status: 'present', time: '08:02', notes: '' },
                { id: 'S009', name: 'James Taylor', status: 'leave', time: '', notes: 'Approved leave' },
                { id: 'S010', name: 'Olivia White', status: 'present', time: '08:03', notes: '' }
            ],
            'English': [
                { id: 'S001', name: 'John Smith', status: 'present', time: '09:05', notes: '' },
                { id: 'S002', name: 'Sarah Johnson', status: 'present', time: '09:02', notes: '' },
                { id: 'S003', name: 'Mike Davis', status: 'present', time: '09:03', notes: '' },
                { id: 'S004', name: 'Emma Wilson', status: 'present', time: '09:01', notes: '' },
                { id: 'S005', name: 'Alex Brown', status: 'present', time: '09:04', notes: '' },
                { id: 'S006', name: 'Lisa Anderson', status: 'absent', time: '', notes: 'Sick' },
                { id: 'S007', name: 'David Lee', status: 'present', time: '09:06', notes: '' },
                { id: 'S008', name: 'Sophia Martinez', status: 'present', time: '09:02', notes: '' },
                { id: 'S009', name: 'James Taylor', status: 'leave', time: '', notes: 'Approved leave' },
                { id: 'S010', name: 'Olivia White', status: 'present', time: '09:03', notes: '' }
            ],
            'Physics': [
                { id: 'S001', name: 'John Smith', status: 'present', time: '10:35', notes: '' },
                { id: 'S002', name: 'Sarah Johnson', status: 'present', time: '10:32', notes: '' },
                { id: 'S003', name: 'Mike Davis', status: 'present', time: '10:33', notes: '' },
                { id: 'S004', name: 'Emma Wilson', status: 'present', time: '10:31', notes: '' },
                { id: 'S005', name: 'Alex Brown', status: 'present', time: '10:34', notes: '' },
                { id: 'S006', name: 'Lisa Anderson', status: 'absent', time: '', notes: 'Sick' },
                { id: 'S007', name: 'David Lee', status: 'present', time: '10:36', notes: '' },
                { id: 'S008', name: 'Sophia Martinez', status: 'present', time: '10:32', notes: '' },
                { id: 'S009', name: 'James Taylor', status: 'leave', time: '', notes: 'Approved leave' },
                { id: 'S010', name: 'Olivia White', status: 'present', time: '10:33', notes: '' }
            ]
        }
    }
};

// Initialize attendance records display
function initializeAttendanceRecords() {
    const className = '<?php echo htmlspecialchars($className); ?>';
    const schedule = classSchedule[className] || classSchedule['Grade 9-A'];
    const container = document.getElementById('attendanceRecordsContainer');
    const selectedDate = document.getElementById('attendanceDateFilter').value;
    
    container.innerHTML = '';
    
    // Get records for this date and class
    const dateRecords = attendanceRecords[selectedDate] || {};
    const classRecords = dateRecords[className] || {};
    
    // Calculate period numbers (P1, P2, etc.) - only count actual subjects
    let periodNumber = 0;
    
    schedule.forEach((period, index) => {
        // Skip breaks and lunch
        if (period.subject === 'Break' || period.subject === 'Lunch') {
            return;
        }
        
        // Increment period number for actual subjects
        periodNumber++;
        const periodLabel = `P${periodNumber}`;
        
        const subjectRecords = classRecords[period.subject] || [];
        const presentCount = subjectRecords.filter(r => r.status === 'present').length;
        const absentCount = subjectRecords.filter(r => r.status === 'absent').length;
        const leaveCount = subjectRecords.filter(r => r.status === 'leave').length;
        const totalCount = subjectRecords.length;
        const attendancePercent = totalCount > 0 ? ((presentCount / totalCount) * 100).toFixed(1) : 0;
        
        const recordHTML = `
            <div class="attendance-record-section">
                <div class="record-header">
                    <div class="record-title">
                        <h3>
                            <i class="fas ${getSubjectIcon(period.subject)}"></i>
                            ${periodLabel} - ${period.subject}
                        </h3>
                        <div class="record-meta">
                            <span class="time-badge"><i class="fas fa-clock"></i> ${period.time}</span>
                            <span class="teacher-badge"><i class="fas fa-chalkboard-teacher"></i> ${period.teacher}</span>
                            <span class="room-badge"><i class="fas fa-door-open"></i> ${period.room}</span>
                        </div>
                    </div>
                    <div class="record-stats">
                        <span class="stat-badge present">Present: ${presentCount}</span>
                        <span class="stat-badge absent">Absent: ${absentCount}</span>
                        <span class="stat-badge leave">Leave: ${leaveCount}</span>
                        <span class="percentage-badge ${getPercentageClass(attendancePercent)}">${attendancePercent}%</span>
                    </div>
    </div>

                ${subjectRecords.length > 0 ? `
                    <div class="record-content">
    <div class="simple-table-container">
        <table class="basic-table">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
            <tbody>
                                    ${subjectRecords.map(record => `
                                        <tr>
                                            <td><strong>${record.id}</strong></td>
                                            <td>${record.name}</td>
                                            <td>
                                                ${getStatusBadge(record.status)}
                                            </td>
                                            <td>${record.time || '-'}</td>
                                            <td>${record.notes || '-'}</td>
                                        </tr>
                                    `).join('')}
            </tbody>
        </table>
    </div>
</div>
                ` : `
                    <div class="record-content">
                        <div class="no-records">
                            <i class="fas fa-inbox"></i>
                            <p>No attendance records found for this subject on ${formatDate(selectedDate)}</p>
                        </div>
                    </div>
                `}
            </div>
        `;
        
        container.innerHTML += recordHTML;
    });
}

// Get subject icon
function getSubjectIcon(subject) {
    const icons = {
        'Mathematics': 'fa-calculator',
        'Advanced Mathematics': 'fa-calculator',
        'Calculus': 'fa-calculator',
        'English': 'fa-book',
        'English Literature': 'fa-book',
        'Advanced English': 'fa-book',
        'Literature': 'fa-book',
        'Science': 'fa-flask',
        'Physics': 'fa-atom',
        'Advanced Physics': 'fa-atom',
        'Chemistry': 'fa-flask',
        'Biology': 'fa-dna',
        'History': 'fa-landmark',
        'Geography': 'fa-globe',
        'Myanmar': 'fa-book-open',
        'Physical Education': 'fa-running',
        'Art': 'fa-palette',
        'Music': 'fa-music',
        'Programming': 'fa-code',
        'Computer Science': 'fa-laptop-code',
        'Data Structures': 'fa-sitemap',
        'Economics': 'fa-chart-line'
    };
    return icons[subject] || 'fa-book-open';
}

// Get status badge HTML
function getStatusBadge(status) {
    const badges = {
        'present': '<span class="status-badge paid">Present</span>',
        'absent': '<span class="status-badge overdue">Absent</span>',
        'leave': '<span class="status-badge draft">Leave</span>'
    };
    return badges[status] || '<span class="status-badge">-</span>';
}

// Get percentage class for styling
function getPercentageClass(percent) {
    if (percent >= 95) return 'high';
    if (percent >= 85) return 'medium';
    return 'low';
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
    initializeAttendanceRecords();
});
</script>

<style>
.attendance-records-container {
    display: flex;
    flex-direction: column;
    gap: 24px;
    margin-top: 24px;
}

.attendance-record-section {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.record-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 2px solid #e5e7eb;
}

.record-title h3 {
    margin: 0 0 12px 0;
    font-size: 20px;
    font-weight: 700;
    color: #111827;
    display: flex;
    align-items: center;
    gap: 10px;
}

.record-title h3 i {
    color: #4A90E2;
    font-size: 22px;
}

.record-meta {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.time-badge, .teacher-badge, .room-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    background: #f3f4f6;
    border-radius: 6px;
    font-size: 13px;
    color: #6b7280;
    font-weight: 500;
}

.time-badge i, .teacher-badge i, .room-badge i {
    font-size: 12px;
    color: #4A90E2;
}

.record-stats {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.stat-badge {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
}

.stat-badge.present {
    background: #ecfdf5;
    color: #10b981;
}

.stat-badge.absent {
    background: #fef2f2;
    color: #ef4444;
}

.stat-badge.leave {
    background: #eff6ff;
    color: #3b82f6;
}

.percentage-badge {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
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

.record-content {
    margin-top: 16px;
}

.no-records {
    text-align: center;
    padding: 48px 24px;
    color: #6b7280;
}

.no-records i {
    font-size: 48px;
    color: #d1d5db;
    margin-bottom: 16px;
}

.no-records p {
    margin: 0;
    font-size: 15px;
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
    .record-header {
        flex-direction: column;
        gap: 16px;
    }
    
    .record-stats {
        width: 100%;
    }
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
