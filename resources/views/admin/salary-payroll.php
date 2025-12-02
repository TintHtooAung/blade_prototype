<?php
$pageTitle = 'Smart Campus Nova Hub - Salary & Payroll';
$pageIcon = 'fas fa-money-check-alt';
$pageHeading = 'Salary & Payroll Management';

// Detect portal from URL to set appropriate activePage
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$activePage = strpos($currentUri, '/staff/') !== false 
    ? 'salary-payroll' 
    : 'payroll';

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

<!-- Payroll Management Tabs Navigation -->
<div style="margin-top: 24px;">
    <div class="attendance-view-tabs">
        <button class="view-tab active" data-view="payroll" onclick="switchPayrollView('payroll')">
            <i class="fas fa-money-check-alt"></i> Payroll Management
        </button>
        <button class="view-tab" data-view="payroll-history" onclick="switchPayrollView('payroll-history')">
            <i class="fas fa-history"></i> Payroll History
        </button>
    </div>

    <!-- Payroll Management View -->
    <div id="payroll-payroll-view" class="attendance-view-content">
        <!-- Quick Payroll KPIs -->
        <div class="stats-grid-secondary vertical-stats" style="margin-bottom: 24px;">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Payout</h3>
                    <div class="stat-number" id="totalPayout">$196,450</div>
                    <div class="stat-change positive" id="statMonth">All Months</div>
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
        </div>
        <div class="simple-section">
    <div class="simple-header">
        <h3>Payroll Management</h3>
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
            <input type="text" class="simple-search" id="searchEmployee" placeholder="Search by name or ID..." onkeyup="applyFilters()">
        </div>
    </div>

    <!-- Payroll Table with Selectable Column Groups -->
    <div class="simple-table-container" style="margin-top:16px; overflow-x: auto;">
        <table class="payroll-grouped-table" id="payrollTable">
            <thead>
                <!-- Group Header Row -->
                <tr class="group-header-row">
                    <th rowspan="2" class="col-no">No.</th>
                    <th rowspan="2" class="col-employee">Employee</th>
                    <th rowspan="2" class="col-position">Position</th>
                    <th rowspan="2" class="col-department">Department</th>
                    <th colspan="5" class="group-header" data-group="attendance" id="group-header-attendance">
                        <div class="group-header-content" onclick="toggleColumnGroup('attendance')">
                            <i class="fas fa-chevron-down group-icon" id="icon-attendance"></i>
                            <span>Attendance</span>
                        </div>
                    </th>
                    <th colspan="5" class="group-header" data-group="payments" id="group-header-payments">
                        <div class="group-header-content" onclick="toggleColumnGroup('payments')">
                            <i class="fas fa-chevron-down group-icon" id="icon-payments"></i>
                            <span>Payments</span>
                        </div>
                    </th>
                    <th colspan="2" class="group-header" data-group="additional" id="group-header-additional">
                        <div class="group-header-content" onclick="toggleColumnGroup('additional')">
                            <i class="fas fa-chevron-down group-icon" id="icon-additional"></i>
                            <span>Additional Info</span>
                        </div>
                    </th>
                    <th rowspan="2" class="col-actions">Actions</th>
                </tr>
                <!-- Column Header Row -->
                <tr class="column-header-row">
                    <!-- Attendance Sub-columns -->
                    <th class="col-attendance expandable" data-group="attendance">Working Days</th>
                    <th class="col-attendance expandable" data-group="attendance">Days Present</th>
                    <th class="col-attendance expandable" data-group="attendance">Leave Days</th>
                    <th class="col-attendance expandable" data-group="attendance">Annual Leave</th>
                    <th class="col-attendance summary-col" data-group="attendance">Days Absent</th>
                    <!-- Payments Sub-columns -->
                    <th class="col-payments expandable" data-group="payments">Basic Salary</th>
                    <th class="col-payments expandable" data-group="payments">Attendance Allowance</th>
                    <th class="col-payments expandable" data-group="payments">Loyalty Bonus</th>
                    <th class="col-payments expandable" data-group="payments">Other Bonus</th>
                    <th class="col-payments summary-col" data-group="payments">Total Salary</th>
                    <!-- Additional Info Sub-columns -->
                    <th class="col-additional expandable" data-group="additional">Date of Joining</th>
                    <th class="col-additional summary-col" data-group="additional">Payment Method</th>
                </tr>
            </thead>
            <tbody id="payrollTableBody">
                <tr class="no-data-row">
                    <td colspan="18" style="text-align:center; padding:40px; color:#999;">
                        <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                        No payroll entries available for the selected filters.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>

    <!-- Payroll History View -->
    <div id="payroll-history-payroll-view" class="attendance-view-content" style="display: none;">
        <!-- Month Summary Stats -->
        <div class="stats-grid-secondary vertical-stats" style="margin-bottom: 24px;">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-content">
                    <h3>Selected Month</h3>
                    <div class="stat-number" id="historySelectedMonthDisplay">December 2024</div>
                    <div class="stat-change">Current selection</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Payroll</h3>
                    <div class="stat-number" id="historyTotalPayroll">0</div>
                    <div class="stat-change">Generated</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>Withdrawn</h3>
                    <div class="stat-number" id="historyWithdrawnCount">0</div>
                    <div class="stat-change">Completed</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Amount</h3>
                    <div class="stat-number" id="historyTotalAmount">$0.00</div>
                    <div class="stat-change">Withdrawn</div>
                </div>
            </div>
        </div>
        
        <!-- Payroll History Table -->
        <div class="simple-section">
            <div class="simple-header">
                <h3>Browse Payroll History</h3>
                <div style="display: flex; gap: 12px;">
                    <select class="filter-select" id="historyMonthFilter" onchange="loadPayrollHistory()" style="min-width: 180px;">
                        <option value="2025-01">January 2025</option>
                        <option value="2024-12" selected>December 2024</option>
                        <option value="2024-11">November 2024</option>
                        <option value="2024-10">October 2024</option>
                        <option value="2024-09">September 2024</option>
                        <option value="2024-08">August 2024</option>
                        <option value="2024-07">July 2024</option>
                        <option value="2024-06">June 2024</option>
                    </select>
                </div>
            </div>
            
            <!-- Filters -->
            <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
                <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <label style="font-weight: 600; color: #666;">Filters:</label>
                    <select class="filter-select" id="historyTypeFilter" onchange="applyPayrollHistoryFilters()">
                        <option value="all">All Types</option>
                        <option value="Teacher">Teachers</option>
                        <option value="Staff">Staff</option>
                    </select>
                    <select class="filter-select" id="historyDeptFilter" onchange="applyPayrollHistoryFilters()">
                        <option value="all">All Departments</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="English">English</option>
                        <option value="Reception">Reception</option>
                        <option value="IT">IT</option>
                        <option value="Administration">Administration</option>
                    </select>
                    <select class="filter-select" id="historyStatusFilter" onchange="applyPayrollHistoryFilters()">
                        <option value="all">All Status</option>
                        <option value="withdrawn">Withdrawn</option>
                        <option value="draft">Draft</option>
                    </select>
                    <input type="text" class="simple-search" id="historySearchEmployee" placeholder="Search by name or ID..." onkeyup="applyPayrollHistoryFilters()">
                </div>
            </div>

            <!-- Payroll History Table with Selectable Column Groups -->
            <div class="simple-table-container" style="margin-top:16px; overflow-x: auto;">
                <table class="payroll-grouped-table" id="payrollHistoryTable">
                    <thead>
                        <!-- Group Header Row -->
                        <tr class="group-header-row">
                            <th rowspan="2" class="col-no">No.</th>
                            <th rowspan="2" class="col-employee">Employee</th>
                            <th rowspan="2" class="col-position">Position</th>
                            <th rowspan="2" class="col-department">Department</th>
                            <th colspan="5" class="group-header" data-group="attendance-history" id="group-header-attendance-history">
                                <div class="group-header-content" onclick="toggleColumnGroup('attendance-history')">
                                    <i class="fas fa-chevron-down group-icon" id="icon-attendance-history"></i>
                                    <span>Attendance</span>
                                </div>
                            </th>
                            <th colspan="5" class="group-header" data-group="payments-history" id="group-header-payments-history">
                                <div class="group-header-content" onclick="toggleColumnGroup('payments-history')">
                                    <i class="fas fa-chevron-down group-icon" id="icon-payments-history"></i>
                                    <span>Payments</span>
                                </div>
                            </th>
                            <th colspan="3" class="group-header" data-group="payment-info-history" id="group-header-payment-info-history">
                                <div class="group-header-content" onclick="toggleColumnGroup('payment-info-history')">
                                    <i class="fas fa-chevron-down group-icon" id="icon-payment-info-history"></i>
                                    <span>Payment Info</span>
                                </div>
                            </th>
                            <th rowspan="2" class="col-actions">Actions</th>
                        </tr>
                        <!-- Column Header Row -->
                        <tr class="column-header-row">
                            <!-- Attendance Sub-columns -->
                            <th class="col-attendance expandable" data-group="attendance-history">Working Days</th>
                            <th class="col-attendance expandable" data-group="attendance-history">Days Present</th>
                            <th class="col-attendance expandable" data-group="attendance-history">Leave Days</th>
                            <th class="col-attendance expandable" data-group="attendance-history">Annual Leave</th>
                            <th class="col-attendance summary-col" data-group="attendance-history">Days Absent</th>
                            <!-- Payments Sub-columns -->
                            <th class="col-payments expandable" data-group="payments-history">Basic Salary</th>
                            <th class="col-payments expandable" data-group="payments-history">Attendance Allowance</th>
                            <th class="col-payments expandable" data-group="payments-history">Loyalty Bonus</th>
                            <th class="col-payments expandable" data-group="payments-history">Other Bonus</th>
                            <th class="col-payments summary-col" data-group="payments-history">Total Salary</th>
                            <!-- Payment Info Sub-columns -->
                            <th class="col-payment-info expandable" data-group="payment-info-history">Payment Type</th>
                            <th class="col-payment-info expandable" data-group="payment-info-history">Withdrawal Date</th>
                            <th class="col-payment-info summary-col" data-group="payment-info-history">Status</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBody">
                        <tr>
                            <td colspan="19" style="text-align: center; color: #999; padding: 40px;">Loading payroll history...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Payroll Details View Modal -->
