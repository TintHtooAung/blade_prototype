<?php
$pageTitle = 'Smart Campus Nova Hub - Academic Setup';
$pageIcon = 'fas fa-magic';
$pageHeading = 'Academic Setup';
$activePage = 'academic-setup';

ob_start();
?>
<!-- Welcome Header for First-Time Setup -->
<div class="setup-welcome-header" style="background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%); border-radius: 12px; padding: 32px; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 12px rgba(74, 144, 226, 0.2);">
    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="width: 64px; height: 64px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px;">
            <i class="fas fa-magic"></i>
        </div>
        <div style="flex: 1;">
            <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color: #fff;">Welcome to Academic Setup</h2>
            <p style="margin: 0; font-size: 16px; color: rgba(255, 255, 255, 0.9);">Let's set up your academic structure step by step. This wizard will guide you through creating batches, grades, classes, rooms, and subjects.</p>
        </div>
    </div>
</div>

<!-- Academic Setup Wizard -->
<div class="wizard-container" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid #e5e7eb;">
    <!-- Wizard Progress Bar -->
    <div class="wizard-progress-bar">
        <div class="wizard-steps-container">
            <div class="wizard-step-item active" data-step="1" onclick="goToSetupStep(1)">
                <div class="step-indicator">
                    <i class="fas fa-pencil-alt"></i>
                </div>
                <span class="step-label">Batch</span>
            </div>
            <div class="wizard-step-item" data-step="2" onclick="goToSetupStep(2)">
                <div class="step-indicator">2</div>
                <span class="step-label">Grades</span>
            </div>
            <div class="wizard-step-item" data-step="3" onclick="goToSetupStep(3)">
                <div class="step-indicator">3</div>
                <span class="step-label">Classes</span>
            </div>
            <div class="wizard-step-item" data-step="4" onclick="goToSetupStep(4)">
                <div class="step-indicator">4</div>
                <span class="step-label">Rooms</span>
            </div>
            <div class="wizard-step-item" data-step="5" onclick="goToSetupStep(5)">
                <div class="step-indicator">5</div>
                <span class="step-label">Subjects</span>
            </div>
        </div>
    </div>

    <div class="wizard-content-wrapper" style="display: flex; min-height: 600px;">
        <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
            <div style="margin-bottom: 24px;">
                <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Academic Setup Wizard</h2>
                <p style="margin: 8px 0 0 0; color: #6b7280; font-size: 14px;">Let's set up your academic structure step by step</p>
            </div>
            <div class="form-section" style="padding:0;">
                <!-- Step 1: Batch Setup -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-calendar-alt" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Create Academic Batch</h4>
                        </div>
                        <button type="button" class="add-item-btn" onclick="toggleAddForm('addBatchForm')">
                            <i class="fas fa-plus"></i> Add Batch
                        </button>
                    </div>
                    
                    <!-- Add Batch Form -->
                    <div id="addBatchForm" class="add-item-form" style="display:none; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                        <h5 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">Add New Batch</h5>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addBatchName">Batch Name <span style="color:red;">*</span></label>
                                <input type="text" id="addBatchName" class="form-input" placeholder="e.g., 2025-2026">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addBatchStart">Start Date <span style="color:red;">*</span></label>
                                <input type="date" id="addBatchStart" class="form-input">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addBatchEnd">End Date <span style="color:red;">*</span></label>
                                <input type="date" id="addBatchEnd" class="form-input">
                            </div>
                        </div>
                        <div style="display: flex; gap: 8px; margin-top: 12px;">
                            <button type="button" class="form-btn-primary" onclick="addBatchItem()">
                                <i class="fas fa-check"></i> Add Batch
                            </button>
                            <button type="button" class="form-btn-secondary" onclick="toggleAddForm('addBatchForm')">
                                Cancel
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="setupBatchName">Batch Name <span style="color:red;">*</span></label>
                            <input type="text" id="setupBatchName" class="form-input" placeholder="e.g., 2024-2025" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupBatchStart">Start Date <span style="color:red;">*</span></label>
                            <input type="date" id="setupBatchStart" class="form-input" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupBatchEnd">End Date <span style="color:red;">*</span></label>
                            <input type="date" id="setupBatchEnd" class="form-input" required>
                        </div>
                    </div>
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            An academic batch represents a school year. This will be the active batch for all academic activities.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Grades Setup -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-layer-group" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Grades</h4>
                        </div>
                        <button type="button" class="add-item-btn" onclick="toggleAddForm('addGradeForm')">
                            <i class="fas fa-plus"></i> Add Grade
                        </button>
                    </div>
                    
                    <!-- Add Grade Form -->
                    <div id="addGradeForm" class="add-item-form" style="display:none; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                        <h5 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">Add New Grade</h5>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addGradeLevel">Grade Level <span style="color:red;">*</span></label>
                                <input type="number" id="addGradeLevel" class="form-input" placeholder="e.g., 13" min="1">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addGradeName">Grade Name</label>
                                <input type="text" id="addGradeName" class="form-input" placeholder="e.g., Grade 13">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addGradeCategory">Category</label>
                                <select id="addGradeCategory" class="form-select">
                                    <option value="Primary">Primary</option>
                                    <option value="Middle">Middle</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex; gap: 8px; margin-top: 12px;">
                            <button type="button" class="form-btn-primary" onclick="addGradeItem()">
                                <i class="fas fa-check"></i> Add Grade
                            </button>
                            <button type="button" class="form-btn-secondary" onclick="toggleAddForm('addGradeForm')">
                                Cancel
                            </button>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Grades to Create</label>
                        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="1" checked>
                                <span>Grade 1</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="2" checked>
                                <span>Grade 2</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="3" checked>
                                <span>Grade 3</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="4" checked>
                                <span>Grade 4</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="5" checked>
                                <span>Grade 5</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="6" checked>
                                <span>Grade 6</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="7" checked>
                                <span>Grade 7</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="8" checked>
                                <span>Grade 8</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="9" checked>
                                <span>Grade 9</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="10" checked>
                                <span>Grade 10</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="11" checked>
                                <span>Grade 11</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="grade-checkbox" value="12" checked>
                                <span>Grade 12</span>
                            </label>
                        </div>
                    </div>
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Select all grades that your school offers. You can add or remove grades later.
                        </p>
                    </div>
                </div>

                <!-- Step 3: Classes Setup -->
                <div class="wizard-step" id="setup-step-3" style="display:none;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-chalkboard" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Classes</h4>
                        </div>
                        <button type="button" class="add-item-btn" onclick="toggleAddForm('addClassForm')">
                            <i class="fas fa-plus"></i> Add Class
                        </button>
                    </div>
                    
                    <!-- Add Class Form -->
                    <div id="addClassForm" class="add-item-form" style="display:none; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                        <h5 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">Add New Class</h5>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addClassName">Class Name <span style="color:red;">*</span></label>
                                <input type="text" id="addClassName" class="form-input" placeholder="e.g., 10-A">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addClassGrade">Grade</label>
                                <input type="text" id="addClassGrade" class="form-input" placeholder="e.g., Grade 10">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addClassRoom">Room</label>
                                <input type="text" id="addClassRoom" class="form-input" placeholder="e.g., Room 201">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addClassTeacher">Class Teacher</label>
                                <input type="text" id="addClassTeacher" class="form-input" placeholder="e.g., Ms. Smith">
                            </div>
                        </div>
                        <div style="display: flex; gap: 8px; margin-top: 12px;">
                            <button type="button" class="form-btn-primary" onclick="addClassItem()">
                                <i class="fas fa-check"></i> Add Class
                            </button>
                            <button type="button" class="form-btn-secondary" onclick="toggleAddForm('addClassForm')">
                                Cancel
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="setupClassesPerGrade">Classes per Grade <span style="color:red;">*</span></label>
                            <select id="setupClassesPerGrade" class="form-select" required>
                                <option value="1">1 Class</option>
                                <option value="2">2 Classes</option>
                                <option value="3" selected>3 Classes</option>
                                <option value="4">4 Classes</option>
                                <option value="5">5 Classes</option>
                                <option value="6">6 Classes</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupClassNaming">Class Naming</label>
                            <select id="setupClassNaming" class="form-select">
                                <option value="A,B,C">A, B, C (Alphabetic)</option>
                                <option value="1,2,3" selected>1, 2, 3 (Numeric)</option>
                                <option value="Alpha,Beta,Gamma">Alpha, Beta, Gamma</option>
                            </select>
                        </div>
                    </div>
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Classes will be automatically created for each selected grade. You can customize class names later.
                        </p>
                    </div>
                </div>

                <!-- Step 4: Rooms Setup -->
                <div class="wizard-step" id="setup-step-4" style="display:none;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-door-open" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Rooms</h4>
                        </div>
                        <button type="button" class="add-item-btn" onclick="toggleAddForm('addRoomForm')">
                            <i class="fas fa-plus"></i> Add Room
                        </button>
                    </div>
                    
                    <!-- Add Room Form -->
                    <div id="addRoomForm" class="add-item-form" style="display:none; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                        <h5 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">Add New Room</h5>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addRoomNumber">Room Number <span style="color:red;">*</span></label>
                                <input type="text" id="addRoomNumber" class="form-input" placeholder="e.g., 201">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addRoomName">Room Name</label>
                                <input type="text" id="addRoomName" class="form-input" placeholder="e.g., Classroom A">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addRoomFloor">Floor</label>
                                <input type="text" id="addRoomFloor" class="form-input" placeholder="e.g., 2nd Floor">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addRoomCapacity">Seating Capacity</label>
                                <input type="number" id="addRoomCapacity" class="form-input" placeholder="e.g., 35" min="1">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addRoomStatus">Status</label>
                                <select id="addRoomStatus" class="form-select">
                                    <option value="Available">Available</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex; gap: 8px; margin-top: 12px;">
                            <button type="button" class="form-btn-primary" onclick="addRoomItem()">
                                <i class="fas fa-check"></i> Add Room
                            </button>
                            <button type="button" class="form-btn-secondary" onclick="toggleAddForm('addRoomForm')">
                                Cancel
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="setupTotalRooms">Total Rooms <span style="color:red;">*</span></label>
                            <input type="number" id="setupTotalRooms" class="form-input" placeholder="e.g., 20" value="20" min="1" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupRoomStart">Starting Room Number</label>
                            <input type="text" id="setupRoomStart" class="form-input" placeholder="e.g., 101" value="101">
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupRoomCapacity">Default Capacity</label>
                            <input type="number" id="setupRoomCapacity" class="form-input" placeholder="e.g., 30" value="30" min="1">
                        </div>
                    </div>
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Rooms will be numbered sequentially starting from the starting room number.
                        </p>
                    </div>
                </div>

                <!-- Step 5: Subjects Setup -->
                <div class="wizard-step" id="setup-step-5" style="display:none;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-book" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Core Subjects</h4>
                        </div>
                        <button type="button" class="add-item-btn" onclick="toggleAddForm('addSubjectForm')">
                            <i class="fas fa-plus"></i> Add Subject
                        </button>
                    </div>
                    
                    <!-- Add Subject Form -->
                    <div id="addSubjectForm" class="add-item-form" style="display:none; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                        <h5 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #374151;">Add New Subject</h5>
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label for="addSubjectCode">Subject Code <span style="color:red;">*</span></label>
                                <input type="text" id="addSubjectCode" class="form-input" placeholder="e.g., CHEM">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addSubjectName">Subject Name <span style="color:red;">*</span></label>
                                <input type="text" id="addSubjectName" class="form-input" placeholder="e.g., Chemistry">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label for="addSubjectCategory">Category</label>
                                <select id="addSubjectCategory" class="form-select">
                                    <option value="Core">Core</option>
                                    <option value="Elective">Elective</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex; gap: 8px; margin-top: 12px;">
                            <button type="button" class="form-btn-primary" onclick="addSubjectItem()">
                                <i class="fas fa-check"></i> Add Subject
                            </button>
                            <button type="button" class="form-btn-secondary" onclick="toggleAddForm('addSubjectForm')">
                                Cancel
                            </button>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Core Subjects</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="Mathematics" data-code="MATH" checked>
                                <span>Mathematics</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="English" data-code="ENG" checked>
                                <span>English</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="Science" data-code="SCI" checked>
                                <span>Science</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="History" data-code="HIS" checked>
                                <span>History</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="Geography" data-code="GEO" checked>
                                <span>Geography</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="Art" data-code="ART" checked>
                                <span>Art</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="Physical Education" data-code="PE" checked>
                                <span>Physical Education</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="subject-checkbox" value="Music" data-code="MUS" checked>
                                <span>Music</span>
                            </label>
                        </div>
                    </div>
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            These subjects will be created for all grades. You can add more subjects later.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar with Tips -->
        <div class="wizard-sidebar">
            <div class="wizard-sidebar-content">
                <h3 class="sidebar-title">Setup Guide</h3>
                <ul class="sidebar-tips">
                    <li>Complete each step to build your academic structure</li>
                    <li>You can skip steps and complete them later</li>
                    <li>All data can be edited after setup</li>
                    <li>Return to this page anytime to reset</li>
                </ul>
                <div class="sidebar-help">
                    <i class="fas fa-info-circle"></i>
                    <span>Need help? Contact the admin support team</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 20px 32px; background: #f9fafb; display: flex; justify-content: space-between; align-items: center; border-radius: 0 0 12px 12px;">
        <a href="/admin/dashboard" class="wizard-btn-secondary" style="text-decoration: none;">
            <i class="fas fa-home"></i> Skip for Now
        </a>
        <div style="display: flex; gap: 12px; margin-left: auto;">
            <button id="setupBackBtn" class="wizard-btn-secondary" onclick="goToPreviousSetupStep()" style="display:none;">
                <i class="fas fa-arrow-left"></i> Previous
            </button>
            <button id="setupNextBtn" class="wizard-btn-primary" onclick="handleNextSetupStep()">
                Next <i class="fas fa-arrow-right"></i>
            </button>
            <button id="setupCompleteBtn" class="wizard-btn-primary" onclick="completeSetup()" style="display:none;">
                <i class="fas fa-check"></i> Complete Setup
            </button>
        </div>
    </div>
