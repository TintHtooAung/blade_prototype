<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Event';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Event';
$activePage = 'events';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/event-planner" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Event Management
    </a>
</div>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Edit Event Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="eventTitleDisplay">Edit: Annual Science Fair</h3>
                <span class="exam-id" id="eventIdDisplay">EVT001</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="eventCategoryBadge">Academic</span>
                <span class="badge active-badge" id="eventStatusBadge">Upcoming</span>
            </div>
        </div>
    </div>

    <!-- Core Event Information (Editable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Event Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Event Title</label>
                        <input type="text" class="form-input" id="eventTitle" placeholder="e.g., Annual Science Fair">
                    </div>
                    <div class="form-group">
                        <label>Event ID</label>
                        <input type="text" class="form-input" id="eventId" readonly>
                    </div>
                </div>
                <div class="form-row">
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
            </div>
        </div>
    </div>

    <!-- Event Schedule (Editable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-calendar-alt"></i> Event Schedule & Location</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
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
                    <div class="form-group" style="flex:2;">
                        <label>Location</label>
                        <input type="text" class="form-input" id="eventLocation" placeholder="e.g., Main Hall, School Ground">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Description</label>
                        <textarea class="form-input" id="eventDesc" rows="4" placeholder="Event description and additional details..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="cancelEdit()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="deleteEventConfirm()">
                    <i class="fas fa-trash"></i> Delete Event
                </button>
                <button class="simple-btn primary" onclick="saveEvent()">
                    <i class="fas fa-check"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Event Type Badges */
.badge.tutorial-badge {
    background: #e3f2fd;
    color: #1976d2;
    padding: 6px 14px;
    border-radius: 16px;
    font-size: 0.85rem;
    font-weight: 500;
}

.badge.active-badge {
    background: #fff3e0;
    color: #ef6c00;
    padding: 6px 14px;
    border-radius: 16px;
    font-size: 0.85rem;
    font-weight: 500;
}

/* Match exam-edit styling */
.exam-details-header {
    margin-bottom: 20px;
}

.exam-info-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 24px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.exam-title-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.exam-title-section h3 {
    margin: 0;
    font-size: 1.4rem;
    color: #fff;
}

.exam-id {
    background: rgba(255,255,255,0.2);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

.exam-badges {
    display: flex;
    gap: 8px;
}

.exam-detail-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 20px;
}

.exam-detail-header {
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.exam-detail-header h4 {
    margin: 0;
    font-size: 1.05rem;
    color: #333;
    display: flex;
    align-items: center;
    gap: 8px;
}

.exam-detail-header h4 i {
    color: #1976d2;
}

.exam-detail-content {
    padding: 20px;
}
</style>

<script>
// Get event ID from URL
const urlParams = new URLSearchParams(window.location.search);
const eventId = urlParams.get('id');

// Load event data
function loadEventData() {
    if (!eventId) {
        alert('Event ID not found');
        window.location.href = '/admin/event-planner';
        return;
    }
    
    // Try to load from localStorage first
    const events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    const event = events.find(e => e.id === eventId);
    
    // If not in localStorage, use sample data based on ID
    const sampleEvents = {
        'EVT001': {
            id: 'EVT001',
            title: 'Mathematics Final Exam',
            category: 'academic',
            date: '2024-12-15',
            start: '09:00',
            end: '12:00',
            location: 'Main Hall',
            audience: 'students',
            desc: 'Final examination for Grade 10 Mathematics'
        },
        'EVT002': {
            id: 'EVT002',
            title: 'Football Championship',
            category: 'sports',
            date: '2024-12-18',
            start: '14:00',
            end: '17:00',
            location: 'School Ground',
            audience: 'all',
            desc: 'Annual inter-school football championship'
        },
        'EVT003': {
            id: 'EVT003',
            title: 'Cultural Festival',
            category: 'cultural',
            date: '2024-12-20',
            start: '10:00',
            end: '16:00',
            location: 'Assembly Hall',
            audience: 'all',
            desc: 'Annual cultural festival with performances and exhibitions'
        },
        'EVT004': {
            id: 'EVT004',
            title: 'Parent-Teacher Meeting',
            category: 'meeting',
            date: '2024-12-22',
            start: '08:00',
            end: '17:00',
            location: 'Conference Room',
            audience: 'parents',
            desc: 'End of semester parent-teacher conference'
        }
    };
    
    const eventData = event || sampleEvents[eventId];
    
    if (!eventData) {
        alert('Event not found');
        window.location.href = '/admin/event-planner';
        return;
    }
    
    // Populate form fields
    document.getElementById('eventId').value = eventData.id;
    document.getElementById('eventTitle').value = eventData.title;
    document.getElementById('eventCategory').value = eventData.category;
    document.getElementById('eventDate').value = eventData.date;
    document.getElementById('eventStart').value = eventData.start;
    document.getElementById('eventEnd').value = eventData.end || '';
    document.getElementById('eventLocation').value = eventData.location;
    document.getElementById('eventAudience').value = eventData.audience;
    document.getElementById('eventDesc').value = eventData.desc || '';
    
    // Update display elements
    document.getElementById('eventTitleDisplay').textContent = 'Edit: ' + eventData.title;
    document.getElementById('eventIdDisplay').textContent = eventData.id;
    document.getElementById('eventCategoryBadge').textContent = eventData.category.charAt(0).toUpperCase() + eventData.category.slice(1);
    
    // Update category badge color
    const categoryBadge = document.getElementById('eventCategoryBadge');
    categoryBadge.className = 'badge tutorial-badge';
    if (eventData.category === 'sports') categoryBadge.style.background = '#f3e5f5';
    if (eventData.category === 'cultural') categoryBadge.style.background = '#fff3e0';
    if (eventData.category === 'meeting') categoryBadge.style.background = '#e8f5e9';
    if (eventData.category === 'holiday') categoryBadge.style.background = '#ffebee';
}

function saveEvent() {
    // Validate required fields
    const title = document.getElementById('eventTitle').value.trim();
    const date = document.getElementById('eventDate').value;
    const start = document.getElementById('eventStart').value;
    const location = document.getElementById('eventLocation').value.trim();
    
    if (!title || !date || !start || !location) {
        showToast('Please fill all required fields (Title, Date, Start Time, Location)', 'warning');
        return;
    }
    
    // Collect form data
    const eventData = {
        id: document.getElementById('eventId').value,
        title: title,
        category: document.getElementById('eventCategory').value,
        date: date,
        start: start,
        end: document.getElementById('eventEnd').value,
        location: location,
        audience: document.getElementById('eventAudience').value,
        desc: document.getElementById('eventDesc').value.trim()
    };
    
    // Save to localStorage
    let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    const index = events.findIndex(e => e.id === eventData.id);
    
    if (index > -1) {
        events[index] = eventData;
    } else {
        events.push(eventData);
    }
    
    localStorage.setItem('adminEvents', JSON.stringify(events));
    
    console.log('Save event:', eventData);
    // Backend: PUT /api/events/{id}
    
    const eventTitle = document.getElementById('eventTitle').value.trim();
    redirectWithStatus('/admin/event-planner', `Event "${eventTitle}" (${eventId}) updated successfully`, 'success');
}

function deleteEventConfirm() {
    showConfirmDialog({
        title: 'Delete Event',
        message: 'Are you sure you want to delete this event? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
            events = events.filter(e => e.id !== eventId);
            localStorage.setItem('adminEvents', JSON.stringify(events));
            
            // Backend: DELETE /api/events/{id}
            
            const deletedEventTitle = document.getElementById('eventTitle').value.trim();
            redirectWithStatus('/admin/event-planner', `Event "${deletedEventTitle}" (${eventId}) deleted successfully`, 'success');
        }
    });
}

function cancelEdit() {
    showConfirmDialog({
        title: 'Discard Changes',
        message: 'Are you sure you want to discard your changes and return to event management?',
        confirmText: 'Discard',
        confirmIcon: 'fas fa-times',
        onConfirm: () => {
            window.location.href = '/admin/event-planner';
        }
    });
}

// Update display when category changes
document.getElementById('eventCategory').addEventListener('change', function() {
    const categoryBadge = document.getElementById('eventCategoryBadge');
    categoryBadge.textContent = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    
    // Update badge color
    categoryBadge.style.background = '#e3f2fd';
    categoryBadge.style.color = '#1976d2';
    
    if (this.value === 'sports') {
        categoryBadge.style.background = '#f3e5f5';
        categoryBadge.style.color = '#7b1fa2';
    }
    if (this.value === 'cultural') {
        categoryBadge.style.background = '#fff3e0';
        categoryBadge.style.color = '#ef6c00';
    }
    if (this.value === 'meeting') {
        categoryBadge.style.background = '#e8f5e9';
        categoryBadge.style.color = '#2e7d32';
    }
    if (this.value === 'holiday') {
        categoryBadge.style.background = '#ffebee';
        categoryBadge.style.color = '#c62828';
    }
});

// Update title display when title changes
document.getElementById('eventTitle').addEventListener('input', function() {
    document.getElementById('eventTitleDisplay').textContent = 'Edit: ' + this.value;
});

// Load event data on page load
document.addEventListener('DOMContentLoaded', loadEventData);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