<div id="payrollDetailsModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 900px; max-height: 90vh; overflow-y: auto;">
        <div class="confirm-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-file-invoice-dollar"></i> Payroll Details</h4>
            <button class="icon-btn" onclick="closePayrollDetailsModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 24px;" id="payrollDetailsContent">
            <!-- Content will be populated by JavaScript -->
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closePayrollDetailsModal()">
                <i class="fas fa-times"></i> Close
            </button>
            <button class="simple-btn primary" onclick="printPayrollDetails()" id="printPayrollBtn" style="display: none;">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
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
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Remark</label>
                        <input type="text" class="form-input" id="withdrawalRemark" placeholder="e.g., Send Payslip" value="Send Payslip">
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
        // Backward compatibility: add missing fields to existing data
        payrollData = payrollData.map(entry => {
            if (!entry.position) entry.position = entry.type || 'Employee';
            if (!entry.dateOfJoining) entry.dateOfJoining = '2023-01-01';
            if (entry.workingDays === undefined) entry.workingDays = 21;
            if (entry.leaveDays === undefined) entry.leaveDays = 0;
            if (entry.annualLeave === undefined) entry.annualLeave = 0;
            if (entry.daysAbsent === undefined) entry.daysAbsent = 0;
            if (entry.daysPresent === undefined) entry.daysPresent = entry.workingDays || 21;
            if (entry.basicSalary === undefined) entry.basicSalary = entry.totalSalary || entry.netPay || 0;
            if (entry.attendanceAllowance === undefined) entry.attendanceAllowance = 0;
            if (entry.loyaltyBonus === undefined) entry.loyaltyBonus = 0;
            if (entry.otherBonus === undefined) entry.otherBonus = 0;
            if (entry.totalSalary === undefined) entry.totalSalary = entry.netPay || entry.basicSalary || 0;
            if (!entry.paymentDate && entry.withdrawnTime) {
                entry.paymentDate = entry.withdrawnTime.split(' ')[0];
            }
            if (!entry.remark) entry.remark = '';
            return entry;
        });
        localStorage.setItem('payrollData', JSON.stringify(payrollData));
        renderPayrollTable();
        updateStats();
    } else {
        generatePayroll(true);
    }
    
    // Populate month filter dropdown
});

// Sample employees database
const employeesDatabase = {
    teachers: [
        {id: 'TR008', name: 'U Kaung Kaung', position: 'Teacher', dept: 'Teaching', dateOfJoining: '2022-11-03', basicSalary: 300000, paymentType: 'Cash'},
        {id: 'TR015', name: 'Daw Khine Hnin', position: 'Teacher', dept: 'Teaching', dateOfJoining: '2022-12-04', basicSalary: 300000, paymentType: 'Cash'},
        {id: 'T001', name: 'Emma Wilson', position: 'Teacher', dept: 'Mathematics', dateOfJoining: '2023-01-15', basicSalary: 350000, paymentType: 'Bank Transfer'},
        {id: 'T002', name: 'Liam Johnson', position: 'Teacher', dept: 'Science', dateOfJoining: '2023-02-20', basicSalary: 350000, paymentType: 'Bank Transfer'},
        {id: 'T003', name: 'Olivia Brown', position: 'Teacher', dept: 'English', dateOfJoining: '2023-03-10', basicSalary: 350000, paymentType: 'Cash'},
        {id: 'T004', name: 'Noah Davis', position: 'Teacher', dept: 'Mathematics', dateOfJoining: '2023-04-05', basicSalary: 350000, paymentType: 'KBZ Pay'},
    ],
    staff: [
        {id: 'E001', name: 'Ava Martinez', position: 'Administrator', dept: 'Administration', dateOfJoining: '2023-05-12', basicSalary: 250000, paymentType: 'Bank Transfer'},
        {id: 'E002', name: 'Ethan Garcia', position: 'IT Support', dept: 'IT', dateOfJoining: '2023-06-18', basicSalary: 280000, paymentType: 'Cash'},
        {id: 'E003', name: 'Sophia Rodriguez', position: 'Librarian', dept: 'Library', dateOfJoining: '2023-07-22', basicSalary: 220000, paymentType: 'Bank Transfer'},
        {id: 'E004', name: 'Isabella Martinez', position: 'Maintenance', dept: 'Maintenance', dateOfJoining: '2023-08-30', basicSalary: 200000, paymentType: 'KBZ Pay'},
    ]
};

function generatePayroll(autoGenerate = false) {
    const now = new Date();
    const currentYear = now.getFullYear();
    const currentMonth = String(now.getMonth() + 1).padStart(2, '0');
    const monthKey = `${currentYear}-${currentMonth}`;
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthName = monthNames[now.getMonth()];
    
    if (!autoGenerate) {
    if (!confirm(`Generate payroll for all employees for ${monthName} ${currentYear}?\n\nThis will create payroll entries for all teachers and staff.`)) {
        return;
        }
    }
            // Generate payroll entries
            payrollData = [];
            let idCounter = 1;
            
            employeesDatabase.teachers.forEach(emp => {
                const workingDays = 21;
                const leaveDays = Math.floor(Math.random() * 3); // 0-2 leave days
                const annualLeave = 0;
                const daysAbsent = Math.floor(Math.random() * 2); // 0-1 absent days
                const daysPresent = workingDays - leaveDays - daysAbsent;
                const basicSalary = emp.basicSalary || 300000;
                const attendanceAllowance = daysPresent >= 20 ? 30000 : 0;
                const loyaltyBonus = 0;
                const otherBonus = 0;
                const totalSalary = basicSalary + attendanceAllowance + loyaltyBonus + otherBonus;
                
                payrollData.push({
                    id: 'PAY' + String(idCounter++).padStart(4, '0'),
                    employeeId: emp.id,
                    name: emp.name,
                    position: emp.position || 'Teacher',
                    dept: emp.dept,
                    dateOfJoining: emp.dateOfJoining || '2023-01-01',
                    workingDays: workingDays,
                    leaveDays: leaveDays,
                    annualLeave: annualLeave,
                    daysAbsent: daysAbsent,
                    daysPresent: daysPresent,
                    basicSalary: basicSalary,
                    attendanceAllowance: attendanceAllowance,
                    loyaltyBonus: loyaltyBonus,
                    otherBonus: otherBonus,
                    totalSalary: totalSalary,
                    paymentType: emp.paymentType,
                    paymentDate: null,
                    status: 'draft',
                    withdrawnBy: null,
                    withdrawnTime: null,
                    remark: '',
                    month: monthKey,
                    year: currentYear,
                    monthNum: currentMonth
                });
            });
            
            employeesDatabase.staff.forEach(emp => {
                const workingDays = 21;
                const leaveDays = Math.floor(Math.random() * 3); // 0-2 leave days
                const annualLeave = 0;
                const daysAbsent = Math.floor(Math.random() * 2); // 0-1 absent days
                const daysPresent = workingDays - leaveDays - daysAbsent;
                const basicSalary = emp.basicSalary || 200000;
                const attendanceAllowance = daysPresent >= 20 ? 20000 : 0;
                const loyaltyBonus = 0;
                const otherBonus = 0;
                const totalSalary = basicSalary + attendanceAllowance + loyaltyBonus + otherBonus;
                
                payrollData.push({
                    id: 'PAY' + String(idCounter++).padStart(4, '0'),
                    employeeId: emp.id,
                    name: emp.name,
                    position: emp.position || 'Staff',
                    dept: emp.dept,
                    dateOfJoining: emp.dateOfJoining || '2023-01-01',
                    workingDays: workingDays,
                    leaveDays: leaveDays,
                    annualLeave: annualLeave,
                    daysAbsent: daysAbsent,
                    daysPresent: daysPresent,
                    basicSalary: basicSalary,
                    attendanceAllowance: attendanceAllowance,
                    loyaltyBonus: loyaltyBonus,
                    otherBonus: otherBonus,
                    totalSalary: totalSalary,
                    paymentType: emp.paymentType,
                    paymentDate: null,
                    status: 'draft',
                    withdrawnBy: null,
                    withdrawnTime: null,
                    remark: '',
                    month: monthKey,
                    year: currentYear,
                    monthNum: currentMonth
                });
            });
            
            // Save to localStorage
            localStorage.setItem('payrollData', JSON.stringify(payrollData));
            
            renderPayrollTable();
            updateStats();
            if (!autoGenerate) {
            showToast(`${payrollData.length} payroll entries generated successfully for ${monthName} ${currentYear}`, 'success');
            }
}

