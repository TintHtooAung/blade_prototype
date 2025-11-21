<?php
$pageTitle = 'Smart Campus Nova Hub - Event Management';
$pageIcon = 'fas fa-calendar-check';
$pageHeading = 'Event Management';
$activePage = 'events';

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
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn" onclick="openCreateEventModal()">
            <i class="fas fa-plus"></i> Add Event
        </button>
    </div>
</div>

<!-- Create Event Modal -->
<div id="createEventModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 800px; max-height: 90vh; overflow-y: auto;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-calendar-plus"></i> <span id="eventModalTitle">Create New Event</span></h4>
            <button class="icon-btn" onclick="closeCreateEventModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Event Title *</label>
                        <input type="text" class="form-input" id="eventTitle" placeholder="e.g., Annual Science Fair">
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select class="form-select" id="eventCategory">
                            <option value="academic">Academic</option>
                            <option value="sports">Sports</option>
                            <option value="cultural">Cultural</option>
                            <option value="meeting">Meeting</option>
                            <option value="holiday">Holiday</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Start Date & Time *</label>
                        <div class="dual-input">
                            <input type="date" class="form-input" id="eventStartDate">
                            <input type="time" class="form-input" id="eventStart">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>End Date & Time</label>
                        <div class="dual-input">
                            <input type="date" class="form-input" id="eventEndDate">
                            <input type="time" class="form-input" id="eventEnd">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Location *</label>
                        <input type="text" class="form-input" id="eventLocation" placeholder="e.g., Main Hall">
                    </div>
                    <div class="form-group">
                        <label>Participants</label>
                        <select class="form-select" id="eventAudience">
                            <option value="all">All School</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" id="studentGradeRow" style="display:none;">
                    <div class="form-group" style="flex:1;">
                        <label>Select Grades</label>
                        <div id="studentGradeSelector" class="participant-chip-grid">
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 1"> Grade 1</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 2"> Grade 2</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 3"> Grade 3</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 4"> Grade 4</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 5"> Grade 5</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 6"> Grade 6</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 7"> Grade 7</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 8"> Grade 8</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 9"> Grade 9</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 10"> Grade 10</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 11"> Grade 11</label>
                            <label class="grade-chip"><input type="checkbox" class="grade-checkbox" value="Grade 12"> Grade 12</label>
                        </div>
                    </div>
                </div>
                <div class="form-row" id="teacherGradeRow" style="display:none;">
                    <div class="form-group" style="flex:1;">
                        <label>Select Teacher Grades</label>
                        <div id="teacherGradeSelector" class="participant-chip-grid">
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 1"> Grade 1</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 2"> Grade 2</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 3"> Grade 3</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 4"> Grade 4</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 5"> Grade 5</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 6"> Grade 6</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 7"> Grade 7</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 8"> Grade 8</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 9"> Grade 9</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 10"> Grade 10</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 11"> Grade 11</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-grade-checkbox" value="Grade 12"> Grade 12</label>
                        </div>
                        <small class="helper-text">Choose the grade levels whose teachers should be notified.</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Description</label>
                        <textarea class="form-input" id="eventDesc" rows="3" placeholder="Event description..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeCreateEventModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveNewEvent()">
                <i class="fas fa-check"></i> <span id="eventModalSaveBtn">Save Event</span>
            </button>
        </div>
    </div>
</div>

<!-- Events List -->
<div class="simple-section" style="margin-top: 16px;">
    <div class="simple-header" style="flex-wrap:wrap; gap:16px;">
        <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
            <h4 style="margin:0;">All Events</h4>
        </div>
        <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
            <select class="form-select" id="monthSelector" style="width:auto; min-width:160px;">
                <option value="">Select Month</option>
            </select>
            <select class="form-select" id="filterCategory" style="width:auto;">
                <option value="all">All Categories</option>
                <option value="academic">Academic</option>
                <option value="sports">Sports</option>
                <option value="cultural">Cultural</option>
                <option value="meeting">Meeting</option>
                <option value="holiday">Holiday</option>
            </select>
            <select class="form-select" id="filterStatus" style="width:auto;">
                <option value="all">All Status</option>
                <option value="upcoming">Upcoming</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
            </select>
            <select class="form-select" id="filterPeriod" style="width:auto;">
                <option value="all">All Time</option>
                <option value="today">Today</option>
                <option value="this_week">This Week</option>
                <option value="this_month">This Month</option>
                <option value="next_month">Next Month</option>
                <option value="this_year">This Year</option>
            </select>
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th>Event Title</th>
                    <th>Category</th>
                    <th>Date & Time</th>
                    <th>Location</th>
                    <th>Participants</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="eventsTableBody">
                <!-- Events will be loaded here -->
            </tbody>
        </table>
    </div>
</div>

<!-- Event Category Filter for Calendar -->
<div class="category-filter-section" style="margin-top: 24px;">
    <h3 class="category-filter-title">Event Categories</h3>
    <div class="category-tags">
        <button class="category-tag active" data-category="academic">
            <span class="tag-dot" style="background: #4285f4;"></span>
            Academic
            <i class="fas fa-check tag-check"></i>
        </button>
        <button class="category-tag active" data-category="sports">
            <span class="tag-dot" style="background: #34a853;"></span>
            Sports
            <i class="fas fa-check tag-check"></i>
        </button>
        <button class="category-tag active" data-category="cultural">
            <span class="tag-dot" style="background: #fbbc04;"></span>
            Cultural
            <i class="fas fa-check tag-check"></i>
        </button>
        <button class="category-tag active" data-category="meeting">
            <span class="tag-dot" style="background: #ea4335;"></span>
            Meetings
            <i class="fas fa-check tag-check"></i>
        </button>
        <button class="category-tag active" data-category="holiday">
            <span class="tag-dot" style="background: #9e9e9e;"></span>
            Holidays
            <i class="fas fa-check tag-check"></i>
        </button>
    </div>
</div>

