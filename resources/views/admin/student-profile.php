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
                <tr><th style="width:220px;">Photo</th><td id="basicPhoto"><img src="" alt="Photo" style="max-width: 100px; height: auto; border-radius: 4px;" onerror="this.style.display='none'"></td></tr>
                <tr><th>Name</th><td id="basicFullName">Placeholder Name</td></tr>
                <tr><th>Student ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Date of Joining</th><td id="basicJoinDate">2023-09-01</td></tr>
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
                <tr><th style="width:220px;">Gender</th><td id="personalGender">Male</td></tr>
                <tr><th>Ethnicity</th><td id="personalEthnicity">-</td></tr>
                <tr><th>Religious</th><td id="personalReligious">-</td></tr>
                <tr><th>NRC</th><td id="personalNRC">12/STU(N)345678</td></tr>
                <tr><th>D.O.B</th><td id="personalDOB">2008-05-12</td></tr>
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
                <tr><th style="width:220px;">Starting grade at school</th><td id="academicStartingGrade">Grade 7</td></tr>
                <tr><th>Current Grade</th><td id="academicCurrentGrade">Grade 10</td></tr>
                <tr><th>Current Class</th><td id="academicCurrentClass">A</td></tr>
                <tr><th>Guardian Teacher</th><td id="academicGuardianTeacher">-</td></tr>
                <tr><th>Assistant Teacher</th><td id="academicAssistantTeacher">-</td></tr>
                <tr><th>Previous School</th><td id="academicPreviousSchool">-</td></tr>
                <tr><th>Address</th><td id="academicAddress">789 Student Lane, City, State 12345</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Family & Relationship Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-users"></i> Family & Relationship</h4>
        <button class="simple-btn" onclick="openEditModal('family')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Father name</th><td id="familyFatherName">-</td></tr>
                <tr><th>Father's NRC</th><td id="familyFatherNRC">-</td></tr>
                <tr><th>Father's Ph no.</th><td id="familyFatherPhone">-</td></tr>
                <tr><th>Father's Occupation</th><td id="familyFatherOccupation">-</td></tr>
                <tr><th>Mother name</th><td id="familyMotherName">-</td></tr>
                <tr><th>Mother's NRC</th><td id="familyMotherNRC">-</td></tr>
                <tr><th>Mother's Ph no.</th><td id="familyMotherPhone">-</td></tr>
                <tr><th>Mother's Occupation</th><td id="familyMotherOccupation">-</td></tr>
                <tr><th>Guardian name</th><td id="familyGuardianName">Placeholder Parent</td></tr>
                <tr><th>Guardian's Ph no.</th><td id="familyGuardianPhone">+1-555-1000</td></tr>
                <tr><th>Guardian's Email</th><td id="familyGuardianEmail">parent@email.com</td></tr>
                <tr><th>Emergency contact ph no.</th><td id="familyEmergencyContact">+1-555-1001</td></tr>
                <tr><th>In-school relative - Name</th><td id="familyInSchoolRelativeName">-</td></tr>
                <tr><th>In-school relative - Grade</th><td id="familyInSchoolRelativeGrade">-</td></tr>
                <tr><th>In-school relative - Relationship</th><td id="familyInSchoolRelativeRelationship">-</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Medical Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-heartbeat"></i> Medical</h4>
        <button class="simple-btn" onclick="openEditModal('medical')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Weight</th><td id="medicalWeight">-</td></tr>
                <tr><th>Height</th><td id="medicalHeight">-</td></tr>
                <tr><th>Blood Type</th><td id="medicalBloodType">B+</td></tr>
                <tr><th>Medicine allergy</th><td id="medicalMedicineAllergy">-</td></tr>
                <tr><th>Food allergy</th><td id="medicalFoodAllergy">-</td></tr>
                <tr><th>Medical Directory</th><td id="medicalDirectory">-</td></tr>
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
                        <label>Photo</label>
                        <input type="file" class="form-input" id="modalBasicPhoto" accept="image/*">
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Name</label>
                        <input type="text" class="form-input" id="modalBasicFullName" placeholder="Enter full name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-input" id="modalBasicId" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Date of Joining</label>
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
                        <label>Gender</label>
                        <select class="form-select" id="modalPersonalGender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ethnicity</label>
                        <input type="text" class="form-input" id="modalPersonalEthnicity" placeholder="Enter ethnicity">
                    </div>
                    <div class="form-group">
                        <label>Religious</label>
                        <input type="text" class="form-input" id="modalPersonalReligious" placeholder="Enter religion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>NRC</label>
                        <input type="text" class="form-input" id="modalPersonalNRC" placeholder="e.g., 12/STU(N)345678">
                    </div>
                    <div class="form-group">
                        <label>D.O.B</label>
                        <input type="date" class="form-input" id="modalPersonalDOB">
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
                        <label>Starting grade at school</label>
                        <select class="form-select" id="modalAcademicStartingGrade">
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7" selected>Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Current Grade</label>
                        <select class="form-select" id="modalAcademicCurrentGrade">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10" selected>Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Current Class</label>
                        <select class="form-select" id="modalAcademicCurrentClass">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Guardian Teacher</label>
                        <input type="text" class="form-input" id="modalAcademicGuardianTeacher" placeholder="Teacher name">
                    </div>
                    <div class="form-group">
                        <label>Assistant Teacher</label>
                        <input type="text" class="form-input" id="modalAcademicAssistantTeacher" placeholder="Teacher name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Previous School</label>
                        <input type="text" class="form-input" id="modalAcademicPreviousSchool" placeholder="School name">
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Address</label>
                        <input type="text" class="form-input" id="modalAcademicAddress" placeholder="Street, City, State">
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

