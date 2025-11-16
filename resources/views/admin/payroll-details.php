<?php
$pageTitle = 'Smart Campus Nova Hub - Payroll Details';
$pageIcon = 'fas fa-file-invoice-dollar';
$pageHeading = 'Payroll Details';
$activePage = 'payroll';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/salary-payroll" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Salary & Payroll Management
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

<!-- Payroll Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="payrollTitle">Payroll for Employee Name</h3>
                <span class="exam-id" id="payrollNumber">PAY-0001</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="payrollStatus">Draft</span>
                <span class="badge grade-badge" id="payrollMonth">January 2025</span>
            </div>
        </div>
    </div>

    <!-- Employee Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-user"></i> Employee Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <tbody>
                        <tr>
                            <td style="width: 200px; font-weight: 600;">Payroll ID:</td>
                            <td id="detailPayrollId">PAY-0001</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Employee Name:</td>
                            <td id="detailEmployeeName">Employee Name</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Employee ID:</td>
                            <td id="detailEmployeeId">E001</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Position:</td>
                            <td id="detailPosition">Teacher</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Department:</td>
                            <td id="detailDepartment">Mathematics</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Attendance Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-calendar-check"></i> Attendance Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Working Days:</label>
                <span id="detailWorkingDays">21</span>
            </div>
            <div class="detail-row">
                <label>Leave Days:</label>
                <span id="detailLeaveDays">0</span>
            </div>
            <div class="detail-row">
                <label>Annual Leave:</label>
                <span id="detailAnnualLeave">0</span>
            </div>
            <div class="detail-row">
                <label>Days Absent:</label>
                <span id="detailDaysAbsent">0</span>
            </div>
            <div class="detail-row">
                <label>Days Present:</label>
                <span id="detailDaysPresent">21</span>
            </div>
        </div>
    </div>

    <!-- Salary Breakdown -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-list"></i> Salary Breakdown</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="salaryTableBody">
                        <tr>
                            <td>Basic Salary</td>
                            <td id="salaryBasic">350,000 MMK</td>
                        </tr>
                        <tr>
                            <td>Attendance Allowance</td>
                            <td id="salaryAttendance">30,000 MMK</td>
                        </tr>
                        <tr>
                            <td>Loyalty Bonus</td>
                            <td id="salaryLoyalty">0 MMK</td>
                        </tr>
                        <tr>
                            <td>Other Bonus</td>
                            <td id="salaryOther">0 MMK</td>
                        </tr>
                        <tr class="total-row">
                            <td><strong>Total Salary</strong></td>
                            <td id="totalSalary"><strong>380,000 MMK</strong></td>
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
            <div class="simple-table-container">
                <table class="basic-table">
                    <tbody>
                        <tr>
                            <td style="width: 200px; font-weight: 600;">Payment Status:</td>
                            <td id="paymentStatus">Draft</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Payment Date:</td>
                            <td id="paymentDate">-</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Withdrawn By:</td>
                            <td id="withdrawnBy">-</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Withdrawal Time:</td>
                            <td id="withdrawalTime">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Additional Information & Action Buttons -->
    <div class="exam-detail-card">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start;">
            <!-- Additional Information -->
            <div>
                <h4 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">
                    <i class="fas fa-info-circle"></i> Additional Information
                </h4>
                <div class="simple-table-container">
                    <table class="basic-table">
                        <tbody>
                            <tr>
                                <td style="width: 150px; font-weight: 600;">Date of Joining:</td>
                                <td id="detailDateOfJoining">2023-01-15</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 600;">Payment Method:</td>
                                <td id="paymentMethod">Bank Transfer</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 600;">Remark:</td>
                                <td id="remark" style="word-wrap: break-word; max-width: 300px;">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div>
                <h4 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">
                    <i class="fas fa-cog"></i> Actions
                </h4>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <button class="simple-btn secondary" id="processWithdrawalBtn" onclick="processWithdrawal()" style="display: none; width: 100%;">
                        <i class="fas fa-hand-holding-usd"></i> Process Withdrawal
                    </button>
                    <button class="simple-btn secondary" id="viewReceiptBtn" onclick="viewWithdrawalReceipt()" style="display: none; width: 100%;">
                        <i class="fas fa-receipt"></i> View Withdrawal Receipt
                    </button>
                    <button class="simple-btn" onclick="window.print()" style="width: 100%;">
                        <i class="fas fa-print"></i> Print Payroll
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Withdrawal Processing Modal -->
<div id="withdrawalModal" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 500px;">
        <div class="receipt-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-hand-holding-usd"></i> Process Withdrawal</h4>
            <button class="icon-btn" onclick="closeWithdrawalModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="receipt-dialog-body" style="padding: 20px;">
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
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeWithdrawalModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="confirmWithdrawal()">
                <i class="fas fa-check"></i> Confirm Withdrawal
            </button>
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
// Get payroll ID from URL
const urlParams = new URLSearchParams(window.location.search);
const payrollId = urlParams.get('id');

