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

<!-- Leave Request Statistics -->
<div style="display: flex; gap: 16px; margin-bottom: 24px; flex-wrap: wrap;">
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon" style="background: #fff3e0;">
            <i class="fas fa-clock" style="color: #f57c00;"></i>
        </div>
        <div class="stat-details">
            <div class="stat-value" id="pendingCount">3</div>
            <div class="stat-label">Pending Requests</div>
        </div>
    </div>
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon" style="background: #e8f5e9;">
            <i class="fas fa-check-circle" style="color: #2e7d32;"></i>
        </div>
        <div class="stat-details">
            <div class="stat-value" id="approvedCount">2</div>
            <div class="stat-label">Approved</div>
        </div>
    </div>
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon" style="background: #ffebee;">
            <i class="fas fa-times-circle" style="color: #c62828;"></i>
        </div>
        <div class="stat-details">
            <div class="stat-value" id="rejectedCount">1</div>
            <div class="stat-label">Rejected</div>
        </div>
    </div>
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon" style="background: #e3f2fd;">
            <i class="fas fa-calendar-alt" style="color: #1976d2;"></i>
        </div>
        <div class="stat-details">
            <div class="stat-value" id="totalCount">6</div>
            <div class="stat-label">Total This Month</div>
        </div>
    </div>
</div>

<!-- Pending Leave Requests -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Pending Leave Requests</h3>
        <div style="display: flex; gap: 12px; align-items: center;">
            <select id="roleFilterPending" class="filter-select" onchange="filterPendingRequests()">
                <option value="all">All Roles</option>
                <option value="teacher">Teachers</option>
                <option value="staff">Staff</option>
            </select>
            <input type="search" class="simple-search" placeholder="Search..." id="searchPending" oninput="filterPendingRequests()">
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table" id="pendingRequestsTable">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Requester</th>
                    <th>Role</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Reason</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="pendingRequestsBody">
                <tr data-role="teacher" data-requester="James Wilson" data-id="LR-2025-0142">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0142">#LR-2025-0142</a></td>
                    <td><strong>James Wilson</strong></td>
                    <td>Teacher</td>
                    <td>Sick Leave</td>
                    <td>Oct 29, 2025</td>
                    <td>Oct 31, 2025</td>
                    <td>3</td>
                    <td>Flu and rest</td>
                    <td>Oct 28, 2025</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0142')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0142')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr data-role="staff" data-requester="Anna Williams" data-id="LR-2025-0143">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0143">#LR-2025-0143</a></td>
                    <td><strong>Anna Williams</strong></td>
                    <td>Staff</td>
                    <td>Annual Leave</td>
                    <td>Nov 03, 2025</td>
                    <td>Nov 05, 2025</td>
                    <td>3</td>
                    <td>Family event</td>
                    <td>Oct 29, 2025</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0143')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0143')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr data-role="teacher" data-requester="Lucas Adams" data-id="LR-2025-0144">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0144">#LR-2025-0144</a></td>
                    <td><strong>Lucas Adams</strong></td>
                    <td>Teacher</td>
                    <td>Personal Leave</td>
                    <td>Nov 01, 2025</td>
                    <td>Nov 01, 2025</td>
                    <td>1</td>
                    <td>Personal errand</td>
                    <td>Oct 30, 2025</td>
                    <td>
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <button class="icon-btn" onclick="approveLeaveRequest(this, 'LR-2025-0144')" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="icon-btn" onclick="rejectLeaveRequest(this, 'LR-2025-0144')" title="Reject" style="color: #dc2626;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Leave History -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Leave History</h3>
        <div style="display: flex; gap: 12px; align-items: center;">
            <select id="statusFilterHistory" class="filter-select" onchange="filterHistory()">
                <option value="all">All Status</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
            <select id="roleFilterHistory" class="filter-select" onchange="filterHistory()">
                <option value="all">All Roles</option>
                <option value="teacher">Teachers</option>
                <option value="staff">Staff</option>
            </select>
            <input type="search" class="simple-search" placeholder="Search..." id="searchHistory" oninput="filterHistory()">
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table" id="historyTable">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Requester</th>
                    <th>Role</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Reason</th>
                    <th>Submitted</th>
                    <th>Status</th>
                    <th>Processed Date</th>
                </tr>
            </thead>
            <tbody id="historyBody">
                <tr data-status="approved" data-role="teacher">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0128">#LR-2025-0128</a></td>
                    <td><strong>Sarah Johnson</strong></td>
                    <td>Teacher</td>
                    <td>Annual Leave</td>
                    <td>Sep 15, 2025</td>
                    <td>Sep 20, 2025</td>
                    <td>5</td>
                    <td>Family vacation</td>
                    <td>Sep 10, 2025</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Sep 11, 2025</td>
                </tr>
                <tr data-status="approved" data-role="staff">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0130">#LR-2025-0130</a></td>
                    <td><strong>John Smith</strong></td>
                    <td>Staff</td>
                    <td>Sick Leave</td>
                    <td>Sep 20, 2025</td>
                    <td>Sep 22, 2025</td>
                    <td>3</td>
                    <td>Medical appointment</td>
                    <td>Sep 19, 2025</td>
                    <td><span class="status-badge active">Approved</span></td>
                    <td>Sep 19, 2025</td>
                </tr>
                <tr data-status="rejected" data-role="teacher">
                    <td><a href="/admin/attendance/leave-detail/LR-2025-0105">#LR-2025-0105</a></td>
                    <td><strong>Michael Brown</strong></td>
                    <td>Teacher</td>
                    <td>Personal Leave</td>
                    <td>Aug 05, 2025</td>
                    <td>Aug 06, 2025</td>
                    <td>2</td>
                    <td>Personal reasons</td>
                    <td>Aug 01, 2025</td>
                    <td><span class="status-badge cancelled">Rejected</span></td>
                    <td>Aug 02, 2025</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
