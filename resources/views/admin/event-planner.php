<?php
$pageTitle = 'Smart Campus Nova Hub - Event Planner';
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
</div>

<!-- Create Event Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Create New Event</h3>
        <button class="simple-btn" id="toggleEventForm"><i class="fas fa-plus"></i> Add Event</button>
</div>

    <!-- Inline Event Form -->
    <div id="eventForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-calendar-plus"></i> Create Event</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label>Event Title</label>
                    <input type="text" class="form-input" id="eventTitle" placeholder="e.g., Annual Science Fair">
                </div>
                <div class="form-group">
                    <label>Category</label>
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
                    <label>Event Date</label>
                    <input type="date" class="form-input" id="eventDate">
                </div>
                <div class="form-group">
                    <label>Start Time</label>
                    <input type="time" class="form-input" id="eventStart">
                </div>
                <div class="form-group">
                    <label>End Time</label>
                    <input type="time" class="form-input" id="eventEnd">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-input" id="eventLocation" placeholder="e.g., Main Hall">
                </div>
                <div class="form-group">
                    <label>Participants</label>
                    <select class="form-select" id="eventAudience">
                        <option value="all">All School</option>
                        <option value="students">Students</option>
                        <option value="teachers">Teachers</option>
                        <option value="staff">Staff</option>
                        <option value="parents">Parents</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label>Description</label>
                    <textarea class="form-input" id="eventDesc" rows="3" placeholder="Event description..."></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelEvent" class="simple-btn secondary"><i class="fas fa-times"></i> Cancel</button>
                <button id="saveEvent" class="simple-btn primary"><i class="fas fa-check"></i> Save Event</button>
            </div>
        </div>
    </div>
</div>

<!-- Events List -->
<div class="simple-section" style="margin-top:16px;">
    <div class="simple-header">
        <h4>All Events</h4>
        <div style="display:flex; gap:12px;">
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
                <tr>
                    <td data-label="Event Title" class="clickable" onclick="viewEventDetails('EVT001')">
                        <strong>Mathematics Final Exam</strong>
                    </td>
                    <td data-label="Category">
                        <span class="badge-type academic">Academic</span>
                    </td>
                    <td data-label="Date & Time">
                        <div>Dec 15, 2024</div>
                        <small style="color:#666;">09:00 - 12:00</small>
                    </td>
                    <td data-label="Location">Main Hall</td>
                    <td data-label="Participants">
                        <span class="tag">Grade 10</span>
                    </td>
                    <td data-label="Status">
                        <span class="status-badge pending">Upcoming</span>
                    </td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewEventDetails('EVT001')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editEvent('EVT001')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="deleteEvent('EVT001', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Event Title" class="clickable" onclick="viewEventDetails('EVT002')">
                        <strong>Football Championship</strong>
                    </td>
                    <td data-label="Category">
                        <span class="badge-type sports">Sports</span>
                    </td>
                    <td data-label="Date & Time">
                        <div>Dec 18, 2024</div>
                        <small style="color:#666;">14:00 - 17:00</small>
                    </td>
                    <td data-label="Location">School Ground</td>
                    <td data-label="Participants">
                        <span class="tag">All School</span>
                    </td>
                    <td data-label="Status">
                        <span class="status-badge paid">Active</span>
                    </td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewEventDetails('EVT002')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editEvent('EVT002')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="deleteEvent('EVT002', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Event Title" class="clickable" onclick="viewEventDetails('EVT003')">
                        <strong>Cultural Festival</strong>
                    </td>
                    <td data-label="Category">
                        <span class="badge-type cultural">Cultural</span>
                    </td>
                    <td data-label="Date & Time">
                        <div>Dec 20, 2024</div>
                        <small style="color:#666;">10:00 - 16:00</small>
                    </td>
                    <td data-label="Location">Assembly Hall</td>
                    <td data-label="Participants">
                        <span class="tag">All School</span>
                    </td>
                    <td data-label="Status">
                        <span class="status-badge pending">Upcoming</span>
                    </td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewEventDetails('EVT003')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editEvent('EVT003')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="deleteEvent('EVT003', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Event Title" class="clickable" onclick="viewEventDetails('EVT004')">
                        <strong>Parent-Teacher Meeting</strong>
                    </td>
                    <td data-label="Category">
                        <span class="badge-type meeting">Meeting</span>
                    </td>
                    <td data-label="Date & Time">
                        <div>Dec 22, 2024</div>
                        <small style="color:#666;">08:00 - 17:00</small>
                    </td>
                    <td data-label="Location">Conference Room</td>
                    <td data-label="Participants">
                        <span class="tag">Parents</span>
                    </td>
                    <td data-label="Status">
                        <span class="status-badge pending">Upcoming</span>
                    </td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewEventDetails('EVT004')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editEvent('EVT004')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="deleteEvent('EVT004', this)" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
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
</style>

<script>
let editingEventId = null;

