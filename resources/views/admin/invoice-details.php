<?php
$pageTitle = 'Smart Campus Nova Hub - Invoice Details';
$pageIcon = 'fas fa-file-invoice';
$pageHeading = 'Invoice Details';
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

<!-- Invoice Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="invoiceTitle">Invoice for Alice Johnson</h3>
                <span class="exam-id" id="invoiceNumber">INV-001</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="invoiceStatus">Paid</span>
                <span class="badge grade-badge" id="invoiceGrade">Grade 10A</span>
            </div>
        </div>
    </div>

    <!-- Invoice Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Invoice Information</h4>
            <button class="simple-btn" onclick="editInvoice()"><i class="fas fa-edit"></i> Edit Invoice</button>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Invoice Number:</label>
                <span id="detailInvoiceNumber">INV-001</span>
            </div>
            <div class="detail-row">
                <label>Student Name:</label>
                <span id="detailStudentName">Alice Johnson</span>
            </div>
            <div class="detail-row">
                <label>Grade/Class:</label>
                <span id="detailGradeClass">Grade 10A</span>
            </div>
            <div class="detail-row">
                <label>Issue Date:</label>
                <span id="detailIssueDate">2024-12-15</span>
            </div>
            <div class="detail-row">
                <label>Due Date:</label>
                <span id="detailDueDate">2025-01-15</span>
            </div>
            <div class="detail-row">
                <label>Status:</label>
                <span id="detailStatus">Paid</span>
            </div>
        </div>
    </div>

    <!-- Invoice Items -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-list"></i> Invoice Items</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="itemsTableBody">
                        <tr>
                            <td>Tuition Fee - Semester 1</td>
                            <td>1</td>
                            <td>$2,000.00</td>
                            <td>$2,000.00</td>
                        </tr>
                        <tr>
                            <td>Books & Materials</td>
                            <td>1</td>
                            <td>$500.00</td>
                            <td>$500.00</td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="3"><strong>Total Amount</strong></td>
                            <td id="totalAmount"><strong>$2,500.00</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Payment Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-credit-card"></i> Payment Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Payment Status:</label>
                <span id="paymentStatus">Fully Paid</span>
            </div>
            <div class="detail-row">
                <label>Payment Date:</label>
                <span id="paymentDate">2024-12-20</span>
            </div>
            <div class="detail-row">
                <label>Payment Method:</label>
                <span id="paymentMethod">Bank Transfer</span>
            </div>
            <div class="detail-row">
                <label>Transaction ID:</label>
                <span id="transactionId">TXN-20241220-001</span>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="deleteInvoice()">
                <i class="fas fa-trash"></i> Delete Invoice
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="window.print()">
                    <i class="fas fa-print"></i> Print Invoice
                </button>
                <button class="simple-btn primary" onclick="editInvoice()">
                    <i class="fas fa-edit"></i> Edit Invoice
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.total-row {
    background: #f8f9fa;
    font-weight: 600;
}

.total-row td {
    padding: 12px !important;
}
</style>

<script>
// Get invoice ID from URL
const urlParams = new URLSearchParams(window.location.search);
const invoiceId = urlParams.get('id');

// Sample invoice data
const sampleInvoices = {
    'INV-001': {
        id: 'INV-001',
        studentName: 'Alice Johnson',
        grade: 'Grade 10A',
        amount: '$2,500.00',
        issueDate: '2024-12-15',
        dueDate: '2025-01-15',
        status: 'Paid'
    },
    'INV-002': {
        id: 'INV-002',
        studentName: 'Michael Brown',
        grade: 'Grade 12B',
        amount: '$2,750.00',
        issueDate: '2024-12-15',
        dueDate: '2025-01-15',
        status: 'Pending'
    },
    'INV-003': {
        id: 'INV-003',
        studentName: 'Sarah Wilson',
        grade: 'Grade 9C',
        amount: '$2,300.00',
        issueDate: '2024-12-20',
        dueDate: '2025-01-20',
        status: 'Overdue'
    },
    'INV-004': {
        id: 'INV-004',
        studentName: 'David Lee',
        grade: 'Grade 11A',
        amount: '$2,600.00',
        issueDate: '2024-12-25',
        dueDate: '2025-01-25',
        status: 'Draft'
    },
    'INV-005': {
        id: 'INV-005',
        studentName: 'Emma Davis',
        grade: 'Grade 8B',
        amount: '$2,200.00',
        issueDate: '2024-12-28',
        dueDate: '2025-01-28',
        status: 'Paid'
    }
};

function loadInvoiceDetails() {
    if (!invoiceId) {
        alert('Invoice ID not found');
        window.location.href = '/admin/finance';
        return;
    }

    const invoice = sampleInvoices[invoiceId];
    
    if (!invoice) {
        console.log('Invoice not found, using default data');
        return;
    }

    // Update page content
    document.getElementById('invoiceTitle').textContent = `Invoice for ${invoice.studentName}`;
    document.getElementById('invoiceNumber').textContent = invoice.id;
    document.getElementById('invoiceStatus').textContent = invoice.status;
    document.getElementById('invoiceGrade').textContent = invoice.grade;
    
    document.getElementById('detailInvoiceNumber').textContent = invoice.id;
    document.getElementById('detailStudentName').textContent = invoice.studentName;
    document.getElementById('detailGradeClass').textContent = invoice.grade;
    document.getElementById('detailIssueDate').textContent = invoice.issueDate;
    document.getElementById('detailDueDate').textContent = invoice.dueDate;
    document.getElementById('detailStatus').textContent = invoice.status;
    document.getElementById('totalAmount').innerHTML = `<strong>${invoice.amount}</strong>`;
    
    // Update status badge color
    const statusBadge = document.getElementById('invoiceStatus');
    statusBadge.className = 'badge';
    if (invoice.status === 'Paid') statusBadge.className += ' tutorial-badge';
    if (invoice.status === 'Pending') statusBadge.className += ' active-badge';
    if (invoice.status === 'Overdue') statusBadge.className += ' grade-badge';
    if (invoice.status === 'Draft') statusBadge.className += ' class-badge';
}

function editInvoice() {
    window.location.href = `/admin/invoice-edit?id=${invoiceId}`;
}

function deleteInvoice() {
    showConfirmDialog({
        title: 'Delete Invoice',
        message: 'Are you sure you want to delete this invoice? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Invoice deleted successfully!');
            window.location.href = '/admin/finance';
        }
    });
}

// Load invoice details on page load
document.addEventListener('DOMContentLoaded', loadInvoiceDetails);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

