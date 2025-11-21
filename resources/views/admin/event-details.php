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

    <!-- Event Attachments -->
    <div class="exam-detail-card" id="attachmentsSection" style="display: none;">
        <div class="exam-detail-header">
            <h4><i class="fas fa-paperclip"></i> Event Attachments</h4>
        </div>
        <div class="exam-detail-content">
            <div id="attachedFilesList" class="attached-files-list">
                <!-- Attached files will be displayed here -->
            </div>
        </div>
    </div>


    <!-- Participants List -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-users"></i> Event Participants</h4>
        </div>
        <div class="exam-detail-content">
            <p id="eventParticipantsList" style="color: #666; line-height: 1.6; margin: 0;">
                <!-- Participants will be displayed here -->
            </p>
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

<!-- Edit Event Modal -->
<div id="editEventModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 800px; max-height: 90vh; overflow-y: auto;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-calendar-edit"></i> Edit Event</h4>
            <button class="icon-btn" onclick="closeEditEventModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Event Title *</label>
                        <input type="text" class="form-input" id="editEventTitle" placeholder="e.g., Annual Science Fair">
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select class="form-select" id="editEventCategory">
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
                            <input type="date" class="form-input" id="editEventStartDate">
                            <input type="time" class="form-input" id="editEventStart">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>End Date & Time</label>
                        <div class="dual-input">
                            <input type="date" class="form-input" id="editEventEndDate">
                            <input type="time" class="form-input" id="editEventEnd">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Location *</label>
                        <input type="text" class="form-input" id="editEventLocation" placeholder="e.g., Main Hall">
                    </div>
                    <div class="form-group">
                        <label>Participants</label>
                        <select class="form-select" id="editEventAudience">
                            <option value="all">All School</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" id="editStudentGradeRow" style="display:none;">
                    <div class="form-group" style="flex:1;">
                        <label>Select Grades</label>
                        <div id="editStudentGradeSelector" style="display:flex; flex-wrap:wrap; gap:8px;">
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
                <div class="form-row" id="editTeacherParticipantRow" style="display:none;">
                    <div class="form-group" style="flex:1;">
                        <label>Select Teachers</label>
                        <div id="editTeacherParticipantSelector" style="display:flex; flex-wrap:wrap; gap:8px;">
                            <label class="grade-chip"><input type="checkbox" class="teacher-checkbox" value="T001"> Ms. Sarah Johnson</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-checkbox" value="T002"> Mr. David Lee</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-checkbox" value="T003"> Ms. Emily Chen</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-checkbox" value="T004"> Mr. Robert Kim</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-checkbox" value="T005"> Ms. Alicia Gomez</label>
                            <label class="grade-chip"><input type="checkbox" class="teacher-checkbox" value="T006"> Dr. Helen Murray</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Description</label>
                        <textarea class="form-input" id="editEventDesc" rows="3" placeholder="Event description..."></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Attach Files</label>
                        <input type="file" class="form-input" id="editEventAttachments" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.jpg,.jpeg,.png,.gif">
                        <small style="color: #666; margin-top: 4px; display: block;">
                            Supported formats: PDF, DOC, XLS, PPT, TXT, JPG, PNG (Max 10MB each)
                        </small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <div id="editAttachedFilesList" class="attached-files-list">
                            <!-- Attached files will be displayed here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditEventModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveEditedEvent()">
                <i class="fas fa-check"></i> Update Event
            </button>
        </div>
    </div>
</div>

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

.download-file-btn {
    background: #e8f5e9;
    color: #2e7d32;
    border: none;
    padding: 6px 8px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.2s;
}

.download-file-btn:hover {
    background: #c8e6c9;
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
</style>

<script>
// Get event ID from URL
const urlParams = new URLSearchParams(window.location.search);
const eventId = urlParams.get('id');
let editCurrentAttachments = [];

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
    const startText = start.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
    if (!endDate || startDate === endDate) return startText;
    const sameYear = start.getFullYear() === end.getFullYear();
    const sameMonth = start.getMonth() === end.getMonth() && sameYear;
    if (sameMonth) {
        return `${start.toLocaleDateString('en-US', { month: 'long' })} ${start.getDate()} - ${end.getDate()}, ${start.getFullYear()}`;
    }
    if (sameYear) {
        return `${start.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${end.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}, ${start.getFullYear()}`;
    }
    return `${startText} - ${end.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}`;
}