// Column group expand/collapse state - must be defined before renderPayrollTable
const columnGroups = {
    payments: true,    // true = expanded, false = collapsed
    attendance: true,
    additional: true,
    'attendance-history': true,
    'payments-history': true,
    'payment-info-history': true
};

function renderPayrollTable() {
    const tbody = document.getElementById('payrollTableBody');
    if (payrollData.length === 0) {
        // Calculate colspan based on collapsed state
        let colspan = 4; // No, Employee, Position, Department
        colspan += columnGroups.payments ? 5 : 1;
        colspan += columnGroups.attendance ? 5 : 1;
        colspan += columnGroups.additional ? 3 : 1;
        colspan += 1; // Actions
        
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="${colspan}" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No payroll entries available for the selected filters.
            </td>
        </tr>`;
        return;
    }
    
    let filteredData = applyDataFilters();
    
    tbody.innerHTML = filteredData.map((entry, index) => {
        // Calculate totals
        const basicSalary = entry.basicSalary || 0;
        const attendanceAllowance = entry.attendanceAllowance || 0;
        const loyaltyBonus = entry.loyaltyBonus || 0;
        const otherBonus = entry.otherBonus || 0;
        const totalSalary = entry.totalSalary || entry.netPay || 0;
        
        // Attendance summary
        const workingDays = entry.workingDays || 21;
        const leaveDays = entry.leaveDays || 0;
        const annualLeave = entry.annualLeave || 0;
        const daysAbsent = entry.daysAbsent || 0;
        const daysPresent = entry.daysPresent || 0;
        
        // Payment info
        const paymentDate = entry.paymentDate || (entry.withdrawnTime ? entry.withdrawnTime.split(' ')[0] : '-');
        const paymentType = entry.paymentType || '-';
        const remark = entry.remark || '-';
        const dateOfJoining = entry.dateOfJoining ? new Date(entry.dateOfJoining).toLocaleDateString('en-GB') : '-';
        
        // Actions - Always show Pay button
        const actions = `
            <div style="display: flex; gap: 6px; justify-content: center; flex-direction: column; align-items: center;">
                <button class="payroll-action-btn process-btn" onclick="confirmPayrollPayment('${entry.id}')" title="Process Payment">
                    <i class="fas fa-check-circle"></i> Pay
                </button>
            </div>
        `;
        
        // Determine display state for expandable cells
        const paymentsExpanded = columnGroups.payments;
        const attendanceExpanded = columnGroups.attendance;
        const additionalExpanded = columnGroups.additional;
        
        return `
            <tr class="payroll-row" data-entry-id="${entry.id}" onclick="toggleAllColumnGroups()" style="cursor: pointer;">
                <td>${index + 1}</td>
                <td>
                    <div style="display: flex; flex-direction: column;">
                        <strong style="font-size: 14px; color: #111827; margin-bottom: 2px;">${entry.name}</strong>
                        <small style="color: #6b7280; font-size: 12px;">${entry.employeeId}</small>
                    </div>
                </td>
                <td>${entry.position || entry.type || '-'}</td>
                <td>${entry.dept}</td>
                <!-- Attendance Group Columns -->
                <td class="col-attendance expandable" data-group="attendance" style="display: ${attendanceExpanded ? '' : 'none'};">${workingDays}</td>
                <td class="col-attendance expandable" data-group="attendance" style="display: ${attendanceExpanded ? '' : 'none'};">
                    <span style="color: #10b981; font-weight: 600;">${daysPresent}</span>
                </td>
                <td class="col-attendance expandable" data-group="attendance" style="display: ${attendanceExpanded ? '' : 'none'};">
                    <span style="color: #f59e0b;">${leaveDays}</span>
                </td>
                <td class="col-attendance expandable" data-group="attendance" style="display: ${attendanceExpanded ? '' : 'none'};">${annualLeave}</td>
                <td class="col-attendance summary-col" data-group="attendance">
                    <span style="color: #ef4444;">${daysAbsent}</span>
                    ${!attendanceExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px;">${daysPresent}/${workingDays} present</small>` : ''}
                </td>
                <!-- Payments Group Columns -->
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(basicSalary)}</td>
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};" onclick="event.stopPropagation();">
                    <input type="number" 
                           style="width: 100%; border: none; background: transparent; padding: 0; font-size: inherit; color: inherit; text-align: right; outline: none; ${entry.status === 'draft' ? 'cursor: text;' : 'cursor: default;'}" 
                           value="${attendanceAllowance}" 
                           data-entry-id="${entry.id}"
                           data-field="attendanceAllowance"
                           data-display-value="${formatCurrency(attendanceAllowance)}"
                           onkeydown="if(event.key === 'Enter') { updatePayrollTotal('${entry.id}'); this.blur(); }"
                           onblur="updatePayrollTotal('${entry.id}'); this.style.background='transparent'; this.style.border='none'; this.style.padding='0'; this.style.width='100%'; this.style.minWidth='auto';"
                           onfocus="this.style.background='#f9fafb'; this.style.border='1px solid #e5e7eb'; this.style.borderRadius='4px'; this.style.padding='4px 8px'; this.style.width='auto'; this.style.minWidth='100px';"
                           ${entry.status === 'draft' ? '' : 'readonly'}
                           step="0.01" 
                           min="0">
                </td>
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};" onclick="event.stopPropagation();">
                    <input type="number" 
                           style="width: 100%; border: none; background: transparent; padding: 0; font-size: inherit; color: inherit; text-align: right; outline: none; ${entry.status === 'draft' ? 'cursor: text;' : 'cursor: default;'}" 
                           value="${loyaltyBonus}" 
                           data-entry-id="${entry.id}"
                           data-field="loyaltyBonus"
                           data-display-value="${formatCurrency(loyaltyBonus)}"
                           onkeydown="if(event.key === 'Enter') { updatePayrollTotal('${entry.id}'); this.blur(); }"
                           onblur="updatePayrollTotal('${entry.id}'); this.style.background='transparent'; this.style.border='none'; this.style.padding='0'; this.style.width='100%'; this.style.minWidth='auto';"
                           onfocus="this.style.background='#f9fafb'; this.style.border='1px solid #e5e7eb'; this.style.borderRadius='4px'; this.style.padding='4px 8px'; this.style.width='auto'; this.style.minWidth='100px';"
                           ${entry.status === 'draft' ? '' : 'readonly'}
                           step="0.01" 
                           min="0">
                </td>
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};" onclick="event.stopPropagation();">
                    <input type="number" 
                           style="width: 100%; border: none; background: transparent; padding: 0; font-size: inherit; color: inherit; text-align: right; outline: none; ${entry.status === 'draft' ? 'cursor: text;' : 'cursor: default;'}" 
                           value="${otherBonus}" 
                           data-entry-id="${entry.id}"
                           data-field="otherBonus"
                           data-display-value="${formatCurrency(otherBonus)}"
                           onkeydown="if(event.key === 'Enter') { updatePayrollTotal('${entry.id}'); this.blur(); }"
                           onblur="updatePayrollTotal('${entry.id}'); this.style.background='transparent'; this.style.border='none'; this.style.padding='0'; this.style.width='100%'; this.style.minWidth='auto';"
                           onfocus="this.style.background='#f9fafb'; this.style.border='1px solid #e5e7eb'; this.style.borderRadius='4px'; this.style.padding='4px 8px'; this.style.width='auto'; this.style.minWidth='100px';"
                           ${entry.status === 'draft' ? '' : 'readonly'}
                           step="0.01" 
                           min="0">
                </td>
                <td class="col-payments summary-col" data-group="payments">
                    <strong style="color: #10b981;" id="total-salary-${entry.id}">${formatCurrency(totalSalary)}</strong>
                    ${!paymentsExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px; font-weight: normal;">Total</small>` : ''}
                </td>
                <!-- Additional Info Group Columns -->
                <td class="col-additional expandable" data-group="additional" style="display: ${additionalExpanded ? '' : 'none'};">${dateOfJoining}</td>
                <td class="col-additional summary-col" data-group="additional" onclick="event.stopPropagation();">
                    <select class="form-select" 
                            style="width: 100%; padding: 4px 8px; font-size: 12px; border: 1px solid #e5e7eb; border-radius: 4px; background: #fff;"
                            data-entry-id="${entry.id}"
                            data-field="paymentType"
                            onchange="updatePayrollPaymentMethod('${entry.id}', this.value)"
                            ${entry.status === 'withdrawn' ? 'disabled' : ''}>
                        <option value="Cash" ${paymentType === 'Cash' ? 'selected' : ''}>Cash</option>
                        <option value="Bank Transfer" ${paymentType === 'Bank Transfer' ? 'selected' : ''}>Bank Transfer</option>
                        <option value="KBZ Pay" ${paymentType === 'KBZ Pay' ? 'selected' : ''}>KBZ Pay</option>
                        <option value="Wave Pay" ${paymentType === 'Wave Pay' ? 'selected' : ''}>Wave Pay</option>
                        <option value="Check" ${paymentType === 'Check' ? 'selected' : ''}>Check</option>
                        <option value="Card Payment" ${paymentType === 'Card Payment' ? 'selected' : ''}>Card Payment</option>
                        <option value="Mobile Payment" ${paymentType === 'Mobile Payment' ? 'selected' : ''}>Mobile Payment</option>
                        <option value="Online Payment" ${paymentType === 'Online Payment' ? 'selected' : ''}>Online Payment</option>
                    </select>
                </td>
                <td onclick="event.stopPropagation();" style="cursor: default;">${actions}</td>
            </tr>
        `;
    }).join('');
    
    // Apply current collapse state after rendering
    Object.keys(columnGroups).forEach(groupName => {
        if (!columnGroups[groupName]) {
            toggleColumnGroup(groupName);
        }
    });
}

// Toggle all column groups when clicking on a row
function toggleAllColumnGroups() {
    // Determine if we should expand or collapse based on current state
    const allExpanded = columnGroups.payments && columnGroups.attendance && columnGroups.additional;
    
    // Toggle all groups to the opposite state
    const newState = !allExpanded;
    
    // Toggle each group
    toggleColumnGroup('payments', newState);
    toggleColumnGroup('attendance', newState);
    toggleColumnGroup('additional', newState);
}

// Toggle all column groups for history table when clicking on a row
function toggleAllColumnGroupsHistory() {
    // Determine if we should expand or collapse based on current state
    const allExpanded = columnGroups['payments-history'] && columnGroups['attendance-history'] && columnGroups['payment-info-history'];
    
    // Toggle all groups to the opposite state
    const newState = !allExpanded;
    
    // Toggle each group
    toggleColumnGroup('payments-history', newState);
    toggleColumnGroup('attendance-history', newState);
    toggleColumnGroup('payment-info-history', newState);
}

function toggleColumnGroup(groupName, forceState = null) {
    // Toggle state or set to forced state
    if (forceState !== null) {
        columnGroups[groupName] = forceState;
    } else {
        columnGroups[groupName] = !columnGroups[groupName];
    }
    
    const isExpanded = columnGroups[groupName];
    const icon = document.getElementById(`icon-${groupName}`);
    
    // Update group header icon (no animation)
    if (icon) {
        if (isExpanded) {
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down');
        } else {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right');
        }
    }
    
    
    // Toggle expandable columns in thead (no animation)
    const expandableCols = document.querySelectorAll(`thead .expandable[data-group="${groupName}"]`);
    expandableCols.forEach((col) => {
        col.style.display = isExpanded ? '' : 'none';
    });
    
    // Toggle expandable cells in tbody (no animation)
    const expandableCells = document.querySelectorAll(`tbody td.expandable[data-group="${groupName}"]`);
    expandableCells.forEach((cell) => {
        cell.style.display = isExpanded ? '' : 'none';
    });
    
    // Update group header colspan (no animation)
    const groupHeader = document.getElementById(`group-header-${groupName}`);
    if (groupHeader) {
        if (groupName === 'payments' || groupName === 'payments-history') {
            groupHeader.colSpan = isExpanded ? 5 : 1;
        } else if (groupName === 'attendance' || groupName === 'attendance-history') {
            groupHeader.colSpan = isExpanded ? 5 : 1;
        } else if (groupName === 'additional') {
            groupHeader.colSpan = isExpanded ? 2 : 1;
        } else if (groupName === 'payment-info-history') {
            groupHeader.colSpan = isExpanded ? 3 : 1;
        }
    }
}

function formatCurrency(amount) {
    // Format as Myanmar currency (no decimal, with commas)
    return amount.toLocaleString('en-US') + ' MMK';
}

function confirmPayrollPayment(entryId) {
    const entry = payrollData.find(e => e.id === entryId);
    if (!entry) return;
    
    // Create custom dialog with remark input
    const dialog = document.createElement('div');
    dialog.className = 'confirm-dialog-overlay';
    dialog.style.display = 'flex';
    dialog.id = 'payrollConfirmDialog';
    
    dialog.innerHTML = `
        <div class="confirm-dialog-content" style="max-width: 500px;">
            <div class="confirm-dialog-header">
                <h4><i class="fas fa-check-circle"></i> Confirm Payroll Payment</h4>
                <button class="icon-btn" onclick="closePayrollConfirmDialog()"><i class="fas fa-times"></i></button>
            </div>
            <div class="confirm-dialog-body" style="padding: 20px;">
                <div style="margin-bottom: 16px;">
                    <p style="margin: 0 0 12px 0; color: #374151;">
                        Are you sure you want to process payment for <strong>${entry.name}</strong>?
                    </p>
                    <div style="background: #f9fafb; padding: 12px; border-radius: 6px; margin-bottom: 16px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="color: #6b7280; font-size: 13px;">Total Amount:</span>
                            <span style="font-weight: 600; color: #111827; font-size: 16px;">${formatCurrency(entry.totalSalary || entry.netPay || 0)}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151; font-size: 13px;">Remark (Optional)</label>
                    <textarea id="payrollRemarkInput" class="form-input" rows="3" placeholder="Add any remarks or notes..." style="width: 100%; resize: vertical;"></textarea>
                </div>
            </div>
            <div class="confirm-dialog-actions">
                <button class="simple-btn secondary" onclick="closePayrollConfirmDialog()">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <button class="simple-btn primary" onclick="processPayrollPaymentFromDialog('${entryId}')" style="background: #2563eb; border-color: #2563eb;">
                    <i class="fas fa-check-circle"></i> Confirm Payment
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(dialog);
}

