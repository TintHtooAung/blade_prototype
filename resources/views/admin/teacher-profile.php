<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profile';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Profile';
$activePage = 'teachers';
$id = $_GET['id'] ?? 'T000';
$portal = $_GET['portal'] ?? 'admin'; // Detect if accessed from staff portal

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/<?php echo $portal === 'staff' ? 'staff' : 'admin'; ?>/teacher-profiles" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Teacher Profiles
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
        <?php if ($portal === 'admin'): ?>
        <button class="simple-btn" onclick="window.location.href='/admin/teacher-profile-edit?id=<?php echo htmlspecialchars($id); ?>'">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
        <?php endif; ?>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Teacher ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td>Placeholder Name</td></tr>
                <tr><th>Department</th><td>Mathematics</td></tr>
                <tr><th>Subjects</th><td id="subjectsCell">Algebra, Calculus</td></tr>
                <tr><th>Email</th><td>placeholder@school.edu</td></tr>
                <tr><th>Phone</th><td>+1-555-0101</td></tr>
                <tr><th>Status</th><td><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td>2023-01-15</td></tr>
                <tr><th>Salary</th><td>$3,500.00 / month</td></tr>
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
                <tr><th style="width:220px;">NRC Number</th><td>12/ABC(N)123456</td></tr>
                <tr><th>Date of Birth</th><td>1985-03-15</td></tr>
                <tr><th>Gender</th><td>Male</td></tr>
                <tr><th>Address</th><td>123 Main Street, City, State 12345</td></tr>
                <tr><th>Emergency Contact</th><td>Jane Smith - +1-555-0102</td></tr>
                <tr><th>Blood Type</th><td>O+</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Portal Access Information -->
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user-lock"></i> Teacher Portal Access</h4>
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
                        <input type="text" class="form-input" id="portalUserIdInput" placeholder="e.g., TP001" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>Portal Email</th>
                    <td>
                        <input type="email" class="form-input" id="portalEmailInput" placeholder="teacher@school.edu" style="width:100%;">
                    </td>
                </tr>
                <tr><th>Portal Role</th><td>Teacher Portal</td></tr>
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

    // No injected department position
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
        
        const portalSetups = JSON.parse(localStorage.getItem('portalSetups') || '{}');
        portalSetups[profileId] = {
            profileId: profileId,
            userId: userId,
            email: email,
            fullName: 'Placeholder Name',
            role: 'Teacher Portal',
            profileType: 'teacher',
            setupComplete: true,
            accountCreated: false,
            updatedAt: new Date().toLocaleString()
        };
        localStorage.setItem('portalSetups', JSON.stringify(portalSetups));
        
        setupComplete = true;
        document.getElementById('setupStatus').textContent = 'Ready for Account Creation';
        document.getElementById('setupStatus').className = 'status-badge pending';
        document.getElementById('lastUpdated').textContent = portalSetups[profileId].updatedAt;
        document.getElementById('portalActionBtn').innerHTML = '<i class="fas fa-user-plus"></i> Create Portal Account';
        
        showToast(`Portal setup completed for Teacher ${profileId}. Click "Create Portal Account" to finalize.`, 'success');
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
        showToast(`Teacher Portal account ${userId} created successfully for Teacher ${profileId}`, 'success');
    }
}
</script>

<?php
$content = ob_get_clean();
// Use appropriate layout based on portal
if ($portal === 'staff') {
    include __DIR__ . '/../components/staff-layout.php';
} else {
    include __DIR__ . '/../components/admin-layout.php';
}
?>
