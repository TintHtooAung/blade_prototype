<?php
$pageTitle = 'Smart Campus Nova Hub - Leave Request Details';
$pageIcon = 'fas fa-file-alt';
$pageHeading = 'Leave Request Details';
$activePage = 'attendance';

// Input reference id from route include
$requestId = isset($leaveId) ? $leaveId : 'LR-UNKNOWN';

// Demo data (in a real app, fetch by $requestId)
$demo = [
    'id' => $requestId,
    'requester' => 'James Wilson',
    'role' => 'Teacher',
    'type' => 'Sick Leave',
    'from' => '2025-10-29',
    'to' => '2025-10-31',
    'reason' => 'Flu and rest',
    'submitted_at' => '2025-10-28T10:00:00Z',
    'status' => 'Pending',
];

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/attendance" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Attendance
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

<!-- Leave Request Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3><?php echo htmlspecialchars($demo['requester']); ?> - <?php echo htmlspecialchars($demo['type']); ?></h3>
                <span class="exam-id">#<?php echo htmlspecialchars($demo['id']); ?></span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="statusBadge"><?php echo htmlspecialchars($demo['status']); ?></span>
                <span class="badge grade-badge"><?php echo htmlspecialchars($demo['role']); ?></span>
            </div>
        </div>
    </div>

    <!-- Leave Request Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Request Information</h4>
            <div style="display: flex; gap: 8px;">
                <button class="simple-btn primary" id="approveBtn" onclick="leaveApprove()">
                    <i class="fas fa-check"></i> Approve
                </button>
                <button class="simple-btn secondary" id="rejectBtn" onclick="leaveReject()">
                    <i class="fas fa-times"></i> Reject
                </button>
            </div>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Request ID:</label>
                <span><?php echo htmlspecialchars($demo['id']); ?></span>
            </div>
            <div class="detail-row">
                <label>Requester:</label>
                <span><?php echo htmlspecialchars($demo['requester']); ?></span>
            </div>
            <div class="detail-row">
                <label>Role:</label>
                <span><?php echo htmlspecialchars($demo['role']); ?></span>
            </div>
            <div class="detail-row">
                <label>Leave Type:</label>
                <span><?php echo htmlspecialchars($demo['type']); ?></span>
            </div>
            <div class="detail-row">
                <label>From Date:</label>
                <span><?php echo date('M d, Y', strtotime($demo['from'])); ?></span>
            </div>
            <div class="detail-row">
                <label>To Date:</label>
                <span><?php echo date('M d, Y', strtotime($demo['to'])); ?></span>
            </div>
            <div class="detail-row">
                <label>Number of Days:</label>
                <span><?php echo (int)( (strtotime($demo['to'])-strtotime($demo['from']))/86400 ) + 1; ?> days</span>
            </div>
            <div class="detail-row">
                <label>Submitted:</label>
                <span><?php echo date('M d, Y h:i A', strtotime($demo['submitted_at'])); ?></span>
            </div>
            <div class="detail-row">
                <label>Status:</label>
                <span id="lrStatusValue" style="font-weight: 600;"><?php echo htmlspecialchars($demo['status']); ?></span>
            </div>
        </div>
    </div>

    <!-- Leave Reason -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-comment-alt"></i> Reason for Leave</h4>
        </div>
        <div class="exam-detail-content">
            <p style="margin: 0; line-height: 1.6; color: #374151;">
                <?php echo nl2br(htmlspecialchars($demo['reason'])); ?>
            </p>
        </div>
    </div>
</div>

<script>
function leaveApprove(){
    document.getElementById('lrStatusValue').textContent = 'Approved';
    document.getElementById('statusBadge').textContent = 'Approved';
    document.getElementById('statusBadge').className = 'badge tutorial-badge';
    
    showActionStatus('Leave request approved successfully!', 'success');
    
    const approveBtn = document.getElementById('approveBtn');
    const rejectBtn = document.getElementById('rejectBtn');
    if (approveBtn) {
        approveBtn.innerHTML = '<i class="fas fa-check"></i> Approved';
        approveBtn.disabled = true;
        approveBtn.style.opacity = '0.6';
        approveBtn.style.cursor = 'not-allowed';
    }
    if (rejectBtn) {
        rejectBtn.style.display = 'none';
    }
}

function leaveReject(){
    document.getElementById('lrStatusValue').textContent = 'Rejected';
    document.getElementById('statusBadge').textContent = 'Rejected';
    document.getElementById('statusBadge').className = 'badge';
    document.getElementById('statusBadge').style.background = '#fee2e2';
    document.getElementById('statusBadge').style.color = '#dc2626';
    
    showActionStatus('Leave request rejected', 'error');
    
    const approveBtn = document.getElementById('approveBtn');
    const rejectBtn = document.getElementById('rejectBtn');
    if (rejectBtn) {
        rejectBtn.innerHTML = '<i class="fas fa-times"></i> Rejected';
        rejectBtn.disabled = true;
        rejectBtn.style.opacity = '0.6';
        rejectBtn.style.cursor = 'not-allowed';
    }
    if (approveBtn) {
        approveBtn.style.display = 'none';
    }
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>


