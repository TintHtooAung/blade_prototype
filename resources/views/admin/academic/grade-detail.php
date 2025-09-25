<?php
$gradeId = $_GET['grade'] ?? '1';
$gradeName = 'Grade ' . $gradeId;
$pageTitle = 'Smart Campus Nova Hub - Grade Details: ' . $gradeName;
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Grade Details';
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

<!-- Grade Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($gradeName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge primary">Primary</span>
                <span class="meta-info">Academic Level</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Grade
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Grade
        </button>
    </div>
</div>

<!-- Grade Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Grade Level',
        'value' => $gradeName,
        'icon' => 'fas fa-graduation-cap',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Classes',
        'value' => '4',
        'icon' => 'fas fa-users',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '120',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Grade Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Grade Information</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Grade Name</label>
            <span>First Grade</span>
        </div>
        <div class="year-detail">
            <label>Category</label>
            <span>Primary Education</span>
        </div>
        <div class="year-detail">
            <label>Age Range</label>
            <span>6-7 years</span>
        </div>
    </div>
</div>

<!-- Academic Statistics Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Academic Statistics</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Total Subjects</label>
            <span>8</span>
        </div>
        <div class="stat-detail">
            <label>Core Subjects</label>
            <span>6</span>
        </div>
        <div class="stat-detail">
            <label>Elective Subjects</label>
            <span>2</span>
        </div>
    </div>
</div>

<!-- Classes in Grade Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes in <?php echo htmlspecialchars($gradeName); ?></h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add Class
        </button>
    </div>
    
    <div class="grades-grid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>A" class="grade-link">Class <?php echo $gradeId; ?>A</a>
                <span class="room-info">Room 101</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Sarah Johnson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Schedule</span>
                    <span class="stat-value">8:00 AM - 2:00 PM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>B" class="grade-link">Class <?php echo $gradeId; ?>B</a>
                <span class="room-info">Room 102</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Mr. David Chen</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Schedule</span>
                    <span class="stat-value">8:00 AM - 2:00 PM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>C" class="grade-link">Class <?php echo $gradeId; ?>C</a>
                <span class="room-info">Room 103</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Emily Rodriguez</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Schedule</span>
                    <span class="stat-value">8:00 AM - 2:00 PM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>D" class="grade-link">Class <?php echo $gradeId; ?>D</a>
                <span class="room-info">Room 104</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Dr. James Wilson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Schedule</span>
                    <span class="stat-value">8:00 AM - 2:00 PM</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>
