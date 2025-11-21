<?php
$pageTitle = 'Smart Campus Nova Hub - Create Event';
$pageIcon = 'fas fa-plus';
$pageHeading = 'Create New Event';
$activePage = 'event-planner';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/event-planner" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Event Planner
    </a>
</div>

<!-- Create Event Form -->
<div class="create-event-form">
    <form id="eventCreateForm" class="announcement-form">
        <!-- Basic Details Section -->
        <div class="form-section">
            <h3 class="section-title">Basic Details</h3>
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="evTitle">Title</label>
                    <input type="text" id="evTitle" class="form-input" placeholder="Event title">
                </div>
                <div class="form-group">
                    <label for="evCategory">Category</label>
                    <select id="evCategory" class="form-select">
                        <option value="academic">Academic</option>
                        <option value="sports">Sports</option>
                        <option value="cultural">Cultural</option>
                        <option value="meeting">Meeting</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="evLocation">Location</label>
                    <input type="text" id="evLocation" class="form-input" placeholder="e.g., Main Hall">
                </div>
                <div class="form-group">
                    <label for="evAudience">Audience</label>
                    <input type="text" id="evAudience" class="form-input" placeholder="e.g., Grade 10, Parents, All">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label for="evDesc">Description</label>
                    <textarea id="evDesc" class="form-input" rows="4" placeholder="Short description..."></textarea>
                </div>
            </div>
        </div>

        <!-- Event Type Selection Section -->
        <div class="form-section">
            <h3 class="section-title">Event Duration</h3>
            <div class="event-type-toggle">
                <label class="event-type-option">
                    <input type="radio" name="eventType" value="single" id="eventTypeSingle" checked>
                    <div class="event-type-card">
                        <i class="fas fa-calendar-day"></i>
                        <span>Single Day Event</span>
                        <small>Event occurs on one day</small>
                    </div>
                </label>
                <label class="event-type-option">
                    <input type="radio" name="eventType" value="multi" id="eventTypeMulti">
                    <div class="event-type-card">
                        <i class="fas fa-calendar-week"></i>
                        <span>Multi-Day Event</span>
                        <small>Event spans multiple days</small>
                    </div>
                </label>
            </div>
        </div>

        <!-- Single Day Event Section -->
        <div class="form-section" id="singleDaySection">
            <h3 class="section-title">Single Day Event Details</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="evDate">Date</label>
                    <input type="date" id="evDate" class="form-input">
                </div>
                <div class="form-group">
                    <label for="evStart">Start Time</label>
                    <input type="time" id="evStart" class="form-input">
                </div>
                <div class="form-group">
                    <label for="evEnd">End Time</label>
                    <input type="time" id="evEnd" class="form-input">
                </div>
            </div>
        </div>

        <!-- Multi-Day Event Section -->
        <div class="form-section" id="multiDaySection" style="display:none;">
            <h3 class="section-title">Multi-Day Event Details</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="evStartDate">Start Date</label>
                    <input type="date" id="evStartDate" class="form-input">
                </div>
                <div class="form-group">
                    <label for="evEndDate">End Date</label>
                    <input type="date" id="evEndDate" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="evStartTime">Start Time</label>
                    <input type="time" id="evStartTime" class="form-input">
                </div>
                <div class="form-group">
                    <label for="evEndTime">End Time</label>
                    <input type="time" id="evEndTime" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label>
                        <input type="checkbox" id="evDifferentTimes" style="width:auto; margin-right:8px;">
                        Different times for each day
                    </label>
                    <p style="margin: 6px 0 0; color: #6b7280; font-size: 13px;">
                        <i class="fas fa-info-circle"></i> Enable this to set different start and end times for each day of the event.
                    </p>
                </div>
            </div>
            <!-- Multi-Day Timelines (shown when different times is checked) -->
            <div id="multiDayTimelines" style="display:none; margin-top:16px; padding: 16px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                <div class="form-row" style="align-items:center; margin-bottom:12px;">
                    <h4 style="margin:0; flex:1;">Daily Timelines</h4>
                    <button type="button" class="simple-btn" onclick="addDayTimeline()" style="padding:6px 12px;">
                        <i class="fas fa-plus"></i> Add Day
                    </button>
                </div>
                <div id="dayTimelinesList">
                    <!-- Dynamic day timelines will be added here -->
                </div>
            </div>
        </div>

        <!-- Event Photo Section -->
        <div class="form-section">
            <h3 class="section-title">Event Photo</h3>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label for="evPhoto">Upload Event Photo</label>
                    <input type="file" id="evPhoto" class="form-input" accept="image/*">
                    <small style="color: #666; margin-top: 4px; display: block;">
                        Supported formats: JPG, PNG, GIF (Max 5MB)
                    </small>
                    <div id="photoPreview" style="margin-top:12px; display:none;">
                        <img id="photoPreviewImg" src="" alt="Preview" style="max-width:300px; max-height:200px; border-radius:8px; border:1px solid #ddd;">
                        <button type="button" class="remove-photo-btn" onclick="removePhoto()" style="margin-top:8px;">
                            <i class="fas fa-times"></i> Remove Photo
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Attachments Section -->
        <div class="form-section">
            <h3 class="section-title">Attachments</h3>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label for="evAttachments">Attach Files</label>
                    <input type="file" id="evAttachments" class="form-input" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.jpg,.jpeg,.png,.gif">
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
        </div>

        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.location.href='/admin/event-planner'">Cancel</button>
            <button type="submit" class="btn-send"><i class="fas fa-check"></i> Save Event</button>
        </div>
    </form>
