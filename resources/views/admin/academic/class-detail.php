<?php
$className = $_GET['class'] ?? '1A';
$pageTitle = 'Smart Campus Nova Hub - Class Details: ' . $className;
$pageIcon = 'fas fa-users';
$pageHeading = 'Class Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

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
            <h1>Class <?php echo htmlspecialchars($className); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
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
</div>

<!-- Edit Class Form -->
<div id="editClassForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Class</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editClassName">Class Name</label>
                <input type="text" id="editClassName" class="form-input" value="<?php echo htmlspecialchars($className); ?>">
            </div>
            <div class="form-group">
                <label for="editClassGrade">Grade</label>
                <input type="text" id="editClassGrade" class="form-input" value="Grade 1">
            </div>
            <div class="form-group">
                <label for="editClassRoom">Room</label>
                <input type="text" id="editClassRoom" class="form-input" value="Room 101">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="editClassTeacher">Class Teacher</label>
                <input type="text" id="editClassTeacher" class="form-input" value="Ms. Sarah Johnson">
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditClass" class="simple-btn secondary">Cancel</button>
            <button id="saveEditClass" class="simple-btn primary"><i class="fas fa-check"></i> Update Class</button>
        </div>
    </div>
</div>

<!-- Class Information Section removed; details moved to header meta -->

<!-- Schedule Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Class Schedule</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">School Hours</td>
                    <td>8:00 AM - 2:00 PM</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Break Time</td>
                    <td>10:00 AM - 10:30 AM</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Lunch Time</td>
                    <td>12:00 PM - 1:00 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Subjects in Class Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subjects in Class <?php echo htmlspecialchars($className); ?></h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Category</th>
                    <th>Teacher</th>
                    <th>Time Slot</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="<?php echo $portalPrefix; ?>/academic/subject-detail/MATH" class="grade-link" style="font-weight: 600; color: #007AFF;">Mathematics</a></td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>Mr. John Smith</td>
                    <td>9:00 AM - 10:00 AM</td>
                </tr>
                <tr>
                    <td><a href="<?php echo $portalPrefix; ?>/academic/subject-detail/ENG" class="grade-link" style="font-weight: 600; color: #007AFF;">English Language</a></td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>Ms. Sarah Johnson</td>
                    <td>10:30 AM - 11:30 AM</td>
                </tr>
                <tr>
                    <td><a href="<?php echo $portalPrefix; ?>/academic/subject-detail/SCI" class="grade-link" style="font-weight: 600; color: #007AFF;">Science</a></td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>Dr. Wilson</td>
                    <td>11:30 AM - 12:30 PM</td>
                </tr>
                <tr>
                    <td><a href="<?php echo $portalPrefix; ?>/academic/subject-detail/ART" class="grade-link" style="font-weight: 600; color: #007AFF;">Art & Craft</a></td>
                    <td><span class="category-badge elective">Elective</span></td>
                    <td>Ms. Anna Rodriguez</td>
                    <td>1:00 PM - 2:00 PM</td>
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
    // Edit Class functionality
    const editClassBtn = document.getElementById('editClassBtn');
    const editClassForm = document.getElementById('editClassForm');
    const cancelEditClassBtn = document.getElementById('cancelEditClass');
    const saveEditClassBtn = document.getElementById('saveEditClass');
    
    editClassBtn.addEventListener('click', function() {
        editClassForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL and clean it up immediately
    if (window.location.search.includes('edit=true')) {
        editClassForm.style.display = 'block';
        // Remove edit parameter from URL immediately
        const cleanUrl = window.location.pathname + window.location.search.replace(/[?&]edit=true/, '').replace(/[?&]$/, '');
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    cancelEditClassBtn.addEventListener('click', function() {
        editClassForm.style.display = 'none';
    });
    
    saveEditClassBtn.addEventListener('click', function() {
        const newName = document.getElementById('editClassName').value.trim();
        const newGrade = document.getElementById('editClassGrade').value.trim();
        const newRoom = document.getElementById('editClassRoom').value.trim();
        const newTeacher = document.getElementById('editClassTeacher').value.trim();
        
        if (!newName || !newGrade || !newRoom || !newTeacher) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = `Class ${newName}`;
        
        // Hide form
        editClassForm.style.display = 'none';
        
        showActionStatus('Class updated successfully!', 'success');
    });
    
    // Delete Class functionality
    const deleteClassBtn = document.getElementById('deleteClassBtn');
    deleteClassBtn.addEventListener('click', function() {
        const className = 'Class <?php echo htmlspecialchars($className); ?>';
        showConfirmDialog({
            title: 'Delete Class',
            message: `Are you sure you want to delete ${className}? This will remove all students from this class and cannot be undone.`,
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
