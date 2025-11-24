<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Profiles';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Profiles';
$activePage = 'employees';

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

<!-- Staff Stats Cards -->
<div class="stats-grid-horizontal" style="margin-bottom: 24px;">
    <!-- Total Staff -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal green">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">45</div>
            <div class="stat-label">Total Staff</div>
            <div class="stat-today">All employees</div>
        </div>
    </div>

    <!-- Active Staff -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal blue">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">43</div>
            <div class="stat-label">Active Staff</div>
            <div class="stat-today">95.6% present</div>
        </div>
    </div>

    <!-- On Leave -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal yellow">
            <i class="fas fa-calendar-times"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">2</div>
            <div class="stat-label">On Leave</div>
            <div class="stat-today">Currently</div>
        </div>
    </div>

    <!-- Departments -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal purple">
            <i class="fas fa-building"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">9</div>
            <div class="stat-label">Departments</div>
            <div class="stat-today">Active</div>
        </div>
    </div>
</div>

<!-- Employee Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Staff</h3>
        <button class="simple-btn" id="openStaffModal"><i class="fas fa-plus"></i> Add New Staff</button>
    </div>

    <!-- Add New Staff Modal -->
    <div id="addStaffModal" class="receipt-dialog-overlay" style="display:none;" onclick="if(event.target === this) closeAddStaffModal();">
        <div class="receipt-dialog-content wizard-modal" style="max-width: 1000px; max-height: 90vh; overflow: hidden; display: flex; flex-direction: column;" onclick="event.stopPropagation();">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-user-plus"></i> Add New Staff</h3>
                <button class="receipt-close" onclick="closeAddStaffModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Wizard Progress Bar -->
            <div class="wizard-progress-bar">
                <div class="wizard-steps-container">
                    <div class="wizard-step-item active" data-step="1" onclick="goToStaffStep(1)">
                        <div class="step-indicator">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <span class="step-label">Basic Info</span>
                    </div>
                    <div class="wizard-step-item" data-step="2" onclick="goToStaffStep(2)">
                        <div class="step-indicator">2</div>
                        <span class="step-label">Personal</span>
                    </div>
                    <div class="wizard-step-item" data-step="3" onclick="goToStaffStep(3)">
                        <div class="step-indicator">3</div>
                        <span class="step-label">Family</span>
                    </div>
                    <div class="wizard-step-item" data-step="4" onclick="goToStaffStep(4)">
                        <div class="step-indicator">4</div>
                        <span class="step-label">Marital</span>
                    </div>
                    <div class="wizard-step-item" data-step="5" onclick="goToStaffStep(5)">
                        <div class="step-indicator">5</div>
                        <span class="step-label">Medical</span>
                    </div>
                    <div class="wizard-step-item" data-step="6" onclick="goToStaffStep(6)">
                        <div class="step-indicator">6</div>
                        <span class="step-label">Portal</span>
                    </div>
                </div>
            </div>

            <div class="wizard-content-wrapper" style="flex: 1; display: flex; overflow: hidden;">
                <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
                    <div style="margin-bottom: 24px;">
                        <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Add New Staff</h2>
                    </div>
                    <div class="form-section" style="padding:0;">
                        <!-- Step 1: Basic Information -->
                        <div class="wizard-step" id="staff-wizard-step-1" style="display:block;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-user" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Basic Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="ePhoto">Photo</label>
                                    <input type="file" id="ePhoto" class="form-input" accept="image/*">
                                </div>
                                <div class="form-group" style="flex:2;">
                                    <label for="eName">Name <span style="color:red;">*</span></label>
                                    <input type="text" id="eName" class="form-input" placeholder="Enter full name" required>
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="ePos">Position</label>
                                    <input type="text" id="ePos" class="form-input" placeholder="e.g., Secretary">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eDept">Department</label>
                                    <input type="text" id="eDept" class="form-input" placeholder="e.g., Administration">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eEmployeeId">Employee ID</label>
                                    <input type="text" id="eEmployeeId" class="form-input" placeholder="EMP-001">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eHire">Date of Joining</label>
                                    <input type="date" id="eHire" class="form-input">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eSalary">Monthly Salary</label>
                                    <input type="number" id="eSalary" class="form-input" placeholder="0.00" step="0.01">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="ePhone">Ph. no.</label>
                                    <input type="tel" id="ePhone" class="form-input" placeholder="+1-555-...">
                                </div>
                                <div class="form-group" style="flex:2;">
                                    <label for="eAddress">Address</label>
                                    <input type="text" id="eAddress" class="form-input" placeholder="Street, City, State">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eEmail">Email address</label>
                                    <input type="email" id="eEmail" class="form-input" placeholder="name@school.edu">
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Personal Details -->
                        <div class="wizard-step" id="staff-wizard-step-2" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-id-card" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Personal Details</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eGender">Gender</label>
                                    <select id="eGender" class="form-select">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eEthnicity">Ethnicity</label>
                                    <input type="text" id="eEthnicity" class="form-input" placeholder="e.g., Burmese">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eReligious">Religious</label>
                                    <input type="text" id="eReligious" class="form-input" placeholder="e.g., Buddhist">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eNRC">NRC</label>
                                    <input type="text" id="eNRC" class="form-input" placeholder="e.g., 12/EMP(N)123456">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eDOB">D.O.B</label>
                                    <input type="date" id="eDOB" class="form-input">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eEducation">Education</label>
                                    <input type="text" id="eEducation" class="form-input" placeholder="e.g., High School, Diploma">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eGreenCard">Green card</label>
                                    <input type="text" id="eGreenCard" class="form-input" placeholder="Green card number">
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Family Information -->
                        <div class="wizard-step" id="staff-wizard-step-3" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-users" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Family Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eFatherName">Father name</label>
                                    <input type="text" id="eFatherName" class="form-input" placeholder="Father's full name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eFatherPhone">Father's Ph no.</label>
                                    <input type="tel" id="eFatherPhone" class="form-input" placeholder="+1-555-...">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eMotherName">Mother name</label>
                                    <input type="text" id="eMotherName" class="form-input" placeholder="Mother's full name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eMotherPhone">Mother's Ph no.</label>
                                    <input type="tel" id="eMotherPhone" class="form-input" placeholder="+1-555-...">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eEmergencyContact">Emergency contact ph no.</label>
                                    <input type="tel" id="eEmergencyContact" class="form-input" placeholder="+1-555-...">
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Marital Status & In-School Relative -->
                        <div class="wizard-step" id="staff-wizard-step-4" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-heart" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Marital Status & In-School Relative</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eMaritalStatus">Marital Status</label>
                                    <select id="eMaritalStatus" class="form-select">
                                        <option value="">Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="ePartnerName">Partner Name</label>
                                    <input type="text" id="ePartnerName" class="form-input" placeholder="Partner's full name">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="ePartnerPhone">Partner's Ph no.</label>
                                    <input type="tel" id="ePartnerPhone" class="form-input" placeholder="+1-555-...">
                                </div>
                            </div>
                            <div style="margin-top:24px; padding-top:24px; border-top:2px solid #e2e8f0;">
                                <div style="display:flex; align-items:center; margin-bottom:16px;">
                                    <i class="fas fa-user-friends" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                    <h5 style="margin:0; font-size:16px; font-weight:600; color:#1e40af;">In-school Relative</h5>
                                </div>
                                <div class="form-row">
                                    <div class="form-group" style="flex:1;">
                                        <label for="eInSchoolRelativeName">Name</label>
                                        <input type="text" id="eInSchoolRelativeName" class="form-input" placeholder="Relative's name">
                                    </div>
                                    <div class="form-group" style="flex:1;">
                                        <label for="eInSchoolRelativeRelationship">Relationship</label>
                                        <input type="text" id="eInSchoolRelativeRelationship" class="form-input" placeholder="e.g., Brother, Sister">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Physical & Medical Information -->
                        <div class="wizard-step" id="staff-wizard-step-5" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-heartbeat" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Physical & Medical Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eHeight">Height</label>
                                    <input type="text" id="eHeight" class="form-input" placeholder="e.g., 5'8&quot;">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eMedicineAllergy">Medicine allergy</label>
                                    <input type="text" id="eMedicineAllergy" class="form-input" placeholder="List any medicine allergies">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="eFoodAllergy">Food allergy</label>
                                    <input type="text" id="eFoodAllergy" class="form-input" placeholder="List any food allergies">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eMedicalDirectory">Medical Directory</label>
                                    <textarea id="eMedicalDirectory" class="form-input" rows="3" placeholder="Additional medical information"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 6: Portal Registration -->
                        <div class="wizard-step" id="staff-wizard-step-6" style="display:none;">
                            <div style="display:flex; align-items:center; margin-bottom:20px;">
                                <i class="fas fa-user-shield" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                                <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Portal Registration</h4>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="ePortalEmail">Portal Email</label>
                                    <input type="email" id="ePortalEmail" class="form-input" placeholder="portal@email.com">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="ePortalPassword">Portal Password</label>
                                    <input type="password" id="ePortalPassword" class="form-input" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="ePortalPhone">Phone Number</label>
                                    <input type="tel" id="ePortalPhone" class="form-input" placeholder="+1-555-0000">
                                </div>
                                <div class="form-group" style="flex:1;">
                                    <label for="ePortalDepartment">Portal Department</label>
                                    <select id="ePortalDepartment" class="form-select">
                                        <option value="">Select department</option>
                                        <option value="Administration">Administration</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Food Service">Food Service</option>
                                        <option value="Security">Security</option>
                                        <option value="Library">Library</option>
                                        <option value="IT Support">IT Support</option>
                                        <option value="Health Services">Health Services</option>
                                        <option value="Transportation">Transportation</option>
                                        <option value="Counseling">Counseling</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label for="eStatus">Status</label>
                                    <select id="eStatus" class="form-select">
                                        <option value="Active">Active</option>
                                        <option value="On Leave">On Leave</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Step 7: Success Page -->
                        <div class="wizard-step" id="staff-wizard-step-7" style="display:none;">
                            <div class="success-page">
                                <div class="success-icon-wrapper">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <h2 class="success-title">Staff Registered Successfully!</h2>
                                <p class="success-message">The staff member has been added to the system.</p>
                                
                                <div class="success-details" id="staffSuccessDetails">
                                    <div class="success-card">
                                        <div class="success-card-header">
                                            <i class="fas fa-user-check"></i>
                                            <h3>Registration Complete</h3>
                                        </div>
                                        <div class="success-card-content">
                                            <p><strong>Employee ID:</strong> <span id="successStaffId"></span></p>
                                            <p><strong>Name:</strong> <span id="successStaffName"></span></p>
                                            <p><strong>Department:</strong> <span id="successStaffDept"></span></p>
                                            <p><strong>Position:</strong> <span id="successStaffPosition"></span></p>
                                            <p><strong>Status:</strong> <span id="successStaffStatus"></span></p>
                                        </div>
                                    </div>
                                    
                                    <div class="success-card" id="staffPortalSuccessCard" style="display:none;">
                                        <div class="success-card-header">
                                            <i class="fas fa-user-shield"></i>
                                            <h3>Portal Account Created</h3>
                                        </div>
                                        <div class="success-card-content">
                                            <p><strong>Portal Email:</strong> <span id="successStaffPortalEmail"></span></p>
                                            <p><strong>Portal Phone:</strong> <span id="successStaffPortalPhone"></span></p>
                                            <p><strong>Portal Department:</strong> <span id="successStaffPortalDept"></span></p>
                                            <div class="success-note">
                                                <i class="fas fa-info-circle"></i>
                                                <span>Portal credentials have been sent to the registered email.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="success-actions">
                                    <button class="wizard-btn-primary" onclick="closeAddStaffModal()">
                                        <i class="fas fa-check"></i> Done
                                    </button>
                                    <button class="wizard-btn-secondary" onclick="goToStaffStep(1); resetStaffForm();">
                                        <i class="fas fa-plus"></i> Add Another Staff
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar with Tips -->
                <div class="wizard-sidebar">
                    <div class="wizard-sidebar-content">
                        <h3 class="sidebar-title">Staff Registration</h3>
                        <ul class="sidebar-tips">
                            <li>Fill out all required fields marked with <span style="color:red;">*</span> to proceed</li>
                            <li>You can navigate between steps using the progress bar or navigation buttons</li>
                            <li>All information can be edited before final submission</li>
                            <li>Portal registration is optional but recommended for staff access</li>
                        </ul>
                        <div class="sidebar-help">
                            <i class="fas fa-info-circle"></i>
                            <span>Need help? Contact the admin support team</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 16px 32px; background: #f9fafb; display: flex; justify-content: space-between; align-items: center;">
                <button id="cancelStaff" class="wizard-btn-secondary" onclick="closeAddStaffModal()" style="display:none;">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <div style="display: flex; gap: 12px; margin-left: auto;">
                    <button id="staffWizardPrevBtn" class="wizard-btn-secondary" onclick="previousStaffStep()" style="display:none;">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button id="staffWizardNextBtn" class="wizard-btn-primary" onclick="nextStaffStep()" style="display:none;">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                    <button id="staffWizardSaveBtn" class="wizard-btn-primary" onclick="saveStaffData()" style="display:none;">
                        <i class="fas fa-save"></i> Save and Preview
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="simple-filters" style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
        <div class="simple-search" style="display: flex; align-items: center; gap: 8px; flex: 1; min-width: 300px; max-width: 400px;">
            <input type="text" placeholder="Search employee by name, ID, or department..." class="simple-input" style="flex: 1; min-width: 0;">
            <button class="simple-btn">Search</button>
        </div>
        <div class="filter-group">
            <label>Filter by Department:</label>
            <select class="filter-select">
                <option value="">All Departments</option>
                <option value="Administration">Administration</option>
                <option value="Maintenance">Maintenance</option>
                <option value="Food Service">Food Service</option>
                <option value="Security">Security</option>
                <option value="Library">Library</option>
                <option value="IT Support">IT Support</option>
                <option value="Health Services">Health Services</option>
                <option value="Transportation">Transportation</option>
                <option value="Counseling">Counseling</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Filter by Position:</label>
            <select class="filter-select">
                <option value="">All Positions</option>
                <option value="Secretary">Secretary</option>
                <option value="Accountant">Accountant</option>
                <option value="Technician">Technician</option>
                <option value="Cook">Cook</option>
                <option value="Security Guard">Security Guard</option>
                <option value="Librarian">Librarian</option>
                <option value="IT Technician">IT Technician</option>
                <option value="Nurse">Nurse</option>
                <option value="Bus Driver">Bus Driver</option>
                <option value="Counselor">Counselor</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>

    <style>
    /* Wizard Styles - Same as teacher wizard, using design system blue */
    .wizard-modal {
        display: flex;
        flex-direction: column;
        background: #fff;
    }

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

    .wizard-content-wrapper {
        display: flex;
        background: #fff;
    }

    .wizard-main-content {
        flex: 1;
        padding: 32px;
        background: #fff;
    }

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
    // Staff Wizard state
    let staffCurrentStep = 1;
    const staffTotalSteps = 7;

    // Staff modal functions
    function openAddStaffModal() {
        document.getElementById('addStaffModal').style.display = 'flex';
        staffCurrentStep = 1;
        resetStaffForm();
        goToStaffStep(1);
    }

    function closeAddStaffModal() {
        document.getElementById('addStaffModal').style.display = 'none';
        staffCurrentStep = 1;
        goToStaffStep(1);
    }

    // Staff Wizard navigation functions
    function goToStaffStep(step) {
        if (step < 1 || step > staffTotalSteps) return;
        
        staffCurrentStep = step;
        
        // Hide all steps
        for (let i = 1; i <= staffTotalSteps; i++) {
            const stepElement = document.getElementById(`staff-wizard-step-${i}`);
            if (stepElement) {
                stepElement.style.display = 'none';
            }
        }
        
        // Show current step
        const currentStepElement = document.getElementById(`staff-wizard-step-${staffCurrentStep}`);
        if (currentStepElement) {
            currentStepElement.style.display = 'block';
        }
        
        // Hide/show sidebar based on step
        const sidebar = document.querySelector('#addStaffModal .wizard-sidebar');
        if (sidebar) {
            if (staffCurrentStep === staffTotalSteps) {
                sidebar.style.display = 'none';
            } else {
                sidebar.style.display = 'block';
            }
        }
        
        // Hide progress bar on success page
        const progressBar = document.querySelector('#addStaffModal .wizard-progress-bar');
        if (progressBar) {
            if (staffCurrentStep === staffTotalSteps) {
                progressBar.style.display = 'none';
            } else {
                progressBar.style.display = 'block';
            }
        }
        
        // Update progress dots (only for steps 1-6)
        if (staffCurrentStep < staffTotalSteps) {
            updateStaffProgressDots();
        }
        
        // Update navigation buttons
        updateStaffNavigationButtons();
    }

    function nextStaffStep() {
        if (staffCurrentStep < staffTotalSteps) {
            goToStaffStep(staffCurrentStep + 1);
        }
    }

    function previousStaffStep() {
        if (staffCurrentStep > 1) {
            goToStaffStep(staffCurrentStep - 1);
        }
    }

    function updateStaffProgressDots() {
        const stepItems = document.querySelectorAll('#addStaffModal .wizard-step-item');
        stepItems.forEach((item, index) => {
            const stepNum = index + 1;
            item.classList.remove('active', 'completed');
            
            // Update step indicator content (only for steps 1-6)
            const indicator = item.querySelector('.step-indicator');
            if (indicator && stepNum <= 6) {
                if (stepNum === staffCurrentStep) {
                    item.classList.add('active');
                    indicator.innerHTML = '<i class="fas fa-pencil-alt"></i>';
                } else if (stepNum < staffCurrentStep) {
                    item.classList.add('completed');
                    indicator.innerHTML = '';
                } else {
                    indicator.textContent = stepNum;
                }
            }
        });
    }

    function updateStaffNavigationButtons() {
        const prevBtn = document.getElementById('staffWizardPrevBtn');
        const nextBtn = document.getElementById('staffWizardNextBtn');
        const saveBtn = document.getElementById('staffWizardSaveBtn');
        const cancelBtn = document.getElementById('cancelStaff');
        
        // Hide all buttons first
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
        saveBtn.style.display = 'none';
        cancelBtn.style.display = 'none';
        
        // Step 7 (Success page) - no navigation buttons
        if (staffCurrentStep === staffTotalSteps) {
            return;
        }
        
        // Show cancel button for all steps except success
        cancelBtn.style.display = 'inline-flex';
        
        // Show/hide Previous button
        if (staffCurrentStep > 1) {
            prevBtn.style.display = 'inline-flex';
        }
        
        // Show/hide Next and Save buttons
        if (staffCurrentStep === 6) {
            // Last form step - show Save button
            saveBtn.style.display = 'inline-flex';
        } else {
            // Other steps - show Next button
            nextBtn.style.display = 'inline-flex';
        }
    }

    function resetStaffForm() {
        // Reset all form fields
        const fields = [
            'ePhoto', 'eName', 'ePos', 'eDept', 'eEmployeeId', 'eHire', 
            'eSalary', 'ePhone', 'eAddress', 'eEmail', 'eGender', 
            'eEthnicity', 'eReligious', 'eNRC', 'eDOB', 'eEducation', 
            'eGreenCard', 'eFatherName', 'eFatherPhone', 
            'eMotherName', 'eMotherPhone', 'eEmergencyContact', 'eMaritalStatus', 
            'ePartnerName', 'ePartnerPhone', 'eInSchoolRelativeName', 
            'eInSchoolRelativeRelationship', 'eHeight', 'eMedicineAllergy', 
            'eFoodAllergy', 'eMedicalDirectory', 'ePortalEmail', 'ePortalPassword', 
            'ePortalPhone', 'ePortalDepartment', 'eStatus'
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
        const statusField = document.getElementById('eStatus');
        if (statusField) {
            statusField.value = 'Active';
        }
    }

    // Make functions globally available
    window.openAddStaffModal = openAddStaffModal;
    window.closeAddStaffModal = closeAddStaffModal;
    window.goToStaffStep = goToStaffStep;
    window.nextStaffStep = nextStaffStep;
    window.previousStaffStep = previousStaffStep;
    window.resetStaffForm = resetStaffForm;

    // Staff create form interactions
    document.addEventListener('DOMContentLoaded', function(){
        const openBtn=document.getElementById('openStaffModal');
        const tableBody=document.querySelector('.simple-table-container table tbody');
        const staffEmailInput = document.getElementById('eEmail');
        const staffPhoneInput = document.getElementById('ePhone');
        const portalEmailInput = document.getElementById('ePortalEmail');
        const portalPhoneInput = document.getElementById('ePortalPhone');

        if (openBtn) openBtn.addEventListener('click', function(e){ e.preventDefault(); openAddStaffModal(); });
        
        // Auto-fill portal email from staff email if portal email is empty
        if(staffEmailInput && portalEmailInput) {
            staffEmailInput.addEventListener('blur', function() {
                if(!portalEmailInput.value && this.value) {
                    portalEmailInput.value = this.value;
                }
            });
        }
        
        // Auto-fill portal phone from staff phone if portal phone is empty
        if(staffPhoneInput && portalPhoneInput) {
            staffPhoneInput.addEventListener('blur', function() {
                if(!portalPhoneInput.value && this.value) {
                    portalPhoneInput.value = this.value;
                }
            });
        }

        function prependRow(x){
            const tr=document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${x.id}</strong></td>
                <td>${x.name}</td>
                <td>${x.dept}</td>
                <td>${x.pos}</td>
                <td>${x.phone||''}</td>
                <td>${x.email||''}</td>
                <td>${x.hire||''}</td>
                <td>${x.salary||''}</td>
                <td><span class="status-badge ${(x.status||'Active').toLowerCase() === 'active' ? 'paid' : (x.status||'Active').toLowerCase() === 'on leave' ? 'pending' : 'draft'}">${x.status||'Active'}</span></td>
                <td><button class="view-btn">View Details</button></td>`;
            tableBody.prepend(tr);
        }

        // Save staff data function (called from wizard)
        window.saveStaffData = function() {
            const name=(document.getElementById('eName').value||'').trim();
            if(!name){ alert('Please enter full name'); return; }
            
            // Validate portal registration fields
            const portalEmail = (document.getElementById('ePortalEmail').value||'').trim();
            const portalPassword = document.getElementById('ePortalPassword').value;
            const portalPhone = (document.getElementById('ePortalPhone').value||'').trim();
            const portalDepartment = document.getElementById('ePortalDepartment').value;
            const createPortal = portalEmail && portalPassword;
            
            if(createPortal) {
                if(!portalEmail.includes('@')) {
                    alert('Please enter a valid portal email address');
                    return;
                }
            }
            
            // Get photo file if selected
            const photoInput = document.getElementById('ePhoto');
            const photoFile = photoInput && photoInput.files.length > 0 ? photoInput.files[0].name : '';
            
            const employeeId = 'E'+Date.now();
            const obj={
                id: employeeId,
                // Basic Information
                photo: photoFile,
                name,
                pos:(document.getElementById('ePos').value||'').trim(),
                dept:(document.getElementById('eDept').value||'').trim(),
                employeeId: (document.getElementById('eEmployeeId').value||'').trim(),
                hire:document.getElementById('eHire').value||'',
                salary:(document.getElementById('eSalary').value||'').trim(),
                phone:(document.getElementById('ePhone').value||'').trim(),
                address: (document.getElementById('eAddress').value||'').trim(),
                email:(document.getElementById('eEmail').value||'').trim(),
                gender: document.getElementById('eGender') ? document.getElementById('eGender').value : '',
                ethnicity: (document.getElementById('eEthnicity').value||'').trim(),
                religious: (document.getElementById('eReligious').value||'').trim(),
                nrc: (document.getElementById('eNRC').value||'').trim(),
                dob: document.getElementById('eDOB').value||'',
                education: (document.getElementById('eEducation').value||'').trim(),
                greenCard: (document.getElementById('eGreenCard').value||'').trim(),
                // Family Information
                fatherName: (document.getElementById('eFatherName').value||'').trim(),
                fatherPhone: (document.getElementById('eFatherPhone').value||'').trim(),
                motherName: (document.getElementById('eMotherName').value||'').trim(),
                motherPhone: (document.getElementById('eMotherPhone').value||'').trim(),
                emergencyContact: (document.getElementById('eEmergencyContact').value||'').trim(),
                // Marital Status
                maritalStatus: document.getElementById('eMaritalStatus') ? document.getElementById('eMaritalStatus').value : '',
                partnerName: (document.getElementById('ePartnerName').value||'').trim(),
                partnerPhone: (document.getElementById('ePartnerPhone').value||'').trim(),
                // In-School Relative
                inSchoolRelativeName: (document.getElementById('eInSchoolRelativeName').value||'').trim(),
                inSchoolRelativeRelationship: (document.getElementById('eInSchoolRelativeRelationship').value||'').trim(),
                // Physical & Medical
                height: (document.getElementById('eHeight').value||'').trim(),
                medicineAllergy: (document.getElementById('eMedicineAllergy').value||'').trim(),
                foodAllergy: (document.getElementById('eFoodAllergy').value||'').trim(),
                medicalDirectory: (document.getElementById('eMedicalDirectory').value||'').trim(),
                // Status & Portal
                status:document.getElementById('eStatus').value||'Active',
                portalAccount: createPortal,
                portalEmail: createPortal ? portalEmail : '',
                portalPhone: createPortal ? portalPhone : '',
                portalDepartment: createPortal ? portalDepartment : ''
            };
            let list=[]; try{ list=JSON.parse(localStorage.getItem('staff')||'[]'); }catch(e){ list=[]; }
            list.unshift(obj); localStorage.setItem('staff', JSON.stringify(list));
            prependRow(obj);
            
            // Populate success page
            document.getElementById('successStaffId').textContent = employeeId;
            document.getElementById('successStaffName').textContent = name;
            document.getElementById('successStaffDept').textContent = obj.dept || 'N/A';
            document.getElementById('successStaffPosition').textContent = obj.pos || 'N/A';
            document.getElementById('successStaffStatus').textContent = obj.status;
            
            // Show portal success card if portal was created
            if(createPortal) {
                document.getElementById('staffPortalSuccessCard').style.display = 'block';
                document.getElementById('successStaffPortalEmail').textContent = portalEmail;
                document.getElementById('successStaffPortalPhone').textContent = portalPhone || 'N/A';
                document.getElementById('successStaffPortalDept').textContent = portalDepartment || 'N/A';
            } else {
                document.getElementById('staffPortalSuccessCard').style.display = 'none';
            }
            
            // Navigate to success page
            goToStaffStep(7);
        };
    });
    </script>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>E001</strong></td>
                    <td>John Miller</td>
                    <td>Administration</td>
                    <td>Secretary</td>
                    <td>+1-555-2001</td>
                    <td>john.miller@school.edu</td>
                    <td>2020-03-15</td>
                    <td>$3,200</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E001">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E002</strong></td>
                    <td>Maria Santos</td>
                    <td>Administration</td>
                    <td>Accountant</td>
                    <td>+1-555-2002</td>
                    <td>maria.santos@school.edu</td>
                    <td>2019-07-22</td>
                    <td>$4,500</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E002">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E003</strong></td>
                    <td>Peter Johnson</td>
                    <td>Maintenance</td>
                    <td>Technician</td>
                    <td>+1-555-2003</td>
                    <td>peter.johnson@school.edu</td>
                    <td>2021-01-10</td>
                    <td>$2,800</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E003">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E004</strong></td>
                    <td>Anna Williams</td>
                    <td>Food Service</td>
                    <td>Cook</td>
                    <td>+1-555-2004</td>
                    <td>anna.williams@school.edu</td>
                    <td>2020-09-05</td>
                    <td>$2,500</td>
                    <td><span class="status-badge pending">On Leave</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E004">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E005</strong></td>
                    <td>Carlos Rodriguez</td>
                    <td>Security</td>
                    <td>Security Guard</td>
                    <td>+1-555-2005</td>
                    <td>carlos.rodriguez@school.edu</td>
                    <td>2018-11-20</td>
                    <td>$2,700</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E005">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E006</strong></td>
                    <td>Susan Davis</td>
                    <td>Library</td>
                    <td>Librarian</td>
                    <td>+1-555-2006</td>
                    <td>susan.davis@school.edu</td>
                    <td>2019-04-12</td>
                    <td>$3,800</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E006">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E007</strong></td>
                    <td>Ahmed Hassan</td>
                    <td>IT Support</td>
                    <td>IT Technician</td>
                    <td>+1-555-2007</td>
                    <td>ahmed.hassan@school.edu</td>
                    <td>2020-12-01</td>
                    <td>$4,200</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E007">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E008</strong></td>
                    <td>Linda Thompson</td>
                    <td>Health Services</td>
                    <td>Nurse</td>
                    <td>+1-555-2008</td>
                    <td>linda.thompson@school.edu</td>
                    <td>2018-08-15</td>
                    <td>$4,000</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E008">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E009</strong></td>
                    <td>Robert Wilson</td>
                    <td>Transportation</td>
                    <td>Bus Driver</td>
                    <td>+1-555-2009</td>
                    <td>robert.wilson@school.edu</td>
                    <td>2019-10-08</td>
                    <td>$3,000</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E009">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>E010</strong></td>
                    <td>Jennifer Martinez</td>
                    <td>Counseling</td>
                    <td>Counselor</td>
                    <td>+1-555-2010</td>
                    <td>jennifer.martinez@school.edu</td>
                    <td>2021-03-18</td>
                    <td>$4,800</td>
                    <td><span class="status-badge paid">Active</span></td>
                    <td><a class="view-btn" href="/admin/staff-profile/E010">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>