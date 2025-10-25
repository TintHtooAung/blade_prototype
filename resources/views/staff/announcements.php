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
    <div class="page-actions">
        <a href="/staff/create-announcement" class="create-announcement-btn">
            <i class="fas fa-plus"></i>
            Create Announcement
        </a>
    </div>
</div>

<!-- Announcements List -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Announcements</h3>
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
        { title: 'Annual Science Fair 2024 - Call for Participation', message: 'We are excited to announce our Annual Science Fair 2024! This year\'s theme is \"Innovation for Tomorrow\".', type: 'event', priority: 'medium', date: '2024-01-08', audience: 'All Users', campuses: 'Main, North' },
        { title: 'Q1 Academic Performance Reports Available', message: 'Quarter 1 academic performance reports are now available. Parents can access them through the parent portal, and teachers should review class summaries.', type: 'academic', priority: 'medium', date: '2024-01-07', audience: 'Parents & Teachers', campuses: 'All' }
    ];

    // Merge with locally created announcements
    let stored = [];
    try { stored = JSON.parse(localStorage.getItem('announcements')||'[]'); } catch(e) { stored = []; }
    const data = [...stored, ...sample];

    const feed = document.getElementById('annFeed');

    function card(a){
        const div = document.createElement('div');
        div.className = 'announcement-card';
        div.innerHTML = `
            <div class="announcement-header">
                <div class="announcement-title">
                    <h4>${escapeHtml(a.title||'')}</h4>
                    <p>${escapeHtml(a.message||'')}</p>
                </div>
                <div class="announcement-actions">
                    <button class="action-icon pin" title="Pin"><i class="fas fa-thumbtack"></i></button>
                    <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
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

    displayAnnouncements();
})();
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>