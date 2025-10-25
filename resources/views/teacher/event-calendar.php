<?php
$pageTitle = 'Smart Campus Nova Hub - Event Calendar';
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Event Calendar';
$activePage = 'event-calendar';

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

<!-- Event Category Filter (Top Level) -->
<div class="category-filter-section">
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
        <button class="category-tag active" data-category="myanmar">
            <span class="tag-dot" style="background: #ff6b35;"></span>
            Myanmar
            <i class="fas fa-check tag-check"></i>
        </button>
    </div>
</div>

<!-- Calendar View Toggle -->
<div class="view-toggle-section">
    <div class="view-toggle-buttons">
        <button class="view-toggle-btn active" data-view="month">
            <i class="fas fa-calendar-alt"></i> Month
        </button>
        <button class="view-toggle-btn" data-view="week">
            <i class="fas fa-calendar-week"></i> Week
        </button>
        <button class="view-toggle-btn" data-view="day">
            <i class="fas fa-calendar-day"></i> Day
        </button>
        <button class="view-toggle-btn" data-view="list">
            <i class="fas fa-list"></i> List
        </button>
    </div>
</div>

<!-- Calendar Container -->
<div class="calendar-container">
    <!-- Month View -->
    <div id="month-view" class="calendar-view active">
        <div class="calendar-header">
            <button class="calendar-nav-btn" onclick="changeMonth(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <h2 class="calendar-month-year" id="current-month-year">December 2024</h2>
            <button class="calendar-nav-btn" onclick="changeMonth(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="calendar-grid">
            <div class="calendar-weekdays">
                <div class="weekday">Sun</div>
                <div class="weekday">Mon</div>
                <div class="weekday">Tue</div>
                <div class="weekday">Wed</div>
                <div class="weekday">Thu</div>
                <div class="weekday">Fri</div>
                <div class="weekday">Sat</div>
            </div>
            
            <div class="calendar-days" id="calendar-days">
                <!-- Calendar days will be populated here -->
            </div>
        </div>
    </div>
    
    <!-- Week View -->
    <div id="week-view" class="calendar-view">
        <div class="calendar-header">
            <button class="calendar-nav-btn" onclick="changeWeek(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <h2 class="calendar-month-year" id="current-week">Week of December 16, 2024</h2>
            <button class="calendar-nav-btn" onclick="changeWeek(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="week-grid" id="week-grid">
            <!-- Week view will be populated here -->
        </div>
    </div>
    
    <!-- Day View -->
    <div id="day-view" class="calendar-view">
        <div class="calendar-header">
            <button class="calendar-nav-btn" onclick="changeDay(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <h2 class="calendar-month-year" id="current-day">December 16, 2024</h2>
            <button class="calendar-nav-btn" onclick="changeDay(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="day-timeline" id="day-timeline">
            <!-- Day view will be populated here -->
        </div>
    </div>
    
    <!-- List View -->
    <div id="list-view" class="calendar-view">
        <div class="list-header">
            <h3>Upcoming Events</h3>
            <div class="list-filters">
                <select class="filter-select" id="list-category-filter">
                    <option value="all">All Categories</option>
                    <option value="academic">Academic</option>
                    <option value="sports">Sports</option>
                    <option value="cultural">Cultural</option>
                    <option value="meeting">Meetings</option>
                    <option value="holiday">Holidays</option>
                    <option value="myanmar">Myanmar</option>
                </select>
            </div>
        </div>
        
        <div class="event-list" id="event-list">
            <!-- Event list will be populated here -->
        </div>
    </div>
</div>

<!-- Event Details Modal -->
<div id="event-modal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modal-event-title">Event Details</h3>
            <button class="modal-close" onclick="closeEventModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="event-details">
                <div class="event-detail-row">
                    <label>Date & Time:</label>
                    <span id="modal-event-datetime"></span>
                </div>
                <div class="event-detail-row">
                    <label>Location:</label>
                    <span id="modal-event-location"></span>
                </div>
                <div class="event-detail-row">
                    <label>Category:</label>
                    <span id="modal-event-category"></span>
                </div>
                <div class="event-detail-row">
                    <label>Description:</label>
                    <p id="modal-event-description"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Event Calendar Styles */
