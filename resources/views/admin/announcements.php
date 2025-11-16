<?php
$pageTitle = 'Smart Campus Nova Hub - Announcement Management';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcement Management';
$activePage = 'announcements';

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

    <div id="annFeed" class="announcements-list"></div>
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
                        <label>Announcement Title *</label>
                        <input type="text" class="form-input" id="announcementTitle" placeholder="e.g., Annual Science Fair 2024">
                    </div>
                    <div class="form-group">
                        <label>Priority *</label>
                        <select class="form-select" id="announcementPriority">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Type *</label>
                        <select class="form-select" id="announcementType">
                            <option value="general" selected>General</option>
                            <option value="academic">Academic</option>
                            <option value="event">Event</option>
                            <option value="emergency">Emergency</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target Audience *</label>
                        <select class="form-select" id="announcementAudience">
                            <option value="All Users" selected>All Users</option>
                            <option value="Students">Students</option>
                            <option value="Teachers">Teachers</option>
                            <option value="Staff">Staff</option>
                            <option value="Parents">Parents</option>
                            <option value="Parents & Teachers">Parents & Teachers</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Message *</label>
                        <textarea class="form-input" id="announcementMessage" rows="6" placeholder="Enter announcement message..."></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Campuses</label>
                        <select class="form-select" id="announcementCampuses">
                            <option value="All" selected>All</option>
                            <option value="Main">Main</option>
                            <option value="North">North</option>
                            <option value="Main, North">Main, North</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Publish Date</label>
                        <input type="date" class="form-input" id="announcementDate">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeCreateAnnouncementModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveNewAnnouncement()">
                <i class="fas fa-paper-plane"></i> Publish Announcement
            </button>
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
                        <label>Announcement Title</label>
                        <input type="text" class="form-input" id="editAnnouncementTitle" placeholder="e.g., Annual Science Fair 2024">
                    </div>
                    <div class="form-group">
                        <label>Priority</label>
                        <select class="form-select" id="editAnnouncementPriority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-select" id="editAnnouncementType">
                            <option value="general">General</option>
                            <option value="academic">Academic</option>
                            <option value="event">Event</option>
                            <option value="emergency">Emergency</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target Audience</label>
                        <select class="form-select" id="editAnnouncementAudience">
                            <option value="All Users">All Users</option>
                            <option value="Students">Students</option>
                            <option value="Teachers">Teachers</option>
                            <option value="Staff">Staff</option>
                            <option value="Parents">Parents</option>
                            <option value="Parents & Teachers">Parents & Teachers</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Message</label>
                        <textarea class="form-input" id="editAnnouncementMessage" rows="4" placeholder="Enter announcement message..."></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Campuses</label>
                        <select class="form-select" id="editAnnouncementCampuses">
                            <option value="All">All</option>
                            <option value="Main">Main</option>
                            <option value="North">North</option>
                            <option value="Main, North">Main, North</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Publish Date</label>
                        <input type="date" class="form-input" id="editAnnouncementDate">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveAnnouncement()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<style>
.announcement-card.pinned {
    border-left: 4px solid #f59e0b;
    background: #fffbeb;
}

.action-icon.pin.active {
    color: #f59e0b;
    background: #fef3c7;
    border-color: #f59e0b;
}
</style>

<script>
// Create Announcement Modal Functions
function openCreateAnnouncementModal() {
    clearCreateForm();
    document.getElementById('createAnnouncementModal').style.display = 'flex';
}

function closeCreateAnnouncementModal() {
    document.getElementById('createAnnouncementModal').style.display = 'none';
    clearCreateForm();
}

function clearCreateForm() {
    document.getElementById('announcementTitle').value = '';
    document.getElementById('announcementMessage').value = '';
    document.getElementById('announcementPriority').value = 'medium';
    document.getElementById('announcementType').value = 'general';
    document.getElementById('announcementAudience').value = 'All Users';
    document.getElementById('announcementCampuses').value = 'All';
    document.getElementById('announcementDate').value = '';
}

