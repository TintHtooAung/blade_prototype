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

<!-- Edit Batch Modal -->
<div id="editBatchModal" class="simple-modal-overlay" style="display:none;">
    <div class="simple-modal-content" style="max-width: 600px; width: 100%;">
        <div class="simple-modal-header">
            <h3><i class="fas fa-edit"></i> Edit Batch</h3>
            <button class="simple-modal-close" onclick="closeEditBatchModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-modal-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label for="modalBatchName">Batch Name</label>
                        <input type="text" id="modalBatchName" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalBatchStart">Start Date</label>
                        <input type="date" id="modalBatchStart" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalBatchEnd">End Date</label>
                        <input type="date" id="modalBatchEnd" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalBatchStatus">Status</label>
                        <select id="modalBatchStatus" class="form-select">
                            <option value="Active">Active</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="simple-modal-actions">
            <button id="cancelEditBatchModal" class="simple-btn secondary" onclick="closeEditBatchModal()">Cancel</button>
            <button id="saveEditBatchModal" class="simple-btn primary"><i class="fas fa-check"></i> Update Batch</button>
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
                    <td><span id="batchStartValue">2024-04-01</span></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">End Date</td>
                    <td><span id="batchEndValue">2025-03-31</span></td>
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
const batchData = <?php echo json_encode([
    'name' => $batchName,
    'start' => '2024-04-01',
    'end' => '2025-03-31',
    'status' => 'Active'
]); ?>;

document.addEventListener('DOMContentLoaded', function(){
    const editBatchBtn = document.getElementById('editBatchBtn');
    const editBatchModal = document.getElementById('editBatchModal');
    const modalBatchName = document.getElementById('modalBatchName');
    const modalBatchStart = document.getElementById('modalBatchStart');
    const modalBatchEnd = document.getElementById('modalBatchEnd');
    const modalBatchStatus = document.getElementById('modalBatchStatus');
    const saveEditBatchBtn = document.getElementById('saveEditBatchModal');
    
    function fillBatchModal() {
        modalBatchName.value = batchData.name;
        modalBatchStart.value = batchData.start;
        modalBatchEnd.value = batchData.end;
        modalBatchStatus.value = batchData.status;
    }
    
    function openEditBatchModal() {
        fillBatchModal();
        editBatchModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    window.closeEditBatchModal = function() {
        editBatchModal.style.display = 'none';
        document.body.style.overflow = '';
    };
    
    editBatchModal.addEventListener('click', function(e) {
        if (e.target === editBatchModal) {
            closeEditBatchModal();
        }
    });
    
    editBatchBtn.addEventListener('click', openEditBatchModal);
    
    saveEditBatchBtn.addEventListener('click', function() {
        const newName = modalBatchName.value.trim();
        const newStart = modalBatchStart.value.trim();
        const newEnd = modalBatchEnd.value.trim();
        const newStatus = modalBatchStatus.value.trim();
        
        if (!newName || !newStart || !newEnd || !newStatus) {
            alert('Please fill in all fields');
            return;
        }
        
        batchData.name = newName;
        batchData.start = newStart;
        batchData.end = newEnd;
        batchData.status = newStatus;
        
        document.querySelector('.batch-info h1').textContent = batchData.name;
        const statusBadge = document.querySelector('.batch-meta .status-badge');
        if (statusBadge) {
            statusBadge.textContent = batchData.status;
            statusBadge.className = `status-badge ${batchData.status.toLowerCase() === 'active' ? 'active' : 'completed'}`;
        }
        const statCardTitle = document.querySelector('.detail-stats-grid .stat-card:first-child .stat-number');
        if (statCardTitle) statCardTitle.textContent = batchData.name;
        const startValue = document.getElementById('batchStartValue');
        const endValue = document.getElementById('batchEndValue');
        if (startValue) startValue.textContent = batchData.start;
        if (endValue) endValue.textContent = batchData.end;
        
        closeEditBatchModal();
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

<style>
/* Simple Modal Styles */
.simple-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 0.2s ease;
}

.simple-modal-content {
    background: #ffffff;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    max-height: 90vh;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    animation: slideUp 0.3s ease;
    overflow: hidden;
}

.simple-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid #e0e7ff;
}

.simple-modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1d1d1f;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.simple-modal-header h3 i {
    color: #4A90E2;
}

.simple-modal-close {
    background: none;
    border: none;
    font-size: 1.25rem;
    color: #86868b;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.simple-modal-close:hover {
    background: #f8fafc;
    color: #1d1d1f;
}

.simple-modal-body {
    padding: 1.5rem;
    overflow-y: auto;
    flex: 1;
}

.simple-modal-body .form-group {
    margin-bottom: 1.25rem;
}

.simple-modal-body .form-group:last-child {
    margin-bottom: 0;
}

.simple-modal-body .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #1d1d1f;
    font-size: 0.9rem;
}

.simple-modal-body .form-group .form-input,
.simple-modal-body .form-group .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1d1d1f;
    transition: all 0.2s ease;
}

.simple-modal-body .form-group .form-input:focus,
.simple-modal-body .form-group .form-select:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.simple-modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    padding: 1.5rem;
    border-top: 1px solid #e0e7ff;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>
