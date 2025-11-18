<?php
$pageTitle = 'Smart Campus Nova Hub - Parent Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Dashboard';
$activePage = 'dashboard';

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

<!-- Dashboard Statistics -->
<div class="detail-stats-grid">
    <div class="stat-card" onclick="window.location.href='/parent/my-children'" style="cursor: pointer;">
        <div class="stat-content">
            <p>My Children</p>
            <h3>2</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-child"></i>
        </div>
    </div>
    <div class="stat-card" onclick="window.location.href='/parent/fee-payment'" style="cursor: pointer;">
        <div class="stat-content">
            <p>Pending Fees</p>
            <h3>$450</h3>
        </div>
        <div class="stat-icon red">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="stat-card" onclick="window.location.href='/parent/homework'" style="cursor: pointer;">
        <div class="stat-content">
            <p>Pending Homework</p>
            <h3>5</h3>
        </div>
        <div class="stat-icon orange">
            <i class="fas fa-tasks"></i>
        </div>
    </div>
    <div class="stat-card" onclick="window.location.href='/parent/announcements'" style="cursor: pointer;">
        <div class="stat-content">
            <p>New Announcements</p>
            <h3>3</h3>
        </div>
        <div class="stat-icon green">
            <i class="fas fa-bullhorn"></i>
        </div>
    </div>
</div>

<!-- Quick Summary -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Student Overview</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Grade</th>
                    <th>Attendance</th>
                    <th>Current Grade</th>
                    <th>Pending HW</th>
                    <th>Pending Fees</th>
                    <th style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Sarah Johnson</strong></td>
                    <td>Grade 9-A</td>
                    <td><span style="color: #10b981; font-weight: 600;">96%</span></td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>2</td>
                    <td><span style="color: #ef4444; font-weight: 600;">$250</span></td>
                    <td>
                        <button class="simple-btn secondary small" onclick="window.location.href='/parent/my-children'">View</button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Michael Johnson</strong></td>
                    <td>Grade 7-B</td>
                    <td><span style="color: #10b981; font-weight: 600;">94%</span></td>
                    <td><span class="status-badge active">A</span></td>
                    <td>3</td>
                    <td><span style="color: #ef4444; font-weight: 600;">$200</span></td>
                    <td>
                        <button class="simple-btn secondary small" onclick="window.location.href='/parent/my-children'">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Recent Announcements -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Recent Announcements</h3>
        <a href="/parent/announcements" class="simple-btn secondary small">View All</a>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Priority</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Oct 30, 2025</td>
                    <td><strong>Parent-Teacher Meeting</strong><br>
                        <small style="color: #6b7280;">Meeting scheduled for November 5th, 2025</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td><span class="status-badge inactive">High</span></td>
                </tr>
                <tr>
                    <td>Oct 28, 2025</td>
                    <td><strong>Annual Sports Day</strong><br>
                        <small style="color: #6b7280;">Sports Day will be held on November 15th</small>
                    </td>
                    <td><span class="type-badge">Event</span></td>
                    <td><span class="status-badge pending">Medium</span></td>
                </tr>
                <tr>
                    <td>Oct 25, 2025</td>
                    <td><strong>Mid-Term Results Published</strong><br>
                        <small style="color: #6b7280;">Mid-term examination results are now available</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td><span class="status-badge inactive">High</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Upcoming Events -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Upcoming Events</h3>
        <a href="/parent/event-calendar" class="simple-btn secondary small">View Calendar</a>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Nov 05, 2025</strong></td>
                    <td><strong>Parent-Teacher Meeting</strong><br>
                        <small style="color: #6b7280;">Discuss student progress</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td>Main Hall</td>
                </tr>
                <tr>
                    <td><strong>Nov 10, 2025</strong></td>
                    <td><strong>Final Exam Registration</strong><br>
                        <small style="color: #6b7280;">Last date for registration</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td>Admin Office</td>
                </tr>
                <tr>
                    <td><strong>Nov 15, 2025</strong></td>
                    <td><strong>Annual Sports Day</strong><br>
                        <small style="color: #6b7280;">Inter-school sports competition</small>
                    </td>
                    <td><span class="type-badge">Sports</span></td>
                    <td>Sports Ground</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
