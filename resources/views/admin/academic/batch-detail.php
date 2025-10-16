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
        <button class="action-btn-header edit" id="editBatchBtn">
            <i class="fas fa-edit"></i> Edit Batch
        </button>
        <button class="action-btn-header delete" id="deleteBatchBtn">
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

<!-- Edit Batch Form -->
<div id="editBatchForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Batch</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group" style="flex:2;">
                <label for="editBatchName">Batch Name</label>
                <input type="text" id="editBatchName" class="form-input" value="<?php echo htmlspecialchars($batchName); ?>">
            </div>
            <div class="form-group">
                <label for="editBatchStart">Start Date</label>
                <input type="date" id="editBatchStart" class="form-input" value="2024-04-01">
            </div>
            <div class="form-group">
                <label for="editBatchEnd">End Date</label>
                <input type="date" id="editBatchEnd" class="form-input" value="2025-03-31">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="editBatchStatus">Status</label>
                <select id="editBatchStatus" class="form-select">
                    <option value="Active" selected>Active</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditBatch" class="simple-btn secondary">Cancel</button>
            <button id="saveEditBatch" class="simple-btn primary"><i class="fas fa-check"></i> Update Batch</button>
        </div>
    </div>
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
    
    <!-- Inline Add Grade Form (placed directly under header) -->
    <div id="addGradeForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-graduation-cap"></i> Create Grade</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="gradeLevel">Grade Level</label>
                    <input type="number" id="gradeLevel" class="form-input" placeholder="e.g., 10">
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="gradeName">Grade Name</label>
                    <input type="text" id="gradeName" class="form-input" placeholder="e.g., Grade 10">
                </div>
                <div class="form-group">
                    <label for="gradeCategory">Category</label>
                    <select id="gradeCategory" class="form-select">
                        <option value="Primary">Primary</option>
                        <option value="Middle">Middle</option>
                        <option value="High">High</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelAddGrade" class="simple-btn secondary">Cancel</button>
                <button id="saveAddGrade" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>

    <div class="grades-grid" id="gradesGrid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/grade-detail/1" class="grade-link">Grade 1</a>
                <span class="category-badge primary">Primary</span>
            </div>
            <div class="grade-card-body">
                
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

<script>
document.addEventListener('DOMContentLoaded', function(){
    const addBtn = document.querySelector('.detail-section .add-btn');
    const form = document.getElementById('addGradeForm');
    const cancelBtn = document.getElementById('cancelAddGrade');
    const saveBtn = document.getElementById('saveAddGrade');
    const grid = document.getElementById('gradesGrid');

    function toggle(){ if(form) form.style.display = (form.style.display==='none' || !form.style.display) ? 'block' : 'none'; }
    addBtn && addBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
    cancelBtn && cancelBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
    saveBtn && saveBtn.addEventListener('click', function(e){
        e.preventDefault();
        const level = (document.getElementById('newGradeLevel').value||'').trim();
        if (!level) { alert('Enter grade level'); return; }
        const category = document.getElementById('newGradeCategory').value || 'Primary';
        const card = document.createElement('div');
        card.className = 'grade-detail-card';
        card.innerHTML = `
            <div class="grade-card-header">
                <a href="#" class="grade-link">${level}</a>
                <span class="category-badge ${category.toLowerCase()}">${category}</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat"><span class="stat-label">Classes</span><span class="stat-value">0 classes</span></div>
                <div class="grade-stat"><span class="stat-label">Students</span><span class="stat-value">0 students</span></div>
            </div>`;
        grid && grid.prepend(card);
        toggle();
        alert('Saved (draft).');
    });
    
    // Edit Batch functionality
    const editBatchBtn = document.getElementById('editBatchBtn');
    const editBatchForm = document.getElementById('editBatchForm');
    const cancelEditBatchBtn = document.getElementById('cancelEditBatch');
    const saveEditBatchBtn = document.getElementById('saveEditBatch');
    
    editBatchBtn.addEventListener('click', function() {
        editBatchForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL and clean it up immediately
    if (window.location.search.includes('edit=true')) {
        editBatchForm.style.display = 'block';
        // Remove edit parameter from URL immediately
        const cleanUrl = window.location.pathname + window.location.search.replace(/[?&]edit=true/, '').replace(/[?&]$/, '');
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    cancelEditBatchBtn.addEventListener('click', function() {
        editBatchForm.style.display = 'none';
    });
    
    saveEditBatchBtn.addEventListener('click', function() {
        const newName = document.getElementById('editBatchName').value.trim();
        const newStart = document.getElementById('editBatchStart').value.trim();
        const newEnd = document.getElementById('editBatchEnd').value.trim();
        const newStatus = document.getElementById('editBatchStatus').value.trim();
        
        if (!newName || !newStart || !newEnd || !newStatus) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = newName;
        
        // Hide form
        editBatchForm.style.display = 'none';
        
        showActionStatus('Batch updated successfully!', 'success');
    });
    
    // Delete Batch functionality
    const deleteBatchBtn = document.getElementById('deleteBatchBtn');
    deleteBatchBtn.addEventListener('click', function() {
        const batchName = '<?php echo htmlspecialchars($batchName); ?>';
        showConfirmDialog({
            title: 'Delete Batch',
            message: `Are you sure you want to delete batch ${batchName}? This action cannot be undone and will affect all associated grades and students.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-calendar-alt',
            onConfirm: function() {
                showActionStatus('Batch deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '/admin/academic-management';
                }, 1500);
            }
        });
    });
});
</script>
