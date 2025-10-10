<?php
$pageTitle = 'Smart Campus Nova Hub - Report Centre';
$pageIcon = 'fas fa-file-alt';
$pageHeading = 'Report Centre';
$activePage = 'reports';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-file-alt"></i>
    </div>
    <div class="page-title-compact">
        <h2>Report Centre</h2>
    </div>
    </div>

<!-- Template Gallery -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Templates</h3>
    </div>
    <div class="template-grid">
        <div class="template-card" data-type="attendance">
            <div class="template-icon"><i class="fas fa-user-check"></i></div>
            <div class="template-title">Attendance Report</div>
            <button class="simple-btn open-preview">Preview & Print</button>
        </div>
        <div class="template-card" data-type="examStats">
            <div class="template-icon"><i class="fas fa-chart-bar"></i></div>
            <div class="template-title">Exam Stats</div>
            <button class="simple-btn open-preview">Preview & Print</button>
        </div>
        <div class="template-card" data-type="academic">
            <div class="template-icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="template-title">Academic Reports</div>
            <button class="simple-btn open-preview">Preview & Print</button>
        </div>
        <div class="template-card" data-type="reportCard">
            <div class="template-icon"><i class="fas fa-file-signature"></i></div>
            <div class="template-title">Report Card (Guardian)</div>
            <button class="simple-btn open-preview">Preview & Print</button>
        </div>
    </div>
</div>

<!-- Modal Preview -->
<div id="reportModal" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title"><i class="fas fa-file-alt"></i> <span id="modalTitle">Report Preview</span></div>
            <button id="modalClose" class="simple-btn-icon"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-controls">
            <select id="templateStyle" class="filter-select">
                <option value="default">Default</option>
                <option value="compact">Compact</option>
                <option value="detailed">Detailed</option>
            </select>
            <select id="grade" class="filter-select">
                <option value="">All Grades</option>
                <option>Grade 8</option>
                <option>Grade 9</option>
                <option>Grade 10</option>
                <option>Grade 11</option>
                <option>Grade 12</option>
            </select>
            <select id="class" class="filter-select">
                <option value="">All Classes</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
            <input type="text" id="student" class="form-input" placeholder="Optional: Student name or ID">
            <button id="printBtn" class="btn-secondary"><i class="fas fa-print"></i> Print</button>
        </div>
        <div id="preview" class="preview-card"></div>
    </div>
</div>

