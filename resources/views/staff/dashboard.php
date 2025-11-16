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
        <p class="dashboard-subtitle">Tools and insights for daily school operations</p>
                </div>
            </div>

<!-- School Info Header Section (aligned with Admin design) -->
<div class="school-info-header">
    <div class="school-info-content">
        <div class="school-name">FUTURES ACADEMY</div>
        <div class="school-contact-info">
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Location</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>futureacademy@gmail.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>+959 954047000</span>
            </div>
        </div>
    </div>
    <div class="school-logo-section">
        <img src="/images/futures-academy-logo.svg" alt="Futures Academy Logo" class="school-logo">
    </div>
</div>

<!-- Statistics Grid -->
<div class="stats-grid-secondary vertical-stats">
    <!-- Total Students -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="stat-content">
            <h3>Total Students</h3>
            <div class="stat-number">986</div>
            <div class="stat-change">Today: 94.2%</div>
        </div>
    </div>

    <!-- Total Staff -->
    <div class="stat-card" onclick="window.location.href='/staff/employee-profiles'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="stat-content">
            <h3>Total Staff</h3>
            <div class="stat-number">45</div>
            <div class="stat-change">Today: 95.2%</div>
        </div>
    </div>

    <!-- Total Teachers -->
    <div class="stat-card" onclick="window.location.href='/staff/teacher-profiles'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="stat-content">
            <h3>Total Teachers</h3>
            <div class="stat-number">111</div>
            <div class="stat-change">Today: 97.5%</div>
        </div>
    </div>

    <!-- Active Batch -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-content">
            <h3>Active Batch</h3>
            <div class="stat-number" style="font-size: 1.25rem;">2024-2025</div>
            <div class="stat-change">Current Year</div>
        </div>
    </div>

    <!-- Total Grades -->
    <div class="stat-card" onclick="window.location.href='/staff/academic/grades'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="stat-content">
            <h3>Total Grades</h3>
            <div class="stat-number">12</div>
            <div class="stat-change">Grade 1-12</div>
        </div>
    </div>

    <!-- Total Classes -->
    <div class="stat-card" onclick="window.location.href='/staff/academic/classes'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-chalkboard"></i>
        </div>
        <div class="stat-content">
            <h3>Total Classes</h3>
            <div class="stat-number">48</div>
            <div class="stat-change">Active</div>
        </div>
    </div>

    <!-- Total Subjects -->
    <div class="stat-card" onclick="window.location.href='/staff/academic/subjects'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="stat-content">
            <h3>Total Subjects</h3>
            <div class="stat-number">24</div>
            <div class="stat-change">All Grades</div>
        </div>
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
                <a href="/staff/event-planner" class="simple-btn-sm">View All</a>
                        </div>
                        <div class="dashboard-card-body">
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                                </div>
                    <div class="activity-content">
                        <h6>Parent-Teacher Conference</h6>
                        <p>Dec 22, 2024 • Meeting</p>
                                </div>
                    <i class="fas fa-chevron-right"></i>
                            </div>
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                            </div>
                    <div class="activity-content">
                        <h6>Cultural Festival</h6>
                        <p>Dec 20, 2024 • Cultural</p>
                            </div>
                    <i class="fas fa-chevron-right"></i>
                            </div>
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                            </div>
                    <div class="activity-content">
                        <h6>Football Championship</h6>
                        <p>Dec 18, 2024 • Sports</p>
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
                <a href="/staff/exam-database" class="simple-btn-sm">View All</a>
            </div>
            <div class="dashboard-card-body">
                <div class="activity-item">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Mid-term Exam</h6>
                        <p>Feb 5, 2025 • Grade 10-B</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Science Tutorial</h6>
                        <p>Jan 25, 2025 • Grade 9-B</p>
                    </div>
                </div>
                <div class="activity-item clickable-item" onclick="window.location.href='/staff/exam-details?id=EX001'">
                    <div class="activity-icon red">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Mathematics Tutorial 1</h6>
                        <p>Jan 20, 2025 • Grade 9-A</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Enhancements */
.dashboard-subtitle {
    font-size: 0.875rem;
    color: #86868b;
    margin-top: 4px;
    font-weight: 400;
}

/* Stats Grid - 2x4 Horizontal Cards */
.stats-grid-horizontal {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}

.stat-card-horizontal {
    background: #fff;
    border-radius: 8px;
    padding: 16px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
    border: 1px solid #e5e5e7;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: box-shadow 0.2s;
}

.stat-card-horizontal:hover {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.stat-icon-horizontal {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.stat-icon-horizontal.blue {
    background: #e3f2fd;
    color: #1976d2;
}

.stat-icon-horizontal.green {
    background: #e8f5e9;
    color: #2e7d32;
}

.stat-icon-horizontal.yellow {
    background: #fff9c4;
    color: #f57c00;
}

.stat-icon-horizontal.purple {
    background: #f3e5f5;
    color: #7b1fa2;
}

.stat-icon-horizontal.teal {
    background: #e0f2f1;
    color: #00695c;
}

.stat-content-horizontal {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1d1d1f;
    line-height: 1.2;
}

.stat-label {
    font-size: 0.875rem;
    color: #86868b;
    font-weight: 500;
}

.stat-today {
    font-size: 0.75rem;
    color: #86868b;
    margin-top: 2px;
}

.clickable-card {
    cursor: pointer;
}

.clickable-card:hover {
    background: #f9fafb;
}

@media (max-width: 992px) {
    .stats-grid-horizontal {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
    
    .stat-card-horizontal {
        padding: 12px;
    }
    
    .stat-icon-horizontal {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
    }
    
    .stat-value {
        font-size: 1.25rem;
    }
}

@media (max-width: 576px) {
    .stats-grid-horizontal {
        grid-template-columns: 1fr;
        gap: 12px;
    }
}

/* School Info Header Section */
.school-info-header {
    display: flex;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    min-height: 160px;
}

.school-info-content {
    flex: 2;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    padding: 32px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #ffffff;
}

.school-name {
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: 0.05em;
    margin-bottom: 24px;
    line-height: 1.2;
    text-transform: uppercase;
}

.school-contact-info {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1rem;
    opacity: 0.95;
}

.contact-item i {
    font-size: 1.125rem;
    width: 20px;
    text-align: center;
}

.school-logo-section {
    flex: 1;
    background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
}

.school-logo {
    max-width: 100%;
    max-height: 140px;
    width: auto;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
}

/* Responsive Design for School Info Header */
@media (max-width: 992px) {
    .school-info-header {
        flex-direction: column;
        min-height: auto;
    }
    
    .school-info-content {
        padding: 24px;
    }
    
    .school-name {
        font-size: 2rem;
        margin-bottom: 20px;
    }
    
    .school-logo-section {
        padding: 20px;
        min-height: 120px;
    }
    
    .school-logo {
        max-height: 100px;
    }
}

@media (max-width: 768px) {
    .school-info-content {
        padding: 20px;
    }
    
    .school-name {
        font-size: 1.75rem;
        margin-bottom: 16px;
    }
    
    .contact-item {
        font-size: 0.9375rem;
        gap: 10px;
    }
    
    .contact-item i {
        font-size: 1rem;
    }
    
    .school-logo-section {
        padding: 16px;
        min-height: 100px;
    }
    
    .school-logo {
        max-height: 80px;
    }
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