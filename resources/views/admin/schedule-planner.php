<?php
$pageTitle = 'Smart Campus Nova Hub - Schedule Planner';
$pageIcon = 'fas fa-clock';
$pageHeading = 'Schedule Planner';
$activePage = 'schedule';

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
                <button class="simple-btn secondary" onclick="closeSettingsDialog()">Cancel</button>
                <button class="simple-btn primary" onclick="applySettings()"><i class="fas fa-check"></i> Apply Settings</button>
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
    background: #fff;
    border-radius: 8px;
    width: 95%;
    max-width: 1200px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.schedule-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px 24px;
    border-bottom: 1px solid #e0e0e0;
    background: #f8f9fa;
}

.header-left h3 {
    margin: 0;
    font-size: 1.3rem;
    color: #333;
}

.header-left p {
    margin: 4px 0 0 0;
    font-size: 0.9rem;
    color: #666;
}

.header-right {
    display: flex;
    gap: 8px;
}

.icon-btn {
    background: none;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 4px;
    color: #666;
    transition: all 0.2s;
}

.icon-btn:hover {
    background: #e0e0e0;
    color: #333;
}

/* Steps */
.schedule-step {
    padding: 24px;
}

.step-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
}

.step-number {
    width: 32px;
    height: 32px;
    background: #1976d2;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.step-header h4 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
}

.btn-link {
    background: none;
    border: none;
    color: #1976d2;
    cursor: pointer;
    font-size: 0.9rem;
    margin-left: auto;
}

.btn-link:hover {
    text-decoration: underline;
}

/* Class Grid */
.class-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 12px;
}

.class-card {
    background: #fff;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 16px;
    cursor: pointer;
    transition: all 0.2s;
    text-align: left;
}

.class-card:hover {
    border-color: #1976d2;
    background: #f0f7ff;
}

.class-card-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
}

.class-card-meta {
    font-size: 0.85rem;
    color: #666;
}

/* Time Editor Compact */
.time-editor-compact {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 6px;
}

.time-slot-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s;
}

.time-slot-item:hover {
    border-color: #1976d2;
    background: #f0f7ff;
}

.slot-label {
    font-weight: 600;
    font-size: 0.85rem;
    color: #333;
}

.slot-time {
    font-size: 0.85rem;
    color: #666;
}

.time-slot-item i {
    font-size: 0.75rem;
    color: #999;
}

.add-period-btn {
    padding: 8px 12px;
    background: #fff;
    border: 2px dashed #ccc;
    border-radius: 6px;
    color: #666;
    cursor: pointer;
    font-size: 0.85rem;
    transition: all 0.2s;
}

.add-period-btn:hover {
    border-color: #1976d2;
    color: #1976d2;
}

/* Schedule Grid */
.schedule-grid-container {
    overflow-x: auto;
    margin-bottom: 20px;
}

.schedule-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
}

.schedule-table th {
    background: #f8f9fa;
    padding: 12px;
    text-align: center;
    font-weight: 600;
    font-size: 0.9rem;
    color: #333;
    border: 1px solid #e0e0e0;
}

.schedule-table .period-col {
    width: 120px;
    background: #fff;
}

.schedule-table td {
    padding: 12px;
    border: 1px solid #e0e0e0;
    text-align: center;
    min-height: 60px;
    position: relative;
}

.schedule-table td.period-cell {
    background: #f8f9fa;
    font-weight: 600;
    font-size: 0.85rem;
}

.schedule-table td.slot-cell {
    cursor: pointer;
    transition: all 0.2s;
}

.schedule-table td.slot-cell:hover {
    background: #f0f7ff;
}

.schedule-table td.slot-cell.assigned {
    background: #e3f2fd;
}

.subject-pill {
    display: inline-block;
    padding: 6px 12px;
    background: #1976d2;
    color: #fff;
    border-radius: 16px;
    font-size: 0.85rem;
    font-weight: 500;
}

