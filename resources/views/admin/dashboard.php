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
        <p class="dashboard-subtitle">Real-time insights & school health metrics</p>
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
<div class="stats-grid-horizontal" style="margin-bottom: 24px;">
    <!-- Total Students -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal blue">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">986</div>
            <div class="stat-label">Total Students</div>
            <div class="stat-today">Today: 94.2%</div>
        </div>
    </div>

    <!-- Total Staff -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal green">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">45</div>
            <div class="stat-label">Total Staff</div>
            <div class="stat-today">Today: 95.2%</div>
        </div>
    </div>

    <!-- Total Teachers -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal yellow">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">111</div>
            <div class="stat-label">Total Teachers</div>
            <div class="stat-today">Today: 97.5%</div>
        </div>
    </div>

    <!-- Fee Collection -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal purple">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">87.5%</div>
            <div class="stat-label">Fee Collection</div>
            <div class="stat-today">This Month</div>
        </div>
    </div>
</div>

<!-- School Health Score & Top Performers Row -->
<div class="row">
    <!-- School Health Score -->
    <div class="col-lg-6">
        <div class="health-card">
            <div class="health-card-header">
                <h5><i class="fas fa-heartbeat"></i> School Health Score</h5>
                <span class="health-badge" id="healthBadge">Excellent</span>
        </div>
            <div class="health-score-display">
                <div class="health-score-circle">
                    <svg class="progress-ring" width="160" height="160">
                        <circle class="progress-ring-circle-bg" cx="80" cy="80" r="70" />
                        <circle class="progress-ring-circle" id="healthScoreCircle" cx="80" cy="80" r="70" 
                                stroke-dasharray="<?php echo 2 * pi() * 70 * 0.906; ?> <?php echo 2 * pi() * 70; ?>" />
                    </svg>
                    <div class="score-text">
                        <span class="score-value" id="healthScoreValue">90.6%</span>
                        <span class="score-label">Health Score</span>
                        <span class="score-period" id="healthScorePeriod">This Month</span>
        </div>
    </div>
                <div class="health-metrics">
                    <div class="health-metric">
                        <span class="metric-label">
                            <i class="fas fa-user-check"></i> Attendance
                        </span>
                        <span class="metric-value positive" id="metricAttendance">94.2%</span>
        </div>
                    <div class="health-metric">
                        <span class="metric-label">
                            <i class="fas fa-tasks"></i> Homework Completion
                        </span>
                        <span class="metric-value positive" id="metricHomework">88.5%</span>
        </div>
                    <div class="health-metric">
                        <span class="metric-label">
                            <i class="fas fa-graduation-cap"></i> Academic Results
                        </span>
                        <span class="metric-value positive" id="metricAcademic">87.3%</span>
    </div>
        </div>
            </div>
        </div>
    </div>

    <!-- Top Performers Section -->
    <div class="col-lg-6">
        <div class="performers-card">
            <div class="performers-card-header">
                <h5><i class="fas fa-trophy"></i> Top Performers</h5>
                <select id="performersClassSelector" class="class-selector" onchange="updateTopPerformers()">
                    <option value="Grade 9-A">Grade 9-A</option>
                    <option value="Grade 9-B">Grade 9-B</option>
                    <option value="Grade 10-A" selected>Grade 10-A</option>
                    <option value="Grade 10-B">Grade 10-B</option>
                    <option value="Grade 11-A">Grade 11-A</option>
                    <option value="Grade 11-B">Grade 11-B</option>
                    <option value="Grade 12-A">Grade 12-A</option>
                    <option value="Grade 12-B">Grade 12-B</option>
                </select>
        </div>
            <div class="performers-list" id="performersList">
                <!-- Top performers will be dynamically loaded here -->
            </div>
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

// School-wide health data (This Month)
const schoolHealthData = {
    attendance: 94.2,
    homework: 88.5,
    academic: 87.3,
    score: 90.6
};