</div>

<style>
/* Event Type Toggle Styling */
.event-type-toggle {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
}

.event-type-option {
    cursor: pointer;
    margin: 0;
}

.event-type-option input[type="radio"] {
    display: none;
}

.event-type-card {
    padding: 20px;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    background: #ffffff;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.event-type-card i {
    font-size: 32px;
    color: #6b7280;
    margin-bottom: 4px;
}

.event-type-card span {
    font-weight: 600;
    color: #374151;
    font-size: 15px;
}

.event-type-card small {
    font-size: 12px;
    color: #6b7280;
    display: block;
}

.event-type-option input[type="radio"]:checked + .event-type-card {
    border-color: #667eea;
    background: #f0f4ff;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
}

.event-type-option input[type="radio"]:checked + .event-type-card i {
    color: #667eea;
}

.event-type-option input[type="radio"]:checked + .event-type-card span {
    color: #667eea;
}

.event-type-option:hover .event-type-card {
    border-color: #cbd5e1;
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

.remove-file-btn, .remove-photo-btn {
    background: #ffebee;
    color: #d32f2f;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.2s;
}

.remove-file-btn:hover, .remove-photo-btn:hover {
    background: #ffcdd2;
}

/* Day Timeline Styling */
.day-timeline-item {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 12px;
}

.day-timeline-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.day-timeline-title {
    font-weight: 600;
    color: #374151;
}

.remove-day-btn {
    background: #fee2e2;
    color: #dc2626;
    border: none;
    padding: 4px 8px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
}

.remove-day-btn:hover {
    background: #fecaca;
}
</style>

<script>
// Global variables
let currentAttachments = [];
let dayTimelines = [];
let eventPhoto = null;

document.addEventListener('DOMContentLoaded', function(){
    // Event type toggle handler
    const eventTypeRadios = document.querySelectorAll('input[name="eventType"]');
    eventTypeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            toggleEventType(this.value);
        });
    });

    // Different times checkbox handler
    const differentTimesCheckbox = document.getElementById('evDifferentTimes');
    if (differentTimesCheckbox) {
        differentTimesCheckbox.addEventListener('change', function() {
            document.getElementById('multiDayTimelines').style.display = this.checked ? 'block' : 'none';
            if (this.checked) {
                const startDate = document.getElementById('evStartDate').value;
                const endDate = document.getElementById('evEndDate').value;
                if (startDate && endDate) {
                    updateDayTimelines();
                } else {
                    alert('Please set start and end dates first.');
                    this.checked = false;
                    document.getElementById('multiDayTimelines').style.display = 'none';
                }
            } else {
                dayTimelines = [];
                renderDayTimelines();
            }
        });
    }

    // Photo upload handler
    const photoInput = document.getElementById('evPhoto');
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            handlePhotoUpload(e);
        });
    }

    // File attachments handler
    const attachmentsInput = document.getElementById('evAttachments');
    if (attachmentsInput) {
        attachmentsInput.addEventListener('change', function(e) {
            handleFileUpload(e);
        });
    }

    // Form submission
    const form = document.getElementById('eventCreateForm');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        saveEvent();
    });

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('evDate');
    const startDateInput = document.getElementById('evStartDate');
    const endDateInput = document.getElementById('evEndDate');
    
    if (dateInput) dateInput.setAttribute('min', today);
    if (startDateInput) startDateInput.setAttribute('min', today);
    if (endDateInput) endDateInput.setAttribute('min', today);

    // Auto-update end date for multi-day events
    if (startDateInput && endDateInput) {
        startDateInput.addEventListener('change', function() {
            if (this.value) {
                endDateInput.setAttribute('min', this.value);
                // Ensure end date is not before start date
                if (endDateInput.value && endDateInput.value < this.value) {
                    endDateInput.value = this.value;
                }
                // Auto-populate day timelines if different times is checked
                if (document.getElementById('evDifferentTimes').checked) {
                    updateDayTimelines();
                }
            }
        });

        endDateInput.addEventListener('change', function() {
            if (document.getElementById('evDifferentTimes').checked) {
                updateDayTimelines();
            }
        });
    }
});

