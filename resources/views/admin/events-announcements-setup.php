<?php
$pageTitle = 'Smart Campus Nova Hub - Events & Announcements Setup';
$pageIcon = 'fas fa-calendar-check';
$pageHeading = 'Events & Announcements Setup';
$activePage = 'events-announcements-setup';

ob_start();
?>
<!-- Welcome Header for First-Time Setup -->
<div class="setup-welcome-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 12px; padding: 32px; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);">
    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="width: 64px; height: 64px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px;">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div style="flex: 1;">
            <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color: #fff;">Welcome to Events & Announcements Setup</h2>
            <p style="margin: 0; font-size: 16px; color: rgba(255, 255, 255, 0.9);">Let's set up your events and announcements system step by step. This wizard will guide you through creating event categories, locations, announcement types, and audience groups.</p>
        </div>
    </div>
</div>

<!-- Events & Announcements Setup Wizard -->
<div class="wizard-container" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid #e5e7eb;">
    
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
                <span class="step-label">Event Locations</span>
            </div>
            <div class="wizard-step-item" data-step="3" onclick="goToSetupStep(3)">
                <div class="step-indicator">3</div>
                <span class="step-label">Announcement Types</span>
            </div>
            <div class="wizard-step-item" data-step="4" onclick="goToSetupStep(4)">
                <div class="step-indicator">4</div>
                <span class="step-label">Audience Groups</span>
            </div>
            <div class="wizard-step-item" data-step="5" onclick="goToSetupStep(5)">
                <div class="step-indicator">5</div>
                <span class="step-label">Recurring Events</span>
            </div>
        </div>
    </div>

    <div class="wizard-content-wrapper" style="display: flex; min-height: 600px;">
        <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
            <div style="margin-bottom: 24px;">
                <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Events & Announcements Setup Wizard</h2>
                <p style="margin: 8px 0 0 0; color: #6b7280; font-size: 14px;">Let's set up your events and announcements system step by step</p>
            </div>
            <div class="form-section" style="padding:0;">
                <!-- Step 1: Event Categories Setup -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-tags" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Setup Event Categories</h4>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Event Categories</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="academic" data-color="#4A90E2" checked>
                                <span>Academic</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="sports" data-color="#ef4444" checked>
                                <span>Sports</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="cultural" data-color="#f59e0b" checked>
                                <span>Cultural</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="meeting" data-color="#8b5cf6" checked>
                                <span>Meeting</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="holiday" data-color="#10b981" checked>
                                <span>Holiday</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="workshop" data-color="#ec4899">
                                <span>Workshop</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="exhibition" data-color="#06b6d4">
                                <span>Exhibition</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="category-checkbox" value="ceremony" data-color="#f97316">
                                <span>Ceremony</span>
                            </label>
                        </div>
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Select all event categories that your school uses. You can add custom categories later.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Event Locations Setup -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-map-marker-alt" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Setup Event Locations</h4>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Common Event Locations</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Main Hall" checked>
                                <span>Main Hall</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Auditorium" checked>
                                <span>Auditorium</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Sports Ground" checked>
                                <span>Sports Ground</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Library" checked>
                                <span>Library</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Cafeteria" checked>
                                <span>Cafeteria</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Classroom" checked>
                                <span>Classroom</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Lab" checked>
                                <span>Lab</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="location-checkbox" value="Online" checked>
                                <span>Online</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top: 20px;">
                        <div class="form-group" style="flex:1;">
                            <label for="customLocation">Add Custom Location</label>
                            <div style="display: flex; gap: 8px;">
                                <input type="text" id="customLocation" class="form-input" placeholder="e.g., Gymnasium">
                                <button type="button" onclick="addCustomLocation()" class="wizard-btn-primary" style="white-space: nowrap;">
                                    <i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="customLocationsList" style="margin-top: 16px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                        <!-- Custom locations will be added here -->
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Select common locations where events are held. You can add custom locations as needed.
                        </p>
                    </div>
                </div>

                <!-- Step 3: Announcement Types Setup -->
                <div class="wizard-step" id="setup-step-3" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-bullhorn" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Setup Announcement Types</h4>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Announcement Types</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="announcement-type-checkbox" value="general" checked>
                                <span>General</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="announcement-type-checkbox" value="urgent" checked>
                                <span>Urgent</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="announcement-type-checkbox" value="information" checked>
                                <span>Information</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="announcement-type-checkbox" value="reminder" checked>
                                <span>Reminder</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="announcement-type-checkbox" value="achievement" checked>
                                <span>Achievement</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="announcement-type-checkbox" value="notice" checked>
                                <span>Notice</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top: 20px;">
                        <div class="form-group" style="flex:1;">
                            <label for="announcementPriorities">Announcement Priorities</label>
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="priority-checkbox" value="high" checked>
                                    <span>High</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="priority-checkbox" value="medium" checked>
                                    <span>Medium</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="priority-checkbox" value="low" checked>
                                    <span>Low</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            These types and priorities will be available when creating announcements.
                        </p>
                    </div>
                </div>

                <!-- Step 4: Audience Groups Setup -->
                <div class="wizard-step" id="setup-step-4" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-users" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Setup Audience Groups</h4>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Audience Groups</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="audience-checkbox" value="all" checked>
                                <span>All School</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="audience-checkbox" value="students" checked>
                                <span>Students</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="audience-checkbox" value="teachers" checked>
                                <span>Teachers</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="audience-checkbox" value="staff" checked>
                                <span>Staff</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="audience-checkbox" value="parents" checked>
                                <span>Parents</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="audience-checkbox" value="admin" checked>
                                <span>Administration</span>
                            </label>
                        </div>
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            These audience groups determine who can see events and announcements.
                        </p>
                    </div>
                </div>

                <!-- Step 5: Recurring Events Setup -->
                <div class="wizard-step" id="setup-step-5" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-redo" style="color:#10b981; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#059669;">Setup Recurring Event Templates</h4>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 12px; font-weight: 600;">Select Recurring Event Types</label>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="recurring-checkbox" value="weekly-assembly" checked>
                                <span>Weekly Assembly</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="recurring-checkbox" value="monthly-meeting" checked>
                                <span>Monthly Staff Meeting</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="recurring-checkbox" value="parent-teacher" checked>
                                <span>Parent-Teacher Meeting</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="recurring-checkbox" value="sports-day" checked>
                                <span>Sports Day</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="recurring-checkbox" value="exam-period" checked>
                                <span>Exam Period</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                <input type="checkbox" class="recurring-checkbox" value="holiday-break" checked>
                                <span>Holiday Break</span>
                            </label>
                        </div>
                    </div>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #059669; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            These recurring event templates can be used to quickly create repeating events throughout the year.
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
                    <li>Complete each step to configure your events and announcements system</li>
                    <li>You can skip steps and complete them later</li>
                    <li>All settings can be edited after setup</li>
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
            <button id="setupNextBtn" class="wizard-btn-primary" onclick="handleNextSetupStep()" style="background: #10b981; border-color: #10b981;">
                Next <i class="fas fa-arrow-right"></i>
            </button>
            <button id="setupCompleteBtn" class="wizard-btn-primary" onclick="completeSetup()" style="display:none; background: #10b981; border-color: #10b981;">
                <i class="fas fa-check"></i> Complete Setup
            </button>
        </div>
    </div>
