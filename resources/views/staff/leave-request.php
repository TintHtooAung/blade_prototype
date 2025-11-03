<?php
$pageTitle = 'Smart Campus Nova Hub - Leave Request';
$pageIcon = 'fas fa-calendar-times';
$pageHeading = 'Leave Request';
$activePage = 'leave-request';

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
        <div class="section-actions">
            <button type="button" class="simple-btn secondary" onclick="window.location.href='/staff/dashboard'">
                <i class="fas fa-arrow-left"></i> Back
            </button>
        </div>
    </div>
    
    <form id="leaveRequestForm" onsubmit="submitLeaveRequest(event)">
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="leaveType">Leave Type <span style="color: #ef4444;">*</span></label>
                    <select id="leaveType" name="leaveType" class="form-select" required>
                        <option value="">Select Leave Type</option>
                        <option value="Sick Leave">Sick Leave</option>
                        <option value="Annual Leave">Annual Leave</option>
                        <option value="Personal Leave">Personal Leave</option>
                        <option value="Emergency Leave">Emergency Leave</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="employeeName">Name</label>
                    <input type="text" id="employeeName" name="employeeName" class="form-input" value="John Smith" readonly>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="fromDate">From Date <span style="color: #ef4444;">*</span></label>
                    <input type="date" id="fromDate" name="fromDate" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="toDate">To Date <span style="color: #ef4444;">*</span></label>
                    <input type="date" id="toDate" name="toDate" class="form-input" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group" style="flex: 1;">
                    <label for="reason">Reason <span style="color: #ef4444;">*</span></label>
                    <textarea id="reason" name="reason" class="form-input" rows="5" placeholder="Please provide a detailed reason for your leave request..." required></textarea>
                </div>
            </div>
            
        </div>
        
        <div class="form-actions">
            <button type="button" class="simple-btn secondary" onclick="resetForm()">
                <i class="fas fa-redo"></i> Reset
            </button>
            <button type="submit" class="simple-btn primary">
                <i class="fas fa-paper-plane"></i> Submit Request
            </button>
        </div>
    </form>
</div>

<!-- Leave Request History -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>My Leave Request History</h3>
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <div class="filter-group" style="display: flex; align-items: center; gap: 8px; flex-direction: row;">
                <label for="leaveHistoryDateFilter" style="margin: 0; white-space: nowrap;">Select Date:</label>
                <input type="date" id="leaveHistoryDateFilter" class="filter-select" value="<?php echo date('Y-m-d'); ?>" onchange="filterLeaveHistoryByDate(this.value)" style="height: 36px; padding: 8px 12px; margin: 0;">
            </div>
            <button class="simple-btn secondary" onclick="setTodayLeaveHistory()" title="Today" style="height: 36px; padding: 8px 16px; margin: 0;">
                <i class="fas fa-calendar-day"></i> Today
            </button>
        </div>
    </div>
    
    <div class="detail-table-container">
        <table class="academic-table">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-submitted-date="2025-11-05">
                    <td>#LR-2025-0145</td>
                    <td>Annual Leave</td>
                    <td>Nov 10, 2025</td>
                    <td>Nov 15, 2025</td>
                    <td>5</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>Nov 05, 2025</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details" onclick="viewLeaveRequest('LR-2025-0145')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr data-submitted-date="2025-09-19">
                    <td>#LR-2025-0130</td>
                    <td>Sick Leave</td>
                    <td>Sep 20, 2025</td>
                    <td>Sep 22, 2025</td>
                    <td>3</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Sep 19, 2025</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details" onclick="viewLeaveRequest('LR-2025-0130')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr data-submitted-date="2025-08-10">
                    <td>#LR-2025-0110</td>
                    <td>Personal Leave</td>
                    <td>Aug 15, 2025</td>
                    <td>Aug 16, 2025</td>
                    <td>2</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Aug 10, 2025</td>
                    <td class="actions-cell">
                        <button class="action-icon view" title="View Details" onclick="viewLeaveRequest('LR-2025-0110')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('fromDate').setAttribute('min', today);
    document.getElementById('toDate').setAttribute('min', today);
    
    // Update toDate minimum when fromDate changes
    document.getElementById('fromDate').addEventListener('change', function() {
        const fromDate = this.value;
        document.getElementById('toDate').setAttribute('min', fromDate);
        if (document.getElementById('toDate').value && document.getElementById('toDate').value < fromDate) {
            document.getElementById('toDate').value = fromDate;
        }
    });
});

function submitLeaveRequest(event) {
    event.preventDefault();
    
    const formData = {
        leaveType: document.getElementById('leaveType').value,
        fromDate: document.getElementById('fromDate').value,
        toDate: document.getElementById('toDate').value,
        reason: document.getElementById('reason').value
    };
    
    // Validate dates
    if (new Date(formData.fromDate) > new Date(formData.toDate)) {
        alert('To Date must be after From Date');
        return;
    }
    
    // Calculate days
    const from = new Date(formData.fromDate);
    const to = new Date(formData.toDate);
    const days = Math.ceil((to - from) / (1000 * 60 * 60 * 24)) + 1;
    
    if (days <= 0) {
        alert('Please select valid dates');
        return;
    }
    
    // Show loading state
    const submitBtn = event.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    
    // Simulate API call
    setTimeout(() => {
        showActionStatus('Leave request submitted successfully! Your request has been sent to the admin for approval.', 'success');
        resetForm();
        
        // Reload page after 2 seconds to show new request in history
        setTimeout(() => {
            location.reload();
        }, 2000);
    }, 1500);
}

function resetForm() {
    document.getElementById('leaveRequestForm').reset();
    document.getElementById('employeeName').value = 'John Smith';
    
    // Reset date minimums
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('fromDate').setAttribute('min', today);
    document.getElementById('toDate').setAttribute('min', today);
}

function viewLeaveRequest(requestId) {
    // In a real application, this would navigate to a detail page
    alert('View leave request details for ' + requestId + '\n\nThis would navigate to a detail page showing full request information.');
}

function showActionStatus(message, type) {
    // Check if function exists (from shared UI components)
    if (typeof showActionStatus === 'function') {
        showActionStatus(message, type);
    } else {
        // Fallback notification
        const div = document.createElement('div');
        div.style.cssText = `position: fixed; top: 20px; right: 20px; padding: 16px 20px; background: ${type === 'success' ? '#2e7d32' : '#1976d2'}; color: white; border-radius: 8px; z-index: 2000; box-shadow: 0 4px 12px rgba(0,0,0,0.2); max-width: 400px;`;
        div.textContent = message;
        document.body.appendChild(div);
        setTimeout(() => div.remove(), 5000);
    }
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>

