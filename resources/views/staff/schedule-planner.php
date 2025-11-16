<?php
$pageTitle = 'Smart Campus Nova Hub - Schedule Planner';
$pageIcon = 'fas fa-clock';
$pageHeading = 'Schedule Planner';
$activePage = 'schedule-planner';

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

<!-- Create Schedule Section -->
<div class="simple-section">
    <div class="simple-header">
            <h3>Create New Schedule</h3>
        </div>
        
    <div class="form-section">
        <div class="form-row">
            <div class="form-group" style="flex:2;">
                <label for="classSelect">Choose Class:</label>
                <select id="classSelect" class="form-select">
                    <option value="">Select a class...</option>
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
            <div class="form-group">
                <label>&nbsp;</label>
                <button class="simple-btn primary" onclick="createSchedule()">
                <i class="fas fa-plus"></i> Create Schedule
            </button>
            </div>
        </div>
    </div>
</div>

<!-- Schedules List -->
<div class="simple-section" style="margin-top:12px;">
    <div class="simple-header">
        <h4>Schedules</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Status</th>
                    <th>Changes</th>
                    <th>Last Change</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="scheduleListBody">
                <tr class="no-schedule-row"><td colspan="3">No schedules yet</td></tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Schedules Container (Inline) -->
<div id="schedulesContainer"></div>

<!-- Subject Selection Modal -->
<div id="subjectModal" class="subject-modal" style="display:none;">
    <div class="subject-modal-content">
        <div class="subject-modal-header">
            <h4>Select Subject & Teacher</h4>
            <button class="icon-btn" onclick="closeSubjectModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="subject-modal-body">
            <input type="text" class="search-input" id="subjectSearch" placeholder="Search subjects or teachers..." onkeyup="filterSubjects()">
            <div class="subject-cards-grid" id="subjectCardsGrid">
                <!-- Subject cards will be populated here -->
            </div>
        </div>
        </div>
    </div>
    
<!-- Time Period Settings Modal -->
<div id="settingsModal" class="settings-modal" style="display:none;">
    <div class="settings-modal-content">
        <div class="settings-modal-header">
            <h4>Time Period Settings</h4>
            <button class="icon-btn" onclick="closeSettingsDialog()"><i class="fas fa-times"></i></button>
        </div>
        <div class="settings-modal-body">
            <div class="settings-section">
                <h5>School Timings</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label>School Start Time</label>
                        <input type="time" class="form-input" id="schoolStart" value="08:00">
                    </div>
                    <div class="form-group">
                        <label>School End Time</label>
                        <input type="time" class="form-input" id="schoolEnd" value="15:00">
                    </div>
                </div>
            </div>

            <div class="settings-section">
                <h5>Period Duration</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label>Minutes per Period</label>
                        <input type="number" class="form-input" id="periodDuration" value="60" min="30" max="120">
                    </div>
                    <div class="form-group">
                        <label>Break Duration (minutes)</label>
                        <input type="number" class="form-input" id="breakDuration" value="10" min="0" max="60">
                    </div>
                </div>
            </div>

            <div class="settings-section">
                <h5>Active Days</h5>
                <div class="days-selector">
                    <button class="day-toggle active" data-day="mon">Mon</button>
                    <button class="day-toggle active" data-day="tue">Tue</button>
                    <button class="day-toggle active" data-day="wed">Wed</button>
                    <button class="day-toggle active" data-day="thu">Thu</button>
                    <button class="day-toggle active" data-day="fri">Fri</button>
                    <button class="day-toggle" data-day="sat">Sat</button>
                    <button class="day-toggle" data-day="sun">Sun</button>
                </div>
            </div>

            <div class="dialog-actions">
                <button class="simple-btn primary" onclick="applySettings()"><i class="fas fa-check"></i> Apply Settings</button>
                <button class="simple-btn secondary" onclick="closeSettingsDialog()"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<style>
/* Inline Periods Editor */
.periods-inline {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 6px;
    align-items: center;
}

