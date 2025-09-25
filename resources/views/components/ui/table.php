<?php
/**
 * Reusable Table Components
 * Various table types for data display
 */

/**
 * Data Table Component
 */
function renderDataTable($config = []) {
    $columns = $config['columns'] ?? [];
    $data = $config['data'] ?? [];
    $class = $config['class'] ?? '';
    $striped = $config['striped'] ?? true;
    $hoverable = $config['hoverable'] ?? true;
    $bordered = $config['bordered'] ?? false;
    $compact = $config['compact'] ?? false;
    $sortable = $config['sortable'] ?? false;
    $selectable = $config['selectable'] ?? false;
    $actions = $config['actions'] ?? [];
    $emptyMessage = $config['emptyMessage'] ?? 'No data available';
    
    $tableClass = 'data-table ' . $class;
    if ($striped) $tableClass .= ' striped';
    if ($hoverable) $tableClass .= ' hoverable';
    if ($bordered) $tableClass .= ' bordered';
    if ($compact) $tableClass .= ' compact';
    if ($sortable) $tableClass .= ' sortable';
    
    ob_start();
    ?>
    <div class="table-container">
        <table class="<?php echo $tableClass; ?>">
            <thead>
                <tr>
                    <?php if ($selectable): ?>
                        <th class="select-column">
                            <input type="checkbox" class="select-all" onchange="toggleAllRows(this)">
                        </th>
                    <?php endif; ?>
                    
                    <?php foreach ($columns as $column): ?>
                        <th class="<?php echo $column['class'] ?? ''; ?> <?php echo ($sortable && ($column['sortable'] ?? true)) ? 'sortable-column' : ''; ?>"
                            <?php echo $sortable ? 'onclick="sortTable(this, \'' . ($column['key'] ?? '') . '\')"' : ''; ?>>
                            <?php echo htmlspecialchars($column['label'] ?? ''); ?>
                            <?php if ($sortable && ($column['sortable'] ?? true)): ?>
                                <i class="sort-icon fas fa-sort"></i>
                            <?php endif; ?>
                        </th>
                    <?php endforeach; ?>
                    
                    <?php if (!empty($actions)): ?>
                        <th class="actions-column">Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr class="empty-row">
                        <td colspan="<?php echo count($columns) + ($selectable ? 1 : 0) + (!empty($actions) ? 1 : 0); ?>" class="text-center">
                            <div class="empty-state">
                                <i class="fas fa-inbox empty-icon"></i>
                                <p><?php echo htmlspecialchars($emptyMessage); ?></p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($data as $rowIndex => $row): ?>
                        <tr class="data-row" data-row-index="<?php echo $rowIndex; ?>">
                            <?php if ($selectable): ?>
                                <td class="select-column">
                                    <input type="checkbox" class="row-select" name="selected[]" value="<?php echo $row['id'] ?? $rowIndex; ?>">
                                </td>
                            <?php endif; ?>
                            
                            <?php foreach ($columns as $column): ?>
                                <td class="<?php echo $column['class'] ?? ''; ?>">
                                    <?php
                                    $key = $column['key'] ?? '';
                                    $value = $row[$key] ?? '';
                                    
                                    if (isset($column['render']) && is_callable($column['render'])) {
                                        echo $column['render']($value, $row, $rowIndex);
                                    } else {
                                        echo htmlspecialchars($value);
                                    }
                                    ?>
                                </td>
                            <?php endforeach; ?>
                            
                            <?php if (!empty($actions)): ?>
                                <td class="actions-column">
                                    <div class="action-buttons">
                                        <?php foreach ($actions as $action): ?>
                                            <?php
                                            $href = isset($action['href']) ? str_replace('{id}', $row['id'] ?? '', $action['href']) : '';
                                            $onclick = isset($action['onclick']) ? str_replace('{id}', $row['id'] ?? '', $action['onclick']) : '';
                                            ?>
                                            <button 
                                                class="action-btn <?php echo $action['class'] ?? ''; ?>"
                                                <?php echo $href ? 'onclick="window.location.href=\'' . htmlspecialchars($href) . '\'"' : ''; ?>
                                                <?php echo $onclick ? 'onclick="' . htmlspecialchars($onclick) . '"' : ''; ?>
                                                title="<?php echo htmlspecialchars($action['title'] ?? $action['label'] ?? ''); ?>"
                                            >
                                                <?php if (isset($action['icon'])): ?>
                                                    <i class="<?php echo $action['icon']; ?>"></i>
                                                <?php endif; ?>
                                                <?php if (isset($action['label'])): ?>
                                                    <span><?php echo htmlspecialchars($action['label']); ?></span>
                                                <?php endif; ?>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <?php if ($sortable || $selectable): ?>
        <script>
        <?php if ($sortable): ?>
        function sortTable(th, key) {
            const table = th.closest('table');
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr.data-row'));
            const icon = th.querySelector('.sort-icon');
            
            // Clear other sort icons
            table.querySelectorAll('.sort-icon').forEach(i => {
                if (i !== icon) {
                    i.className = 'sort-icon fas fa-sort';
                }
            });
            
            // Determine sort direction
            let ascending = true;
            if (icon.classList.contains('fa-sort-up')) {
                ascending = false;
                icon.className = 'sort-icon fas fa-sort-down';
            } else {
                ascending = true;
                icon.className = 'sort-icon fas fa-sort-up';
            }
            
            // Sort rows
            rows.sort((a, b) => {
                const aValue = a.cells[Array.from(th.parentNode.children).indexOf(th)].textContent.trim();
                const bValue = b.cells[Array.from(th.parentNode.children).indexOf(th)].textContent.trim();
                
                if (ascending) {
                    return aValue.localeCompare(bValue, undefined, { numeric: true });
                } else {
                    return bValue.localeCompare(aValue, undefined, { numeric: true });
                }
            });
            
            // Reorder DOM
            rows.forEach(row => tbody.appendChild(row));
        }
        <?php endif; ?>
        
        <?php if ($selectable): ?>
        function toggleAllRows(checkbox) {
            const table = checkbox.closest('table');
            const rowCheckboxes = table.querySelectorAll('.row-select');
            rowCheckboxes.forEach(cb => cb.checked = checkbox.checked);
        }
        <?php endif; ?>
        </script>
    <?php endif; ?>
    <?php
    return ob_get_clean();
}

