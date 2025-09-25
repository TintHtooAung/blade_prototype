<?php
$pageTitle = 'Smart Campus Nova Hub - Subject Management';
$pageIcon = 'fas fa-book';
$pageHeading = 'Subject Management';
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

<!-- Subject Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Subjects',
        'value' => '4',
        'icon' => 'fas fa-book-open',
        'iconColor' => 'red'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Core Subjects',
        'value' => '3',
        'icon' => 'fas fa-star',
        'iconColor' => 'yellow'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Elective Subjects',
        'value' => '1',
        'icon' => 'fas fa-plus-circle',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Teachers',
        'value' => '6',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'blue'
    ]); ?>
</div>

<!-- Subject Management Table -->
<div class="detail-management-section">
    <div class="section-header">
        <h3 class="section-title">All Subjects</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add New Subject
        </button>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Category</th>
                    <th>Grades</th>
                    <th>Teachers</th>
                    <th>Hours/Week</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="subject-code"><strong>MATH</strong></td>
                    <td>Mathematics</td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>1, 2, 9, 10</td>
                    <td class="teacher-count">2</td>
                    <td class="hours">5</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Subject">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Subject">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="subject-code"><strong>ENG</strong></td>
                    <td>English Language</td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>1, 2, 9, 10</td>
                    <td class="teacher-count">2</td>
                    <td class="hours">4</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Subject">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Subject">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="subject-code"><strong>SCI</strong></td>
                    <td>Science</td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>1, 2, 9, 10</td>
                    <td class="teacher-count">1</td>
                    <td class="hours">4</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Subject">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Subject">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="subject-code"><strong>ART</strong></td>
                    <td>Visual Arts</td>
                    <td><span class="category-badge elective">Elective</span></td>
                    <td>1, 2, 9, 10</td>
                    <td class="teacher-count">1</td>
                    <td class="hours">2</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Subject">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Subject">
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
