<?php
// Admin Sidebar Component
$activePage = $activePage ?? 'dashboard';
$menuItems = [
    ['id' => 'dashboard', 'icon' => 'fas fa-home', 'label' => 'Admin Dashboard', 'url' => '/admin/dashboard'],
    ['id' => 'users', 'icon' => 'fas fa-users', 'label' => 'User Management', 'url' => '/admin/user-management'],
    ['id' => 'academic', 'icon' => 'fas fa-graduation-cap', 'label' => 'Academic Management', 'url' => '/admin/academic-management'],
    ['id' => 'announcements', 'icon' => 'fas fa-bell', 'label' => 'Announcements', 'url' => '/admin/announcements'],
    ['id' => 'events', 'icon' => 'fas fa-calendar', 'label' => 'Event Planner', 'url' => '/admin/event-planner'],
    ['id' => 'event-calendar', 'icon' => 'fas fa-calendar-alt', 'label' => 'Event Calendar', 'url' => '/admin/event-calendar'],
    ['id' => 'schedule', 'icon' => 'fas fa-clock', 'label' => 'Schedule Planner', 'url' => '/admin/schedule-planner'],
    ['id' => 'attendance', 'icon' => 'fas fa-user-check', 'label' => 'Attendance', 'url' => '/admin/attendance'],
    ['id' => 'teachers', 'icon' => 'fas fa-chalkboard-teacher', 'label' => 'Teacher Profiles', 'url' => '/admin/teacher-profiles'],
    ['id' => 'students', 'icon' => 'fas fa-user-graduate', 'label' => 'Student Profiles', 'url' => '/admin/student-profiles'],
    ['id' => 'employees', 'icon' => 'fas fa-users-cog', 'label' => 'Staff Profiles', 'url' => '/admin/employee-profiles'],
    ['id' => 'exams', 'icon' => 'fas fa-clipboard-list', 'label' => 'Exam Database', 'url' => '/admin/exam-database'],
    ['id' => 'finance', 'icon' => 'fas fa-file-invoice-dollar', 'label' => 'Student Fee', 'url' => '/admin/student-fee-management'],
    ['id' => 'payroll', 'icon' => 'fas fa-money-check-alt', 'label' => 'Salary & Payroll', 'url' => '/admin/salary-payroll'],
    ['id' => 'school', 'icon' => 'fas fa-school', 'label' => 'School Info', 'url' => '/admin/school-info'],
    ['id' => 'logs', 'icon' => 'fas fa-chart-line', 'label' => 'User Activity Logs', 'url' => '/admin/activity-logs'],
    ['id' => 'reports', 'icon' => 'fas fa-file-alt', 'label' => 'Report Centre', 'url' => '/admin/report-centre']
];
?>
<!-- Admin Sidebar -->
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
