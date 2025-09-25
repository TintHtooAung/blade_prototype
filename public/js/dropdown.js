/**
 * Modern Dropdown Component JavaScript
 * Handles dropdown interactions, search, and selection
 */

document.addEventListener('DOMContentLoaded', function() {
    initializeDropdowns();
});

function initializeDropdowns() {
    const dropdowns = document.querySelectorAll('.ui-dropdown');
    
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.dropdown-trigger');
        const menu = dropdown.querySelector('.dropdown-menu');
        const searchInput = dropdown.querySelector('.dropdown-search .search-input');
        const options = dropdown.querySelectorAll('.dropdown-option');
        const text = dropdown.querySelector('.dropdown-text');
        const select = dropdown.querySelector('.dropdown-select');
        const isSearchable = dropdown.classList.contains('searchable');
        const isMultiple = dropdown.classList.contains('multiple');
        
        // Toggle dropdown
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleDropdown(dropdown);
        });
        
        // Option selection
        options.forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation();
                selectOption(dropdown, option, isMultiple);
            });
        });
        
        // Search functionality
        if (isSearchable && searchInput) {
            searchInput.addEventListener('input', (e) => {
                filterOptions(dropdown, e.target.value);
            });
        }
        
        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                closeDropdown(dropdown);
            }
        });
        
        // Keyboard navigation
        dropdown.addEventListener('keydown', (e) => {
            handleKeyboard(e, dropdown);
        });
    });
}

function toggleDropdown(dropdown) {
    const trigger = dropdown.querySelector('.dropdown-trigger');
    const menu = dropdown.querySelector('.dropdown-menu');
    const searchInput = dropdown.querySelector('.dropdown-search .search-input');
    
    const isOpen = menu.classList.contains('show');
    
    // Close all other dropdowns
    document.querySelectorAll('.ui-dropdown .dropdown-menu.show').forEach(otherMenu => {
        if (otherMenu !== menu) {
            otherMenu.classList.remove('show');
            otherMenu.closest('.ui-dropdown').querySelector('.dropdown-trigger').classList.remove('active');
        }
    });
    
    if (isOpen) {
        closeDropdown(dropdown);
    } else {
        openDropdown(dropdown);
        
        // Focus search input if searchable
        if (searchInput) {
            setTimeout(() => searchInput.focus(), 100);
        }
    }
}

function openDropdown(dropdown) {
    const trigger = dropdown.querySelector('.dropdown-trigger');
    const menu = dropdown.querySelector('.dropdown-menu');
    
    trigger.classList.add('active');
    menu.classList.add('show');
    
    // Position dropdown if needed
    positionDropdown(dropdown);
}

function closeDropdown(dropdown) {
    const trigger = dropdown.querySelector('.dropdown-trigger');
    const menu = dropdown.querySelector('.dropdown-menu');
    const searchInput = dropdown.querySelector('.dropdown-search .search-input');
    
    trigger.classList.remove('active');
    menu.classList.remove('show');
    
    // Clear search
    if (searchInput) {
        searchInput.value = '';
        filterOptions(dropdown, '');
    }
}

function selectOption(dropdown, option, isMultiple) {
    if (option.classList.contains('disabled')) return;
    
    const value = option.getAttribute('data-value');
    const label = option.querySelector('.option-label').textContent;
    const select = dropdown.querySelector('.dropdown-select');
    const text = dropdown.querySelector('.dropdown-text');
    
    if (isMultiple) {
        handleMultipleSelection(dropdown, option, value, label);
    } else {
        handleSingleSelection(dropdown, option, value, label);
        closeDropdown(dropdown);
    }
    
    // Trigger change event
    const changeEvent = new CustomEvent('dropdown:change', {
        detail: { value, label, dropdown }
    });
    dropdown.dispatchEvent(changeEvent);
}

function handleSingleSelection(dropdown, option, value, label) {
    const select = dropdown.querySelector('.dropdown-select');
    const text = dropdown.querySelector('.dropdown-text');
    const options = dropdown.querySelectorAll('.dropdown-option');
    
    // Update select value
    select.value = value;
    
    // Update display text
    text.textContent = label;
    text.classList.remove('placeholder');
    
    // Update option states
    options.forEach(opt => {
        opt.classList.remove('selected');
        const checkIcon = opt.querySelector('.check-icon');
        if (checkIcon) checkIcon.style.display = 'none';
    });
    
    option.classList.add('selected');
    const checkIcon = option.querySelector('.check-icon');
    if (checkIcon) checkIcon.style.display = 'inline';
}

function handleMultipleSelection(dropdown, option, value, label) {
    const select = dropdown.querySelector('.dropdown-select');
    const text = dropdown.querySelector('.dropdown-text');
    const isSelected = option.classList.contains('selected');
    
    if (isSelected) {
        // Deselect
        option.classList.remove('selected');
        const checkIcon = option.querySelector('.check-icon');
        if (checkIcon) checkIcon.style.display = 'none';
        
        // Remove from select
        const optionElement = select.querySelector(`option[value="${value}"]`);
        if (optionElement) optionElement.selected = false;
    } else {
        // Select
        option.classList.add('selected');
        const checkIcon = option.querySelector('.check-icon');
        if (checkIcon) checkIcon.style.display = 'inline';
        
        // Add to select
        const optionElement = select.querySelector(`option[value="${value}"]`);
        if (optionElement) optionElement.selected = true;
    }
    
    updateMultipleDisplay(dropdown);
}