<!-- Family & Relationship Modal -->
<div id="editFamilyModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 800px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-users"></i> Edit Family & Relationship</h4>
            <button class="icon-btn" onclick="closeEditModal('family')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Father name</label>
                        <input type="text" class="form-input" id="modalFamilyFatherName" placeholder="Enter father's name">
                    </div>
                    <div class="form-group">
                        <label>Father's NRC</label>
                        <input type="text" class="form-input" id="modalFamilyFatherNRC" placeholder="e.g., 12/FAT(N)123456">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Father's Ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyFatherPhone" placeholder="+1-555-0000">
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Father's Occupation</label>
                        <input type="text" class="form-input" id="modalFamilyFatherOccupation" placeholder="Enter occupation">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Mother name</label>
                        <input type="text" class="form-input" id="modalFamilyMotherName" placeholder="Enter mother's name">
                    </div>
                    <div class="form-group">
                        <label>Mother's NRC</label>
                        <input type="text" class="form-input" id="modalFamilyMotherNRC" placeholder="e.g., 12/MOT(N)123456">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Mother's Ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyMotherPhone" placeholder="+1-555-0000">
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Mother's Occupation</label>
                        <input type="text" class="form-input" id="modalFamilyMotherOccupation" placeholder="Enter occupation">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Guardian name</label>
                        <input type="text" class="form-input" id="modalFamilyGuardianName" placeholder="Enter guardian's name">
                    </div>
                    <div class="form-group">
                        <label>Guardian's Ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyGuardianPhone" placeholder="+1-555-0000">
                    </div>
                    <div class="form-group">
                        <label>Guardian's Email</label>
                        <input type="email" class="form-input" id="modalFamilyGuardianEmail" placeholder="guardian@email.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Emergency contact ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyEmergencyContact" placeholder="+1-555-0000">
                    </div>
                </div>
                <div style="margin-top: 24px; padding-top: 24px; border-top: 2px solid #e2e8f0;">
                    <h5 style="margin-bottom: 16px; font-weight: 600;">In-school relative</h5>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-input" id="modalFamilyInSchoolRelativeName" placeholder="Enter relative's name">
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <select class="form-select" id="modalFamilyInSchoolRelativeGrade">
                                <option value="">Select</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Relationship</label>
                            <select class="form-select" id="modalFamilyInSchoolRelativeRelationship">
                                <option value="">Select</option>
                                <option value="Sibling">Sibling</option>
                                <option value="Cousin">Cousin</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('family')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveFamilyInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Medical Modal -->
<div id="editMedicalModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-heartbeat"></i> Edit Medical Information</h4>
            <button class="icon-btn" onclick="closeEditModal('medical')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input type="number" class="form-input" id="modalMedicalWeight" placeholder="e.g., 45" step="0.1">
                    </div>
                    <div class="form-group">
                        <label>Height (cm)</label>
                        <input type="number" class="form-input" id="modalMedicalHeight" placeholder="e.g., 150" step="0.1">
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                        <select class="form-select" id="modalMedicalBloodType">
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
                    <div class="form-group" style="flex:1;">
                        <label>Medicine allergy</label>
                        <input type="text" class="form-input" id="modalMedicalMedicineAllergy" placeholder="List any medicine allergies">
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Food allergy</label>
                        <input type="text" class="form-input" id="modalMedicalFoodAllergy" placeholder="List any food allergies">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Medical Directory</label>
                        <textarea class="form-input" id="modalMedicalDirectory" rows="3" placeholder="Additional medical information"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('medical')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveMedicalInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';

