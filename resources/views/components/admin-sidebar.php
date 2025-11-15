<?php
// Admin Sidebar Component
$activePage = $activePage ?? 'dashboard';
$menuItems = [
    ['id' => 'dashboard', 'icon' => 'fas fa-home', 'label' => 'Admin Dashboard', 'url' => '/admin/dashboard'],
    ['id' => 'users', 'icon' => 'fas fa-users', 'label' => 'User Management', 'url' => '/admin/user-management'],
    ['id' => 'academic', 'icon' => 'fas fa-graduation-cap', 'label' => 'School Structure ', 'url' => '/admin/academic-management'],
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
    ['id' => 'reports', 'icon' => 'fas fa-file-alt', 'label' => 'Report Centre', 'url' => '/admin/report-centre']
];
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
        // Will be handled by updateMainContentState() after DOMContentLoaded
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
    <button class="sidebar-hamburger" id="sidebarHamburger" title="Close Sidebar">
        <i class="fas fa-times"></i>
    </button>
    
    <!-- Mobile Toggle Button -->
    <div class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </div>
    
    <!-- Logo Section removed - using header logo only -->
    
    <ul class="sidebar-nav" style="margin-top: 0; padding-top: 52px;">
        <!-- Hamburger menu as first nav item when minimized -->
        <li class="sidebar-hamburger-nav-item">
            <button class="sidebar-nav-hamburger" id="sidebarNavHamburger" title="Expand Sidebar">
                <i class="fas fa-bars"></i>
                <span class="sidebar-nav-label">Menu</span>
            </button>
        </li>
        <?php foreach ($menuItems as $item): ?>
        <li>
            <a href="<?php echo $item['url']; ?>" 
               class="<?php echo ($activePage === $item['id']) ? 'active' : ''; ?>"
               title="<?php echo $item['label']; ?>">
                <i class="<?php echo $item['icon']; ?>"></i> 
                <span class="sidebar-nav-label"><?php echo $item['label']; ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Mobile Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
/* Include shared hamburger menu styles */
@import url('/css/sidebar-hamburger.css');

