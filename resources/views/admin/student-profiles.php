<?php
$pageTitle = 'Smart Campus Nova Hub - Student Profiles';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Profiles';
$activePage = 'students';

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

<!-- Student Stats Cards -->
<div class="stats-grid-horizontal" style="margin-bottom: 24px;">
    <!-- Total Active Students -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal green">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">978</div>
            <div class="stat-label">Total Active Students</div>
            <div class="stat-today">All enrolled</div>
        </div>
    </div>

    <!-- New Enrollments -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal purple">
            <i class="fas fa-user-plus"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">23</div>
            <div class="stat-label">New Enrollments</div>
            <div class="stat-today">This month</div>
        </div>
    </div>
</div>

<!-- Student Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Students</h3>
        <button class="simple-btn" id="openStudentModal"><i class="fas fa-plus"></i> Add New Student</button>
    </div>

    <!-- Add New Student Modal -->
    <div id="addStudentModal" class="receipt-dialog-overlay" style="display:none;" onclick="if(event.target === this) closeAddStudentModal();">
        <div class="receipt-dialog-content wizard-modal" style="max-width: 1000px; max-height: 90vh; overflow: hidden; display: flex; flex-direction: column;" onclick="event.stopPropagation();">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-user-plus"></i> Add New Student</h3>
                <button class="receipt-close" onclick="closeAddStudentModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Wizard Progress Bar -->
            <div class="wizard-progress-bar">
                <div class="wizard-steps-container">
                    <div class="wizard-step-item active" data-step="1" onclick="goToStudentStep(1)">
                        <div class="step-indicator">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <span class="step-label">Basic Info</span>
                    </div>
                    <div class="wizard-step-item" data-step="2" onclick="goToStudentStep(2)">
                        <div class="step-indicator">2</div>
                        <span class="step-label">Academic</span>
                    </div>
                    <div class="wizard-step-item" data-step="3" onclick="goToStudentStep(3)">
                        <div class="step-indicator">3</div>
                        <span class="step-label">Family</span>
                    </div>
                    <div class="wizard-step-item" data-step="4" onclick="goToStudentStep(4)">
                        <div class="step-indicator">4</div>
                        <span class="step-label">Medical</span>
                    </div>
                    <div class="wizard-step-item" data-step="5" onclick="goToStudentStep(5)">
                        <div class="step-indicator">5</div>
                        <span class="step-label">Portal</span>
                    </div>
                </div>
            </div>

            <div class="wizard-content-wrapper" style="flex: 1; display: flex; overflow: hidden;">
                <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
                    <div style="margin-bottom: 24px;">
                        <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Add New Student</h2>
                    </div>
                    <div class="form-section" style="padding:0;">
                        <!-- Step 1: Basic Information -->
                        <div class="wizard-step" id="studentStep1Form" style="display:block;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-user" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Basic Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sPhoto">Photo</label>
                                    <input type="file" id="sPhoto" class="form-input" accept="image/*">
                                </div>
                                <div class="form-group" style="flex:2;">
                                    <label for="sName">Name <span style="color:red;">*</span></label>
                                    <input type="text" id="sName" class="form-input" placeholder="Enter full name" required>
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sStudentId">Student ID</label>
                                    <input type="text" id="sStudentId" class="form-input" placeholder="Auto-generated">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sDateOfJoining">Date of Joining</label>
                                    <input type="date" id="sDateOfJoining" class="form-input">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sGender">Gender</label>
                                    <select id="sGender" class="form-select">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sEthnicity">Ethnicity</label>
                                    <input type="text" id="sEthnicity" class="form-input" placeholder="Enter ethnicity">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sReligious">Religious</label>
                                    <input type="text" id="sReligious" class="form-input" placeholder="Enter religion">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sNRC">NRC</label>
                                    <input type="text" id="sNRC" class="form-input" placeholder="e.g., 12/STU(N)345678">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sDOB">D.O.B</label>
                                    <input type="date" id="sDOB" class="form-input">
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Academic Information -->
                        <div class="wizard-step" id="studentStep2Form" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-graduation-cap" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Academic Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sStartingGrade">Starting Grade at School</label>
                                    <select id="sStartingGrade" class="form-select">
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
                                <div class="form-group" style="flex:1;">
                                    <label for="sCurrentGrade">Current Grade</label>
                                    <select id="sCurrentGrade" class="form-select">
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
                                <div class="form-group" style="flex:1;">
                                    <label for="sCurrentClass">Current Class</label>
                                    <input type="text" id="sCurrentClass" class="form-input" placeholder="e.g., Grade 9-A">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sGuardianTeacher">Guardian Teacher</label>
                                    <input type="text" id="sGuardianTeacher" class="form-input" placeholder="Teacher name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sAssistantTeacher">Assistant Teacher</label>
                                    <input type="text" id="sAssistantTeacher" class="form-input" placeholder="Teacher name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sPreviousSchool">Previous School</label>
                                    <input type="text" id="sPreviousSchool" class="form-input" placeholder="School name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sAddress">Address</label>
                                    <input type="text" id="sAddress" class="form-input" placeholder="Street, City, State">
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Family Information -->
                        <div class="wizard-step" id="studentStep3Form" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-users" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Family Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:2;">
                                    <label for="sFatherName">Father Name</label>
                                    <input type="text" id="sFatherName" class="form-input" placeholder="Enter father's name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sFatherNRC">Father's NRC</label>
                                    <input type="text" id="sFatherNRC" class="form-input" placeholder="e.g., 12/FAT(N)123456">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sFatherPhone">Father's Phone No.</label>
                                    <input type="tel" id="sFatherPhone" class="form-input" placeholder="+1-555-0000">
                                </div>
                                <div class="form-group" style="flex:2;">
                                    <label for="sFatherOccupation">Father's Occupation</label>
                                    <input type="text" id="sFatherOccupation" class="form-input" placeholder="Enter occupation">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:2;">
                                    <label for="sMotherName">Mother Name</label>
                                    <input type="text" id="sMotherName" class="form-input" placeholder="Enter mother's name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sMotherNRC">Mother's NRC</label>
                                    <input type="text" id="sMotherNRC" class="form-input" placeholder="e.g., 12/MOT(N)123456">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sMotherPhone">Mother's Phone No.</label>
                                    <input type="tel" id="sMotherPhone" class="form-input" placeholder="+1-555-0000">
                                </div>
                                <div class="form-group" style="flex:2;">
                                    <label for="sMotherOccupation">Mother's Occupation</label>
                                    <input type="text" id="sMotherOccupation" class="form-input" placeholder="Enter occupation">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sEmergencyPhone">Emergency Contact Phone No.</label>
                                    <input type="tel" id="sEmergencyPhone" class="form-input" placeholder="+1-555-0000">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sRelativeName">In-School Relative Name</label>
                                    <input type="text" id="sRelativeName" class="form-input" placeholder="Enter relative's name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sRelativeGrade">Grade</label>
                                    <select id="sRelativeGrade" class="form-select">
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
                                <div class="form-group" style="flex:1;">
                                    <label for="sRelativeRelationship">Relationship</label>
                                    <select id="sRelativeRelationship" class="form-select">
                                        <option value="">Select</option>
                                        <option value="Sibling">Sibling</option>
                                        <option value="Cousin">Cousin</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Medical Information -->
                        <div class="wizard-step" id="studentStep4Form" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-heartbeat" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Medical Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sBlood">Blood Type</label>
                                    <select id="sBlood" class="form-select">
                                        <option value="">Select</option>
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
                                <div class="form-group" style="flex:1;">
                                    <label for="sWeight">Weight (kg)</label>
                                    <input type="number" id="sWeight" class="form-input" placeholder="e.g., 45" step="0.1">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sHeight">Height (cm)</label>
                                    <input type="number" id="sHeight" class="form-input" placeholder="e.g., 150" step="0.1">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sMedicineAllergy">Medicine Allergy</label>
                                    <input type="text" id="sMedicineAllergy" class="form-input" placeholder="List any medicine allergies">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="sFoodAllergy">Food Allergy</label>
                                    <input type="text" id="sFoodAllergy" class="form-input" placeholder="List any food allergies">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="sMedicalDirectory">Medical Directory</label>
                                    <textarea id="sMedicalDirectory" class="form-input" rows="3" placeholder="Additional medical information"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Portal Registration -->
                        <div class="wizard-step" id="studentStep5Form" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-user-shield" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Portal Registration</h4>
                            </div>
                            
                            <!-- Portal Account Type Selection -->
                            <div class="form-row" style="margin-bottom: 24px;">
                                <div class="form-group" style="flex:1;">
                                    <label>Portal Account Type <span style="color:red;">*</span></label>
                                    <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 8px;">
                                        <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 16px; border: 2px solid #4A90E2; border-radius: 8px; transition: all 0.2s; background: #f0f7ff;" id="newAccountLabel" onclick="document.getElementById('sPortalAccountType').checked = true; togglePortalAccountType();">
                                            <input type="radio" name="portalAccountType" id="sPortalAccountType" value="new" checked onchange="togglePortalAccountType()">
                                            <div style="flex: 1;">
                                                <div style="font-weight: 600; color: #111827; margin-bottom: 4px;">
                                                    <i class="fas fa-user-plus" style="color: #4A90E2; margin-right: 8px;"></i>Create New Portal Account
                                                </div>
                                                <div style="font-size: 13px; color: #6b7280;">Create a new parent/guardian portal account for this student</div>
                                            </div>
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 16px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s; background: transparent;" id="bindAccountLabel" onclick="document.getElementById('sBindAccountType').checked = true; togglePortalAccountType();">
                                            <input type="radio" name="portalAccountType" id="sBindAccountType" value="bind" onchange="togglePortalAccountType()">
                                            <div style="flex: 1;">
                                                <div style="font-weight: 600; color: #111827; margin-bottom: 4px;">
                                                    <i class="fas fa-link" style="color: #10b981; margin-right: 8px;"></i>Bind to Existing Parent Account
                                                </div>
                                                <div style="font-size: 13px; color: #6b7280;">Link this student to an existing parent portal account (e.g., second child at school)</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- New Account Fields -->
                            <div id="newAccountFields">
                                <div class="form-row">
                                    <div class="form-group" style="flex:1;">
                                        <label for="sGuardianName">Guardian Name</label>
                                        <input type="text" id="sGuardianName" class="form-input" placeholder="Enter guardian's name">
                                    </div>
                                    <div class="form-group" style="flex:1;">
                                        <label for="sGuardianPhone">Guardian's Phone No.</label>
                                        <input type="tel" id="sGuardianPhone" class="form-input" placeholder="+1-555-0000">
                                    </div>
                                    <div class="form-group" style="flex:1;">
                                        <label for="sGuardianEmail">Guardian's Email</label>
                                        <input type="email" id="sGuardianEmail" class="form-input" placeholder="guardian@email.com">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group" style="flex:1;">
                                        <label for="sPortalRelationship">Relationship with Student</label>
                                        <select id="sPortalRelationship" class="form-select">
                                            <option value="">Select relationship</option>
                                            <option value="Parent">Parent</option>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Bind Account Fields -->
                            <div id="bindAccountFields" style="display: none;">
                                <div style="background: #f0fdf4; border: 1px solid #86efac; border-radius: 8px; padding: 16px; margin-bottom: 20px;">
                                    <div style="display: flex; align-items: start; gap: 12px;">
                                        <i class="fas fa-info-circle" style="color: #10b981; font-size: 20px; margin-top: 2px;"></i>
                                        <div style="flex: 1;">
                                            <div style="font-weight: 600; color: #166534; margin-bottom: 4px;">Binding to Existing Account</div>
                                            <div style="font-size: 13px; color: #15803d;">This option is for parents who already have portal access and want to add another student (e.g., second child at school). The student will be linked to the existing parent account.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sBindParentEmail">Search Account <span style="color:red;">*</span></label>
                                    <div style="position: relative;">
                                        <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6b7280; pointer-events: none; z-index: 1;"></i>
                                        <input type="text" id="sBindParentEmail" class="form-input" placeholder="Search by email or phone number..." oninput="searchBindAccount(this.value)" style="padding-left: 40px;">
                                    </div>
                                    <small style="color: #6b7280; font-size: 12px; margin-top: 4px; display: block;">Enter the email or phone number of the existing parent portal account</small>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="sBindParentPhone">Parent Phone Number</label>
                                    <input type="tel" id="sBindParentPhone" class="form-input" placeholder="+1-555-0000">
                                    <small style="color: #6b7280; font-size: 12px; margin-top: 4px; display: block;">Optional: For verification purposes</small>
                                </div>
                                
                                <!-- Account Info Display -->
                                <div id="bindAccountInfo" style="display: none; background: #eff6ff; border: 2px solid #4A90E2; border-radius: 8px; padding: 16px; margin-top: 16px;">
                                    <div style="display: flex; align-items: start; gap: 12px; margin-bottom: 12px;">
                                        <i class="fas fa-check-circle" style="color: #4A90E2; font-size: 20px; margin-top: 2px;"></i>
                                        <div style="flex: 1;">
                                            <div style="font-weight: 600; color: #1e40af; margin-bottom: 4px;">Account Found</div>
                                            <div style="font-size: 13px; color: #1e3a8a;">The following account will be used for binding:</div>
                                        </div>
                                    </div>
                                    <div style="background: #fff; border-radius: 6px; padding: 12px; margin-top: 12px;">
                                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 14px;">
                                            <div><strong>Name:</strong> <span id="bindAccountName">-</span></div>
                                            <div><strong>Email:</strong> <span id="bindAccountEmail">-</span></div>
                                            <div><strong>Phone:</strong> <span id="bindAccountPhone">-</span></div>
                                            <div><strong>Role:</strong> <span id="bindAccountRole">-</span></div>
                                            <div><strong>Status:</strong> <span id="bindAccountStatus">-</span></div>
                                            <div><strong>Students Linked:</strong> <span id="bindAccountStudents">-</span></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Account Not Found Message -->
                                <div id="bindAccountNotFound" style="display: none; background: #fef2f2; border: 2px solid #ef4444; border-radius: 8px; padding: 16px; margin-top: 16px;">
                                    <div style="display: flex; align-items: start; gap: 12px;">
                                        <i class="fas fa-exclamation-circle" style="color: #ef4444; font-size: 20px; margin-top: 2px;"></i>
                                        <div style="flex: 1;">
                                            <div style="font-weight: 600; color: #991b1b; margin-bottom: 4px;">Account Not Found</div>
                                            <div style="font-size: 13px; color: #7f1d1d;">No account found with the provided email and phone number. Please verify the information or create a new account instead.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group" style="flex:1;">
                                        <label for="sBindRelationship">Relationship with Student</label>
                                        <select id="sBindRelationship" class="form-select">
                                            <option value="">Select relationship</option>
                                            <option value="Parent">Parent</option>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar with Tips -->
                <div class="wizard-sidebar">
                    <div class="wizard-sidebar-content">
                        <h3 class="sidebar-title">Student Registration</h3>
                        <ul class="sidebar-tips">
                            <li>Fill out all required fields marked with <span style="color:red;">*</span> to proceed</li>
                            <li>You can navigate between steps using the progress bar or navigation buttons</li>
                            <li>All information can be edited before final submission</li>
                            <li>Portal registration is optional but recommended for parent/guardian access</li>
                        </ul>
                        <div class="sidebar-help">
                            <i class="fas fa-info-circle"></i>
                            <span>Need help? Contact the admin support team</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 16px 32px; background: #f9fafb; display: flex; justify-content: space-between; align-items: center;">
                <button id="cancelStudent" class="wizard-btn-secondary" onclick="closeAddStudentModal()" style="display:none;">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <div style="display: flex; gap: 12px; margin-left: auto;">
                    <button id="backStudentBtn" class="wizard-btn-secondary" onclick="goToPreviousStudentStep()" style="display:none;">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button id="nextStudentBtn" class="wizard-btn-primary" onclick="handleNextStudentStep()" style="display:none;">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                    <button id="saveStudent" class="wizard-btn-primary" onclick="saveStudentForm()" style="display:none;">
                        <i class="fas fa-save"></i> Save and Preview
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="simple-filters" style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
        <div class="simple-search" style="display: flex; align-items: center; gap: 8px; flex: 1; min-width: 300px; max-width: 400px;">
            <input type="text" placeholder="Search student by name, ID, or class..." class="simple-input" style="flex: 1; min-width: 0;">
            <button class="simple-btn">Search</button>
        </div>
        <div class="filter-group">
            <label>Filter by Class:</label>
            <select class="filter-select">
                <option value="">All Classes</option>
                <option value="Grade 9-A">Grade 9-A</option>
                <option value="Grade 9-B">Grade 9-B</option>
                <option value="Grade 10-A">Grade 10-A</option>
                <option value="Grade 10-B">Grade 10-B</option>
                <option value="Grade 11-A">Grade 11-A</option>
                <option value="Grade 11-B">Grade 11-B</option>
                <option value="Grade 12-A">Grade 12-A</option>
                <option value="Grade 12-B">Grade 12-B</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Filter by Grade:</label>
            <select class="filter-select">
                <option value="">All Grades</option>
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>

    <style>
    /* Wizard Styles - Upwork-inspired Design */
    .wizard-modal {
        display: flex;
        flex-direction: column;
        background: #fff;
    }

    /* Progress Bar - Horizontal with connected steps */
    .wizard-progress-bar {
        background: #fff;
        border-bottom: 1px solid #e5e7eb;
        padding: 24px 32px;
    }

    .wizard-steps-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        max-width: 100%;
        overflow-x: auto;
        padding: 0;
    }

    .wizard-steps-container::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 3px;
        background: #e5e7eb;
        z-index: 0;
    }

    .wizard-step-item {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 100px;
        flex: 1;
    }

    .wizard-step-item:hover {
        transform: translateY(-2px);
    }

    .step-indicator {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #d1d5db;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        color: #6b7280;
        transition: all 0.3s ease;
        margin-bottom: 8px;
        position: relative;
    }

    .wizard-step-item.active .step-indicator {
        background: #4A90E2;
        border-color: #4A90E2;
        color: #fff;
        box-shadow: 0 2px 8px rgba(74, 144, 226, 0.3);
    }

    .wizard-step-item.active .step-indicator i {
        font-size: 16px;
    }

    .wizard-step-item.completed .step-indicator {
        background: #4A90E2;
        border-color: #4A90E2;
        color: #fff;
    }

    .wizard-step-item.completed .step-indicator::after {
        content: '✓';
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        position: absolute;
    }

    .wizard-step-item.completed .step-indicator {
        font-size: 0;
    }

    .step-label {
        font-size: 13px;
        font-weight: 500;
        color: #6b7280;
        text-align: center;
        white-space: nowrap;
    }

    .wizard-step-item.active .step-label {
        color: #4A90E2;
        font-weight: 600;
    }

    .wizard-step-item.completed .step-label {
        color: #4A90E2;
    }

    /* Progress line - blue for completed steps */
    .wizard-step-item.completed::after,
    .wizard-step-item.active::after {
        content: '';
        position: absolute;
        top: 20px;
        left: 50%;
        width: 100%;
        height: 3px;
        background: #4A90E2;
        z-index: 0;
        transform: translateY(-50%);
    }

    .wizard-step-item:last-child::after {
        display: none;
    }

    /* Main Content Area */
    .wizard-content-wrapper {
        display: flex;
        background: #fff;
    }

    .wizard-main-content {
        flex: 1;
        padding: 32px;
        background: #fff;
    }

    /* Sidebar */
    .wizard-sidebar {
        width: 320px;
        background: #f9fafb;
        border-left: 1px solid #e5e7eb;
        padding: 24px;
        overflow-y: auto;
    }

    .wizard-sidebar-content {
        background: #fff;
        border: 2px solid #4A90E2;
        border-radius: 8px;
        padding: 20px;
    }

    .sidebar-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 16px 0;
        padding-bottom: 12px;
        border-bottom: 1px solid #e5e7eb;
    }

    .sidebar-tips {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .sidebar-tips li {
        font-size: 14px;
        color: #4b5563;
        line-height: 1.6;
        margin-bottom: 12px;
        padding-left: 20px;
        position: relative;
    }

    .sidebar-tips li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: #4A90E2;
        font-weight: bold;
        font-size: 20px;
    }

    .sidebar-help {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px;
        background: #eff6ff;
        border-radius: 6px;
        font-size: 13px;
        color: #1e40af;
    }

    .sidebar-help i {
        color: #4A90E2;
    }

    /* Footer Buttons */
    .wizard-footer {
        border-top: 1px solid #e5e7eb;
        padding: 16px 32px;
        background: #f9fafb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .wizard-btn-primary {
        background: #4A90E2;
        color: #fff;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .wizard-btn-primary:hover {
        background: #357abd;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
    }

    .wizard-btn-secondary {
        background: #fff;
        color: #374151;
        border: 1px solid #d1d5db;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .wizard-btn-secondary:hover {
        background: #f9fafb;
        border-color: #9ca3af;
    }

    /* Step Animation */
    .wizard-step {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scrollbar for progress bar */
    .wizard-steps-container::-webkit-scrollbar {
        height: 4px;
    }

    .wizard-steps-container::-webkit-scrollbar-track {
        background: transparent;
    }

    .wizard-steps-container::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 2px;
    }

    .wizard-steps-container::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
    </style>

    <script>
    // Student modal wizard functions
    let currentStudentStep = 1;
    const totalStudentSteps = 5;

    function openAddStudentModal() {
        currentStudentStep = 1;
        document.getElementById('addStudentModal').style.display = 'flex';
        
        // Reset all form fields
        document.getElementById('sPhoto').value = '';
        document.getElementById('sName').value = '';
        document.getElementById('sStudentId').value = '';
        document.getElementById('sDateOfJoining').value = '';
        document.getElementById('sGender').value = '';
        document.getElementById('sEthnicity').value = '';
        document.getElementById('sReligious').value = '';
        document.getElementById('sNRC').value = '';
        document.getElementById('sDOB').value = '';
        document.getElementById('sStartingGrade').value = '';
        document.getElementById('sCurrentGrade').value = '';
        document.getElementById('sCurrentClass').value = '';
        document.getElementById('sGuardianTeacher').value = '';
        document.getElementById('sAssistantTeacher').value = '';
        document.getElementById('sPreviousSchool').value = '';
        document.getElementById('sAddress').value = '';
        document.getElementById('sFatherName').value = '';
        document.getElementById('sFatherNRC').value = '';
        document.getElementById('sFatherPhone').value = '';
        document.getElementById('sFatherOccupation').value = '';
        document.getElementById('sMotherName').value = '';
        document.getElementById('sMotherNRC').value = '';
        document.getElementById('sMotherPhone').value = '';
        document.getElementById('sMotherOccupation').value = '';
        document.getElementById('sGuardianName').value = '';
        document.getElementById('sGuardianPhone').value = '';
        document.getElementById('sGuardianEmail').value = '';
        document.getElementById('sEmergencyPhone').value = '';
        document.getElementById('sRelativeName').value = '';
        document.getElementById('sRelativeGrade').value = '';
        document.getElementById('sRelativeRelationship').value = '';
        document.getElementById('sBlood').value = '';
        document.getElementById('sWeight').value = '';
        document.getElementById('sHeight').value = '';
        document.getElementById('sMedicineAllergy').value = '';
        document.getElementById('sFoodAllergy').value = '';
        document.getElementById('sMedicalDirectory').value = '';
        document.getElementById('sPortalRelationship').value = '';
        document.getElementById('sPortalAccountType').checked = true;
        document.getElementById('sBindAccountType').checked = false;
        const bindEmailInput = document.getElementById('sBindParentEmail');
        bindEmailInput.value = '';
        bindEmailInput.removeAttribute('data-found-email');
        document.getElementById('sBindParentPhone').value = '';
        document.getElementById('sBindRelationship').value = '';
        
        // Hide account info displays
        document.getElementById('bindAccountInfo').style.display = 'none';
        document.getElementById('bindAccountNotFound').style.display = 'none';
        
        // Reset portal account type UI
        togglePortalAccountType();
        
        // Reset to step 1
        goToStudentStep(1);
        
        // Show Next button on step 1
        document.getElementById('nextStudentBtn').style.display = 'inline-flex';
    }

    function closeAddStudentModal() {
        document.getElementById('addStudentModal').style.display = 'none';
    }

    function goToStudentStep(step) {
        currentStudentStep = step;
        
        // Hide all steps
        document.getElementById('studentStep1Form').style.display = 'none';
        document.getElementById('studentStep2Form').style.display = 'none';
        document.getElementById('studentStep3Form').style.display = 'none';
        document.getElementById('studentStep4Form').style.display = 'none';
        document.getElementById('studentStep5Form').style.display = 'none';
        
        // Show current step
        document.getElementById('studentStep' + step + 'Form').style.display = 'block';
        
        // Update progress bar active states
        const stepItems = document.querySelectorAll('#addStudentModal .wizard-step-item');
        stepItems.forEach((item, index) => {
            if (index + 1 <= step) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
        
        // Update button visibility
        const cancelBtn = document.getElementById('cancelStudent');
        const backBtn = document.getElementById('backStudentBtn');
        const nextBtn = document.getElementById('nextStudentBtn');
        const saveBtn = document.getElementById('saveStudent');
        
        cancelBtn.style.display = step === 1 ? 'inline-block' : 'none';
        backBtn.style.display = step > 1 ? 'inline-flex' : 'none';
        nextBtn.style.display = step < totalStudentSteps ? 'inline-flex' : 'none';
        saveBtn.style.display = step === totalStudentSteps ? 'inline-flex' : 'none';
    }

    function goToPreviousStudentStep() {
        if (currentStudentStep > 1) {
            goToStudentStep(currentStudentStep - 1);
        }
    }

    function handleNextStudentStep() {
        // Validate current step
        if (currentStudentStep === 1) {
            const name = (document.getElementById('sName').value || '').trim();
            if (!name) {
                alert('Please enter student name');
                return;
            }
        }
        
        if (currentStudentStep < totalStudentSteps) {
            goToStudentStep(currentStudentStep + 1);
        }
    }

    // Search bind account (called on input, similar to department form)
    function searchBindAccount(query) {
        const searchTerm = (query || '').trim();
        
        const accountInfoDiv = document.getElementById('bindAccountInfo');
        const accountNotFoundDiv = document.getElementById('bindAccountNotFound');
        
        // Hide both divs initially
        accountInfoDiv.style.display = 'none';
        accountNotFoundDiv.style.display = 'none';
        
        if (!searchTerm) {
            return; // Don't search if empty
        }
        
        // Determine if search term is email or phone
        const isEmail = searchTerm.includes('@');
        const isPhone = /[\d\s\-\+\(\)]/.test(searchTerm) && !isEmail;
        
        // Search in portalSetups (parent/guardian portal accounts)
        const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
        let foundAccount = null;
        
        // Search by email or phone
        for (const [profileId, setup] of Object.entries(portalSetups)) {
            if (isEmail && setup.email && setup.email.toLowerCase().includes(searchTerm.toLowerCase())) {
                foundAccount = { ...setup, profileId };
                break;
            } else if (isPhone && setup.phone && setup.phone.replace(/\D/g, '').includes(searchTerm.replace(/\D/g, ''))) {
                foundAccount = { ...setup, profileId };
                break;
            } else if (!isEmail && !isPhone) {
                // Try both email and phone if unclear
                if ((setup.email && setup.email.toLowerCase().includes(searchTerm.toLowerCase())) ||
                    (setup.phone && setup.phone.replace(/\D/g, '').includes(searchTerm.replace(/\D/g, '')))) {
                    foundAccount = { ...setup, profileId };
                    break;
                }
            }
        }
        
        // Also search in students data for guardian accounts
        if (!foundAccount) {
            const students = JSON.parse(localStorage.getItem('students') || '[]');
            for (const student of students) {
                if (isEmail && student.guardianEmail && student.guardianEmail.toLowerCase().includes(searchTerm.toLowerCase())) {
                    foundAccount = {
                        email: student.guardianEmail,
                        phone: student.guardianPhone || '',
                        fullName: student.guardianName || 'Guardian',
                        role: 'Parent Portal',
                        profileType: 'parent',
                        status: 'active',
                        studentsLinked: 1
                    };
                    break;
                } else if (isPhone && student.guardianPhone && student.guardianPhone.replace(/\D/g, '').includes(searchTerm.replace(/\D/g, ''))) {
                    foundAccount = {
                        email: student.guardianEmail || '',
                        phone: student.guardianPhone || '',
                        fullName: student.guardianName || 'Guardian',
                        role: 'Parent Portal',
                        profileType: 'parent',
                        status: 'active',
                        studentsLinked: 1
                    };
                    break;
                } else if (!isEmail && !isPhone) {
                    // Try both email and phone if unclear
                    if ((student.guardianEmail && student.guardianEmail.toLowerCase().includes(searchTerm.toLowerCase())) ||
                        (student.guardianPhone && student.guardianPhone.replace(/\D/g, '').includes(searchTerm.replace(/\D/g, '')))) {
                        foundAccount = {
                            email: student.guardianEmail || '',
                            phone: student.guardianPhone || '',
                            fullName: student.guardianName || 'Guardian',
                            role: 'Parent Portal',
                            profileType: 'parent',
                            status: 'active',
                            studentsLinked: 1
                        };
                        break;
                    }
                }
            }
        }
        
        if (foundAccount) {
            // Display account info
            document.getElementById('bindAccountName').textContent = foundAccount.fullName || foundAccount.name || 'N/A';
            document.getElementById('bindAccountEmail').textContent = foundAccount.email || '-';
            document.getElementById('bindAccountPhone').textContent = foundAccount.phone || '-';
            document.getElementById('bindAccountRole').textContent = foundAccount.role || 'Parent Portal';
            
            const statusText = foundAccount.status === 'active' ? 'Active' : 
                              foundAccount.accountCreated ? 'Account Created' : 
                              foundAccount.setupComplete ? 'Setup Complete' : 'Unknown';
            const statusClass = foundAccount.status === 'active' || foundAccount.accountCreated ? 'paid' : 'pending';
            document.getElementById('bindAccountStatus').innerHTML = `<span class="status-badge ${statusClass}">${statusText}</span>`;
            
            // Count linked students
            let studentsCount = foundAccount.studentsLinked || 0;
            if (foundAccount.profileId) {
                // Count students linked to this account
                const students = JSON.parse(localStorage.getItem('students') || '[]');
                const searchEmail = foundAccount.email || '';
                studentsCount = students.filter(s => 
                    s.bindParentEmail && s.bindParentEmail.toLowerCase() === searchEmail.toLowerCase()
                ).length;
            }
            document.getElementById('bindAccountStudents').textContent = studentsCount.toString();
            
            // Store the found email/phone for form submission
            if (foundAccount.email) {
                document.getElementById('sBindParentEmail').setAttribute('data-found-email', foundAccount.email);
            }
            if (foundAccount.phone) {
                document.getElementById('sBindParentPhone').value = foundAccount.phone;
            }
            
            accountInfoDiv.style.display = 'block';
            accountNotFoundDiv.style.display = 'none';
        } else {
            // Show not found message only if search term is substantial
            if (searchTerm.length >= 3) {
                accountInfoDiv.style.display = 'none';
                accountNotFoundDiv.style.display = 'block';
            }
        }
    }

    // Validate and search for bind account (backward compatibility)
    function validateBindAccount() {
        const email = (document.getElementById('sBindParentEmail').value || '').trim();
        const phone = (document.getElementById('sBindParentPhone').value || '').trim();
        
        // Use the stored found email if available
        const foundEmail = document.getElementById('sBindParentEmail').getAttribute('data-found-email') || email;
        
        const accountInfoDiv = document.getElementById('bindAccountInfo');
        const accountNotFoundDiv = document.getElementById('bindAccountNotFound');
        
        // Hide both divs initially
        accountInfoDiv.style.display = 'none';
        accountNotFoundDiv.style.display = 'none';
        
        if (!email && !foundEmail) {
            return; // Don't search if email is empty
        }
        
        // Use searchBindAccount if we have a search term
        if (email || foundEmail) {
            searchBindAccount(email || foundEmail);
        }
    }
    
    // Make functions globally available
    window.validateBindAccount = validateBindAccount;
    window.searchBindAccount = searchBindAccount;

    // Toggle portal account type fields
    function togglePortalAccountType() {
        const accountType = document.querySelector('input[name="portalAccountType"]:checked')?.value || 'new';
        const newAccountFields = document.getElementById('newAccountFields');
        const bindAccountFields = document.getElementById('bindAccountFields');
        const newAccountLabel = document.getElementById('newAccountLabel');
        const bindAccountLabel = document.getElementById('bindAccountLabel');
        
        if (accountType === 'bind') {
            newAccountFields.style.display = 'none';
            bindAccountFields.style.display = 'block';
            newAccountLabel.style.borderColor = '#e5e7eb';
            newAccountLabel.style.background = 'transparent';
            bindAccountLabel.style.borderColor = '#10b981';
            bindAccountLabel.style.background = '#f0fdf4';
        } else {
            newAccountFields.style.display = 'block';
            bindAccountFields.style.display = 'none';
            newAccountLabel.style.borderColor = '#4A90E2';
            newAccountLabel.style.background = '#f0f7ff';
            bindAccountLabel.style.borderColor = '#e5e7eb';
            bindAccountLabel.style.background = 'transparent';
            
            // Hide account info displays when switching away from bind
            const accountInfoDiv = document.getElementById('bindAccountInfo');
            const accountNotFoundDiv = document.getElementById('bindAccountNotFound');
            if (accountInfoDiv) accountInfoDiv.style.display = 'none';
            if (accountNotFoundDiv) accountNotFoundDiv.style.display = 'none';
            
            // Clear bind account search state
            const bindEmailInput = document.getElementById('sBindParentEmail');
            if (bindEmailInput) {
                bindEmailInput.value = '';
                bindEmailInput.removeAttribute('data-found-email');
            }
            const bindPhoneInput = document.getElementById('sBindParentPhone');
            if (bindPhoneInput) bindPhoneInput.value = '';
        }
    }

    // Make functions globally available
    window.openAddStudentModal = openAddStudentModal;
    window.closeAddStudentModal = closeAddStudentModal;
    window.goToPreviousStudentStep = goToPreviousStudentStep;
    window.handleNextStudentStep = handleNextStudentStep;
    window.goToStudentStep = goToStudentStep;
    window.togglePortalAccountType = togglePortalAccountType;

    // Student create form interactions
    document.addEventListener('DOMContentLoaded', function(){
        const openBtn=document.getElementById('openStudentModal');
        const saveBtn=document.getElementById('saveStudent');
        const tableBody=document.querySelector('.simple-table-container table tbody');
        const portalRelationshipSelect = document.getElementById('sPortalRelationship');

        if (openBtn) openBtn.addEventListener('click', function(e){ e.preventDefault(); openAddStudentModal(); });

        // Function to calculate age from date of birth in format "15 year 3 Month"
        function formatAge(dob) {
            if (!dob) return '';
            const birthDate = new Date(dob);
            const today = new Date();
            
            let years = today.getFullYear() - birthDate.getFullYear();
            let months = today.getMonth() - birthDate.getMonth();
            
            if (months < 0) {
                years--;
                months += 12;
            }
            
            if (years < 0) return '';
            
            return `${years} year ${months} Month`;
        }

        function prependRow(s){
            const ageDisplay = s.dob ? formatAge(s.dob) : (s.age || '');
            const tr=document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${s.id}</strong></td>
                <td>${s.name}</td>
                <td>${s.currentClass || s.klass || ''}</td>
                <td>${ageDisplay}</td>
                <td>${s.guardianName || s.parent || ''}</td>
                <td>${s.guardianPhone || s.phone || ''}</td>
                <td>${s.dateOfJoining || s.enroll || ''}</td>
                <td><span class="status-badge ${(s.status||'Active').toLowerCase() === 'active' ? 'paid' : (s.status||'Active').toLowerCase() === 'transfer' ? 'pending' : 'draft'}">${s.status||'Active'}</span></td>
                <td><button class="view-btn">View Details</button></td>`;
            tableBody.prepend(tr);
        }

        function saveStudentForm() {
            const name=(document.getElementById('sName').value||'').trim();
            if(!name){ alert('Please enter full name'); return; }
            
            // Get portal account type
            const portalAccountType = document.querySelector('input[name="portalAccountType"]:checked')?.value || 'new';
            const isBindingAccount = portalAccountType === 'bind';
            
            // Validate portal registration fields based on account type
            let portalEmail = '';
            let portalPassword = '';
            let portalPhone = '';
            let portalRelationship = '';
            let bindParentEmail = '';
            let bindParentPhone = '';
            let bindRelationship = '';
            let createPortal = false;
            
            if (isBindingAccount) {
                // Binding to existing account
                // Use the found email from search if available, otherwise use input value
                const emailInput = document.getElementById('sBindParentEmail');
                const foundEmail = emailInput.getAttribute('data-found-email');
                bindParentEmail = foundEmail || (emailInput.value||'').trim();
                bindParentPhone = (document.getElementById('sBindParentPhone').value||'').trim();
                bindRelationship = document.getElementById('sBindRelationship').value;
                
                // Check if account was found
                const accountInfoDiv = document.getElementById('bindAccountInfo');
                if (!bindParentEmail || accountInfoDiv.style.display === 'none') {
                    alert('Please search and select an existing parent account to bind this student');
                    return;
                }
                
                if (!bindParentEmail.includes('@')) {
                    alert('Please enter a valid parent email address or search for an existing account');
                    return;
                }
                
                createPortal = true; // Mark as portal account (bound)
            } else {
                // Creating new account
                portalRelationship = document.getElementById('sPortalRelationship').value;
                // Portal account creation is now optional - no email/password required
                createPortal = false;
            }
            
            // Generate Student ID if not provided
            const studentId = (document.getElementById('sStudentId').value||'').trim() || 'S'+Date.now();
            
            const obj={
                id: studentId,
                name,
                photo: document.getElementById('sPhoto').files.length > 0 ? document.getElementById('sPhoto').files[0].name : '',
                dateOfJoining: document.getElementById('sDateOfJoining').value||'',
                dob: document.getElementById('sDOB').value||'',
                gender: document.getElementById('sGender') ? document.getElementById('sGender').value : '',
                ethnicity: (document.getElementById('sEthnicity').value||'').trim(),
                religious: (document.getElementById('sReligious').value||'').trim(),
                nrc: (document.getElementById('sNRC').value||'').trim(),
                startingGrade: document.getElementById('sStartingGrade') ? document.getElementById('sStartingGrade').value : '',
                currentGrade: document.getElementById('sCurrentGrade') ? document.getElementById('sCurrentGrade').value : '',
                currentClass: (document.getElementById('sCurrentClass').value||'').trim(),
                guardianTeacher: (document.getElementById('sGuardianTeacher').value||'').trim(),
                assistantTeacher: (document.getElementById('sAssistantTeacher').value||'').trim(),
                previousSchool: (document.getElementById('sPreviousSchool').value||'').trim(),
                address: (document.getElementById('sAddress').value||'').trim(),
                fatherName: (document.getElementById('sFatherName').value||'').trim(),
                fatherNRC: (document.getElementById('sFatherNRC').value||'').trim(),
                fatherPhone: (document.getElementById('sFatherPhone').value||'').trim(),
                fatherOccupation: (document.getElementById('sFatherOccupation').value||'').trim(),
                motherName: (document.getElementById('sMotherName').value||'').trim(),
                motherNRC: (document.getElementById('sMotherNRC').value||'').trim(),
                motherPhone: (document.getElementById('sMotherPhone').value||'').trim(),
                motherOccupation: (document.getElementById('sMotherOccupation').value||'').trim(),
                guardianName: (document.getElementById('sGuardianName').value||'').trim(),
                guardianPhone: (document.getElementById('sGuardianPhone').value||'').trim(),
                guardianEmail: (document.getElementById('sGuardianEmail').value||'').trim(),
                emergencyPhone: (document.getElementById('sEmergencyPhone').value||'').trim(),
                relativeName: (document.getElementById('sRelativeName').value||'').trim(),
                relativeGrade: document.getElementById('sRelativeGrade') ? document.getElementById('sRelativeGrade').value : '',
                relativeRelationship: document.getElementById('sRelativeRelationship') ? document.getElementById('sRelativeRelationship').value : '',
                bloodType: document.getElementById('sBlood') ? document.getElementById('sBlood').value : '',
                weight: (document.getElementById('sWeight').value||'').trim(),
                height: (document.getElementById('sHeight').value||'').trim(),
                medicineAllergy: (document.getElementById('sMedicineAllergy').value||'').trim(),
                foodAllergy: (document.getElementById('sFoodAllergy').value||'').trim(),
                medicalDirectory: (document.getElementById('sMedicalDirectory').value||'').trim(),
                // Legacy fields for compatibility
                klass: (document.getElementById('sCurrentClass').value||'').trim(),
                parent: (document.getElementById('sGuardianName').value||'').trim(),
                phone: (document.getElementById('sGuardianPhone').value||'').trim(),
                email: (document.getElementById('sGuardianEmail').value||'').trim(),
                enroll: document.getElementById('sDateOfJoining').value||'',
                status: 'Active',
                portalAccount: createPortal,
                portalAccountType: portalAccountType,
                portalEmail: '',
                portalPhone: '',
                portalRelationship: !isBindingAccount ? portalRelationship : '',
                bindParentEmail: isBindingAccount ? bindParentEmail : '',
                bindParentPhone: isBindingAccount ? bindParentPhone : '',
                bindRelationship: isBindingAccount ? bindRelationship : ''
            };
            let list=[]; try{ list=JSON.parse(localStorage.getItem('students')||'[]'); }catch(e){ list=[]; }
            list.unshift(obj); localStorage.setItem('students', JSON.stringify(list));
            prependRow(obj);
            closeAddStudentModal();
            
            if(createPortal && isBindingAccount) {
                const bindInfo = `Bound to existing account:\nEmail: ${bindParentEmail}\nPhone: ${bindParentPhone || 'N/A'}\nRelationship: ${bindRelationship || 'N/A'}`;
                alert(`Student added successfully!\n\n${bindInfo}`);
            } else {
                alert('Student added successfully!');
            }
        }
        
        // Make saveStudentForm globally available
        window.saveStudentForm = saveStudentForm;
    });
    </script>

    <script>
    // Minimal placeholder add flow for students
    document.addEventListener('DOMContentLoaded', function(){
        const btn=document.getElementById('addStudentBtn');
        if(!btn) return;
        btn.addEventListener('click', function(){
            const name=prompt('Enter student full name (placeholder)');
            if(!name) return;
            const klass=prompt('Enter class (placeholder)')||'Grade 9-A';
            const item={ id:'S'+Date.now(), name, klass };
            let items=[]; try{ items=JSON.parse(localStorage.getItem('students')||'[]'); }catch(e){ items=[]; }
            items.unshift(item);
            localStorage.setItem('students', JSON.stringify(items));
            alert('Student placeholder added. Details to be finalized after onboarding.');
            location.reload();
        });
    });
    </script>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Class</th>
                    <th>Age</th>
                    <th>Parent Name</th>
                    <th>Phone</th>
                    <th>Enrollment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>S001</strong></td>
                    <td>John Smith</td>
                    <td>Grade 9-A</td>
                    <td>15 year 3 Month</td>
                    <td>Robert Smith</td>
                    <td>+1-555-1001</td>
                    <td>2023-09-01</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S001">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S002</strong></td>
                    <td>Sarah Johnson</td>
                    <td>Grade 9-A</td>
                    <td>14 year 5 Month</td>
                    <td>Mary Johnson</td>
                    <td>+1-555-1002</td>
                    <td>2023-09-01</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S002">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S003</strong></td>
                    <td>Mike Davis</td>
                    <td>Grade 10-B</td>
                    <td>16 year 2 Month</td>
                    <td>James Davis</td>
                    <td>+1-555-1003</td>
                    <td>2022-09-05</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S003">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S004</strong></td>
                    <td>Emma Wilson</td>
                    <td>Grade 11-A</td>
                    <td>17 year 4 Month</td>
                    <td>Lisa Wilson</td>
                    <td>+1-555-1004</td>
                    <td>2021-09-10</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S004">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S005</strong></td>
                    <td>Alex Brown</td>
                    <td>Grade 12-A</td>
                    <td>18 year 1 Month</td>
                    <td>Michael Brown</td>
                    <td>+1-555-1005</td>
                    <td>2020-09-15</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S005">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S006</strong></td>
                    <td>Jessica Lee</td>
                    <td>Grade 9-B</td>
                    <td>15 year 6 Month</td>
                    <td>Susan Lee</td>
                    <td>+1-555-1006</td>
                    <td>2023-09-01</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S006">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S007</strong></td>
                    <td>David Garcia</td>
                    <td>Grade 10-A</td>
                    <td>16 year 7 Month</td>
                    <td>Carlos Garcia</td>
                    <td>+1-555-1007</td>
                    <td>2022-09-08</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S007">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S008</strong></td>
                    <td>Anna Taylor</td>
                    <td>Grade 11-B</td>
                    <td>17 year 8 Month</td>
                    <td>Jennifer Taylor</td>
                    <td>+1-555-1008</td>
                    <td>2021-09-12</td>
                    <td><span class="status-badge pending">Transfer</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S008">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S009</strong></td>
                    <td>Chris Martinez</td>
                    <td>Grade 12-B</td>
                    <td>18 year 9 Month</td>
                    <td>Rosa Martinez</td>
                    <td>+1-555-1009</td>
                    <td>2020-09-20</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S009">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S010</strong></td>
                    <td>Mia Anderson</td>
                    <td>Grade 9-A</td>
                    <td>14 year 2 Month</td>
                    <td>Patricia Anderson</td>
                    <td>+1-555-1010</td>
                    <td>2023-09-01</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/student-profile/S010">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>