function closePayrollConfirmDialog() {
    const dialog = document.getElementById('payrollConfirmDialog');
    if (dialog) {
        dialog.remove();
    }
}

function processPayrollPaymentFromDialog(entryId) {
    const remarkInput = document.getElementById('payrollRemarkInput');
    const remark = remarkInput ? remarkInput.value.trim() : '';
    
    processPayrollPayment(entryId, remark);
    closePayrollConfirmDialog();
}

function processPayrollPayment(entryId, remark) {
    const allPayrollData = JSON.parse(localStorage.getItem('payrollData') || '[]');
    const entryIndex = allPayrollData.findIndex(e => e.id === entryId);
    
    if (entryIndex > -1) {
        allPayrollData[entryIndex].status = 'withdrawn';
        allPayrollData[entryIndex].remark = remark;
        allPayrollData[entryIndex].withdrawnTime = new Date().toLocaleString('en-GB');
        localStorage.setItem('payrollData', JSON.stringify(allPayrollData));
        
        // Reload data and re-render
        loadPayrollData();
        renderPayrollTable();
        updateStats();
        
        if (typeof showToast === 'function') {
            showToast('Payroll payment processed successfully!', 'success');
        } else {
            alert('Payroll payment processed successfully!');
        }
    }
}

function updatePayrollTotal(entryId) {
    // Get all input values for this row
    const row = document.querySelector(`tr[data-entry-id="${entryId}"]`);
    if (!row) return;
    
    // Get basic salary from stored data
    const allPayrollData = JSON.parse(localStorage.getItem('payrollData') || '[]');
    const entry = allPayrollData.find(e => e.id === entryId);
    if (!entry) return;
    
    const basicSalary = parseFloat(entry.basicSalary || 0) || 0;
    
    // Get input values
    const attendanceAllowanceInput = row.querySelector('input[data-field="attendanceAllowance"]');
    const loyaltyBonusInput = row.querySelector('input[data-field="loyaltyBonus"]');
    const otherBonusInput = row.querySelector('input[data-field="otherBonus"]');
    
    const attendanceAllowance = parseFloat(attendanceAllowanceInput?.value || 0) || 0;
    const loyaltyBonus = parseFloat(loyaltyBonusInput?.value || 0) || 0;
    const otherBonus = parseFloat(otherBonusInput?.value || 0) || 0;
    
    // Calculate total
    const totalSalary = basicSalary + attendanceAllowance + loyaltyBonus + otherBonus;
    
    // Update total display
    const totalElement = document.getElementById(`total-salary-${entryId}`);
    if (totalElement) {
        totalElement.textContent = formatCurrency(totalSalary);
    }
    
    // Update the entry data in memory
    const entryIndex = allPayrollData.findIndex(e => e.id === entryId);
    if (entryIndex > -1) {
        allPayrollData[entryIndex].attendanceAllowance = attendanceAllowance;
        allPayrollData[entryIndex].loyaltyBonus = loyaltyBonus;
        allPayrollData[entryIndex].otherBonus = otherBonus;
        allPayrollData[entryIndex].totalSalary = totalSalary;
        localStorage.setItem('payrollData', JSON.stringify(allPayrollData));
    }
}

