/**
 * Event Calendar Page JavaScript
 * Complete functionality with all original data and features
 */

// Global variables
let currentDate = new Date();
let selectedCategories = ['academic', 'sports', 'cultural', 'meeting', 'holiday'];
let events = [];

// Sample events data
const sampleEvents = [
    {
        id: 'EVT001',
        title: 'Annual Sports Day',
        date: '2025-01-15',
        time: '09:00',
        category: 'sports',
        description: 'Annual sports day with various competitions',
        location: 'School Ground',
        participants: 200
    },
    {
        id: 'EVT002',
        title: 'Science Fair',
        date: '2025-01-20',
        time: '10:00',
        category: 'academic',
        description: 'Student science projects exhibition',
        location: 'Science Lab',
        participants: 50
    },
    {
        id: 'EVT003',
        title: 'Cultural Festival',
        date: '2025-01-25',
        time: '14:00',
        category: 'cultural',
        description: 'Traditional dance and music performances',
        location: 'Auditorium',
        participants: 150
    },
    {
        id: 'EVT004',
        title: 'Parent-Teacher Meeting',
        date: '2025-01-30',
        time: '15:00',
        category: 'meeting',
        description: 'Monthly parent-teacher conference',
        location: 'Conference Room',
        participants: 30
    },
    {
        id: 'EVT005',
        title: 'National Holiday',
        date: '2025-02-04',
        time: '00:00',
        category: 'holiday',
        description: 'Independence Day - School Closed',
        location: 'N/A',
        participants: 0
    }
];

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadEvents();
    initializeCategoryFilters();
    renderCalendar();
});

// Load events from localStorage or use sample data
function loadEvents() {
    const savedEvents = localStorage.getItem('events');
    events = savedEvents ? JSON.parse(savedEvents) : [...sampleEvents];
}

// Initialize category filter functionality
function initializeCategoryFilters() {
    const categoryTags = document.querySelectorAll('.category-tag');
    categoryTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            toggleCategory(category, this);
        });
    });
}

// Toggle category filter
function toggleCategory(category, element) {
    if (selectedCategories.includes(category)) {
        selectedCategories = selectedCategories.filter(c => c !== category);
        element.classList.remove('active');
    } else {
        selectedCategories.push(category);
        element.classList.add('active');
    }
    renderCalendar();
}

// Render calendar
function renderCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    const monthYear = document.getElementById('currentMonthYear');
    
    // Update month/year display
    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    monthYear.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
    
    // Get first day of month and number of days
    const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay();
    
    // Create calendar grid
    let calendarHTML = `
        <div class="calendar-weekdays">
            <div class="weekday">Sun</div>
            <div class="weekday">Mon</div>
            <div class="weekday">Tue</div>
            <div class="weekday">Wed</div>
            <div class="weekday">Thu</div>
            <div class="weekday">Fri</div>
            <div class="weekday">Sat</div>
        </div>
        <div class="calendar-days">
    `;
    
    // Add empty cells for days before the first day of the month
    for (let i = 0; i < startingDayOfWeek; i++) {
        calendarHTML += '<div class="calendar-day empty"></div>';
    }
    
    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dateString = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const dayEvents = getEventsForDate(dateString);
        
        calendarHTML += `
            <div class="calendar-day" onclick="showDayEvents('${dateString}')">
                <div class="day-number">${day}</div>
                <div class="day-events">
                    ${dayEvents.map(event => `
                        <div class="event-dot ${event.category}" title="${event.title}"></div>
                    `).join('')}
                </div>
            </div>
        `;
    }
    
    calendarHTML += '</div>';
    calendarGrid.innerHTML = calendarHTML;
}

// Get events for a specific date
function getEventsForDate(dateString) {
    return events.filter(event => {
        return event.date === dateString && selectedCategories.includes(event.category);
    });
}

// Navigate to previous month
function previousMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
}

// Navigate to next month
function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
}

// Show events for a specific day
function showDayEvents(dateString) {
    const dayEvents = getEventsForDate(dateString);
    
    if (dayEvents.length === 0) {
        showActionStatus('No events for this day', 'info');
        return;
    }
    
    // Show first event details
    showEventDetails(dayEvents[0]);
}

// Show event details modal
function showEventDetails(event) {
    const modal = document.getElementById('eventModal');
    const title = document.getElementById('eventModalTitle');
    const body = document.getElementById('eventModalBody');
    
    title.textContent = event.title;
    body.innerHTML = `
        <div class="event-details">
            <div class="event-info">
                <div class="info-row">
                    <span class="info-label">Date:</span>
                    <span class="info-value">${formatDate(event.date)}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Time:</span>
                    <span class="info-value">${event.time}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Category:</span>
                    <span class="info-value">
                        <span class="category-badge ${event.category}">${event.category}</span>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Location:</span>
                    <span class="info-value">${event.location}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Participants:</span>
                    <span class="info-value">${event.participants}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Description:</span>
                    <span class="info-value">${event.description}</span>
                </div>
            </div>
        </div>
    `;
    
    modal.style.display = 'flex';
}

// Close event modal
function closeEventModal() {
    document.getElementById('eventModal').style.display = 'none';
}

// Edit event
function editEvent() {
    showActionStatus('Opening event editor...', 'info');
    // In a real application, this would open an edit dialog
    setTimeout(() => {
        showActionStatus('Event editor opened', 'success');
    }, 500);
}

// Helper functions
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function showActionStatus(message, type = 'info') {
    // Create or update status message
    let statusDiv = document.getElementById('actionStatus');
    if (!statusDiv) {
        statusDiv = document.createElement('div');
        statusDiv.id = 'actionStatus';
        statusDiv.style.cssText = `
            position: fixed; top: 20px; right: 20px; z-index: 1000;
            padding: 12px 20px; border-radius: 6px; font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        `;
        document.body.appendChild(statusDiv);
    }
    
    const colors = {
        success: '#10b981',
        warning: '#f59e0b',
        error: '#ef4444',
        info: '#3b82f6'
    };
    
    statusDiv.style.backgroundColor = colors[type] || colors.info;
    statusDiv.style.color = 'white';
    statusDiv.textContent = message;
    
    // Auto-hide after 3 seconds
    setTimeout(() => {
        if (statusDiv) {
            statusDiv.style.opacity = '0';
            setTimeout(() => statusDiv.remove(), 300);
        }
    }, 3000);
}