function saveNewAnnouncement() {
    const title = document.getElementById('announcementTitle').value.trim();
    const message = document.getElementById('announcementMessage').value.trim();
    const priority = document.getElementById('announcementPriority').value;
    const type = document.getElementById('announcementType').value;
    const audience = document.getElementById('announcementAudience').value;
    const campuses = document.getElementById('announcementCampuses').value;
    const date = document.getElementById('announcementDate').value || new Date().toISOString().split('T')[0];
    
    if (!title || !message) {
        if (typeof showToast === 'function') {
            showToast('Please fill in title and message', 'warning');
        } else {
            alert('Please fill in title and message');
        }
        return;
    }
    
    const announcementData = {
        id: 'ANN' + Date.now(),
        title,
        message,
        priority,
        type,
        audience,
        campuses,
        date,
        pinned: false
    };
    
    // Save to localStorage
    let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
    announcements.unshift(announcementData);
    localStorage.setItem('announcements', JSON.stringify(announcements));
    
    if (typeof showToast === 'function') {
        showToast(`Announcement "${title}" created successfully`, 'success');
    } else {
        alert(`Announcement "${title}" created successfully`);
    }
    
    closeCreateAnnouncementModal();
    
    if (typeof displayAnnouncements === 'function') {
        displayAnnouncements();
    } else {
        location.reload();
    }
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const createModal = document.getElementById('createAnnouncementModal');
    if (createModal) {
        createModal.addEventListener('click', function(e) {
            if (e.target === createModal) {
                closeCreateAnnouncementModal();
            }
        });
    }
});