function updatePayrollPaymentMethod(entryId, paymentMethod) {
    const allPayrollData = JSON.parse(localStorage.getItem('payrollData') || '[]');
    const entryIndex = allPayrollData.findIndex(e => e.id === entryId);
    
    if (entryIndex > -1) {
        allPayrollData[entryIndex].paymentType = paymentMethod;
        localStorage.setItem('payrollData', JSON.stringify(allPayrollData));
        
        // Update the entry in payrollData array
        const entry = payrollData.find(e => e.id === entryId);
        if (entry) {
            entry.paymentType = paymentMethod;
        }
    }
}

function applyDataFilters() {
    const typeFilter = document.getElementById('employeeTypeFilter').value;
    const deptFilter = document.getElementById('departmentFilter').value;
    const searchTerm = document.getElementById('searchEmployee').value.toLowerCase();
    
    return payrollData.filter(entry => {
        if (typeFilter !== 'all') {
            const entryType = (entry.position || entry.type || '').toLowerCase();
            if (typeFilter === 'teacher' && !entryType.includes('teacher')) return false;
            if (typeFilter === 'staff' && entryType.includes('teacher')) return false;
        }
        if (deptFilter !== 'all' && entry.dept.toLowerCase() !== deptFilter.toLowerCase()) return false;
        if (searchTerm && !entry.name.toLowerCase().includes(searchTerm) && !entry.employeeId.toLowerCase().includes(searchTerm)) return false;
        return true;
    });
}

function extractMonthFromPayrollId(payrollId) {
    // Extract month from payroll entry or use current month as default
    const entry = payrollData.find(e => e.id === payrollId);
    if (entry && entry.month) {
        return entry.month;
    }
    return new Date().toISOString().substring(0, 7); // Returns YYYY-MM format
}

function applyFilters() {
    renderPayrollTable();
    updateStats();
}

let currentPayrollDetailsId = null;

function viewPayrollDetails(payrollId) {
    // Try to find in current payroll data first, then in history
    let entry = payrollData.find(e => e.id === payrollId);
    if (!entry) {
        entry = allPayrollHistory.find(e => e.id === payrollId);
    }
    if (!entry) return;
    
    currentPayrollDetailsId = payrollId;
    
    // Calculate values
    const basicSalary = entry.basicSalary || 0;
    const attendanceAllowance = entry.attendanceAllowance || 0;
    const loyaltyBonus = entry.loyaltyBonus || 0;
    const otherBonus = entry.otherBonus || 0;
    const totalSalary = entry.totalSalary || entry.netPay || 0;
    const workingDays = entry.workingDays || 21;
    const leaveDays = entry.leaveDays || 0;
    const annualLeave = entry.annualLeave || 0;
    const daysAbsent = entry.daysAbsent || 0;
    const daysPresent = entry.daysPresent || 0;
    const dateOfJoining = entry.dateOfJoining ? new Date(entry.dateOfJoining).toLocaleDateString('en-GB') : '-';
    const paymentDate = entry.paymentDate || (entry.withdrawnTime ? entry.withdrawnTime.split(' ')[0] : '-');
    const statusText = entry.status === 'draft' ? 'Draft' : entry.status === 'withdrawn' ? 'Paid' : entry.status;
    const statusClass = entry.status === 'draft' ? 'warning' : entry.status === 'withdrawn' ? 'active' : '';
    
    const content = `
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            <!-- Employee Information -->
            <div style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb;">
                <h4 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-user" style="color: #4A90E2;"></i> Employee Information
                </h4>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Payroll ID</span>
                        <span style="font-weight: 600; color: #111827;">${entry.id}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Employee Name</span>
                        <span style="font-weight: 600; color: #111827;">${entry.name}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Employee ID</span>
                        <span style="font-weight: 500; color: #111827;">${entry.employeeId}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Position</span>
                        <span style="font-weight: 500; color: #111827;">${entry.position || entry.type || '-'}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Department</span>
                        <span style="font-weight: 500; color: #111827;">${entry.dept}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                        <span style="color: #6b7280; font-size: 13px;">Date of Joining</span>
                        <span style="font-weight: 500; color: #111827;">${dateOfJoining}</span>
                    </div>
                </div>
            </div>
            
            <!-- Salary Package -->
            <div style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb;">
                <h4 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-wallet" style="color: #10b981;"></i> Salary Package
                </h4>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Basic Salary</span>
                        <span style="font-weight: 500; color: #111827;">${formatCurrency(basicSalary)}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Attendance Allowance</span>
                        <span style="font-weight: 500; color: #111827;">${formatCurrency(attendanceAllowance)}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Loyalty Bonus</span>
                        <span style="font-weight: 500; color: #111827;">${formatCurrency(loyaltyBonus)}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Other Bonus</span>
                        <span style="font-weight: 500; color: #111827;">${formatCurrency(otherBonus)}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; margin-top: 4px; border-top: 2px solid #e5e7eb;">
                        <span style="font-weight: 700; color: #111827; font-size: 15px;">Total Salary</span>
                        <span style="font-weight: 700; color: #10b981; font-size: 18px;">${formatCurrency(totalSalary)}</span>
                    </div>
                </div>
            </div>
            
            <!-- Attendance Summary -->
            <div style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb;">
                <h4 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-calendar-check" style="color: #3b82f6;"></i> Attendance Summary
                </h4>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Working Days</span>
                        <span style="font-weight: 500; color: #111827;">${workingDays}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Days Present</span>
                        <span style="font-weight: 600; color: #10b981;">${daysPresent}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Leave Days</span>
                        <span style="font-weight: 500; color: #f59e0b;">${leaveDays}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Annual Leave</span>
                        <span style="font-weight: 500; color: #111827;">${annualLeave}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                        <span style="color: #6b7280; font-size: 13px;">Days Absent</span>
                        <span style="font-weight: 500; color: #ef4444;">${daysAbsent}</span>
                    </div>
                </div>
            </div>
            
            <!-- Payment Information -->
            <div style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb;">
                <h4 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-credit-card" style="color: #8b5cf6;"></i> Payment Information
                </h4>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Status</span>
                        <span class="status-badge ${statusClass}">${statusText}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Payment Method</span>
                        <span style="font-weight: 500; color: #111827;">${entry.paymentType || '-'}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Payment Date</span>
                        <span style="font-weight: 500; color: #111827;">${paymentDate}</span>
                    </div>
                    ${entry.withdrawnBy ? `
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Withdrawn By</span>
                        <span style="font-weight: 500; color: #111827;">${entry.withdrawnBy}</span>
                    </div>
                    ` : ''}
                    ${entry.withdrawnTime ? `
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px;">Withdrawal Time</span>
                        <span style="font-weight: 500; color: #111827;">${entry.withdrawnTime}</span>
                    </div>
                    ` : ''}
                    ${entry.remark ? `
                    <div style="padding: 8px 0; margin-top: 4px; border-top: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 13px; display: block; margin-bottom: 4px;">Remark</span>
                        <span style="font-weight: 500; color: #111827; font-size: 13px;">${entry.remark}</span>
                    </div>
                    ` : ''}
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('payrollDetailsContent').innerHTML = content;
    document.getElementById('printPayrollBtn').style.display = 'inline-flex';
    document.getElementById('payrollDetailsModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closePayrollDetailsModal() {
    document.getElementById('payrollDetailsModal').style.display = 'none';
    document.body.style.overflow = '';
    currentPayrollDetailsId = null;
}

function printPayrollDetails() {
    if (!currentPayrollDetailsId) return;
    
    const entry = payrollData.find(e => e.id === currentPayrollDetailsId);
    if (!entry) return;
    
    const printWindow = window.open('', '_blank');
    const content = document.getElementById('payrollDetailsContent').innerHTML;
    
    printWindow.document.write(`
        <html>
        <head>
            <title>Payroll Details - ${entry.id}</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; background: white; }
                .print-header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #e5e7eb; padding-bottom: 20px; }
                .print-header h2 { margin: 0; color: #111827; }
                .print-header p { margin: 5px 0; color: #6b7280; }
                ${document.getElementById('payrollDetailsContent').querySelector('style')?.innerHTML || ''}
            </style>
        </head>
        <body>
            <div class="print-header">
                <h2>Payroll Details</h2>
                <p>Smart Campus Nova Hub</p>
                <p>Payroll ID: ${entry.id}</p>
            </div>
            ${content}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Close modal on overlay click
document.getElementById('payrollDetailsModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closePayrollDetailsModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        if (document.getElementById('payrollDetailsModal').style.display === 'flex') {
            closePayrollDetailsModal();
        }
    }
});

