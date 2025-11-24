<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profiles';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Profiles';
$activePage = 'teachers';

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

<!-- Teacher Stats Cards -->
<div class="stats-grid-horizontal" style="margin-bottom: 24px;">
    <!-- Total Active Teachers -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal green">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">108</div>
            <div class="stat-label">Total Active Teachers</div>
            <div class="stat-today">97.3% present</div>
        </div>
    </div>

    <!-- Teacher-Student Ratio -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal purple">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">1:9</div>
            <div class="stat-label">Student Ratio</div>
            <div class="stat-today">Per teacher</div>
        </div>
    </div>
</div>

<!-- Teacher Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Teachers</h3>
        <button class="simple-btn" id="openTeacherModal"><i class="fas fa-plus"></i> Add New Teacher</button>
    </div>

    <!-- Add New Teacher Modal -->
    <div id="addTeacherModal" class="receipt-dialog-overlay" style="display:none;" onclick="if(event.target === this) closeAddTeacherModal();">
        <div class="receipt-dialog-content wizard-modal" style="max-width: 1000px; max-height: 90vh; overflow: hidden; display: flex; flex-direction: column;" onclick="event.stopPropagation();">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-user-plus"></i> Add New Teacher</h3>
                <button class="receipt-close" onclick="closeAddTeacherModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Wizard Progress Bar -->
            <div class="wizard-progress-bar">
                <div class="wizard-steps-container">
                    <div class="wizard-step-item active" data-step="1" onclick="goToStep(1)">
                        <div class="step-indicator">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <span class="step-label">Basic Info</span>
                    </div>
                    <div class="wizard-step-item" data-step="2" onclick="goToStep(2)">
                        <div class="step-indicator">2</div>
                        <span class="step-label">Personal</span>
                    </div>
                    <div class="wizard-step-item" data-step="3" onclick="goToStep(3)">
                        <div class="step-indicator">3</div>
                        <span class="step-label">Academic</span>
                    </div>
                    <div class="wizard-step-item" data-step="4" onclick="goToStep(4)">
                        <div class="step-indicator">4</div>
                        <span class="step-label">Family</span>
                    </div>
                    <div class="wizard-step-item" data-step="5" onclick="goToStep(5)">
                        <div class="step-indicator">5</div>
                        <span class="step-label">Marital</span>
                    </div>
                    <div class="wizard-step-item" data-step="6" onclick="goToStep(6)">
                        <div class="step-indicator">6</div>
                        <span class="step-label">Medical</span>
                    </div>
                    <div class="wizard-step-item" data-step="7" onclick="goToStep(7)">
                        <div class="step-indicator">7</div>
                        <span class="step-label">Portal</span>
                    </div>
                </div>
            </div>

            <div class="wizard-content-wrapper" style="flex: 1; display: flex; overflow: hidden;">
                <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
                    <div style="margin-bottom: 24px;">
                        <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Add New Teacher</h2>
                    </div>
                    <div class="form-section" style="padding:0;">
                    <!-- Step 1: Basic Information -->
                    <div class="wizard-step" id="wizard-step-1" style="display:block;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-user" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Basic Information</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tPhoto">Photo</label>
                                <input type="file" id="tPhoto" class="form-input" accept="image/*">
                            </div>
                            <div class="form-group" style="flex:2;">
                                <label for="tName">Name <span style="color:red;">*</span></label>
                                <input type="text" id="tName" class="form-input" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tPosition">Position</label>
                                <input type="text" id="tPosition" class="form-input" placeholder="e.g., Senior Teacher">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tDept">Department</label>
                                <input type="text" id="tDept" class="form-input" placeholder="e.g., Mathematics">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tEmployeeId">Employee ID</label>
                                <input type="text" id="tEmployeeId" class="form-input" placeholder="EMP-001">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tJoin">Date of Joining</label>
                                <input type="date" id="tJoin" class="form-input">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tMonthlySalary">Monthly Salary</label>
                                <input type="number" id="tMonthlySalary" class="form-input" placeholder="0.00" step="0.01">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tPhone">Ph. no.</label>
                                <input type="tel" id="tPhone" class="form-input" placeholder="+1-555-...">
                            </div>
                            <div class="form-group" style="flex:2;">
                                <label for="tAddress">Address</label>
                                <input type="text" id="tAddress" class="form-input" placeholder="Street, City, State">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tEmail">Email address</label>
                                <input type="email" id="tEmail" class="form-input" placeholder="name@school.edu">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Personal Details -->
                    <div class="wizard-step" id="wizard-step-2" style="display:none;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-id-card" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Personal Details</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tGender">Gender</label>
                                <select id="tGender" class="form-select">
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tEthnicity">Ethnicity</label>
                                <input type="text" id="tEthnicity" class="form-input" placeholder="e.g., Burmese">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tReligious">Religious</label>
                                <input type="text" id="tReligious" class="form-input" placeholder="e.g., Buddhist">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tNRC">NRC</label>
                                <input type="text" id="tNRC" class="form-input" placeholder="e.g., 12/TEA(N)123456">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tDOB">D.O.B</label>
                                <input type="date" id="tDOB" class="form-input">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tEducation">Education</label>
                                <input type="text" id="tEducation" class="form-input" placeholder="e.g., M.A., B.Ed.">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tGreenCard">Green card</label>
                                <input type="text" id="tGreenCard" class="form-input" placeholder="Green card number">
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Academic Information -->
                    <div class="wizard-step" id="wizard-step-3" style="display:none;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-graduation-cap" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Academic Information</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tCurrentGrade">Current Grade</label>
                                <input type="text" id="tCurrentGrade" class="form-input" placeholder="e.g., Grade 9">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tCurrentClasses">Current Classes</label>
                                <input type="text" id="tCurrentClasses" class="form-input" placeholder="e.g., 9-A, 9-B">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tResponsibleClass">Responsible Class</label>
                                <input type="text" id="tResponsibleClass" class="form-input" placeholder="e.g., 9-A">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tSubjects">Subjects taught</label>
                                <input type="text" id="tSubjects" class="form-input" placeholder="e.g., Algebra, Calculus">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tPreviousSchool">Previous School</label>
                                <input type="text" id="tPreviousSchool" class="form-input" placeholder="Previous school name">
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Family Information -->
                    <div class="wizard-step" id="wizard-step-4" style="display:none;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-users" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Family Information</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tFatherName">Father name</label>
                                <input type="text" id="tFatherName" class="form-input" placeholder="Father's full name">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tFatherPhone">Father's Ph no.</label>
                                <input type="tel" id="tFatherPhone" class="form-input" placeholder="+1-555-...">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tMotherName">Mother name</label>
                                <input type="text" id="tMotherName" class="form-input" placeholder="Mother's full name">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tMotherPhone">Mother's Ph no.</label>
                                <input type="tel" id="tMotherPhone" class="form-input" placeholder="+1-555-...">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tEmergencyContact">Emergency contact ph no.</label>
                                <input type="tel" id="tEmergencyContact" class="form-input" placeholder="+1-555-...">
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Marital Status & In-School Relative -->
                    <div class="wizard-step" id="wizard-step-5" style="display:none;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-heart" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Marital Status & In-School Relative</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tMaritalStatus">Marital Status</label>
                                <select id="tMaritalStatus" class="form-select">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tPartnerName">Partner Name</label>
                                <input type="text" id="tPartnerName" class="form-input" placeholder="Partner's full name">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tPartnerPhone">Partner's Ph no.</label>
                                <input type="tel" id="tPartnerPhone" class="form-input" placeholder="+1-555-...">
                            </div>
                        </div>
                        <div style="margin-top:24px; padding-top:24px; border-top:2px solid #e2e8f0;">
                            <div style="display:flex; align-items:center; margin-bottom:16px;">
                                <i class="fas fa-user-friends" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h5 style="margin:0; font-size:16px; font-weight:600; color:#1e40af;">In-school Relative</h5>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="tInSchoolRelativeName">Name</label>
                                    <input type="text" id="tInSchoolRelativeName" class="form-input" placeholder="Relative's name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="tInSchoolRelativeRelationship">Relationship</label>
                                    <input type="text" id="tInSchoolRelativeRelationship" class="form-input" placeholder="e.g., Brother, Sister">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Physical & Medical Information -->
                    <div class="wizard-step" id="wizard-step-6" style="display:none;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-heartbeat" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Physical & Medical Information</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tHeight">Height</label>
                                <input type="text" id="tHeight" class="form-input" placeholder="e.g., 5'8&quot;">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tMedicineAllergy">Medicine allergy</label>
                                <input type="text" id="tMedicineAllergy" class="form-input" placeholder="List any medicine allergies">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tFoodAllergy">Food allergy</label>
                                <input type="text" id="tFoodAllergy" class="form-input" placeholder="List any food allergies">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tMedicalDirectory">Medical Directory</label>
                                <textarea id="tMedicalDirectory" class="form-input" rows="3" placeholder="Additional medical information"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 7: Portal Registration -->
                    <div class="wizard-step" id="wizard-step-7" style="display:none;">
                        <div style="display:flex; align-items:center; margin-bottom:20px;">
                            <i class="fas fa-user-shield" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Portal Registration</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tPortalEmail">Portal Email</label>
                                <input type="email" id="tPortalEmail" class="form-input" placeholder="portal@email.com">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tPortalPassword">Portal Password</label>
                                <input type="password" id="tPortalPassword" class="form-input" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="tPortalPhone">Phone Number</label>
                                <input type="tel" id="tPortalPhone" class="form-input" placeholder="+1-555-0000">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="tStatus">Status</label>
                                <select id="tStatus" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="On Leave">On Leave</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 8: Success Page -->
                    <div class="wizard-step" id="wizard-step-8" style="display:none;">
                        <div class="success-page">
                            <div class="success-icon-wrapper">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h2 class="success-title">Teacher Registered Successfully!</h2>
                            <p class="success-message">The teacher has been added to the system.</p>
                            
                            <div class="success-details" id="successDetails">
                                <div class="success-card">
                                    <div class="success-card-header">
                                        <i class="fas fa-user-check"></i>
                                        <h3>Registration Complete</h3>
                                    </div>
                                    <div class="success-card-content">
                                        <p><strong>Teacher ID:</strong> <span id="successTeacherId"></span></p>
                                        <p><strong>Name:</strong> <span id="successTeacherName"></span></p>
                                        <p><strong>Department:</strong> <span id="successTeacherDept"></span></p>
                                        <p><strong>Status:</strong> <span id="successTeacherStatus"></span></p>
                                    </div>
                                </div>
                                
                                <div class="success-card" id="portalSuccessCard" style="display:none;">
                                    <div class="success-card-header">
                                        <i class="fas fa-user-shield"></i>
                                        <h3>Portal Account Created</h3>
                                    </div>
                                    <div class="success-card-content">
                                        <p><strong>Portal Email:</strong> <span id="successPortalEmail"></span></p>
                                        <p><strong>Portal Phone:</strong> <span id="successPortalPhone"></span></p>
                                        <div class="success-note">
                                            <i class="fas fa-info-circle"></i>
                                            <span>Portal credentials have been sent to the registered email.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="success-actions">
                                <button class="wizard-btn-primary" onclick="closeAddTeacherModal()">
                                    <i class="fas fa-check"></i> Done
                                </button>
                                <button class="wizard-btn-secondary" onclick="goToStep(1); resetForm();">
                                    <i class="fas fa-plus"></i> Add Another Teacher
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
                <!-- Sidebar with Tips -->
                <div class="wizard-sidebar">
                    <div class="wizard-sidebar-content">
                        <h3 class="sidebar-title">Teacher Registration</h3>
                        <ul class="sidebar-tips">
                            <li>Fill out all required fields marked with <span style="color:red;">*</span> to proceed</li>
                            <li>You can navigate between steps using the progress bar or navigation buttons</li>
                            <li>All information can be edited before final submission</li>
                            <li>Portal registration is optional but recommended for teacher access</li>
                        </ul>
                        <div class="sidebar-help">
                            <i class="fas fa-info-circle"></i>
                            <span>Need help? Contact the admin support team</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 16px 32px; background: #f9fafb; display: flex; justify-content: space-between; align-items: center;">
                <button id="cancelTeacher" class="wizard-btn-secondary" onclick="closeAddTeacherModal()" style="display:none;">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <div style="display: flex; gap: 12px; margin-left: auto;">
                    <button id="wizardPrevBtn" class="wizard-btn-secondary" onclick="previousStep()" style="display:none;">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button id="wizardNextBtn" class="wizard-btn-primary" onclick="nextStep()" style="display:none;">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                    <button id="wizardSaveBtn" class="wizard-btn-primary" onclick="saveTeacherData()" style="display:none;">
                        <i class="fas fa-save"></i> Save and Preview
                    </button>
                </div>
            </div>
        </div>
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

    .wizard-save-preview-btn {
        background: #4A90E2;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .wizard-save-preview-btn:hover {
        background: #357abd;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
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
        padding-left: 24px;
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

    /* Success Page Styles */
    .success-page {
        text-align: center;
        padding: 40px 20px;
        max-width: 800px;
        margin: 0 auto;
    }

    .success-icon-wrapper {
        width: 100px;
        height: 100px;
        margin: 0 auto 24px;
        background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 24px rgba(74, 144, 226, 0.3);
        animation: scaleIn 0.5s ease-out;
    }

    .success-icon-wrapper i {
        font-size: 48px;
        color: #fff;
    }

    @keyframes scaleIn {
        from {
            transform: scale(0);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .success-title {
        font-size: 32px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 12px 0;
    }

    .success-message {
        font-size: 18px;
        color: #6b7280;
        margin: 0 0 40px 0;
    }

    .success-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .success-card {
        background: #fff;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        text-align: left;
        transition: all 0.3s ease;
    }

    .success-card:hover {
        border-color: #4A90E2;
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.1);
    }

    .success-card-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    .success-card-header i {
        font-size: 24px;
        color: #4A90E2;
    }

    .success-card-header h3 {
        font-size: 20px;
        font-weight: 600;
        color: #111827;
        margin: 0;
    }

    .success-card-content p {
        font-size: 15px;
        color: #4b5563;
        margin: 12px 0;
        line-height: 1.6;
    }

    .success-card-content strong {
        color: #111827;
        font-weight: 600;
        margin-right: 8px;
    }

    .success-note {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px;
        background: #eff6ff;
        border-radius: 6px;
        margin-top: 16px;
        font-size: 13px;
        color: #1e40af;
    }

    .success-note i {
        color: #4A90E2;
    }

    .success-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 40px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .wizard-sidebar {
            width: 280px;
        }
    }

    @media (max-width: 992px) {
        .wizard-content-wrapper {
            flex-direction: column;
        }
        
        .wizard-sidebar {
            width: 100%;
            border-left: none;
            border-top: 1px solid #e5e7eb;
        }

        .success-details {
            grid-template-columns: 1fr;
        }
    }
    </style>

    <script>
    // Wizard state
    let currentStep = 1;
    const totalSteps = 8;

    // Teacher modal functions
    function openAddTeacherModal() {
        document.getElementById('addTeacherModal').style.display = 'flex';
        currentStep = 1;
        resetForm();
        goToStep(1);
    }

    function closeAddTeacherModal() {
        document.getElementById('addTeacherModal').style.display = 'none';
        currentStep = 1;
        goToStep(1);
    }

    // Wizard navigation functions
    function goToStep(step) {
        if (step < 1 || step > totalSteps) return;
        
        currentStep = step;
        
        // Hide all steps
        for (let i = 1; i <= totalSteps; i++) {
            const stepElement = document.getElementById(`wizard-step-${i}`);
            if (stepElement) {
                stepElement.style.display = 'none';
            }
        }
        
        // Show current step
        const currentStepElement = document.getElementById(`wizard-step-${currentStep}`);
        if (currentStepElement) {
            currentStepElement.style.display = 'block';
        }
        
        // Hide/show sidebar based on step
        const sidebar = document.querySelector('.wizard-sidebar');
        if (sidebar) {
            if (currentStep === totalSteps) {
                sidebar.style.display = 'none';
            } else {
                sidebar.style.display = 'block';
            }
        }
        
        // Hide progress bar on success page
        const progressBar = document.querySelector('.wizard-progress-bar');
        if (progressBar) {
            if (currentStep === totalSteps) {
                progressBar.style.display = 'none';
            } else {
                progressBar.style.display = 'block';
            }
        }
        
        // Update progress dots (only for steps 1-7)
        if (currentStep < totalSteps) {
            updateProgressDots();
        }
        
        // Update navigation buttons
        updateNavigationButtons();
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            goToStep(currentStep + 1);
        }
    }

    function previousStep() {
        if (currentStep > 1) {
            goToStep(currentStep - 1);
        }
    }

    function updateProgressDots() {
        const stepItems = document.querySelectorAll('.wizard-step-item');
        stepItems.forEach((item, index) => {
            const stepNum = index + 1;
            item.classList.remove('active', 'completed');
            
            // Update step indicator content (only for steps 1-7)
            const indicator = item.querySelector('.step-indicator');
            if (indicator && stepNum <= 7) {
                if (stepNum === currentStep) {
                    item.classList.add('active');
                    indicator.innerHTML = '<i class="fas fa-pencil-alt"></i>';
                } else if (stepNum < currentStep) {
                    item.classList.add('completed');
                    indicator.innerHTML = '';
                } else {
                    indicator.textContent = stepNum;
                }
            }
        });
    }

    function updateNavigationButtons() {
        const prevBtn = document.getElementById('wizardPrevBtn');
        const nextBtn = document.getElementById('wizardNextBtn');
        const saveBtn = document.getElementById('wizardSaveBtn');
        const cancelBtn = document.getElementById('cancelTeacher');
        
        // Hide all buttons first
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
        saveBtn.style.display = 'none';
        cancelBtn.style.display = 'none';
        
        // Step 8 (Success page) - no navigation buttons
        if (currentStep === totalSteps) {
            return;
        }
        
        // Show cancel button for all steps except success
        cancelBtn.style.display = 'inline-flex';
        
        // Show/hide Previous button
        if (currentStep > 1) {
            prevBtn.style.display = 'inline-flex';
        }
        
        // Show/hide Next and Save buttons
        if (currentStep === 7) {
            // Last form step - show Save button
            saveBtn.style.display = 'inline-flex';
        } else {
            // Other steps - show Next button
            nextBtn.style.display = 'inline-flex';
        }
    }

    function resetForm() {
        // Reset all form fields
        const fields = [
            'tPhoto', 'tName', 'tPosition', 'tDept', 'tEmployeeId', 'tJoin', 
            'tMonthlySalary', 'tPhone', 'tAddress', 'tEmail', 'tGender', 
            'tEthnicity', 'tReligious', 'tNRC', 'tDOB', 'tEducation', 
            'tGreenCard', 'tCurrentGrade', 'tCurrentClasses', 'tResponsibleClass', 
            'tSubjects', 'tPreviousSchool', 'tFatherName', 'tFatherPhone', 
            'tMotherName', 'tMotherPhone', 'tEmergencyContact', 'tMaritalStatus', 
            'tPartnerName', 'tPartnerPhone', 'tInSchoolRelativeName', 
            'tInSchoolRelativeRelationship', 'tHeight', 'tMedicineAllergy', 
            'tFoodAllergy', 'tMedicalDirectory', 'tPortalEmail', 'tPortalPassword', 
            'tPortalPhone', 'tStatus'
        ];
        
        fields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                if (field.type === 'file') {
                    field.value = '';
                } else {
                    field.value = '';
                }
            }
        });
        
        // Reset status to Active
        const statusField = document.getElementById('tStatus');
        if (statusField) {
            statusField.value = 'Active';
        }
    }

    // Make functions globally available
    window.openAddTeacherModal = openAddTeacherModal;
    window.closeAddTeacherModal = closeAddTeacherModal;
    window.goToStep = goToStep;
    window.nextStep = nextStep;
    window.previousStep = previousStep;

    // Teacher create form interactions
    document.addEventListener('DOMContentLoaded', function(){
        const openBtn=document.getElementById('openTeacherModal');
        const saveBtn=document.getElementById('saveTeacher');
        const tableBody=document.querySelector('.simple-table-container table tbody');
        const teacherEmailInput = document.getElementById('tEmail');
        const teacherPhoneInput = document.getElementById('tPhone');
        const portalEmailInput = document.getElementById('tPortalEmail');
        const portalPhoneInput = document.getElementById('tPortalPhone');

        if (openBtn) openBtn.addEventListener('click', function(e){ e.preventDefault(); openAddTeacherModal(); });
        
        // Auto-fill portal email from teacher email if portal email is empty
        if(teacherEmailInput && portalEmailInput) {
            teacherEmailInput.addEventListener('blur', function() {
                if(!portalEmailInput.value && this.value) {
                    portalEmailInput.value = this.value;
                }
            });
        }
        
        // Auto-fill portal phone from teacher phone if portal phone is empty
        if(teacherPhoneInput && portalPhoneInput) {
            teacherPhoneInput.addEventListener('blur', function() {
                if(!portalPhoneInput.value && this.value) {
                    portalPhoneInput.value = this.value;
                }
            });
        }

        function prependRow(t){
            const tr=document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${t.id}</strong></td>
                <td>${t.name}</td>
                <td>${t.dept}</td>
                <td>${t.subjects}</td>
                <td>${t.phone||''}</td>
                <td>${t.join||''}</td>
                <td><span class="status-badge ${(t.status||'Active').toLowerCase() === 'active' ? 'paid' : (t.status||'Active').toLowerCase() === 'on leave' ? 'pending' : 'draft'}">${t.status||'Active'}</span></td>
                <td><button class="view-btn">View Details</button></td>`;
            tableBody.prepend(tr);
        }

        // Save teacher data function (called from wizard)
        window.saveTeacherData = function() {
            const name=(document.getElementById('tName').value||'').trim();
            if(!name){ alert('Please enter full name'); return; }
            
            // Validate portal registration fields
            const portalEmail = (document.getElementById('tPortalEmail').value||'').trim();
            const portalPassword = document.getElementById('tPortalPassword').value;
            const portalPhone = (document.getElementById('tPortalPhone').value||'').trim();
            const createPortal = portalEmail && portalPassword;
            
            if(createPortal) {
                if(!portalEmail.includes('@')) {
                    alert('Please enter a valid portal email address');
                    return;
                }
            }
            
            // Get photo file if selected
            const photoInput = document.getElementById('tPhoto');
            const photoFile = photoInput && photoInput.files.length > 0 ? photoInput.files[0].name : '';
            
            const teacherId = 'T'+Date.now();
            const obj={
                id: teacherId,
                // Basic Information
                photo: photoFile,
                name,
                position: (document.getElementById('tPosition').value||'').trim(),
                dept:(document.getElementById('tDept').value||'').trim(),
                employeeId: (document.getElementById('tEmployeeId').value||'').trim(),
                join:document.getElementById('tJoin').value||'',
                monthlySalary: (document.getElementById('tMonthlySalary').value||'').trim(),
                phone:(document.getElementById('tPhone').value||'').trim(),
                address: (document.getElementById('tAddress').value||'').trim(),
                email:(document.getElementById('tEmail').value||'').trim(),
                gender: document.getElementById('tGender') ? document.getElementById('tGender').value : '',
                ethnicity: (document.getElementById('tEthnicity').value||'').trim(),
                religious: (document.getElementById('tReligious').value||'').trim(),
                nrc: (document.getElementById('tNRC').value||'').trim(),
                dob: document.getElementById('tDOB').value||'',
                education: (document.getElementById('tEducation').value||'').trim(),
                greenCard: (document.getElementById('tGreenCard').value||'').trim(),
                // Academic Information
                currentGrade: (document.getElementById('tCurrentGrade').value||'').trim(),
                currentClasses: (document.getElementById('tCurrentClasses').value||'').trim(),
                responsibleClass: (document.getElementById('tResponsibleClass').value||'').trim(),
                subjects:(document.getElementById('tSubjects').value||'').trim(),
                previousSchool: (document.getElementById('tPreviousSchool').value||'').trim(),
                // Family Information
                fatherName: (document.getElementById('tFatherName').value||'').trim(),
                fatherPhone: (document.getElementById('tFatherPhone').value||'').trim(),
                motherName: (document.getElementById('tMotherName').value||'').trim(),
                motherPhone: (document.getElementById('tMotherPhone').value||'').trim(),
                emergencyContact: (document.getElementById('tEmergencyContact').value||'').trim(),
                // Marital Status
                maritalStatus: document.getElementById('tMaritalStatus') ? document.getElementById('tMaritalStatus').value : '',
                partnerName: (document.getElementById('tPartnerName').value||'').trim(),
                partnerPhone: (document.getElementById('tPartnerPhone').value||'').trim(),
                // In-School Relative
                inSchoolRelativeName: (document.getElementById('tInSchoolRelativeName').value||'').trim(),
                inSchoolRelativeRelationship: (document.getElementById('tInSchoolRelativeRelationship').value||'').trim(),
                // Physical & Medical
                height: (document.getElementById('tHeight').value||'').trim(),
                medicineAllergy: (document.getElementById('tMedicineAllergy').value||'').trim(),
                foodAllergy: (document.getElementById('tFoodAllergy').value||'').trim(),
                medicalDirectory: (document.getElementById('tMedicalDirectory').value||'').trim(),
                // Status & Portal
                status:document.getElementById('tStatus').value||'Active',
                portalAccount: createPortal,
                portalEmail: createPortal ? portalEmail : '',
                portalPhone: createPortal ? portalPhone : ''
            };
            let list=[]; try{ list=JSON.parse(localStorage.getItem('teachers')||'[]'); }catch(e){ list=[]; }
            list.unshift(obj); localStorage.setItem('teachers', JSON.stringify(list));
            prependRow(obj);
            
            // Populate success page
            document.getElementById('successTeacherId').textContent = teacherId;
            document.getElementById('successTeacherName').textContent = name;
            document.getElementById('successTeacherDept').textContent = obj.dept || 'N/A';
            document.getElementById('successTeacherStatus').textContent = obj.status;
            
            // Show portal success card if portal was created
            if(createPortal) {
                document.getElementById('portalSuccessCard').style.display = 'block';
                document.getElementById('successPortalEmail').textContent = portalEmail;
                document.getElementById('successPortalPhone').textContent = portalPhone || 'N/A';
            } else {
                document.getElementById('portalSuccessCard').style.display = 'none';
            }
            
            // Navigate to success page
            goToStep(8);
        };
    });
    </script>

    <script>
    // Minimal placeholder add flow for teachers
    document.addEventListener('DOMContentLoaded', function(){
        const btn=document.getElementById('addTeacherBtn');
        if(!btn) return;
        btn.addEventListener('click', function(){
            const name=prompt('Enter teacher full name (placeholder)');
            if(!name) return;
            const dept=prompt('Enter department (placeholder)')||'General';
            const item={ id:'T'+Date.now(), name, dept };
            let items=[]; try{ items=JSON.parse(localStorage.getItem('teachers')||'[]'); }catch(e){ items=[]; }
            items.unshift(item);
            localStorage.setItem('teachers', JSON.stringify(items));
            alert('Teacher placeholder added. Details to be finalized after onboarding.');
            location.reload();
        });
    });
    </script>
    
    <div class="simple-filters" style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
        <div class="simple-search" style="display: flex; align-items: center; gap: 8px; flex: 1; min-width: 300px; max-width: 400px;">
            <input type="text" placeholder="Search teacher by name, ID, or department..." class="simple-input" style="flex: 1; min-width: 0;">
            <button class="simple-btn">Search</button>
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
        <div class="filter-group">
            <label>Filter by Subject:</label>
            <select class="filter-select">
                <option value="">All Subjects</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Art">Art</option>
                <option value="Physical Education">Physical Education</option>
                <option value="Music">Music</option>
                <option value="Spanish">Spanish</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Chemistry">Chemistry</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>T001</strong></td>
                    <td>Dr. Emily Parker</td>
                    <td>Mathematics</td>
                    <td>Algebra, Calculus</td>
                    <td>+1-555-0101</td>
                    <td>2020-08-15</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T001">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T002</strong></td>
                    <td>Prof. James Wilson</td>
                    <td>Science</td>
                    <td>Physics, Chemistry</td>
                    <td>+1-555-0102</td>
                    <td>2019-09-01</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T002">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T003</strong></td>
                    <td>Ms. Sarah Chen</td>
                    <td>English</td>
                    <td>Literature, Grammar</td>
                    <td>+1-555-0103</td>
                    <td>2021-01-10</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T003">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T004</strong></td>
                    <td>Mr. David Lee</td>
                    <td>History</td>
                    <td>World History, Geography</td>
                    <td>+1-555-0104</td>
                    <td>2018-03-20</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T004">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T005</strong></td>
                    <td>Ms. Lisa Wong</td>
                    <td>Art</td>
                    <td>Drawing, Painting</td>
                    <td>+1-555-0105</td>
                    <td>2020-11-05</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T005">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T006</strong></td>
                    <td>Mr. Michael Brown</td>
                    <td>Physical Education</td>
                    <td>Sports, Health</td>
                    <td>+1-555-0106</td>
                    <td>2019-06-12</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T006">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T007</strong></td>
                    <td>Dr. Helen Thompson</td>
                    <td>Chemistry</td>
                    <td>Organic Chemistry</td>
                    <td>+1-555-0107</td>
                    <td>2017-02-28</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T007">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T008</strong></td>
                    <td>Mr. Robert Kim</td>
                    <td>Music</td>
                    <td>Piano, Theory</td>
                    <td>+1-555-0108</td>
                    <td>2020-09-14</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T008">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T009</strong></td>
                    <td>Ms. Amanda Garcia</td>
                    <td>Spanish</td>
                    <td>Spanish Language</td>
                    <td>+1-555-0109</td>
                    <td>2021-08-30</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T009">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T010</strong></td>
                    <td>Dr. Thomas Anderson</td>
                    <td>Computer Science</td>
                    <td>Programming, Database</td>
                    <td>+1-555-0110</td>
                    <td>2019-01-15</td>
                    <td><span class="status-badge paid">Active</span></td>
                <td><a class="view-btn" href="/admin/teacher-profile/T010">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>