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
    </div>

    <!-- Basic Information Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-info-circle"></i> Basic Information</h4>
        <button class="simple-btn" onclick="openEditModal('basic')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-info-circle"></i> Basic Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Teacher ID</th><td><?php echo htmlspecialchars($id); ?></td></tr>
                <tr><th>Full Name</th><td id="basicFullName">Placeholder Name</td></tr>
                <tr><th>Department</th><td id="basicDepartment">Mathematics</td></tr>
                <tr><th>Subjects</th><td id="basicSubjects">Algebra, Calculus</td></tr>
                <tr><th>Email</th><td id="basicEmail">placeholder@school.edu</td></tr>
                <tr><th>Phone</th><td id="basicPhone">+1-555-0101</td></tr>
                <tr><th>Status</th><td id="basicStatus"><span class="status-badge paid">Active</span></td></tr>
                <tr><th>Join Date</th><td id="basicJoinDate">2023-01-15</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Personal Information Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user"></i> Personal Information</h4>
        <button class="simple-btn" onclick="openEditModal('personal')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-user"></i> Personal Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">NRC Number</th><td id="personalNRC">12/ABC(N)123456</td></tr>
                <tr><th>Date of Birth</th><td id="personalDOB">1985-03-15</td></tr>
                <tr><th>Gender</th><td id="personalGender">Male</td></tr>
                <tr><th>Address</th><td id="personalAddress">123 Main Street, City, State 12345</td></tr>
                <tr><th>Emergency Contact</th><td id="personalEmergency">Jane Smith - +1-555-0102</td></tr>
                <tr><th>Blood Type</th><td id="personalBloodType">O+</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Academic Information Section -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-graduation-cap"></i> Academic Information</h4>
        <button class="simple-btn" onclick="openEditModal('academic')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-graduation-cap"></i> Academic Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr><th style="width:220px;">Department</th><td id="academicDepartment">Mathematics</td></tr>
                <tr><th>Subjects</th><td id="academicSubjects">Algebra, Calculus</td></tr>
                <tr><th>Qualification</th><td id="academicQualification">M.Ed in Mathematics</td></tr>
                <tr><th>Experience (Years)</th><td id="academicExperience">5</td></tr>
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

    <!-- Salary & Payroll Information -->
    <?php if ($portal === 'admin'): ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-money-check-alt"></i> Salary & Payroll Information</h4>
        <button class="simple-btn" onclick="openEditModal('salary')">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>
    <?php else: ?>
    <div class="simple-header" style="margin-top:24px;">
        <h4><i class="fas fa-money-check-alt"></i> Salary & Payroll Information</h4>
    </div>
    <?php endif; ?>
    <div class="simple-table-container">
        <table class="basic-table" id="salaryPayrollTable">
            <tbody>
                <tr>
                    <th style="width:220px;">Basic Salary</th>
                    <td id="payrollBasicSalary">-</td>
                </tr>
                <tr>
                    <th>Attendance Allowance</th>
                    <td id="payrollAttendanceAllowance">-</td>
                </tr>
                <tr>
                    <th>Loyalty Bonus</th>
                    <td id="payrollLoyaltyBonus">-</td>
                </tr>
                <tr>
                    <th>Other Bonus</th>
                    <td id="payrollOtherBonus">-</td>
                </tr>
                <tr>
                    <th>Overtime</th>
                    <td id="payrollOvertime">-</td>
                </tr>
                <tr>
                    <th>Late Deduction</th>
                    <td id="payrollLateDeduction">-</td>
                </tr>
                <tr>
                    <th>Total Salary</th>
                    <td><strong id="payrollTotalSalary">-</strong></td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td id="payrollPaymentMethod">-</td>
                </tr>
                <tr>
                    <th>Last Payroll Month</th>
                    <td id="payrollLastMonth">-</td>
                </tr>
                <tr>
                    <th>Payroll Status</th>
                    <td id="payrollStatus"><span class="status-badge draft">No Payroll Data</span></td>
                </tr>
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

    // Load payroll data
    loadPayrollData();
});