.teacher-name {
    display: block;
    font-size: 0.75rem;
    color: #666;
    margin-top: 2px;
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
                    <button class="simple-btn-icon" onclick="removeSchedule('${scheduleId}')"><i class="fas fa-times"></i></button>
                </div>
            </div>
            
            <div class="form-section">
                <div class="periods-inline" id="periods-${scheduleId}">
                    <input type="text" class="period-input" value="Period 1: 08:00-09:00" onclick="editPeriodTime(this, '${scheduleId}', 0)" readonly />
                    <input type="text" class="period-input" value="Period 2: 09:00-10:00" onclick="editPeriodTime(this, '${scheduleId}', 1)" readonly />
                    <input type="text" class="period-input" value="Period 3: 10:00-11:00" onclick="editPeriodTime(this, '${scheduleId}', 2)" readonly />
                    <input type="text" class="period-input" value="Period 4: 11:00-12:00" onclick="editPeriodTime(this, '${scheduleId}', 3)" readonly />
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
        <td>
            <button class="simple-btn-icon" onclick="viewSchedule('${scheduleId}')" title="View Schedule"><i class="fas fa-eye"></i></button>
            <button class="simple-btn-icon" onclick="removeSchedule('${scheduleId}')" title="Remove Schedule"><i class="fas fa-trash"></i></button>
        </td>
    `;
    body.appendChild(tr);
    
    classSelect.value = '';
    document.getElementById(scheduleId).scrollIntoView({behavior: 'smooth'});
}

function updatePeriod(input, scheduleId, periodIdx) {
    const value = input.value;
    const match = value.match(/(.+?):\s*(\d+:\d+)-(\d+:\d+)/);
    
    if (match) {
        const label = match[1].trim();
        const startTime = match[2];
        const endTime = match[3];
        
        // Update grid
        const grid = document.getElementById(`grid-${scheduleId}`);
        const row = grid.rows[periodIdx];
        if (row) {
            const isBreak = label.toLowerCase().includes('break');
            if (isBreak) {
                row.cells[0].innerHTML = `${label}<br><small>${startTime}-${endTime}</small>`;
                row.cells[0].style.background = '#fff3e0';
                row.cells[0].style.color = '#e65100';
                // Hide all schedule slots for break
                for (let i = 1; i < row.cells.length; i++) {
                    row.cells[i].style.background = '#fafafa';
                    row.cells[i].innerHTML = '-';
                    row.cells[i].onclick = null;
                    row.cells[i].style.cursor = 'default';
                }
                input.classList.add('break-period');
            } else {
                row.cells[0].innerHTML = `${label}<br><small>${startTime}-${endTime}</small>`;
                row.cells[0].style.background = '#f8f9fa';
                row.cells[0].style.color = '#333';
                input.classList.remove('break-period');
            }
        }
    }
}

function editPeriodTime(input, scheduleId, periodIdx) {
    const value = input.value;
    const match = value.match(/(.+?):\s*(\d+:\d+)-(\d+:\d+)/);
    
    if (!match) return;
    
    const label = match[1].trim();
    const currentStart = match[2];
    const currentEnd = match[3];
    
    // Create time picker modal
    const modal = document.createElement('div');
    modal.className = 'time-picker-modal';
    modal.innerHTML = `
        <div class="time-picker-content">
            <div class="time-picker-header">
                <h4>Edit ${label}</h4>
                <button onclick="this.closest('.time-picker-modal').remove()" class="icon-btn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="time-picker-body">
                <div class="form-row">
                    <div class="form-group">
                        <label>Period Name</label>
                        <input type="text" class="form-input" id="periodLabel" value="${label}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" class="form-input" id="periodStart" value="${currentStart}">
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" class="form-input" id="periodEnd" value="${currentEnd}">
                    </div>
                </div>
                <div class="form-actions">
                    <button class="simple-btn secondary" onclick="this.closest('.time-picker-modal').remove()">Cancel</button>
                    <button class="simple-btn primary" onclick="savePeriodTime('${scheduleId}', ${periodIdx}, this)">
                        <i class="fas fa-check"></i> Save
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
}

function savePeriodTime(scheduleId, periodIdx, btn) {
    const modal = btn.closest('.time-picker-modal');
    const label = modal.querySelector('#periodLabel').value.trim();
    const startTime = modal.querySelector('#periodStart').value;
    const endTime = modal.querySelector('#periodEnd').value;
    
    if (!label || !startTime || !endTime) {
        alert('Please fill all fields');
        return;
    }
    
    // Update the input
    const container = document.getElementById(`periods-${scheduleId}`);
    const inputs = container.querySelectorAll('.period-input');
    if (inputs[periodIdx]) {
        inputs[periodIdx].value = `${label}: ${startTime}-${endTime}`;
        updatePeriod(inputs[periodIdx], scheduleId, periodIdx);
    }
    
    modal.remove();
}

