<?php
$pageTitle = 'Smart Campus Nova Hub - Leave Requests';
$pageIcon = 'fas fa-calendar-times';
$pageHeading = 'Leave Requests';
$activePage = 'leave-requests';

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

<!-- View Toggle Tabs -->
<div class="attendance-view-tabs" style="margin-bottom: 24px;">
    <button class="view-tab active" data-view="staff" onclick="switchLeaveSection('staff')">
        <i class="fas fa-users-cog"></i> Staff/Teacher Leaves
    </button>
    <button class="view-tab" data-view="student" onclick="switchLeaveSection('student')">
        <i class="fas fa-user-graduate"></i> Student Leaves
    </button>
</div>

<!-- Staff/Teacher Leaves Section -->
<div id="staff-leaves-section" class="leave-section-content">
    <!-- Pending Leave Requests - Staff/Teachers -->
    <div class="simple-section">
    <div class="simple-header">
        <h3>Pending Leave Requests - Staff/Teachers</h3>
        <div style="display: flex; gap: 12px; align-items: center;">
            <select id="roleFilterPending" class="filter-select" onchange="filterPendingRequests('staff')">
                <option value="all">All Roles</option>
                <option value="teacher">Teachers</option>
                <option value="staff">Staff</option>
            </select>
            <input type="search" class="simple-search" placeholder="Search..." id="searchPendingStaff" oninput="filterPendingRequests('staff')">
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table" id="pendingRequestsTableStaff">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Requester</th>
                    <th>Role</th>
                    <th>Submitted</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="pendingRequestsBodyStaff">
                <tr data-role="teacher" data-requester="James Wilson" data-id="LR-2025-0142">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0142">#LR-2025-0142</a></td>
                    <td><strong>James Wilson</strong></td>
                    <td>Teacher</td>
                    <td>Oct 28, 2025</td>
                    <td>Sick Leave</td>
                    <td>Oct 29, 2025</td>
                    <td>Oct 31, 2025</td>
                    <td>3</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0142', 'staff')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0142', 'staff')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr data-role="staff" data-requester="Anna Williams" data-id="LR-2025-0143">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0143">#LR-2025-0143</a></td>
                    <td><strong>Anna Williams</strong></td>
                    <td>Staff</td>
                    <td>Oct 29, 2025</td>
                    <td>Annual Leave</td>
                    <td>Nov 03, 2025</td>
                    <td>Nov 05, 2025</td>
                    <td>3</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0143', 'staff')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0143', 'staff')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr data-role="teacher" data-requester="Lucas Adams" data-id="LR-2025-0144">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0144">#LR-2025-0144</a></td>
                    <td><strong>Lucas Adams</strong></td>
                    <td>Teacher</td>
                    <td>Oct 30, 2025</td>
                    <td>Personal Leave</td>
                    <td>Nov 01, 2025</td>
                    <td>Nov 01, 2025</td>
                    <td>1</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0144', 'staff')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0144', 'staff')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Leave History - Staff/Teachers -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Leave History - Staff/Teachers</h3>
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <div class="filter-group" style="display: flex; align-items: center; gap: 8px; flex-direction: row;">
                <label for="leaveHistoryDateFilterStaff" style="margin: 0; white-space: nowrap;">Select Date:</label>
                <input type="date" id="leaveHistoryDateFilterStaff" class="filter-select" value="<?php echo date('Y-m-d'); ?>" onchange="filterHistoryByDate('staff', this.value)" style="height: 36px; padding: 8px 12px; margin: 0;">
            </div>
            <button class="simple-btn secondary" onclick="setTodayLeaveHistory('staff')" title="Today" style="height: 36px; padding: 8px 16px; margin: 0;">
                <i class="fas fa-calendar-day"></i> Today
            </button>
            <select id="statusFilterHistoryStaff" class="filter-select" onchange="filterHistory('staff')">
                <option value="all">All Status</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
            <select id="roleFilterHistoryStaff" class="filter-select" onchange="filterHistory('staff')">
                <option value="all">All Roles</option>
                <option value="teacher">Teachers</option>
                <option value="staff">Staff</option>
            </select>
            <input type="search" class="simple-search" placeholder="Search..." id="searchHistoryStaff" oninput="filterHistory('staff')">
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table" id="historyTableStaff">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Requester</th>
                    <th>Role</th>
                    <th>Submitted</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Status</th>
                        <th>Approved By</th>
                    </tr>
                </thead>
                <tbody id="historyBodyStaff">
                <tr data-status="approved" data-role="teacher" data-processed-date="2025-09-11">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0128">#LR-2025-0128</a></td>
                    <td><strong>Sarah Johnson</strong></td>
                    <td>Teacher</td>
                    <td>Sep 10, 2025</td>
                    <td>Annual Leave</td>
                    <td>Sep 15, 2025</td>
                    <td>Sep 20, 2025</td>
                    <td>5</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td><strong>Jane Principal</strong><br><small>Principal</small></td>
                </tr>
                <tr data-status="approved" data-role="staff" data-processed-date="2025-09-19">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0130">#LR-2025-0130</a></td>
                    <td><strong>John Smith</strong></td>
                    <td>Staff</td>
                    <td>Sep 19, 2025</td>
                    <td>Sick Leave</td>
                    <td>Sep 20, 2025</td>
                    <td>Sep 22, 2025</td>
                    <td>3</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td><strong>John Admin</strong><br><small>Administrator</small></td>
                </tr>
                <tr data-status="rejected" data-role="teacher" data-processed-date="2025-08-02">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0105">#LR-2025-0105</a></td>
                    <td><strong>Michael Brown</strong></td>
                    <td>Teacher</td>
                    <td>Aug 01, 2025</td>
                    <td>Personal Leave</td>
                    <td>Aug 05, 2025</td>
                    <td>Aug 06, 2025</td>
                    <td>2</td>
                    <td><span class="status-badge cancelled">Rejected</span></td>
                    <td><strong>Jane Principal</strong><br><small>Principal</small></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Student Leaves Section -->