function formatCurrency(amount) {
    if (amount === null || amount === undefined || amount === '-') return '-';
    return amount.toLocaleString('en-US') + ' MMK';
}

function loadPayrollData() {
    // Try to load from payrollData first (current payroll), then from payrollHistory
    const savedPayroll = localStorage.getItem('payrollData');
    const payrollData = savedPayroll ? JSON.parse(savedPayroll) : [];
    
    // Find the most recent payroll entry for this employee
    let payrollEntry = payrollData
        .filter(entry => entry.employeeId === profileId)
        .sort((a, b) => {
            // Sort by month (newest first)
            if (a.month && b.month) {
                return b.month.localeCompare(a.month);
            }
            return 0;
        })[0];
    
    // If not found in payrollData, try payrollHistory
    if (!payrollEntry) {
        const savedHistory = localStorage.getItem('payrollHistory');
        if (savedHistory) {
            const payrollHistory = JSON.parse(savedHistory);
            payrollEntry = payrollHistory
                .filter(entry => entry.employeeId === profileId)
                .sort((a, b) => {
                    if (a.month && b.month) {
                        return b.month.localeCompare(a.month);
                    }
                    return 0;
                })[0];
        }
    }
    
    // If still not found, try to load from profile salary data
    if (!payrollEntry) {
        const profileSalaries = JSON.parse(localStorage.getItem('profileSalaries') || '{}');
        const salaryData = profileSalaries[profileId];
        if (salaryData) {
            // Display profile salary data
            document.getElementById('payrollBasicSalary').textContent = formatCurrency(salaryData.basicSalary || 0);
            document.getElementById('payrollAttendanceAllowance').textContent = formatCurrency(salaryData.attendanceAllowance || 0);
            document.getElementById('payrollLoyaltyBonus').textContent = formatCurrency(salaryData.loyaltyBonus || 0);
            document.getElementById('payrollOtherBonus').textContent = formatCurrency(salaryData.otherBonus || 0);
            document.getElementById('payrollOvertime').textContent = formatCurrency(salaryData.overtime || 0);
            document.getElementById('payrollLateDeduction').textContent = formatCurrency(salaryData.lateDeduction || 0);
            const total = (salaryData.basicSalary || 0) + (salaryData.attendanceAllowance || 0) + 
                         (salaryData.loyaltyBonus || 0) + (salaryData.otherBonus || 0) + 
                         (salaryData.overtime || 0) - (salaryData.lateDeduction || 0);
            document.getElementById('payrollTotalSalary').textContent = formatCurrency(total);
            document.getElementById('payrollPaymentMethod').textContent = salaryData.paymentMethod || '-';
            document.getElementById('payrollLastMonth').textContent = salaryData.lastMonth || '-';
            document.getElementById('payrollStatus').innerHTML = '<span class="status-badge draft">Profile Data</span>';
            return;
        }
    }
    
    if (payrollEntry) {
        // Display payroll data
        document.getElementById('payrollBasicSalary').textContent = formatCurrency(payrollEntry.basicSalary || 0);
        document.getElementById('payrollAttendanceAllowance').textContent = formatCurrency(payrollEntry.attendanceAllowance || 0);
        document.getElementById('payrollLoyaltyBonus').textContent = formatCurrency(payrollEntry.loyaltyBonus || 0);
        document.getElementById('payrollOtherBonus').textContent = formatCurrency(payrollEntry.otherBonus || 0);
        document.getElementById('payrollOvertime').textContent = formatCurrency(payrollEntry.overtime || 0);
        document.getElementById('payrollLateDeduction').textContent = formatCurrency(payrollEntry.lateDeduction || 0);
        const total = (payrollEntry.totalSalary || payrollEntry.netPay || 0) + 
                     (payrollEntry.overtime || 0) - (payrollEntry.lateDeduction || 0);
        document.getElementById('payrollTotalSalary').textContent = formatCurrency(total);
        document.getElementById('payrollPaymentMethod').textContent = payrollEntry.paymentType || '-';
        
        // Format month display
        if (payrollEntry.month) {
            const [year, month] = payrollEntry.month.split('-');
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                               'July', 'August', 'September', 'October', 'November', 'December'];
            const monthName = monthNames[parseInt(month) - 1];
            document.getElementById('payrollLastMonth').textContent = `${monthName} ${year}`;
        } else {
            document.getElementById('payrollLastMonth').textContent = '-';
        }
        
        const statusText = payrollEntry.status === 'draft' ? 'Draft' : 
                          payrollEntry.status === 'withdrawn' ? 'Withdrawn' : 
                          payrollEntry.status || 'Unknown';
        const statusClass = payrollEntry.status === 'draft' ? 'draft' : 
                           payrollEntry.status === 'withdrawn' ? 'paid' : 'pending';
        document.getElementById('payrollStatus').innerHTML = `<span class="status-badge ${statusClass}">${statusText}</span>`;
    } else {
        // No payroll data found
        document.getElementById('payrollBasicSalary').textContent = '-';
        document.getElementById('payrollAttendanceAllowance').textContent = '-';
        document.getElementById('payrollLoyaltyBonus').textContent = '-';
        document.getElementById('payrollOtherBonus').textContent = '-';
        document.getElementById('payrollOvertime').textContent = '-';
        document.getElementById('payrollLateDeduction').textContent = '-';
        document.getElementById('payrollTotalSalary').textContent = '-';
        document.getElementById('payrollPaymentMethod').textContent = '-';
        document.getElementById('payrollLastMonth').textContent = '-';
        document.getElementById('payrollStatus').innerHTML = '<span class="status-badge draft">No Payroll Data</span>';
    }
}

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

