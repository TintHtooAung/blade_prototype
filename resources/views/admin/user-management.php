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
</div>

<!-- User Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Portal User Accounts</h3>
        <button class="simple-btn primary" onclick="openAddUserModal()">
            <i class="fas fa-user-plus"></i> Add New User
        </button>
    </div>
    
    <!-- Filters -->
    <div class="simple-header" style="margin-top:16px; padding: 12px 20px; background: #f8f9fa; border-radius: 6px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <label style="font-weight: 600; color: #666;">Filters:</label>
            <select class="filter-select" id="roleFilter" onchange="applyFilters()">
                <option value="all">All Roles</option>
                <option value="Admin Portal">Admin Portal</option>
                <option value="Teacher Portal">Teacher Portal</option>
                <option value="Staff Access">Staff Access</option>
                <option value="Guardian Portal">Guardian Portal</option>
                <option value="Reception Access">Reception Access</option>
                <option value="IT Access">IT Access</option>
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
                        No user accounts found.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add New User Modal - Role Selection -->
<div id="addUserModal" class="receipt-dialog-overlay" style="display:none;" onclick="if(event.target === this) closeAddUserModal();">
    <div class="receipt-dialog-content" style="max-width: 800px; max-height: 90vh; overflow-y: auto;" onclick="event.stopPropagation();">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-user-plus"></i> Add New User - Select Role</h3>
            <button class="receipt-close" onclick="closeAddUserModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body" style="padding: 32px;">
            <div style="text-align: center; margin-bottom: 32px;">
                <p style="color: #6b7280; font-size: 16px; margin: 0;">Choose the type of account you want to create</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <!-- Student Role -->
                <div class="role-selection-card" onclick="selectRole('student')" style="cursor: pointer; border: 2px solid #e5e7eb; border-radius: 12px; padding: 24px; text-align: center; transition: all 0.3s ease; background: #fff;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 16px; background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);">
                        <i class="fas fa-user-graduate" style="font-size: 36px; color: #fff;"></i>
                    </div>
                    <h4 style="margin: 0 0 8px 0; font-size: 18px; font-weight: 600; color: #111827;">Student</h4>
                    <p style="margin: 0; color: #6b7280; font-size: 14px;">Create student profile with full registration</p>
                </div>
                
                <!-- Teacher Role -->
                <div class="role-selection-card" onclick="selectRole('teacher')" style="cursor: pointer; border: 2px solid #e5e7eb; border-radius: 12px; padding: 24px; text-align: center; transition: all 0.3s ease; background: #fff;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 16px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                        <i class="fas fa-chalkboard-teacher" style="font-size: 36px; color: #fff;"></i>
                    </div>
                    <h4 style="margin: 0 0 8px 0; font-size: 18px; font-weight: 600; color: #111827;">Teacher</h4>
                    <p style="margin: 0; color: #6b7280; font-size: 14px;">Create teacher profile with full registration</p>
                </div>
                
                <!-- Staff Role -->
                <div class="role-selection-card" onclick="selectRole('staff')" style="cursor: pointer; border: 2px solid #e5e7eb; border-radius: 12px; padding: 24px; text-align: center; transition: all 0.3s ease; background: #fff;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 16px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);">
                        <i class="fas fa-user-tie" style="font-size: 36px; color: #fff;"></i>
                    </div>
                    <h4 style="margin: 0 0 8px 0; font-size: 18px; font-weight: 600; color: #111827;">Staff</h4>
                    <p style="margin: 0; color: #6b7280; font-size: 14px;">Create staff profile with full registration</p>
                </div>
                
                <!-- Admin Role -->
                <div class="role-selection-card" onclick="selectRole('admin')" style="cursor: pointer; border: 2px solid #e5e7eb; border-radius: 12px; padding: 24px; text-align: center; transition: all 0.3s ease; background: #fff;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 16px; background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);">
                        <i class="fas fa-user-shield" style="font-size: 36px; color: #fff;"></i>
                    </div>
                    <h4 style="margin: 0 0 8px 0; font-size: 18px; font-weight: 600; color: #111827;">Admin</h4>
                    <p style="margin: 0; color: #6b7280; font-size: 14px;">Create admin account (no registration required)</p>
                </div>
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeAddUserModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
        </div>
    </div>
</div>

