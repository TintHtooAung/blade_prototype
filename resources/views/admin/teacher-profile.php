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
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
