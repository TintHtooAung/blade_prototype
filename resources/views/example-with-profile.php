<?php
/**
 * Example page showing how to use the unified header with profile dropdown
 * This demonstrates the working language/theme selectors and change password functionality
 */

$pageTitle = 'Dashboard - Smart Campus';
$pageHeading = 'Dashboard';
$pageIcon = 'fas fa-home';
$userName = 'John Doe';
$userEmail = 'john.doe@novahub.edu';
$userRole = 'Administrator';
$dashboardUrl = '/admin/dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            background: #f8fafc;
        }

        .main-content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .welcome-card h1 {
            font-size: 32px;
            color: #1a202c;
            margin-bottom: 16px;
        }

        .welcome-card p {
            font-size: 18px;
            color: #64748b;
            margin-bottom: 32px;
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 32px;
        }

        .feature-item {
            background: #f8fafc;
            padding: 24px;
            border-radius: 12px;
            text-align: left;
        }

        .feature-item i {
            font-size: 32px;
            color: #667eea;
            margin-bottom: 12px;
        }

        .feature-item h3 {
            font-size: 18px;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .feature-item p {
            font-size: 14px;
            color: #64748b;
            margin: 0;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/components/unified-header.php'; ?>

    <div class="main-content">
        <div class="welcome-card">
            <h1>Welcome to Smart Campus!</h1>
            <p>Your profile section now includes working language and theme selectors, plus change password functionality.</p>
            
            <div class="feature-list">
                <div class="feature-item">
                    <i class="fas fa-palette"></i>
                    <h3>Theme Selection</h3>
                    <p>Click your profile icon and select Theme to choose between Light, Dark, or Auto mode.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-globe"></i>
                    <h3>Language Options</h3>
                    <p>Select from English, Myanmar, Chinese, or Thai languages from your profile dropdown.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-key"></i>
                    <h3>Change Password</h3>
                    <p>Securely update your password directly from the profile section.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-lock"></i>
                    <h3>Forgot Password</h3>
                    <p>Reset your password using NRC verification and OTP on the login page.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
