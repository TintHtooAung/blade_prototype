<?php
$pageTitle = 'Smart Campus Nova Hub - Admin Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Admin Dashboard';
$activePage = 'dashboard';

ob_start();
?>
<!-- Statistics Grid - Top Row -->
<div class="stats-grid">
    <!-- Total Students -->
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="stat-content">
            <h3>986</h3>
            <p>Total Students</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> Today: 929 (94.2%)
            </div>
        </div>
    </div>

    <!-- Total Staff -->
    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="stat-content">
            <h3>45</h3>
            <p>Total Staff</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> Today: 43 (95.2%)
            </div>
        </div>
    </div>

    <!-- Total Teachers -->
    <div class="stat-card">
        <div class="stat-icon yellow">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="stat-content">
            <h3>111</h3>
            <p>Total Teachers</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> Today: 108 (97.5%)
            </div>
        </div>
    </div>

    <!-- Fee Collection -->
    <div class="stat-card">
        <div class="stat-icon purple">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="stat-content">
            <h3>87.5%</h3>
            <p>Fee Collection</p>
            <div class="stat-badge">This Month</div>
        </div>
    </div>
</div>

<!-- Statistics Grid - Bottom Row -->
<div class="stats-grid-secondary">
    <!-- Active Batch -->
    <div class="stat-card-secondary">
        <div class="stat-icon yellow">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h3>2024-2025</h3>
        <p>Active Batch</p>
        <div class="stat-badge">Current Academic Year</div>
    </div>

    <!-- Total Grades -->
    <div class="stat-card-secondary">
        <div class="stat-icon teal">
            <i class="fas fa-layer-group"></i>
        </div>
        <h3>12</h3>
        <p>Total Grades</p>
        <div class="stat-badge">Grade 1-12</div>
    </div>

    <!-- Total Classes -->
    <div class="stat-card-secondary">
        <div class="stat-icon blue">
            <i class="fas fa-chalkboard"></i>
        </div>
        <h3>48</h3>
        <p>Total Classes</p>
        <div class="stat-badge">Active Classes</div>
    </div>

    <!-- Total Subjects -->
    <div class="stat-card-secondary">
        <div class="stat-icon purple">
            <i class="fas fa-book"></i>
        </div>
        <h3>24</h3>
        <p>Total Subjects</p>
        <div class="stat-badge">All Grades</div>
    </div>
</div>

<!-- Dashboard Cards Row -->
<div class="row">
    <!-- Upcoming Events -->
    <div class="col-lg-6">
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <i class="fas fa-bell"></i>
                <h5>Upcoming Events</h5>
            </div>
            <div class="dashboard-card-body">
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Parent-Teacher Conference</h6>
                        <p>Jan 15, 2024 • Meeting</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Science Fair</h6>
                        <p>Jan 20, 2024 • Academic</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Sports Day</h6>
                        <p>Jan 25, 2024 • Sports</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Exams -->
    <div class="col-lg-6">
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <i class="fas fa-clipboard-list"></i>
                <h5>Upcoming Exams</h5>
            </div>
            <div class="dashboard-card-body">
                <div class="activity-item">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Mathematics Final Exam</h6>
                        <p>Feb 5, 2024 • Grade 10</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>English Literature Test</h6>
                        <p>Feb 8, 2024 • Grade 9</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Physics Mid-term</h6>
                        <p>Feb 12, 2024 • Grade 11</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();

include '__DIR__ . "/../components/admin-layout.php';
?>
