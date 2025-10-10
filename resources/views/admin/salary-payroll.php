<?php
$pageTitle = 'Smart Campus Nova Hub - Salary & Payroll';
$pageIcon = 'fas fa-money-check-alt';
$pageHeading = 'Salary & Payroll Management';
$activePage = 'payroll';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-money-check-alt"></i>
    </div>
    <div class="page-title-compact">
        <h2>Salary & Payroll Management</h2>
    </div>
</div>

<!-- Quick Payroll KPIs -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="stat-content">
            <h3>This Month Payout</h3>
            <div class="stat-number" id="totalPayout">$196,450</div>
            <div class="stat-change positive">January 2025</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Total Employees</h3>
            <div class="stat-number" id="totalEmployees">156</div>
            <div class="stat-change">111 Teachers, 45 Staff</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3>Withdrawn</h3>
            <div class="stat-number" id="withdrawnCount">0 / 156</div>
            <div class="stat-change">0% completed</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-flag"></i>
        </div>
        <div class="stat-content">
            <h3>Status</h3>
            <div class="stat-number" id="payrollStatus">Draft</div>
            <div class="stat-change">Editable</div>
        </div>
    </div>
</div>

<!-- Payroll Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Payroll for January 2025</h3>
        <div style="display: flex; gap: 12px;">
            <button class="simple-btn" onclick="generatePayroll()" id="generateBtn">
                <i class="fas fa-calculator"></i> Generate Payroll (This Month)
            </button>
            <button class="simple-btn primary" onclick="clearPayrollForNextMonth()" id="clearAllBtn" style="display:none;" disabled>
                <i class="fas fa-broom"></i> Clear All for Next Month
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <label style="font-weight: 600; color: #666;">Filters:</label>
            <select class="filter-select" id="employeeTypeFilter" onchange="applyFilters()">
                <option value="all">All Employees</option>
                <option value="teacher">Teachers Only</option>
                <option value="staff">Staff Only</option>
            </select>
            <select class="filter-select" id="departmentFilter" onchange="applyFilters()">
                <option value="all">All Departments</option>
                <option value="mathematics">Mathematics</option>
                <option value="science">Science</option>
                <option value="english">English</option>
                <option value="administration">Administration</option>
                <option value="it">IT Support</option>
                <option value="library">Library</option>
                <option value="maintenance">Maintenance</option>
            </select>
            <select class="filter-select" id="statusFilter" onchange="applyFilters()">
                <option value="all">All Status</option>
                <option value="draft">Draft</option>
                <option value="withdrawn">Withdrawn</option>
            </select>
            <input type="text" class="simple-search" id="searchEmployee" placeholder="Search by name or ID..." onkeyup="applyFilters()">
        </div>
    </div>

    <!-- Payroll Table -->
    <div class="simple-table-container" style="margin-top:16px;">
        <table class="basic-table" id="payrollTable">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Department</th>
                    <th>Net Pay</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Withdrawn By/Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="payrollTableBody">
                <tr class="no-data-row">
                    <td colspan="9" style="text-align:center; padding:40px; color:#999;">
                        <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                        No payroll generated yet. Click "Generate Payroll" to create payroll for this month.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Payroll History Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-history"></i> Payroll History</h3>
        <select class="filter-select" id="historyMonthFilter" onchange="loadPayrollHistory()">
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
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Net Pay</th>
                    <th>Payment Type</th>
                    <th>Withdrawn Date</th>
                    <th>Withdrawn By</th>
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

<!-- Withdrawal Processing Modal -->
<div id="withdrawalModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 500px;">
        <div class="confirm-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-hand-holding-usd"></i> Process Withdrawal</h4>
            <button class="icon-btn" onclick="closeWithdrawalModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <p id="withdrawalEmployeeInfo" style="margin-bottom: 20px; font-weight: 600;"></p>
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Receptionist ID</label>
                        <input type="text" class="form-input" id="receptionistId" placeholder="e.g., R001">
                    </div>
                    <div class="form-group">
                        <label>Receptionist Name</label>
                        <input type="text" class="form-input" id="receptionistName" placeholder="Enter name">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeWithdrawalModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="confirmWithdrawal()">
                <i class="fas fa-check"></i> Confirm Withdrawal
            </button>
        </div>
    </div>
</div>

<script>
// Sample payroll data
let payrollData = [];
let currentEditingId = null;
let currentWithdrawalId = null;

// Load saved data from localStorage on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedPayroll = localStorage.getItem('payrollData');
    if (savedPayroll) {
        payrollData = JSON.parse(savedPayroll);
        document.getElementById('generateBtn').style.display = 'none';
        document.getElementById('clearAllBtn').style.display = 'inline-flex';
        document.getElementById('payrollStatus').textContent = 'Draft';
        renderPayrollTable();
        updateStats();
    }
});

