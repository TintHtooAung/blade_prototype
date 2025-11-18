<?php
$pageTitle = 'Smart Campus Nova Hub - Admin Dashboard';
$pageIcon = 'fas fa-th-large';
$pageHeading = 'Admin Dashboard';
$activePage = 'dashboard';


$systemAlerts = [
    ['type' => 'warning', 'icon' => 'fas fa-exclamation-triangle', 'title' => 'Low Attendance Alert', 'message' => 'Grade 8-B attendance dropped below 85%', 'time' => '2 hours ago'],
    ['type' => 'info', 'icon' => 'fas fa-info-circle', 'title' => 'Fee Reminder', 'message' => '23 students have pending fees for January', 'time' => '5 hours ago'],
    ['type' => 'success', 'icon' => 'fas fa-check-circle', 'title' => 'System Update', 'message' => 'All systems operational. 100% uptime this week', 'time' => '1 day ago'],
    ['type' => 'warning', 'icon' => 'fas fa-clock', 'title' => 'Pending Approvals', 'message' => '5 leave requests awaiting approval', 'time' => '2 days ago']
];

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

<!-- School Info Header Section -->
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

<!-- Statistics Cards Section -->
<div class="stats-grid-secondary vertical-stats">
    <!-- Total Students -->
    <div class="stat-card" onclick="window.location.href='/admin/student-profiles'" style="cursor: pointer;">
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
    <div class="stat-card" onclick="window.location.href='/admin/employee-profiles'" style="cursor: pointer;">
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
    <div class="stat-card" onclick="window.location.href='/admin/teacher-profiles'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="stat-content">
            <h3>Total Teachers</h3>
            <div class="stat-number">111</div>
            <div class="stat-change">Today: 97.5%</div>
        </div>
    </div>

    <!-- Fee Collection -->
    <div class="stat-card" onclick="window.location.href='/admin/student-fee-management'" style="cursor: pointer;">
        <div class="stat-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="stat-content">
            <h3>Fee Collection</h3>
            <div class="stat-number">87.5%</div>
            <div class="stat-change">This Month</div>
        </div>
    </div>
</div>


<!-- Dashboard Cards Row - Priority Section -->
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
                        <h6>Cultural Festival</h6>
                        <p>Dec 20, 2024 • Cultural</p>
                    </div>
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
                <a href="/admin/exam-database" class="simple-btn-sm">View All</a>
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
                <div class="activity-item">
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

/* System Alerts Bar */
.system-alerts-bar {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background: linear-gradient(135deg, #e3f2fd 0%, #f5f5f5 100%);
    border-left: 4px solid #1976d2;
    border-radius: 8px;
    margin-bottom: 24px;
    position: relative;
}

.alert-item {
    display: flex;
    align-items: center;
    gap: 8px;
    flex: 1;
}

.alert-item i {
    color: #1976d2;
    font-size: 0.875rem;
}

.alert-text {
    font-size: 0.875rem;
    color: #1d1d1f;
    flex: 1;
}

.alert-time {
    font-size: 0.75rem;
    color: #86868b;
}

.alert-dismiss {
    background: none;
    border: none;
    color: #86868b;
    cursor: pointer;
    padding: 4px;
    font-size: 0.875rem;
}

.alert-dismiss:hover {
    color: #1d1d1f;
}

/* Analytics Cards */
.analytics-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border: 1px solid #e5e5e7;
}

.analytics-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.analytics-card-header h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #1d1d1f;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.analytics-card-header h5 i {
    color: #1976d2;
}

.analytics-subtitle {
    font-size: 0.75rem;
    color: #86868b;
    margin: 4px 0 0 0;
}


.analytics-card-body {
    position: relative;
}


/* Health Card */
.health-card {
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border: 1px solid #e5e5e7;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.health-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #1976d2 0%, #42a5f5 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.6s ease;
}

.health-card:hover::before {
    transform: scaleX(1);
}

.health-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
}

.health-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
    animation: fadeInDown 0.5s ease-out;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.health-card-header h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #1d1d1f;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: color 0.3s ease;
}

.health-card:hover .health-card-header h5 {
    color: #1976d2;
}

.health-card-header h5 i {
    color: #d32f2f;
    transition: all 0.3s ease;
}

.health-card:hover .health-card-header h5 i {
    transform: scale(1.1) rotate(5deg);
}

