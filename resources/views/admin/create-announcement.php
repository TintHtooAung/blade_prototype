<?php
$pageTitle = 'Smart Campus Nova Hub - Create New Announcement';
$pageIcon = 'fas fa-plus';
$pageHeading = 'Create New Announcement';
$activePage = 'announcements';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/announcements" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Create New Announcement
    </a>
</div>

<!-- Create Announcement Form -->
<div class="create-announcement-form">
    <form class="announcement-form">
        <!-- Content Section -->
        <div class="form-section">
            <h3 class="section-title">Content</h3>
            <div class="content-editor">
                <div class="editor-tabs">
                    <button type="button" class="editor-tab active" data-editor="simple">Simple</button>
                    <button type="button" class="editor-tab" data-editor="rich">Rich Editor</button>
                </div>
                <div class="editor-content">
                    <input type="text" id="annTitle" class="form-input" placeholder="Enter title" style="margin-bottom:8px;">
                    <textarea 
                        id="annMessage"
                        class="announcement-textarea" 
                        placeholder="Enter announcement message..."
                        rows="8"
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- Priority Section -->
        <div class="form-section">
            <h3 class="section-title">Priority</h3>
            <div class="form-group">
                <select id="annPriority" class="form-select">
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
        </div>

        <!-- Location Section -->
        <div class="form-section">
            <h3 class="section-title">Location</h3>
            <div class="form-group">
                <input type="text" id="annLocation" class="form-input" placeholder="e.g., Main Campus, Virtual, City Hall">
            </div>
        </div>

        <!-- Publish Schedule Section -->
        <div class="form-section">
            <h3 class="section-title">Publishing Options</h3>
            <div class="publish-mode-toggle">
                <label class="publish-option">
                    <input type="radio" name="publishMode" value="now" id="publishNow" checked>
                    <div class="publish-option-card">
                        <i class="fas fa-paper-plane"></i>
                        <span>Publish Now</span>
                        <small>Announcement will be published immediately</small>
                    </div>
                </label>
                <label class="publish-option">
                    <input type="radio" name="publishMode" value="schedule" id="publishSchedule">
                    <div class="publish-option-card">
                        <i class="fas fa-clock"></i>
                        <span>Schedule</span>
                        <small>Set a date and time to publish later</small>
                    </div>
                </label>
            </div>
            <div id="scheduleFields" class="schedule-fields" style="display: none; margin-top: 16px; padding: 16px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                <div class="form-row" style="margin: 0;">
                    <div class="form-group" style="flex: 1; margin-bottom: 0;">
                        <label for="annPublishDate" style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Publish Date *</label>
                        <input type="date" id="annPublishDate" class="form-input" required>
                    </div>
                    <div class="form-group" style="flex: 1; margin-bottom: 0;">
                        <label for="annPublishTime" style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Publish Time *</label>
                        <input type="time" id="annPublishTime" class="form-input" required>
                    </div>
                </div>
                <p style="margin: 12px 0 0; color: #6b7280; font-size: 13px; line-height: 1.5;">
                    <i class="fas fa-info-circle"></i> Scheduled announcements will be saved as drafts until the publish time.
                </p>
            </div>
        </div>

        <!-- Attach Event Section -->
        <div class="form-section">
            <h3 class="section-title">Attach Event (Optional)</h3>
            <div class="form-group">
                <select id="annLinkedEvent" class="form-select">
                    <option value="">No event linked</option>
                </select>
                <p style="margin: 6px 0 0; color: #6b7280; font-size: 13px;">Attach an upcoming event to automatically remind its participants.</p>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.location.href='/admin/announcements'">Cancel</button>
            <div class="form-action-buttons">
                <button type="button" id="saveDraftBtn" class="btn-draft" style="display: none;">
                    <i class="fas fa-save"></i>
                    Save Draft
                </button>
                <button type="submit" id="publishBtn" class="btn-send">
                    <i class="fas fa-paper-plane"></i>
                    <span id="publishBtnText">Publish Now</span>
                </button>
            </div>
        </div>
    </form>
</div>

<style>
.publish-mode-toggle {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
}

.publish-option {
    cursor: pointer;
    margin: 0;
}

.publish-option input[type="radio"] {
    display: none;
}

