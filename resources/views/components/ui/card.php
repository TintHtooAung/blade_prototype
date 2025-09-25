<?php
/**
 * Reusable Card Components
 * Various card types for consistent UI across the application
 */

/**
 * Statistics Card Component
 */
function renderStatCard($config = []) {
    $title = $config['title'] ?? '';
    $value = $config['value'] ?? '0';
    $icon = $config['icon'] ?? 'fas fa-chart-bar';
    $iconColor = $config['iconColor'] ?? 'blue';
    $badge = $config['badge'] ?? '';
    $badgeIcon = $config['badgeIcon'] ?? '';
    $class = $config['class'] ?? '';
    $href = $config['href'] ?? '';
    
    $cardClass = 'stat-card ' . $class;
    $wrapperTag = $href ? 'a' : 'div';
    $wrapperAttrs = $href ? 'href="' . htmlspecialchars($href) . '"' : '';
    
    ob_start();
    ?>
    <<?php echo $wrapperTag; ?> class="<?php echo $cardClass; ?>" <?php echo $wrapperAttrs; ?>>
        <div class="stat-icon <?php echo $iconColor; ?>">
            <i class="<?php echo $icon; ?>"></i>
        </div>
        <div class="stat-content">
            <h3><?php echo htmlspecialchars($value); ?></h3>
            <p><?php echo htmlspecialchars($title); ?></p>
            <?php if ($badge): ?>
                <div class="stat-badge">
                    <?php if ($badgeIcon): ?>
                        <i class="<?php echo $badgeIcon; ?>"></i>
                    <?php endif; ?>
                    <?php echo htmlspecialchars($badge); ?>
                </div>
            <?php endif; ?>
        </div>
    </<?php echo $wrapperTag; ?>>
    <?php
    return ob_get_clean();
}

/**
 * Dashboard Card Component
 */
function renderDashboardCard($config = []) {
    $title = $config['title'] ?? '';
    $icon = $config['icon'] ?? '';
    $content = $config['content'] ?? '';
    $actions = $config['actions'] ?? [];
    $class = $config['class'] ?? '';
    $headerClass = $config['headerClass'] ?? '';
    
    ob_start();
    ?>
    <div class="dashboard-card <?php echo $class; ?>">
        <?php if ($title || $icon): ?>
            <div class="dashboard-card-header <?php echo $headerClass; ?>">
                <?php if ($icon): ?>
                    <i class="<?php echo $icon; ?>"></i>
                <?php endif; ?>
                <?php if ($title): ?>
                    <h5><?php echo htmlspecialchars($title); ?></h5>
                <?php endif; ?>
                <?php if (!empty($actions)): ?>
                    <div class="card-actions">
                        <?php foreach ($actions as $action): ?>
                            <button 
                                class="action-btn <?php echo $action['class'] ?? ''; ?>"
                                <?php echo isset($action['onclick']) ? 'onclick="' . htmlspecialchars($action['onclick']) . '"' : ''; ?>
                            >
                                <?php if (isset($action['icon'])): ?>
                                    <i class="<?php echo $action['icon']; ?>"></i>
                                <?php endif; ?>
                                <?php echo htmlspecialchars($action['label'] ?? ''); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="dashboard-card-body">
            <?php echo $content; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * User Card Component
 */
function renderUserCard($config = []) {
    $name = $config['name'] ?? '';
    $email = $config['email'] ?? '';
    $avatar = $config['avatar'] ?? '';
    $avatarColor = $config['avatarColor'] ?? 'red';
    $role = $config['role'] ?? '';
    $status = $config['status'] ?? '';
    $lastLogin = $config['lastLogin'] ?? '';
    $actions = $config['actions'] ?? [];
    $class = $config['class'] ?? '';
    
    ob_start();
    ?>
    <div class="user-card <?php echo $class; ?>">
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
        
        <?php if ($role): ?>
            <div class="user-role">
                <span class="role-badge <?php echo strtolower($role); ?>"><?php echo htmlspecialchars($role); ?></span>
            </div>
        <?php endif; ?>
        
        <?php if ($status): ?>
            <div class="user-status">
                <span class="status-badge <?php echo strtolower($status); ?>"><?php echo htmlspecialchars($status); ?></span>
            </div>
        <?php endif; ?>
        
        <?php if ($lastLogin): ?>
            <div class="last-login"><?php echo htmlspecialchars($lastLogin); ?></div>
        <?php endif; ?>
        
        <?php if (!empty($actions)): ?>
            <div class="user-actions">
                <?php foreach ($actions as $action): ?>
                    <button 
                        class="action-btn <?php echo $action['class'] ?? ''; ?>"
                        <?php echo isset($action['onclick']) ? 'onclick="' . htmlspecialchars($action['onclick']) . '"' : ''; ?>
                    >
                        <?php if (isset($action['icon'])): ?>
                            <i class="<?php echo $action['icon']; ?>"></i>
                        <?php endif; ?>
                        <?php echo htmlspecialchars($action['label'] ?? ''); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Content Card Component (for general use)
 */
function renderContentCard($config = []) {
    $title = $config['title'] ?? '';
    $content = $config['content'] ?? '';
    $footer = $config['footer'] ?? '';
    $class = $config['class'] ?? '';
    $padding = $config['padding'] ?? 'normal';
    
    $cardClass = 'content-card ' . $class;
    if ($padding === 'compact') {
        $cardClass .= ' compact';
    } elseif ($padding === 'spacious') {
        $cardClass .= ' spacious';
    }
    
    ob_start();
    ?>
    <div class="<?php echo $cardClass; ?>">
        <?php if ($title): ?>
            <div class="content-card-header">
                <h3><?php echo htmlspecialchars($title); ?></h3>
            </div>
        <?php endif; ?>
        
        <div class="content-card-body">
            <?php echo $content; ?>
        </div>
        
        <?php if ($footer): ?>
            <div class="content-card-footer">
                <?php echo $footer; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
?>
