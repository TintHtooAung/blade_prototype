<?php
$pageTitle = 'Smart Campus Nova Hub - Payment History';
$pageIcon = 'fas fa-history';
$pageHeading = 'Payment History';
$activePage = 'finance';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-history"></i>
    </div>
    <div class="page-title-compact">
        <h2>Payment History</h2>
        <p style="font-size: 14px; color: #666; margin: 4px 0 0 0;">Browse historical invoices and payments by month</p>
    </div>
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn secondary" onclick="window.location.href='/admin/student-fee-management'">
            <i class="fas fa-arrow-left"></i> Back to Fee Management
        </button>
    </div>
</div>

<!-- Month Summary Stats -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-content">
            <h3>Selected Month</h3>
            <div class="stat-number" id="selectedMonthDisplay">January 2025</div>
            <div class="stat-change">Current selection</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-file-invoice"></i>
        </div>
        <div class="stat-content">
            <h3>Total Invoices</h3>
            <div class="stat-number" id="monthTotalInvoices">0</div>
            <div class="stat-change">Generated</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3>Payments Collected</h3>
            <div class="stat-number" id="monthPaidCount">0</div>
            <div class="stat-change">Completed</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="stat-content">
            <h3>Total Amount</h3>
            <div class="stat-number" id="monthTotalAmount">$0.00</div>
            <div class="stat-change">Collected</div>
        </div>
    </div>
</div>

<!-- Month Selector and Filters -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Browse Payment History</h3>
        <div style="display: flex; gap: 12px;">
            <select class="filter-select" id="monthYearFilter" onchange="loadPaymentHistory()">
                <option value="2025-01">January 2025</option>
                <option value="2024-12">December 2024</option>
                <option value="2024-11">November 2024</option>
                <option value="2024-10">October 2024</option>
                <option value="2024-09">September 2024</option>
                <option value="2024-08">August 2024</option>
            </select>
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
            </select>
            <input type="text" class="simple-search" id="searchStudent" placeholder="Search by name or ID..." onkeyup="applyFilters()">
        </div>
    </div>

    <!-- Invoice Table -->
    <div class="simple-table-container" style="margin-top:16px;">
        <table class="basic-table" id="paymentHistoryTable">
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
            <tbody id="paymentHistoryTableBody">
                <tr>
                    <td colspan="9" style="text-align: center; color: #999;">Loading payment history...</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
// Payment history data (from localStorage invoiceHistory)
let allPaymentHistory = [];
let filteredHistory = [];

// Initialize demo history data
function initializeDemoPaymentHistory() {
    const existingHistory = localStorage.getItem('invoiceHistory');
    if (existingHistory) {
        allPaymentHistory = JSON.parse(existingHistory);
        return;
    }
    
    // Create demo payment history for past months
    const demoHistory = [];
    const months = [
        { key: '2024-12', name: 'December 2024' },
        { key: '2024-11', name: 'November 2024' },
        { key: '2024-10', name: 'October 2024' }
    ];
    
    const students = [
        { name: 'Emma Johnson', grade: 10, class: 'A', studentId: 'S001' },
        { name: 'Liam Smith', grade: 10, class: 'A', studentId: 'S002' },
        { name: 'Olivia Williams', grade: 9, class: 'B', studentId: 'S003' },
        { name: 'Noah Brown', grade: 11, class: 'A', studentId: 'S004' },
        { name: 'Ava Davis', grade: 10, class: 'B', studentId: 'S005' }
    ];
    
    let invoiceCounter = 1;
    months.forEach(month => {
        students.forEach((student, idx) => {
            const isPaid = Math.random() > 0.2; // 80% paid rate
            const paymentType = isPaid ? ['Bank Transfer', 'Cash', 'K-Pay'][Math.floor(Math.random() * 3)] : '';
            const invoice = {
                id: `INV-${month.key}-${String(invoiceCounter).padStart(3, '0')}`,
                month: month.key,
                monthName: month.name,
                studentId: student.studentId,
                name: student.name,
                grade: student.grade,
                class: student.class,
                amount: 500.00 + (Math.random() * 100), // Base fee + random extras
                status: isPaid ? 'paid' : 'draft',
                paymentType: paymentType,
                paidBy: isPaid ? 'Reception Staff' : '',
                paidTime: isPaid ? `${month.key}-${String(15 + idx).padStart(2, '0')} 10:${String(idx * 10).padStart(2, '0')}:00` : ''
            };
            demoHistory.push(invoice);
            invoiceCounter++;
        });
    });
    
    allPaymentHistory = demoHistory;
    localStorage.setItem('invoiceHistory', JSON.stringify(allPaymentHistory));
}

// Load payment history for selected month
function loadPaymentHistory() {
    const selectedMonth = document.getElementById('monthYearFilter').value;
    const monthName = document.getElementById('monthYearFilter').options[document.getElementById('monthYearFilter').selectedIndex].text;
    
    // Update display
    document.getElementById('selectedMonthDisplay').textContent = monthName;
    
    // Filter by month
    filteredHistory = allPaymentHistory.filter(invoice => invoice.month === selectedMonth);
    
    // Update stats
    updateMonthStats();
    
    // Apply other filters and render
    applyFilters();
}

function updateMonthStats() {
    const totalInvoices = filteredHistory.length;
    const paidInvoices = filteredHistory.filter(inv => inv.status === 'paid');
    const totalAmount = paidInvoices.reduce((sum, inv) => sum + inv.amount, 0);
    
    document.getElementById('monthTotalInvoices').textContent = totalInvoices;
    document.getElementById('monthPaidCount').textContent = `${paidInvoices.length} / ${totalInvoices}`;
    document.getElementById('monthTotalAmount').textContent = `$${totalAmount.toFixed(2)}`;
}