.health-badge {
    padding: 6px 14px;
    border-radius: 16px;
    font-size: 0.8125rem;
    font-weight: 600;
    transition: all 0.3s ease;
    animation: slideInRight 0.5s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(10px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.health-badge:hover {
    transform: scale(1.05);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.health-excellent {
    background: #e8f5e9;
    color: #2e7d32;
}

.health-good {
    background: #fff9c4;
    color: #f57c00;
}

.health-average {
    background: #ffe0b2;
    color: #ef6c00;
}

.health-poor {
    background: #ffcdd2;
    color: #c62828;
}

.score-period {
    display: block;
    font-size: 0.7rem;
    color: #86868b;
    margin-top: 2px;
    transition: all 0.3s ease;
    opacity: 0.9;
}

.health-score-circle {
    position: relative;
    width: 160px;
    height: 160px;
    margin: 0;
    animation: fadeInScale 0.6s ease-out;
    flex-shrink: 0;
}

@media (max-width: 992px) {
    .health-score-circle {
        width: 140px;
        height: 140px;
    }
    
    .score-value {
        font-size: 1.75rem;
    }
}

@media (max-width: 768px) {
    .health-score-circle {
        width: 120px;
        height: 120px;
    }
    
    .score-value {
        font-size: 1.5rem;
    }
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.progress-ring {
    transform: rotate(-90deg);
    transition: transform 0.3s ease;
}

.progress-ring-circle-bg {
    fill: none;
    stroke: #e5e5e7;
    stroke-width: 8;
    transition: stroke 0.3s ease;
}

.progress-ring-circle {
    fill: none;
    stroke: #4caf50;
    stroke-width: 8;
    stroke-linecap: round;
    transition: stroke-dasharray 0.8s cubic-bezier(0.4, 0, 0.2, 1), 
                stroke-dashoffset 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                stroke 0.5s ease;
    transform-origin: center;
}

.score-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translate(-50%, -40%);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%);
    }
}

.score-value {
    display: block;
    font-size: 2rem;
    font-weight: 700;
    color: #1d1d1f;
    line-height: 1;
    transition: all 0.3s ease;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.score-label {
    display: block;
    font-size: 0.75rem;
    color: #86868b;
    margin-top: 4px;
    transition: color 0.3s ease;
}

.health-metrics {
    display: flex;
    flex-direction: column;
    gap: 12px;
    animation: fadeInRight 0.6s ease-out 0.3s both;
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.health-metric {
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    border-radius: 6px;
    padding: 8px 12px;
    margin: -8px -12px;
}

.health-metric:hover {
    background: rgba(25, 118, 210, 0.04);
    transform: translateX(4px);
}

.metric-label {
    font-size: 0.875rem;
    color: #86868b;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: color 0.3s ease;
}

.health-metric:hover .metric-label {
    color: #1d1d1f;
}

.metric-label i {
    font-size: 0.75rem;
    color: #1976d2;
    transition: all 0.3s ease;
}

.health-metric:hover .metric-label i {
    transform: scale(1.2);
    color: #1976d2;
}

.health-score-display {
    display: flex;
    align-items: center;
    gap: 32px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    flex: 1;
}

/* Health Card */
.health-card {
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border: 1px solid #e5e5e7;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.health-score-circle {
    position: relative;
    width: 160px;
    height: 160px;
    margin: 0;
    animation: fadeInScale 0.6s ease-out;
    flex-shrink: 0;
}

.health-score-circle svg {
    width: 160px;
    height: 160px;
}

.health-score-circle .progress-ring-circle,
.health-score-circle .progress-ring-circle-bg {
    cx: 80;
    cy: 80;
    r: 70;
}

.score-value {
    font-size: 1.75rem;
}

.score-label {
    font-size: 0.75rem;
}

.health-metrics {
    display: flex;
    flex-direction: column;
    gap: 10px;
    animation: fadeInRight 0.6s ease-out 0.3s both;
    flex: 1;
}

.health-metric {
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    border-radius: 6px;
    padding: 8px 12px;
    margin: -8px -12px;
}

.metric-label {
    font-size: 0.875rem;
}

.health-score-circle {
    position: relative;
    width: 160px;
    height: 160px;
    margin: 0 auto 20px;
    animation: fadeInScale 0.6s ease-out;
}

@media (max-width: 992px) {
    .health-score-display {
        gap: 16px;
    }
    
    .health-metrics {
        flex: 1;
    }
}

@media (max-width: 768px) {
    .health-score-display {
        flex-direction: column;
        gap: 16px;
        align-items: center;
    }
    
    .health-metrics {
        width: 100%;
    }
}

.metric-value::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: currentColor;
    opacity: 0;
    transition: all 0.3s ease;
}

.health-metric:hover .metric-value::before {
    opacity: 1;
    transform: translateY(-50%) scale(1.5);
}

.metric-value.positive {
    color: #2e7d32;
}

.metric-value.warning {
    color: #f57c00;
}

.metric-value.negative {
    color: #d32f2f;
}

.health-score-display {
    display: flex;
    align-items: center;
    gap: 32px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    flex: 1;
}

.health-score-display::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(25, 118, 210, 0.05) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    z-index: 0;
    pointer-events: none;
    animation: pulseGlow 3s ease-in-out infinite;
}

@keyframes pulseGlow {
    0%, 100% {
        opacity: 0.3;
        transform: translate(-50%, -50%) scale(1);
    }
    50% {
        opacity: 0.6;
        transform: translate(-50%, -50%) scale(1.1);
    }
}

.health-score-circle {
    position: relative;
    z-index: 1;
}

@media (max-width: 992px) {
    .health-score-display {
        gap: 24px;
    }
}

@media (max-width: 768px) {
    .health-score-display {
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
}

.performers-card {
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border: 1px solid #e5e5e7;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.performers-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
}

.performers-card-header h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #1d1d1f;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.performers-card-header h5 i {
    color: #ff9800;
}

.performers-list {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.performer-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #fff;
    border-radius: 8px;
    border: 1px solid #e5e5e7;
    transition: all 0.2s;
}

.performer-item:hover {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    transform: translateY(-1px);
}

.performer-rank {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.875rem;
    flex-shrink: 0;
}

.performer-rank.gold {
    background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
    color: #856404;
    box-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
}

.performer-rank.silver {
    background: linear-gradient(135deg, #c0c0c0 0%, #e8e8e8 100%);
    color: #5a5a5a;
    box-shadow: 0 2px 8px rgba(192, 192, 192, 0.3);
}

.performer-rank.bronze {
    background: linear-gradient(135deg, #cd7f32 0%, #e8a87c 100%);
    color: #fff;
    box-shadow: 0 2px 8px rgba(205, 127, 50, 0.3);
}

.performer-rank i {
    font-size: 1.25rem;
}

.performer-info {
    flex: 1;
    min-width: 0;
}

.performer-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1d1d1f;
    margin-bottom: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.performer-metrics {
    display: flex;
    gap: 16px;
    font-size: 0.75rem;
    color: #86868b;
}

.performer-metric {
    display: flex;
    align-items: center;
    gap: 4px;
}

.performer-metric i {
    font-size: 0.7rem;
}

.performer-metric-value {
    font-weight: 600;
    color: #1d1d1f;
}

.performer-metric-value.positive {
    color: #2e7d32;
}

.performer-metric-value.warning {
    color: #f57c00;
}

.performer-metric-value.negative {
    color: #d32f2f;
}

@media (max-width: 992px) {
    .health-score-display {
        gap: 20px;
    }
    
    .health-metrics {
        flex: 1;
    }
}

@media (max-width: 768px) {
    .health-card {
        padding: 20px;
    }
    
    .health-score-display {
        flex-direction: column;
        gap: 20px;
    }
    
    .health-metrics {
        width: 100%;
    }
    
    .performers-card {
        padding: 20px;
    }
}

/* Alerts Card */
.alerts-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border: 1px solid #e5e5e7;
    max-height: 500px;
    display: flex;
    flex-direction: column;
}

.alerts-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e5e5e7;
}

.alerts-card-header h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #1d1d1f;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.alerts-card-header h5 i {
    color: #f57c00;
}

