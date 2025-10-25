<?php
$pageTitle = 'Smart Campus Nova Hub - Schedule View';
$pageIcon = 'fas fa-calendar';
$pageHeading = 'My Teaching Schedule';
$activePage = 'schedule-view';

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

    <!-- My Teaching Schedule -->
    <div class="simple-section">
        <div class="simple-header">
            <h3><i class="fas fa-chalkboard-teacher"></i> My Teaching Schedule</h3>
            <div class="simple-actions">
                <div class="calendar-navigation">
                    <button class="nav-btn" onclick="navigateDate(-1)" title="Previous Day">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="current-date-display">
                        <div class="date-main" id="currentDateDisplay">Wednesday, Dec 18</div>
                        <div class="date-sub" id="currentDateSub">Today</div>
                    </div>
                    <button class="nav-btn" onclick="navigateDate(1)" title="Next Day">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="simple-table-container">
            <table id="teachingScheduleTable" class="basic-table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-day="Monday">
                        <td><strong>8:00-9:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 10A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Monday">
                        <td><strong>10:00-11:00</strong></td>
                        <td><span class="subject-pill physics">Physics</span></td>
                        <td>Grade 11B</td>
                        <td>Room 205</td>
                    </tr>
                    <tr data-day="Monday">
                        <td><strong>2:00-3:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 12A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Tuesday">
                        <td><strong>8:30-9:30</strong></td>
                        <td><span class="subject-pill chemistry">Chemistry</span></td>
                        <td>Grade 10B</td>
                        <td>Room 203</td>
                    </tr>
                    <tr data-day="Tuesday">
                        <td><strong>10:30-11:30</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 11A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Tuesday">
                        <td><strong>1:30-2:30</strong></td>
                        <td><span class="subject-pill physics">Physics</span></td>
                        <td>Grade 12B</td>
                        <td>Room 205</td>
                    </tr>
                    <tr data-day="Wednesday">
                        <td><strong>8:00-9:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 10A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Wednesday">
                        <td><strong>9:00-10:00</strong></td>
                        <td><span class="subject-pill chemistry">Chemistry</span></td>
                        <td>Grade 11B</td>
                        <td>Room 203</td>
                    </tr>
                    <tr data-day="Wednesday">
                        <td><strong>2:00-3:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 12A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Thursday">
                        <td><strong>8:30-9:30</strong></td>
                        <td><span class="subject-pill physics">Physics</span></td>
                        <td>Grade 10B</td>
                        <td>Room 205</td>
                    </tr>
                    <tr data-day="Thursday">
                        <td><strong>10:00-11:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 11A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Thursday">
                        <td><strong>1:30-2:30</strong></td>
                        <td><span class="subject-pill chemistry">Chemistry</span></td>
                        <td>Grade 12B</td>
                        <td>Room 203</td>
                    </tr>
                    <tr data-day="Friday">
                        <td><strong>8:00-9:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 10A</td>
                        <td>Room 201</td>
                    </tr>
                    <tr data-day="Friday">
                        <td><strong>9:30-10:30</strong></td>
                        <td><span class="subject-pill physics">Physics</span></td>
                        <td>Grade 11B</td>
                        <td>Room 205</td>
                    </tr>
                    <tr data-day="Friday">
                        <td><strong>2:00-3:00</strong></td>
                        <td><span class="subject-pill">Mathematics</span></td>
                        <td>Grade 12A</td>
                        <td>Room 201</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Class Schedules -->
    <div class="simple-section">
        <div class="simple-header">
            <h3><i class="fas fa-users"></i> Class Schedules</h3>
            <div class="simple-actions">
                <button class="simple-btn secondary" onclick="showAllClassSchedulesModal()">
                    <i class="fas fa-calendar-week"></i> View All Class Schedules
                </button>
            </div>
        </div>
        
        <div class="class-schedule-buttons">
            <button class="class-schedule-btn" onclick="showClassScheduleModal('Grade 10A')">
                <i class="fas fa-graduation-cap"></i>
                <span>Grade 10A</span>
            </button>
            <button class="class-schedule-btn" onclick="showClassScheduleModal('Grade 10B')">
                <i class="fas fa-graduation-cap"></i>
                <span>Grade 10B</span>
            </button>
            <button class="class-schedule-btn" onclick="showClassScheduleModal('Grade 11A')">
                <i class="fas fa-graduation-cap"></i>
                <span>Grade 11A</span>
            </button>
            <button class="class-schedule-btn" onclick="showClassScheduleModal('Grade 11B')">
                <i class="fas fa-graduation-cap"></i>
                <span>Grade 11B</span>
            </button>
            <button class="class-schedule-btn" onclick="showClassScheduleModal('Grade 12A')">
                <i class="fas fa-graduation-cap"></i>
                <span>Grade 12A</span>
            </button>
            <button class="class-schedule-btn" onclick="showClassScheduleModal('Grade 12B')">
                <i class="fas fa-graduation-cap"></i>
                <span>Grade 12B</span>
            </button>
        </div>
    </div>