function editPayrollDetails(payrollId) {
    // In real app, redirect to edit page similar to invoice-edit
    alert(`Edit payroll details for ${payrollId} - would redirect to edit page`);
}

function viewWithdrawalReceipt(payrollId) {
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry) return;
    
    // Create custom withdrawal receipt dialog
    const receiptDialog = document.createElement('div');
    receiptDialog.className = 'receipt-dialog-overlay';
    receiptDialog.style.display = 'flex';
    
    receiptDialog.innerHTML = `
        <div class="receipt-dialog-content">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-receipt"></i> Withdrawal Receipt</h3>
                <button class="receipt-close" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="receipt-dialog-body">
                <div class="receipt-info">
                    <div class="receipt-row">
                        <span class="receipt-label">Payroll ID:</span>
                        <span class="receipt-value">${entry.id}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Employee Name:</span>
                        <span class="receipt-value">${entry.name}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Position:</span>
                        <span class="receipt-value">${entry.position || entry.type || '-'}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Employee ID:</span>
                        <span class="receipt-value">${entry.employeeId}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Total Salary:</span>
                        <span class="receipt-value"><strong>${formatCurrency(entry.totalSalary || entry.netPay || 0)}</strong></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Method:</span>
                        <span class="receipt-value">${entry.paymentType || '-'}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Date:</span>
                        <span class="receipt-value">${entry.paymentDate || (entry.withdrawnTime ? entry.withdrawnTime.split(' ')[0] : '-')}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Withdrawn By:</span>
                        <span class="receipt-value">${entry.withdrawnBy || '-'}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Withdrawal Time:</span>
                        <span class="receipt-value">${entry.withdrawnTime || '-'}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Remark:</span>
                        <span class="receipt-value">${entry.remark || '-'}</span>
                    </div>
                </div>
            </div>
            <div class="receipt-dialog-actions">
                <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i> Close
                </button>
                <button class="simple-btn primary" onclick="printWithdrawalReceipt('${payrollId}')">
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

function printWithdrawalReceipt(payrollId) {
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Withdrawal Receipt - ${entry.id}</title>
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
                <h2>Withdrawal Receipt</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            <div class="receipt-details">
                <div class="receipt-row">
                    <span class="receipt-label">Payroll ID:</span>
                    <span class="receipt-value">${entry.id}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Employee Name:</span>
                    <span class="receipt-value">${entry.name}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Position:</span>
                    <span class="receipt-value">${entry.position || entry.type || '-'}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Employee ID:</span>
                    <span class="receipt-value">${entry.employeeId}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Total Salary:</span>
                    <span class="receipt-value"><strong>${formatCurrency(entry.totalSalary || entry.netPay || 0)}</strong></span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Method:</span>
                    <span class="receipt-value">${entry.paymentType || '-'}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Date:</span>
                    <span class="receipt-value">${entry.paymentDate || (entry.withdrawnTime ? entry.withdrawnTime.split(' ')[0] : '-')}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Withdrawn By:</span>
                    <span class="receipt-value">${entry.withdrawnBy || '-'}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Withdrawal Time:</span>
                    <span class="receipt-value">${entry.withdrawnTime || '-'}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Remark:</span>
                    <span class="receipt-value">${entry.remark || '-'}</span>
                </div>
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

function processWithdrawal(payrollId) {
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry || entry.status !== 'draft') {
        showToast('Can only process withdrawal for draft payrolls', 'warning');
        return;
    }
    
    currentWithdrawalId = payrollId;
    const totalAmount = entry.totalSalary || entry.netPay || 0;
    document.getElementById('withdrawalEmployeeInfo').textContent = 
        `Processing withdrawal for: ${entry.name} (${entry.employeeId}) - ${formatCurrency(totalAmount)}`;
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
        showToast('Please enter both Receptionist ID and Name', 'warning');
        return;
    }
    
    const entry = payrollData.find(e => e.id === currentWithdrawalId);
    if (!entry) return;
    
    const now = new Date();
    const paymentDateStr = now.toLocaleDateString('en-GB'); // DD/MM/YYYY format
    
    const remark = document.getElementById('withdrawalRemark').value || 'Send Payslip';
    
    entry.status = 'withdrawn';
    entry.withdrawnBy = `${receptionistId} - ${receptionistName}`;
    entry.withdrawnTime = now.toLocaleString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit',
        hour12: false 
    });
    entry.paymentDate = paymentDateStr;
    entry.remark = remark;
    
    // Save to localStorage
    localStorage.setItem('payrollData', JSON.stringify(payrollData));
    
    closeWithdrawalModal();
    renderPayrollTable();
    updateStats();
    showToast(`Withdrawal for ${entry.name} (${entry.employeeId}) recorded successfully`, 'success');
}

function updateStats() {
    // Apply filters
    const filteredData = applyDataFilters();
    
    const total = filteredData.reduce((sum, entry) => sum + (entry.totalSalary || entry.netPay || 0), 0);
    const withdrawn = filteredData.filter(e => e.status === 'withdrawn').length;
    const pending = filteredData.filter(e => e.status === 'draft').length;
    const teachers = filteredData.filter(e => (e.position || e.type || '').toLowerCase().includes('teacher')).length;
    const staff = filteredData.filter(e => !(e.position || e.type || '').toLowerCase().includes('teacher')).length;
    
    // Update top stats cards
    document.getElementById('totalPayout').textContent = formatCurrency(total);
    document.getElementById('totalEmployees').textContent = filteredData.length;
    document.getElementById('withdrawnCount').textContent = `${withdrawn} / ${filteredData.length}`;
    
    const percentage = filteredData.length > 0 ? Math.round((withdrawn / filteredData.length) * 100) : 0;
    document.querySelector('#withdrawnCount').nextElementSibling.textContent = `${percentage}% completed`;
    
    // Update stat month display
    const statMonth = document.getElementById('statMonth');
    if (statMonth) {
        statMonth.textContent = 'All Months';
    }
}

// Tab Switching Function
function switchPayrollView(view) {
    // Hide all views
    document.querySelectorAll('.attendance-view-content').forEach(content => {
        content.style.display = 'none';
    });
    
    // Remove active class from all tabs
    document.querySelectorAll('.view-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected view
    const viewElement = document.getElementById(`${view}-payroll-view`);
    if (viewElement) {
        viewElement.style.display = 'block';
    }
    
    // Add active class to selected tab
    const activeTab = document.querySelector(`.view-tab[data-view="${view}"]`);
    if (activeTab) {
        activeTab.classList.add('active');
    }
    
    // Initialize payroll history if switching to that tab
    if (view === 'payroll-history') {
        if (typeof initializeDemoPayrollHistory === 'function') {
            initializeDemoPayrollHistory();
        }
        if (typeof loadPayrollHistory === 'function') {
            loadPayrollHistory();
        }
    }
}

// Payroll History Functions
let allPayrollHistory = [];
let filteredHistory = [];

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
        { key: '2024-10', name: 'October 2024' },
        { key: '2024-09', name: 'September 2024' },
        { key: '2024-08', name: 'August 2024' },
        { key: '2024-07', name: 'July 2024' },
        { key: '2024-06', name: 'June 2024' }
    ];
    
    const employees = [
        { name: 'Emma Wilson', type: 'Teacher', position: 'Teacher', dept: 'Mathematics', employeeId: 'T001', basicSalary: 350000 },
        { name: 'James Anderson', type: 'Teacher', position: 'Teacher', dept: 'Science', employeeId: 'T002', basicSalary: 350000 },
        { name: 'Sophia Davis', type: 'Teacher', position: 'Teacher', dept: 'English', employeeId: 'T003', basicSalary: 350000 },
        { name: 'Ava Martinez', type: 'Staff', position: 'Administrator', dept: 'Reception', employeeId: 'E001', basicSalary: 250000 },
        { name: 'Ethan Garcia', type: 'Staff', position: 'IT Support', dept: 'IT', employeeId: 'E002', basicSalary: 280000 }
    ];
    
    let payrollCounter = 1;
    months.forEach(month => {
        employees.forEach((employee, idx) => {
            const isWithdrawn = Math.random() > 0.1; // 90% withdrawal rate
            const paymentType = isWithdrawn ? ['Bank Transfer', 'Cash', 'KBZ Pay'][Math.floor(Math.random() * 3)] : 'Bank Transfer';
            
            // Generate attendance data
            const workingDays = 21;
            const leaveDays = Math.floor(Math.random() * 3);
            const annualLeave = 0;
            const daysAbsent = Math.floor(Math.random() * 2);
            const daysPresent = workingDays - leaveDays - daysAbsent;
            
            // Generate payment data
            const basicSalary = employee.basicSalary || 300000;
            const attendanceAllowance = daysPresent >= 20 ? (employee.type === 'Teacher' ? 30000 : 20000) : 0;
            const loyaltyBonus = 0;
            const otherBonus = 0;
            const totalSalary = basicSalary + attendanceAllowance + loyaltyBonus + otherBonus;
            
            const paymentDate = isWithdrawn ? `${month.key}-${String(20 + idx).padStart(2, '0')}` : null;
            const withdrawnTime = isWithdrawn ? `${month.key}-${String(20 + idx).padStart(2, '0')} 14:${String(idx * 10).padStart(2, '0')}:00` : '';
            
            const entry = {
                id: `PAY-${month.key}-${String(payrollCounter).padStart(3, '0')}`,
                month: month.key,
                monthName: month.name,
                employeeId: employee.employeeId,
                name: employee.name,
                type: employee.type,
                position: employee.position,
                dept: employee.dept,
                workingDays: workingDays,
                daysPresent: daysPresent,
                leaveDays: leaveDays,
                annualLeave: annualLeave,
                daysAbsent: daysAbsent,
                basicSalary: basicSalary,
                attendanceAllowance: attendanceAllowance,
                loyaltyBonus: loyaltyBonus,
                otherBonus: otherBonus,
                totalSalary: totalSalary,
                netPay: totalSalary,
                status: isWithdrawn ? 'withdrawn' : 'draft',
                paymentType: paymentType,
                paymentDate: paymentDate,
                withdrawnBy: isWithdrawn ? 'Reception Staff' : '',
                withdrawnTime: withdrawnTime
            };
            demoHistory.push(entry);
            payrollCounter++;
        });
    });
    
    allPayrollHistory = demoHistory;
    localStorage.setItem('payrollHistory', JSON.stringify(allPayrollHistory));
}

function loadPayrollHistory() {
    const monthFilter = document.getElementById('historyMonthFilter');
    if (!monthFilter) return;
    
    const selectedMonth = monthFilter.value;
    const monthName = monthFilter.options[monthFilter.selectedIndex].text;
    
    // Update month display
    const historySelectedMonthDisplay = document.getElementById('historySelectedMonthDisplay');
    if (historySelectedMonthDisplay) {
        historySelectedMonthDisplay.textContent = monthName;
    }
    
    // Filter by month
    filteredHistory = allPayrollHistory.filter(entry => entry.month === selectedMonth);
    
    // Update stats
    updateHistoryMonthStats();
    
    // Apply other filters and render
    applyPayrollHistoryFilters();
}

function updateHistoryMonthStats() {
    const totalPayroll = filteredHistory.length;
    const withdrawnEntries = filteredHistory.filter(entry => entry.status === 'withdrawn');
    const totalAmount = withdrawnEntries.reduce((sum, entry) => sum + (entry.totalSalary || entry.netPay || 0), 0);
    
    const historyTotalPayroll = document.getElementById('historyTotalPayroll');
    const historyWithdrawnCount = document.getElementById('historyWithdrawnCount');
    const historyTotalAmount = document.getElementById('historyTotalAmount');
    
    if (historyTotalPayroll) historyTotalPayroll.textContent = totalPayroll;
    if (historyWithdrawnCount) historyWithdrawnCount.textContent = `${withdrawnEntries.length} / ${totalPayroll}`;
    if (historyTotalAmount) historyTotalAmount.textContent = formatCurrency(totalAmount);
}

function applyPayrollHistoryFilters() {
    const statusFilter = document.getElementById('historyStatusFilter');
    const typeFilter = document.getElementById('historyTypeFilter');
    const deptFilter = document.getElementById('historyDeptFilter');
    const searchText = document.getElementById('historySearchEmployee');
    
    if (!statusFilter || !typeFilter || !deptFilter || !searchText) return;
    
    const statusValue = statusFilter.value;
    const typeValue = typeFilter.value;
    const deptValue = deptFilter.value;
    const searchValue = searchText.value.toLowerCase();
    
    let displayHistory = [...filteredHistory];
    
    if (statusValue !== 'all') {
        displayHistory = displayHistory.filter(entry => entry.status === statusValue);
    }
    
    if (typeValue !== 'all') {
        displayHistory = displayHistory.filter(entry => entry.type === typeValue);
    }
    
    if (deptValue !== 'all') {
        displayHistory = displayHistory.filter(entry => entry.dept === deptValue);
    }
    
    if (searchValue) {
        displayHistory = displayHistory.filter(entry => 
            entry.name.toLowerCase().includes(searchValue) || 
            entry.employeeId.toLowerCase().includes(searchValue) ||
            entry.id.toLowerCase().includes(searchValue)
        );
    }
    
    renderPayrollHistoryTable(displayHistory);
}

function renderPayrollHistoryTable(data) {
    const tbody = document.getElementById('historyTableBody');
    if (!tbody) return;
    
    // Calculate colspan based on collapsed state
    let colspan = 4; // No, Employee, Position, Department
    colspan += columnGroups['attendance-history'] ? 5 : 1;
    colspan += columnGroups['payments-history'] ? 5 : 1;
    colspan += columnGroups['payment-info-history'] ? 3 : 1;
    colspan += 1; // Actions
    
    if (data.length === 0) {
        tbody.innerHTML = `<tr><td colspan="${colspan}" style="text-align: center; color: #999; padding: 40px;"><i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>No payroll history found for selected filters</td></tr>`;
        return;
    }
    
    // Determine display state for expandable cells
    const attendanceExpanded = columnGroups['attendance-history'];
    const paymentsExpanded = columnGroups['payments-history'];
    const paymentInfoExpanded = columnGroups['payment-info-history'];
    
    tbody.innerHTML = data.map((entry, index) => {
        // Get attendance data (use defaults if not available)
        const workingDays = entry.workingDays || 21;
        const daysPresent = entry.daysPresent || workingDays;
        const leaveDays = entry.leaveDays || 0;
        const annualLeave = entry.annualLeave || 0;
        const daysAbsent = entry.daysAbsent || 0;
        
        // Get payment data
        const basicSalary = entry.basicSalary || entry.netPay || 0;
        const attendanceAllowance = entry.attendanceAllowance || 0;
        const loyaltyBonus = entry.loyaltyBonus || 0;
        const otherBonus = entry.otherBonus || 0;
        const totalSalary = entry.totalSalary || entry.netPay || 0;
        
        // Payment info
        const paymentType = entry.paymentType || '-';
        const withdrawalDate = entry.paymentDate || (entry.withdrawnTime ? entry.withdrawnTime.split(' ')[0] : '-');
        const statusBadge = entry.status === 'withdrawn' 
            ? '<span class="status-badge active">Withdrawn</span>' 
            : '<span class="status-badge warning">Draft</span>';
        
        // Actions
        const actions = `
            <div style="display: flex; gap: 6px; justify-content: center; flex-direction: column; align-items: center;">
                <button class="payroll-action-btn view-btn" onclick="viewPayrollDetails('${entry.id}')" title="View Details">
                    <i class="fas fa-eye"></i> View
                </button>
                ${entry.status === 'withdrawn' ? `
                    <button class="payroll-action-btn receipt-btn" onclick="viewHistoryReceipt('${entry.id}')" title="View Receipt">
                        <i class="fas fa-receipt"></i> Receipt
                    </button>
                ` : ''}
            </div>
        `;
        
        return `
            <tr class="payroll-row" data-entry-id="${entry.id}" onclick="toggleAllColumnGroupsHistory()" style="cursor: pointer;">
                <td>${index + 1}</td>
                <td>
                    <div style="display: flex; flex-direction: column;">
                        <strong style="font-size: 14px; color: #111827; margin-bottom: 2px;">${entry.name}</strong>
                        <small style="color: #6b7280; font-size: 12px;">${entry.employeeId}</small>
                    </div>
                </td>
                <td>${entry.position || entry.type || '-'}</td>
                <td>${entry.dept}</td>
                <!-- Attendance Group Columns -->
                <td class="col-attendance expandable" data-group="attendance-history" style="display: ${attendanceExpanded ? '' : 'none'};">${workingDays}</td>
                <td class="col-attendance expandable" data-group="attendance-history" style="display: ${attendanceExpanded ? '' : 'none'};">
                    <span style="color: #10b981; font-weight: 600;">${daysPresent}</span>
                </td>
                <td class="col-attendance expandable" data-group="attendance-history" style="display: ${attendanceExpanded ? '' : 'none'};">
                    <span style="color: #f59e0b;">${leaveDays}</span>
                </td>
                <td class="col-attendance expandable" data-group="attendance-history" style="display: ${attendanceExpanded ? '' : 'none'};">${annualLeave}</td>
                <td class="col-attendance summary-col" data-group="attendance-history">
                    <span style="color: #ef4444;">${daysAbsent}</span>
                    ${!attendanceExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px;">${daysPresent}/${workingDays} present</small>` : ''}
                </td>
                <!-- Payments Group Columns -->
                <td class="col-payments expandable" data-group="payments-history" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(basicSalary)}</td>
                <td class="col-payments expandable" data-group="payments-history" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(attendanceAllowance)}</td>
                <td class="col-payments expandable" data-group="payments-history" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(loyaltyBonus)}</td>
                <td class="col-payments expandable" data-group="payments-history" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(otherBonus)}</td>
                <td class="col-payments summary-col" data-group="payments-history">
                    <strong style="color: #10b981;">${formatCurrency(totalSalary)}</strong>
                    ${!paymentsExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px; font-weight: normal;">Total</small>` : ''}
                </td>
                <!-- Payment Info Group Columns -->
                <td class="col-payment-info expandable" data-group="payment-info-history" style="display: ${paymentInfoExpanded ? '' : 'none'};">${paymentType}</td>
                <td class="col-payment-info expandable" data-group="payment-info-history" style="display: ${paymentInfoExpanded ? '' : 'none'};">${withdrawalDate}</td>
                <td class="col-payment-info summary-col" data-group="payment-info-history">${statusBadge}</td>
                <td onclick="event.stopPropagation();" style="cursor: default;">${actions}</td>
            </tr>
        `;
    }).join('');
    
    // Apply current collapse state after rendering
    Object.keys(columnGroups).forEach(groupName => {
        if (groupName.includes('history') && !columnGroups[groupName]) {
            toggleColumnGroup(groupName);
        }
    });
}

function viewHistoryReceipt(payrollId) {
    // Try to find in history first, then in current payroll data
    let entry = allPayrollHistory.find(e => e.id === payrollId);
    if (!entry) {
        entry = payrollData.find(e => e.id === payrollId);
    }
    if (!entry || entry.status !== 'withdrawn') return;
    
    // Create receipt dialog
    const dialog = document.createElement('div');
    dialog.className = 'receipt-dialog-overlay';
    dialog.style.display = 'flex';
    
    dialog.innerHTML = `
        <div class="receipt-dialog-content">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-receipt"></i> Withdrawal Receipt</h3>
                <button class="receipt-close" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="receipt-dialog-body">
                <div class="receipt-info">
                    <div class="receipt-row">
                        <span class="receipt-label">Payroll ID:</span>
                        <span class="receipt-value">${entry.id}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Employee Name:</span>
                        <span class="receipt-value">${entry.name}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Amount:</span>
                        <span class="receipt-value">$${entry.netPay.toFixed(2)}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Type:</span>
                        <span class="receipt-value">${entry.paymentType}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Withdrawn By:</span>
                        <span class="receipt-value">${entry.withdrawnBy}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Withdrawal Time:</span>
                        <span class="receipt-value">${entry.withdrawnTime}</span>
                    </div>
                </div>
            </div>
            <div class="receipt-dialog-actions">
                <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i> Close
                </button>
                <button class="simple-btn primary" onclick="printHistoryReceipt('${entry.id}')">
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

function printHistoryReceipt(payrollId) {
    // Try to find in history first, then in current payroll data
    let entry = allPayrollHistory.find(e => e.id === payrollId);
    if (!entry) {
        entry = payrollData.find(e => e.id === payrollId);
    }
    if (!entry) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Withdrawal Receipt - ${entry.id}</title>
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
                <h2>Withdrawal Receipt</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            <div class="receipt-details">
                <div class="receipt-row">
                    <span class="receipt-label">Payroll ID:</span>
                    <span class="receipt-value">${entry.id}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Employee Name:</span>
                    <span class="receipt-value">${entry.name}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Amount:</span>
                    <span class="receipt-value">$${entry.netPay.toFixed(2)}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Type:</span>
                    <span class="receipt-value">${entry.paymentType}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Withdrawn By:</span>
                    <span class="receipt-value">${entry.withdrawnBy}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Withdrawal Time:</span>
                    <span class="receipt-value">${entry.withdrawnTime}</span>
                </div>
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}
</script>

<style>
/* Payroll Management Tabs Styling */
.attendance-view-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
    border-bottom: 2px solid #e5e7eb;
}

