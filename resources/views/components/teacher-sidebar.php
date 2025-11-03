<?php
// Teacher Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Teacher Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Mobile Toggle Button -->
    <div class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </div>
    
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <img src="/images/smart-campus-logo.svg" alt="Smart Campus Logo" class="sidebar-logo-img">
    </div>
    
    <ul class="sidebar-nav">
        <li>
            <a href="/teacher/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <i class="fas fa-home"></i> Teacher Dashboard
            </a>
        </li>
        <li>
            <a href="/teacher/event-calendar" class="<?php echo $activePage === 'event-calendar' ? 'active' : ''; ?>">
                <i class="fas fa-calendar-alt"></i> Event Calendar
            </a>
        </li>
        <li>
            <a href="/teacher/announcements" class="<?php echo $activePage === 'announcements' ? 'active' : ''; ?>">
                <i class="fas fa-bullhorn"></i> Announcements <span class="badge bg-danger rounded-pill ms-auto">3</span>
            </a>
        </li>
        <li>
            <a href="/teacher/schedule-view" class="<?php echo $activePage === 'schedule-view' ? 'active' : ''; ?>">
                <i class="fas fa-calendar"></i> Schedule View
            </a>
        </li>
        <li>
            <a href="/teacher/attendance" class="<?php echo $activePage === 'attendance' ? 'active' : ''; ?>">
                <i class="fas fa-user-check"></i> Attendance
            </a>
        </li>
        <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">CLASS MANAGEMENT</li>
        <li>
            <a href="/teacher/student-profiles" class="<?php echo $activePage === 'student-profiles' ? 'active' : ''; ?>">
                <i class="fas fa-user-graduate"></i> Student Profiles
            </a>
        </li>
        <li>
            <a href="/teacher/subject-profiles" class="<?php echo $activePage === 'subject-profiles' ? 'active' : ''; ?>">
                <i class="fas fa-book"></i> Subject Profiles
            </a>
        </li>
        <li>
            <a href="/teacher/class-profiles" class="<?php echo $activePage === 'class-profiles' ? 'active' : ''; ?>">
                <i class="fas fa-chalkboard"></i> Class Profiles
            </a>
        </li>
        <li>
            <a href="/teacher/exam-results" class="<?php echo $activePage === 'exam-results' ? 'active' : ''; ?>">
                <i class="fas fa-chart-bar"></i> Exam Results
            </a>
        </li>
        <li>
            <a href="/teacher/enter-marks" class="<?php echo $activePage === 'enter-marks' ? 'active' : ''; ?>">
                <i class="fas fa-edit"></i> Enter Marks
            </a>
        </li>
        <li>
            <a href="/teacher/homework" class="<?php echo $activePage === 'homework' ? 'active' : ''; ?>">
                <i class="fas fa-tasks"></i> Homework
            </a>
        </li>
        <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">REQUESTS</li>
        <li>
            <a href="/teacher/leave-request" class="<?php echo $activePage === 'leave-request' ? 'active' : ''; ?>">
                <i class="fas fa-calendar-times"></i> Leave Request
            </a>
        </li>
        <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">ASSISTANT</li>
        <li>
            <a href="/teacher/chatbot" class="<?php echo $activePage === 'chatbot' ? 'active' : ''; ?>">
                <i class="fas fa-robot"></i> Teaching Assistant
            </a>
        </li>
    </ul>
</div>

<!-- Mobile Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
/* Mobile Responsive Only */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
    
    .sidebar.open {
        transform: translateX(0);
    }
    
    .sidebar-toggle {
        display: block;
        position: fixed;
        top: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.7);
        border: none;
        color: white;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        z-index: 1002;
        font-size: 16px;
    }
    
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
    
    .sidebar-overlay.show {
        display: block;
    }
    
    .main-content {
        margin-left: 0 !important;
    }
}

@media (min-width: 769px) {
    .sidebar-toggle {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    // Mobile sidebar toggle
    sidebarToggle.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('open');
            sidebarOverlay.classList.toggle('show');
        }
    });
    
    // Close mobile sidebar when clicking overlay
    sidebarOverlay.addEventListener('click', function() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('show');
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('show');
        }
    });
});
</script>
