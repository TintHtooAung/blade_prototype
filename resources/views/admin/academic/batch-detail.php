<?php
$batchName = $_GET['batch'] ?? '2024-2025';
$pageTitle = 'Smart Campus Nova Hub - Batch Details: ' . $batchName;
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Batch Details';
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

<!-- Batch Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($batchName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
                <span class="meta-info">Academic Year 2024-25</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Batch
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Batch
        </button>
    </div>
</div>

<!-- Batch Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Batch Name',
        'value' => $batchName,
        'icon' => 'fas fa-calendar-alt',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Status',
        'value' => 'Active',
        'icon' => 'fas fa-check-circle',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '450',
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Academic Year Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Academic Year</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Start Date</label>
            <span>2024-04-01</span>
        </div>
        <div class="year-detail">
            <label>End Date</label>
            <span>2025-03-31</span>
        </div>
        <div class="year-detail">
            <label>Duration</label>
            <span>12 months</span>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Statistics</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Total Grades</label>
            <span>4</span>
        </div>
        <div class="stat-detail">
            <label>Total Classes</label>
            <span>13</span>
        </div>
        <div class="stat-detail">
            <label>Total Subjects</label>
            <span>43</span>
        </div>
    </div>
</div>

<!-- Grades in Batch Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Grades in <?php echo htmlspecialchars($batchName); ?></h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add Grade
        </button>
    </div>
    
    <div class="grades-grid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/grade-detail/1" class="grade-link">Grade 1</a>
                <span class="category-badge primary">Primary</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">8 subjects</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Classes</span>
                    <span class="stat-value">4 classes</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">120 students</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/grade-detail/2" class="grade-link">Grade 2</a>
                <span class="category-badge primary">Primary</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">8 subjects</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Classes</span>
                    <span class="stat-value">4 classes</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">115 students</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/grade-detail/6" class="grade-link">Grade 6</a>
                <span class="category-badge secondary">Middle</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">12 subjects</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Classes</span>
                    <span class="stat-value">3 classes</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">90 students</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/grade-detail/10" class="grade-link">Grade 10</a>
                <span class="category-badge upcoming">High</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">15 subjects</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Classes</span>
                    <span class="stat-value">2 classes</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">125 students</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>
