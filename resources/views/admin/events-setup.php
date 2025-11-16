<?php
$pageTitle = 'Smart Campus Nova Hub - Events Setup';
$pageIcon = 'fas fa-calendar-check';
$pageHeading = 'Events Setup';
$activePage = 'events-setup';

ob_start();
?>
<!-- Welcome Header for First-Time Setup -->
<div class="setup-welcome-header" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius: 12px; padding: 32px; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);">
    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="width: 64px; height: 64px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px;">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div style="flex: 1;">
            <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color: #fff;">Welcome to Events Setup</h2>
            <p style="margin: 0; font-size: 16px; color: rgba(255, 255, 255, 0.9);">Configure event categories, default settings, notifications, and approval workflows for your event management system.</p>
        </div>
    </div>
</div>

<!-- Events Setup Wizard -->
<div class="wizard-container" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid #e5e7eb;">
    <!-- Wizard Progress Bar -->
    <div class="wizard-progress-bar">
        <div class="wizard-steps-container">
            <div class="wizard-step-item active" data-step="1" onclick="goToSetupStep(1)">
                <div class="step-indicator">
                    <i class="fas fa-tags"></i>
                </div>
                <span class="step-label">Event Categories</span>
            </div>
            <div class="wizard-step-item" data-step="2" onclick="goToSetupStep(2)">
                <div class="step-indicator">2</div>
                <span class="step-label">Default Settings</span>
            </div>
            <div class="wizard-step-item" data-step="3" onclick="goToSetupStep(3)">
                <div class="step-indicator">3</div>
                <span class="step-label">Notifications</span>
            </div>
            <div class="wizard-step-item" data-step="4" onclick="goToSetupStep(4)">
                <div class="step-indicator">4</div>
                <span class="step-label">Approval Workflow</span>
            </div>
        </div>
    </div>

    <div class="wizard-content-wrapper" style="display: flex; min-height: 600px;">
        <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
            <div style="margin-bottom: 24px;">
                <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Events Setup Wizard</h2>
                <p style="margin: 8px 0 0 0; color: #6b7280; font-size: 14px;">Configure your event management system step by step</p>
            </div>
            <div class="form-section" style="padding:0;">
                <!-- Step 1: Event Categories -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-tags" style="color:#f59e0b; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#d97706;">Event Categories Configuration</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Default Event Categories</label>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="event-category-checkbox" value="academic" checked>
                                    <span>Academic</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="event-category-checkbox" value="sports" checked>
                                    <span>Sports</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="event-category-checkbox" value="cultural" checked>
                                    <span>Cultural</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="event-category-checkbox" value="meeting" checked>
                                    <span>Meeting</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="event-category-checkbox" value="holiday" checked>
                                    <span>Holiday</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="event-category-checkbox" value="ceremony">
                                    <span>Ceremony</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top: 16px;">
                        <div class="form-group" style="flex:1;">
                            <label for="customCategories">Custom Categories (comma-separated)</label>
                            <input type="text" id="customCategories" class="form-input" placeholder="e.g., Workshop, Seminar, Competition">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Add additional event categories if needed</small>
                        </div>
                    </div>
                    <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #d97706; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Select the default event categories that will be available when creating events. You can add custom categories as needed.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Default Settings -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-cog" style="color:#f59e0b; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#d97706;">Default Event Settings</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="defaultEventDuration">Default Event Duration (hours)</label>
                            <input type="number" id="defaultEventDuration" class="form-input" placeholder="e.g., 2" value="2" min="0.5" max="24" step="0.5">
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="defaultEventLocation">Default Event Location</label>
                            <input type="text" id="defaultEventLocation" class="form-input" placeholder="e.g., Main Hall">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="defaultAudience">Default Audience</label>
                            <select id="defaultAudience" class="form-select">
                                <option value="all" selected>All School</option>
                                <option value="students">Students</option>
                                <option value="teachers">Teachers</option>
                                <option value="staff">Staff</option>
                                <option value="parents">Parents</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="maxFileSize">Maximum File Upload Size (MB)</label>
                            <input type="number" id="maxFileSize" class="form-input" placeholder="e.g., 10" value="10" min="1" max="100">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Allowed File Types</label>
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px; border: 2px solid #e5e7eb; border-radius: 6px;">
                                    <input type="checkbox" class="file-type-checkbox" value="pdf" checked>
                                    <span>PDF</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px; border: 2px solid #e5e7eb; border-radius: 6px;">
                                    <input type="checkbox" class="file-type-checkbox" value="doc" checked>
                                    <span>DOC/DOCX</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px; border: 2px solid #e5e7eb; border-radius: 6px;">
                                    <input type="checkbox" class="file-type-checkbox" value="xls" checked>
                                    <span>XLS/XLSX</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px; border: 2px solid #e5e7eb; border-radius: 6px;">
                                    <input type="checkbox" class="file-type-checkbox" value="ppt" checked>
                                    <span>PPT/PPTX</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px; border: 2px solid #e5e7eb; border-radius: 6px;">
                                    <input type="checkbox" class="file-type-checkbox" value="image" checked>
                                    <span>Images</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px; border: 2px solid #e5e7eb; border-radius: 6px;">
                                    <input type="checkbox" class="file-type-checkbox" value="txt">
                                    <span>TXT</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #d97706; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure default settings that will be pre-filled when creating new events.
                        </p>
                    </div>
                </div>

                <!-- Step 3: Notifications -->
                <div class="wizard-step" id="setup-step-3" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-bell" style="color:#f59e0b; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#d97706;">Notification Settings</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Notification Preferences</label>
                            <div style="margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 8px;">
                                    <input type="checkbox" class="notification-checkbox" value="event-created" checked>
                                    <span>Notify when event is created</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 8px;">
                                    <input type="checkbox" class="notification-checkbox" value="event-updated" checked>
                                    <span>Notify when event is updated</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 8px;">
                                    <input type="checkbox" class="notification-checkbox" value="event-reminder" checked>
                                    <span>Send event reminders</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    <input type="checkbox" class="notification-checkbox" value="event-cancelled" checked>
                                    <span>Notify when event is cancelled</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="reminderDays">Reminder Days Before Event</label>
                            <input type="number" id="reminderDays" class="form-input" placeholder="e.g., 1" value="1" min="0" max="30">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Number of days before event to send reminder</small>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="notificationRecipients">Default Notification Recipients</label>
                            <select id="notificationRecipients" class="form-select" multiple style="height: 100px;">
                                <option value="all" selected>All School</option>
                                <option value="students">Students</option>
                                <option value="teachers">Teachers</option>
                                <option value="staff">Staff</option>
                                <option value="parents">Parents</option>
                                <option value="admin">Administrators</option>
                            </select>
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Hold Ctrl/Cmd to select multiple</small>
                        </div>
                    </div>
                    <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #d97706; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure when and to whom event notifications should be sent.
                        </p>
                    </div>
                </div>

                <!-- Step 4: Approval Workflow -->
                <div class="wizard-step" id="setup-step-4" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-check-circle" style="color:#f59e0b; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#d97706;">Approval Workflow</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Event Approval Required</label>
                            <div style="margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 8px;">
                                    <input type="radio" name="approvalRequired" value="yes" checked>
                                    <span>Yes, require approval for all events</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    <input type="radio" name="approvalRequired" value="no">
                                    <span>No, auto-approve all events</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="approverRole">Approver Role</label>
                            <select id="approverRole" class="form-select">
                                <option value="admin" selected>Administrator</option>
                                <option value="principal">Principal</option>
                                <option value="vice-principal">Vice Principal</option>
                                <option value="coordinator">Event Coordinator</option>
                            </select>
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Who can approve events</small>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="autoPublish">Auto-publish After Approval</label>
                            <select id="autoPublish" class="form-select">
                                <option value="yes" selected>Yes, publish automatically</option>
                                <option value="no">No, manual publish required</option>
                            </select>
                        </div>
                    </div>
                    <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #d97706; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure the approval workflow for events. Events can be set to require approval before being published.
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
                    <li>Complete each step to configure your event management system</li>
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
const totalSetupSteps = 4;

