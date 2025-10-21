<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Staff Dashboard';
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
                <!-- Upcoming Events -->
    <div class="stat-card clickable-card" onclick="window.location.href='/staff/event-planner'">
                    <div class="stat-icon purple">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3>8</h3>
                        <p>Upcoming Events</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> This Week: 3 events
            </div>
                    </div>
                </div>

                <!-- Active Teachers -->
    <div class="stat-card clickable-card" onclick="window.location.href='/staff/teacher-profiles'">
                    <div class="stat-icon teal">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-content">
                        <h3>24</h3>
                        <p>Active Teachers</p>
            <div class="stat-badge">
                <i class="fas fa-arrow-up"></i> Today: 22 (91.7%)
            </div>
                    </div>
                </div>

                <!-- Ongoing Courses -->
    <div class="stat-card clickable-card" onclick="window.location.href='/staff/class-management'">
                    <div class="stat-icon green">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="stat-content">
                        <h3>42</h3>
                        <p>Ongoing Courses</p>
            <div class="stat-badge">Active Classes</div>
                    </div>
                </div>

                <!-- Pending Exams -->
    <div class="stat-card clickable-card" onclick="window.location.href='/staff/exam-database'">
                    <div class="stat-icon red">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-content">
                        <h3>32</h3>
                        <p>Pending Exams</p>
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
                <a href="/staff/activity-logs" class="simple-btn-sm">View All</a>
                        </div>
                        <div class="dashboard-card-body">
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/event-details?id=EVT001'">
                                <div class="activity-icon purple">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="activity-content">
                        <h6>New event "Annual Sports Day" scheduled</h6>
                        <p>May 23, 2025 • Sports</p>
                                </div>
                    <i class="fas fa-chevron-right"></i>
                            </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/teacher-profile/T001'">
                                <div class="activity-icon teal">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <div class="activity-content">
                        <h6>Teacher Sarah Williams updated profile</h6>
                        <p>5 hours ago • Profile Update</p>
                                </div>
                    <i class="fas fa-chevron-right"></i>
                            </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/room-management'">
                                <div class="activity-icon green">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Room 101 maintenance completed</h6>
                        <p>1 day ago • Maintenance</p>
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
                <a href="/staff/event-planner" class="simple-btn-sm">View All</a>
                        </div>
                        <div class="dashboard-card-body">
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/event-details?id=EVT002'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                                </div>
                    <div class="activity-content">
                        <h6>Parent-Teacher Conference</h6>
                        <p>Dec 22, 2024 • Meeting</p>
                                </div>
                    <i class="fas fa-chevron-right"></i>
                            </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/event-details?id=EVT003'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                            </div>
                    <div class="activity-content">
                        <h6>Cultural Festival</h6>
                        <p>Dec 20, 2024 • Cultural</p>
                            </div>
                    <i class="fas fa-chevron-right"></i>
                            </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/event-details?id=EVT004'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                            </div>
                    <div class="activity-content">
                        <h6>Staff Training Workshop</h6>
                        <p>Dec 18, 2024 • Training</p>
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

include __DIR__ . '/../components/staff-layout.php';
?>
