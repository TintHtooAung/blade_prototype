<?php
$pageTitle = 'Smart Campus Nova Hub - Attendance';
$pageIcon = 'fas fa-user-check';
$pageHeading = 'Attendance Management';
$activePage = 'attendance';

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
        <h3><i class="fas fa-user-check"></i> Staff Attendance</h3>
        <div class="simple-actions">
            <button class="simple-btn secondary">
                <i class="fas fa-calendar"></i> Date Filter
            </button>
            <button class="simple-btn secondary">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>
    
    <div class="content-placeholder">
        <div class="placeholder-icon">
            <i class="fas fa-user-check"></i>
        </div>
        <h4>Attendance Management</h4>
        <p>Track and manage staff attendance, view attendance reports, and monitor attendance patterns.</p>
        <div class="placeholder-features">
            <div class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>Mark Attendance</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-chart-pie"></i>
                <span>Attendance Reports</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-history"></i>
                <span>Attendance History</span>
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

include __DIR__ . '/../components/staff-layout.php';
?>
