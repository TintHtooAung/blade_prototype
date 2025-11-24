<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Profile';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Profile';
$activePage = 'employees';
$id = $_GET['id'] ?? 'E000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/employee-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Staff Profiles
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
        <h3>Profile: <?php echo htmlspecialchars($id); ?></h3>
    </div>

    <!-- Basic Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-info-circle"></i> Basic Information</h4>
        <button class="simple-btn" onclick="openEditModal('basic')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Staff ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td id="basicFullName">Placeholder Name</td></tr>
                <tr><th>Department</th><td id="basicDepartment">Administration</td></tr>
                <tr><th>Position</th><td id="basicPosition">Secretary</td></tr>
                <tr><th>Email</th><td id="basicEmail">placeholder@school.edu</td></tr>
                <tr><th>Phone</th><td id="basicPhone">+1-555-2001</td></tr>
                <tr><th>Status</th><td id="basicStatus"><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td id="basicJoinDate">2022-08-01</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Personal Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user"></i> Personal Information</h4>
        <button class="simple-btn" onclick="openEditModal('personal')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">NRC Number</th><td id="personalNRC">12/DEF(N)789012</td></tr>
                <tr><th>Date of Birth</th><td id="personalDOB">1990-07-22</td></tr>
                <tr><th>Gender</th><td id="personalGender">Female</td></tr>
                <tr><th>Address</th><td id="personalAddress">456 Oak Avenue, City, State 12345</td></tr>
                <tr><th>Emergency Contact</th><td id="personalEmergency">John Doe - +1-555-2002</td></tr>
                <tr><th>Blood Type</th><td id="personalBloodType">A+</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Employment Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-briefcase"></i> Employment Information</h4>
        <button class="simple-btn" onclick="openEditModal('employment')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Department</th><td id="employmentDepartment">Administration</td></tr>
                <tr><th>Position</th><td id="employmentPosition">Secretary</td></tr>
                <tr><th>Employment Type</th><td id="employmentType">Full-time</td></tr>
                <tr><th>Join Date</th><td id="employmentJoinDate">2022-08-01</td></tr>
            </tbody>
        </table>
    </div>

    

</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';

// Load profile data from localStorage
document.addEventListener('DOMContentLoaded', function() {
    loadStaffProfileData();
});

function loadStaffProfileData() {
    try {
        const staff = JSON.parse(localStorage.getItem('staff') || '[]');
        const employee = staff.find(s => s.id === profileId);
        
        if (employee) {
            // Basic Information
            if (employee.name) document.getElementById('basicFullName').textContent = employee.name;
            if (employee.dept) document.getElementById('basicDepartment').textContent = employee.dept;
            if (employee.pos) document.getElementById('basicPosition').textContent = employee.pos;
            if (employee.email) document.getElementById('basicEmail').textContent = employee.email;
            if (employee.phone) document.getElementById('basicPhone').textContent = employee.phone;
            if (employee.status) {
                const statusClass = employee.status.toLowerCase() === 'active' ? 'paid' : employee.status.toLowerCase() === 'on leave' ? 'pending' : 'draft';
                document.getElementById('basicStatus').innerHTML = `<span class="status-badge ${statusClass}">${employee.status}</span>`;
            }
            if (employee.hire) document.getElementById('basicJoinDate').textContent = employee.hire;
            
            // Personal Information
            if (employee.nrc) document.getElementById('personalNRC').textContent = employee.nrc;
            if (employee.dob) document.getElementById('personalDOB').textContent = employee.dob;
            if (employee.gender) document.getElementById('personalGender').textContent = employee.gender;
            if (employee.address) document.getElementById('personalAddress').textContent = employee.address;
            if (employee.emergencyContact) document.getElementById('personalEmergency').textContent = employee.emergencyContact;
            
            // Employment Information
            if (employee.dept) document.getElementById('employmentDepartment').textContent = employee.dept;
            if (employee.pos) document.getElementById('employmentPosition').textContent = employee.pos;
            if (employee.hire) document.getElementById('employmentJoinDate').textContent = employee.hire;
        }
    } catch (e) {
        console.error('Error loading staff profile:', e);
    }
}

