<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Attendance History';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Attendance History';
$activePage = 'attendance-teacher';

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
        <!-- Teacher Attendance History Table -->
        <div class="simple-section">
            <div class="simple-table-container">
                <table class="basic-table" id="attendanceTable">
                    <thead>
                        <tr>
                            <th>Teacher ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Attendance %</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>T001</strong></td>
                            <td>Dr. Emily Parker</td>
                            <td>Mathematics</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:15</td>
                            <td><span class="percentage-badge high">98.5%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T001" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T002</strong></td>
                            <td>Mr. David Lee</td>
                            <td>History</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:10</td>
                            <td><span class="percentage-badge high">99.2%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T002" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T003</strong></td>
                            <td>Ms. Sarah Chen</td>
                            <td>English</td>
                            <td><span class="stat-badge leave">Leave</span></td>
                            <td>-</td>
                            <td><span class="percentage-badge medium">92.3%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T003" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T004</strong></td>
                            <td>Prof. James Wilson</td>
                            <td>Science</td>
                            <td><span class="stat-badge absent">Absent</span></td>
                            <td>-</td>
                            <td><span class="percentage-badge low">88.7%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T004" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T005</strong></td>
                            <td>Ms. Lisa Wong</td>
                            <td>Art</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:20</td>
                            <td><span class="percentage-badge high">97.8%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T005" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T006</strong></td>
                            <td>Mr. Michael Brown</td>
                            <td>Physical Education</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:05</td>
                            <td><span class="percentage-badge high">99.5%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T006" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T007</strong></td>
                            <td>Dr. Helen Thompson</td>
                            <td>Chemistry</td>
                            <td><span class="stat-badge absent">Absent</span></td>
                            <td>-</td>
                            <td><span class="percentage-badge medium">91.2%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T007" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T008</strong></td>
                            <td>Mr. Robert Kim</td>
                            <td>Music</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:25</td>
                            <td><span class="percentage-badge high">98.9%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T008" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T009</strong></td>
                            <td>Daw Khin Khin</td>
                            <td>Mathematics</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:12</td>
                            <td><span class="percentage-badge high">99.1%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T009" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T010</strong></td>
                            <td>Ms. Sarah Johnson</td>
                            <td>English</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:08</td>
                            <td><span class="percentage-badge high">98.3%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T010" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T011</strong></td>
                            <td>U Aung Myint</td>
                            <td>Physics</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:18</td>
                            <td><span class="percentage-badge high">97.6%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T011" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>T012</strong></td>
                            <td>Daw Mya Mya</td>
                            <td>Chemistry</td>
                            <td><span class="stat-badge present">Present</span></td>
                            <td>08:14</td>
                            <td><span class="percentage-badge high">98.7%</span></td>
                            <td>
                                <a href="/admin/attendance/teacher-detail?teacher=T012" class="action-btn view-btn" title="View Details">
                                    <i class="fas fa-eye"></i> <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>


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

