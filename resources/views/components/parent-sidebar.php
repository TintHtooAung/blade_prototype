<?php
// Parent Sidebar Component
$activePage = $activePage ?? 'dashboard';
?>
<!-- Parent Sidebar -->
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
    <button class="sidebar-hamburger" id="sidebarHamburger" title="Close Sidebar">
        <i class="fas fa-times"></i>
    </button>
    
    <!-- Mobile Toggle Button -->
    <div class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </div>
    
    <!-- Logo Section -->
    <div class="sidebar-logo" style="display: none !important; visibility: hidden !important; opacity: 0 !important; height: 0 !important; overflow: hidden !important; padding: 0 !important; margin: 0 !important;">
        <img src="/images/smart-campus-logo.svg" alt="Smart Campus Logo" class="sidebar-logo-img" style="display: none !important; visibility: hidden !important;">
    </div>
    
    <ul class="sidebar-nav" style="margin-top: 0; padding-top: 52px;">
        <!-- Hamburger menu as first nav item when minimized -->
        <li class="sidebar-hamburger-nav-item">
            <button class="sidebar-nav-hamburger" id="sidebarNavHamburger" title="Expand Sidebar">
                <i class="fas fa-bars"></i>
                <span class="sidebar-nav-label">Menu</span>
            </button>
        </li>
        <li>
            <a href="/parent/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" title="Parent Dashboard">
                <i class="fas fa-home"></i> <span class="sidebar-nav-label">Parent Dashboard</span>
            </a>
        </li>
        
        <li class="sidebar-section-header" style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">STUDENT INFORMATION</li>
        
        <li>
            <a href="/parent/my-children" class="<?php echo $activePage === 'my-children' ? 'active' : ''; ?>" title="My Children">
                <i class="fas fa-child"></i> <span class="sidebar-nav-label">My Children</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/attendance" class="<?php echo $activePage === 'attendance' ? 'active' : ''; ?>" title="Attendance">
                <i class="fas fa-user-check"></i> <span class="sidebar-nav-label">Attendance</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/academic-reports" class="<?php echo $activePage === 'academic-reports' ? 'active' : ''; ?>" title="Academic Reports">
                <i class="fas fa-file-alt"></i> <span class="sidebar-nav-label">Academic Reports</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/exam-results" class="<?php echo $activePage === 'exam-results' ? 'active' : ''; ?>" title="Exam Results">
                <i class="fas fa-chart-bar"></i> <span class="sidebar-nav-label">Exam Results</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/homework" class="<?php echo $activePage === 'homework' ? 'active' : ''; ?>" title="Homework">
                <i class="fas fa-tasks"></i> <span class="sidebar-nav-label">Homework</span>
            </a>
        </li>
        
        <li class="sidebar-section-header" style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">COMMUNICATIONS</li>
        
        <li>
            <a href="/parent/announcements" class="<?php echo $activePage === 'announcements' ? 'active' : ''; ?>" title="Announcements">
                <i class="fas fa-bullhorn"></i> <span class="sidebar-nav-label">Announcements</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/event-calendar" class="<?php echo $activePage === 'event-calendar' ? 'active' : ''; ?>" title="Event Calendar">
                <i class="fas fa-calendar-alt"></i> <span class="sidebar-nav-label">Event Calendar</span>
            </a>
        </li>
        
        <li class="sidebar-section-header" style="margin: 1rem 0; color: #a0aec0; font-size: 0.75rem; text-transform: uppercase; padding: 0 1.5rem;">REQUESTS & PAYMENTS</li>
        
        <li>
            <a href="/parent/leave-request" class="<?php echo $activePage === 'leave-request' ? 'active' : ''; ?>" title="Leave Request">
                <i class="fas fa-calendar-times"></i> <span class="sidebar-nav-label">Leave Request</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/fee-payment" class="<?php echo $activePage === 'fee-payment' ? 'active' : ''; ?>" title="Fee Payment">
                <i class="fas fa-credit-card"></i> <span class="sidebar-nav-label">Fee Payment</span>
            </a>
        </li>
        
        <li>
            <a href="/parent/payment-history" class="<?php echo $activePage === 'payment-history' ? 'active' : ''; ?>" title="Payment History">
                <i class="fas fa-history"></i> <span class="sidebar-nav-label">Payment History</span>
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

/* Mobile Responsive Only */
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
        
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('mobile-expanded');
                overlay.classList.remove('show');
            });
        }
        
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
    
    // Ensure navigation links don't expand sidebar on desktop - LOCK IT
    const sidebarLinks = sidebar.querySelectorAll('a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth > 768) {
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
            // Desktop: Restore minimized state
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
});
</script>