// Toggle form
document.getElementById('toggleEventForm').addEventListener('click', function() {
    const form = document.getElementById('eventForm');
    const isHidden = form.style.display === 'none';
    form.style.display = isHidden ? 'block' : 'none';
    
    if (isHidden) {
        editingEventId = null;
        clearForm();
    }
});

// Cancel event
document.getElementById('cancelEvent').addEventListener('click', function() {
    document.getElementById('eventForm').style.display = 'none';
    editingEventId = null;
    clearForm();
});

// Save event
document.getElementById('saveEvent').addEventListener('click', function() {
    const title = document.getElementById('eventTitle').value.trim();
    const category = document.getElementById('eventCategory').value;
    const date = document.getElementById('eventDate').value;
    const start = document.getElementById('eventStart').value;
    const end = document.getElementById('eventEnd').value;
    const location = document.getElementById('eventLocation').value.trim();
    const audience = document.getElementById('eventAudience').value;
    const desc = document.getElementById('eventDesc').value.trim();
    
    if (!title || !date || !start || !location) {
        alert('Please fill all required fields');
        return;
    }
    
    const eventData = {
        id: editingEventId || 'EVT' + Date.now(),
        title,
        category,
        date,
        start,
        end,
        location,
        audience,
        desc
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
    
    alert(editingEventId ? 'Event updated successfully!' : 'Event created successfully!');
    
    document.getElementById('eventForm').style.display = 'none';
    editingEventId = null;
    clearForm();
    loadEvents();
});

function clearForm() {
    document.getElementById('eventTitle').value = '';
    document.getElementById('eventCategory').value = 'academic';
    document.getElementById('eventDate').value = '';
    document.getElementById('eventStart').value = '';
    document.getElementById('eventEnd').value = '';
    document.getElementById('eventLocation').value = '';
    document.getElementById('eventAudience').value = 'all';
    document.getElementById('eventDesc').value = '';
}

function viewEventDetails(eventId) {
    window.location.href = `/admin/event-details?id=${eventId}`;
}

function editEvent(eventId) {
    // Navigate to edit event page (same pattern as exam section)
    window.location.href = `/admin/event-edit?id=${eventId}`;
}

function deleteEvent(eventId, btn) {
    showConfirmDialog({
        title: 'Delete Event',
        message: 'Are you sure you want to delete this event? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
            events = events.filter(e => e.id !== eventId);
            localStorage.setItem('adminEvents', JSON.stringify(events));
            
            btn.closest('tr').remove();
            alert('Event deleted successfully!');
        }
    });
}

function getEventStatus(event) {
    const now = new Date();
    const eventDate = new Date(event.date + 'T' + event.start);
    const eventEnd = new Date(event.date + 'T' + (event.end || '23:59'));
    
    if (now < eventDate) return { label: 'Upcoming', class: 'pending' };
    if (now >= eventDate && now <= eventEnd) return { label: 'Active', class: 'paid' };
    return { label: 'Completed', class: 'completed' };
}

function loadEvents() {
    const tbody = document.getElementById('eventsTableBody');
    const events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    const filterCat = document.getElementById('filterCategory').value;
    const filterStat = document.getElementById('filterStatus').value;
    
    // Keep existing sample events, add new ones
    const sampleIds = ['EVT001', 'EVT002', 'EVT003', 'EVT004'];
    
    events.forEach(event => {
        if (sampleIds.includes(event.id)) return; // Skip duplicates
        
        const status = getEventStatus(event);
        
        if (filterCat !== 'all' && event.category !== filterCat) return;
        if (filterStat !== 'all' && status.label.toLowerCase() !== filterStat) return;
        
        const row = document.createElement('tr');
        row.innerHTML = `
            <td data-label="Event Title" class="clickable" onclick="viewEventDetails('${event.id}')">
                <strong>${event.title}</strong>
            </td>
            <td data-label="Category">
                <span class="badge-type ${event.category}">${event.category.charAt(0).toUpperCase() + event.category.slice(1)}</span>
            </td>
            <td data-label="Date & Time">
                <div>${new Date(event.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</div>
                <small style="color:#666;">${event.start} - ${event.end || 'N/A'}</small>
            </td>
            <td data-label="Location">${event.location}</td>
            <td data-label="Participants">
                <span class="tag">${event.audience.charAt(0).toUpperCase() + event.audience.slice(1)}</span>
            </td>
            <td data-label="Status">
                <span class="status-badge ${status.class}">${status.label}</span>
            </td>
            <td data-label="Actions" class="actions-cell">
                <button class="simple-btn-icon" onclick="viewEventDetails('${event.id}')" title="View Details">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="simple-btn-icon" onclick="editEvent('${event.id}')" title="Edit">
                    <i class="fas fa-edit"></i>
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
document.getElementById('filterCategory').addEventListener('change', function() {
    // Filter logic would go here in production
    console.log('Filter by category:', this.value);
});

document.getElementById('filterStatus').addEventListener('change', function() {
    // Filter logic would go here in production
    console.log('Filter by status:', this.value);
});

// Load events on page load
document.addEventListener('DOMContentLoaded', loadEvents);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
