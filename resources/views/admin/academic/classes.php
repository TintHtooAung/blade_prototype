<?php
$pageTitle = 'Smart Campus Nova Hub - Class Management';
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Management';
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

<!-- Class Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Classes',
        'value' => '13',
        'icon' => 'fas fa-chalkboard',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Average Class Size',
        'value' => '35',
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '450',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Active Teachers',
        'value' => '13',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'yellow'
    ]); ?>
</div>

<!-- Class Management Table -->
<div class="detail-management-section">
    <div class="section-header">
        <h3 class="section-title">All Classes</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add New Class
        </button>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Grade</th>
                    <th>Room</th>
                    <th>Students</th>
                    <th>Class Teacher</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="class-name"><strong>1A</strong></td>
                    <td>Grade 1</td>
                    <td>Room 101</td>
                    <td class="student-count">30</td>
                    <td>Ms. Sarah Johnson</td>
                    <td class="schedule">8:00 AM - 2:00 PM</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Class">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Class">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="class-name"><strong>1B</strong></td>
                    <td>Grade 1</td>
                    <td>Room 102</td>
                    <td class="student-count">30</td>
                    <td>Mr. David Chen</td>
                    <td class="schedule">8:00 AM - 2:00 PM</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Class">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Class">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="class-name"><strong>1C</strong></td>
                    <td>Grade 1</td>
                    <td>Room 103</td>
                    <td class="student-count">30</td>
                    <td>Ms. Emily Rodriguez</td>
                    <td class="schedule">8:00 AM - 2:00 PM</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Class">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Class">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="class-name"><strong>9A</strong></td>
                    <td>Grade 9</td>
                    <td>Room 201</td>
                    <td class="student-count">35</td>
                    <td>Dr. James Wilson</td>
                    <td class="schedule">8:00 AM - 3:30 PM</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Class">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Class">
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
