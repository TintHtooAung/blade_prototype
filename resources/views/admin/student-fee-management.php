<?php
$pageTitle = 'Smart Campus Nova Hub - Student Fee Management';
$pageIcon = 'fas fa-file-invoice-dollar';
$pageHeading = 'Student Fee Management';

// Detect portal from URL to set appropriate activePage
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$activePage = strpos($currentUri, '/staff/') !== false 
    ? 'student-fee-management' 
    : 'student-fee';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-file-invoice-dollar"></i>
    </div>
    <div class="page-title-compact">
        <h2>Student Fee Management</h2>
    </div>
</div>

<!-- Fee Management Tabs Navigation -->
<div style="margin-top: 24px;">
    <div class="attendance-view-tabs">
        <button class="view-tab active" data-view="invoice" onclick="switchFeeView('invoice')">
            <i class="fas fa-file-invoice"></i> Fee Management
        </button>
        <button class="view-tab" data-view="fee-structure" onclick="switchFeeView('fee-structure')">
            <i class="fas fa-cog"></i> Fee Structure
        </button>
        <button class="view-tab" data-view="payment-history" onclick="switchFeeView('payment-history')">
            <i class="fas fa-history"></i> Payment History
        </button>
    </div>

    <!-- Invoice Management View -->
    <div id="invoice-fee-view" class="attendance-view-content">
        <!-- Quick Finance KPIs -->
        <div class="stats-grid-secondary vertical-stats" style="margin-bottom: 24px;">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Receivable</h3>
                    <div class="stat-number" id="totalReceivable">$125,000</div>
                    <div class="stat-change positive" id="statMonth">All Months</div>
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
        </div>

        <div class="simple-section">
    <div class="simple-header">
        <div style="display: flex; gap: 12px;">
            <button class="simple-btn" onclick="generateInvoices()" id="generateBtn">
                <i class="fas fa-file-invoice"></i> Generate Invoices (This Month)
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

    <!-- Invoice Table with Selectable Column Groups -->
    <div class="simple-table-container" style="margin-top:16px; overflow-x: auto;">
        <table class="fee-grouped-table" id="invoiceTable">
            <thead>
                <!-- Group Header Row -->
                <tr class="group-header-row">
                    <th rowspan="2" class="col-no">No.</th>
                    <th colspan="3" class="group-header toggleable" data-group="student" id="group-header-student">
                        <div class="group-header-content" onclick="toggleColumnGroup('student')">
                            <i class="fas fa-chevron-down group-icon" id="icon-student"></i>
                            <span>Student Info</span>
                        </div>
                    </th>
                    <th colspan="2" class="group-header toggleable" data-group="invoice" id="group-header-invoice">
                        <div class="group-header-content" onclick="toggleColumnGroup('invoice')">
                            <i class="fas fa-chevron-down group-icon" id="icon-invoice"></i>
                            <span>Invoice Info</span>
                        </div>
                    </th>
                    <th colspan="2" class="group-header toggleable" data-group="payment" id="group-header-payment">
                        <div class="group-header-content" onclick="toggleColumnGroup('payment')">
                            <i class="fas fa-chevron-down group-icon" id="icon-payment"></i>
                            <span>Payment Info</span>
                        </div>
                    </th>
                    <th colspan="2" class="group-header toggleable" data-group="additional" id="group-header-additional">
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
                    <!-- Student Info Sub-columns -->
                    <th class="col-student expandable" data-group="student">Student Name</th>
                    <th class="col-student expandable" data-group="student">Student ID</th>
                    <th class="col-student summary-col" data-group="student">Grade/Class</th>
                    <!-- Invoice Info Sub-columns -->
                    <th class="col-invoice expandable" data-group="invoice">Month</th>
                    <th class="col-invoice summary-col" data-group="invoice">Academic Year</th>
                    <!-- Payment Info Sub-columns -->
                    <th class="col-payment expandable" data-group="payment">Fee Amount</th>
                    <th class="col-payment summary-col" data-group="payment">Paid Amount</th>
                    <!-- Additional Info Sub-columns -->
                    <th class="col-additional expandable" data-group="additional">Payment Date</th>
                    <th class="col-additional summary-col" data-group="additional">Payment Method</th>
                </tr>
            </thead>
            <tbody id="invoiceTableBody">
                <tr class="no-data-row">
                    <td colspan="13" style="text-align:center; padding:40px; color:#999;">
                        <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                        No invoices generated yet. Click "Generate Invoices" to create invoices for all students this month.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
        </div>
    </div>

    <!-- Fee Structure View -->
    <div id="fee-structure-fee-view" class="attendance-view-content" style="display: none;">
        <!-- School Fees Section -->
        <div class="simple-section" id="schoolFeesSection">
            <div class="simple-header">
                <div>
                    <h3><i class="fas fa-graduation-cap"></i> School Fees (Monthly Recurring)</h3>
                    <p style="margin: 4px 0 0 0; font-size: 14px; color: #666;">
                        Manage monthly tuition fees for each grade level
                    </p>
                </div>
                <div style="display: flex; gap: 12px;">
                    <button class="simple-btn" id="addSchoolFeeBtn"><i class="fas fa-plus"></i> Add School Fee</button>
                </div>
            </div>
            
            <!-- School Fees Table -->
            <div class="detail-table-container" style="margin-top: 16px;">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th>Grade</th>
                            <th>Monthly Fee</th>
                            <th>Collection %</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="schoolFeesTableBody">
                        <tr>
                            <td><strong>Grade 7</strong></td>
                            <td>$150.00</td>
                            <td><span class="collection-status">88%</span></td>
                            <td class="actions-cell">
                                <button class="simple-btn-icon edit-btn" onclick="editFee('FEE001')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE001', this)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Grade 8</strong></td>
                            <td>$175.00</td>
                            <td><span class="collection-status">92%</span></td>
                            <td class="actions-cell">
                                <button class="simple-btn-icon edit-btn" onclick="editFee('FEE002')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE002', this)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Grade 9</strong></td>
                            <td>$200.00</td>
                            <td><span class="collection-status">85%</span></td>
                            <td class="actions-cell">
                                <button class="simple-btn-icon edit-btn" onclick="editFee('FEE003')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE003', this)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Grade 10</strong></td>
                            <td>$225.00</td>
                            <td><span class="collection-status">79%</span></td>
                            <td class="actions-cell">
                                <button class="simple-btn-icon edit-btn" onclick="editFee('FEE004')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="simple-btn-icon delete-btn" onclick="deleteFee('FEE004', this)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Payment History View -->
    <div id="payment-history-fee-view" class="attendance-view-content" style="display: none;">
        <!-- Month Selector and Filters -->
        <div class="simple-section">
            <!-- Month Summary Stats -->
            <div class="stats-grid-secondary vertical-stats" style="margin-bottom: 24px;">
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
                    <select class="filter-select" id="paymentHistoryGradeFilter" onchange="applyPaymentHistoryFilters()">
                        <option value="all">All Grades</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>
                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                    </select>
                    <select class="filter-select" id="paymentHistoryClassFilter" onchange="applyPaymentHistoryFilters()">
                        <option value="all">All Classes</option>
                        <option value="A">Class A</option>
                        <option value="B">Class B</option>
                        <option value="C">Class C</option>
                    </select>
                    <select class="filter-select" id="paymentHistoryStatusFilter" onchange="applyPaymentHistoryFilters()">
                        <option value="all">All Status</option>
                        <option value="draft">Draft</option>
                        <option value="paid">Paid</option>
                    </select>
                    <input type="text" class="simple-search" id="paymentHistorySearch" placeholder="Search by name or ID..." onkeyup="applyPaymentHistoryFilters()">
                </div>
            </div>

            <!-- Monthly Fees Summary Table -->
            <div class="simple-section" style="margin-top: 24px;">
                <div class="simple-header">
                    <h3>Monthly Fees Summary</h3>
                </div>
                <div class="simple-table-container" style="margin-top:16px;">
                    <table class="basic-table" id="monthlyFeesSummaryTable">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Academic Year</th>
                                <th>Grade</th>
                                <th>Total Students</th>
                                <th>Fully Paid</th>
                                <th>Not Paid</th>
                                <th>Fee Amount</th>
                                <th>Total Collected</th>
                                <th>Remaining</th>
                            </tr>
                        </thead>
                        <tbody id="monthlyFeesSummaryTableBody">
                            <tr>
                                <td colspan="9" style="text-align: center; color: #999;">Loading summary...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Invoice Table -->
            <div class="simple-section" style="margin-top: 24px;">
                <div class="simple-header">
                    <h3>Payment History Details</h3>
                </div>
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
        </div>
    </div>
