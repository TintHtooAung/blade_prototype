<?php
$pageTitle = 'Smart Campus Nova Hub - Time-table & Attendance Setup';
$pageIcon = 'fas fa-cog';
$pageHeading = 'Time-table & Attendance Setup';
$activePage = 'schedule-attendance-setup';

ob_start();
?>
<!-- Welcome Header for First-Time Setup -->
<div class="setup-welcome-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 12px; padding: 32px; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);">
    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="width: 64px; height: 64px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px;">
            <i class="fas fa-cog"></i>
        </div>
        <div style="flex: 1;">
            <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color: #fff;">Welcome to Time-table & Attendance Setup</h2>
            <p style="margin: 0; font-size: 16px; color: rgba(255, 255, 255, 0.9);">Configure your time-table format and time settings step by step.</p>
        </div>
    </div>
</div>

<div class="wizard-container" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid #e5e7eb;">
    <!-- Wizard Progress Bar -->
    <div class="wizard-progress-bar">
        <div class="wizard-steps-container">
            <div class="wizard-step-item active" data-step="1" onclick="goToSetupStep(1)">
                <div class="step-indicator">
                    <i class="fas fa-clock"></i>
                </div>
                <span class="step-label">Time-table Format</span>
            </div>
            <div class="wizard-step-item" data-step="2" onclick="goToSetupStep(2)">
                <div class="step-indicator">2</div>
                <span class="step-label">Time Settings</span>
            </div>
        </div>
    </div>

    <div class="wizard-content-wrapper" style="display: flex; min-height: 600px;">
        <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
            <div class="form-section" style="padding:0;">
                <!-- Step 1: Time-table Format -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-clock" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Time-table Format Configuration</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="schedulePeriods">Number of Periods per Day <span style="color:red;">*</span></label>
                            <select id="schedulePeriods" class="form-select" required>
                                <option value="5">5 Periods</option>
                                <option value="6">6 Periods</option>
                                <option value="7" selected>7 Periods</option>
                                <option value="8">8 Periods</option>
                                <option value="9">9 Periods</option>
                                <option value="10">10 Periods</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="periodDuration">Period Duration (minutes) <span style="color:red;">*</span></label>
                            <input type="number" id="periodDuration" class="form-input" placeholder="e.g., 45" value="45" min="30" max="90" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="breakDuration">Break Duration (minutes)</label>
                            <input type="number" id="breakDuration" class="form-input" placeholder="e.g., 30" value="30" min="0" max="120">
                        </div>
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure how many periods your school has per day and the duration of each period.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Time Settings -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-calendar-alt" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Time Settings</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="schoolStartTime">School Start Time <span style="color:red;">*</span></label>
                            <input type="time" id="schoolStartTime" class="form-input" value="08:00" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="schoolEndTime">School End Time <span style="color:red;">*</span></label>
                            <input type="time" id="schoolEndTime" class="form-input" value="15:30" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Working Days</label>
                            <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 8px; margin-top: 8px;">
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="monday" checked>
                                    <span style="font-size: 12px; font-weight: 600;">Mon</span>
                                </label>
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="tuesday" checked>
                                    <span style="font-size: 12px; font-weight: 600;">Tue</span>
                                </label>
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="wednesday" checked>
                                    <span style="font-size: 12px; font-weight: 600;">Wed</span>
                                </label>
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="thursday" checked>
                                    <span style="font-size: 12px; font-weight: 600;">Thu</span>
                                </label>
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="friday" checked>
                                    <span style="font-size: 12px; font-weight: 600;">Fri</span>
                                </label>
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="saturday">
                                    <span style="font-size: 12px; font-weight: 600;">Sat</span>
                                </label>
                                <label style="display: flex; flex-direction: column; align-items: center; gap: 4px; cursor: pointer; padding: 10px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="working-day-checkbox" value="sunday">
                                    <span style="font-size: 12px; font-weight: 600;">Sun</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure school timings and working days for accurate time-table and attendance tracking.
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
                    <li>You can modify these settings later from the settings page</li>
                    <li>All configurations can be edited after setup</li>
                    <li>Return to this page anytime to reconfigure</li>
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

<script>
let currentSetupStep = 1;
const totalSetupSteps = 2;

