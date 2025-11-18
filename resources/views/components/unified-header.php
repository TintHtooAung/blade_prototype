<?php
// Unified Header Component - Reusable across all layouts
// Parameters:
//   - $dashboardUrl: URL to dashboard (default: '/admin/dashboard')
//   - $userName: User's display name (default: 'User')
//   - $userEmail: User's email (default: 'user@novahub.edu')
//   - $userRole: User's role/access level (default: 'User')
//   - $logoUrl: Logo image URL (default: '/images/smart-campus-logo.svg')
$dashboardUrl = $dashboardUrl ?? '/admin/dashboard';
$userName = $userName ?? 'User';
$userEmail = $userEmail ?? 'user@novahub.edu';
$userRole = $userRole ?? 'User';
$logoUrl = $logoUrl ?? '/images/smart-campus-logo.svg';
?>
<!-- Unified Header -->
<header class="unified-header">
    <div class="header-left">
        <!-- Smart Campus Logo (Main Logo) - Always visible on all pages -->
        <div class="header-logo">
            <a href="<?php echo $dashboardUrl; ?>" class="header-logo-link" style="display: flex; align-items: center; text-decoration: none;">
                <img src="<?php echo $logoUrl; ?>" alt="Smart Campus Logo" class="header-logo-img">
            </a>
        </div>
    </div>
    <div class="header-center">
        <!-- Header Title - Hidden on all pages -->
        <div class="header-title" style="display: none !important; opacity: 0 !important; visibility: hidden !important; width: 0 !important; height: 0 !important; overflow: hidden !important;">
            <i class="<?php echo $pageIcon ?? 'fas fa-home'; ?>"></i>
            <span><?php echo $pageHeading ?? 'Dashboard'; ?></span>
        </div>
    </div>
    <div class="header-right">
        <!-- Notification Icon -->
        <div class="header-notification" onclick="toggleNotificationDropdown()" title="System Alerts">
            <i class="fas fa-bell"></i>
            <span class="notification-badge" style="display: none;">0</span>
        </div>
        
        <!-- Profile Section -->
        <div class="header-profile-section">
            <div class="header-profile-info">
                <div class="user-name"><?php echo htmlspecialchars($userName); ?></div>
                <div class="user-access-level"><?php echo htmlspecialchars($userRole); ?></div>
            </div>
            <div class="profile-badge-container" onclick="toggleProfileDropdown()">
                <div class="profile-badge-icon-only" title="Profile">
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
                            <div class="profile-dropdown-name"><?php echo htmlspecialchars($userName); ?></div>
                            <div class="profile-dropdown-email"><?php echo htmlspecialchars($userEmail); ?></div>
                        </div>
                    </div>
                    
                    <div class="profile-dropdown-divider"></div>
                    
                    <div class="profile-dropdown-section">
                        <div class="profile-dropdown-label">Preferences</div>
                        <div class="profile-dropdown-item" onclick="toggleTheme(event)">
                            <i class="fas fa-palette"></i>
                            <span>Theme</span>
                            <div class="profile-dropdown-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        <div class="profile-dropdown-item" onclick="toggleLanguage(event)">
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
        </div>
    </div>
</header>

<style>
/* Unified Header Styles - Reusable across all layouts */
.unified-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 64px;
    background: rgba(248, 250, 252, 0.9);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.4);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0;
    z-index: 1000;
    box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
}

.header-left {
    width: 240px;
    display: flex;
    align-items: center;
    gap: 12px;
    padding-left: 20px;
    transition: none;
}

.header-logo {
    display: flex !important;
    align-items: center;
    flex-shrink: 0;
    height: 32px;
    overflow: hidden;
    max-width: 160px;
    opacity: 1 !important;
    visibility: visible !important;
    transition: none;
}

.header-logo-img {
    height: 32px !important;
    width: auto !important;
    max-width: 160px !important;
    max-height: 32px !important;
    object-fit: contain;
    display: block !important;
    opacity: 1 !important;
    visibility: visible !important;
}

