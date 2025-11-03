<?php
$subjectCode = $_GET['subject'] ?? 'MATH';
$subjectNames = [
    'MATH' => 'Mathematics',
    'ENG' => 'English Language', 
    'SCI' => 'Science',
    'ART' => 'Art & Craft'
];
$subjectName = $subjectNames[$subjectCode] ?? 'Unknown Subject';

// Example: Teacher's assigned subjects (in real app, this would come from database)
$currentTeacherId = 'T001'; // This would be from session/auth in real app
$teacherSubjects = [
    [
        'code' => 'MATH', 
        'name' => 'Mathematics', 
        'category' => 'Core', 
        'class' => 'G9-A', 
        'classTimes' => [
            ['day' => 'Monday', 'time' => '9:00 AM - 10:00 AM', 'class' => 'G9-A', 'room' => 'Room 201'],
            ['day' => 'Wednesday', 'time' => '9:00 AM - 10:00 AM', 'class' => 'G9-A', 'room' => 'Room 201'],
            ['day' => 'Friday', 'time' => '10:30 AM - 11:30 AM', 'class' => 'G9-A', 'room' => 'Room 201'],
            ['day' => 'Monday', 'time' => '10:30 AM - 11:30 AM', 'class' => 'G9-B', 'room' => 'Room 202'],
            ['day' => 'Wednesday', 'time' => '10:30 AM - 11:30 AM', 'class' => 'G9-B', 'room' => 'Room 202'],
            ['day' => 'Friday', 'time' => '2:00 PM - 3:00 PM', 'class' => 'G9-B', 'room' => 'Room 202'],
            ['day' => 'Tuesday', 'time' => '1:00 PM - 2:00 PM', 'class' => 'G10-A', 'room' => 'Room 301'],
            ['day' => 'Thursday', 'time' => '1:00 PM - 2:00 PM', 'class' => 'G10-A', 'room' => 'Room 301']
        ]
    ],
    [
        'code' => 'ENG', 
        'name' => 'English Language', 
        'category' => 'Core', 
        'class' => 'G9-A', 
        'classTimes' => [
            ['day' => 'Tuesday', 'time' => '10:30 AM - 11:30 AM', 'class' => 'G9-A', 'room' => 'Room 205'],
            ['day' => 'Thursday', 'time' => '10:30 AM - 11:30 AM', 'class' => 'G9-A', 'room' => 'Room 205']
        ]
    ],
];

// Check if this subject belongs to the teacher
$subjectData = null;
foreach ($teacherSubjects as $subj) {
    if ($subj['code'] === $subjectCode) {
        $subjectData = $subj;
        break;
    }
}

// If subject doesn't belong to teacher, redirect
if (!$subjectData) {
    header('Location: /teacher/subject-profiles');
    exit;
}

$pageTitle = 'Smart Campus Nova Hub - Subject Details: ' . $subjectName;
$pageIcon = 'fas fa-book';
$pageHeading = 'Subject Details';
$activePage = 'subject-profiles';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/teacher/subject-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Subject Profiles
    </a>
</div>

<!-- Subject Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($subjectName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge <?php echo strtolower($subjectData['category']); ?>" style="background-color: <?php echo $subjectData['category'] === 'Core' ? '#fef3c7' : '#d1fae5'; ?>; color: <?php echo $subjectData['category'] === 'Core' ? '#92400e' : '#065f46'; ?>; border: 1px solid <?php echo $subjectData['category'] === 'Core' ? '#f59e0b' : '#10b981'; ?>;">
                    <?php echo htmlspecialchars($subjectData['category']); ?> Subject
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Subject Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Subject Code',
        'value' => $subjectCode,
        'icon' => 'fas fa-code',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Category',
        'value' => $subjectData['category'],
        'icon' => 'fas fa-tag',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php 
    // Get unique classes from class times
    $uniqueClasses = [];
    if (isset($subjectData['classTimes'])) {
        foreach ($subjectData['classTimes'] as $classTime) {
            $class = $classTime['class'] ?? $subjectData['class'] ?? '';
            if ($class && !in_array($class, $uniqueClasses)) {
                $uniqueClasses[] = $class;
            }
        }
    }
    $classCount = count($uniqueClasses);
    ?>
    <?php echo renderStatCard([
        'title' => 'Classes Assigned',
        'value' => $classCount > 0 ? $classCount : 0,
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
</div>

<!-- Subject Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subject Information</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Subject Name</label>
            <span><?php echo htmlspecialchars($subjectName); ?></span>
        </div>
        <div class="year-detail">
            <label>Subject Code</label>
            <span><?php echo htmlspecialchars($subjectCode); ?></span>
        </div>
        <div class="year-detail">
            <label>Category</label>
            <span><?php echo htmlspecialchars($subjectData['category']); ?> Subject</span>
        </div>
    </div>
</div>

<!-- Class Times Section -->
<?php if (isset($subjectData['classTimes']) && !empty($subjectData['classTimes'])): 
    // Get unique classes for filter
    $uniqueClasses = [];
    foreach ($subjectData['classTimes'] as $classTime) {
        $class = $classTime['class'] ?? $subjectData['class'] ?? '';
        if ($class && !in_array($class, $uniqueClasses)) {
            $uniqueClasses[] = $class;
        }
    }
    sort($uniqueClasses);
?>
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Times</h3>
        <div class="filter-controls">
            <select id="classFilter" class="form-select" style="min-width: 150px;" onchange="filterClassTimes()">
                <option value="">All Classes</option>
                <?php foreach ($uniqueClasses as $class): ?>
                <option value="<?php echo htmlspecialchars($class); ?>"><?php echo htmlspecialchars($class); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Class</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody id="classTimesTableBody">
                <?php foreach ($subjectData['classTimes'] as $classTime): ?>
                <tr data-class="<?php echo htmlspecialchars($classTime['class'] ?? $subjectData['class']); ?>">
                    <td><strong><?php echo htmlspecialchars($classTime['day']); ?></strong></td>
                    <td><?php echo htmlspecialchars($classTime['time']); ?></td>
                    <td><?php echo htmlspecialchars($classTime['class'] ?? $subjectData['class']); ?></td>
                    <td><?php echo htmlspecialchars($classTime['room']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function filterClassTimes() {
    const filterValue = document.getElementById('classFilter').value;
    const rows = document.querySelectorAll('#classTimesTableBody tr');
    
    rows.forEach(row => {
        const rowClass = row.getAttribute('data-class');
        if (filterValue === '' || rowClass === filterValue) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>

<style>
.filter-controls {
    display: flex;
    align-items: center;
    gap: 12px;
}

.form-select {
    padding: 8px 12px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    background: #fff;
    font-size: 0.9rem;
    cursor: pointer;
    transition: border-color 0.2s ease;
}

.form-select:hover {
    border-color: #1976d2;
}

.form-select:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.1);
}
</style>
<?php endif; ?>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>