// Modal functions for editing sections
function openEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (!modal) return;
    
    if (section === 'basic') {
        document.getElementById('modalBasicFullName').value = document.getElementById('basicFullName').textContent.trim();
        document.getElementById('modalBasicDepartment').value = document.getElementById('basicDepartment').textContent.trim();
        document.getElementById('modalBasicPosition').value = document.getElementById('basicPosition').textContent.trim();
        document.getElementById('modalBasicEmail').value = document.getElementById('basicEmail').textContent.trim();
        document.getElementById('modalBasicPhone').value = document.getElementById('basicPhone').textContent.trim();
        const statusText = document.getElementById('basicStatus').textContent.trim();
        document.getElementById('modalBasicStatus').value = statusText.toLowerCase();
        document.getElementById('modalBasicJoinDate').value = document.getElementById('basicJoinDate').textContent.trim();
    } else if (section === 'personal') {
        document.getElementById('modalPersonalNRC').value = document.getElementById('personalNRC').textContent.trim();
        document.getElementById('modalPersonalDOB').value = document.getElementById('personalDOB').textContent.trim();
        document.getElementById('modalPersonalGender').value = document.getElementById('personalGender').textContent.trim();
        document.getElementById('modalPersonalAddress').value = document.getElementById('personalAddress').textContent.trim();
        document.getElementById('modalPersonalEmergency').value = document.getElementById('personalEmergency').textContent.trim();
        document.getElementById('modalPersonalBloodType').value = document.getElementById('personalBloodType').textContent.trim();
    } else if (section === 'employment') {
        document.getElementById('modalEmploymentDepartment').value = document.getElementById('employmentDepartment').textContent.trim();
        document.getElementById('modalEmploymentPosition').value = document.getElementById('employmentPosition').textContent.trim();
        document.getElementById('modalEmploymentType').value = document.getElementById('employmentType').textContent.trim();
        document.getElementById('modalEmploymentJoinDate').value = document.getElementById('employmentJoinDate').textContent.trim();
    }
    
    modal.style.display = 'flex';
}

function closeEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (modal) modal.style.display = 'none';
}