<div id="student-leaves-section" class="leave-section-content" style="display: none;">
<!-- Pending Leave Requests - Students -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Pending Leave Requests - Students</h3>
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <select id="classFilterPendingStudents" class="filter-select" onchange="filterPendingRequests('student')">
                <option value="all">All Classes</option>
                <option value="Grade 7-A">Grade 7-A</option>
                <option value="Grade 7-B">Grade 7-B</option>
                <option value="Grade 8-A">Grade 8-A</option>
                <option value="Grade 8-B">Grade 8-B</option>
                <option value="Grade 9-A">Grade 9-A</option>
                <option value="Grade 9-B">Grade 9-B</option>
                <option value="Grade 10-A">Grade 10-A</option>
                <option value="Grade 10-B">Grade 10-B</option>
                <option value="Grade 11-A">Grade 11-A</option>
                <option value="Grade 11-B">Grade 11-B</option>
                <option value="Grade 12-A">Grade 12-A</option>
                <option value="Grade 12-B">Grade 12-B</option>
            </select>
            <input type="search" class="simple-search" placeholder="Search..." id="searchPendingStudents" oninput="filterPendingRequests('student')">
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table" id="pendingRequestsTableStudents">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Requester</th>
                    <th>Role</th>
                    <th>Submitted</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="pendingRequestsBodyStudents">
                <tr data-role="student" data-requester="Sarah Johnson" data-id="LR-2025-0146" data-class="Grade 9-A" data-from-date="2025-11-05">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0146">#LR-2025-0146</a></td>
                    <td><strong>Sarah Johnson</strong><br><small>Grade 9-A</small></td>
                    <td>Student</td>
                    <td>Nov 04, 2025</td>
                    <td>Sick Leave</td>
                    <td>Nov 05, 2025</td>
                    <td>Nov 05, 2025</td>
                    <td>1</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0146', 'student')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0146', 'student')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr data-role="student" data-requester="Michael Johnson" data-id="LR-2025-0147" data-class="Grade 7-B" data-from-date="2025-11-08">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0147">#LR-2025-0147</a></td>
                    <td><strong>Michael Johnson</strong><br><small>Grade 7-B</small></td>
                    <td>Student</td>
                    <td>Nov 04, 2025</td>
                    <td>Family Emergency</td>
                    <td>Nov 08, 2025</td>
                    <td>Nov 08, 2025</td>
                    <td>1</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0147', 'student')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0147', 'student')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    <!-- Leave History - Students -->