// Modal functions for editing sections
<?php if ($portal === 'admin'): ?>
function openEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (!modal) return;
    
    if (section === 'basic') {
        document.getElementById('modalBasicFullName').value = document.getElementById('basicFullName').textContent.trim();
        document.getElementById('modalBasicDepartment').value = document.getElementById('basicDepartment').textContent.trim();
        document.getElementById('modalBasicSubjects').value = document.getElementById('basicSubjects').textContent.trim();
        document.getElementById('modalBasicEmail').value = document.getElementById('basicEmail').textContent.trim();
        document.getElementById('modalBasicPhone').value = document.getElementById('basicPhone').textContent.trim();
        const statusText = document.getElementById('basicStatus').textContent.trim();
        document.getElementById('modalBasicStatus').value = statusText.toLowerCase();
        document.getElementById('modalBasicJoinDate').value = document.getElementById('basicJoinDate').textContent.trim();
    } else if (section === 'personal') {
        document.getElementById('modalPersonalNRC').value = document.getElementById('personalNRC').textContent.trim();
        document.getElementById('modalPersonalDOB').value = document.getElementById('personalDOB').textContent.trim();
        document.getElementById('modalPersonalGender').value = document.getElementById('personalGender').textContent.trim();
        document.getElementById('modalPersonalAddress').value = document.getElementById('personalAddress').textContent.trim();
        document.getElementById('modalPersonalEmergency').value = document.getElementById('personalEmergency').textContent.trim();
        document.getElementById('modalPersonalBloodType').value = document.getElementById('personalBloodType').textContent.trim();
    } else if (section === 'academic') {
        document.getElementById('modalAcademicDepartment').value = document.getElementById('academicDepartment').textContent.trim();
        document.getElementById('modalAcademicSubjects').value = document.getElementById('academicSubjects').textContent.trim();
        document.getElementById('modalAcademicQualification').value = document.getElementById('academicQualification').textContent.trim();
        document.getElementById('modalAcademicExperience').value = document.getElementById('academicExperience').textContent.trim();
    } else if (section === 'salary') {
        // Extract numeric values from displayed text (remove " MMK" and commas)
        const basicText = document.getElementById('payrollBasicSalary').textContent.trim();
        const basicValue = basicText === '-' ? '0' : basicText.replace(/[^\d]/g, '');
        document.getElementById('modalSalaryBasic').value = basicValue;
        
        const attendanceText = document.getElementById('payrollAttendanceAllowance').textContent.trim();
        const attendanceValue = attendanceText === '-' ? '0' : attendanceText.replace(/[^\d]/g, '');
        document.getElementById('modalSalaryAttendance').value = attendanceValue;
        
        const loyaltyText = document.getElementById('payrollLoyaltyBonus').textContent.trim();
        const loyaltyValue = loyaltyText === '-' ? '0' : loyaltyText.replace(/[^\d]/g, '');
        document.getElementById('modalSalaryLoyalty').value = loyaltyValue;
        
        const otherText = document.getElementById('payrollOtherBonus').textContent.trim();
        const otherValue = otherText === '-' ? '0' : otherText.replace(/[^\d]/g, '');
        document.getElementById('modalSalaryOther').value = otherValue;
        
        const overtimeText = document.getElementById('payrollOvertime').textContent.trim();
        const overtimeValue = overtimeText === '-' ? '0' : overtimeText.replace(/[^\d]/g, '');
        document.getElementById('modalSalaryOvertime').value = overtimeValue;
        
        const lateText = document.getElementById('payrollLateDeduction').textContent.trim();
        const lateValue = lateText === '-' ? '0' : lateText.replace(/[^\d]/g, '');
        document.getElementById('modalSalaryLate').value = lateValue;
        
        const paymentMethod = document.getElementById('payrollPaymentMethod').textContent.trim();
        document.getElementById('modalSalaryPaymentMethod').value = paymentMethod === '-' ? 'Cash' : paymentMethod;
        
        calculateModalTotalSalary();
    }
    
    modal.style.display = 'flex';
}

