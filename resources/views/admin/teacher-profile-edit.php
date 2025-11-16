<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Teacher Profile';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Teacher Profile';
$activePage = 'teachers';
$id = $_GET['id'] ?? 'T000';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/teacher-profile/<?php echo htmlspecialchars($id); ?>" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Teacher Profile
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

<!-- Edit Profile Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3>Edit Teacher: <?php echo htmlspecialchars($id); ?></h3>
                <span class="exam-id"><?php echo htmlspecialchars($id); ?></span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Teacher</span>
                <span class="badge active-badge">Active</span>
            </div>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-user"></i> Personal Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Teacher ID</label>
                        <input type="text" class="form-input" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Full Name</label>
                        <input type="text" class="form-input" placeholder="Enter full name" value="Placeholder Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-input" placeholder="teacher@school.edu" value="placeholder@school.edu">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-input" placeholder="+1-555-0000" value="+1-555-0101">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="on-leave">On Leave</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-input" value="1988-06-15">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NRC Number</label>
                        <input type="text" class="form-input" placeholder="e.g., 12/STU(N)345678" value="12/TEA(N)123456">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex:2;">
                        <label>Address</label>
                        <input type="text" class="form-input" placeholder="Street, City, State" value="123 Teacher St, City, State">
                    </div>
                    <div class="form-group">
                        <label>Emergency Contact</label>
                        <input type="text" class="form-input" placeholder="Name - Phone" value="John Doe - +1-555-0111">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-graduation-cap"></i> Academic Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-select">
                            <option value="mathematics" selected>Mathematics</option>
                            <option value="science">Science</option>
                            <option value="english">English</option>
                            <option value="history">History</option>
                            <option value="arts">Arts</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Subjects</label>
                        <input type="text" class="form-input" placeholder="e.g., Algebra, Calculus" value="Algebra, Calculus">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Qualification</label>
                        <input type="text" class="form-input" placeholder="e.g., M.Ed, Ph.D" value="M.Ed in Mathematics">
                    </div>
                    <div class="form-group">
                        <label>Experience (Years)</label>
                        <input type="number" class="form-input" placeholder="Years" value="5">
                    </div>
                    <div class="form-group">
                        <label>Join Date</label>
                        <input type="date" class="form-input" value="2020-01-15">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Salary & Payroll Information -->
    <div class="exam-detail-card" id="salary-payroll">
        <div class="exam-detail-header">
            <h4><i class="fas fa-money-check-alt"></i> Salary & Payroll Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Basic Salary</label>
                        <input type="number" class="form-input" id="editBasicSalary" placeholder="0" value="0" step="1" oninput="calculateTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Attendance Allowance</label>
                        <input type="number" class="form-input" id="editAttendanceAllowance" placeholder="0" value="0" step="1" oninput="calculateTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Loyalty Bonus</label>
                        <input type="number" class="form-input" id="editLoyaltyBonus" placeholder="0" value="0" step="1" oninput="calculateTotalSalary()">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Other Bonus</label>
                        <input type="number" class="form-input" id="editOtherBonus" placeholder="0" value="0" step="1" oninput="calculateTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Overtime</label>
                        <input type="number" class="form-input" id="editOvertime" placeholder="0" value="0" step="1" oninput="calculateTotalSalary()">
                    </div>
                    <div class="form-group">
                        <label>Late Deduction</label>
                        <input type="number" class="form-input" id="editLateDeduction" placeholder="0" value="0" step="1" oninput="calculateTotalSalary()">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Method</label>
                        <select class="form-select" id="editPaymentMethod">
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="KBZ Pay">KBZ Pay</option>
                            <option value="Wave Pay">Wave Pay</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Total Salary</label>
                        <input type="text" class="form-input" id="editTotalSalary" readonly style="background-color: #f8f9fa; font-weight: 600; font-size: 1.1em;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="exam-detail-card">
        <div class="form-actions" style="justify-content: space-between;">
            <button class="simple-btn secondary" onclick="cancelEdit()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="deleteProfile()">
                    <i class="fas fa-trash"></i> Delete Profile
                </button>
                <button class="simple-btn primary" onclick="saveProfile()">
                    <i class="fas fa-check"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const profileId = '<?php echo htmlspecialchars($id); ?>';