<!-- Calendar Section -->
<div class="simple-section" style="margin-top: 16px;">
    <div class="calendar-header" style="gap:16px; flex-wrap:wrap;">
        <div class="calendar-nav inline-nav" id="calendarNavControls" style="gap:8px;">
            <button class="mini-nav-btn" id="prevPeriod">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="mini-nav-btn" id="nextPeriod">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="calendar-period-display" style="font-weight:600; color:#111827;">
            <span id="currentPeriod">October 2025</span>
        </div>
        <div class="calendar-view-options" style="margin-left:auto;">
            <div class="view-toggle-group">
                <button class="view-toggle-btn" data-view="day">Day</button>
                <button class="view-toggle-btn" data-view="week">Week</button>
                <button class="view-toggle-btn active" data-view="month">Month</button>
            </div>
        </div>
    </div>

    <!-- Month View -->
    <div class="calendar-view-container" id="monthView">
        <div class="calendar-weekdays">
            <div class="calendar-weekday">Sun</div>
            <div class="calendar-weekday">Mon</div>
            <div class="calendar-weekday">Tue</div>
            <div class="calendar-weekday">Wed</div>
            <div class="calendar-weekday">Thu</div>
            <div class="calendar-weekday">Fri</div>
            <div class="calendar-weekday">Sat</div>
        </div>
        <div class="calendar-grid" id="monthGrid">
            <!-- Month grid will be generated by JS -->
        </div>
    </div>

    <!-- Week View -->
    <div class="calendar-view-container" id="weekView" style="display:none;">
        <div class="week-view-grid">
            <div class="week-time-column">
                <div class="week-time-header"></div>
                <div class="week-time-slots" id="weekTimeSlots">
                    <!-- Time slots will be generated by JS -->
                </div>
            </div>
            <div class="week-days-container" id="weekDaysContainer">
                <!-- Week days will be generated by JS -->
            </div>
        </div>
    </div>

    <!-- Day View -->
    <div class="calendar-view-container" id="dayView" style="display:none;">
        <div class="day-view-grid">
            <div class="day-time-column">
                <div class="day-time-header"></div>
                <div class="day-time-slots" id="dayTimeSlots">
                    <!-- Time slots will be generated by JS -->
                </div>
            </div>
            <div class="day-events-container" id="dayEventsContainer">
                <!-- Day events will be generated by JS -->
            </div>
        </div>
    </div>
</div>

<!-- Event Details Modal (hidden by default) -->
<div id="eventModal" class="modal" style="display:none;">
    <div class="modal-content" style="max-width:500px;">
        <div class="modal-header">
            <h3 id="eventModalTitle">Event Details</h3>
            <button class="modal-close" onclick="closeEventModal()">&times;</button>
        </div>
        <div class="modal-body">
            <div class="event-detail-row">
                <i class="fas fa-clock"></i>
                <span id="eventModalTime"></span>
            </div>
            <div class="event-detail-row">
                <i class="fas fa-map-marker-alt"></i>
                <span id="eventModalLocation"></span>
            </div>
            <div class="event-detail-row">
                <i class="fas fa-align-left"></i>
                <span id="eventModalDescription"></span>
            </div>
            <div class="event-detail-row" style="border-bottom:none; padding-top: 4px;">
                <button class="simple-btn-icon" onclick="viewEventDetailFromModal()" title="View Event Details">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Category Badges */
.badge-type.academic {
    background: #e3f2fd;
    color: #1976d2;
}

.badge-type.sports {
    background: #f3e5f5;
    color: #7b1fa2;
}

.badge-type.cultural {
    background: #fff3e0;
    color: #ef6c00;
}

.badge-type.meeting {
    background: #e8f5e9;
    color: #2e7d32;
}

.badge-type.holiday {
    background: #ffebee;
    color: #c62828;
}

/* Clickable cells */
.clickable {
    cursor: pointer;
    transition: background 0.2s;
}

.clickable:hover {
    background: #f0f7ff;
}

.clickable strong {
    color: #1976d2;
}

.clickable strong:hover {
    text-decoration: underline;
}

/* Tags */
.tag {
    display: inline-block;
    padding: 4px 10px;
    background: #f0f0f0;
    border-radius: 12px;
    font-size: 0.8rem;
    color: #666;
}

/* Responsive table */
@media screen and (max-width: 768px) {
    .responsive-table thead {
        display: none;
    }
    
    .responsive-table tbody tr {
        display: block;
        margin-bottom: 16px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .responsive-table tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 16px;
        border: none;
        border-bottom: 1px solid #f5f5f5;
    }
    
    .responsive-table tbody td:last-child {
        border-bottom: none;
    }
    
    .responsive-table tbody td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #666;
        margin-right: 12px;
    }
}

/* Category Filter Section */
.category-filter-section {
    margin: 16px 0;
    padding: 16px 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.category-filter-title {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin: 0 0 12px 0;
}

.category-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.category-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: #f5f5f5;
    border: 2px solid #e0e0e0;
    border-radius: 24px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #666;
    cursor: pointer;
    transition: all 0.2s ease;
    position: relative;
}

.category-tag:hover {
    background: #ebebeb;
    border-color: #d0d0d0;
}

.category-tag.active {
    background: #fff;
    border-color: currentColor;
    color: #333;
}

.tag-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    flex-shrink: 0;
}

.tag-check {
    font-size: 0.75rem;
    opacity: 0;
    transition: opacity 0.2s;
}

.category-tag.active .tag-check {
    opacity: 1;
    color: #34a853;
}

/* Calendar Header */
.calendar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    background: #fff;
    border-bottom: 1px solid #e0e0e0;
}

.calendar-nav {
    display: flex;
    align-items: center;
    gap: 0;
    flex: 1;
    max-width: 400px;
    background: #f8f9fa;
    border-radius: 8px;
    padding: 4px;
    border: 1px solid #e0e0e0;
}

.calendar-nav h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    white-space: nowrap;
    flex: 1;
    text-align: center;
    padding: 0 12px;
}

.calendar-nav .mini-nav-btn {
    flex-shrink: 0;
}