</div>

<!-- Class Schedule Modal -->
<div id="classScheduleModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalClassTitle">Class Schedule</h3>
            <button class="modal-close" onclick="closeClassScheduleModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="timetable-container">
                <div class="timetable-grid" id="modalTimetableGrid">
                    <!-- Timetable grid will be populated here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- All Class Schedules Modal -->
<div id="allClassSchedulesModal" class="modal-overlay" style="display: none;">
    <div class="modal-container large">
        <div class="modal-header">
            <h3>All Class Schedules</h3>
            <button class="modal-close" onclick="closeAllClassSchedulesModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div id="allClassSchedulesContent">
                <!-- All class schedules will be populated here -->
            </div>
        </div>
    </div>
</div>

<style>
/* Schedule Container */
.schedule-container {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-top: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.schedule-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background: #f8f9fa;
    border-bottom: 1px solid #e0e0e0;
    border-radius: 8px 8px 0 0;
}

.schedule-header h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    color: #333;
}

.icon-btn {
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: all 0.2s;
}

.icon-btn:hover {
    background: #e9ecef;
    color: #333;
}

/* Calendar Navigation */
.calendar-navigation {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #f8f9fa;
    border-radius: 12px;
    padding: 8px 16px;
    border: 1px solid #e0e0e0;
}

.nav-btn {
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 8px;
    background: #fff;
    color: #666;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-btn:hover {
    background: #1976d2;
    color: #fff;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(25, 118, 210, 0.3);
}

.nav-btn:active {
    transform: scale(0.95);
}

.current-date-display {
    text-align: center;
    min-width: 140px;
}

.date-main {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
    line-height: 1.2;
}

.date-sub {
    font-size: 0.75rem;
    color: #1976d2;
    font-weight: 500;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.date-sub.today {
    color: #2e7d32;
}

.date-sub.past {
    color: #666;
}

.date-sub.future {
    color: #f59e0b;
}

/* Class Schedule Buttons */
.class-schedule-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 12px;
    margin-top: 16px;
}

.class-schedule-btn {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    color: #333;
    font-size: 0.9rem;
    font-weight: 500;
}

.class-schedule-btn:hover {
    background: #f8f9fa;
    border-color: #1976d2;
    color: #1976d2;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.class-schedule-btn i {
    font-size: 1.5rem;
    color: #1976d2;
}

