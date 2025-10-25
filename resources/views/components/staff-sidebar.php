<?php
// Staff Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Staff Sidebar -->
<div class="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <div class="logo-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="logo-text">
            <div class="logo-title">SMART CAMPUS</div>
            <div class="logo-subtitle">NOVA HUB</div>
        </div>
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
            <a href="/staff/schedule-planner" class="<?php echo $activePage === 'schedule-planner' ? 'active' : ''; ?>">
                <i class="fas fa-clock"></i> Schedule Planner
            </a>
        </li>
        <li>
            <a href="/staff/attendance" class="<?php echo $activePage === 'attendance' ? 'active' : ''; ?>">
                <i class="fas fa-user-check"></i> Attendance
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
        <li>
            <a href="/staff/report-centre" class="<?php echo $activePage === 'report-centre' ? 'active' : ''; ?>">
                <i class="fas fa-chart-line"></i> Report Centre
            </a>
        </li>
    </ul>
</div>
