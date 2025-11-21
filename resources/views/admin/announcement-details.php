<?php
$pageTitle = 'Smart Campus Nova Hub - Announcement Details';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcement Details';
$activePage = 'announcements';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/announcements" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Announcements
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

<!-- Announcement Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="announcementTitle">Annual Science Fair 2024 - Call for Participation</h3>
                <span class="exam-id" id="announcementId">ANN001</span>
            </div>
            <div class="exam-badges" id="announcementBadges">
                <span class="badge active-badge" id="announcementPriority">Medium</span>
                <span class="badge tutorial-badge" id="announcementEventBadge" style="display:none;">Event Linked</span>
            </div>
        </div>
    </div>

    <!-- Announcement Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Announcement Information</h4>
            <button class="simple-btn" onclick="editAnnouncementFromDetails()"><i class="fas fa-edit"></i> Edit Announcement</button>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Announcement Title:</label>
                <span id="detailTitle">Annual Science Fair 2024 - Call for Participation</span>
            </div>
            <div class="detail-row">
                <label>Priority:</label>
                <span id="detailPriority">Medium</span>
            </div>
            <div class="detail-row">
                <label>Publish Schedule:</label>
                <span id="detailDate">January 8, 2024 · 8:00 AM</span>
            </div>
            <div class="detail-row">
                <label>Location:</label>
                <span id="detailLocation">Main, North</span>
            </div>
            <div class="detail-row">
                <label>Linked Event:</label>
                <span id="detailLinkedEvent">Annual Science Fair 2024</span>
            </div>
        </div>
    </div>

    <!-- Announcement Message -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-align-left"></i> Announcement Message</h4>
        </div>
        <div class="exam-detail-content">
            <p id="announcementMessage" style="color: #666; line-height: 1.6; white-space: pre-wrap;">
                We are excited to announce our Annual Science Fair 2024! This year's theme is "Innovation for Tomorrow".
            </p>
        </div>
    </div>
</div>

<script>
// Get announcement ID from URL
const announcementId = new URLSearchParams(window.location.search).get('id') || 'ANN001';

// Sample announcements data
const sampleAnnouncements = {
    'ANN001': {
        id: 'ANN001',
        title: 'Annual Science Fair 2024 - Call for Participation',
        message: 'We are excited to announce our Annual Science Fair 2024! This year\'s theme is "Innovation for Tomorrow".',
        priority: 'Medium',
        location: 'Main, North',
        publishDate: '2024-01-08',
        publishTime: '08:00',
        linkedEvent: { title: 'Annual Science Fair 2024', date: '2024-01-15' }
    },
    'ANN002': {
        id: 'ANN002',
        title: 'Q1 Academic Performance Reports Available',
        message: 'Quarter 1 academic performance reports are now available. Parents can access them through the parent portal, and teachers should review class summaries.',
        priority: 'Medium',
        location: 'Campus-wide',
        publishDate: '2024-01-07',
        publishTime: '10:00'
    }
};

function formatSchedule(dateString, timeString, fallback) {
    const datePart = dateString || null;
    const timePart = timeString || '';
    if (!datePart && !fallback) return 'Immediate';
    const composed = datePart ? `${datePart} ${timePart}`.trim() : fallback;
    if (!composed) return 'Immediate';
    const dateObj = new Date(composed);
    if (isNaN(dateObj)) return composed;
    return dateObj.toLocaleString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric',
        hour: 'numeric',
        minute: '2-digit'
    });
}

function formatPriority(priority) {
    if (!priority) return 'N/A';
    const text = priority.toString();
    return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

function loadAnnouncementDetails() {
    // Try to get from localStorage first
    const savedAnnouncements = JSON.parse(localStorage.getItem('announcements') || '[]');
    let announcement = savedAnnouncements.find(a => a.id === announcementId);
    
    // Fallback to sample data
    if (!announcement && sampleAnnouncements[announcementId]) {
        announcement = sampleAnnouncements[announcementId];
    }
    
    if (announcement) {
        // Update page content
        document.getElementById('announcementTitle').textContent = announcement.title || 'Untitled Announcement';
        document.getElementById('announcementId').textContent = announcement.id || 'N/A';
        document.getElementById('announcementPriority').textContent = formatPriority(announcement.priority);
        const eventBadge = document.getElementById('announcementEventBadge');
        if (eventBadge) {
            if (announcement.linkedEvent && announcement.linkedEvent.title) {
                eventBadge.style.display = 'inline-flex';
                eventBadge.textContent = announcement.linkedEvent.title;
            } else {
                eventBadge.style.display = 'none';
            }
        }
        
        document.getElementById('detailTitle').textContent = announcement.title || 'Untitled Announcement';
        document.getElementById('detailPriority').textContent = formatPriority(announcement.priority);
        const scheduleText = formatSchedule(announcement.publishDate, announcement.publishTime, announcement.publishDateTime || announcement.date);
        document.getElementById('detailDate').textContent = scheduleText;
        document.getElementById('detailLocation').textContent = announcement.location || 'Campus-wide';
        document.getElementById('detailLinkedEvent').textContent = (announcement.linkedEvent && announcement.linkedEvent.title) ? announcement.linkedEvent.title : 'None';
        document.getElementById('announcementMessage').textContent = announcement.message || 'No message available.';
    } else {
        // Show error message if announcement not found
        document.getElementById('announcementTitle').textContent = 'Announcement Not Found';
        document.getElementById('announcementMessage').textContent = 'The requested announcement could not be found.';
    }
}

function editAnnouncementFromDetails() {
    // Use the edit modal from announcements page
    if (typeof openEditModal === 'function') {
        openEditModal(announcementId);
    } else {
        // Fallback: redirect to announcements page
        window.location.href = `/admin/announcements`;
    }
}

// Load announcement details on page load
document.addEventListener('DOMContentLoaded', function() {
    loadAnnouncementDetails();
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>

