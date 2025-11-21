<?php
$pageTitle = 'Smart Campus Nova Hub - Announcement Management';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcement Management';
$activePage = 'announcements';

$sampleAnnouncements = [
    [
        'id' => 'ANN001',
        'title' => 'Annual Science Fair 2024 - Call for Participation',
        'message' => 'We are excited to announce our Annual Science Fair 2024! This year\'s theme is "Innovation for Tomorrow".',
        'priority' => 'medium',
        'location' => 'Main, North',
        'publishDate' => '2024-01-08',
        'publishTime' => '08:00',
        'linkedEvent' => [
            'id' => 'EVT001',
            'title' => 'Annual Science Fair 2024',
            'date' => '2024-01-15',
            'start' => '09:00',
            'location' => 'Innovation Hall'
        ]
    ],
    [
        'id' => 'ANN002',
        'title' => 'Q1 Academic Performance Reports Available',
        'message' => 'Quarter 1 academic performance reports are now available. Parents can access them through the parent portal, and teachers should review class summaries.',
        'priority' => 'medium',
        'location' => 'Campus-wide',
        'publishDate' => '2024-01-07',
        'publishTime' => '10:00',
    ]
];

function formatAnnouncementSchedule($announcement)
{
    $date = $announcement['publishDate'] ?? '';
    $time = $announcement['publishTime'] ?? '';
    if ($date && $time) {
        return $date . ' ' . $time;
    }
    if ($date) {
        return $date;
    }
    if ($time) {
        return date('Y-m-d') . ' ' . $time;
    }
    return 'Immediate';
}

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>

<!-- Page Header with Add Button -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn" onclick="openCreateAnnouncementModal()">
            <i class="fas fa-plus"></i> Add Announcement
        </button>
    </div>
</div>

<!-- Announcements List -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Announcements</h3>
    </div>

    <div class="announcements-wrapper">
        <div id="annFeed" class="announcements-list">
            <?php if (!empty($sampleAnnouncements)): ?>
                <?php foreach ($sampleAnnouncements as $announcement): ?>
                    <div class="announcement-card">
                        <div class="announcement-header">
                            <div class="announcement-title">
                                <h4><?php echo htmlspecialchars($announcement['title']); ?></h4>
                                <p><?php echo htmlspecialchars($announcement['message']); ?></p>
                            </div>
                        </div>
                        <div class="announcement-tags">
                            <span class="tag <?php echo strtolower(htmlspecialchars($announcement['priority'])); ?>">
                                <?php echo htmlspecialchars(ucwords($announcement['priority'])); ?>
                            </span>
                            <?php if (!empty($announcement['linkedEvent'])): ?>
                                <span class="tag event">Event Linked</span>
                            <?php endif; ?>
                        </div>
                        <div class="announcement-footer">
                            <div class="footer-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo htmlspecialchars($announcement['location'] ?? 'Campus-wide'); ?></span>
                            </div>
                            <div class="footer-item">
                                <i class="fas fa-clock"></i>
                                <span><?php echo htmlspecialchars(formatAnnouncementSchedule($announcement)); ?></span>
                            </div>
                            <?php if (!empty($announcement['linkedEvent'])): ?>
                                <div class="footer-item">
                                    <i class="fas fa-calendar-check"></i>
                                    <span><?php echo htmlspecialchars($announcement['linkedEvent']['title']); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div id="annFeedEmpty" class="announcements-empty" style="display:none;">
            <div class="empty-icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h4>No announcements yet</h4>
            <p>Create a new announcement to keep everyone informed.</p>
            <button class="simple-btn" onclick="openCreateAnnouncementModal()">
                <i class="fas fa-plus"></i> Create Announcement
            </button>
        </div>
    </div>
</div>

