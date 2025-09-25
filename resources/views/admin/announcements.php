<?php
$pageTitle = 'Smart Campus Nova Hub - Announcement Management';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcement Management';
$activePage = 'announcements';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
    <div class="page-actions">
        <a href="/admin/create-announcement" class="create-announcement-btn">
            <i class="fas fa-plus"></i>
            Create Announcement
        </a>
    </div>
</div>

<!-- Announcement Statistics -->
<div class="announcement-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Announcements',
        'value' => '4',
        'icon' => 'fas fa-file-alt',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'High Priority',
        'value' => '1',
        'icon' => 'fas fa-exclamation-triangle',
        'iconColor' => 'red'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Pinned',
        'value' => '2',
        'icon' => 'fas fa-thumbtack',
        'iconColor' => 'yellow'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Reach',
        'value' => '570',
        'icon' => 'fas fa-users',
        'iconColor' => 'green'
    ]); ?>
</div>

<!-- Recent Announcements Section -->
<div class="recent-announcements-section">
    <div class="section-header">
        <h3 class="section-title">Recent Announcements</h3>
    </div>
    
    <div class="announcements-list">
        <!-- Announcement 1 -->
        <div class="announcement-card">
            <div class="announcement-header">
                <div class="announcement-title">
                    <h4>Annual Science Fair 2024 - Call for Participation</h4>
                    <p>We are excited to announce our Annual Science Fair 2024! This year's theme is 'Innovation for Tomorrow'.</p>
                </div>
                <div class="announcement-actions">
                    <button class="action-icon pin" title="Pin">
                        <i class="fas fa-thumbtack"></i>
                    </button>
                    <button class="action-icon edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="announcement-tags">
                <span class="tag medium">medium</span>
                <span class="tag event">event</span>
            </div>
            
            <!-- Event Attached Section -->
            <div class="attachment-section">
                <div class="attachment-header">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Event Attached</span>
                </div>
                <div class="attachment-content">
                    <div class="attachment-item">
                        <strong>Science Fair</strong>
                        <div class="attachment-details">
                            <span><i class="fas fa-calendar"></i> 2024-02-25</span>
                            <span><i class="fas fa-map-marker-alt"></i> Main Hall</span>
                            <span><i class="fas fa-users"></i> 156 parents, 1 teacher groups involved</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Media Attachments Section -->
            <div class="attachment-section">
                <div class="attachment-header">
                    <i class="fas fa-paperclip"></i>
                    <span>Media Attachments</span>
                </div>
                <div class="attachment-content">
                    <div class="attachment-count">3 files</div>
                    <div class="file-tags">
                        <span class="file-tag">Science_Fair_...</span>
                        <span class="file-tag">Science_Fair_P...</span>
                        <span class="file-tag">Innovation_Exa...</span>
                    </div>
                </div>
            </div>
            
            <div class="announcement-footer">
                <div class="footer-item">
                    <i class="fas fa-users"></i>
                    <span>180 total (24 teachers, 156 parents)</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-eye"></i>
                    <span>2 read</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Main Campus, North Campus</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-clock"></i>
                    <span>Jan 8, 06:30 AM</span>
                </div>
            </div>
        </div>
        
        <!-- Announcement 2 -->
        <div class="announcement-card">
            <div class="announcement-header">
                <div class="announcement-title">
                    <h4>Q1 Academic Performance Reports Available</h4>
                    <p>Quarter 1 academic performance reports are now available. Parents can access them through the parent portal, and teachers should review class summaries.</p>
                </div>
                <div class="announcement-actions">
                    <button class="action-icon pin" title="Pin">
                        <i class="fas fa-thumbtack"></i>
                    </button>
                    <button class="action-icon edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="announcement-tags">
                <span class="tag medium">medium</span>
                <span class="tag general">general</span>
            </div>
            
            <!-- Report Attached Section -->
            <div class="attachment-section">
                <div class="attachment-header">
                    <i class="fas fa-chart-bar"></i>
                    <span>Report Attached</span>
                </div>
                <div class="attachment-content">
                    <div class="attachment-item">
                        <strong>Q1 Academic Performance Report</strong>
                        <div class="attachment-details">
                            <span><i class="fas fa-chart-bar"></i> Academic Report</span>
                            <span><i class="fas fa-calendar"></i> 2024-01-15</span>
                            <span><i class="fas fa-graduation-cap"></i> Grade 9, Grade 10, Grade 11, Grade 12</span>
                            <span><i class="fas fa-users"></i> 156 parents, All Subject Teachers involved</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="announcement-footer">
                <div class="footer-item">
                    <i class="fas fa-users"></i>
                    <span>180 total (24 teachers, 156 parents)</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-eye"></i>
                    <span>2 read</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Main Campus, North Campus</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-clock"></i>
                    <span>Jan 7, 06:30 AM</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>