<?php
$pageTitle = 'Smart Campus Nova Hub - Attendance Management';
$pageIcon = 'fas fa-user-check';
$pageHeading = 'Attendance Management';
$activePage = 'attendance';

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

<!-- Today's Summary -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Today's Attendance Summary - <?php echo date('F d, Y'); ?></h3>
    </div>
    
    <div class="stats-grid">
        <!-- Students -->
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-content">
                <h3>1,723</h3>
                <p>Students Present</p>
                <div class="stat-badge">
                    <i class="fas fa-users"></i> Total: 1,847 (93.3%)
                </div>
            </div>
        </div>

        <!-- Teachers -->
        <div class="stat-card">
            <div class="stat-icon yellow">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-content">
                <h3>84</h3>
                <p>Teachers Present</p>
                <div class="stat-badge">
                    <i class="fas fa-users"></i> Total: 89 (94.4%)
                </div>
            </div>
        </div>

        <!-- Staff -->
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="stat-content">
                <h3>42</h3>
                <p>Staff Present</p>
                <div class="stat-badge">
                    <i class="fas fa-users"></i> Total: 45 (93.3%)
                </div>
            </div>
        </div>

        <!-- Absent -->
        <div class="stat-card">
            <div class="stat-icon red">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="stat-content">
                <h3>129</h3>
                <p>Total Absent</p>
                <div class="stat-badge">
                    <i class="fas fa-exclamation-triangle"></i> Students: 124, Teachers: 3, Staff: 2
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Attendance Sections -->
<div class="attendance-main-grid">
    <!-- Student Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Student Attendance by Class</h3>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Total Students</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Late</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grade 9-A</strong></td>
                        <td>30</td>
                        <td>29</td>
                        <td>1</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%209-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 9-B</strong></td>
                        <td>28</td>
                        <td>26</td>
                        <td>2</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%209-B">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-A</strong></td>
                        <td>32</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%2010-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-B</strong></td>
                        <td>29</td>
                        <td>25</td>
                        <td>3</td>
                        <td>1</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%2010-B">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-A</strong></td>
                        <td>32</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%2011-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-B</strong></td>
                        <td>31</td>
                        <td>30</td>
                        <td>1</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%2011-B">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 12-A</strong></td>
                        <td>27</td>
                        <td>27</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%2012-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 12-B</strong></td>
                        <td>25</td>
                        <td>24</td>
                        <td>1</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/staff/attendance/class/Grade%2012-B">View Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Teacher Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Teacher Attendance</h3>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Dr. Emily Parker</strong></td>
                        <td>Mathematics</td>
                        <td>Present</td>
                        <td>08:15 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Prof. James Wilson</strong></td>
                        <td>Science</td>
                        <td>Absent</td>
                        <td>-</td>
                        <td>Sick Leave</td>
                    </tr>
                    <tr>
                        <td><strong>Ms. Sarah Chen</strong></td>
                        <td>English</td>
                        <td>Late</td>
                        <td>08:45 AM</td>
                        <td>Traffic</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. David Lee</strong></td>
                        <td>History</td>
                        <td>Present</td>
                        <td>08:10 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Ms. Lisa Wong</strong></td>
                        <td>Art</td>
                        <td>Present</td>
                        <td>08:20 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. Michael Brown</strong></td>
                        <td>PE</td>
                        <td>Present</td>
                        <td>08:05 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Dr. Helen Thompson</strong></td>
                        <td>Chemistry</td>
                        <td>Absent</td>
                        <td>-</td>
                        <td>Family Emergency</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. Robert Kim</strong></td>
                        <td>Music</td>
                        <td>Present</td>
                        <td>08:25 AM</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Staff Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Staff Attendance</h3>
            <a class="simple-btn" href="/staff/attendance/staff/mark"><i class="fas fa-clipboard-check"></i> Mark Attendance</a>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>John Miller</strong></td>
                        <td>Administration</td>
                        <td>Secretary</td>
                        <td>Present</td>
                        <td>08:00 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Maria Santos</strong></td>
                        <td>Administration</td>
                        <td>Accountant</td>
                        <td>Present</td>
                        <td>08:10 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Peter Johnson</strong></td>
                        <td>Maintenance</td>
                        <td>Technician</td>
                        <td>Present</td>
                        <td>07:45 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Anna Williams</strong></td>
                        <td>Food Service</td>
                        <td>Cook</td>
                        <td>Absent</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Carlos Rodriguez</strong></td>
                        <td>Security</td>
                        <td>Guard</td>
                        <td>Present</td>
                        <td>06:00 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Susan Davis</strong></td>
                        <td>Library</td>
                        <td>Librarian</td>
                        <td>Present</td>
                        <td>08:15 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Ahmed Hassan</strong></td>
                        <td>IT Support</td>
                        <td>Technician</td>
                        <td>Late</td>
                        <td>08:30 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pending Leave Requests -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Pending Leave Requests</h3>
        </div>

        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Requester</th>
                        <th>Role</th>
                        <th>Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Submitted</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" onclick="openLeaveRequestDetails('LR-2025-0142', this); return false;">#LR-2025-0142</a></td>
                        <td><strong>James Wilson</strong></td>
                        <td>Teacher</td>
                        <td>Sick Leave</td>
                        <td>Oct 29, 2025</td>
                        <td>Oct 31, 2025</td>
                        <td>3</td>
                        <td>Oct 28, 2025</td>
                        <td class="status-cell"><span>Pending</span></td>
                        <td>
                            <button class="simple-btn" onclick="approveLeaveRequest(this, 'LR-2025-0142')"><i class="fas fa-check"></i> Approve</button>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#" onclick="openLeaveRequestDetails('LR-2025-0143', this); return false;">#LR-2025-0143</a></td>
                        <td><strong>Anna Williams</strong></td>
                        <td>Staff</td>
                        <td>Annual Leave</td>
                        <td>Nov 03, 2025</td>
                        <td>Nov 05, 2025</td>
                        <td>3</td>
                        <td>Oct 29, 2025</td>
                        <td class="status-cell"><span>Pending</span></td>
                        <td>
                            <button class="simple-btn" onclick="approveLeaveRequest(this, 'LR-2025-0143')"><i class="fas fa-check"></i> Approve</button>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#" onclick="openLeaveRequestDetails('LR-2025-0144', this); return false;">#LR-2025-0144</a></td>
                        <td><strong>Lucas Adams</strong></td>
                        <td>Teacher</td>
                        <td>Personal Leave</td>
                        <td>Nov 01, 2025</td>
                        <td>Nov 01, 2025</td>
                        <td>1</td>
                        <td>Oct 30, 2025</td>
                        <td class="status-cell"><span>Pending</span></td>
                        <td>
                            <button class="simple-btn" onclick="approveLeaveRequest(this, 'LR-2025-0144')"><i class="fas fa-check"></i> Approve</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<!-- Leave Request Details Modal -->