<!-- Create Announcement Modal -->
<div id="createAnnouncementModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 700px; max-height: 90vh; overflow-y: auto;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-plus"></i> Create New Announcement</h4>
            <button class="icon-btn" onclick="closeCreateAnnouncementModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Announcement Title *</label>
                        <input type="text" class="form-input" id="announcementTitle" placeholder="e.g., Annual Science Fair 2024">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Priority *</label>
                        <select class="form-select" id="announcementPriority">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Message *</label>
                        <textarea class="form-input" id="announcementMessage" rows="6" placeholder="Enter announcement message..."></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Location</label>
                        <input type="text" class="form-input" id="announcementLocation" placeholder="e.g., Main Campus, Virtual, City Hall">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Attach Event (Optional)</label>
                        <select class="form-select" id="announcementLinkedEvent">
                            <option value="">No event linked</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 16px;">
                    <div class="form-group" style="flex:1; width: 100%;">
                        <label style="margin-bottom: 12px; display: block; font-weight: 600; color: #374151;">Publishing Options</label>
                        <div class="publish-mode-toggle">
                            <label class="publish-option">
                                <input type="radio" name="modalPublishMode" value="now" id="modalPublishNow" checked>
                                <div class="publish-option-card">
                                    <i class="fas fa-paper-plane"></i>
                                    <span>Publish Now</span>
                                    <small>Publish immediately</small>
                                </div>
                            </label>
                            <label class="publish-option">
                                <input type="radio" name="modalPublishMode" value="schedule" id="modalPublishSchedule">
                                <div class="publish-option-card">
                                    <i class="fas fa-clock"></i>
                                    <span>Schedule</span>
                                    <small>Set date & time</small>
                                </div>
                            </label>
                        </div>
                        <div id="modalScheduleFields" class="schedule-fields" style="display: none; margin-top: 16px; padding: 16px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                            <div class="form-row" style="margin: 0;">
                                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                                    <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Publish Date *</label>
                                    <input type="date" class="form-input" id="announcementPublishDate" required>
                                </div>
                                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                                    <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Publish Time *</label>
                                    <input type="time" class="form-input" id="announcementPublishTime" required>
                                </div>
                            </div>
                            <p style="margin: 12px 0 0; color: #6b7280; font-size: 13px; line-height: 1.5;">
                                <i class="fas fa-info-circle"></i> Scheduled announcements will be saved as drafts until the publish time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions" style="display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;">
            <button class="simple-btn secondary" onclick="closeCreateAnnouncementModal()" style="margin: 0;">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                <button class="simple-btn secondary" id="modalSaveDraftBtn" onclick="saveNewAnnouncementAsDraft()" style="display: none; margin: 0;">
                    <i class="fas fa-save"></i> Save Draft
                </button>
                <button class="simple-btn primary" onclick="saveNewAnnouncement()" style="margin: 0;">
                    <i class="fas fa-paper-plane"></i> <span id="modalPublishBtnText">Publish Now</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Announcement Modal -->
<div id="editAnnouncementModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 700px; max-height: 90vh; overflow-y: auto;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-edit"></i> Edit Announcement</h4>
            <button class="icon-btn" onclick="closeEditModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <input type="hidden" id="editAnnouncementId">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Announcement Title</label>
                        <input type="text" class="form-input" id="editAnnouncementTitle" placeholder="e.g., Annual Science Fair 2024">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Priority</label>
                        <select class="form-select" id="editAnnouncementPriority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Message</label>
                        <textarea class="form-input" id="editAnnouncementMessage" rows="4" placeholder="Enter announcement message..."></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Location</label>
                        <input type="text" class="form-input" id="editAnnouncementLocation" placeholder="e.g., Main Campus, Virtual, City Hall">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Attach Event (Optional)</label>
                        <select class="form-select" id="editAnnouncementLinkedEvent">
                            <option value="">No event linked</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 16px;">
                    <div class="form-group" style="flex:1; width: 100%;">
                        <label style="margin-bottom: 12px; display: block; font-weight: 600; color: #374151;">Publishing Options</label>
                        <div class="publish-mode-toggle">
                            <label class="publish-option">
                                <input type="radio" name="editPublishMode" value="now" id="editPublishNow">
                                <div class="publish-option-card">
                                    <i class="fas fa-paper-plane"></i>
                                    <span>Publish Now</span>
                                    <small>Publish immediately</small>
                                </div>
                            </label>
                            <label class="publish-option">
                                <input type="radio" name="editPublishMode" value="schedule" id="editPublishSchedule">
                                <div class="publish-option-card">
                                    <i class="fas fa-clock"></i>
                                    <span>Schedule</span>
                                    <small>Set date & time</small>
                                </div>
                            </label>
                        </div>
                        <div id="editScheduleFields" class="schedule-fields" style="display: none; margin-top: 16px; padding: 16px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                            <div class="form-row" style="margin: 0;">
                                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                                    <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Publish Date *</label>
                                    <input type="date" class="form-input" id="editAnnouncementPublishDate" required>
                                </div>
                                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                                    <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151;">Publish Time *</label>
                                    <input type="time" class="form-input" id="editAnnouncementPublishTime" required>
                                </div>
                            </div>
                            <p style="margin: 12px 0 0; color: #6b7280; font-size: 13px; line-height: 1.5;">
                                <i class="fas fa-info-circle"></i> Scheduled announcements will be saved as drafts until the publish time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions" style="display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;">
            <button class="simple-btn secondary" onclick="closeEditModal()" style="margin: 0;">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                <button class="simple-btn secondary" id="editSaveDraftBtn" onclick="saveAnnouncementAsDraft()" style="display: none; margin: 0;">
                    <i class="fas fa-save"></i> Save Draft
                </button>
                <button class="simple-btn primary" onclick="saveAnnouncement()" style="margin: 0;">
                    <i class="fas fa-check"></i> <span id="editPublishBtnText">Save Changes</span>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.announcements-wrapper {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.announcements-empty {
    border: 1px dashed #e5e7eb;
    border-radius: 12px;
    padding: 32px;
    text-align: center;
    background: #f9fafb;
    color: #4b5563;
}

.announcements-empty .empty-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: #eef2ff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #4f46e5;
    font-size: 28px;
    margin-bottom: 12px;
}

