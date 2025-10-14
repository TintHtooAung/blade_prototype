<?php
$roomNumber = $_GET['room'] ?? '101';
$pageTitle = 'Smart Campus Nova Hub - Room Details: Room ' . $roomNumber;
$pageIcon = 'fas fa-door-open';
$pageHeading = 'Room Details';
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

<!-- Room Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-door-open"></i>
        </div>
        <div class="batch-info">
            <h1>Room <?php echo htmlspecialchars($roomNumber); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Occupied</span>
                <span class="meta-info">Building A · 1st Floor</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Room
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Room
        </button>
    </div>
</div>

<!-- Room Statistics removed to avoid duplication with header -->

<!-- Room Information Section removed per model simplification -->

<!-- Facilities Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Room Facilities</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Seating Capacity</label>
            <span>35 students</span>
        </div>
        <div class="stat-detail">
            <label>Equipment</label>
            <span>Projector, Whiteboard</span>
        </div>
        <div class="stat-detail">
            <label>Air Conditioning</label>
            <span>Available</span>
        </div>
    </div>
</div>

<!-- Room Schedule Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Assigned Class</h3>
    </div>
    <div class="grades-grid" id="roomScheduleGrid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo substr($roomNumber, -1); ?>A" class="grade-link">Class <?php echo substr($roomNumber, -1); ?>A</a>
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
                    <span class="stat-label">Grade</span>
                    <span class="stat-value">Grade <?php echo substr($roomNumber, -1); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>

<script></script>
