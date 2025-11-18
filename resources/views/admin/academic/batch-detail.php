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
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Start Date</td>
                    <td>2024-04-01</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">End Date</td>
                    <td>2025-03-31</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Duration</td>
                    <td>12 months</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Statistics Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Statistics</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Total Grades</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Total Classes</td>
                    <td>13</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Total Subjects</td>
                    <td>43</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Grades in Batch Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Grades in <?php echo htmlspecialchars($batchName); ?></h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Grade Name</th>
                    <th>Category</th>
                    <th>Classes</th>
                    <th>Students</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="/admin/academic/grade-detail/1" class="grade-link" style="font-weight: 600; color: #007AFF;">Grade 1</a></td>
                    <td><span class="category-badge primary">Primary</span></td>
                    <td>4 classes</td>
                    <td>120 students</td>
                </tr>
                <tr>
                    <td><a href="/admin/academic/grade-detail/2" class="grade-link" style="font-weight: 600; color: #007AFF;">Grade 2</a></td>
                    <td><span class="category-badge primary">Primary</span></td>
                    <td>4 classes</td>
                    <td>115 students</td>
                </tr>
                <tr>
                    <td><a href="/admin/academic/grade-detail/6" class="grade-link" style="font-weight: 600; color: #007AFF;">Grade 6</a></td>
                    <td><span class="category-badge secondary">Middle</span></td>
                    <td>3 classes</td>
                    <td>90 students</td>
                </tr>
                <tr>
                    <td><a href="/admin/academic/grade-detail/10" class="grade-link" style="font-weight: 600; color: #007AFF;">Grade 10</a></td>
                    <td><span class="category-badge upcoming">High</span></td>
                    <td>2 classes</td>
                    <td>125 students</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function(){
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