function updateHealthScore() {
    const data = schoolHealthData;
    const score = data.score;
    const attendance = data.attendance;
    const homework = data.homework;
    const academic = data.academic;
    
    // Animate score value change
    const scoreElement = document.getElementById('healthScoreValue');
    const currentScore = parseFloat(scoreElement.textContent.replace('%', ''));
    animateNumber(scoreElement, currentScore, score, '%');
    
    // Update period label
    const periodElement = document.getElementById('healthScorePeriod');
    periodElement.textContent = 'This Month';
    
    // Animate metrics
    animateNumber(document.getElementById('metricAttendance'), 
        parseFloat(document.getElementById('metricAttendance').textContent.replace('%', '')), 
        attendance, '%');
    animateNumber(document.getElementById('metricHomework'), 
        parseFloat(document.getElementById('metricHomework').textContent.replace('%', '')), 
        homework, '%');
    animateNumber(document.getElementById('metricAcademic'), 
        parseFloat(document.getElementById('metricAcademic').textContent.replace('%', '')), 
        academic, '%');
    
    // Update badge with animation
    const badge = document.getElementById('healthBadge');
    badge.style.transform = 'scale(0.9)';
    badge.style.opacity = '0.7';
    
    setTimeout(() => {
        if (score >= 90) {
            badge.textContent = 'Excellent';
            badge.className = 'health-badge health-excellent';
        } else if (score >= 85) {
            badge.textContent = 'Good';
            badge.className = 'health-badge health-good';
        } else if (score >= 75) {
            badge.textContent = 'Average';
            badge.className = 'health-badge health-average';
        } else {
            badge.textContent = 'Needs Improvement';
            badge.className = 'health-badge health-poor';
        }
        badge.style.transform = 'scale(1)';
        badge.style.opacity = '1';
    }, 200);
    
    // Update circle progress with smooth animation
    const circumference = 2 * Math.PI * 70;
    const offset = circumference - (score / 100) * circumference;
    const circle = document.getElementById('healthScoreCircle');
    
    // Animate stroke dashoffset
    circle.style.transition = 'stroke-dashoffset 0.8s cubic-bezier(0.4, 0, 0.2, 1), stroke 0.5s ease';
    circle.style.strokeDasharray = `${circumference}`;
    circle.style.strokeDashoffset = offset;
    
    // Update circle color based on score with smooth transition
    setTimeout(() => {
        if (score >= 90) {
            circle.style.stroke = '#4caf50';
        } else if (score >= 85) {
            circle.style.stroke = '#ff9800';
        } else if (score >= 75) {
            circle.style.stroke = '#ff9800';
        } else {
            circle.style.stroke = '#d32f2f';
        }
    }, 100);
    
    // Update metric colors with animation
    updateMetricColor('metricAttendance', attendance);
    updateMetricColor('metricHomework', homework);
    updateMetricColor('metricAcademic', academic);
}

function animateNumber(element, start, end, suffix = '') {
    const duration = 800;
    const startTime = performance.now();
    const difference = end - start;
    
    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOutCubic = 1 - Math.pow(1 - progress, 3);
        const current = start + (difference * easeOutCubic);
        
        element.textContent = current.toFixed(1) + suffix;
        
        if (progress < 1) {
            requestAnimationFrame(update);
        }
    }
    
    requestAnimationFrame(update);
}

function updateMetricColor(elementId, value) {
    const element = document.getElementById(elementId);
    element.classList.remove('positive', 'warning', 'negative');
    if (value >= 90) {
        element.classList.add('positive');
    } else if (value >= 75) {
        element.classList.add('warning');
    } else {
        element.classList.add('negative');
    }
}