function formatTimeRange(start, end) {
    if (!start) return 'All Day';
    const formatValue = (val) => {
        const [h, m] = val.split(':');
        const hour = parseInt(h, 10);
        const ampm = hour >= 12 ? 'PM' : 'AM';
        const displayHour = hour % 12 || 12;
        return `${displayHour}:${m} ${ampm}`;
    };
    if (!end) return formatValue(start);
    return `${formatValue(start)} - ${formatValue(end)}`;
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

function getSelectedGrades(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return [];
    return Array.from(container.querySelectorAll('input.grade-checkbox:checked')).map(cb => cb.value);
}

function setSelectedTeachers(containerId, teachers = []) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.querySelectorAll('input.teacher-checkbox').forEach(cb => {
        cb.checked = teachers.includes(cb.value);
    });
}

function resetTeacherSelector(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.querySelectorAll('input.teacher-checkbox').forEach(cb => cb.checked = false);
}

function getSelectedTeachers(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return [];
    return Array.from(container.querySelectorAll('input.teacher-checkbox:checked')).map(cb => cb.value);
}

function toggleGradeSelector(selectEl, rowId, containerId, teacherRowId = null, teacherContainerId = null) {
    const row = document.getElementById(rowId);
    if (row) {
        if (selectEl && selectEl.value === 'students') {
            row.style.display = 'block';
        } else {
            row.style.display = 'none';
            resetGradeSelector(containerId);
        }
    }
    
    if (teacherRowId) {
        const teacherRow = document.getElementById(teacherRowId);
        if (teacherRow) {
            if (selectEl && selectEl.value === 'teachers') {
                teacherRow.style.display = 'block';
            } else {
                teacherRow.style.display = 'none';
                if (teacherContainerId) {
                    resetTeacherSelector(teacherContainerId);
                }
            }
        }
    }
}

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
        desc: 'Final examination for Grade 10 Mathematics covering all topics from the semester.',
        attachments: [
            {
                id: 'att1',
                name: 'Exam Guidelines.pdf',
                size: 245760,
                type: 'application/pdf'
            },
            {
                id: 'att2',
                name: 'Sample Questions.docx',
                size: 128000,
                type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            }
        ]
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
        desc: 'Annual inter-school football championship featuring teams from 8 different schools.',
        attachments: [
            {
                id: 'att3',
                name: 'Tournament Rules.pdf',
                size: 189440,
                type: 'application/pdf'
            },
            {
                id: 'att4',
                name: 'Team Schedule.xlsx',
                size: 45632,
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            }
        ]
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
        desc: 'Annual cultural festival showcasing traditional music, dance, and art from different regions.',
        attachments: [
            {
                id: 'att5',
                name: 'Performance Schedule.pdf',
                size: 156789,
                type: 'application/pdf'
            },
            {
                id: 'att6',
                name: 'Participant List.xlsx',
                size: 67890,
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            },
            {
                id: 'att7',
                name: 'Event Poster.jpg',
                size: 234567,
                type: 'image/jpeg'
            }
        ]
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
        desc: 'Scheduled parent-teacher meetings to discuss student progress and academic performance.',
        attachments: [
            {
                id: 'att8',
                name: 'Meeting Agenda.pdf',
                size: 98765,
                type: 'application/pdf'
            },
            {
                id: 'att9',
                name: 'Student Progress Report Template.docx',
                size: 54321,
                type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            }
        ]
    }
};

const teacherDirectoryMap = {
    T001: 'Ms. Sarah Johnson',
    T002: 'Mr. David Lee',
    T003: 'Ms. Emily Chen',
    T004: 'Mr. Robert Kim',
    T005: 'Ms. Alicia Gomez',
    T006: 'Dr. Helen Murray'
};

