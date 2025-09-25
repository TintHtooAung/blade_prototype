<?php
$pageTitle = 'Smart Campus Nova Hub - Grade Management';
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Grade Management';
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

<!-- Grade Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Primary Grades',
        'value' => '2',
        'icon' => 'fas fa-child',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Secondary Grades',
        'value' => '2',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Classes',
        'value' => '13',
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '450',
        'icon' => 'fas fa-user-friends',
        'iconColor' => 'yellow'
    ]); ?>
</div>

<!-- Grade Management Table -->
<div class="detail-management-section">
    <div class="section-header">
        <h3 class="section-title">All Grades</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add New Grade
        </button>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Grade Level</th>
                    <th>Grade Name</th>
                    <th>Category</th>
                    <th>Classes</th>
                    <th>Students</th>
                    <th>Age Range</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="grade-level"><strong>Grade 1</strong></td>
                    <td>First Grade</td>
                    <td><span class="category-badge primary">Primary</span></td>
                    <td class="class-count">3</td>
                    <td class="student-count">90</td>
                    <td class="age-range">6-7 years</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Grade">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Grade">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="grade-level"><strong>Grade 2</strong></td>
                    <td>Second Grade</td>
                    <td><span class="category-badge primary">Primary</span></td>
                    <td class="class-count">3</td>
                    <td class="student-count">85</td>
                    <td class="age-range">7-8 years</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Grade">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Grade">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="grade-level"><strong>Grade 9</strong></td>
                    <td>Ninth Grade</td>
                    <td><span class="category-badge secondary">Secondary</span></td>
                    <td class="class-count">4</td>
                    <td class="student-count">120</td>
                    <td class="age-range">14-15 years</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Grade">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Grade">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="grade-level"><strong>Grade 10</strong></td>
                    <td>Tenth Grade</td>
                    <td><span class="category-badge secondary">Secondary</span></td>
                    <td class="class-count">3</td>
                    <td class="student-count">105</td>
                    <td class="age-range">15-16 years</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Grade">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Grade">
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