(function(){
    function parseDate(d){ return d ? new Date(d) : null; }
    function escapeHtml(str){
        return String(str).replace(/[&<>\"]/g, s=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;"}[s]));
    }
    function capitalize(s){ return s ? s.charAt(0).toUpperCase()+s.slice(1) : s; }

    // Sample announcements (baseline)
    const sample = [
        { id: 'ANN001', title: 'Annual Science Fair 2024 - Call for Participation', message: 'We are excited to announce our Annual Science Fair 2024! This year\'s theme is \"Innovation for Tomorrow\".', type: 'event', priority: 'medium', date: '2024-01-08', audience: 'All Users', campuses: 'Main, North' },
        { id: 'ANN002', title: 'Q1 Academic Performance Reports Available', message: 'Quarter 1 academic performance reports are now available. Parents can access them through the parent portal, and teachers should review class summaries.', type: 'academic', priority: 'medium', date: '2024-01-07', audience: 'Parents & Teachers', campuses: 'All' }
    ];

    // Load pinned status for sample announcements
    let pinnedAnnouncements = {};
    try { pinnedAnnouncements = JSON.parse(localStorage.getItem('pinnedAnnouncements')||'{}'); } catch(e) { pinnedAnnouncements = {}; }
    sample.forEach(a => {
        if (pinnedAnnouncements[a.id]) {
            a.pinned = true;
        }
    });

    // Merge with locally created announcements
    let stored = [];
    try { stored = JSON.parse(localStorage.getItem('announcements')||'[]'); } catch(e) { stored = []; }
    const data = [...stored, ...sample];

    const feed = document.getElementById('annFeed');

    function card(a){
        const div = document.createElement('div');
        div.className = 'announcement-card';
        if (a.pinned) {
            div.classList.add('pinned');
        }
        div.style.cursor = 'pointer';
        div.onclick = function(e) {
            // Don't navigate if clicking on action buttons
            if (e.target.closest('.announcement-actions')) {
                return;
            }
            window.location.href = `/admin/announcement-details?id=${encodeURIComponent(a.id||'')}`;
        };
        const pinClass = a.pinned ? 'active' : '';
        const pinTitle = a.pinned ? 'Unpin' : 'Pin';
        div.innerHTML = `
            <div class="announcement-header">
                <div class="announcement-title">
                    ${a.pinned ? '<i class="fas fa-thumbtack" style="color: #f59e0b; margin-right: 8px;"></i>' : ''}
                    <h4>${escapeHtml(a.title||'')}</h4>
                    <p>${escapeHtml(a.message||'')}</p>
                </div>
                <div class="announcement-actions">
                    <button class="action-icon pin ${pinClass}" title="${pinTitle}" onclick="event.stopPropagation(); togglePin('${a.id}')"><i class="fas fa-thumbtack"></i></button>
                    <button class="action-icon edit" title="Edit" onclick="event.stopPropagation(); openEditModal('${a.id}')"><i class="fas fa-edit"></i></button>
                    <button class="action-icon delete" title="Delete" onclick="event.stopPropagation(); confirmDelete('${a.id}')"><i class="fas fa-trash"></i></button>
                </div>
            </div>

            <div class="announcement-tags">
                <span class="tag ${escapeHtml((a.priority||'').toLowerCase())}">${escapeHtml(a.priority||'')}</span>
                <span class="tag ${escapeHtml((a.type||'').toLowerCase())}">${escapeHtml(a.type||'')}</span>
            </div>

            <div class="announcement-footer">
                <div class="footer-item"><i class="fas fa-users"></i><span>${escapeHtml(a.audience||'')}</span></div>
                <div class="footer-item"><i class="fas fa-map-marker-alt"></i><span>${escapeHtml(a.campuses||'')}</span></div>
                <div class="footer-item"><i class="fas fa-clock"></i><span>${escapeHtml(a.date||'')}</span></div>
            </div>
        `;
        return div;
    }

    function displayAnnouncements(){
        feed.innerHTML = '';
        // Get fresh data
        let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
        let pinnedAnnouncements = {};
        try { pinnedAnnouncements = JSON.parse(localStorage.getItem('pinnedAnnouncements')||'{}'); } catch(e) { pinnedAnnouncements = {}; }
        sample.forEach(a => {
            if (pinnedAnnouncements[a.id]) {
                a.pinned = true;
            } else {
                a.pinned = false;
            }
        });
        const allData = [...announcements, ...sample];
        
        // Sort: pinned first, then by date (newest first)
        const sortedData = allData.sort((a, b) => {
            if (a.pinned && !b.pinned) return -1;
            if (!a.pinned && b.pinned) return 1;
            return new Date(b.date) - new Date(a.date);
        });
        sortedData.forEach(a => feed.appendChild(card(a)));
    }

    // Make functions globally available
    window.displayAnnouncements = displayAnnouncements;

    displayAnnouncements();
})();

// Helper function to get all announcements (stored + sample)
function getAllAnnouncements() {
    let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
    const sample = [
        { id: 'ANN001', title: 'Annual Science Fair 2024 - Call for Participation', message: 'We are excited to announce our Annual Science Fair 2024! This year\'s theme is \"Innovation for Tomorrow\".', type: 'event', priority: 'medium', date: '2024-01-08', audience: 'All Users', campuses: 'Main, North' },
        { id: 'ANN002', title: 'Q1 Academic Performance Reports Available', message: 'Quarter 1 academic performance reports are now available. Parents can access them through the parent portal, and teachers should review class summaries.', type: 'academic', priority: 'medium', date: '2024-01-07', audience: 'Parents & Teachers', campuses: 'All' }
    ];
    
    // Load pinned status for sample announcements
    let pinnedAnnouncements = {};
    try { pinnedAnnouncements = JSON.parse(localStorage.getItem('pinnedAnnouncements')||'{}'); } catch(e) { pinnedAnnouncements = {}; }
    sample.forEach(a => {
        if (pinnedAnnouncements[a.id]) {
            a.pinned = true;
        }
    });
    
    return [...announcements, ...sample];
}