function closeEditModal(section) {
    const modal = document.getElementById(`edit${section.charAt(0).toUpperCase() + section.slice(1)}Modal`);
    if (modal) modal.style.display = 'none';
}

function saveBasicInfo() {
    document.getElementById('basicFullName').textContent = document.getElementById('modalBasicFullName').value;
    document.getElementById('basicDepartment').textContent = document.getElementById('modalBasicDepartment').value;
    document.getElementById('basicSubjects').textContent = document.getElementById('modalBasicSubjects').value;
    document.getElementById('basicEmail').textContent = document.getElementById('modalBasicEmail').value;
    document.getElementById('basicPhone').textContent = document.getElementById('modalBasicPhone').value;
    const status = document.getElementById('modalBasicStatus').value;
    const statusClass = status === 'active' ? 'paid' : status === 'inactive' ? 'draft' : 'pending';
    document.getElementById('basicStatus').innerHTML = `<span class="status-badge ${statusClass}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;
    document.getElementById('basicJoinDate').textContent = document.getElementById('modalBasicJoinDate').value;
    closeEditModal('basic');
    showToast('Basic information updated successfully!', 'success');
}

function savePersonalInfo() {
    document.getElementById('personalNRC').textContent = document.getElementById('modalPersonalNRC').value;
    document.getElementById('personalDOB').textContent = document.getElementById('modalPersonalDOB').value;
    document.getElementById('personalGender').textContent = document.getElementById('modalPersonalGender').value;
    document.getElementById('personalAddress').textContent = document.getElementById('modalPersonalAddress').value;
    document.getElementById('personalEmergency').textContent = document.getElementById('modalPersonalEmergency').value;
    document.getElementById('personalBloodType').textContent = document.getElementById('modalPersonalBloodType').value;
    closeEditModal('personal');
    showToast('Personal information updated successfully!', 'success');
}

function saveAcademicInfo() {
    document.getElementById('academicDepartment').textContent = document.getElementById('modalAcademicDepartment').value;
    document.getElementById('academicSubjects').textContent = document.getElementById('modalAcademicSubjects').value;
    document.getElementById('academicQualification').textContent = document.getElementById('modalAcademicQualification').value;
    document.getElementById('academicExperience').textContent = document.getElementById('modalAcademicExperience').value;
    // Update basic display too
    document.getElementById('basicDepartment').textContent = document.getElementById('modalAcademicDepartment').value;
    document.getElementById('basicSubjects').textContent = document.getElementById('modalAcademicSubjects').value;
    closeEditModal('academic');
    showToast('Academic information updated successfully!', 'success');
}

function formatCurrency(amount) {
    if (!amount || amount === '0' || amount === 0) return '-';
    return parseInt(amount).toLocaleString('en-US') + ' MMK';
}

function calculateModalTotalSalary() {
    const basic = parseFloat(document.getElementById('modalSalaryBasic').value) || 0;
    const attendance = parseFloat(document.getElementById('modalSalaryAttendance').value) || 0;
    const loyalty = parseFloat(document.getElementById('modalSalaryLoyalty').value) || 0;
    const other = parseFloat(document.getElementById('modalSalaryOther').value) || 0;
    const overtime = parseFloat(document.getElementById('modalSalaryOvertime').value) || 0;
    const late = parseFloat(document.getElementById('modalSalaryLate').value) || 0;
    
    const total = basic + attendance + loyalty + other + overtime - late;
    document.getElementById('modalSalaryTotal').value = total.toLocaleString('en-US') + ' MMK';
}

function saveSalaryInfo() {
    const basic = document.getElementById('modalSalaryBasic').value || '0';
    const attendance = document.getElementById('modalSalaryAttendance').value || '0';
    const loyalty = document.getElementById('modalSalaryLoyalty').value || '0';
    const other = document.getElementById('modalSalaryOther').value || '0';
    const overtime = document.getElementById('modalSalaryOvertime').value || '0';
    const late = document.getElementById('modalSalaryLate').value || '0';
    const paymentMethod = document.getElementById('modalSalaryPaymentMethod').value;
    
    document.getElementById('payrollBasicSalary').textContent = formatCurrency(basic);
    document.getElementById('payrollAttendanceAllowance').textContent = formatCurrency(attendance);
    document.getElementById('payrollLoyaltyBonus').textContent = formatCurrency(loyalty);
    document.getElementById('payrollOtherBonus').textContent = formatCurrency(other);
    document.getElementById('payrollOvertime').textContent = formatCurrency(overtime);
    document.getElementById('payrollLateDeduction').textContent = formatCurrency(late);
    document.getElementById('payrollPaymentMethod').textContent = paymentMethod;
    
    const total = parseFloat(basic) + parseFloat(attendance) + parseFloat(loyalty) + parseFloat(other) + parseFloat(overtime) - parseFloat(late);
    document.getElementById('payrollTotalSalary').textContent = formatCurrency(total);
    
    closeEditModal('salary');
    showToast('Salary & Payroll information updated successfully!', 'success');
}
<?php endif; ?>
</script>

<?php if ($portal === 'admin'): ?>
<!-- Edit Modals for Teacher Profile -->
<!-- Basic Information Modal -->
<div id="editBasicModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-info-circle"></i> Edit Basic Information</h4>
            <button class="icon-btn" onclick="closeEditModal('basic')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Teacher ID</label>
                        <input type="text" class="form-input" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Full Name</label>
                        <input type="text" class="form-input" id="modalBasicFullName" placeholder="Enter full name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select" id="modalBasicDepartment">
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="History">History</option>
                            <option value="Arts">Arts</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Subjects</label>
                        <input type="text" class="form-input" id="modalBasicSubjects" placeholder="e.g., Algebra, Calculus">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-input" id="modalBasicEmail" placeholder="teacher@school.edu">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" id="modalBasicPhone" placeholder="+1-555-0000">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" id="modalBasicStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="on-leave">On Leave</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" class="form-input" id="modalBasicJoinDate">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('basic')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveBasicInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Personal Information Modal -->
<div id="editPersonalModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-user"></i> Edit Personal Information</h4>
            <button class="icon-btn" onclick="closeEditModal('personal')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>NRC Number</label>
                        <input type="text" class="form-input" id="modalPersonalNRC" placeholder="e.g., 12/ABC(N)123456">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-input" id="modalPersonalDOB">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select" id="modalPersonalGender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Address</label>
                        <input type="text" class="form-input" id="modalPersonalAddress" placeholder="Street, City, State">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Emergency Contact</label>
                        <input type="text" class="form-input" id="modalPersonalEmergency" placeholder="Name - Phone">
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                        <select class="form-select" id="modalPersonalBloodType">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('personal')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="savePersonalInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Academic Information Modal -->
<div id="editAcademicModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-graduation-cap"></i> Edit Academic Information</h4>
            <button class="icon-btn" onclick="closeEditModal('academic')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select" id="modalAcademicDepartment">
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="History">History</option>
                            <option value="Arts">Arts</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Subjects</label>
                        <input type="text" class="form-input" id="modalAcademicSubjects" placeholder="e.g., Algebra, Calculus">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Qualification</label>
                        <input type="text" class="form-input" id="modalAcademicQualification" placeholder="e.g., M.Ed, Ph.D">
                    </div>
                    <div class="form-group">
                        <label>Experience (Years)</label>
                        <input type="number" class="form-input" id="modalAcademicExperience" placeholder="Years">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('academic')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveAcademicInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Salary & Payroll Information Modal -->
<div id="editSalaryModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 600px;">
        <div class="confirm-dialog-header">
            <h4><i class="fas fa-money-check-alt"></i> Edit Salary & Payroll Information</h4>
            <button class="icon-btn" onclick="closeEditModal('salary')"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Basic Salary</label>
                        <input type="number" class="form-input" id="modalSalaryBasic" placeholder="0" value="0" step="1" oninput="calculateModalTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Attendance Allowance</label>
                        <input type="number" class="form-input" id="modalSalaryAttendance" placeholder="0" value="0" step="1" oninput="calculateModalTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Loyalty Bonus</label>
                        <input type="number" class="form-input" id="modalSalaryLoyalty" placeholder="0" value="0" step="1" oninput="calculateModalTotalSalary()">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Other Bonus</label>
                        <input type="number" class="form-input" id="modalSalaryOther" placeholder="0" value="0" step="1" oninput="calculateModalTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Overtime</label>
                        <input type="number" class="form-input" id="modalSalaryOvertime" placeholder="0" value="0" step="1" oninput="calculateModalTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Late Deduction</label>
                        <input type="number" class="form-input" id="modalSalaryLate" placeholder="0" value="0" step="1" oninput="calculateModalTotalSalary()">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Method</label>
                        <select class="form-select" id="modalSalaryPaymentMethod">
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="KBZ Pay">KBZ Pay</option>
                            <option value="Wave Pay">Wave Pay</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Total Salary</label>
                        <input type="text" class="form-input" id="modalSalaryTotal" readonly style="background-color: #f8f9fa; font-weight: 600; font-size: 1.1em;">
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeEditModal('salary')">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveSalaryInfo()">
                <i class="fas fa-check"></i> Save Changes
            </button>
        </div>
    </div>
</div>
<?php endif; ?>

<?php
$content = ob_get_clean();
// Use appropriate layout based on portal
if ($portal === 'staff') {
    include __DIR__ . '/../components/staff-layout.php';
} else {
    include __DIR__ . '/../components/admin-layout.php';
}
?>