// Load existing setup data from localStorage
function loadExistingSetupData() {
    try {
        const setupDataStr = localStorage.getItem('eventsSetup');
        if (!setupDataStr) {
            return false;
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Load categories
        if (setupData.categories && Array.isArray(setupData.categories)) {
            document.querySelectorAll('.event-category-checkbox').forEach(cb => {
                cb.checked = setupData.categories.includes(cb.value);
            });
        }
        
        if (setupData.customCategories) {
            document.getElementById('customCategories').value = setupData.customCategories;
        }
        
        // Load default settings
        if (setupData.defaultSettings) {
            if (setupData.defaultSettings.duration) {
                document.getElementById('defaultEventDuration').value = setupData.defaultSettings.duration;
            }
            if (setupData.defaultSettings.location) {
                document.getElementById('defaultEventLocation').value = setupData.defaultSettings.location;
            }
            if (setupData.defaultSettings.audience) {
                document.getElementById('defaultAudience').value = setupData.defaultSettings.audience;
            }
            if (setupData.defaultSettings.maxFileSize) {
                document.getElementById('maxFileSize').value = setupData.defaultSettings.maxFileSize;
            }
            if (setupData.defaultSettings.fileTypes && Array.isArray(setupData.defaultSettings.fileTypes)) {
                document.querySelectorAll('.file-type-checkbox').forEach(cb => {
                    cb.checked = setupData.defaultSettings.fileTypes.includes(cb.value);
                });
            }
        }
        
        // Load notifications
        if (setupData.notifications) {
            if (setupData.notifications.preferences && Array.isArray(setupData.notifications.preferences)) {
                document.querySelectorAll('.notification-checkbox').forEach(cb => {
                    cb.checked = setupData.notifications.preferences.includes(cb.value);
                });
            }
            if (setupData.notifications.reminderDays) {
                document.getElementById('reminderDays').value = setupData.notifications.reminderDays;
            }
        }
        
        // Load approval workflow
        if (setupData.approval) {
            const approvalRadio = document.querySelector(`input[name="approvalRequired"][value="${setupData.approval.required}"]`);
            if (approvalRadio) approvalRadio.checked = true;
            if (setupData.approval.approverRole) {
                document.getElementById('approverRole').value = setupData.approval.approverRole;
            }
            if (setupData.approval.autoPublish) {
                document.getElementById('autoPublish').value = setupData.approval.autoPublish;
            }
        }
        
        return true;
    } catch (e) {
        console.error('Error loading existing setup data:', e);
        return false;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    loadExistingSetupData();
    goToSetupStep(1);
});

function goToSetupStep(step) {
    currentSetupStep = step;
    
    for (let i = 1; i <= totalSetupSteps; i++) {
        const stepEl = document.getElementById('setup-step-' + i);
        if (stepEl) {
            stepEl.style.display = 'none';
        }
    }
    
    const currentStepEl = document.getElementById('setup-step-' + step);
    if (currentStepEl) {
        currentStepEl.style.display = 'block';
    }
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
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
    
    const backBtn = document.getElementById('setupBackBtn');
    const nextBtn = document.getElementById('setupNextBtn');
    const completeBtn = document.getElementById('setupCompleteBtn');
    
    if (backBtn) backBtn.style.display = step > 1 ? 'inline-flex' : 'none';
    if (nextBtn) nextBtn.style.display = step < totalSetupSteps ? 'inline-flex' : 'none';
    if (completeBtn) completeBtn.style.display = step === totalSetupSteps ? 'inline-flex' : 'none';
}

function goToPreviousSetupStep() {
    if (currentSetupStep > 1) {
        saveCurrentStepData();
        goToSetupStep(currentSetupStep - 1);
    }
}

function saveCurrentStepData() {
    try {
        let setupData = {};
        try {
            const existing = localStorage.getItem('eventsSetup');
            if (existing) {
                setupData = JSON.parse(existing);
            }
        } catch (e) {
            setupData = {};
        }
        
        if (currentSetupStep === 1) {
            const categories = Array.from(document.querySelectorAll('.event-category-checkbox:checked')).map(cb => cb.value);
            setupData.categories = categories;
            setupData.customCategories = document.getElementById('customCategories').value;
        } else if (currentSetupStep === 2) {
            const fileTypes = Array.from(document.querySelectorAll('.file-type-checkbox:checked')).map(cb => cb.value);
            setupData.defaultSettings = {
                duration: parseFloat(document.getElementById('defaultEventDuration').value) || 2,
                location: document.getElementById('defaultEventLocation').value || '',
                audience: document.getElementById('defaultAudience').value || 'all',
                maxFileSize: parseInt(document.getElementById('maxFileSize').value) || 10,
                fileTypes: fileTypes
            };
        } else if (currentSetupStep === 3) {
            const preferences = Array.from(document.querySelectorAll('.notification-checkbox:checked')).map(cb => cb.value);
            setupData.notifications = {
                preferences: preferences,
                reminderDays: parseInt(document.getElementById('reminderDays').value) || 1
            };
        } else if (currentSetupStep === 4) {
            const approvalRequired = document.querySelector('input[name="approvalRequired"]:checked')?.value || 'yes';
            setupData.approval = {
                required: approvalRequired,
                approverRole: document.getElementById('approverRole').value || 'admin',
                autoPublish: document.getElementById('autoPublish').value || 'yes'
            };
        }
        
        localStorage.setItem('eventsSetup', JSON.stringify(setupData));
    } catch (e) {
        console.error('Error saving step data:', e);
    }
}

function handleNextSetupStep() {
    if (currentSetupStep === 1) {
        const categories = Array.from(document.querySelectorAll('.event-category-checkbox:checked'));
        if (categories.length === 0) {
            alert('Please select at least one event category');
            return;
        }
    }
    
    saveCurrentStepData();
    
    if (currentSetupStep < totalSetupSteps) {
        goToSetupStep(currentSetupStep + 1);
    }
}

function completeSetup() {
    saveCurrentStepData();
    
    try {
        const setupDataStr = localStorage.getItem('eventsSetup');
        const setupData = setupDataStr ? JSON.parse(setupDataStr) : {};
        setupData.completed = true;
        setupData.completedDate = new Date().toISOString();
        localStorage.setItem('eventsSetup', JSON.stringify(setupData));
        localStorage.setItem('eventsSetupCompleted', 'true');
    } catch (e) {
        console.error('Error saving setup data:', e);
    }
    
    if (typeof showToast === 'function') {
        showToast('Events setup completed successfully!', 'success');
    } else {
        alert('Events setup completed successfully!');
    }
    
    setTimeout(() => {
        window.location.href = '/admin/dashboard?setup=completed';
    }, 2000);
}
</script>

<style>
/* Wizard Styles - Reuse from academic setup with orange theme */
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
    background: #f59e0b;
    border-color: #f59e0b;
    color: #fff;
    box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
}

.wizard-step-item.active .step-indicator i {
    font-size: 16px;
}

.wizard-step-item.completed .step-indicator {
    background: #f59e0b;
    border-color: #f59e0b;
    color: #fff;
}

.step-label {
    font-size: 13px;
    font-weight: 500;
    color: #6b7280;
    text-align: center;
}

.wizard-step-item.active .step-label {
    color: #f59e0b;
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
    background: #f59e0b;
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
    color: #f59e0b;
    font-weight: bold;
}

.sidebar-help {
    background: #fffbeb;
    border: 1px solid #f59e0b;
    border-radius: 8px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #d97706;
}

.sidebar-help i {
    color: #f59e0b;
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
    background: #f59e0b;
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
    background: #d97706;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
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

label:has(input[type="checkbox"]:checked),
label:has(input[type="radio"]:checked) {
    border-color: #f59e0b;
    background: #fffbeb;
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

