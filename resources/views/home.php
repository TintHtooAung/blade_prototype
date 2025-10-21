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
        <div class="login-container">
            <!-- Logo Section -->
            <div class="login-logo">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="logo-text">
                    <div class="logo-title">SMART CAMPUS</div>
                    <div class="logo-subtitle">NOVA HUB</div>
                </div>
            </div>
            
            <div class="login-card">
                <div class="login-header">
                    <h1 class="login-title">Welcome Back</h1>
                    <p class="login-subtitle">Sign in to your account</p>
                </div>
                
                <form class="login-form" id="loginForm">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" class="form-input" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-input" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" id="remember">
                            <span class="checkmark"></span>
                            Remember me
                        </label>
                        <a href="#" class="forgot-link">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </button>
                </form>
                
                <div class="demo-section">
                    <div class="demo-divider">
                        <span>Demo Accounts</span>
                    </div>
                    
                    <div class="demo-cards">
                        <!-- Teacher Demo -->
                        <div class="demo-card" onclick="fillDemoCredentials('teacher')">
                            <div class="demo-icon teacher">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="demo-info">
                                <div class="demo-role">Teacher</div>
                                <div class="demo-email">teacher@novahub.edu</div>
                            </div>
                        </div>

                        <!-- Staff Demo -->
                        <div class="demo-card" onclick="fillDemoCredentials('staff')">
                            <div class="demo-icon staff">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <div class="demo-info">
                                <div class="demo-role">Staff</div>
                                <div class="demo-email">staff@novahub.edu</div>
                            </div>
                        </div>

                        <!-- Admin Demo -->
                        <div class="demo-card" onclick="fillDemoCredentials('admin')">
                            <div class="demo-icon admin">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="demo-info">
                                <div class="demo-role">Admin</div>
                                <div class="demo-email">admin@novahub.edu</div>
                            </div>
                        </div>
                    </div>
                </div>
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
    
    <script>
    // Demo credentials
    const demoCredentials = {
        teacher: {
            email: 'teacher@novahub.edu',
            password: 'teacher123',
            role: 'teacher',
            redirect: '/teacher/dashboard'
        },
        staff: {
            email: 'staff@novahub.edu',
            password: 'staff123',
            role: 'staff',
            redirect: '/staff/dashboard'
        },
        admin: {
            email: 'admin@novahub.edu',
            password: 'admin123',
            role: 'admin',
            redirect: '/admin/dashboard'
        }
    };

    // Fill demo credentials
    function fillDemoCredentials(role) {
        const credentials = demoCredentials[role];
        if (credentials) {
            document.getElementById('email').value = credentials.email;
            document.getElementById('password').value = credentials.password;
            
            // Add visual feedback
            const demoCard = event.target.closest('.demo-card');
            demoCard.style.transform = 'scale(0.95)';
            setTimeout(() => {
                demoCard.style.transform = 'scale(1)';
            }, 150);
        }
    }

    // Handle form submission
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        // Check if credentials match any demo account
        for (const role in demoCredentials) {
            const creds = demoCredentials[role];
            if (email === creds.email && password === creds.password) {
                // Show loading state
                const submitBtn = document.querySelector('.login-btn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
                submitBtn.disabled = true;
                
                // Simulate login process
                setTimeout(() => {
                    // Store user session
                    localStorage.setItem('userRole', creds.role);
                    localStorage.setItem('userEmail', creds.email);
                    localStorage.setItem('isLoggedIn', 'true');
                    
                    // Redirect to appropriate dashboard
                    window.location.href = creds.redirect;
                }, 1500);
                return;
            }
        }
        
        // Invalid credentials
        showError('Invalid email or password. Please try again.');
    });

    // Show error message
    function showError(message) {
        // Remove existing error
        const existingError = document.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
        
        // Create error element
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
        
        // Insert after form
        const form = document.getElementById('loginForm');
        form.parentNode.insertBefore(errorDiv, form.nextSibling);
        
        // Remove error after 5 seconds
        setTimeout(() => {
            if (errorDiv.parentNode) {
                errorDiv.remove();
            }
        }, 5000);
    }

    // Check if already logged in
    document.addEventListener('DOMContentLoaded', function() {
        if (localStorage.getItem('isLoggedIn') === 'true') {
            const userRole = localStorage.getItem('userRole');
            const redirects = {
                'teacher': '/teacher/dashboard',
                'staff': '/staff/dashboard',
                'admin': '/admin/dashboard'
            };
            
            if (redirects[userRole]) {
                window.location.href = redirects[userRole];
            }
        }
    });
    </script>
</body>
</html>
