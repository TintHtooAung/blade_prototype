<?php
$pageTitle = 'Smart Campus Nova Hub - Student Profile';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Profile';
$activePage = 'students';
$id = $_GET['id'] ?? 'S000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/student-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Student Profiles
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
                <tr><th style="width:220px;">Student ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td id="basicFullName">Placeholder Name</td></tr>
                <tr><th>Class</th><td id="basicClass">Grade 10-A</td></tr>
                <tr><th>Age</th><td id="basicAge">16</td></tr>
                <tr><th>Parent/Guardian</th><td id="basicGuardian">Placeholder Parent</td></tr>
                <tr><th>Guardian Email</th><td id="basicGuardianEmail">parent@email.com</td></tr>
                <tr><th>Phone</th><td id="basicPhone">+1-555-1000</td></tr>
                <tr><th>Status</th><td id="basicStatus"><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td id="basicJoinDate">2023-09-01</td></tr>
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
                <tr><th style="width:220px;">NRC Number</th><td id="personalNRC">12/STU(N)345678</td></tr>
                <tr><th>Date of Birth</th><td id="personalDOB">2008-05-12</td></tr>
                <tr><th>Gender</th><td id="personalGender">Male</td></tr>
                <tr><th>Address</th><td id="personalAddress">789 Student Lane, City, State 12345</td></tr>
                <tr><th>Emergency Contact</th><td id="personalEmergency">Mary Johnson - +1-555-1001</td></tr>
                <tr><th>Blood Type</th><td id="personalBloodType">B+</td></tr>
                <tr><th>Medical Conditions</th><td id="personalMedical">None</td></tr>
                <tr><th>Allergies</th><td id="personalAllergies">None</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Academic Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-graduation-cap"></i> Academic Information</h4>
        <button class="simple-btn" onclick="openEditModal('academic')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Grade</th><td id="academicGrade">Grade 10</td></tr>
                <tr><th>Class</th><td id="academicClass">A</td></tr>
                <tr><th>Admission Date</th><td id="academicAdmission">2023-09-01</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Guardian Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-users"></i> Guardian Information</h4>
        <button class="simple-btn" onclick="openEditModal('guardian')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Parent/Guardian Name</th><td id="guardianName">Placeholder Parent</td></tr>
                <tr><th>Relationship</th><td id="guardianRelationship">Father</td></tr>
                <tr><th>Email</th><td id="guardianEmail">parent@email.com</td></tr>
                <tr><th>Phone</th><td id="guardianPhone">+1-555-1000</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Exam Results -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-clipboard-list"></i> Exam Results</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Math</th>
                    <th>Phys</th>
                    <th>Chem</th>
                    <th>Bio</th>
                    <th>Eng</th>
                    <th>Myan</th>
                    <th>Total</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody id="examResultsTable">
                <!-- Exam results will be populated by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Attendance Summary -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-calendar-check"></i> Attendance Summary</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Days</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Late</th>
                    <th>Attendance %</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="attendanceSummaryTable">
                <!-- Attendance data will be populated by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Portal Access Information -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user-lock"></i> Guardian Portal Access</h4>
        <button class="simple-btn" onclick="handlePortalAction()" id="portalActionBtn">
            <i class="fas fa-check-circle"></i> Complete Setup
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <th style="width:220px;">Portal User ID</th>
                    <td>
                        <input type="text" class="form-input" id="portalUserIdInput" placeholder="e.g., GP001" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>Portal Email</th>
                    <td>
                        <input type="email" class="form-input" id="portalEmailInput" placeholder="guardian@email.com" style="width:100%;">
                    </td>
                </tr>
                <tr><th>Portal Role</th><td>Guardian Portal</td></tr>
                <tr><th>Setup Status</th><td><span class="status-badge draft" id="setupStatus">Incomplete</span></td></tr>
                <tr><th>Last Updated</th><td id="lastUpdated">-</td></tr>
            </tbody>
        </table>
    </div>

</div>

