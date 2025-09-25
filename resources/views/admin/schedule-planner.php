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

<!-- Create Schedule Section (Always Visible) -->
<div class="create-schedule-header">
    <div class="create-schedule-form">
        <div class="form-header">
            <h3>Create New Schedule</h3>
            <p>Select a class to create a customized schedule</p>
        </div>
        
        <div class="form-row">
            <div class="class-selection-dropdown">
                <label for="classSelect">Choose Class:</label>
                <select id="classSelect" class="class-select">
                    <option value="">Select a class...</option>
                    <option value="Grade 9 - Section A">Grade 9 - Section A</option>
                    <option value="Grade 9 - Section B">Grade 9 - Section B</option>
                    <option value="Grade 10 - Section A">Grade 10 - Section A</option>
                    <option value="Grade 10 - Section B">Grade 10 - Section B</option>
                    <option value="Grade 11 - Science Stream">Grade 11 - Science Stream</option>
                    <option value="Grade 11 - Commerce Stream">Grade 11 - Commerce Stream</option>
                    <option value="Grade 12 - Science Stream">Grade 12 - Science Stream</option>
                    <option value="Grade 12 - Commerce Stream">Grade 12 - Commerce Stream</option>
                </select>
            </div>
            
            <button class="create-schedule-btn" onclick="createSchedule()">
                <i class="fas fa-plus"></i>
                Create Schedule
            </button>
        </div>
    </div>
</div>

<!-- Schedules List Container -->
<div class="schedules-list-container">
    <div id="schedules-container">
        <div class="no-schedules-message">
            <i class="fas fa-calendar-alt"></i>
            <h3>No Schedules Created</h3>
            <p>Create your first schedule using the form above</p>
        </div>
    </div>
</div>

<script>
// Create Schedule Function - Simple and Clean
function createSchedule() {
    const classSelect = document.getElementById('classSelect');
    const selectedClass = classSelect.value;
    
    if (!selectedClass) {
        alert('Please select a class first');
        return;
    }
    
    // Hide no schedules message
    const noSchedulesMsg = document.querySelector('.no-schedules-message');
    if (noSchedulesMsg) {
        noSchedulesMsg.style.display = 'none';
    }
    
    // Create the schedule detail page
    const scheduleId = 'schedule-' + Date.now();
    createScheduleDetail(selectedClass, scheduleId);
    
    // Reset the form
    classSelect.value = '';
}

// Create Schedule Detail Page - Reusable Component
function createScheduleDetail(className, scheduleId) {
    const container = document.getElementById('schedules-container');
    
    const scheduleHTML = `
        <div class="schedule-detail" id="${scheduleId}">
            <div class="schedule-header">
                <div class="schedule-info">
                    <h3>${className}</h3>
                    <div class="schedule-badges">
                        <span class="badge sections">1 Sections</span>
                        <span class="badge days">5 Days</span>
                        <span class="badge standard">Standard</span>
                    </div>
                </div>
                <div class="schedule-controls">
                    <button class="control-btn settings" title="Settings">
                        <i class="fas fa-cog"></i>
                    </button>
                    <button class="control-btn save" title="Save & Minimize" onclick="saveAndMinimize('${scheduleId}')">
                        <i class="fas fa-save"></i>
                    </button>
                    <button class="control-btn close" title="Close" onclick="closeSchedule('${scheduleId}')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div class="schedule-content">
                <!-- Active Days -->
                <div class="days-section">
                    <label>Active Days:</label>
                    <div class="days-selector">
                        <button class="day-btn active" onclick="toggleDay(this)">Mon</button>
                        <button class="day-btn active" onclick="toggleDay(this)">Tue</button>
                        <button class="day-btn active" onclick="toggleDay(this)">Wed</button>
                        <button class="day-btn active" onclick="toggleDay(this)">Thu</button>
                        <button class="day-btn active" onclick="toggleDay(this)">Fri</button>
                        <button class="day-btn" onclick="toggleDay(this)">Sat</button>
                        <button class="day-btn" onclick="toggleDay(this)">Sun</button>
                    </div>
                </div>
                
                <!-- Time Sections -->
                <div class="time-sections">
                    <div class="section-header">
                        <label>Time Sections:</label>
                        <button class="add-time-btn" onclick="addTimeSection('${scheduleId}')">
                            <i class="fas fa-plus"></i> Add Period
                        </button>
                    </div>
                    
                    <div class="periods-container" id="periods-${scheduleId}">
                        <div class="time-period">
                            <span>First Period (08:00 - 09:00)</span>
                            <button class="remove-period-btn" onclick="removePeriod(this)">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Schedule Grid -->
                <div class="schedule-grid">
                    <div class="grid-header">
                        <div class="time-col">TIME SECTION</div>
                        <div class="day-col">Monday</div>
                        <div class="day-col">Tuesday</div>
                        <div class="day-col">Wednesday</div>
                        <div class="day-col">Thursday</div>
                        <div class="day-col">Friday</div>
                    </div>
                    <div class="grid-body" id="grid-${scheduleId}">
                        <div class="grid-row">
                            <div class="time-cell">First Period<br><small>08:00 - 09:00</small></div>
                            <div class="schedule-cell" onclick="assignSubject(this)"></div>
                            <div class="schedule-cell" onclick="assignSubject(this)"></div>
                            <div class="schedule-cell" onclick="assignSubject(this)"></div>
                            <div class="schedule-cell" onclick="assignSubject(this)"></div>
                            <div class="schedule-cell" onclick="assignSubject(this)"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', scheduleHTML);
    
    // Update control button to show expand when collapsed
    updateControlButton(scheduleId);
}

// Utility Functions - Reusable and Simple
function toggleDay(button) {
    button.classList.toggle('active');
}

function addTimeSection(scheduleId) {
    const container = document.getElementById(`periods-${scheduleId}`);
    const periodCount = container.children.length + 1;
    const timeSlots = ['09:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '12:00 - 13:00', '13:00 - 14:00', '14:00 - 15:00'];
    const timeSlot = timeSlots[periodCount - 2] || '15:00 - 16:00';
    
    const periodHTML = `
        <div class="time-period">
            <span>Period ${periodCount} (${timeSlot})</span>
            <button class="remove-period-btn" onclick="removePeriod(this)">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', periodHTML);
    
    // Add grid row
    const gridBody = document.getElementById(`grid-${scheduleId}`);
    const gridRowHTML = `
        <div class="grid-row">
            <div class="time-cell">Period ${periodCount}<br><small>${timeSlot}</small></div>
            <div class="schedule-cell" onclick="assignSubject(this)"></div>
            <div class="schedule-cell" onclick="assignSubject(this)"></div>
            <div class="schedule-cell" onclick="assignSubject(this)"></div>
            <div class="schedule-cell" onclick="assignSubject(this)"></div>
            <div class="schedule-cell" onclick="assignSubject(this)"></div>
        </div>
    `;
    
    gridBody.insertAdjacentHTML('beforeend', gridRowHTML);
}

