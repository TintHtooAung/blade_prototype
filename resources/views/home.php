<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Campus Nova Hub - Welcome</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <!-- Main Content -->
    <main>
        <div class="role-selection-container">
            <!-- Logo Section -->
            <div class="home-logo">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="logo-text">
                    <div class="logo-title">SMART CAMPUS</div>
                    <div class="logo-subtitle">NOVA HUB</div>
                </div>
            </div>
            
            <h1 class="role-selection-title">Select Your Role</h1>
            <p class="role-selection-subtitle">Access the features and modules relevant to your position</p>
            
            <div class="role-cards">
                <!-- Teacher Card -->
                <a href="/teacher/dashboard" class="role-card">
                    <div class="role-icon-circle teacher">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3 class="role-title">Teacher</h3>
                </a>

                <!-- Staff Card -->
                <a href="/staff/dashboard" class="role-card">
                    <div class="role-icon-circle staff">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h3 class="role-title">Staff</h3>
                </a>

                <!-- Admin Card -->
                <a href="/admin/dashboard" class="role-card">
                    <div class="role-icon-circle admin">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h3 class="role-title">Super Admin</h3>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4" style="background: #f5f7fa; color: #718096; border-top: 1px solid #e2e8f0;">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> Smart Campus powered by NOVA HUB. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