// Sample employees database
const employeesDatabase = {
    teachers: [
        {id: 'T001', name: 'Emma Wilson', dept: 'mathematics', netPay: 3505, paymentType: 'Bank Transfer'},
        {id: 'T002', name: 'Liam Johnson', dept: 'science', netPay: 3505, paymentType: 'Bank Transfer'},
        {id: 'T003', name: 'Olivia Brown', dept: 'english', netPay: 3505, paymentType: 'Cash'},
        {id: 'T004', name: 'Noah Davis', dept: 'mathematics', netPay: 3505, paymentType: 'K-Pay'},
    ],
    staff: [
        {id: 'E001', name: 'Ava Martinez', dept: 'administration', netPay: 2195, paymentType: 'Bank Transfer'},
        {id: 'E002', name: 'Ethan Garcia', dept: 'it', netPay: 2195, paymentType: 'Cash'},
        {id: 'E003', name: 'Sophia Rodriguez', dept: 'library', netPay: 2195, paymentType: 'Bank Transfer'},
        {id: 'E004', name: 'Isabella Martinez', dept: 'maintenance', netPay: 2195, paymentType: 'K-Pay'},
    ]
};

function generatePayroll() {
    if (!confirm('Generate payroll for all employees for January 2025?\n\nThis will create payroll entries for all teachers and staff.')) {
        return;
    }
            // Generate payroll entries
            payrollData = [];
            let idCounter = 1;
            
            employeesDatabase.teachers.forEach(emp => {
                payrollData.push({
                    id: 'PAY' + String(idCounter++).padStart(4, '0'),
                    employeeId: emp.id,
                    name: emp.name,
                    type: 'Teacher',
                    dept: emp.dept,
                    netPay: emp.netPay,
                    paymentType: emp.paymentType,
                    status: 'draft',
                    withdrawnBy: null,
                    withdrawnTime: null
                });
            });
            
            employeesDatabase.staff.forEach(emp => {
                payrollData.push({
                    id: 'PAY' + String(idCounter++).padStart(4, '0'),
                    employeeId: emp.id,
                    name: emp.name,
                    type: 'Staff',
                    dept: emp.dept,
                    netPay: emp.netPay,
                    paymentType: emp.paymentType,
                    status: 'draft',
                    withdrawnBy: null,
                    withdrawnTime: null
                });
            });
            
            document.getElementById('generateBtn').style.display = 'none';
            document.getElementById('clearAllBtn').style.display = 'inline-flex';
            document.getElementById('payrollStatus').textContent = 'Draft';
            
            // Save to localStorage
            localStorage.setItem('payrollData', JSON.stringify(payrollData));
            
            renderPayrollTable();
            updateStats();
            alert('Payroll generated successfully for January 2025!');
}