// Load existing setup data from localStorage
function loadExistingSetupData() {
    try {
        const setupDataStr = localStorage.getItem('scheduleAttendanceSetup');
        if (!setupDataStr) {
            return false; // No existing data
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Load schedule format data
        if (setupData.scheduleFormat) {
            if (setupData.scheduleFormat.periods) {
                document.getElementById('schedulePeriods').value = setupData.scheduleFormat.periods;
            }
            if (setupData.scheduleFormat.periodDuration) {
                document.getElementById('periodDuration').value = setupData.scheduleFormat.periodDuration;
            }
            if (setupData.scheduleFormat.breakDuration) {
                document.getElementById('breakDuration').value = setupData.scheduleFormat.breakDuration;
            }
            // Legacy support: also check timeSettings for backward compatibility
            else if (setupData.timeSettings && setupData.timeSettings.breakDuration) {
                document.getElementById('breakDuration').value = setupData.timeSettings.breakDuration;
            }
        }
        
        // Load time settings data
        if (setupData.timeSettings) {
            if (setupData.timeSettings.schoolStartTime) {
                document.getElementById('schoolStartTime').value = setupData.timeSettings.schoolStartTime;
            }
            if (setupData.timeSettings.schoolEndTime) {
                document.getElementById('schoolEndTime').value = setupData.timeSettings.schoolEndTime;
            }
            if (setupData.timeSettings.workingDays && Array.isArray(setupData.timeSettings.workingDays)) {
                document.querySelectorAll('.working-day-checkbox').forEach(cb => {
                    cb.checked = setupData.timeSettings.workingDays.includes(cb.value);
                });
            }
        }
        
        return true; // Data loaded successfully
    } catch (e) {
        console.error('Error loading existing setup data:', e);
        return false;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Try to load existing setup data first
    const hasExistingData = loadExistingSetupData();
    
        // Add event listeners to auto-save data when form fields change
        if (hasExistingData) {
            // Add change listeners to auto-save
            document.querySelectorAll('#schedulePeriods, #periodDuration, #breakDuration, #schoolStartTime, #schoolEndTime').forEach(field => {
                field.addEventListener('change', () => {
                    saveCurrentStepData();
                });
            });
            
            document.querySelectorAll('.working-day-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    saveCurrentStepData();
                });
            });
            
        }
        
        // Initialize step navigation
        goToSetupStep(1);
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
    
    // Update step indicators
    const stepItems = document.querySelectorAll('.wizard-step-item');
    stepItems.forEach((item, index) => {
        if (index + 1 <= step) {
            item.classList.add('active');
            if (index + 1 < step) {
                item.classList.add('completed');
            } else {
                item.classList.remove('completed');
            }
        } else {
            item.classList.remove('active', 'completed');
        }
    });
    
    // Update navigation buttons
    const backBtn = document.getElementById('setupBackBtn');
    const nextBtn = document.getElementById('setupNextBtn');
    const completeBtn = document.getElementById('setupCompleteBtn');
    
    if (backBtn) backBtn.style.display = step > 1 ? 'inline-flex' : 'none';
    if (nextBtn) nextBtn.style.display = step < totalSetupSteps ? 'inline-flex' : 'none';
    if (completeBtn) completeBtn.style.display = step === totalSetupSteps ? 'inline-flex' : 'none';
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
        let setupData = {};
        try {
            const existing = localStorage.getItem('scheduleAttendanceSetup');
            if (existing) {
                setupData = JSON.parse(existing);
            }
        } catch (e) {
            setupData = {};
        }
        
        // Save data based on current step
        if (currentSetupStep === 1) {
            setupData.scheduleFormat = {
                periods: parseInt(document.getElementById('schedulePeriods').value),
                periodDuration: parseInt(document.getElementById('periodDuration').value),
                breakDuration: parseInt(document.getElementById('breakDuration').value) || 30
            };
            // Set default attendance format to period-based
            setupData.attendanceFormat = {
                method: 'period', // Always use period-based attendance
                tracking: 'manual' // Default tracking method
            };
        } else if (currentSetupStep === 2) {
            const workingDays = Array.from(document.querySelectorAll('.working-day-checkbox:checked')).map(cb => cb.value);
            const schoolStartTime = document.getElementById('schoolStartTime').value;
            const schoolEndTime = document.getElementById('schoolEndTime').value;
            setupData.timeSettings = {
                schoolStartTime: schoolStartTime,
                schoolEndTime: schoolEndTime,
                workingDays: workingDays
            };
        }
        
        localStorage.setItem('scheduleAttendanceSetup', JSON.stringify(setupData));
    } catch (e) {
        console.error('Error saving step data:', e);
    }
}

function handleNextSetupStep() {
    // Validate current step
    if (currentSetupStep === 1) {
        const periods = document.getElementById('schedulePeriods').value;
        const periodDuration = document.getElementById('periodDuration').value;
        if (!periods || !periodDuration) {
            if (typeof showToast === 'function') {
                showToast('Please fill all required fields', 'warning');
            } else {
                alert('Please fill all required fields');
            }
            return;
        }
    } else if (currentSetupStep === 2) {
        const startTime = document.getElementById('schoolStartTime').value;
        const endTime = document.getElementById('schoolEndTime').value;
        const workingDays = Array.from(document.querySelectorAll('.working-day-checkbox:checked'));
        if (!startTime || !endTime || workingDays.length === 0) {
            if (typeof showToast === 'function') {
                showToast('Please fill all required fields and select at least one working day', 'warning');
            } else {
                alert('Please fill all required fields and select at least one working day');
            }
            return;
        }
    }
    
    // Save current step data before moving to next step
    saveCurrentStepData();
    
    if (currentSetupStep < totalSetupSteps) {
        goToSetupStep(currentSetupStep + 1);
    }
}

