<?php
$subjectCode = $_GET['subject'] ?? 'MATH';
$subjectNames = [
    'MATH' => 'Mathematics',
    'ENG' => 'English Language', 
    'SCI' => 'Science',
    'ART' => 'Art & Craft'
];
$subjectName = $subjectNames[$subjectCode] ?? 'Unknown Subject';
$pageTitle = 'Smart Campus Nova Hub - Subject Details: ' . $subjectName;
$pageIcon = 'fas fa-book';
$pageHeading = 'Subject Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/academic-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Academic Management
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
                <span class="status-badge core">Core Subject</span>
                <span class="meta-info">Code: <?php echo htmlspecialchars($subjectCode); ?></span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Subject
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Subject
        </button>
    </div>
</div>

<!-- Subject Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Subject Code',
        'value' => $subjectCode,
        'icon' => 'fas fa-book',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Classes',
        'value' => '4',
        'icon' => 'fas fa-users',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Teachers Assigned',
        'value' => '2',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'purple'
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
            <label>Category</label>
            <span>Core Subject</span>
        </div>
        <div class="year-detail">
            <label>Department</label>
            <span>Primary Education</span>
        </div>
    </div>
</div>

<!-- Teaching Details Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Teaching Details</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Hours per Week</label>
            <span><?php echo $subjectCode == 'MATH' ? '5' : ($subjectCode == 'ENG' ? '4' : '3'); ?> hours</span>
        </div>
        <div class="stat-detail">
            <label>Grade Levels</label>
            <span>1, 2, 9, 10</span>
        </div>
        <div class="stat-detail">
            <label>Assessment Type</label>
            <span>Written & Practical</span>
        </div>
    </div>
</div>

<!-- Classes Teaching Subject Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes Teaching <?php echo htmlspecialchars($subjectName); ?></h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Assign Class
        </button>
    </div>
    
    <div class="grades-grid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/1A" class="grade-link">Class 1A</a>
                <span class="grade-info">Grade 1</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? '5' : ($subjectCode == 'ENG' ? '4' : '3'); ?> hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? 'Mr. John Smith' : 'Ms. Sarah Johnson'; ?></span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">Room 101</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/1B" class="grade-link">Class 1B</a>
                <span class="grade-info">Grade 1</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? '5' : ($subjectCode == 'ENG' ? '4' : '3'); ?> hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? 'Mr. David Chen' : 'Ms. Jennifer Lee'; ?></span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">Room 102</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/2A" class="grade-link">Class 2A</a>
                <span class="grade-info">Grade 2</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? '5' : ($subjectCode == 'ENG' ? '4' : '3'); ?> hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Dr. James Wilson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">Room 201</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/2B" class="grade-link">Class 2B</a>
                <span class="grade-info">Grade 2</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value"><?php echo $subjectCode == 'MATH' ? '5' : ($subjectCode == 'ENG' ? '4' : '3'); ?> hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Emily Rodriguez</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Room</span>
                    <span class="stat-value">Room 202</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>
