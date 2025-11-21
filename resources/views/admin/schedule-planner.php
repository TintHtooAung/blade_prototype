<?php
$pageTitle = 'Smart Campus Nova Hub - Time-table Planner';
$pageIcon = 'fas fa-clock';
$pageHeading = 'Time-table Planner';
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

<!-- Create Time-table Section -->
<div class="simple-section">
    <div class="simple-header">
            <h3>Create New Time-table</h3>
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
                    <i class="fas fa-plus"></i> Create Time-table
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Time-tables List -->
<div class="simple-section" style="margin-top:12px;">
    <div class="simple-header">
        <h4>Time-tables</h4>
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
                <tr class="no-schedule-row"><td colspan="3">No time-tables yet</td></tr>
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
        <div class="subject-modal-footer">
            <button class="simple-btn secondary" onclick="closeSubjectModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
        </div>
    </div>
</div>

<!-- View/Edit Modal removed: View now opens inline editor with saved data -->

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

.status-badge.unpublished {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
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

.simple-btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    border: 1px solid transparent;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.simple-btn.secondary {
    background: #f5f5f5;
    color: #333;
    border-color: #e0e0e0;
}

.simple-btn.secondary:hover {
    background: #e8e8e8;
    border-color: #d0d0d0;
}

.simple-btn.primary {
    background: #1976d2;
    color: white;
    border-color: #1976d2;
}

.simple-btn.primary:hover {
    background: #1565c0;
    border-color: #1565c0;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(25, 118, 210, 0.3);
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
    flex: 1;
}

.subject-modal-footer {
    padding: 16px 20px;
    border-top: 1px solid #e0e0e0;
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    background: #f8f9fa;
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
        status: 'unpublished',
        statusText: 'Unpublished',
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
    },
    {
        id: 'SCH003',
        className: 'Grade 11-A',
        status: 'published',
        statusText: 'Published',
        createdAt: '2025-01-13',
        lastEditedAt: '2025-01-13T08:00:00Z',
        lastPublishedAt: '2025-01-13T08:10:00Z',
        hasUnpublishedChanges: false,
        periods: [
            { label: 'Period 1', time: '08:00-09:00', type: 'period' },
            { label: 'Period 2', time: '09:00-10:00', type: 'period' },
            { label: 'Break', time: '10:00-10:30', type: 'break' },
            { label: 'Period 3', time: '10:30-11:30', type: 'period' },
            { label: 'Period 4', time: '11:30-12:30', type: 'period' }
        ],
        schedule: {
            '0-0': { subject: 'Calculus', teacher: 'Dr. Thompson', room: 'A301' },
            '0-1': { subject: 'Advanced English', teacher: 'Ms. White', room: 'A302' },
            '1-0': { subject: 'Advanced Physics', teacher: 'Dr. Clark', room: 'LAB006' },
            '1-1': { subject: 'Biology', teacher: 'Dr. Lewis', room: 'LAB007' },
            '3-0': { subject: 'Data Structures', teacher: 'Mr. Hall', room: 'LAB008' },
            '3-1': { subject: 'Economics', teacher: 'Ms. Adams', room: 'A303' }
        }
    },
    {
        id: 'SCH004',
        className: 'Grade 8-C',
        status: 'unpublished',
        statusText: 'Unpublished',
        createdAt: '2025-01-12',
        lastEditedAt: '2025-01-12T07:00:00Z',
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
            '0-0': { subject: 'Mathematics', teacher: 'Daw Khin Khin', room: 'A101' },
            '0-1': { subject: 'English', teacher: 'Ms. Sarah Johnson', room: 'A102' },
            '1-0': { subject: 'Science', teacher: 'U Aung Myint', room: 'LAB001' },
            '1-1': { subject: 'Myanmar', teacher: 'Daw Aye Aye', room: 'A103' }
        }
    },
    {
        id: 'SCH005',
        className: 'Grade 12-A',
        status: 'unpublished',
        statusText: 'Unpublished',
        createdAt: '2025-01-11',
        lastEditedAt: '2025-01-11T11:00:00Z',
        lastPublishedAt: null,
        hasUnpublishedChanges: false,
        periods: [
            { label: 'Period 1', time: '08:00-09:00', type: 'period' },
            { label: 'Period 2', time: '09:00-10:00', type: 'period' },
            { label: 'Break', time: '10:00-10:30', type: 'break' },
            { label: 'Period 3', time: '10:30-11:30', type: 'period' },
            { label: 'Period 4', time: '11:30-12:30', type: 'period' }
        ],
        schedule: {
            '0-0': { subject: 'Advanced Calculus', teacher: 'Dr. Thompson', room: 'A301' },
            '0-1': { subject: 'Literature', teacher: 'Ms. White', room: 'A302' }
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
        let statusBadgeClass = 'draft';
        let statusBadgeText = 'Draft';
        if (schedule.status === 'published') {
            statusBadgeClass = 'published';
            statusBadgeText = 'Published';
        } else if (schedule.status === 'unpublished') {
            statusBadgeClass = 'unpublished';
            statusBadgeText = 'Unpublished';
        }
        
        tr.innerHTML = `
            <td><strong>${schedule.className}</strong></td>
            <td><span class="status-badge ${statusBadgeClass}">${statusBadgeText}</span></td>
            <td class="changes-cell">${formatChangesPill(schedule)}</td>
            <td class="last-change-cell">${formatLastChange(schedule)}</td>
            <td></td>
        `;
        body.appendChild(tr);
        updateRowActionsForStatus(tr, schedule.status);
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
                    <button class="simple-btn secondary" onclick="cancelScheduleEditor('${scheduleId}')"><i class="fas fa-times"></i> Cancel</button>
                    <button class="simple-btn secondary" onclick="confirmSaveDraft('${scheduleId}')" style="background: #6b7280; color: white; border-color: #6b7280;"><i class="fas fa-save"></i> Save as Draft</button>
                    <button class="simple-btn primary" onclick="confirmPublish('${scheduleId}')" style="background: #1976d2; color: white; border-color: #1976d2;"><i class="fas fa-bullhorn"></i> Publish</button>
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
    
    // Add to mockSchedules with unpublished status
    const newSchedule = {
        id: scheduleId,
        className: className,
        status: 'unpublished',
        statusText: 'Unpublished',
        createdAt: new Date().toISOString().split('T')[0],
        lastEditedAt: new Date().toISOString(),
        lastPublishedAt: null,
        hasUnpublishedChanges: false,
        periods: [
            { label: 'Period 1', time: '08:00-09:00', type: 'period' },
            { label: 'Period 2', time: '09:00-10:00', type: 'period' },
            { label: 'Period 3', time: '10:00-11:00', type: 'period' },
            { label: 'Period 4', time: '11:00-12:00', type: 'period' }
        ],
        schedule: {}
    };
    mockSchedules.push(newSchedule);
    
    const tr = document.createElement('tr');
    tr.dataset.scheduleId = scheduleId;
    tr.innerHTML = `
        <td><strong>${className}</strong></td>
        <td><span class="status-badge unpublished">Unpublished</span></td>
        <td class="changes-cell">—</td>
        <td class="last-change-cell">Just now</td>
        <td></td>
    `;
    body.appendChild(tr);
    updateRowActionsForStatus(tr, 'unpublished');
    
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
                    <button class="simple-btn primary" onclick="savePeriodTime('${scheduleId}', ${periodIdx}, this)">
                        <i class="fas fa-check"></i> Save
                    </button>
                    <button class="simple-btn secondary" onclick="this.closest('.time-picker-modal').remove()">
                        <i class="fas fa-times"></i> Close
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
    
    // Create period card container
    const periodCard = document.createElement('div');
    periodCard.className = 'period-card';
    
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
    
    // Create close button
    const closeBtn = document.createElement('button');
    closeBtn.className = 'period-close-btn';
    closeBtn.title = 'Remove Period';
    closeBtn.innerHTML = '<i class="fas fa-times"></i>';
    closeBtn.onclick = () => removePeriod(scheduleId, periodNum - 1);
    
    // Append input and close button to period card
    periodCard.appendChild(input);
    periodCard.appendChild(closeBtn);
    
    const buttons = container.querySelectorAll('.add-period-compact');
    container.insertBefore(periodCard, buttons[0]);
    
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

function removePeriod(scheduleId, periodIdx) {
    const container = document.getElementById(`periods-${scheduleId}`);
    const grid = document.getElementById(`grid-${scheduleId}`);
    const periodCards = container.querySelectorAll('.period-card');
    
    // Check if there's only one period left
    if (periodCards.length <= 1) {
        showConfirmDialog({
            title: 'Cannot Remove Period',
            message: 'At least one period must remain in the schedule.',
            confirmText: 'OK',
            confirmIcon: 'fas fa-info-circle',
            onConfirm: () => {}
        });
        return;
    }
    
    // Show confirmation dialog
    showConfirmDialog({
        title: 'Remove Period',
        message: 'Are you sure you want to remove this period? This action cannot be undone.',
        confirmText: 'Remove',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            // Remove period card
            if (periodCards[periodIdx]) {
                periodCards[periodIdx].remove();
            }
            
            // Remove corresponding grid row
            const gridRows = grid.querySelectorAll('tr');
            if (gridRows[periodIdx]) {
                gridRows[periodIdx].remove();
            }
            
            // Update onclick handlers for remaining periods
            updatePeriodIndices(scheduleId);
        }
    });
}

function updatePeriodIndices(scheduleId) {
    const container = document.getElementById(`periods-${scheduleId}`);
    const grid = document.getElementById(`grid-${scheduleId}`);
    const periodCards = container.querySelectorAll('.period-card');
    const gridRows = grid.querySelectorAll('tr');
    
    // Update period indices for remaining periods
    periodCards.forEach((card, index) => {
        const input = card.querySelector('.period-input');
        const closeBtn = card.querySelector('.period-close-btn');
        
        // Update input onclick
        input.onclick = () => editPeriodTime(input, scheduleId, index);
        
        // Update close button onclick
        closeBtn.onclick = () => removePeriod(scheduleId, index);
    });
    
    // Update grid row onclick handlers
    gridRows.forEach((row, index) => {
        const cells = row.querySelectorAll('.schedule-slot');
        cells.forEach((cell, dayIdx) => {
            cell.onclick = () => openSubjectModal(cell, scheduleId, index, dayIdx);
        });
    });
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
    
    // Update mock data for inline editor
    const schedule = mockSchedules.find(s => s.id === currentScheduleId);
    if (schedule) {
        const key = `${periodIndex}-${dayIndex}`;
        schedule.schedule[key] = {
            subject: subject.name,
            teacher: subject.teacher,
            room: 'Room TBD'
        };
        schedule.lastEditedAt = new Date().toISOString();
        if (schedule.status === 'published') schedule.hasUnpublishedChanges = true;
        const row = document.querySelector(`tr[data-schedule-id="${schedule.id}"]`);
        if (row) {
            const lastCell = row.querySelector('.last-change-cell');
            if (lastCell) lastCell.textContent = formatLastChange(schedule);
            const changesCell = row.querySelector('.changes-cell');
            if (changesCell) changesCell.innerHTML = formatChangesPill(schedule);
        }
    }
    
    closeSubjectModal();
}

function viewSchedule(scheduleId) {
    const schedule = mockSchedules.find(s => s.id === scheduleId);
    if (!schedule) return;
    
    currentScheduleId = scheduleId;
    // Mark edit time and unpublished changes when opening in editor
    schedule.lastEditedAt = new Date().toISOString();
    if (schedule.status === 'published') {
        schedule.hasUnpublishedChanges = true;
    }
    const container = document.getElementById('schedulesContainer');
    
    // Build periods HTML
    const periodsHtml = schedule.periods.map((p, idx) => {
        const isBreak = p.type === 'break';
        const breakClass = isBreak ? ' break-period' : '';
        return `
            <div class="period-card">
                <input type="text" class="period-input${breakClass}" value="${p.label}: ${p.time}" onclick="editPeriodTime(this, '${scheduleId}', ${idx})" readonly />
                <button class="period-close-btn" onclick="removePeriod('${scheduleId}', ${idx})" title="Remove Period">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
    }).join('');
    
    // Build rows HTML
    const rowsHtml = schedule.periods.map((p, pIdx) => {
        if (p.type === 'break') {
            return `
                <tr>
                    <td class="period-label" style="background:#fff3e0; color:#e65100;">${p.label}<br><small>${p.time}</small></td>
                    <td style="background:#fafafa; cursor:default;">-</td>
                    <td style="background:#fafafa; cursor:default;">-</td>
                    <td style="background:#fafafa; cursor:default;">-</td>
                    <td style="background:#fafafa; cursor:default;">-</td>
                    <td style="background:#fafafa; cursor:default;">-</td>
                </tr>
            `;
        }
        let cells = '';
        for (let d = 0; d < 5; d++) {
            const key = `${pIdx}-${d}`;
            const data = schedule.schedule[key];
            if (data) {
                cells += `
                    <td class="schedule-slot assigned" onclick="openSubjectModal(this, '${scheduleId}', ${pIdx}, ${d})">
                        <div class="subject-info">
                            <div class="subject-name">${data.subject}</div>
                            <div class="subject-teacher">${data.teacher}</div>
                            <div class="subject-room">${data.room}</div>
                        </div>
                    </td>
                `;
            } else {
                cells += `<td class="schedule-slot" onclick="openSubjectModal(this, '${scheduleId}', ${pIdx}, ${d})">+</td>`;
            }
        }
        return `
            <tr>
                <td class="period-label">${p.label}<br><small>${p.time}</small></td>
                ${cells}
            </tr>
        `;
    }).join('');
    
    const existing = document.getElementById(scheduleId);
    
    // Reminder banner for unpublished changes
    const reminderBanner = schedule.status === 'published' && schedule.hasUnpublishedChanges ? `
        <div class="reminder-banner">
            <i class="fas fa-exclamation-triangle"></i> Unpublished changes. Click <strong>Update Changes</strong> in the table to publish.
        </div>
    ` : '';
    const scheduleHTML = `
        <div class="simple-section" id="${scheduleId}" style="margin-top:16px;">
            <div class="simple-header">
                    <h3>${schedule.className}</h3>
                <div class="simple-actions">
                    <button class="simple-btn" onclick="openSettingsDialog('${scheduleId}')"><i class="fas fa-cog"></i> Settings</button>
                    <button class="simple-btn secondary" onclick="cancelScheduleEditor('${scheduleId}')"><i class="fas fa-times"></i> Cancel</button>
                    <button class="simple-btn secondary" onclick="confirmSaveDraft('${scheduleId}')" style="background: #6b7280; color: white; border-color: #6b7280;"><i class="fas fa-save"></i> Save as Draft</button>
                    <button class="simple-btn primary" onclick="confirmPublish('${scheduleId}')" style="background: #1976d2; color: white; border-color: #1976d2;"><i class="fas fa-bullhorn"></i> Publish</button>
                </div>
            </div>
            
            
            <div class="form-section">
                <div class="periods-inline" id="periods-${scheduleId}">
                    ${periodsHtml}
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
                        ${rowsHtml}
                    </tbody>
                </table>
            </div>
        </div>
    `;
    
    if (existing) {
        existing.outerHTML = scheduleHTML;
    } else {
        container.insertAdjacentHTML('beforeend', scheduleHTML);
    }
    
    // Scroll into view
    document.getElementById(scheduleId).scrollIntoView({behavior: 'smooth'});
}

function populateModalPeriods(schedule) {
    const container = document.getElementById('modalPeriods');
    container.innerHTML = '';
    
    schedule.periods.forEach((period, index) => {
        const periodCard = document.createElement('div');
        periodCard.className = 'period-card';
        
        const input = document.createElement('input');
        input.type = 'text';
        input.className = 'period-input';
        input.value = `${period.label}: ${period.time}`;
        input.readOnly = true;
        
        if (period.type === 'break') {
            input.classList.add('break-period');
        }
        
        // Close button will be injected only in edit mode
        periodCard.appendChild(input);
        container.appendChild(periodCard);
    });
    
    // Add buttons only in edit mode (injected by enable function)
}

function populateModalGrid(schedule) {
    const grid = document.getElementById('modalGrid');
    grid.innerHTML = '';
    
    schedule.periods.forEach((period, periodIndex) => {
        const row = document.createElement('tr');
        
        // Period label cell
        const labelCell = document.createElement('td');
        labelCell.className = 'period-label';
        labelCell.innerHTML = `${period.label}<br><small>${period.time}</small>`;
        
        if (period.type === 'break') {
            labelCell.style.background = '#fff3e0';
            labelCell.style.color = '#e65100';
        }
        
        row.appendChild(labelCell);
        
        // Day cells
        for (let dayIndex = 0; dayIndex < 5; dayIndex++) {
            const cell = document.createElement('td');
            cell.className = 'schedule-slot';
            
            const key = `${periodIndex}-${dayIndex}`;
            const scheduleData = schedule.schedule[key];
            
            if (scheduleData) {
                cell.innerHTML = `
                    <div class="subject-info">
                        <div class="subject-name">${scheduleData.subject}</div>
                        <div class="subject-teacher">${scheduleData.teacher}</div>
                        <div class="subject-room">${scheduleData.room}</div>
                    </div>
                `;
                cell.style.background = '#e8f5e8';
                // Click enabled only in edit mode
            } else if (period.type === 'break') {
                cell.innerHTML = '-';
                cell.style.background = '#fafafa';
                cell.style.cursor = 'default';
            } else {
                cell.innerHTML = '+';
                // Click enabled only in edit mode
            }
            
            row.appendChild(cell);
        }
        
        grid.appendChild(row);
    });
}

// Toggle read-only vs edit mode for the view modal
function disableModalEditing(isReadonly) {
    const modal = document.getElementById('scheduleModal');
    const periodsContainer = document.getElementById('modalPeriods');
    const grid = document.getElementById('modalGrid');
    
    // Clear and re-render periods so no close buttons exist in readonly
    const schedule = mockSchedules.find(s => s.id === currentScheduleId);
    if (!schedule) return;
    
    // Re-render base UI
    populateModalPeriods(schedule);
    populateModalGrid(schedule);
    
    // Inject controls only if editing
    if (!isReadonly) {
        // Add close buttons to periods
        const periodCards = periodsContainer.querySelectorAll('.period-card');
        periodCards.forEach((card, index) => {
            const closeBtn = document.createElement('button');
            closeBtn.className = 'period-close-btn';
            closeBtn.title = 'Remove Period';
            closeBtn.innerHTML = '<i class="fas fa-times"></i>';
            closeBtn.onclick = () => removeModalPeriod(index);
            card.appendChild(closeBtn);
        });
        
        // Add add buttons
        const addPeriodBtn = document.createElement('button');
        addPeriodBtn.className = 'add-period-compact';
        addPeriodBtn.innerHTML = '<i class="fas fa-plus"></i> Period';
        addPeriodBtn.onclick = () => addModalPeriod('period');
        periodsContainer.appendChild(addPeriodBtn);
        
        const addBreakBtn = document.createElement('button');
        addBreakBtn.className = 'add-period-compact';
        addBreakBtn.innerHTML = '<i class="fas fa-coffee"></i> Break';
        addBreakBtn.onclick = () => addModalPeriod('break');
        periodsContainer.appendChild(addBreakBtn);
        
        // Enable slot clicks
        grid.querySelectorAll('td.schedule-slot').forEach((cell) => {
            const labelCell = cell.parentElement.querySelector('.period-label');
            const periodIndex = Array.from(grid.children).indexOf(cell.parentElement);
            const dayIndex = Array.from(cell.parentElement.children).indexOf(cell) - 1;
            const isBreak = labelCell && labelCell.textContent.toLowerCase().includes('break');
            if (!isBreak) {
                cell.style.cursor = 'pointer';
                cell.onclick = () => openSubjectModal(cell, currentScheduleId, periodIndex, dayIndex);
            }
        });
    } else {
        // Ensure no clicks in readonly
        grid.querySelectorAll('td.schedule-slot').forEach((cell) => {
            cell.onclick = null;
            cell.style.cursor = 'default';
        });
    }
}

// Open editor populated from current schedule (switches modal into edit mode)
function openEditorFromView() {
    disableModalEditing(false);
    showActionStatus('Editor enabled. You can now make changes.', 'info');
}

// Primary action in view modal: Publish for Draft, Update Changes for Published
function primaryActionFromView() {
    const schedule = mockSchedules.find(s => s.id === currentScheduleId);
    if (!schedule) return;
    
    if (schedule.status === 'published') {
        // Commit updates
        showActionStatus('Changes updated for all users', 'success');
    } else {
        // Publish schedule
        schedule.status = 'published';
        schedule.statusText = 'Published';
        const row = document.querySelector(`tr[data-schedule-id="${schedule.id}"]`);
        if (row) {
            const badge = row.querySelector('.status-badge');
            badge.textContent = 'Published';
            badge.className = 'status-badge published';
            // Replace action button text if needed in table
            updateRowActionsForStatus(row, schedule.status);
        }
        showActionStatus('Time-table published', 'success');
    }
}

// Update the table row actions depending on status
function updateRowActionsForStatus(row, status) {
    const actionsCell = row.querySelector('td:last-child');
    const scheduleId = row.dataset.scheduleId;
    if (!actionsCell) return;
    // Only show view and delete buttons
        actionsCell.innerHTML = `
            <button class="simple-btn-icon" onclick="viewSchedule('${scheduleId}')" title="View Time-table"><i class="fas fa-eye"></i></button>
            <button class="simple-btn-icon" onclick="removeSchedule('${scheduleId}')" title="Remove Time-table"><i class="fas fa-trash"></i></button>
        `;
}

// Table-level publish/update button handler (mirrors primaryActionFromView)
function publishOrUpdate(scheduleId) {
    const schedule = mockSchedules.find(s => s.id === scheduleId);
    if (!schedule) return;
    if (schedule.status === 'published') {
        schedule.hasUnpublishedChanges = false;
        schedule.lastPublishedAt = new Date().toISOString();
    const row = document.querySelector(`tr[data-schedule-id="${scheduleId}"]`);
    if (row) {
            const lastCell = row.querySelector('.last-change-cell');
            if (lastCell) lastCell.textContent = formatLastChange(schedule);
            const changesCell = row.querySelector('.changes-cell');
            if (changesCell) changesCell.innerHTML = formatChangesPill(schedule);
        }
        showActionStatus('Changes updated for all users', 'success');
    } else {
        schedule.status = 'published';
        schedule.statusText = 'Published';
        schedule.hasUnpublishedChanges = false;
        schedule.lastPublishedAt = new Date().toISOString();
    const row = document.querySelector(`tr[data-schedule-id="${scheduleId}"]`);
    if (row) {
            const badge = row.querySelector('.status-badge');
            badge.textContent = 'Published';
            badge.className = 'status-badge published';
            updateRowActionsForStatus(row, 'published');
            const lastCell = row.querySelector('.last-change-cell');
            if (lastCell) lastCell.textContent = formatLastChange(schedule);
            const changesCell = row.querySelector('.changes-cell');
            if (changesCell) changesCell.innerHTML = formatChangesPill(schedule);
        }
        showActionStatus('Time-table published', 'success');
    }
}

function addModalPeriod(type) {
    const schedule = mockSchedules.find(s => s.id === currentScheduleId);
    if (!schedule) return;
    
    const periodNum = schedule.periods.length + 1;
    const newPeriod = {
        label: type === 'break' ? 'Break' : `Period ${periodNum}`,
        time: type === 'break' ? '12:00-12:30' : '12:00-13:00',
        type: type
    };
    
    schedule.periods.push(newPeriod);
    populateModalPeriods(schedule);
    populateModalGrid(schedule);
}

function removeModalPeriod(periodIndex) {
    const schedule = mockSchedules.find(s => s.id === currentScheduleId);
    if (!schedule || schedule.periods.length <= 1) return;
    
    // Remove period
    schedule.periods.splice(periodIndex, 1);
    
    // Remove schedule data for this period
    Object.keys(schedule.schedule).forEach(key => {
        if (key.startsWith(`${periodIndex}-`)) {
            delete schedule.schedule[key];
        }
    });
    
    // Update remaining keys
    const newSchedule = {};
    Object.keys(schedule.schedule).forEach(key => {
        const [periodIdx, dayIdx] = key.split('-').map(Number);
        if (periodIdx > periodIndex) {
            newSchedule[`${periodIdx - 1}-${dayIdx}`] = schedule.schedule[key];
        } else {
            newSchedule[key] = schedule.schedule[key];
        }
    });
    schedule.schedule = newSchedule;
    
    populateModalPeriods(schedule);
    populateModalGrid(schedule);
}

function closeScheduleModal() {
    document.getElementById('scheduleModal').style.display = 'none';
    currentScheduleId = null;
}

function saveScheduleModal() {
    if (!currentScheduleId) return;
    showActionStatus('Draft changes saved locally', 'success');
}

function confirmSaveDraft(scheduleId) {
    showConfirmDialog({
        title: 'Save as Draft',
        message: 'Time-table changes will be saved but not published. Changes will only be visible to you.',
        confirmText: 'OK',
        confirmIcon: 'fas fa-save',
        buttonStyle: 'primary',
        dialogIcon: 'fas fa-save',
        iconWrapperStyle: 'primary',
        onConfirm: () => {
            saveSchedule(scheduleId, 'draft');
        }
    });
}

function confirmPublish(scheduleId) {
    showConfirmDialog({
        title: 'Publish Time-table',
        message: 'Changes will be committed to the whole portal. All users will see the updated time-table.',
        confirmText: 'OK',
        confirmIcon: 'fas fa-bullhorn',
        buttonStyle: 'primary',
        dialogIcon: 'fas fa-bullhorn',
        iconWrapperStyle: 'primary',
        onConfirm: () => {
            saveSchedule(scheduleId, 'publish');
        }
    });
}

function saveSchedule(scheduleId, action) {
    const schedule = mockSchedules.find(s => s.id === scheduleId);
    if (!schedule) return;
    
    const row = document.querySelector(`tr[data-schedule-id="${scheduleId}"]`);
    
    if (action === 'publish') {
        // Publish the schedule
        schedule.status = 'published';
        schedule.statusText = 'Published';
        schedule.hasUnpublishedChanges = false;
        schedule.lastPublishedAt = new Date().toISOString();
        schedule.lastEditedAt = new Date().toISOString();
        
        if (row) {
            const badge = row.querySelector('.status-badge');
            badge.textContent = 'Published';
            badge.className = 'status-badge published';
            updateRowActionsForStatus(row, 'published');
            const lastCell = row.querySelector('.last-change-cell');
            if (lastCell) lastCell.textContent = formatLastChange(schedule);
            const changesCell = row.querySelector('.changes-cell');
            if (changesCell) changesCell.innerHTML = formatChangesPill(schedule);
        }
        showActionStatus('Time-table published successfully', 'success');
    } else {
        // Save as draft - mark as unpublished
        schedule.status = 'unpublished';
        schedule.statusText = 'Unpublished';
        schedule.lastEditedAt = new Date().toISOString();
        
    if (row) {
            const badge = row.querySelector('.status-badge');
            badge.textContent = 'Unpublished';
            badge.className = 'status-badge unpublished';
            updateRowActionsForStatus(row, 'unpublished');
        const lastCell = row.querySelector('.last-change-cell');
        if (lastCell) lastCell.textContent = formatLastChange(schedule);
        const changesCell = row.querySelector('.changes-cell');
        if (changesCell) changesCell.innerHTML = formatChangesPill(schedule);
    }
        showActionStatus('Draft saved successfully', 'success');
    }
    
    // Close inline editor section after saving
    const section = document.getElementById(scheduleId);
    if (section) {
        section.remove();
    }
}

function cancelScheduleEditor(scheduleId) {
    const section = document.getElementById(scheduleId);
    if (section) {
        section.remove();
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
            title: 'Hide Time-table',
            message: 'This will hide the time-table from the board. You can view it again from the table.',
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
            title: 'Delete Draft Time-table',
            message: 'This time-table is not saved yet. Do you want to delete it permanently?',
            confirmText: 'Delete',
            confirmIcon: 'fas fa-trash',
            onConfirm: () => {
                document.getElementById(scheduleId)?.remove();
                document.querySelector(`tr[data-schedule-id="${scheduleId}"]`)?.remove();
                
                const body = document.getElementById('scheduleListBody');
                if (!body.querySelector('tr')) {
                    body.innerHTML = '<tr class="no-schedule-row"><td colspan="3">No time-tables yet</td></tr>';
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