.period-input {
    padding: 6px 12px;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.85rem;
    min-width: 160px;
    transition: all 0.2s;
    cursor: pointer;
}

.period-input:hover {
    border-color: #1976d2;
    background: #f0f7ff;
}

.period-input.break-period {
    background: #fff3e0;
    border-color: #ffb74d;
    color: #e65100;
}

.period-card {
    position: relative;
    display: inline-block;
}

.period-input {
    padding-right: 32px; /* Make room for close button */
}

.period-close-btn {
    position: absolute;
    top: 50%;
    right: 4px;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: none;
    background: #ff4444;
    color: white;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    transition: all 0.2s ease;
    opacity: 0.8;
}

.period-close-btn:hover {
    background: #cc0000;
    opacity: 1;
    transform: translateY(-50%) scale(1.1);
}

.period-close-btn:active {
    transform: translateY(-50%) scale(0.95);
}

/* Status Badges */
.status-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.draft {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.status-badge.saved {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-badge.published {
    background: #cce5ff;
    color: #004085;
    border: 1px solid #b3d7ff;
}

/* Schedule Modal */
.schedule-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.schedule-modal-content {
    background: white;
    border-radius: 12px;
    width: 90%;
    max-width: 1200px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.schedule-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #e0e0e0;
}

.schedule-modal-header h4 {
    margin: 0;
    color: #333;
    font-size: 1.25rem;
}

.schedule-modal-body {
    padding: 24px;
}

.schedule-modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    padding: 20px 24px;
    border-top: 1px solid #e0e0e0;
    background: #f8f9fa;
    border-radius: 0 0 12px 12px;
}

/* Subject Info in Grid */
.subject-info {
    padding: 4px;
    font-size: 0.75rem;
    line-height: 1.2;
}

.subject-name {
    font-weight: 600;
    color: #333;
    margin-bottom: 2px;
}

.subject-teacher {
    color: #666;
    font-size: 0.7rem;
    margin-bottom: 1px;
}

.subject-room {
    color: #888;
    font-size: 0.65rem;
}

/* Changes pill in table */
.changes-pill {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}
.changes-pill.warning {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

/* Time Picker Modal */
.time-picker-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1001;
}

.time-picker-content {
    background: #fff;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.time-picker-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
    background: #f8f9fa;
}

.time-picker-header h4 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
}

.time-picker-body {
    padding: 20px;
}

.add-period-compact {
    padding: 6px 12px;
    background: #fff;
    border: 2px dashed #ccc;
    border-radius: 6px;
    color: #666;
    cursor: pointer;
    font-size: 0.85rem;
    transition: all 0.2s;
}

.add-period-compact:hover {
    border-color: #1976d2;
    color: #1976d2;
}

/* Schedule Table Inline */
.schedule-table-inline {
    width: 100%;
    border-collapse: collapse;
}

.schedule-table-inline th {
    background: #f8f9fa;
    padding: 10px;
    text-align: center;
    font-weight: 600;
    font-size: 0.9rem;
    color: #333;
    border: 1px solid #e0e0e0;
}

.schedule-table-inline td {
    border: 1px solid #e0e0e0;
    padding: 10px;
    text-align: center;
}

.schedule-table-inline td.period-label {
    background: #f8f9fa;
    font-weight: 600;
    font-size: 0.85rem;
}

.schedule-table-inline td.schedule-slot {
    cursor: pointer;
    transition: all 0.2s;
    min-height: 50px;
    color: #ccc;
}

.schedule-table-inline td.schedule-slot:hover {
    background: #f0f7ff;
}

.schedule-table-inline td.schedule-slot.assigned {
    background: #e3f2fd;
}

/* Subject Modal */
.subject-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1001;
}

.subject-modal-content {
    background: #fff;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.subject-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
}

.subject-modal-header h4 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
}

.subject-modal-body {
    padding: 20px;
    overflow-y: auto;
}

.search-input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.9rem;
    margin-bottom: 16px;
}

.subject-cards-grid {
    display: grid;
    gap: 10px;
}

