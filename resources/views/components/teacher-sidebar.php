<?php
// Teacher Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Teacher Sidebar -->
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
        <li>
            <a href="/teacher/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" title="Teacher Dashboard">
                <i class="fas fa-home"></i> <span class="sidebar-nav-label">Teacher Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/teacher/event-calendar" class="<?php echo $activePage === 'event-calendar' ? 'active' : ''; ?>" title="Event Calendar">
                <i class="fas fa-calendar-alt"></i> <span class="sidebar-nav-label">Event Calendar</span>
            </a>
        </li>
        <li>
            <a href="/teacher/announcements" class="<?php echo $activePage === 'announcements' ? 'active' : ''; ?>" title="Announcements">
                <i class="fas fa-bullhorn"></i> <span class="sidebar-nav-label">Announcements</span> <span class="badge bg-danger rounded-pill ms-auto">3</span>
            </a>
        </li>
        <li>
            <a href="/teacher/schedule-view" class="<?php echo $activePage === 'schedule-view' ? 'active' : ''; ?>" title="Schedule View">
                <i class="fas fa-calendar"></i> <span class="sidebar-nav-label">Schedule View</span>
            </a>
        </li>
        <li>
            <a href="/teacher/attendance" class="<?php echo $activePage === 'attendance' ? 'active' : ''; ?>" title="Attendance">
                <i class="fas fa-user-check"></i> <span class="sidebar-nav-label">Attendance</span>
            </a>
        </li>
        <li class="sidebar-section-header" style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">CLASS MANAGEMENT</li>
        <li>
            <a href="/teacher/student-profiles" class="<?php echo $activePage === 'student-profiles' ? 'active' : ''; ?>" title="Student Profiles">
                <i class="fas fa-user-graduate"></i> <span class="sidebar-nav-label">Student Profiles</span>
            </a>
        </li>
        <li>
            <a href="/teacher/subject-profiles" class="<?php echo $activePage === 'subject-profiles' ? 'active' : ''; ?>" title="Subject Profiles">
                <i class="fas fa-book"></i> <span class="sidebar-nav-label">Subject Profiles</span>
            </a>
        </li>
        <li>
            <a href="/teacher/class-profiles" class="<?php echo $activePage === 'class-profiles' ? 'active' : ''; ?>" title="Class Profiles">
                <i class="fas fa-chalkboard"></i> <span class="sidebar-nav-label">Class Profiles</span>
            </a>
        </li>
        <li>
            <a href="/teacher/exam-results" class="<?php echo $activePage === 'exam-results' ? 'active' : ''; ?>" title="Exam Results">
                <i class="fas fa-chart-bar"></i> <span class="sidebar-nav-label">Exam Results</span>
            </a>
        </li>
        <li>
            <a href="/teacher/enter-marks" class="<?php echo $activePage === 'enter-marks' ? 'active' : ''; ?>" title="Enter Marks">
                <i class="fas fa-edit"></i> <span class="sidebar-nav-label">Enter Marks</span>
            </a>
        </li>
        <li>
            <a href="/teacher/homework" class="<?php echo $activePage === 'homework' ? 'active' : ''; ?>" title="Homework">
                <i class="fas fa-tasks"></i> <span class="sidebar-nav-label">Homework</span>
            </a>
        </li>
        <li class="sidebar-section-header" style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">REQUESTS</li>
        <li>
            <a href="/teacher/leave-request" class="<?php echo $activePage === 'leave-request' ? 'active' : ''; ?>" title="Leave Request">
                <i class="fas fa-calendar-times"></i> <span class="sidebar-nav-label">Leave Request</span>
            </a>
        </li>
    </ul>
</div>

<!-- Mobile Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
/* Include shared hamburger menu styles */
@import url('/css/sidebar-hamburger.css');

/* Hide section headers in minimized state */
.sidebar.minimized .sidebar-section-header {
    display: none;
}

/* Hide badge in minimized state */
.sidebar.minimized .badge {
    display: none;
}

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
