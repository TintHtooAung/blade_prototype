<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Profile';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Profile';
$activePage = 'employees';
$id = $_GET['id'] ?? 'E000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/employee-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Staff Profiles
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

<div class="simple-section">
    <div class="simple-header">
        <h3>Profile: <?php echo htmlspecialchars($id); ?></h3>
        <button class="simple-btn" onclick="window.location.href='/admin/staff-profile-edit?id=<?php echo htmlspecialchars($id); ?>'">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Staff ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td>Placeholder Name</td></tr>
                <tr><th>Department</th><td>Administration</td></tr>
                <tr><th>Position</th><td>Secretary</td></tr>
                <tr><th>Email</th><td>placeholder@school.edu</td></tr>
                <tr><th>Phone</th><td>+1-555-2001</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
            </tbody>
        </table>
    </div>

    <div class="simple-header" style="margin-top:16px;">
        <h4>Assignment History</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead><tr><th>From</th><th>To</th><th>Department</th><th>Position</th></tr></thead>
            <tbody>
                <tr><td>2023-01-01</td><td>Present</td><td>Administration</td><td>Secretary</td></tr>
                <tr><td>2021-06-01</td><td>2022-12-31</td><td>Library</td><td>Assistant</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Salary & Payroll Information -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-dollar-sign"></i> Salary Information</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Base Salary</th><td>$2,200.00 / month</td></tr>
                <tr><th>Position Allowance</th><td>$300.00 / month</td></tr>
                <tr><th>Service Bonus</th><td>$200.00 / month</td></tr>
                <tr><th>Total Gross Salary</th><td><strong>$2,700.00 / month</strong></td></tr>
                <tr><th>Tax Deduction</th><td>$270.00 (10%)</td></tr>
                <tr><th>Insurance</th><td>$100.00</td></tr>
                <tr><th>Retirement Fund</th><td>$135.00 (5%)</td></tr>
                <tr><th>Net Salary</th><td><strong style="color: #2e7d32;">$2,195.00 / month</strong></td></tr>
                <tr><th>Payment Method</th><td>Bank Transfer</td></tr>
                <tr><th>Bank Account</th><td>**** **** **** 8901 (School Bank)</td></tr>
                <tr><th>Payment Schedule</th><td>Monthly - Last working day</td></tr>
            </tbody>
        </table>
    </div>

    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-history"></i> Recent Payroll History</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Period</th>
                    <th>Gross Pay</th>
                    <th>Deductions</th>
                    <th>Net Pay</th>
                    <th>Payment Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>January 2025</td>
                    <td>$2,700.00</td>
                    <td>$505.00</td>
                    <td>$2,195.00</td>
                    <td>2025-01-31</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
                <tr>
                    <td>December 2024</td>
                    <td>$2,700.00</td>
                    <td>$505.00</td>
                    <td>$2,195.00</td>
                    <td>2024-12-31</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
                <tr>
                    <td>November 2024</td>
                    <td>$2,700.00</td>
                    <td>$505.00</td>
                    <td>$2,195.00</td>
                    <td>2024-11-30</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
                <tr>
                    <td>October 2024</td>
                    <td>$2,700.00</td>
                    <td>$505.00</td>
                    <td>$2,195.00</td>
                    <td>2024-10-31</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- View Full Payroll Button -->
    <div style="margin-top:16px; text-align:right;">
        <a href="/admin/salary-payroll?id=<?php echo htmlspecialchars($id); ?>&type=staff" class="simple-btn">
            <i class="fas fa-file-invoice-dollar"></i> View Full Payroll History
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
