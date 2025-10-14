<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Profile';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Profile';
$activePage = 'employees';
$id = $_GET['id'] ?? 'E000';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/employee-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Staff Profiles
    </a>
</div>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<div class="simple-section">
    <div class="simple-header">
        <h3>Profile: <?php echo htmlspecialchars($id); ?></h3>
        <button class="simple-btn" onclick="window.location.href='/admin/staff-profile-edit?id=<?php echo htmlspecialchars($id); ?>'">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Staff ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td>Placeholder Name</td></tr>
                <tr><th>Department</th><td>Administration</td></tr>
                <tr><th>Position</th><td id="positionCell">Secretary</td></tr>
                <tr><th>Email</th><td>placeholder@school.edu</td></tr>
                <tr><th>Phone</th><td>+1-555-2001</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td>2022-08-01</td></tr>
                <tr><th>Salary</th><td>$2,200.00 / month</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Personal Information Section -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user"></i> Personal Information</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">NRC Number</th><td>12/DEF(N)789012</td></tr>
                <tr><th>Date of Birth</th><td>1990-07-22</td></tr>
                <tr><th>Gender</th><td>Female</td></tr>
                <tr><th>Address</th><td>456 Oak Avenue, City, State 12345</td></tr>
                <tr><th>Emergency Contact</th><td>John Doe - +1-555-2002</td></tr>
                <tr><th>Blood Type</th><td>A+</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Portal Access Information -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user-lock"></i> Staff Portal Access</h4>
        <button class="simple-btn" onclick="handlePortalAction()" id="portalActionBtn">
            <i class="fas fa-check-circle"></i> Complete Setup
        </button>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <th style="width:220px;">Portal User ID</th>
                    <td>
                        <input type="text" class="form-input" id="portalUserIdInput" placeholder="e.g., SP001" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>Portal Email</th>
                    <td>
                        <input type="email" class="form-input" id="portalEmailInput" placeholder="staff@school.edu" style="width:100%;">
                    </td>
                </tr>
                <tr><th>Portal Role</th><td id="portalRole">Reception Access</td></tr>
                <tr><th>Setup Status</th><td><span class="status-badge draft" id="setupStatus">Incomplete</span></td></tr>
                <tr><th>Last Updated</th><td id="lastUpdated">-</td></tr>
            </tbody>
        </table>
    </div>

    

</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';
let setupComplete = false;

// Load portal setup from localStorage
document.addEventListener('DOMContentLoaded', function() {
    const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
    
    if (portalSetups[profileId]) {
        const setup = portalSetups[profileId];
        document.getElementById('portalUserIdInput').value = setup.userId;
        document.getElementById('portalEmailInput').value = setup.email;
        document.getElementById('portalRole').textContent = setup.role;
        
        if (setup.accountCreated) {
            document.getElementById('setupStatus').textContent = 'Account Created';
            document.getElementById('setupStatus').className = 'status-badge paid';
            document.getElementById('portalUserIdInput').readOnly = true;
            document.getElementById('portalEmailInput').readOnly = true;
            document.getElementById('portalActionBtn').style.display = 'none';
        } else if (setup.setupComplete) {
            setupComplete = true;
            document.getElementById('setupStatus').textContent = 'Ready for Account Creation';
            document.getElementById('setupStatus').className = 'status-badge pending';
            document.getElementById('portalActionBtn').innerHTML = '<i class="fas fa-user-plus"></i> Create Portal Account';
        }
        
        document.getElementById('lastUpdated').textContent = setup.updatedAt;
    }

    // Position is already present in the table markup; no override from localStorage
});

function handlePortalAction() {
    if (!setupComplete) {
        const userId = document.getElementById('portalUserIdInput').value.trim();
        const email = document.getElementById('portalEmailInput').value.trim();
        
        if (!userId || !email) {
            showToast('Please fill in both Portal User ID and Portal Email fields.', 'warning');
            return;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showToast('Please enter a valid email address.', 'error');
            return;
        }
        
        // Determine role based on position
        const position = document.querySelectorAll('td')[6].textContent.toLowerCase();
        let role = 'Reception Access';
        if (position.includes('receptionist') || position.includes('secretary')) {
            role = 'Reception Access';
        } else if (position.includes('it')) {
            role = 'IT Access';
        } else {
            role = 'Staff Access';
        }
        
        const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
        portalSetups[profileId] = {
            profileId: profileId,
            userId: userId,
            email: email,
            fullName: 'Placeholder Name',
            role: role,
            profileType: 'staff',
            setupComplete: true,
            accountCreated: false,
            updatedAt: new Date().toLocaleString()
        };
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
        
        setupComplete = true;
        document.getElementById('portalRole').textContent = role;
        document.getElementById('setupStatus').textContent = 'Ready for Account Creation';
        document.getElementById('setupStatus').className = 'status-badge pending';
        document.getElementById('lastUpdated').textContent = portalSetups[profileId].updatedAt;
        document.getElementById('portalActionBtn').innerHTML = '<i class="fas fa-user-plus"></i> Create Portal Account';
        
        showToast(`Portal setup completed for Staff ${profileId}. Click "Create Portal Account" to finalize.`, 'success');
    } else {
        const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
        portalSetups[profileId].accountCreated = true;
        portalSetups[profileId].status = 'active';
        portalSetups[profileId].updatedAt = new Date().toLocaleString();
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
        
        document.getElementById('setupStatus').textContent = 'Account Created';
        document.getElementById('setupStatus').className = 'status-badge paid';
        document.getElementById('portalUserIdInput').readOnly = true;
        document.getElementById('portalEmailInput').readOnly = true;
        document.getElementById('portalActionBtn').style.display = 'none';
        document.getElementById('lastUpdated').textContent = portalSetups[profileId].updatedAt;
        
        const userId = portalSetups[profileId].userId;
        const role = portalSetups[profileId].role;
        showToast(`${role} account ${userId} created successfully for Staff ${profileId}`, 'success');
    }
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