// Load payroll data from localStorage
function loadPayrollDetails() {
    if (!payrollId) {
        alert('Payroll ID not found');
        window.location.href = '/admin/salary-payroll';
        return;
    }

    // Try to load from payrollData first (current payroll), then from payrollHistory
    let savedPayroll = localStorage.getItem('payrollData');
    let payrollData = savedPayroll ? JSON.parse(savedPayroll) : [];
    let entry = payrollData.find(e => e.id === payrollId);
    
    // If not found in payrollData, try payrollHistory
    if (!entry) {
        const savedHistory = localStorage.getItem('payrollHistory');
        if (savedHistory) {
            const payrollHistory = JSON.parse(savedHistory);
            entry = payrollHistory.find(e => e.id === payrollId);
            if (entry) {
                // Convert history entry format to match payrollData format
                entry.totalSalary = entry.netPay || entry.totalSalary || 0;
                entry.basicSalary = entry.basicSalary || entry.totalSalary || 0;
                entry.attendanceAllowance = entry.attendanceAllowance || 0;
                entry.loyaltyBonus = entry.loyaltyBonus || 0;
                entry.otherBonus = entry.otherBonus || 0;
                entry.position = entry.type || entry.position || 'Employee';
                entry.dept = entry.dept || '-';
                entry.workingDays = entry.workingDays || 21;
                entry.leaveDays = entry.leaveDays || 0;
                entry.annualLeave = entry.annualLeave || 0;
                entry.daysAbsent = entry.daysAbsent || 0;
                entry.daysPresent = entry.daysPresent || entry.workingDays || 21;
            }
        }
    }
    
    if (!entry) {
        alert('Payroll entry not found');
        window.location.href = '/admin/salary-payroll';
        return;
    }

    // Format currency
    function formatCurrency(amount) {
        return amount.toLocaleString('en-US') + ' MMK';
    }

    // Format date
    function formatDate(dateStr) {
        if (!dateStr) return '-';
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-GB');
    }

    // Get month name
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
    let monthName = 'Current Month';
    if (entry.month) {
        const [year, month] = entry.month.split('-');
        const monthIndex = parseInt(month) - 1;
        monthName = `${monthNames[monthIndex]} ${year}`;
    }

    // Update page content
    document.getElementById('payrollTitle').textContent = `Payroll for ${entry.name}`;
    document.getElementById('payrollNumber').textContent = entry.id;
    document.getElementById('payrollStatus').textContent = entry.status === 'draft' ? 'Draft' : entry.status === 'withdrawn' ? 'Done Payment' : entry.status;
    document.getElementById('payrollMonth').textContent = monthName;
    
    // Update status badge color
    const statusBadge = document.getElementById('payrollStatus');
    statusBadge.className = 'badge';
    if (entry.status === 'withdrawn') {
        statusBadge.className += ' tutorial-badge';
    } else if (entry.status === 'draft') {
        statusBadge.className += ' class-badge';
    }

    // Employee Information
    document.getElementById('detailPayrollId').textContent = entry.id;
    document.getElementById('detailEmployeeName').textContent = entry.name;
    document.getElementById('detailEmployeeId').textContent = entry.employeeId;
    document.getElementById('detailPosition').textContent = entry.position || entry.type || '-';
    document.getElementById('detailDepartment').textContent = entry.dept || '-';
    document.getElementById('detailDateOfJoining').textContent = formatDate(entry.dateOfJoining);

    // Attendance Information
    document.getElementById('detailWorkingDays').textContent = entry.workingDays || 21;
    document.getElementById('detailLeaveDays').textContent = entry.leaveDays || 0;
    document.getElementById('detailAnnualLeave').textContent = entry.annualLeave || 0;
    document.getElementById('detailDaysAbsent').textContent = entry.daysAbsent || 0;
    document.getElementById('detailDaysPresent').textContent = entry.daysPresent || 0;

    // Salary Breakdown
    document.getElementById('salaryBasic').textContent = formatCurrency(entry.basicSalary || 0);
    document.getElementById('salaryAttendance').textContent = formatCurrency(entry.attendanceAllowance || 0);
    document.getElementById('salaryLoyalty').textContent = formatCurrency(entry.loyaltyBonus || 0);
    document.getElementById('salaryOther').textContent = formatCurrency(entry.otherBonus || 0);
    document.getElementById('totalSalary').innerHTML = `<strong>${formatCurrency(entry.totalSalary || entry.netPay || 0)}</strong>`;

    // Payment Information
    const statusText = entry.status === 'draft' ? 'Draft' : entry.status === 'withdrawn' ? 'Done Payment' : entry.status;
    document.getElementById('paymentStatus').textContent = statusText;
    document.getElementById('paymentMethod').textContent = entry.paymentType || '-';
    document.getElementById('paymentDate').textContent = entry.paymentDate || (entry.withdrawnTime ? entry.withdrawnTime.split(' ')[0] : '-');
    document.getElementById('withdrawnBy').textContent = entry.withdrawnBy || '-';
    document.getElementById('withdrawalTime').textContent = entry.withdrawnTime || '-';
    document.getElementById('remark').textContent = entry.remark || '-';

    // Show/hide action buttons based on status
    if (entry.status === 'draft') {
        document.getElementById('processWithdrawalBtn').style.display = 'inline-flex';
        document.getElementById('viewReceiptBtn').style.display = 'none';
    } else if (entry.status === 'withdrawn') {
        document.getElementById('processWithdrawalBtn').style.display = 'none';
        document.getElementById('viewReceiptBtn').style.display = 'inline-flex';
    }
}

