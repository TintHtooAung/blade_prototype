<?php
$className = $_GET['class'] ?? '1A';
// Extract grade and class letter from className (e.g., "1A" -> grade: "1", classLetter: "A")
preg_match('/^(\d+)([A-Z])$/i', $className, $matches);
$gradeNumber = $matches[1] ?? '1';
$classLetter = $matches[2] ?? 'A';
$gradeName = 'Grade ' . $gradeNumber;
$pageTitle = 'Smart Campus Nova Hub - Class Details: ' . $classLetter;
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';
include __DIR__ . '/../../components/academic-dialogs.php';

// Determine portal and prefix
$uri = $_SERVER['REQUEST_URI'] ?? '';
$isStaffPortal = strpos($uri, '/staff/') === 0;
$portalPrefix = $isStaffPortal ? '/staff' : '/admin';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="<?php echo $portalPrefix; ?>/academic-management" class="breadcrumb-link">
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
            <h1>Class <?php echo htmlspecialchars($classLetter); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
                <span class="meta-info"><?php echo htmlspecialchars($gradeName); ?></span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editClassBtn">
            <i class="fas fa-edit"></i> Edit Class
        </button>
        <button class="action-btn-header delete" id="deleteClassBtn">
            <i class="fas fa-trash"></i> Delete Class
        </button>
    </div>
</div>

<!-- Class Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Class Name',
        'value' => $classLetter,
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Grade',
        'value' => $gradeName,
        'icon' => 'fas fa-graduation-cap',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '30',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Class Teacher',
        'value' => 'Ms. Sarah Johnson',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'orange'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Teachers in Class',
        'value' => '4',
        'icon' => 'fas fa-users-cog',
        'iconColor' => 'teal'
    ]); ?>
</div>


<!-- Class Information Section removed; details moved to header meta -->

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

<!-- Teachers in Class Section -->
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-chalkboard-teacher"></i> Teachers in Class</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Teacher ID">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T001" style="text-decoration: none; color: #1976d2;">T001</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T001" style="text-decoration: none; color: #1976d2;">Ms. Sarah Johnson</a>
                    </td>
                    <td data-label="Subject">
                        <a href="<?php echo $portalPrefix; ?>/subject-detail/MATH001" style="text-decoration: none; color: #1976d2;">
                            <strong>MATH001</strong> - Mathematics
                        </a>
                    </td>
                    <td data-label="Department">Mathematics</td>
                    <td data-label="Email">sarah.johnson@school.edu</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Teacher ID">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T002" style="text-decoration: none; color: #1976d2;">T002</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T002" style="text-decoration: none; color: #1976d2;">Mr. David Lee</a>
                    </td>
                    <td data-label="Subject">
                        <a href="<?php echo $portalPrefix; ?>/subject-detail/ENG001" style="text-decoration: none; color: #1976d2;">
                            <strong>ENG001</strong> - English
                        </a>
                    </td>
                    <td data-label="Department">Languages</td>
                    <td data-label="Email">david.lee@school.edu</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Teacher ID">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T003" style="text-decoration: none; color: #1976d2;">T003</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T003" style="text-decoration: none; color: #1976d2;">Ms. Emily Chen</a>
                    </td>
                    <td data-label="Subject">
                        <a href="<?php echo $portalPrefix; ?>/subject-detail/SCI001" style="text-decoration: none; color: #1976d2;">
                            <strong>SCI001</strong> - Science
                        </a>
                    </td>
                    <td data-label="Department">Science</td>
                    <td data-label="Email">emily.chen@school.edu</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Teacher ID">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T004" style="text-decoration: none; color: #1976d2;">T004</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/teacher-profile/T004" style="text-decoration: none; color: #1976d2;">Mr. Robert Kim</a>
                    </td>
                    <td data-label="Subject">
                        <a href="<?php echo $portalPrefix; ?>/subject-detail/HIS001" style="text-decoration: none; color: #1976d2;">
                            <strong>HIS001</strong> - History
                        </a>
                    </td>
                    <td data-label="Department">Social Studies</td>
                    <td data-label="Email">robert.kim@school.edu</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Students in Class Section -->
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user-graduate"></i> Students in Class <?php echo htmlspecialchars($classLetter); ?></h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU001" style="text-decoration: none; color: #1976d2;">STU001</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU001" style="text-decoration: none; color: #1976d2;">John Doe</a>
                    </td>
                    <td data-label="Email">john.doe@school.edu</td>
                    <td data-label="Phone">+1-555-0101</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU002" style="text-decoration: none; color: #1976d2;">STU002</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU002" style="text-decoration: none; color: #1976d2;">Jane Smith</a>
                    </td>
                    <td data-label="Email">jane.smith@school.edu</td>
                    <td data-label="Phone">+1-555-0102</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU003" style="text-decoration: none; color: #1976d2;">STU003</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU003" style="text-decoration: none; color: #1976d2;">Michael Johnson</a>
                    </td>
                    <td data-label="Email">michael.johnson@school.edu</td>
                    <td data-label="Phone">+1-555-0103</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU004" style="text-decoration: none; color: #1976d2;">STU004</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU004" style="text-decoration: none; color: #1976d2;">Emily Davis</a>
                    </td>
                    <td data-label="Email">emily.davis@school.edu</td>
                    <td data-label="Phone">+1-555-0104</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU005" style="text-decoration: none; color: #1976d2;">STU005</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU005" style="text-decoration: none; color: #1976d2;">David Wilson</a>
                    </td>
                    <td data-label="Email">david.wilson@school.edu</td>
                    <td data-label="Phone">+1-555-0105</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU006" style="text-decoration: none; color: #1976d2;">STU006</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU006" style="text-decoration: none; color: #1976d2;">Sarah Brown</a>
                    </td>
                    <td data-label="Email">sarah.brown@school.edu</td>
                    <td data-label="Phone">+1-555-0106</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU007" style="text-decoration: none; color: #1976d2;">STU007</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU007" style="text-decoration: none; color: #1976d2;">Robert Taylor</a>
                    </td>
                    <td data-label="Email">robert.taylor@school.edu</td>
                    <td data-label="Phone">+1-555-0107</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU008" style="text-decoration: none; color: #1976d2;">STU008</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU008" style="text-decoration: none; color: #1976d2;">Lisa Anderson</a>
                    </td>
                    <td data-label="Email">lisa.anderson@school.edu</td>
                    <td data-label="Phone">+1-555-0108</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU009" style="text-decoration: none; color: #1976d2;">STU009</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU009" style="text-decoration: none; color: #1976d2;">James Martinez</a>
                    </td>
                    <td data-label="Email">james.martinez@school.edu</td>
                    <td data-label="Phone">+1-555-0109</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Student ID">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU010" style="text-decoration: none; color: #1976d2;">STU010</a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo $portalPrefix; ?>/student-profile/STU010" style="text-decoration: none; color: #1976d2;">Maria Garcia</a>
                    </td>
                    <td data-label="Email">maria.garcia@school.edu</td>
                    <td data-label="Phone">+1-555-0110</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

