<?php
$pageTitle = 'Smart Campus Nova Hub - Salary & Payroll';
$pageIcon = 'fas fa-money-check-alt';
$pageHeading = 'Salary & Payroll';
$activePage = 'payroll';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-money-check-alt"></i>
    </div>
    <div class="page-title-compact">
        <h2>Salary & Payroll</h2>
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
            <div class="stat-number">$72,450</div>
            <div class="stat-change positive">On track</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Employees</h3>
            <div class="stat-number">56</div>
            <div class="stat-change">Active</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-percentage"></i>
        </div>
        <div class="stat-content">
            <h3>Deductions</h3>
            <div class="stat-number">$4,980</div>
            <div class="stat-change">Taxes, benefits</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3>Status</h3>
            <div class="stat-number">Draft</div>
            <div class="stat-change">Awaiting review</div>
        </div>
    </div>
    </div>

<!-- Payroll Table -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Current Payroll (Jan 2025)</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Role</th>
                    <th>Gross</th>
                    <th>Deductions</th>
                    <th>Net Pay</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Emma Wilson</td>
                    <td>Math Teacher</td>
                    <td>$3,200.00</td>
                    <td>$260.00</td>
                    <td>$2,940.00</td>
                    <td><span class="status-badge draft">Draft</span></td>
                </tr>
                <tr>
                    <td>Liam Johnson</td>
                    <td>Science Teacher</td>
                    <td>$3,450.00</td>
                    <td>$290.00</td>
                    <td>$3,160.00</td>
                    <td><span class="status-badge draft">Draft</span></td>
                </tr>
                <tr>
                    <td>Ava Martinez</td>
                    <td>Administrator</td>
                    <td>$2,800.00</td>
                    <td>$220.00</td>
                    <td>$2,580.00</td>
                    <td><span class="status-badge draft">Draft</span></td>
                </tr>
                <tr>
                    <td>Noah Davis</td>
                    <td>IT Support</td>
                    <td>$2,600.00</td>
                    <td>$210.00</td>
                    <td>$2,390.00</td>
                    <td><span class="status-badge draft">Draft</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Recent Payroll Runs -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Recent Payroll Runs</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Payout</th>
                    <th>Employees</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>December 2024</td>
                    <td>$70,120.00</td>
                    <td>56</td>
                    <td><span class="status-badge paid">Completed</span></td>
                </tr>
                <tr>
                    <td>November 2024</td>
                    <td>$69,840.00</td>
                    <td>55</td>
                    <td><span class="status-badge paid">Completed</span></td>
                </tr>
                <tr>
                    <td>October 2024</td>
                    <td>$68,950.00</td>
                    <td>55</td>
                    <td><span class="status-badge paid">Completed</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>