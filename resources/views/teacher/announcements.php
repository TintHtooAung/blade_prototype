<?php
$pageTitle = 'Smart Campus Nova Hub - Announcements';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcements';
$activePage = 'announcements';

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

<!-- Announcements List -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Latest Announcements</h3>
    </div>

    <div id="annFeed" class="announcements-list"></div>
</div>

<style>
.announcements-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.announcement-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.announcement-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.announcement-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 16px;
}

.announcement-title h4 {
    margin: 0 0 8px 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    line-height: 1.4;
}

.announcement-title p {
    margin: 0;
    color: #666;
    line-height: 1.5;
    font-size: 0.95rem;
}

.announcement-actions {
    display: flex;
    gap: 8px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.announcement-card:hover .announcement-actions {
    opacity: 1;
}

.action-icon {
    width: 32px;
    height: 32px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    background: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    font-size: 0.8rem;
}

.action-icon:hover {
    border-color: #1976d2;
    background: #f8f9fa;
    color: #1976d2;
}

.action-icon.edit:hover {
    color: #1976d2;
    border-color: #1976d2;
}

.action-icon.delete:hover {
    color: #dc3545;
    border-color: #dc3545;
}

.announcement-tags {
    display: flex;
    gap: 8px;
    margin-bottom: 16px;
}

.tag {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
}

.tag.high {
    background: #ffebee;
    color: #d32f2f;
}

.tag.medium {
    background: #fff3e0;
    color: #f57c00;
}

.tag.low {
    background: #e8f5e8;
    color: #2e7d32;
}

.tag.event {
    background: #e3f2fd;
    color: #1976d2;
}

.tag.academic {
    background: #f3e5f5;
    color: #7b1fa2;
}

.tag.urgent {
    background: #ffebee;
    color: #d32f2f;
}

.announcement-footer {
    display: flex;
    gap: 20px;
    padding-top: 16px;
    border-top: 1px solid #f0f0f0;
}

.footer-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    color: #666;
}

.footer-item i {
    font-size: 0.8rem;
    color: #999;
}

/* Responsive Design */
@media (max-width: 768px) {
    .announcement-header {
        flex-direction: column;
        gap: 12px;
    }
    
    .announcement-actions {
        opacity: 1;
        align-self: flex-end;
    }
    
    .announcement-footer {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<script>
(function(){
    function parseDate(d){ return d ? new Date(d) : null; }
    function escapeHtml(str){
        return String(str).replace(/[&<>\"]/g, s=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;"}[s]));
    }
    function capitalize(s){ return s ? s.charAt(0).toUpperCase()+s.slice(1) : s; }

    // Sample announcements (baseline)
    const sample = [
        { 
            id: 'ANN001',
            title: 'Annual Science Fair 2024 - Call for Participation', 
            message: 'We are excited to announce our Annual Science Fair 2024! This year\'s theme is "Innovation for Tomorrow". Students are encouraged to participate with innovative projects.', 
            type: 'event', 
            priority: 'high', 
            date: '2024-12-16', 
            audience: 'All Students', 
            campuses: 'Main Campus' 
        },
        { 
            id: 'ANN002',
            title: 'Q1 Academic Performance Reports Available', 
            message: 'Quarter 1 academic performance reports are now available. Teachers should review class summaries and prepare for parent meetings.', 
            type: 'academic', 
            priority: 'medium', 
            date: '2024-12-15', 
            audience: 'Teachers', 
            campuses: 'All Campuses' 
        },
        { 
            id: 'ANN003',
            title: 'Staff Meeting - December 20th', 
            message: 'Monthly staff meeting scheduled for December 20th at 3:00 PM in the conference room. All teachers are required to attend.', 
            type: 'meeting', 
            priority: 'medium', 
            date: '2024-12-14', 
            audience: 'All Staff', 
            campuses: 'Main Campus' 
        },
        { 
            id: 'ANN004',
            title: 'Christmas Holiday Schedule', 
            message: 'School will be closed from December 23rd to January 2nd for Christmas holidays. Classes resume on January 3rd, 2025.', 
            type: 'holiday', 
            priority: 'high', 
            date: '2024-12-13', 
            audience: 'All Users', 
            campuses: 'All Campuses' 
        },
        { 
            id: 'ANN005',
            title: 'Library Hours Update', 
            message: 'Library will be open extended hours during exam period: 7:00 AM to 8:00 PM, Monday to Friday.', 
            type: 'academic', 
            priority: 'low', 
            date: '2024-12-12', 
            audience: 'Students & Teachers', 
            campuses: 'Main Campus' 
        }
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
            window.location.href = `/teacher/announcement-details?id=${encodeURIComponent(a.id||'')}`;
        };
        div.innerHTML = `
            <div class="announcement-header">
                <div class="announcement-title">
                    <h4>${escapeHtml(a.title||'')}</h4>
                    <p>${escapeHtml(a.message||'')}</p>
                </div>
                <div class="announcement-actions"></div>
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
        // Sort by date (newest first)
        const sortedData = data.sort((a, b) => new Date(b.date) - new Date(a.date));
        sortedData.forEach(a => feed.appendChild(card(a)));
    }

    displayAnnouncements();
})();
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