</div>

<script>
let currentSetupStep = 1;
const totalSetupSteps = 5;

// Storage for added items
let addedBatches = [];
let addedGrades = [];
let addedClasses = [];
let addedRooms = [];
let addedSubjects = [];

// Toggle add form visibility
function toggleAddForm(formId) {
    const form = document.getElementById(formId);
    if (form) {
        const isVisible = form.style.display !== 'none';
        form.style.display = isVisible ? 'none' : 'block';
        
        // Clear form when hiding
        if (isVisible) {
            clearAddForm(formId);
        }
    }
}

// Clear add form fields
function clearAddForm(formId) {
    if (formId === 'addBatchForm') {
        document.getElementById('addBatchName').value = '';
        document.getElementById('addBatchStart').value = '';
        document.getElementById('addBatchEnd').value = '';
    } else if (formId === 'addGradeForm') {
        document.getElementById('addGradeLevel').value = '';
        document.getElementById('addGradeName').value = '';
        document.getElementById('addGradeCategory').value = 'Primary';
    } else if (formId === 'addClassForm') {
        document.getElementById('addClassName').value = '';
        document.getElementById('addClassGrade').value = '';
        document.getElementById('addClassRoom').value = '';
        document.getElementById('addClassTeacher').value = '';
    } else if (formId === 'addRoomForm') {
        document.getElementById('addRoomNumber').value = '';
        document.getElementById('addRoomName').value = '';
        document.getElementById('addRoomFloor').value = '';
        document.getElementById('addRoomCapacity').value = '';
        document.getElementById('addRoomStatus').value = 'Available';
    } else if (formId === 'addSubjectForm') {
        document.getElementById('addSubjectCode').value = '';
        document.getElementById('addSubjectName').value = '';
        document.getElementById('addSubjectCategory').value = 'Core';
    }
}

