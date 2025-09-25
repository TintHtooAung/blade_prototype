<?php
/**
 * Reusable Search Components
 * Various search input types for consistent UI
 */

/**
 * Basic Search Input Component
 */
function renderSearchInput($config = []) {
    $placeholder = $config['placeholder'] ?? 'Search...';
    $name = $config['name'] ?? 'search';
    $value = $config['value'] ?? '';
    $class = $config['class'] ?? '';
    $icon = $config['icon'] ?? 'fas fa-search';
    $iconPosition = $config['iconPosition'] ?? 'left'; // left, right, both
    $clearable = $config['clearable'] ?? true;
    $autofocus = $config['autofocus'] ?? false;
    $disabled = $config['disabled'] ?? false;
    
    $wrapperClass = 'search-input-wrapper ' . $class;
    if ($disabled) {
        $wrapperClass .= ' disabled';
    }
    
    ob_start();
    ?>
    <div class="<?php echo $wrapperClass; ?>">
        <?php if ($iconPosition === 'left' || $iconPosition === 'both'): ?>
            <i class="search-icon left <?php echo $icon; ?>"></i>
        <?php endif; ?>
        
        <input 
            type="text" 
            name="<?php echo $name; ?>"
            class="search-input"
            placeholder="<?php echo htmlspecialchars($placeholder); ?>"
            value="<?php echo htmlspecialchars($value); ?>"
            <?php echo $autofocus ? 'autofocus' : ''; ?>
            <?php echo $disabled ? 'disabled' : ''; ?>
        >
        
        <?php if ($clearable && $value): ?>
            <button type="button" class="clear-btn" onclick="this.previousElementSibling.value=''; this.style.display='none';">
                <i class="fas fa-times"></i>
            </button>
        <?php endif; ?>
        
        <?php if ($iconPosition === 'right' || $iconPosition === 'both'): ?>
            <i class="search-icon right <?php echo $icon; ?>"></i>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Advanced Search Bar with Filters
 */
function renderAdvancedSearch($config = []) {
    $placeholder = $config['placeholder'] ?? 'Search...';
    $filters = $config['filters'] ?? [];
    $searchName = $config['searchName'] ?? 'search';
    $searchValue = $config['searchValue'] ?? '';
    $class = $config['class'] ?? '';
    $showFilterToggle = $config['showFilterToggle'] ?? true;
    
    ob_start();
    ?>
    <div class="advanced-search <?php echo $class; ?>">
        <div class="search-main">
            <?php echo renderSearchInput([
                'placeholder' => $placeholder,
                'name' => $searchName,
                'value' => $searchValue,
                'class' => 'advanced-search-input'
            ]); ?>
            
            <?php if ($showFilterToggle && !empty($filters)): ?>
                <button type="button" class="filter-toggle-btn" onclick="toggleFilters(this)">
                    <i class="fas fa-filter"></i>
                    <span>Filters</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($filters)): ?>
            <div class="search-filters" style="display: none;">
                <div class="filters-grid">
                    <?php foreach ($filters as $filter): ?>
                        <div class="filter-item">
                            <label class="filter-label"><?php echo htmlspecialchars($filter['label'] ?? ''); ?></label>
                            <?php if ($filter['type'] === 'dropdown'): ?>
                                <?php echo renderDropdown([
                                    'options' => $filter['options'] ?? [],
                                    'name' => $filter['name'] ?? '',
                                    'placeholder' => $filter['placeholder'] ?? 'All',
                                    'value' => $filter['value'] ?? '',
                                    'class' => 'filter-dropdown'
                                ]); ?>
                            <?php elseif ($filter['type'] === 'daterange'): ?>
                                <div class="date-range-inputs">
                                    <input 
                                        type="date" 
                                        name="<?php echo $filter['name']; ?>_from"
                                        class="date-input"
                                        value="<?php echo $filter['from'] ?? ''; ?>"
                                        placeholder="From"
                                    >
                                    <span class="date-separator">to</span>
                                    <input 
                                        type="date" 
                                        name="<?php echo $filter['name']; ?>_to"
                                        class="date-input"
                                        value="<?php echo $filter['to'] ?? ''; ?>"
                                        placeholder="To"
                                    >
                                </div>
                            <?php elseif ($filter['type'] === 'text'): ?>
                                <input 
                                    type="text" 
                                    name="<?php echo $filter['name']; ?>"
                                    class="filter-text-input"
                                    placeholder="<?php echo htmlspecialchars($filter['placeholder'] ?? ''); ?>"
                                    value="<?php echo htmlspecialchars($filter['value'] ?? ''); ?>"
                                >
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="filter-actions">
                    <button type="button" class="btn-apply-filters">
                        <i class="fas fa-check"></i> Apply Filters
                    </button>
                    <button type="button" class="btn-clear-filters" onclick="clearAllFilters()">
                        <i class="fas fa-times"></i> Clear All
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
    function toggleFilters(btn) {
        const filters = btn.closest('.advanced-search').querySelector('.search-filters');
        const icon = btn.querySelector('.fa-chevron-down, .fa-chevron-up');
        
        if (filters.style.display === 'none' || !filters.style.display) {
            filters.style.display = 'block';
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            filters.style.display = 'none';
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }
    
    function clearAllFilters() {
        const filters = document.querySelector('.search-filters');
        const inputs = filters.querySelectorAll('input, select');
        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }
    </script>
    <?php
    return ob_get_clean();
}

/**
 * Quick Search Component (minimal)
 */
function renderQuickSearch($placeholder = 'Quick search...', $name = 'q') {
    return renderSearchInput([
        'placeholder' => $placeholder,
        'name' => $name,
        'class' => 'quick-search',
        'clearable' => false
    ]);
}

/**
 * Search with Suggestions Component
 */
function renderSearchWithSuggestions($config = []) {
    $placeholder = $config['placeholder'] ?? 'Search...';
    $name = $config['name'] ?? 'search';
    $suggestions = $config['suggestions'] ?? [];
    $class = $config['class'] ?? '';
    
    ob_start();
    ?>
    <div class="search-with-suggestions <?php echo $class; ?>">
        <?php echo renderSearchInput([
            'placeholder' => $placeholder,
            'name' => $name,
            'class' => 'suggestions-search-input'
        ]); ?>
        
        <?php if (!empty($suggestions)): ?>
            <div class="search-suggestions" style="display: none;">
                <?php foreach ($suggestions as $suggestion): ?>
                    <div class="suggestion-item" onclick="selectSuggestion(this)">
                        <?php if (isset($suggestion['icon'])): ?>
                            <i class="suggestion-icon <?php echo $suggestion['icon']; ?>"></i>
                        <?php endif; ?>
                        <span class="suggestion-text"><?php echo htmlspecialchars($suggestion['text'] ?? ''); ?></span>
                        <?php if (isset($suggestion['category'])): ?>
                            <span class="suggestion-category"><?php echo htmlspecialchars($suggestion['category']); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
    function selectSuggestion(item) {
        const searchInput = item.closest('.search-with-suggestions').querySelector('.search-input');
        const suggestionText = item.querySelector('.suggestion-text').textContent;
        searchInput.value = suggestionText;
        item.closest('.search-suggestions').style.display = 'none';
    }
    </script>
    <?php
    return ob_get_clean();
}
?>