// Include appropriate layout based on portal
$layoutPath = __DIR__ . '/../../components/' . ($isStaffPortal ? 'staff-layout.php' : 'admin-layout.php');
include $layoutPath;
?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // Close Class Dialog function
    window.closeClassDialog = function() {
        document.getElementById('classDialog').style.display = 'none';
    };
    
    // Edit Class functionality
    const editClassBtn = document.getElementById('editClassBtn');
    
    editClassBtn.addEventListener('click', function() {
        // Open dialog with current data
        const classLetter = '<?php echo htmlspecialchars($classLetter); ?>';
        const gradeName = '<?php echo htmlspecialchars($gradeName); ?>';
        document.getElementById('classDialogTitle').textContent = 'Edit Class';
        document.getElementById('className').value = classLetter;
        document.getElementById('classGrade').value = gradeName;
        document.getElementById('classRoom').value = 'Room 101'; // Get from actual data
        document.getElementById('classTeacher').value = 'Ms. Sarah Johnson'; // Get from actual data
        document.getElementById('classDialog').style.display = 'flex';
    });
    
    // Override saveClass function for detail page
    window.saveClass = function() {
        const newName = document.getElementById('className').value.trim();
        const newGrade = document.getElementById('classGrade').value.trim();
        const newRoom = document.getElementById('classRoom').value.trim();
        const newTeacher = document.getElementById('classTeacher').value.trim();
        
        if (!newName || !newGrade) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Extract grade number from "Grade X" format
        const gradeMatch = newGrade.match(/Grade\s+(\d+)/i);
        const gradeNum = gradeMatch ? gradeMatch[1] : '1';
        
        // Update page title (just the letter)
        document.querySelector('.batch-info h1').textContent = `Class ${newName}`;
        
        // Update grade in meta info
        const metaInfo = document.querySelector('.batch-meta .meta-info');
        if (metaInfo) {
            metaInfo.textContent = newGrade;
        }
        
        // Update stat cards
        const classCard = document.querySelector('.detail-stats-grid .stat-card:first-child .stat-number');
        const gradeCard = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-number');
        if (classCard) classCard.textContent = newName;
        if (gradeCard) gradeCard.textContent = newGrade;
        
        // Update section title
        const sectionTitle = document.querySelector('.simple-section .simple-header h4');
        if (sectionTitle && sectionTitle.textContent.includes('Students in Class')) {
            sectionTitle.innerHTML = `<i class="fas fa-user-graduate"></i> Students in Class ${newName}`;
        }
        
        // Close dialog
        document.getElementById('classDialog').style.display = 'none';
        
        showActionStatus('Class updated successfully!', 'success');
    };
    
    // Delete Class functionality
    const deleteClassBtn = document.getElementById('deleteClassBtn');
    deleteClassBtn.addEventListener('click', function() {
        const classDisplay = 'Class <?php echo htmlspecialchars($classLetter); ?> (<?php echo htmlspecialchars($gradeName); ?>)';
        showConfirmDialog({
            title: 'Delete Class',
            message: `Are you sure you want to delete ${classDisplay}? This will remove all students from this class and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-door-open',
            onConfirm: function() {
                showActionStatus('Class deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '<?php echo $portalPrefix; ?>/academic-management';
                }, 1500);
            }
        });
    });
});
</script>
