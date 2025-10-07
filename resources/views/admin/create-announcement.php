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

        <!-- Type Section -->
        <div class="form-section">
            <h3 class="section-title">Type</h3>
            <div class="form-group">
                <select id="annType" class="form-select">
                    <option value="general">General</option>
                    <option value="urgent">Urgent</option>
                    <option value="event">Event</option>
                    <option value="academic">Academic</option>
                </select>
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

        <!-- Audience Section -->
        <div class="form-section">
            <h3 class="section-title">Target Audience</h3>
            <div class="form-group">
                <input type="text" id="annAudience" class="form-input" placeholder="e.g., All Users, Parents, Teachers">
            </div>
        </div>

        <!-- Campuses Section -->
        <div class="form-section">
            <h3 class="section-title">Campuses</h3>
            <div class="form-group">
                <input type="text" id="annCampuses" class="form-input" placeholder="e.g., Main, North">
            </div>
        </div>

        <!-- When Section -->
        <div class="form-section">
            <h3 class="section-title">When</h3>
            <div class="form-group">
                <input type="date" id="annDate" class="form-input">
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.location.href='/admin/announcements'">Cancel</button>
            <button type="submit" class="btn-send">
                <i class="fas fa-paper-plane"></i>
                Publish Announcement
            </button>
        </div>
    </form>
</div>

<script>
// Editor Tab Switching & Form Handling
document.addEventListener('DOMContentLoaded', function() {
    const editorTabs = document.querySelectorAll('.editor-tab');
    editorTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            editorTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    const form = document.querySelector('.announcement-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const title = (document.getElementById('annTitle').value||'').trim();
        const message = (document.getElementById('annMessage').value||'').trim();
        const type = document.getElementById('annType').value;
        const priority = document.getElementById('annPriority').value;
        const audience = (document.getElementById('annAudience').value||'').trim() || 'All Users';
        const campuses = (document.getElementById('annCampuses').value||'').trim() || 'All';
        const date = document.getElementById('annDate').value || new Date().toISOString().slice(0,10);
        if (!title || !message) { alert('Please enter a title and message.'); return; }
        let items = [];
        try { items = JSON.parse(localStorage.getItem('announcements')||'[]'); } catch(e) { items = []; }
        items.unshift({ title, message, type, priority, date, audience, campuses });
        localStorage.setItem('announcements', JSON.stringify(items));
        alert('Announcement published');
        window.location.href = '/admin/announcements';
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
