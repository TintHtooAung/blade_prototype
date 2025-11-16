<?php
$pageTitle = 'Smart Campus Nova Hub - Fee Structure Setup';
$pageIcon = 'fas fa-cog';
$pageHeading = 'Fee Structure Setup';
$activePage = 'finance';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-cog"></i>
    </div>
    <div class="page-title-compact">
        <h2>Fee Structure Setup</h2>
        <p style="font-size: 14px; color: #666; margin: 4px 0 0 0;">Configure academic fees, payment structures, and academic calendar</p>
    </div>
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn secondary" onclick="window.location.href='/admin/student-fee-management'">
            <i class="fas fa-arrow-left"></i> Back to Fee Management
        </button>
    </div>
</div>

<!-- School Fees Section -->
<div class="simple-section" id="schoolFeesSection">
    <div class="simple-header">
        <div>
            <h3><i class="fas fa-graduation-cap"></i> School Fees (Monthly Recurring)</h3>
            <p style="margin: 4px 0 0 0; font-size: 14px; color: #666;">
                Manage monthly tuition fees for each grade level
            </p>
        </div>
        <div style="display: flex; gap: 12px;">
            <button class="simple-btn" id="addSchoolFeeBtn"><i class="fas fa-plus"></i> Add School Fee</button>
        </div>
    </div>
    
    <!-- School Fees Table -->
    <div class="detail-table-container" style="margin-top: 16px;">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Monthly Fee</th>
                    <th>Period</th>
                    <th>Collection %</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="schoolFeesTableBody">
                <tr>
                    <td><strong>Grade 7</strong></td>
                    <td>$150.00</td>
                    <td>June - May</td>
                    <td><span class="collection-status">88%</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon edit-btn" onclick="editFee('FEE001')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE001', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Grade 8</strong></td>
                    <td>$175.00</td>
                    <td>June - May</td>
                    <td><span class="collection-status">92%</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon edit-btn" onclick="editFee('FEE002')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE002', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Grade 9</strong></td>
                    <td>$200.00</td>
                    <td>June - May</td>
                    <td><span class="collection-status">85%</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon edit-btn" onclick="editFee('FEE003')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE003', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Grade 10</strong></td>
                    <td>$225.00</td>
                    <td>June - May</td>
                    <td><span class="collection-status">79%</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon edit-btn" onclick="editFee('FEE004')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE004', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- School Fee Dialog -->
<div id="schoolFeeDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-dollar-sign"></i> <span id="schoolFeeDialogTitle">Add School Fee</span></h3>
            <button class="receipt-close" onclick="closeSchoolFeeDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="schoolFeeForm">
                <input type="hidden" id="schoolFeeId">

                <div class="form-row">
                <div class="form-group">
                        <label>Grade</label>
                        <select class="form-select" id="schoolFeeGrade">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                </div>
                <div class="form-group">
                        <label>Start Month</label>
                        <select class="form-select" id="schoolFeeStartMonth">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group">
                        <label>End Month</label>
                        <select class="form-select" id="schoolFeeEndMonth">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="form-group">
                        <label>Monthly Fee (USD)</label>
                        <input type="number" class="form-input" id="schoolFeeAmount" placeholder="100.00" step="0.01" min="0">
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeSchoolFeeDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveSchoolFee()">
                <i class="fas fa-save"></i> Save Fee
            </button>
        </div>
    </div>
</div>


<!-- Include Shared Styles -->
<link rel="stylesheet" href="/css/shared/fee-management.css">

<style>
/* Enhanced action buttons styling */
.actions-cell {
    white-space: nowrap;
}

.simple-btn-icon {
    padding: 6px 8px;
    margin: 0 2px;
    border-radius: 4px;
    border: 1px solid #e2e8f0;
    background: #fff;
    color: #64748b;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 12px;
}

.simple-btn-icon:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
    color: #475569;
}

.simple-btn-icon.edit-btn:hover {
    background: #eff6ff;
    border-color: #3b82f6;
    color: #1d4ed8;
}

.simple-btn-icon.delete-btn:hover {
    background: #fef2f2;
    border-color: #ef4444;
    color: #dc2626;
}

.simple-btn-icon i {
    font-size: 11px;
}

/* Dialog styling improvements */
.receipt-dialog-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.receipt-dialog-content {
    background: white;
    border-radius: 8px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    max-width: 90vw;
    max-height: 90vh;
    overflow-y: auto;
}

