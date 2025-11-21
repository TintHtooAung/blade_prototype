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
                <span class="step-label">Grades & Classes</span>
            </div>
            <div class="wizard-step-item" data-step="3" onclick="goToSetupStep(3)">
                <div class="step-indicator">3</div>
                <span class="step-label">Rooms</span>
            </div>
            <div class="wizard-step-item" data-step="4" onclick="goToSetupStep(4)">
                <div class="step-indicator">4</div>
                <span class="step-label">Subjects</span>
            </div>
        </div>
    </div>

    <div class="wizard-content-wrapper" style="display: flex; min-height: 600px;">
        <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
            <div class="form-section" style="padding:0;">
                <!-- Step 1: Batch Setup -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-calendar-alt" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Create Academic Batch</h4>
                        </div>
                    </div>
                    
                    <div class="form-row" style="align-items: flex-start;">
                        <div class="form-group" style="flex:1;">
                            <label for="setupBatchName">Batch Name <span style="color:red;">*</span></label>
                            <input type="text" id="setupBatchName" class="form-input" placeholder="e.g., 2024-2025" required>
                            <small style="display: block; margin-top: 6px; color: #6b7280; font-size: 12px; min-height: 20px;">
                                <i class="fas fa-lightbulb" style="margin-right: 4px; color: #f59e0b;"></i>
                                Format: <strong>*(2025-2026)</strong> - Use year range format
                            </small>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupBatchStart">Start Date <span style="color:red;">*</span></label>
                            <input type="date" id="setupBatchStart" class="form-input" required>
                            <small style="display: block; margin-top: 6px; min-height: 20px; visibility: hidden;">
                                &nbsp;
                            </small>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="setupBatchEnd">End Date <span style="color:red;">*</span></label>
                            <input type="date" id="setupBatchEnd" class="form-input" required>
                            <small style="display: block; margin-top: 6px; min-height: 20px; visibility: hidden;">
                                &nbsp;
                            </small>
                        </div>
                    </div>
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            An academic batch represents a school year. This will be the active batch for all academic activities.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Grades & Classes Setup -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-layer-group" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Grades & Classes</h4>
                        </div>
                        <button class="simple-btn" onclick="toggleGradeClassForm()" style="display:inline-flex; align-items:center; gap:8px;">
                            <i class="fas fa-plus"></i> Add Grade & Classes
                        </button>
                    </div>
                    
                    <div id="gradesClassesList" style="margin-bottom: 20px;">
                        <!-- Grades and classes will be dynamically added here -->
                        <div style="text-align: center; padding: 40px; color: #6b7280; background: #f9fafb; border-radius: 8px; border: 2px dashed #d1d5db;">
                            <i class="fas fa-layer-group" style="font-size: 48px; margin-bottom: 16px; color: #9ca3af;"></i>
                            <p style="margin: 0; font-size: 16px; font-weight: 500;">No grades added yet</p>
                            <p style="margin: 8px 0 0 0; font-size: 14px;">Click "Add Grade & Classes" to get started</p>
                        </div>
                    </div>
                    
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Add grades and specify the number of classes for each grade. Each grade can have a different number of classes.
                        </p>
                    </div>
                </div>

                <!-- Step 3: Rooms Setup -->
                <div class="wizard-step" id="setup-step-3" style="display:none;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-door-open" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Rooms</h4>
                        </div>
                        <button class="simple-btn" onclick="toggleRoomForm()" style="display:inline-flex; align-items:center; gap:8px;">
                            <i class="fas fa-plus"></i> Add Room
                        </button>
                    </div>
                    
                    <div id="roomsList" style="margin-bottom: 20px;">
                        <!-- Rooms will be dynamically added here -->
                        <div style="text-align: center; padding: 40px; color: #6b7280; background: #f9fafb; border-radius: 8px; border: 2px dashed #d1d5db;">
                            <i class="fas fa-door-open" style="font-size: 48px; margin-bottom: 16px; color: #9ca3af;"></i>
                            <p style="margin: 0; font-size: 16px; font-weight: 500;">No rooms added yet</p>
                            <p style="margin: 8px 0 0 0; font-size: 14px;">Click "Add Room" to get started</p>
                        </div>
                    </div>
                    
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Add rooms with custom names. You can use any naming convention you prefer (e.g., "Room 101", "Lab A", "Library", etc.).
                        </p>
                    </div>
                </div>

                <!-- Step 4: Subjects Setup -->
                <div class="wizard-step" id="setup-step-4" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <div style="display:flex; align-items:center;">
                            <i class="fas fa-book" style="color:#4A90E2; margin-right:8px; font-size:18px;"></i>
                            <h4 style="margin:0; font-size:18px; font-weight:600; color:#1e40af;">Setup Subjects</h4>
                        </div>
                    </div>
                    
                    <div id="subjectsList" style="margin-bottom: 20px;">
                        <!-- Grade cards with subjects will be dynamically added here -->
                    </div>
                    
                    <div style="background: #eff6ff; border-left: 4px solid #4A90E2; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #1e40af; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Add subjects for each grade using the plus button in each grade card. You can create core subjects and elective subjects.
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
    
    <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 20px 32px; background: #f9fafb; display: flex; justify-content: flex-end; align-items: center; border-radius: 0 0 12px 12px;">
        <div style="display: flex; gap: 12px;">
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


<!-- Room Creation Modal -->

<script>
let currentSetupStep = 1;
const totalSetupSteps = 4;
let gradesClassesData = [];
let editingGradeIndex = null;
let classCounter = 0;
let roomsData = [];
let editingRoomIndex = null;
let subjectsData = [];
let editingSubjectIndex = null;
let editingGradeId = null;

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

