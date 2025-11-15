<?php
$pageTitle = 'Smart Campus Nova Hub - Attendance';
$pageIcon = 'fas fa-calendar-check';
$pageHeading = 'Attendance Records';
$activePage = 'attendance';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

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

<!-- Attendance Summary -->
<div class="detail-stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <p>Sarah's Attendance</p>
            <h3>96%</h3>
        </div>
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Present Days</p>
            <h3>138/144</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-calendar-check"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Michael's Attendance</p>
            <h3>94%</h3>
        </div>
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Present Days</p>
            <h3>135/144</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-calendar-check"></i>
        </div>
    </div>
</div>

<!-- Sarah's Attendance -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Sarah Johnson - Grade 9-A (Current Month)</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Status</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Oct 31, 2025</td>
                    <td>Friday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:45 AM</td>
                    <td>03:30 PM</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Oct 30, 2025</td>
                    <td>Thursday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:50 AM</td>
                    <td>03:30 PM</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Oct 29, 2025</td>
                    <td>Wednesday</td>
                    <td><span class="status-badge inactive">Absent</span></td>
                    <td>-</td>
                    <td>-</td>
                    <td>Sick Leave (Approved)</td>
                </tr>
                <tr>
                    <td>Oct 28, 2025</td>
                    <td>Tuesday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:48 AM</td>
                    <td>03:30 PM</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Oct 27, 2025</td>
                    <td>Monday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:55 AM</td>
                    <td>03:30 PM</td>
                    <td>Late arrival</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Michael's Attendance -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Michael Johnson - Grade 7-B (Current Month)</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Status</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Oct 31, 2025</td>
                    <td>Friday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:52 AM</td>
                    <td>03:00 PM</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Oct 30, 2025</td>
                    <td>Thursday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:55 AM</td>
                    <td>03:00 PM</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Oct 29, 2025</td>
                    <td>Wednesday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:50 AM</td>
                    <td>03:00 PM</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Oct 28, 2025</td>
                    <td>Tuesday</td>
                    <td><span class="status-badge inactive">Absent</span></td>
                    <td>-</td>
                    <td>-</td>
                    <td>Family Emergency</td>
                </tr>
                <tr>
                    <td>Oct 27, 2025</td>
                    <td>Monday</td>
                    <td><span class="status-badge active">Present</span></td>
                    <td>07:48 AM</td>
                    <td>03:00 PM</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
