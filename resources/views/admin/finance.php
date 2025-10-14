<?php
$pageTitle = 'Smart Campus Nova Hub - Finance Management';
$pageIcon = 'fas fa-dollar-sign';
$pageHeading = 'Student Fee & Invoice Management';
$activePage = 'finance';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-dollar-sign"></i>
    </div>
    <div class="page-title-compact">
        <h2>Student Fee & Invoice Management</h2>
    </div>
</div>

<!-- Quick Finance KPIs -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="stat-content">
            <h3>Total Receivable</h3>
            <div class="stat-number" id="totalReceivable">$125,000</div>
            <div class="stat-change positive">January 2025</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Total Students</h3>
            <div class="stat-number" id="totalStudents">250</div>
            <div class="stat-change">Active students</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3>Payments Received</h3>
            <div class="stat-number" id="paidCount">0 / 250</div>
            <div class="stat-change">0% collected</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-flag"></i>
        </div>
        <div class="stat-content">
            <h3>Status</h3>
            <div class="stat-number" id="invoiceStatus">Draft</div>
            <div class="stat-change">Editable</div>
        </div>
    </div>
</div>

<!-- Invoice Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Invoices for January 2025</h3>
        <div style="display: flex; gap: 12px;">
            <button class="simple-btn" onclick="generateInvoices()" id="generateBtn">
                <i class="fas fa-file-invoice"></i> Generate Invoices (This Month)
            </button>
            <button class="simple-btn primary" onclick="clearInvoicesForNextMonth()" id="clearAllBtn" style="display:none;" disabled>
                <i class="fas fa-broom"></i> Clear All for Next Month
            </button>
        </div>
    </div>
    
    <!-- Filters -->
    <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <label style="font-weight: 600; color: #666;">Filters:</label>
            <select class="filter-select" id="gradeFilter" onchange="applyFilters()">
                <option value="all">All Grades</option>
                <option value="7">Grade 7</option>
                <option value="8">Grade 8</option>
                <option value="9">Grade 9</option>
                <option value="10">Grade 10</option>
                <option value="11">Grade 11</option>
                <option value="12">Grade 12</option>
            </select>
            <select class="filter-select" id="classFilter" onchange="applyFilters()">
                <option value="all">All Classes</option>
                <option value="A">Class A</option>
                <option value="B">Class B</option>
                <option value="C">Class C</option>
            </select>
            <select class="filter-select" id="statusFilter" onchange="applyFilters()">
                        <option value="all">All Status</option>
                <option value="draft">Draft</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                    </select>
            <input type="text" class="simple-search" id="searchStudent" placeholder="Search by name or ID..." onkeyup="applyFilters()">
                </div>
            </div>

    <!-- Invoice Table -->
    <div class="simple-table-container" style="margin-top:16px;">
        <table class="basic-table" id="invoiceTable">
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                    <th>Student ID</th>
                            <th>Student Name</th>
                    <th>Grade/Class</th>
                            <th>Amount</th>
                    <th>Payment Type</th>
                            <th>Status</th>
                    <th>Paid By/Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
            <tbody id="invoiceTableBody">
                <tr class="no-data-row">
                    <td colspan="9" style="text-align:center; padding:40px; color:#999;">
                        <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                        No invoices generated yet. Click "Generate Invoices" to create invoices for all students this month.
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    
<!-- Payment History Section -->
        <div class="simple-section">
            <div class="simple-header">
        <h3><i class="fas fa-history"></i> Payment History</h3>
        <select class="filter-select" id="historyMonthFilter" onchange="loadPaymentHistory()">
                        <option value="2025-01">January 2025</option>
            <option value="2024-12" selected>December 2024</option>
                        <option value="2024-11">November 2024</option>
            <option value="2024-10">October 2024</option>
            <option value="2024-09">September 2024</option>
                    </select>
                </div>

    <div class="simple-table-container" style="margin-top:16px;">
                <table class="basic-table">
                    <thead>
                        <tr>
                    <th>Invoice #</th>
                    <th>Student Name</th>
                    <th>Grade/Class</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Payment Date</th>
                    <th>Received By</th>
                        </tr>
                    </thead>
            <tbody id="historyTableBody">
                <tr>
                    <td>INV-2024-12-001</td>
                    <td>Alice Johnson</td>
                    <td>Grade 10-A</td>
                    <td>$500.00</td>
                    <td>Bank Transfer</td>
                    <td>2024-12-15 10:30</td>
                    <td>R001 - Receptionist Sarah</td>
                        </tr>
                        <tr>
                    <td>INV-2024-12-002</td>
                    <td>Michael Brown</td>
                    <td>Grade 12-B</td>
                    <td>$500.00</td>
                    <td>Cash</td>
                    <td>2024-12-15 14:20</td>
                    <td>R002 - Receptionist John</td>
                        </tr>
                        <tr>
                    <td>INV-2024-12-003</td>
                    <td>Emma Davis</td>
                    <td>Grade 8-B</td>
                    <td>$500.00</td>
                    <td>K-Pay</td>
                    <td>2024-12-16 09:15</td>
                    <td>R001 - Receptionist Sarah</td>
                        </tr>
                    </tbody>
                </table>
    </div>