.publish-mode-toggle {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 0;
    width: 100%;
}

.publish-option {
    cursor: pointer;
    margin: 0;
}

.publish-option input[type="radio"] {
    display: none;
}

.publish-option-card {
    padding: 12px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    background: #ffffff;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}

.publish-option-card i {
    font-size: 20px;
    color: #6b7280;
    margin-bottom: 2px;
}

.publish-option-card span {
    font-weight: 600;
    color: #1f2937;
    font-size: 14px;
}

.publish-option-card small {
    color: #6b7280;
    font-size: 11px;
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

.tag.draft {
    background: #fef3c7;
    color: #92400e;
}

.tag.scheduled {
    background: #dbeafe;
    color: #1e40af;
}

.tag.published {
    background: #d1fae5;
    color: #065f46;
}

.confirm-dialog-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 16px 20px;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
}

.confirm-dialog-actions .simple-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.confirm-dialog-actions .simple-btn.secondary {
    background: #ffffff;
    color: #374151;
    border: 1px solid #d1d5db;
}

.confirm-dialog-actions .simple-btn.secondary:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

.confirm-dialog-actions .simple-btn.primary {
    background: #3b82f6;
    color: #ffffff;
    border: 1px solid #3b82f6;
}

.confirm-dialog-actions .simple-btn.primary:hover {
    background: #2563eb;
    border-color: #2563eb;
}

@media (max-width: 768px) {
    .publish-mode-toggle {
        grid-template-columns: 1fr;
    }
    
    .confirm-dialog-actions {
        flex-direction: column;
    }
    
    .confirm-dialog-actions > div {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .confirm-dialog-actions .simple-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
const SAMPLE_ANNOUNCEMENTS = <?php echo json_encode($sampleAnnouncements); ?>;

function escapeHtml(str){
    return String(str || '').replace(/[&<>"]/g, s => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[s]));
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

function formatScheduleLabel(date, time, fallback) {
    const composed = composePublishDateTime(date, time) || fallback;
    return composed || 'Immediate';
}

function getScheduleValue(announcement) {
    return announcement.publishDateTime || composePublishDateTime(announcement.publishDate, announcement.publishTime) || announcement.date || '';
}

function getStoredAnnouncements() {
    try {
        return JSON.parse(localStorage.getItem('announcements') || '[]');
    } catch (error) {
        console.warn('Unable to parse announcements from storage', error);
        return [];
    }
}

function saveAnnouncements(items) {
    localStorage.setItem('announcements', JSON.stringify(items));
}

function getAllAnnouncements() {
    const stored = getStoredAnnouncements();
    return [...stored, ...SAMPLE_ANNOUNCEMENTS];
}

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
        console.warn('Unable to load events for linking', error);
        return [];
    }
}

function isSameEvent(a, b) {
    if (!a || !b) return false;
    if (a.id && b.id) return a.id === b.id;
    return (a.title || '') === (b.title || '') && (a.date || '') === (b.date || '');
}

function populateLinkedEventSelect(selectEl, selectedEvent = null) {
    if (!selectEl) return;
    selectEl.innerHTML = '';
    const placeholder = document.createElement('option');
    placeholder.value = '';
    placeholder.textContent = 'No event linked';
    selectEl.appendChild(placeholder);

    const events = getSavedEvents();
    let hasMatch = false;

    events.forEach(event => {
        const option = document.createElement('option');
        option.value = event.id;
        option.textContent = `${event.title || 'Untitled Event'} • ${event.date || 'TBD'}`;
        option.dataset.event = JSON.stringify(event);
        if (selectedEvent && isSameEvent(event, selectedEvent)) {
            option.selected = true;
            hasMatch = true;
        }
        selectEl.appendChild(option);
    });

    if (selectedEvent && !hasMatch) {
        const customOption = document.createElement('option');
        customOption.value = '__linked';
        customOption.textContent = `${selectedEvent.title || 'Linked Event'} • ${selectedEvent.date || 'TBD'} (archived)`;
        customOption.dataset.event = JSON.stringify(selectedEvent);
        customOption.selected = true;
        selectEl.appendChild(customOption);
    }
}

function getLinkedEventFromSelect(selectEl) {
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

function toggleModalScheduleFields() {
    const publishNow = document.getElementById('modalPublishNow');
    const scheduleFields = document.getElementById('modalScheduleFields');
    const saveDraftBtn = document.getElementById('modalSaveDraftBtn');
    const publishBtnText = document.getElementById('modalPublishBtnText');
    const publishDate = document.getElementById('announcementPublishDate');
    const publishTime = document.getElementById('announcementPublishTime');
    
    if (!publishNow || !scheduleFields) return;
    
    if (publishNow.checked) {
        scheduleFields.style.display = 'none';
        if (saveDraftBtn) saveDraftBtn.style.display = 'none';
        if (publishBtnText) publishBtnText.textContent = 'Publish Now';
        if (publishDate) {
            publishDate.removeAttribute('required');
            publishDate.value = '';
        }
        if (publishTime) {
            publishTime.removeAttribute('required');
            publishTime.value = '';
        }
    } else {
        scheduleFields.style.display = 'block';
        if (saveDraftBtn) saveDraftBtn.style.display = 'inline-flex';
        if (publishBtnText) publishBtnText.textContent = 'Schedule & Publish';
        if (publishDate) publishDate.setAttribute('required', 'required');
        if (publishTime) publishTime.setAttribute('required', 'required');
    }
}

function clearCreateForm() {
    document.getElementById('announcementTitle').value = '';
    document.getElementById('announcementMessage').value = '';
    document.getElementById('announcementPriority').value = 'medium';
    document.getElementById('announcementLocation').value = '';
    document.getElementById('announcementPublishDate').value = '';
    document.getElementById('announcementPublishTime').value = '';
    document.getElementById('modalPublishNow').checked = true;
    toggleModalScheduleFields();
    const linkedSelect = document.getElementById('announcementLinkedEvent');
    if (linkedSelect) {
        linkedSelect.innerHTML = '<option value="">No event linked</option>';
    }
}

function openCreateAnnouncementModal() {
    clearCreateForm();
    populateLinkedEventSelect(document.getElementById('announcementLinkedEvent'));
    
    // Setup publish mode toggle
    const publishModeRadios = document.querySelectorAll('input[name="modalPublishMode"]');
    publishModeRadios.forEach(radio => {
        radio.removeEventListener('change', toggleModalScheduleFields);
        radio.addEventListener('change', toggleModalScheduleFields);
    });
    toggleModalScheduleFields();
    
    document.getElementById('createAnnouncementModal').style.display = 'flex';
}

function closeCreateAnnouncementModal() {
    document.getElementById('createAnnouncementModal').style.display = 'none';
    clearCreateForm();
}

function saveNewAnnouncement(isDraft = false) {
    const title = document.getElementById('announcementTitle').value.trim();
    const message = document.getElementById('announcementMessage').value.trim();
    const priority = document.getElementById('announcementPriority').value;
    const location = (document.getElementById('announcementLocation').value || '').trim() || 'Campus-wide';
    const publishDate = document.getElementById('announcementPublishDate').value;
    const publishTime = document.getElementById('announcementPublishTime').value;
    const linkedEvent = getLinkedEventFromSelect(document.getElementById('announcementLinkedEvent'));
    const publishMode = document.querySelector('input[name="modalPublishMode"]:checked').value;

    if (!title || !message) {
        if (typeof showToast === 'function') {
            showToast('Please fill in title and message', 'warning');
        } else {
            alert('Please fill in title and message');
        }
        return;
    }

    let schedule = '';
    let status = 'published';
    
    if (publishMode === 'schedule') {
        if (!publishDate || !publishTime) {
            if (!isDraft) {
                if (typeof showToast === 'function') {
                    showToast('Please select both date and time for scheduled publishing', 'warning');
                } else {
                    alert('Please select both date and time for scheduled publishing');
                }
                return;
            }
        } else {
            schedule = composePublishDateTime(publishDate, publishTime);
            status = isDraft ? 'draft' : 'scheduled';
        }
    } else {
        schedule = new Date().toISOString().slice(0,16).replace('T', ' ');
        status = 'published';
    }

    const newAnnouncement = {
        id: 'ANN' + Date.now(),
        title,
        message,
        priority,
        location,
        publishDate: publishDate || '',
        publishTime: publishTime || '',
        publishDateTime: schedule,
        date: schedule,
        linkedEvent,
        status: status,
        createdAt: new Date().toISOString()
    };

    const items = getStoredAnnouncements();
    items.unshift(newAnnouncement);
    saveAnnouncements(items);

    if (typeof showToast === 'function') {
        if (isDraft) {
            showToast(`Announcement "${title}" saved as draft`, 'success');
        } else {
            showToast(`Announcement "${title}" ${publishMode === 'schedule' ? 'scheduled' : 'published'} successfully`, 'success');
        }
    } else {
        if (isDraft) {
            alert(`Announcement "${title}" saved as draft`);
        } else {
            alert(`Announcement "${title}" ${publishMode === 'schedule' ? 'scheduled' : 'published'} successfully`);
        }
    }

    closeCreateAnnouncementModal();
    displayAnnouncements();
}

function saveNewAnnouncementAsDraft() {
    saveNewAnnouncement(true);
}

function buildAnnouncementCard(announcement) {
    const div = document.createElement('div');
    div.className = 'announcement-card';
    div.style.cursor = 'pointer';
    div.onclick = function(e) {
        if (e.target.closest('.announcement-actions')) {
            return;
        }
        window.location.href = `/admin/announcement-details?id=${encodeURIComponent(announcement.id || '')}`;
    };

    const priorityClass = escapeHtml((announcement.priority || '').toLowerCase());
    const priorityLabel = escapeHtml(announcement.priority || '');
    const locationLabel = escapeHtml(announcement.location || 'Campus-wide');
    const scheduleLabel = escapeHtml(formatScheduleLabel(announcement.publishDate, announcement.publishTime, announcement.publishDateTime || announcement.date));
    const linkedEventLabel = announcement.linkedEvent ? escapeHtml(announcement.linkedEvent.title || 'Linked Event') : '';
    const status = announcement.status || 'published';
    const statusLabel = status === 'draft' ? 'Draft' : (status === 'scheduled' ? 'Scheduled' : 'Published');
    const statusClass = status === 'draft' ? 'draft' : (status === 'scheduled' ? 'scheduled' : 'published');

    div.innerHTML = `
        <div class="announcement-header">
            <div class="announcement-title">
                <h4>${escapeHtml(announcement.title || '')}</h4>
                <p>${escapeHtml(announcement.message || '')}</p>
            </div>
            <div class="announcement-actions">
                <button class="action-icon edit" title="Edit" onclick="event.stopPropagation(); openEditModal('${announcement.id}')"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete" onclick="event.stopPropagation(); confirmDelete('${announcement.id}')"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <div class="announcement-tags">
            <span class="tag ${priorityClass}">${priorityLabel}</span>
            <span class="tag ${statusClass}">${statusLabel}</span>
            ${announcement.linkedEvent ? '<span class="tag event">Event Linked</span>' : ''}
        </div>
        <div class="announcement-footer">
            <div class="footer-item"><i class="fas fa-map-marker-alt"></i><span>${locationLabel}</span></div>
            <div class="footer-item"><i class="fas fa-clock"></i><span>${scheduleLabel}</span></div>
            ${announcement.linkedEvent ? `<div class="footer-item"><i class="fas fa-calendar-check"></i><span>${linkedEventLabel}</span></div>` : ''}
        </div>
    `;
    return div;
}

function displayAnnouncements() {
    const feed = document.getElementById('annFeed');
    const emptyState = document.getElementById('annFeedEmpty');
    if (!feed) return;
    feed.innerHTML = '';
    const allAnnouncements = getAllAnnouncements();
    allAnnouncements.sort((a, b) => new Date(getScheduleValue(b) || 0) - new Date(getScheduleValue(a) || 0));
    allAnnouncements.forEach(announcement => feed.appendChild(buildAnnouncementCard(announcement)));
    if (emptyState) {
        emptyState.style.display = allAnnouncements.length ? 'none' : 'block';
    }
}

function toggleEditScheduleFields() {
    const publishNow = document.getElementById('editPublishNow');
    const scheduleFields = document.getElementById('editScheduleFields');
    const saveDraftBtn = document.getElementById('editSaveDraftBtn');
    const publishBtnText = document.getElementById('editPublishBtnText');
    const publishDate = document.getElementById('editAnnouncementPublishDate');
    const publishTime = document.getElementById('editAnnouncementPublishTime');
    
    if (!publishNow || !scheduleFields) return;
    
    if (publishNow.checked) {
        scheduleFields.style.display = 'none';
        if (saveDraftBtn) saveDraftBtn.style.display = 'none';
        if (publishBtnText) publishBtnText.textContent = 'Save Changes';
        if (publishDate) publishDate.removeAttribute('required');
        if (publishTime) publishTime.removeAttribute('required');
    } else {
        scheduleFields.style.display = 'block';
        if (saveDraftBtn) saveDraftBtn.style.display = 'inline-flex';
        if (publishBtnText) publishBtnText.textContent = 'Schedule & Save';
        if (publishDate) publishDate.setAttribute('required', 'required');
        if (publishTime) publishTime.setAttribute('required', 'required');
    }
}

function openEditModal(announcementId) {
    const announcement = getAllAnnouncements().find(a => a.id === announcementId);
    if (!announcement) return;

    document.getElementById('editAnnouncementId').value = announcement.id;
    document.getElementById('editAnnouncementTitle').value = announcement.title || '';
    document.getElementById('editAnnouncementMessage').value = announcement.message || '';
    document.getElementById('editAnnouncementPriority').value = announcement.priority || 'medium';
    document.getElementById('editAnnouncementLocation').value = announcement.location || 'Campus-wide';
    
    // Load schedule data
    const publishDate = announcement.publishDate || '';
    const publishTime = announcement.publishTime || '';
    document.getElementById('editAnnouncementPublishDate').value = publishDate;
    document.getElementById('editAnnouncementPublishTime').value = publishTime;
    
    populateLinkedEventSelect(document.getElementById('editAnnouncementLinkedEvent'), announcement.linkedEvent || null);

    // Set publish mode based on existing schedule or status
    const status = announcement.status || 'published';
    const hasSchedule = (publishDate && publishTime) || status === 'draft' || status === 'scheduled';
    
    if (hasSchedule) {
        document.getElementById('editPublishSchedule').checked = true;
        document.getElementById('editPublishNow').checked = false;
    } else {
        document.getElementById('editPublishNow').checked = true;
        document.getElementById('editPublishSchedule').checked = false;
    }
    
    // Setup publish mode toggle
    const publishModeRadios = document.querySelectorAll('input[name="editPublishMode"]');
    publishModeRadios.forEach(radio => {
        radio.removeEventListener('change', toggleEditScheduleFields);
        radio.addEventListener('change', toggleEditScheduleFields);
    });
    
    // Toggle schedule fields AFTER setting radio buttons and loading data
    toggleEditScheduleFields();

    document.getElementById('editAnnouncementModal').style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editAnnouncementModal').style.display = 'none';
}

function saveAnnouncement(isDraft = false) {
    const id = document.getElementById('editAnnouncementId').value;
    const title = document.getElementById('editAnnouncementTitle').value.trim();
    const message = document.getElementById('editAnnouncementMessage').value.trim();
    const priority = document.getElementById('editAnnouncementPriority').value;
    const location = (document.getElementById('editAnnouncementLocation').value || '').trim() || 'Campus-wide';
    const publishDate = document.getElementById('editAnnouncementPublishDate').value;
    const publishTime = document.getElementById('editAnnouncementPublishTime').value;
    const linkedEvent = getLinkedEventFromSelect(document.getElementById('editAnnouncementLinkedEvent'));
    const publishMode = document.querySelector('input[name="editPublishMode"]:checked').value;

    if (!title || !message) {
        if (typeof showToast === 'function') {
            showToast('Please fill in title and message', 'warning');
        } else {
            alert('Please fill in title and message');
        }
        return;
    }

    const announcements = getStoredAnnouncements();
    const index = announcements.findIndex(a => a.id === id);
    if (index === -1) {
        if (typeof showToast === 'function') {
            showToast('Only custom announcements can be edited', 'warning');
        } else {
            alert('Only custom announcements can be edited');
        }
        return;
    }

    let schedule = '';
    let status = 'published';
    
    if (publishMode === 'schedule') {
        if (!publishDate || !publishTime) {
            if (!isDraft) {
                if (typeof showToast === 'function') {
                    showToast('Please select both date and time for scheduled publishing', 'warning');
                } else {
                    alert('Please select both date and time for scheduled publishing');
                }
                return;
            }
        } else {
            schedule = composePublishDateTime(publishDate, publishTime);
            status = isDraft ? 'draft' : 'scheduled';
        }
    } else {
        schedule = new Date().toISOString().slice(0,16).replace('T', ' ');
        status = 'published';
    }

    announcements[index] = {
        ...announcements[index],
        title,
        message,
        priority,
        location,
        publishDate: publishDate || '',
        publishTime: publishTime || '',
        publishDateTime: schedule || announcements[index].publishDateTime || announcements[index].date,
        date: schedule || announcements[index].publishDateTime || announcements[index].date,
        linkedEvent,
        status: status
    };
    saveAnnouncements(announcements);

    closeEditModal();
    if (typeof showToast === 'function') {
        if (isDraft) {
            showToast('Announcement saved as draft!', 'success');
        } else {
            showToast('Announcement updated successfully!', 'success');
        }
    }
    displayAnnouncements();
}

function saveAnnouncementAsDraft() {
    saveAnnouncement(true);
}

function confirmDelete(announcementId) {
    const isSample = announcementId.startsWith('ANN00');
    if (isSample) {
        if (typeof showToast === 'function') {
            showToast('Sample announcements cannot be deleted', 'warning');
        } else {
            alert('Sample announcements cannot be deleted');
        }
        return;
    }

    showConfirmDialog({
        title: 'Delete Announcement',
        message: 'Are you sure you want to delete this announcement? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            let announcements = getStoredAnnouncements();
            announcements = announcements.filter(a => a.id !== announcementId);
            saveAnnouncements(announcements);
            if (typeof showToast === 'function') {
                showToast('Announcement deleted successfully!', 'success');
            }
            displayAnnouncements();
        }
    });
}

// Modal wiring + initial render
document.addEventListener('DOMContentLoaded', function() {
    const createModal = document.getElementById('createAnnouncementModal');
    if (createModal) {
        createModal.addEventListener('click', function(e) {
            if (e.target === createModal) {
                closeCreateAnnouncementModal();
            }
        });
    }

    const editModal = document.getElementById('editAnnouncementModal');
    if (editModal) {
        editModal.addEventListener('click', function(e) {
            if (e.target === editModal) {
                closeEditModal();
            }
        });
    }

    displayAnnouncements();
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>