function completeSetup() {
    // Validate final step
    if (currentSetupStep === 2) {
        const startTime = document.getElementById('schoolStartTime').value;
        const endTime = document.getElementById('schoolEndTime').value;
        const workingDays = Array.from(document.querySelectorAll('.working-day-checkbox:checked'));
        if (!startTime || !endTime || workingDays.length === 0) {
            if (typeof showToast === 'function') {
                showToast('Please fill all required fields and select at least one working day', 'warning');
            } else {
                alert('Please fill all required fields and select at least one working day');
            }
            return;
        }
    }
    
    // Save all data
    saveCurrentStepData();
    
    try {
        const setupDataStr = localStorage.getItem('scheduleAttendanceSetup');
        const setupData = setupDataStr ? JSON.parse(setupDataStr) : {};
        
        // Mark setup as completed
        setupData.completed = true;
        setupData.completedDate = new Date().toISOString();
        
        localStorage.setItem('scheduleAttendanceSetup', JSON.stringify(setupData));
        localStorage.setItem('scheduleAttendanceSetupCompleted', 'true');
    } catch (e) {
        console.error('Error saving setup data:', e);
    }
    
    // Show success notification
    if (typeof showToast === 'function') {
        showToast('Time-table & Attendance setup completed successfully!', 'success');
    } else {
        alert('Time-table & Attendance setup completed successfully!');
    }
    
    // Redirect to dashboard after a short delay
    setTimeout(() => {
        window.location.href = '/admin/dashboard?setup=completed';
    }, 2000);
}
</script>

<style>
/* Wizard Styles - Reuse from academic setup */
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
    background: #10b981;
    border-color: #10b981;
    color: #fff;
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
}

.wizard-step-item.active .step-indicator i {
    font-size: 16px;
}

.wizard-step-item.completed .step-indicator {
    background: #10b981;
    border-color: #10b981;
    color: #fff;
}

.step-label {
    font-size: 13px;
    font-weight: 500;
    color: #6b7280;
    text-align: center;
}

.wizard-step-item.active .step-label {
    color: #10b981;
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
    background: #10b981;
    z-index: 0;
    transform: translateX(-50%);
}

.wizard-step-item:last-child::after {
    display: none;
}

.wizard-content-wrapper {
    display: flex;
    min-height: 600px;
}

.wizard-main-content {
    flex: 1;
    overflow-y: auto;
    padding: 32px;
}

.wizard-sidebar {
    width: 280px;
    background: #f9fafb;
    border-left: 1px solid #e5e7eb;
    padding: 24px;
    flex-shrink: 0;
}

.wizard-sidebar-content {
    position: sticky;
    top: 24px;
}

.sidebar-title {
    font-size: 16px;
    font-weight: 600;
    color: #111827;
    margin: 0 0 16px 0;
}

.sidebar-tips {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
}

.sidebar-tips li {
    padding: 8px 0;
    font-size: 14px;
    color: #6b7280;
    position: relative;
    padding-left: 20px;
}

.sidebar-tips li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: #10b981;
    font-weight: bold;
}

.sidebar-help {
    background: #ecfdf5;
    border: 1px solid #10b981;
    border-radius: 8px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #059669;
}

.sidebar-help i {
    color: #10b981;
}

.wizard-footer {
    border-top: 1px solid #e5e7eb;
    padding: 20px 32px;
    background: #f9fafb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 0 0 12px 12px;
}

.wizard-btn-primary {
    background: #10b981;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.wizard-btn-primary:hover {
    background: #059669;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.wizard-btn-secondary {
    background: #fff;
    color: #6b7280;
    border: 1px solid #e5e7eb;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.wizard-btn-secondary:hover {
    background: #f9fafb;
    border-color: #d1d5db;
}

.wizard-step {
    animation: fadeIn 0.3s ease;
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

/* Checkbox and radio button styling */
input[type="checkbox"]:checked + span,
input[type="radio"]:checked + span {
    font-weight: 600;
}

label:has(input[type="checkbox"]:checked),
label:has(input[type="radio"]:checked) {
    border-color: #10b981;
    background: #ecfdf5;
}

@media (max-width: 1024px) {
    .wizard-content-wrapper {
        flex-direction: column;
    }
    
    .wizard-sidebar {
        width: 100%;
        border-left: none;
        border-top: 1px solid #e5e7eb;
    }
    
    .wizard-footer {
        flex-direction: column;
        gap: 12px;
    }
    
    .wizard-footer > div {
        width: 100%;
        display: flex;
        justify-content: space-between;
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

