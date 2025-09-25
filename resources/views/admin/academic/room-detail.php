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
                <span class="meta-info">Classroom A</span>
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

<!-- Room Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Room Number',
        'value' => 'Room ' . $roomNumber,
        'icon' => 'fas fa-door-open',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Capacity',
        'value' => '35',
        'icon' => 'fas fa-users',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Current Students',
        'value' => '30',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Room Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Room Information</h3>
    </div>
    
    <div class="academic-year-info">
        <div class="year-detail">
            <label>Room Name</label>
            <span>Classroom A</span>
        </div>
        <div class="year-detail">
            <label>Floor</label>
            <span>1st Floor</span>
        </div>
        <div class="year-detail">
            <label>Building</label>
            <span>Main Academic Block</span>
        </div>
    </div>
</div>

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
        <h3 class="section-title">Room Schedule - Room <?php echo htmlspecialchars($roomNumber); ?></h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Schedule Class
        </button>
    </div>
    
    <div class="grades-grid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo substr($roomNumber, -1); ?>A" class="grade-link">Class <?php echo substr($roomNumber, -1); ?>A</a>
                <span class="time-slot">8:00 AM - 2:00 PM</span>
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
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <span class="grade-link">Evening Study Session</span>
                <span class="time-slot">4:00 PM - 6:00 PM</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Activity</span>
                    <span class="stat-value">Homework Support</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Supervisor</span>
                    <span class="stat-value">Ms. Jennifer Lee</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Capacity</span>
                    <span class="stat-value">20 students</span>
                </div>
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <span class="grade-link">Weekend Activities</span>
                <span class="time-slot">Saturday 9:00 AM - 12:00 PM</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Activity</span>
                    <span class="stat-value">Art Workshop</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Instructor</span>
                    <span class="stat-value">Ms. Anna Rodriguez</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Participants</span>
                    <span class="stat-value">15 students</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>