<div class="simple-section" style="margin-top: 24px;">
        <div class="simple-header">
            <h3>Leave History - Students</h3>
            <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                <div class="filter-group" style="display: flex; align-items: center; gap: 8px; flex-direction: row;">
                    <label for="leaveHistoryDateFilterStudents" style="margin: 0; white-space: nowrap;">Select Date:</label>
                    <input type="date" id="leaveHistoryDateFilterStudents" class="filter-select" value="<?php echo date('Y-m-d'); ?>" onchange="filterHistoryByDate('student', this.value)" style="height: 36px; padding: 8px 12px; margin: 0;">
                </div>
                <button class="simple-btn secondary" onclick="setTodayLeaveHistory('student')" title="Today" style="height: 36px; padding: 8px 16px; margin: 0;">
                    <i class="fas fa-calendar-day"></i> Today
                </button>
                <select id="classFilterHistoryStudents" class="filter-select" onchange="filterHistory('student')">
                    <option value="all">All Classes</option>
                    <option value="Grade 7-A">Grade 7-A</option>
                    <option value="Grade 7-B">Grade 7-B</option>
                    <option value="Grade 8-A">Grade 8-A</option>
                    <option value="Grade 8-B">Grade 8-B</option>
                    <option value="Grade 9-A">Grade 9-A</option>
                    <option value="Grade 9-B">Grade 9-B</option>
                    <option value="Grade 10-A">Grade 10-A</option>
                    <option value="Grade 10-B">Grade 10-B</option>
                    <option value="Grade 11-A">Grade 11-A</option>
                    <option value="Grade 11-B">Grade 11-B</option>
                    <option value="Grade 12-A">Grade 12-A</option>
                    <option value="Grade 12-B">Grade 12-B</option>
                </select>
                <select id="statusFilterHistoryStudents" class="filter-select" onchange="filterHistory('student')">
                    <option value="all">All Status</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
                <input type="search" class="simple-search" placeholder="Search..." id="searchHistoryStudents" oninput="filterHistory('student')">
            </div>
        </div>

        <div class="simple-table-container">
            <table class="basic-table" id="historyTableStudents">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Requester</th>
                        <th>Role</th>
                        <th>Submitted</th>
                        <th>Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Status</th>
                        <th>Approved By</th>
                    </tr>
                </thead>
                <tbody id="historyBodyStudents">
                    <tr data-status="approved" data-role="student" data-processed-date="2025-10-29" data-class="Grade 9-A" data-from-date="2025-10-29">
                        <td><a href="/admin/attendance/leave-detail/LR-2025-0135">#LR-2025-0135</a></td>
                        <td><strong>Sarah Johnson</strong><br><small>Grade 9-A</small></td>
                        <td>Student</td>
                        <td>Oct 28, 2025</td>
                        <td>Sick Leave</td>
                        <td>Oct 29, 2025</td>
                        <td>Oct 29, 2025</td>
                        <td>1</td>
                        <td><span class="status-badge active">Approved</span></td>
                        <td><strong>John Admin</strong><br><small>Administrator</small></td>
                    </tr>
                    <tr data-status="approved" data-role="student" data-processed-date="2025-10-15" data-class="Grade 9-A" data-from-date="2025-10-15">
                        <td><a href="/admin/attendance/leave-detail/LR-2025-0125">#LR-2025-0125</a></td>
                        <td><strong>Sarah Johnson</strong><br><small>Grade 9-A</small></td>
                        <td>Student</td>
                        <td>Oct 14, 2025</td>
                        <td>Sick Leave</td>
                        <td>Oct 15, 2025</td>
                        <td>Oct 16, 2025</td>
                        <td>2</td>
                        <td><span class="status-badge active">Approved</span></td>
                        <td><strong>Jane Principal</strong><br><small>Principal</small></td>
                    </tr>
                    <tr data-status="rejected" data-role="student" data-processed-date="2025-09-10" data-class="Grade 7-B" data-from-date="2025-09-12">
                        <td><a href="/admin/attendance/leave-detail/LR-2025-0115">#LR-2025-0115</a></td>
                        <td><strong>Michael Johnson</strong><br><small>Grade 7-B</small></td>
                        <td>Student</td>
                        <td>Sep 10, 2025</td>
                        <td>Personal</td>
                        <td>Sep 12, 2025</td>
                        <td>Sep 12, 2025</td>
                        <td>1</td>
                        <td><span class="status-badge cancelled">Rejected</span></td>
                        <td><strong>John Admin</strong><br><small>Administrator</small></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Switch between Student and Staff/Teacher sections