/* Mobile Responsive - Mini Sidebar with Hamburger */
@media (max-width: 768px) {
    .sidebar {
        position: absolute !important;
        width: 64px !important;
        max-width: 64px !important;
        min-width: 64px !important;
        z-index: 100;
        transition: width 0.3s ease, max-width 0.3s ease;
    }
    
    /* Expanded state on mobile */
    .sidebar.mobile-expanded {
        width: 240px !important;
        max-width: 240px !important;
        min-width: 240px !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }
    
    .sidebar-nav-label {
        display: none !important;
    }
    
    .sidebar.mobile-expanded .sidebar-nav-label {
        display: inline !important;
    }
    
    .sidebar-toggle {
        display: none !important;
    }
    
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 99;
    }
    
    .sidebar-overlay.show {
        display: block;
    }
    
    .main-content {
        margin-left: 64px !important;
        width: calc(100vw - 64px) !important;
        transition: none;
    }
    
    /* Show mobile hamburger button */
    .sidebar-hamburger {
        display: flex !important;
        position: absolute;
        top: 16px;
        right: 12px;
        background: transparent;
        border: none;
        color: #1d1d1f;
        padding: 8px;
        cursor: pointer;
        border-radius: 6px;
        z-index: 10;
        width: 32px;
        height: 32px;
    }
    
    .sidebar-hamburger:hover {
        background: rgba(0, 122, 255, 0.1);
        color: #007AFF;
    }
    
    /* Show nav items in icon-only mode */
    .sidebar-nav a {
        justify-content: center;
        padding: 0.75rem 0.5rem;
    }
    
    .sidebar.mobile-expanded .sidebar-nav a {
        justify-content: flex-start;
        padding: 0.75rem 1rem;
    }
    
    .sidebar-nav i {
        margin-right: 0;
        font-size: 1.1rem;
    }
    
    .sidebar.mobile-expanded .sidebar-nav i {
        margin-right: 0.75rem;
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
// Main content will be updated by updateMainContentState() after DOMContentLoaded

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
        // Will be handled by updateMainContentState() after DOMContentLoaded
        // Set hamburger icon to bars (will be hidden, nav shows bars)
        if (sidebarHamburger) {
            const icon = sidebarHamburger.querySelector('i');
            if (icon) {
                icon.className = 'fas fa-bars';
            }
            sidebarHamburger.title = 'Expand Sidebar';
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
            // Will be handled by updateMainContentState() after DOMContentLoaded
            // Set hamburger icon to X (close)
            if (sidebarHamburger) {
                const icon = sidebarHamburger.querySelector('i');
                if (icon) {
                    icon.className = 'fas fa-times';
                }
                sidebarHamburger.title = 'Close Sidebar';
            }
        }
    }
    
    // Desktop hamburger menu toggle - ONLY way to expand/collapse sidebar
    if (sidebarHamburger) {
        sidebarHamburger.addEventListener('click', function(e) {
            e.stopPropagation();
            if (window.innerWidth > 768) {
                sidebar.classList.toggle('minimized');
                const isMinimized = sidebar.classList.contains('minimized');
                localStorage.setItem('sidebarMinimized', isMinimized);
                
                // Update sidebar width
                if (isMinimized) {
                    sidebar.style.width = '64px';
                    sidebar.style.maxWidth = '64px';
                    sidebar.style.minWidth = '64px';
                    sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                } else {
                    sidebar.style.width = '240px';
                    sidebar.style.maxWidth = '';
                    sidebar.style.minWidth = '';
                    sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                }
                
                // Update main content state
                updateMainContentState();
                
                // Toggle icon between X and bars
                const icon = sidebarHamburger.querySelector('i');
                if (isMinimized) {
                    if (icon) {
                        icon.className = 'fas fa-bars';
                    }
                    sidebarHamburger.title = 'Expand Sidebar';
                } else {
                    if (icon) {
                        icon.className = 'fas fa-times';
                    }
                    sidebarHamburger.title = 'Close Sidebar';
                }
            }
        });
    }
    
    // Hamburger nav item toggle (when minimized) - ONLY way to expand from minimized state
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
                
                // Update main content state
                updateMainContentState();
                
                // Update main hamburger icon to X (close)
                if (sidebarHamburger) {
                    const icon = sidebarHamburger.querySelector('i');
                    if (icon) {
                        icon.className = 'fas fa-times';
                    }
                    sidebarHamburger.title = 'Close Sidebar';
                }
            }
        });
    }
    
    // Mobile sidebar toggle functionality
    if (window.innerWidth <= 768) {
        const hamburger = document.getElementById('sidebarHamburger');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (hamburger) {
            hamburger.addEventListener('click', function(e) {
                e.stopPropagation();
                sidebar.classList.toggle('mobile-expanded');
                if (overlay) {
                    overlay.classList.toggle('show');
                }
            });
        }
        
        // Close sidebar when clicking overlay
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('mobile-expanded');
                overlay.classList.remove('show');
            });
        }
        
        // Close sidebar when clicking a nav link
        const navLinks = sidebar.querySelectorAll('.sidebar-nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('mobile-expanded');
                    if (overlay) {
                        overlay.classList.remove('show');
                    }
                }
            });
        });
    }
    
    // Centralized function to update main content based on sidebar state
    function updateMainContentState() {
        if (!mainContent || window.innerWidth <= 768) return;
        
        const isMinimized = sidebar.classList.contains('minimized');
        
        if (isMinimized) {
            // Minimized state: main content should use full space (64px sidebar)
            mainContent.style.marginLeft = '64px';
            mainContent.style.width = 'calc(100vw - 64px)';
            mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        } else {
            // Expanded state: main content should account for 240px sidebar
            mainContent.style.marginLeft = '240px';
            mainContent.style.width = 'calc(100vw - 240px)';
            mainContent.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        }
    }
    
    // MutationObserver to catch sidebar state changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                updateMainContentState();
            }
        });
    });
    
    // Observe sidebar for class changes
    if (sidebar) {
        observer.observe(sidebar, {
            attributes: true,
            attributeFilter: ['class']
        });
    }
    
    // Ensure navigation links do NOT expand sidebar on desktop - LOCK IT
    const sidebarLinks = sidebar.querySelectorAll('a');
    sidebarLinks.forEach(link => {
        // Skip hamburger nav item - it should expand sidebar
        if (link.closest('.sidebar-hamburger-nav-item')) {
            return;
        }
        
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                // Mobile: close sidebar when clicking nav link
                sidebar.classList.remove('mobile-expanded');
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('show');
                }
            } else {
                // Desktop: Keep sidebar in current state (minimized stays minimized)
                // Do NOT expand sidebar when clicking navigation links
                const isMinimized = sidebar.classList.contains('minimized');
                if (isMinimized) {
                    // Keep minimized - don't expand
                    sidebar.style.width = '64px';
                    sidebar.style.transition = 'none';
                    sidebar.style.maxWidth = '64px';
                    sidebar.style.minWidth = '64px';
                    sidebar.classList.add('minimized');
                    localStorage.setItem('sidebarMinimized', 'true');
                    updateMainContentState();
                }
            }
        });
        
        link.addEventListener('mouseenter', function(e) {
            if (window.innerWidth > 768 && sidebar.classList.contains('minimized')) {
                // Prevent expansion on hover - keep minimized
                sidebar.style.width = '64px';
                sidebar.style.transition = 'none';
            }
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            // Desktop: Restore state and update main content
            updateMainContentState();
        } else {
            // Mobile: Keep sidebar mini (64px)
            sidebar.style.width = '64px';
            sidebar.style.maxWidth = '64px';
            sidebar.style.minWidth = '64px';
            if (mainContent) {
                mainContent.style.marginLeft = '64px';
                mainContent.style.width = 'calc(100vw - 64px)';
            }
        }
    });
    
    // Initial state update
    updateMainContentState();
});
</script>