// Add Batch Item
function addBatchItem() {
    const name = document.getElementById('addBatchName').value.trim();
    const start = document.getElementById('addBatchStart').value;
    const end = document.getElementById('addBatchEnd').value;
    
    if (!name || !start || !end) {
        alert('Please fill in all required fields');
        return;
    }
    
    // Validate dates
    if (new Date(start) >= new Date(end)) {
        alert('End date must be after start date');
        return;
    }
    
    const batch = {
        id: 'BATCH' + Date.now(),
        name: name,
        start: start,
        end: end
    };
    
    addedBatches.push(batch);
    
    // Update main batch form if empty
    if (!document.getElementById('setupBatchName').value) {
        document.getElementById('setupBatchName').value = name;
        document.getElementById('setupBatchStart').value = start;
        document.getElementById('setupBatchEnd').value = end;
    }
    
    // Save to localStorage
    saveAddedItems();
    
    // Show success message
    showItemAddedNotification('Batch added successfully!');
    
    // Clear and hide form
    clearAddForm('addBatchForm');
    toggleAddForm('addBatchForm');
}

// Add Grade Item
function addGradeItem() {
    const level = document.getElementById('addGradeLevel').value.trim();
    const name = document.getElementById('addGradeName').value.trim();
    const category = document.getElementById('addGradeCategory').value;
    
    if (!level) {
        alert('Please enter grade level');
        return;
    }
    
    const gradeLevel = parseInt(level);
    if (isNaN(gradeLevel) || gradeLevel < 1) {
        alert('Please enter a valid grade level');
        return;
    }
    
    const gradeName = name || `Grade ${level}`;
    
    const grade = {
        id: 'GRADE' + Date.now(),
        level: gradeLevel,
        name: gradeName,
        category: category
    };
    
    addedGrades.push(grade);
    
    // Check if grade checkbox exists, if not create one
    const existingCheckbox = document.querySelector(`.grade-checkbox[value="${gradeLevel}"]`);
    if (existingCheckbox) {
        existingCheckbox.checked = true;
    } else {
        // Add new checkbox to the grades grid
        addGradeCheckbox(gradeLevel, gradeName);
    }
    
    // Save to localStorage
    saveAddedItems();
    
    // Show success message
    showItemAddedNotification('Grade added successfully!');
    
    // Clear and hide form
    clearAddForm('addGradeForm');
    toggleAddForm('addGradeForm');
}

