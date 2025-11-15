<?php
$pageTitle = 'Smart Campus Nova Hub - Parent Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Dashboard';
$activePage = 'dashboard';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Welcome Header -->
<div class="welcome-header">
    <div class="welcome-content">
        <h1 class="welcome-title">Welcome back, Parent! 👋</h1>
        <p class="welcome-subtitle">Stay connected with your children's progress</p>
    </div>
    <div class="welcome-time">
        <div class="current-date" id="currentDate"></div>
        <div class="current-time" id="currentTime"></div>
    </div>
</div>

<style>
/* Welcome Header Styles */
.welcome-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding: 24px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    color: #fff;
    flex-wrap: wrap;
    gap: 16px;
}

.welcome-content {
    flex: 1;
    min-width: 250px;
}

.welcome-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 8px 0;
    color: #fff;
    line-height: 1.2;
}

.welcome-subtitle {
    font-size: 1rem;
    margin: 0;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 400;
}

.welcome-time {
    text-align: right;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.current-date {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #fff;
}

.current-time {
    font-size: 1.5rem;
    font-weight: 700;
    color: #fff;
}

@media (max-width: 768px) {
    .welcome-header {
        padding: 20px;
        flex-direction: column;
        align-items: flex-start;
    }
    
    .welcome-title {
        font-size: 1.5rem;
    }
    
    .welcome-subtitle {
        font-size: 0.9375rem;
    }
    
    .welcome-time {
        width: 100%;
        text-align: left;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    
    .current-time {
        font-size: 1.25rem;
    }
}
</style>

<script>
// Update time and date
function updateDateTime() {
    const now = new Date();
    
    // Update date
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateStr = now.toLocaleDateString('en-US', dateOptions);
    document.getElementById('currentDate').textContent = dateStr;
    
    // Update time
    const timeStr = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
    document.getElementById('currentTime').textContent = timeStr;
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateDateTime();
    // Update time every minute
    setInterval(updateDateTime, 60000);
});
</script>

<!-- Dashboard Statistics -->
<div class="detail-stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <p>My Children</p>
            <h3>2</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-child"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Pending Fees</p>
            <h3>$450</h3>
        </div>
        <div class="stat-icon red">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Pending Homework</p>
            <h3>5</h3>
        </div>
        <div class="stat-icon orange">
            <i class="fas fa-tasks"></i>
        </div>
    </div>
    <div class="stat-card">
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