</div>

<!-- Payment Processing Modal -->
<div id="paymentModal" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 500px;">
        <div class="receipt-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-money-check-alt"></i> Process Payment</h4>
            <button class="icon-btn" onclick="closePaymentModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="receipt-dialog-body" style="padding: 20px;">
            <p id="paymentStudentInfo" style="margin-bottom: 20px; font-weight: 600;"></p>
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Type *</label>
                        <select class="form-input" id="paymentType" required>
                            <option value="">Select Payment Type</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card Payment</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="check">Check</option>
                            <option value="online">Online Payment</option>
                            <option value="installment">Installment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Payment Reference</label>
                        <input type="text" class="form-input" id="paymentReference" placeholder="Transaction ID, Check #, etc.">
                    </div>
                </div>
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
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Payment Notes</label>
                        <textarea class="form-input" id="paymentNotes" rows="2" placeholder="Additional payment details..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closePaymentModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="confirmPayment()">
                <i class="fas fa-check"></i> Confirm Payment
            </button>
        </div>
    </div>
</div>

<!-- School Fee Dialog -->
<div id="schoolFeeDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-dollar-sign"></i> <span id="schoolFeeDialogTitle">Add School Fee</span></h3>
            <button class="receipt-close" onclick="closeSchoolFeeDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="schoolFeeForm">
                <input type="hidden" id="schoolFeeId">

                <div class="form-row">
                <div class="form-group">
                        <label>Grade</label>
                        <select class="form-select" id="schoolFeeGrade">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                </div>
                <div class="form-group">
                        <label>Monthly Fee (USD)</label>
                        <input type="number" class="form-input" id="schoolFeeAmount" placeholder="100.00" step="0.01" min="0">
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeSchoolFeeDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveSchoolFee()">
                <i class="fas fa-save"></i> Save Fee
            </button>
        </div>
    </div>
