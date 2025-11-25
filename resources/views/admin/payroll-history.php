<?php
$pageTitle = 'Smart Campus Nova Hub - Payroll History';
$pageIcon = 'fas fa-history';
$pageHeading = 'Payroll History';
$activePage = 'payroll';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-history"></i>
    </div>
    <div class="page-title-compact">
        <h2>Payroll History</h2>
        <p style="font-size: 14px; color: #666; margin: 4px 0 0 0;">Browse historical payroll and withdrawals by month</p>
    </div>
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn secondary" onclick="window.location.href='/admin/salary-payroll'">
            <i class="fas fa-arrow-left"></i> Back to Payroll
        </button>
    </div>
</div>

<!-- Month Selection -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-calendar-alt"></i> Select Month</h3>
        <select class="filter-select" id="historyMonthFilter" onchange="loadPayrollHistory()">
            <option value="2025-01">January 2025</option>
            <option value="2024-12" selected>December 2024</option>
            <option value="2024-11">November 2024</option>
            <option value="2024-10">October 2024</option>
            <option value="2024-09">September 2024</option>
        </select>
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
            <div class="stat-number" id="selectedMonthDisplay">December 2024</div>
            <div class="stat-change">Current selection</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Total Entries</h3>
            <div class="stat-number" id="monthTotalEntries">3</div>
            <div class="stat-change">Generated</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3>Withdrawals Completed</h3>
            <div class="stat-number" id="monthWithdrawnCount">0</div>
            <div class="stat-change">Processed</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="stat-content">
            <h3>Total Amount</h3>
            <div class="stat-number" id="monthTotalAmount">$0.00</div>
            <div class="stat-change">Paid out</div>
        </div>
    </div>
</div>

<!-- Payroll History Table -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-history"></i> Payroll History</h3>
    </div>
    
    <!-- Filters -->
    <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <label style="font-weight: 600; color: #666;">Filters:</label>
            <select class="filter-select" id="typeFilter" onchange="applyFilters()">
                <option value="all">All Types</option>
                <option value="Teacher">Teachers</option>
                <option value="Staff">Staff</option>
            </select>
            <select class="filter-select" id="deptFilter" onchange="applyFilters()">
                <option value="all">All Departments</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="Reception">Reception</option>
                <option value="IT">IT</option>
                <option value="Administration">Administration</option>
            </select>
            <select class="filter-select" id="statusFilter" onchange="applyFilters()">
                <option value="all">All Status</option>
                <option value="withdrawn">Withdrawn</option>
                <option value="draft">Draft</option>
            </select>
            <input type="text" class="simple-search" id="searchEmployee" placeholder="Search by name or ID..." onkeyup="applyFilters()">
        </div>
    </div>

    <!-- Payroll Table -->
    <div class="simple-table-container" style="margin-top:16px;">
        <table class="basic-table" id="payrollHistoryTable">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Department</th>
                    <th>Net Pay</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Withdrawn By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="historyTableBody">
                <tr>
                    <td>T001</td>
                    <td>Emma Wilson</td>
                    <td>Teacher</td>
                    <td>$3,505.00</td>
                    <td>Bank Transfer</td>
                    <td>2024-12-31 14:30</td>
                    <td>R001 - Admin User</td>
                </tr>
                <tr>
                    <td>T002</td>
                    <td>Liam Johnson</td>
                    <td>Teacher</td>
                    <td>$3,505.00</td>
                    <td>Cash</td>
                    <td>2024-12-31 15:15</td>
                    <td>R002 - Receptionist Sarah</td>
                </tr>
                <tr>
                    <td>E001</td>
                    <td>Ava Martinez</td>
                    <td>Staff</td>
                    <td>$2,195.00</td>
                    <td>K-Pay</td>
                    <td>2024-12-31 10:45</td>
                    <td>R001 - Admin User</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
// Payroll history data (from localStorage payrollHistory)
let allPayrollHistory = [];
let filteredHistory = [];