.calendar-nav.inline-nav {
    max-width: none;
    background: transparent;
    border: none;
    padding: 0;
}

.calendar-nav.inline-nav h5 {
    font-size: 1rem;
    padding: 0 8px;
}

.mini-nav-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px 12px;
    color: #666;
    border-radius: 6px;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mini-nav-btn:hover {
    background: #e0e0e0;
}

.calendar-view-options {
    display: flex;
    align-items: center;
    gap: 12px;
}

.view-toggle-group {
    display: flex;
    gap: 4px;
    background: #f0f0f0;
    padding: 4px;
    border-radius: 6px;
}

.view-toggle-btn {
    padding: 6px 16px;
    border: none;
    background: transparent;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85rem;
    font-weight: 500;
    color: #666;
    transition: all 0.2s;
}

.view-toggle-btn:hover {
    background: #e0e0e0;
}

.view-toggle-btn.active {
    background: #fff;
    color: #1976d2;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

/* Month View */
.calendar-view-container {
    background: #fff;
    padding: 16px;
}

.calendar-weekdays {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background: #e0e0e0;
    border: 1px solid #e0e0e0;
    margin-bottom: 1px;
}

.calendar-weekday {
    background: #f8f9fa;
    padding: 12px;
    text-align: center;
    font-weight: 600;
    font-size: 0.85rem;
    color: #666;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background: #e0e0e0;
    border: 1px solid #e0e0e0;
    min-height: 500px;
}

.calendar-day {
    background: #fff;
    min-height: 100px;
    padding: 8px;
    position: relative;
    cursor: pointer;
    transition: background-color 0.2s;
}

.calendar-day:hover {
    background: #f8f9fa;
}

.calendar-day.other-month {
    background: #fafafa;
    color: #999;
}

.calendar-day.today {
    background: #e3f2fd;
}

.calendar-day-number {
    font-size: 0.9rem;
    font-weight: 500;
    color: #333;
    margin-bottom: 4px;
}

.calendar-day.other-month .calendar-day-number {
    color: #999;
}

.calendar-day.today .calendar-day-number {
    background: #1976d2;
    color: #fff;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
}

.calendar-events {
    display: flex;
    flex-direction: column;
    gap: 2px;
    margin-top: 4px;
}

.calendar-event {
    padding: 2px 6px;
    border-radius: 3px;
    font-size: 0.75rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    cursor: pointer;
    transition: opacity 0.2s;
    color: #fff;
}

.calendar-event:hover {
    opacity: 0.85;
}

/* Week View */
.week-view-grid {
    display: flex;
    min-height: 600px;
}

.week-time-column {
    width: 80px;
    flex-shrink: 0;
    border-right: 1px solid #e0e0e0;
}

.week-time-header {
    height: 60px;
    border-bottom: 1px solid #e0e0e0;
}

.week-time-slots {
    position: relative;
}

.week-time-slot {
    height: 60px;
    border-bottom: 1px solid #f0f0f0;
    padding: 4px 8px;
    font-size: 0.75rem;
    color: #666;
}

.week-days-container {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background: #e0e0e0;
}

.week-day-column {
    background: #fff;
    position: relative;
}

.week-day-header {
    height: 60px;
    border-bottom: 1px solid #e0e0e0;
    padding: 8px;
    text-align: center;
}

.week-day-name {
    font-size: 0.75rem;
    color: #666;
    font-weight: 600;
}

.week-day-date {
    font-size: 1.2rem;
    font-weight: 500;
    color: #333;
    margin-top: 4px;
}

.week-day-date.today {
    background: #1976d2;
    color: #fff;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.week-day-events {
    position: relative;
    height: calc(24 * 60px);
}

.week-event {
    position: absolute;
    left: 4px;
    right: 4px;
    padding: 4px 6px;
    border-radius: 4px;
    font-size: 0.75rem;
    color: #fff;
    cursor: pointer;
    overflow: hidden;
}

.week-event:hover {
    opacity: 0.85;
}

/* Day View */
.day-view-grid {
    display: flex;
    min-height: 600px;
}

.day-time-column {
    width: 80px;
    flex-shrink: 0;
    border-right: 1px solid #e0e0e0;
}

.day-time-header {
    height: 80px;
    border-bottom: 1px solid #e0e0e0;
}

.day-time-slots {
    position: relative;
}

.day-time-slot {
    height: 60px;
    border-bottom: 1px solid #f0f0f0;
    padding: 4px 8px;
    font-size: 0.75rem;
    color: #666;
}

.day-events-container {
    flex: 1;
    background: #fff;
    position: relative;
}

.day-header {
    height: 80px;
    border-bottom: 1px solid #e0e0e0;
    padding: 16px;
    text-align: center;
}

.day-date-label {
    font-size: 1.5rem;
    font-weight: 500;
    color: #333;
}

.day-events-timeline {
    position: relative;
    height: calc(24 * 60px);
}

.day-event {
    position: absolute;
    left: 8px;
    right: 8px;
    padding: 8px 12px;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
    overflow: hidden;
}

.day-event:hover {
    opacity: 0.85;
}

/* Event Detail Modal */
.event-detail-row {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
}

.event-detail-row:last-child {
    border-bottom: none;
}

.event-detail-row i {
    color: #666;
    width: 20px;
    margin-top: 2px;
}

.event-detail-row span {
    flex: 1;
    color: #333;
}

/* File Attachments Styling */
.attached-files-list {
    margin-top: 12px;
}

.attached-file-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px;
    background: #f8f9fa;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    margin-bottom: 8px;
}

.attached-file-info {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.attached-file-icon {
    width: 32px;
    height: 32px;
    background: #e3f2fd;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1976d2;
    font-size: 14px;
}

.attached-file-details {
    flex: 1;
}

.attached-file-name {
    font-weight: 500;
    color: #333;
    font-size: 14px;
    margin-bottom: 2px;
}

.attached-file-size {
    font-size: 12px;
    color: #666;
}

.attached-file-actions {
    display: flex;
    gap: 8px;
}

.participant-chip-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.helper-text {
    font-size: 0.8rem;
    color: #6b7280;
    margin-top: 6px;
    display: block;
}

.grade-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    padding: 6px 10px;
    font-size: 0.85rem;
    background: #fff;
    cursor: pointer;
}