<!-- Reports Schedule & History -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Reports Schedule & History</h3>
        <button id="scheduleNewReport" class="simple-btn"><i class="fas fa-plus"></i> Schedule New Report</button>
    </div>
    
    <!-- Schedule Form (hidden by default) -->
    <div id="scheduleForm" class="simple-section" style="display:none; margin-top:16px;">
        <div class="simple-header">
            <h3><i class="fas fa-calendar-plus"></i> Schedule New Report</h3>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="reportTypeSchedule">Report Type</label>
                    <select id="reportTypeSchedule" class="filter-select">
                        <option value="attendance">Attendance Report</option>
                        <option value="examStats">Exam Report (Class Avg & Classification)</option>
                        <option value="academic">Academic Reports</option>
                        <option value="reportCard">Report Card (Guardian)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reportName">Report Name</label>
                    <input type="text" id="reportName" class="form-input" placeholder="Enter report name">
                </div>
                <div class="form-group">
                    <label for="scheduledDate">Scheduled Date</label>
                    <input type="date" id="scheduledDate" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="gradeSchedule">Grade</label>
                    <select id="gradeSchedule" class="filter-select">
                        <option value="">All Grades</option>
                        <option>Grade 8</option>
                        <option>Grade 9</option>
                        <option>Grade 10</option>
                        <option>Grade 11</option>
                        <option>Grade 12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="classSchedule">Class</label>
                    <select id="classSchedule" class="filter-select">
                        <option value="">All Classes</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="studentSchedule">Student (Optional)</label>
                    <input type="text" id="studentSchedule" class="form-input" placeholder="Student name or ID">
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelSchedule" class="simple-btn secondary"><i class="fas fa-times"></i> Cancel</button>
                <button id="saveSchedule" class="simple-btn primary"><i class="fas fa-check"></i> Schedule Report</button>
            </div>
        </div>
    </div>

    <!-- Upcoming Reports -->
    <div class="simple-header" style="margin-top:16px;">
        <h4>Upcoming Reports</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Report Type</th>
                    <th>Scheduled Date</th>
                    <th>Grade/Class</th>
                    <th>Status</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Attendance Report</td>
                    <td>2025-01-15</td>
                    <td>Grade 9A</td>
                    <td><span class="status-badge draft">Scheduled</span></td>
                    <td>Not Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="editReport('RPT-001')" title="Edit"><i class="fas fa-edit"></i></button>
                        <button class="simple-btn-icon" onclick="cancelReport('RPT-001')" title="Cancel"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Exam Report (Class Avg)</td>
                    <td>2025-01-20</td>
                    <td>Grade 10B</td>
                    <td><span class="status-badge draft">Scheduled</span></td>
                    <td>Not Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="editReport('RPT-002')" title="Edit"><i class="fas fa-edit"></i></button>
                        <button class="simple-btn-icon" onclick="cancelReport('RPT-002')" title="Cancel"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Report Card (Guardian)</td>
                    <td>2025-01-25</td>
                    <td>Grade 8C</td>
                    <td><span class="status-badge draft">Scheduled</span></td>
                    <td>Not Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="editReport('RPT-003')" title="Edit"><i class="fas fa-edit"></i></button>
                        <button class="simple-btn-icon" onclick="cancelReport('RPT-003')" title="Cancel"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Completed Reports -->
    <div class="simple-header" style="margin-top:16px;">
        <h4>Completed Reports</h4>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Report Type</th>
                    <th>Generated Date</th>
                    <th>Grade/Class</th>
                    <th>Status</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Attendance Report</td>
                    <td>2025-01-10</td>
                    <td>Grade 9A</td>
                    <td><span class="status-badge paid">Completed</span></td>
                    <td>Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="viewReport('RPT-C001')" title="View"><i class="fas fa-eye"></i></button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT-C001')" title="Download"><i class="fas fa-download"></i></button>
                        <button class="simple-btn-icon" onclick="printReport('RPT-C001')" title="Print"><i class="fas fa-print"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Exam Report (Class Avg)</td>
                    <td>2025-01-08</td>
                    <td>Grade 10B</td>
                    <td><span class="status-badge paid">Completed</span></td>
                    <td>Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="viewReport('RPT-C002')" title="View"><i class="fas fa-eye"></i></button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT-C002')" title="Download"><i class="fas fa-download"></i></button>
                        <button class="simple-btn-icon" onclick="printReport('RPT-C002')" title="Print"><i class="fas fa-print"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Academic Report</td>
                    <td>2025-01-05</td>
                    <td>Grade 11A</td>
                    <td><span class="status-badge paid">Completed</span></td>
                    <td>Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="viewReport('RPT-C003')" title="View"><i class="fas fa-eye"></i></button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT-C003')" title="Download"><i class="fas fa-download"></i></button>
                        <button class="simple-btn-icon" onclick="printReport('RPT-C003')" title="Print"><i class="fas fa-print"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Report Card (Guardian)</td>
                    <td>2025-01-03</td>
                    <td>Grade 8C</td>
                    <td><span class="status-badge paid">Completed</span></td>
                    <td>Available</td>
                    <td>
                        <button class="simple-btn-icon" onclick="viewReport('RPT-C004')" title="View"><i class="fas fa-eye"></i></button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT-C004')" title="Download"><i class="fas fa-download"></i></button>
                        <button class="simple-btn-icon" onclick="printReport('RPT-C004')" title="Print"><i class="fas fa-print"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentType = null;
    const modal = document.getElementById('reportModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalClose = document.getElementById('modalClose');
    const preview = document.getElementById('preview');
    const printBtn = document.getElementById('printBtn');
    const templateStyle = document.getElementById('templateStyle');
    const grade = document.getElementById('grade');
    const klass = document.getElementById('class');
    const student = document.getElementById('student');

    function buildPreview() {
        const titleMap = {
            attendance: 'Attendance Report',
            examStats: 'Exam Report - Class Averages & Classification',
            academic: 'Academic Report Summary',
            reportCard: 'Exam Report Card (Guardian Copy)'
        };

        const headerHtml = `
            <div class="preview-header">
                <div class="preview-title"><i class="fas fa-file-alt"></i> ${titleMap[currentType]}</div>
                <div class="preview-subtitle">Template: ${getValue('templateStyle','Default')} · Grade: ${getValue('grade','All')} · Class: ${getValue('class','All')} · Student: ${getValue('student','All')}</div>
            </div>
        `;

        let bodyHtml = '';
        if (currentType === 'attendance') {
            bodyHtml += `
                <div class="simple-table-container">
                    <table class="basic-table">
                        <thead><tr><th>Student</th><th>Attendance %</th><th>Present</th><th>Absent</th></tr></thead>
                        <tbody>
                            <tr><td>Alice Johnson</td><td>94%</td><td>135</td><td>9</td></tr>
                            <tr><td>Michael Brown</td><td>88%</td><td>126</td><td>18</td></tr>
                        </tbody>
                    </table>
                </div>
            `;
        } else if (currentType === 'examStats') {
            bodyHtml += `
                <div class="stats-grid-secondary vertical-stats">
                    <div class="stat-card"><div class="stat-icon"><i class="fas fa-chart-line"></i></div><div class="stat-content"><h3>Class Average</h3><div class="stat-number">76%</div><div class="stat-change">Term</div></div></div>
                    <div class="stat-card"><div class="stat-icon"><i class="fas fa-star"></i></div><div class="stat-content"><h3>Distinction</h3><div class="stat-number">12</div><div class="stat-change">>= 85%</div></div></div>
                    <div class="stat-card"><div class="stat-icon"><i class="fas fa-award"></i></div><div class="stat-content"><h3>Merit</h3><div class="stat-number">18</div><div class="stat-change">70–84%</div></div></div>
                    <div class="stat-card"><div class="stat-icon"><i class="fas fa-check"></i></div><div class="stat-content"><h3>Pass</h3><div class="stat-number">20</div><div class="stat-change">50–69%</div></div></div>
                </div>
            `;
        } else if (currentType === 'academic') {
            bodyHtml += `
                <div class="placeholder">Academic overview: enrollments, subject coverage, timetable density, etc.</div>
            `;
        } else if (currentType === 'reportCard') {
            bodyHtml += `
                <div class="simple-table-container">
                    <table class="basic-table">
                        <thead><tr><th>Subject</th><th>Marks</th><th>Grade</th><th>Teacher</th></tr></thead>
                        <tbody>
                            <tr><td>Mathematics</td><td>88</td><td>A</td><td>E. Wilson</td></tr>
                            <tr><td>Science</td><td>81</td><td>A-</td><td>L. Johnson</td></tr>
                            <tr><td>English</td><td>75</td><td>B+</td><td>N. Davis</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="placeholder">Guardian copy. Layout/fields can be configured per template.</div>
            `;
        }

        preview.innerHTML = headerHtml + '<div class="preview-body">' + bodyHtml + '</div>';
    }

    function getValue(id, fallback) {
        const el = document.getElementById(id);
        if (!el) return fallback;
        const v = (el.value || '').trim();
        return v === '' ? fallback : v;
    }

    // Open modal from template cards
    document.querySelectorAll('.open-preview').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const card = this.closest('.template-card');
            currentType = card.getAttribute('data-type');
            modalTitle.textContent = {
                attendance: 'Attendance Report',
                examStats: 'Exam Stats',
                academic: 'Academic Reports',
                reportCard: 'Report Card (Guardian)'
            }[currentType] || 'Report Preview';
            modal.style.display = 'block';
            buildPreview();
        });
    });

    modalClose.addEventListener('click', function(){ modal.style.display = 'none'; });
    window.addEventListener('click', function(e){ if (e.target === modal) modal.style.display = 'none'; });

    templateStyle.addEventListener('change', buildPreview);
    grade.addEventListener('change', buildPreview);
    klass.addEventListener('change', buildPreview);
    student.addEventListener('input', buildPreview);
    printBtn.addEventListener('click', function(e){ e.preventDefault(); window.print(); });

    // Schedule Report functionality
    const scheduleForm = document.getElementById('scheduleForm');
    const scheduleNewReportBtn = document.getElementById('scheduleNewReport');
    const cancelScheduleBtn = document.getElementById('cancelSchedule');
    const saveScheduleBtn = document.getElementById('saveSchedule');

    scheduleNewReportBtn.addEventListener('click', function(e) {
        e.preventDefault();
        scheduleForm.style.display = scheduleForm.style.display === 'none' ? 'block' : 'none';
    });

    cancelScheduleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        scheduleForm.style.display = 'none';
        // Clear form
        document.getElementById('reportName').value = '';
        document.getElementById('scheduledDate').value = '';
        document.getElementById('gradeSchedule').value = '';
        document.getElementById('classSchedule').value = '';
        document.getElementById('studentSchedule').value = '';
    });

    saveScheduleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const reportType = document.getElementById('reportTypeSchedule').value;
        const reportName = document.getElementById('reportName').value;
        const scheduledDate = document.getElementById('scheduledDate').value;
        const grade = document.getElementById('gradeSchedule').value;
        const klass = document.getElementById('classSchedule').value;
        const student = document.getElementById('studentSchedule').value;

        if (!reportName || !scheduledDate) {
            alert('Please fill in report name and scheduled date.');
            return;
        }

        // Add to upcoming reports table (in real app, this would save to database)
        const upcomingTable = document.querySelector('.simple-table-container tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${reportName}</td>
            <td>${scheduledDate}</td>
            <td>${grade || 'All'}${klass ? '/' + klass : ''}</td>
            <td><span class="status-badge draft">Scheduled</span></td>
            <td>Not Available</td>
            <td>
                <button class="simple-btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                <button class="simple-btn-icon" title="Cancel"><i class="fas fa-times"></i></button>
            </td>
        `;
        upcomingTable.appendChild(newRow);

        // Clear form and hide form
        document.getElementById('reportName').value = '';
        document.getElementById('scheduledDate').value = '';
        document.getElementById('gradeSchedule').value = '';
        document.getElementById('classSchedule').value = '';
        document.getElementById('studentSchedule').value = '';
        scheduleForm.style.display = 'none';

        alert('Report scheduled successfully!');
    });
});

// Navigation functions
function viewReport(reportId) {
    window.location.href = `/admin/report-details?id=${reportId}`;
}

function editReport(reportId) {
    window.location.href = `/admin/report-edit?id=${reportId}`;
}

function cancelReport(reportId) {
    showConfirmDialog({
        title: 'Cancel Report',
        message: 'Are you sure you want to cancel this scheduled report?',
        confirmText: 'Cancel Report',
        confirmIcon: 'fas fa-times',
        onConfirm: () => {
            alert('Report cancelled successfully!');
            // Remove from table in real implementation
        }
    });
}

function downloadReport(reportId) {
    alert(`Downloading report ${reportId}...`);
    // Implement download logic
}

function printReport(reportId) {
    window.print();
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>