.subject-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #fff;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s;
}

.subject-card:hover {
    border-color: #1976d2;
    background: #f0f7ff;
}

.subject-icon {
    width: 40px;
    height: 40px;
    background: #e3f2fd;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.subject-info {
    flex: 1;
}

.subject-name {
    font-weight: 600;
    color: #333;
    font-size: 0.95rem;
}

.subject-teacher {
    font-size: 0.85rem;
    color: #666;
}

/* Settings Modal */
.settings-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1002;
}

.settings-modal-content {
    background: #fff;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
}

.settings-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
    background: #f8f9fa;
}

.settings-modal-header h4 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
}

.settings-modal-body {
    padding: 20px;
}

.settings-section {
    margin-bottom: 24px;
}

.settings-section h5 {
    margin: 0 0 12px 0;
    font-size: 1rem;
    color: #333;
}

.days-selector {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.day-toggle {
    padding: 8px 16px;
    background: #f5f5f5;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    color: #666;
    transition: all 0.2s;
}

.day-toggle:hover {
    background: #ebebeb;
}

.day-toggle.active {
    background: #e3f2fd;
    border-color: #1976d2;
    color: #1976d2;
}

.dialog-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}
</style>

<script>
let currentCell = null;
let currentScheduleId = null;

// Mock schedule data for the list table
const mockSchedules = [
    {
        id: 'SCH001',
        className: 'Grade 9-A',
        status: 'published',
        statusText: 'Published',
        createdAt: '2025-01-15',
        lastEditedAt: '2025-01-15T09:00:00Z',
        lastPublishedAt: '2025-01-15T09:05:00Z',
        hasUnpublishedChanges: false,
        periods: [
            { label: 'Period 1', time: '08:00-09:00', type: 'period' },
            { label: 'Period 2', time: '09:00-10:00', type: 'period' },
            { label: 'Break', time: '10:00-10:30', type: 'break' },
            { label: 'Period 3', time: '10:30-11:30', type: 'period' },
            { label: 'Period 4', time: '11:30-12:30', type: 'period' }
        ],
        schedule: {
            '0-0': { subject: 'Mathematics', teacher: 'Daw Khin Khin', room: 'A101' },
            '0-1': { subject: 'English', teacher: 'Ms. Sarah Johnson', room: 'A102' },
            '0-2': { subject: 'Physics', teacher: 'U Aung Myint', room: 'LAB001' },
            '0-3': { subject: 'Chemistry', teacher: 'Daw Mya Mya', room: 'LAB002' },
            '1-0': { subject: 'Biology', teacher: 'U Zaw Win', room: 'LAB003' },
            '1-1': { subject: 'Myanmar', teacher: 'Daw Aye Aye', room: 'A103' },
            '1-2': { subject: 'History', teacher: 'U Kyaw Soe', room: 'A104' },
            '1-3': { subject: 'Geography', teacher: 'Daw Nu Nu', room: 'A105' },
            '3-0': { subject: 'Mathematics', teacher: 'Daw Khin Khin', room: 'A101' },
            '3-1': { subject: 'English', teacher: 'Ms. Sarah Johnson', room: 'A102' },
            '3-2': { subject: 'Physics', teacher: 'U Aung Myint', room: 'LAB001' },
            '3-3': { subject: 'Chemistry', teacher: 'Daw Mya Mya', room: 'LAB002' },
            '4-0': { subject: 'Biology', teacher: 'U Zaw Win', room: 'LAB003' },
            '4-1': { subject: 'Myanmar', teacher: 'Daw Aye Aye', room: 'A103' },
            '4-2': { subject: 'History', teacher: 'U Kyaw Soe', room: 'A104' },
            '4-3': { subject: 'Geography', teacher: 'Daw Nu Nu', room: 'A105' }
        }
    },
    {
        id: 'SCH002', 
        className: 'Grade 10-B',
        status: 'draft',
        statusText: 'Draft',
        createdAt: '2025-01-14',
        lastEditedAt: '2025-01-14T10:00:00Z',
        lastPublishedAt: null,
        hasUnpublishedChanges: true,
        periods: [
            { label: 'Period 1', time: '08:00-09:00', type: 'period' },
            { label: 'Period 2', time: '09:00-10:00', type: 'period' },
            { label: 'Break', time: '10:00-10:30', type: 'break' },
            { label: 'Period 3', time: '10:30-11:30', type: 'period' },
            { label: 'Period 4', time: '11:30-12:30', type: 'period' }
        ],
        schedule: {
            '0-0': { subject: 'Advanced Mathematics', teacher: 'Dr. Anderson', room: 'A201' },
            '0-1': { subject: 'Literature', teacher: 'Ms. Garcia', room: 'A202' },
            '1-0': { subject: 'Physics', teacher: 'Dr. Lee', room: 'LAB003' },
            '1-1': { subject: 'Chemistry', teacher: 'Ms. Martinez', room: 'LAB004' },
            '3-0': { subject: 'Programming', teacher: 'Mr. Kim', room: 'LAB005' },
            '3-1': { subject: 'Art', teacher: 'Ms. Rodriguez', room: 'ART001' }
        }
    }
];