// Grade & Class Card Functions
function toggleGradeClassForm(gradeIndex = null) {
    const container = document.getElementById('gradesClassesList');
    if (!container) return;
    
    editingGradeIndex = gradeIndex;
    
    if (gradeIndex !== null) {
        // Editing existing grade - create editable card
        const gradeData = gradesClassesData[gradeIndex];
        createEditableGradeCard(gradeIndex, gradeData);
    } else {
        // Adding new grade - create new editable card
        createEditableGradeCard(null, null);
    }
}

function createEditableGradeCard(gradeIndex, gradeData) {
    const container = document.getElementById('gradesClassesList');
    if (!container) return;
    
    // Remove empty state if exists
    const emptyState = container.querySelector('div[style*="text-align: center"]');
    if (emptyState) emptyState.remove();
    
    // Create new editable card
    const cardId = gradeIndex !== null ? `edit-grade-${gradeIndex}` : `new-grade-${Date.now()}`;
    const card = document.createElement('div');
    card.id = cardId;
    card.className = 'grade-class-card editable-grade-card';
    card.style.cssText = 'background: #fff; border: 1px solid #4A90E2; border-radius: 8px; padding: 16px; margin-bottom: 12px;';
    
    const gradeName = gradeData ? gradeData.gradeName : '';
    const gradeLevel = gradeData ? gradeData.gradeLevel : '';
    const category = gradeData ? gradeData.category : 'Primary';
    const classes = gradeData ? [...gradeData.classes] : [];
    
    card.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 1;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; flex-wrap: wrap;">
                    <input type="text" class="grade-name-input" placeholder="Grade Name" value="${gradeName}" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #fff;">
                    <input type="number" class="grade-level-input" placeholder="Level" value="${gradeLevel}" min="1" max="12" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #f3f4f6; color: #6b7280;">
                    <select class="grade-category-input" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #eff6ff; color: #1e40af;">
                        <option value="Primary" ${category === 'Primary' ? 'selected' : ''}>Primary</option>
                        <option value="Secondary" ${category === 'Secondary' ? 'selected' : ''}>Secondary</option>
                        <option value="High School" ${category === 'High School' ? 'selected' : ''}>High School</option>
                    </select>
                </div>
                <div>
                    <div style="font-size: 13px; color: #6b7280; margin-bottom: 8px; font-weight: 500;">Classes:</div>
                    <div class="classes-container" style="display: flex; flex-wrap: wrap; gap: 6px; align-items: center;">
                        ${classes.map(cls => `
                            <span class="class-badge" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; background: #e3f2fd; color: #1976d2; border-radius: 4px; font-size: 13px;">
                                ${cls}
                                <button type="button" onclick="removeClassFromCard(this)" style="background: none; border: none; color: #1976d2; cursor: pointer; padding: 0; font-size: 10px; line-height: 1; display: flex; align-items: center;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        `).join('')}
                        <button type="button" class="add-class-btn" onclick="showClassLetterInput(this)" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; padding: 0; background: #e3f2fd; color: #1976d2; border: 1px dashed #1976d2; border-radius: 4px; cursor: pointer; font-size: 13px; transition: all 0.2s;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 8px;">
                <button class="simple-btn-icon" onclick="saveGradeFromCard('${cardId}', ${gradeIndex !== null ? gradeIndex : 'null'})" title="Save" style="color: #10b981;">
                    <i class="fas fa-check"></i>
                </button>
                <button class="simple-btn-icon" onclick="cancelGradeCard('${cardId}', ${gradeIndex !== null ? gradeIndex : 'null'})" title="Cancel" style="color: #ef4444;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    `;
    
    // Insert at the beginning if new, or replace existing if editing
    if (gradeIndex !== null) {
        const existingCard = container.querySelector(`.grade-class-card[data-grade-index="${gradeIndex}"]`);
        if (existingCard) {
            existingCard.replaceWith(card);
        } else {
            container.insertBefore(card, container.firstChild);
        }
    } else {
        container.insertBefore(card, container.firstChild);
    }
    
    card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function showClassLetterInput(btn) {
    const container = btn.closest('.classes-container');
    if (!container) return;
    
    // Get existing letters to show available options
    const existingClasses = Array.from(container.querySelectorAll('.class-badge')).map(badge => {
        const text = badge.textContent.trim();
        return text.replace(/[^A-Z]/gi, '').toUpperCase();
    }).filter(c => c.length === 1 && /^[A-Z]$/i.test(c));
    
    // Create a select dropdown with available letters
    const select = document.createElement('select');
    select.className = 'class-letter-select';
    select.style.cssText = 'width: 50px; height: 28px; padding: 4px; border: 1px solid #1976d2; border-radius: 4px; font-size: 13px; background: #fff; color: #1976d2; font-weight: 600; text-align: center; cursor: pointer;';
    
    // Add all letters A-Z, marking used ones
    for (let i = 65; i <= 90; i++) {
        const letter = String.fromCharCode(i);
        const option = document.createElement('option');
        option.value = letter;
        option.textContent = letter;
        if (existingClasses.includes(letter)) {
            option.disabled = true;
            option.textContent = letter + ' (used)';
        }
        select.appendChild(option);
    }
    
    // Replace the button with the select
    btn.style.display = 'none';
    container.insertBefore(select, btn);
    select.focus();
    
    // Handle selection
    select.addEventListener('change', function() {
        const selectedLetter = this.value.toUpperCase();
        if (selectedLetter && !existingClasses.includes(selectedLetter)) {
            addClassLetterToCard(container, selectedLetter, btn);
            this.remove();
            btn.style.display = 'inline-flex';
        }
    });
    
    // Handle blur (clicking outside) - cancel
    select.addEventListener('blur', function() {
        setTimeout(() => {
            if (this.parentNode) {
                this.remove();
                btn.style.display = 'inline-flex';
            }
        }, 200);
    });
    
    // Handle Escape key
    select.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            this.remove();
            btn.style.display = 'inline-flex';
        } else if (e.key === 'Enter') {
            e.preventDefault();
            const selectedLetter = this.value.toUpperCase();
            if (selectedLetter && !existingClasses.includes(selectedLetter)) {
                addClassLetterToCard(container, selectedLetter, btn);
                this.remove();
                btn.style.display = 'inline-flex';
            }
        }
    });
}

