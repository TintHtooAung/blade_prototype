<?php
$pageTitle = 'Smart Campus Nova Hub - Finance Management';
$pageIcon = 'fas fa-dollar-sign';
$pageHeading = 'Finance Management';
$activePage = 'finance';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-dollar-sign"></i>
    </div>
    <div class="page-title-compact">
        <h2>Finance Management</h2>
    </div>
</div>

<!-- Compact Finance Stats -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <h3>Collection Rate</h3>
            <div class="stat-number">78.5%</div>
            <div class="stat-change positive">+5% this month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-file-invoice"></i>
        </div>
        <div class="stat-content">
            <h3>Total Invoices</h3>
            <div class="stat-number">124</div>
            <div class="stat-change">98 paid</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="stat-content">
            <h3>Collected</h3>
            <div class="stat-number">$98,750</div>
            <div class="stat-change positive">+12% this month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3>Pending</h3>
            <div class="stat-number">$26,250</div>
            <div class="stat-change negative">22% remaining</div>
        </div>
    </div>
</div>

<!-- Invoice Management -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Invoice Management</h3>
        <button id="generateInvoice" class="simple-btn"><i class="fas fa-plus"></i> Generate Invoice</button>
    </div>
    
    <!-- Generate Invoice Form (hidden by default) -->
    <div id="invoiceForm" class="simple-section" style="display:none; margin-top:16px;">
            <div class="simple-header">
            <h3><i class="fas fa-file-invoice"></i> Generate New Invoice</h3>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="studentName">Student Name</label>
                    <input type="text" id="studentName" class="form-input" placeholder="Enter student name or ID">
                </div>
                <div class="form-group">
                    <label for="invoiceDate">Invoice Date</label>
                    <input type="date" id="invoiceDate" class="form-input">
                </div>
                <div class="form-group">
                    <label for="dueDate">Due Date</label>
                    <input type="date" id="dueDate" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="itemDescription">Item Description</label>
                    <input type="text" id="itemDescription" class="form-input" placeholder="e.g., Tuition Fee, Books, etc.">
                </div>
                    <div class="form-group">
                    <label for="itemAmount">Amount</label>
                    <input type="number" id="itemAmount" class="form-input" placeholder="0.00" step="0.01">
                    </div>
                    <div class="form-group">
                    <label for="totalAmount">Total Amount</label>
                    <input type="text" id="totalAmount" class="form-input" value="$0.00" readonly>
                        </div>
                    </div>
                    <div class="form-actions">
                <button id="cancelInvoice" class="simple-btn secondary"><i class="fas fa-times"></i> Cancel</button>
                <button id="saveInvoice" class="simple-btn primary"><i class="fas fa-check"></i> Generate Invoice</button>
            </div>
        </div>
    </div>
    
    <!-- Invoice List -->
    <div class="simple-header" style="margin-top:16px;">
        <h4>Invoice List</h4>
                <div class="simple-actions">
                    <select class="filter-select">
                        <option value="all">All Status</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                        <option value="overdue">Overdue</option>
                        <option value="draft">Draft</option>
                    </select>
                    <input type="text" class="simple-search" placeholder="Search invoices...">
                </div>
            </div>
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Student Name</th>
                            <th>Grade</th>
                            <th>Amount</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="/admin/invoice-details?id=INV-001" class="invoice-link">INV-001</a></td>
                            <td>Alice Johnson</td>
                            <td>Grade 10A</td>
                            <td>$2,500.00</td>
                            <td>2024-12-15</td>
                            <td>2025-01-15</td>
                            <td><span class="status-badge paid">Paid</span></td>
                            <td>
                                <button class="simple-btn-icon" onclick="viewInvoice('INV-001')" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon" onclick="editInvoice('INV-001')" title="Edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="/admin/invoice-details?id=INV-002" class="invoice-link">INV-002</a></td>
                            <td>Michael Brown</td>
                            <td>Grade 12B</td>
                            <td>$2,750.00</td>
                            <td>2024-12-15</td>
                            <td>2025-01-15</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <button class="simple-btn-icon" onclick="viewInvoice('INV-002')" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon" onclick="editInvoice('INV-002')" title="Edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="/admin/invoice-details?id=INV-003" class="invoice-link">INV-003</a></td>
                            <td>Sarah Wilson</td>
                            <td>Grade 9C</td>
                            <td>$2,300.00</td>
                            <td>2024-12-20</td>
                            <td>2025-01-20</td>
                            <td><span class="status-badge overdue">Overdue</span></td>
                            <td>
                                <button class="simple-btn-icon" onclick="viewInvoice('INV-003')" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon" onclick="editInvoice('INV-003')" title="Edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="/admin/invoice-details?id=INV-004" class="invoice-link">INV-004</a></td>
                            <td>David Lee</td>
                            <td>Grade 11A</td>
                            <td>$2,600.00</td>
                            <td>2024-12-25</td>
                            <td>2025-01-25</td>
                            <td><span class="status-badge draft">Draft</span></td>
                            <td>
                                <button class="simple-btn-icon" onclick="viewInvoice('INV-004')" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon" onclick="editInvoice('INV-004')" title="Edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="/admin/invoice-details?id=INV-005" class="invoice-link">INV-005</a></td>
                            <td>Emma Davis</td>
                            <td>Grade 8B</td>
                            <td>$2,200.00</td>
                            <td>2024-12-28</td>
                            <td>2025-01-28</td>
                            <td><span class="status-badge paid">Paid</span></td>
                            <td>
                                <button class="simple-btn-icon" onclick="viewInvoice('INV-005')" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon" onclick="editInvoice('INV-005')" title="Edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    
