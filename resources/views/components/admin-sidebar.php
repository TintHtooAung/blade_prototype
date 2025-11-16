<?php
// Admin Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Admin Sidebar -->
<div class="sidebar" id="sidebar" data-minimized-state="" style="">
<script>
// Default: EXPANDED sidebar. Only minimize if user explicitly saved minimized state
(function() {
    try {
        const savedState = localStorage.getItem('sidebarMinimized');
        // Only apply minimized state if user explicitly set it to 'true'
        if (savedState === 'true' && window.innerWidth > 768) {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.style.width = '64px';
                sidebar.style.transition = 'none';
                sidebar.style.maxWidth = '64px';
                sidebar.style.minWidth = '64px';
                sidebar.classList.add('minimized');
                sidebar.setAttribute('data-minimized-state', 'true');
            }
            const mainContent = document.querySelector('.main-content');
            if (mainContent) {
                mainContent.style.marginLeft = '64px';
                mainContent.style.width = 'calc(100vw - 64px)';
                mainContent.style.transition = 'none';
            }
        } else {
            // Default: EXPANDED state - ensure sidebar is expanded
            const sidebar = document.getElementById('sidebar');
            if (sidebar && window.innerWidth > 768) {
                sidebar.style.width = '240px';
                sidebar.classList.remove('minimized');
                sidebar.setAttribute('data-minimized-state', 'false');
            }
            const mainContent = document.querySelector('.main-content');
            if (mainContent && window.innerWidth > 768) {
                mainContent.style.marginLeft = '240px';
                mainContent.style.width = 'calc(100vw - 240px)';
            }
        }
    } catch(e) {}
})();
</script>
    <!-- Hamburger Menu Toggle (Desktop) -->
    <button class="sidebar-hamburger" id="sidebarHamburger" title="Toggle Sidebar">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
    </button>
    
    <!-- Mobile Toggle Button -->
    <div class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </div>
    
    <!-- Logo Section removed - using header logo only -->
    
    <ul class="sidebar-nav" style="margin-top: 0;">
        <!-- Hamburger menu as first nav item when minimized -->
        <li class="sidebar-hamburger-nav-item">
            <button class="sidebar-nav-hamburger" id="sidebarNavHamburger" title="Expand Sidebar">
                <i class="fas fa-arrow-right"></i>
                <i class="fas fa-bars"></i>
                <span class="sidebar-nav-label">Expand</span>
            </button>
        </li>
        
        <!-- Group 1: Dashboard -->
        <li>
            <a href="/admin/dashboard" 
               class="<?php echo ($activePage === 'dashboard') ? 'active' : ''; ?>"
               title="Admin Dashboard">
                <i class="fas fa-home"></i> 
                <span class="sidebar-nav-label">Admin Dashboard</span>
            </a>
        </li>
        
        <!-- Group 2: Academic Management (Academic Setup + Academic Management + Exam Database) -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">ACADEMIC MANAGEMENT</li>
        <li>
            <a href="/admin/academic-setup" 
               class="<?php echo ($activePage === 'academic-setup') ? 'active' : ''; ?>"
               title="Setup">
                <i class="fas fa-magic"></i> 
                <span class="sidebar-nav-label">Setup</span>
            </a>
        </li>
        <li>
            <a href="/admin/academic-management" 
               class="<?php echo ($activePage === 'academic') ? 'active' : ''; ?>"
               title="Academic Management">
                <i class="fas fa-graduation-cap"></i> 
                <span class="sidebar-nav-label">Academic Management</span>
            </a>
        </li>
        <li>
            <a href="/admin/exam-database" 
               class="<?php echo ($activePage === 'exams') ? 'active' : ''; ?>"
               title="Exam Database">
                <i class="fas fa-clipboard-list"></i> 
                <span class="sidebar-nav-label">Exam Database</span>
            </a>
        </li>
        
        <!-- Group 3: Events (Event Planner, Event Calendar + Announcements) -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">EVENTS & ANNOUNCEMENTS</li>
        <li>
            <a href="/admin/events-setup" 
               class="<?php echo ($activePage === 'events-setup') ? 'active' : ''; ?>"
               title="Setup">
                <i class="fas fa-cog"></i> 
                <span class="sidebar-nav-label">Setup</span>
            </a>
        </li>
        <li>
            <a href="/admin/event-planner" 
               class="<?php echo ($activePage === 'events') ? 'active' : ''; ?>"
               title="Event Planner">
                <i class="fas fa-calendar"></i> 
                <span class="sidebar-nav-label">Event Planner</span>
            </a>
        </li>
        <li>
            <a href="/admin/event-calendar" 
               class="<?php echo ($activePage === 'event-calendar') ? 'active' : ''; ?>"
               title="Event Calendar">
                <i class="fas fa-calendar-alt"></i> 
                <span class="sidebar-nav-label">Event Calendar</span>
            </a>
        </li>
        <li>
            <a href="/admin/announcements" 
               class="<?php echo ($activePage === 'announcements') ? 'active' : ''; ?>"
               title="Announcements">
                <i class="fas fa-bell"></i> 
                <span class="sidebar-nav-label">Announcements</span>
            </a>
        </li>
        
        <!-- Group 4: Schedule Planner, Attendance, Leave -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">SCHEDULE & ATTENDANCE</li>
        <li>
            <a href="/admin/schedule-attendance-setup" 
               class="<?php echo ($activePage === 'schedule-attendance-setup') ? 'active' : ''; ?>"
               title="Setup">
                <i class="fas fa-cog"></i> 
                <span class="sidebar-nav-label">Setup</span>
            </a>
        </li>
        <li>
            <a href="/admin/schedule-planner" 
               class="<?php echo ($activePage === 'schedule') ? 'active' : ''; ?>"
               title="Schedule Planner">
                <i class="fas fa-clock"></i> 
                <span class="sidebar-nav-label">Schedule Planner</span>
            </a>
        </li>
        <li>
            <a href="/admin/attendance/student" 
               class="<?php echo ($activePage === 'attendance-student') ? 'active' : ''; ?>"
               title="Student Attendance">
                <i class="fas fa-user-graduate"></i> 
                <span class="sidebar-nav-label">Student Attendance</span>
            </a>
        </li>
        <li>
            <a href="/admin/attendance/teacher" 
               class="<?php echo ($activePage === 'attendance-teacher') ? 'active' : ''; ?>"
               title="Teacher Attendance">
                <i class="fas fa-chalkboard-teacher"></i> 
                <span class="sidebar-nav-label">Teacher Attendance</span>
            </a>
        </li>
        <li>
            <a href="/admin/attendance/staff" 
               class="<?php echo ($activePage === 'attendance-staff') ? 'active' : ''; ?>"
               title="Staff Attendance">
                <i class="fas fa-users-cog"></i> 
                <span class="sidebar-nav-label">Staff Attendance</span>
            </a>
        </li>
        <li>
            <a href="/admin/leave-requests" 
               class="<?php echo ($activePage === 'leave-requests') ? 'active' : ''; ?>"
               title="Leave Requests">
                <i class="fas fa-calendar-times"></i> 
                <span class="sidebar-nav-label">Leave Requests</span>
            </a>
        </li>
        
        <!-- Group 5: Department, Profiles -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">DEPARTMENTS & PROFILES</li>
        <li>
            <a href="/admin/department-management" 
               class="<?php echo ($activePage === 'departments') ? 'active' : ''; ?>"
               title="Departments">
                <i class="fas fa-building"></i> 
                <span class="sidebar-nav-label">Departments</span>
            </a>
        </li>
        <li>
            <a href="/admin/teacher-profiles" 
               class="<?php echo ($activePage === 'teachers') ? 'active' : ''; ?>"
               title="Teacher Profiles">
                <i class="fas fa-chalkboard-teacher"></i> 
                <span class="sidebar-nav-label">Teacher Profiles</span>
            </a>
        </li>
        <li>
            <a href="/admin/student-profiles" 
               class="<?php echo ($activePage === 'students') ? 'active' : ''; ?>"
               title="Student Profiles">
                <i class="fas fa-user-graduate"></i> 
                <span class="sidebar-nav-label">Student Profiles</span>
            </a>
        </li>
        <li>
            <a href="/admin/employee-profiles" 
               class="<?php echo ($activePage === 'employees') ? 'active' : ''; ?>"
               title="Staff Profiles">
                <i class="fas fa-users-cog"></i> 
                <span class="sidebar-nav-label">Staff Profiles</span>
            </a>
        </li>
        
        <!-- Group 7: Student Fee, Payroll, Finance -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">FINANCE</li>
        <li>
            <a href="/admin/finance-setup" 
               class="<?php echo ($activePage === 'finance-setup') ? 'active' : ''; ?>"
               title="Setup">
                <i class="fas fa-cog"></i> 
                <span class="sidebar-nav-label">Setup</span>
            </a>
        </li>
        <li>
            <a href="/admin/student-fee-management" 
               class="<?php echo ($activePage === 'student-fee') ? 'active' : ''; ?>"
               title="Student Fee">
                <i class="fas fa-file-invoice-dollar"></i> 
                <span class="sidebar-nav-label">Student Fee</span>
            </a>
        </li>
        <li>
            <a href="/admin/salary-payroll" 
               class="<?php echo ($activePage === 'payroll') ? 'active' : ''; ?>"
               title="Salary & Payroll">
                <i class="fas fa-money-check-alt"></i> 
                <span class="sidebar-nav-label">Salary & Payroll</span>
            </a>
        </li>
        <li>
            <a href="/admin/finance" 
               class="<?php echo ($activePage === 'finance') ? 'active' : ''; ?>"
               title="Finance">
                <i class="fas fa-dollar-sign"></i> 
                <span class="sidebar-nav-label">Finance</span>
            </a>
        </li>
        
        <!-- Group 8: School Info, User Management, Activity -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">SETTINGS</li>
        <li>
            <a href="/admin/school-info" 
               class="<?php echo ($activePage === 'school') ? 'active' : ''; ?>"
               title="School Info">
                <i class="fas fa-school"></i> 
                <span class="sidebar-nav-label">School Info</span>
            </a>
        </li>
        <li>
            <a href="/admin/user-management" 
               class="<?php echo ($activePage === 'users') ? 'active' : ''; ?>"
               title="User Management">
                <i class="fas fa-users"></i> 
                <span class="sidebar-nav-label">User Management</span>
            </a>
        </li>
        <li>
            <a href="/admin/activity-logs" 
               class="<?php echo ($activePage === 'logs') ? 'active' : ''; ?>"
               title="User Activity Logs">
                <i class="fas fa-chart-line"></i> 
                <span class="sidebar-nav-label">User Activity Logs</span>
            </a>
        </li>
        
        <!-- Group 9: Report Centre -->
        <li class="sidebar-section-header" style="margin: 1rem 0 0.5rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">REPORTS</li>
        <li>
            <a href="/admin/report-centre" 
               class="<?php echo ($activePage === 'reports') ? 'active' : ''; ?>"
               title="Report Centre">
                <i class="fas fa-file-alt"></i> 
                <span class="sidebar-nav-label">Report Centre</span>
            </a>
        </li>
    </ul>
