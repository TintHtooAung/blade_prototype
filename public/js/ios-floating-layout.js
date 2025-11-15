/**
 * iOS-Inspired Floating Layout System
 * Handles sidebar, header, and navigation interactions
 */

(function() {
    'use strict';

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFloatingLayout);
    } else {
        initFloatingLayout();
    }

    function initFloatingLayout() {
        initSidebarState();
        initSidebarToggle();
        initMobileNavigation();
        initSmoothScrolling();
        initContentAnimations();
        initResponsiveAdjustments();
        preventNavLinksFromExpanding();
    }

    /**
     * Initialize sidebar state from localStorage
     */
    function initSidebarState() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');
        
        if (!sidebar) return;

        // Check saved state
        const savedState = localStorage.getItem('sidebarMinimized');
        const isDesktop = window.innerWidth > 768;

        if (savedState === 'true' && isDesktop) {
            // Apply minimized state
            sidebar.classList.add('minimized');
            document.body.classList.add('sidebar-minimized');
            
            if (mainContent) {
                mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                mainContent.style.marginLeft = 'var(--ios-sidebar-mini)';
                mainContent.style.paddingLeft = 'var(--ios-spacing)';
                mainContent.style.paddingRight = 'var(--ios-spacing)';
                mainContent.style.width = 'calc(100vw - var(--ios-sidebar-mini))';
            }
        } else if (isDesktop) {
            // Default expanded state
            sidebar.classList.remove('minimized');
            document.body.classList.remove('sidebar-minimized');
            
            if (mainContent) {
                mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                mainContent.style.marginLeft = 'var(--content-left-offset)';
                mainContent.style.width = 'calc(100vw - var(--ios-sidebar-width))';
            }
        }
    }

    /**
     * Initialize sidebar toggle functionality
     */
    function initSidebarToggle() {
        const sidebar = document.getElementById('sidebar');
        const sidebarHamburger = document.getElementById('sidebarHamburger');
        const sidebarNavHamburger = document.getElementById('sidebarNavHamburger');
        const mainContent = document.querySelector('.main-content');

        if (!sidebar) return;

        // Desktop hamburger toggle
        if (sidebarHamburger) {
            sidebarHamburger.addEventListener('click', function(e) {
                e.stopPropagation();
                if (window.innerWidth > 768) {
                    toggleSidebar();
                }
            });
        }

        // Nav hamburger toggle (when minimized)
        if (sidebarNavHamburger) {
            sidebarNavHamburger.addEventListener('click', function(e) {
                e.stopPropagation();
                if (window.innerWidth > 768) {
                    expandSidebar();
                }
            });
        }

        function toggleSidebar() {
            const isMinimized = sidebar.classList.toggle('minimized');
            document.body.classList.toggle('sidebar-minimized');
            
            // Save state
            localStorage.setItem('sidebarMinimized', isMinimized);

            // Animate sidebar
            sidebar.style.transition = 'var(--ios-transition)';
            
            if (mainContent) {
                mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                if (isMinimized) {
                    mainContent.style.marginLeft = 'var(--ios-sidebar-mini)';
                    mainContent.style.paddingLeft = 'var(--ios-spacing)';
                    mainContent.style.paddingRight = 'var(--ios-spacing)';
                    mainContent.style.width = 'calc(100vw - var(--ios-sidebar-mini))';
                } else {
                    mainContent.style.marginLeft = 'var(--content-left-offset)';
                    mainContent.style.paddingLeft = 'var(--ios-spacing)';
                    mainContent.style.paddingRight = 'var(--ios-spacing)';
                    mainContent.style.width = 'calc(100vw - var(--ios-sidebar-width))';
                }
            }

            // Add bounce effect
            sidebar.style.transform = 'scale(0.98)';
            setTimeout(() => {
                sidebar.style.transform = 'scale(1)';
            }, 150);
        }

        function expandSidebar() {
            sidebar.classList.remove('minimized');
            document.body.classList.remove('sidebar-minimized');
            localStorage.setItem('sidebarMinimized', 'false');
            
            sidebar.style.transition = 'var(--ios-transition)';
            
            if (mainContent) {
                mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                mainContent.style.marginLeft = 'var(--content-left-offset)';
                mainContent.style.paddingLeft = 'var(--ios-spacing)';
                mainContent.style.paddingRight = 'var(--ios-spacing)';
                mainContent.style.width = 'calc(100vw - var(--ios-sidebar-width))';
            }

            // Add bounce effect
            sidebar.style.transform = 'scale(1.02)';
            setTimeout(() => {
                sidebar.style.transform = 'scale(1)';
            }, 150);
        }
    }

    /**
     * Initialize mobile navigation
     */
    function initMobileNavigation() {
        const sidebar = document.getElementById('sidebar');
        const sidebarHamburger = document.getElementById('sidebarHamburger');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (!sidebar) return;

        // Mobile hamburger toggle
        if (sidebarHamburger) {
            sidebarHamburger.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.stopPropagation();
                    toggleMobileSidebar();
                }
            });
        }

        // Overlay click to close
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeMobileSidebar);
        }

        // Close on nav link click (mobile)
        const navLinks = sidebar.querySelectorAll('.sidebar-nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    closeMobileSidebar();
                }
            });
        });

        function toggleMobileSidebar() {
            sidebar.classList.toggle('mobile-expanded');
            if (sidebarOverlay) {
                sidebarOverlay.classList.toggle('show');
            }
        }

        function closeMobileSidebar() {
            sidebar.classList.remove('mobile-expanded');
            if (sidebarOverlay) {
                sidebarOverlay.classList.remove('show');
            }
        }
    }

    /**
     * Initialize smooth scrolling
     */
    function initSmoothScrolling() {
        // Add smooth scroll behavior to internal links
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Initialize content animations
     */
    function initContentAnimations() {
        // Animate cards on scroll (intersection observer)
        const cards = document.querySelectorAll('.modern-card, .modern-stat-card, .student-profile-card');
        
        if (!cards.length) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 50); // Stagger animation
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    }

    /**
     * Handle responsive adjustments
     */
    function initResponsiveAdjustments() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');

        if (!sidebar || !mainContent) return;

        let resizeTimer;
        
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(handleResize, 250);
        });

        function handleResize() {
            const isDesktop = window.innerWidth > 768;
            
            if (isDesktop) {
                // Desktop: restore saved state
                const savedState = localStorage.getItem('sidebarMinimized');
                const isMinimized = savedState === 'true';
                
                if (isMinimized) {
                    sidebar.classList.add('minimized');
                    document.body.classList.add('sidebar-minimized');
                    mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    mainContent.style.marginLeft = 'var(--ios-sidebar-mini)';
                    mainContent.style.paddingLeft = 'var(--ios-spacing)';
                    mainContent.style.paddingRight = 'var(--ios-spacing)';
                    mainContent.style.width = 'calc(100vw - var(--ios-sidebar-mini))';
                } else {
                    sidebar.classList.remove('minimized');
                    document.body.classList.remove('sidebar-minimized');
                    mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    mainContent.style.marginLeft = 'var(--content-left-offset)';
                    mainContent.style.paddingLeft = 'var(--ios-spacing)';
                    mainContent.style.paddingRight = 'var(--ios-spacing)';
                    mainContent.style.width = 'calc(100vw - var(--ios-sidebar-width))';
                }
                
                // Remove mobile classes
                sidebar.classList.remove('mobile-expanded');
                const overlay = document.getElementById('sidebarOverlay');
                if (overlay) {
                    overlay.classList.remove('show');
                }
            } else {
                // Mobile: always mini, can expand temporarily
                sidebar.classList.remove('minimized');
                document.body.classList.remove('sidebar-minimized');
                mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                mainContent.style.marginLeft = 'var(--ios-sidebar-mini)';
                mainContent.style.paddingLeft = 'var(--ios-spacing)';
                mainContent.style.width = 'calc(100vw - var(--ios-sidebar-mini))';
            }
        }
    }

    /**
     * Add floating effect to header on scroll
     */
    function initHeaderScrollEffect() {
        const header = document.querySelector('.unified-header');
        if (!header) return;

        let lastScroll = 0;
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                header.style.boxShadow = '0 12px 32px rgba(0, 0, 0, 0.12)';
                header.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            } else {
                header.style.boxShadow = 'var(--ios-shadow-float)';
                header.style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            }
            
            lastScroll = currentScroll;
        });
    }

    // Initialize header scroll effect
    initHeaderScrollEffect();

    /**
     * Add touch support for mobile
     */
    function initTouchSupport() {
        const sidebar = document.getElementById('sidebar');
        if (!sidebar || window.innerWidth > 768) return;

        let touchStartX = 0;
        let touchEndX = 0;

        sidebar.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, false);

        sidebar.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, false);

        function handleSwipe() {
            const swipeDistance = touchEndX - touchStartX;
            
            // Swipe right to expand, left to collapse
            if (swipeDistance > 50 && !sidebar.classList.contains('mobile-expanded')) {
                sidebar.classList.add('mobile-expanded');
                const overlay = document.getElementById('sidebarOverlay');
                if (overlay) overlay.classList.add('show');
            } else if (swipeDistance < -50 && sidebar.classList.contains('mobile-expanded')) {
                sidebar.classList.remove('mobile-expanded');
                const overlay = document.getElementById('sidebarOverlay');
                if (overlay) overlay.classList.remove('show');
            }
        }
    }

    initTouchSupport();

    /**
     * Prevent navigation links from expanding sidebar when minimized
     * Only hamburger menu should expand the sidebar
     */
    function preventNavLinksFromExpanding() {
        const sidebar = document.getElementById('sidebar');
        if (!sidebar) return;

        // Get all navigation anchor links (excluding hamburger button which is a button element)
        const navLinks = sidebar.querySelectorAll('.sidebar-nav a');
        const hamburgerNavItem = sidebar.querySelector('.sidebar-hamburger-nav-item');
        
        navLinks.forEach(link => {
            // Skip if this link is inside the hamburger nav item
            if (link.closest('.sidebar-hamburger-nav-item')) {
                return; // Skip hamburger nav item links
            }
            
            link.addEventListener('click', function(e) {
                // Only prevent expansion on desktop when sidebar is minimized
                if (window.innerWidth > 768 && sidebar.classList.contains('minimized')) {
                    // Keep sidebar minimized - don't expand
                    // Navigation links should NOT expand the sidebar
                    sidebar.classList.add('minimized');
                    document.body.classList.add('sidebar-minimized');
                    localStorage.setItem('sidebarMinimized', 'true');
                    
                    // Ensure sidebar stays at minimized width
                    sidebar.style.width = 'var(--ios-sidebar-mini)';
                    sidebar.style.maxWidth = 'var(--ios-sidebar-mini)';
                    sidebar.style.minWidth = 'var(--ios-sidebar-mini)';
                    sidebar.style.transition = 'width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    
                    const mainContent = document.querySelector('.main-content');
                    if (mainContent) {
                        mainContent.style.transition = 'margin-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), padding-right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                        mainContent.style.marginLeft = 'var(--ios-sidebar-mini)';
                        mainContent.style.paddingLeft = 'var(--ios-spacing)';
                        mainContent.style.paddingRight = 'var(--ios-spacing)';
                        mainContent.style.width = 'calc(100vw - var(--ios-sidebar-mini))';
                    }
                }
            });
        });
    }

})();