<!-- Fee Collection Status -->
        <div class="simple-section">
            <div class="simple-header">
                <h3>Fee Collection Status</h3>
                <div class="simple-actions">
                    <select class="filter-select">
                        <option value="all">All Months</option>
                        <option value="2025-01">January 2025</option>
                        <option value="2025-02">February 2025</option>
                        <option value="2024-12">December 2024</option>
                        <option value="2024-11">November 2024</option>
                        <option value="2025-03">March 2025</option>
                    </select>
                    <input type="text" class="simple-search" placeholder="Search months...">
                </div>
            </div>
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Academic Month</th>
                            <th>Total Amount</th>
                            <th>Collected</th>
                            <th>Collection %</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>January 2025</td>
                            <td>$125,000.00</td>
                            <td class="collected-amount">$98,750.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 79%"></div>
                                    <span class="progress-text">79%</span>
                                </div>
                            </td>
                            <td><span class="status-badge this-month">This Month</span></td>
                        </tr>
                        <tr>
                            <td>February 2025</td>
                            <td>$130,000.00</td>
                            <td class="collected-amount">$0.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 0%"></div>
                                    <span class="progress-text">0%</span>
                                </div>
                            </td>
                            <td><span class="status-badge upcoming">Upcoming</span></td>
                        </tr>
                        <tr>
                            <td>December 2024</td>
                            <td>$120,000.00</td>
                            <td class="collected-amount">$120,000.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar completed" style="width: 100%"></div>
                                    <span class="progress-text">100%</span>
                                </div>
                            </td>
                            <td><span class="status-badge completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>November 2024</td>
                            <td>$118,000.00</td>
                            <td class="collected-amount">$118,000.00</td>
                            <td>
                                <div class="progress-container">
                            <div class="progress-bar completed" style="width: 100%</div>
                                    <span class="progress-text">100%</span>
                                </div>
                            </td>
                            <td><span class="status-badge completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>March 2025</td>
                            <td>$135,000.00</td>
                            <td class="collected-amount">$0.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 0%"></div>
                                    <span class="progress-text">0%</span>
                                </div>
                            </td>
                            <td><span class="status-badge upcoming">Upcoming</span></td>
                        </tr>
                    </tbody>
                </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Invoice Management functionality
    const invoiceForm = document.getElementById('invoiceForm');
    const generateInvoiceBtn = document.getElementById('generateInvoice');
    const cancelInvoiceBtn = document.getElementById('cancelInvoice');
    const saveInvoiceBtn = document.getElementById('saveInvoice');
    const itemAmountInput = document.getElementById('itemAmount');
    const totalAmountInput = document.getElementById('totalAmount');

    // Toggle invoice form
    generateInvoiceBtn.addEventListener('click', function(e) {
        e.preventDefault();
        invoiceForm.style.display = invoiceForm.style.display === 'none' ? 'block' : 'none';
    });

    // Cancel invoice form
    cancelInvoiceBtn.addEventListener('click', function(e) {
        e.preventDefault();
        invoiceForm.style.display = 'none';
        // Clear form
        document.getElementById('studentName').value = '';
        document.getElementById('invoiceDate').value = '';
        document.getElementById('dueDate').value = '';
        document.getElementById('itemDescription').value = '';
        document.getElementById('itemAmount').value = '';
        totalAmountInput.value = '$0.00';
    });

    // Update total amount when item amount changes
    itemAmountInput.addEventListener('input', function() {
        const amount = parseFloat(this.value) || 0;
        totalAmountInput.value = '$' + amount.toFixed(2);
    });

    // Save invoice
    saveInvoiceBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const studentName = document.getElementById('studentName').value;
        const invoiceDate = document.getElementById('invoiceDate').value;
        const dueDate = document.getElementById('dueDate').value;
        const itemDescription = document.getElementById('itemDescription').value;
        const itemAmount = document.getElementById('itemAmount').value;

        if (!studentName || !invoiceDate || !dueDate || !itemDescription || !itemAmount) {
            alert('Please fill in all required fields.');
            return;
        }

        // Add to invoice list table (in real app, this would save to database)
        const invoiceTable = document.querySelector('.simple-table-container tbody');
        const newRow = document.createElement('tr');
        const invoiceNumber = 'INV-' + String(invoiceTable.children.length + 1).padStart(3, '0');
        newRow.innerHTML = `
            <td><a href="#" class="invoice-link">${invoiceNumber}</a></td>
            <td>${studentName}</td>
            <td>Grade 10A</td>
            <td>$${parseFloat(itemAmount).toFixed(2)}</td>
            <td>${invoiceDate}</td>
            <td>${dueDate}</td>
            <td><span class="status-badge draft">Draft</span></td>
            <td>
                <button class="simple-btn-icon"><i class="fas fa-eye"></i></button>
                <button class="simple-btn-icon"><i class="fas fa-edit"></i></button>
            </td>
        `;
        invoiceTable.appendChild(newRow);

        // Clear form and hide form
        document.getElementById('studentName').value = '';
        document.getElementById('invoiceDate').value = '';
        document.getElementById('dueDate').value = '';
        document.getElementById('itemDescription').value = '';
        document.getElementById('itemAmount').value = '';
        totalAmountInput.value = '$0.00';
        invoiceForm.style.display = 'none';

        alert('Invoice generated successfully!');
    });
});

// Navigation functions
function viewInvoice(invoiceId) {
    window.location.href = `/admin/invoice-details?id=${invoiceId}`;
}

function editInvoice(invoiceId) {
    window.location.href = `/admin/invoice-edit?id=${invoiceId}`;
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>