.grade-chip input {
    margin: 0;
}

.dual-input {
    display: flex;
    gap: 12px;
    width: 100%;
}

.dual-input input {
    flex: 1;
}

.remove-file-btn {
    background: #ffebee;
    color: #d32f2f;
    border: none;
    padding: 6px 8px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.2s;
}

.remove-file-btn:hover {
    background: #ffcdd2;
}
</style>

<script>
let editingEventId = null;
let currentDate = new Date();
let currentView = 'month';
let activeFilters = {
    categories: ['academic', 'sports', 'cultural', 'meeting', 'holiday']
};

const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

const categoryColors = {
    academic: '#4285f4', 
    sports: '#34a853', 
    cultural: '#fbbc04', 
    meeting: '#ea4335', 
    holiday: '#9e9e9e'
};

function getMonthValueFromDate(dateObj) {
    if (!dateObj) return '';
    return `${dateObj.getFullYear()}-${String(dateObj.getMonth() + 1).padStart(2, '0')}`;
}

function populateMonthSelector(centerDate = currentDate) {
    const selector = document.getElementById('monthSelector');
    if (!selector) return;
    selector.innerHTML = '';
    const totalOptions = 13;
    const half = Math.floor(totalOptions / 2);
    const startDate = new Date(centerDate.getFullYear(), centerDate.getMonth() - half, 1);
    for (let i = 0; i < totalOptions; i++) {
        const optionDate = new Date(startDate.getFullYear(), startDate.getMonth() + i, 1);
        const option = document.createElement('option');
        option.value = getMonthValueFromDate(optionDate);
        option.textContent = optionDate.toLocaleString('default', { month: 'long', year: 'numeric' });
        selector.appendChild(option);
    }
    selector.value = getMonthValueFromDate(centerDate);
}

function syncMonthSelectorWithCurrentDate() {
    const selector = document.getElementById('monthSelector');
    if (!selector) return;
    const value = getMonthValueFromDate(currentDate);
    const hasOption = Array.from(selector.options).some(opt => opt.value === value);
    if (!hasOption) {
        populateMonthSelector(currentDate);
    } else {
        selector.value = value;
    }
}

function updatePeriodNavigationVisibility() {
    const nav = document.getElementById('calendarNavControls');
    if (!nav) return;
    nav.style.display = currentView === 'month' ? 'none' : 'flex';
}

// Sample events
const sampleEvents = [
    {
        id: 'EVT001',
        title: 'Mathematics Final Exam',
        category: 'academic',
        date: '2024-12-15',
        start: '09:00',
        end: '12:00',
        startTime: '09:00',
        endTime: '12:00',
        time: '09:00 AM - 12:00 PM',
        location: 'Main Hall',
        audience: 'students',
        desc: 'Final examination for Mathematics course',
        description: 'Final examination for Mathematics course'
    },
    {
        id: 'EVT002',
        title: 'Football Championship',
        category: 'sports',
        date: '2024-12-18',
        start: '14:00',
        end: '17:00',
        startTime: '14:00',
        endTime: '17:00',
        time: '02:00 PM - 05:00 PM',
        location: 'Sports Ground',
        audience: 'all',
        desc: 'Annual football championship finals',
        description: 'Annual football championship finals'
    },
    {
        id: 'EVT003',
        title: 'Cultural Festival',
        category: 'cultural',
        date: '2024-12-20',
        start: '10:00',
        end: '16:00',
        startTime: '10:00',
        endTime: '16:00',
        time: '10:00 AM - 04:00 PM',
        location: 'School Auditorium',
        audience: 'all',
        desc: 'Annual cultural program',
        description: 'Annual cultural program'
    },
    {
        id: 'EVT004',
        title: 'Parent-Teacher Conference',
        category: 'meeting',
        date: '2024-12-22',
        start: '09:00',
        end: '15:00',
        startTime: '09:00',
        endTime: '15:00',
        time: '09:00 AM - 03:00 PM',
        location: 'Conference Room',
        audience: 'parents',
        desc: 'Scheduled parent-teacher meetings',
        description: 'Scheduled parent-teacher meetings'
    }
];

function getSelectedGrades(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return [];
    return Array.from(container.querySelectorAll('input.grade-checkbox:checked')).map(cb => cb.value);
}

function setSelectedGrades(containerId, grades = []) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.querySelectorAll('input.grade-checkbox').forEach(cb => {
        cb.checked = grades.includes(cb.value);
    });
}

function resetGradeSelector(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.querySelectorAll('input.grade-checkbox').forEach(cb => cb.checked = false);
}

function getSelectedTeacherGrades(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return [];
    return Array.from(container.querySelectorAll('input.teacher-grade-checkbox:checked')).map(cb => cb.value);
}

function setSelectedTeacherGrades(containerId, grades = []) {
    const container = document.getElementById(containerId);
    if (!container) return [];
    container.querySelectorAll('input.teacher-grade-checkbox').forEach(cb => {
        cb.checked = grades.includes(cb.value);
    });
}

function resetTeacherGradeSelector(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.querySelectorAll('input.teacher-grade-checkbox').forEach(cb => cb.checked = false);
}

function toggleGradeSelector(selectEl, studentRowId, studentContainerId, teacherGradeRowId = null, teacherGradeContainerId = null) {
    const studentRow = document.getElementById(studentRowId);
    const teacherRow = teacherGradeRowId ? document.getElementById(teacherGradeRowId) : null;
    const value = selectEl ? selectEl.value : 'all';
    
    if (studentRow) {
        if (value === 'students') {
            studentRow.style.display = 'block';
        } else {
            studentRow.style.display = 'none';
            resetGradeSelector(studentContainerId);
        }
    }
    
    if (teacherRow) {
        if (value === 'teachers') {
            teacherRow.style.display = 'block';
        } else {
            teacherRow.style.display = 'none';
            resetTeacherGradeSelector(teacherGradeContainerId);
        }
    }
}