// Load profile data from localStorage
document.addEventListener('DOMContentLoaded', function() {
    loadStudentProfileData();
});

function loadStudentProfileData() {
    try {
        const students = JSON.parse(localStorage.getItem('students') || '[]');
        const student = students.find(s => s.id === profileId);
        
        if (student) {
            // Basic Information
            if (student.name) document.getElementById('basicFullName').textContent = student.name;
            if (student.dateOfJoining) document.getElementById('basicJoinDate').textContent = student.dateOfJoining;
            if (student.photo) {
                const photoImg = document.getElementById('basicPhoto').querySelector('img');
                if (photoImg) photoImg.src = student.photo;
            }
            
            // Personal Information
            if (student.gender) document.getElementById('personalGender').textContent = student.gender;
            if (student.ethnicity) document.getElementById('personalEthnicity').textContent = student.ethnicity;
            if (student.religious) document.getElementById('personalReligious').textContent = student.religious;
            if (student.nrc) document.getElementById('personalNRC').textContent = student.nrc;
            if (student.dob) document.getElementById('personalDOB').textContent = student.dob;
            
            // Academic Information
            if (student.startingGrade) document.getElementById('academicStartingGrade').textContent = student.startingGrade;
            if (student.currentGrade) document.getElementById('academicCurrentGrade').textContent = student.currentGrade;
            if (student.currentClass) document.getElementById('academicCurrentClass').textContent = student.currentClass;
            if (student.guardianTeacher) document.getElementById('academicGuardianTeacher').textContent = student.guardianTeacher;
            if (student.assistantTeacher) document.getElementById('academicAssistantTeacher').textContent = student.assistantTeacher;
            if (student.previousSchool) document.getElementById('academicPreviousSchool').textContent = student.previousSchool;
            if (student.address) document.getElementById('academicAddress').textContent = student.address;
            
            // Family Information
            if (student.fatherName) document.getElementById('familyFatherName').textContent = student.fatherName;
            if (student.fatherNRC) document.getElementById('familyFatherNRC').textContent = student.fatherNRC;
            if (student.fatherPhone) document.getElementById('familyFatherPhone').textContent = student.fatherPhone;
            if (student.fatherOccupation) document.getElementById('familyFatherOccupation').textContent = student.fatherOccupation;
            if (student.motherName) document.getElementById('familyMotherName').textContent = student.motherName;
            if (student.motherNRC) document.getElementById('familyMotherNRC').textContent = student.motherNRC;
            if (student.motherPhone) document.getElementById('familyMotherPhone').textContent = student.motherPhone;
            if (student.motherOccupation) document.getElementById('familyMotherOccupation').textContent = student.motherOccupation;
            if (student.guardianName) document.getElementById('familyGuardianName').textContent = student.guardianName;
            if (student.guardianPhone) document.getElementById('familyGuardianPhone').textContent = student.guardianPhone;
            if (student.guardianEmail) document.getElementById('familyGuardianEmail').textContent = student.guardianEmail;
            if (student.emergencyPhone) document.getElementById('familyEmergencyContact').textContent = student.emergencyPhone;
            if (student.relativeName) document.getElementById('familyInSchoolRelativeName').textContent = student.relativeName;
            if (student.relativeGrade) document.getElementById('familyInSchoolRelativeGrade').textContent = student.relativeGrade;
            if (student.relativeRelationship) document.getElementById('familyInSchoolRelativeRelationship').textContent = student.relativeRelationship;
            
            // Medical Information
            if (student.weight) document.getElementById('medicalWeight').textContent = student.weight + ' kg';
            if (student.height) document.getElementById('medicalHeight').textContent = student.height + ' cm';
            if (student.bloodType) document.getElementById('medicalBloodType').textContent = student.bloodType;
            if (student.medicineAllergy) document.getElementById('medicalMedicineAllergy').textContent = student.medicineAllergy;
            if (student.foodAllergy) document.getElementById('medicalFoodAllergy').textContent = student.foodAllergy;
            if (student.medicalDirectory) document.getElementById('medicalDirectory').textContent = student.medicalDirectory;
        }
    } catch (e) {
        console.error('Error loading student profile:', e);
    }
}