</div>

<!-- Payment Processing Modal -->
<div id="paymentModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 500px;">
        <div class="confirm-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-money-check-alt"></i> Process Payment</h4>
            <button class="icon-btn" onclick="closePaymentModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <p id="paymentStudentInfo" style="margin-bottom: 20px; font-weight: 600;"></p>
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Receptionist ID</label>
                        <input type="text" class="form-input" id="paymentReceptionistId" placeholder="e.g., R001">
                    </div>
                    <div class="form-group">
                        <label>Receptionist Name</label>
                        <input type="text" class="form-input" id="paymentReceptionistName" placeholder="Enter name">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closePaymentModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="confirmPayment()">
                <i class="fas fa-check"></i> Confirm Payment
            </button>
        </div>
    </div>
</div>

<script>
// Sample invoice data
let invoiceData = [];
let currentEditingId = null;
let currentPaymentId = null;

// Load saved data from localStorage on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedInvoices = localStorage.getItem('invoiceData');
    if (savedInvoices) {
        invoiceData = JSON.parse(savedInvoices);
        document.getElementById('generateBtn').style.display = 'none';
        document.getElementById('clearAllBtn').style.display = 'inline-flex';
        document.getElementById('invoiceStatus').textContent = 'Generated';
        renderInvoiceTable();
        updateStats();
    }
});

// Sample students database
const studentsDatabase = [
    {id: 'S001', name: 'Alice Johnson', grade: 10, class: 'A', amount: 500, paymentType: 'Bank Transfer'},
    {id: 'S002', name: 'Michael Brown', grade: 12, class: 'B', amount: 500, paymentType: 'Bank Transfer'},
    {id: 'S003', name: 'Sarah Wilson', grade: 9, class: 'C', amount: 500, paymentType: 'Cash'},
    {id: 'S004', name: 'David Lee', grade: 11, class: 'A', amount: 500, paymentType: 'K-Pay'},
    {id: 'S005', name: 'Emma Davis', grade: 8, class: 'B', amount: 500, paymentType: 'Bank Transfer'},
    {id: 'S006', name: 'James Wilson', grade: 10, class: 'B', amount: 500, paymentType: 'Cash'},
    {id: 'S007', name: 'Olivia Taylor', grade: 9, class: 'A', amount: 500, paymentType: 'K-Pay'},
    {id: 'S008', name: 'Noah Anderson', grade: 12, class: 'C', amount: 500, paymentType: 'Bank Transfer'},
];

function generateInvoices() {
    if (!confirm('Generate invoices for all students for January 2025?\n\nThis will create invoice entries for all active students.')) {
        return;
    }
            invoiceData = [];
            let idCounter = 1;
            
            studentsDatabase.forEach(student => {
                invoiceData.push({
                    id: 'INV-2025-01-' + String(idCounter++).padStart(3, '0'),
                    studentId: student.id,
                    name: student.name,
                    grade: student.grade,
                    class: student.class,
                    amount: student.amount,
                    paymentType: student.paymentType,
                    status: 'draft',
                    paidBy: null,
                    paidTime: null
                });
            });
            
            document.getElementById('generateBtn').style.display = 'none';
            document.getElementById('clearAllBtn').style.display = 'inline-flex';
            document.getElementById('invoiceStatus').textContent = 'Generated';
            
            // Save to localStorage
            localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
            
            renderInvoiceTable();
            updateStats();
            showToast(`${invoiceData.length} invoices generated successfully for January 2025`, 'success');
}