function parseDateTime(dateStr, timeStr, defaultTime = '00:00') {
    if (!dateStr) return new Date();
    return new Date(`${dateStr}T${timeStr || defaultTime}`);
}

function getEventStartDate(event) {
    return event.startDate || event.date;
}

function getEventEndDate(event) {
    return event.endDate || event.startDate || event.date;
}

function formatDateRange(startDate, endDate) {
    if (!startDate) return '—';
    const start = new Date(startDate);
    const end = endDate ? new Date(endDate) : start;
    const startText = start.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
    if (!endDate || startDate === endDate) return startText;
    const sameYear = start.getFullYear() === end.getFullYear();
    const sameMonth = start.getMonth() === end.getMonth() && sameYear;
    if (sameMonth) {
        return `${start.toLocaleDateString('en-US', { month: 'short' })} ${start.getDate()} - ${end.getDate()}, ${start.getFullYear()}`;
    }
    if (sameYear) {
        return `${start.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${end.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}, ${start.getFullYear()}`;
    }
    return `${startText} - ${end.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}`;
}

function formatTimeRange(start, end) {
    if (!start) return 'All Day';
    if (!end) return formatTime(start);
    return `${formatTime(start)} - ${formatTime(end)}`;
}

// Get all events (sample + stored)
function getAllEvents() {
    const storedEvents = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    // Convert stored events to calendar format
    const convertedEvents = storedEvents.map(e => ({
        ...e,
    startDate: e.startDate || e.date,
    endDate: e.endDate || e.startDate || e.date,
        startTime: e.start || '00:00',
        endTime: e.end || '23:59',
        time: e.start && e.end ? 
            `${formatTime(e.start)} - ${formatTime(e.end)}` : 
            (e.start ? `${formatTime(e.start)}` : 'All Day'),
        description: e.desc || ''
    }));
    return [...sampleEvents, ...convertedEvents];
}

function formatTime(timeStr) {
    if (!timeStr) return '';
    const [h, m] = timeStr.split(':');
    const hour = parseInt(h);
    const ampm = hour >= 12 ? 'PM' : 'AM';
    const displayHour = hour % 12 || 12;
    return `${displayHour}:${m} ${ampm}`;
}

function getFilteredEvents() {
    const allEvents = getAllEvents();
    return allEvents.filter(e => {
        const categoryMatch = activeFilters.categories.includes(e.category);
        return categoryMatch;
    });
}

// Create Event Modal Functions
function openCreateEventModal() {
    editingEventId = null;
    clearForm();
    document.getElementById('eventModalTitle').textContent = 'Create New Event';
    document.getElementById('eventModalSaveBtn').textContent = 'Save Event';
    document.getElementById('createEventModal').style.display = 'flex';
}

function closeCreateEventModal() {
    document.getElementById('createEventModal').style.display = 'none';
    editingEventId = null;
    clearForm();
}

function openEditEventModal(eventId) {
    const events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    const eventData = events.find(e => e.id === eventId);
    
    if (!eventData) {
        alert('Event not found');
        return;
    }
    
    editingEventId = eventId;
    
    // Update modal title
    document.getElementById('eventModalTitle').textContent = 'Edit Event';
    document.getElementById('eventModalSaveBtn').textContent = 'Update Event';
    
    // Load event data into form
    const startDate = eventData.startDate || eventData.date || '';
    const endDate = eventData.endDate || startDate;
    document.getElementById('eventTitle').value = eventData.title || '';
    document.getElementById('eventCategory').value = eventData.category || 'academic';
    document.getElementById('eventStartDate').value = startDate;
    document.getElementById('eventEndDate').value = endDate;
    document.getElementById('eventStart').value = eventData.start || '';
    document.getElementById('eventEnd').value = eventData.end || '';
    document.getElementById('eventLocation').value = eventData.location || '';
    document.getElementById('eventAudience').value = eventData.audience || 'all';
    document.getElementById('eventDesc').value = eventData.desc || eventData.description || '';
    
    // Handle student grade selection visibility
    const audienceSelect = document.getElementById('eventAudience');
    if (audienceSelect) {
        toggleGradeSelector(audienceSelect, 'studentGradeRow', 'studentGradeSelector', 'teacherGradeRow', 'teacherGradeSelector');
        if (eventData.audience === 'students' && eventData.audienceGrades) {
            setSelectedGrades('studentGradeSelector', eventData.audienceGrades);
        } else {
            resetGradeSelector('studentGradeSelector');
        }
        if (eventData.audience === 'teachers' && eventData.teacherGrades) {
            setSelectedTeacherGrades('teacherGradeSelector', eventData.teacherGrades);
        } else {
            resetTeacherGradeSelector('teacherGradeSelector');
        }
    }
    
    // Show modal
    document.getElementById('createEventModal').style.display = 'flex';
}

