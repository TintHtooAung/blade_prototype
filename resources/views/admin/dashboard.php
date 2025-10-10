<?php
$pageTitle = 'Smart Campus Nova Hub - Admin Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Admin Dashboard';
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
    <!-- Total Students -->
    <div class="stat-card clickable-card" onclick="window.location.href='/admin/student-profiles'">
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
    <div class="stat-card clickable-card" onclick="window.location.href='/admin/employee-profiles'">
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
    <div class="stat-card clickable-card" onclick="window.location.href='/admin/teacher-profiles'">
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
    <div class="stat-card clickable-card" onclick="window.location.href='/admin/finance'">
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
    <div class="stat-card-secondary clickable-card" onclick="window.location.href='/admin/academic/batches'">
        <div class="stat-icon yellow">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h3>2024-2025</h3>
        <p>Active Batch</p>
        <div class="stat-badge">Current Academic Year</div>
    </div>

    <!-- Total Grades -->
    <div class="stat-card-secondary clickable-card" onclick="window.location.href='/admin/academic/grades'">
        <div class="stat-icon teal">
            <i class="fas fa-layer-group"></i>
        </div>
        <h3>12</h3>
        <p>Total Grades</p>
        <div class="stat-badge">Grade 1-12</div>
    </div>

    <!-- Total Classes -->
    <div class="stat-card-secondary clickable-card" onclick="window.location.href='/admin/academic/classes'">
        <div class="stat-icon blue">
            <i class="fas fa-chalkboard"></i>
        </div>
        <h3>48</h3>
        <p>Total Classes</p>
        <div class="stat-badge">Active Classes</div>
    </div>

    <!-- Total Subjects -->
    <div class="stat-card-secondary clickable-card" onclick="window.location.href='/admin/academic/subjects'">
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
                <a href="/admin/event-planner" class="simple-btn-sm">View All</a>
            </div>
            <div class="dashboard-card-body">
                <div class="activity-item clickable-item" onclick="window.location.href='/admin/event-details?id=EVT004'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Parent-Teacher Conference</h6>
                        <p>Dec 22, 2024 • Meeting</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/admin/event-details?id=EVT003'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Cultural Festival</h6>
                        <p>Dec 20, 2024 • Cultural</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/admin/event-details?id=EVT002'">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Football Championship</h6>
                        <p>Dec 18, 2024 • Sports</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
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
                <a href="/admin/exam-database" class="simple-btn-sm">View All</a>
            </div>
            <div class="dashboard-card-body">
                <div class="activity-item clickable-item" onclick="window.location.href='/admin/exam-details?id=EX002'">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Mid-term Exam</h6>
                        <p>Feb 5, 2025 • Grade 10-B</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/admin/exam-details?id=EX003'">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Science Tutorial</h6>
                        <p>Jan 25, 2025 • Grade 9-B</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/admin/exam-details?id=EX001'">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Mathematics Tutorial 1</h6>
                        <p>Jan 20, 2025 • Grade 9-A</p>
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

include __DIR__ . '/../components/admin-layout.php';
?>