.receipt-dialog-header {
    padding: 20px 24px;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.receipt-dialog-header h3 {
    margin: 0;
    color: #1e293b;
    font-size: 18px;
    font-weight: 600;
}

.receipt-close {
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    color: #64748b;
    padding: 4px;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.receipt-close:hover {
    background: #f1f5f9;
    color: #475569;
}

.receipt-dialog-body {
    padding: 24px;
}

.receipt-dialog-actions {
    padding: 16px 24px;
    border-top: 1px solid #e2e8f0;
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

/* Form styling improvements */
.form-row {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
}

.form-row .form-group {
    flex: 1;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    color: #374151;
    font-size: 14px;
}

.form-select,
.form-input {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.2s ease;
    box-sizing: border-box;
}

.form-select:focus,
.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Additional fees styling */
.badge-type.onetime {
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.badge-type.special {
    background: #f3e5f5;
    color: #7b1fa2;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.collection-status {
    font-weight: 600;
    color: #059669;
    background: #d1fae5;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
}

/* Responsive design for smaller screens */
@media screen and (max-width: 768px) {
    .form-row {
        flex-direction: column;
        gap: 12px;
    }

    .receipt-dialog-content {
        max-width: 95vw;
        margin: 10px;
    }

    .receipt-dialog-header {
        padding: 16px 20px;
    }

    .receipt-dialog-body {
        padding: 20px;
    }

    .receipt-dialog-actions {
        padding: 12px 20px;
        flex-direction: column-reverse;
        gap: 8px;
    }

    .simple-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
// Global variables
let editingFeeId = null;

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    initializeEventListeners();
    // Don't load from localStorage - use static data
});

// Initialize event listeners
function initializeEventListeners() {
    const addBtn = document.getElementById('addSchoolFeeBtn');
    if (addBtn) {
        addBtn.addEventListener('click', openSchoolFeeDialog);
    }
}

// School Fee Dialog Functions
function openSchoolFeeDialog() {
    const dialog = document.getElementById('schoolFeeDialog');
    if (dialog) {
        dialog.style.display = 'flex';
        if (!editingFeeId) {
            clearSchoolFeeForm();
            document.getElementById('schoolFeeDialogTitle').textContent = 'Add School Fee';
        }
    }
}

function closeSchoolFeeDialog() {
    const dialog = document.getElementById('schoolFeeDialog');
    if (dialog) {
        dialog.style.display = 'none';
        editingFeeId = null;
        clearSchoolFeeForm();
    }
}

function clearSchoolFeeForm() {
    document.getElementById('schoolFeeGrade').value = 'Grade 7';
    document.getElementById('schoolFeeStartMonth').value = '6';
    document.getElementById('schoolFeeEndMonth').value = '5';
    document.getElementById('schoolFeeAmount').value = '';
}

// Save school fee
function saveSchoolFee() {
    const grade = document.getElementById('schoolFeeGrade').value;
    const startMonth = document.getElementById('schoolFeeStartMonth').value;
    const endMonth = document.getElementById('schoolFeeEndMonth').value;
    const amount = document.getElementById('schoolFeeAmount').value;

    if (!grade || !startMonth || !endMonth || !amount) {
        showToast('Please fill all required fields', 'warning');
        return;
    }

    const feeData = {
        id: editingFeeId || 'FEE' + Date.now(),
        grade,
        startMonth: parseInt(startMonth),
        endMonth: parseInt(endMonth),
        amount: parseFloat(amount)
    };

    // Save to localStorage
    let fees = JSON.parse(localStorage.getItem('schoolFees') || '[]');

    if (editingFeeId) {
        const index = fees.findIndex(f => f.id === editingFeeId);
        if (index > -1) {
            fees[index] = feeData;
        }
    } else {
        fees.push(feeData);
    }

    localStorage.setItem('schoolFees', JSON.stringify(fees));

    showToast(editingFeeId ?
        `School fee for ${feeData.grade} updated successfully` :
        `School fee for ${feeData.grade} created successfully`,
        'success');

    closeSchoolFeeDialog();
    // Add new fee to table
    addFeeToTable(feeData);
}

// Load school fees - now using static data
function loadSchoolFees() {
    // Static data is already in HTML, no need to load from localStorage
    console.log('School fees table loaded with static data');
}

// Add new fee to table
function addFeeToTable(feeData) {
    const tbody = document.getElementById('schoolFeesTableBody');
    const startMonthName = getMonthName(feeData.startMonth);
    const endMonthName = getMonthName(feeData.endMonth);
    const randomCollection = Math.floor(Math.random() * 30) + 70; // Random between 70-99%

    const row = document.createElement('tr');
    row.innerHTML = `
        <td><strong>${feeData.grade}</strong></td>
        <td>$${feeData.amount.toFixed(2)}</td>
        <td>${startMonthName} - ${endMonthName}</td>
        <td><span class="collection-status">${randomCollection}%</span></td>
        <td class="actions-cell">
            <button class="simple-btn-icon edit-btn" onclick="editFee('${feeData.id}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="simple-btn-icon delete-btn" onclick="deleteFee('${feeData.id}', this)" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    tbody.appendChild(row);
}

// Edit fee
function editFee(feeId) {
    // For static data, just open dialog with default values
    editingFeeId = feeId;
    document.getElementById('schoolFeeDialogTitle').textContent = 'Edit School Fee';
    clearSchoolFeeForm();
    openSchoolFeeDialog();
    showToast(`Edit fee ${feeId} - Feature coming soon`, 'info');
}

// Delete fee
function deleteFee(feeId, btn) {
    showConfirmDialog({
        title: 'Delete School Fee',
        message: 'Are you sure you want to delete this school fee? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            btn.closest('tr').remove();
            showToast(`School fee deleted successfully`, 'success');
        }
    });
}

// Utility functions
function getMonthName(monthNum) {
    const months = ['January', 'February', 'March', 'April', 'May', 'June',
                   'July', 'August', 'September', 'October', 'November', 'December'];
    return months[monthNum - 1];
}

</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>