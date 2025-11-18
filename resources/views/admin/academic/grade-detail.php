<?php
$gradeId = $_GET['grade'] ?? '1';
$gradeName = 'Grade ' . $gradeId;
$pageTitle = 'Smart Campus Nova Hub - Grade Details: ' . $gradeName;
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Grade Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

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

<!-- Edit Grade Form -->
<div id="editGradeForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Grade</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editGradeLevel">Grade Level</label>
                <input type="text" id="editGradeLevel" class="form-input" value="<?php echo htmlspecialchars($gradeName); ?>">
            </div>
            <div class="form-group">
                <label for="editGradeCategory">Category</label>
                <select id="editGradeCategory" class="form-input">
                    <option value="Primary" selected>Primary</option>
                    <option value="Secondary">Secondary</option>
                    <option value="High School">High School</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editGradeDescription">Description</label>
                <input type="text" id="editGradeDescription" class="form-input" value="Academic Level">
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditGrade" class="simple-btn secondary">Cancel</button>
            <button id="saveEditGrade" class="simple-btn primary"><i class="fas fa-check"></i> Update Grade</button>
        </div>
    </div>
</div>

<!-- Grade Information Section removed per updated model -->

<!-- Academic Statistics Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Academic Statistics</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Total Subjects</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Core Subjects</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Elective Subjects</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Classes in Grade Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes in <?php echo htmlspecialchars($gradeName); ?></h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Room</th>
                    <th>Students</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>A'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>A" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>A</a></td>
                    <td>Room 101</td>
                    <td>30 students</td>
                    <td>Ms. Sarah Johnson</td>
                </tr>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>B'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>B" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>B</a></td>
                    <td>Room 102</td>
                    <td>30 students</td>
                    <td>Mr. David Chen</td>
                </tr>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>C'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>C" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>C</a></td>
                    <td>Room 103</td>
                    <td>30 students</td>
                    <td>Ms. Emily Rodriguez</td>
                </tr>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>D'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>D" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>D</a></td>
                    <td>Room 104</td>
                    <td>30 students</td>
                    <td>Dr. James Wilson</td>
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
    // Edit Grade functionality
    const editGradeBtn = document.getElementById('editGradeBtn');
    const editGradeForm = document.getElementById('editGradeForm');
    const cancelEditGradeBtn = document.getElementById('cancelEditGrade');
    const saveEditGradeBtn = document.getElementById('saveEditGrade');
    const gradeTitle = document.getElementById('gradeTitle');
    
    editGradeBtn.addEventListener('click', function() {
        editGradeForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL and clean it up immediately
    if (window.location.search.includes('edit=true')) {
        editGradeForm.style.display = 'block';
        // Remove edit parameter from URL immediately
        const cleanUrl = window.location.pathname + window.location.search.replace(/[?&]edit=true/, '').replace(/[?&]$/, '');
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    cancelEditGradeBtn.addEventListener('click', function() {
        editGradeForm.style.display = 'none';
    });
    
    saveEditGradeBtn.addEventListener('click', function() {
        const newLevel = document.getElementById('editGradeLevel').value.trim();
        const newCategory = document.getElementById('editGradeCategory').value.trim();
        const newDescription = document.getElementById('editGradeDescription').value.trim();
        
        if (!newLevel || !newCategory || !newDescription) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        gradeTitle.textContent = newLevel;
        
        // Hide form
        editGradeForm.style.display = 'none';
        
        showActionStatus('Grade updated successfully!', 'success');
    });
    
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
}
</style>

