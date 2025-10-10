<?php
$pageTitle = 'Smart Campus Nova Hub - Event Details';
$pageIcon = 'fas fa-calendar-day';
$pageHeading = 'Event Details';
$activePage = 'events';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/event-planner" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Event Planner
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

<!-- Event Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="eventTitle">Mathematics Final Exam</h3>
                <span class="exam-id" id="eventId">EVT001</span>
            </div>
            <div class="exam-badges" id="eventBadges">
                <span class="badge tutorial-badge" id="eventCategory">Academic</span>
                <span class="badge active-badge" id="eventStatus">Upcoming</span>
            </div>
        </div>
    </div>

    <!-- Event Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Event Information</h4>
            <button class="simple-btn" onclick="editEventFromDetails()"><i class="fas fa-edit"></i> Edit Event</button>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Event Title:</label>
                <span id="detailTitle">Mathematics Final Exam</span>
            </div>
            <div class="detail-row">
                <label>Category:</label>
                <span id="detailCategory">Academic</span>
            </div>
            <div class="detail-row">
                <label>Date:</label>
                <span id="detailDate">December 15, 2024</span>
            </div>
            <div class="detail-row">
                <label>Time:</label>
                <span id="detailTime">09:00 - 12:00</span>
            </div>
            <div class="detail-row">
                <label>Location:</label>
                <span id="detailLocation">Main Hall</span>
            </div>
            <div class="detail-row">
                <label>Participants:</label>
                <span id="detailParticipants">Grade 10</span>
            </div>
            <div class="detail-row">
                <label>Status:</label>
                <span id="detailStatus">Upcoming</span>
            </div>
        </div>
    </div>

    <!-- Event Description -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-align-left"></i> Event Description</h4>
        </div>
        <div class="exam-detail-content">
            <p id="eventDescription" style="color: #666; line-height: 1.6;">
                Final examination for Grade 10 Mathematics covering all topics from the semester.
            </p>
        </div>
    </div>

    <!-- Event Statistics -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-bar"></i> Event Statistics</h4>
        </div>
        <div class="exam-detail-content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #e3f2fd;">
                        <i class="fas fa-users" style="color: #1976d2;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">35</div>
                        <div class="stat-label">Expected Participants</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #f3e5f5;">
                        <i class="fas fa-clock" style="color: #7b1fa2;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">3 hrs</div>
                        <div class="stat-label">Duration</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #e8f5e9;">
                        <i class="fas fa-map-marker-alt" style="color: #2e7d32;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">Main Hall</div>
                        <div class="stat-label">Venue</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fff3e0;">
                        <i class="fas fa-calendar-check" style="color: #ef6c00;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value" id="daysUntil">5 days</div>
                        <div class="stat-label">Until Event</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants List (If applicable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-users"></i> Participant Groups</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>Count</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Grade 10-A</strong></td>
                            <td>35 students</td>
                            <td><span class="status-badge paid">Confirmed</span></td>
                        </tr>
                        <tr>
                            <td><strong>Teachers</strong></td>
                            <td>3 supervisors</td>
                            <td><span class="status-badge paid">Confirmed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="deleteEventFromDetails()">
                <i class="fas fa-trash"></i> Delete Event
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="window.print()">
                    <i class="fas fa-print"></i> Print Details
                </button>
                <button class="simple-btn primary" onclick="editEventFromDetails()">
                    <i class="fas fa-edit"></i> Edit Event
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stat-content {
    flex: 1;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #333;
    line-height: 1.2;
}

.stat-label {
    font-size: 0.85rem;
    color: #666;
    margin-top: 4px;
}

@media screen and (max-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
// Get event ID from URL
const urlParams = new URLSearchParams(window.location.search);
const eventId = urlParams.get('id');

// Sample data mapping
const sampleEvents = {
    'EVT001': {
        id: 'EVT001',
        title: 'Mathematics Final Exam',
        category: 'Academic',
        date: '2024-12-15',
        start: '09:00',
        end: '12:00',
        location: 'Main Hall',
        audience: 'Grade 10',
        desc: 'Final examination for Grade 10 Mathematics covering all topics from the semester.'
    },
    'EVT002': {
        id: 'EVT002',
        title: 'Football Championship',
        category: 'Sports',
        date: '2024-12-18',
        start: '14:00',
        end: '17:00',
        location: 'School Ground',
        audience: 'All School',
        desc: 'Annual inter-school football championship featuring teams from 8 different schools.'
    },
    'EVT003': {
        id: 'EVT003',
        title: 'Cultural Festival',
        category: 'Cultural',
        date: '2024-12-20',
        start: '10:00',
        end: '16:00',
        location: 'Assembly Hall',
        audience: 'All School',
        desc: 'Annual cultural festival showcasing traditional music, dance, and art from different regions.'
    },
    'EVT004': {
        id: 'EVT004',
        title: 'Parent-Teacher Meeting',
        category: 'Meeting',
        date: '2024-12-22',
        start: '08:00',
        end: '17:00',
        location: 'Conference Room',
        audience: 'Parents',
        desc: 'Scheduled parent-teacher meetings to discuss student progress and academic performance.'
    }
};

function loadEventDetails() {
    // Try to get from localStorage first
    const savedEvents = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    let event = savedEvents.find(e => e.id === eventId);
    
    // Fallback to sample data
    if (!event && sampleEvents[eventId]) {
        event = sampleEvents[eventId];
    }
    
    if (event) {
        // Update page content
        document.getElementById('eventTitle').textContent = event.title;
        document.getElementById('eventId').textContent = event.id;
        document.getElementById('eventCategory').textContent = event.category;
        
        document.getElementById('detailTitle').textContent = event.title;
        document.getElementById('detailCategory').textContent = event.category;
        document.getElementById('detailDate').textContent = new Date(event.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        document.getElementById('detailTime').textContent = `${event.start} - ${event.end || 'N/A'}`;
        document.getElementById('detailLocation').textContent = event.location;
        document.getElementById('detailParticipants').textContent = event.audience;
        document.getElementById('eventDescription').textContent = event.desc || 'No description available.';
        
        // Calculate days until event
        const eventDate = new Date(event.date);
        const today = new Date();
        const diffTime = eventDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays > 0) {
            document.getElementById('daysUntil').textContent = `${diffDays} days`;
            document.getElementById('eventStatus').textContent = 'Upcoming';
            document.getElementById('detailStatus').textContent = 'Upcoming';
        } else if (diffDays === 0) {
            document.getElementById('daysUntil').textContent = 'Today';
            document.getElementById('eventStatus').textContent = 'Active';
            document.getElementById('detailStatus').textContent = 'Active';
        } else {
            document.getElementById('daysUntil').textContent = 'Completed';
            document.getElementById('eventStatus').textContent = 'Completed';
            document.getElementById('detailStatus').textContent = 'Completed';
        }
    }
}

function editEventFromDetails() {
    window.location.href = `/admin/event-edit?id=${eventId}`;
}

function deleteEventFromDetails() {
    showConfirmDialog({
        title: 'Delete Event',
        message: 'Are you sure you want to delete this event? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
            events = events.filter(e => e.id !== eventId);
            localStorage.setItem('adminEvents', JSON.stringify(events));
            
            alert('Event deleted successfully!');
            window.location.href = '/admin/event-planner';
        }
    });
}

// Load event details on page load
document.addEventListener('DOMContentLoaded', loadEventDetails);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