function renderInvoiceTable() {
    const tbody = document.getElementById('invoiceTableBody');
    if (invoiceData.length === 0) {
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="9" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No invoices generated yet. Click "Generate Invoices" to create invoices for all students this month.
            </td>
        </tr>`;
            return;
        }

    let filteredData = applyDataFilters();
    
    tbody.innerHTML = filteredData.map(invoice => `
        <tr>
            <td><strong><a href="/admin/invoice-details?id=${invoice.id}" class="invoice-link">${invoice.id}</a></strong></td>
            <td>${invoice.studentId}</td>
            <td>${invoice.name}</td>
            <td>Grade ${invoice.grade}-${invoice.class}</td>
            <td><strong>$${invoice.amount.toFixed(2)}</strong></td>
            <td>${invoice.paymentType}</td>
            <td><span class="status-badge ${invoice.status}">${invoice.status === 'draft' ? 'Draft' : invoice.status === 'paid' ? 'Paid' : 'Pending'}</span></td>
            <td>${invoice.paidBy ? `${invoice.paidBy}<br><small style="color:#999;">${invoice.paidTime}</small>` : '-'}</td>
            <td>
                ${invoice.status === 'draft' ? `
                    <button class="simple-btn-icon" onclick="viewInvoiceDetails('${invoice.id}')" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="editInvoiceDetails('${invoice.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="processPayment('${invoice.id}')" title="Process Payment">
                        <i class="fas fa-money-check-alt"></i>
                    </button>
                ` : `
                    <button class="simple-btn-icon" onclick="viewInvoiceDetails('${invoice.id}')" title="View Invoice">
                        <i class="fas fa-file-invoice"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="viewPaymentReceipt('${invoice.id}')" title="View Payment Receipt">
                        <i class="fas fa-receipt"></i>
                    </button>
                `}
            </td>
        </tr>
    `).join('');
}

function applyDataFilters() {
    const gradeFilter = document.getElementById('gradeFilter').value;
    const classFilter = document.getElementById('classFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchStudent').value.toLowerCase();
    
    return invoiceData.filter(invoice => {
        if (gradeFilter !== 'all' && invoice.grade != gradeFilter) return false;
        if (classFilter !== 'all' && invoice.class !== classFilter) return false;
        if (statusFilter !== 'all' && invoice.status !== statusFilter) return false;
        if (searchTerm && !invoice.name.toLowerCase().includes(searchTerm) && !invoice.studentId.toLowerCase().includes(searchTerm)) return false;
        return true;
    });
}

function applyFilters() {
    renderInvoiceTable();
}

function viewInvoiceDetails(invoiceId) {
    window.location.href = `/admin/invoice-details?id=${invoiceId}`;
}

function editInvoiceDetails(invoiceId) {
    window.location.href = `/admin/invoice-edit?id=${invoiceId}`;
}

function viewPaymentReceipt(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    // Create custom receipt dialog
    const receiptDialog = document.createElement('div');
    receiptDialog.className = 'receipt-dialog-overlay';
    receiptDialog.style.display = 'flex';
    
    receiptDialog.innerHTML = `
        <div class="receipt-dialog-content">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-receipt"></i> Payment Receipt</h3>
                <button class="receipt-close" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="receipt-dialog-body">
                <div class="receipt-info">
                    <div class="receipt-row">
                        <span class="receipt-label">Invoice Number:</span>
                        <span class="receipt-value">${invoice.id}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Student Name:</span>
                        <span class="receipt-value">${invoice.name}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Amount:</span>
                        <span class="receipt-value">$${invoice.amount.toFixed(2)}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Type:</span>
                        <span class="receipt-value">${invoice.paymentType}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Processed By:</span>
                        <span class="receipt-value">${invoice.paidBy}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Time:</span>
                        <span class="receipt-value">${invoice.paidTime}</span>
                    </div>
                </div>
            </div>
            <div class="receipt-dialog-actions">
                <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i> Close
                </button>
                <button class="simple-btn primary" onclick="printReceipt('${invoiceId}')">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(receiptDialog);
    
    // Close on overlay click
    receiptDialog.addEventListener('click', function(e) {
        if (e.target === receiptDialog) {
            receiptDialog.remove();
        }
    });
}

function printReceipt(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Payment Receipt - ${invoice.id}</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .receipt-header { text-align: center; margin-bottom: 30px; }
                .receipt-details { margin: 20px 0; }
                .receipt-row { display: flex; justify-content: space-between; margin: 10px 0; padding: 5px 0; border-bottom: 1px solid #eee; }
                .receipt-label { font-weight: bold; }
                .receipt-value { color: #333; }
            </style>
        </head>
        <body>
            <div class="receipt-header">
                <h2>Payment Receipt</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            <div class="receipt-details">
                <div class="receipt-row">
                    <span class="receipt-label">Invoice Number:</span>
                    <span class="receipt-value">${invoice.id}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Student Name:</span>
                    <span class="receipt-value">${invoice.name}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Amount:</span>
                    <span class="receipt-value">$${invoice.amount.toFixed(2)}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Type:</span>
                    <span class="receipt-value">${invoice.paymentType}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Processed By:</span>
                    <span class="receipt-value">${invoice.paidBy}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Time:</span>
                    <span class="receipt-value">${invoice.paidTime}</span>
                </div>
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

function processPayment(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice || invoice.status !== 'draft') {
        showToast('Can only process payment for draft invoices', 'warning');
        return;
    }
    
    currentPaymentId = invoiceId;
    document.getElementById('paymentStudentInfo').textContent = 
        `Processing payment for: ${invoice.name} (${invoice.studentId}) - $${invoice.amount.toFixed(2)}`;
    document.getElementById('paymentReceptionistId').value = '';
    document.getElementById('paymentReceptionistName').value = '';
    document.getElementById('paymentModal').style.display = 'flex';
}

function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
    currentPaymentId = null;
}

function confirmPayment() {
    const receptionistId = document.getElementById('paymentReceptionistId').value.trim();
    const receptionistName = document.getElementById('paymentReceptionistName').value.trim();
    
    if (!receptionistId || !receptionistName) {
        showToast('Please enter both Receptionist ID and Name', 'warning');
        return;
    }
    
    const invoice = invoiceData.find(inv => inv.id === currentPaymentId);
    if (!invoice) return;
    
    invoice.status = 'paid';
    invoice.paidBy = `${receptionistId} - ${receptionistName}`;
    invoice.paidTime = new Date().toLocaleString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit',
        hour12: false 
    });
    
    // Save to localStorage
    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    
    closePaymentModal();
    renderInvoiceTable();
    updateStats();
    showToast(`Payment for Invoice ${invoice.id} (${invoice.name}) recorded successfully`, 'success');
}

