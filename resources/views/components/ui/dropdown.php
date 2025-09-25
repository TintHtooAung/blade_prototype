<?php
/**
 * Reusable Dropdown Component
 * Usage: renderDropdown(['options' => [...], 'placeholder' => '...', 'name' => '...', 'class' => '...'])
 */

function renderDropdown($config = []) {
    $options = $config['options'] ?? [];
    $placeholder = $config['placeholder'] ?? 'Select an option';
    $name = $config['name'] ?? 'dropdown';
    $id = $config['id'] ?? $name;
    $class = $config['class'] ?? '';
    $value = $config['value'] ?? '';
    $disabled = $config['disabled'] ?? false;
    $required = $config['required'] ?? false;
    $multiple = $config['multiple'] ?? false;
    $searchable = $config['searchable'] ?? false;
    
    $dropdownClass = 'ui-dropdown ' . $class;
    if ($searchable) {
        $dropdownClass .= ' searchable';
    }
    if ($disabled) {
        $dropdownClass .= ' disabled';
    }
    
    ob_start();
    ?>
    <div class="<?php echo $dropdownClass; ?>" data-dropdown="<?php echo $id; ?>">
        <select 
            name="<?php echo $name . ($multiple ? '[]' : ''); ?>" 
            id="<?php echo $id; ?>"
            class="dropdown-select"
            <?php echo $disabled ? 'disabled' : ''; ?>
            <?php echo $required ? 'required' : ''; ?>
            <?php echo $multiple ? 'multiple' : ''; ?>
            <?php echo $searchable ? 'data-searchable="true"' : ''; ?>
        >
            <?php if (!$multiple && $placeholder): ?>
                <option value="" <?php echo empty($value) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($placeholder); ?>
                </option>
            <?php endif; ?>
            
            <?php foreach ($options as $option): ?>
                <?php
                $optionValue = is_array($option) ? ($option['value'] ?? '') : $option;
                $optionLabel = is_array($option) ? ($option['label'] ?? $optionValue) : $option;
                $optionDisabled = is_array($option) ? ($option['disabled'] ?? false) : false;
                $isSelected = is_array($value) ? in_array($optionValue, $value) : ($value == $optionValue);
                ?>
                <option 
                    value="<?php echo htmlspecialchars($optionValue); ?>"
                    <?php echo $isSelected ? 'selected' : ''; ?>
                    <?php echo $optionDisabled ? 'disabled' : ''; ?>
                >
                    <?php echo htmlspecialchars($optionLabel); ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <div class="dropdown-trigger">
            <span class="dropdown-text"><?php echo htmlspecialchars($placeholder); ?></span>
            <i class="dropdown-icon fas fa-chevron-down"></i>
        </div>
        
        <?php if ($searchable): ?>
        <div class="dropdown-search">
            <input type="text" class="search-input" placeholder="Search options...">
            <i class="search-icon fas fa-search"></i>
        </div>
        <?php endif; ?>
        
        <div class="dropdown-menu">
            <div class="dropdown-options">
                <?php foreach ($options as $option): ?>
                    <?php
                    $optionValue = is_array($option) ? ($option['value'] ?? '') : $option;
                    $optionLabel = is_array($option) ? ($option['label'] ?? $optionValue) : $option;
                    $optionIcon = is_array($option) ? ($option['icon'] ?? '') : '';
                    $optionDisabled = is_array($option) ? ($option['disabled'] ?? false) : false;
                    $isSelected = is_array($value) ? in_array($optionValue, $value) : ($value == $optionValue);
                    ?>
                    <div 
                        class="dropdown-option <?php echo $isSelected ? 'selected' : ''; ?> <?php echo $optionDisabled ? 'disabled' : ''; ?>"
                        data-value="<?php echo htmlspecialchars($optionValue); ?>"
                    >
                        <?php if ($optionIcon): ?>
                            <i class="option-icon <?php echo $optionIcon; ?>"></i>
                        <?php endif; ?>
                        <span class="option-label"><?php echo htmlspecialchars($optionLabel); ?></span>
                        <?php if ($isSelected): ?>
                            <i class="check-icon fas fa-check"></i>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Quick dropdown for simple use cases
 */
function renderSimpleDropdown($options, $name, $placeholder = 'Select...', $value = '') {
    return renderDropdown([
        'options' => $options,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => $value
    ]);
}

/**
 * Multi-select dropdown
 */
function renderMultiDropdown($options, $name, $placeholder = 'Select multiple...', $values = []) {
    return renderDropdown([
        'options' => $options,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => $values,
        'multiple' => true
    ]);
}

/**
 * Searchable dropdown
 */
function renderSearchableDropdown($options, $name, $placeholder = 'Search and select...', $value = '') {
    return renderDropdown([
        'options' => $options,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => $value,
        'searchable' => true
    ]);
}
?>