/**
 * Simple Table Component
 */
function renderSimpleTable($columns, $data, $class = '') {
    return renderDataTable([
        'columns' => $columns,
        'data' => $data,
        'class' => $class,
        'striped' => true,
        'hoverable' => true
    ]);
}

/**
 * Users Table Component (specialized for user management)
 */
function renderUsersTable($users = [], $actions = []) {
    $columns = [
        [
            'key' => 'user_info',
            'label' => 'USER',
            'class' => 'user-info-column',
            'render' => function($value, $row) {
                return renderUserInfo($row);
            }
        ],
        [
            'key' => 'role',
            'label' => 'ROLE',
            'class' => 'role-column',
            'render' => function($value) {
                return '<span class="role-badge ' . strtolower($value) . '">' . htmlspecialchars($value) . '</span>';
            }
        ],
        [
            'key' => 'status',
            'label' => 'STATUS',
            'class' => 'status-column',
            'render' => function($value) {
                return '<span class="status-badge ' . strtolower($value) . '">' . htmlspecialchars($value) . '</span>';
            }
        ],
        [
            'key' => 'last_login',
            'label' => 'LAST LOGIN',
            'class' => 'last-login-column'
        ]
    ];
    
    $defaultActions = [
        [
            'label' => 'Deactivate',
            'icon' => 'fas fa-user-times',
            'class' => 'deactivate',
            'onclick' => 'deactivateUser({id})'
        ],
        [
            'label' => 'Permissions',
            'icon' => 'fas fa-key',
            'class' => 'permissions',
            'onclick' => 'editPermissions({id})'
        ],
        [
            'label' => 'Delete',
            'icon' => 'fas fa-trash',
            'class' => 'delete',
            'onclick' => 'deleteUser({id})'
        ]
    ];
    
    return renderDataTable([
        'columns' => $columns,
        'data' => $users,
        'actions' => !empty($actions) ? $actions : $defaultActions,
        'class' => 'users-table',
        'emptyMessage' => 'No users found'
    ]);
}

function renderUserInfo($user) {
    $name = $user['name'] ?? '';
    $email = $user['email'] ?? '';
    $avatar = $user['avatar'] ?? '';
    $avatarColor = $user['avatar_color'] ?? 'red';
    
    ob_start();
    ?>
    <div class="user-info">
        <div class="user-avatar <?php echo $avatarColor; ?>">
            <?php if ($avatar): ?>
                <img src="<?php echo htmlspecialchars($avatar); ?>" alt="<?php echo htmlspecialchars($name); ?>">
            <?php else: ?>
                <i class="fas fa-user"></i>
            <?php endif; ?>
        </div>
        <div class="user-details">
            <div class="user-name"><?php echo htmlspecialchars($name); ?></div>
            <?php if ($email): ?>
                <div class="user-email"><?php echo htmlspecialchars($email); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>