// Top Performers Data (This Month)
const topPerformersData = {
    'Grade 9-A': [
        { name: 'Sarah Johnson', attendance: 98.5, academic: 95.2, overall: 96.85 },
        { name: 'Michael Chen', attendance: 97.2, academic: 93.8, overall: 95.5 },
        { name: 'Emily Rodriguez', attendance: 96.8, academic: 92.1, overall: 94.45 }
    ],
    'Grade 9-B': [
        { name: 'David Kim', attendance: 99.1, academic: 94.5, overall: 96.8 },
        { name: 'Priya Patel', attendance: 97.5, academic: 93.2, overall: 95.35 },
        { name: 'James Wilson', attendance: 96.3, academic: 91.8, overall: 94.05 }
    ],
    'Grade 10-A': [
        { name: 'Emma Thompson', attendance: 99.5, academic: 96.8, overall: 98.15 },
        { name: 'Ryan Martinez', attendance: 98.2, academic: 95.1, overall: 96.65 },
        { name: 'Sophia Lee', attendance: 97.8, academic: 94.3, overall: 96.05 }
    ],
    'Grade 10-B': [
        { name: 'Alexander Brown', attendance: 98.8, academic: 94.9, overall: 96.85 },
        { name: 'Isabella Garcia', attendance: 97.5, academic: 93.5, overall: 95.5 },
        { name: 'Daniel Taylor', attendance: 96.5, academic: 92.2, overall: 94.35 }
    ],
    'Grade 11-A': [
        { name: 'Olivia Davis', attendance: 99.2, academic: 95.5, overall: 97.35 },
        { name: 'Noah Anderson', attendance: 98.0, academic: 94.2, overall: 96.1 },
        { name: 'Ava Jackson', attendance: 97.3, academic: 93.1, overall: 95.2 }
    ],
    'Grade 11-B': [
        { name: 'William White', attendance: 98.5, academic: 94.8, overall: 96.65 },
        { name: 'Mia Harris', attendance: 97.2, academic: 93.5, overall: 95.35 },
        { name: 'Lucas Clark', attendance: 96.8, academic: 92.3, overall: 94.55 }
    ],
    'Grade 12-A': [
        { name: 'Charlotte Lewis', attendance: 99.8, academic: 97.2, overall: 98.5 },
        { name: 'Benjamin Walker', attendance: 98.5, academic: 95.8, overall: 97.15 },
        { name: 'Amelia Hall', attendance: 97.9, academic: 94.5, overall: 96.2 }
    ],
    'Grade 12-B': [
        { name: 'Henry Young', attendance: 99.0, academic: 96.1, overall: 97.55 },
        { name: 'Luna King', attendance: 98.2, academic: 95.0, overall: 96.6 },
        { name: 'Logan Wright', attendance: 97.5, academic: 93.8, overall: 95.65 }
    ]
};

function updateTopPerformers() {
    const selectedClass = document.getElementById('performersClassSelector').value;
    const performers = topPerformersData[selectedClass] || [];
    const container = document.getElementById('performersList');
    
    if (performers.length === 0) {
        container.innerHTML = '<div style="text-align: center; padding: 20px; color: #86868b;">No data available for this class</div>';
        return;
    }
    
    const medals = ['gold', 'silver', 'bronze'];
    const medalIcons = ['fa-medal', 'fa-medal', 'fa-medal'];
    
    container.innerHTML = performers.map((performer, index) => {
        const medal = medals[index];
        const icon = medalIcons[index];
        const attendanceClass = getPerformanceClass(performer.attendance);
        const academicClass = getPerformanceClass(performer.academic);
        
        return `
            <div class="performer-item">
                <div class="performer-rank ${medal}">
                    <i class="fas ${icon}"></i>
                </div>
                <div class="performer-info">
                    <div class="performer-name">${performer.name}</div>
                    <div class="performer-metrics">
                        <div class="performer-metric">
                            <i class="fas fa-user-check"></i>
                            <span class="performer-metric-value ${attendanceClass}">${performer.attendance.toFixed(1)}%</span>
                            <span>Attendance</span>
                        </div>
                        <div class="performer-metric">
                            <i class="fas fa-graduation-cap"></i>
                            <span class="performer-metric-value ${academicClass}">${performer.academic.toFixed(1)}%</span>
                            <span>Academic</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

function getPerformanceClass(value) {
    if (value >= 95) return 'positive';
    if (value >= 85) return 'warning';
    return 'negative';
}

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
    updateHealthScore();
    updateTopPerformers();
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>

