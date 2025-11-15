<?php
$pageTitle = 'Smart Campus Nova Hub - Student Fee Management';
$pageIcon = 'fas fa-file-invoice-dollar';
$pageHeading = 'Student Fee Management';

// Detect portal from URL to set appropriate activePage
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$activePage = strpos($currentUri, '/staff/') !== false 
    ? 'student-fee-management' 
    : 'finance';

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
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn secondary" onclick="window.location.href='/admin/fee-structure'">
            <i class="fas fa-cog"></i> Fee Structure Setup
        </button>
        <button class="simple-btn secondary" onclick="window.location.href='/admin/payment-history'">
            <i class="fas fa-history"></i> Payment History
        </button>
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
            <button class="simple-btn secondary" onclick="refreshInvoices()">
                <i class="fas fa-sync-alt"></i> Refresh Invoices
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
</style>

<!-- Include Shared Scripts -->
<script src="/js/shared/fee-management.js"></script>
<script src="/js/shared/ui-components.js"></script>
<script src="/js/shared/dialog-manager.js"></script>

<!-- Student Fee Management Specific Script -->
<script src="/js/student-fee-management.js"></script>

<?php
$content = ob_get_clean();

// Detect portal from URL to use appropriate layout
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';

include __DIR__ . '/../components/' . $layout;
?>