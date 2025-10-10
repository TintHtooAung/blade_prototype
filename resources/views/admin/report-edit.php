<?php
$pageTitle = 'Smart Campus Nova Hub - Edit Report';
$pageIcon = 'fas fa-edit';
$pageHeading = 'Edit Report';
$activePage = 'reports';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/report-centre" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Report Centre
    </a>
</div>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-edit"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Edit Report Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="reportTitleDisplay">Edit Report</h3>
                <span class="exam-id" id="reportIdDisplay">RPT-001</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="reportStatusBadge">Scheduled</span>
            </div>
        </div>
    </div>

    <!-- Report Information (Editable) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Report Information</h4>
        </div>
        <div class="exam-detail-content">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Report ID</label>
                        <input type="text" class="form-input" id="reportId" readonly>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Report Type</label>
                        <select class="form-select" id="reportType">
                            <option value="attendance">Attendance Report</option>
                            <option value="examStats">Exam Report</option>
                            <option value="academic">Academic Report</option>
                            <option value="reportCard">Report Card</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Scheduled Date</label>
                        <input type="date" class="form-input" id="scheduledDate">
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="text" class="form-input" id="grade" placeholder="e.g., Grade 9A">
                    </div>
                    <div class="form-group">
                        <label>Class (Optional)</label>
                        <input type="text" class="form-input" id="class" placeholder="e.g., A">
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
                <button class="simple-btn" onclick="deleteReport()">
                    <i class="fas fa-trash"></i> Delete
                </button>
                <button class="simple-btn primary" onclick="saveReport()">
                    <i class="fas fa-check"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const urlParams = new URLSearchParams(window.location.search);
const reportId = urlParams.get('id');

const sampleReports = {
    'RPT-001': { id: 'RPT-001', type: 'attendance', date: '2025-01-15', grade: 'Grade 9A', status: 'Scheduled' },
    'RPT-002': { id: 'RPT-002', type: 'examStats', date: '2025-01-20', grade: 'Grade 10B', status: 'Scheduled' },
    'RPT-003': { id: 'RPT-003', type: 'reportCard', date: '2025-01-25', grade: 'Grade 8C', status: 'Scheduled' }
};

function loadReportData() {
    if (!reportId) {
        alert('Report ID not found');
        window.location.href = '/admin/report-centre';
        return;
    }

    const report = sampleReports[reportId];
    if (!report) return;

    document.getElementById('reportIdDisplay').textContent = report.id;
    document.getElementById('reportId').value = report.id;
    document.getElementById('reportType').value = report.type;
    document.getElementById('scheduledDate').value = report.date;
    document.getElementById('grade').value = report.grade;
    document.getElementById('reportStatusBadge').textContent = report.status;
    document.getElementById('reportTitleDisplay').textContent = `Edit: ${report.id}`;
}

function saveReport() {
    alert('Report updated successfully!');
    window.location.href = '/admin/report-centre';
}

function deleteReport() {
    showConfirmDialog({
        title: 'Delete Report',
        message: 'Are you sure you want to delete this scheduled report?',
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            alert('Report deleted successfully!');
            window.location.href = '/admin/report-centre';
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
            window.location.href = '/admin/report-centre';
        }
    });
}

document.addEventListener('DOMContentLoaded', loadReportData);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

