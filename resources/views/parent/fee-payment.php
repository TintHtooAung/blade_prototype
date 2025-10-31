<?php
$pageTitle = 'Smart Campus Nova Hub - Fee Payment';
$pageIcon = 'fas fa-credit-card';
$pageHeading = 'Fee Payment';
$activePage = 'fee-payment';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Outstanding Fees Summary -->
<div class="detail-stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <p>Total Outstanding</p>
            <h3>$450</h3>
        </div>
        <div class="stat-icon red">
            <i class="fas fa-exclamation-circle"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Sarah's Fees</p>
            <h3>$250</h3>
        </div>
        <div class="stat-icon orange">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Michael's Fees</p>
            <h3>$200</h3>
        </div>
        <div class="stat-icon orange">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Due Date</p>
            <h3>Nov 10</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-calendar"></i>
        </div>
    </div>
</div>

<!-- Pending Fees -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Pending Fee Payments</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Student</th>
                    <th>Fee Type</th>
                    <th>Amount</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#INV-2025-089</strong></td>
                    <td>Sarah Johnson<br><small>Grade 9-A</small></td>
                    <td>Quarterly Tuition</td>
                    <td><strong>$250</strong></td>
                    <td>Oct 01, 2025</td>
                    <td>Nov 10, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <button class="simple-btn primary small" onclick="payNow('INV-2025-089')">
                            <i class="fas fa-credit-card"></i> Pay
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-090</strong></td>
                    <td>Michael Johnson<br><small>Grade 7-B</small></td>
                    <td>Quarterly Tuition</td>
                    <td><strong>$200</strong></td>
                    <td>Oct 01, 2025</td>
                    <td>Nov 10, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <button class="simple-btn primary small" onclick="payNow('INV-2025-090')">
                            <i class="fas fa-credit-card"></i> Pay
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Payment Form (Hidden by default) -->
<div class="simple-section" id="paymentForm" style="margin-top: 24px; display: none;">
    <div class="simple-header">
        <h3>Make Payment</h3>
    </div>
    
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label>Invoice Number</label>
                <input type="text" class="form-input" id="invoiceNo" readonly>
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="text" class="form-input" id="amount" readonly>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group" style="flex: 1;">
                <label>Payment Method <span style="color: #ef4444;">*</span></label>
                <select class="form-select" id="paymentMethod" required>
                    <option value="">Select Payment Method</option>
                    <option value="card">Credit/Debit Card</option>
                    <option value="bank">Bank Transfer</option>
                    <option value="mobile">Mobile Banking</option>
                    <option value="cash">Cash at Office</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group" style="flex: 1;">
                <label>Reference/Transaction ID</label>
                <input type="text" class="form-input" id="transactionId" placeholder="Enter transaction reference">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group" style="flex: 1;">
                <label>Notes</label>
                <textarea class="form-input" id="notes" rows="3" placeholder="Additional notes (optional)"></textarea>
            </div>
        </div>
        
        <div class="form-actions">
            <button class="simple-btn secondary" onclick="cancelPayment()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="submitPayment()">
                <i class="fas fa-check"></i> Confirm Payment
            </button>
        </div>
    </div>
</div>

<script>
function payNow(invoiceNo) {
    document.getElementById('paymentForm').style.display = 'block';
    document.getElementById('invoiceNo').value = '#' + invoiceNo;
    
    // Set amount based on invoice
    if (invoiceNo === 'INV-2025-089') {
        document.getElementById('amount').value = '$250';
    } else {
        document.getElementById('amount').value = '$200';
    }
    
    // Scroll to form
    document.getElementById('paymentForm').scrollIntoView({ behavior: 'smooth' });
}

function cancelPayment() {
    document.getElementById('paymentForm').style.display = 'none';
    document.getElementById('paymentMethod').value = '';
    document.getElementById('transactionId').value = '';
    document.getElementById('notes').value = '';
}

function submitPayment() {
    const paymentMethod = document.getElementById('paymentMethod').value;
    
    if (!paymentMethod) {
        alert('Please select a payment method');
        return;
    }
    
    alert('Payment submitted successfully! You will receive a confirmation email shortly.');
    cancelPayment();
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
