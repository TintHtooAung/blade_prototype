<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profile';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Profile';
$activePage = 'teachers';
$id = $_GET['id'] ?? 'T000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/teacher-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Teacher Profiles
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
        <button class="simple-btn" onclick="window.location.href='/admin/teacher-profile-edit?id=<?php echo htmlspecialchars($id); ?>'">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Teacher ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td>Placeholder Name</td></tr>
                <tr><th>Department</th><td>Mathematics</td></tr>
                <tr><th>Subjects</th><td>Algebra, Calculus</td></tr>
                <tr><th>Email</th><td>placeholder@school.edu</td></tr>
                <tr><th>Phone</th><td>+1-555-0101</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
            </tbody>
        </table>
    </div>

    <div class="simple-header" style="margin-top:16px;">
        <h4>Assigned Classes</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead><tr><th>Class</th><th>Grade</th><th>Room</th><th>Schedule</th></tr></thead>
            <tbody>
                <tr><td>10-A</td><td>Grade 10</td><td>Room 201</td><td>Mon/Wed 10:00-12:00</td></tr>
                <tr><td>9-B</td><td>Grade 9</td><td>Room 108</td><td>Tue/Thu 09:00-11:00</td></tr>
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
                <tr><th style="width:220px;">Base Salary</th><td>$3,500.00 / month</td></tr>
                <tr><th>Teaching Allowance</th><td>$500.00 / month</td></tr>
                <tr><th>Experience Bonus</th><td>$300.00 / month</td></tr>
                <tr><th>Total Gross Salary</th><td><strong>$4,300.00 / month</strong></td></tr>
                <tr><th>Tax Deduction</th><td>$430.00 (10%)</td></tr>
                <tr><th>Insurance</th><td>$150.00</td></tr>
                <tr><th>Retirement Fund</th><td>$215.00 (5%)</td></tr>
                <tr><th>Net Salary</th><td><strong style="color: #2e7d32;">$3,505.00 / month</strong></td></tr>
                <tr><th>Payment Method</th><td>Bank Transfer</td></tr>
                <tr><th>Bank Account</th><td>**** **** **** 4567 (School Bank)</td></tr>
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
                    <td>$4,300.00</td>
                    <td>$795.00</td>
                    <td>$3,505.00</td>
                    <td>2025-01-31</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
                <tr>
                    <td>December 2024</td>
                    <td>$4,300.00</td>
                    <td>$795.00</td>
                    <td>$3,505.00</td>
                    <td>2024-12-31</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
                <tr>
                    <td>November 2024</td>
                    <td>$4,300.00</td>
                    <td>$795.00</td>
                    <td>$3,505.00</td>
                    <td>2024-11-30</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
                <tr>
                    <td>October 2024</td>
                    <td>$4,300.00</td>
                    <td>$795.00</td>
                    <td>$3,505.00</td>
                    <td>2024-10-31</td>
                    <td><span class="status-badge paid">Paid</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- View Full Payroll Button -->
    <div style="margin-top:16px; text-align:right;">
        <a href="/admin/salary-payroll?id=<?php echo htmlspecialchars($id); ?>&type=teacher" class="simple-btn">
            <i class="fas fa-file-invoice-dollar"></i> View Full Payroll History
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