.class-schedule-btn:hover i {
    color: #1976d2;
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-container {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    max-width: 90%;
    max-height: 90%;
    overflow: hidden;
    animation: modalSlideIn 0.3s ease;
}

.modal-container.large {
    width: 95%;
    max-width: 1200px;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #e0e0e0;
    background: #f8f9fa;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.2rem;
    color: #666;
    cursor: pointer;
    padding: 8px;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.modal-close:hover {
    background: #e9ecef;
    color: #333;
}

.modal-body {
    padding: 24px;
    max-height: 70vh;
    overflow-y: auto;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Timetable Grid Styles */
.timetable-container {
    overflow-x: auto;
    padding: 0;
}

.timetable-grid {
    display: grid;
    grid-template-columns: 80px repeat(5, 1fr);
    gap: 2px;
    min-width: 800px;
    background: #f0f0f0;
    border: 2px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.timetable-header {
    background: #1976d2;
    color: white;
    padding: 12px 8px;
    text-align: center;
    font-weight: 600;
    font-size: 0.9rem;
    border-right: 1px solid #ddd;
}

.timetable-time {
    background: #f8f9fa;
    padding: 8px 4px;
    text-align: center;
    font-weight: 600;
    font-size: 0.8rem;
    color: #333;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
}

.timetable-slot {
    background: #fff;
    border: 1px solid #ddd;
    padding: 8px 6px;
    min-height: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    transition: all 0.2s ease;
}

.timetable-slot:hover {
    background: #f8f9fa;
    transform: scale(1.02);
}

.timetable-slot.empty {
    background: #f8f9fa;
    color: #999;
    font-style: italic;
    font-size: 0.8rem;
}

.timetable-slot.filled {
    background: #e3f2fd;
    border-color: #1976d2;
}

.timetable-slot.break {
    background: #fff3e0;
    border-color: #f59e0b;
}

.timetable-slot.lunch {
    background: #fce4ec;
    border-color: #ec4899;
}

.slot-subject {
    font-weight: 600;
    font-size: 0.85rem;
    color: #333;
    margin-bottom: 2px;
}

.slot-teacher {
    font-size: 0.75rem;
    color: #666;
    margin-bottom: 2px;
}

.slot-room {
    font-size: 0.7rem;
    color: #888;
    font-weight: 500;
}

.slot-time {
    font-size: 0.7rem;
    color: #1976d2;
    font-weight: 600;
    margin-top: 2px;
}

/* Simple List Table - uses basic-table styles from admin portal */

.subject-pill {
    display: inline-block;
    padding: 3px 8px;
    background: #1976d2;
    color: #fff;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    margin-bottom: 2px;
}

.subject-pill.chemistry {
    background: #ec4899;
}

.subject-pill.physics {
    background: #f59e0b;
}

.class-info {
    font-size: 0.7rem;
    color: #666;
    margin-bottom: 1px;
}

.room-info {
    font-size: 0.65rem;
    color: #999;
}

.break-text {
    font-weight: 500;
    color: #666;
    font-size: 0.7rem;
}

.date-display {
    font-size: 0.9rem;
    color: #6b7280;
    font-weight: 500;
}

/* Status Badges */
.status-badge {
    padding: 3px 6px;
    border-radius: 3px;
    font-size: 0.7rem;
    font-weight: 500;
}

.status-badge.upcoming {
    background: #dbeafe;
    color: #1e40af;
}

.status-badge.current {
    background: #dcfce7;
    color: #166534;
}

.status-badge.completed {
    background: #f3f4f6;
    color: #6b7280;
}

/* Form Section */
.form-section {
    margin-bottom: 16px;
}

.form-row {
    display: flex;
    gap: 16px;
    align-items: end;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.form-group label {
    font-size: 0.9rem;
    font-weight: 500;
    color: #333;
}

.form-select {
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 0.9rem;
    background: #fff;
    transition: border-color 0.2s;
}

.form-select:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .schedule-container {
        margin: 8px -16px;
        border-radius: 0;
        border-left: none;
        border-right: none;
    }
    
    .subject-pill {
        font-size: 0.65rem;
        padding: 2px 6px;
    }
    
    .form-row {
        flex-direction: column;
        gap: 12px;
    }
}
</style>

<script>
// Calendar navigation functionality
let currentDate = new Date('2024-12-18'); // Start with today (Wednesday)

function navigateDate(direction) {
    currentDate.setDate(currentDate.getDate() + direction);
    updateDateDisplay();
    filterScheduleByDate();
}

function updateDateDisplay() {
    const today = new Date();
    const isToday = currentDate.toDateString() === today.toDateString();
    
    const dateMain = document.getElementById('currentDateDisplay');
    const dateSub = document.getElementById('currentDateSub');
    
    // Format the date display
    const options = { 
        weekday: 'long', 
        month: 'short', 
        day: 'numeric' 
    };
    dateMain.textContent = currentDate.toLocaleDateString('en-US', options);
    
    // Update subtitle - only show "Today" or hide it
    if (isToday) {
        dateSub.textContent = 'Today';
        dateSub.className = 'date-sub today';
        dateSub.style.display = 'block';
    } else {
        dateSub.style.display = 'none';
    }
}

function filterScheduleByDate() {
    const tableRows = document.querySelectorAll('#teachingScheduleTable tbody tr');
    const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const currentDayName = dayNames[currentDate.getDay()];
    
    tableRows.forEach(row => {
        const dayAttribute = row.getAttribute('data-day');
        
        // Show only the selected day
        if (dayAttribute === currentDayName) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Class schedule data
const classScheduleData = {
    'Grade 10A': [
        ['Monday', '8:00-9:00', 'Mathematics', 'You', 'Room 201'],
        ['Monday', '9:00-10:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Monday', '10:00-11:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Monday', '11:00-12:00', 'Break', '', ''],
        ['Monday', '12:00-1:00', 'Lunch', '', ''],
        ['Monday', '1:00-2:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Monday', '2:00-3:00', 'Physical Education', 'Coach Wilson', 'Gym'],
        ['Tuesday', '8:00-9:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Tuesday', '9:00-10:00', 'Mathematics', 'You', 'Room 201'],
        ['Tuesday', '10:00-11:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Tuesday', '11:00-12:00', 'Break', '', ''],
        ['Tuesday', '12:00-1:00', 'Lunch', '', ''],
        ['Tuesday', '1:00-2:00', 'Art', 'Ms. Davis', 'Room 105'],
        ['Tuesday', '2:00-3:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Wednesday', '8:00-9:00', 'Mathematics', 'You', 'Room 201'],
        ['Wednesday', '9:00-10:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Wednesday', '10:00-11:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Wednesday', '11:00-12:00', 'Break', '', ''],
        ['Wednesday', '12:00-1:00', 'Lunch', '', ''],
        ['Wednesday', '1:00-2:00', 'Music', 'Mr. Taylor', 'Room 106'],
        ['Wednesday', '2:00-3:00', 'Physical Education', 'Coach Wilson', 'Gym'],
        ['Thursday', '8:00-9:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Thursday', '9:00-10:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Thursday', '10:00-11:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Thursday', '11:00-12:00', 'Break', '', ''],
        ['Thursday', '12:00-1:00', 'Lunch', '', ''],
        ['Thursday', '1:00-2:00', 'Mathematics', 'You', 'Room 201'],
        ['Thursday', '2:00-3:00', 'Art', 'Ms. Davis', 'Room 105'],
        ['Friday', '8:00-9:00', 'Mathematics', 'You', 'Room 201'],
        ['Friday', '9:00-10:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Friday', '10:00-11:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Friday', '11:00-12:00', 'Break', '', ''],
        ['Friday', '12:00-1:00', 'Lunch', '', ''],
        ['Friday', '1:00-2:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Friday', '2:00-3:00', 'Music', 'Mr. Taylor', 'Room 106']
    ],
    'Grade 10B': [
        ['Monday', '8:00-9:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Monday', '9:00-10:00', 'Mathematics', 'Mr. Wilson', 'Room 201'],
        ['Monday', '10:00-11:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Monday', '11:00-12:00', 'Break', '', ''],
        ['Monday', '12:00-1:00', 'Lunch', '', ''],
        ['Monday', '1:00-2:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Monday', '2:00-3:00', 'Physical Education', 'Coach Wilson', 'Gym'],
        ['Tuesday', '8:00-9:00', 'Chemistry', 'You', 'Room 203'],
        ['Tuesday', '9:00-10:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Tuesday', '10:00-11:00', 'Mathematics', 'Mr. Wilson', 'Room 201'],
        ['Tuesday', '11:00-12:00', 'Break', '', ''],
        ['Tuesday', '12:00-1:00', 'Lunch', '', ''],
        ['Tuesday', '1:00-2:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Tuesday', '2:00-3:00', 'Art', 'Ms. Davis', 'Room 105'],
        ['Wednesday', '8:00-9:00', 'Mathematics', 'Mr. Wilson', 'Room 201'],
        ['Wednesday', '9:00-10:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Wednesday', '10:00-11:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Wednesday', '11:00-12:00', 'Break', '', ''],
        ['Wednesday', '12:00-1:00', 'Lunch', '', ''],
        ['Wednesday', '1:00-2:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Wednesday', '2:00-3:00', 'Music', 'Mr. Taylor', 'Room 106'],
        ['Thursday', '8:00-9:00', 'Physics', 'You', 'Room 205'],
        ['Thursday', '9:00-10:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Thursday', '10:00-11:00', 'Mathematics', 'Mr. Wilson', 'Room 201'],
        ['Thursday', '11:00-12:00', 'Break', '', ''],
        ['Thursday', '12:00-1:00', 'Lunch', '', ''],
        ['Thursday', '1:00-2:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Thursday', '2:00-3:00', 'Art', 'Ms. Davis', 'Room 105'],
        ['Friday', '8:00-9:00', 'English', 'Ms. Johnson', 'Room 102'],
        ['Friday', '9:00-10:00', 'Mathematics', 'Mr. Wilson', 'Room 201'],
        ['Friday', '10:00-11:00', 'Science', 'Dr. Brown', 'Room 104'],
        ['Friday', '11:00-12:00', 'Break', '', ''],
        ['Friday', '12:00-1:00', 'Lunch', '', ''],
        ['Friday', '1:00-2:00', 'History', 'Mr. Smith', 'Room 103'],
        ['Friday', '2:00-3:00', 'Physical Education', 'Coach Wilson', 'Gym']
    ]
    // Add more classes as needed...
};

function showClassScheduleModal(className) {
    const modal = document.getElementById('classScheduleModal');
    const title = document.getElementById('modalClassTitle');
    const grid = document.getElementById('modalTimetableGrid');
    
    title.textContent = `${className} Schedule`;
    grid.innerHTML = '';
    
    // Create timetable grid
    createTimetableGrid(grid, className);
    
    modal.style.display = 'flex';
}

function createTimetableGrid(container, className) {
    const schedule = classScheduleData[className] || [];
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    const timeSlots = [
        '8:00-9:00', '9:00-10:00', '10:00-11:00', '11:00-12:00', 
        '12:00-1:00', '1:00-2:00', '2:00-3:00'
    ];
    
    // Create header row
    const headerRow = document.createElement('div');
    headerRow.className = 'timetable-header';
    headerRow.textContent = 'Time';
    container.appendChild(headerRow);
    
    // Add day headers
    days.forEach(day => {
        const dayHeader = document.createElement('div');
        dayHeader.className = 'timetable-header';
        dayHeader.textContent = day.substring(0, 3);
        container.appendChild(dayHeader);
    });
    
    // Create time slots and schedule
    timeSlots.forEach(timeSlot => {
        // Time column
        const timeCell = document.createElement('div');
        timeCell.className = 'timetable-time';
        timeCell.textContent = timeSlot;
        container.appendChild(timeCell);
        
        // Day columns for this time slot
        days.forEach(day => {
            const slot = document.createElement('div');
            slot.className = 'timetable-slot';
            
            // Find schedule for this day and time
            const scheduleItem = schedule.find(item => 
                item[0] === day && item[1] === timeSlot
            );
            
            if (scheduleItem) {
                const [dayName, time, subject, teacher, room] = scheduleItem;
                
                if (subject === 'Break') {
                    slot.className += ' break';
                    slot.innerHTML = `
                        <div class="slot-subject">Break</div>
                    `;
                } else if (subject === 'Lunch') {
                    slot.className += ' lunch';
                    slot.innerHTML = `
                        <div class="slot-subject">Lunch</div>
                    `;
                } else {
                    slot.className += ' filled';
                    slot.innerHTML = `
                        <div class="slot-subject">${subject}</div>
                        <div class="slot-teacher">${teacher}</div>
                        <div class="slot-room">${room}</div>
                        <div class="slot-time">${time}</div>
                    `;
                }
            } else {
                slot.className += ' empty';
                slot.innerHTML = '<div>Free</div>';
            }
            
            container.appendChild(slot);
        });
    });
}

function closeClassScheduleModal() {
    document.getElementById('classScheduleModal').style.display = 'none';
}

function showAllClassSchedulesModal() {
    const modal = document.getElementById('allClassSchedulesModal');
    const content = document.getElementById('allClassSchedulesContent');
    
    content.innerHTML = '';
    
    // Create schedules for all classes in sequential order
    const classOrder = ['Grade 10A', 'Grade 10B', 'Grade 11A', 'Grade 11B', 'Grade 12A', 'Grade 12B'];
    
    classOrder.forEach(className => {
        const section = document.createElement('div');
        section.className = 'simple-section';
        section.innerHTML = `
            <div class="simple-header">
                <h3><i class="fas fa-graduation-cap"></i> ${className} Schedule</h3>
            </div>
            <div class="timetable-container">
                <div class="timetable-grid" id="timetable-${className.replace(' ', '')}">
                    <!-- Timetable grid will be populated here -->
                </div>
            </div>
        `;
        content.appendChild(section);
        
        // Create timetable grid for this class
        const grid = section.querySelector('.timetable-grid');
        createTimetableGrid(grid, className);
    });
    
    modal.style.display = 'flex';
}

function closeAllClassSchedulesModal() {
    document.getElementById('allClassSchedulesModal').style.display = 'none';
}

// Initialize - show today's schedule by default
document.addEventListener('DOMContentLoaded', function() {
    // Initialize date display and filter
    updateDateDisplay();
    filterScheduleByDate();
});
</script>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
