<?php
$pageTitle = 'Smart Campus Nova Hub - Room Management';
$pageIcon = 'fas fa-door-open';
$pageHeading = 'Room Management';
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

<!-- Room Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Rooms',
        'value' => '4',
        'icon' => 'fas fa-building',
        'iconColor' => 'yellow'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Occupied Rooms',
        'value' => '4',
        'icon' => 'fas fa-users',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Capacity',
        'value' => '140',
        'icon' => 'fas fa-chair',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Utilization Rate',
        'value' => '100%',
        'icon' => 'fas fa-chart-pie',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Room Management Table -->
<div class="detail-management-section">
    <div class="section-header">
        <h3 class="section-title">All Rooms</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add New Room
        </button>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Room Name</th>
                    <th>Floor</th>
                    <th>Capacity</th>
                    <th>Current Class</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="room-number"><strong>101</strong></td>
                    <td>Classroom A</td>
                    <td>1st Floor</td>
                    <td class="capacity">35</td>
                    <td>Class 1A</td>
                    <td><span class="status-badge active">Occupied</span></td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Room">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Room">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="room-number"><strong>102</strong></td>
                    <td>Classroom B</td>
                    <td>1st Floor</td>
                    <td class="capacity">35</td>
                    <td>Class 1B</td>
                    <td><span class="status-badge active">Occupied</span></td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Room">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Room">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="room-number"><strong>103</strong></td>
                    <td>Classroom C</td>
                    <td>1st Floor</td>
                    <td class="capacity">35</td>
                    <td>Class 1C</td>
                    <td><span class="status-badge active">Occupied</span></td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Room">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Room">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="room-number"><strong>201</strong></td>
                    <td>Advanced Classroom</td>
                    <td>2nd Floor</td>
                    <td class="capacity">35</td>
                    <td>Class 9A</td>
                    <td><span class="status-badge active">Occupied</span></td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Room">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Room">
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
