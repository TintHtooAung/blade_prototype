<?php
// iOS Style Expanded Blank Page Component for Admin Pages
function renderBlankPage($icon, $title, $description = '') {
    ob_start();
    ?>
    <!-- Compact Page Header -->
    <div class="page-header-compact">
        <div class="page-icon-compact">
            <i class="<?php echo $icon; ?>"></i>
        </div>
        <div class="page-title-compact">
            <h2><?php echo $title; ?></h2>
        </div>
    </div>

    <!-- Expanded Content Grid -->
    <div class="content-grid-ios">
        <!-- Main Content Area -->
        <div class="content-area-main">
            <div class="content-card-ios">
                <div class="content-card-header">
                    <i class="fas fa-layer-group"></i>
                    <h3>Content Overview</h3>
                </div>
                <div class="content-card-body">
                    <div class="placeholder-content">
                        <i class="fas fa-cube"></i>
                        <h4>Ready for Implementation</h4>
                        <p>This section is prepared for custom content and functionality.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Content Area -->
        <div class="content-area-secondary">
            <div class="content-card-ios">
                <div class="content-card-header">
                    <i class="fas fa-cog"></i>
                    <h3>Configuration</h3>
                </div>
                <div class="content-card-body">
                    <div class="placeholder-content">
                        <i class="fas fa-sliders-h"></i>
                        <h4>Settings Panel</h4>
                        <p>Configuration options will be available here.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Area -->
        <div class="content-area-actions">
            <div class="content-card-ios">
                <div class="content-card-header">
                    <i class="fas fa-bolt"></i>
                    <h3>Quick Actions</h3>
                </div>
                <div class="content-card-body">
                    <div class="action-buttons-ios">
                        <button class="action-btn-ios primary">
                            <i class="fas fa-plus"></i>
                            <span>Add New</span>
                        </button>
                        <button class="action-btn-ios secondary">
                            <i class="fas fa-download"></i>
                            <span>Import</span>
                        </button>
                        <button class="action-btn-ios tertiary">
                            <i class="fas fa-upload"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>
