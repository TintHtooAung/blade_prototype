<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Teacher Profile';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Teacher Profile';
$activePage = 'teachers';
$id = $_GET['id'] ?? 'T000';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/teacher-profile/<?php echo htmlspecialchars($id); ?>" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Teacher Profile
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
                <h3>Edit Teacher: <?php echo htmlspecialchars($id); ?></h3>
                <span class="exam-id"><?php echo htmlspecialchars($id); ?></span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Teacher</span>
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
                        <label>Teacher ID</label>
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
                        <input type="email" class="form-input" placeholder="teacher@school.edu" value="placeholder@school.edu">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" placeholder="+1-555-0000" value="+1-555-0101">
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
                <div class="form-row">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-input" value="1988-06-15">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NRC Number</label>
                        <input type="text" class="form-input" placeholder="e.g., 12/STU(N)345678" value="12/TEA(N)123456">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Address</label>
                        <input type="text" class="form-input" placeholder="Street, City, State" value="123 Teacher St, City, State">
                    </div>
                    <div class="form-group">
                        <label>Emergency Contact</label>
                        <input type="text" class="form-input" placeholder="Name - Phone" value="John Doe - +1-555-0111">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-graduation-cap"></i> Academic Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select">
                            <option value="mathematics" selected>Mathematics</option>
                            <option value="science">Science</option>
                            <option value="english">English</option>
                            <option value="history">History</option>
                            <option value="arts">Arts</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Subjects</label>
                        <input type="text" class="form-input" placeholder="e.g., Algebra, Calculus" value="Algebra, Calculus">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Qualification</label>
                        <input type="text" class="form-input" placeholder="e.g., M.Ed, Ph.D" value="M.Ed in Mathematics">
                    </div>
                    <div class="form-group">
                        <label>Experience (Years)</label>
                        <input type="number" class="form-input" placeholder="Years" value="5">
                    </div>
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" class="form-input" value="2020-01-15">
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
                        <input type="number" class="form-input" placeholder="0.00" value="3500" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Teaching Allowance</label>
                        <input type="number" class="form-input" placeholder="0.00" value="500" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Experience Bonus</label>
                        <input type="number" class="form-input" placeholder="0.00" value="300" step="0.01">
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
    alert('Teacher profile updated successfully!');
    window.location.href = '/admin/teacher-profile/<?php echo htmlspecialchars($id); ?>';
}

function deleteProfile() {
    showConfirmDialog({
        title: 'Delete Teacher Profile',
        message: 'Are you sure you want to delete this teacher profile? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Teacher profile deleted successfully!');
            window.location.href = '/admin/teacher-profiles';
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
            window.location.href = '/admin/teacher-profile/<?php echo htmlspecialchars($id); ?>';
        }
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

