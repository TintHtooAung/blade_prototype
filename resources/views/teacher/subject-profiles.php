<?php
$pageTitle = 'Smart Campus Nova Hub - Subject Profiles';
$pageIcon = 'fas fa-book';
$pageHeading = 'Subject Profiles';
$activePage = 'subject-profiles';

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
        <h3 class="section-title">My Subjects</h3>
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
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>