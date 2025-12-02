<?php
$pageTitle = 'Profile - Smart Campus';
$pageHeading = 'My Profile';
$pageIcon = 'fas fa-user';
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
            padding-top: 64px;
        }

        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .profile-header {
            background: white;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            flex-shrink: 0;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 32px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .profile-role {
            font-size: 18px;
            color: #667eea;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .profile-meta {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .profile-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 14px;
        }

        .profile-meta-item i {
            color: #667eea;
        }

        .profile-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .profile-card-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-card-title i {
            color: #667eea;
        }

        .profile-field {
            margin-bottom: 20px;
        }

        .profile-field-label {
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 8px;
        }

        .profile-field-value {
            font-size: 16px;
            color: #1a202c;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 8px;
        }

        .preference-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .preference-item:hover {
            background: #eff6ff;
            transform: translateX(4px);
        }

        .preference-label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            color: #374151;
        }

        .preference-label i {
            color: #667eea;
            font-size: 18px;
        }

        .preference-value {
            color: #64748b;
            font-size: 14px;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-content {
                grid-template-columns: 1fr;
            }

            .profile-meta {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/components/unified-header.php'; ?>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar-large">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-info">
                <div class="profile-name"><?php echo htmlspecialchars($userName); ?></div>
                <div class="profile-role"><?php echo htmlspecialchars($userRole); ?></div>
                <div class="profile-meta">
                    <div class="profile-meta-item">
                        <i class="fas fa-envelope"></i>
                        <span><?php echo htmlspecialchars($userEmail); ?></span>
                    </div>
                    <div class="profile-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>Joined March 2024</span>
                    </div>
                    <div class="profile-meta-item">
                        <i class="fas fa-clock"></i>
                        <span>Last login: Today at 10:30 AM</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-card">
                <div class="profile-card-title">
                    <i class="fas fa-info-circle"></i>
                    Personal Information
                </div>
                <div class="profile-field">
                    <div class="profile-field-label">Full Name</div>
                    <div class="profile-field-value"><?php echo htmlspecialchars($userName); ?></div>
                </div>
                <div class="profile-field">
                    <div class="profile-field-label">Email Address</div>
                    <div class="profile-field-value"><?php echo htmlspecialchars($userEmail); ?></div>
                </div>
                <div class="profile-field">
                    <div class="profile-field-label">Phone Number</div>
                    <div class="profile-field-value">+95 9 123 456 789</div>
                </div>
                <div class="profile-field">
                    <div class="profile-field-label">NRC Number</div>
                    <div class="profile-field-value">12/ABCDEF(N)123456</div>
                </div>
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="alert('Edit profile functionality would be implemented here')">
                        <i class="fas fa-edit"></i>
                        Edit Profile
                    </button>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-card-title">
                    <i class="fas fa-cog"></i>
                    Preferences & Security
                </div>
                <div class="preference-item" onclick="toggleTheme(event)">
                    <div class="preference-label">
                        <i class="fas fa-palette"></i>
                        Theme
                    </div>
                    <div class="preference-value">Light</div>
                </div>
                <div class="preference-item" onclick="toggleLanguage(event)">
                    <div class="preference-label">
                        <i class="fas fa-globe"></i>
                        Language
                    </div>
                    <div class="preference-value">English</div>
                </div>
                <div class="preference-item" onclick="openChangePasswordModal()">
                    <div class="preference-label">
                        <i class="fas fa-key"></i>
                        Change Password
                    </div>
                    <div class="preference-value">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="preference-item" onclick="alert('Notification settings would be implemented here')">
                    <div class="preference-label">
                        <i class="fas fa-bell"></i>
                        Notifications
                    </div>
                    <div class="preference-value">Enabled</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
