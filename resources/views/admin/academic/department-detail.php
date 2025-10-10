<?php
$deptCode = $_GET['dept'] ?? 'PRIMARY';
$pageTitle = 'Smart Campus Nova Hub - Department Details: ' . $deptCode;
$pageIcon = 'fas fa-building';
$pageHeading = 'Department Details';
$activePage = 'academic';

// Department data mapping
$deptData = [
    'PRIMARY' => ['name' => 'Primary Teachers', 'head' => 'Ms. Sarah Johnson', 'building' => 'Building A', 'count' => '15'],
    'LANG' => ['name' => 'Language Teachers', 'head' => 'Dr. Emily Chen', 'building' => 'Building B', 'count' => '8'],
    'ICT' => ['name' => 'ICT Staff', 'head' => 'Mr. David Kumar', 'building' => 'Building C', 'count' => '5'],
    'ADMIN' => ['name' => 'Administrative Staff', 'head' => 'Ms. Lisa Park', 'building' => 'Main Building', 'count' => '12'],
    'MAINT' => ['name' => 'Maintenance & Security', 'head' => 'Mr. Robert Jones', 'building' => 'Service Building', 'count' => '10'],
];
$dept = $deptData[$deptCode] ?? $deptData['PRIMARY'];

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

<!-- Department Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($deptCode); ?> - <?php echo htmlspecialchars($dept['name']); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
                <span class="meta-info"><?php echo htmlspecialchars($dept['building']); ?></span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Department
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Department
        </button>
    </div>
</div>

<!-- Department Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Department Code',
        'value' => $deptCode,
        'icon' => 'fas fa-building',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Department Head',
        'value' => $dept['head'],
        'icon' => 'fas fa-user-tie',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Staff Members',
        'value' => $dept['count'],
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Department Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Department Information</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Department Name</label>
            <span><?php echo htmlspecialchars($dept['name']); ?></span>
        </div>
        <div class="year-detail">
            <label>Building</label>
            <span><?php echo htmlspecialchars($dept['building']); ?></span>
        </div>
        <div class="year-detail">
            <label>Office Room</label>
            <span><?php echo $deptCode === 'PRIMARY' ? 'A-105' : ($deptCode === 'ICT' ? 'C-105' : 'Main-201'); ?></span>
        </div>
    </div>
</div>

<!-- Contact Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Contact Information</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Email</label>
            <span><?php echo strtolower($deptCode); ?>@school.edu</span>
        </div>
        <div class="stat-detail">
            <label>Phone Extension</label>
            <span>ext. <?php echo $deptCode === 'ADMIN' ? '100' : ($deptCode === 'PRIMARY' ? '101' : '201'); ?></span>
        </div>
        <div class="stat-detail">
            <label>Office Hours</label>
            <span><?php echo $deptCode === 'MAINT' ? '24/7' : 'Mon-Fri, 8:00 AM - 5:00 PM'; ?></span>
        </div>
    </div>
</div>

<!-- Department Staff Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Department Staff</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add Staff
        </button>
    </div>
    
    <div class="grades-grid">
        <?php if ($deptCode === 'PRIMARY'): ?>
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/teacher-profile?id=T001" class="grade-link">Ms. Sarah Johnson</a>
                <span class="category-badge primary">Head</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Position</span>
                    <span class="stat-value">Department Head</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">Grade 1, Grade 2</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Experience</span>
                    <span class="stat-value">15 years</span>
                </div>
            </div>
        </div>
        <?php elseif ($deptCode === 'ICT'): ?>
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/staff-profile?id=E001" class="grade-link">Mr. David Kumar</a>
                <span class="category-badge primary">Head</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Position</span>
                    <span class="stat-value">IT Manager</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Specialization</span>
                    <span class="stat-value">Network & Systems</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Experience</span>
                    <span class="stat-value">10 years</span>
                </div>
            </div>
        </div>
        <?php elseif ($deptCode === 'ADMIN'): ?>
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/staff-profile?id=E002" class="grade-link">Ms. Lisa Park</a>
                <span class="category-badge primary">Head</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Position</span>
                    <span class="stat-value">Office Manager</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Responsibilities</span>
                    <span class="stat-value">Receptionists, Clerks</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Experience</span>
                    <span class="stat-value">12 years</span>
                </div>
            </div>
        </div>
        <?php elseif ($deptCode === 'MAINT'): ?>
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/staff-profile?id=E003" class="grade-link">Mr. Robert Jones</a>
                <span class="category-badge primary">Head</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Position</span>
                    <span class="stat-value">Facilities Manager</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Team</span>
                    <span class="stat-value">Cleaners, Security</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Experience</span>
                    <span class="stat-value">18 years</span>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/teacher-profile?id=T002" class="grade-link">Dr. Emily Chen</a>
                <span class="category-badge primary">Head</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Position</span>
                    <span class="stat-value">Department Head</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">English, Myanmar</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Experience</span>
                    <span class="stat-value">14 years</span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>