// Add Grade Checkbox dynamically
function addGradeCheckbox(level, name) {
    const gradesContainer = document.querySelector('#setup-step-2 .form-row').nextElementSibling;
    if (gradesContainer) {
        const label = document.createElement('label');
        label.style.cssText = 'display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;';
        
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'grade-checkbox';
        checkbox.value = level;
        checkbox.checked = true;
        
        const span = document.createElement('span');
        span.textContent = name;
        
        label.appendChild(checkbox);
        label.appendChild(span);
        
        const grid = gradesContainer.querySelector('div[style*="grid-template-columns"]');
        if (grid) {
            grid.appendChild(label);
        }
    }
}

// Add Class Item
function addClassItem() {
    const name = document.getElementById('addClassName').value.trim();
    const grade = document.getElementById('addClassGrade').value.trim();
    const room = document.getElementById('addClassRoom').value.trim();
    const teacher = document.getElementById('addClassTeacher').value.trim();
    
    if (!name) {
        alert('Please enter class name');
        return;
    }
    
    const classItem = {
        id: 'CLASS' + Date.now(),
        name: name,
        grade: grade || '',
        room: room || '',
        teacher: teacher || ''
    };
    
    addedClasses.push(classItem);
    
    // Save to localStorage
    saveAddedItems();
    
    // Show success message
    showItemAddedNotification('Class added successfully!');
    
    // Clear and hide form
    clearAddForm('addClassForm');
    toggleAddForm('addClassForm');
}