// Initialize demo history data
function initializeDemoPayrollHistory() {
    const existingHistory = localStorage.getItem('payrollHistory');
    if (existingHistory) {
        allPayrollHistory = JSON.parse(existingHistory);
        return;
    }
    
    // Create demo payroll history for past months
    const demoHistory = [];
    const months = [
        { key: '2024-12', name: 'December 2024' },
        { key: '2024-11', name: 'November 2024' },
        { key: '2024-10', name: 'October 2024' }
    ];
    
    const employees = [
        { name: 'Emma Wilson', type: 'Teacher', dept: 'Mathematics', employeeId: 'T001', netPay: 2500 },
        { name: 'James Anderson', type: 'Teacher', dept: 'Science', employeeId: 'T002', netPay: 2600 },
        { name: 'Sophia Davis', type: 'Teacher', dept: 'English', employeeId: 'T003', netPay: 2550 },
        { name: 'Ava Martinez', type: 'Staff', dept: 'Reception', employeeId: 'E001', netPay: 1800 },
        { name: 'Ethan Garcia', type: 'Staff', dept: 'IT', employeeId: 'E002', netPay: 2200 }
    ];
    
    let payrollCounter = 1;
    months.forEach(month => {
        employees.forEach((employee, idx) => {
            const isWithdrawn = Math.random() > 0.1; // 90% withdrawal rate
            const paymentType = isWithdrawn ? ['Bank Transfer', 'Cash', 'K-Pay'][Math.floor(Math.random() * 3)] : 'Bank Transfer';
            const entry = {
                id: `PAY-${month.key}-${String(payrollCounter).padStart(3, '0')}`,
                month: month.key,
                monthName: month.name,
                employeeId: employee.employeeId,
                name: employee.name,
                type: employee.type,
                dept: employee.dept,
                netPay: employee.netPay,
                status: isWithdrawn ? 'withdrawn' : 'draft',
                paymentType: paymentType,
                withdrawnBy: isWithdrawn ? 'Reception Staff' : '',
                withdrawnTime: isWithdrawn ? `${month.key}-${String(20 + idx).padStart(2, '0')} 14:${String(idx * 10).padStart(2, '0')}:00` : ''
            };
            demoHistory.push(entry);
            payrollCounter++;
        });
    });
    
    allPayrollHistory = demoHistory;
    localStorage.setItem('payrollHistory', JSON.stringify(allPayrollHistory));
}

// Load payroll history for selected month
function loadPayrollHistory() {
    const monthFilter = document.getElementById('historyMonthFilter');
    if (!monthFilter) return;
    
    const selectedMonth = monthFilter.value;
    const monthName = monthFilter.options[monthFilter.selectedIndex].text;
    
    // Update display
    document.getElementById('selectedMonthDisplay').textContent = monthName;
    
    // Filter by month
    filteredHistory = allPayrollHistory.filter(entry => entry.month === selectedMonth);
    
    // Update stats
    updateMonthStats();
    
    // Apply other filters and render
    applyFilters();
}

function updateMonthStats() {
    const totalEntries = filteredHistory.length;
    const withdrawnEntries = filteredHistory.filter(entry => entry.status === 'withdrawn');
    const totalAmount = withdrawnEntries.reduce((sum, entry) => sum + entry.netPay, 0);
    
    document.getElementById('monthTotalEntries').textContent = totalEntries;
    document.getElementById('monthWithdrawnCount').textContent = `${withdrawnEntries.length} / ${totalEntries}`;
    document.getElementById('monthTotalAmount').textContent = `$${totalAmount.toFixed(2)}`;
}

function applyFilters() {
    const statusFilter = document.getElementById('statusFilter').value;
    const typeFilter = document.getElementById('typeFilter').value;
    const deptFilter = document.getElementById('deptFilter').value;
    const searchText = document.getElementById('searchEmployee').value.toLowerCase();
    
    let displayHistory = [...filteredHistory];
    
    if (statusFilter !== 'all') {
        displayHistory = displayHistory.filter(entry => entry.status === statusFilter);
    }
    
    if (typeFilter !== 'all') {
        displayHistory = displayHistory.filter(entry => entry.type === typeFilter);
    }
    
    if (deptFilter !== 'all') {
        displayHistory = displayHistory.filter(entry => entry.dept === deptFilter);
    }
    
    if (searchText) {
        displayHistory = displayHistory.filter(entry => 
            entry.name.toLowerCase().includes(searchText) || 
            entry.employeeId.toLowerCase().includes(searchText) ||
            entry.id.toLowerCase().includes(searchText)
        );
    }
    
    renderPayrollHistoryTable(displayHistory);
}

