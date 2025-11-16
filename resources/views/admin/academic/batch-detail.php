<?php
$batchName = $_GET['batch'] ?? '2024-2025';
$pageTitle = 'Smart Campus Nova Hub - Batch Details: ' . $batchName;
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Batch Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';
include __DIR__ . '/../../components/academic-dialogs.php';

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
<div class="simple-section">
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-graduation-cap"></i> Grades in <?php echo htmlspecialchars($batchName); ?></h4>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Grade Name</th>
                    <th>Total Classes</th>
                    <th>Total Students</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="gradesList">
                <tr>
                    <td data-label="Grade Name">
                        <a href="/admin/academic/grade-detail/1" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade 1</strong>
                        </a>
                    </td>
                    <td data-label="Total Classes">4</td>
                    <td data-label="Total Students">120</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Grade Name">
                        <a href="/admin/academic/grade-detail/2" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade 2</strong>
                        </a>
                    </td>
                    <td data-label="Total Classes">4</td>
                    <td data-label="Total Students">115</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Grade Name">
                        <a href="/admin/academic/grade-detail/6" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade 6</strong>
                        </a>
                    </td>
                    <td data-label="Total Classes">3</td>
                    <td data-label="Total Students">90</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td data-label="Grade Name">
                        <a href="/admin/academic/grade-detail/10" style="text-decoration: none; color: #1976d2;">
                            <strong>Grade 10</strong>
                        </a>
                    </td>
                    <td data-label="Total Classes">2</td>
                    <td data-label="Total Students">65</td>
                    <td data-label="Status"><span class="status-badge active">Active</span></td>
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
    // Close Batch Dialog function
    window.closeBatchDialog = function() {
        document.getElementById('batchDialog').style.display = 'none';
    };
    
    // Edit Batch functionality
    const editBatchBtn = document.getElementById('editBatchBtn');
    
    editBatchBtn.addEventListener('click', function() {
        // Open dialog with current data
        const batchName = '<?php echo htmlspecialchars($batchName); ?>';
        document.getElementById('batchDialogTitle').textContent = 'Edit Batch';
        document.getElementById('batchName').value = batchName;
        document.getElementById('batchStart').value = '2024-04-01'; // Get from actual data
        document.getElementById('batchEnd').value = '2025-03-31'; // Get from actual data
        document.getElementById('batchStatus').value = 'Active'; // Get from actual data
        document.getElementById('batchDialog').style.display = 'flex';
    });
    
    // Override saveBatch function for detail page
    const originalSaveBatch = window.saveBatch;
    window.saveBatch = function() {
        const newName = document.getElementById('batchName').value.trim();
        const newStart = document.getElementById('batchStart').value.trim();
        const newEnd = document.getElementById('batchEnd').value.trim();
        const newStatus = document.getElementById('batchStatus').value.trim();
        
        if (!newName || !newStart || !newEnd || !newStatus) {
            alert('Please fill in all fields');
            return;
        }
        
        // Update page title
        document.querySelector('.batch-info h1').textContent = newName;
        
        // Close dialog
        document.getElementById('batchDialog').style.display = 'none';
        
        showActionStatus('Batch updated successfully!', 'success');
    };
    
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