function updateMultipleDisplay(dropdown) {
    const text = dropdown.querySelector('.dropdown-text');
    const selectedOptions = dropdown.querySelectorAll('.dropdown-option.selected');
    const placeholder = dropdown.querySelector('.dropdown-select option[value=""]')?.textContent || 'Select...';
    
    if (selectedOptions.length === 0) {
        text.textContent = placeholder;
        text.classList.add('placeholder');
    } else if (selectedOptions.length === 1) {
        text.textContent = selectedOptions[0].querySelector('.option-label').textContent;
        text.classList.remove('placeholder');
    } else {
        text.textContent = `${selectedOptions.length} items selected`;
        text.classList.remove('placeholder');
    }
}

function filterOptions(dropdown, searchTerm) {
    const options = dropdown.querySelectorAll('.dropdown-option');
    const term = searchTerm.toLowerCase();
    
    options.forEach(option => {
        const label = option.querySelector('.option-label').textContent.toLowerCase();
        const matches = label.includes(term);
        option.style.display = matches ? 'flex' : 'none';
    });
}

function positionDropdown(dropdown) {
    const menu = dropdown.querySelector('.dropdown-menu');
    const rect = dropdown.getBoundingClientRect();
    const spaceBelow = window.innerHeight - rect.bottom;
    const spaceAbove = rect.top;
    
    // Reset positioning
    menu.style.top = '';
    menu.style.bottom = '';
    
    // Position based on available space
    if (spaceBelow < 200 && spaceAbove > spaceBelow) {
        menu.style.bottom = '100%';
        menu.style.marginBottom = '4px';
        menu.style.marginTop = '0';
    }
}

function handleKeyboard(e, dropdown) {
    const isOpen = dropdown.querySelector('.dropdown-menu').classList.contains('show');
    const options = Array.from(dropdown.querySelectorAll('.dropdown-option:not([style*="display: none"])'));
    const currentFocus = dropdown.querySelector('.dropdown-option.focus');
    
    switch (e.key) {
        case 'Enter':
            e.preventDefault();
            if (!isOpen) {
                toggleDropdown(dropdown);
            } else if (currentFocus) {
                currentFocus.click();
            }
            break;
            
        case 'Escape':
            e.preventDefault();
            closeDropdown(dropdown);
            dropdown.querySelector('.dropdown-trigger').focus();
            break;
            
        case 'ArrowDown':
            e.preventDefault();
            if (!isOpen) {
                toggleDropdown(dropdown);
            } else {
                const nextIndex = currentFocus ? options.indexOf(currentFocus) + 1 : 0;
                focusOption(options, nextIndex);
            }
            break;
            
        case 'ArrowUp':
            e.preventDefault();
            if (isOpen) {
                const prevIndex = currentFocus ? options.indexOf(currentFocus) - 1 : options.length - 1;
                focusOption(options, prevIndex);
            }
            break;
    }
}

function focusOption(options, index) {
    // Remove previous focus
    options.forEach(opt => opt.classList.remove('focus'));
    
    // Add focus to new option
    const targetIndex = Math.max(0, Math.min(index, options.length - 1));
    if (options[targetIndex]) {
        options[targetIndex].classList.add('focus');
        options[targetIndex].scrollIntoView({ block: 'nearest' });
    }
}

// Utility functions for external use
window.DropdownUtils = {
    getValue: function(dropdownElement) {
        const select = dropdownElement.querySelector('.dropdown-select');
        return select ? select.value : '';
    },
    
    setValue: function(dropdownElement, value) {
        const option = dropdownElement.querySelector(`.dropdown-option[data-value="${value}"]`);
        if (option) {
            const isMultiple = dropdownElement.classList.contains('multiple');
            selectOption(dropdownElement, option, isMultiple);
        }
    },
    
    getSelectedValues: function(dropdownElement) {
        const select = dropdownElement.querySelector('.dropdown-select');
        if (!select) return [];
        
        return Array.from(select.selectedOptions).map(opt => opt.value);
    },
    
    reset: function(dropdownElement) {
        const select = dropdownElement.querySelector('.dropdown-select');
        const text = dropdownElement.querySelector('.dropdown-text');
        const options = dropdownElement.querySelectorAll('.dropdown-option');
        const placeholder = select.querySelector('option[value=""]')?.textContent || 'Select...';
        
        // Reset select
        if (select) {
            select.selectedIndex = 0;
        }
        
        // Reset display
        text.textContent = placeholder;
        text.classList.add('placeholder');
        
        // Reset options
        options.forEach(opt => {
            opt.classList.remove('selected');
            const checkIcon = opt.querySelector('.check-icon');
            if (checkIcon) checkIcon.style.display = 'none';
        });
    }
};
