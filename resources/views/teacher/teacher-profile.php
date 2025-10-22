<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profile';
$pageIcon = 'fas fa-user';
$pageHeading = 'My Profile';
$activePage = 'profile';

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

<div class="simple-section">
    <div class="simple-header">
        <h3>Personal Information</h3>
        <button class="simple-btn" onclick="window.location.href='/teacher/teacher-profile-edit'">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Teacher ID</th><td>T001</td></tr>
                <tr><th>Full Name</th><td>Dr. Sarah Williams</td></tr>
                <tr><th>Department</th><td>Mathematics</td></tr>
                <tr><th>Subjects</th><td>Algebra, Calculus, Statistics</td></tr>
                <tr><th>Email</th><td>sarah.williams@school.edu</td></tr>
                <tr><th>Phone</th><td>+1-555-0123</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td>2023-01-15</td></tr>
                <tr><th>Experience</th><td>8 years</td></tr>
                <tr><th>Education</th><td>Ph.D. in Mathematics</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Professional Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h3>Professional Information</h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Current Classes</th><td>5 classes (142 students)</td></tr>
                <tr><th>Office Hours</th><td>Monday-Friday, 2:00 PM - 4:00 PM</td></tr>
                <tr><th>Office Location</th><td>Room 201, Mathematics Building</td></tr>
                <tr><th>Specialization</th><td>Applied Mathematics, Statistics</td></tr>
                <tr><th>Certifications</th><td>Advanced Teaching Certificate, STEM Educator</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Contact Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h3>Contact Information</h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Emergency Contact</th><td>John Williams (+1-555-0124)</td></tr>
                <tr><th>Address</th><td>123 Teacher Lane, Education City, EC 12345</td></tr>
                <tr><th>Alternative Email</th><td>sarah.williams.personal@gmail.com</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
