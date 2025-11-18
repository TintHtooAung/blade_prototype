<?php
$pageTitle = 'Smart Campus Nova Hub - Batch Management';
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Batch Management';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

ob_start();
?>
<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/academic-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Academic Management
    </a>
</div>

<!-- Batch Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Active Batches',
        'value' => '1',
        'icon' => 'fas fa-play-circle',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Completed Batches',
        'value' => '1',
        'icon' => 'fas fa-check-circle',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '870',
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Batch Management Table -->
<div class="detail-management-section">
    <div class="section-header">
        <h3 class="section-title">All Batches</h3>
        <button class="add-btn" onclick="openModal('batchModal')">
            <i class="fas fa-plus"></i>
            Add New Batch
        </button>
    </div>
    
    <!-- Add Batch Modal -->
    <div id="batchModal" class="simple-modal-overlay" style="display:none;">
        <div class="simple-modal-content">
            <div class="simple-modal-header">
                <h3><i class="fas fa-folder-plus"></i> Create Batch</h3>
                <button class="simple-modal-close" onclick="closeModal('batchModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="simple-modal-body">
                <div class="form-group">
                    <label for="batchName">Batch Name</label>
                    <input type="text" id="batchName" class="form-input" placeholder="e.g., 2025-2026">
                </div>
                <div class="form-group">
                    <label for="batchStart">Start Date</label>
                    <input type="date" id="batchStart" class="form-input">
                </div>
                <div class="form-group">
                    <label for="batchEnd">End Date</label>
                    <input type="date" id="batchEnd" class="form-input">
                </div>
                <div class="form-group">
                    <label for="batchStatus">Status</label>
                    <select id="batchStatus" class="form-select">
                        <option value="Active">Active</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>
            <div class="simple-modal-actions">
                <button id="cancelBatch" class="simple-btn secondary" onclick="closeModal('batchModal')">Cancel</button>
                <button id="saveBatch" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Batch Name</th>
                    <th>Academic Year</th>
                    <th>Status</th>
                    <th>Total Students</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="batch-name">
                        <strong>2024-2025</strong>
                    </td>
                    <td>2024-25</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td class="student-count">450</td>
                    <td class="date-cell">2024-04-01</td>
                    <td class="date-cell">2025-03-31</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Batch">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Batch">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="batch-name">
                        <strong>2023-2024</strong>
                    </td>
                    <td>2023-24</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td class="student-count">420</td>
                    <td class="date-cell">2023-04-01</td>
                    <td class="date-cell">2024-03-31</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-icon edit" title="Edit Batch">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" title="Delete Batch">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
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
// Modal functions - ensure they're globally available
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Make functions globally available
window.openModal = openModal;
window.closeModal = closeModal;

// Close modal when clicking overlay
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.simple-modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                overlay.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    });
    
    // Save batch handler
    const saveBtn = document.getElementById('saveBatch');
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            const name = (document.getElementById('batchName').value || '').trim();
            if (!name) {
                alert('Enter batch name');
                return;
            }
            // Add your save logic here
            closeModal('batchModal');
            alert('Batch saved successfully!');
        });
    }
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