</div>

<!-- Include Shared Styles -->
<link rel="stylesheet" href="/css/shared/fee-management.css">

<style>
/* Payment Type Badge Styling */
.payment-type-badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
    text-transform: capitalize;
}

.payment-type-badge:not([data-type="Not Set"]) {
    background: #e3f2fd;
    color: #1976d2;
}

.payment-type-badge[data-type="cash"] {
    background: #e8f5e9;
    color: #2e7d32;
}

.payment-type-badge[data-type="card"] {
    background: #fff3e0;
    color: #ef6c00;
}

.payment-type-badge[data-type="bank_transfer"] {
    background: #e3f2fd;
    color: #1976d2;
}

.payment-type-badge[data-type="check"] {
    background: #f3e5f5;
    color: #7b1fa2;
}

.payment-type-badge[data-type="online"] {
    background: #e0f2f1;
    color: #00695c;
}

.payment-type-badge[data-type="installment"] {
    background: #fff8e1;
    color: #f57f17;
}

.payment-type-badge[data-type="Not Set"] {
    background: #f5f5f5;
    color: #999;
    font-style: italic;
}

/* Fee Management Tabs Styling */
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

/* Fee Structure Styles */
.actions-cell {
    white-space: nowrap;
}

.simple-btn-icon {
    padding: 6px 8px;
    margin: 0 2px;
    border-radius: 4px;
    border: 1px solid #e2e8f0;
    background: #fff;
    color: #64748b;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 12px;
}

