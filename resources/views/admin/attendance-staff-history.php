<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Attendance History';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Attendance History';
$activePage = 'attendance-staff';

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

<!-- Main Content -->
<div style="margin-top: 24px;">
        <!-- Date Filter -->
        <div class="simple-section" style="margin-bottom: 24px;">
            <div class="simple-header">
                <h3 id="attendanceDateTitle">Staff Attendance History - <?php echo date('F d, Y'); ?></h3>
                <div class="simple-actions">
                    <div class="filter-group" style="display: flex; align-items: center; gap: 8px; flex-direction: row;">
                        <label for="attendanceDateFilter" style="margin: 0; white-space: nowrap;">Select Date:</label>
                        <input type="date" id="attendanceDateFilter" class="filter-select" value="<?php echo date('Y-m-d'); ?>" onchange="filterAttendanceByDate(this.value)" style="height: 36px; padding: 8px 12px; margin: 0;">
                    </div>
                    <button class="simple-btn secondary" onclick="setTodayDate()" title="Today" style="height: 36px; padding: 8px 16px; margin: 0;">
                        <i class="fas fa-calendar-day"></i> Today
                    </button>
                    <a href="/admin/attendance/staff" class="simple-btn primary" style="height: 36px; padding: 8px 16px; margin: 0; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fas fa-plus"></i> Collect Attendance
                    </a>
                </div>
            </div>
        </div>

        <!-- Staff Attendance History Table -->
        <div class="simple-section">
            <div class="simple-table-container">
                <table class="basic-table" id="attendanceTable">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Attendance %</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>EMP001</strong></td>
                            <td>John Miller</td>
                            <td>Administration</td>
                            <td>Secretary</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:00</td>
                            <td><span class="percentage-badge high">98.5%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP001" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMP002</strong></td>
                            <td>Maria Santos</td>
                            <td>Administration</td>
                            <td>Accountant</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:10</td>
                            <td><span class="percentage-badge high">99.2%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP002" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMP003</strong></td>
                            <td>Peter Johnson</td>
                            <td>Maintenance</td>
                            <td>Technician</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>07:45</td>
                            <td><span class="percentage-badge high">97.8%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP003" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMP004</strong></td>
                            <td>Anna Williams</td>
                            <td>Food Service</td>
                            <td>Cook</td>
                            <td><span class="stat-badge absent">Absent</span></td>
                            <td>-</td>
                            <td><span class="percentage-badge low">88.7%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP004" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMP005</strong></td>
                            <td>Carlos Rodriguez</td>
                            <td>Security</td>
                            <td>Guard</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>06:00</td>
                            <td><span class="percentage-badge high">99.5%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP005" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMP006</strong></td>
                            <td>Susan Davis</td>
                            <td>Library</td>
                            <td>Librarian</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:15</td>
                            <td><span class="percentage-badge high">98.9%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP006" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMP007</strong></td>
                            <td>Ahmed Hassan</td>
                            <td>IT Support</td>
                            <td>Technician</td>
                            <td><span class="stat-badge leave">Leave</span></td>
                            <td>-</td>
                            <td><span class="percentage-badge medium">92.3%</span></td>
                            <td>
                                <a href="/admin/attendance/staff-detail?staff=EMP007" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<script>
// Current selected date
let currentAttendanceDate = new Date();

function formatAttendanceDate(date) {
    const d = new Date(date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    d.setHours(0, 0, 0, 0);
    
    const options = { 
        weekday: 'long', 
        month: 'long', 
        day: 'numeric', 
        year: 'numeric' 
    };
    
    const dateString = d.toLocaleDateString('en-US', options);
    
    if (d.getTime() === today.getTime()) {
        return `Staff Attendance History - ${dateString}`;
    } else if (d < today) {
        return `Staff Attendance History - ${dateString}`;
    } else {
        return `Future Staff Attendance - ${dateString}`;
    }
}

function filterAttendanceByDate(dateString) {
    if (!dateString) return;
    currentAttendanceDate = new Date(dateString);
    const titleElement = document.getElementById('attendanceDateTitle');
    if (titleElement) {
        titleElement.textContent = formatAttendanceDate(dateString);
    }
    console.log('Loading attendance history for date:', dateString);
}

function setTodayDate() {
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    const dateFilter = document.getElementById('attendanceDateFilter');
    if (dateFilter) {
        dateFilter.value = dateString;
        filterAttendanceByDate(dateString);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    currentAttendanceDate = new Date(dateString);
});
</script>

<style>
/* Attendance Table Styles */
#attendanceTable {
    width: 100%;
}

#attendanceTable tbody tr:hover {
    background-color: #f9fafb;
}

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

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.action-btn.view-btn {
    background: #4A90E2;
    color: #fff;
}

.action-btn.view-btn:hover {
    background: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
}

.action-btn i {
    font-size: 12px;
}

@media (max-width: 768px) {
    #attendanceTable {
        font-size: 14px;
    }
    
    .action-btn {
        padding: 5px 10px;
        font-size: 12px;
    }
    
    .action-btn span {
        display: none;
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

