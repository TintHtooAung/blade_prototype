<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Teacher Dashboard';
$activePage = 'dashboard';

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

<!-- Statistics Grid - Top Row -->
            <div class="stats-grid">
                <!-- Active Classes -->
    <div class="stat-card clickable-card" onclick="window.location.href='/teacher/class-profiles'">
                    <div class="stat-icon blue">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                    <div class="stat-content">
                        <h3>5</h3>
                        <p>Active Classes</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> Today: 4 classes
            </div>
                    </div>
                </div>

                <!-- Total Students -->
    <div class="stat-card clickable-card" onclick="window.location.href='/teacher/student-profiles'">
                    <div class="stat-icon green">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3>142</h3>
                        <p>Total Students</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> Today: 138 (97.2%)
            </div>
                    </div>
                </div>

                <!-- Pending Assignments -->
    <div class="stat-card clickable-card" onclick="window.location.href='/teacher/enter-marks'">
                    <div class="stat-icon purple">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-content">
                        <h3>8</h3>
                        <p>Pending Assignments</p>
            <div class="stat-badge">This Week</div>
                    </div>
                </div>

                <!-- Upcoming Events -->
    <div class="stat-card clickable-card" onclick="window.location.href='/teacher/notispace-events'">
                    <div class="stat-icon yellow">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3>3</h3>
                        <p>Upcoming Events</p>
            <div class="stat-badge">This Month</div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Cards Row -->
<div class="row">
    <!-- Recent Activity -->
    <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <i class="fas fa-clock"></i>
                    <h5>Recent Activity</h5>
                <a href="/teacher/activity-logs" class="simple-btn-sm">View All</a>
                </div>
                <div class="dashboard-card-body">
                <div class="activity-item clickable-item" onclick="window.location.href='/teacher/attendance'">
                        <div class="activity-icon blue">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Attendance submitted for Math 101</h6>
                        <p>2 hours ago • Attendance</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/teacher/exam-results'">
                        <div class="activity-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Exam results published for Science 201</h6>
                        <p>5 hours ago • Results</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/teacher/enter-marks'">
                        <div class="activity-icon purple">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>New homework assignment created</h6>
                        <p>1 day ago • Assignment</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="col-lg-6">
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <i class="fas fa-bell"></i>
                <h5>Upcoming Events</h5>
                <a href="/teacher/notispace-events" class="simple-btn-sm">View All</a>
            </div>
            <div class="dashboard-card-body">
                <div class="activity-item clickable-item" onclick="window.location.href='/teacher/event-details?id=EVT001'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Parent-Teacher Conference</h6>
                        <p>Dec 22, 2024 • Meeting</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/teacher/event-details?id=EVT002'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Teacher Training Workshop</h6>
                        <p>Dec 20, 2024 • Training</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/teacher/event-details?id=EVT003'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Grade Review Meeting</h6>
                        <p>Dec 18, 2024 • Meeting</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Clickable Cards */
.clickable-card {
    cursor: pointer;
    transition: all 0.3s ease;
}

.clickable-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

/* Clickable Items */
.clickable-item {
    cursor: pointer;
    transition: background 0.2s ease;
    position: relative;
}

.clickable-item:hover {
    background: #f0f7ff;
}

.clickable-item .fa-chevron-right {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 0.85rem;
}

/* Small Button */
.simple-btn-sm {
    padding: 4px 12px;
    background: #1976d2;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
}

.simple-btn-sm:hover {
    background: #1565c0;
    color: #fff;
}

.dashboard-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
