<?php
// Teacher Layout Component
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
    $dashboardUrl = '/teacher/dashboard';
    $userName = 'Teacher User';
    $userEmail = 'teacher@novahub.edu';
    $userRole = 'Teacher';
    include 'unified-header.php';
    ?>
    
    <div class="d-flex">
        <?php include 'teacher-sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="main-content">
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
            
            <!-- Page Content -->
            <?php echo $content ?? ''; ?>
        </div>
    </div>

    <!-- Reusable Confirmation Dialog -->
    <div id="confirmDialog" class="confirm-dialog-overlay" style="display:none;">
        <div class="confirm-dialog-content">
            <div class="confirm-dialog-header">
                <div class="confirm-icon-wrapper">
                    <i class="fas fa-exclamation-triangle"></i>
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

    <!-- Toast Notification Container -->
    <div id="toastContainer" class="toast-container"></div>

    <style>
    /* Confirmation Dialog Styles */
    .confirm-dialog-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.2s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .confirm-dialog-content {
        background: #fff;
        border-radius: 12px;
        width: 90%;
        max-width: 450px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .confirm-dialog-header {
        padding: 24px 24px 16px 24px;
        text-align: center;
    }

    .confirm-icon-wrapper {
        width: 64px;
        height: 64px;
        margin: 0 auto;
        background: #fff3e0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .confirm-icon-wrapper i {
        font-size: 28px;
        color: #ef6c00;
    }

    .confirm-dialog-body {
        padding: 16px 24px 24px 24px;
        text-align: center;
    }

    .confirm-dialog-body h3 {
        margin: 0 0 8px 0;
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
    }

    .confirm-dialog-body p {
        margin: 0;
        font-size: 0.95rem;
        color: #666;
        line-height: 1.5;
    }

    .confirm-dialog-actions {
        padding: 16px 24px 24px 24px;
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .confirm-dialog-actions .simple-btn {
        flex: 1;
        max-width: 160px;
    }

    /* Danger button style */
    .simple-btn.danger {
        background: #d32f2f;
        color: #fff;
        border: none;
    }

    .simple-btn.danger:hover {
        background: #c62828;
    }

    @media screen and (max-width: 480px) {
        .confirm-dialog-content {
            width: 95%;
        }

        .confirm-dialog-actions .simple-btn {
            max-width: none;
        }
    }

    /* Action Status Bar - Main Content Area */
    .action-status-bar {
        background: white;
        border-left: 4px solid #10b981;
        border-radius: 8px;
        padding: 16px 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        animation: slideDown 0.3s ease-out;
    }

    .action-status-bar.success {
        border-left-color: #10b981;
        background: #f0fdf4;
    }

    .action-status-bar.error {
        border-left-color: #ef4444;
        background: #fef2f2;
    }

    .action-status-bar.warning {
        border-left-color: #f59e0b;
        background: #fffbeb;
    }

    .action-status-bar.info {
        border-left-color: #3b82f6;
        background: #eff6ff;
    }

    .action-status-content {
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
    }

    .action-status-icon {
        font-size: 20px;
        flex-shrink: 0;
    }

    .action-status-bar.success .action-status-icon {
        color: #10b981;
    }

    .action-status-bar.error .action-status-icon {
        color: #ef4444;
    }

    .action-status-bar.warning .action-status-icon {
        color: #f59e0b;
    }

    .action-status-bar.info .action-status-icon {
        color: #3b82f6;
    }

    .action-status-text {
        font-size: 14px;
        font-weight: 500;
        color: #1f2937;
        line-height: 1.5;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        flex: 1;
        min-width: 0;
        max-width: calc(100% - 120px); /* Reserve space for icon and close button */
    }

    .action-status-close {
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 4px 8px;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s;
        margin-left: 12px;
        flex-shrink: 0;
    }

    .action-status-close:hover {
        color: #4b5563;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Toast Notification Styles */
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 10000;
        display: flex;
        flex-direction: column;
        gap: 12px;
        pointer-events: none;
    }

    .toast {
        background: white;
        border-radius: 8px;
        padding: 16px 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 320px;
        max-width: 450px;
        pointer-events: auto;
        animation: slideIn 0.3s ease-out;
        border-left: 4px solid #10b981;
    }

    .toast.success {
        border-left-color: #10b981;
    }

    .toast.error {
        border-left-color: #ef4444;
    }

    .toast.warning {
        border-left-color: #f59e0b;
    }

    .toast.info {
        border-left-color: #3b82f6;
    }

    .toast-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .toast.success .toast-icon {
        background: #d1fae5;
        color: #10b981;
    }

    .toast.error .toast-icon {
        background: #fee2e2;
        color: #ef4444;
    }

    .toast.warning .toast-icon {
        background: #fef3c7;
        color: #f59e0b;
    }

    .toast.info .toast-icon {
        background: #dbeafe;
        color: #3b82f6;
    }

    .toast-content {
        flex: 1;
        font-size: 14px;
        color: #1f2937;
        line-height: 1.5;
    }

    .toast-close {
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s;
    }

    .toast-close:hover {
        color: #4b5563;
    }

    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    .toast.hiding {
        animation: slideOut 0.3s ease-out forwards;
    }
    </style>

    <script>
    // Reusable Confirmation Dialog
    let confirmDialogCallback = null;

    function showConfirmDialog(options) {
        const {
            title = 'Confirm Action',
            message = 'Are you sure you want to proceed?',
            confirmText = 'Delete',
            confirmIcon = 'fas fa-trash',
            onConfirm = () => {}
        } = options;

        document.getElementById('confirmDialogTitle').textContent = title;
        document.getElementById('confirmDialogMessage').textContent = message;
        
        const confirmBtn = document.getElementById('confirmDialogBtn');
        confirmBtn.innerHTML = `<i class="${confirmIcon}"></i> ${confirmText}`;
        
        confirmDialogCallback = onConfirm;
        document.getElementById('confirmDialog').style.display = 'flex';
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    function closeConfirmDialog() {
        document.getElementById('confirmDialog').style.display = 'none';
        confirmDialogCallback = null;
        
        // Restore body scroll
        document.body.style.overflow = '';
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

    // Action Status System - Shows in main content area
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
        
        // Store in sessionStorage for activity log
        try {
            const activityLog = JSON.parse(sessionStorage.getItem('activityLog') || '[]');
            activityLog.push({
                message: message,
                type: type,
                timestamp: new Date().toISOString()
            });
            // Keep last 50 actions
            if (activityLog.length > 50) activityLog.shift();
            sessionStorage.setItem('activityLog', JSON.stringify(activityLog));
        } catch (e) {
            console.error('Failed to log activity:', e);
        }
    }

    function closeActionStatus() {
        const statusBar = document.getElementById('actionStatusBar');
        statusBar.style.display = 'none';
    }

    // Legacy showToast for compatibility (calls showActionStatus)
    function showToast(message, type = 'success', duration = 3000) {
        showActionStatus(message, type);
    }

    // Check for pending status message on page load (after redirect)
    document.addEventListener('DOMContentLoaded', function() {
        const pendingMessage = sessionStorage.getItem('pendingActionMessage');
        const pendingType = sessionStorage.getItem('pendingActionType') || 'success';
        
        if (pendingMessage) {
            showActionStatus(pendingMessage, pendingType);
            sessionStorage.removeItem('pendingActionMessage');
            sessionStorage.removeItem('pendingActionType');
        }
    });

    // Helper for redirects with status message
    function redirectWithStatus(url, message, type = 'success', delay = 1000) {
        sessionStorage.setItem('pendingActionMessage', message);
        sessionStorage.setItem('pendingActionType', type);
        setTimeout(() => window.location.href = url, delay);
    }

    // Profile Dropdown Functionality
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        const isVisible = dropdown.style.display !== 'none';
        
        if (isVisible) {
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = 'block';
            // Close any open sub-dropdowns
            closeAllSubDropdowns();
        }
    }

    function closeAllSubDropdowns() {
        const subDropdowns = document.querySelectorAll('.profile-sub-dropdown');
        subDropdowns.forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }

    function toggleTheme(evt) {
        const themeDropdown = document.getElementById('themeDropdown');
        if (!themeDropdown) {
            createThemeDropdown();
        }
        
        closeAllSubDropdowns();
        const dropdown = document.getElementById('themeDropdown');
        try {
            const trigger = evt && evt.currentTarget ? evt.currentTarget : null;
            const top = trigger ? trigger.offsetTop : 0;
            dropdown.style.top = top + 'px';
            dropdown.style.left = 'auto';
            dropdown.style.right = '100%';
        } catch(e) {}
        dropdown.classList.toggle('show');
    }

    function toggleLanguage(evt) {
        const languageDropdown = document.getElementById('languageDropdown');
        if (!languageDropdown) {
            createLanguageDropdown();
        }
        
        closeAllSubDropdowns();
        const dropdown = document.getElementById('languageDropdown');
        try {
            const trigger = evt && evt.currentTarget ? evt.currentTarget : null;
            const top = trigger ? trigger.offsetTop : 0;
            dropdown.style.top = top + 'px';
            dropdown.style.left = 'auto';
            dropdown.style.right = '100%';
        } catch(e) {}
        dropdown.classList.toggle('show');
    }

    function createThemeDropdown() {
        const themeDropdown = document.createElement('div');
        themeDropdown.id = 'themeDropdown';
        themeDropdown.className = 'profile-sub-dropdown';
        
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        themeDropdown.innerHTML = `
            <div class="profile-sub-dropdown-item ${currentTheme === 'light' ? 'active' : ''}" onclick="setTheme('light')">
                <i class="fas fa-sun"></i>
                <span>Light</span>
            </div>
            <div class="profile-sub-dropdown-item ${currentTheme === 'dark' ? 'active' : ''}" onclick="setTheme('dark')">
                <i class="fas fa-moon"></i>
                <span>Dark</span>
            </div>
            <div class="profile-sub-dropdown-item ${currentTheme === 'auto' ? 'active' : ''}" onclick="setTheme('auto')">
                <i class="fas fa-adjust"></i>
                <span>Auto</span>
            </div>
        `;
        
        document.querySelector('.profile-dropdown').appendChild(themeDropdown);
    }

    function createLanguageDropdown() {
        const languageDropdown = document.createElement('div');
        languageDropdown.id = 'languageDropdown';
        languageDropdown.className = 'profile-sub-dropdown';
        
        const currentLanguage = localStorage.getItem('language') || 'en';
        
        languageDropdown.innerHTML = `
            <div class="profile-sub-dropdown-item ${currentLanguage === 'en' ? 'active' : ''}" onclick="setLanguage('en')">
                <i class="fas fa-flag-usa"></i>
                <span>English</span>
            </div>
            <div class="profile-sub-dropdown-item ${currentLanguage === 'es' ? 'active' : ''}" onclick="setLanguage('es')">
                <i class="fas fa-flag"></i>
                <span>Español</span>
            </div>
            <div class="profile-sub-dropdown-item ${currentLanguage === 'fr' ? 'active' : ''}" onclick="setLanguage('fr')">
                <i class="fas fa-flag"></i>
                <span>Français</span>
            </div>
            <div class="profile-sub-dropdown-item ${currentLanguage === 'de' ? 'active' : ''}" onclick="setLanguage('de')">
                <i class="fas fa-flag"></i>
                <span>Deutsch</span>
            </div>
        `;
        
        document.querySelector('.profile-dropdown').appendChild(languageDropdown);
    }

    function setTheme(theme) {
        localStorage.setItem('theme', theme);
        
        // Update active state
        const themeDropdown = document.getElementById('themeDropdown');
        if (themeDropdown) {
            const items = themeDropdown.querySelectorAll('.profile-sub-dropdown-item');
            items.forEach(item => item.classList.remove('active'));
            event.target.closest('.profile-sub-dropdown-item').classList.add('active');
        }
        
        // Apply theme
        applyTheme(theme);
        showActionStatus(`Theme changed to ${theme}`, 'success');
    }

    function setLanguage(language) {
        localStorage.setItem('language', language);
        
        // Update active state
        const languageDropdown = document.getElementById('languageDropdown');
        if (languageDropdown) {
            const items = languageDropdown.querySelectorAll('.profile-sub-dropdown-item');
            items.forEach(item => item.classList.remove('active'));
            event.target.closest('.profile-sub-dropdown-item').classList.add('active');
        }
        
        showActionStatus(`Language changed to ${language}`, 'success');
    }

    function applyTheme(theme) {
        const body = document.body;
        
        if (theme === 'dark') {
            body.classList.add('dark-theme');
        } else if (theme === 'light') {
            body.classList.remove('dark-theme');
        } else if (theme === 'auto') {
            // Auto theme based on system preference
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                body.classList.add('dark-theme');
            } else {
                body.classList.remove('dark-theme');
            }
        }
    }

    function viewProfile() {
        showActionStatus('Opening profile...', 'info');
        setTimeout(() => {
            window.location.href = '/teacher/teacher-profile';
        }, 500);
    }

    function editProfile() {
        showActionStatus('Opening settings...', 'info');
        setTimeout(() => {
            window.location.href = '/teacher/teacher-profile-edit';
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
        const profileContainer = document.querySelector('.header-profile-section');
        const dropdown = document.getElementById('profileDropdown');
        
        if (profileContainer && dropdown && !profileContainer.contains(event.target) && dropdown.style.display !== 'none') {
            dropdown.style.display = 'none';
            closeAllSubDropdowns();
        }
    });

    // Initialize theme on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dropdown.js"></script>

    <style>
    /* Profile section is now in unified header - no floating badge needed */
    
    /* Adjust sidebar and main content for fixed header */
    .sidebar {
        top: 64px !important;
        height: calc(100vh - 64px) !important;
    }

    .main-content {
        margin-top: 64px !important;
        }
        
        /* Mobile Page Content Optimization */
    @media (max-width: 768px) {
        .main-content {
            padding: 12px !important;
            margin-left: 0 !important;
        }
        
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

    /* Dark Theme Support - handled by unified header */

    /* Preferences sub-dropdown (Theme/Language) */
    .profile-sub-dropdown {
        position: absolute;
        top: 0;
        right: 100%;
        left: auto;
        margin-right: 8px;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        min-width: 200px;
        overflow: hidden;
        display: none;
        z-index: 1002;
    }
    .profile-sub-dropdown.show { display: block; }
    .profile-sub-dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    .profile-sub-dropdown-item:hover { background: #f9fafb; }
    .profile-sub-dropdown-item i { width: 16px; font-size: 14px; color: #6b7280; }
    .profile-sub-dropdown-item span { flex: 1; font-size: 13px; color: #374151; font-weight: 500; }
    .profile-sub-dropdown-item.active { background: #eff6ff; color: #2563eb; }
    .profile-sub-dropdown-item.active i, .profile-sub-dropdown-item.active span { color: #2563eb; }
    </style>
</body>
</html>