function renderPayrollHistoryTable(data) {
    const tbody = document.getElementById('historyTableBody');
    
    if (data.length === 0) {
        tbody.innerHTML = '<tr><td colspan="9" style="text-align: center; color: #999; padding: 40px;"><i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>No payroll history found for selected filters</td></tr>';
        return;
    }
    
    tbody.innerHTML = data.map(entry => {
        const statusBadge = entry.status === 'withdrawn' 
            ? '<span class="badge badge-success">Withdrawn</span>' 
            : '<span class="badge badge-secondary">Draft</span>';
        
        const withdrawnInfo = entry.status === 'withdrawn' && entry.withdrawnBy 
            ? `${entry.withdrawnBy}<br><small style="color: #666;">${entry.withdrawnTime}</small>`
            : '<span style="color: #999;">-</span>';
        
        return `
            <tr>
                <td>${entry.employeeId}</td>
                <td>${entry.name}</td>
                <td>${entry.type}</td>
                <td>${entry.dept}</td>
                <td><strong>$${entry.netPay.toFixed(2)}</strong></td>
                <td>${entry.paymentType}</td>
                <td>${statusBadge}</td>
                <td>${withdrawnInfo}</td>
                <td>
                    <button class="simple-btn secondary small" onclick="viewPayrollHistory('${entry.id}')" title="View">
                        <i class="fas fa-eye"></i> View
                    </button>
                </td>
            </tr>
        `;
    }).join('');
}

function viewPayrollHistory(payrollId) {
    const entry = allPayrollHistory.find(e => e.id === payrollId);
    if (!entry) return;
    
    // Create receipt-like dialog (similar to student fee management)
    const dialog = document.createElement('div');
    dialog.className = 'receipt-dialog-overlay';
    dialog.style.display = 'flex';
    
    const isWithdrawn = entry.status === 'withdrawn';
    const dialogTitle = isWithdrawn ? 'Withdrawal Receipt' : 'Payroll Details';
    const dialogIcon = isWithdrawn ? 'fa-receipt' : 'fa-file-invoice-dollar';
    
    dialog.innerHTML = `
        <div class="receipt-dialog-content" style="max-width: 600px;">
            <div class="receipt-dialog-header">
                <h3><i class="fas ${dialogIcon}"></i> ${dialogTitle}</h3>
                <button class="receipt-close" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="receipt-dialog-body">
                ${isWithdrawn ? `
                <div style="background: #f0f9ff; border-left: 4px solid #3b82f6; padding: 16px; border-radius: 6px; margin-bottom: 20px;">
                    <p style="margin: 0; color: #1e40af; font-weight: 600; font-size: 16px;">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i>Withdrawal Confirmed
                    </p>
                </div>
                ` : ''}
                <div class="receipt-info">
                    <h4 style="margin: 0 0 16px 0; color: #111827; font-size: 16px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                        <i class="fas fa-user-tie" style="margin-right: 8px; color: #3b82f6;"></i>Employee Information
                    </h4>
                    <div class="receipt-row">
                        <span class="receipt-label">Payroll ID:</span>
                        <span class="receipt-value"><strong>${entry.id}</strong></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Month:</span>
                        <span class="receipt-value">${entry.monthName}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Employee Name:</span>
                        <span class="receipt-value">${entry.name}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Employee ID:</span>
                        <span class="receipt-value">${entry.employeeId}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Type:</span>
                        <span class="receipt-value">${entry.type}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Department:</span>
                        <span class="receipt-value">${entry.dept}</span>
                    </div>
                    
                    <h4 style="margin: 24px 0 16px 0; color: #111827; font-size: 16px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                        <i class="fas fa-dollar-sign" style="margin-right: 8px; color: #3b82f6;"></i>Payment Information
                    </h4>
                    <div class="receipt-row">
                        <span class="receipt-label">Net Pay:</span>
                        <span class="receipt-value" style="color: #10b981; font-size: 18px; font-weight: 700;">$${entry.netPay.toFixed(2)}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Type:</span>
                        <span class="receipt-value">${entry.paymentType || '-'}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Status:</span>
                        <span class="receipt-value">${entry.status === 'withdrawn' ? '<span class="badge badge-success">Withdrawn</span>' : '<span class="badge badge-secondary">Draft</span>'}</span>
                    </div>
                    ${isWithdrawn ? `
                    <h4 style="margin: 24px 0 16px 0; color: #111827; font-size: 16px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                        <i class="fas fa-user-check" style="margin-right: 8px; color: #3b82f6;"></i>Withdrawal Information
                    </h4>
                    <div class="receipt-row">
                        <span class="receipt-label">Withdrawn By:</span>
                        <span class="receipt-value"><strong>${entry.withdrawnBy || '-'}</strong></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Withdrawal Time:</span>
                        <span class="receipt-value">${entry.withdrawnTime || '-'}</span>
                    </div>
                    ` : ''}
                </div>
            </div>
            <div class="receipt-dialog-actions">
                <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i> Close
                </button>
                ${isWithdrawn ? `
                <button class="simple-btn primary" onclick="printHistoryReceipt('${entry.id}'); this.closest('.receipt-dialog-overlay').remove();">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
                ` : ''}
            </div>
        </div>
    `;
    
    document.body.appendChild(dialog);
    dialog.addEventListener('click', function(e) {
        if (e.target === dialog) dialog.remove();
    });
}