<div id="leaveRequestModal" class="attendance-collector-overlay" style="display:none;">
    <div class="attendance-collector-container">
        <div class="collector-header">
            <div class="collector-header-content">
                <div class="collector-back-btn" onclick="closeLeaveRequestModal()">
                    <i class="fas fa-times"></i>
                    <span>Close</span>
                </div>
                <div class="collector-title-section">
                    <h1 id="lrModalTitle">Leave Request Details</h1>
                    <div class="collector-class-info" id="lrModalSub">Review and update request</div>
                </div>
                <div class="collector-actions-header">
                    <button class="collector-action-btn primary" onclick="submitLeaveDecision('approve')">
                        <i class="fas fa-check"></i> Approve
                    </button>
                    <button class="collector-action-btn secondary" onclick="submitLeaveDecision('reject')">
                        <i class="fas fa-times"></i> Reject
                    </button>
                </div>
            </div>
        </div>
        <div class="collector-content">
            <div class="student-grid-container">
                <div class="student-grid-header">
                    <h3>Request Information</h3>
                </div>
                <div class="student-grid" style="grid-template-columns: 1fr;">
                    <div class="student-item" style="cursor: default;">
                        <div class="student-info" style="flex:1;">
                            <div class="student-name" id="lrRequester">Requester: -</div>
                            <p class="student-id" id="lrRole">Role: -</p>
                            <p class="student-id" id="lrType">Type: -</p>
                            <p class="student-id" id="lrDates">Dates: -</p>
                            <p class="student-id" id="lrReason">Reason: -</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="student-grid-container" style="margin-top:16px;">
                <div class="student-grid-header">
                    <h3>Update / Provide Details</h3>
                </div>
                <div class="student-grid" style="grid-template-columns: 1fr;">
                    <div class="student-item" style="cursor: default;">
                        <div class="student-info" style="flex:1;">
                            <label class="student-id">Leave Type</label>
                            <select id="lrInputType" class="form-select compact">
                                <option>Sick Leave</option>
                                <option>Annual Leave</option>
                                <option>Personal Leave</option>
                                <option>Emergency Leave</option>
                            </select>
                            <div style="display:flex; gap:8px; margin-top:8px;">
                                <div style="flex:1;">
                                    <label class="student-id">From</label>
                                    <input id="lrInputFrom" type="date" class="form-select compact" />
                                </div>
                                <div style="flex:1;">
                                    <label class="student-id">To</label>
                                    <input id="lrInputTo" type="date" class="form-select compact" />
                                </div>
                            </div>
                            <label class="student-id" style="margin-top:8px;">Reason</label>
                            <textarea id="lrInputReason" rows="3" class="form-select compact" style="width:100%;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="lrHiddenId" value="" />
    <input type="hidden" id="lrHiddenRowIndex" value="" />