function saveNewEvent() {
    const title = document.getElementById('eventTitle').value.trim();
    const category = document.getElementById('eventCategory').value;
    const startDate = document.getElementById('eventStartDate').value;
    const endDate = document.getElementById('eventEndDate').value || startDate;
    const start = document.getElementById('eventStart').value;
    const end = document.getElementById('eventEnd').value;
    const location = document.getElementById('eventLocation').value.trim();
    const audience = document.getElementById('eventAudience').value;
    const desc = document.getElementById('eventDesc').value.trim();
    const audienceGrades = audience === 'students' ? getSelectedGrades('studentGradeSelector') : [];
    const teacherGrades = audience === 'teachers' ? getSelectedTeacherGrades('teacherGradeSelector') : [];
    
    if (!title || !startDate || !start || !location) {
        if (typeof showToast === 'function') {
            showToast('Please fill all required fields (Title, Start Date, Start Time, Location)', 'warning');
        } else {
            alert('Please fill all required fields (Title, Start Date, Start Time, Location)');
        }
        return;
    }
    
    if (audience === 'students' && audienceGrades.length === 0) {
        if (typeof showToast === 'function') {
            showToast('Please select at least one grade for student events', 'warning');
        } else {
            alert('Please select at least one grade for student events');
        }
        return;
    }
    
    if (audience === 'teachers' && teacherGrades.length === 0) {
        if (typeof showToast === 'function') {
            showToast('Please select at least one grade for teacher events', 'warning');
        } else {
            alert('Please select at least one grade for teacher events');
        }
        return;
    }
    
    const eventData = {
        id: editingEventId || 'EVT' + Date.now(),
        title,
        category,
        date: startDate,
        startDate,
        endDate,
        start,
        end,
        location,
        audience,
        audienceGrades,
        desc,
        teacherGrades
    };
    
    // Save to localStorage
    let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    
    if (editingEventId) {
        const index = events.findIndex(e => e.id === editingEventId);
        if (index > -1) {
            events[index] = eventData;
        }
    } else {
        events.push(eventData);
    }
    
    localStorage.setItem('adminEvents', JSON.stringify(events));
    
    if (typeof showToast === 'function') {
        showToast(editingEventId ? 
            `Event "${eventData.title}" (${eventData.id}) updated successfully` : 
            `Event "${eventData.title}" (${eventData.id}) created successfully`, 
            'success');
    } else {
        alert(editingEventId ? 
            `Event "${eventData.title}" (${eventData.id}) updated successfully` : 
            `Event "${eventData.title}" (${eventData.id}) created successfully`);
    }
    
    closeCreateEventModal();
    loadEvents();
    renderCurrentView();
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const createModal = document.getElementById('createEventModal');
    if (createModal) {
        createModal.addEventListener('click', function(e) {
            if (e.target === createModal) {
                closeCreateEventModal();
            }
        });
    }
    
    const audienceSelect = document.getElementById('eventAudience');
    if (audienceSelect) {
        audienceSelect.addEventListener('change', function() {
            toggleGradeSelector(this, 'studentGradeRow', 'studentGradeSelector', 'teacherGradeRow', 'teacherGradeSelector');
        });
        toggleGradeSelector(audienceSelect, 'studentGradeRow', 'studentGradeSelector', 'teacherGradeRow', 'teacherGradeSelector');
    }
});

function clearForm() {
    document.getElementById('eventTitle').value = '';
    document.getElementById('eventCategory').value = 'academic';
    document.getElementById('eventStartDate').value = '';
    document.getElementById('eventEndDate').value = '';
    document.getElementById('eventStart').value = '';
    document.getElementById('eventEnd').value = '';
    document.getElementById('eventLocation').value = '';
    document.getElementById('eventAudience').value = 'all';
    document.getElementById('eventDesc').value = '';
    resetGradeSelector('studentGradeSelector');
    resetTeacherGradeSelector('teacherGradeSelector');
    toggleGradeSelector(document.getElementById('eventAudience'), 'studentGradeRow', 'studentGradeSelector', 'teacherGradeRow', 'teacherGradeSelector');
}

function viewEventDetails(eventId) {
    window.location.href = `/admin/event-details?id=${eventId}`;
}

function editEvent(eventId) {
    openEditEventModal(eventId);
}

function deleteEvent(eventId, btn) {
    showConfirmDialog({
        title: 'Delete Event',
        message: 'Are you sure you want to delete this event? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
            const event = events.find(e => e.id === eventId) || sampleEvents.find(e => e.id === eventId);
            const eventName = event ? event.title : 'Event';
            
            // Only delete from localStorage if it exists there
            events = events.filter(e => e.id !== eventId);
            localStorage.setItem('adminEvents', JSON.stringify(events));
            
            btn.closest('tr').remove();
            if (typeof showToast === 'function') {
                showToast(`Event "${eventName}" (${eventId}) deleted successfully`, 'success');
            }
            loadEvents();
            renderCurrentView();
        }
    });
}

function getEventStatus(event) {
    const now = new Date();
    const eventStart = parseDateTime(getEventStartDate(event), event.start || '00:00');
    const eventEnd = parseDateTime(getEventEndDate(event), event.end || '23:59');
    
    if (now < eventStart) return { label: 'Upcoming', class: 'pending' };
    if (now >= eventStart && now <= eventEnd) return { label: 'Active', class: 'paid' };
    return { label: 'Completed', class: 'completed' };
}

