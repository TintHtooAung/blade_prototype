<?php
$pageTitle = 'Smart Campus Nova Hub - Notispace & Events';
$pageIcon = 'fas fa-bell';
$pageHeading = 'Notispace & Events';
$activePage = 'notispace-events';

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
</div>

<!-- Content Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-bell"></i> Notifications & Events</h3>
        <div class="simple-actions">
            <button class="simple-btn secondary">
                <i class="fas fa-filter"></i> Filter
            </button>
            <button class="simple-btn secondary">
                <i class="fas fa-mark-as-read"></i> Mark All Read
            </button>
        </div>
    </div>
    
    <div class="content-placeholder">
        <div class="placeholder-icon">
            <i class="fas fa-bell"></i>
        </div>
        <h4>Notispace & Events</h4>
        <p>View notifications, announcements, and upcoming events relevant to your teaching activities.</p>
        <div class="placeholder-features">
            <div class="feature-item">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-bullhorn"></i>
                <span>Announcements</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-calendar"></i>
                <span>Upcoming Events</span>
            </div>
        </div>
    </div>
</div>

<style>
.content-placeholder {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.placeholder-icon {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 20px;
}

.placeholder-icon i {
    color: #1976d2;
}

.content-placeholder h4 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
}

.content-placeholder p {
    font-size: 1rem;
    margin-bottom: 30px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.placeholder-features {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background: #f9f9f9;
    min-width: 120px;
}

.feature-item i {
    font-size: 1.5rem;
    color: #1976d2;
}

.feature-item span {
    font-size: 0.9rem;
    font-weight: 500;
}

@media (max-width: 768px) {
    .placeholder-features {
        flex-direction: column;
        align-items: center;
    }
}
</style>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