function renderPayrollTable() {
    const tbody = document.getElementById('payrollTableBody');
    if (payrollData.length === 0) {
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="9" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No payroll generated yet. Click "Generate Payroll" to create payroll for this month.
            </td>
        </tr>`;
        return;
    }
    
    let filteredData = applyDataFilters();
    
    tbody.innerHTML = filteredData.map(entry => `
        <tr>
            <td><strong>${entry.employeeId}</strong></td>
            <td>${entry.name}</td>
            <td>${entry.type}</td>
            <td style="text-transform: capitalize;">${entry.dept}</td>
            <td><strong>$${entry.netPay.toFixed(2)}</strong></td>
            <td>${entry.paymentType}</td>
            <td><span class="status-badge ${entry.status}">${entry.status === 'draft' ? 'Draft' : 'Withdrawn'}</span></td>
            <td>${entry.withdrawnBy ? `${entry.withdrawnBy}<br><small style="color:#999;">${entry.withdrawnTime}</small>` : '-'}</td>
            <td>
                ${entry.status === 'draft' ? `
                    <button class="simple-btn-icon" onclick="viewPayrollDetails('${entry.id}')" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="editPayrollDetails('${entry.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="processWithdrawal('${entry.id}')" title="Process Withdrawal">
                        <i class="fas fa-hand-holding-usd"></i>
                    </button>
                ` : `
                    <button class="simple-btn-icon" onclick="viewPayrollDetails('${entry.id}')" title="View Payroll">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="viewWithdrawalReceipt('${entry.id}')" title="View Withdrawal Receipt">
                        <i class="fas fa-receipt"></i>
                    </button>
                `}
            </td>
        </tr>
    `).join('');
}

function applyDataFilters() {
    const typeFilter = document.getElementById('employeeTypeFilter').value;
    const deptFilter = document.getElementById('departmentFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchEmployee').value.toLowerCase();
    
    return payrollData.filter(entry => {
        if (typeFilter !== 'all' && entry.type.toLowerCase() !== typeFilter) return false;
        if (deptFilter !== 'all' && entry.dept !== deptFilter) return false;
        if (statusFilter !== 'all' && entry.status !== statusFilter) return false;
        if (searchTerm && !entry.name.toLowerCase().includes(searchTerm) && !entry.employeeId.toLowerCase().includes(searchTerm)) return false;
        return true;
    });
}

function applyFilters() {
    renderPayrollTable();
}

function viewPayrollDetails(payrollId) {
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry) return;
    alert(`Payroll Details\n\nEmployee: ${entry.name} (${entry.employeeId})\nType: ${entry.type}\nDepartment: ${entry.dept}\nNet Pay: $${entry.netPay.toFixed(2)}\nPayment Type: ${entry.paymentType}\nStatus: ${entry.status}`);
}

function editPayrollDetails(payrollId) {
    // In real app, redirect to edit page similar to invoice-edit
    alert(`Edit payroll details for ${payrollId} - would redirect to edit page`);
}

function viewWithdrawalReceipt(payrollId) {
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry) return;
    alert(`Withdrawal Receipt\n\nPayroll: ${entry.id}\nEmployee: ${entry.name}\nAmount: $${entry.netPay.toFixed(2)}\nPayment Type: ${entry.paymentType}\nWithdrawn By: ${entry.withdrawnBy}\nTime: ${entry.withdrawnTime}`);
}

function processWithdrawal(payrollId) {
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry || entry.status !== 'draft') {
        alert('Can only process withdrawal for draft payrolls');
        return;
    }
    
    currentWithdrawalId = payrollId;
    document.getElementById('withdrawalEmployeeInfo').textContent = 
        `Processing withdrawal for: ${entry.name} (${entry.employeeId}) - $${entry.netPay.toFixed(2)}`;
    document.getElementById('receptionistId').value = '';
    document.getElementById('receptionistName').value = '';
    document.getElementById('withdrawalModal').style.display = 'flex';
}

function closeWithdrawalModal() {
    document.getElementById('withdrawalModal').style.display = 'none';
    currentWithdrawalId = null;
}

function confirmWithdrawal() {
    const receptionistId = document.getElementById('receptionistId').value.trim();
    const receptionistName = document.getElementById('receptionistName').value.trim();
    
    if (!receptionistId || !receptionistName) {
        alert('Please enter both Receptionist ID and Name');
        return;
    }
    
    const entry = payrollData.find(e => e.id === currentWithdrawalId);
    if (!entry) return;
    
    entry.status = 'withdrawn';
    entry.withdrawnBy = `${receptionistId} - ${receptionistName}`;
    entry.withdrawnTime = new Date().toLocaleString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit',
        hour12: false 
    });
    
    // Save to localStorage
    localStorage.setItem('payrollData', JSON.stringify(payrollData));
    
    closeWithdrawalModal();
    renderPayrollTable();
    updateStats();
    alert('Withdrawal recorded successfully!');
}

function clearPayrollForNextMonth() {
    const withdrawn = payrollData.filter(e => e.status === 'withdrawn').length;
    if (withdrawn !== payrollData.length) {
        alert(`Cannot clear payroll. ${payrollData.length - withdrawn} withdrawals are still pending.`);
        return;
    }
    
    showConfirmDialog({
        title: 'Clear All Payroll',
        message: 'All withdrawals have been completed. This will archive all records and prepare for next month. Continue?',
        confirmText: 'Clear All',
        confirmIcon: 'fas fa-broom',
        onConfirm: () => {
            payrollData = [];
            // Clear from localStorage
            localStorage.removeItem('payrollData');
            
            document.getElementById('generateBtn').style.display = 'inline-flex';
            document.getElementById('clearAllBtn').style.display = 'none';
            renderPayrollTable();
            updateStats();
            alert('Payroll cleared successfully! Ready for next month.');
        }
    });
}

function updateStats() {
    const total = payrollData.reduce((sum, entry) => sum + entry.netPay, 0);
    const withdrawn = payrollData.filter(e => e.status === 'withdrawn').length;
    const teachers = payrollData.filter(e => e.type === 'Teacher').length;
    const staff = payrollData.filter(e => e.type === 'Staff').length;
    
    document.getElementById('totalPayout').textContent = '$' + total.toFixed(2);
    document.getElementById('totalEmployees').textContent = payrollData.length;
    document.getElementById('withdrawnCount').textContent = `${withdrawn} / ${payrollData.length}`;
    
    const percentage = payrollData.length > 0 ? Math.round((withdrawn / payrollData.length) * 100) : 0;
    document.querySelector('#withdrawnCount').nextElementSibling.textContent = `${percentage}% completed`;
    
    // Enable/disable clear button based on completion
    const clearBtn = document.getElementById('clearAllBtn');
    if (payrollData.length > 0 && withdrawn === payrollData.length) {
        clearBtn.disabled = false;
        clearBtn.title = 'All withdrawals complete - Ready to clear';
    } else {
        clearBtn.disabled = true;
        clearBtn.title = `Cannot clear - ${payrollData.length - withdrawn} withdrawals pending`;
    }
}

function loadPayrollHistory() {
    const month = document.getElementById('historyMonthFilter').value;
    // In real implementation, load from database based on selected month
    console.log('Loading payroll history for:', month);
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>