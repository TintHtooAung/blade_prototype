<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Dashboard';
$pageIcon = 'fas fa-home';
$pageHeading = 'Teacher Dashboard';
$activePage = 'dashboard';

ob_start();
?>
<!-- Welcome Header -->
<div class="welcome-header">
    <div class="welcome-content">
        <h1 class="welcome-title">Welcome back, Teacher! 👋</h1>
        <p class="welcome-subtitle">Let's inspire young minds today</p>
    </div>
    <div class="welcome-time">
        <div class="current-date" id="currentDate"></div>
        <div class="current-time" id="currentTime"></div>
    </div>
</div>

<!-- Statistics Grid - Clean Blue Card Design -->
<div class="stats-grid-secondary vertical-stats">
    <!-- Active Classes -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chalkboard"></i>
        </div>
        <div class="stat-content">
            <h3>Active Classes</h3>
            <div class="stat-number">5</div>
            <div class="stat-change">Today: 4 classes</div>
        </div>
    </div>

    <!-- Total Students -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Total Students</h3>
            <div class="stat-number">142</div>
            <div class="stat-change positive">Today: 97.2%</div>
        </div>
    </div>

    <!-- Pending Assignments -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="stat-content">
            <h3>Pending Assignments</h3>
            <div class="stat-number">8</div>
            <div class="stat-change">This Week</div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar"></i>
        </div>
        <div class="stat-content">
            <h3>Upcoming Events</h3>
            <div class="stat-number">3</div>
            <div class="stat-change">This Month</div>
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
                <div class="activity-item">
                        <div class="activity-icon blue">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Attendance submitted for Math 101</h6>
                        <p>2 hours ago • Attendance</p>
                    </div>
                </div>
                <div class="activity-item">
                        <div class="activity-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Exam results published for Science 201</h6>
                        <p>5 hours ago • Results</p>
                    </div>
                </div>
                <div class="activity-item">
                        <div class="activity-icon purple">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>New homework assignment created</h6>
                        <p>1 day ago • Assignment</p>
                    </div>
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
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Parent-Teacher Conference</h6>
                        <p>Dec 22, 2024 • Meeting</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Teacher Training Workshop</h6>
                        <p>Dec 20, 2024 • Training</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Grade Review Meeting</h6>
                        <p>Dec 18, 2024 • Meeting</p>
                    </div>
                </div>
            </div>
        </div>
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

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
