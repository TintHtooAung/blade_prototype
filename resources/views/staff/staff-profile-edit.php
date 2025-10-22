<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Staff Profile';
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
                    <input type="text" id="fullName" name="fullName" value="Michael Johnson" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="michael.johnson@school.edu" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" value="+1-555-0456" required>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <select id="position" name="position" required>
                        <option value="Administrative Coordinator" selected>Administrative Coordinator</option>
                        <option value="Office Manager">Office Manager</option>
                        <option value="Administrative Assistant">Administrative Assistant</option>
                        <option value="Event Coordinator">Event Coordinator</option>
                        <option value="Support Staff">Support Staff</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Professional Information -->
        <div class="form-section">
            <h3>Professional Information</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" name="department" required>
                        <option value="Administration" selected>Administration</option>
                        <option value="Academic Affairs">Academic Affairs</option>
                        <option value="Student Services">Student Services</option>
                        <option value="Finance">Finance</option>
                        <option value="Human Resources">Human Resources</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="experience">Years of Experience</label>
                    <input type="number" id="experience" name="experience" value="6" min="0" max="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" id="education" name="education" value="Bachelor's in Business Administration">
                </div>
                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <input type="text" id="specialization" name="specialization" value="Educational Administration, Event Planning">
                </div>
            </div>
            <div class="form-group">
                <label for="responsibilities">Responsibilities</label>
                <textarea id="responsibilities" name="responsibilities" rows="3" placeholder="Describe your main responsibilities">Event Management, Teacher Coordination, Administrative Support</textarea>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="form-section">
            <h3>Contact Information</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="officeHours">Office Hours</label>
                    <input type="text" id="officeHours" name="officeHours" value="Monday-Friday, 8:00 AM - 5:00 PM">
                </div>
                <div class="form-group">
                    <label for="officeLocation">Office Location</label>
                    <input type="text" id="officeLocation" name="officeLocation" value="Room 101, Administration Building">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergencyContact">Emergency Contact</label>
                    <input type="text" id="emergencyContact" name="emergencyContact" value="Lisa Johnson (+1-555-0457)">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="456 Staff Street, Education City, EC 12345">
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-secondary" onclick="window.location.href='/staff/staff-profile'">
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
            window.location.href = '/staff/staff-profile';
        }, 1500);
    }, 1000);
}
</script>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>
