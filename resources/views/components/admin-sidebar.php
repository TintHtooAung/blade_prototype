<?php
// Admin Sidebar Component
$activePage = $activePage ?? 'dashboard';
$menuItems = [
    ['id' => 'dashboard', 'icon' => 'fas fa-home', 'label' => 'Admin Dashboard', 'url' => '/admin/dashboard'],
    ['id' => 'users', 'icon' => 'fas fa-users', 'label' => 'User Management', 'url' => '/admin/user-management'],
    ['id' => 'academic', 'icon' => 'fas fa-graduation-cap', 'label' => 'Academic Management', 'url' => '/admin/academic-management'],
    ['id' => 'departments', 'icon' => 'fas fa-building', 'label' => 'Departments', 'url' => '/admin/department-management'],
    ['id' => 'announcements', 'icon' => 'fas fa-bell', 'label' => 'Announcements', 'url' => '/admin/announcements'],
    ['id' => 'events', 'icon' => 'fas fa-calendar', 'label' => 'Event Planner', 'url' => '/admin/event-planner'],
    ['id' => 'event-calendar', 'icon' => 'fas fa-calendar-alt', 'label' => 'Event Calendar', 'url' => '/admin/event-calendar'],
    ['id' => 'schedule', 'icon' => 'fas fa-clock', 'label' => 'Schedule Planner', 'url' => '/admin/schedule-planner'],
    ['id' => 'attendance', 'icon' => 'fas fa-user-check', 'label' => 'Attendance', 'url' => '/admin/attendance'],
    ['id' => 'leave-requests', 'icon' => 'fas fa-calendar-times', 'label' => 'Leave Requests', 'url' => '/admin/leave-requests'],
    ['id' => 'teachers', 'icon' => 'fas fa-chalkboard-teacher', 'label' => 'Teacher Profiles', 'url' => '/admin/teacher-profiles'],
    ['id' => 'students', 'icon' => 'fas fa-user-graduate', 'label' => 'Student Profiles', 'url' => '/admin/student-profiles'],
    ['id' => 'employees', 'icon' => 'fas fa-users-cog', 'label' => 'Staff Profiles', 'url' => '/admin/employee-profiles'],
    ['id' => 'exams', 'icon' => 'fas fa-clipboard-list', 'label' => 'Exam Database', 'url' => '/admin/exam-database'],
    ['id' => 'finance', 'icon' => 'fas fa-file-invoice-dollar', 'label' => 'Student Fee', 'url' => '/admin/student-fee-management'],
    ['id' => 'payroll', 'icon' => 'fas fa-money-check-alt', 'label' => 'Salary & Payroll', 'url' => '/admin/salary-payroll'],
    ['id' => 'school', 'icon' => 'fas fa-school', 'label' => 'School Info', 'url' => '/admin/school-info'],
    ['id' => 'logs', 'icon' => 'fas fa-chart-line', 'label' => 'User Activity Logs', 'url' => '/admin/activity-logs'],
    ['id' => 'reports', 'icon' => 'fas fa-file-alt', 'label' => 'Report Centre', 'url' => '/admin/report-centre'],
    ['id' => 'chatbot', 'icon' => 'fas fa-robot', 'label' => 'Admin Assistant', 'url' => '/admin/chatbot']
];
?>
<!-- Admin Sidebar -->
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
        <?php foreach ($menuItems as $item): ?>
        <li>
            <a href="<?php echo $item['url']; ?>" 
               class="<?php echo ($activePage === $item['id']) ? 'active' : ''; ?>">
                <i class="<?php echo $item['icon']; ?>"></i> 
                <?php echo $item['label']; ?>
            </a>
        </li>
        <?php endforeach; ?>
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
