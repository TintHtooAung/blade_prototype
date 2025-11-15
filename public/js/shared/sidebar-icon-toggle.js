/**
 * Sidebar Icon Toggle Utility
 * Smart Campus Nova Hub
 * 
 * Handles automatic icon switching between hamburger (bars) and close (X)
 * Based on sidebar expanded/minimized state
 */

(function() {
    'use strict';

    /**
     * Update hamburger icon based on sidebar state
     * @param {HTMLElement} hamburgerButton - The hamburger button element
     * @param {boolean} isMinimized - Whether the sidebar is minimized
     */
    function updateHamburgerIcon(hamburgerButton, isMinimized) {
        if (!hamburgerButton) return;
        
        const icon = hamburgerButton.querySelector('i');
        if (!icon) return;
        
        if (isMinimized) {
            // Sidebar is minimized - show bars icon (button will be hidden, nav item shows bars)
            icon.className = 'fas fa-bars';
            hamburgerButton.title = 'Expand Sidebar';
        } else {
            // Sidebar is expanded - show X icon (close)
            icon.className = 'fas fa-times';
            hamburgerButton.title = 'Close Sidebar';
        }
    }

    /**
     * Initialize icon state on page load
     */
    function initializeIconState() {
        const sidebar = document.getElementById('sidebar');
        const hamburgerButton = document.getElementById('sidebarHamburger');
        
        if (!sidebar || !hamburgerButton) return;
        
        // Check if sidebar is minimized
        const isMinimized = sidebar.classList.contains('minimized');
        updateHamburgerIcon(hamburgerButton, isMinimized);
    }

    /**
     * Observe sidebar class changes to update icon
     */
    function observeSidebarChanges() {
        const sidebar = document.getElementById('sidebar');
        const hamburgerButton = document.getElementById('sidebarHamburger');
        
        if (!sidebar || !hamburgerButton) return;
        
        // Create mutation observer to watch for class changes
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const isMinimized = sidebar.classList.contains('minimized');
                    updateHamburgerIcon(hamburgerButton, isMinimized);
                }
            });
        });
        
        // Start observing
        observer.observe(sidebar, {
            attributes: true,
            attributeFilter: ['class']
        });
    }

    /**
     * Initialize on DOM ready
     */
    function init() {
        initializeIconState();
        observeSidebarChanges();
    }

    // Start when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Expose API
    window.SidebarIconToggle = {
        updateIcon: updateHamburgerIcon,
        reinitialize: init
    };

})();