<!-- Edit Modals -->
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
                        <label>Student ID</label>
                        <input type="text" class="form-input" id="modalBasicId" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Full Name</label>
                        <input type="text" class="form-input" id="modalBasicFullName" placeholder="Enter full name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-input" id="modalBasicClass" placeholder="e.g., Grade 10-A">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" class="form-input" id="modalBasicAge" placeholder="Age">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="modalBasicStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="graduated">Graduated</option>
                            <option value="transferred">Transferred</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Parent/Guardian</label>
                        <input type="text" class="form-input" id="modalBasicGuardian" placeholder="Parent/Guardian name">
                    </div>
                    <div class="form-group">
                        <label>Guardian Email</label>
                        <input type="email" class="form-input" id="modalBasicGuardianEmail" placeholder="parent@email.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" id="modalBasicPhone" placeholder="+1-555-0000">
                    </div>
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
                        <input type="text" class="form-input" id="modalPersonalNRC" placeholder="e.g., 12/STU(N)345678">
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
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Medical Conditions</label>
                        <input type="text" class="form-input" id="modalPersonalMedical" placeholder="None">
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Allergies</label>
                        <input type="text" class="form-input" id="modalPersonalAllergies" placeholder="None">
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

<!-- Academic Information Modal -->
<div id="editAcademicModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-graduation-cap"></i> Edit Academic Information</h4>
            <button class="icon-btn" onclick="closeEditModal('academic')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Grade</label>
                        <select class="form-select" id="modalAcademicGrade">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10" selected>Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-select" id="modalAcademicClass">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Admission Date</label>
                        <input type="date" class="form-input" id="modalAcademicAdmission">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('academic')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveAcademicInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Guardian Information Modal -->
<div id="editGuardianModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-users"></i> Edit Guardian Information</h4>
            <button class="icon-btn" onclick="closeEditModal('guardian')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Parent/Guardian Name</label>
                        <input type="text" class="form-input" id="modalGuardianName" placeholder="Enter parent/guardian name">
                    </div>
                    <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-select" id="modalGuardianRelationship">
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Guardian">Guardian</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-input" id="modalGuardianEmail" placeholder="parent@email.com">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" id="modalGuardianPhone" placeholder="+1-555-0000">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('guardian')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveGuardianInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';
let setupComplete = false;

// Modal functions
function openEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (!modal) return;
    
    // Load current data into modal inputs
    if (section === 'basic') {
        document.getElementById('modalBasicFullName').value = document.getElementById('basicFullName').textContent.trim();
        document.getElementById('modalBasicClass').value = document.getElementById('basicClass').textContent.trim();
        document.getElementById('modalBasicAge').value = document.getElementById('basicAge').textContent.trim();
        const statusText = document.getElementById('basicStatus').textContent.trim();
        document.getElementById('modalBasicStatus').value = statusText.toLowerCase();
        document.getElementById('modalBasicGuardian').value = document.getElementById('basicGuardian').textContent.trim();
        document.getElementById('modalBasicGuardianEmail').value = document.getElementById('basicGuardianEmail').textContent.trim();
        document.getElementById('modalBasicPhone').value = document.getElementById('basicPhone').textContent.trim();
        document.getElementById('modalBasicJoinDate').value = document.getElementById('basicJoinDate').textContent.trim();
    } else if (section === 'personal') {
        document.getElementById('modalPersonalNRC').value = document.getElementById('personalNRC').textContent.trim();
        document.getElementById('modalPersonalDOB').value = document.getElementById('personalDOB').textContent.trim();
        document.getElementById('modalPersonalGender').value = document.getElementById('personalGender').textContent.trim();
        document.getElementById('modalPersonalAddress').value = document.getElementById('personalAddress').textContent.trim();
        document.getElementById('modalPersonalEmergency').value = document.getElementById('personalEmergency').textContent.trim();
        document.getElementById('modalPersonalBloodType').value = document.getElementById('personalBloodType').textContent.trim();
        document.getElementById('modalPersonalMedical').value = document.getElementById('personalMedical').textContent.trim();
        document.getElementById('modalPersonalAllergies').value = document.getElementById('personalAllergies').textContent.trim();
    } else if (section === 'academic') {
        const gradeText = document.getElementById('academicGrade').textContent.trim();
        document.getElementById('modalAcademicGrade').value = gradeText;
        document.getElementById('modalAcademicClass').value = document.getElementById('academicClass').textContent.trim();
        document.getElementById('modalAcademicAdmission').value = document.getElementById('academicAdmission').textContent.trim();
    } else if (section === 'guardian') {
        document.getElementById('modalGuardianName').value = document.getElementById('guardianName').textContent.trim();
        document.getElementById('modalGuardianRelationship').value = document.getElementById('guardianRelationship').textContent.trim();
        document.getElementById('modalGuardianEmail').value = document.getElementById('guardianEmail').textContent.trim();
        document.getElementById('modalGuardianPhone').value = document.getElementById('guardianPhone').textContent.trim();
    }
    
    modal.style.display = 'flex';
}

function closeEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (modal) modal.style.display = 'none';
}

function saveBasicInfo() {
    document.getElementById('basicFullName').textContent = document.getElementById('modalBasicFullName').value;
    document.getElementById('basicClass').textContent = document.getElementById('modalBasicClass').value;
    document.getElementById('basicAge').textContent = document.getElementById('modalBasicAge').value;
    const status = document.getElementById('modalBasicStatus').value;
    const statusClass = status === 'active' ? 'paid' : status === 'inactive' ? 'draft' : 'pending';
    document.getElementById('basicStatus').innerHTML = `<span class="status-badge ${statusClass}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;
    document.getElementById('basicGuardian').textContent = document.getElementById('modalBasicGuardian').value;
    document.getElementById('basicGuardianEmail').textContent = document.getElementById('modalBasicGuardianEmail').value;
    document.getElementById('basicPhone').textContent = document.getElementById('modalBasicPhone').value;
    document.getElementById('basicJoinDate').textContent = document.getElementById('modalBasicJoinDate').value;
    
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
    document.getElementById('personalMedical').textContent = document.getElementById('modalPersonalMedical').value;
    document.getElementById('personalAllergies').textContent = document.getElementById('modalPersonalAllergies').value;
    
    closeEditModal('personal');
    showToast('Personal information updated successfully!', 'success');
}

function saveAcademicInfo() {
    document.getElementById('academicGrade').textContent = document.getElementById('modalAcademicGrade').value;
    document.getElementById('academicClass').textContent = document.getElementById('modalAcademicClass').value;
    document.getElementById('academicAdmission').textContent = document.getElementById('modalAcademicAdmission').value;
    // Update basic class display too
    const grade = document.getElementById('modalAcademicGrade').value;
    const classLetter = document.getElementById('modalAcademicClass').value;
    document.getElementById('basicClass').textContent = `${grade}-${classLetter}`;
    
    closeEditModal('academic');
    showToast('Academic information updated successfully!', 'success');
}

function saveGuardianInfo() {
    document.getElementById('guardianName').textContent = document.getElementById('modalGuardianName').value;
    document.getElementById('guardianRelationship').textContent = document.getElementById('modalGuardianRelationship').value;
    document.getElementById('guardianEmail').textContent = document.getElementById('modalGuardianEmail').value;
    document.getElementById('guardianPhone').textContent = document.getElementById('modalGuardianPhone').value;
    // Update basic guardian display too
    document.getElementById('basicGuardian').textContent = document.getElementById('modalGuardianName').value;
    document.getElementById('basicGuardianEmail').textContent = document.getElementById('modalGuardianEmail').value;
    
    closeEditModal('guardian');
    showToast('Guardian information updated successfully!', 'success');
}

// Load exam results and attendance data
document.addEventListener('DOMContentLoaded', function() {
    // Mock exam results data
    const examResultsData = {
        'S000': [
            { examName: 'Mid-term Exam', type: 'Monthly', date: '2024-10-15', math: 95, phys: 92, chem: 88, bio: 90, eng: 85, myan: 87, total: 537, grade: 'A+' },
            { examName: 'Quiz 1', type: 'Tutorial', date: '2024-10-08', math: 98, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 98, grade: 'A+' },
            { examName: 'Quiz 2', type: 'Tutorial', date: '2024-10-22', math: 0, phys: 94, chem: 0, bio: 0, eng: 0, myan: 0, total: 94, grade: 'A+' },
            { examName: 'Final Exam', type: 'Final', date: '2024-11-20', math: 92, phys: 89, chem: 91, bio: 88, eng: 90, myan: 85, total: 535, grade: 'A+' }
        ],
        'S001': [
            { examName: 'Mid-term Exam', type: 'Monthly', date: '2024-10-15', math: 78, phys: 82, chem: 75, bio: 80, eng: 94, myan: 88, total: 497, grade: 'A' },
            { examName: 'Quiz 1', type: 'Tutorial', date: '2024-10-08', math: 72, phys: 0, chem: 0, bio: 0, eng: 0, myan: 0, total: 72, grade: 'B+' },
            { examName: 'Quiz 2', type: 'Tutorial', date: '2024-10-22', math: 0, phys: 85, chem: 0, bio: 0, eng: 0, myan: 0, total: 85, grade: 'A' },
            { examName: 'Final Exam', type: 'Final', date: '2024-11-20', math: 80, phys: 78, chem: 82, bio: 79, eng: 92, myan: 86, total: 497, grade: 'A' }
        ]
    };

    // Mock attendance data
    const attendanceData = {
        'S000': [
            { month: 'September 2024', totalDays: 22, present: 22, absent: 0, late: 0, percentage: 100, status: 'Excellent' },
            { month: 'October 2024', totalDays: 23, present: 22, absent: 1, late: 0, percentage: 96, status: 'Good' },
            { month: 'November 2024', totalDays: 20, present: 20, absent: 0, late: 1, percentage: 100, status: 'Excellent' },
            { month: 'December 2024', totalDays: 18, present: 17, absent: 1, late: 0, percentage: 94, status: 'Good' }
        ],
        'S001': [
            { month: 'September 2024', totalDays: 22, present: 20, absent: 2, late: 0, percentage: 91, status: 'Good' },
            { month: 'October 2024', totalDays: 23, present: 21, absent: 2, late: 1, percentage: 91, status: 'Good' },
            { month: 'November 2024', totalDays: 20, present: 19, absent: 1, late: 0, percentage: 95, status: 'Good' },
            { month: 'December 2024', totalDays: 18, present: 16, absent: 2, late: 0, percentage: 89, status: 'Good' }
        ]
    };

    // Load exam results for this student
    const studentExamResults = examResultsData[profileId] || examResultsData['S000'];
    const examResultsTable = document.getElementById('examResultsTable');
    examResultsTable.innerHTML = '';

    studentExamResults.forEach(exam => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Exam Name">${exam.examName}</td>
            <td data-label="Type">${exam.type}</td>
            <td data-label="Date">${exam.date}</td>
            <td data-label="Math">${exam.math > 0 ? exam.math : '-'}</td>
            <td data-label="Phys">${exam.phys > 0 ? exam.phys : '-'}</td>
            <td data-label="Chem">${exam.chem > 0 ? exam.chem : '-'}</td>
            <td data-label="Bio">${exam.bio > 0 ? exam.bio : '-'}</td>
            <td data-label="Eng">${exam.eng > 0 ? exam.eng : '-'}</td>
            <td data-label="Myan">${exam.myan > 0 ? exam.myan : '-'}</td>
            <td data-label="Total"><strong>${exam.total}</strong></td>
            <td data-label="Grade"><span class="status-badge ${exam.grade === 'A+' ? 'paid' : exam.grade === 'A' ? 'active' : 'draft'}">${exam.grade}</span></td>
        `;
        examResultsTable.appendChild(row);
    });

    // Load attendance data for this student
    const studentAttendance = attendanceData[profileId] || attendanceData['S000'];
    const attendanceTable = document.getElementById('attendanceSummaryTable');
    attendanceTable.innerHTML = '';

    studentAttendance.forEach(month => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Month">${month.month}</td>
            <td data-label="Total Days">${month.totalDays}</td>
            <td data-label="Present">${month.present}</td>
            <td data-label="Absent">${month.absent}</td>
            <td data-label="Late">${month.late}</td>
            <td data-label="Attendance %"><strong>${month.percentage}%</strong></td>
            <td data-label="Status"><span class="status-badge ${month.status === 'Excellent' ? 'paid' : 'active'}">${month.status}</span></td>
        `;
        attendanceTable.appendChild(row);
    });

    // Load portal setup from localStorage
    const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');

    if (portalSetups[profileId]) {
        const setup = portalSetups[profileId];
        document.getElementById('portalUserIdInput').value = setup.userId;
        document.getElementById('portalEmailInput').value = setup.email;

        if (setup.accountCreated) {
            // Account already created
            document.getElementById('setupStatus').textContent = 'Account Created';
            document.getElementById('setupStatus').className = 'status-badge paid';
            document.getElementById('portalUserIdInput').readOnly = true;
            document.getElementById('portalEmailInput').readOnly = true;
            document.getElementById('portalActionBtn').style.display = 'none';
        } else if (setup.setupComplete) {
            // Setup complete, ready to create account
            setupComplete = true;
            document.getElementById('setupStatus').textContent = 'Ready for Account Creation';
            document.getElementById('setupStatus').className = 'status-badge pending';
            document.getElementById('portalActionBtn').innerHTML = '<i class="fas fa-user-plus"></i> Create Portal Account';
        }

        document.getElementById('lastUpdated').textContent = setup.updatedAt;
    }
});


function handlePortalAction() {
    if (!setupComplete) {
        // Complete Setup
        const userId = document.getElementById('portalUserIdInput').value.trim();
        const email = document.getElementById('portalEmailInput').value.trim();
        
        if (!userId || !email) {
            showToast('Please fill in both Portal User ID and Portal Email fields.', 'warning');
            return;
        }
        
        // Validate email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showToast('Please enter a valid email address.', 'error');
            return;
        }
        
        // Save as setup complete
        const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
        portalSetups[profileId] = {
            profileId: profileId,
            userId: userId,
            email: email,
            fullName: 'Placeholder Parent',
            role: 'Guardian Portal',
            profileType: 'student',
            setupComplete: true,
            accountCreated: false,
            updatedAt: new Date().toLocaleString()
        };
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
        
        // Update UI
        setupComplete = true;
        document.getElementById('setupStatus').textContent = 'Ready for Account Creation';
        document.getElementById('setupStatus').className = 'status-badge pending';
        document.getElementById('lastUpdated').textContent = portalSetups[profileId].updatedAt;
        document.getElementById('portalActionBtn').innerHTML = '<i class="fas fa-user-plus"></i> Create Portal Account';
        
        showToast(`Portal setup completed for Student ${profileId}. Click "Create Portal Account" to finalize.`, 'success');
    } else {
        // Create Portal Account
        const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
        portalSetups[profileId].accountCreated = true;
        portalSetups[profileId].status = 'active';
        portalSetups[profileId].updatedAt = new Date().toLocaleString();
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
        
        // Update UI
        document.getElementById('setupStatus').textContent = 'Account Created';
        document.getElementById('setupStatus').className = 'status-badge paid';
        document.getElementById('portalUserIdInput').readOnly = true;
        document.getElementById('portalEmailInput').readOnly = true;
        document.getElementById('portalActionBtn').style.display = 'none';
        document.getElementById('lastUpdated').textContent = portalSetups[profileId].updatedAt;
        
        const userId = portalSetups[profileId].userId;
        showToast(`Guardian Portal account ${userId} created successfully for Student ${profileId}`, 'success');
    }
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
