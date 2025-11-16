<?php
// Expect $pageTitle, $pageIcon, $content, $activePage
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Smart Campus Guardian'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .guardian-topbar { display:flex; align-items:center; justify-content:space-between; padding:12px 16px; background:#174B8F; color:#fff; }
        .guardian-topbar .brand { display:flex; align-items:center; gap:10px; font-weight:600; }
        .lang-toggle { background:#ffffff22; border:1px solid #ffffff33; color:#fff; padding:6px 10px; border-radius:8px; cursor:pointer; }
        .guardian-container { 
            display:flex; 
            margin-left: 240px;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .guardian-main { 
            flex:1; 
            padding:16px; 
            background:#F6F7FB; 
            min-height:100vh; 
            width: calc(100vw - 240px);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInContent 0.3s ease-in-out;
        }
        
        @keyframes fadeInContent {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .kid-switch { display:flex; gap:8px; }
        .kid-chip { background:#fff; border:1px solid #e0e0e0; padding:6px 10px; border-radius:16px; cursor:pointer; }
        .kid-chip.active { background:#e3f2fd; border-color:#1976d2; color:#1976d2; }
        
        /* Profile Badge Styles */
        .profile-badge-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
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
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }
        
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .guardian-topbar {
                padding: 10px 12px !important;
                flex-wrap: wrap;
                gap: 8px;
            }
            
            .guardian-topbar .brand {
                font-size: 0.9rem;
            }
            
            .kid-switch {
                flex-wrap: wrap;
                gap: 6px;
            }
            
            .kid-chip {
                padding: 4px 8px;
                font-size: 0.8rem;
            }
            
            .lang-toggle {
                padding: 4px 8px;
                font-size: 0.8rem;
            }
            
            .profile-badge-container {
                top: 60px;
                right: 12px;
            }
            
            .guardian-container {
                margin-left: 0 !important;
            }
            
            .guardian-main {
                padding: 12px !important;
                width: 100% !important;
            }
            
            /* Mobile Page Content Optimization */
            .page-header-compact {
                padding: 12px 0 !important;
                margin-bottom: 16px !important;
            }
            
            .page-header-compact h2 {
                font-size: 1.25rem !important;
            }
            
            .simple-section {
                padding: 12px !important;
                margin-bottom: 16px !important;
            }
            
            .simple-header {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 12px !important;
            }
            
            .simple-header h3 {
                font-size: 1.1rem !important;
            }
            
            .simple-actions {
                width: 100% !important;
                flex-wrap: wrap !important;
                gap: 8px !important;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }
            
            .stats-grid-secondary {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }
            
            .stat-card {
                padding: 12px !important;
            }
            
            .stat-card h3 {
                font-size: 1.5rem !important;
            }
            
            .stat-card p {
                font-size: 0.85rem !important;
            }
            
            .simple-table-container {
                overflow-x: auto !important;
                -webkit-overflow-scrolling: touch !important;
            }
            
            .basic-table {
                font-size: 0.85rem !important;
                min-width: 600px !important;
            }
            
            .basic-table th,
            .basic-table td {
                padding: 8px 6px !important;
            }
            
            .simple-btn {
                padding: 8px 12px !important;
                font-size: 0.85rem !important;
            }
            
            .form-group {
                margin-bottom: 12px !important;
            }
            
            .form-input,
            .form-select {
                padding: 8px 12px !important;
                font-size: 0.9rem !important;
            }
            
            .navigation-breadcrumb {
                margin-bottom: 12px !important;
            }
            
            .breadcrumb-link {
                font-size: 0.85rem !important;
                padding: 6px 8px !important;
            }
            
            .action-status-bar {
                padding: 10px 12px !important;
                margin-right: 0 !important;
                max-width: 100% !important;
            }
            
            .action-status-text {
                font-size: 0.85rem !important;
            }
            
            /* Compact dashboard cards for mobile */
            .dashboard-card {
                margin-bottom: 12px !important;
            }
            
            .dashboard-card-header {
                padding: 10px !important;
            }
            
            .dashboard-card-body {
                padding: 10px !important;
            }
            
            .activity-item {
                padding: 8px 0 !important;
            }
            
            .activity-content h6 {
                font-size: 0.8rem !important;
            }
            
            .activity-content p {
                font-size: 0.75rem !important;
            }
        }
        
        @media (max-width: 480px) {
            .guardian-topbar {
                padding: 8px 10px !important;
            }
            
            .guardian-topbar .brand {
                font-size: 0.85rem;
            }
            
            .kid-chip {
                font-size: 0.75rem;
                padding: 3px 6px;
            }
            
            .lang-toggle {
                font-size: 0.75rem;
                padding: 3px 6px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr !important;
            }
            
            .stats-grid-secondary {
                grid-template-columns: 1fr !important;
            }
            
            .simple-header h3 {
                font-size: 1rem !important;
            }
            
            .page-header-compact h2 {
                font-size: 1.1rem !important;
            }
            
            .stat-card h3 {
                font-size: 1.25rem !important;
            }
        }
    </style>
</head>
<body>
    <?php
    // Include reusable unified header component
    $dashboardUrl = '/guardian/dashboard';
    $userName = 'Guardian User';
    $userEmail = 'guardian@school.edu';
    $userRole = 'Guardian';
    include 'unified-header.php';
    ?>
    
    <!-- Action Status Message (appears after actions) -->
    <div id="actionStatusBar" class="action-status-bar" style="display:none;">
        <div class="action-status-content">
            <i class="fas fa-check-circle action-status-icon"></i>
            <span class="action-status-text"></span>
        </div>
        <button class="action-status-close" onclick="closeActionStatus()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="guardian-container">
        <?php include __DIR__ . '/guardian-sidebar.php'; ?>
        <main class="guardian-main">
            <?php echo $content ?? ''; ?>
        </main>
    </div>

    <!-- Reusable Confirmation Dialog -->
    <div id="confirmDialog" class="confirm-dialog-overlay" style="display:none;">
        <div class="confirm-dialog-content">
            <div class="confirm-dialog-header">
                <div class="confirm-icon-wrapper" id="confirmIconWrapper">
                    <i id="confirmDialogIcon" class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
            <div class="confirm-dialog-body">
                <h3 id="confirmDialogTitle">Confirm Action</h3>
                <p id="confirmDialogMessage">Are you sure you want to proceed?</p>
            </div>
            <div class="confirm-dialog-actions">
                <button class="simple-btn secondary" onclick="closeConfirmDialog()">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <button class="simple-btn danger" id="confirmDialogBtn" onclick="confirmDialogAction()">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </div>
        </div>
    </div>

    <script>
    // Simple bilingual toggle (label only for prototype)
    document.getElementById('langToggle')?.addEventListener('click', function(){
        this.textContent = this.textContent === 'English' ? 'မြန်မာ' : 'English';
    });
    // Multi-child switch visual
    document.getElementById('kidSwitch')?.addEventListener('click', function(e){
        const chip = e.target.closest('.kid-chip'); if(!chip) return;
        Array.from(this.children).forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
    });

    // Confirmation Dialog System
    let confirmDialogCallback = null;

    function showConfirmDialog(options = {}) {
        const dialog = document.getElementById('confirmDialog');
        const titleEl = document.getElementById('confirmDialogTitle');
        const messageEl = document.getElementById('confirmDialogMessage');
        const btnEl = document.getElementById('confirmDialogBtn');
        const iconWrapper = document.getElementById('confirmIconWrapper');
        const iconEl = document.getElementById('confirmDialogIcon');

        // Set content
        titleEl.textContent = options.title || 'Confirm Action';
        messageEl.textContent = options.message || 'Are you sure you want to proceed?';
        btnEl.innerHTML = `<i class="${options.confirmIcon || 'fas fa-check'}"></i> ${options.confirmText || 'Confirm'}`;

        // Set icon and style
        if (options.confirmIcon) {
            iconEl.className = options.confirmIcon;
        }
        
        const iconType = options.iconType || 'warning';
        iconWrapper.className = `confirm-icon-wrapper ${iconType}`;
        
        // Update button class
        btnEl.className = `simple-btn ${options.confirmClass || 'danger'}`;

        // Store callback
        confirmDialogCallback = options.onConfirm || null;

        // Show dialog
        dialog.style.display = 'flex';
    }

    function closeConfirmDialog() {
        const dialog = document.getElementById('confirmDialog');
        dialog.style.display = 'none';
        confirmDialogCallback = null;
    }

    function confirmDialogAction() {
        if (confirmDialogCallback) {
            confirmDialogCallback();
        }
        closeConfirmDialog();
    }

    // Close on overlay click
    document.getElementById('confirmDialog')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeConfirmDialog();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && document.getElementById('confirmDialog').style.display === 'flex') {
            closeConfirmDialog();
        }
    });

    // Action Status System
    function showActionStatus(message, type = 'success') {
        const statusBar = document.getElementById('actionStatusBar');
        const statusText = statusBar.querySelector('.action-status-text');
        const statusIcon = statusBar.querySelector('.action-status-icon');
        
        // Icon based on type
        const icons = {
            success: 'fa-check-circle',
            error: 'fa-times-circle',
            warning: 'fa-exclamation-circle',
            info: 'fa-info-circle'
        };
        
        // Update content
        statusText.textContent = message;
        statusIcon.className = `fas ${icons[type] || icons.success} action-status-icon`;
        
        // Update styling
        statusBar.className = `action-status-bar ${type}`;
        statusBar.style.display = 'flex';
        
        // Scroll to top to ensure visibility
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function closeActionStatus() {
        const statusBar = document.getElementById('actionStatusBar');
        statusBar.style.display = 'none';
    }

    // Profile Dropdown Functionality
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        const isVisible = dropdown.style.display !== 'none';
        
        if (isVisible) {
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = 'block';
        }
    }

    function viewProfile() {
        showActionStatus('Opening profile...', 'info');
        // Redirect to profile page
        setTimeout(() => {
            window.location.href = '/guardian/profile';
        }, 500);
    }

    function logout() {
        showConfirmDialog({
            title: 'Logout',
            message: 'Are you sure you want to logout?',
            confirmText: 'Logout',
            confirmIcon: 'fas fa-sign-out-alt',
            onConfirm: function() {
                showActionStatus('Logging out...', 'info');
                // Clear user session
                localStorage.removeItem('userRole');
                localStorage.removeItem('userEmail');
                localStorage.removeItem('isLoggedIn');
                // Redirect to login page after logout
                setTimeout(() => {
                    window.location.href = '/';
                }, 1500);
            }
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileContainer = document.querySelector('.profile-badge-container');
        const dropdown = document.getElementById('profileDropdown');
        
        if (!profileContainer.contains(event.target) && dropdown.style.display !== 'none') {
            dropdown.style.display = 'none';
        }
    });
    </script>
</body>
</html>



