<?php
$subjectCode = $_GET['subject'] ?? 'MATH';
$subjectNames = [
    'MATH' => 'Mathematics',
    'ENG' => 'English Language', 
    'SCI' => 'Science',
    'ART' => 'Art & Craft'
];
$subjectName = $subjectNames[$subjectCode] ?? 'Unknown Subject';
$pageTitle = 'Smart Campus Nova Hub - Subject Details: ' . $subjectName;
$pageIcon = 'fas fa-book';
$pageHeading = 'Subject Details';
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

<!-- Subject Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($subjectName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge core" style="background-color: #fef3c7; color: #92400e; border: 1px solid #f59e0b;">Core Subject</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editSubjectBtn">
            <i class="fas fa-edit"></i> Edit Subject
        </button>
        <button class="action-btn-header delete" id="deleteSubjectBtn">
            <i class="fas fa-trash"></i> Delete Subject
        </button>
    </div>
</div>

<!-- Subject Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Grade',
        'value' => 'Grade 1',
        'icon' => 'fas fa-graduation-cap',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Teachers Assigned',
        'value' => '2',
        'icon' => 'fas fa-chalkboard-teacher',
        'iconColor' => 'purple'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Classes Assigned',
        'value' => '4',
        'icon' => 'fas fa-users',
        'iconColor' => 'blue'
    ]); ?>
</div>

<!-- Edit Subject Form -->
<div id="editSubjectForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Subject</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editSubjectCode">Subject Code</label>
                <input type="text" id="editSubjectCode" class="form-input" value="<?php echo htmlspecialchars($subjectCode); ?>">
            </div>
            <div class="form-group" style="flex:2;">
                <label for="editSubjectName">Subject Name</label>
                <input type="text" id="editSubjectName" class="form-input" value="<?php echo htmlspecialchars($subjectName); ?>">
            </div>
            <div class="form-group">
                <label for="editSubjectCategory">Category</label>
                <select id="editSubjectCategory" class="form-select">
                    <option value="Core" selected>Core</option>
                    <option value="Elective">Elective</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="editSubjectGrade">Grade</label>
                <input type="text" id="editSubjectGrade" class="form-input" value="Grade 1">
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditSubject" class="simple-btn secondary">Cancel</button>
            <button id="saveEditSubject" class="simple-btn primary"><i class="fas fa-check"></i> Update Subject</button>
        </div>
    </div>
</div>

<!-- Subject Information Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Subject Information</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Subject Name</td>
                    <td><?php echo htmlspecialchars($subjectName); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Category</td>
                    <td>Core Subject</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Classes Teaching Subject Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes Teaching <?php echo htmlspecialchars($subjectName); ?></h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Grade</th>
                    <th>Teacher</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="/admin/academic/class-detail/1A" class="grade-link" style="font-weight: 600; color: #007AFF;">Class 1A</a></td>
                    <td><span class="grade-info">Grade 1</span></td>
                    <td><?php echo $subjectCode == 'MATH' ? 'Mr. John Smith' : 'Ms. Sarah Johnson'; ?></td>
                    <td>Room 101</td>
                </tr>
                <tr>
                    <td><a href="/admin/academic/class-detail/1B" class="grade-link" style="font-weight: 600; color: #007AFF;">Class 1B</a></td>
                    <td><span class="grade-info">Grade 1</span></td>
                    <td><?php echo $subjectCode == 'MATH' ? 'Mr. David Chen' : 'Ms. Jennifer Lee'; ?></td>
                    <td>Room 102</td>
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
    // Edit Subject functionality
    const editSubjectBtn = document.getElementById('editSubjectBtn');
    const editSubjectForm = document.getElementById('editSubjectForm');
    const cancelEditSubjectBtn = document.getElementById('cancelEditSubject');
    const saveEditSubjectBtn = document.getElementById('saveEditSubject');
    
    editSubjectBtn.addEventListener('click', function() {
        editSubjectForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('edit') === 'true') {
        editSubjectForm.style.display = 'block';
        // Clean up URL by removing the edit parameter
        urlParams.delete('edit');
        const newUrl = urlParams.toString() ? window.location.pathname + '?' + urlParams.toString() : window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
    
    cancelEditSubjectBtn.addEventListener('click', function() {
        editSubjectForm.style.display = 'none';
    });
    
    saveEditSubjectBtn.addEventListener('click', function() {
        const newCode = document.getElementById('editSubjectCode').value.trim();
        const newName = document.getElementById('editSubjectName').value.trim();
        const newCategory = document.getElementById('editSubjectCategory').value.trim();
        const newGrade = document.getElementById('editSubjectGrade').value.trim();
        
        if (!newCode || !newName || !newCategory || !newGrade) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = newName;
        
        // Hide form
        editSubjectForm.style.display = 'none';
        
        showActionStatus('Subject updated successfully!', 'success');
    });
    
    // Delete Subject functionality
    const deleteSubjectBtn = document.getElementById('deleteSubjectBtn');
    deleteSubjectBtn.addEventListener('click', function() {
        const subjectName = '<?php echo htmlspecialchars($subjectName); ?>';
        showConfirmDialog({
            title: 'Delete Subject',
            message: `Are you sure you want to delete ${subjectName}? This will remove it from all classes and schedules and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-book',
            onConfirm: function() {
                showActionStatus('Subject deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '/admin/academic-management';
                }, 1500);
            }
        });
    });
});
</script>
