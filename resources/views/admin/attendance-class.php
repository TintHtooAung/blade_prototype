<?php
$pageTitle = 'Smart Campus Nova Hub - Class Attendance';
$pageIcon = 'fas fa-user-check';
$pageHeading = 'Class Attendance Details';
$activePage = 'attendance';
$className = $_GET['class'] ?? 'Grade 9-A';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/attendance" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Attendance
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
        <h3><?php echo htmlspecialchars($className); ?> - Today</h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Date</th><td><?php echo date('Y-m-d'); ?></td></tr>
                <tr><th>Total Students</th><td>30</td></tr>
                <tr><th>Present</th><td>29</td></tr>
                <tr><th>Absent</th><td>1</td></tr>
                <tr><th>Late</th><td>0</td></tr>
            </tbody>
        </table>
    </div>

    <div class="simple-header" style="margin-top:16px;">
        <h4>Students</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead><tr><th>Student ID</th><th>Name</th><th>Status</th><th>Time</th><th>Notes</th></tr></thead>
            <tbody>
                <tr><td>S001</td><td>John Smith</td><td><span class="status-badge paid">Present</span></td><td>08:05</td><td>-</td></tr>
                <tr><td>S002</td><td>Sarah Johnson</td><td><span class="status-badge overdue">Absent</span></td><td>-</td><td>Sick</td></tr>
                <tr><td>S003</td><td>Mike Davis</td><td><span class="status-badge paid">Present</span></td><td>08:02</td><td>-</td></tr>
                <tr><td>S004</td><td>Emma Wilson</td><td><span class="status-badge paid">Present</span></td><td>08:04</td><td>-</td></tr>
                <tr><td>S005</td><td>Alex Brown</td><td><span class="status-badge paid">Present</span></td><td>08:01</td><td>-</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