</div>

<!-- Mobile Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
/* Include shared hamburger menu styles */
@import url('/css/sidebar-hamburger.css');

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

/* Hide section headers in minimized state */
.sidebar.minimized .sidebar-section-header {
    display: none;
}

/* Submenu Styles */
.sidebar-nav li.has-submenu {
    position: relative;
}

.sidebar-submenu {
    list-style: none;
    padding: 0;
    margin: 0;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    background: rgba(0, 0, 0, 0.02);
}

.sidebar-nav li.submenu-open .sidebar-submenu {
    max-height: 500px;
    padding: 4px 0;
}

.sidebar-submenu li {
    margin: 0;
}

.sidebar-submenu a {
    padding: 10px 1.5rem 10px 3.5rem !important;
    font-size: 0.875rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.2s ease;
}

.sidebar-submenu a:hover {
    background: rgba(74, 144, 226, 0.1);
    color: #4A90E2;
}

.sidebar-submenu a.active {
    background: rgba(74, 144, 226, 0.15);
    color: #4A90E2;
    font-weight: 600;
    border-left: 3px solid #4A90E2;
}

.sidebar-submenu a i {
    font-size: 14px;
    width: 16px;
    text-align: center;
}

.submenu-arrow {
    margin-left: auto;
    font-size: 12px;
    transition: transform 0.3s ease;
}