// Load salary data on page load
document.addEventListener('DOMContentLoaded', function() {
    loadSalaryData();
    calculateTotalSalary();
    
    // Scroll to salary section if hash is present
    if (window.location.hash === '#salary-payroll') {
        setTimeout(() => {
            document.getElementById('salary-payroll').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
    }
});

function loadSalaryData() {
    // Try to load from payrollData first
    const savedPayroll = localStorage.getItem('payrollData');
    const payrollData = savedPayroll ? JSON.parse(savedPayroll) : [];
    
    let payrollEntry = payrollData
        .filter(entry => entry.employeeId === profileId)
        .sort((a, b) => {
            if (a.month && b.month) {
                return b.month.localeCompare(a.month);
            }
            return 0;
        })[0];
    
    // If not found, try payrollHistory
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
    
    // If still not found, try profile salary data
    if (!payrollEntry) {
        const profileSalaries = JSON.parse(localStorage.getItem('profileSalaries') || '{}');
        const salaryData = profileSalaries[profileId];
        if (salaryData) {
            document.getElementById('editBasicSalary').value = salaryData.basicSalary || 0;
            document.getElementById('editAttendanceAllowance').value = salaryData.attendanceAllowance || 0;
            document.getElementById('editLoyaltyBonus').value = salaryData.loyaltyBonus || 0;
            document.getElementById('editOtherBonus').value = salaryData.otherBonus || 0;
            document.getElementById('editOvertime').value = salaryData.overtime || 0;
            document.getElementById('editLateDeduction').value = salaryData.lateDeduction || 0;
            document.getElementById('editPaymentMethod').value = salaryData.paymentMethod || 'Cash';
            return;
        }
    }
    
    if (payrollEntry) {
        document.getElementById('editBasicSalary').value = payrollEntry.basicSalary || 0;
        document.getElementById('editAttendanceAllowance').value = payrollEntry.attendanceAllowance || 0;
        document.getElementById('editLoyaltyBonus').value = payrollEntry.loyaltyBonus || 0;
        document.getElementById('editOtherBonus').value = payrollEntry.otherBonus || 0;
        document.getElementById('editOvertime').value = payrollEntry.overtime || 0;
        document.getElementById('editLateDeduction').value = payrollEntry.lateDeduction || 0;
        document.getElementById('editPaymentMethod').value = payrollEntry.paymentType || 'Cash';
    }
}

function calculateTotalSalary() {
    const basic = parseFloat(document.getElementById('editBasicSalary').value) || 0;
    const attendance = parseFloat(document.getElementById('editAttendanceAllowance').value) || 0;
    const loyalty = parseFloat(document.getElementById('editLoyaltyBonus').value) || 0;
    const other = parseFloat(document.getElementById('editOtherBonus').value) || 0;
    const overtime = parseFloat(document.getElementById('editOvertime').value) || 0;
    const late = parseFloat(document.getElementById('editLateDeduction').value) || 0;
    
    const total = basic + attendance + loyalty + other + overtime - late;
    document.getElementById('editTotalSalary').value = total.toLocaleString('en-US') + ' MMK';
}

function saveProfile() {
    // Save salary data to profileSalaries
    const profileSalaries = JSON.parse(localStorage.getItem('profileSalaries') || '{}');
    profileSalaries[profileId] = {
        basicSalary: parseFloat(document.getElementById('editBasicSalary').value) || 0,
        attendanceAllowance: parseFloat(document.getElementById('editAttendanceAllowance').value) || 0,
        loyaltyBonus: parseFloat(document.getElementById('editLoyaltyBonus').value) || 0,
        otherBonus: parseFloat(document.getElementById('editOtherBonus').value) || 0,
        overtime: parseFloat(document.getElementById('editOvertime').value) || 0,
        lateDeduction: parseFloat(document.getElementById('editLateDeduction').value) || 0,
        paymentMethod: document.getElementById('editPaymentMethod').value,
        lastUpdated: new Date().toLocaleString()
    };
    localStorage.setItem('profileSalaries', JSON.stringify(profileSalaries));
    
    alert('Teacher profile updated successfully!');
    window.location.href = '/admin/teacher-profile/<?php echo htmlspecialchars($id); ?>';
}

function deleteProfile() {
    showConfirmDialog({
        title: 'Delete Teacher Profile',
        message: 'Are you sure you want to delete this teacher profile? This action cannot be undone.',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Teacher profile deleted successfully!');
            window.location.href = '/admin/teacher-profiles';
        }
    });
}

function cancelEdit() {
    showConfirmDialog({
        title: 'Discard Changes',
        message: 'Are you sure you want to discard your changes?',
        confirmText: 'Discard',
        confirmIcon: 'fas fa-times',
        onConfirm: () => {
            window.location.href = '/admin/teacher-profile/<?php echo htmlspecialchars($id); ?>';
        }
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