// Modal functions
function openEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (!modal) return;
    
    // Load current data into modal inputs
    if (section === 'basic') {
        document.getElementById('modalBasicFullName').value = document.getElementById('basicFullName').textContent.trim();
        document.getElementById('modalBasicJoinDate').value = document.getElementById('basicJoinDate').textContent.trim();
    } else if (section === 'personal') {
        document.getElementById('modalPersonalGender').value = document.getElementById('personalGender').textContent.trim();
        document.getElementById('modalPersonalEthnicity').value = document.getElementById('personalEthnicity').textContent.trim() || '';
        document.getElementById('modalPersonalReligious').value = document.getElementById('personalReligious').textContent.trim() || '';
        document.getElementById('modalPersonalNRC').value = document.getElementById('personalNRC').textContent.trim();
        document.getElementById('modalPersonalDOB').value = document.getElementById('personalDOB').textContent.trim();
    } else if (section === 'academic') {
        document.getElementById('modalAcademicStartingGrade').value = document.getElementById('academicStartingGrade').textContent.trim() || 'Grade 7';
        document.getElementById('modalAcademicCurrentGrade').value = document.getElementById('academicCurrentGrade').textContent.trim();
        document.getElementById('modalAcademicCurrentClass').value = document.getElementById('academicCurrentClass').textContent.trim();
        document.getElementById('modalAcademicGuardianTeacher').value = document.getElementById('academicGuardianTeacher').textContent.trim() || '';
        document.getElementById('modalAcademicAssistantTeacher').value = document.getElementById('academicAssistantTeacher').textContent.trim() || '';
        document.getElementById('modalAcademicPreviousSchool').value = document.getElementById('academicPreviousSchool').textContent.trim() || '';
        document.getElementById('modalAcademicAddress').value = document.getElementById('academicAddress').textContent.trim();
    } else if (section === 'family') {
        document.getElementById('modalFamilyFatherName').value = document.getElementById('familyFatherName').textContent.trim() || '';
        document.getElementById('modalFamilyFatherNRC').value = document.getElementById('familyFatherNRC').textContent.trim() || '';
        document.getElementById('modalFamilyFatherPhone').value = document.getElementById('familyFatherPhone').textContent.trim() || '';
        document.getElementById('modalFamilyFatherOccupation').value = document.getElementById('familyFatherOccupation').textContent.trim() || '';
        document.getElementById('modalFamilyMotherName').value = document.getElementById('familyMotherName').textContent.trim() || '';
        document.getElementById('modalFamilyMotherNRC').value = document.getElementById('familyMotherNRC').textContent.trim() || '';
        document.getElementById('modalFamilyMotherPhone').value = document.getElementById('familyMotherPhone').textContent.trim() || '';
        document.getElementById('modalFamilyMotherOccupation').value = document.getElementById('familyMotherOccupation').textContent.trim() || '';
        document.getElementById('modalFamilyGuardianName').value = document.getElementById('familyGuardianName').textContent.trim();
        document.getElementById('modalFamilyGuardianPhone').value = document.getElementById('familyGuardianPhone').textContent.trim();
        document.getElementById('modalFamilyGuardianEmail').value = document.getElementById('familyGuardianEmail').textContent.trim();
        document.getElementById('modalFamilyEmergencyContact').value = document.getElementById('familyEmergencyContact').textContent.trim();
        document.getElementById('modalFamilyInSchoolRelativeName').value = document.getElementById('familyInSchoolRelativeName').textContent.trim() || '';
        document.getElementById('modalFamilyInSchoolRelativeGrade').value = document.getElementById('familyInSchoolRelativeGrade').textContent.trim() || '';
        document.getElementById('modalFamilyInSchoolRelativeRelationship').value = document.getElementById('familyInSchoolRelativeRelationship').textContent.trim() || '';
    } else if (section === 'medical') {
        document.getElementById('modalMedicalWeight').value = document.getElementById('medicalWeight').textContent.trim() || '';
        document.getElementById('modalMedicalHeight').value = document.getElementById('medicalHeight').textContent.trim() || '';
        document.getElementById('modalMedicalBloodType').value = document.getElementById('medicalBloodType').textContent.trim();
        document.getElementById('modalMedicalMedicineAllergy').value = document.getElementById('medicalMedicineAllergy').textContent.trim() || '';
        document.getElementById('modalMedicalFoodAllergy').value = document.getElementById('medicalFoodAllergy').textContent.trim() || '';
        document.getElementById('modalMedicalDirectory').value = document.getElementById('medicalDirectory').textContent.trim() || '';
    }
    
    modal.style.display = 'flex';
}

function closeEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (modal) modal.style.display = 'none';
}

function saveBasicInfo() {
    document.getElementById('basicFullName').textContent = document.getElementById('modalBasicFullName').value;
    document.getElementById('basicJoinDate').textContent = document.getElementById('modalBasicJoinDate').value;
    
    // Handle photo upload if file is selected
    const photoInput = document.getElementById('modalBasicPhoto');
    if (photoInput && photoInput.files.length > 0) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const photoImg = document.getElementById('basicPhoto').querySelector('img');
            if (photoImg) {
                photoImg.src = e.target.result;
                photoImg.style.display = 'block';
            }
        };
        reader.readAsDataURL(photoInput.files[0]);
    }
    
    // Save to localStorage
    saveStudentToLocalStorage({
        name: document.getElementById('modalBasicFullName').value,
        dateOfJoining: document.getElementById('modalBasicJoinDate').value
    });
    
    closeEditModal('basic');
    showToast('Basic information updated successfully!', 'success');
}

function savePersonalInfo() {
    document.getElementById('personalGender').textContent = document.getElementById('modalPersonalGender').value;
    document.getElementById('personalEthnicity').textContent = document.getElementById('modalPersonalEthnicity').value || '-';
    document.getElementById('personalReligious').textContent = document.getElementById('modalPersonalReligious').value || '-';
    document.getElementById('personalNRC').textContent = document.getElementById('modalPersonalNRC').value;
    document.getElementById('personalDOB').textContent = document.getElementById('modalPersonalDOB').value;
    
    // Save to localStorage
    saveStudentToLocalStorage({
        gender: document.getElementById('modalPersonalGender').value,
        ethnicity: document.getElementById('modalPersonalEthnicity').value,
        religious: document.getElementById('modalPersonalReligious').value,
        nrc: document.getElementById('modalPersonalNRC').value,
        dob: document.getElementById('modalPersonalDOB').value
    });
    
    closeEditModal('personal');
    showToast('Personal information updated successfully!', 'success');
}

function saveAcademicInfo() {
    document.getElementById('academicStartingGrade').textContent = document.getElementById('modalAcademicStartingGrade').value;
    document.getElementById('academicCurrentGrade').textContent = document.getElementById('modalAcademicCurrentGrade').value;
    document.getElementById('academicCurrentClass').textContent = document.getElementById('modalAcademicCurrentClass').value;
    document.getElementById('academicGuardianTeacher').textContent = document.getElementById('modalAcademicGuardianTeacher').value || '-';
    document.getElementById('academicAssistantTeacher').textContent = document.getElementById('modalAcademicAssistantTeacher').value || '-';
    document.getElementById('academicPreviousSchool').textContent = document.getElementById('modalAcademicPreviousSchool').value || '-';
    document.getElementById('academicAddress').textContent = document.getElementById('modalAcademicAddress').value;
    
    // Save to localStorage
    saveStudentToLocalStorage({
        startingGrade: document.getElementById('modalAcademicStartingGrade').value,
        currentGrade: document.getElementById('modalAcademicCurrentGrade').value,
        currentClass: document.getElementById('modalAcademicCurrentClass').value,
        guardianTeacher: document.getElementById('modalAcademicGuardianTeacher').value,
        assistantTeacher: document.getElementById('modalAcademicAssistantTeacher').value,
        previousSchool: document.getElementById('modalAcademicPreviousSchool').value,
        address: document.getElementById('modalAcademicAddress').value
    });
    
    closeEditModal('academic');
    showToast('Academic information updated successfully!', 'success');
}

