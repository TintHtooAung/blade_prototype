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
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
