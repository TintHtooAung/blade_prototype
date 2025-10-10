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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="d-flex">
        <?php include 'admin-sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="main-content">
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
    </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/dropdown.js"></script>
    </body>
</html>
