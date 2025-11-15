<!-- Guardian Sidebar -->
<div class="sidebar" id="sidebar" data-minimized-state="" style="">
<script>
// Apply minimized state immediately if saved, before any rendering - LOCK IT IN PLACE
(function() {
    try {
        const savedState = localStorage.getItem('sidebarMinimized');
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
            const guardianContainer = document.querySelector('.guardian-container');
            const guardianMain = document.querySelector('.guardian-main');
            if (guardianContainer) {
                guardianContainer.style.marginLeft = '64px';
                guardianContainer.style.transition = 'none';
            }
            if (guardianMain) {
                guardianMain.style.width = 'calc(100vw - 64px)';
                guardianMain.style.transition = 'none';
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
            <a href="/guardian/dashboard" class="<?php echo ($activePage ?? '') === 'guardian-dashboard' ? 'active' : ''; ?>" title="Dashboard">
                <i class="fas fa-home"></i> <span class="sidebar-nav-label">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/guardian/attendance" class="<?php echo ($activePage ?? '') === 'guardian-attendance' ? 'active' : ''; ?>" title="Attendance">
                <i class="fas fa-user-check"></i> <span class="sidebar-nav-label">Attendance</span>
            </a>
        </li>
        <li>
            <a href="/guardian/reports" class="<?php echo ($activePage ?? '') === 'guardian-reports' ? 'active' : ''; ?>" title="Reports">
                <i class="fas fa-chart-line"></i> <span class="sidebar-nav-label">Reports</span>
            </a>
        </li>
        <li>
            <a href="/guardian/announcements" class="<?php echo ($activePage ?? '') === 'guardian-announcements' ? 'active' : ''; ?>" title="Announcements">
                <i class="fas fa-bullhorn"></i> <span class="sidebar-nav-label">Announcements</span>
            </a>
        </li>
        <li>
            <a href="/guardian/profile" class="<?php echo ($activePage ?? '') === 'guardian-profile' ? 'active' : ''; ?>" title="Profile & Settings">
                <i class="fas fa-user-cog"></i> <span class="sidebar-nav-label">Profile & Settings</span>
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
/* Mobile Responsive - Mini Sidebar with Hamburger */
@media (max-width: 768px) {
    .sidebar {
        position: absolute !important;
        width: 64px !important;
        max-width: 64px !important;
        min-width: 64px !important;
        top: 0;
        left: 0;
        height: 100vh;
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
    
    .guardian-container {
        margin-left: 64px !important;
        width: calc(100vw - 64px) !important;
    }
    
    .guardian-main {
        padding: 12px;
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
    
    .sidebar-overlay {
        display: none !important;
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
            const guardianContainer = document.querySelector('.guardian-container');
            const guardianMain = document.querySelector('.guardian-main');
            if (sidebar) {
                sidebar.classList.add('minimized');
            }
            if (guardianContainer) {
                guardianContainer.style.marginLeft = '64px';
                guardianContainer.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
            if (guardianMain) {
                guardianMain.style.width = 'calc(100vw - 64px)';
                guardianMain.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
        });
    }
})();

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarHamburger = document.getElementById('sidebarHamburger');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const guardianContainer = document.querySelector('.guardian-container');
    const guardianMain = document.querySelector('.guardian-main');
    
    if (!sidebar) return;
    
    // Ensure sidebar state is maintained (redundant check for safety) - LOCK IT
    const savedState = localStorage.getItem('sidebarMinimized');
    if (savedState === 'true' && window.innerWidth > 768) {
        if (!sidebar.classList.contains('minimized')) {
            sidebar.classList.add('minimized');
        }
        if (sidebar) {
            sidebar.style.width = '64px';
            sidebar.style.transition = 'none';
            sidebar.style.maxWidth = '64px';
            sidebar.style.minWidth = '64px';
        }
        if (guardianContainer) {
            guardianContainer.style.marginLeft = '64px';
            guardianContainer.style.transition = 'none';
        }
        if (guardianMain) {
            guardianMain.style.width = 'calc(100vw - 64px)';
            guardianMain.style.transition = 'none';
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
            if (guardianContainer) {
                guardianContainer.style.marginLeft = '240px';
                guardianContainer.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            }
            if (guardianMain) {
                guardianMain.style.width = 'calc(100vw - 240px)';
                guardianMain.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
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
                    if (guardianContainer) {
                        guardianContainer.style.marginLeft = '64px';
                        guardianContainer.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                    if (guardianMain) {
                        guardianMain.style.width = 'calc(100vw - 64px)';
                        guardianMain.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                } else {
                    // Expanding: Remove inline style locks and restore expanded state
                    sidebar.style.width = '240px';
                    sidebar.style.maxWidth = '';
                    sidebar.style.minWidth = '';
                    sidebar.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    if (guardianContainer) {
                        guardianContainer.style.marginLeft = '240px';
                        guardianContainer.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                    if (guardianMain) {
                        guardianMain.style.width = 'calc(100vw - 240px)';
                        guardianMain.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
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
                if (guardianContainer) {
                    guardianContainer.style.marginLeft = '240px';
                    guardianContainer.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                }
                if (guardianMain) {
                    guardianMain.style.width = 'calc(100vw - 240px)';
                    guardianMain.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
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
    
    if (sidebarToggle && sidebarOverlay) {
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
                        if (guardianContainer) {
                            guardianContainer.style.marginLeft = '64px';
                            guardianContainer.style.transition = 'none';
                        }
                        if (guardianMain) {
                            guardianMain.style.width = 'calc(100vw - 64px)';
                            guardianMain.style.transition = 'none';
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
                if (guardianContainer) {
                    if (isMinimized) {
                        guardianContainer.style.marginLeft = '64px';
                    } else {
                        guardianContainer.style.marginLeft = '240px';
                    }
                    guardianContainer.style.transition = 'margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                }
                if (guardianMain) {
                    if (isMinimized) {
                        guardianMain.style.width = 'calc(100vw - 64px)';
                    } else {
                        guardianMain.style.width = 'calc(100vw - 240px)';
                    }
                    guardianMain.style.transition = 'width 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                }
            } else {
                // Mobile: Keep sidebar mini (64px)
                sidebar.style.width = '64px';
                sidebar.style.maxWidth = '64px';
                sidebar.style.minWidth = '64px';
                if (guardianContainer) {
                    guardianContainer.style.marginLeft = '64px';
                }
                if (guardianMain) {
                    guardianMain.style.width = 'calc(100vw - 64px)';
                }
            }
        });
    }
});
</script>



