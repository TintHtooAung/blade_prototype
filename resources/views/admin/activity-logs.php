<?php
$pageTitle = 'Smart Campus Nova Hub - User Activity Logs';
$pageIcon = 'fas fa-chart-line';
$pageHeading = 'User Activity Logs';
$activePage = 'logs';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-chart-line"></i>
    </div>
    <div class="page-title-compact">
        <h2>User Activity Logs</h2>
    </div>
    </div>

<!-- Quick Filters (Static placeholders) -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Overview</h3>
    </div>
    <div class="stats-grid-secondary vertical-stats">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-user-check"></i></div>
            <div class="stat-content">
                <h3>Active Users</h3>
                <div class="stat-number">128</div>
                <div class="stat-change positive">Today</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-sign-in-alt"></i></div>
            <div class="stat-content">
                <h3>Logins</h3>
                <div class="stat-number">342</div>
                <div class="stat-change">Last 24h</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="stat-content">
                <h3>Alerts</h3>
                <div class="stat-number">2</div>
                <div class="stat-change negative">Needs review</div>
            </div>
        </div>
    </div>
</div>

<!-- Activity Log Table -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Recent Activity</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Action</th>
                    <th>IP</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2025-01-05 10:22</td>
                    <td>alice.johnson</td>
                    <td>Teacher</td>
                    <td>Logged in</td>
                    <td>192.168.1.24</td>
                    <td><span class="status-badge paid">OK</span></td>
                </tr>
                <tr>
                    <td>2025-01-05 10:18</td>
                    <td>admin</td>
                    <td>Administrator</td>
                    <td>Updated schedule</td>
                    <td>192.168.1.5</td>
                    <td><span class="status-badge paid">OK</span></td>
                </tr>
                <tr>
                    <td>2025-01-05 10:10</td>
                    <td>michael.brown</td>
                    <td>Student</td>
                    <td>Password change</td>
                    <td>192.168.1.67</td>
                    <td><span class="status-badge paid">OK</span></td>
                </tr>
                <tr>
                    <td>2025-01-05 09:58</td>
                    <td>emma.davis</td>
                    <td>Finance</td>
                    <td>Viewed invoices</td>
                    <td>192.168.1.33</td>
                    <td><span class="status-badge paid">OK</span></td>
                </tr>
                <tr>
                    <td>2025-01-05 09:45</td>
                    <td>unknown</td>
                    <td>-</td>
                    <td>Failed login</td>
                    <td>203.0.113.55</td>
                    <td><span class="status-badge overdue">Alert</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>