function addPeriod(scheduleId, type) {
    const container = document.getElementById(`periods-${scheduleId}`);
    const grid = document.getElementById(`grid-${scheduleId}`);
    const inputs = container.querySelectorAll('.period-input');
    const periodNum = inputs.length + 1;
    
    const input = document.createElement('input');
    input.type = 'text';
    input.className = 'period-input';
    input.readOnly = true;
    
    if (type === 'break') {
        input.value = `Break: 12:00-12:30`;
        input.classList.add('break-period');
    } else {
        input.value = `Period ${periodNum}: 12:00-13:00`;
    }
    
    input.onclick = () => editPeriodTime(input, scheduleId, periodNum - 1);
    
    const buttons = container.querySelectorAll('.add-period-compact');
    container.insertBefore(input, buttons[0]);
    
    const row = document.createElement('tr');
    if (type === 'break') {
        row.innerHTML = `
            <td class="period-label" style="background:#fff3e0; color:#e65100;">Break<br><small>12:00-12:30</small></td>
            <td style="background:#fafafa; cursor:default;">-</td>
            <td style="background:#fafafa; cursor:default;">-</td>
            <td style="background:#fafafa; cursor:default;">-</td>
            <td style="background:#fafafa; cursor:default;">-</td>
            <td style="background:#fafafa; cursor:default;">-</td>
        `;
    } else {
        row.innerHTML = `
            <td class="period-label">Period ${periodNum}<br><small>12:00-13:00</small></td>
            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', ${periodNum-1}, 0)">+</td>
            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', ${periodNum-1}, 1)">+</td>
            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', ${periodNum-1}, 2)">+</td>
            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', ${periodNum-1}, 3)">+</td>
            <td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', ${periodNum-1}, 4)">+</td>
        `;
    }
    grid.appendChild(row);
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
    if (!currentCell) return;
    
    currentCell.classList.add('assigned');
    currentCell.innerHTML = `
        <div style="background: ${subject.color}; color: #fff; padding: 4px 8px; border-radius: 12px; font-size: 0.85rem; font-weight: 500;">
            ${subject.icon} ${subject.name}
        </div>
        <small style="color: #666; margin-top: 2px; display: block;">${subject.teacher}</small>
    `;
    
    closeSubjectModal();
}

function viewSchedule(scheduleId) {
    const scheduleElement = document.getElementById(scheduleId);
    if (scheduleElement) {
        // If hidden, show it
        if (scheduleElement.dataset.hidden === 'true' || scheduleElement.style.display === 'none') {
            scheduleElement.style.display = 'block';
            scheduleElement.dataset.hidden = 'false';
        }
        // Scroll to it
        scheduleElement.scrollIntoView({behavior: 'smooth'});
    }
}

function saveSchedule(scheduleId) {
    alert('Schedule saved successfully!');
    const row = document.querySelector(`tr[data-schedule-id="${scheduleId}"]`);
    if (row) {
        row.querySelector('.status-badge').textContent = 'Saved';
        row.querySelector('.status-badge').className = 'status-badge paid';
    }
    
    // Ensure schedule is visible when saved
    const scheduleElement = document.getElementById(scheduleId);
    if (scheduleElement) {
        scheduleElement.style.display = 'block';
        scheduleElement.dataset.hidden = 'false';
    }
}

function removeSchedule(scheduleId) {
    // Check if schedule is saved or draft
    const row = document.querySelector(`tr[data-schedule-id="${scheduleId}"]`);
    const statusBadge = row?.querySelector('.status-badge');
    const isSaved = statusBadge?.classList.contains('paid') || statusBadge?.textContent === 'Saved';
    
    if (isSaved) {
        // For saved schedules: Just hide from board, keep in table
        showConfirmDialog({
            title: 'Hide Schedule',
            message: 'This will hide the schedule from the board. You can view it again from the table.',
            confirmText: 'Hide',
            confirmIcon: 'fas fa-eye-slash',
            onConfirm: () => {
                const scheduleElement = document.getElementById(scheduleId);
                if (scheduleElement) {
                    scheduleElement.style.display = 'none';
                    scheduleElement.dataset.hidden = 'true';
                }
            }
        });
    } else {
        // For draft schedules: Delete completely
        showConfirmDialog({
            title: 'Delete Draft Schedule',
            message: 'This schedule is not saved yet. Do you want to delete it permanently?',
            confirmText: 'Delete',
            confirmIcon: 'fas fa-trash',
            onConfirm: () => {
                document.getElementById(scheduleId)?.remove();
                document.querySelector(`tr[data-schedule-id="${scheduleId}"]`)?.remove();
                
                const body = document.getElementById('scheduleListBody');
                if (!body.querySelector('tr')) {
                    body.innerHTML = '<tr class="no-schedule-row"><td colspan="3">No schedules yet</td></tr>';
                }
            }
        });
    }
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

// Day toggle
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('day-toggle')) {
        e.target.classList.toggle('active');
    }
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