function loadEvents() {
    const tbody = document.getElementById('eventsTableBody');
    const allEvents = getAllEvents();
    const filterCat = document.getElementById('filterCategory').value;
    const filterStat = document.getElementById('filterStatus').value;
    const filterPeriod = document.getElementById('filterPeriod').value;
    
    // Clear existing table content
    tbody.innerHTML = '';
    
    allEvents.forEach(event => {
        const status = getEventStatus(event);
        
        if (filterCat !== 'all' && event.category !== filterCat) return;
        if (filterStat !== 'all' && status.label.toLowerCase() !== filterStat) return;
        
        // Period filtering logic
        if (filterPeriod !== 'all') {
            const eventDate = new Date(getEventStartDate(event));
            const now = new Date();
            const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            const weekStart = new Date(today);
            weekStart.setDate(today.getDate() - today.getDay());
            const weekEnd = new Date(weekStart);
            weekEnd.setDate(weekStart.getDate() + 6);
            const monthStart = new Date(now.getFullYear(), now.getMonth(), 1);
            const monthEnd = new Date(now.getFullYear(), now.getMonth() + 1, 0);
            const nextMonthStart = new Date(now.getFullYear(), now.getMonth() + 1, 1);
            const nextMonthEnd = new Date(now.getFullYear(), now.getMonth() + 2, 0);
            const yearStart = new Date(now.getFullYear(), 0, 1);
            const yearEnd = new Date(now.getFullYear(), 11, 31);
            
            let includeEvent = false;
            
            switch (filterPeriod) {
                case 'today':
                    includeEvent = eventDate >= today && eventDate < tomorrow;
                    break;
                case 'this_week':
                    includeEvent = eventDate >= weekStart && eventDate <= weekEnd;
                    break;
                case 'this_month':
                    includeEvent = eventDate >= monthStart && eventDate <= monthEnd;
                    break;
                case 'next_month':
                    includeEvent = eventDate >= nextMonthStart && eventDate <= nextMonthEnd;
                    break;
                case 'this_year':
                    includeEvent = eventDate >= yearStart && eventDate <= yearEnd;
                    break;
            }
            
            if (!includeEvent) return;
        }
        
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Event Title" class="clickable" onclick="viewEventDetails('${event.id}')">
                <strong>${event.title}</strong>
            </td>
            <td data-label="Category">
                <span class="badge-type ${event.category}">${event.category.charAt(0).toUpperCase() + event.category.slice(1)}</span>
            </td>
            <td data-label="Date & Time">
                <div>${formatDateRange(getEventStartDate(event), getEventEndDate(event))}</div>
                <small style="color:#666;">${formatTimeRange(event.start, event.end)}</small>
            </td>
            <td data-label="Location">${event.location}</td>
            <td data-label="Participants">
                <span class="tag">
                    ${event.audience.charAt(0).toUpperCase() + event.audience.slice(1)}
                    ${
                        event.audience === 'students' && event.audienceGrades && event.audienceGrades.length
                            ? ` (${event.audienceGrades.join(', ')})`
                            : event.audience === 'teachers' && event.teacherGrades && event.teacherGrades.length
                                ? ` (${event.teacherGrades.join(', ')})`
                                : ''
                    }
                </span>
            </td>
            <td data-label="Status">
                <span class="status-badge ${status.class}">${status.label}</span>
            </td>
            <td data-label="Actions" class="actions-cell">
                <button class="simple-btn-icon" onclick="viewEventDetails('${event.id}')" title="View Details">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="simple-btn-icon" onclick="deleteEvent('${event.id}', this)" title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Filters
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('filterCategory').addEventListener('change', function() {
        loadEvents();
    });

    document.getElementById('filterStatus').addEventListener('change', function() {
        loadEvents();
    });

    document.getElementById('filterPeriod').addEventListener('change', function() {
        loadEvents();
    });
});

// Calendar Functions
function renderMonthView() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    document.getElementById('currentPeriod').textContent = `${monthNames[month]} ${year}`;
    
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const daysInPrevMonth = new Date(year, month, 0).getDate();
    const grid = document.getElementById('monthGrid');
    grid.innerHTML = '';
    const today = new Date();
    const filtered = getFilteredEvents();
    
    for (let i = firstDay - 1; i >= 0; i--) {
        const cell = document.createElement('div');
        cell.className = 'calendar-day other-month';
        cell.innerHTML = `<div class="calendar-day-number">${daysInPrevMonth - i}</div>`;
        grid.appendChild(cell);
    }
    
    for (let day = 1; day <= daysInMonth; day++) {
        const cell = document.createElement('div');
        cell.className = 'calendar-day';
        const isToday = today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;
        if (isToday) cell.classList.add('today');
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const dayEvents = filtered.filter(e => getEventStartDate(e) === dateStr);
        cell.innerHTML = `<div class="calendar-day-number">${day}</div>`;
        if (dayEvents.length > 0) {
            const container = document.createElement('div');
            container.className = 'calendar-events';
            dayEvents.forEach(e => {
                const evt = document.createElement('div');
                evt.className = 'calendar-event';
                evt.style.background = categoryColors[e.category];
                evt.textContent = e.title;
                evt.onclick = (ev) => { ev.stopPropagation(); showEventModal(e); };
                container.appendChild(evt);
            });
            cell.appendChild(container);
        }
        grid.appendChild(cell);
    }
    
    const totalCells = grid.children.length;
    for (let day = 1; day <= 42 - totalCells; day++) {
        const cell = document.createElement('div');
        cell.className = 'calendar-day other-month';
        cell.innerHTML = `<div class="calendar-day-number">${day}</div>`;
        grid.appendChild(cell);
    }
    
    syncMonthSelectorWithCurrentDate();
}

function renderWeekView() {
    const weekStart = new Date(currentDate);
    weekStart.setDate(currentDate.getDate() - currentDate.getDay());
    const weekEnd = new Date(weekStart);
    weekEnd.setDate(weekStart.getDate() + 6);
    
    document.getElementById('currentPeriod').textContent = `${monthNames[weekStart.getMonth()]} ${weekStart.getDate()} - ${monthNames[weekEnd.getMonth()]} ${weekEnd.getDate()}, ${weekStart.getFullYear()}`;
    
    const timeSlotsContainer = document.getElementById('weekTimeSlots');
    timeSlotsContainer.innerHTML = '';
    for (let h = 0; h < 24; h++) {
        const slot = document.createElement('div');
        slot.className = 'week-time-slot';
        slot.textContent = `${String(h).padStart(2, '0')}:00`;
        timeSlotsContainer.appendChild(slot);
    }
    
    const daysContainer = document.getElementById('weekDaysContainer');
    daysContainer.innerHTML = '';
    const today = new Date();
    const filtered = getFilteredEvents();
    
    for (let i = 0; i < 7; i++) {
        const day = new Date(weekStart);
        day.setDate(weekStart.getDate() + i);
        const col = document.createElement('div');
        col.className = 'week-day-column';
        const isToday = day.toDateString() === today.toDateString();
        const dateStr = `${day.getFullYear()}-${String(day.getMonth() + 1).padStart(2, '0')}-${String(day.getDate()).padStart(2, '0')}`;
        const dayEvents = filtered.filter(e => getEventStartDate(e) === dateStr);
        
        col.innerHTML = `
            <div class="week-day-header">
                <div class="week-day-name">${dayNames[day.getDay()]}</div>
                <div class="week-day-date ${isToday ? 'today' : ''}">${day.getDate()}</div>
            </div>
            <div class="week-day-events" id="weekDay${i}"></div>
        `;
        daysContainer.appendChild(col);
        
        const eventsContainer = document.getElementById(`weekDay${i}`);
        dayEvents.forEach(e => {
            const [startH, startM] = (e.startTime || '00:00').split(':').map(Number);
            const [endH, endM] = (e.endTime || '23:59').split(':').map(Number);
            const top = (startH * 60 + startM);
            const height = ((endH * 60 + endM) - (startH * 60 + startM));
            const evt = document.createElement('div');
            evt.className = 'week-event';
            evt.style.top = `${top}px`;
            evt.style.height = `${height}px`;
            evt.style.background = categoryColors[e.category];
            evt.textContent = e.title;
            evt.onclick = () => showEventModal(e);
            eventsContainer.appendChild(evt);
        });
    }
    
    syncMonthSelectorWithCurrentDate();
}

