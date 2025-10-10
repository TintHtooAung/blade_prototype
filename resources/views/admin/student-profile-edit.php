<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Student Profile';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Student Profile';
$activePage = 'students';
$id = $_GET['id'] ?? 'S000';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/student-profile/<?php echo htmlspecialchars($id); ?>" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Student Profile
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
                <h3>Edit Student: <?php echo htmlspecialchars($id); ?></h3>
                <span class="exam-id"><?php echo htmlspecialchars($id); ?></span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Student</span>
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
                        <label>Student ID</label>
                        <input type="text" class="form-input" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Full Name</label>
                        <input type="text" class="form-input" placeholder="Enter full name" value="Placeholder Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-input" value="2008-05-15">
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
                        <label>Status</label>
                        <select class="form-select">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="graduated">Graduated</option>
                            <option value="transferred">Transferred</option>
                        </select>
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
                        <label>Grade</label>
                        <select class="form-select">
                            <option value="grade-7">Grade 7</option>
                            <option value="grade-8">Grade 8</option>
                            <option value="grade-9">Grade 9</option>
                            <option value="grade-10" selected>Grade 10</option>
                            <option value="grade-11">Grade 11</option>
                            <option value="grade-12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-select">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Admission Date</label>
                        <input type="date" class="form-input" value="2023-09-01">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Guardian Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-users"></i> Guardian Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Parent/Guardian Name</label>
                        <input type="text" class="form-input" placeholder="Enter parent/guardian name" value="Placeholder Parent">
                    </div>
                    <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-select">
                            <option value="father" selected>Father</option>
                            <option value="mother">Mother</option>
                            <option value="guardian">Guardian</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-input" placeholder="parent@email.com" value="parent@email.com">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" placeholder="+1-555-0000" value="+1-555-1000">
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
    alert('Student profile updated successfully!');
    window.location.href = '/admin/student-profile/<?php echo htmlspecialchars($id); ?>';
}

function deleteProfile() {
    showConfirmDialog({
        title: 'Delete Student Profile',
        message: 'Are you sure you want to delete this student profile? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Student profile deleted successfully!');
            window.location.href = '/admin/student-profiles';
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
            window.location.href = '/admin/student-profile/<?php echo htmlspecialchars($id); ?>';
        }
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