.view-tab {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.view-tab:hover {
    color: #4A90E2;
    background: #f9fafb;
}

.view-tab.active {
    color: #4A90E2;
    border-bottom-color: #4A90E2;
}

.view-tab i {
    font-size: 16px;
}

.attendance-view-content {
    /* Animation removed */
}

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

/* Clean Payroll Grouped Table */
.payroll-grouped-table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
}

.group-header-row {
    background: #f8f9fa;
}

.group-header {
    background: #f8f9fa;
    border: 1px solid #e0e7ff;
    border-bottom: 2px solid #c7d2fe;
    padding: 10px 16px;
    text-align: center;
    font-weight: 600;
    font-size: 13px;
    color: #374151;
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
}

.payroll-row {
    transition: background-color 0.2s ease;
}

.payroll-row:hover {
    background-color: #f9fafb;
}

.group-header-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.group-icon {
    font-size: 12px;
    /* Transition removed */
    color: #6b7280;
}

.group-header.toggleable:hover .group-icon {
    color: #4A90E2;
}

.group-header span {
    display: inline-block;
}

/* Expandable columns - hidden when collapsed */
.expandable {
    /* Transition removed */
    overflow: hidden;
}

/* Summary column - always visible */
.summary-col {
    font-weight: 600;
}


.column-header-row th {
    background: #ffffff;
    border: 1px solid #e0e7ff;
    border-top: none;
    padding: 10px 14px;
    text-align: left;
    font-weight: 600;
    font-size: 12px;
    color: #6b7280;
    white-space: nowrap;
    transition: all 0.2s ease;
}