function renderDayView() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const day = currentDate.getDate();
    document.getElementById('currentPeriod').textContent = `${dayNames[currentDate.getDay()]}, ${monthNames[month]} ${day}, ${year}`;
    
    const timeSlotsContainer = document.getElementById('dayTimeSlots');
    timeSlotsContainer.innerHTML = '';
    for (let h = 0; h < 24; h++) {
        const slot = document.createElement('div');
        slot.className = 'day-time-slot';
        slot.textContent = `${String(h).padStart(2, '0')}:00`;
        timeSlotsContainer.appendChild(slot);
    }
    
    const eventsContainer = document.getElementById('dayEventsContainer');
    eventsContainer.innerHTML = `<div class="day-header"><div class="day-date-label">${monthNames[month]} ${day}</div></div><div class="day-events-timeline" id="dayTimeline"></div>`;
    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    const filtered = getFilteredEvents();
    const dayEvents = filtered.filter(e => getEventStartDate(e) === dateStr);
    const timeline = document.getElementById('dayTimeline');
    
    dayEvents.forEach(e => {
        const [startH, startM] = (e.startTime || '00:00').split(':').map(Number);
        const [endH, endM] = (e.endTime || '23:59').split(':').map(Number);
        const top = (startH * 60 + startM);
        const height = ((endH * 60 + endM) - (startH * 60 + startM));
        const evt = document.createElement('div');
        evt.className = 'day-event';
        evt.style.top = `${top}px`;
        evt.style.height = `${height}px`;
        evt.style.background = categoryColors[e.category];
        evt.innerHTML = `<strong>${e.title}</strong><br>${formatTimeRange(e.startTime || e.start, e.endTime || e.end)}`;
        evt.onclick = () => showEventModal(e);
        timeline.appendChild(evt);
    });
    
    syncMonthSelectorWithCurrentDate();
}

function renderCurrentView() {
    if (currentView === 'month') renderMonthView();
    else if (currentView === 'week') renderWeekView();
    else if (currentView === 'day') renderDayView();
    updatePeriodNavigationVisibility();
}

let currentModalEvent = null;

function showEventModal(event) {
    document.getElementById('eventModalTitle').textContent = event.title;
    document.getElementById('eventModalTime').textContent = event.time || (event.startTime ? `${formatTime(event.startTime)} - ${formatTime(event.endTime)}` : 'All Day');
    document.getElementById('eventModalLocation').textContent = event.location;
    document.getElementById('eventModalDescription').textContent = event.description || event.desc || 'No description';
    currentModalEvent = event;
    document.getElementById('eventModal').style.display = 'flex';
}

window.closeEventModal = function() {
    document.getElementById('eventModal').style.display = 'none';
};

window.viewEventDetailFromModal = function() {
    if (!currentModalEvent) return;
    const eventId = currentModalEvent.id || (currentModalEvent.title ? `EVT_${encodeURIComponent(currentModalEvent.title).replace(/%20/g,'_')}` : 'EVT');
    window.location.href = `/admin/event-details?id=${eventId}`;
};

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    // View toggle
    document.querySelectorAll('.view-toggle-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-toggle-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentView = this.getAttribute('data-view');
            document.querySelectorAll('.calendar-view-container').forEach(v => v.style.display = 'none');
            document.getElementById(`${currentView}View`).style.display = 'block';
            renderCurrentView();
        });
    });
    
    const monthSelector = document.getElementById('monthSelector');
    if (monthSelector) {
        populateMonthSelector(currentDate);
        monthSelector.addEventListener('change', function() {
            if (!this.value) return;
            const [yearStr, monthStr] = this.value.split('-');
            const year = parseInt(yearStr, 10);
            const month = parseInt(monthStr, 10);
            if (isNaN(year) || isNaN(month)) return;
            currentDate.setFullYear(year);
            currentDate.setMonth(month - 1);
            currentDate.setDate(1);
            renderCurrentView();
        });
    }
    
    // Navigation
    document.getElementById('prevPeriod').addEventListener('click', function() {
        if (currentView === 'month') currentDate.setMonth(currentDate.getMonth() - 1);
        else if (currentView === 'week') currentDate.setDate(currentDate.getDate() - 7);
        else if (currentView === 'day') currentDate.setDate(currentDate.getDate() - 1);
        renderCurrentView();
    });
    
    document.getElementById('nextPeriod').addEventListener('click', function() {
        if (currentView === 'month') currentDate.setMonth(currentDate.getMonth() + 1);
        else if (currentView === 'week') currentDate.setDate(currentDate.getDate() + 7);
        else if (currentView === 'day') currentDate.setDate(currentDate.getDate() + 1);
        renderCurrentView();
    });
    
    // Category Tag Filters
    document.querySelectorAll('.category-tag').forEach(tag => {
        tag.addEventListener('click', function() {
            const cat = this.getAttribute('data-category');
            if (this.classList.contains('active')) {
                this.classList.remove('active');
                activeFilters.categories = activeFilters.categories.filter(c => c !== cat);
            } else {
                this.classList.add('active');
                activeFilters.categories.push(cat);
            }
            renderCurrentView();
        });
    });
    
    // Initial render
    loadEvents();
    renderCurrentView();
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

?>

?>
