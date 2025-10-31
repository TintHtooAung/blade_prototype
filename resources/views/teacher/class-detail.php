<?php
$className = $_GET['class'] ?? '1A';
$pageTitle = 'Smart Campus Nova Hub - Class Details: ' . $className;
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Details';
$activePage = 'class-profiles';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/teacher/class-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Class Profiles
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
            </div>
        </div>
    </div>
</div>

<!-- Class Statistics -->
<div class="detail-stats-grid">
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
    
    <?php echo renderStatCard([
        'title' => 'Class Teacher',
        'value' => 'Ms. Sarah Johnson',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Room',
        'value' => 'Room 101',
        'icon' => 'fas fa-door-open',
        'iconColor' => 'yellow'
    ]); ?>
</div>

<!-- Class Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Information</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Class Name</label>
            <span><?php echo htmlspecialchars($className); ?></span>
        </div>
        <div class="stat-detail">
            <label>Grade</label>
            <span>Grade 1</span>
        </div>
        <div class="stat-detail">
            <label>Room</label>
            <span>Room 101</span>
        </div>
        <div class="stat-detail">
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
    </div>
    
    <div class="grades-grid" id="subjectsGrid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/teacher/subject-profiles" class="grade-link">Mathematics</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
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
                <a href="/teacher/subject-profiles" class="grade-link">English Language</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
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
                <a href="/teacher/subject-profiles" class="grade-link">Science</a>
                <span class="category-badge core">Core</span>
            </div>
            <div class="grade-card-body">
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
                <a href="/teacher/subject-profiles" class="grade-link">Art & Craft</a>
                <span class="category-badge elective">Elective</span>
            </div>
            <div class="grade-card-body">
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

<!-- Students in Class Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Students in Class <?php echo htmlspecialchars($className); ?></h3>
        <div class="section-actions">
            <a href="/teacher/student-profiles" class="add-btn">
                <i class="fas fa-list"></i>
                View All Students
            </a>
        </div>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>S001</td>
                    <td><strong>John Doe</strong></td>
                    <td>john.doe@example.com</td>
                    <td>123-456-7890</td>
                    <td class="actions-cell">
                        <a href="/teacher/student-profile/S001" class="action-icon view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>S002</td>
                    <td><strong>Jane Smith</strong></td>
                    <td>jane.smith@example.com</td>
                    <td>123-456-7891</td>
                    <td class="actions-cell">
                        <a href="/teacher/student-profile/S002" class="action-icon view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>S003</td>
                    <td><strong>Mike Johnson</strong></td>
                    <td>mike.johnson@example.com</td>
                    <td>123-456-7892</td>
                    <td class="actions-cell">
                        <a href="/teacher/student-profile/S003" class="action-icon view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>S004</td>
                    <td><strong>Sarah Williams</strong></td>
                    <td>sarah.williams@example.com</td>
                    <td>123-456-7893</td>
                    <td class="actions-cell">
                        <a href="/teacher/student-profile/S004" class="action-icon view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>S005</td>
                    <td><strong>David Brown</strong></td>
                    <td>david.brown@example.com</td>
                    <td>123-456-7894</td>
                    <td class="actions-cell">
                        <a href="/teacher/student-profile/S005" class="action-icon view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </a>
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