function addClassLetterToCard(container, letter, plusBtn) {
    // Check if letter already exists
    const existingClasses = Array.from(container.querySelectorAll('.class-badge')).map(badge => {
        const text = badge.textContent.trim();
        return text.replace(/[^A-Z]/gi, '').toUpperCase();
    });
    
    if (existingClasses.includes(letter)) {
        alert(`Class ${letter} already exists`);
        return;
    }
    
    const classBadge = document.createElement('span');
    classBadge.className = 'class-badge';
    classBadge.style.cssText = 'display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; background: #e3f2fd; color: #1976d2; border-radius: 4px; font-size: 13px;';
    classBadge.innerHTML = `
        ${letter}
        <button type="button" onclick="removeClassFromCard(this)" style="background: none; border: none; color: #1976d2; cursor: pointer; padding: 0; font-size: 10px; line-height: 1; display: flex; align-items: center;">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    container.insertBefore(classBadge, plusBtn);
}

function removeClassFromCard(btn) {
    const badge = btn.closest('.class-badge');
    if (badge) {
        badge.remove();
    }
}

function saveGradeFromCard(cardId, gradeIndex) {
    const card = document.getElementById(cardId);
    if (!card) return;
    
    const gradeNameInput = card.querySelector('.grade-name-input');
    const gradeLevelInput = card.querySelector('.grade-level-input');
    const categoryInput = card.querySelector('.grade-category-input');
    const classBadges = card.querySelectorAll('.class-badge');
    
    const gradeName = gradeNameInput.value.trim();
    const gradeLevel = gradeLevelInput.value.trim();
    const category = categoryInput.value;
    const classes = Array.from(classBadges).map(badge => {
        const text = badge.textContent.trim();
        return text.replace(/[^A-Z]/gi, '').toUpperCase();
    }).filter(c => c.length > 0);
    
    if (!gradeName || !gradeLevel) {
        alert('Please enter grade name and level');
        return;
    }
    
    if (classes.length === 0) {
        alert('Please add at least one class');
        return;
    }
    
    const gradeData = {
        id: gradeIndex !== null ? gradesClassesData[gradeIndex].id : 'GRADE-' + Date.now(),
        gradeName: gradeName,
        gradeLevel: parseInt(gradeLevel),
        category: category,
        classes: classes
    };
    
    if (gradeIndex !== null) {
        // Update existing
        gradesClassesData[gradeIndex] = gradeData;
    } else {
        // Add new
        gradesClassesData.push(gradeData);
    }
    
    renderGradesClassesList();
    saveCurrentStepData();
}

function cancelGradeCard(cardId, gradeIndex) {
    const card = document.getElementById(cardId);
    if (card) {
        card.remove();
    }
    
    if (gradeIndex === null) {
        // If it was a new card, check if we need to show empty state
        const container = document.getElementById('gradesClassesList');
        if (container && container.children.length === 0) {
            renderGradesClassesList();
        }
    } else {
        // If editing, re-render the list to show the original card
        renderGradesClassesList();
    }
    
    editingGradeIndex = null;
}

function renderGradesClassesList() {
    const container = document.getElementById('gradesClassesList');
    if (!container) return;
    
    if (gradesClassesData.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; padding: 40px; color: #6b7280; background: #f9fafb; border-radius: 8px; border: 2px dashed #d1d5db;">
                <i class="fas fa-layer-group" style="font-size: 48px; margin-bottom: 16px; color: #9ca3af;"></i>
                <p style="margin: 0; font-size: 16px; font-weight: 500;">No grades added yet</p>
                <p style="margin: 8px 0 0 0; font-size: 14px;">Click "Add Grade & Classes" to get started</p>
            </div>
        `;
        return;
    }
    
    // Sort by grade level
    const sorted = [...gradesClassesData].sort((a, b) => a.gradeLevel - b.gradeLevel);
    
    container.innerHTML = sorted.map((gradeData, index) => {
        const actualIndex = gradesClassesData.findIndex(g => g.id === gradeData.id);
        const classesList = gradeData.classes.map((cls, idx) => 
            `<span style="display: inline-block; padding: 4px 10px; background: #e3f2fd; color: #1976d2; border-radius: 4px; font-size: 13px;">${cls}</span>`
        ).join('');
        
        return `
            <div class="grade-class-card" data-grade-index="${actualIndex}" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <h5 style="margin: 0; font-size: 16px; font-weight: 600; color: #111827;">${gradeData.gradeName}</h5>
                            <span style="padding: 4px 10px; background: #f3f4f6; color: #6b7280; border-radius: 4px; font-size: 12px; font-weight: 500;">Level ${gradeData.gradeLevel}</span>
                            <span style="padding: 4px 10px; background: #eff6ff; color: #1e40af; border-radius: 4px; font-size: 12px; font-weight: 500;">${gradeData.category}</span>
                        </div>
                        <div>
                            <div style="font-size: 13px; color: #6b7280; margin-bottom: 8px; font-weight: 500;">Classes (${gradeData.classes.length}):</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                ${classesList}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button class="simple-btn-icon" onclick="toggleGradeClassForm(${actualIndex})" title="Edit" style="color: #4A90E2;">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="deleteGradeClass(${actualIndex})" title="Delete" style="color: #ef4444;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

function deleteGradeClass(index) {
    if (confirm('Are you sure you want to delete this grade and all its classes?')) {
        gradesClassesData.splice(index, 1);
        renderGradesClassesList();
        saveCurrentStepData();
    }
}

// Add Grade Item (legacy function - kept for compatibility)
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

// Room Modal Functions
// Room Card Functions
function toggleRoomForm(roomIndex = null) {
    const container = document.getElementById('roomsList');
    if (!container) return;
    
    editingRoomIndex = roomIndex;
    
    if (roomIndex !== null) {
        // Editing existing room - create editable card
        const roomData = roomsData[roomIndex];
        createEditableRoomCard(roomIndex, roomData);
    } else {
        // Adding new room - create new editable card
        createEditableRoomCard(null, null);
    }
}

function createEditableRoomCard(roomIndex, roomData) {
    const container = document.getElementById('roomsList');
    if (!container) return;
    
    // Remove empty state if exists
    const emptyState = container.querySelector('div[style*="text-align: center"]');
    if (emptyState) emptyState.remove();
    
    // Create new editable card
    const cardId = roomIndex !== null ? `edit-room-${roomIndex}` : `new-room-${Date.now()}`;
    const card = document.createElement('div');
    card.id = cardId;
    card.className = 'grade-class-card editable-room-card';
    card.style.cssText = 'background: #fff; border: 1px solid #4A90E2; border-radius: 8px; padding: 16px; margin-bottom: 12px;';
    
    const roomName = roomData ? roomData.name : '';
    const building = roomData ? roomData.building : '';
    const floor = roomData ? roomData.floor : '';
    const capacity = roomData ? roomData.capacity : '';
    const facilities = roomData ? (roomData.facilities || []) : [];
    
    card.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 1;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; flex-wrap: wrap;">
                    <input type="text" class="room-name-input" placeholder="Room Name" value="${roomName}" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #fff;">
                    <input type="text" class="room-building-input" placeholder="Building" value="${building}" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #fff;">
                    <input type="text" class="room-floor-input" placeholder="Floor" value="${floor}" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #fff;">
                    <input type="number" class="room-capacity-input" placeholder="Capacity" value="${capacity}" min="1" style="padding: 6px 10px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 16px; font-weight: 600; width: 150px; background: #f3f4f6; color: #6b7280;">
                </div>
                <div>
                    <div style="font-size: 13px; color: #6b7280; margin-bottom: 8px; font-weight: 500;">Facilities:</div>
                    <div class="facilities-container" style="display: flex; flex-wrap: wrap; gap: 6px; align-items: center;">
                        ${facilities.map(facility => `
                            <span class="facility-badge" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; background: #e3f2fd; color: #1976d2; border-radius: 4px; font-size: 13px;">
                                ${facility}
                                <button type="button" onclick="removeFacilityFromCard(this)" style="background: none; border: none; color: #1976d2; cursor: pointer; padding: 0; font-size: 10px; line-height: 1; display: flex; align-items: center;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        `).join('')}
                        <button type="button" class="add-facility-btn" onclick="showFacilityInput(this)" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; padding: 0; background: #e3f2fd; color: #1976d2; border: 1px dashed #1976d2; border-radius: 4px; cursor: pointer; font-size: 13px; transition: all 0.2s;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 8px;">
                <button class="simple-btn-icon" onclick="saveRoomFromCard('${cardId}', ${roomIndex !== null ? roomIndex : 'null'})" title="Save" style="color: #10b981;">
                    <i class="fas fa-check"></i>
                </button>
                <button class="simple-btn-icon" onclick="cancelRoomCard('${cardId}', ${roomIndex !== null ? roomIndex : 'null'})" title="Cancel" style="color: #ef4444;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    `;
    
    // Insert at the beginning if new, or replace existing if editing
    if (roomIndex !== null) {
        const existingCard = container.querySelector(`.grade-class-card[data-room-index="${roomIndex}"]`);
        if (existingCard) {
            existingCard.replaceWith(card);
        } else {
            container.insertBefore(card, container.firstChild);
        }
    } else {
        container.insertBefore(card, container.firstChild);
    }
    
    card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function showFacilityInput(btn) {
    const container = btn.closest('.facilities-container');
    if (!container) return;
    
    // Common facilities list
    const commonFacilities = ['Projector', 'Whiteboard', 'Computer Lab', 'Air Conditioning', 'WiFi', 'Sound System', 'Smart Board', 'Printer', 'Scanner', 'Microphone', 'Camera', 'Lab Equipment'];
    
    // Get existing facilities
    const existingFacilities = Array.from(container.querySelectorAll('.facility-badge')).map(badge => {
        return badge.textContent.trim().replace(/[×✕]/g, '').trim();
    });
    
    // Create a select dropdown with available facilities
    const select = document.createElement('select');
    select.className = 'facility-select';
    select.style.cssText = 'width: 150px; height: 28px; padding: 4px; border: 1px solid #1976d2; border-radius: 4px; font-size: 13px; background: #fff; color: #1976d2; font-weight: 500; cursor: pointer;';
    
    // Add option for custom input
    const customOption = document.createElement('option');
    customOption.value = '';
    customOption.textContent = 'Custom...';
    select.appendChild(customOption);
    
    // Add common facilities
    commonFacilities.forEach(facility => {
        const option = document.createElement('option');
        option.value = facility;
        option.textContent = facility;
        if (existingFacilities.includes(facility)) {
            option.disabled = true;
            option.textContent = facility + ' (added)';
        }
        select.appendChild(option);
    });
    
    // Replace the button with the select
    btn.style.display = 'none';
    container.insertBefore(select, btn);
    select.focus();
    
    // Handle selection
    select.addEventListener('change', function() {
        if (this.value === '') {
            // Show input for custom facility
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'facility-custom-input';
            input.placeholder = 'Enter facility name';
            input.style.cssText = 'width: 150px; height: 28px; padding: 4px 8px; border: 1px solid #1976d2; border-radius: 4px; font-size: 13px;';
            this.replaceWith(input);
            input.focus();
            
            input.addEventListener('blur', function() {
                const facilityName = this.value.trim();
                if (facilityName && !existingFacilities.includes(facilityName)) {
                    addFacilityToCard(container, facilityName, btn);
                } else {
                    btn.style.display = 'inline-flex';
                }
            });
            
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const facilityName = this.value.trim();
                    if (facilityName && !existingFacilities.includes(facilityName)) {
                        addFacilityToCard(container, facilityName, btn);
                    } else {
                        this.remove();
                        btn.style.display = 'inline-flex';
                    }
                } else if (e.key === 'Escape') {
                    this.remove();
                    btn.style.display = 'inline-flex';
                }
            });
        } else {
            const selectedFacility = this.value;
            if (selectedFacility && !existingFacilities.includes(selectedFacility)) {
                addFacilityToCard(container, selectedFacility, btn);
                this.remove();
                btn.style.display = 'inline-flex';
            }
        }
    });
    
    // Handle blur (clicking outside) - cancel
    select.addEventListener('blur', function() {
        setTimeout(() => {
            if (this.parentNode && this.tagName === 'SELECT') {
                this.remove();
                btn.style.display = 'inline-flex';
            }
        }, 200);
    });
    
    // Handle Escape key
    select.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            this.remove();
            btn.style.display = 'inline-flex';
        }
    });
}

