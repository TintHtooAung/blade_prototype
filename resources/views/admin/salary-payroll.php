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

<!-- Quick Payroll KPIs -->
<div class="stats-grid-secondary vertical-stats">
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
        <div class="simple-section">
    <div class="simple-header">
        <h3>Payroll Management</h3>
        <div style="display: flex; gap: 12px;">
            <button class="simple-btn" onclick="generatePayroll()" id="generateBtn">
                <i class="fas fa-calculator"></i> Generate Payroll (This Month)
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <label style="font-weight: 600; color: #666;">Filters:</label>
            <select class="filter-select" id="monthFilter" onchange="applyFilters()">
                <option value="all">All Months</option>
            </select>
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
                    <th colspan="5" class="group-header toggleable" data-group="payments" id="group-header-payments">
                        <div class="group-header-content" onclick="toggleColumnGroup('payments')">
                            <i class="fas fa-chevron-down group-icon" id="icon-payments"></i>
                            <span>Payments</span>
                        </div>
                    </th>
                    <th colspan="5" class="group-header toggleable" data-group="attendance" id="group-header-attendance">
                        <div class="group-header-content" onclick="toggleColumnGroup('attendance')">
                            <i class="fas fa-chevron-down group-icon" id="icon-attendance"></i>
                            <span>Attendance</span>
                        </div>
                    </th>
                    <th colspan="3" class="group-header toggleable" data-group="additional" id="group-header-additional">
                        <div class="group-header-content" onclick="toggleColumnGroup('additional')">
                            <i class="fas fa-chevron-down group-icon" id="icon-additional"></i>
                            <span>Additional Info</span>
                        </div>
                    </th>
                    <th rowspan="2" class="col-status">Status</th>
                    <th rowspan="2" class="col-actions">Actions</th>
                </tr>
                <!-- Column Header Row -->
                <tr class="column-header-row">
                    <!-- Payments Sub-columns -->
                    <th class="col-payments expandable" data-group="payments">Basic Salary</th>
                    <th class="col-payments expandable" data-group="payments">Attendance Allowance</th>
                    <th class="col-payments expandable" data-group="payments">Loyalty Bonus</th>
                    <th class="col-payments expandable" data-group="payments">Other Bonus</th>
                    <th class="col-payments summary-col" data-group="payments">Total Salary</th>
                    <!-- Attendance Sub-columns -->
                    <th class="col-attendance expandable" data-group="attendance">Working Days</th>
                    <th class="col-attendance expandable" data-group="attendance">Days Present</th>
                    <th class="col-attendance expandable" data-group="attendance">Leave Days</th>
                    <th class="col-attendance expandable" data-group="attendance">Annual Leave</th>
                    <th class="col-attendance summary-col" data-group="attendance">Days Absent</th>
                    <!-- Additional Info Sub-columns -->
                    <th class="col-additional expandable" data-group="additional">Date of Joining</th>
                    <th class="col-additional expandable" data-group="additional">Payment Method</th>
                    <th class="col-additional summary-col" data-group="additional">Payment Date</th>
                </tr>
            </thead>
            <tbody id="payrollTableBody">
                <tr class="no-data-row">
                    <td colspan="20" style="text-align:center; padding:40px; color:#999;">
                        <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                        No payroll generated yet. Click "Generate Payroll" to create payroll for this month.
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
        <!-- Payroll History Table -->
        <div class="simple-section">
            <div class="simple-header">
                <h3><i class="fas fa-history"></i> Payroll History</h3>
                <select class="filter-select" id="historyMonthFilter" onchange="loadPayrollHistory()" style="min-width: 180px;">
                    <option value="2025-01">January 2025</option>
                    <option value="2024-12" selected>December 2024</option>
                    <option value="2024-11">November 2024</option>
                    <option value="2024-10">October 2024</option>
                    <option value="2024-09">September 2024</option>
                </select>
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
                            <td colspan="9" style="text-align: center; color: #999; padding: 40px;">Loading payroll history...</td>
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
        document.getElementById('generateBtn').style.display = 'none';
        renderPayrollTable();
        updateStats();
    }
    
    // Populate month filter dropdown
    populateMonthFilter();
});