// Add Room Item
function addRoomItem() {
    const number = document.getElementById('addRoomNumber').value.trim();
    const name = document.getElementById('addRoomName').value.trim();
    const floor = document.getElementById('addRoomFloor').value.trim();
    const capacity = document.getElementById('addRoomCapacity').value;
    const status = document.getElementById('addRoomStatus').value;
    
    if (!number) {
        alert('Please enter room number');
        return;
    }
    
    const room = {
        id: 'ROOM' + Date.now(),
        number: number,
        name: name || number,
        floor: floor || '',
        capacity: capacity ? parseInt(capacity) : 30,
        status: status
    };
    
    addedRooms.push(room);
    
    // Update total rooms count if needed
    const totalRoomsInput = document.getElementById('setupTotalRooms');
    if (totalRoomsInput) {
        const currentTotal = parseInt(totalRoomsInput.value) || 0;
        totalRoomsInput.value = currentTotal + 1;
    }
    
    // Save to localStorage
    saveAddedItems();
    
    // Show success message
    showItemAddedNotification('Room added successfully!');
    
    // Clear and hide form
    clearAddForm('addRoomForm');
    toggleAddForm('addRoomForm');
}

// Add Subject Item
function addSubjectItem() {
    const code = document.getElementById('addSubjectCode').value.trim();
    const name = document.getElementById('addSubjectName').value.trim();
    const category = document.getElementById('addSubjectCategory').value;
    
    if (!code || !name) {
        alert('Please fill in all required fields');
        return;
    }
    
    const subject = {
        id: 'SUBJECT' + Date.now(),
        code: code,
        name: name,
        category: category
    };
    
    addedSubjects.push(subject);
    
    // Add new checkbox to the subjects grid
    addSubjectCheckbox(name, code);
    
    // Save to localStorage
    saveAddedItems();
    
    // Show success message
    showItemAddedNotification('Subject added successfully!');
    
    // Clear and hide form
    clearAddForm('addSubjectForm');
    toggleAddForm('addSubjectForm');
}

// Add Subject Checkbox dynamically
function addSubjectCheckbox(name, code) {
    const subjectsContainer = document.querySelector('#setup-step-5 .form-row').nextElementSibling;
    if (subjectsContainer) {
        const label = document.createElement('label');
        label.style.cssText = 'display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;';
        
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'subject-checkbox';
        checkbox.value = name;
        checkbox.setAttribute('data-code', code);
        checkbox.checked = true;
        
        const span = document.createElement('span');
        span.textContent = name;
        
        label.appendChild(checkbox);
        label.appendChild(span);
        
        const grid = subjectsContainer.querySelector('div[style*="grid-template-columns"]');
        if (grid) {
            grid.appendChild(label);
        }
    }
}

// Save added items to localStorage
function saveAddedItems() {
    try {
        const addedItems = {
            batches: addedBatches,
            grades: addedGrades,
            classes: addedClasses,
            rooms: addedRooms,
            subjects: addedSubjects
        };
        localStorage.setItem('academicSetupAddedItems', JSON.stringify(addedItems));
    } catch (e) {
        console.error('Error saving added items:', e);
    }
}

// Load added items from localStorage
function loadAddedItems() {
    try {
        const addedItemsStr = localStorage.getItem('academicSetupAddedItems');
        if (addedItemsStr) {
            const addedItems = JSON.parse(addedItemsStr);
            addedBatches = addedItems.batches || [];
            addedGrades = addedItems.grades || [];
            addedClasses = addedItems.classes || [];
            addedRooms = addedItems.rooms || [];
            addedSubjects = addedItems.subjects || [];
        }
    } catch (e) {
        console.error('Error loading added items:', e);
    }
}

// Show item added notification
function showItemAddedNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = 'position: fixed; top: 20px; right: 20px; background: #10b981; color: #fff; padding: 12px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); z-index: 10000; animation: slideInRight 0.3s ease-out;';
    notification.innerHTML = `<i class="fas fa-check-circle" style="margin-right: 8px;"></i>${message}`;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease-out';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Load existing setup data from localStorage
