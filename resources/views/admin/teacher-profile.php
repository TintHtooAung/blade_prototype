<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profile';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Profile';
$activePage = 'teachers';
$id = $_GET['id'] ?? 'T000';
$portal = $_GET['portal'] ?? 'admin'; // Detect if accessed from staff portal

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/<?php echo $portal === 'staff' ? 'staff' : 'admin'; ?>/teacher-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Teacher Profiles
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
    <!-- Basic Information Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-info-circle"></i> Basic Information</h4>
        <button class="simple-btn" onclick="openEditModal('basic')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-info-circle"></i> Basic Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Photo</th><td id="basicPhoto"><img src="" alt="Photo" style="max-width: 100px; height: auto; border-radius: 4px;" onerror="this.style.display='none'"></td></tr>
                <tr><th>Name</th><td id="basicFullName">Placeholder Name</td></tr>
                <tr><th>Employee ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Ph. no.</th><td id="basicPhone">+1-555-0101</td></tr>
                <tr><th>Address</th><td id="basicAddress">123 Main Street, City, State 12345</td></tr>
                <tr><th>Email address</th><td id="basicEmail">placeholder@school.edu</td></tr>
                <tr><th>Status</th><td id="basicStatus"><span class="status-badge paid">Active</span></td></tr>
            </tbody>
        </table>
    </div>

    <!-- Personal Information Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user"></i> Personal Information</h4>
        <button class="simple-btn" onclick="openEditModal('personal')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user"></i> Personal Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Gender</th><td id="personalGender">Male</td></tr>
                <tr><th>Ethnicity</th><td id="personalEthnicity">-</td></tr>
                <tr><th>Religious</th><td id="personalReligious">-</td></tr>
                <tr><th>NRC</th><td id="personalNRC">12/ABC(N)123456</td></tr>
                <tr><th>D.O.B</th><td id="personalDOB">1985-03-15</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Organizational Information Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-building"></i> Organizational Information</h4>
        <button class="simple-btn" onclick="openEditModal('organizational')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-building"></i> Organizational Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Position</th><td id="organizationalPosition">-</td></tr>
                <tr><th>Department</th><td id="organizationalDepartment">Mathematics</td></tr>
                <tr><th>Date of Joining</th><td id="organizationalJoinDate">2023-01-15</td></tr>
                <tr><th>Basic Salary</th><td id="organizationalBasicSalary">-</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Education Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-graduation-cap"></i> Education</h4>
        <button class="simple-btn" onclick="openEditModal('education')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-graduation-cap"></i> Education</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Qualification</th><td id="educationQualification">M.Ed in Mathematics</td></tr>
                <tr><th>Previous experience (Year)</th><td id="educationExperience">5</td></tr>
                <tr><th>Green card</th><td id="educationGreenCard">-</td></tr>
                <tr><th>Current Grade</th><td id="educationCurrentGrade">-</td></tr>
                <tr><th>Current Classes</th><td id="educationCurrentClasses">-</td></tr>
                <tr><th>Responsible Class</th><td id="educationResponsibleClass">-</td></tr>
                <tr><th>Subjects taught</th><td id="educationSubjects">Algebra, Calculus</td></tr>
                <tr><th>Previous School</th><td id="educationPreviousSchool">-</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Family & Relationship Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-users"></i> Family & Relationship</h4>
        <button class="simple-btn" onclick="openEditModal('family')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-users"></i> Family & Relationship</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Father name</th><td id="familyFatherName">-</td></tr>
                <tr><th>Father's Ph no.</th><td id="familyFatherPhone">-</td></tr>
                <tr><th>Mother name</th><td id="familyMotherName">-</td></tr>
                <tr><th>Mother's Ph no.</th><td id="familyMotherPhone">-</td></tr>
                <tr><th>Emergency contact ph no.</th><td id="familyEmergencyContact">+1-555-0102</td></tr>
                <tr><th>Marital Status</th><td id="familyMaritalStatus">-</td></tr>
                <tr><th>Partner Name</th><td id="familyPartnerName">-</td></tr>
                <tr><th>Partner's Ph no.</th><td id="familyPartnerPhone">-</td></tr>
                <tr><th>In-school relative - Name</th><td id="familyInSchoolRelativeName">-</td></tr>
                <tr><th>In-school relative - Relationship</th><td id="familyInSchoolRelativeRelationship">-</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Medical Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-heartbeat"></i> Medical</h4>
        <button class="simple-btn" onclick="openEditModal('medical')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-heartbeat"></i> Medical</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Height</th><td id="medicalHeight">-</td></tr>
                <tr><th>Weight</th><td id="medicalWeight">-</td></tr>
                <tr><th>Blood Type</th><td id="medicalBloodType">O+</td></tr>
                <tr><th>Medicine allergy</th><td id="medicalMedicineAllergy">-</td></tr>
                <tr><th>Food allergy</th><td id="medicalFoodAllergy">-</td></tr>
                <tr><th>Medical Directory</th><td id="medicalDirectory">-</td></tr>
            </tbody>
        </table>
    </div>

    