function removePeriod(button) {
    const period = button.closest('.time-period');
    const periodIndex = Array.from(period.parentElement.children).indexOf(period);
    
    // Remove period
    period.remove();
    
    // Remove corresponding grid row
    const scheduleDetail = button.closest('.schedule-detail');
    const gridBody = scheduleDetail.querySelector('.grid-body');
    const gridRows = gridBody.querySelectorAll('.grid-row');
    if (gridRows[periodIndex]) {
        gridRows[periodIndex].remove();
    }
}

function assignSubject(cell) {
    const subject = prompt('Enter subject name:');
    if (subject) {
        cell.textContent = subject;
        cell.classList.add('assigned');
    }
}

function saveAndMinimize(scheduleId) {
    const schedule = document.getElementById(scheduleId);
    const content = schedule.querySelector('.schedule-content');
    const saveBtn = schedule.querySelector('.control-btn.save');
    
    // Mark as saved
    schedule.setAttribute('data-saved', 'true');
    
    if (content.style.display === 'none') {
        // Expand
        content.style.display = 'block';
        saveBtn.innerHTML = '<i class="fas fa-save"></i>';
        saveBtn.title = 'Save & Minimize';
        schedule.classList.remove('collapsed');
    } else {
        // Save and Minimize
        content.style.display = 'none';
        saveBtn.innerHTML = '<i class="fas fa-expand"></i>';
        saveBtn.title = 'Expand';
        schedule.classList.add('collapsed');
        
        // Show save confirmation
        showSaveNotification('Schedule saved successfully!');
    }
}

function closeSchedule(scheduleId) {
    const schedule = document.getElementById(scheduleId);
    const isSaved = schedule.getAttribute('data-saved') === 'true';
    
    if (!isSaved) {
        const confirmClose = confirm('Are you sure you want to close this schedule without saving? All changes will be lost.');
        if (!confirmClose) {
            return;
        }
    }
    
    // Remove the schedule
    removeSchedule(scheduleId);
}

function showSaveNotification(message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'save-notification';
    notification.textContent = message;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Show animation
    setTimeout(() => notification.classList.add('show'), 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

function updateControlButton(scheduleId) {
    const schedule = document.getElementById(scheduleId);
    const saveBtn = schedule.querySelector('.control-btn.save');
    
    // Set initial state - expanded
    saveBtn.innerHTML = '<i class="fas fa-save"></i>';
    saveBtn.title = 'Save & Minimize';
}

function removeSchedule(scheduleId) {
    const schedule = document.getElementById(scheduleId);
    schedule.remove();
    
    // Show no schedules message if no schedules left
    const container = document.getElementById('schedules-container');
    const schedules = container.querySelectorAll('.schedule-detail');
    if (schedules.length === 0) {
        container.innerHTML = `
            <div class="no-schedules-message">
                <i class="fas fa-calendar-alt"></i>
                <h3>No Schedules Created</h3>
                <p>Create your first schedule using the form above</p>
            </div>
        `;
    }
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>