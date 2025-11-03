<?php
// Admin Layout Component
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
        <?php include 'admin-sidebar.php'; ?>
        
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
                            <div class="profile-dropdown-name">Admin User</div>
                            <div class="profile-dropdown-email">admin@school.edu</div>
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
        transition: all 0.3s ease;
    }

    .confirm-icon-wrapper i {
        font-size: 28px;
        color: #ef6c00;
        transition: all 0.3s ease;
    }

    /* Icon wrapper variants */
    .confirm-icon-wrapper.danger {
        background: #ffebee;
    }

    .confirm-icon-wrapper.danger i {
        color: #d32f2f;
    }

    .confirm-icon-wrapper.warning {
        background: #fff3e0;
    }

    .confirm-icon-wrapper.warning i {
        color: #ef6c00;
    }

    .confirm-icon-wrapper.primary {
        background: #e3f2fd;
    }

    .confirm-icon-wrapper.primary i {
        color: #1976d2;
    }

    .confirm-icon-wrapper.success {
        background: #e8f5e9;
    }

    .confirm-icon-wrapper.success i {
        color: #2e7d32;
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

    /* Filter and Search Controls */
    .filter-select {
        padding: 8px 12px;
        border: 1px solid #d0d5dd;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        color: #344054;
        background: #fff;
        cursor: pointer;
        transition: all 0.2s ease;
        min-width: 160px;
    }

    .filter-select:hover {
        border-color: #98a2b3;
    }

    .filter-select:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .simple-search {
        padding: 8px 12px 8px 36px;
        border: 1px solid #d0d5dd;
        border-radius: 6px;
        font-size: 14px;
        color: #344054;
        background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23667085' stroke-width='2'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='m21 21-4.35-4.35'/%3E%3C/svg%3E") no-repeat 10px center;
        background-size: 18px;
        transition: all 0.2s ease;
        min-width: 220px;
    }

    .simple-search:hover {
        border-color: #98a2b3;
    }

    .simple-search:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .simple-search::placeholder {
        color: #98a2b3;
    }

    /* Icon Button */
    .simple-btn-icon {
        padding: 6px 10px;
        border: 1px solid #d0d5dd;
        border-radius: 6px;
        background: #fff;
        color: #667085;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
    }

    .simple-btn-icon:hover {
        background: #f9fafb;
        border-color: #98a2b3;
        color: #344054;
    }

    .simple-btn-icon:active {
        transform: scale(0.95);
    }

    .icon-btn {
        padding: 8px;
        border: none;
        background: transparent;
        color: #667085;
        cursor: pointer;
        border-radius: 6px;
        transition: all 0.2s ease;
        font-size: 18px;
    }

    .icon-btn:hover {
        background: #f3f4f6;
        color: #344054;
    }

    /* Status Badge for Withdrawn */
    .status-badge.withdrawn {
        background: #d1fae5;
        color: #065f46;
    }

    /* Confirm Dialog Header Variant */
    .confirm-dialog-header {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    .confirm-dialog-header h4 {
        color: #111827;
        font-weight: 600;
    }

    /* Disabled Button State */
    .simple-btn:disabled,
    .simple-btn.primary:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background: #9ca3af;
        border-color: #9ca3af;
    }

    .simple-btn:disabled:hover,
    .simple-btn.primary:disabled:hover {
        background: #9ca3af;
        transform: none;
    }

    /* Action Status Bar - Main Content Area */
    .action-status-bar {
        background: white;
        border-left: 4px solid #10b981;
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 20px;
        margin-right: 80px; /* Prevent overlap with profile badge */
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        animation: slideDown 0.3s ease-out;
        max-width: calc(100% - 80px);
    }
    
    @media (max-width: 992px) {
        .action-status-bar {
            margin-right: 0;
            max-width: 100%;
        }
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

    /* Receipt Dialog Styles */
    .receipt-dialog-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
    }

    .receipt-dialog-content {
        background: white;
        border-radius: 12px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        max-width: 500px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease-out;
    }

    .receipt-dialog-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    .receipt-dialog-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .receipt-close {
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 4px;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s;
    }

    .receipt-close:hover {
        color: #4b5563;
    }

    .receipt-dialog-body {
        padding: 20px 24px;
    }

    .receipt-info {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .receipt-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .receipt-row:last-child {
        border-bottom: none;
    }

    .receipt-label {
        font-weight: 500;
        color: #6b7280;
        font-size: 14px;
    }

    .receipt-value {
        font-weight: 600;
        color: #111827;
        font-size: 14px;
        text-align: right;
    }

    .receipt-dialog-actions {
        display: flex;
        gap: 12px;
        padding: 16px 24px 20px;
        border-top: 1px solid #e5e7eb;
        justify-content: flex-end;
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

    /* Profile Badge and Dropdown Styles */
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
        min-width: 200px;
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        margin-left: 8px;
        transition: transform 0.3s ease;
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

    .profile-dropdown-item.logout-item i {
        color: #dc2626;
    }

    .profile-dropdown-item.logout-item span {
        color: #dc2626;
    }

    /* Theme and Language Sub-dropdowns */
    .profile-sub-dropdown {
        position: absolute;
        top: 0;
        right: 100%;
        left: auto;
        margin-right: 8px;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        min-width: 200px;
        overflow: hidden;
        display: none;
        animation: slideInRight 0.3s ease-out;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-10px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .profile-sub-dropdown.show {
        display: block;
    }

    .profile-sub-dropdown-item {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        gap: 10px;
    }

    .profile-sub-dropdown-item:hover {
        background: #f9fafb;
    }

    .profile-sub-dropdown-item i {
        width: 16px;
        font-size: 14px;
        color: #6b7280;
        flex-shrink: 0;
    }

    .profile-sub-dropdown-item span {
        flex: 1;
        font-size: 13px;
        color: #374151;
        font-weight: 500;
    }

    .profile-sub-dropdown-item.active {
        background: #eff6ff;
        color: #2563eb;
    }

    .profile-sub-dropdown-item.active i {
        color: #2563eb;
    }

    .profile-sub-dropdown-item.active span {
        color: #2563eb;
        font-weight: 600;
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
            min-width: 260px;
        }

        .profile-sub-dropdown {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: 0;
            min-width: 240px;
            max-width: 90vw;
        }
    }

    /* Dark Theme Styles */
    .dark-theme {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        color: #e5e7eb;
    }

    .dark-theme .sidebar {
        background: rgba(17, 24, 39, 0.95);
        border-right-color: rgba(55, 65, 81, 0.3);
    }

    .dark-theme .profile-badge {
        background: rgba(17, 24, 39, 0.95);
        border-color: rgba(55, 65, 81, 0.3);
    }

    .dark-theme .profile-badge:hover {
        background: rgba(31, 41, 55, 0.98);
    }

    .dark-theme .profile-name {
        color: #f9fafb;
    }

    .dark-theme .profile-role {
        color: #9ca3af;
    }

    .dark-theme .profile-dropdown {
        background: rgba(17, 24, 39, 0.98);
        border-color: rgba(55, 65, 81, 0.3);
    }

    .dark-theme .profile-dropdown-item {
        color: #e5e7eb;
    }

    .dark-theme .profile-dropdown-item:hover {
        background: rgba(31, 41, 55, 0.8);
    }

    .dark-theme .profile-dropdown-item span {
        color: #e5e7eb;
    }

    .dark-theme .profile-dropdown-item i {
        color: #9ca3af;
    }

    .dark-theme .profile-sub-dropdown {
        background: rgba(17, 24, 39, 0.98);
        border-color: rgba(55, 65, 81, 0.3);
    }

    .dark-theme .profile-sub-dropdown-item {
        color: #e5e7eb;
    }

    .dark-theme .profile-sub-dropdown-item:hover {
        background: rgba(31, 41, 55, 0.8);
    }

    .dark-theme .profile-sub-dropdown-item span {
        color: #e5e7eb;
    }

    .dark-theme .profile-sub-dropdown-item i {
        color: #9ca3af;
    }

    .dark-theme .profile-sub-dropdown-item.active {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
    }

    .dark-theme .profile-sub-dropdown-item.active i {
        color: #60a5fa;
    }

    .dark-theme .profile-sub-dropdown-item.active span {
        color: #60a5fa;
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
            buttonStyle = 'danger',
            dialogIcon = 'fas fa-exclamation-triangle',
            iconWrapperStyle = 'warning',
            onConfirm = () => {}
        } = options;

        document.getElementById('confirmDialogTitle').textContent = title;
        document.getElementById('confirmDialogMessage').textContent = message;
        
        // Update button
        const confirmBtn = document.getElementById('confirmDialogBtn');
        confirmBtn.innerHTML = `<i class="${confirmIcon}"></i> ${confirmText}`;
        confirmBtn.className = `simple-btn ${buttonStyle}`;
        
        // Update dialog icon
        const iconElement = document.getElementById('confirmDialogIcon');
        iconElement.className = dialogIcon;
        
        // Update icon wrapper style
        const iconWrapper = document.getElementById('confirmIconWrapper');
        iconWrapper.className = `confirm-icon-wrapper ${iconWrapperStyle}`;
        
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
        
        // Truncate message if too long (max 60 characters for concise messages)
        const maxLength = 60;
        const truncatedMessage = message.length > maxLength ? message.substring(0, maxLength) + '...' : message;
        
        // Update content
        statusText.textContent = truncatedMessage;
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
        // Position next to clicked item
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
        redirectWithStatus('/admin/staff-profile', 'Opening profile...', 'info', 300);
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

    // Initialize demo data for prototype presentation (auto-populate once)
    (function initializeDemoData() {
        if (localStorage.getItem('demoDataInitialized')) {
            return; // Already initialized
        }

        const portalSetups = {
            // Students - Guardian Portal
            'S001': {
                profileId: 'S001',
                profileType: 'student',
                userId: 'GP001',
                email: 'parent.johnson@gmail.com',
                fullName: 'Mr. Robert Johnson',
                role: 'Guardian Portal',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-10 09:30:00'
            },
            'S002': {
                profileId: 'S002',
                profileType: 'student',
                userId: 'GP002',
                email: 'sarah.wilson@gmail.com',
                fullName: 'Mrs. Sarah Wilson',
                role: 'Guardian Portal',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-10 10:15:00'
            },
            'S003': {
                profileId: 'S003',
                profileType: 'student',
                userId: 'GP003',
                email: 'michael.brown@gmail.com',
                fullName: 'Mr. Michael Brown',
                role: 'Guardian Portal',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-09 14:20:00'
            },
            // Teachers
            'T001': {
                profileId: 'T001',
                profileType: 'teacher',
                userId: 'TP001',
                email: 'emma.wilson@novahub.edu',
                fullName: 'Emma Wilson',
                role: 'Teacher Portal',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-10 08:45:00'
            },
            'T002': {
                profileId: 'T002',
                profileType: 'teacher',
                userId: 'TP002',
                email: 'james.anderson@novahub.edu',
                fullName: 'James Anderson',
                role: 'Teacher Portal',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-10 09:00:00'
            },
            'T003': {
                profileId: 'T003',
                profileType: 'teacher',
                userId: 'TP003',
                email: 'sophia.davis@novahub.edu',
                fullName: 'Sophia Davis',
                role: 'Teacher Portal',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-09 16:30:00'
            },
            // Staff - Reception
            'E001': {
                profileId: 'E001',
                profileType: 'staff',
                userId: 'SP001',
                email: 'ava.martinez@novahub.edu',
                fullName: 'Ava Martinez',
                role: 'Reception Access',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-10 07:30:00'
            },
            // Staff - IT
            'E002': {
                profileId: 'E002',
                profileType: 'staff',
                userId: 'SP002',
                email: 'ethan.garcia@novahub.edu',
                fullName: 'Ethan Garcia',
                role: 'IT Access',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-09 15:45:00'
            },
            // Staff - General
            'E003': {
                profileId: 'E003',
                profileType: 'staff',
                userId: 'SP003',
                email: 'olivia.martinez@novahub.edu',
                fullName: 'Olivia Martinez',
                role: 'Staff Access',
                setupComplete: true,
                accountCreated: true,
                status: 'active',
                updatedAt: '2025-01-10 06:50:00'
            }
        };

        // Save to localStorage
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
        
        // Create user accounts array
        const userAccounts = Object.values(portalSetups).map(setup => ({
            userId: setup.userId,
            email: setup.email,
            fullName: setup.fullName,
            role: setup.role,
            profileId: setup.profileId,
            profileType: setup.profileType,
            status: setup.status,
            password: '********',
            updatedAt: setup.updatedAt
        }));

        localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
        localStorage.setItem('lastUserRefresh', new Date().toISOString());
        localStorage.setItem('demoDataInitialized', 'true');
    })();
    </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/dropdown.js"></script>
    </body>
</html>