function formatAudience(audience) {
    // Convert audience value to readable format
    const audienceMap = {
        'all': 'All School',
        'students': 'Students',
        'teachers': 'Teachers',
        'staff': 'Staff',
        'parents': 'Parents'
    };
    
    // If it's a mapped value, return the formatted version
    if (audienceMap[audience]) {
        return audienceMap[audience];
    }
    
    // Otherwise, capitalize first letter of each word
    if (typeof audience === 'string') {
        return audience.split(' ').map(word => 
            word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
        ).join(' ');
    }
    
    return audience || 'Not specified';
}

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
        document.getElementById('detailDate').textContent = formatDateRange(getEventStartDate(event), getEventEndDate(event));
        document.getElementById('detailTime').textContent = formatTimeRange(event.start, event.end);
        document.getElementById('detailLocation').textContent = event.location;
        let participantsText = formatAudience(event.audience);
        if (event.audience === 'students' && event.audienceGrades && event.audienceGrades.length) {
            participantsText = `${formatAudience(event.audience)} (${event.audienceGrades.join(', ')})`;
        } else if (event.audience === 'teachers' && event.teacherParticipants && event.teacherParticipants.length) {
            const teacherNames = event.teacherParticipants.map(id => teacherDirectoryMap[id] || id);
            participantsText = `${formatAudience(event.audience)} (${teacherNames.join(', ')})`;
        }
        document.getElementById('detailParticipants').textContent = participantsText;
        document.getElementById('eventDescription').textContent = event.desc || 'No description available.';
        
        // Display participants as simple text
        document.getElementById('eventParticipantsList').textContent = participantsText;
        
        // Load attachments if they exist
        if (event.attachments && event.attachments.length > 0) {
            displayAttachedFiles(event.attachments);
            document.getElementById('attachmentsSection').style.display = 'block';
        } else {
            document.getElementById('attachmentsSection').style.display = 'none';
        }
        
        // Calculate event status
        const eventDate = new Date(getEventStartDate(event));
        const today = new Date();
        const diffTime = eventDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays > 0) {
            document.getElementById('eventStatus').textContent = 'Upcoming';
            document.getElementById('detailStatus').textContent = 'Upcoming';
        } else if (diffDays === 0) {
            document.getElementById('eventStatus').textContent = 'Active';
            document.getElementById('detailStatus').textContent = 'Active';
        } else {
            document.getElementById('eventStatus').textContent = 'Completed';
            document.getElementById('detailStatus').textContent = 'Completed';
        }
    }
}

function editEventFromDetails() {
    // Get event data
    const savedEvents = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    let event = savedEvents.find(e => e.id === eventId);
    
    // Fallback to sample data
    if (!event && sampleEvents[eventId]) {
        event = sampleEvents[eventId];
    }
    
    if (!event) {
        alert('Event not found');
        return;
    }
    
    // Load event data into modal form
    const startDate = getEventStartDate(event);
    const endDate = getEventEndDate(event);
    document.getElementById('editEventTitle').value = event.title || '';
    document.getElementById('editEventCategory').value = event.category ? event.category.toLowerCase() : 'academic';
    document.getElementById('editEventStartDate').value = startDate || '';
    document.getElementById('editEventEndDate').value = endDate || '';
    document.getElementById('editEventStart').value = event.start || event.startTime || '';
    document.getElementById('editEventEnd').value = event.end || event.endTime || '';
    document.getElementById('editEventLocation').value = event.location || '';
    
    // Map audience value
    const audienceValue = event.audience ? event.audience.toLowerCase() : 'all';
    document.getElementById('editEventAudience').value = audienceValue;
    toggleGradeSelector(document.getElementById('editEventAudience'), 'editStudentGradeRow', 'editStudentGradeSelector', 'editTeacherParticipantRow', 'editTeacherParticipantSelector');
    if (audienceValue === 'students' && event.audienceGrades) {
        setSelectedGrades('editStudentGradeSelector', event.audienceGrades);
    } else {
        resetGradeSelector('editStudentGradeSelector');
    }
    if (audienceValue === 'teachers' && event.teacherParticipants) {
        setSelectedTeachers('editTeacherParticipantSelector', event.teacherParticipants);
    } else {
        resetTeacherSelector('editTeacherParticipantSelector');
    }
    
    document.getElementById('editEventDesc').value = event.desc || event.description || '';
    
    // Load attachments
    if (event.attachments && event.attachments.length > 0) {
        editCurrentAttachments = event.attachments;
        displayEditAttachedFiles(editCurrentAttachments);
    } else {
        editCurrentAttachments = [];
        displayEditAttachedFiles([]);
    }
    
    // Show modal
    document.getElementById('editEventModal').style.display = 'flex';
}

function closeEditEventModal() {
    document.getElementById('editEventModal').style.display = 'none';
    editCurrentAttachments = [];
    displayEditAttachedFiles([]);
}