function toggleEventType(type) {
    const singleDaySection = document.getElementById('singleDaySection');
    const multiDaySection = document.getElementById('multiDaySection');
    
    if (type === 'single') {
        singleDaySection.style.display = 'block';
        multiDaySection.style.display = 'none';
        // Clear multi-day timelines
        document.getElementById('evDifferentTimes').checked = false;
        document.getElementById('multiDayTimelines').style.display = 'none';
        dayTimelines = [];
        renderDayTimelines();
    } else {
        singleDaySection.style.display = 'none';
        multiDaySection.style.display = 'block';
    }
}

function updateDayTimelines() {
    const startDate = document.getElementById('evStartDate').value;
    const endDate = document.getElementById('evEndDate').value;
    
    if (!startDate || !endDate) return;

    const start = new Date(startDate);
    const end = new Date(endDate);
    const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
    
    // Clear existing timelines
    dayTimelines = [];
    
    // Generate timelines for each day
    for (let i = 0; i < days; i++) {
        const dayDate = new Date(start);
        dayDate.setDate(start.getDate() + i);
        
        const timeline = {
            id: 'day_' + Date.now() + '_' + i,
            date: dayDate.toISOString().split('T')[0],
            startTime: document.getElementById('evStartTime').value || '',
            endTime: document.getElementById('evEndTime').value || ''
        };
        
        dayTimelines.push(timeline);
    }
    
    renderDayTimelines();
}


function addDayTimeline() {
    const startDate = document.getElementById('evStartDate').value;
    const endDate = document.getElementById('evEndDate').value;
    
    if (!startDate || !endDate) {
        alert('Please set start and end dates first.');
        return;
    }

    // If no timelines exist, auto-populate all days
    if (dayTimelines.length === 0) {
        updateDayTimelines();
        return;
    }

    const start = new Date(startDate);
    const end = new Date(endDate);
    const dayIndex = dayTimelines.length;
    const dayDate = new Date(start);
    dayDate.setDate(start.getDate() + dayIndex);
    
    if (dayDate > end) {
        alert('All days have been added.');
        return;
    }

    const dayTimeline = {
        id: 'day_' + Date.now() + '_' + dayIndex,
        date: dayDate.toISOString().split('T')[0],
        startTime: document.getElementById('evStartTime').value || '',
        endTime: document.getElementById('evEndTime').value || ''
    };

    dayTimelines.push(dayTimeline);
    renderDayTimelines();
}

function removeDayTimeline(timelineId) {
    dayTimelines = dayTimelines.filter(t => t.id !== timelineId);
    renderDayTimelines();
}

function renderDayTimelines() {
    const container = document.getElementById('dayTimelinesList');
    container.innerHTML = '';

    dayTimelines.forEach((timeline, index) => {
        const dayDate = new Date(timeline.date);
        const dayName = dayDate.toLocaleDateString('en-US', { weekday: 'long' });
        const dayFormatted = dayDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });

        const timelineDiv = document.createElement('div');
        timelineDiv.className = 'day-timeline-item';
        timelineDiv.innerHTML = `
            <div class="day-timeline-header">
                <span class="day-timeline-title">Day ${index + 1}: ${dayName}, ${dayFormatted}</span>
                <button type="button" class="remove-day-btn" onclick="removeDayTimeline('${timeline.id}')">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="form-row" style="margin:0;">
                <div class="form-group" style="flex:1; margin-bottom:0;">
                    <label>Start Time *</label>
                    <input type="time" class="form-input day-start-time" data-id="${timeline.id}" value="${timeline.startTime}" required>
                </div>
                <div class="form-group" style="flex:1; margin-bottom:0;">
                    <label>End Time *</label>
                    <input type="time" class="form-input day-end-time" data-id="${timeline.id}" value="${timeline.endTime}" required>
                </div>
            </div>
        `;
        container.appendChild(timelineDiv);

        // Add event listeners for time changes
        const startInput = timelineDiv.querySelector('.day-start-time');
        const endInput = timelineDiv.querySelector('.day-end-time');
        
        startInput.addEventListener('change', function() {
            const t = dayTimelines.find(t => t.id === timeline.id);
            if (t) t.startTime = this.value;
        });
        
        endInput.addEventListener('change', function() {
            const t = dayTimelines.find(t => t.id === timeline.id);
            if (t) t.endTime = this.value;
        });
    });
}