// Global functions for announcement actions
function togglePin(announcementId) {
    const allAnnouncements = getAllAnnouncements();
    const announcement = allAnnouncements.find(a => a.id === announcementId);
    if (!announcement) return;
    
    announcement.pinned = !announcement.pinned;
    
    // Update localStorage (only for non-sample announcements)
    if (!announcement.id.startsWith('ANN00')) {
        let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
        const index = announcements.findIndex(a => a.id === announcementId);
        if (index !== -1) {
            announcements[index] = announcement;
            localStorage.setItem('announcements', JSON.stringify(announcements));
        }
    } else {
        // For sample announcements, save pin status separately
        let pinnedAnnouncements = JSON.parse(localStorage.getItem('pinnedAnnouncements') || '{}');
        if (announcement.pinned) {
            pinnedAnnouncements[announcementId] = true;
        } else {
            delete pinnedAnnouncements[announcementId];
        }
        localStorage.setItem('pinnedAnnouncements', JSON.stringify(pinnedAnnouncements));
    }
    
    if (typeof displayAnnouncements === 'function') {
        displayAnnouncements();
    } else {
        location.reload();
    }
    showToast(announcement.pinned ? 'Announcement pinned' : 'Announcement unpinned', 'success');
}

function openEditModal(announcementId) {
    const allAnnouncements = getAllAnnouncements();
    const announcement = allAnnouncements.find(a => a.id === announcementId);
    if (!announcement) return;
    
    // Load data into modal
    document.getElementById('editAnnouncementId').value = announcement.id;
    document.getElementById('editAnnouncementTitle').value = announcement.title || '';
    document.getElementById('editAnnouncementMessage').value = announcement.message || '';
    document.getElementById('editAnnouncementPriority').value = announcement.priority || 'medium';
    document.getElementById('editAnnouncementType').value = announcement.type || 'general';
    document.getElementById('editAnnouncementAudience').value = announcement.audience || 'All Users';
    document.getElementById('editAnnouncementCampuses').value = announcement.campuses || 'All';
    document.getElementById('editAnnouncementDate').value = announcement.date || '';
    
    document.getElementById('editAnnouncementModal').style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editAnnouncementModal').style.display = 'none';
}

function saveAnnouncement() {
    const id = document.getElementById('editAnnouncementId').value;
    const title = document.getElementById('editAnnouncementTitle').value.trim();
    const message = document.getElementById('editAnnouncementMessage').value.trim();
    const priority = document.getElementById('editAnnouncementPriority').value;
    const type = document.getElementById('editAnnouncementType').value;
    const audience = document.getElementById('editAnnouncementAudience').value;
    const campuses = document.getElementById('editAnnouncementCampuses').value;
    const date = document.getElementById('editAnnouncementDate').value;
    
    if (!title || !message) {
        showToast('Please fill in title and message', 'warning');
        return;
    }
    
    let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
    const index = announcements.findIndex(a => a.id === id);
    
    if (index !== -1) {
        // Update existing announcement (preserve pinned status)
        const existing = announcements[index];
        announcements[index] = {
            ...existing,
            title,
            message,
            priority,
            type,
            audience,
            campuses,
            date
        };
        localStorage.setItem('announcements', JSON.stringify(announcements));
        showToast('Announcement updated successfully!', 'success');
    } else {
        showToast('Announcement not found', 'error');
    }
    
    closeEditModal();
    if (typeof displayAnnouncements === 'function') {
        displayAnnouncements();
    } else {
        location.reload();
    }
}

function confirmDelete(announcementId) {
    const allAnnouncements = getAllAnnouncements();
    const announcement = allAnnouncements.find(a => a.id === announcementId);
    
    if (!announcement) return;
    
    showConfirmDialog({
        title: 'Delete Announcement',
        message: `Are you sure you want to delete "${announcement.title}"? This action cannot be undone.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            if (!announcementId.startsWith('ANN00')) {
                // Delete from localStorage
                let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
                announcements = announcements.filter(a => a.id !== announcementId);
                localStorage.setItem('announcements', JSON.stringify(announcements));
                showToast('Announcement deleted successfully!', 'success');
            } else {
                showToast('Sample announcements cannot be deleted', 'warning');
            }
            if (typeof displayAnnouncements === 'function') {
                displayAnnouncements();
            } else {
                location.reload();
            }
        }
    });
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>