</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';
let setupComplete = false;

// Load profile data from localStorage
document.addEventListener('DOMContentLoaded', function() {
    loadTeacherProfileData();
    loadPortalSetup();
});

function loadTeacherProfileData() {
    try {
        const teachers = JSON.parse(localStorage.getItem('teachers') || '[]');
        const teacher = teachers.find(t => t.id === profileId);
        
        if (teacher) {
            // Basic Information
            if (teacher.name) document.getElementById('basicFullName').textContent = teacher.name;
            if (teacher.phone) document.getElementById('basicPhone').textContent = teacher.phone;
            if (teacher.address) document.getElementById('basicAddress').textContent = teacher.address;
            if (teacher.email) document.getElementById('basicEmail').textContent = teacher.email;
            if (teacher.status) {
                const statusClass = teacher.status.toLowerCase() === 'active' ? 'paid' : teacher.status.toLowerCase() === 'on leave' ? 'pending' : 'draft';
                document.getElementById('basicStatus').innerHTML = `<span class="status-badge ${statusClass}">${teacher.status}</span>`;
            }
            
            // Personal Information
            if (teacher.gender) document.getElementById('personalGender').textContent = teacher.gender;
            if (teacher.ethnicity) document.getElementById('personalEthnicity').textContent = teacher.ethnicity;
            if (teacher.religious) document.getElementById('personalReligious').textContent = teacher.religious;
            if (teacher.nrc) document.getElementById('personalNRC').textContent = teacher.nrc;
            if (teacher.dob) document.getElementById('personalDOB').textContent = teacher.dob;
            
            // Organizational Information
            if (teacher.position) document.getElementById('organizationalPosition').textContent = teacher.position;
            if (teacher.dept) document.getElementById('organizationalDepartment').textContent = teacher.dept;
            if (teacher.join) document.getElementById('organizationalJoinDate').textContent = teacher.join;
            if (teacher.monthlySalary) {
                const salary = parseInt(teacher.monthlySalary) || 0;
                document.getElementById('organizationalBasicSalary').textContent = salary > 0 ? salary.toLocaleString('en-US') + ' MMK' : '-';
            }
            
            // Education Information
            if (teacher.education) document.getElementById('educationQualification').textContent = teacher.education;
            if (teacher.currentGrade) document.getElementById('educationCurrentGrade').textContent = teacher.currentGrade;
            if (teacher.currentClasses) document.getElementById('educationCurrentClasses').textContent = teacher.currentClasses;
            if (teacher.responsibleClass) document.getElementById('educationResponsibleClass').textContent = teacher.responsibleClass;
            if (teacher.subjects) document.getElementById('educationSubjects').textContent = teacher.subjects;
            if (teacher.previousSchool) document.getElementById('educationPreviousSchool').textContent = teacher.previousSchool;
            if (teacher.greenCard) document.getElementById('educationGreenCard').textContent = teacher.greenCard;
            
            // Family Information
            if (teacher.fatherName) document.getElementById('familyFatherName').textContent = teacher.fatherName;
            if (teacher.fatherPhone) document.getElementById('familyFatherPhone').textContent = teacher.fatherPhone;
            if (teacher.motherName) document.getElementById('familyMotherName').textContent = teacher.motherName;
            if (teacher.motherPhone) document.getElementById('familyMotherPhone').textContent = teacher.motherPhone;
            if (teacher.emergencyContact) document.getElementById('familyEmergencyContact').textContent = teacher.emergencyContact;
            if (teacher.maritalStatus) document.getElementById('familyMaritalStatus').textContent = teacher.maritalStatus;
            if (teacher.partnerName) document.getElementById('familyPartnerName').textContent = teacher.partnerName;
            if (teacher.partnerPhone) document.getElementById('familyPartnerPhone').textContent = teacher.partnerPhone;
            if (teacher.inSchoolRelativeName) document.getElementById('familyInSchoolRelativeName').textContent = teacher.inSchoolRelativeName;
            if (teacher.inSchoolRelativeRelationship) document.getElementById('familyInSchoolRelativeRelationship').textContent = teacher.inSchoolRelativeRelationship;
            
            // Medical Information
            if (teacher.height) document.getElementById('medicalHeight').textContent = teacher.height;
            if (teacher.medicineAllergy) document.getElementById('medicalMedicineAllergy').textContent = teacher.medicineAllergy;
            if (teacher.foodAllergy) document.getElementById('medicalFoodAllergy').textContent = teacher.foodAllergy;
            if (teacher.medicalDirectory) document.getElementById('medicalDirectory').textContent = teacher.medicalDirectory;
        }
    } catch (e) {
        console.error('Error loading teacher profile:', e);
    }
}