.alert-count {
    background: #ff9800;
    color: #fff;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.alerts-list {
    flex: 1;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.alert-item-detailed {
    display: flex;
    gap: 12px;
    padding: 12px;
    border-radius: 8px;
    border-left: 3px solid;
}

.alert-item-detailed.alert-warning {
    background: #fff3e0;
    border-left-color: #ff9800;
}

.alert-item-detailed.alert-info {
    background: #e3f2fd;
    border-left-color: #2196f3;
}

.alert-item-detailed.alert-success {
    background: #e8f5e9;
    border-left-color: #4caf50;
}

.alert-icon {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.alert-item-detailed.alert-warning .alert-icon {
    background: #ff9800;
    color: #fff;
}

.alert-item-detailed.alert-info .alert-icon {
    background: #2196f3;
    color: #fff;
}

.alert-item-detailed.alert-success .alert-icon {
    background: #4caf50;
    color: #fff;
}

.alert-content {
    flex: 1;
}

.alert-content h6 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1d1d1f;
    margin: 0 0 4px 0;
}

.alert-content p {
    font-size: 0.75rem;
    color: #86868b;
    margin: 0 0 4px 0;
}

.alert-content .alert-time {
    font-size: 0.7rem;
    color: #86868b;
}

.view-all-alerts {
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid #e5e5e7;
    text-align: center;
    color: #1976d2;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.view-all-alerts:hover {
    color: #1565c0;
}



/* Stat Card Enhancements */
.stat-trend {
    margin-top: 8px;
    font-size: 0.75rem;
    color: #86868b;
}

.stat-positive {
    color: #2e7d32;
}

/* Stat Card Styles - Now in /public/css/style.css for global use */
/* Clean, simple stat cards used across all pages */

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

/* Responsive */
@media (max-width: 768px) {
    .system-alerts-bar {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .alert-item {
        width: 100%;
    }
    
    .analytics-card-header {
        flex-direction: column;
        gap: 12px;
    }
}
</style>

<script>
// Make system alerts available globally for notification dropdown
window.systemAlerts = <?php echo json_encode($systemAlerts); ?>;


// Upcoming Events Data
const upcomingEventsData = [
    { title: 'Annual Sports Day', date: '2024-01-15', time: '9:00 AM', location: 'Main Ground' },
    { title: 'Science Fair Exhibition', date: '2024-01-18', time: '10:00 AM', location: 'Science Lab' },
    { title: 'Cultural Festival', date: '2024-01-22', time: '2:00 PM', location: 'Auditorium' }
];

// Upcoming Exams Data
const upcomingExamsData = [
    { title: 'Mathematics Mid-Term', date: '2024-01-16', time: '9:00 AM', subject: 'Math', duration: '2 hours' },
    { title: 'English Literature Test', date: '2024-01-17', time: '10:00 AM', subject: 'English', duration: '1.5 hours' },
    { title: 'Physics Practical', date: '2024-01-19', time: '11:00 AM', subject: 'Physics', duration: '2 hours' },
    { title: 'Chemistry Theory', date: '2024-01-20', time: '9:00 AM', subject: 'Chemistry', duration: '2 hours' },
    { title: 'History Final Exam', date: '2024-01-23', time: '2:00 PM', subject: 'History', duration: '2 hours' }
];

function updateUpcomingEvents() {
    const list = document.getElementById('upcomingEventsList');
    if (!list) return;
    
    list.innerHTML = '';
    
    upcomingEventsData.forEach(event => {
        const item = document.createElement('div');
        item.className = 'upcoming-item';
        
        const date = new Date(event.date);
        const formattedDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        
        item.innerHTML = `
            <div class="upcoming-item-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="upcoming-item-content">
                <div class="upcoming-item-title">${event.title}</div>
                <div class="upcoming-item-details">
                    <div class="upcoming-item-date">
                        <i class="fas fa-clock"></i>
                        <span>${formattedDate} • ${event.time}</span>
                    </div>
                </div>
                <div class="upcoming-item-details" style="margin-top: 4px;">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>${event.location}</span>
                </div>
            </div>
        `;
        
        list.appendChild(item);
    });
}

function updateUpcomingExams() {
    const list = document.getElementById('upcomingExamsList');
    if (!list) return;
    
    list.innerHTML = '';
    
    upcomingExamsData.forEach(exam => {
        const item = document.createElement('div');
        item.className = 'upcoming-item';
        
        const date = new Date(exam.date);
        const formattedDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        
        item.innerHTML = `
            <div class="upcoming-item-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="upcoming-item-content">
                <div class="upcoming-item-title">${exam.title}</div>
                <div class="upcoming-item-details">
                    <div class="upcoming-item-date">
                        <i class="fas fa-clock"></i>
                        <span>${formattedDate} • ${exam.time}</span>
                    </div>
                </div>
                <div class="upcoming-item-details" style="margin-top: 4px;">
                    <i class="fas fa-book"></i>
                    <span>${exam.subject} • ${exam.duration}</span>
                </div>
            </div>
        `;
        
        list.appendChild(item);
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Dashboard initialization
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>

