<?php
$gradeId = $_GET['grade'] ?? '1';
$gradeName = 'Grade ' . $gradeId;
$pageTitle = 'Smart Campus Nova Hub - Grade Details: ' . $gradeName;
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Grade Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';
include __DIR__ . '/../../components/academic-dialogs.php';

// Determine portal (admin or staff) from URL
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

<!-- Grade Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="batch-info">
            <h1 id="gradeTitle"><?php echo htmlspecialchars($gradeName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge primary">Primary</span>
                <span class="meta-info">Academic Level</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editGradeBtn">
            <i class="fas fa-edit"></i> Edit Grade
        </button>
        <button class="action-btn-header delete" id="deleteGradeBtn">
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


<!-- Grade Information Section removed per updated model -->

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
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-users"></i> Classes in <?php echo htmlspecialchars($gradeName); ?></h4>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Class Teacher</th>
                    <th>Total Students</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="classesList">
                <tr>
                    <td data-label="Class Name">
                        <a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>A" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade <?php echo $gradeId; ?>-A</strong>
            </a>
                    </td>
                    <td data-label="Class Teacher">Ms. Sarah Johnson</td>
                    <td data-label="Total Students">30</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Class Name">
                        <a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>B" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade <?php echo $gradeId; ?>-B</strong>
            </a>
                    </td>
                    <td data-label="Class Teacher">Mr. David Lee</td>
                    <td data-label="Total Students">28</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Class Name">
                        <a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>C" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade <?php echo $gradeId; ?>-C</strong>
            </a>
                    </td>
                    <td data-label="Class Teacher">Ms. Emily Chen</td>
                    <td data-label="Total Students">32</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Class Name">
                        <a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>D" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade <?php echo $gradeId; ?>-D</strong>
                        </a>
                    </td>
                    <td data-label="Class Teacher">Mr. Robert Kim</td>
                    <td data-label="Total Students">29</td>
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
    // Close Grade Dialog function
    window.closeGradeDialog = function() {
        document.getElementById('gradeDialog').style.display = 'none';
    };
    
    // Edit Grade functionality
    const editGradeBtn = document.getElementById('editGradeBtn');
    const gradeTitle = document.getElementById('gradeTitle');
    
    editGradeBtn.addEventListener('click', function() {
        // Open dialog with current data
        const gradeName = '<?php echo htmlspecialchars($gradeName); ?>';
        document.getElementById('gradeDialogTitle').textContent = 'Edit Grade';
        document.getElementById('gradeLevel').value = gradeName;
        document.getElementById('gradeCategory').value = 'Primary'; // Get from actual data
        document.getElementById('gradeDescription').value = 'Academic Level'; // Get from actual data
        document.getElementById('gradeDialog').style.display = 'flex';
    });
    
    // Override saveGrade function for detail page
    window.saveGrade = function() {
        const newLevel = document.getElementById('gradeLevel').value.trim();
        const newCategory = document.getElementById('gradeCategory').value.trim();
        const newDescription = document.getElementById('gradeDescription').value.trim();
        
        if (!newLevel || !newCategory) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Update page title
        gradeTitle.textContent = newLevel;
        
        // Close dialog
        document.getElementById('gradeDialog').style.display = 'none';
        
        showActionStatus('Grade updated successfully!', 'success');
    };
    
    // Delete Grade functionality
    const deleteGradeBtn = document.getElementById('deleteGradeBtn');
    deleteGradeBtn.addEventListener('click', function() {
        const gradeName = gradeTitle.textContent;
        showConfirmDialog({
            title: 'Delete Grade',
            message: `Are you sure you want to delete ${gradeName}? This will also delete all associated classes and students and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-graduation-cap',
            onConfirm: function() {
                showActionStatus('Grade deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '<?php echo $portalPrefix; ?>/academic-management';
                }, 1500);
            }
        });
    });
});
</script>

<style>
/* Section Actions Styles */
.section-actions {
    display: flex;
    gap: 8px;
    align-items: center;
}
</style>

