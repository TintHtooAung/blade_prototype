<?php
$pageTitle = 'Smart Campus Nova Hub - Announcement Management';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcement Management';
$activePage = 'announcements';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

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

<style>
/* Avoid overlap between floating profile badge and page actions on this page */
.page-header-compact { position: relative; }
.page-header-compact .page-actions { margin-right: 240px; }
@media (max-width: 992px) {
    .page-header-compact .page-actions { margin-right: 0; }
}
</style>

<!-- Create Announcement Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Create New Announcement</h3>
        <button class="simple-btn" id="toggleAnnouncementForm"><i class="fas fa-plus"></i> Add Announcement</button>
    </div>

    <!-- Inline Announcement Form -->
    <div id="announcementForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-bullhorn"></i> Create Announcement</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label>Announcement Title</label>
                    <input type="text" class="form-input" id="announcementTitle" placeholder="e.g., Annual Science Fair 2024">
                </div>
                <div class="form-group">
                    <label>Priority</label>
                    <select class="form-select" id="announcementPriority">
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
                    <select class="form-select" id="announcementType">
                        <option value="general">General</option>
                        <option value="academic">Academic</option>
                        <option value="event">Event</option>
                        <option value="emergency">Emergency</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Target Audience</label>
                    <select class="form-select" id="announcementAudience">
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
                    <textarea class="form-input" id="announcementMessage" rows="4" placeholder="Enter announcement message..."></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Campuses</label>
                    <select class="form-select" id="announcementCampuses">
                        <option value="All">All</option>
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
            <div class="form-actions">
                <button id="cancelAnnouncement" class="simple-btn secondary"><i class="fas fa-times"></i> Cancel</button>
                <button id="saveAnnouncement" class="simple-btn primary"><i class="fas fa-check"></i> Save Announcement</button>
            </div>
        </div>
    </div>
</div>

<!-- Announcements List -->
<div class="simple-section" style="margin-top:16px;">
    <div class="simple-header">
        <h3>All Announcements</h3>
    </div>
    <div id="annFeed" class="announcements-list"></div>
</div>

<script>
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

    // Merge with locally created announcements
    let stored = [];
    try { stored = JSON.parse(localStorage.getItem('announcements')||'[]'); } catch(e) { stored = []; }
    const data = [...stored, ...sample];

    const feed = document.getElementById('annFeed');

    function card(a){
        const div = document.createElement('div');
        div.className = 'announcement-card';
        div.style.cursor = 'pointer';
        div.onclick = function(e) {
            // Don't navigate if clicking on action buttons
            if (e.target.closest('.announcement-actions')) {
                return;
            }
            window.location.href = `/staff/announcement-details?id=${encodeURIComponent(a.id||'')}`;
        };
        div.innerHTML = `
            <div class="announcement-header">
                <div class="announcement-title">
                    <h4>${escapeHtml(a.title||'')}</h4>
                    <p>${escapeHtml(a.message||'')}</p>
                </div>
                <div class="announcement-actions">
                    <button class="action-icon edit" title="Edit" onclick="event.stopPropagation(); window.location.href='/staff/create-announcement?id=${encodeURIComponent(a.id||'')}'"><i class="fas fa-edit"></i></button>
                    <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
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
        data.forEach(a => feed.appendChild(card(a)));
    }

    // Toggle form functionality (mirror admin)
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggleAnnouncementForm');
        const form = document.getElementById('announcementForm');
        const cancelBtn = document.getElementById('cancelAnnouncement');
        const saveBtn = document.getElementById('saveAnnouncement');

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                const isHidden = form.style.display === 'none';
                form.style.display = isHidden ? 'block' : 'none';
                if (isHidden) clearForm();
            });
        }

        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                form.style.display = 'none';
                clearForm();
            });
        }

        if (saveBtn) {
            saveBtn.addEventListener('click', function() {
                const title = document.getElementById('announcementTitle').value.trim();
                const message = document.getElementById('announcementMessage').value.trim();
                const priority = document.getElementById('announcementPriority').value;
                const type = document.getElementById('announcementType').value;
                const audience = document.getElementById('announcementAudience').value;
                const campuses = document.getElementById('announcementCampuses').value;
                const date = document.getElementById('announcementDate').value || new Date().toISOString().split('T')[0];

                if (!title || !message) { alert('Please fill in title and message'); return; }

                const announcementData = { id:'ANN'+Date.now(), title, message, priority, type, audience, campuses, date };
                let announcements = JSON.parse(localStorage.getItem('announcements') || '[]');
                announcements.unshift(announcementData);
                localStorage.setItem('announcements', JSON.stringify(announcements));
                alert(`Announcement "${title}" created successfully`);
                form.style.display = 'none';
                clearForm();
                displayAnnouncements();
            });
        }
    });

    window.displayAnnouncements = displayAnnouncements;
    displayAnnouncements();
})();

function clearForm() {
    const t=document.getElementById('announcementTitle'); if(t) t.value='';
    const m=document.getElementById('announcementMessage'); if(m) m.value='';
    const p=document.getElementById('announcementPriority'); if(p) p.value='medium';
    const ty=document.getElementById('announcementType'); if(ty) ty.value='general';
    const a=document.getElementById('announcementAudience'); if(a) a.value='All Users';
    const c=document.getElementById('announcementCampuses'); if(c) c.value='All';
    const d=document.getElementById('announcementDate'); if(d) d.value='';
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>