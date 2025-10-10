<?php
$pageTitle = 'Smart Campus Nova Hub - User Management';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'User Management';
$activePage = 'users';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2>User Management</h2>
    </div>
</div>

<!-- Quick Stats -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Total Users</h3>
            <div class="stat-number" id="totalUsers">0</div>
            <div class="stat-change">Portal accounts</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-content">
            <h3>Active Users</h3>
            <div class="stat-number" id="activeUsers">0</div>
            <div class="stat-change positive">Online access</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-sync-alt"></i>
        </div>
        <div class="stat-content">
            <h3>Last Refresh</h3>
            <div class="stat-number" style="font-size:16px;" id="lastRefresh">Never</div>
            <div class="stat-change">From profiles</div>
        </div>
    </div>
</div>

<!-- User Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Portal User Accounts</h3>
        <button class="simple-btn primary" onclick="refreshUsersFromProfiles()">
            <i class="fas fa-sync-alt"></i> Refresh from Profiles
        </button>
    </div>
    
    <!-- Filters -->
    <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <label style="font-weight: 600; color: #666;">Filters:</label>
            <select class="filter-select" id="roleFilter" onchange="applyFilters()">
                <option value="all">All Roles</option>
                <option value="Guardian Portal">Guardian Portal</option>
                <option value="Teacher Portal">Teacher Portal</option>
                <option value="Reception Access">Reception Access</option>
                <option value="IT Access">IT Access</option>
                <option value="Staff Access">Staff Access</option>
            </select>
            <select class="filter-select" id="statusFilter" onchange="applyFilters()">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <input type="text" class="simple-search" id="searchUser" placeholder="Search by name, ID or email..." onkeyup="applyFilters()">
        </div>
    </div>
    
    <!-- User Table -->
    <div class="simple-table-container" style="margin-top:16px;">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Profile</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <tr class="no-data-row">
                    <td colspan="8" style="text-align:center; padding:40px; color:#999;">
                        <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                        No user accounts found. Click "Refresh from Profiles" to load created accounts.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-edit"></i> Edit User Account</h4>
            <button class="icon-btn" onclick="closeEditModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>User ID (Fixed)</label>
                        <input type="text" class="form-input" id="editUserId" readonly>
                    </div>
                    <div class="form-group">
                        <label>Role (Fixed from Profile)</label>
                        <input type="text" class="form-input" id="editRole" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Email Address</label>
                        <input type="email" class="form-input" id="editEmail" placeholder="user@email.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>New Password</label>
                        <input type="password" class="form-input" id="editPassword" placeholder="Leave blank to keep current">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Account Status</label>
                        <select class="form-select" id="editStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveUserEdit()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<script>
let userAccounts = [];
let currentEditingUserId = null;

// Load users from localStorage on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedUsers = localStorage.getItem('userAccounts');
    if (savedUsers) {
        userAccounts = JSON.parse(savedUsers);
    }
    
    renderUserTable();
    updateStats();
    
    const lastRefresh = localStorage.getItem('lastUserRefresh');
    if (lastRefresh) {
        document.getElementById('lastRefresh').textContent = new Date(lastRefresh).toLocaleString();
    } else {
        document.getElementById('lastRefresh').textContent = new Date().toLocaleString();
    }
});

function refreshUsersFromProfiles() {
    const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
    const createdAccounts = [];
    
    // Filter only accounts that have been created
    Object.values(portalSetups).forEach(setup => {
        if (setup.accountCreated) {
            createdAccounts.push({
                userId: setup.userId,
                email: setup.email,
                fullName: setup.fullName,
                role: setup.role,
                profileId: setup.profileId,
                profileType: setup.profileType,
                status: setup.status || 'active',
                password: '********', // Hidden for security
                updatedAt: setup.updatedAt
            });
        }
    });
    
    userAccounts = createdAccounts;
    
    // Save to localStorage
    localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
    localStorage.setItem('lastUserRefresh', new Date().toISOString());
    
    // Update UI
    document.getElementById('lastRefresh').textContent = new Date().toLocaleString();
    renderUserTable();
    updateStats();
    
    if (createdAccounts.length === 0) {
        alert('No portal accounts found.\n\nPlease complete portal setup and create accounts in Student, Teacher, or Staff profile pages first.');
    } else {
        alert(`Successfully refreshed ${createdAccounts.length} user account(s) from profiles!`);
    }
}