function processWithdrawal() {
    const savedPayroll = localStorage.getItem('payrollData');
    if (!savedPayroll) {
        alert('Payroll data not found. Cannot process withdrawal.');
        return;
    }
    
    const payrollData = JSON.parse(savedPayroll);
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry) {
        alert('Payroll entry not found in current payroll data.');
        return;
    }

    document.getElementById('withdrawalEmployeeInfo').textContent = 
        `Processing withdrawal for: ${entry.name} (${entry.employeeId}) - ${formatCurrency(entry.totalSalary || entry.netPay || 0)}`;
    document.getElementById('receptionistId').value = '';
    document.getElementById('receptionistName').value = '';
    document.getElementById('withdrawalModal').style.display = 'flex';
}

function closeWithdrawalModal() {
    document.getElementById('withdrawalModal').style.display = 'none';
}

function formatCurrency(amount) {
    return amount.toLocaleString('en-US') + ' MMK';
}

function confirmWithdrawal() {
    const receptionistId = document.getElementById('receptionistId').value.trim();
    const receptionistName = document.getElementById('receptionistName').value.trim();
    
    if (!receptionistId || !receptionistName) {
        if (typeof showToast === 'function') {
            showToast('Please enter both Receptionist ID and Name', 'warning');
        } else {
            alert('Please enter both Receptionist ID and Name');
        }
        return;
    }
    
    const savedPayroll = localStorage.getItem('payrollData');
    if (!savedPayroll) return;
    
    const payrollData = JSON.parse(savedPayroll);
    const entry = payrollData.find(e => e.id === payrollId);
    if (!entry) return;
    
    const now = new Date();
    const paymentDateStr = now.toLocaleDateString('en-GB');
    
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
    
    if (typeof showToast === 'function') {
        showToast(`Withdrawal for ${entry.name} (${entry.employeeId}) recorded successfully`, 'success');
    }
    
    // Reload the page to show updated information
    loadPayrollDetails();
}

function viewWithdrawalReceipt() {
    // Try to load from payrollData first, then payrollHistory
    let savedPayroll = localStorage.getItem('payrollData');
    let payrollData = savedPayroll ? JSON.parse(savedPayroll) : [];
    let entry = payrollData.find(e => e.id === payrollId);
    
    if (!entry) {
        const savedHistory = localStorage.getItem('payrollHistory');
        if (savedHistory) {
            const payrollHistory = JSON.parse(savedHistory);
            entry = payrollHistory.find(e => e.id === payrollId);
            if (entry) {
                entry.totalSalary = entry.netPay || entry.totalSalary || 0;
                entry.position = entry.type || entry.position || 'Employee';
            }
        }
    }
    
    if (!entry || entry.status !== 'withdrawn') {
        alert('Withdrawal receipt not available for this payroll entry.');
        return;
    }
    
    // Create receipt dialog
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
                <button class="simple-btn primary" onclick="printWithdrawalReceipt()">
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

function printWithdrawalReceipt() {
    // Try to load from payrollData first, then payrollHistory
    let savedPayroll = localStorage.getItem('payrollData');
    let payrollData = savedPayroll ? JSON.parse(savedPayroll) : [];
    let entry = payrollData.find(e => e.id === payrollId);
    
    if (!entry) {
        const savedHistory = localStorage.getItem('payrollHistory');
        if (savedHistory) {
            const payrollHistory = JSON.parse(savedHistory);
            entry = payrollHistory.find(e => e.id === payrollId);
            if (entry) {
                entry.totalSalary = entry.netPay || entry.totalSalary || 0;
                entry.position = entry.type || entry.position || 'Employee';
            }
        }
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

// Load payroll details on page load
document.addEventListener('DOMContentLoaded', loadPayrollDetails);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