const subjectsDatabase = [
    {name: 'Mathematics', teacher: 'Daw Khin Khin', icon: '📐', color: '#4285f4'},
    {name: 'English', teacher: 'Ms. Sarah Johnson', icon: '📚', color: '#34a853'},
    {name: 'Physics', teacher: 'U Aung Myint', icon: '⚛️', color: '#fbbc04'},
    {name: 'Chemistry', teacher: 'Daw Mya Mya', icon: '🧪', color: '#ea4335'},
    {name: 'Biology', teacher: 'U Zaw Win', icon: '🔬', color: '#9e9e9e'},
    {name: 'Myanmar', teacher: 'Daw Aye Aye', icon: '📖', color: '#8e24aa'},
    {name: 'History', teacher: 'U Kyaw Soe', icon: '📜', color: '#00796b'},
    {name: 'Geography', teacher: 'Daw Nu Nu', icon: '🌍', color: '#f57c00'}
];

// Initialize page with mock data
document.addEventListener('DOMContentLoaded', function() {
    populateScheduleList();
});

function formatChangesPill(schedule) {
    if (schedule.status === 'published' && schedule.hasUnpublishedChanges) {
        return '<span class="changes-pill warning">Unpublished changes</span>';
    }
    return '—';
}

function formatLastChange(schedule) {
    const edited = schedule.lastEditedAt ? new Date(schedule.lastEditedAt) : null;
    const published = schedule.lastPublishedAt ? new Date(schedule.lastPublishedAt) : null;
    if (schedule.status === 'published') {
        if (schedule.hasUnpublishedChanges && edited) {
            return `Edited ${edited.toLocaleString()}`;
        }
        if (published) {
            return `Published ${published.toLocaleString()}`;
        }
    } else {
        if (edited) {
            return `Edited ${edited.toLocaleString()}`;
        }
    }
    return '—';
}

function populateScheduleList() {
    const body = document.getElementById('scheduleListBody');
    const noRow = body.querySelector('.no-schedule-row');
    
    if (noRow) {
        noRow.remove();
    }
    
    // Add mock schedule rows
    mockSchedules.forEach(schedule => {
        const tr = document.createElement('tr');
        tr.dataset.scheduleId = schedule.id;
        tr.innerHTML = `
            <td><strong>${schedule.className}</strong></td>
            <td><span class="status-badge ${schedule.status === 'published' ? 'published' : 'draft'}">${schedule.status === 'published' ? 'Published' : 'Draft'}</span></td>
            <td class="changes-cell">${formatChangesPill(schedule)}</td>
            <td class="last-change-cell">${formatLastChange(schedule)}</td>
            <td></td>
        `;
        body.appendChild(tr);
        updateRowActionsForStatus(tr, schedule.status === 'published' ? 'published' : 'draft');
    });
}