function saveEditedEvent() {
    const title = document.getElementById('editEventTitle').value.trim();
    const category = document.getElementById('editEventCategory').value;
    const startDate = document.getElementById('editEventStartDate').value;
    const endDate = document.getElementById('editEventEndDate').value || startDate;
    const start = document.getElementById('editEventStart').value;
    const end = document.getElementById('editEventEnd').value;
    const location = document.getElementById('editEventLocation').value.trim();
    const audience = document.getElementById('editEventAudience').value;
    const desc = document.getElementById('editEventDesc').value.trim();
    const audienceGrades = audience === 'students' ? getSelectedGrades('editStudentGradeSelector') : [];
    const teacherParticipants = audience === 'teachers' ? getSelectedTeachers('editTeacherParticipantSelector') : [];
    
    if (!title || !startDate || !start || !location) {
        alert('Please fill all required fields (Title, Start Date, Start Time, Location)');
        return;
    }
    
    if (audience === 'students' && audienceGrades.length === 0) {
        alert('Please select at least one grade for student events.');
        return;
    }
    
    if (audience === 'teachers' && teacherParticipants.length === 0) {
        alert('Please select at least one teacher for teacher events.');
        return;
    }
    
    const eventData = {
        id: eventId,
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
        teacherParticipants,
        desc,
        attachments: editCurrentAttachments
    };
    
    // Save to localStorage
    let events = JSON.parse(localStorage.getItem('adminEvents') || '[]');
    const index = events.findIndex(e => e.id === eventId);
    
    if (index > -1) {
        events[index] = eventData;
    } else {
        events.push(eventData);
    }
    
    localStorage.setItem('adminEvents', JSON.stringify(events));
    
    // Reload event details
    loadEventDetails();
    
    // Close modal
    closeEditEventModal();
    
    // Show success message
    if (typeof showToast === 'function') {
        showToast(`Event "${title}" updated successfully`, 'success');
    } else {
        alert(`Event "${title}" updated successfully`);
    }
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
                <button class="download-file-btn" onclick="downloadAttachment('${attachment.id}', '${attachment.name}')" title="Download">
                    <i class="fas fa-download"></i>
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

function downloadAttachment(attachmentId, fileName) {
    // In a real application, this would download from the server
    // For this prototype, we'll show a message
    showToast(`Downloading "${fileName}"...`, 'info');
    console.log(`Downloading attachment: ${attachmentId} - ${fileName}`);
}

function displayEditAttachedFiles(attachments) {
    const container = document.getElementById('editAttachedFilesList');
    if (!container) return;
    
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
                <button class="remove-file-btn" onclick="removeEditFile('${attachment.id}')" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(fileItem);
    });
}

function removeEditFile(attachmentId) {
    editCurrentAttachments = editCurrentAttachments.filter(att => att.id != attachmentId);
    displayEditAttachedFiles(editCurrentAttachments);
}

// Handle file uploads in edit modal
document.addEventListener('DOMContentLoaded', function() {
    const editFileInput = document.getElementById('editEventAttachments');
    if (editFileInput) {
        editFileInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            
            files.forEach(file => {
                if (file.size > 10 * 1024 * 1024) {
                    alert(`File "${file.name}" exceeds 10MB limit.`);
                    return;
                }
                
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
                    alert(`File "${file.name}" is not a supported format.`);
                    return;
                }
                
                const attachment = {
                    id: Date.now() + Math.random(),
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    file: file
                };
                
                editCurrentAttachments.push(attachment);
            });
            
            e.target.value = '';
            displayEditAttachedFiles(editCurrentAttachments);
        });
    }
    
    // Close modal when clicking outside
    const editModal = document.getElementById('editEventModal');
    if (editModal) {
        editModal.addEventListener('click', function(e) {
            if (e.target === editModal) {
                closeEditEventModal();
            }
        });
    }
    
    const audienceSelect = document.getElementById('editEventAudience');
    if (audienceSelect) {
        audienceSelect.addEventListener('change', function() {
            toggleGradeSelector(this, 'editStudentGradeRow', 'editStudentGradeSelector', 'editTeacherParticipantRow', 'editTeacherParticipantSelector');
        });
        toggleGradeSelector(audienceSelect, 'editStudentGradeRow', 'editStudentGradeSelector', 'editTeacherParticipantRow', 'editTeacherParticipantSelector');
    }
});

// Load event details on page load
document.addEventListener('DOMContentLoaded', loadEventDetails);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

