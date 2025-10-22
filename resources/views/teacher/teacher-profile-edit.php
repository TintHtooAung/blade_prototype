<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Teacher Profile';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Profile';
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
    <form id="profileForm" onsubmit="saveProfile(event)">
        <!-- Personal Information -->
        <div class="form-section">
            <h3>Personal Information</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" value="Dr. Sarah Williams" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="sarah.williams@school.edu" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" value="+1-555-0123" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" name="department" required>
                        <option value="Mathematics" selected>Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="English">English</option>
                        <option value="History">History</option>
                        <option value="Computer Science">Computer Science</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Professional Information -->
        <div class="form-section">
            <h3>Professional Information</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="subjects">Subjects</label>
                    <input type="text" id="subjects" name="subjects" value="Algebra, Calculus, Statistics" placeholder="Comma-separated subjects">
                </div>
                <div class="form-group">
                    <label for="experience">Years of Experience</label>
                    <input type="number" id="experience" name="experience" value="8" min="0" max="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" id="education" name="education" value="Ph.D. in Mathematics">
                </div>
                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <input type="text" id="specialization" name="specialization" value="Applied Mathematics, Statistics">
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="form-section">
            <h3>Contact Information</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="officeHours">Office Hours</label>
                    <input type="text" id="officeHours" name="officeHours" value="Monday-Friday, 2:00 PM - 4:00 PM">
                </div>
                <div class="form-group">
                    <label for="officeLocation">Office Location</label>
                    <input type="text" id="officeLocation" name="officeLocation" value="Room 201, Mathematics Building">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergencyContact">Emergency Contact</label>
                    <input type="text" id="emergencyContact" name="emergencyContact" value="John Williams (+1-555-0124)">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="123 Teacher Lane, Education City, EC 12345">
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-secondary" onclick="window.location.href='/teacher/teacher-profile'">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>


<script>
function saveProfile(event) {
    event.preventDefault();
    
    showActionStatus('Saving profile...', 'info');
    
    // Simulate API call
    setTimeout(() => {
        showActionStatus('Profile updated successfully!', 'success');
        setTimeout(() => {
            window.location.href = '/teacher/teacher-profile';
        }, 1500);
    }, 1000);
}
</script>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