.category-filter-section {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.category-filter-title {
    margin: 0 0 16px 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

.category-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.category-tag {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 20px;
    background: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9rem;
    font-weight: 500;
}

.category-tag:hover {
    border-color: #1976d2;
    transform: translateY(-1px);
}

.category-tag.active {
    border-color: #1976d2;
    background: #e3f2fd;
}

.tag-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}

.tag-check {
    color: #1976d2;
    font-size: 0.8rem;
}

.view-toggle-section {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.view-toggle-buttons {
    display: flex;
    gap: 8px;
}

.view-toggle-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9rem;
    font-weight: 500;
}

.view-toggle-btn:hover {
    border-color: #1976d2;
    background: #f8f9fa;
}

.view-toggle-btn.active {
    border-color: #1976d2;
    background: #e3f2fd;
    color: #1976d2;
}

.calendar-container {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.calendar-view {
    display: none;
}

.calendar-view.active {
    display: block;
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.calendar-nav-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
}

.calendar-nav-btn:hover {
    border-color: #1976d2;
    background: #f8f9fa;
}

.calendar-month-year {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
}

.calendar-grid {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
}

.calendar-weekdays {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    background: #f8f9fa;
}

.weekday {
    padding: 12px;
    text-align: center;
    font-weight: 600;
    color: #666;
    border-right: 1px solid #e0e0e0;
}

.weekday:last-child {
    border-right: none;
}

.calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.calendar-day {
    min-height: 100px;
    padding: 8px;
    border-right: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    position: relative;
    cursor: pointer;
    transition: all 0.2s ease;
}

.calendar-day:hover {
    background: #f8f9fa;
}

.calendar-day.other-month {
    background: #f8f9fa;
    color: #999;
}

.calendar-day.today {
    background: #e3f2fd;
    font-weight: 600;
}

.day-number {
    font-weight: 600;
    margin-bottom: 4px;
}

.day-events {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.event-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    margin-right: 4px;
}

.event-item {
    font-size: 0.75rem;
    padding: 2px 4px;
    border-radius: 4px;
    margin-bottom: 2px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.event-item:hover {
    transform: scale(1.05);
}

.event-item.academic { background: #e3f2fd; color: #1976d2; }
.event-item.sports { background: #e8f5e8; color: #2e7d32; }
.event-item.cultural { background: #fff8e1; color: #f57c00; }
.event-item.meeting { background: #ffebee; color: #d32f2f; }
.event-item.holiday { background: #f3e5f5; color: #7b1fa2; }
.event-item.myanmar { background: #fff3e0; color: #f57c00; }

.week-grid {
    display: grid;
    grid-template-columns: 60px repeat(7, 1fr);
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
}

.week-time-header {
    background: #f8f9fa;
    padding: 8px;
    text-align: center;
    font-weight: 600;
    color: #666;
    border-right: 1px solid #e0e0e0;
}

.week-day-header {
    background: #f8f9fa;
    padding: 12px 8px;
    text-align: center;
    font-weight: 600;
    color: #666;
    border-right: 1px solid #e0e0e0;
}

.week-day-header:last-child {
    border-right: none;
}

.week-time-slot {
    padding: 8px;
    border-right: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    min-height: 40px;
    font-size: 0.8rem;
    color: #666;
}

.week-day-slot {
    padding: 8px;
    border-right: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    min-height: 40px;
    position: relative;
    cursor: pointer;
}

.week-day-slot:hover {
    background: #f8f9fa;
}

.day-timeline {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
}

.timeline-hour {
    display: flex;
    border-bottom: 1px solid #e0e0e0;
    min-height: 60px;
}

.timeline-time {
    width: 80px;
    padding: 12px;
    background: #f8f9fa;
    border-right: 1px solid #e0e0e0;
    font-weight: 600;
    color: #666;
    display: flex;
    align-items: center;
}

.timeline-events {
    flex: 1;
    padding: 8px;
    position: relative;
}

.timeline-event {
    background: #e3f2fd;
    border-left: 4px solid #1976d2;
    padding: 8px 12px;
    margin-bottom: 4px;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.timeline-event:hover {
    background: #bbdefb;
    transform: translateX(2px);
}

.list-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.list-header h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
}

.filter-select {
    padding: 8px 12px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    font-size: 0.9rem;
}

.event-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.event-list-item {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.event-list-item:hover {
    border-color: #1976d2;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.event-list-date {
    font-size: 0.8rem;
    color: #666;
    margin-bottom: 4px;
}

.event-list-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
}

.event-list-category {
    font-size: 0.8rem;
    color: #666;
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
}

.event-details {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.event-detail-row {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.event-detail-row label {
    font-weight: 600;
    color: #333;
    font-size: 0.9rem;
}

.event-detail-row span,
.event-detail-row p {
    color: #666;
    margin: 0;
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
</style>

<script>
// Event data
const events = [
    {
        id: 1,
        title: "Mathematics Exam",
        date: "2024-12-16",
        time: "09:00",
        category: "academic",
        location: "Room 201",
        description: "Grade 10A Mathematics examination"
    },
    {
        id: 2,
        title: "Sports Day",
        date: "2024-12-18",
        time: "08:00",
        category: "sports",
        location: "School Ground",
        description: "Annual sports day competition"
    },
    {
        id: 3,
        title: "Cultural Festival",
        date: "2024-12-20",
        time: "14:00",
        category: "cultural",
        location: "Auditorium",
        description: "Traditional cultural performances"
    },
    {
        id: 4,
        title: "Staff Meeting",
        date: "2024-12-17",
        time: "15:00",
        category: "meeting",
        location: "Conference Room",
        description: "Monthly staff meeting"
    },
    {
        id: 5,
        title: "Christmas Holiday",
        date: "2024-12-25",
        time: "00:00",
        category: "holiday",
        location: "School Closed",
        description: "Christmas Day holiday"
    }
];

let currentDate = new Date();
let selectedCategories = ['academic', 'sports', 'cultural', 'meeting', 'holiday', 'myanmar'];

// Initialize calendar
document.addEventListener('DOMContentLoaded', function() {
    renderMonthView();
    setupEventListeners();
});

function setupEventListeners() {
    // Category filter
    document.querySelectorAll('.category-tag').forEach(tag => {
        tag.addEventListener('click', function() {
            const category = this.dataset.category;
            if (selectedCategories.includes(category)) {
                selectedCategories = selectedCategories.filter(c => c !== category);
                this.classList.remove('active');
            } else {
                selectedCategories.push(category);
                this.classList.add('active');
            }
            renderCurrentView();
        });
    });

    // View toggle
    document.querySelectorAll('.view-toggle-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-toggle-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.calendar-view').forEach(v => v.classList.remove('active'));
            
            this.classList.add('active');
            const view = this.dataset.view;
            document.getElementById(view + '-view').classList.add('active');
            
            renderCurrentView();
        });
    });
}

function renderCurrentView() {
    const activeView = document.querySelector('.calendar-view.active');
    if (activeView.id === 'month-view') renderMonthView();
    else if (activeView.id === 'week-view') renderWeekView();
    else if (activeView.id === 'day-view') renderDayView();
    else if (activeView.id === 'list-view') renderListView();
}

function renderMonthView() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    document.getElementById('current-month-year').textContent = 
        new Date(year, month).toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
    
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const startDate = new Date(firstDay);
    startDate.setDate(startDate.getDate() - firstDay.getDay());
    
    const daysContainer = document.getElementById('calendar-days');
    daysContainer.innerHTML = '';
    
    for (let i = 0; i < 42; i++) {
        const date = new Date(startDate);
        date.setDate(startDate.getDate() + i);
        
        const dayElement = document.createElement('div');
        dayElement.className = 'calendar-day';
        
        if (date.getMonth() !== month) {
            dayElement.classList.add('other-month');
        }
        
        if (date.toDateString() === new Date().toDateString()) {
            dayElement.classList.add('today');
        }
        
        dayElement.innerHTML = `
            <div class="day-number">${date.getDate()}</div>
            <div class="day-events">${getEventsForDate(date)}</div>
        `;
        
        daysContainer.appendChild(dayElement);
    }
}

function renderWeekView() {
    const startOfWeek = new Date(currentDate);
    startOfWeek.setDate(currentDate.getDate() - currentDate.getDay());
    
    document.getElementById('current-week').textContent = 
        `Week of ${startOfWeek.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}`;
    
    const weekGrid = document.getElementById('week-grid');
    weekGrid.innerHTML = '';
    
    // Time header
    const timeHeader = document.createElement('div');
    timeHeader.className = 'week-time-header';
    timeHeader.textContent = 'Time';
    weekGrid.appendChild(timeHeader);
    
    // Day headers
    for (let i = 0; i < 7; i++) {
        const day = new Date(startOfWeek);
        day.setDate(startOfWeek.getDate() + i);
        const dayHeader = document.createElement('div');
        dayHeader.className = 'week-day-header';
        dayHeader.textContent = day.toLocaleDateString('en-US', { weekday: 'short' });
        weekGrid.appendChild(dayHeader);
    }
    
    // Time slots
    for (let hour = 8; hour < 18; hour++) {
        const timeSlot = document.createElement('div');
        timeSlot.className = 'week-time-slot';
        timeSlot.textContent = `${hour}:00`;
        weekGrid.appendChild(timeSlot);
        
        for (let i = 0; i < 7; i++) {
            const day = new Date(startOfWeek);
            day.setDate(startOfWeek.getDate() + i);
            const daySlot = document.createElement('div');
            daySlot.className = 'week-day-slot';
            daySlot.innerHTML = getEventsForTimeSlot(day, hour);
            weekGrid.appendChild(daySlot);
        }
    }
}

function renderDayView() {
    document.getElementById('current-day').textContent = 
        currentDate.toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' });
    
    const timeline = document.getElementById('day-timeline');
    timeline.innerHTML = '';
    
    for (let hour = 8; hour < 18; hour++) {
        const hourElement = document.createElement('div');
        hourElement.className = 'timeline-hour';
        
        const timeElement = document.createElement('div');
        timeElement.className = 'timeline-time';
        timeElement.textContent = `${hour}:00`;
        
        const eventsElement = document.createElement('div');
        eventsElement.className = 'timeline-events';
        eventsElement.innerHTML = getEventsForTimeSlot(currentDate, hour);
        
        hourElement.appendChild(timeElement);
        hourElement.appendChild(eventsElement);
        timeline.appendChild(hourElement);
    }
}

function renderListView() {
    const eventList = document.getElementById('event-list');
    eventList.innerHTML = '';
    
    const filteredEvents = events.filter(event => 
        selectedCategories.includes(event.category)
    ).sort((a, b) => new Date(a.date + ' ' + a.time) - new Date(b.date + ' ' + b.time));
    
    filteredEvents.forEach(event => {
        const eventElement = document.createElement('div');
        eventElement.className = 'event-list-item';
        eventElement.innerHTML = `
            <div class="event-list-date">${new Date(event.date).toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' })} at ${event.time}</div>
            <div class="event-list-title">${event.title}</div>
            <div class="event-list-category">${event.category.charAt(0).toUpperCase() + event.category.slice(1)} • ${event.location}</div>
        `;
        eventElement.addEventListener('click', () => showEventModal(event));
        eventList.appendChild(eventElement);
    });
}

function getEventsForDate(date) {
    const dateStr = date.toISOString().split('T')[0];
    const dayEvents = events.filter(event => 
        event.date === dateStr && selectedCategories.includes(event.category)
    );
    
    return dayEvents.map(event => `
        <div class="event-item ${event.category}" onclick="showEventModal(${event.id})">
            <span class="event-dot" style="background: ${getCategoryColor(event.category)};"></span>
            ${event.title}
        </div>
    `).join('');
}

function getEventsForTimeSlot(date, hour) {
    const dateStr = date.toISOString().split('T')[0];
    const timeStr = `${hour.toString().padStart(2, '0')}:00`;
    const slotEvents = events.filter(event => 
        event.date === dateStr && 
        event.time.startsWith(timeStr) && 
        selectedCategories.includes(event.category)
    );
    
    return slotEvents.map(event => `
        <div class="timeline-event" onclick="showEventModal(${event.id})">
            <div style="font-weight: 600; font-size: 0.8rem;">${event.title}</div>
            <div style="font-size: 0.7rem; color: #666;">${event.location}</div>
        </div>
    `).join('');
}

function getCategoryColor(category) {
    const colors = {
        academic: '#4285f4',
        sports: '#34a853',
        cultural: '#fbbc04',
        meeting: '#ea4335',
        holiday: '#9e9e9e',
        myanmar: '#ff6b35'
    };
    return colors[category] || '#666';
}

function showEventModal(eventId) {
    const event = events.find(e => e.id === eventId);
    if (!event) return;
    
    document.getElementById('modal-event-title').textContent = event.title;
    document.getElementById('modal-event-datetime').textContent = 
        `${new Date(event.date).toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' })} at ${event.time}`;
    document.getElementById('modal-event-location').textContent = event.location;
    document.getElementById('modal-event-category').textContent = event.category.charAt(0).toUpperCase() + event.category.slice(1);
    document.getElementById('modal-event-description').textContent = event.description;
    
    document.getElementById('event-modal').style.display = 'flex';
}

function closeEventModal() {
    document.getElementById('event-modal').style.display = 'none';
}

function changeMonth(direction) {
    currentDate.setMonth(currentDate.getMonth() + direction);
    renderCurrentView();
}

function changeWeek(direction) {
    currentDate.setDate(currentDate.getDate() + (direction * 7));
    renderCurrentView();
}

function changeDay(direction) {
    currentDate.setDate(currentDate.getDate() + direction);
    renderCurrentView();
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
