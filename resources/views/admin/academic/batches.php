<?php
$pageTitle = 'Smart Campus Nova Hub - Batch Management';
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Batch Management';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

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

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/academic-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Academic Management
    </a>
</div>

<!-- Batch Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Active Batches',
        'value' => '1',
        'icon' => 'fas fa-play-circle',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Completed Batches',
        'value' => '1',
        'icon' => 'fas fa-check-circle',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Upcoming Batches',
        'value' => '1',
        'icon' => 'fas fa-clock',
        'iconColor' => 'yellow'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '870',
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Batch Management Table -->
<div class="detail-management-section">
    <div class="section-header">
        <h3 class="section-title">All Batches</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add New Batch
        </button>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Batch Name</th>
                    <th>Academic Year</th>
                    <th>Status</th>
                    <th>Total Students</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="batch-name">
                        <strong>2024-2025</strong>
                    </td>
                    <td>2024-25</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td class="student-count">450</td>
                    <td class="date-cell">2024-04-01</td>
                    <td class="date-cell">2025-03-31</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Batch">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Batch">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="batch-name">
                        <strong>2023-2024</strong>
                    </td>
                    <td>2023-24</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td class="student-count">420</td>
                    <td class="date-cell">2023-04-01</td>
                    <td class="date-cell">2024-03-31</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Batch">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Batch">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="batch-name">
                        <strong>2025-2026</strong>
                    </td>
                    <td>2025-26</td>
                    <td><span class="status-badge upcoming">Upcoming</span></td>
                    <td class="student-count">0</td>
                    <td class="date-cell">2025-04-01</td>
                    <td class="date-cell">2026-03-31</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Batch">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Batch">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>
