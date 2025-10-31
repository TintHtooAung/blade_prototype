<?php
$pageTitle = 'Smart Campus Nova Hub - Payment History';
$pageIcon = 'fas fa-history';
$pageHeading = 'Payment History';
$activePage = 'payment-history';

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

<!-- Payment Summary -->
<div class="detail-stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <p>Total Paid This Year</p>
            <h3>$4,500</h3>
        </div>
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Sarah's Payments</p>
            <h3>$2,750</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Michael's Payments</p>
            <h3>$1,750</h3>
        </div>
        <div class="stat-icon blue">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Total Transactions</p>
            <h3>12</h3>
        </div>
        <div class="stat-icon purple">
            <i class="fas fa-file-invoice"></i>
        </div>
    </div>
</div>

<!-- Payment History -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Recent Payment Transactions</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Student</th>
                    <th>Fee Type</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Status</th>
                    <th style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#INV-2025-088</strong></td>
                    <td>Sarah Johnson<br><small>Grade 9-A</small></td>
                    <td>Lab Fees</td>
                    <td><strong>$50</strong></td>
                    <td>Oct 15, 2025</td>
                    <td>Credit Card</td>
                    <td>TXN-4567890123</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-075</strong></td>
                    <td>Michael Johnson<br><small>Grade 7-B</small></td>
                    <td>Sports Fees</td>
                    <td><strong>$30</strong></td>
                    <td>Oct 10, 2025</td>
                    <td>Bank Transfer</td>
                    <td>TXN-4567890122</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-065</strong></td>
                    <td>Sarah Johnson<br><small>Grade 9-A</small></td>
                    <td>Quarterly Tuition</td>
                    <td><strong>$500</strong></td>
                    <td>Sep 01, 2025</td>
                    <td>Mobile Banking</td>
                    <td>TXN-4567890121</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-066</strong></td>
                    <td>Michael Johnson<br><small>Grade 7-B</small></td>
                    <td>Quarterly Tuition</td>
                    <td><strong>$400</strong></td>
                    <td>Sep 01, 2025</td>
                    <td>Mobile Banking</td>
                    <td>TXN-4567890120</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-050</strong></td>
                    <td>Sarah Johnson<br><small>Grade 9-A</small></td>
                    <td>Annual Subscription</td>
                    <td><strong>$200</strong></td>
                    <td>Aug 15, 2025</td>
                    <td>Credit Card</td>
                    <td>TXN-4567890119</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-051</strong></td>
                    <td>Michael Johnson<br><small>Grade 7-B</small></td>
                    <td>Annual Subscription</td>
                    <td><strong>$150</strong></td>
                    <td>Aug 15, 2025</td>
                    <td>Credit Card</td>
                    <td>TXN-4567890118</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-040</strong></td>
                    <td>Sarah Johnson<br><small>Grade 9-A</small></td>
                    <td>Quarterly Tuition</td>
                    <td><strong>$500</strong></td>
                    <td>Jun 01, 2025</td>
                    <td>Bank Transfer</td>
                    <td>TXN-4567890117</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
                <tr>
                    <td><strong>#INV-2025-041</strong></td>
                    <td>Michael Johnson<br><small>Grade 7-B</small></td>
                    <td>Quarterly Tuition</td>
                    <td><strong>$400</strong></td>
                    <td>Jun 01, 2025</td>
                    <td>Bank Transfer</td>
                    <td>TXN-4567890116</td>
                    <td><span class="status-badge active">Paid</span></td>
                    <td><button class="simple-btn secondary small">Receipt</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
