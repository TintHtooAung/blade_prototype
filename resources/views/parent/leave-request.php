<?php
$pageTitle = 'Smart Campus Nova Hub - Leave Request';
$pageIcon = 'fas fa-paper-plane';
$pageHeading = 'Leave Request';
$activePage = 'leave-request';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Leave Request Form -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Submit Leave Request</h3>
    </div>
    
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label>Student <span style="color: #ef4444;">*</span></label>
                <select class="form-select" id="studentSelect" required>
                    <option value="">Select Student</option>
                    <option value="sarah">Sarah Johnson - Grade 9-A</option>
                    <option value="michael">Michael Johnson - Grade 7-B</option>
                </select>
            </div>
            <div class="form-group">
                <label>Leave Type <span style="color: #ef4444;">*</span></label>
                <select class="form-select" id="leaveType" required>
                    <option value="">Select Type</option>
                    <option value="sick">Sick Leave</option>
                    <option value="family">Family Emergency</option>
                    <option value="personal">Personal</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>From Date <span style="color: #ef4444;">*</span></label>
                <input type="date" class="form-input" id="fromDate" required>
            </div>
            <div class="form-group">
                <label>To Date <span style="color: #ef4444;">*</span></label>
                <input type="date" class="form-input" id="toDate" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group" style="flex: 1;">
                <label>Reason <span style="color: #ef4444;">*</span></label>
                <textarea class="form-input" id="reason" rows="4" placeholder="Please provide reason for leave..." required></textarea>
            </div>
        </div>
        
        <div class="form-actions">
            <button class="simple-btn secondary" onclick="clearForm()">
                <i class="fas fa-times"></i> Clear
            </button>
            <button class="simple-btn primary" onclick="submitLeave()">
                <i class="fas fa-paper-plane"></i> Submit Request
            </button>
        </div>
    </div>
</div>

<!-- Leave History -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Leave Request History</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Days</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Response</th>
                </tr>
            </thead>
            <tbody id="leaveHistoryTable">
                <tr>
                    <td><strong>Sarah Johnson</strong><br><small>Grade 9-A</small></td>
                    <td><span class="type-badge">Sick Leave</span></td>
                    <td>Oct 29, 2025</td>
                    <td>Oct 29, 2025</td>
                    <td>1</td>
                    <td>Medical checkup</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Approved by Principal</td>
                </tr>
                <tr>
                    <td><strong>Michael Johnson</strong><br><small>Grade 7-B</small></td>
                    <td><span class="type-badge">Family Emergency</span></td>
                    <td>Oct 28, 2025</td>
                    <td>Oct 28, 2025</td>
                    <td>1</td>
                    <td>Family function</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Approved by Admin</td>
                </tr>
                <tr>
                    <td><strong>Sarah Johnson</strong><br><small>Grade 9-A</small></td>
                    <td><span class="type-badge">Sick Leave</span></td>
                    <td>Oct 15, 2025</td>
                    <td>Oct 16, 2025</td>
                    <td>2</td>
                    <td>Fever and flu</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Approved with medical certificate</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
function clearForm() {
    document.getElementById('studentSelect').value = '';
    document.getElementById('leaveType').value = '';
    document.getElementById('fromDate').value = '';
    document.getElementById('toDate').value = '';
    document.getElementById('reason').value = '';
}

function submitLeave() {
    const student = document.getElementById('studentSelect').value;
    const leaveType = document.getElementById('leaveType').value;
    const fromDate = document.getElementById('fromDate').value;
    const toDate = document.getElementById('toDate').value;
    const reason = document.getElementById('reason').value;
    
    if (!student || !leaveType || !fromDate || !toDate || !reason) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Leave request submitted successfully! You will be notified once reviewed.');
    clearForm();
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