function handlePhotoUpload(e) {
    const file = e.target.files[0];
    if (!file) return;

    // Validate file size (5MB max)
    if (file.size > 5 * 1024 * 1024) {
        alert('Photo is too large. Maximum size is 5MB.');
        e.target.value = '';
        return;
    }

    // Validate file type
    if (!file.type.startsWith('image/')) {
        alert('Please select an image file.');
        e.target.value = '';
        return;
    }

    eventPhoto = file;

    // Show preview
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('photoPreviewImg').src = e.target.result;
        document.getElementById('photoPreview').style.display = 'block';
    };
    reader.readAsDataURL(file);
}

function removePhoto() {
    eventPhoto = null;
    document.getElementById('evPhoto').value = '';
    document.getElementById('photoPreview').style.display = 'none';
}

function handleFileUpload(e) {
    const files = Array.from(e.target.files);
    
    files.forEach(file => {
        // Validate file size (10MB max)
        if (file.size > 10 * 1024 * 1024) {
            alert(`File "${file.name}" is too large. Maximum size is 10MB.`);
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
            alert(`File "${file.name}" is not a supported format.`);
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
    displayAttachedFiles();
}

function displayAttachedFiles() {
    const container = document.getElementById('attachedFilesList');
    container.innerHTML = '';
    
    if (currentAttachments.length === 0) {
        container.innerHTML = '<p style="color: #666; font-style: italic; margin: 0;">No files attached</p>';
        return;
    }
    
    currentAttachments.forEach(attachment => {
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
                <button type="button" class="remove-file-btn" onclick="removeFile('${attachment.id}')" title="Remove">
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
    displayAttachedFiles();
}

function getCurrentAttachments() {
    return currentAttachments.map(att => ({
        id: att.id,
        name: att.name,
        size: att.size,
        type: att.type
    }));
}

function saveEvent() {
    const eventType = document.querySelector('input[name="eventType"]:checked').value;
    const title = (document.getElementById('evTitle').value || '').trim();
    const category = document.getElementById('evCategory').value;
    const location = (document.getElementById('evLocation').value || '').trim();
    const audience = (document.getElementById('evAudience').value || '').trim();
    const desc = (document.getElementById('evDesc').value || '').trim();

    // Validation
    if (!title) {
        alert('Please provide Title.');
        return;
    }

    let ev = {
        id: 'EVT' + Date.now(),
        title: title,
        category: category,
        location: location,
        audience: audience,
        desc: desc,
        eventType: eventType,
        attachments: getCurrentAttachments(),
        photo: eventPhoto ? {
            name: eventPhoto.name,
            size: eventPhoto.size,
            type: eventPhoto.type
        } : null
    };

    if (eventType === 'single') {
        const date = document.getElementById('evDate').value;
        const start = document.getElementById('evStart').value;
        const end = document.getElementById('evEnd').value;

        if (!date) {
            alert('Please provide Date.');
            return;
        }

        ev.date = date;
        ev.startDate = date;
        ev.endDate = date;
        ev.start = start;
        ev.end = end;
    } else {
        const startDate = document.getElementById('evStartDate').value;
        const endDate = document.getElementById('evEndDate').value;
        const startTime = document.getElementById('evStartTime').value;
        const endTime = document.getElementById('evEndTime').value;

        if (!startDate) {
            alert('Please provide Start Date.');
            return;
        }

        ev.startDate = startDate;
        ev.endDate = endDate || startDate;
        ev.date = startDate; // For backward compatibility
        ev.start = startTime;
        ev.end = endTime;

        // Add day timelines if different times is checked
        if (document.getElementById('evDifferentTimes').checked && dayTimelines.length > 0) {
            ev.dayTimelines = dayTimelines.map(t => ({
                date: t.date,
                startTime: t.startTime,
                endTime: t.endTime
            }));
        }
    }

    // Save to localStorage
    let items = [];
    try {
        items = JSON.parse(localStorage.getItem('events') || '[]');
    } catch(e) {
        items = [];
    }
    
    items.unshift(ev);
    localStorage.setItem('events', JSON.stringify(items));
    
    alert('Event created');
    window.location.href = '/admin/event-planner';
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