.simple-btn-icon:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
    color: #475569;
}

.simple-btn-icon.edit-btn:hover {
    background: #eff6ff;
    border-color: #3b82f6;
    color: #1d4ed8;
}

.simple-btn-icon.delete-btn:hover {
    background: #fef2f2;
    border-color: #ef4444;
    color: #dc2626;
}

.simple-btn-icon i {
    font-size: 11px;
}

.collection-status {
    font-weight: 600;
    color: #059669;
    background: #d1fae5;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
}

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

.form-row {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
}

.form-row .form-group {
    flex: 1;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    color: #374151;
    font-size: 14px;
}

.form-select,
.form-input {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.2s ease;
    box-sizing: border-box;
}

.form-select:focus,
.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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

/* Clean Fee Grouped Table - Similar to Payroll */
.fee-grouped-table {
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

/* Column width classes */
.col-no {
    width: 50px;
    text-align: center;
}

.col-status {
    min-width: 100px;
    text-align: center;
}

.col-actions {
    min-width: 140px;
    text-align: center;
}

.col-student,
.col-invoice,
.col-payment,
.col-additional {
    min-width: 120px;
    transition: all 0.2s ease;
}

/* Fee Table Row Styling */
.fee-row {
    transition: background-color 0.2s ease;
}

.fee-row:hover {
    background-color: #f9fafb;
}

.fee-row td {
    vertical-align: middle;
    padding: 12px 14px;
    border: 1px solid #e0e7ff;
    font-size: 13px;
    color: #374151;
}

.fee-row td.col-no {
    text-align: center;
    color: #6b7280;
}

.fee-row td.col-status {
    text-align: center;
}

.fee-action-btn {
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

.fee-action-btn.view-btn {
    background: #eff6ff;
    color: #2563eb;
    border: 1px solid #bfdbfe;
}

.fee-action-btn.view-btn:hover {
    background: #dbeafe;
    border-color: #93c5fd;
}

.fee-action-btn.process-btn {
    background: #dcfce7;
    color: #16a34a;
    border: 1px solid #86efac;
}

.fee-action-btn.process-btn:hover {
    background: #bbf7d0;
    border-color: #4ade80;
}

.fee-action-btn.receipt-btn {
    background: #fef3c7;
    color: #d97706;
    border: 1px solid #fde68a;
}

.fee-action-btn.receipt-btn:hover {
    background: #fde68a;
    border-color: #fcd34d;
}

.fee-action-btn i {
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

<!-- Include Shared Scripts -->
<script src="/js/shared/fee-management.js"></script>
<script src="/js/shared/ui-components.js"></script>
<script src="/js/shared/dialog-manager.js"></script>

<!-- Student Fee Management Specific Script -->
<script src="/js/student-fee-management.js"></script>

<script>
// Tab Switching Function
function switchFeeView(view) {
    // Hide all views
    document.querySelectorAll('.attendance-view-content').forEach(content => {
        content.style.display = 'none';
    });
    
    // Remove active class from all tabs
    document.querySelectorAll('.view-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected view
    const viewElement = document.getElementById(`${view}-fee-view`);
    if (viewElement) {
        viewElement.style.display = 'block';
    }
    
    // Add active class to selected tab
    const activeTab = document.querySelector(`.view-tab[data-view="${view}"]`);
    if (activeTab) {
        activeTab.classList.add('active');
    }
    
    // Initialize payment history if switching to that tab
    if (view === 'payment-history') {
        if (typeof initializeDemoPaymentHistory === 'function') {
            initializeDemoPaymentHistory();
        }
        if (typeof loadPaymentHistory === 'function') {
            loadPaymentHistory();
        }
        if (typeof generateMonthlyFeesSummary === 'function') {
            generateMonthlyFeesSummary();
        }
    }
}

// Fee Structure Functions
let editingFeeId = null;

// Initialize fee structure event listeners
document.addEventListener('DOMContentLoaded', function() {
    const addBtn = document.getElementById('addSchoolFeeBtn');
    if (addBtn) {
        addBtn.addEventListener('click', openSchoolFeeDialog);
    }
});

// School Fee Dialog Functions
function openSchoolFeeDialog() {
    const dialog = document.getElementById('schoolFeeDialog');
    if (dialog) {
        dialog.style.display = 'flex';
        if (!editingFeeId) {
            clearSchoolFeeForm();
            document.getElementById('schoolFeeDialogTitle').textContent = 'Add School Fee';
        }
    }
}

function closeSchoolFeeDialog() {
    const dialog = document.getElementById('schoolFeeDialog');
    if (dialog) {
        dialog.style.display = 'none';
        editingFeeId = null;
        clearSchoolFeeForm();
    }
}

function clearSchoolFeeForm() {
    const gradeSelect = document.getElementById('schoolFeeGrade');
    const amountInput = document.getElementById('schoolFeeAmount');
    
    if (gradeSelect) gradeSelect.value = 'Grade 7';
    if (amountInput) amountInput.value = '';
}

function saveSchoolFee() {
    const grade = document.getElementById('schoolFeeGrade').value;
    const amount = document.getElementById('schoolFeeAmount').value;

    if (!grade || !amount) {
        if (typeof showToast === 'function') {
            showToast('Please fill all required fields', 'warning');
        } else {
            alert('Please fill all required fields');
        }
        return;
    }

    const feeData = {
        id: editingFeeId || 'FEE' + Date.now(),
        grade,
        amount: parseFloat(amount)
    };

    // Save to localStorage
    let fees = JSON.parse(localStorage.getItem('schoolFees') || '{}');
    if (typeof fees === 'object' && !Array.isArray(fees)) {
        fees = {};
    }
    if (!Array.isArray(fees)) {
        fees = [];
    }

    if (editingFeeId) {
        const index = fees.findIndex(f => f.id === editingFeeId);
        if (index > -1) {
            fees[index] = feeData;
        }
    } else {
        fees.push(feeData);
    }

    localStorage.setItem('schoolFees', JSON.stringify(fees));

    if (typeof showToast === 'function') {
        showToast(editingFeeId ?
            `School fee for ${feeData.grade} updated successfully` :
            `School fee for ${feeData.grade} created successfully`,
            'success');
    }

    closeSchoolFeeDialog();
    addFeeToTable(feeData);
}

function addFeeToTable(feeData) {
    const tbody = document.getElementById('schoolFeesTableBody');
    if (!tbody) return;
    
    const randomCollection = Math.floor(Math.random() * 30) + 70; // Random between 70-99%

    const row = document.createElement('tr');
    row.innerHTML = `
        <td><strong>${feeData.grade}</strong></td>
        <td>$${feeData.amount.toFixed(2)}</td>
        <td><span class="collection-status">${randomCollection}%</span></td>
        <td class="actions-cell">
            <button class="simple-btn-icon edit-btn" onclick="editFee('${feeData.id}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="simple-btn-icon delete-btn" onclick="deleteFee('${feeData.id}', this)" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    tbody.appendChild(row);
}

function editFee(feeId) {
    editingFeeId = feeId;
    const titleElement = document.getElementById('schoolFeeDialogTitle');
    if (titleElement) {
        titleElement.textContent = 'Edit School Fee';
    }
    clearSchoolFeeForm();
    openSchoolFeeDialog();
    if (typeof showToast === 'function') {
        showToast(`Edit fee ${feeId} - Feature coming soon`, 'info');
    }
}

function deleteFee(feeId, btn) {
    if (typeof showConfirmDialog === 'function') {
        showConfirmDialog({
            title: 'Delete School Fee',
            message: 'Are you sure you want to delete this school fee? This action cannot be undone.',
            confirmText: 'Delete',
            confirmIcon: 'fas fa-trash',
            onConfirm: () => {
                btn.closest('tr').remove();
                if (typeof showToast === 'function') {
                    showToast(`School fee deleted successfully`, 'success');
                }
            }
        });
    } else if (confirm('Are you sure you want to delete this school fee?')) {
        btn.closest('tr').remove();
    }
}

function getMonthName(monthNum) {
    const months = ['January', 'February', 'March', 'April', 'May', 'June',
                   'July', 'August', 'September', 'October', 'November', 'December'];
    return months[monthNum - 1];
}

// Payment History Functions
let allPaymentHistory = [];
let filteredHistory = [];

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
                amount: 500.00 + (Math.random() * 100),
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

function loadPaymentHistory() {
    const monthYearFilter = document.getElementById('monthYearFilter');
    if (!monthYearFilter) return;
    
    const selectedMonth = monthYearFilter.value;
    const monthName = monthYearFilter.options[monthYearFilter.selectedIndex].text;
    
    const selectedMonthDisplay = document.getElementById('selectedMonthDisplay');
    if (selectedMonthDisplay) {
        selectedMonthDisplay.textContent = monthName;
    }
    
    // Filter by month
    filteredHistory = allPaymentHistory.filter(invoice => invoice.month === selectedMonth);
    
    // Update stats
    updateMonthStats();
    
    // Apply other filters and render
    applyPaymentHistoryFilters();
    
    // Update monthly fees summary
    generateMonthlyFeesSummary();
}

function updateMonthStats() {
    const totalInvoices = filteredHistory.length;
    const paidInvoices = filteredHistory.filter(inv => inv.status === 'paid');
    const totalAmount = paidInvoices.reduce((sum, inv) => sum + inv.amount, 0);
    
    const monthTotalInvoices = document.getElementById('monthTotalInvoices');
    const monthPaidCount = document.getElementById('monthPaidCount');
    const monthTotalAmount = document.getElementById('monthTotalAmount');
    
    if (monthTotalInvoices) monthTotalInvoices.textContent = totalInvoices;
    if (monthPaidCount) monthPaidCount.textContent = `${paidInvoices.length} / ${totalInvoices}`;
    if (monthTotalAmount) monthTotalAmount.textContent = `$${totalAmount.toFixed(2)}`;
}

function applyPaymentHistoryFilters() {
    const statusFilter = document.getElementById('paymentHistoryStatusFilter');
    const gradeFilter = document.getElementById('paymentHistoryGradeFilter');
    const classFilter = document.getElementById('paymentHistoryClassFilter');
    const searchText = document.getElementById('paymentHistorySearch');
    
    if (!statusFilter || !gradeFilter || !classFilter || !searchText) return;
    
    const statusValue = statusFilter.value;
    const gradeValue = gradeFilter.value;
    const classValue = classFilter.value;
    const searchValue = searchText.value.toLowerCase();
    
    let displayHistory = [...filteredHistory];
    
    if (statusValue !== 'all') {
        displayHistory = displayHistory.filter(inv => inv.status === statusValue);
    }
    
    if (gradeValue !== 'all') {
        displayHistory = displayHistory.filter(inv => inv.grade === parseInt(gradeValue));
    }
    
    if (classValue !== 'all') {
        displayHistory = displayHistory.filter(inv => inv.class === classValue);
    }
    
    if (searchValue) {
        displayHistory = displayHistory.filter(inv => 
            inv.name.toLowerCase().includes(searchValue) || 
            inv.studentId.toLowerCase().includes(searchValue) ||
            inv.id.toLowerCase().includes(searchValue)
        );
    }
    
    renderPaymentHistoryTable(displayHistory);
}

function renderPaymentHistoryTable(data) {
    const tbody = document.getElementById('paymentHistoryTableBody');
    if (!tbody) return;
    
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
    
    // Create receipt dialog
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

function generateMonthlyFeesSummary() {
    const tbody = document.getElementById('monthlyFeesSummaryTableBody');
    if (!tbody) return;
    
    // Get all payment history data
    const allHistory = JSON.parse(localStorage.getItem('invoiceHistory') || '[]');
    const currentInvoices = JSON.parse(localStorage.getItem('invoiceData') || '[]');
    const combinedData = [...allHistory, ...currentInvoices];
    
    // Group by month, academic year, and grade
    const summaryMap = new Map();
    
    combinedData.forEach(invoice => {
        let monthKey, academicYear, year, month;
        
        if (invoice.month) {
            const parts = invoice.month.split('-');
            year = parts[0];
            month = parts[1];
            monthKey = invoice.month;
        } else if (invoice.id) {
            const match = invoice.id.match(/INV-(\d{4})-(\d{2})-/);
            if (match) {
                year = match[1];
                month = match[2];
                monthKey = `${year}-${month}`;
            }
        }
        
        if (!monthKey) return;
        
        const monthNum = parseInt(month);
        const yearNum = parseInt(year);
        if (monthNum >= 7) {
            academicYear = `${yearNum}-${yearNum + 1}`;
        } else {
            academicYear = `${yearNum - 1}-${yearNum}`;
        }
        
        const grade = invoice.grade || 'All';
        const key = `${monthKey}-${grade}`;
        
        if (!summaryMap.has(key)) {
            summaryMap.set(key, {
                month: monthKey,
                monthNum: monthNum,
                year: year,
                academicYear: academicYear,
                grade: grade,
                totalStudents: 0,
                fullyPaid: 0,
                notPaid: 0,
                feeAmount: 0,
                totalCollected: 0,
                remaining: 0
            });
        }
        
        const summary = summaryMap.get(key);
        summary.totalStudents++;
        summary.feeAmount += invoice.amount || 0;
        
        if (invoice.status === 'paid') {
            summary.fullyPaid++;
            summary.totalCollected += invoice.amount || 0;
        } else {
            summary.notPaid++;
            summary.remaining += invoice.amount || 0;
        }
    });
    
    const summaryArray = Array.from(summaryMap.values()).sort((a, b) => {
        if (a.month !== b.month) {
            return b.month.localeCompare(a.month);
        }
        return a.grade - b.grade;
    });
    
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
    
    if (summaryArray.length === 0) {
        tbody.innerHTML = '<tr><td colspan="9" style="text-align: center; color: #999;">No summary data available</td></tr>';
        return;
    }
    
    tbody.innerHTML = summaryArray.map(summary => {
        const monthName = monthNames[parseInt(summary.monthNum) - 1];
        const feeAmountFormatted = summary.feeAmount.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        const totalCollectedFormatted = summary.totalCollected.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        const remainingFormatted = summary.remaining.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        
        return `
            <tr>
                <td>${monthName}</td>
                <td>${summary.academicYear}</td>
                <td>${summary.grade}</td>
                <td>${summary.totalStudents}</td>
                <td>${summary.fullyPaid}</td>
                <td>${summary.notPaid}</td>
                <td>${feeAmountFormatted}</td>
                <td>${totalCollectedFormatted}</td>
                <td>${remainingFormatted}</td>
            </tr>
        `;
    }).join('');
}
</script>

<?php
$content = ob_get_clean();

// Detect portal from URL to use appropriate layout
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';

include __DIR__ . '/../components/' . $layout;
?>