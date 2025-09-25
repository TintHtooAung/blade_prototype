<?php
$className = $_GET['class'] ?? '1A';
$pageTitle = 'Smart Campus Nova Hub - Class Details: ' . $className;
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Details';
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

<!-- Class Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="batch-info">
            <h1>Class <?php echo htmlspecialchars($className); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
                <span class="meta-info">Current Academic Year</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Class
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Class
        </button>
    </div>
</div>

<!-- Class Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Class Name',
        'value' => 'Class ' . $className,
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '30',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Subjects',
        'value' => '8',
        'icon' => 'fas fa-book',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Class Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Information</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Grade Level</label>
            <span>Grade <?php echo substr($className, 0, 1); ?></span>
        </div>
        <div class="year-detail">
            <label>Room Number</label>
            <span>Room 10<?php echo substr($className, 0, 1); ?></span>
        </div>
        <div class="year-detail">
            <label>Class Teacher</label>
            <span>Ms. Sarah Johnson</span>
        </div>
    </div>
</div>

<!-- Schedule Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Schedule</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>School Hours</label>
            <span>8:00 AM - 2:00 PM</span>
        </div>
        <div class="stat-detail">
            <label>Break Time</label>
            <span>10:00 AM - 10:30 AM</span>
        </div>
        <div class="stat-detail">
            <label>Lunch Time</label>
            <span>12:00 PM - 1:00 PM</span>
        </div>
    </div>
</div>

<!-- Subjects in Class Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subjects in Class <?php echo htmlspecialchars($className); ?></h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Assign Subject
        </button>
    </div>
    
    <div class="grades-grid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/subject-detail/MATH" class="grade-link">Mathematics</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value">5 hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Mr. John Smith</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">9:00 AM - 10:00 AM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/subject-detail/ENG" class="grade-link">English Language</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value">4 hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Sarah Johnson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">10:30 AM - 11:30 AM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/subject-detail/SCI" class="grade-link">Science</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value">3 hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Dr. Wilson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">11:30 AM - 12:30 PM</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/subject-detail/ART" class="grade-link">Art & Craft</a>
                <span class="category-badge elective">Elective</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Hours/Week</span>
                    <span class="stat-value">2 hours</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Anna Rodriguez</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Time Slot</span>
                    <span class="stat-value">1:00 PM - 2:00 PM</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>