function loadExistingSetupData() {
    try {
        const setupDataStr = localStorage.getItem('academicSetup');
        if (!setupDataStr) {
            return false; // No existing data
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Load batch data
        if (setupData.batch) {
            if (setupData.batch.name) {
                document.getElementById('setupBatchName').value = setupData.batch.name;
            }
            if (setupData.batch.start) {
                document.getElementById('setupBatchStart').value = setupData.batch.start;
            }
            if (setupData.batch.end) {
                document.getElementById('setupBatchEnd').value = setupData.batch.end;
            }
        }
        
        // Load grades data
        if (setupData.grades && Array.isArray(setupData.grades)) {
            // Uncheck all grade checkboxes first
            document.querySelectorAll('.grade-checkbox').forEach(cb => {
                cb.checked = false;
            });
            // Check the saved grades
            setupData.grades.forEach(grade => {
                const checkbox = document.querySelector(`.grade-checkbox[value="${grade}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
        
        // Load classes data
        if (setupData.classes) {
            if (setupData.classes.perGrade) {
                document.getElementById('setupClassesPerGrade').value = setupData.classes.perGrade;
            }
            if (setupData.classes.naming) {
                let namingValue;
                if (Array.isArray(setupData.classes.naming)) {
                    namingValue = setupData.classes.naming.join(',');
                } else {
                    namingValue = setupData.classes.naming;
                }
                // Check if the value exists in the select options
                const select = document.getElementById('setupClassNaming');
                const optionExists = Array.from(select.options).some(opt => opt.value === namingValue);
                if (optionExists) {
                    select.value = namingValue;
                }
            }
        }
        
        // Load rooms data
        if (setupData.rooms) {
            if (setupData.rooms.total) {
                document.getElementById('setupTotalRooms').value = setupData.rooms.total;
            }
            if (setupData.rooms.start) {
                document.getElementById('setupRoomStart').value = setupData.rooms.start;
            }
            if (setupData.rooms.capacity) {
                document.getElementById('setupRoomCapacity').value = setupData.rooms.capacity;
            }
        }
        
        // Load subjects data
        if (setupData.subjects && Array.isArray(setupData.subjects)) {
            // Uncheck all subject checkboxes first
            document.querySelectorAll('.subject-checkbox').forEach(cb => {
                cb.checked = false;
            });
            // Check the saved subjects
            setupData.subjects.forEach(subject => {
                const checkbox = document.querySelector(`.subject-checkbox[value="${subject.name}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
        
        return true; // Data loaded successfully
    } catch (e) {
        console.error('Error loading existing setup data:', e);
        return false;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Load added items
    loadAddedItems();
    
    // Try to load existing setup data first
    const hasExistingData = loadExistingSetupData();
    
    // If no existing data, set default values
    if (!hasExistingData) {
        // Set default dates for batch
        const today = new Date();
        const currentYear = today.getFullYear();
        const nextYear = currentYear + 1;
        
        // Set default batch name
        const batchNameInput = document.getElementById('setupBatchName');
        if (batchNameInput && !batchNameInput.value) {
            batchNameInput.value = `${currentYear}-${nextYear}`;
        }
        
        // Set default start date (current date)
        const batchStartInput = document.getElementById('setupBatchStart');
        if (batchStartInput && !batchStartInput.value) {
            batchStartInput.value = today.toISOString().split('T')[0];
        }
        
        // Set default end date (one year from now)
        const batchEndInput = document.getElementById('setupBatchEnd');
        if (batchEndInput && !batchEndInput.value) {
            const endDate = new Date(today);
            endDate.setFullYear(currentYear + 1);
            batchEndInput.value = endDate.toISOString().split('T')[0];
        }
    }
    
    goToSetupStep(1);
    
    // Add event listeners to auto-save data when form fields change
    // Batch fields
    const batchFields = ['setupBatchName', 'setupBatchStart', 'setupBatchEnd'];
    batchFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('change', () => {
                if (currentSetupStep === 1) {
                    saveCurrentStepData();
                }
            });
        }
    });
    
    // Grade checkboxes
    document.querySelectorAll('.grade-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 2) {
                saveCurrentStepData();
            }
        });
    });
    
    // Class fields
    const classFields = ['setupClassesPerGrade', 'setupClassNaming'];
    classFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('change', () => {
                if (currentSetupStep === 3) {
                    saveCurrentStepData();
                }
            });
        }
    });
    
    // Room fields
    const roomFields = ['setupTotalRooms', 'setupRoomStart', 'setupRoomCapacity'];
    roomFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('change', () => {
                if (currentSetupStep === 4) {
                    saveCurrentStepData();
                }
            });
        }
    });
    
    // Subject checkboxes
    document.querySelectorAll('.subject-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 5) {
                saveCurrentStepData();
            }
        });
    });
});

function goToSetupStep(step) {
    currentSetupStep = step;
    
    // Hide all steps
    for (let i = 1; i <= totalSetupSteps; i++) {
        const stepEl = document.getElementById('setup-step-' + i);
        if (stepEl) {
            stepEl.style.display = 'none';
        }
    }
    
    // Show current step
    const currentStepEl = document.getElementById('setup-step-' + step);
    if (currentStepEl) {
        currentStepEl.style.display = 'block';
    }
    
    // Smooth scroll to top when changing steps
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // Update progress bar active states
    const stepItems = document.querySelectorAll('.wizard-step-item');
    stepItems.forEach((item, index) => {
        if (index + 1 <= step) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });
    
    // Update button visibility
    const backBtn = document.getElementById('setupBackBtn');
    const nextBtn = document.getElementById('setupNextBtn');
    const completeBtn = document.getElementById('setupCompleteBtn');
    
    if (backBtn) backBtn.style.display = step > 1 ? 'inline-flex' : 'none';
    if (nextBtn) nextBtn.style.display = step < totalSetupSteps ? 'inline-flex' : 'none';
    if (completeBtn) completeBtn.style.display = step === totalSetupSteps ? 'inline-flex' : 'none';
    
    // Show Next button on step 1
    if (step === 1 && nextBtn) {
        nextBtn.style.display = 'inline-flex';
    }
}