function loadPortalSetup() {
    const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
    
    if (portalSetups[profileId]) {
        const setup = portalSetups[profileId];
        document.getElementById('portalUserIdInput').value = setup.userId;
        document.getElementById('portalEmailInput').value = setup.email;
        
        if (setup.accountCreated) {
            document.getElementById('setupStatus').textContent = 'Account Created';
            document.getElementById('setupStatus').className = 'status-badge paid';
            document.getElementById('portalUserIdInput').readOnly = true;
            document.getElementById('portalEmailInput').readOnly = true;
            document.getElementById('portalActionBtn').style.display = 'none';
        } else if (setup.setupComplete) {
            setupComplete = true;
            document.getElementById('setupStatus').textContent = 'Ready for Account Creation';
            document.getElementById('setupStatus').className = 'status-badge pending';
            document.getElementById('portalActionBtn').innerHTML = '<i class="fas fa-user-plus"></i> Create Portal Account';
        }
        
        document.getElementById('lastUpdated').textContent = setup.updatedAt;
    }
});

// Modal functions for editing sections
<?php if ($portal === 'admin'): ?>
function openEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (!modal) return;
    
    if (section === 'basic') {
        const photoImg = document.getElementById('basicPhoto').querySelector('img');
        if (photoImg && photoImg.src) {
            // Photo is already set, keep it
        }
        document.getElementById('modalBasicFullName').value = document.getElementById('basicFullName').textContent.trim();
        document.getElementById('modalBasicPhone').value = document.getElementById('basicPhone').textContent.trim();
        document.getElementById('modalBasicAddress').value = document.getElementById('basicAddress').textContent.trim();
        document.getElementById('modalBasicEmail').value = document.getElementById('basicEmail').textContent.trim();
        const statusText = document.getElementById('basicStatus').textContent.trim();
        document.getElementById('modalBasicStatus').value = statusText.toLowerCase();
    } else if (section === 'personal') {
        document.getElementById('modalPersonalGender').value = document.getElementById('personalGender').textContent.trim();
        document.getElementById('modalPersonalEthnicity').value = document.getElementById('personalEthnicity').textContent.trim();
        document.getElementById('modalPersonalReligious').value = document.getElementById('personalReligious').textContent.trim();
        document.getElementById('modalPersonalNRC').value = document.getElementById('personalNRC').textContent.trim();
        document.getElementById('modalPersonalDOB').value = document.getElementById('personalDOB').textContent.trim();
    } else if (section === 'organizational') {
        document.getElementById('modalOrganizationalPosition').value = document.getElementById('organizationalPosition').textContent.trim();
        document.getElementById('modalOrganizationalDepartment').value = document.getElementById('organizationalDepartment').textContent.trim();
        document.getElementById('modalOrganizationalJoinDate').value = document.getElementById('organizationalJoinDate').textContent.trim();
        const basicSalaryText = document.getElementById('organizationalBasicSalary').textContent.trim();
        const basicSalaryValue = basicSalaryText === '-' ? '0' : basicSalaryText.replace(/[^\d]/g, '');
        document.getElementById('modalOrganizationalBasicSalary').value = basicSalaryValue;
    } else if (section === 'education') {
        document.getElementById('modalEducationQualification').value = document.getElementById('educationQualification').textContent.trim();
        document.getElementById('modalEducationExperience').value = document.getElementById('educationExperience').textContent.trim();
        document.getElementById('modalEducationGreenCard').value = document.getElementById('educationGreenCard').textContent.trim();
        document.getElementById('modalEducationCurrentGrade').value = document.getElementById('educationCurrentGrade').textContent.trim();
        document.getElementById('modalEducationCurrentClasses').value = document.getElementById('educationCurrentClasses').textContent.trim();
        document.getElementById('modalEducationResponsibleClass').value = document.getElementById('educationResponsibleClass').textContent.trim();
        document.getElementById('modalEducationSubjects').value = document.getElementById('educationSubjects').textContent.trim();
        document.getElementById('modalEducationPreviousSchool').value = document.getElementById('educationPreviousSchool').textContent.trim();
    } else if (section === 'family') {
        document.getElementById('modalFamilyFatherName').value = document.getElementById('familyFatherName').textContent.trim();
        document.getElementById('modalFamilyFatherPhone').value = document.getElementById('familyFatherPhone').textContent.trim();
        document.getElementById('modalFamilyMotherName').value = document.getElementById('familyMotherName').textContent.trim();
        document.getElementById('modalFamilyMotherPhone').value = document.getElementById('familyMotherPhone').textContent.trim();
        document.getElementById('modalFamilyEmergencyContact').value = document.getElementById('familyEmergencyContact').textContent.trim();
        document.getElementById('modalFamilyMaritalStatus').value = document.getElementById('familyMaritalStatus').textContent.trim();
        document.getElementById('modalFamilyPartnerName').value = document.getElementById('familyPartnerName').textContent.trim();
        document.getElementById('modalFamilyPartnerPhone').value = document.getElementById('familyPartnerPhone').textContent.trim();
        document.getElementById('modalFamilyInSchoolRelativeName').value = document.getElementById('familyInSchoolRelativeName').textContent.trim();
        document.getElementById('modalFamilyInSchoolRelativeRelationship').value = document.getElementById('familyInSchoolRelativeRelationship').textContent.trim();
    } else if (section === 'medical') {
        document.getElementById('modalMedicalHeight').value = document.getElementById('medicalHeight').textContent.trim();
        document.getElementById('modalMedicalWeight').value = document.getElementById('medicalWeight').textContent.trim();
        document.getElementById('modalMedicalBloodType').value = document.getElementById('medicalBloodType').textContent.trim();
        document.getElementById('modalMedicalMedicineAllergy').value = document.getElementById('medicalMedicineAllergy').textContent.trim();
        document.getElementById('modalMedicalFoodAllergy').value = document.getElementById('medicalFoodAllergy').textContent.trim();
        document.getElementById('modalMedicalDirectory').value = document.getElementById('medicalDirectory').textContent.trim();
    }
    
    modal.style.display = 'flex';
}

function closeEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (modal) modal.style.display = 'none';
}

function saveBasicInfo() {
    document.getElementById('basicFullName').textContent = document.getElementById('modalBasicFullName').value;
    document.getElementById('basicPhone').textContent = document.getElementById('modalBasicPhone').value;
    document.getElementById('basicAddress').textContent = document.getElementById('modalBasicAddress').value;
    document.getElementById('basicEmail').textContent = document.getElementById('modalBasicEmail').value;
    const status = document.getElementById('modalBasicStatus').value;
    const statusClass = status === 'active' ? 'paid' : status === 'inactive' ? 'draft' : 'pending';
    document.getElementById('basicStatus').innerHTML = `<span class="status-badge ${statusClass}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;
    
    // Save to localStorage
    saveTeacherToLocalStorage({
        name: document.getElementById('modalBasicFullName').value,
        phone: document.getElementById('modalBasicPhone').value,
        address: document.getElementById('modalBasicAddress').value,
        email: document.getElementById('modalBasicEmail').value,
        status: status.charAt(0).toUpperCase() + status.slice(1)
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
    saveTeacherToLocalStorage({
        gender: document.getElementById('modalPersonalGender').value,
        ethnicity: document.getElementById('modalPersonalEthnicity').value,
        religious: document.getElementById('modalPersonalReligious').value,
        nrc: document.getElementById('modalPersonalNRC').value,
        dob: document.getElementById('modalPersonalDOB').value
    });
    
    closeEditModal('personal');
    showToast('Personal information updated successfully!', 'success');
}

function saveOrganizationalInfo() {
    document.getElementById('organizationalPosition').textContent = document.getElementById('modalOrganizationalPosition').value || '-';
    document.getElementById('organizationalDepartment').textContent = document.getElementById('modalOrganizationalDepartment').value;
    document.getElementById('organizationalJoinDate').textContent = document.getElementById('modalOrganizationalJoinDate').value;
    const basicSalary = document.getElementById('modalOrganizationalBasicSalary').value || '0';
    document.getElementById('organizationalBasicSalary').textContent = formatCurrency(basicSalary);
    
    // Save to localStorage
    saveTeacherToLocalStorage({
        position: document.getElementById('modalOrganizationalPosition').value,
        dept: document.getElementById('modalOrganizationalDepartment').value,
        join: document.getElementById('modalOrganizationalJoinDate').value,
        monthlySalary: basicSalary
    });
    
    closeEditModal('organizational');
    showToast('Organizational information updated successfully!', 'success');
}

function saveEducationInfo() {
    document.getElementById('educationQualification').textContent = document.getElementById('modalEducationQualification').value;
    document.getElementById('educationExperience').textContent = document.getElementById('modalEducationExperience').value || '-';
    document.getElementById('educationGreenCard').textContent = document.getElementById('modalEducationGreenCard').value || '-';
    document.getElementById('educationCurrentGrade').textContent = document.getElementById('modalEducationCurrentGrade').value || '-';
    document.getElementById('educationCurrentClasses').textContent = document.getElementById('modalEducationCurrentClasses').value || '-';
    document.getElementById('educationResponsibleClass').textContent = document.getElementById('modalEducationResponsibleClass').value || '-';
    document.getElementById('educationSubjects').textContent = document.getElementById('modalEducationSubjects').value;
    document.getElementById('educationPreviousSchool').textContent = document.getElementById('modalEducationPreviousSchool').value || '-';
    
    // Save to localStorage
    saveTeacherToLocalStorage({
        education: document.getElementById('modalEducationQualification').value,
        greenCard: document.getElementById('modalEducationGreenCard').value,
        currentGrade: document.getElementById('modalEducationCurrentGrade').value,
        currentClasses: document.getElementById('modalEducationCurrentClasses').value,
        responsibleClass: document.getElementById('modalEducationResponsibleClass').value,
        subjects: document.getElementById('modalEducationSubjects').value,
        previousSchool: document.getElementById('modalEducationPreviousSchool').value
    });
    
    closeEditModal('education');
    showToast('Education information updated successfully!', 'success');
}

function saveFamilyInfo() {
    document.getElementById('familyFatherName').textContent = document.getElementById('modalFamilyFatherName').value || '-';
    document.getElementById('familyFatherPhone').textContent = document.getElementById('modalFamilyFatherPhone').value || '-';
    document.getElementById('familyMotherName').textContent = document.getElementById('modalFamilyMotherName').value || '-';
    document.getElementById('familyMotherPhone').textContent = document.getElementById('modalFamilyMotherPhone').value || '-';
    document.getElementById('familyEmergencyContact').textContent = document.getElementById('modalFamilyEmergencyContact').value || '-';
    document.getElementById('familyMaritalStatus').textContent = document.getElementById('modalFamilyMaritalStatus').value || '-';
    document.getElementById('familyPartnerName').textContent = document.getElementById('modalFamilyPartnerName').value || '-';
    document.getElementById('familyPartnerPhone').textContent = document.getElementById('modalFamilyPartnerPhone').value || '-';
    document.getElementById('familyInSchoolRelativeName').textContent = document.getElementById('modalFamilyInSchoolRelativeName').value || '-';
    document.getElementById('familyInSchoolRelativeRelationship').textContent = document.getElementById('modalFamilyInSchoolRelativeRelationship').value || '-';
    
    // Save to localStorage
    saveTeacherToLocalStorage({
        fatherName: document.getElementById('modalFamilyFatherName').value,
        fatherPhone: document.getElementById('modalFamilyFatherPhone').value,
        motherName: document.getElementById('modalFamilyMotherName').value,
        motherPhone: document.getElementById('modalFamilyMotherPhone').value,
        emergencyContact: document.getElementById('modalFamilyEmergencyContact').value,
        maritalStatus: document.getElementById('modalFamilyMaritalStatus').value,
        partnerName: document.getElementById('modalFamilyPartnerName').value,
        partnerPhone: document.getElementById('modalFamilyPartnerPhone').value,
        inSchoolRelativeName: document.getElementById('modalFamilyInSchoolRelativeName').value,
        inSchoolRelativeRelationship: document.getElementById('modalFamilyInSchoolRelativeRelationship').value
    });
    
    closeEditModal('family');
    showToast('Family & Relationship information updated successfully!', 'success');
}

function saveMedicalInfo() {
    document.getElementById('medicalHeight').textContent = document.getElementById('modalMedicalHeight').value || '-';
    document.getElementById('medicalWeight').textContent = document.getElementById('modalMedicalWeight').value || '-';
    document.getElementById('medicalBloodType').textContent = document.getElementById('modalMedicalBloodType').value;
    document.getElementById('medicalMedicineAllergy').textContent = document.getElementById('modalMedicalMedicineAllergy').value || '-';
    document.getElementById('medicalFoodAllergy').textContent = document.getElementById('modalMedicalFoodAllergy').value || '-';
    document.getElementById('medicalDirectory').textContent = document.getElementById('modalMedicalDirectory').value || '-';
    
    // Save to localStorage
    saveTeacherToLocalStorage({
        height: document.getElementById('modalMedicalHeight').value,
        medicineAllergy: document.getElementById('modalMedicalMedicineAllergy').value,
        foodAllergy: document.getElementById('modalMedicalFoodAllergy').value,
        medicalDirectory: document.getElementById('modalMedicalDirectory').value
    });
    
    closeEditModal('medical');
    showToast('Medical information updated successfully!', 'success');
}

function formatCurrency(amount) {
    if (!amount || amount === '0' || amount === 0) return '-';
    return parseInt(amount).toLocaleString('en-US') + ' MMK';
}

// Helper function to save teacher data to localStorage
function saveTeacherToLocalStorage(updates) {
    try {
        const teachers = JSON.parse(localStorage.getItem('teachers') || '[]');
        const index = teachers.findIndex(t => t.id === profileId);
        if (index !== -1) {
            teachers[index] = { ...teachers[index], ...updates };
            localStorage.setItem('teachers', JSON.stringify(teachers));
        }
    } catch (e) {
        console.error('Error saving teacher data:', e);
    }
}

<?php endif; ?>
</script>

<?php if ($portal === 'admin'): ?>
<!-- Edit Modals for Teacher Profile -->
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
                        <label>Employee ID</label>
                        <input type="text" class="form-input" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ph. no.</label>
                        <input type="tel" class="form-input" id="modalBasicPhone" placeholder="+1-555-0000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Address</label>
                        <input type="text" class="form-input" id="modalBasicAddress" placeholder="Street, City, State">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Email address</label>
                        <input type="email" class="form-input" id="modalBasicEmail" placeholder="teacher@school.edu">
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
                        <input type="text" class="form-input" id="modalPersonalEthnicity" placeholder="e.g., Burmese">
                    </div>
                    <div class="form-group">
                        <label>Religious</label>
                        <input type="text" class="form-input" id="modalPersonalReligious" placeholder="e.g., Buddhist">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>NRC</label>
                        <input type="text" class="form-input" id="modalPersonalNRC" placeholder="e.g., 12/ABC(N)123456">
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

<!-- Organizational Information Modal -->
<div id="editOrganizationalModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-building"></i> Edit Organizational Information</h4>
            <button class="icon-btn" onclick="closeEditModal('organizational')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Position</label>
                        <input type="text" class="form-input" id="modalOrganizationalPosition" placeholder="e.g., Senior Teacher">
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select" id="modalOrganizationalDepartment">
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="History">History</option>
                            <option value="Arts">Arts</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date of Joining</label>
                        <input type="date" class="form-input" id="modalOrganizationalJoinDate">
                    </div>
                    <div class="form-group">
                        <label>Basic Salary</label>
                        <input type="number" class="form-input" id="modalOrganizationalBasicSalary" placeholder="0" step="1">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('organizational')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveOrganizationalInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Education Modal -->
<div id="editEducationModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-graduation-cap"></i> Edit Education</h4>
            <button class="icon-btn" onclick="closeEditModal('education')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Qualification</label>
                        <input type="text" class="form-input" id="modalEducationQualification" placeholder="e.g., M.Ed, Ph.D">
                    </div>
                    <div class="form-group">
                        <label>Previous experience (Year)</label>
                        <input type="number" class="form-input" id="modalEducationExperience" placeholder="Years">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Green card</label>
                        <input type="text" class="form-input" id="modalEducationGreenCard" placeholder="Green card number">
                    </div>
                    <div class="form-group">
                        <label>Current Grade</label>
                        <input type="text" class="form-input" id="modalEducationCurrentGrade" placeholder="e.g., Grade 9">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Current Classes</label>
                        <input type="text" class="form-input" id="modalEducationCurrentClasses" placeholder="e.g., 9-A, 9-B">
                    </div>
                    <div class="form-group">
                        <label>Responsible Class</label>
                        <input type="text" class="form-input" id="modalEducationResponsibleClass" placeholder="e.g., 9-A">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Subjects taught</label>
                        <input type="text" class="form-input" id="modalEducationSubjects" placeholder="e.g., Algebra, Calculus">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Previous School</label>
                        <input type="text" class="form-input" id="modalEducationPreviousSchool" placeholder="Previous school name">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('education')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveEducationInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Family & Relationship Modal -->
<div id="editFamilyModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-users"></i> Edit Family & Relationship</h4>
            <button class="icon-btn" onclick="closeEditModal('family')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Father name</label>
                        <input type="text" class="form-input" id="modalFamilyFatherName" placeholder="Father's full name">
                    </div>
                    <div class="form-group">
                        <label>Father's Ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyFatherPhone" placeholder="+1-555-...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Mother name</label>
                        <input type="text" class="form-input" id="modalFamilyMotherName" placeholder="Mother's full name">
                    </div>
                    <div class="form-group">
                        <label>Mother's Ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyMotherPhone" placeholder="+1-555-...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Emergency contact ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyEmergencyContact" placeholder="+1-555-...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Marital Status</label>
                        <select class="form-select" id="modalFamilyMaritalStatus">
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Partner Name</label>
                        <input type="text" class="form-input" id="modalFamilyPartnerName" placeholder="Partner's full name">
                    </div>
                    <div class="form-group">
                        <label>Partner's Ph no.</label>
                        <input type="tel" class="form-input" id="modalFamilyPartnerPhone" placeholder="+1-555-...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>In-school relative - Name</label>
                        <input type="text" class="form-input" id="modalFamilyInSchoolRelativeName" placeholder="Relative's name">
                    </div>
                    <div class="form-group">
                        <label>In-school relative - Relationship</label>
                        <input type="text" class="form-input" id="modalFamilyInSchoolRelativeRelationship" placeholder="e.g., Brother, Sister">
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
            <h4><i class="fas fa-heartbeat"></i> Edit Medical</h4>
            <button class="icon-btn" onclick="closeEditModal('medical')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Height</label>
                        <input type="text" class="form-input" id="modalMedicalHeight" placeholder="e.g., 5'8&quot;">
                    </div>
                    <div class="form-group">
                        <label>Weight</label>
                        <input type="text" class="form-input" id="modalMedicalWeight" placeholder="e.g., 70 kg">
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
                    <div class="form-group">
                        <label>Medicine allergy</label>
                        <input type="text" class="form-input" id="modalMedicalMedicineAllergy" placeholder="List any medicine allergies">
                    </div>
                    <div class="form-group">
                        <label>Food allergy</label>
                        <input type="text" class="form-input" id="modalMedicalFoodAllergy" placeholder="List any food allergies">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
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


<?php endif; ?>

<?php
$content = ob_get_clean();
// Use appropriate layout based on portal
if ($portal === 'staff') {
    include __DIR__ . '/../components/staff-layout.php';
} else {
    include __DIR__ . '/../components/admin-layout.php';
}
?>
