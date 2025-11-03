<?php
// Parent Layout Component
$pageTitle = $pageTitle ?? 'Smart Campus Nova Hub';
$pageIcon = $pageIcon ?? 'fas fa-home';
$activePage = $activePage ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="d-flex">
        <?php include 'parent-sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Badge (Floating) -->
            <div class="profile-badge-container">
                <div class="profile-badge-icon-only" onclick="toggleProfileDropdown()" title="Profile">
                    <div class="profile-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>
                
                <!-- Profile Dropdown -->
                <div id="profileDropdown" class="profile-dropdown" style="display: none;">
                    <div class="profile-dropdown-header">
                        <div class="profile-dropdown-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="profile-dropdown-info">
                            <div class="profile-dropdown-name">Parent User</div>
                            <div class="profile-dropdown-email">parent@novahub.edu</div>
                        </div>
                    </div>
                    
                    <div class="profile-dropdown-divider"></div>
                    
                    <a href="/parent/profile" class="profile-dropdown-item">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                    
                    <a href="/parent/settings" class="profile-dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    
                    <div class="profile-dropdown-divider"></div>
                    
                    <a href="/" class="profile-dropdown-item profile-dropdown-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            
            <!-- Page Content -->
            <?php echo $content ?? ''; ?>
        </div>
    </div>

    <style>
    /* Profile Badge Styles */
    .profile-badge-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
    }

    .profile-badge {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        min-width: 180px;
    }

    .profile-badge:hover {
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px);
    }

    /* Icon-only profile badge */
    .profile-badge-icon-only {
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        width: 44px;
        height: 44px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 0;
    }

    .profile-badge-icon-only:hover {
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px) scale(1.05);
    }

    .profile-avatar {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        margin-right: 12px;
        flex-shrink: 0;
    }

    /* Avatar inside icon-only badge */
    .profile-badge-icon-only .profile-avatar {
        margin-right: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .profile-info {
        flex: 1;
        min-width: 0;
    }

    .profile-name {
        font-weight: 600;
        font-size: 14px;
        color: #1f2937;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-role {
        font-size: 12px;
        color: #6b7280;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-arrow {
        color: #9ca3af;
        font-size: 12px;
        transition: transform 0.3s ease;
        margin-left: 8px;
    }

    .profile-badge:hover .profile-arrow {
        transform: rotate(180deg);
    }

    .profile-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 8px;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        min-width: 240px;
        overflow: visible;
        z-index: 1001;
    }

    .profile-dropdown-header {
        padding: 16px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .profile-dropdown-avatar {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .profile-dropdown-info {
        flex: 1;
        min-width: 0;
    }

    .profile-dropdown-name {
        font-weight: 600;
        font-size: 14px;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-dropdown-email {
        font-size: 12px;
        opacity: 0.8;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-dropdown-divider {
        height: 1px;
        background: #e5e7eb;
        margin: 8px 0;
    }

    .profile-dropdown-item {
        display: flex;
        align-items: center;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        color: #374151;
        font-size: 14px;
        text-decoration: none;
    }

    .profile-dropdown-item:hover {
        background: #f3f4f6;
        color: #374151;
        text-decoration: none;
    }

    .profile-dropdown-item i {
        width: 20px;
        margin-right: 12px;
        color: #6b7280;
        font-size: 14px;
    }

    .profile-dropdown-item span {
        flex: 1;
    }

    .profile-dropdown-logout {
        color: #dc2626;
    }

    .profile-dropdown-logout:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    .profile-dropdown-logout i {
        color: #dc2626;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-badge-container {
            top: 15px;
            right: 15px;
        }

        .profile-badge {
            min-width: 160px;
            padding: 6px 10px;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            font-size: 16px;
            margin-right: 10px;
        }

        .profile-name {
            font-size: 13px;
        }

        .profile-role {
            font-size: 11px;
        }

        .profile-dropdown {
            min-width: 200px;
        }
    }
    
    /* Toast Notification Styles */
    .toast-container {
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 10000;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .toast-notification {
        background: white;
        border-radius: 8px;
        padding: 12px 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 300px;
        opacity: 0;
        transform: translateX(400px);
        transition: all 0.3s ease;
    }

    .toast-notification.show {
        opacity: 1;
        transform: translateX(0);
    }

    .toast-notification i {
        font-size: 18px;
    }

    .toast-success {
        border-left: 4px solid #10b981;
    }

    .toast-success i {
        color: #10b981;
    }

    .toast-error {
        border-left: 4px solid #ef4444;
    }

    .toast-error i {
        color: #ef4444;
    }

    .toast-info {
        border-left: 4px solid #3b82f6;
    }

    .toast-info i {
        color: #3b82f6;
    }

    .toast-warning {
        border-left: 4px solid #f59e0b;
    }

    .toast-warning i {
        color: #f59e0b;
    }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    // Profile dropdown toggle
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileBadge = document.querySelector('.profile-badge');
        const dropdown = document.getElementById('profileDropdown');
        
        if (!profileBadge.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
    
    // Action status notification
    function showActionStatus(message, type = 'success') {
        const container = document.getElementById('toastContainer');
        if (!container) {
            const newContainer = document.createElement('div');
            newContainer.id = 'toastContainer';
            newContainer.className = 'toast-container';
            document.body.appendChild(newContainer);
        }
        
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type}`;
        
        const icon = type === 'success' ? 'fa-check-circle' : 
                     type === 'error' ? 'fa-times-circle' : 
                     type === 'info' ? 'fa-info-circle' : 'fa-exclamation-circle';
        
        toast.innerHTML = `
            <i class="fas ${icon}"></i>
            <span>${message}</span>
        `;
        
        const toastContainer = document.getElementById('toastContainer');
        toastContainer.appendChild(toast);
        
        setTimeout(() => toast.classList.add('show'), 10);
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    </script>
</body>
</html>

