<?php
$pageTitle = 'Smart Campus Nova Hub - School Info';
$pageIcon = 'fas fa-school';
$pageHeading = 'School Info';
$activePage = 'school';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-school"></i>
    </div>
    <div class="page-title-compact">
        <h2>School Information</h2>
    </div>
    </div>

<!-- School Profile -->
<div class="simple-section">
    <div class="simple-header">
        <h3>School Profile</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <th style="width: 220px;">Institution Name</th>
                    <td>Smart Campus International School</td>
                </tr>
                <tr>
                    <th>Campus Code</th>
                    <td>SC-NS-001</td>
                </tr>
                <tr>
                    <th>Academic Year</th>
                    <td>2024 - 2025</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>123 Nova Avenue, Springfield</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>+1 (555) 012-3456 · contact@smartcampus.edu</td>
                </tr>
                <tr>
                    <th>Principal</th>
                    <td>Dr. Olivia Bennett</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Key Contacts -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Key Contacts</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dr. Olivia Bennett</td>
                    <td>Principal</td>
                    <td>olivia.bennett@smartcampus.edu</td>
                    <td>+1 (555) 100-0100</td>
                </tr>
                <tr>
                    <td>James Carter</td>
                    <td>Vice Principal</td>
                    <td>james.carter@smartcampus.edu</td>
                    <td>+1 (555) 100-0101</td>
                </tr>
                <tr>
                    <td>Sarah Lee</td>
                    <td>Finance Manager</td>
                    <td>sarah.lee@smartcampus.edu</td>
                    <td>+1 (555) 100-0102</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>