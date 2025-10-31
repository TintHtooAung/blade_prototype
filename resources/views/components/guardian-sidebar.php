<div class="admin-sidebar">
    <div class="sidebar-logo">
        <i class="fas fa-shield-alt"></i>
        <span>Guardian</span>
    </div>
    <ul class="sidebar-menu">
        <li class="<?php echo ($activePage ?? '') === 'guardian-dashboard' ? 'active' : ''; ?>">
            <a href="/guardian/dashboard"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        </li>
        <li class="<?php echo ($activePage ?? '') === 'guardian-attendance' ? 'active' : ''; ?>">
            <a href="/guardian/attendance"><i class="fas fa-user-check"></i> <span>Attendance</span></a>
        </li>
        <li class="<?php echo ($activePage ?? '') === 'guardian-reports' ? 'active' : ''; ?>">
            <a href="/guardian/reports"><i class="fas fa-chart-line"></i> <span>Reports</span></a>
        </li>
        <li class="<?php echo ($activePage ?? '') === 'guardian-announcements' ? 'active' : ''; ?>">
            <a href="/guardian/announcements"><i class="fas fa-bullhorn"></i> <span>Announcements</span></a>
        </li>
        <li class="<?php echo ($activePage ?? '') === 'guardian-profile' ? 'active' : ''; ?>">
            <a href="/guardian/profile"><i class="fas fa-user-cog"></i> <span>Profile & Settings</span></a>
        </li>
    </ul>
</div>



