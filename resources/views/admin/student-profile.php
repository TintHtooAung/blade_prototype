<?php
$pageTitle = 'Smart Campus Nova Hub - Student Profile';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Profile';
$activePage = 'students';
$id = $_GET['id'] ?? 'S000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/student-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Student Profiles
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
                <tr><th style="width:220px;">Student ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td>Placeholder Name</td></tr>
                <tr><th>Class</th><td>Grade 10-A</td></tr>
                <tr><th>Age</th><td>16</td></tr>
                <tr><th>Parent/Guardian</th><td>Placeholder Parent</td></tr>
                <tr><th>Email</th><td>parent@email.com</td></tr>
                <tr><th>Phone</th><td>+1-555-1000</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
            </tbody>
        </table>
    </div>

    <div class="simple-header" style="margin-top:16px;">
        <h4>Enrollment History</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead><tr><th>Academic Year</th><th>Grade</th><th>Class</th><th>Status</th></tr></thead>
            <tbody>
                <tr><td>2024-2025</td><td>Grade 10</td><td>10-A</td><td>Active</td></tr>
                <tr><td>2023-2024</td><td>Grade 9</td><td>9-B</td><td>Completed</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