function addFacilityToCard(container, facilityName, plusBtn) {
    // Check if facility already exists
    const existingFacilities = Array.from(container.querySelectorAll('.facility-badge')).map(badge => {
        return badge.textContent.trim().replace(/[×✕]/g, '').trim();
    });
    
    if (existingFacilities.includes(facilityName)) {
        alert(`Facility "${facilityName}" already exists`);
        return;
    }
    
    const facilityBadge = document.createElement('span');
    facilityBadge.className = 'facility-badge';
    facilityBadge.style.cssText = 'display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; background: #e3f2fd; color: #1976d2; border-radius: 4px; font-size: 13px;';
    facilityBadge.innerHTML = `
        ${facilityName}
        <button type="button" onclick="removeFacilityFromCard(this)" style="background: none; border: none; color: #1976d2; cursor: pointer; padding: 0; font-size: 10px; line-height: 1; display: flex; align-items: center;">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    container.insertBefore(facilityBadge, plusBtn);
}

function removeFacilityFromCard(btn) {
    const badge = btn.closest('.facility-badge');
    if (badge) {
        badge.remove();
    }
}

function saveRoomFromCard(cardId, roomIndex) {
    const card = document.getElementById(cardId);
    if (!card) return;
    
    const roomNameInput = card.querySelector('.room-name-input');
    const buildingInput = card.querySelector('.room-building-input');
    const floorInput = card.querySelector('.room-floor-input');
    const capacityInput = card.querySelector('.room-capacity-input');
    const facilityBadges = card.querySelectorAll('.facility-badge');
    
    const roomName = roomNameInput.value.trim();
    const building = buildingInput.value.trim();
    const floor = floorInput.value.trim();
    const capacity = capacityInput.value.trim();
    const facilities = Array.from(facilityBadges).map(badge => {
        const text = badge.textContent.trim();
        return text.replace(/[×✕]/g, '').trim();
    }).filter(f => f.length > 0);
    
    if (!roomName) {
        alert('Please enter room name');
        return;
    }
    
    const room = {
        id: roomIndex !== null ? roomsData[roomIndex].id : 'ROOM-' + Date.now(),
        name: roomName,
        building: building || '',
        floor: floor || '',
        capacity: capacity ? parseInt(capacity) : null,
        facilities: facilities
    };
    
    if (roomIndex !== null) {
        // Update existing
        roomsData[roomIndex] = room;
    } else {
        // Add new
        roomsData.push(room);
    }
    
    renderRoomsList();
    saveCurrentStepData();
}

function cancelRoomCard(cardId, roomIndex) {
    const card = document.getElementById(cardId);
    if (card) {
        card.remove();
    }
    
    if (roomIndex === null) {
        // If it was a new card, check if we need to show empty state
        const container = document.getElementById('roomsList');
        if (container && container.children.length === 0) {
            renderRoomsList();
        }
    } else {
        // If editing, re-render the list to show the original card
        renderRoomsList();
    }
    
    editingRoomIndex = null;
}

function renderRoomsList() {
    const roomsListContainer = document.getElementById('roomsList');
    if (!roomsListContainer) return;
    
    if (roomsData.length === 0) {
        roomsListContainer.innerHTML = `
            <div style="text-align: center; padding: 40px; color: #6b7280; background: #f9fafb; border-radius: 8px; border: 2px dashed #d1d5db;">
                <i class="fas fa-door-open" style="font-size: 48px; margin-bottom: 16px; color: #9ca3af;"></i>
                <p style="margin: 0; font-size: 16px; font-weight: 500;">No rooms added yet</p>
                <p style="margin: 8px 0 0 0; font-size: 14px;">Click "Add Room" to get started</p>
            </div>
        `;
        return;
    }
    
    // Sort rooms by name
    const sorted = [...roomsData].sort((a, b) => a.name.localeCompare(b.name));
    
    roomsListContainer.innerHTML = sorted.map((room, index) => {
        const actualIndex = roomsData.findIndex(r => r.id === room.id);
        const locationInfo = [room.building, room.floor].filter(Boolean).join(' · ') || '—';
        const capacityInfo = room.capacity ? `${room.capacity} seats` : '—';
        const facilitiesList = (room.facilities || []).map(facility => 
            `<span style="display: inline-block; padding: 4px 10px; background: #e3f2fd; color: #1976d2; border-radius: 4px; font-size: 13px;">${facility}</span>`
        ).join('');
        
        return `
            <div class="grade-class-card" data-room-index="${actualIndex}" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <h5 style="margin: 0; font-size: 16px; font-weight: 600; color: #111827;">${room.name}</h5>
                            ${locationInfo !== '—' ? `<span style="padding: 4px 10px; background: #f3f4f6; color: #6b7280; border-radius: 4px; font-size: 12px; font-weight: 500;">${locationInfo}</span>` : ''}
                        </div>
                        ${capacityInfo !== '—' ? `
                        <div style="margin-bottom: 12px;">
                            <span style="font-size: 13px; color: #6b7280; font-weight: 500;">Capacity: </span>
                            <span style="font-size: 13px; color: #111827; font-weight: 500;">${capacityInfo}</span>
                        </div>
                        ` : ''}
                        ${facilitiesList ? `
                        <div>
                            <div style="font-size: 13px; color: #6b7280; margin-bottom: 8px; font-weight: 500;">Facilities (${(room.facilities || []).length}):</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                ${facilitiesList}
                            </div>
                        </div>
                        ` : ''}
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button class="simple-btn-icon" onclick="toggleRoomForm(${actualIndex})" title="Edit" style="color: #4A90E2;">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="deleteRoom(${actualIndex})" title="Delete" style="color: #ef4444;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

function deleteRoom(index) {
    if (confirm('Are you sure you want to delete this room?')) {
        roomsData.splice(index, 1);
        renderRoomsList();
        saveCurrentStepData();
        showItemAddedNotification('Room deleted successfully!');
    }
}

// Subject Card Functions
function editSubject(gradeId, subjectIndex) {
    const subjectData = subjectsData[subjectIndex];
    if (!subjectData) return;
    
    // Find the subject badge
    const subjectBadge = document.querySelector(`.subject-badge[data-subject-index="${subjectIndex}"]`);
    if (!subjectBadge) return;
    
    // Replace badge with edit form
    createEditableSubjectCard(gradeId, subjectIndex, subjectData, subjectBadge);
}

function showSubjectInput(gradeId) {
    // Use the same function as edit, but with null subject data
    createEditableSubjectCard(gradeId, null, null);
}

function createEditableSubjectCard(gradeId, subjectIndex, subjectData, replaceElement = null) {
    const subjectCode = subjectData ? subjectData.code : '';
    const subjectName = subjectData ? subjectData.name : '';
    const category = subjectData ? subjectData.category : 'Core';
    
    const formId = subjectIndex !== null ? `edit-subject-${subjectIndex}` : `new-subject-${gradeId}-${Date.now()}`;
    const formCard = document.createElement('div');
    formCard.id = formId;
    formCard.className = 'subject-input-form';
    formCard.style.cssText = 'display: inline-flex; align-items: center; gap: 8px; background: #f9fafb; border: 1px solid #4A90E2; border-radius: 6px; padding: 8px; margin-bottom: 6px; margin-right: 6px;';
    
    formCard.innerHTML = `
        <input type="text" class="subject-code-input" placeholder="Code" value="${subjectCode}" style="padding: 4px 8px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 13px; font-weight: 600; width: 80px; background: #fff;">
        <input type="text" class="subject-name-input" placeholder="Subject Name" value="${subjectName}" style="padding: 4px 8px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 13px; font-weight: 600; width: 140px; background: #fff;">
        <select class="subject-category-input" style="padding: 4px 8px; border: 1px solid #d1d5db; border-radius: 4px; font-size: 13px; font-weight: 600; width: 90px; background: #eff6ff; color: #1e40af;">
            <option value="Core" ${category === 'Core' ? 'selected' : ''}>Core</option>
            <option value="Elective" ${category === 'Elective' ? 'selected' : ''}>Elective</option>
        </select>
        <button type="button" onclick="saveSubjectFromCard('${formId}', '${gradeId}', ${subjectIndex !== null ? subjectIndex : 'null'})" style="background: #10b981; color: #fff; border: none; border-radius: 4px; padding: 4px 8px; cursor: pointer; font-size: 12px;">
            <i class="fas fa-check"></i>
        </button>
        <button type="button" onclick="cancelSubjectCard('${formId}', ${subjectIndex !== null ? subjectIndex : 'null'})" style="background: #ef4444; color: #fff; border: none; border-radius: 4px; padding: 4px 8px; cursor: pointer; font-size: 12px;">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    if (replaceElement) {
        // Replace existing badge with form
        replaceElement.replaceWith(formCard);
    } else {
        // New subject - add before plus button
        const gradeCard = document.querySelector(`.grade-subject-card[data-grade-id="${gradeId}"]`);
        if (!gradeCard) return;
        
        const subjectsContainer = gradeCard.querySelector('.grade-subjects-list');
        if (!subjectsContainer) return;
        
        const plusBtn = subjectsContainer.querySelector('.add-subject-btn');
        if (plusBtn) {
            plusBtn.style.display = 'none';
            subjectsContainer.insertBefore(formCard, plusBtn);
        } else {
            subjectsContainer.appendChild(formCard);
        }
    }
    
    formCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function saveSubjectFromCard(formId, gradeId, subjectIndex) {
    const formCard = document.getElementById(formId);
    if (!formCard) return;
    
    const subjectCodeInput = formCard.querySelector('.subject-code-input');
    const subjectNameInput = formCard.querySelector('.subject-name-input');
    const categoryInput = formCard.querySelector('.subject-category-input');
    
    const subjectCode = subjectCodeInput.value.trim().toUpperCase();
    const subjectName = subjectNameInput.value.trim();
    const category = categoryInput.value;
    
    if (!subjectCode || !subjectName) {
        alert('Please enter subject code and name');
        return;
    }
    
    // Check for duplicate code in same grade (excluding current subject if editing)
    const existingSubject = subjectsData.find(s => 
        s.gradeId === gradeId && 
        s.code === subjectCode && 
        (subjectIndex === null || s.id !== subjectsData[subjectIndex].id)
    );
    if (existingSubject) {
        alert(`Subject code ${subjectCode} already exists for this grade`);
        return;
    }
    
    const subject = {
        id: subjectIndex !== null ? subjectsData[subjectIndex].id : 'SUBJECT-' + Date.now(),
        code: subjectCode,
        name: subjectName,
        category: category,
        gradeId: gradeId
    };
    
    if (subjectIndex !== null) {
        // Update existing
        subjectsData[subjectIndex] = subject;
    } else {
        // Add new
        subjectsData.push(subject);
    }
    
    renderSubjectsList();
    saveCurrentStepData();
}

function cancelSubjectCard(formId, subjectIndex = null) {
    const formCard = document.getElementById(formId);
    if (formCard) {
        const gradeCard = formCard.closest('.grade-subject-card');
        formCard.remove();
        
        if (subjectIndex !== null) {
            // If editing, re-render to show the badge again
            renderSubjectsList();
        } else {
            // If new, show plus button again
            if (gradeCard) {
                const plusBtn = gradeCard.querySelector('.add-subject-btn');
                if (plusBtn) plusBtn.style.display = 'inline-flex';
            }
        }
    }
    editingSubjectIndex = null;
    editingGradeId = null;
}

function renderSubjectsList() {
    const container = document.getElementById('subjectsList');
    if (!container) return;
    
    if (gradesClassesData.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; padding: 40px; color: #6b7280; background: #f9fafb; border-radius: 8px; border: 2px dashed #d1d5db;">
                <i class="fas fa-info-circle" style="font-size: 48px; margin-bottom: 16px; color: #9ca3af;"></i>
                <p style="margin: 0; font-size: 16px; font-weight: 500;">No grades configured yet</p>
                <p style="margin: 8px 0 0 0; font-size: 14px;">Please configure grades first in the previous step</p>
            </div>
        `;
        return;
    }
    
    // Sort grades by level
    const sortedGrades = [...gradesClassesData].sort((a, b) => a.gradeLevel - b.gradeLevel);
    
    container.innerHTML = sortedGrades.map(grade => {
        const gradeSubjects = subjectsData.filter(s => s.gradeId === grade.id).sort((a, b) => a.code.localeCompare(b.code));
        
        const subjectsList = gradeSubjects.map(subject => {
            const actualIndex = subjectsData.findIndex(s => s.id === subject.id);
            const categoryColor = subject.category === 'Core' ? '#1e40af' : '#7c3aed';
            const categoryBg = subject.category === 'Core' ? '#eff6ff' : '#f3e8ff';
            
            return `
                <div class="subject-badge" data-subject-index="${actualIndex}" data-grade-id="${grade.id}" style="display: inline-flex; align-items: center; gap: 8px; background: #fff; border: 1px solid #e5e7eb; border-radius: 6px; padding: 8px 12px; margin-bottom: 6px; margin-right: 6px;">
                    <div style="padding: 4px 8px; background: ${categoryBg}; color: ${categoryColor}; border-radius: 4px; font-size: 12px; font-weight: 600;">
                        ${subject.code}
                    </div>
                    <div style="flex: 1;">
                        <div style="font-size: 13px; font-weight: 600; color: #111827;">${subject.name}</div>
                        <div style="font-size: 11px; color: #6b7280;">${subject.category}</div>
                    </div>
                    <button class="simple-btn-icon" onclick="editSubject('${grade.id}', ${actualIndex})" title="Edit" style="color: #4A90E2; padding: 4px;">
                        <i class="fas fa-edit" style="font-size: 12px;"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="deleteSubject(${actualIndex})" title="Delete" style="color: #ef4444; padding: 4px;">
                        <i class="fas fa-trash" style="font-size: 12px;"></i>
                    </button>
                </div>
            `;
        }).join('');
        
        return `
            <div class="grade-subject-card" data-grade-id="${grade.id}" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 16px;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                    <h5 style="margin: 0; font-size: 16px; font-weight: 600; color: #111827;">${grade.gradeName}</h5>
                    <span style="padding: 4px 10px; background: #f3f4f6; color: #6b7280; border-radius: 4px; font-size: 12px; font-weight: 500;">Level ${grade.gradeLevel}</span>
                    <span style="padding: 4px 10px; background: #eff6ff; color: #1e40af; border-radius: 4px; font-size: 12px; font-weight: 500;">${grade.category}</span>
                    <span style="padding: 2px 8px; background: #f3f4f6; color: #6b7280; border-radius: 4px; font-size: 12px; font-weight: 500;">${gradeSubjects.length} ${gradeSubjects.length === 1 ? 'subject' : 'subjects'}</span>
                </div>
                <div class="grade-subjects-list" style="display: flex; flex-wrap: wrap; gap: 6px; align-items: center;">
                    ${subjectsList}
                    <button type="button" class="add-subject-btn" onclick="showSubjectInput('${grade.id}')" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; padding: 0; background: #e3f2fd; color: #1976d2; border: 1px dashed #1976d2; border-radius: 4px; cursor: pointer; font-size: 13px; transition: all 0.2s;">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        `;
    }).join('');
}