.header-logo-link {
    display: flex !important;
    align-items: center;
    text-decoration: none;
    height: 32px;
    max-width: 160px;
    cursor: pointer;
    opacity: 1 !important;
    visibility: visible !important;
}

.header-logo-link:hover {
    outline: none;
    background: none;
    transform: none;
}

.header-center {
    flex: 0;
    display: none;
    align-items: center;
    justify-content: flex-start;
    padding: 0;
    width: 0;
    overflow: hidden;
}

.header-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 16px;
    flex: 1;
    max-width: 420px;
    padding-right: 20px;
}

/* Notification Icon */
.header-notification {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 8px;
    background: transparent;
    color: #1d1d1f;
    cursor: pointer;
    transition: all 0.2s;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.header-notification:hover {
    background: #f5f5f5;
    color: #1976d2;
}

.notification-badge {
    position: absolute;
    top: 6px;
    right: 6px;
    background: #ef4444;
    color: #fff;
    font-size: 0.7rem;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 10px;
    min-width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

/* Profile Section */
.header-profile-section {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 8px;
    transition: background 0.2s;
    flex-shrink: 0;
}

.header-profile-section:hover {
    background: #f5f5f5;
}

.header-profile-info {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 2px;
}

.user-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1d1d1f;
    line-height: 1.2;
    white-space: nowrap;
}

.user-access-level {
    font-size: 0.75rem;
    color: #86868b;
    font-weight: 500;
    line-height: 1.2;
    white-space: nowrap;
}

/* Profile Badge Container */
.header-profile-section .profile-badge-container {
    position: relative;
    z-index: 1001;
}

.header-profile-section .profile-badge-icon-only {
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

.header-profile-section .profile-badge-icon-only:hover {
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    transform: translateY(-1px) scale(1.05);
}

.header-profile-section .profile-avatar {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    margin-right: 0;
}

/* Profile Dropdown */
.header-profile-section .profile-dropdown {
    position: absolute;
    right: 0;
    top: calc(100% + 8px);
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    min-width: 280px;
    overflow: visible;
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.profile-dropdown-header {
    padding: 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    gap: 12px;
    border-radius: 16px 16px 0 0;
}

.profile-dropdown-avatar {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.profile-dropdown-info {
    flex: 1;
    min-width: 0;
}

.profile-dropdown-name {
    font-weight: 600;
    font-size: 16px;
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.profile-dropdown-email {
    font-size: 13px;
    opacity: 0.9;
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.profile-dropdown-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 0;
}

.profile-dropdown-section {
    padding: 8px 0;
}

.profile-dropdown-label {
    padding: 8px 20px 4px 20px;
    font-size: 11px;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.profile-dropdown-item {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    gap: 12px;
}

.profile-dropdown-item:hover {
    background: #f9fafb;
}

.profile-dropdown-item i {
    width: 20px;
    font-size: 16px;
    color: #6b7280;
    flex-shrink: 0;
}

.profile-dropdown-item span {
    flex: 1;
    font-size: 14px;
    color: #374151;
    font-weight: 500;
}

.profile-dropdown-arrow {
    color: #9ca3af;
    font-size: 12px;
}

.profile-dropdown-item.logout-item {
    color: #dc2626;
}

.profile-dropdown-item.logout-item:hover {
    background: #fef2f2;
}

.profile-dropdown-item.logout-item i,
.profile-dropdown-item.logout-item span {
    color: #dc2626;
}

/* Responsive */
@media (max-width: 992px) {
    .header-right {
        gap: 12px;
        max-width: none;
    }
    
    .header-profile-info {
        display: none;
    }
    
    .header-profile-section {
        gap: 0;
        padding: 0;
    }
}

@media (max-width: 768px) {
    .header-notification {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
    
    .header-left {
        width: auto;
        min-width: auto;
    }
}

/* Adjust sidebar and main content for fixed header */
.sidebar {
    top: 64px !important;
    height: calc(100vh - 64px) !important;
}

.main-content {
    margin-top: 64px !important;
}
</style>