<!-- Admin Account Creation Modal (Simple) -->
<div id="adminAccountModal" class="receipt-dialog-overlay" style="display:none;" onclick="if(event.target === this) closeAdminAccountModal();">
    <div class="receipt-dialog-content" style="max-width: 600px;" onclick="event.stopPropagation();">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-user-shield"></i> Create Admin Account</h3>
            <button class="receipt-close" onclick="closeAdminAccountModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Full Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-input" id="adminFullName" placeholder="Enter full name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Email Address <span style="color:red;">*</span></label>
                        <input type="email" class="form-input" id="adminEmail" placeholder="admin@school.edu" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:1;">
                        <label>Password <span style="color:red;">*</span></label>
                        <input type="password" class="form-input" id="adminPassword" placeholder="Enter password" required>
                        <small style="color: #86868b; font-size: 0.75rem;">Minimum 6 characters</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeAdminAccountModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveAdminAccount()">
                <i class="fas fa-check"></i> Create Admin Account
            </button>
        </div>
    </div>
</div>

<style>
.role-selection-card:hover {
    border-color: #4A90E2 !important;
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}
</style>

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
});

function generateUserId(role, fullName) {
    // Generate user ID based on role prefix and name initials
    const rolePrefixes = {
        'Admin Portal': 'ADM',
        'Teacher Portal': 'TCH',
        'Staff Access': 'STF',
        'Guardian Portal': 'GRD',
        'Reception Access': 'REC',
        'IT Access': 'IT'
    };
    
    const prefix = rolePrefixes[role] || 'USR';
    const nameParts = fullName.trim().split(' ');
    const initials = nameParts.length > 1 
        ? (nameParts[0][0] + nameParts[nameParts.length - 1][0]).toUpperCase()
        : nameParts[0].substring(0, 2).toUpperCase();
    
    // Generate a 4-digit number
    const number = Math.floor(1000 + Math.random() * 9000);
    
    return `${prefix}-${initials}-${number}`;
}

let currentStep = 1;

function openAddUserModal() {
    document.getElementById('addUserModal').style.display = 'flex';
}

function closeAddUserModal() {
    document.getElementById('addUserModal').style.display = 'none';
}

function selectRole(role) {
    closeAddUserModal();
    
    if (role === 'student') {
        // Open student wizard modal
        if (typeof window.openAddStudentModal === 'function') {
            window.openAddStudentModal();
        } else {
            alert('Student registration form is not available. Please use the Student Profiles page.');
        }
    } else if (role === 'teacher') {
        // Open teacher wizard modal
        if (typeof window.openAddTeacherModal === 'function') {
            window.openAddTeacherModal();
        } else {
            alert('Teacher registration form is not available. Please use the Teacher Profiles page.');
        }
    } else if (role === 'staff') {
        // Open staff wizard modal
        if (typeof window.openAddStaffModal === 'function') {
            window.openAddStaffModal();
        } else {
            alert('Staff registration form is not available. Please use the Employee Profiles page.');
        }
    } else if (role === 'admin') {
        // Open simple admin account creation
        openAdminAccountModal();
    }
}

function openAdminAccountModal() {
    document.getElementById('adminAccountModal').style.display = 'flex';
    // Clear form
    document.getElementById('adminFullName').value = '';
    document.getElementById('adminEmail').value = '';
    document.getElementById('adminPassword').value = '';
}

function closeAdminAccountModal() {
    document.getElementById('adminAccountModal').style.display = 'none';
}

function saveAdminAccount() {
    const fullName = (document.getElementById('adminFullName').value || '').trim();
    const email = (document.getElementById('adminEmail').value || '').trim();
    const password = document.getElementById('adminPassword').value;
    
    if (!fullName) {
        alert('Please enter full name');
        return;
    }
    
    if (!email || !email.includes('@')) {
        alert('Please enter a valid email address');
        return;
    }
    
    if (!password || password.length < 6) {
        alert('Password must be at least 6 characters');
        return;
    }
    
    // Generate user ID
    const userId = generateUserId('Admin Portal', fullName);
    
    const userAccount = {
        userId: userId,
        fullName: fullName,
        email: email,
        password: password,
        role: 'Admin Portal',
        status: 'active',
        createdAt: new Date().toISOString(),
        lastUpdated: new Date().toISOString()
    };
    
    // Save to localStorage
    let userAccounts = [];
    try {
        userAccounts = JSON.parse(localStorage.getItem('userAccounts') || '[]');
    } catch (e) {
        userAccounts = [];
    }
    
    userAccounts.push(userAccount);
    localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
    
    // Refresh table
    renderUserTable();
    updateStats();
    
    // Close modal
    closeAdminAccountModal();
    
    alert(`Admin account created successfully!\n\nUser ID: ${userId}\nEmail: ${email}`);
}

