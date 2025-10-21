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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="d-flex">
        <?php include 'teacher-sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Badge (Floating) -->
            <div class="profile-badge-container">
                <div class="profile-badge" onclick="toggleProfileDropdown()">
                    <div class="profile-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="profile-info">
                        <div class="profile-name">Teacher User</div>
                        <div class="profile-role">Teacher</div>
                    </div>
                    <div class="profile-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <!-- Profile Dropdown -->
                <div id="profileDropdown" class="profile-dropdown" style="display: none;">
                    <div class="profile-dropdown-header">
                        <div class="profile-dropdown-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="profile-dropdown-info">
                            <div class="profile-dropdown-name">Teacher User</div>
                            <div class="profile-dropdown-email">teacher@novahub.edu</div>
                        </div>
                    </div>
                    
                    <div class="profile-dropdown-divider"></div>
                    
                    <div class="profile-dropdown-section">
                        <div class="profile-dropdown-label">Preferences</div>
                        <div class="profile-dropdown-item" onclick="toggleTheme()">
                            <i class="fas fa-palette"></i>
                            <span>Theme</span>
                            <div class="profile-dropdown-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        <div class="profile-dropdown-item" onclick="toggleLanguage()">
                            <i class="fas fa-globe"></i>
                            <span>Language</span>
                            <div class="profile-dropdown-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profile-dropdown-divider"></div>
                    
                    <div class="profile-dropdown-section">
                        <div class="profile-dropdown-item" onclick="viewProfile()">
                            <i class="fas fa-user"></i>
                            <span>View Profile</span>
                        </div>
                        <div class="profile-dropdown-item" onclick="editProfile()">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </div>
                    </div>
                    
                    <div class="profile-dropdown-divider"></div>
                    
                    <div class="profile-dropdown-section">
                        <div class="profile-dropdown-item logout-item" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </div>
                    </div>
                </div>
            </div>
            
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
        font-size: 15px;
        font-weight: 500;
        color: #1f2937;
        line-height: 1.5;
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

    function toggleTheme() {
        const themeDropdown = document.getElementById('themeDropdown');
        if (!themeDropdown) {
            createThemeDropdown();
        }
        
        closeAllSubDropdowns();
        const dropdown = document.getElementById('themeDropdown');
        dropdown.classList.toggle('show');
    }

    function toggleLanguage() {
        const languageDropdown = document.getElementById('languageDropdown');
        if (!languageDropdown) {
            createLanguageDropdown();
        }
        
        closeAllSubDropdowns();
        const dropdown = document.getElementById('languageDropdown');
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
        // Add profile view functionality here
        setTimeout(() => {
            showActionStatus('Profile view feature coming soon!', 'info');
        }, 1000);
    }

    function editProfile() {
        showActionStatus('Opening settings...', 'info');
        // Add settings functionality here
        setTimeout(() => {
            showActionStatus('Settings feature coming soon!', 'info');
        }, 1000);
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
</body>
</html>