function saveFamilyInfo() {
    document.getElementById('familyFatherName').textContent = document.getElementById('modalFamilyFatherName').value || '-';
    document.getElementById('familyFatherNRC').textContent = document.getElementById('modalFamilyFatherNRC').value || '-';
    document.getElementById('familyFatherPhone').textContent = document.getElementById('modalFamilyFatherPhone').value || '-';
    document.getElementById('familyFatherOccupation').textContent = document.getElementById('modalFamilyFatherOccupation').value || '-';
    document.getElementById('familyMotherName').textContent = document.getElementById('modalFamilyMotherName').value || '-';
    document.getElementById('familyMotherNRC').textContent = document.getElementById('modalFamilyMotherNRC').value || '-';
    document.getElementById('familyMotherPhone').textContent = document.getElementById('modalFamilyMotherPhone').value || '-';
    document.getElementById('familyMotherOccupation').textContent = document.getElementById('modalFamilyMotherOccupation').value || '-';
    document.getElementById('familyGuardianName').textContent = document.getElementById('modalFamilyGuardianName').value;
    document.getElementById('familyGuardianPhone').textContent = document.getElementById('modalFamilyGuardianPhone').value;
    document.getElementById('familyGuardianEmail').textContent = document.getElementById('modalFamilyGuardianEmail').value;
    document.getElementById('familyEmergencyContact').textContent = document.getElementById('modalFamilyEmergencyContact').value;
    document.getElementById('familyInSchoolRelativeName').textContent = document.getElementById('modalFamilyInSchoolRelativeName').value || '-';
    document.getElementById('familyInSchoolRelativeGrade').textContent = document.getElementById('modalFamilyInSchoolRelativeGrade').value || '-';
    document.getElementById('familyInSchoolRelativeRelationship').textContent = document.getElementById('modalFamilyInSchoolRelativeRelationship').value || '-';
    
    // Save to localStorage
    saveStudentToLocalStorage({
        fatherName: document.getElementById('modalFamilyFatherName').value,
        fatherNRC: document.getElementById('modalFamilyFatherNRC').value,
        fatherPhone: document.getElementById('modalFamilyFatherPhone').value,
        fatherOccupation: document.getElementById('modalFamilyFatherOccupation').value,
        motherName: document.getElementById('modalFamilyMotherName').value,
        motherNRC: document.getElementById('modalFamilyMotherNRC').value,
        motherPhone: document.getElementById('modalFamilyMotherPhone').value,
        motherOccupation: document.getElementById('modalFamilyMotherOccupation').value,
        guardianName: document.getElementById('modalFamilyGuardianName').value,
        guardianPhone: document.getElementById('modalFamilyGuardianPhone').value,
        guardianEmail: document.getElementById('modalFamilyGuardianEmail').value,
        emergencyPhone: document.getElementById('modalFamilyEmergencyContact').value,
        relativeName: document.getElementById('modalFamilyInSchoolRelativeName').value,
        relativeGrade: document.getElementById('modalFamilyInSchoolRelativeGrade').value,
        relativeRelationship: document.getElementById('modalFamilyInSchoolRelativeRelationship').value
    });
    
    closeEditModal('family');
    showToast('Family & Relationship information updated successfully!', 'success');
}

function saveMedicalInfo() {
    document.getElementById('medicalWeight').textContent = document.getElementById('modalMedicalWeight').value || '-';
    document.getElementById('medicalHeight').textContent = document.getElementById('modalMedicalHeight').value || '-';
    document.getElementById('medicalBloodType').textContent = document.getElementById('modalMedicalBloodType').value;
    document.getElementById('medicalMedicineAllergy').textContent = document.getElementById('modalMedicalMedicineAllergy').value || '-';
    document.getElementById('medicalFoodAllergy').textContent = document.getElementById('modalMedicalFoodAllergy').value || '-';
    document.getElementById('medicalDirectory').textContent = document.getElementById('modalMedicalDirectory').value || '-';
    
    // Save to localStorage
    saveStudentToLocalStorage({
        weight: document.getElementById('modalMedicalWeight').value,
        height: document.getElementById('modalMedicalHeight').value,
        bloodType: document.getElementById('modalMedicalBloodType').value,
        medicineAllergy: document.getElementById('modalMedicalMedicineAllergy').value,
        foodAllergy: document.getElementById('modalMedicalFoodAllergy').value,
        medicalDirectory: document.getElementById('modalMedicalDirectory').value
    });
    
    closeEditModal('medical');
    showToast('Medical information updated successfully!', 'success');
}

// Helper function to save student data to localStorage
function saveStudentToLocalStorage(updates) {
    try {
        const students = JSON.parse(localStorage.getItem('students') || '[]');
        const index = students.findIndex(s => s.id === profileId);
        if (index !== -1) {
            students[index] = { ...students[index], ...updates };
            localStorage.setItem('students', JSON.stringify(students));
        }
    } catch (e) {
        console.error('Error saving student data:', e);
    }
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
});


</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
