<?php
$pageTitle = 'Smart Campus Nova Hub - Department Management';
$pageIcon = 'fas fa-building';
$pageHeading = 'Department Management';
$activePage = 'department-management';

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
        <h3>Departments</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Department Code</th>
                    <th>Department Name</th>
                    <th>Staff</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="staffDeptTableBody">
                <tr>
                    <td><strong>PRIMARY</strong></td>
                    <td>Primary Teachers</td>
                    <td>15</td>
                    <td>
                        <a class="view-btn" href="/admin/academic/department-detail/PRIMARY">View</a>
                    </td>
                </tr>
                <tr>
                    <td><strong>LANG</strong></td>
                    <td>Language Teachers</td>
                    <td>8</td>
                    <td>
                        <a class="view-btn" href="/admin/academic/department-detail/LANG">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>