.publish-option-card {
    padding: 16px;
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

.publish-option-card i {
    font-size: 24px;
    color: #6b7280;
    margin-bottom: 4px;
}

.publish-option-card span {
    font-weight: 600;
    color: #1f2937;
    font-size: 15px;
}

.publish-option-card small {
    color: #6b7280;
    font-size: 12px;
    display: block;
}

.publish-option input[type="radio"]:checked + .publish-option-card {
    border-color: #3b82f6;
    background: #eff6ff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.publish-option input[type="radio"]:checked + .publish-option-card i {
    color: #3b82f6;
}

.publish-option:hover .publish-option-card {
    border-color: #3b82f6;
    background: #f9fafb;
}

.schedule-fields {
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-action-buttons {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.form-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 24px;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.btn-draft {
    padding: 10px 20px;
    background: #f3f4f6;
    color: #374151;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-draft:hover {
    background: #e5e7eb;
    border-color: #9ca3af;
}

.btn-draft i {
    font-size: 14px;
}

/* Ensure location input and event attach select have the same size */
#annLocation,
#annLinkedEvent {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 16px;
    box-sizing: border-box;
    transition: all 0.3s ease;
}

#annLocation:focus,
#annLinkedEvent:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

@media (max-width: 768px) {
    .publish-mode-toggle {
        grid-template-columns: 1fr;
    }
    
    .form-action-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-draft,
    .btn-send {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
// Editor Tab Switching & Form Handling
function getSavedEvents() {
    try {
        const primary = localStorage.getItem('adminEvents');
        const fallback = localStorage.getItem('events');
        const eventsRaw = primary && primary !== 'undefined' ? primary : (fallback || '[]');
        const events = JSON.parse(eventsRaw);
        return events.map((event, index) => ({
            ...event,
            id: event.id || `EVT${index + 1}`
        }));
    } catch (error) {
        console.warn('Unable to load events for announcement linking', error);
        return [];
    }
}

function populateLinkedEvents(selectEl) {
    if (!selectEl) return;
    selectEl.innerHTML = '';
    
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'No event linked';
    selectEl.appendChild(defaultOption);
    
    const events = getSavedEvents();
    if (!events.length) {
        const emptyOption = document.createElement('option');
        emptyOption.value = '';
        emptyOption.textContent = 'No events available';
        emptyOption.disabled = true;
        selectEl.appendChild(emptyOption);
        selectEl.value = '';
        return;
    }
    
    events.forEach(event => {
        const option = document.createElement('option');
        option.value = event.id;
        option.textContent = `${event.title || 'Untitled Event'} • ${event.date || 'TBD'}`;
        option.dataset.event = JSON.stringify(event);
        selectEl.appendChild(option);
    });
}

function getSelectedLinkedEvent(selectEl) {
    if (!selectEl) return null;
    const selected = selectEl.selectedOptions[0];
    if (selected && selected.dataset.event) {
        try {
            return JSON.parse(selected.dataset.event);
        } catch (error) {
            console.warn('Unable to parse linked event', error);
        }
    }
    return null;
}

function composePublishDateTime(date, time) {
    if (!date && !time) return '';
    if (!time) return date;
    if (!date) {
        const today = new Date().toISOString().split('T')[0];
        return `${today} ${time}`;
    }
    return `${date} ${time}`;
}

function toggleScheduleFields() {
    const publishNow = document.getElementById('publishNow');
    const scheduleFields = document.getElementById('scheduleFields');
    const saveDraftBtn = document.getElementById('saveDraftBtn');
    const publishBtnText = document.getElementById('publishBtnText');
    const publishDate = document.getElementById('annPublishDate');
    const publishTime = document.getElementById('annPublishTime');
    
    if (publishNow.checked) {
        scheduleFields.style.display = 'none';
        saveDraftBtn.style.display = 'none';
        publishBtnText.textContent = 'Publish Now';
        publishDate.removeAttribute('required');
        publishTime.removeAttribute('required');
        publishDate.value = '';
        publishTime.value = '';
    } else {
        scheduleFields.style.display = 'block';
        saveDraftBtn.style.display = 'inline-flex';
        publishBtnText.textContent = 'Schedule & Publish';
        publishDate.setAttribute('required', 'required');
        publishTime.setAttribute('required', 'required');
    }
}

function saveAnnouncement(isDraft = false) {
    const title = (document.getElementById('annTitle').value||'').trim();
    const message = (document.getElementById('annMessage').value||'').trim();
    const priority = document.getElementById('annPriority').value;
    const location = (document.getElementById('annLocation').value||'').trim() || 'Campus-wide';
    const publishDate = document.getElementById('annPublishDate').value;
    const publishTime = document.getElementById('annPublishTime').value;
    const linkedEvent = getSelectedLinkedEvent(document.getElementById('annLinkedEvent'));
    const publishMode = document.querySelector('input[name="publishMode"]:checked').value;
    
    if (!title || !message) {
        alert('Please enter a title and message.');
        return;
    }
    
    let scheduleStamp = '';
    let status = 'published';
    
    if (publishMode === 'schedule') {
        if (!publishDate || !publishTime) {
            if (!isDraft) {
                alert('Please select both date and time for scheduled publishing.');
                return;
            }
        } else {
            scheduleStamp = composePublishDateTime(publishDate, publishTime);
            status = isDraft ? 'draft' : 'scheduled';
        }
    } else {
        scheduleStamp = new Date().toISOString().slice(0,16).replace('T', ' ');
        status = 'published';
    }
    
    let items = [];
    try { 
        items = JSON.parse(localStorage.getItem('announcements')||'[]'); 
    } catch(e) { 
        items = []; 
    }
    
    items.unshift({ 
        id: 'ANN' + Date.now(),
        title, 
        message, 
        priority, 
        location,
        publishDate: publishDate || '',
        publishTime: publishTime || '',
        publishDateTime: scheduleStamp,
        date: scheduleStamp,
        linkedEvent,
        status: status,
        createdAt: new Date().toISOString()
    });
    
    localStorage.setItem('announcements', JSON.stringify(items));
    
    if (isDraft) {
        alert('Announcement saved as draft.');
    } else {
        alert(publishMode === 'schedule' ? 'Announcement scheduled successfully.' : 'Announcement published successfully.');
    }
    
    window.location.href = '/admin/announcements';
}

document.addEventListener('DOMContentLoaded', function() {
    const editorTabs = document.querySelectorAll('.editor-tab');
    editorTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            editorTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    const linkedEventSelect = document.getElementById('annLinkedEvent');
    populateLinkedEvents(linkedEventSelect);

    // Publish mode toggle
    const publishModeRadios = document.querySelectorAll('input[name="publishMode"]');
    publishModeRadios.forEach(radio => {
        radio.addEventListener('change', toggleScheduleFields);
    });
    
    // Initial state
    toggleScheduleFields();

    // Save draft button
    document.getElementById('saveDraftBtn').addEventListener('click', function(e) {
        e.preventDefault();
        saveAnnouncement(true);
    });

    // Form submit
    const form = document.querySelector('.announcement-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        saveAnnouncement(false);
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
