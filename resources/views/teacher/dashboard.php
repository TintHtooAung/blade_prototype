<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Campus Nova Hub - Teacher Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Header -->
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
                <li><a href="/teacher/dashboard" class="active"><i class="fas fa-home"></i> Teacher Dashboard</a></li>
                <li><a href="#"><i class="fas fa-bell"></i> Notispace & Events <span class="badge bg-danger rounded-pill ms-auto">3</span></a></li>
                <li><a href="#"><i class="fas fa-calendar"></i> Schedule View</a></li>
                <li><a href="#"><i class="fas fa-user-check"></i> Attendance</a></li>
                <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">CLASS MANAGEMENT</li>
                <li><a href="#"><i class="fas fa-user-graduate"></i> Student Profiles</a></li>
                <li><a href="#"><i class="fas fa-book"></i> Subject Profiles</a></li>
                <li><a href="#"><i class="fas fa-chalkboard"></i> Class Profiles</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> Exam Results</a></li>
                <li><a href="#"><i class="fas fa-edit"></i> Enter Marks</a></li>
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
                        <h1 style="color: #1a202c; font-size: 1.875rem; font-weight: 600; margin: 0;">Teacher Dashboard</h1>
                        <p style="color: #718096; margin: 0;">Welcome back, U.Myint</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Grid -->
            <div class="stats-grid">
                <!-- Active Classes -->
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                    <div class="stat-content">
                        <h3>5</h3>
                        <p>Active Classes</p>
                    </div>
                </div>

                <!-- Total Students -->
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3>142</h3>
                        <p>Total Students</p>
                    </div>
                </div>

                <!-- Pending Assignments -->
                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-content">
                        <h3>8</h3>
                        <p>Pending Assignments</p>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="stat-card">
                    <div class="stat-icon yellow">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3>3</h3>
                        <p>Upcoming Events</p>
                    </div>
                </div>
            </div>

            <!-- Dashboard Cards Row -->
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <i class="fas fa-clock"></i>
                    <h5>Recent Activity</h5>
                </div>
                <div class="dashboard-card-body">
                    <div class="activity-item">
                        <div class="activity-icon blue">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Attendance submitted for Math 101</h6>
                            <p>2 hours ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Exam results published for Science 201</h6>
                            <p>5 hours ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon purple">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>New homework assignment created</h6>
                            <p>1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