function goToPreviousSetupStep() {
    if (currentSetupStep > 1) {
        // Save current step data before going back
        saveCurrentStepData();
        goToSetupStep(currentSetupStep - 1);
    }
}

// Save current step data to localStorage
function saveCurrentStepData() {
    try {
        // Get existing data or create new object
        const existingDataStr = localStorage.getItem('academicSetup');
        const setupData = existingDataStr ? JSON.parse(existingDataStr) : {};
        
        // Save data based on current step
        if (currentSetupStep === 1) {
            setupData.batch = {
                name: document.getElementById('setupBatchName').value.trim(),
                start: document.getElementById('setupBatchStart').value,
                end: document.getElementById('setupBatchEnd').value
            };
        } else if (currentSetupStep === 2) {
            setupData.grades = Array.from(document.querySelectorAll('.grade-checkbox:checked')).map(cb => parseInt(cb.value));
        } else if (currentSetupStep === 3) {
            setupData.classes = {
                perGrade: parseInt(document.getElementById('setupClassesPerGrade').value),
                naming: document.getElementById('setupClassNaming').value.split(',')
            };
        } else if (currentSetupStep === 4) {
            setupData.rooms = {
                total: parseInt(document.getElementById('setupTotalRooms').value),
                start: document.getElementById('setupRoomStart').value,
                capacity: parseInt(document.getElementById('setupRoomCapacity').value)
            };
        } else if (currentSetupStep === 5) {
            setupData.subjects = Array.from(document.querySelectorAll('.subject-checkbox:checked')).map(cb => ({
                name: cb.value,
                code: cb.getAttribute('data-code')
            }));
        }
        
        // Save to localStorage
        localStorage.setItem('academicSetup', JSON.stringify(setupData));
    } catch (e) {
        console.error('Error saving step data:', e);
    }
}

function handleNextSetupStep() {
    // Validate current step
    if (currentSetupStep === 1) {
        const batchName = (document.getElementById('setupBatchName').value || '').trim();
        const batchStart = document.getElementById('setupBatchStart').value;
        const batchEnd = document.getElementById('setupBatchEnd').value;
        
        if (!batchName) {
            alert('Please enter batch name');
            return;
        }
        if (!batchStart) {
            alert('Please select start date');
            return;
        }
        if (!batchEnd) {
            alert('Please select end date');
            return;
        }
    } else if (currentSetupStep === 2) {
        const selectedGrades = Array.from(document.querySelectorAll('.grade-checkbox:checked'));
        if (selectedGrades.length === 0) {
            alert('Please select at least one grade');
            return;
        }
    } else if (currentSetupStep === 3) {
        const classesPerGrade = document.getElementById('setupClassesPerGrade').value;
        if (!classesPerGrade) {
            alert('Please select classes per grade');
            return;
        }
    } else if (currentSetupStep === 4) {
        const totalRooms = document.getElementById('setupTotalRooms').value;
        if (!totalRooms || parseInt(totalRooms) < 1) {
            alert('Please enter a valid number of rooms');
            return;
        }
    } else if (currentSetupStep === 5) {
        const selectedSubjects = Array.from(document.querySelectorAll('.subject-checkbox:checked'));
        if (selectedSubjects.length === 0) {
            alert('Please select at least one subject');
            return;
        }
    }
    
    // Save current step data before moving to next step
    saveCurrentStepData();
    
    if (currentSetupStep < totalSetupSteps) {
        goToSetupStep(currentSetupStep + 1);
    }
}

// Show success notification
function showSuccessNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'setup-success-notification';
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 40px; height: 40px; background: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 20px;">
                <i class="fas fa-check"></i>
            </div>
            <div>
                <div style="font-weight: 600; font-size: 16px; margin-bottom: 4px;">Setup Complete!</div>
                <div style="font-size: 14px; opacity: 0.9;">${message}</div>
            </div>
        </div>
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
}

