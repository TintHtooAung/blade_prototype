<?php
// Teacher Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Teacher Sidebar -->
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
            <a href="/teacher/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <i class="fas fa-home"></i> Teacher Dashboard
            </a>
        </li>
        <li>
            <a href="/teacher/notispace-events" class="<?php echo $activePage === 'notispace-events' ? 'active' : ''; ?>">
                <i class="fas fa-bell"></i> Notispace & Events <span class="badge bg-danger rounded-pill ms-auto">3</span>
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
    </ul>
</div>