function switchLeaveSection(section) {
    // Hide all sections
    document.getElementById('student-leaves-section').style.display = 'none';
    document.getElementById('staff-leaves-section').style.display = 'none';
    
    // Remove active class from all tabs
    document.querySelectorAll('.view-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected section
    if (section === 'student') {
        document.getElementById('student-leaves-section').style.display = 'block';
    } else if (section === 'staff') {
        document.getElementById('staff-leaves-section').style.display = 'block';
    }
    
    // Add active class to selected tab
    const selectedTab = document.querySelector(`.view-tab[data-view="${section}"]`);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Store selected section
    localStorage.setItem('selectedLeaveSection', section);
}

function approveLeaveRequest(btn, requestId, section) {
    // Get the row and its data first
    const row = btn.closest('tr');
    const requesterName = row.querySelector('td:nth-child(2) strong').textContent;
    
    // Show custom confirmation dialog
    showConfirmDialog({
        title: 'Approve Leave Request',
        message: `Are you sure you want to approve the leave request from ${requesterName}?`,
        confirmText: 'Approve',
        confirmIcon: 'fas fa-check',
        buttonStyle: 'primary',
        dialogIcon: 'fas fa-check-circle',
        iconWrapperStyle: 'primary',
        onConfirm: () => {
            processApproval(row, requestId, section);
        }
    });
}

function processApproval(row, requestId, section) {
    const cells = row.querySelectorAll('td');
    
    // Extract all data from the row (new column order: ID, Requester, Role, Submitted, Type, From, To, Days, Actions)
    const requestIdLink = cells[0].innerHTML;
    const requester = cells[1].innerHTML;
    const role = cells[2].textContent;
    const submitted = cells[3].textContent;
    const type = cells[4].textContent;
    const fromDate = cells[5].textContent;
    const toDate = cells[6].textContent;
    const days = cells[7].textContent;
    const dataRole = row.getAttribute('data-role');
    const dataClass = row.getAttribute('data-class');
    const dataFromDate = row.getAttribute('data-from-date');
    
    // Get current user info (approver)
    const approverInfo = getCurrentUserInfo();
    const approverName = approverInfo.name || 'Admin User';
    const approverRole = approverInfo.role || 'Administrator';
    
    // Get current date for processed date (for filtering purposes)
    const todayDate = new Date();
    const todayDateString = todayDate.toISOString().split('T')[0];
    
    // Create new row for history table
    const historyRow = document.createElement('tr');
    historyRow.setAttribute('data-status', 'approved');
    historyRow.setAttribute('data-role', dataRole);
    historyRow.setAttribute('data-processed-date', todayDateString);
    if (dataClass) historyRow.setAttribute('data-class', dataClass);
    if (dataFromDate) historyRow.setAttribute('data-from-date', dataFromDate);
    historyRow.innerHTML = `
        <td>${requestIdLink}</td>
        <td>${requester}</td>
        <td>${role}</td>
        <td>${submitted}</td>
        <td>${type}</td>
        <td>${fromDate}</td>
        <td>${toDate}</td>
        <td>${days}</td>
        <td><span class="status-badge active">Approved</span></td>
        <td><strong>${approverName}</strong><br><small>${approverRole}</small></td>
    `;
    
    // Add to appropriate history table (at the beginning)
    const historyBodyId = section === 'student' ? 'historyBodyStudents' : 'historyBodyStaff';
    const historyBody = document.getElementById(historyBodyId);
    historyBody.insertBefore(historyRow, historyBody.firstChild);
    
    // Remove from pending table
    row.remove();
    
    // Show success message
    showActionStatus(`Leave request ${requestId} approved successfully!`, 'success');
    
    // Re-apply filters
    filterHistory(section);
}

function rejectLeaveRequest(btn, requestId, section) {
    // Get the row and its data first
    const row = btn.closest('tr');
    const requesterName = row.querySelector('td:nth-child(2) strong').textContent;
    
    // Show custom confirmation dialog
    showConfirmDialog({
        title: 'Reject Leave Request',
        message: `Are you sure you want to reject the leave request from ${requesterName}?`,
        confirmText: 'Reject',
        confirmIcon: 'fas fa-times-circle',
        confirmClass: 'danger',
        iconType: 'danger',
        onConfirm: () => {
            processRejection(row, requestId, section);
        }
    });
}

function processRejection(row, requestId, section) {
    const cells = row.querySelectorAll('td');
    
    // Extract all data from the row (new column order: ID, Requester, Role, Submitted, Type, From, To, Days, Actions)
    const requestIdLink = cells[0].innerHTML;
    const requester = cells[1].innerHTML;
    const role = cells[2].textContent;
    const submitted = cells[3].textContent;
    const type = cells[4].textContent;
    const fromDate = cells[5].textContent;
    const toDate = cells[6].textContent;
    const days = cells[7].textContent;
    const dataRole = row.getAttribute('data-role');
    const dataClass = row.getAttribute('data-class');
    const dataFromDate = row.getAttribute('data-from-date');
    
    // Get current user info (approver/rejector)
    const approverInfo = getCurrentUserInfo();
    const approverName = approverInfo.name || 'Admin User';
    const approverRole = approverInfo.role || 'Administrator';
    
    // Get current date for processed date (for filtering purposes)
    const todayDate = new Date();
    const todayDateString = todayDate.toISOString().split('T')[0];
    
    // Create new row for history table
    const historyRow = document.createElement('tr');
    historyRow.setAttribute('data-status', 'rejected');
    historyRow.setAttribute('data-role', dataRole);
    historyRow.setAttribute('data-processed-date', todayDateString);
    if (dataClass) historyRow.setAttribute('data-class', dataClass);
    if (dataFromDate) historyRow.setAttribute('data-from-date', dataFromDate);
    historyRow.innerHTML = `
        <td>${requestIdLink}</td>
        <td>${requester}</td>
        <td>${role}</td>
        <td>${submitted}</td>
        <td>${type}</td>
        <td>${fromDate}</td>
        <td>${toDate}</td>
        <td>${days}</td>
        <td><span class="status-badge cancelled">Rejected</span></td>
        <td><strong>${approverName}</strong><br><small>${approverRole}</small></td>
    `;
    
    // Add to appropriate history table (at the beginning)
    const historyBodyId = section === 'student' ? 'historyBodyStudents' : 'historyBodyStaff';
    const historyBody = document.getElementById(historyBodyId);
    historyBody.insertBefore(historyRow, historyBody.firstChild);
    
    // Remove from pending table
    row.remove();
    
    // Show success message
    showActionStatus(`Leave request ${requestId} rejected.`, 'warning');
    
    // Re-apply filters
    filterHistory(section);
}

// Get current user info (approver)
function getCurrentUserInfo() {
    // Try to get from localStorage or use default
    try {
        const userInfo = localStorage.getItem('currentUser');
        if (userInfo) {
            const user = JSON.parse(userInfo);
            return {
                name: user.name || 'Admin User',
                role: user.role || 'Administrator'
            };
        }
    } catch (e) {
        console.error('Error getting user info:', e);
    }
    
    // Default fallback
    return {
        name: 'Admin User',
        role: 'Administrator'
    };
}

function filterPendingRequests(section) {
    if (section === 'student') {
        const searchInput = document.getElementById('searchPendingStudents').value.toLowerCase();
        const classFilter = document.getElementById('classFilterPendingStudents').value;
        const rows = document.querySelectorAll('#pendingRequestsBodyStudents tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const studentClass = row.getAttribute('data-class');
            
            const searchMatch = searchInput === '' || text.includes(searchInput);
            const classMatch = classFilter === 'all' || studentClass === classFilter;
            
            if (searchMatch && classMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    } else if (section === 'staff') {
        const roleFilter = document.getElementById('roleFilterPending').value.toLowerCase();
        const searchInput = document.getElementById('searchPendingStaff').value.toLowerCase();
        const rows = document.querySelectorAll('#pendingRequestsBodyStaff tr');
        
        rows.forEach(row => {
            const role = row.getAttribute('data-role');
            const text = row.textContent.toLowerCase();
            
            const roleMatch = roleFilter === 'all' || role === roleFilter;
            const searchMatch = searchInput === '' || text.includes(searchInput);
            
            if (roleMatch && searchMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
}

function filterHistory(section) {
    if (section === 'student') {
        const statusFilter = document.getElementById('statusFilterHistoryStudents').value.toLowerCase();
        const searchInput = document.getElementById('searchHistoryStudents').value.toLowerCase();
        const dateFilter = document.getElementById('leaveHistoryDateFilterStudents').value;
        const classFilter = document.getElementById('classFilterHistoryStudents').value;
        const rows = document.querySelectorAll('#historyBodyStudents tr');
        
        rows.forEach(row => {
            const status = row.getAttribute('data-status');
            const text = row.textContent.toLowerCase();
            const processedDate = row.getAttribute('data-processed-date');
            const studentClass = row.getAttribute('data-class');
            
            const statusMatch = statusFilter === 'all' || status === statusFilter;
            const searchMatch = searchInput === '' || text.includes(searchInput);
            const dateMatch = !dateFilter || processedDate === dateFilter || (processedDate && processedDate.startsWith(dateFilter));
            const classMatch = classFilter === 'all' || studentClass === classFilter;
            
            if (statusMatch && searchMatch && dateMatch && classMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    } else if (section === 'staff') {
        const statusFilter = document.getElementById('statusFilterHistoryStaff').value.toLowerCase();
        const roleFilter = document.getElementById('roleFilterHistoryStaff').value.toLowerCase();
        const searchInput = document.getElementById('searchHistoryStaff').value.toLowerCase();
        const dateFilter = document.getElementById('leaveHistoryDateFilterStaff').value;
        const rows = document.querySelectorAll('#historyBodyStaff tr');
        
        rows.forEach(row => {
            const status = row.getAttribute('data-status');
            const role = row.getAttribute('data-role');
            const text = row.textContent.toLowerCase();
            const processedDate = row.getAttribute('data-processed-date');
            
            const statusMatch = statusFilter === 'all' || status === statusFilter;
            const roleMatch = roleFilter === 'all' || role === roleFilter;
            const searchMatch = searchInput === '' || text.includes(searchInput);
            const dateMatch = !dateFilter || processedDate === dateFilter || (processedDate && processedDate.startsWith(dateFilter));
            
            if (statusMatch && roleMatch && searchMatch && dateMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
}

function filterHistoryByDate(section, dateString) {
    filterHistory(section);
}

function setTodayLeaveHistory(section) {
    const today = new Date().toISOString().split('T')[0];
    const dateFilterId = section === 'student' ? 'leaveHistoryDateFilterStudents' : 'leaveHistoryDateFilterStaff';
    const dateFilter = document.getElementById(dateFilterId);
    if (dateFilter) {
        dateFilter.value = today;
        filterHistoryByDate(section, today);
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initialize leave section from localStorage or default to staff
    const savedSection = localStorage.getItem('selectedLeaveSection') || 'staff';
    switchLeaveSection(savedSection);
});
</script>

<style>
/* Attendance View Tabs */
.attendance-view-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
    border-bottom: 2px solid #e5e7eb;
}

.view-tab {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.view-tab:hover {
    color: #4A90E2;
    background: #f9fafb;
}

.view-tab.active {
    color: #4A90E2;
    border-bottom-color: #4A90E2;
}

.view-tab i {
    font-size: 16px;
}

.leave-section-content {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
