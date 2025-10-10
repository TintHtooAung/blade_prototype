<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Invoice';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Invoice';
$activePage = 'finance';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/finance" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Finance Management
    </a>
</div>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Edit Invoice Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="invoiceTitleDisplay">Edit Invoice</h3>
                <span class="exam-id" id="invoiceIdDisplay">INV-001</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="invoiceStatusBadge">Paid</span>
            </div>
        </div>
    </div>

    <!-- Invoice Information (Editable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Invoice Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Invoice Number</label>
                        <input type="text" class="form-input" id="invoiceId" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Student Name</label>
                        <input type="text" class="form-input" id="studentName" placeholder="Enter student name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Grade/Class</label>
                        <input type="text" class="form-input" id="gradeClass" placeholder="e.g., Grade 10A">
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" class="form-input" id="issueDate">
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" class="form-input" id="dueDate">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="invoiceStatus">
                            <option value="Draft">Draft</option>
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Overdue">Overdue</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Total Amount</label>
                        <input type="text" class="form-input" id="totalAmount" placeholder="$0.00">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="cancelEdit()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="deleteInvoice()">
                    <i class="fas fa-trash"></i> Delete
                </button>
                <button class="simple-btn primary" onclick="saveInvoice()">
                    <i class="fas fa-check"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const urlParams = new URLSearchParams(window.location.search);
const invoiceId = urlParams.get('id');

const sampleInvoices = {
    'INV-001': { id: 'INV-001', studentName: 'Alice Johnson', grade: 'Grade 10A', amount: '$2,500.00', issueDate: '2024-12-15', dueDate: '2025-01-15', status: 'Paid' },
    'INV-002': { id: 'INV-002', studentName: 'Michael Brown', grade: 'Grade 12B', amount: '$2,750.00', issueDate: '2024-12-15', dueDate: '2025-01-15', status: 'Pending' },
    'INV-003': { id: 'INV-003', studentName: 'Sarah Wilson', grade: 'Grade 9C', amount: '$2,300.00', issueDate: '2024-12-20', dueDate: '2025-01-20', status: 'Overdue' }
};

function loadInvoiceData() {
    if (!invoiceId) {
        alert('Invoice ID not found');
        window.location.href = '/admin/finance';
        return;
    }

    const invoice = sampleInvoices[invoiceId];
    if (!invoice) return;

    document.getElementById('invoiceIdDisplay').textContent = invoice.id;
    document.getElementById('invoiceId').value = invoice.id;
    document.getElementById('studentName').value = invoice.studentName;
    document.getElementById('gradeClass').value = invoice.grade;
    document.getElementById('issueDate').value = invoice.issueDate;
    document.getElementById('dueDate').value = invoice.dueDate;
    document.getElementById('invoiceStatus').value = invoice.status;
    document.getElementById('totalAmount').value = invoice.amount;
    document.getElementById('invoiceStatusBadge').textContent = invoice.status;
    document.getElementById('invoiceTitleDisplay').textContent = `Edit: ${invoice.studentName}`;
}

function saveInvoice() {
    alert('Invoice updated successfully!');
    window.location.href = '/admin/finance';
}

function deleteInvoice() {
    showConfirmDialog({
        title: 'Delete Invoice',
        message: 'Are you sure you want to delete this invoice?',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Invoice deleted successfully!');
            window.location.href = '/admin/finance';
        }
    });
}

function cancelEdit() {
    showConfirmDialog({
        title: 'Discard Changes',
        message: 'Are you sure you want to discard your changes?',
        confirmText: 'Discard',
        confirmIcon: 'fas fa-times',
        onConfirm: () => {
            window.location.href = '/admin/finance';
        }
    });
}

document.addEventListener('DOMContentLoaded', loadInvoiceData);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