</div>

<script>
let currentSetupStep = 1;
const totalSetupSteps = 5;
let customLocations = [];

// Load existing setup data from localStorage
function loadExistingSetupData() {
    try {
        const setupDataStr = localStorage.getItem('eventsAnnouncementsSetup');
        if (!setupDataStr) {
            return false; // No existing data
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Load categories
        if (setupData.categories && Array.isArray(setupData.categories)) {
            document.querySelectorAll('.category-checkbox').forEach(cb => {
                // Categories can be stored as objects {name, color} or as strings
                const categoryNames = setupData.categories.map(cat => typeof cat === 'string' ? cat : cat.name);
                cb.checked = categoryNames.includes(cb.value);
            });
        }
        
        // Load locations
        if (setupData.locations && Array.isArray(setupData.locations)) {
            document.querySelectorAll('.location-checkbox').forEach(cb => {
                cb.checked = setupData.locations.includes(cb.value);
            });
            if (setupData.customLocations) {
                customLocations = setupData.customLocations;
                renderCustomLocations();
            }
        }
        
        // Load announcement types
        if (setupData.announcementTypes && Array.isArray(setupData.announcementTypes)) {
            document.querySelectorAll('.announcement-type-checkbox').forEach(cb => {
                cb.checked = setupData.announcementTypes.includes(cb.value);
            });
        }
        
        // Load priorities
        if (setupData.priorities && Array.isArray(setupData.priorities)) {
            document.querySelectorAll('.priority-checkbox').forEach(cb => {
                cb.checked = setupData.priorities.includes(cb.value);
            });
        }
        
        // Load audience groups
        if (setupData.audienceGroups && Array.isArray(setupData.audienceGroups)) {
            document.querySelectorAll('.audience-checkbox').forEach(cb => {
                cb.checked = setupData.audienceGroups.includes(cb.value);
            });
        }
        
        // Load recurring events
        if (setupData.recurringEvents && Array.isArray(setupData.recurringEvents)) {
            document.querySelectorAll('.recurring-checkbox').forEach(cb => {
                cb.checked = setupData.recurringEvents.includes(cb.value);
            });
        }
        
        return true; // Data loaded successfully
    } catch (e) {
        console.error('Error loading existing setup data:', e);
        return false;
    }
}

function renderCustomLocations() {
    const container = document.getElementById('customLocationsList');
    if (!container) return;
    
    container.innerHTML = '';
    customLocations.forEach(location => {
        const label = document.createElement('label');
        label.style.cssText = 'display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;';
        label.innerHTML = `
            <input type="checkbox" class="location-checkbox" value="${location}" checked>
            <span>${location}</span>
            <button type="button" onclick="removeCustomLocation('${location}')" style="margin-left: auto; background: #ef4444; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 12px;">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(label);
    });
}

function addCustomLocation() {
    const input = document.getElementById('customLocation');
    const location = input.value.trim();
    if (location && !customLocations.includes(location)) {
        customLocations.push(location);
        renderCustomLocations();
        input.value = '';
        saveCurrentStepData();
    }
}

function removeCustomLocation(location) {
    customLocations = customLocations.filter(l => l !== location);
    renderCustomLocations();
    saveCurrentStepData();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    try {
        console.log('Initializing Events & Announcements Setup Wizard...');
        loadExistingSetupData();
        // Ensure wizard is visible
        const wizardContainer = document.querySelector('.wizard-container');
        if (wizardContainer) {
            wizardContainer.style.display = 'flex';
            console.log('Wizard container found and made visible');
        } else {
            console.error('Wizard container not found!');
        }
        // Initialize to step 1
        goToSetupStep(1);
        console.log('Wizard initialized to step 1');
    } catch (error) {
        console.error('Error initializing wizard:', error);
    }
    
    // Add event listeners to auto-save data when form fields change
    document.querySelectorAll('.category-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 1) {
                saveCurrentStepData();
            }
        });
    });
    
    document.querySelectorAll('.location-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 2) {
                saveCurrentStepData();
            }
        });
    });
    
    document.querySelectorAll('.announcement-type-checkbox, .priority-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 3) {
                saveCurrentStepData();
            }
        });
    });
    
    document.querySelectorAll('.audience-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (currentSetupStep === 4) {
                saveCurrentStepData();
            }
        });
    });
    
    document.querySelectorAll('.recurring-checkbox').forEach(checkbox => {
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
        saveCurrentStepData();
        goToSetupStep(currentSetupStep - 1);
    }
}

// Save current step data to localStorage
function saveCurrentStepData() {
    try {
        const existingDataStr = localStorage.getItem('eventsAnnouncementsSetup');
        const setupData = existingDataStr ? JSON.parse(existingDataStr) : {};
        
        // Save data based on current step
        if (currentSetupStep === 1) {
            setupData.categories = Array.from(document.querySelectorAll('.category-checkbox:checked')).map(cb => cb.value);
        } else if (currentSetupStep === 2) {
            const selectedLocations = Array.from(document.querySelectorAll('.location-checkbox:checked')).map(cb => cb.value);
            setupData.locations = selectedLocations;
            setupData.customLocations = customLocations;
        } else if (currentSetupStep === 3) {
            setupData.announcementTypes = Array.from(document.querySelectorAll('.announcement-type-checkbox:checked')).map(cb => cb.value);
            setupData.priorities = Array.from(document.querySelectorAll('.priority-checkbox:checked')).map(cb => cb.value);
        } else if (currentSetupStep === 4) {
            setupData.audienceGroups = Array.from(document.querySelectorAll('.audience-checkbox:checked')).map(cb => cb.value);
        } else if (currentSetupStep === 5) {
            setupData.recurringEvents = Array.from(document.querySelectorAll('.recurring-checkbox:checked')).map(cb => cb.value);
        }
        
        // Save to localStorage
        localStorage.setItem('eventsAnnouncementsSetup', JSON.stringify(setupData));
    } catch (e) {
        console.error('Error saving step data:', e);
    }
}

function handleNextSetupStep() {
    // Validate current step
    if (currentSetupStep === 1) {
        const selectedCategories = Array.from(document.querySelectorAll('.category-checkbox:checked'));
        if (selectedCategories.length === 0) {
            alert('Please select at least one event category');
            return;
        }
    } else if (currentSetupStep === 2) {
        const selectedLocations = Array.from(document.querySelectorAll('.location-checkbox:checked'));
        if (selectedLocations.length === 0 && customLocations.length === 0) {
            alert('Please select at least one location or add a custom location');
            return;
        }
    } else if (currentSetupStep === 3) {
        const selectedTypes = Array.from(document.querySelectorAll('.announcement-type-checkbox:checked'));
        const selectedPriorities = Array.from(document.querySelectorAll('.priority-checkbox:checked'));
        if (selectedTypes.length === 0) {
            alert('Please select at least one announcement type');
            return;
        }
        if (selectedPriorities.length === 0) {
            alert('Please select at least one priority level');
            return;
        }
    } else if (currentSetupStep === 4) {
        const selectedAudiences = Array.from(document.querySelectorAll('.audience-checkbox:checked'));
        if (selectedAudiences.length === 0) {
            alert('Please select at least one audience group');
            return;
        }
    } else if (currentSetupStep === 5) {
        const selectedRecurring = Array.from(document.querySelectorAll('.recurring-checkbox:checked'));
        if (selectedRecurring.length === 0) {
            alert('Please select at least one recurring event type');
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
    const selectedRecurring = Array.from(document.querySelectorAll('.recurring-checkbox:checked'));
    if (selectedRecurring.length === 0) {
        alert('Please select at least one recurring event type');
        return;
    }
    
    // Collect all setup data
    const setupData = {
        categories: Array.from(document.querySelectorAll('.category-checkbox:checked')).map(cb => ({
            name: cb.value,
            color: cb.getAttribute('data-color') || '#10b981'
        })),
        locations: Array.from(document.querySelectorAll('.location-checkbox:checked')).map(cb => cb.value),
        customLocations: customLocations,
        announcementTypes: Array.from(document.querySelectorAll('.announcement-type-checkbox:checked')).map(cb => cb.value),
        priorities: Array.from(document.querySelectorAll('.priority-checkbox:checked')).map(cb => cb.value),
        audienceGroups: Array.from(document.querySelectorAll('.audience-checkbox:checked')).map(cb => cb.value),
        recurringEvents: Array.from(document.querySelectorAll('.recurring-checkbox:checked')).map(cb => cb.value)
    };
    
    // Save to localStorage
    try {
        localStorage.setItem('eventsAnnouncementsSetup', JSON.stringify(setupData));
        localStorage.setItem('eventsAnnouncementsSetupCompleted', 'true');
    } catch (e) {
        console.error('Error saving setup data:', e);
    }
    
    // Show success notification
    showSuccessNotification(`Events & Announcements setup completed successfully! Configured ${setupData.categories.length} Categories, ${setupData.locations.length + setupData.customLocations.length} Locations, ${setupData.announcementTypes.length} Announcement Types, ${setupData.audienceGroups.length} Audience Groups, and ${setupData.recurringEvents.length} Recurring Event Templates.`);
    
    // Redirect to event planner page after a short delay
    setTimeout(() => {
        window.location.href = '/admin/event-planner?setup=completed';
    }, 2000);
}

// Make functions globally available for onclick handlers
window.goToSetupStep = goToSetupStep;
window.goToPreviousSetupStep = goToPreviousSetupStep;
window.handleNextSetupStep = handleNextSetupStep;
window.completeSetup = completeSetup;
window.addCustomLocation = addCustomLocation;
window.removeCustomLocation = removeCustomLocation;
</script>

<style>
/* Wizard Styles - Reuse from academic setup with green theme */
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

.step-label {
    font-size: 13px;
    font-weight: 500;
    color: #6b7280;
    text-align: center;
    white-space: nowrap;
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
    border: 2px solid #10b981;
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
    color: #10b981;
    font-weight: bold;
    font-size: 20px;
}

.sidebar-help {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px;
    background: #ecfdf5;
    border-radius: 6px;
    font-size: 13px;
    color: #059669;
}

.sidebar-help i {
    color: #10b981;
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
    background: #10b981;
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
    background: #059669;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
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

/* Checkbox styling */
.category-checkbox:checked + span,
.location-checkbox:checked + span,
.announcement-type-checkbox:checked + span,
.priority-checkbox:checked + span,
.audience-checkbox:checked + span,
.recurring-checkbox:checked + span {
    font-weight: 600;
    color: #10b981;
}

label:has(.category-checkbox:checked),
label:has(.location-checkbox:checked),
label:has(.announcement-type-checkbox:checked),
label:has(.priority-checkbox:checked),
label:has(.audience-checkbox:checked),
label:has(.recurring-checkbox:checked) {
    border-color: #10b981 !important;
    background: #ecfdf5;
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
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
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
label:has(.category-checkbox),
label:has(.location-checkbox),
label:has(.announcement-type-checkbox),
label:has(.priority-checkbox),
label:has(.audience-checkbox),
label:has(.recurring-checkbox) {
    transition: all 0.2s ease;
}

label:has(.category-checkbox:hover),
label:has(.location-checkbox:hover),
label:has(.announcement-type-checkbox:hover),
label:has(.priority-checkbox:hover),
label:has(.audience-checkbox:hover),
label:has(.recurring-checkbox:hover) {
    border-color: #10b981 !important;
    background: #f0fdf4;
    transform: translateY(-2px);
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.15);
}

/* Step indicator animations */
.wizard-step-item.active .step-indicator {
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }
    50% {
        box-shadow: 0 2px 16px rgba(16, 185, 129, 0.5);
    }
}

/* Form input enhancements */
.form-input:focus,
.form-select:focus {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
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

