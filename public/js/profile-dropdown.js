// Profile Dropdown Management
let currentDropdown = null;

// Toggle profile dropdown
function toggleProfileDropdown() {
    const dropdown = document.getElementById('profileDropdown');
    if (!dropdown) return;
    
    if (dropdown.style.display === 'none' || !dropdown.style.display) {
        dropdown.style.display = 'block';
        currentDropdown = dropdown;
    } else {
        dropdown.style.display = 'none';
        currentDropdown = null;
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const profileSection = document.querySelector('.profile-badge-container');
    const dropdown = document.getElementById('profileDropdown');
    
    if (dropdown && profileSection && !profileSection.contains(event.target)) {
        dropdown.style.display = 'none';
        currentDropdown = null;
    }
});

// Open Settings Modal
function openSettingsModal() {
    const modal = document.getElementById('settingsModal');
    if (modal) {
        modal.style.display = 'flex';
        updateSettingsModalValues();
    } else {
        createSettingsModal();
    }
}

function createSettingsModal() {
    const currentTheme = localStorage.getItem('theme') || 'light';
    const currentLang = localStorage.getItem('language') || 'en';
    
    const modal = document.createElement('div');
    modal.id = 'settingsModal';
    modal.className = 'settings-modal';
    modal.innerHTML = `
        <div class="settings-modal-content">
            <div class="settings-modal-header">
                <h3><i class="fas fa-cog"></i> Settings</h3>
                <button class="settings-modal-close" onclick="closeModal('settingsModal')">&times;</button>
            </div>
            <div class="settings-modal-body">
                <div class="settings-section">
                    <label class="settings-label">
                        <i class="fas fa-palette"></i>
                        Theme
                    </label>
                    <div class="settings-options">
                        <div class="settings-option ${currentTheme === 'light' ? 'selected' : ''}" onclick="selectTheme('light')">
                            <i class="fas fa-sun"></i>
                            <span>Light</span>
                            <i class="fas fa-check settings-check"></i>
                        </div>
                        <div class="settings-option ${currentTheme === 'dark' ? 'selected' : ''}" onclick="selectTheme('dark')">
                            <i class="fas fa-moon"></i>
                            <span>Dark</span>
                            <i class="fas fa-check settings-check"></i>
                        </div>
                    </div>
                </div>

                <div class="settings-divider"></div>

                <div class="settings-section">
                    <label class="settings-label">
                        <i class="fas fa-globe"></i>
                        Language
                    </label>
                    <div class="settings-options">
                        <div class="settings-option ${currentLang === 'en' ? 'selected' : ''}" onclick="selectLanguage('en')">
                            <span class="settings-flag">🇬🇧</span>
                            <span>English</span>
                            <i class="fas fa-check settings-check"></i>
                        </div>
                        <div class="settings-option ${currentLang === 'my' ? 'selected' : ''}" onclick="selectLanguage('my')">
                            <span class="settings-flag">🇲🇲</span>
                            <span>Myanmar</span>
                            <i class="fas fa-check settings-check"></i>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-primary" onclick="closeModal('settingsModal')">Done</button>
                </div>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    setTimeout(() => modal.style.display = 'flex', 10);
}

function updateSettingsModalValues() {
    const currentTheme = localStorage.getItem('theme') || 'light';
    const currentLang = localStorage.getItem('language') || 'en';
    
    // Update theme selection
    document.querySelectorAll('#settingsModal .settings-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    const modal = document.getElementById('settingsModal');
    if (modal) {
        const themeOptions = modal.querySelectorAll('.settings-section:first-child .settings-option');
        themeOptions.forEach((option, index) => {
            if ((index === 0 && currentTheme === 'light') || (index === 1 && currentTheme === 'dark')) {
                option.classList.add('selected');
            }
        });
        
        const langOptions = modal.querySelectorAll('.settings-section:last-child .settings-option');
        langOptions.forEach((option, index) => {
            if ((index === 0 && currentLang === 'en') || (index === 1 && currentLang === 'my')) {
                option.classList.add('selected');
            }
        });
    }
}

function selectTheme(theme) {
    localStorage.setItem('theme', theme);
    applyTheme(theme);
    updateSettingsModalValues();
    showNotification(`Theme changed to ${theme === 'light' ? 'Light' : 'Dark'} mode`);
}

function selectLanguage(lang) {
    localStorage.setItem('language', lang);
    updateSettingsModalValues();
    const langName = lang === 'en' ? 'English' : 'Myanmar';
    showNotification(`Language changed to ${langName}`);
}

function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-theme');
        document.body.classList.remove('light-theme');
    } else {
        document.body.classList.add('light-theme');
        document.body.classList.remove('dark-theme');
    }
}

// View Profile
function viewProfile() {
    window.location.href = '/profile';
}

// Change Password Modal
function openChangePasswordModal() {
    const modal = document.getElementById('changePasswordModal');
    if (modal) {
        modal.style.display = 'flex';
    } else {
        createChangePasswordModal();
    }
}

function createChangePasswordModal() {
    const modal = document.createElement('div');
    modal.id = 'changePasswordModal';
    modal.className = 'settings-modal';
    modal.innerHTML = `
        <div class="settings-modal-content">
            <div class="settings-modal-header">
                <h3><i class="fas fa-key"></i> Change Password</h3>
                <button class="settings-modal-close" onclick="closeModal('changePasswordModal')">&times;</button>
            </div>
            <div class="settings-modal-body">
                <form id="changePasswordForm" onsubmit="handleChangePassword(event)">
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" id="currentPassword" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="newPasswordChange">New Password</label>
                        <input type="password" id="newPasswordChange" class="form-control" required minlength="8">
                        <small class="form-text">Must be at least 8 characters</small>
                    </div>
                    <div class="form-group">
                        <label for="confirmPasswordChange">Confirm New Password</label>
                        <input type="password" id="confirmPasswordChange" class="form-control" required>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="closeModal('changePasswordModal')">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    setTimeout(() => modal.style.display = 'flex', 10);
}

function handleChangePassword(event) {
    event.preventDefault();
    
    const newPassword = document.getElementById('newPasswordChange').value;
    const confirmPassword = document.getElementById('confirmPasswordChange').value;
    
    if (newPassword !== confirmPassword) {
        showNotification('Passwords do not match', 'error');
        return;
    }
    
    if (newPassword.length < 8) {
        showNotification('Password must be at least 8 characters', 'error');
        return;
    }
    
    // Simulate API call
    const submitBtn = event.target.querySelector('button[type="submit"]');
    submitBtn.textContent = 'Changing...';
    submitBtn.disabled = true;
    
    setTimeout(() => {
        submitBtn.textContent = 'Change Password';
        submitBtn.disabled = false;
        closeModal('changePasswordModal');
        showNotification('Password changed successfully', 'success');
        document.getElementById('changePasswordForm').reset();
    }, 1500);
}

// Close Modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

// Logout
function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = '/auth/login';
    }
}

// Notification System
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        <span>${message}</span>
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => notification.classList.add('show'), 10);
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Apply saved theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);
});
