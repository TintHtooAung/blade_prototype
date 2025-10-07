<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Attendance';
$pageIcon = 'fas fa-clipboard-check';
$pageHeading = 'Mark Staff Attendance';
$activePage = 'attendance';

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
        <h3>Today - <?php echo date('Y-m-d'); ?></h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = [
                    ['E001','John Miller','Administration','Secretary'],
                    ['E002','Maria Santos','Administration','Accountant'],
                    ['E003','Peter Johnson','Maintenance','Technician'],
                    ['E004','Anna Williams','Food Service','Cook'],
                    ['E005','Carlos Rodriguez','Security','Guard']
                ];
                foreach ($rows as $r): ?>
                <tr>
                    <td><strong><?php echo $r[0]; ?></strong></td>
                    <td><?php echo $r[1]; ?></td>
                    <td><?php echo $r[2]; ?></td>
                    <td><?php echo $r[3]; ?></td>
                    <td>
                        <select class="form-select">
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                            <option value="Late">Late</option>
                        </select>
                    </td>
                    <td><input type="time" class="form-input" value="08:00"></td>
                    <td><input type="text" class="form-input" placeholder="Notes"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="form-actions" style="margin-top:12px;">
        <button class="simple-btn secondary" onclick="window.location.href='/admin/attendance'">Cancel</button>
        <button class="simple-btn primary" onclick="alert('Attendance saved (mock).')"><i class="fas fa-check"></i> Save Attendance</button>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