.sidebar-nav li.submenu-open .submenu-arrow {
    transform: rotate(180deg);
}

.sidebar.minimized .sidebar-submenu {
    display: none;
}

.sidebar.minimized .submenu-arrow {
    display: none;
}
</style>

<script>
// Initialize sidebar state immediately to prevent flicker
(function() {
    const savedState = localStorage.getItem('sidebarMinimized');
    if (savedState === 'true' && window.innerWidth > 768) {
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            if (sidebar) {
                sidebar.classList.add('minimized');
            }
            if (mainContent) {
                mainContent.style.marginLeft = '64px';
                mainContent.style.width = 'calc(100vw - 64px)';
                mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
        });
    }
})();

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarHamburger = document.getElementById('sidebarHamburger');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const mainContent = document.querySelector('.main-content');
    
    // Ensure sidebar state is maintained - Default: EXPANDED
    const savedState = localStorage.getItem('sidebarMinimized');
    if (savedState === 'true' && window.innerWidth > 768) {
        // User explicitly minimized - apply minimized state
        if (sidebar && !sidebar.classList.contains('minimized')) {
            sidebar.classList.add('minimized');
        }
        if (sidebar) {
            sidebar.style.width = '64px';
            sidebar.style.transition = 'none';
            sidebar.style.maxWidth = '64px';
            sidebar.style.minWidth = '64px';
        }
        if (mainContent) {
            mainContent.style.marginLeft = '64px';
            mainContent.style.width = 'calc(100vw - 64px)';
            mainContent.style.transition = 'none';
        }
    } else {
        // Default: EXPANDED state (no saved state or 'false')
        if (window.innerWidth > 768) {
            if (sidebar) {
                sidebar.classList.remove('minimized');
                sidebar.style.width = '240px';
                sidebar.style.maxWidth = '';
                sidebar.style.minWidth = '';
                sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
            if (mainContent) {
                mainContent.style.marginLeft = '240px';
                mainContent.style.width = 'calc(100vw - 240px)';
                mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
        }
    }
    
    // Desktop hamburger menu toggle
    if (sidebarHamburger) {
        sidebarHamburger.addEventListener('click', function(e) {
            e.stopPropagation();
            if (window.innerWidth > 768) {
                sidebar.classList.toggle('minimized');
                const isMinimized = sidebar.classList.contains('minimized');
                localStorage.setItem('sidebarMinimized', isMinimized);
                
                if (isMinimized) {
                    // Minimizing: Lock width with inline styles
                    sidebar.style.width = '64px';
                    sidebar.style.maxWidth = '64px';
                    sidebar.style.minWidth = '64px';
                    sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    if (mainContent) {
                        mainContent.style.marginLeft = '64px';
                        mainContent.style.width = 'calc(100vw - 64px)';
                        mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                } else {
                    // Expanding: Remove inline style locks and restore expanded state
                    sidebar.style.width = '240px';
                    sidebar.style.maxWidth = '';
                    sidebar.style.minWidth = '';
                    sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    if (mainContent) {
                        mainContent.style.marginLeft = '240px';
                        mainContent.style.width = 'calc(100vw - 240px)';
                        mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                }
            }
        });
    }
    
    // Hamburger nav item toggle (when minimized)
    const sidebarNavHamburger = document.getElementById('sidebarNavHamburger');
    if (sidebarNavHamburger) {
        sidebarNavHamburger.addEventListener('click', function(e) {
            e.stopPropagation();
            if (window.innerWidth > 768 && sidebar.classList.contains('minimized')) {
                sidebar.classList.remove('minimized');
                localStorage.setItem('sidebarMinimized', 'false');
                
                // Expanding: Remove inline style locks and restore expanded state
                sidebar.style.width = '240px';
                sidebar.style.maxWidth = '';
                sidebar.style.minWidth = '';
                sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                if (mainContent) {
                    mainContent.style.marginLeft = '240px';
                    mainContent.style.width = 'calc(100vw - 240px)';
                    mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                }
            }
        });
    }
    
    // Mobile sidebar toggle
    if (sidebarToggle) {
    sidebarToggle.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('open');
                if (sidebarOverlay) {
            sidebarOverlay.classList.toggle('show');
                }
        }
    });
    }
    
    // Close mobile sidebar when clicking overlay
    if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', function() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('show');
        });
    }
    
    // Ensure navigation links don't expand sidebar on desktop - LOCK IT
    const sidebarLinks = sidebar.querySelectorAll('a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('open');
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('show');
                }
            } else {
                const isMinimized = sidebar.classList.contains('minimized');
                if (isMinimized) {
                    sidebar.style.width = '64px';
                    sidebar.style.transition = 'none';
                    sidebar.style.maxWidth = '64px';
                    sidebar.style.minWidth = '64px';
                    sidebar.classList.add('minimized');
                    localStorage.setItem('sidebarMinimized', 'true');
                    if (mainContent) {
                        mainContent.style.marginLeft = '64px';
                        mainContent.style.width = 'calc(100vw - 64px)';
                        mainContent.style.transition = 'none';
                    }
                }
            }
        });
        link.addEventListener('mouseenter', function(e) {
            if (window.innerWidth > 768 && sidebar.classList.contains('minimized')) {
                sidebar.style.width = '64px';
                sidebar.style.transition = 'none';
            }
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            if (sidebarOverlay) {
            sidebarOverlay.classList.remove('show');
            }
            
            // Restore minimized state on desktop
            const isMinimized = sidebar.classList.contains('minimized');
            if (mainContent) {
                if (isMinimized) {
                    mainContent.style.marginLeft = '64px';
                    mainContent.style.width = 'calc(100vw - 64px)';
                } else {
                    mainContent.style.marginLeft = '240px';
                    mainContent.style.width = 'calc(100vw - 240px)';
                }
                mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
        } else {
            // On mobile, ensure sidebar is closed and reset main content
            sidebar.classList.remove('minimized');
            if (mainContent) {
                mainContent.style.marginLeft = '0';
                mainContent.style.width = '100vw';
            }
        }
    });
    
});
</script>