.column-header-row th[data-group].selected {
    background: #eff6ff;
    border-color: #4A90E2;
    color: #1e40af;
}

/* Column width classes */
.col-no {
    width: 50px;
    text-align: center;
}

.col-employee {
    min-width: 200px;
}

.col-position {
    min-width: 120px;
}

.col-department {
    min-width: 120px;
}

.col-status {
    min-width: 100px;
    text-align: center;
}

.col-actions {
    min-width: 120px;
    text-align: center;
}

.col-payments,
.col-attendance,
.col-additional,
.col-payment-info {
    min-width: 120px;
    transition: all 0.2s ease;
}

.col-payments.selected,
.col-attendance.selected,
.col-additional.selected {
    background: #eff6ff;
}

/* Payroll Table Row Styling */
.payroll-row {
    transition: background-color 0.2s ease;
}

.payroll-row:hover {
    background-color: #f9fafb;
}

.payroll-row td {
    vertical-align: middle;
    padding: 12px 14px;
    border: 1px solid #e0e7ff;
    font-size: 13px;
    color: #374151;
}

.payroll-row td[data-group].selected {
    background: #eff6ff;
}

.payroll-row td.col-no {
    text-align: center;
    color: #6b7280;
}

.payroll-row td.col-status {
    text-align: center;
}

.payroll-action-btn {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.payroll-action-btn.view-btn {
    background: #eff6ff;
    color: #2563eb;
    border: 1px solid #bfdbfe;
}

.payroll-action-btn.view-btn:hover {
    background: #dbeafe;
    border-color: #93c5fd;
}

.payroll-action-btn.process-btn {
    background: #dcfce7;
    color: #16a34a;
    border: 1px solid #86efac;
}

.payroll-action-btn.process-btn:hover {
    background: #bbf7d0;
    border-color: #4ade80;
}

.payroll-action-btn.receipt-btn {
    background: #fef3c7;
    color: #d97706;
    border: 1px solid #fde68a;
}

.payroll-action-btn.receipt-btn:hover {
    background: #fde68a;
    border-color: #fcd34d;
}

.payroll-action-btn i {
    font-size: 11px;
}

/* Status Badge Enhancements */
.status-badge.warning {
    background: #fef3c7;
    color: #d97706;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* Hide number input spinners */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}

.status-badge.active {
    background: #dcfce7;
    color: #166534;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
</style>

<?php
$content = ob_get_clean();

// Detect portal from URL to use appropriate layout
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';

include __DIR__ . '/../components/' . $layout;
?>