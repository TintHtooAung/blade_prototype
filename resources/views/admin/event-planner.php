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
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label>Attach Files</label>
                    <input type="file" class="form-input" id="eventAttachments" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.jpg,.jpeg,.png,.gif">
                    <small style="color: #666; margin-top: 4px; display: block;">
                        Supported formats: PDF, DOC, XLS, PPT, TXT, JPG, PNG (Max 10MB each)
                    </small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <div id="attachedFilesList" class="attached-files-list">
                        <!-- Attached files will be displayed here -->
                    </div>
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
        showToast('Please fill all required fields', 'warning');
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
        desc,
        attachments: getCurrentAttachments()
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
    
    showToast(editingEventId ? 
        `Event "${eventData.title}" (${eventData.id}) updated successfully` : 
        `Event "${eventData.title}" (${eventData.id}) created successfully`, 
        'success');
    
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
    document.getElementById('eventAttachments').value = '';
    currentAttachments = [];
    displayAttachedFiles(currentAttachments);
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
            const event = events.find(e => e.id === eventId);
            const eventName = event ? event.title : 'Event';
            
            events = events.filter(e => e.id !== eventId);
            localStorage.setItem('adminEvents', JSON.stringify(events));
            
            btn.closest('tr').remove();
            showToast(`Event "${eventName}" (${eventId}) deleted successfully`, 'success');
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
    const filterPeriod = document.getElementById('filterPeriod').value;
    
    // Clear existing table content
    tbody.innerHTML = '';
    
    // Sample events data (static events that are always shown)
    const sampleEvents = [
        {
            id: 'EVT001',
            title: 'Mathematics Final Exam',
            category: 'academic',
            date: '2024-12-15',
            start: '09:00',
            end: '12:00',
            location: 'Main Hall',
            audience: 'students',
            desc: 'Final examination for Mathematics course'
        },
        {
            id: 'EVT002',
            title: 'Football Championship',
            category: 'sports',
            date: '2024-12-18',
            start: '14:00',
            end: '17:00',
            location: 'Sports Ground',
            audience: 'all',
            desc: 'Annual football championship finals'
        },
        {
            id: 'EVT003',
            title: 'Cultural Festival',
            category: 'cultural',
            date: '2024-12-20',
            start: '10:00',
            end: '16:00',
            location: 'School Auditorium',
            audience: 'all',
            desc: 'Annual cultural festival showcasing student talents'
        },
        {
            id: 'EVT004',
            title: 'Parent-Teacher Conference',
            category: 'meeting',
            date: '2024-12-22',
            start: '09:00',
            end: '15:00',
            location: 'Conference Room',
            audience: 'parents',
            desc: 'Scheduled parent-teacher meetings'
        }
    ];
    
    // Combine sample events with stored events
    const allEvents = [...sampleEvents, ...events];
    
    allEvents.forEach(event => {
        
        const status = getEventStatus(event);
        
        if (filterCat !== 'all' && event.category !== filterCat) return;
        if (filterStat !== 'all' && status.label.toLowerCase() !== filterStat) return;
        
        // Period filtering logic
        if (filterPeriod !== 'all') {
            const eventDate = new Date(event.date);
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
    loadEvents();
});

document.getElementById('filterStatus').addEventListener('change', function() {
    loadEvents();
});

document.getElementById('filterPeriod').addEventListener('change', function() {
    loadEvents();
});

// File attachment handling for event planner
let currentAttachments = [];

// Handle file input change
document.getElementById('eventAttachments').addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    
    files.forEach(file => {
        // Validate file size (10MB max)
        if (file.size > 10 * 1024 * 1024) {
            showToast(`File "${file.name}" is too large. Maximum size is 10MB.`, 'warning');
            return;
        }
        
        // Validate file type
        const allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'text/plain',
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif'
        ];
        
        if (!allowedTypes.includes(file.type)) {
            showToast(`File "${file.name}" is not a supported format.`, 'warning');
            return;
        }
        
        // Add to current attachments
        const attachment = {
            id: Date.now() + Math.random(),
            name: file.name,
            size: file.size,
            type: file.type,
            file: file
        };
        
        currentAttachments.push(attachment);
    });
    
    // Clear the input
    e.target.value = '';
    
    // Update display
    displayAttachedFiles(currentAttachments);
});

function displayAttachedFiles(attachments) {
    const container = document.getElementById('attachedFilesList');
    container.innerHTML = '';
    
    if (attachments.length === 0) {
        container.innerHTML = '<p style="color: #666; font-style: italic; margin: 0;">No files attached</p>';
        return;
    }
    
    attachments.forEach(attachment => {
        const fileItem = document.createElement('div');
        fileItem.className = 'attached-file-item';
        fileItem.innerHTML = `
            <div class="attached-file-info">
                <div class="attached-file-icon">
                    <i class="fas fa-file"></i>
                </div>
                <div class="attached-file-details">
                    <div class="attached-file-name">${attachment.name}</div>
                    <div class="attached-file-size">${formatFileSize(attachment.size)}</div>
                </div>
            </div>
            <div class="attached-file-actions">
                <button class="remove-file-btn" onclick="removeFile('${attachment.id}')" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(fileItem);
    });
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

function removeFile(attachmentId) {
    currentAttachments = currentAttachments.filter(att => att.id != attachmentId);
    displayAttachedFiles(currentAttachments);
}

function getCurrentAttachments() {
    return currentAttachments.map(att => ({
        id: att.id,
        name: att.name,
        size: att.size,
        type: att.type
    }));
}

// Load events on page load
document.addEventListener('DOMContentLoaded', loadEvents);
</script>

<style>
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

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
