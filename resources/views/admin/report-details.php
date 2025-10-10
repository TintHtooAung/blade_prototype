<?php
$pageTitle = 'Smart Campus Nova Hub - Report Details';
$pageIcon = 'fas fa-file-alt';
$pageHeading = 'Report Details';
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
        <i class="fas fa-file-alt"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Report Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3 id="reportTitle">Attendance Report</h3>
                <span class="exam-id" id="reportId">RPT-C001</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge" id="reportStatus">Completed</span>
                <span class="badge grade-badge" id="reportGrade">Grade 9A</span>
            </div>
        </div>
    </div>

    <!-- Report Information -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Report Information</h4>
            <div style="display: flex; gap: 8px;">
                <button class="simple-btn" onclick="downloadReport()"><i class="fas fa-download"></i> Download</button>
                <button class="simple-btn" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Report Type:</label>
                <span id="detailType">Attendance Report</span>
            </div>
            <div class="detail-row">
                <label>Report ID:</label>
                <span id="detailReportId">RPT-C001</span>
            </div>
            <div class="detail-row">
                <label>Generated Date:</label>
                <span id="detailDate">2025-01-10</span>
            </div>
            <div class="detail-row">
                <label>Grade/Class:</label>
                <span id="detailGradeClass">Grade 9A</span>
            </div>
            <div class="detail-row">
                <label>Status:</label>
                <span id="detailStatus">Completed</span>
            </div>
            <div class="detail-row">
                <label>Availability:</label>
                <span id="detailAvailability">Available</span>
            </div>
        </div>
    </div>

    <!-- Report Preview -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-bar"></i> Report Preview</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Attendance %</th>
                            <th>Present Days</th>
                            <th>Absent Days</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alice Johnson</td>
                            <td>94%</td>
                            <td>135</td>
                            <td>9</td>
                            <td><span class="status-badge paid">Good</span></td>
                        </tr>
                        <tr>
                            <td>Michael Brown</td>
                            <td>88%</td>
                            <td>126</td>
                            <td>18</td>
                            <td><span class="status-badge pending">Average</span></td>
                        </tr>
                        <tr>
                            <td>Sarah Wilson</td>
                            <td>76%</td>
                            <td>109</td>
                            <td>35</td>
                            <td><span class="status-badge overdue">Poor</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
const urlParams = new URLSearchParams(window.location.search);
const reportId = urlParams.get('id');

const sampleReports = {
    'RPT-C001': { id: 'RPT-C001', type: 'Attendance Report', date: '2025-01-10', grade: 'Grade 9A', status: 'Completed' },
    'RPT-C002': { id: 'RPT-C002', type: 'Exam Report (Class Avg)', date: '2025-01-08', grade: 'Grade 10B', status: 'Completed' },
    'RPT-C003': { id: 'RPT-C003', type: 'Academic Report', date: '2025-01-05', grade: 'Grade 11A', status: 'Completed' },
    'RPT-C004': { id: 'RPT-C004', type: 'Report Card (Guardian)', date: '2025-01-03', grade: 'Grade 8C', status: 'Completed' }
};

function loadReportDetails() {
    if (!reportId) {
        alert('Report ID not found');
        window.location.href = '/admin/report-centre';
        return;
    }

    const report = sampleReports[reportId];
    if (!report) return;

    document.getElementById('reportTitle').textContent = report.type;
    document.getElementById('reportId').textContent = report.id;
    document.getElementById('reportStatus').textContent = report.status;
    document.getElementById('reportGrade').textContent = report.grade;
    
    document.getElementById('detailType').textContent = report.type;
    document.getElementById('detailReportId').textContent = report.id;
    document.getElementById('detailDate').textContent = report.date;
    document.getElementById('detailGradeClass').textContent = report.grade;
    document.getElementById('detailStatus').textContent = report.status;
}

function downloadReport() {
    alert(`Downloading report ${reportId}...`);
}

document.addEventListener('DOMContentLoaded', loadReportDetails);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

