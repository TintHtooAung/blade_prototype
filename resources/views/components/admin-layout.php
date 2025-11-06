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
    <script>
    // Prevent flash - hide title immediately (logo always shows)
    (function() {
        try {
            // Always hide header title on all pages and ensure logo is visible
            const style = document.createElement('style');
            style.textContent = `
                .header-title {
                    display: none !important;
                    opacity: 0 !important;
                    visibility: hidden !important;
                    width: 0 !important;
                    height: 0 !important;
                    overflow: hidden !important;
                }
                .header-logo {
                    display: flex !important;
                    opacity: 1 !important;
                    visibility: visible !important;
                }
                .header-logo-img {
                    display: block !important;
                    opacity: 1 !important;
                    visibility: visible !important;
                    height: 32px !important;
                    width: auto !important;
                    max-width: 160px !important;
                }
                .header-logo-link {
                    display: flex !important;
                    opacity: 1 !important;
                    visibility: visible !important;
                }
            `;
            document.head.appendChild(style);
        } catch(e) {}
    })();
    </script>
</head>
<body>
    <?php
    // Include reusable unified header component
    $dashboardUrl = '/admin/dashboard';
    $userName = 'Tint Htoo Aung';
    $userEmail = 'admin@school.edu';
    $userRole = 'Admin';
    include 'unified-header.php';
    ?>
    
    <div class="d-flex">
        <?php include 'admin-sidebar.php'; ?>
        
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
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        animation: slideDown 0.3s ease-out;
        max-width: 100%;
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

    /* Unified Header Styles */
    .unified-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 64px;
        background: #fff;
        border-bottom: 1px solid #e5e5e7;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }
    
    /* Smooth page transitions */
    body {
        transition: opacity 0.15s ease-in-out;
    }
    
    /* Prevent flash during navigation */
    body.loading {
        opacity: 0.95;
    }
    
    /* Header sections aligned with sidebar grid */
    .unified-header .header-left {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .unified-header .header-center {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .unified-header .header-right {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .header-left {
        width: 240px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-left: 20px;
        /* Fixed width - not affected by sidebar transitions */
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
    
    .header-logo a,
    .header-logo-link {
        display: flex !important;
        align-items: center;
        text-decoration: none;
        height: 32px;
        max-width: 160px;
        cursor: pointer;
        pointer-events: auto;
        border: none;
        outline: none;
        background: none;
        opacity: 1 !important;
        visibility: visible !important;
    }
    
    .header-logo-link:active,
    .header-logo-link:focus,
    .header-logo-link:hover {
        outline: none;
        background: none;
        transform: none;
    }
    
    .header-logo-link img {
        pointer-events: none;
    }
    
    /* Header logo position fixed - not affected by sidebar state */
    .header-left {
        width: 240px !important;
        padding-left: 20px !important;
        padding-right: 20px !important;
    }
    
    /* Logo always shows at full size - position never changes */
    .header-logo {
        display: flex !important;
        max-width: 160px !important;
        opacity: 1 !important;
        visibility: visible !important;
        transition: none;
    }
    
    .header-logo-img {
        max-width: 160px !important;
        height: 32px !important;
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
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
    
    .header-title {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.125rem;
        font-weight: 600;
        color: #1d1d1f;
        transition: opacity 0.2s ease, visibility 0.2s ease;
    }
    
    .header-title i {
        color: #1976d2;
        font-size: 1.25rem;
    }
    
    .header-right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 16px;
        flex: 1;
        max-width: 600px;
    }
    
    /* Search Bar */
    .header-search {
        position: relative;
        display: flex;
        align-items: center;
        flex: 1;
        max-width: 300px;
        min-width: 200px;
    }
    
    .header-search i {
        position: absolute;
        left: 12px;
        color: #86868b;
        font-size: 0.875rem;
        pointer-events: none;
    }
    
    .header-search-input {
        width: 100%;
        padding: 8px 12px 8px 36px;
        border: 1px solid #e5e5e7;
        border-radius: 8px;
        font-size: 0.875rem;
        color: #1d1d1f;
        background: #f9fafb;
        transition: all 0.2s;
    }
    
    .header-search-input:focus {
        outline: none;
        border-color: #1976d2;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.1);
    }
    
    .header-search-input::placeholder {
        color: #86868b;
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
    
    @media (max-width: 1200px) {
        .header-search {
            max-width: 200px;
            min-width: 150px;
        }
    }
    
    @media (max-width: 992px) {
        .header-search {
            display: none;
        }
        
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
    }
    
    /* Adjust sidebar position to account for header - aligned with header grid */
    .sidebar {
        top: 64px !important;
        height: calc(100vh - 64px) !important;
    }
    
    /* Ensure sidebar hamburger is visible and positioned correctly */
    .sidebar .sidebar-hamburger {
        display: flex !important;
        position: absolute;
        top: 16px;
        right: 12px;
    }
    
    /* Adjust main content position - aligned with header grid */
    .main-content {
        margin-top: 64px !important;
        margin-left: 240px;
        padding: 1rem;
        padding-left: 20px;
        padding-right: 20px;
        min-height: calc(100vh - 64px) !important;
        width: calc(100vw - 240px);
        transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* When sidebar minimized, align content */
    body:has(.sidebar.minimized) .main-content {
        margin-left: 64px;
        width: calc(100vw - 64px);
    }
    
    /* Ensure consistent padding alignment */
    .main-content > * {
        max-width: 100%;
    }
    
    /* When sidebar is minimized, adjust header left width */
    body:has(.sidebar.minimized) .header-left {
        width: 64px;
    }
    
    /* Hamburger menu in header */
    .header-hamburger {
        background: none;
        border: none;
        color: #1d1d1f;
        font-size: 1.25rem;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .header-hamburger:hover {
        background: #f5f5f5;
        color: #1976d2;
    }
    
    /* Hide sidebar hamburger when header hamburger exists */
    .sidebar .sidebar-hamburger {
        display: none;
    }
    
    /* Notification Dropdown Styles */
    .notification-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 8px;
        background: #fff;
        border: 1px solid #e5e5e7;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        min-width: 320px;
        max-width: 400px;
        max-height: 500px;
        overflow: hidden;
        display: none;
        z-index: 1002;
        animation: slideDown 0.3s ease-out;
    }
    
    .notification-dropdown-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e5e5e7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f9fafb;
    }
    
    .notification-dropdown-header h5 {
        margin: 0;
        font-size: 0.9375rem;
        font-weight: 600;
        color: #1d1d1f;
    }
    
    .notification-mark-all {
        background: none;
        border: none;
        color: #1976d2;
        font-size: 0.75rem;
        font-weight: 500;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 4px;
        transition: background 0.2s;
    }
    
    .notification-mark-all:hover {
        background: #e3f2fd;
    }
    
    .notification-dropdown-body {
        max-height: 400px;
        overflow-y: auto;
    }
    
    .notification-item {
        display: flex;
        gap: 12px;
        padding: 12px 20px;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: background 0.2s;
    }
    
    .notification-item:hover {
        background: #f9fafb;
    }
    
    .notification-item.unread {
        background: #f0f7ff;
    }
    
    .notification-item.unread:hover {
        background: #e8f4fd;
    }
    
    .notification-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1rem;
    }
    
    .notification-icon.info {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .notification-icon.warning {
        background: #fef3c7;
        color: #f59e0b;
    }
    
    .notification-icon.success {
        background: #d1fae5;
        color: #10b981;
    }
    
    .notification-content {
        flex: 1;
        min-width: 0;
    }
    
    .notification-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: #1d1d1f;
        margin-bottom: 4px;
    }
    
    .notification-message {
        font-size: 0.8125rem;
        color: #86868b;
        line-height: 1.4;
        margin-bottom: 4px;
    }
    
    .notification-time {
        font-size: 0.75rem;
        color: #86868b;
    }
    
    .notification-dropdown-footer {
        padding: 12px 20px;
        border-top: 1px solid #e5e5e7;
        text-align: center;
        background: #f9fafb;
    }
    
    .notification-dropdown-footer a {
        color: #1976d2;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .notification-dropdown-footer a:hover {
        text-decoration: underline;
    }
    
    .no-notifications {
        padding: 40px 20px;
        text-align: center;
        color: #86868b;
        font-size: 0.875rem;
    }
    
    .notification-item {
        cursor: pointer;
    }
    
    @media (max-width: 768px) {
        .header-hamburger {
            display: none;
        }
        
        .sidebar .sidebar-hamburger {
            display: block;
        }
        
        .unified-header {
            padding-left: 16px;
        }
        
        .header-left {
            width: auto;
            min-width: auto;
        }
        
        .notification-dropdown {
            right: -20px;
            min-width: 280px;
            max-width: 90vw;
        }
    }
    
    /* Profile Badge and Dropdown Styles */
    .profile-badge-container {
        position: relative;
        top: auto;
        right: auto;
        z-index: 1001;
    }
    
    .header-profile-section .profile-badge-container {
        position: relative;
    }
    
    .header-profile-section .profile-badge-container {
        position: relative;
    }
    
    .header-profile-section .profile-dropdown {
        position: absolute;
        right: 0;
        top: calc(100% + 8px);
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

    // Notification Dropdown Functionality with System Alerts
    function toggleNotificationDropdown() {
        // Create notification dropdown if it doesn't exist
        let notificationDropdown = document.getElementById('notificationDropdown');
        if (!notificationDropdown) {
            notificationDropdown = document.createElement('div');
            notificationDropdown.id = 'notificationDropdown';
            notificationDropdown.className = 'notification-dropdown';
            
            // Get system alerts from window or use default
            const systemAlerts = window.systemAlerts || [
                {type: 'warning', icon: 'fas fa-exclamation-triangle', title: 'Low Attendance Alert', message: 'Grade 8-B attendance dropped below 85%', time: '2 hours ago'},
                {type: 'info', icon: 'fas fa-info-circle', title: 'Fee Reminder', message: '23 students have pending fees for January', time: '5 hours ago'},
                {type: 'success', icon: 'fas fa-check-circle', title: 'System Update', message: 'All systems operational. 100% uptime this week', time: '1 day ago'},
                {type: 'warning', icon: 'fas fa-clock', title: 'Pending Approvals', message: '5 leave requests awaiting approval', time: '2 days ago'}
            ];
            
            // Build notification items from system alerts
            let notificationsHTML = '';
            systemAlerts.forEach((alert, index) => {
                const iconClassMap = {
                    'warning': 'warning',
                    'info': 'info',
                    'success': 'success',
                    'error': 'error',
                    'danger': 'error'
                };
                const iconClass = iconClassMap[alert.type] || 'info';
                const isUnread = index < 2 ? 'unread' : ''; // Mark first 2 as unread
                
                notificationsHTML += `
                    <div class="notification-item ${isUnread}" onclick="handleNotificationClick(${index})">
                        <div class="notification-icon ${iconClass}">
                            <i class="${alert.icon}"></i>
                        </div>
                        <div class="notification-content">
                            <div class="notification-title">${alert.title}</div>
                            <div class="notification-message">${alert.message}</div>
                            <div class="notification-time">${alert.time}</div>
                        </div>
                    </div>
                `;
            });
            
            notificationDropdown.innerHTML = `
                <div class="notification-dropdown-header">
                    <h5>System Alerts</h5>
                    <button class="notification-mark-all" onclick="markAllNotificationsRead()">Mark all as read</button>
                </div>
                <div class="notification-dropdown-body">
                    ${notificationsHTML || '<div class="no-notifications">No alerts</div>'}
                </div>
                <div class="notification-dropdown-footer">
                    <a href="/admin/announcements">View All Alerts</a>
                </div>
            `;
            document.querySelector('.header-notification').appendChild(notificationDropdown);
        } else {
            // Refresh alerts if dropdown already exists
            updateNotificationDropdown();
        }
        
        const isVisible = notificationDropdown.style.display !== 'none';
        if (isVisible) {
            notificationDropdown.style.display = 'none';
        } else {
            notificationDropdown.style.display = 'block';
            // Close profile dropdown if open
            document.getElementById('profileDropdown').style.display = 'none';
        }
    }
    
    function updateNotificationDropdown() {
        const systemAlerts = window.systemAlerts || [];
        const dropdown = document.getElementById('notificationDropdown');
        if (!dropdown) return;
        
        const body = dropdown.querySelector('.notification-dropdown-body');
        if (!body) return;
        
        let notificationsHTML = '';
        systemAlerts.forEach((alert, index) => {
            const iconClassMap = {
                'warning': 'warning',
                'info': 'info',
                'success': 'success',
                'error': 'error',
                'danger': 'error'
            };
            const iconClass = iconClassMap[alert.type] || 'info';
            const isUnread = !alert.read && index < 3 ? 'unread' : '';
            
            notificationsHTML += `
                <div class="notification-item ${isUnread}" onclick="handleNotificationClick(${index})">
                    <div class="notification-icon ${iconClass}">
                        <i class="${alert.icon}"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title">${alert.title}</div>
                        <div class="notification-message">${alert.message}</div>
                        <div class="notification-time">${alert.time}</div>
                    </div>
                </div>
            `;
        });
        
        body.innerHTML = notificationsHTML || '<div class="no-notifications">No alerts</div>';
        updateNotificationBadge();
    }
    
    function handleNotificationClick(index) {
        const systemAlerts = window.systemAlerts || [];
        if (systemAlerts[index]) {
            systemAlerts[index].read = true;
            updateNotificationBadge();
            const item = event.currentTarget;
            item.classList.remove('unread');
        }
    }
    
    function updateNotificationBadge() {
        const systemAlerts = window.systemAlerts || [];
        const unreadCount = systemAlerts.filter(alert => !alert.read).length;
        const badge = document.querySelector('.notification-badge');
        
        if (badge) {
            if (unreadCount > 0) {
                badge.textContent = unreadCount > 99 ? '99+' : unreadCount;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        }
    }
    
    function markAllNotificationsRead() {
        const systemAlerts = window.systemAlerts || [];
        systemAlerts.forEach(alert => {
            alert.read = true;
        });
        
        document.querySelectorAll('.notification-item.unread').forEach(item => {
            item.classList.remove('unread');
        });
        
        updateNotificationBadge();
        document.getElementById('notificationDropdown').style.display = 'none';
    }
    
    // Initialize notification badge on page load
    document.addEventListener('DOMContentLoaded', function() {
        if (window.systemAlerts) {
            updateNotificationBadge();
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileContainer = document.querySelector('.profile-badge-container');
        const dropdown = document.getElementById('profileDropdown');
        const notificationContainer = document.querySelector('.header-notification');
        const notificationDropdown = document.getElementById('notificationDropdown');
        
        if (!profileContainer.contains(event.target) && dropdown.style.display !== 'none') {
            dropdown.style.display = 'none';
            closeAllSubDropdowns();
        }
        
        if (notificationContainer && notificationDropdown && !notificationContainer.contains(event.target)) {
            notificationDropdown.style.display = 'none';
        }
    });

    // Initialize theme and prevent logo flash on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);
        
        // Mark body as loaded to prevent logo flash
        document.body.classList.add('loaded');
        
        // Ensure sidebar logo stays hidden - no onclick effects
        function hideSidebarLogos() {
            const sidebarLogos = document.querySelectorAll('.sidebar-logo, .sidebar-logo-img');
            sidebarLogos.forEach(logo => {
                if (logo) {
                    logo.style.display = 'none';
                    logo.style.visibility = 'hidden';
                    logo.style.opacity = '0';
                    logo.style.height = '0';
                    logo.style.overflow = 'hidden';
                    logo.style.padding = '0';
                    logo.style.margin = '0';
                }
            });
        }
        
        // Hide sidebar logos immediately
        hideSidebarLogos();
        
        // Hide header title on all pages (always hidden)
        function hideHeaderTitle() {
            const headerTitle = document.querySelector('.header-title');
            if (headerTitle) {
                headerTitle.style.display = 'none';
                headerTitle.style.opacity = '0';
                headerTitle.style.visibility = 'hidden';
                headerTitle.style.width = '0';
                headerTitle.style.height = '0';
                headerTitle.style.overflow = 'hidden';
            }
        }
        
        // Ensure header logo stays visible on all pages
        function ensureLogoVisible() {
            const headerLogo = document.querySelector('.header-logo');
            const headerLogoImg = document.querySelector('.header-logo-img');
            const headerLogoLink = document.querySelector('.header-logo-link');
            
            if (headerLogo) {
                headerLogo.style.display = 'flex';
                headerLogo.style.opacity = '1';
                headerLogo.style.visibility = 'visible';
            }
            if (headerLogoImg) {
                headerLogoImg.style.display = 'block';
                headerLogoImg.style.opacity = '1';
                headerLogoImg.style.visibility = 'visible';
                headerLogoImg.style.height = '32px';
            }
            if (headerLogoLink) {
                headerLogoLink.style.display = 'flex';
                headerLogoLink.style.opacity = '1';
                headerLogoLink.style.visibility = 'visible';
            }
        }
        
        // Run immediately and on navigation
        hideHeaderTitle();
        ensureLogoVisible();
        
        // Smooth navigation transition - prevent flash
        const sidebarLinks = document.querySelectorAll('.sidebar-nav a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Ensure logo stays visible during navigation
                ensureLogoVisible();
                // Add fade-out effect before navigation
                document.body.style.opacity = '0.95';
                
                // Hide title immediately to prevent flash
                setTimeout(() => {
                    hideHeaderTitle();
                    ensureLogoVisible();
                }, 50);
            });
        });
        
        // Ensure header logo link doesn't trigger sidebar handlers
        const headerLogoLink = document.querySelector('.header-logo-link');
        if (headerLogoLink) {
            headerLogoLink.addEventListener('click', function(e) {
                e.stopPropagation();
                // Ensure sidebar logo stays hidden during navigation
                hideSidebarLogos();
            });
        }
        
        // Monitor clicks to ensure sidebar logo never appears and header logo stays visible
        document.addEventListener('click', function(e) {
            hideSidebarLogos();
            hideHeaderTitle();
            ensureLogoVisible();
        });
        
        // Restore opacity after page load
        setTimeout(() => {
            document.body.style.opacity = '1';
        }, 100);
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