</div>

<script>
function openLeaveRequestDetails(requestId, linkEl) {
    const row = linkEl.closest('tr');
    const cells = row.querySelectorAll('td');
    const requester = cells[1].innerText.trim();
    const role = cells[2].innerText.trim();
    const type = cells[3].innerText.trim();
    const from = cells[4].innerText.trim();
    const to = cells[5].innerText.trim();
    // Reason is no longer in table - will be shown in detail page

    document.getElementById('lrHiddenId').value = requestId;
    document.getElementById('lrHiddenRowIndex').value = Array.from(row.parentNode.children).indexOf(row);

    document.getElementById('lrModalTitle').textContent = `Leave Request ${requestId}`;
    document.getElementById('lrRequester').textContent = `Requester: ${requester}`;
    document.getElementById('lrRole').textContent = `Role: ${role}`;
    document.getElementById('lrType').textContent = `Type: ${type}`;
    document.getElementById('lrDates').textContent = `Dates: ${from} → ${to}`;
    document.getElementById('lrReason').textContent = `Reason: (View details for full reason)`;

    document.getElementById('lrInputType').value = type;
    document.getElementById('lrInputReason').value = '';

    const fromParsed = Date.parse(from);
    const toParsed = Date.parse(to);
    if (!isNaN(fromParsed)) document.getElementById('lrInputFrom').value = new Date(fromParsed).toISOString().slice(0,10);
    if (!isNaN(toParsed)) document.getElementById('lrInputTo').value = new Date(toParsed).toISOString().slice(0,10);

    document.getElementById('leaveRequestModal').style.display = 'block';
}

function closeLeaveRequestModal() {
    document.getElementById('leaveRequestModal').style.display = 'none';
}

function approveLeaveRequest(btn, requestId) {
    const row = btn.closest('tr');
    const statusCell = row.querySelector('.status-cell');
    if (statusCell) {
        statusCell.innerHTML = '<span>Approved</span>';
    }
    showInlineStatus(`Request ${requestId} approved`, 'success');
}

function submitLeaveDecision(action) {
    const id = document.getElementById('lrHiddenId').value;
    const msg = action === 'approve' ? 'approved' : 'rejected';
    showInlineStatus(`Request ${id} ${msg}`, action === 'approve' ? 'success' : 'error');
    closeLeaveRequestModal();
}

function showInlineStatus(message, type) {
    const div = document.createElement('div');
    div.style.cssText = `position: fixed; top: 20px; right: 20px; padding: 12px 16px; color: #fff; border-radius: 8px; z-index: 2000; box-shadow: 0 4px 12px rgba(0,0,0,0.2);`;
    div.style.background = type === 'success' ? '#2e7d32' : type === 'error' ? '#d32f2f' : '#1976d2';
    div.textContent = message;
    document.body.appendChild(div);
    setTimeout(() => div.remove(), 2500);
}
</script>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>