function applyFilters() {
    const statusFilter = document.getElementById('statusFilter').value;
    const gradeFilter = document.getElementById('gradeFilter').value;
    const classFilter = document.getElementById('classFilter').value;
    const searchText = document.getElementById('searchStudent').value.toLowerCase();
    
    let displayHistory = [...filteredHistory];
    
    if (statusFilter !== 'all') {
        displayHistory = displayHistory.filter(inv => inv.status === statusFilter);
    }
    
    if (gradeFilter !== 'all') {
        displayHistory = displayHistory.filter(inv => inv.grade === parseInt(gradeFilter));
    }
    
    if (classFilter !== 'all') {
        displayHistory = displayHistory.filter(inv => inv.class === classFilter);
    }
    
    if (searchText) {
        displayHistory = displayHistory.filter(inv => 
            inv.name.toLowerCase().includes(searchText) || 
            inv.studentId.toLowerCase().includes(searchText) ||
            inv.id.toLowerCase().includes(searchText)
        );
    }
    
    renderPaymentHistoryTable(displayHistory);
}

function renderPaymentHistoryTable(data) {
    const tbody = document.getElementById('paymentHistoryTableBody');
    
    if (data.length === 0) {
        tbody.innerHTML = '<tr><td colspan="9" style="text-align: center; color: #999;">No payment history found for selected filters</td></tr>';
        return;
    }
    
    tbody.innerHTML = data.map(invoice => {
        const statusBadge = invoice.status === 'paid' 
            ? '<span class="badge badge-success">Paid</span>' 
            : '<span class="badge badge-secondary">Draft</span>';
        
        const paidInfo = invoice.status === 'paid' && invoice.paidBy 
            ? `${invoice.paidBy}<br><small style="color: #666;">${invoice.paidTime}</small>`
            : '<span style="color: #999;">-</span>';
        
        return `
            <tr>
                <td><strong><a href="/admin/invoice-details?id=${invoice.id}" style="color: #007AFF; text-decoration: none;">${invoice.id}</a></strong></td>
                <td>${invoice.studentId}</td>
                <td>${invoice.name}</td>
                <td>Grade ${invoice.grade}-${invoice.class}</td>
                <td><strong>$${invoice.amount.toFixed(2)}</strong></td>
                <td>${invoice.paymentType || '<span style="color: #999;">-</span>'}</td>
                <td>${statusBadge}</td>
                <td>${paidInfo}</td>
                <td>
                    <button class="simple-btn secondary small" onclick="viewInvoiceHistory('${invoice.id}')" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    ${invoice.status === 'paid' ? `
                        <button class="simple-btn primary small" onclick="viewHistoryReceipt('${invoice.id}')" title="View Receipt">
                            <i class="fas fa-receipt"></i>
                        </button>
                    ` : ''}
                </td>
            </tr>
        `;
    }).join('');
}

function viewInvoiceHistory(invoiceId) {
    const invoice = allPaymentHistory.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    // Create invoice details dialog
    const dialog = document.createElement('div');
    dialog.className = 'receipt-dialog-overlay';
    dialog.style.display = 'flex';
    
    dialog.innerHTML = `
        <div class="receipt-dialog-content">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-file-invoice"></i> Invoice Details</h3>
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
                        <span class="receipt-label">Month:</span>
                        <span class="receipt-value">${invoice.monthName}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Student Name:</span>
                        <span class="receipt-value">${invoice.name}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Grade:</span>
                        <span class="receipt-value">Grade ${invoice.grade}-${invoice.class}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Amount:</span>
                        <span class="receipt-value">$${invoice.amount.toFixed(2)}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Status:</span>
                        <span class="receipt-value">${invoice.status === 'paid' ? 'Paid' : 'Draft'}</span>
                    </div>
                    ${invoice.status === 'paid' ? `
                        <div class="receipt-row">
                            <span class="receipt-label">Payment Type:</span>
                            <span class="receipt-value">${invoice.paymentType}</span>
                        </div>
                        <div class="receipt-row">
                            <span class="receipt-label">Processed By:</span>
                            <span class="receipt-value">${invoice.paidBy}</span>
                        </div>
                        <div class="receipt-row">
                            <span class="receipt-label">Payment Date:</span>
                            <span class="receipt-value">${invoice.paidTime}</span>
                        </div>
                    ` : ''}
                </div>
            </div>
            <div class="receipt-dialog-actions">
                <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(dialog);
    dialog.addEventListener('click', function(e) {
        if (e.target === dialog) dialog.remove();
    });
}

function viewHistoryReceipt(invoiceId) {
    const invoice = allPaymentHistory.find(inv => inv.id === invoiceId);
    if (!invoice || invoice.status !== 'paid') return;
    
    // Create receipt dialog (same as main finance page)
    const dialog = document.createElement('div');
    dialog.className = 'receipt-dialog-overlay';
    dialog.style.display = 'flex';
    
    dialog.innerHTML = `
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
                <button class="simple-btn primary" onclick="printHistoryReceipt('${invoice.id}')">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(dialog);
    dialog.addEventListener('click', function(e) {
        if (e.target === dialog) dialog.remove();
    });
}

function printHistoryReceipt(invoiceId) {
    const invoice = allPaymentHistory.find(inv => inv.id === invoiceId);
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

// Initialize on page load
initializeDemoPaymentHistory();
loadPaymentHistory();
</script>

<style>
.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.badge-success {
    background: #dcfce7;
    color: #166534;
}

.badge-secondary {
    background: #f1f5f9;
    color: #64748b;
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