function saveBasicInfo() {
    document.getElementById('basicFullName').textContent = document.getElementById('modalBasicFullName').value;
    document.getElementById('basicDepartment').textContent = document.getElementById('modalBasicDepartment').value;
    document.getElementById('basicPosition').textContent = document.getElementById('modalBasicPosition').value;
    document.getElementById('basicEmail').textContent = document.getElementById('modalBasicEmail').value;
    document.getElementById('basicPhone').textContent = document.getElementById('modalBasicPhone').value;
    const status = document.getElementById('modalBasicStatus').value;
    const statusClass = status === 'active' ? 'paid' : status === 'inactive' ? 'draft' : 'pending';
    document.getElementById('basicStatus').innerHTML = `<span class="status-badge ${statusClass}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;
    document.getElementById('basicJoinDate').textContent = document.getElementById('modalBasicJoinDate').value;
    
    // Save to localStorage
    saveStaffToLocalStorage({
        name: document.getElementById('modalBasicFullName').value,
        dept: document.getElementById('modalBasicDepartment').value,
        pos: document.getElementById('modalBasicPosition').value,
        email: document.getElementById('modalBasicEmail').value,
        phone: document.getElementById('modalBasicPhone').value,
        status: status.charAt(0).toUpperCase() + status.slice(1),
        hire: document.getElementById('modalBasicJoinDate').value
    });
    
    closeEditModal('basic');
    showToast('Basic information updated successfully!', 'success');
}

function savePersonalInfo() {
    document.getElementById('personalNRC').textContent = document.getElementById('modalPersonalNRC').value;
    document.getElementById('personalDOB').textContent = document.getElementById('modalPersonalDOB').value;
    document.getElementById('personalGender').textContent = document.getElementById('modalPersonalGender').value;
    document.getElementById('personalAddress').textContent = document.getElementById('modalPersonalAddress').value;
    document.getElementById('personalEmergency').textContent = document.getElementById('modalPersonalEmergency').value;
    document.getElementById('personalBloodType').textContent = document.getElementById('modalPersonalBloodType').value;
    
    // Save to localStorage
    saveStaffToLocalStorage({
        nrc: document.getElementById('modalPersonalNRC').value,
        dob: document.getElementById('modalPersonalDOB').value,
        gender: document.getElementById('modalPersonalGender').value,
        address: document.getElementById('modalPersonalAddress').value,
        emergencyContact: document.getElementById('modalPersonalEmergency').value
    });
    
    closeEditModal('personal');
    showToast('Personal information updated successfully!', 'success');
}

function saveEmploymentInfo() {
    document.getElementById('employmentDepartment').textContent = document.getElementById('modalEmploymentDepartment').value;
    document.getElementById('employmentPosition').textContent = document.getElementById('modalEmploymentPosition').value;
    document.getElementById('employmentType').textContent = document.getElementById('modalEmploymentType').value;
    document.getElementById('employmentJoinDate').textContent = document.getElementById('modalEmploymentJoinDate').value;
    // Update basic display too
    document.getElementById('basicDepartment').textContent = document.getElementById('modalEmploymentDepartment').value;
    document.getElementById('basicPosition').textContent = document.getElementById('modalEmploymentPosition').value;
    
    // Save to localStorage
    saveStaffToLocalStorage({
        dept: document.getElementById('modalEmploymentDepartment').value,
        pos: document.getElementById('modalEmploymentPosition').value,
        hire: document.getElementById('modalEmploymentJoinDate').value
    });
    
    closeEditModal('employment');
    showToast('Employment information updated successfully!', 'success');
}

// Helper function to save staff data to localStorage
function saveStaffToLocalStorage(updates) {
    try {
        const staff = JSON.parse(localStorage.getItem('staff') || '[]');
        const index = staff.findIndex(s => s.id === profileId);
        if (index !== -1) {
            staff[index] = { ...staff[index], ...updates };
            localStorage.setItem('staff', JSON.stringify(staff));
        }
    } catch (e) {
        console.error('Error saving staff data:', e);
    }
}

</script>

<!-- Edit Modals for Staff Profile -->
<!-- Basic Information Modal -->
<div id="editBasicModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-info-circle"></i> Edit Basic Information</h4>
            <button class="icon-btn" onclick="closeEditModal('basic')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Staff ID</label>
                        <input type="text" class="form-input" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Full Name</label>
                        <input type="text" class="form-input" id="modalBasicFullName" placeholder="Enter full name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select" id="modalBasicDepartment">
                            <option value="Administration">Administration</option>
                            <option value="Library">Library</option>
                            <option value="IT Support">IT Support</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Cafeteria">Cafeteria</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Position</label>
                        <input type="text" class="form-input" id="modalBasicPosition" placeholder="e.g., Secretary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-input" id="modalBasicEmail" placeholder="staff@school.edu">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" id="modalBasicPhone" placeholder="+1-555-0000">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="modalBasicStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="on-leave">On Leave</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" class="form-input" id="modalBasicJoinDate">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('basic')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveBasicInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Personal Information Modal -->
<div id="editPersonalModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-user"></i> Edit Personal Information</h4>
            <button class="icon-btn" onclick="closeEditModal('personal')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>NRC Number</label>
                        <input type="text" class="form-input" id="modalPersonalNRC" placeholder="e.g., 12/DEF(N)789012">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-input" id="modalPersonalDOB">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select" id="modalPersonalGender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Address</label>
                        <input type="text" class="form-input" id="modalPersonalAddress" placeholder="Street, City, State">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Emergency Contact</label>
                        <input type="text" class="form-input" id="modalPersonalEmergency" placeholder="Name - Phone">
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                        <select class="form-select" id="modalPersonalBloodType">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('personal')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="savePersonalInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Employment Information Modal -->
<div id="editEmploymentModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-briefcase"></i> Edit Employment Information</h4>
            <button class="icon-btn" onclick="closeEditModal('employment')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select" id="modalEmploymentDepartment">
                            <option value="Administration">Administration</option>
                            <option value="Library">Library</option>
                            <option value="IT Support">IT Support</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Cafeteria">Cafeteria</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Position</label>
                        <input type="text" class="form-input" id="modalEmploymentPosition" placeholder="e.g., Secretary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Employment Type</label>
                        <select class="form-select" id="modalEmploymentType">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" class="form-input" id="modalEmploymentJoinDate">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('employment')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveEmploymentInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