function deleteSubject(index) {
    if (confirm('Are you sure you want to delete this subject?')) {
        subjectsData.splice(index, 1);
        renderSubjectsList();
        saveCurrentStepData();
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
        
        // Load grades & classes data
        if (setupData.gradesClasses && Array.isArray(setupData.gradesClasses)) {
            gradesClassesData = setupData.gradesClasses;
            renderGradesClassesList();
        }
        
        // Load rooms data
        if (setupData.rooms) {
            // Check if it's the new array format or old object format
            if (Array.isArray(setupData.rooms)) {
                roomsData = setupData.rooms;
                renderRoomsList();
            } else {
                // Legacy format - convert if needed (for backward compatibility)
                roomsData = [];
                renderRoomsList();
            }
        }
        
        // Load subjects data
        if (setupData.subjects && Array.isArray(setupData.subjects)) {
            subjectsData = setupData.subjects;
            renderSubjectsList();
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
    
    // Initialize grades & classes list
    renderGradesClassesList();
    
    // Initialize rooms list
    renderRoomsList();
    
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
    
    // Subject checkboxes
    document.querySelectorAll('.subject-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 4) {
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
    
    // Render lists when entering specific steps
    if (step === 2) {
        renderGradesClassesList();
    } else if (step === 3) {
        renderRoomsList();
    } else if (step === 4) {
        renderSubjectsList();
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
            setupData.gradesClasses = gradesClassesData;
        } else if (currentSetupStep === 3) {
            setupData.rooms = roomsData;
        } else if (currentSetupStep === 4) {
            setupData.subjects = subjectsData;
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
        if (gradesClassesData.length === 0) {
            alert('Please add at least one grade with classes');
            return;
        }
    } else if (currentSetupStep === 3) {
        if (roomsData.length === 0) {
            alert('Please add at least one room');
            return;
        }
    } else if (currentSetupStep === 4) {
        const selectedSubjects = Array.from(document.querySelectorAll('.subject-checkbox:checked'));
        if (subjectsData.length === 0) {
            alert('Please add at least one subject');
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
    if (subjectsData.length === 0) {
        alert('Please add at least one subject');
        return;
    }
    
    // Collect all setup data
    const setupData = {
        batch: {
            name: document.getElementById('setupBatchName').value.trim(),
            start: document.getElementById('setupBatchStart').value,
            end: document.getElementById('setupBatchEnd').value
        },
        gradesClasses: gradesClassesData,
        rooms: roomsData,
        subjects: subjectsData,
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
    const totalGrades = setupData.gradesClasses.length + addedGrades.length;
    const totalClasses = setupData.gradesClasses.reduce((sum, g) => sum + (g.classes ? g.classes.length : 0), 0) + addedClasses.length;
    const totalRooms = (Array.isArray(setupData.rooms) ? setupData.rooms.length : 0) + addedRooms.length;
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

/* Grade & Class Card Styles */
.grade-class-card {
    transition: all 0.2s ease;
}

.grade-class-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transform: translateY(-2px);
}

.class-input-row {
    animation: slideDown 0.2s ease-out;
}

/* Modal Styles */
.receipt-dialog-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(2px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.receipt-dialog-content {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    max-height: 90vh;
    overflow-y: auto;
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.receipt-dialog-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #e5e7eb;
    background: #f8f9fa;
    border-radius: 12px 12px 0 0;
}

.receipt-dialog-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    display: flex;
    align-items: center;
    gap: 10px;
}

.receipt-close {
    background: none;
    border: none;
    font-size: 20px;
    color: #6b7280;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 4px;
    transition: all 0.2s;
}

.receipt-close:hover {
    background: #e5e7eb;
    color: #111827;
}

.receipt-dialog-body {
    padding: 24px;
}

.receipt-dialog-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    padding: 16px 24px;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
    border-radius: 0 0 12px 12px;
}

.simple-btn-icon {
    background: none;
    border: none;
    padding: 8px;
    cursor: pointer;
    border-radius: 4px;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.simple-btn-icon:hover {
    background: #f3f4f6;
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
    
    .receipt-dialog-content {
        width: 95%;
        max-width: 95%;
    }
}

/* Add Item Card Styles */
.add-item-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.card-form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    background: #f9fafb;
}

.card-form-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1d1d1f;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-form-header h4 i {
    color: #4A90E2;
}

.card-form-header .icon-btn {
    background: none;
    border: none;
    font-size: 1.1rem;
    color: #86868b;
    cursor: pointer;
    padding: 0.4rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-form-header .icon-btn:hover {
    background: #e5e7eb;
    color: #1d1d1f;
}

.card-form-body {
    padding: 1.5rem;
}

.card-form-body .form-row {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.card-form-body .form-row:last-child {
    margin-bottom: 0;
}

.card-form-body .form-group {
    flex: 1;
}

.card-form-body .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #1d1d1f;
    font-size: 0.9rem;
}

.card-form-body .form-input,
.card-form-body .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1d1d1f;
    transition: all 0.2s ease;
}

.card-form-body .form-input:focus,
.card-form-body .form-select:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.card-form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    padding: 1.25rem 1.5rem;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

