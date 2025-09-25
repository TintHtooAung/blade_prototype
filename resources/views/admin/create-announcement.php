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
                    <textarea 
                        class="announcement-textarea" 
                        placeholder="Enter announcement message..."
                        rows="8"
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- Media & Files Section -->
        <div class="form-section">
            <h3 class="section-title">Media & Files</h3>
            <div class="file-upload-area">
                <div class="upload-zone">
                    <i class="fas fa-upload upload-icon"></i>
                    <p>Click to upload or drag and drop</p>
                    <small>Images, videos, audio, or documents (Max 10MB each).</small>
                </div>
            </div>
        </div>

        <!-- Type Section -->
        <div class="form-section">
            <h3 class="section-title">Type</h3>
            <div class="form-group">
                <select class="form-select">
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
                <select class="form-select">
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
        </div>

        <!-- Target Audience Section -->
        <div class="form-section">
            <h3 class="section-title">Target Audience</h3>
            <div class="form-group">
                <select class="form-select">
                    <option value="all-teachers">All Teachers Only</option>
                    <option value="all-users">All Users</option>
                    <option value="students">Students Only</option>
                    <option value="parents">Parents Only</option>
                    <option value="staff">Staff Only</option>
                </select>
            </div>
            <div class="audience-preview">
                <div class="preview-card">
                    <i class="fas fa-users"></i>
                    <div class="preview-content">
                        <div class="preview-title">Target Audience Preview</div>
                        <div class="preview-reach">Estimated reach: 24 recipients</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Campuses Section -->
        <div class="form-section">
            <h3 class="section-title">Campuses</h3>
            <div class="campus-selection">
                <div class="campus-tags">
                    <span class="campus-tag selected">Main Campus</span>
                    <span class="campus-tag selected">North Campus</span>
                    <span class="campus-tag selected">South Campus</span>
                </div>
            </div>
        </div>

        <!-- Attachments Section -->
        <div class="form-section">
            <h3 class="section-title">Attachments (Optional)</h3>
            <div class="form-group">
                <select class="form-select">
                    <option value="none">No Attachment</option>
                    <option value="event">Event Attachment</option>
                    <option value="report">Report Attachment</option>
                    <option value="media">Media Files</option>
                </select>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-cancel">Cancel</button>
            <button type="submit" class="btn-send">
                <i class="fas fa-paper-plane"></i>
                Send Announcement
            </button>
        </div>
    </form>
</div>

<script>
// Editor Tab Switching
document.addEventListener('DOMContentLoaded', function() {
    const editorTabs = document.querySelectorAll('.editor-tab');
    const editorContent = document.querySelector('.editor-content');
    
    editorTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            editorTabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Handle editor switching logic here
            const editorType = this.getAttribute('data-editor');
            if (editorType === 'rich') {
                // Switch to rich editor
                console.log('Switching to rich editor');
            } else {
                // Switch to simple editor
                console.log('Switching to simple editor');
            }
        });
    });
    
    // Campus tag selection
    const campusTags = document.querySelectorAll('.campus-tag');
    campusTags.forEach(tag => {
        tag.addEventListener('click', function() {
            this.classList.toggle('selected');
        });
    });
    
    // File upload handling
    const uploadZone = document.querySelector('.upload-zone');
    uploadZone.addEventListener('click', function() {
        // Handle file upload
        console.log('File upload clicked');
    });
    
    // Form submission
    const form = document.querySelector('.announcement-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');
        // Handle form submission
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