function populateMonthFilter() {
    const monthFilter = document.getElementById('monthFilter');
    if (!monthFilter) return;
    
    // Get unique months from payroll data
    const monthSet = new Set();
    payrollData.forEach(entry => {
        if (entry.month) {
            monthSet.add(entry.month);
        }
    });
    
    // Sort months (newest first)
    const sortedMonths = Array.from(monthSet).sort((a, b) => b.localeCompare(a));
    
    // Month names for display
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
    
    // Clear existing options except "All Months"
    monthFilter.innerHTML = '<option value="all">All Months</option>';
    
    // Add month options
    sortedMonths.forEach(monthKey => {
        const [year, month] = monthKey.split('-');
        const monthIndex = parseInt(month) - 1;
        const monthName = monthNames[monthIndex];
        const option = document.createElement('option');
        option.value = monthKey;
        option.textContent = `${monthName} ${year}`;
        monthFilter.appendChild(option);
    });
    
    // If no months in data, add current month and past 6 months as defaults
    if (sortedMonths.length === 0) {
        const currentDate = new Date();
        for (let i = 0; i < 7; i++) {
            const date = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1);
            const monthValue = date.toISOString().substring(0, 7); // YYYY-MM format
            const monthName = date.toLocaleDateString('en-US', { year: 'numeric', month: 'long' });
            const option = document.createElement('option');
            option.value = monthValue;
            option.textContent = monthName;
            monthFilter.appendChild(option);
        }
    }
}

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