function createSchedule() {
    const classSelect = document.getElementById('classSelect');
    const className = classSelect.value;
    
    if (!className) {
        alert('Please select a class');
        return;
    }
    
    const scheduleId = 'schedule-' + Date.now();
    const container = document.getElementById('schedulesContainer');
    
    const scheduleHTML = `
        <div class="simple-section" id="${scheduleId}" style="margin-top:16px;">
            <div class="simple-header">
                    <h3>${className}</h3>
                <div class="simple-actions">
                    <button class="simple-btn" onclick="openSettingsDialog('${scheduleId}')"><i class="fas fa-cog"></i> Settings</button>
                    <button class="simple-btn secondary" onclick="saveSchedule('${scheduleId}')"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
            
            <div class="form-section">
                <div class="periods-inline" id="periods-${scheduleId}">
                    <div class="period-card">
                    <input type="text" class="period-input" value="Period 1: 08:00-09:00" onclick="editPeriodTime(this, '${scheduleId}', 0)" readonly />
                        <button class="period-close-btn" onclick="removePeriod('${scheduleId}', 0)" title="Remove Period">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="period-card">
                    <input type="text" class="period-input" value="Period 2: 09:00-10:00" onclick="editPeriodTime(this, '${scheduleId}', 1)" readonly />
                        <button class="period-close-btn" onclick="removePeriod('${scheduleId}', 1)" title="Remove Period">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="period-card">
                    <input type="text" class="period-input" value="Period 3: 10:00-11:00" onclick="editPeriodTime(this, '${scheduleId}', 2)" readonly />
                        <button class="period-close-btn" onclick="removePeriod('${scheduleId}', 2)" title="Remove Period">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="period-card">
                    <input type="text" class="period-input" value="Period 4: 11:00-12:00" onclick="editPeriodTime(this, '${scheduleId}', 3)" readonly />
                        <button class="period-close-btn" onclick="removePeriod('${scheduleId}', 3)" title="Remove Period">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <button class="add-period-compact" onclick="addPeriod('${scheduleId}', 'period')">
                        <i class="fas fa-plus"></i> Period
                    </button>
                    <button class="add-period-compact" onclick="addPeriod('${scheduleId}', 'break')">
                        <i class="fas fa-coffee"></i> Break
                    </button>
                </div>
            </div>
            
            <div class="simple-table-container">
                <table class="schedule-table-inline">
                    <thead>
                        <tr>
                            <th style="width:100px;">Period</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                    </thead>
                    <tbody id="grid-${scheduleId}">
                        <tr>
                            <td class="period-label">Period 1<br><small>08:00-09:00</small></td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 0, 0)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 0, 1)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 0, 2)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 0, 3)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 0, 4)">+</td>
                        </tr>
                        <tr>
                            <td class="period-label">Period 2<br><small>09:00-10:00</small></td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 1, 0)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 1, 1)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 1, 2)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 1, 3)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 1, 4)">+</td>
                        </tr>
                        <tr>
                            <td class="period-label">Period 3<br><small>10:00-11:00</small></td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 2, 0)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 2, 1)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 2, 2)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 2, 3)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 2, 4)">+</td>
                        </tr>
                        <tr>
                            <td class="period-label">Period 4<br><small>11:00-12:00</small></td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 3, 0)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 3, 1)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 3, 2)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 3, 3)">+</td>
                            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', 3, 4)">+</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', scheduleHTML);
    
    // Update list
    const body = document.getElementById('scheduleListBody');
    const noRow = body.querySelector('.no-schedule-row');
    if (noRow) noRow.remove();
    
    const tr = document.createElement('tr');
    tr.dataset.scheduleId = scheduleId;
    tr.innerHTML = `
        <td><strong>${className}</strong></td>
        <td><span class="status-badge draft">Draft</span></td>
        <td class="changes-cell">—</td>
        <td class="last-change-cell">Just now</td>
        <td></td>
    `;
    body.appendChild(tr);
    updateRowActionsForStatus(tr, 'draft');
    
    classSelect.value = '';
    document.getElementById(scheduleId).scrollIntoView({behavior: 'smooth'});
}

function openSubjectModal(cell, scheduleId, periodIdx, dayIdx) {
    currentCell = cell;
    currentScheduleId = scheduleId;
    document.getElementById('subjectModal').style.display = 'flex';
    renderSubjectCards();
}

function closeSubjectModal() {
    document.getElementById('subjectModal').style.display = 'none';
    currentCell = null;
}

function renderSubjectCards() {
    const grid = document.getElementById('subjectCardsGrid');
    grid.innerHTML = '';
    
    subjectsDatabase.forEach(subject => {
        const card = document.createElement('div');
        card.className = 'subject-card';
        card.onclick = () => assignSubject(subject);
        card.innerHTML = `
            <div class="subject-icon" style="background: ${subject.color}20">${subject.icon}</div>
            <div class="subject-info">
                <div class="subject-name">${subject.name}</div>
                <div class="subject-teacher">${subject.teacher}</div>
            </div>
        `;
        grid.appendChild(card);
    });
}

function filterSubjects() {
    const search = document.getElementById('subjectSearch').value.toLowerCase();
    const cards = document.querySelectorAll('.subject-card');
    cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        card.style.display = text.includes(search) ? 'flex' : 'none';
    });
}

function assignSubject(subject) {
    if (!currentCell || !currentScheduleId) return;
    
    // Get period and day indices from the cell's onclick attribute
    const onclickAttr = currentCell.getAttribute('onclick');
    const match = onclickAttr.match(/openSubjectModal\(this, '[^']+', (\d+), (\d+)\)/);
    
    if (!match) return;
    
    const periodIndex = parseInt(match[1]);
    const dayIndex = parseInt(match[2]);
    
    // Update the cell display
    currentCell.classList.add('assigned');
    currentCell.innerHTML = `
        <div class="subject-info">
            <div class="subject-name">${subject.name}</div>
            <div class="subject-teacher">${subject.teacher}</div>
            <div class="subject-room">Room TBD</div>
        </div>
    `;
    currentCell.style.background = '#e8f5e8';
    
    closeSubjectModal();
}

function openSettingsDialog(scheduleId) {
    currentScheduleId = scheduleId;
    document.getElementById('settingsModal').style.display = 'flex';
}

function closeSettingsDialog() {
    document.getElementById('settingsModal').style.display = 'none';
}

function applySettings() {
    alert('Settings applied!');
    closeSettingsDialog();
}

function saveSchedule(scheduleId) {
    showActionStatus('Draft saved', 'success');
}

function updateRowActionsForStatus(row, status) {
    const actionsCell = row.querySelector('td:last-child');
    const scheduleId = row.dataset.scheduleId;
    if (!actionsCell) return;
    if (status === 'published') {
        actionsCell.innerHTML = `
            <button class="simple-btn-icon" onclick="viewSchedule('${scheduleId}')" title="View Schedule"><i class="fas fa-eye"></i></button>
            <button class="simple-btn-icon" onclick="publishOrUpdate('${scheduleId}')" title="Update Changes"><i class="fas fa-upload"></i></button>
            <button class="simple-btn-icon" onclick="removeSchedule('${scheduleId}')" title="Remove Schedule"><i class="fas fa-trash"></i></button>
        `;
    } else {
        actionsCell.innerHTML = `
            <button class="simple-btn-icon" onclick="viewSchedule('${scheduleId}')" title="View Schedule"><i class="fas fa-eye"></i></button>
            <button class="simple-btn-icon" onclick="publishOrUpdate('${scheduleId}')" title="Publish Schedule"><i class="fas fa-bullhorn"></i></button>
            <button class="simple-btn-icon" onclick="removeSchedule('${scheduleId}')" title="Remove Schedule"><i class="fas fa-trash"></i></button>
        `;
    }
}

// Day toggle
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('day-toggle')) {
        e.target.classList.toggle('active');
    }
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>
