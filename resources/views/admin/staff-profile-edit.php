<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Staff Profile';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Staff Profile';
$activePage = 'employees';
$id = $_GET['id'] ?? 'E000';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/staff-profile/<?php echo htmlspecialchars($id); ?>" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Staff Profile
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

<!-- Edit Profile Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3>Edit Staff: <?php echo htmlspecialchars($id); ?></h3>
                <span class="exam-id"><?php echo htmlspecialchars($id); ?></span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Staff</span>
                <span class="badge active-badge">Active</span>
            </div>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-user"></i> Personal Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Staff ID</label>
                        <input type="text" class="form-input" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Full Name</label>
                        <input type="text" class="form-input" placeholder="Enter full name" value="Placeholder Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-input" placeholder="staff@school.edu" value="placeholder@school.edu">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" placeholder="+1-555-0000" value="+1-555-2001">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="on-leave">On Leave</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Employment Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-briefcase"></i> Employment Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select">
                            <option value="administration" selected>Administration</option>
                            <option value="library">Library</option>
                            <option value="it">IT Support</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="cafeteria">Cafeteria</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Position</label>
                        <input type="text" class="form-input" placeholder="e.g., Secretary" value="Secretary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Employment Type</label>
                        <select class="form-select">
                            <option value="full-time" selected>Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="contract">Contract</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" class="form-input" value="2023-01-01">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Salary Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-dollar-sign"></i> Salary Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Base Salary</label>
                        <input type="number" class="form-input" placeholder="0.00" value="2200" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Position Allowance</label>
                        <input type="number" class="form-input" placeholder="0.00" value="300" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Service Bonus</label>
                        <input type="number" class="form-input" placeholder="0.00" value="200" step="0.01">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="cancelEdit()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="deleteProfile()">
                    <i class="fas fa-trash"></i> Delete Profile
                </button>
                <button class="simple-btn primary" onclick="saveProfile()">
                    <i class="fas fa-check"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function saveProfile() {
    alert('Staff profile updated successfully!');
    window.location.href = '/admin/staff-profile/<?php echo htmlspecialchars($id); ?>';
}

function deleteProfile() {
    showConfirmDialog({
        title: 'Delete Staff Profile',
        message: 'Are you sure you want to delete this staff profile? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Staff profile deleted successfully!');
            window.location.href = '/admin/employee-profiles';
        }
    });
}

function cancelEdit() {
    showConfirmDialog({
        title: 'Discard Changes',
        message: 'Are you sure you want to discard your changes?',
        confirmText: 'Discard',
        confirmIcon: 'fas fa-times',
        onConfirm: () => {
            window.location.href = '/admin/staff-profile/<?php echo htmlspecialchars($id); ?>';
        }
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

