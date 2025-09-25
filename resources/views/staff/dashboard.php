<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Campus Nova Hub - Staff Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="smart-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="smart-logo">
                        <div class="logo-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <div>Smart Campus</div>
                            <div class="powered-by">powered by NOVA HUB</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-home me-1"></i>
                        Home
                    </a>
                    <div class="btn-group ms-2">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            ems
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul class="sidebar-nav">
                <li><a href="/staff/dashboard" class="active"><i class="fas fa-home"></i> Staff Dashboard</a></li>
                <li><a href="#"><i class="fas fa-bell"></i> Announcements</a></li>
                <li><a href="#"><i class="fas fa-calendar"></i> Event Planner</a></li>
                <li><a href="#"><i class="fas fa-clock"></i> Schedule Planner</a></li>
                <li><a href="#"><i class="fas fa-user-check"></i> Attendance</a></li>
                <li><a href="#"><i class="fas fa-chalkboard-teacher"></i> Teacher Profiles</a></li>
                <li><a href="#"><i class="fas fa-user-graduate"></i> Student Profiles</a></li>
                <li><a href="#"><i class="fas fa-door-open"></i> Room Management</a></li>
                <li><a href="#"><i class="fas fa-chalkboard"></i> Class Management</a></li>
                <li><a href="#"><i class="fas fa-clipboard-list"></i> Exam Database</a></li>
                <li><a href="#"><i class="fas fa-chart-line"></i> Report Centre</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-home" style="color: #667eea; font-size: 2rem;"></i>
                    </div>
                    <div>
                        <h1 style="color: #1a202c; font-size: 1.875rem; font-weight: 600; margin: 0;">Staff Dashboard</h1>
                        <p style="color: #718096; margin: 0;">Welcome back, user name</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Grid -->
            <div class="stats-grid">
                <!-- Upcoming Events -->
                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3>8</h3>
                        <p>Upcoming Events</p>
                    </div>
                </div>

                <!-- Active Teachers -->
                <div class="stat-card">
                    <div class="stat-icon teal">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-content">
                        <h3>24</h3>
                        <p>Active Teachers</p>
                    </div>
                </div>

                <!-- Ongoing Courses -->
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="stat-content">
                        <h3>42</h3>
                        <p>Ongoing Courses</p>
                    </div>
                </div>

                <!-- Pending Exams -->
                <div class="stat-card">
                    <div class="stat-icon red">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-content">
                        <h3>32</h3>
                        <p>Pending Exams</p>
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
                        </div>
                        <div class="dashboard-card-body">
                            <div class="activity-item">
                                <div class="activity-icon purple">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>New event "Annual Sports Day" scheduled for May 23</h6>
                                    <p>2 hours ago</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon teal">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Teacher Sarah Williams updated her profile</h6>
                                    <p>5 hours ago</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon green">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Room 101 maintenance completed</h6>
                                    <p>1 day ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Calendar -->
                <div class="col-lg-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <i class="fas fa-calendar"></i>
                            <h5>Event Calendar</h5>
                        </div>
                        <div class="dashboard-card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-sm btn-outline-secondary me-2">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <h6 class="mb-0 mx-3">May 2025</h6>
                                    <button class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm me-2">Today</button>
                                    <button class="btn btn-outline-secondary btn-sm">Month</button>
                                </div>
                            </div>
                            <div class="row text-center small text-muted mb-2">
                                <div class="col">Sun</div>
                                <div class="col">Mon</div>
                                <div class="col">Tue</div>
                                <div class="col">Wed</div>
                                <div class="col">Thu</div>
                                <div class="col">Fri</div>
                                <div class="col">Sat</div>
                            </div>
                            <div class="row text-center">
                                <div class="col p-1">1</div>
                                <div class="col p-1">2</div>
                                <div class="col p-1">3</div>
                                <div class="col p-1">4</div>
                                <div class="col p-1">5</div>
                                <div class="col p-1">6</div>
                                <div class="col p-1">7</div>
                            </div>
                            <div class="row text-center">
                                <div class="col p-1">8</div>
                                <div class="col p-1">9</div>
                                <div class="col p-1">10</div>
                                <div class="col p-1">11</div>
                                <div class="col p-1">12</div>
                                <div class="col p-1">13</div>
                                <div class="col p-1">14</div>
                            </div>
                            <div class="row text-center">
                                <div class="col p-1">15</div>
                                <div class="col p-1">16</div>
                                <div class="col p-1">17</div>
                                <div class="col p-1">18</div>
                                <div class="col p-1">19</div>
                                <div class="col p-1">20</div>
                                <div class="col p-1">21</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
