<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Profile';
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
        <button class="simple-btn" onclick="window.location.href='/staff/staff-profile-edit'">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Staff ID</th><td>ST001</td></tr>
                <tr><th>Full Name</th><td>Michael Johnson</td></tr>
                <tr><th>Position</th><td>Administrative Coordinator</td></tr>
                <tr><th>Department</th><td>Administration</td></tr>
                <tr><th>Email</th><td>michael.johnson@school.edu</td></tr>
                <tr><th>Phone</th><td>+1-555-0456</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td>2022-03-10</td></tr>
                <tr><th>Experience</th><td>6 years</td></tr>
                <tr><th>Education</th><td>Bachelor's in Business Administration</td></tr>
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
                <tr><th style="width:220px;">Responsibilities</th><td>Event Management, Teacher Coordination, Administrative Support</td></tr>
                <tr><th>Office Hours</th><td>Monday-Friday, 8:00 AM - 5:00 PM</td></tr>
                <tr><th>Office Location</th><td>Room 101, Administration Building</td></tr>
                <tr><th>Specialization</th><td>Educational Administration, Event Planning</td></tr>
                <tr><th>Certifications</th><td>Administrative Professional Certificate, Project Management</td></tr>
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
                <tr><th style="width:220px;">Emergency Contact</th><td>Lisa Johnson (+1-555-0457)</td></tr>
                <tr><th>Address</th><td>456 Staff Street, Education City, EC 12345</td></tr>
                <tr><th>Alternative Email</th><td>michael.johnson.personal@gmail.com</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>