function generatePayroll() {
    const now = new Date();
    const currentYear = now.getFullYear();
    const currentMonth = String(now.getMonth() + 1).padStart(2, '0');
    const monthKey = `${currentYear}-${currentMonth}`;
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthName = monthNames[now.getMonth()];
    
    if (!confirm(`Generate payroll for all employees for ${monthName} ${currentYear}?\n\nThis will create payroll entries for all teachers and staff.`)) {
        return;
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
            
            document.getElementById('generateBtn').style.display = 'none';
            
            // Save to localStorage
            localStorage.setItem('payrollData', JSON.stringify(payrollData));
            
            // Update month filter with new month
            populateMonthFilter();
            
            renderPayrollTable();
            updateStats();
            showToast(`${payrollData.length} payroll entries generated successfully for ${monthName} ${currentYear}`, 'success');
}

// Column group expand/collapse state - must be defined before renderPayrollTable
const columnGroups = {
    payments: true,    // true = expanded, false = collapsed
    attendance: true,
    additional: true
};

function renderPayrollTable() {
    const tbody = document.getElementById('payrollTableBody');
    if (payrollData.length === 0) {
        // Calculate colspan based on collapsed state
        let colspan = 4; // No, Employee, Position, Department
        colspan += columnGroups.payments ? 5 : 1;
        colspan += columnGroups.attendance ? 5 : 1;
        colspan += columnGroups.additional ? 3 : 1;
        colspan += 2; // Status, Actions
        
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="${colspan}" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No payroll generated yet. Click "Generate Payroll" to create payroll for this month.
            </td>
        </tr>`;
        return;
    }
    
    let filteredData = applyDataFilters();
    
    tbody.innerHTML = filteredData.map((entry, index) => {
        const statusText = entry.status === 'draft' ? 'Draft' : entry.status === 'withdrawn' ? 'Paid' : entry.status;
        const statusClass = entry.status === 'draft' ? 'warning' : entry.status === 'withdrawn' ? 'active' : '';
        
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
        
        // Actions
        const actions = entry.status === 'draft' ? `
            <div style="display: flex; gap: 6px; justify-content: center;">
                <button class="payroll-action-btn view-btn" onclick="viewPayrollDetails('${entry.id}')" title="View Details">
                    <i class="fas fa-eye"></i> View
                </button>
                <button class="payroll-action-btn process-btn" onclick="processWithdrawal('${entry.id}')" title="Process Payment">
                    <i class="fas fa-check-circle"></i> Pay
                </button>
            </div>
        ` : `
            <div style="display: flex; gap: 6px; justify-content: center;">
                <button class="payroll-action-btn view-btn" onclick="viewPayrollDetails('${entry.id}')" title="View Payroll">
                    <i class="fas fa-file-invoice-dollar"></i> View
                </button>
                <button class="payroll-action-btn receipt-btn" onclick="viewWithdrawalReceipt('${entry.id}')" title="View Receipt">
                    <i class="fas fa-receipt"></i> Receipt
                </button>
            </div>
        `;
        
        // Determine display state for expandable cells
        const paymentsExpanded = columnGroups.payments;
        const attendanceExpanded = columnGroups.attendance;
        const additionalExpanded = columnGroups.additional;
        
        return `
            <tr class="payroll-row" data-entry-id="${entry.id}">
                <td>${index + 1}</td>
                <td>
                    <div style="display: flex; flex-direction: column;">
                        <strong style="font-size: 14px; color: #111827; margin-bottom: 2px;">${entry.name}</strong>
                        <small style="color: #6b7280; font-size: 12px;">${entry.employeeId}</small>
                    </div>
                </td>
                <td>${entry.position || entry.type || '-'}</td>
                <td>${entry.dept}</td>
                <!-- Payments Group Columns -->
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(basicSalary)}</td>
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(attendanceAllowance)}</td>
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(loyaltyBonus)}</td>
                <td class="col-payments expandable" data-group="payments" style="display: ${paymentsExpanded ? '' : 'none'};">${formatCurrency(otherBonus)}</td>
                <td class="col-payments summary-col" data-group="payments">
                    <strong style="color: #10b981;">${formatCurrency(totalSalary)}</strong>
                    ${!paymentsExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px; font-weight: normal;">Total</small>` : ''}
                </td>
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
                <!-- Additional Info Group Columns -->
                <td class="col-additional expandable" data-group="additional" style="display: ${additionalExpanded ? '' : 'none'};">${dateOfJoining}</td>
                <td class="col-additional expandable" data-group="additional" style="display: ${additionalExpanded ? '' : 'none'};">${paymentType}</td>
                <td class="col-additional summary-col" data-group="additional">${paymentDate}</td>
                <td>
                    <span class="status-badge ${statusClass}">${statusText}</span>
                </td>
                <td onclick="event.stopPropagation();">${actions}</td>
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

function toggleColumnGroup(groupName) {
    // Toggle state
    columnGroups[groupName] = !columnGroups[groupName];
    
    const isExpanded = columnGroups[groupName];
    const icon = document.getElementById(`icon-${groupName}`);
    
    // Update icon
    if (icon) {
        if (isExpanded) {
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down');
        } else {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right');
        }
    }
    
    // Show/hide expandable columns
    const expandableCols = document.querySelectorAll(`.expandable[data-group="${groupName}"]`);
    expandableCols.forEach(col => {
        if (isExpanded) {
            col.style.display = '';
        } else {
            col.style.display = 'none';
        }
    });
    
    // Show/hide expandable cells in tbody
    const expandableCells = document.querySelectorAll(`td.expandable[data-group="${groupName}"]`);
    expandableCells.forEach(cell => {
        if (isExpanded) {
            cell.style.display = '';
        } else {
            cell.style.display = 'none';
        }
    });
    
    // Update group header colspan
    const groupHeader = document.getElementById(`group-header-${groupName}`);
    if (groupHeader) {
        if (groupName === 'payments') {
            groupHeader.colSpan = isExpanded ? 5 : 1;
        } else if (groupName === 'attendance') {
            groupHeader.colSpan = isExpanded ? 5 : 1;
        } else if (groupName === 'additional') {
            groupHeader.colSpan = isExpanded ? 3 : 1;
        }
    }
}

function formatCurrency(amount) {
    // Format as Myanmar currency (no decimal, with commas)
    return amount.toLocaleString('en-US') + ' MMK';
}

function applyDataFilters() {
    const monthFilter = document.getElementById('monthFilter').value;
    const typeFilter = document.getElementById('employeeTypeFilter').value;
    const deptFilter = document.getElementById('departmentFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchEmployee').value.toLowerCase();
    
    return payrollData.filter(entry => {
        if (monthFilter !== 'all') {
            // Extract month from entry
            const entryMonth = entry.month || extractMonthFromPayrollId(entry.id);
            if (entryMonth !== monthFilter) return false;
        }
        if (typeFilter !== 'all') {
            const entryType = (entry.position || entry.type || '').toLowerCase();
            if (typeFilter === 'teacher' && !entryType.includes('teacher')) return false;
            if (typeFilter === 'staff' && entryType.includes('teacher')) return false;
        }
        if (deptFilter !== 'all' && entry.dept.toLowerCase() !== deptFilter.toLowerCase()) return false;
        if (statusFilter !== 'all' && entry.status !== statusFilter) return false;
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
    const entry = payrollData.find(e => e.id === payrollId);
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
    const monthFilter = document.getElementById('monthFilter').value;
    
    // Filter data by selected month
    let filteredData = payrollData;
    if (monthFilter !== 'all') {
        filteredData = payrollData.filter(entry => entry.month === monthFilter);
    }
    
    const total = filteredData.reduce((sum, entry) => sum + (entry.totalSalary || entry.netPay || 0), 0);
    const withdrawn = filteredData.filter(e => e.status === 'withdrawn').length;
    const teachers = filteredData.filter(e => (e.position || e.type || '').toLowerCase().includes('teacher')).length;
    const staff = filteredData.filter(e => !(e.position || e.type || '').toLowerCase().includes('teacher')).length;
    
    document.getElementById('totalPayout').textContent = formatCurrency(total);
    document.getElementById('totalEmployees').textContent = filteredData.length;
    document.getElementById('withdrawnCount').textContent = `${withdrawn} / ${filteredData.length}`;
    
    const percentage = filteredData.length > 0 ? Math.round((withdrawn / filteredData.length) * 100) : 0;
    document.querySelector('#withdrawnCount').nextElementSibling.textContent = `${percentage}% completed`;
    
    // Update stat month display
    const statMonth = document.getElementById('statMonth');
    if (statMonth) {
        if (monthFilter === 'all') {
            statMonth.textContent = 'All Months';
        } else {
            const [year, month] = monthFilter.split('-');
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                               'July', 'August', 'September', 'October', 'November', 'December'];
            const monthName = monthNames[parseInt(month) - 1];
            statMonth.textContent = `${monthName} ${year}`;
        }
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

function loadPayrollHistory() {
    const monthFilter = document.getElementById('historyMonthFilter');
    if (!monthFilter) return;
    
    const selectedMonth = monthFilter.value;
    const monthName = monthFilter.options[monthFilter.selectedIndex].text;
    
    // Filter by month
    filteredHistory = allPayrollHistory.filter(entry => entry.month === selectedMonth);
    
    // Apply other filters and render
    applyPayrollHistoryFilters();
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
                    <button class="simple-btn secondary small" onclick="window.location.href='/admin/payroll-details?id=${entry.id}'" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    ${entry.status === 'withdrawn' ? `
                        <button class="simple-btn primary small" onclick="viewHistoryReceipt('${entry.id}')" title="View Receipt">
                            <i class="fas fa-receipt"></i>
                        </button>
                    ` : ''}
                </td>
            </tr>
        `;
    }).join('');
}

function viewHistoryReceipt(payrollId) {
    const entry = allPayrollHistory.find(e => e.id === payrollId);
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
    const entry = allPayrollHistory.find(e => e.id === payrollId);
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
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

.group-header.toggleable {
    cursor: pointer;
    user-select: none;
}

.group-header.toggleable:hover {
    background: #f1f5f9;
    border-color: #a5b4fc;
}

.group-header-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.group-icon {
    font-size: 12px;
    transition: transform 0.2s ease;
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
    transition: all 0.2s ease;
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
.col-additional {
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