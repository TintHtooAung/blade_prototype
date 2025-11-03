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

<?php
// Example: Teacher's assigned subjects (in real app, this would come from database)
$currentTeacherId = 'T001'; // This would be from session/auth in real app
$teacherSubjects = [
    ['code' => 'MATH', 'name' => 'Mathematics', 'category' => 'Core', 'class' => 'G9-A', 'teacherCount' => 2],
    ['code' => 'ENG', 'name' => 'English Language', 'category' => 'Core', 'class' => 'G9-A', 'teacherCount' => 2],
];

$totalSubjects = count($teacherSubjects);
$coreSubjects = count(array_filter($teacherSubjects, function($s) { return $s['category'] === 'Core'; }));
$electiveSubjects = count(array_filter($teacherSubjects, function($s) { return $s['category'] === 'Elective'; }));
?>

<!-- Subject Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Subjects',
        'value' => $totalSubjects,
        'icon' => 'fas fa-book-open',
        'iconColor' => 'red'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Core Subjects',
        'value' => $coreSubjects,
        'icon' => 'fas fa-star',
        'iconColor' => 'yellow'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Elective Subjects',
        'value' => $electiveSubjects,
        'icon' => 'fas fa-plus-circle',
        'iconColor' => 'green'
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($teacherSubjects)): ?>
                <tr>
                    <td colspan="4" style="text-align: center; padding: 24px; color: #666;">
                        No subjects assigned yet.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($teacherSubjects as $subject): ?>
                <tr>
                    <td class="subject-code"><strong><?php echo htmlspecialchars($subject['code']); ?></strong></td>
                    <td><?php echo htmlspecialchars($subject['name']); ?></td>
                    <td><span class="category-badge <?php echo strtolower($subject['category']); ?>"><?php echo htmlspecialchars($subject['category']); ?></span></td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details" onclick="window.location.href='/teacher/subject-detail/<?php echo urlencode($subject['code']); ?>'">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>