function clearInvoicesForNextMonth() {
    const paid = invoiceData.filter(inv => inv.status === 'paid').length;
    if (paid !== invoiceData.length) {
        showToast(`Cannot clear invoices. ${invoiceData.length - paid} payments are still pending.`, 'warning');
        return;
    }
    
    showConfirmDialog({
        title: 'Clear All Invoices',
        message: 'All payments have been received. This will archive all records and prepare for next month. Continue?',
        confirmText: 'Clear All',
        confirmIcon: 'fas fa-broom',
        onConfirm: () => {
            const clearedCount = invoiceData.length;
            invoiceData = [];
            // Clear from localStorage
            localStorage.removeItem('invoiceData');
            
            document.getElementById('generateBtn').style.display = 'inline-flex';
            document.getElementById('clearAllBtn').style.display = 'none';
            renderInvoiceTable();
            updateStats();
            showToast(`${clearedCount} invoices cleared successfully for next month`, 'success');
        }
    });
}

function updateStats() {
    const total = invoiceData.reduce((sum, inv) => sum + inv.amount, 0);
    const paid = invoiceData.filter(inv => inv.status === 'paid').length;
    
    document.getElementById('totalReceivable').textContent = '$' + total.toFixed(2);
    document.getElementById('totalStudents').textContent = invoiceData.length;
    document.getElementById('paidCount').textContent = `${paid} / ${invoiceData.length}`;
    
    const percentage = invoiceData.length > 0 ? Math.round((paid / invoiceData.length) * 100) : 0;
    document.querySelector('#paidCount').nextElementSibling.textContent = `${percentage}% collected`;
    
    // Enable/disable clear button based on completion
    const clearBtn = document.getElementById('clearAllBtn');
    if (invoiceData.length > 0 && paid === invoiceData.length) {
        clearBtn.disabled = false;
        clearBtn.title = 'All payments received - Ready to clear';
    } else {
        clearBtn.disabled = true;
        clearBtn.title = `Cannot clear - ${invoiceData.length - paid} payments pending`;
    }
}

function loadPaymentHistory() {
    const month = document.getElementById('historyMonthFilter').value;
    // In real implementation, load from database based on selected month
    console.log('Loading payment history for:', month);
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