function printHistoryReceipt(payrollId) {
    const entry = allPayrollHistory.find(e => e.id === payrollId);
    if (!entry) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Withdrawal Receipt - ${entry.id}</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .receipt-header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
                .receipt-header h2 { margin: 0; color: #111827; }
                .receipt-header p { margin: 5px 0 0 0; color: #6b7280; }
                .receipt-section { margin: 25px 0; }
                .receipt-section h3 { margin: 0 0 15px 0; color: #111827; font-size: 16px; border-bottom: 1px solid #e5e7eb; padding-bottom: 8px; }
                .receipt-row { display: flex; justify-content: space-between; margin: 10px 0; padding: 8px 0; border-bottom: 1px solid #eee; }
                .receipt-label { font-weight: 600; color: #374151; }
                .receipt-value { color: #111827; }
                .amount-highlight { color: #10b981; font-size: 18px; font-weight: 700; }
            </style>
        </head>
        <body>
            <div class="receipt-header">
                <h2>Withdrawal Receipt</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            
            <div class="receipt-section">
                <h3>Employee Information</h3>
                <div class="receipt-row">
                    <span class="receipt-label">Payroll ID:</span>
                    <span class="receipt-value"><strong>${entry.id}</strong></span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Month:</span>
                    <span class="receipt-value">${entry.monthName}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Employee Name:</span>
                    <span class="receipt-value">${entry.name}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Employee ID:</span>
                    <span class="receipt-value">${entry.employeeId}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Type:</span>
                    <span class="receipt-value">${entry.type}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Department:</span>
                    <span class="receipt-value">${entry.dept}</span>
                </div>
            </div>
            
            <div class="receipt-section">
                <h3>Payment Information</h3>
                <div class="receipt-row">
                    <span class="receipt-label">Net Pay:</span>
                    <span class="receipt-value amount-highlight">$${entry.netPay.toFixed(2)}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Type:</span>
                    <span class="receipt-value">${entry.paymentType || '-'}</span>
                </div>
            </div>
            
            <div class="receipt-section">
                <h3>Withdrawal Information</h3>
                <div class="receipt-row">
                    <span class="receipt-label">Withdrawn By:</span>
                    <span class="receipt-value"><strong>${entry.withdrawnBy || '-'}</strong></span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Withdrawal Time:</span>
                    <span class="receipt-value">${entry.withdrawnTime || '-'}</span>
                </div>
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Initialize on page load
initializeDemoPayrollHistory();
loadPayrollHistory();
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

/* Receipt Dialog Styles */
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

.receipt-info {
    margin: 0;
}

.receipt-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #e5e7eb;
}

.receipt-row:last-child {
    border-bottom: none;
}

.receipt-label {
    font-weight: 600;
    color: #6b7280;
    font-size: 14px;
    flex: 0 0 40%;
}

.receipt-value {
    color: #111827;
    font-size: 14px;
    text-align: right;
    flex: 1;
    word-break: break-word;
}

.receipt-dialog-content h4 {
    margin: 0 0 16px 0;
    color: #111827;
    font-size: 16px;
    border-bottom: 2px solid #e5e7eb;
    padding-bottom: 8px;
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