function completeSetup() {
    // Validate final step
    const selectedSubjects = Array.from(document.querySelectorAll('.subject-checkbox:checked'));
    if (selectedSubjects.length === 0) {
        alert('Please select at least one subject');
        return;
    }
    
    // Collect all setup data
    const setupData = {
        batch: {
            name: document.getElementById('setupBatchName').value.trim(),
            start: document.getElementById('setupBatchStart').value,
            end: document.getElementById('setupBatchEnd').value
        },
        grades: Array.from(document.querySelectorAll('.grade-checkbox:checked')).map(cb => parseInt(cb.value)),
        classes: {
            perGrade: parseInt(document.getElementById('setupClassesPerGrade').value),
            naming: document.getElementById('setupClassNaming').value.split(',')
        },
        rooms: {
            total: parseInt(document.getElementById('setupTotalRooms').value),
            start: document.getElementById('setupRoomStart').value,
            capacity: parseInt(document.getElementById('setupRoomCapacity').value)
        },
        subjects: Array.from(document.querySelectorAll('.subject-checkbox:checked')).map(cb => ({
            name: cb.value,
            code: cb.getAttribute('data-code')
        })),
        // Include added items
        addedItems: {
            batches: addedBatches,
            grades: addedGrades,
            classes: addedClasses,
            rooms: addedRooms,
            subjects: addedSubjects
        }
    };
    
    // Save to localStorage with flag to apply on next page load
    try {
        localStorage.setItem('academicSetup', JSON.stringify(setupData));
        localStorage.setItem('academicSetupPending', 'true'); // Flag to indicate data needs to be applied
        localStorage.setItem('academicSetupCompleted', 'true');
    } catch (e) {
        console.error('Error saving setup data:', e);
    }
    
    // Calculate totals including added items
    const totalGrades = setupData.grades.length + addedGrades.length;
    const totalClasses = (setupData.grades.length * setupData.classes.perGrade) + addedClasses.length;
    const totalRooms = setupData.rooms.total + addedRooms.length;
    const totalSubjects = setupData.subjects.length + addedSubjects.length;
    
    // Show success notification
    showSuccessNotification(`Academic setup completed successfully! Created ${totalGrades} Grades, ${totalClasses} Classes, ${totalRooms} Rooms, and ${totalSubjects} Subjects.`);
    
    // Redirect to academic management page after a short delay
    setTimeout(() => {
        window.location.href = '/admin/academic-management?setup=completed';
    }, 2000);
}
</script>

<style>
/* Wizard Styles */
.wizard-container {
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

/* Checkbox styling for grade and subject selection */
.grade-checkbox:checked + span,
.subject-checkbox:checked + span {
    font-weight: 600;
    color: #4A90E2;
}

label:has(.grade-checkbox:checked),
label:has(.subject-checkbox:checked) {
    border-color: #4A90E2 !important;
    background: #eff6ff;
}

/* Form styles */
.form-row {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
}

.form-input,
.form-select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.2s ease;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

/* Welcome Header Styles */
.setup-welcome-header {
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Success Notification */
.setup-success-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #fff;
    border-radius: 12px;
    padding: 20px 24px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    z-index: 10000;
    max-width: 400px;
    opacity: 0;
    transform: translateX(400px);
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    border-left: 4px solid #10b981;
}

.setup-success-notification.show {
    opacity: 1;
    transform: translateX(0);
}

/* Enhanced checkbox hover effects */
label:has(.grade-checkbox),
label:has(.subject-checkbox) {
    transition: all 0.2s ease;
}

label:has(.grade-checkbox:hover),
label:has(.subject-checkbox:hover) {
    border-color: #4A90E2 !important;
    background: #f0f7ff;
    transform: translateY(-2px);
    box-shadow: 0 2px 8px rgba(74, 144, 226, 0.15);
}

/* Step indicator animations */
.wizard-step-item.active .step-indicator {
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        box-shadow: 0 2px 8px rgba(74, 144, 226, 0.3);
    }
    50% {
        box-shadow: 0 2px 16px rgba(74, 144, 226, 0.5);
    }
}

/* Form input enhancements */
.form-input:focus,
.form-select:focus {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.15);
}

/* Add Item Button Styles */
.add-item-btn {
    background: #4A90E2;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.add-item-btn:hover {
    background: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
}

.add-item-form {
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form Button Styles */
.form-btn-primary {
    background: #4A90E2;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.form-btn-primary:hover {
    background: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
}

.form-btn-secondary {
    background: #fff;
    color: #374151;
    border: 1px solid #d1d5db;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 500;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.form-btn-secondary:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

/* Notification Animations */
@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(400px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideOutRight {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(400px);
    }
}

@media (max-width: 992px) {
    .setup-welcome-header {
        padding: 24px;
    }
    
    .setup-welcome-header h2 {
        font-size: 24px;
    }
    
    .wizard-content-wrapper {
        flex-direction: column;
    }
    
    .wizard-sidebar {
        width: 100%;
        border-left: none;
        border-top: 1px solid #e5e7eb;
    }
    
    .form-row {
        flex-direction: column;
    }
    
    .wizard-footer {
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
    }
    
    .wizard-footer > div {
        margin-left: 0;
        width: 100%;
        display: flex;
        gap: 8px;
    }
    
    .wizard-footer .wizard-btn-secondary,
    .wizard-footer .wizard-btn-primary {
        flex: 1;
    }
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