function renderUserTable() {
    const tbody = document.getElementById('userTableBody');
    
    if (userAccounts.length === 0) {
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="8" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No user accounts found. Click "Refresh from Profiles" to load created accounts.
            </td>
        </tr>`;
        return;
    }
    
    const filteredUsers = applyDataFilters();
    
    tbody.innerHTML = filteredUsers.map(user => `
        <tr>
            <td><strong>${user.userId}</strong></td>
            <td>${user.email}</td>
            <td>${user.fullName}</td>
            <td><span class="badge tutorial-badge">${user.role}</span></td>
            <td>${user.profileId} (${user.profileType})</td>
            <td><span class="status-badge ${user.status === 'active' ? 'paid' : 'draft'}">${user.status === 'active' ? 'Active' : 'Inactive'}</span></td>
            <td>${user.updatedAt}</td>
            <td>
                <button class="simple-btn-icon" onclick="editUser('${user.userId}')" title="Edit User">
                    <i class="fas fa-edit"></i>
                </button>
                ${user.status === 'active' ? `
                    <button class="simple-btn-icon" onclick="deactivateUser('${user.userId}')" title="Deactivate User" style="color: #d32f2f;">
                        <i class="fas fa-user-times"></i>
                    </button>
                ` : `
                    <button class="simple-btn-icon" onclick="reactivateUser('${user.userId}')" title="Reactivate User" style="color: #2e7d32;">
                        <i class="fas fa-user-check"></i>
                    </button>
                    <button class="simple-btn-icon" onclick="deleteUser('${user.userId}')" title="Delete User" style="color: #d32f2f;">
                        <i class="fas fa-trash"></i>
                    </button>
                `}
            </td>
        </tr>
    `).join('');
}

function applyDataFilters() {
    const roleFilter = document.getElementById('roleFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchUser').value.toLowerCase();
    
    return userAccounts.filter(user => {
        if (roleFilter !== 'all' && user.role !== roleFilter) return false;
        if (statusFilter !== 'all' && user.status !== statusFilter) return false;
        if (searchTerm && !user.fullName.toLowerCase().includes(searchTerm) && 
            !user.userId.toLowerCase().includes(searchTerm) && 
            !user.email.toLowerCase().includes(searchTerm)) return false;
        return true;
    });
}

function applyFilters() {
    renderUserTable();
}

function editUser(userId) {
    const user = userAccounts.find(u => u.userId === userId);
    if (!user) return;
    
    currentEditingUserId = userId;
    document.getElementById('editUserId').value = user.userId;
    document.getElementById('editRole').value = user.role;
    document.getElementById('editEmail').value = user.email;
    document.getElementById('editPassword').value = '';
    document.getElementById('editStatus').value = user.status;
    
    document.getElementById('editUserModal').style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editUserModal').style.display = 'none';
    currentEditingUserId = null;
}

function saveUserEdit() {
    const user = userAccounts.find(u => u.userId === currentEditingUserId);
    if (!user) return;
    
    // Update email
    const newEmail = document.getElementById('editEmail').value.trim();
    if (!newEmail) {
        alert('Email cannot be empty');
        return;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(newEmail)) {
        alert('Please enter a valid email address');
        return;
    }
    
    user.email = newEmail;
    
    // Update password if provided
    const newPassword = document.getElementById('editPassword').value;
    if (newPassword) {
        user.password = '********'; // Simulated password update
    }
    
    // Update status
    user.status = document.getElementById('editStatus').value;
    user.updatedAt = new Date().toLocaleString();
    
    // Update in portalSetups as well
    const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
    if (portalSetups[user.profileId]) {
        portalSetups[user.profileId].email = user.email;
        portalSetups[user.profileId].status = user.status;
        portalSetups[user.profileId].updatedAt = user.updatedAt;
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
    }
    
    // Save to localStorage
    localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
    
    closeEditModal();
    renderUserTable();
    updateStats();
    
    alert('User account updated successfully!');
}

function updateStats() {
    const total = userAccounts.length;
    const active = userAccounts.filter(u => u.status === 'active').length;
    
    document.getElementById('totalUsers').textContent = total;
    document.getElementById('activeUsers').textContent = active;
}

function deactivateUser(userId) {
    const user = userAccounts.find(u => u.userId === userId);
    if (!user) return;
    
    showConfirmDialog({
        title: 'Deactivate User',
        message: `Are you sure you want to deactivate ${user.fullName}? This will prevent them from accessing the portal.`,
        confirmText: 'Deactivate',
        confirmIcon: 'fas fa-user-times',
        onConfirm: () => {
            user.status = 'inactive';
            user.updatedAt = new Date().toLocaleString();
            
            // Update in portalSetups
            const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
            if (portalSetups[user.profileId]) {
                portalSetups[user.profileId].status = 'inactive';
                portalSetups[user.profileId].updatedAt = user.updatedAt;
                localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
            }
            
            // Save to localStorage
            localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
            
            renderUserTable();
            updateStats();
            alert('User deactivated successfully!');
        }
    });
}

function reactivateUser(userId) {
    const user = userAccounts.find(u => u.userId === userId);
    if (!user) return;
    
    showConfirmDialog({
        title: 'Reactivate User',
        message: `Are you sure you want to reactivate ${user.fullName}? This will restore their portal access.`,
        confirmText: 'Reactivate',
        confirmIcon: 'fas fa-user-check',
        onConfirm: () => {
            user.status = 'active';
            user.updatedAt = new Date().toLocaleString();
            
            // Update in portalSetups
            const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
            if (portalSetups[user.profileId]) {
                portalSetups[user.profileId].status = 'active';
                portalSetups[user.profileId].updatedAt = user.updatedAt;
                localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
            }
            
            // Save to localStorage
            localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
            
            renderUserTable();
            updateStats();
            alert('User reactivated successfully!');
        }
    });
}

function deleteUser(userId) {
    const user = userAccounts.find(u => u.userId === userId);
    if (!user) return;
    
    if (user.status === 'active') {
        alert('Cannot delete an active user. Please deactivate the user first.');
        return;
    }
    
    showConfirmDialog({
        title: 'Delete User',
        message: `Are you sure you want to permanently delete ${user.fullName}? This action cannot be undone.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            // Remove from userAccounts
            userAccounts = userAccounts.filter(u => u.userId !== userId);
            
            // Remove from portalSetups
            const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
            if (portalSetups[user.profileId]) {
                delete portalSetups[user.profileId];
                localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
            }
            
            // Save to localStorage
            localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
            
            renderUserTable();
            updateStats();
            alert('User deleted successfully!');
        }
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