function approveLeaveRequest(btn, requestId) {
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
            processApproval(row, requestId);
        }
    });
}

function processApproval(row, requestId) {
    const cells = row.querySelectorAll('td');
    
    // Extract all data from the row
    const requestIdLink = cells[0].innerHTML;
    const requester = cells[1].innerHTML;
    const role = cells[2].textContent;
    const type = cells[3].textContent;
    const fromDate = cells[4].textContent;
    const toDate = cells[5].textContent;
    const days = cells[6].textContent;
    const reason = cells[7].textContent;
    const submitted = cells[8].textContent;
    const dataRole = row.getAttribute('data-role');
    
    // Get current date for processed date
    const today = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    
    // Create new row for history table
    const historyRow = document.createElement('tr');
    historyRow.setAttribute('data-status', 'approved');
    historyRow.setAttribute('data-role', dataRole);
    historyRow.innerHTML = `
        <td>${requestIdLink}</td>
        <td>${requester}</td>
        <td>${role}</td>
        <td>${type}</td>
        <td>${fromDate}</td>
        <td>${toDate}</td>
        <td>${days}</td>
        <td>${reason}</td>
        <td>${submitted}</td>
        <td><span class="status-badge active">Approved</span></td>
        <td>${today}</td>
    `;
    
    // Add to history table (at the beginning)
    const historyBody = document.getElementById('historyBody');
    historyBody.insertBefore(historyRow, historyBody.firstChild);
    
    // Remove from pending table
    row.remove();
    
    // Show success message
    showActionStatus(`Leave request ${requestId} approved successfully!`, 'success');
    
    // Update stats
    updateStats();
    
    // Re-apply filters
    filterHistory();
}

function rejectLeaveRequest(btn, requestId) {
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
            processRejection(row, requestId);
        }
    });
}

function processRejection(row, requestId) {
    const cells = row.querySelectorAll('td');
    
    // Extract all data from the row
    const requestIdLink = cells[0].innerHTML;
    const requester = cells[1].innerHTML;
    const role = cells[2].textContent;
    const type = cells[3].textContent;
    const fromDate = cells[4].textContent;
    const toDate = cells[5].textContent;
    const days = cells[6].textContent;
    const reason = cells[7].textContent;
    const submitted = cells[8].textContent;
    const dataRole = row.getAttribute('data-role');
    
    // Get current date for processed date
    const today = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    
    // Create new row for history table
    const historyRow = document.createElement('tr');
    historyRow.setAttribute('data-status', 'rejected');
    historyRow.setAttribute('data-role', dataRole);
    historyRow.innerHTML = `
        <td>${requestIdLink}</td>
        <td>${requester}</td>
        <td>${role}</td>
        <td>${type}</td>
        <td>${fromDate}</td>
        <td>${toDate}</td>
        <td>${days}</td>
        <td>${reason}</td>
        <td>${submitted}</td>
        <td><span class="status-badge cancelled">Rejected</span></td>
        <td>${today}</td>
    `;
    
    // Add to history table (at the beginning)
    const historyBody = document.getElementById('historyBody');
    historyBody.insertBefore(historyRow, historyBody.firstChild);
    
    // Remove from pending table
    row.remove();
    
    // Show success message
    showActionStatus(`Leave request ${requestId} rejected.`, 'warning');
    
    // Update stats
    updateStats();
    
    // Re-apply filters
    filterHistory();
}

function filterPendingRequests() {
    const roleFilter = document.getElementById('roleFilterPending').value.toLowerCase();
    const searchInput = document.getElementById('searchPending').value.toLowerCase();
    const rows = document.querySelectorAll('#pendingRequestsBody tr');
    
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

function filterHistory() {
    const statusFilter = document.getElementById('statusFilterHistory').value.toLowerCase();
    const roleFilter = document.getElementById('roleFilterHistory').value.toLowerCase();
    const searchInput = document.getElementById('searchHistory').value.toLowerCase();
    const rows = document.querySelectorAll('#historyBody tr');
    
    rows.forEach(row => {
        const status = row.getAttribute('data-status');
        const role = row.getAttribute('data-role');
        const text = row.textContent.toLowerCase();
        
        const statusMatch = statusFilter === 'all' || status === statusFilter;
        const roleMatch = roleFilter === 'all' || role === roleFilter;
        const searchMatch = searchInput === '' || text.includes(searchInput);
        
        if (statusMatch && roleMatch && searchMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function updateStats() {
    const pendingRows = document.querySelectorAll('#pendingRequestsBody tr').length;
    const historyRows = document.querySelectorAll('#historyBody tr');
    
    let approved = 0, rejected = 0;
    historyRows.forEach(row => {
        const status = row.getAttribute('data-status');
        if (status === 'approved') approved++;
        else if (status === 'rejected') rejected++;
    });
    
    document.getElementById('pendingCount').textContent = pendingRows;
    document.getElementById('approvedCount').textContent = approved;
    document.getElementById('rejectedCount').textContent = rejected;
    document.getElementById('totalCount').textContent = pendingRows + approved + rejected;
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateStats();
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>