function goToStep1() {
    currentStep = 1;
    document.getElementById('step1Form').style.display = 'block';
    document.getElementById('step2Form').style.display = 'none';
    document.getElementById('modalStepTitle').textContent = 'Step 1: Account Info';
    document.getElementById('nextBtn').style.display = 'inline-flex';
    document.getElementById('createBtn').style.display = 'none';
    document.getElementById('backBtn').style.display = 'none';
}

function handleNextStep() {
    // Validate step 1
    const fullName = document.getElementById('addFullName').value.trim();
    const email = document.getElementById('addEmail').value.trim();
    const password = document.getElementById('addPassword').value;
    const role = document.getElementById('addRole').value;
    
    if (!fullName) {
        showToast('Full name is required', 'error');
        return;
    }
    
    if (!email) {
        showToast('Email is required', 'error');
        return;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showToast('Please enter a valid email address', 'error');
        return;
    }
    
    // Check if email already exists
    if (userAccounts.some(u => u.email.toLowerCase() === email.toLowerCase())) {
        showToast('Email already exists. Please use a different email.', 'error');
        return;
    }
    
    if (!password) {
        showToast('Password is required', 'error');
        return;
    }
    
    if (password.length < 6) {
        showToast('Password must be at least 6 characters long', 'error');
        return;
    }
    
    if (!role) {
        showToast('User role is required', 'error');
        return;
    }
    
    // Go to step 2
    currentStep = 2;
    document.getElementById('step1Form').style.display = 'none';
    document.getElementById('step2Form').style.display = 'block';
    document.getElementById('modalStepTitle').textContent = 'Step 2: Registration Info';
    document.getElementById('nextBtn').style.display = 'none';
    document.getElementById('createBtn').style.display = 'inline-flex';
    document.getElementById('backBtn').style.display = 'inline-flex';
    
    // Show role-specific fields
    document.getElementById('adminFields').style.display = role === 'Admin Portal' ? 'block' : 'none';
    document.getElementById('teacherFields').style.display = role === 'Teacher Portal' ? 'block' : 'none';
    document.getElementById('staffFields').style.display = role === 'Staff Access' ? 'block' : 'none';
    document.getElementById('guardianFields').style.display = role === 'Guardian Portal' ? 'block' : 'none';
}

