<?php
// Staff Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Staff Sidebar -->
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
            <a href="/staff/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <i class="fas fa-home"></i> Staff Dashboard
            </a>
        </li>
        <li>
            <a href="/staff/announcements" class="<?php echo $activePage === 'announcements' ? 'active' : ''; ?>">
                <i class="fas fa-bell"></i> Announcements
            </a>
        </li>
        <li>
            <a href="/staff/event-planner" class="<?php echo $activePage === 'event-planner' ? 'active' : ''; ?>">
                <i class="fas fa-calendar"></i> Event Planner
            </a>
        </li>
        <li>
            <a href="/staff/event-calendar" class="<?php echo $activePage === 'event-calendar' ? 'active' : ''; ?>">
                <i class="fas fa-calendar-alt"></i> Event Calendar
            </a>
        </li>
        <li>
            <a href="/staff/schedule-planner" class="<?php echo $activePage === 'schedule-planner' ? 'active' : ''; ?>">
                <i class="fas fa-clock"></i> Schedule Planner
            </a>
        </li>
        <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">ACADEMIC</li>
        <li>
            <a href="/staff/attendance" class="<?php echo $activePage === 'attendance' ? 'active' : ''; ?>">
                <i class="fas fa-user-check"></i> Attendance
            </a>
        </li>
        <li>
            <a href="/staff/collect-attendance" class="<?php echo $activePage === 'collect-attendance' ? 'active' : ''; ?>">
                <i class="fas fa-clipboard-check"></i> Collect Attendance
            </a>
        </li>
        <li>
            <a href="/staff/teacher-profiles" class="<?php echo $activePage === 'teacher-profiles' ? 'active' : ''; ?>">
                <i class="fas fa-chalkboard-teacher"></i> Teacher Profiles
            </a>
        </li>
        <li>
            <a href="/staff/student-profiles" class="<?php echo $activePage === 'student-profiles' ? 'active' : ''; ?>">
                <i class="fas fa-user-graduate"></i> Student Profiles
            </a>
        </li>
        <li>
            <a href="/staff/academic-management" class="<?php echo $activePage === 'academic-management' ? 'active' : ''; ?>">
                <i class="fas fa-graduation-cap"></i> Academic Management
            </a>
        </li>
        <li>
            <a href="/staff/exam-database" class="<?php echo $activePage === 'exam-database' ? 'active' : ''; ?>">
                <i class="fas fa-clipboard-list"></i> Exam Database
            </a>
        </li>
        <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">FINANCE</li>
        <li>
            <a href="/staff/student-fee-management" class="<?php echo $activePage === 'student-fee-management' ? 'active' : ''; ?>">
                <i class="fas fa-file-invoice-dollar"></i> Student Fee
            </a>
        </li>
        <li>
            <a href="/staff/salary-payroll" class="<?php echo $activePage === 'salary-payroll' ? 'active' : ''; ?>">
                <i class="fas fa-money-check-alt"></i> Salary & Payroll
            </a>
        </li>
        <li>
            <a href="/staff/report-centre" class="<?php echo $activePage === 'report-centre' ? 'active' : ''; ?>">
                <i class="fas fa-chart-line"></i> Report Centre
            </a>
        </li>
        <li style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">REQUESTS</li>
        <li>
            <a href="/staff/leave-request" class="<?php echo $activePage === 'leave-request' ? 'active' : ''; ?>">
                <i class="fas fa-calendar-times"></i> Leave Request
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
