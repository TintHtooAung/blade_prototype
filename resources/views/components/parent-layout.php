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
    <?php
    // Include reusable unified header component
    $dashboardUrl = '/parent/dashboard';
    $userName = 'Parent User';
    $userEmail = 'parent@novahub.edu';
    $userRole = 'Parent';
    include 'unified-header.php';
    ?>
    
    <div class="d-flex">
        <?php include 'parent-sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Page Content -->
            <?php echo $content ?? ''; ?>
        </div>
    </div>

    <style>
    /* Profile section is now in unified header - no floating badge needed */
    
    /* Fix sidebar to always be parallel with main content - fixed positioning */
    .sidebar {
        position: fixed !important;
        top: 64px !important;
        left: 0 !important;
        bottom: 0 !important;
        height: auto !important;
        min-height: calc(100vh - 64px) !important;
        max-height: none !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
        z-index: 999 !important;
    }
    
    /* Ensure sidebar hamburger is visible and positioned correctly - simple rounded border cross with increased visibility */
    .sidebar .sidebar-hamburger {
        display: flex !important;
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 100;
        background: transparent;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 50%;
        box-shadow: none;
        width: 32px;
        height: 32px;
        opacity: 0.85;
        color: rgba(0, 0, 0, 0.6);
    }
    
    /* Add padding to sidebar nav to create space below close button */
    .sidebar .sidebar-nav {
        padding-top: 56px !important;
    }

    .main-content {
        margin-top: 64px !important;
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
    // Profile dropdown toggle - using unified header profile section
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        if (dropdown) {
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileSection = document.querySelector('.header-profile-section');
        const dropdown = document.getElementById('profileDropdown');
        
        if (profileSection && dropdown && !profileSection.contains(event.target) && dropdown.style.display !== 'none') {
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
    
    // Fix sidebar height to match main content - keeps sidebar parallel at all times
    function syncSidebarHeight() {
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        
        if (sidebar && mainContent) {
            const mainContentHeight = mainContent.scrollHeight;
            const viewportHeight = window.innerHeight - 64;
            const targetHeight = Math.max(mainContentHeight, viewportHeight);
            sidebar.style.height = targetHeight + 'px';
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        syncSidebarHeight();
        window.addEventListener('resize', syncSidebarHeight);
        
        const observer = new MutationObserver(function() {
            syncSidebarHeight();
        });
        
        const mainContent = document.querySelector('.main-content');
        if (mainContent) {
            observer.observe(mainContent, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['style', 'class']
            });
        }
        
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(syncSidebarHeight, 100);
        });
    });
    </script>
</body>
</html>