function saveNewUser() {
    // Get form values from step 1
    const fullName = document.getElementById('addFullName').value.trim();
    const email = document.getElementById('addEmail').value.trim();
    const password = document.getElementById('addPassword').value;
    const role = document.getElementById('addRole').value;
    
    // Get registration info based on role
    const registrationInfo = {};
    
    if (role === 'Admin Portal') {
        registrationInfo.department = document.getElementById('adminDepartment')?.value.trim() || '';
        registrationInfo.phone = document.getElementById('adminPhone')?.value.trim() || '';
        registrationInfo.address = document.getElementById('adminAddress')?.value.trim() || '';
    } else if (role === 'Teacher Portal') {
        registrationInfo.department = document.getElementById('teacherDepartment')?.value.trim() || '';
        registrationInfo.subjects = document.getElementById('teacherSubjects')?.value.trim() || '';
        registrationInfo.dateOfBirth = document.getElementById('teacherDOB')?.value || '';
        registrationInfo.gender = document.getElementById('teacherGender')?.value || '';
        registrationInfo.phone = document.getElementById('teacherPhone')?.value.trim() || '';
        registrationInfo.nrc = document.getElementById('teacherNRC')?.value.trim() || '';
        registrationInfo.address = document.getElementById('teacherAddress')?.value.trim() || '';
        registrationInfo.emergencyContact = document.getElementById('teacherEmergency')?.value.trim() || '';
    } else if (role === 'Staff Access') {
        registrationInfo.department = document.getElementById('staffDepartment')?.value.trim() || '';
        registrationInfo.position = document.getElementById('staffPosition')?.value.trim() || '';
        registrationInfo.dateOfBirth = document.getElementById('staffDOB')?.value || '';
        registrationInfo.gender = document.getElementById('staffGender')?.value || '';
        registrationInfo.phone = document.getElementById('staffPhone')?.value.trim() || '';
        registrationInfo.nrc = document.getElementById('staffNRC')?.value.trim() || '';
        registrationInfo.address = document.getElementById('staffAddress')?.value.trim() || '';
        registrationInfo.emergencyContact = document.getElementById('staffEmergency')?.value.trim() || '';
    } else if (role === 'Guardian Portal') {
        registrationInfo.relationship = document.getElementById('guardianRelationship')?.value || '';
        registrationInfo.phone = document.getElementById('guardianPhone')?.value.trim() || '';
        registrationInfo.address = document.getElementById('guardianAddress')?.value.trim() || '';
    }
    
    // Generate User ID (ensure uniqueness)
    let userId = generateUserId(role, fullName);
    let attempts = 0;
    while (userAccounts.some(u => u.userId === userId) && attempts < 5) {
        userId = generateUserId(role, fullName);
        attempts++;
    }
    
    if (userAccounts.some(u => u.userId === userId)) {
        showToast('Error generating unique User ID. Please try again.', 'error');
        return;
    }
    
    // Determine profile type based on role
    const profileTypeMap = {
        'Admin Portal': 'Admin',
        'Teacher Portal': 'Teacher',
        'Staff Access': 'Staff',
        'Guardian Portal': 'Guardian'
    };
    const profileType = profileTypeMap[role] || 'User';
    
    // Create new user object with registration info
    const newUser = {
        userId: userId,
        email: email,
        fullName: fullName,
        role: role,
        profileId: userId, // Use userId as profileId for new accounts
        profileType: profileType,
        status: 'active', // Default to active
        password: '********', // Store as hidden for security
        updatedAt: new Date().toLocaleString(),
        createdAt: new Date().toLocaleString(),
        accountCreated: true,
        registrationInfo: registrationInfo // Store role-specific registration data
    };
    
    // Add to userAccounts array
    userAccounts.push(newUser);
    
    // Save to localStorage
    localStorage.setItem('userAccounts', JSON.stringify(userAccounts));
    
    // Also save to portalSetups for consistency
    const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
    portalSetups[userId] = {
        userId: userId,
        email: email,
        fullName: fullName,
        role: role,
        profileId: userId,
        profileType: profileType,
        status: 'active',
        accountCreated: true,
        updatedAt: new Date().toLocaleString(),
        registrationInfo: registrationInfo
    };
    localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
    
    // Close modal
    closeAddUserModal();
    
    // Refresh table and stats
    renderUserTable();
    updateStats();
    
    showToast(`User ${fullName} (${userId}) created successfully`, 'success');
}

function renderUserTable() {
    const tbody = document.getElementById('userTableBody');
    
    if (userAccounts.length === 0) {
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="8" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No user accounts found.
            </td>
        </tr>`;
        return;
    }
    
    const filteredUsers = applyDataFilters();
    
    if (filteredUsers.length === 0) {
        tbody.innerHTML = `<tr class="no-data-row">
            <td colspan="8" style="text-align:center; padding:40px; color:#999;">
                <i class="fas fa-search" style="font-size:48px; margin-bottom:12px; display:block;"></i>
                No users match the current filters.
            </td>
        </tr>`;
        return;
    }
    
    tbody.innerHTML = filteredUsers.map(user => `
        <tr>
            <td><strong>${user.userId}</strong></td>
            <td>${user.email}</td>
            <td>${user.fullName}</td>
            <td><span class="badge tutorial-badge">${user.role}</span></td>
            <td>${user.profileId || 'N/A'} ${user.profileType ? `(${user.profileType})` : ''}</td>
            <td><span class="status-badge ${user.status === 'active' ? 'paid' : 'draft'}">${user.status === 'active' ? 'Active' : 'Inactive'}</span></td>
            <td>${user.updatedAt || user.createdAt || 'N/A'}</td>
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
        showToast('Email cannot be empty', 'error');
        return;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(newEmail)) {
        showToast('Please enter a valid email address', 'error');
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
    
    showToast(`User ${user.fullName} (${user.userId}) updated successfully`, 'success');
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
                showToast(`User ${user.fullName} (${user.userId}) deactivated successfully`, 'success');
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
            showToast(`User ${user.fullName} (${user.userId}) reactivated successfully`, 'success');
        }
    });
}

function deleteUser(userId) {
    const user = userAccounts.find(u => u.userId === userId);
    if (!user) return;
    
    if (user.status === 'active') {
        showToast('Cannot delete an active user. Please deactivate the user first.', 'warning');
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
            showToast(`User ${user.fullName} (${user.userId}) deleted successfully`, 'success');
        }
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
