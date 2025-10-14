<?php
$pageTitle = 'Smart Campus Nova Hub - Report Centre';
$pageIcon = 'fas fa-chart-line';
$pageHeading = 'Report Centre';
$activePage = 'reports';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-chart-line"></i>
    </div>
    <div class="page-title-compact">
        <h2>Report Centre</h2>
        <p style="font-size: 14px; color: #666; margin: 4px 0 0 0;">Generate and manage comprehensive school reports and analytics</p>
    </div>
    <div style="display: flex; gap: 12px; margin-left: auto;">
        <button class="simple-btn secondary" onclick="refreshReportData()">
            <i class="fas fa-sync-alt"></i> Refresh Data
        </button>
        <button class="simple-btn secondary" onclick="exportAllReports()">
            <i class="fas fa-download"></i> Export All
        </button>
    </div>
    </div>

<!-- Report Overview KPIs -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content">
            <h3>Total Students</h3>
            <div class="stat-number" id="totalStudents">1,247</div>
            <div class="stat-change positive">+12 this month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="stat-content">
            <h3>Active Teachers</h3>
            <div class="stat-number" id="totalTeachers">156</div>
            <div class="stat-change">All departments</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="stat-content">
            <h3>Graduation Rate</h3>
            <div class="stat-number" id="graduationRate">94.2%</div>
            <div class="stat-change positive">Above target</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <h3>Avg. Performance</h3>
            <div class="stat-number" id="avgPerformance">87.5%</div>
            <div class="stat-change positive">+3.2% vs last term</div>
        </div>
    </div>
</div>

<!-- Quick Report Categories -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-chart-bar"></i> Quick Reports</h3>
        <p style="margin: 4px 0 0 0; font-size: 14px; color: #666;">
            Generate instant reports for common administrative needs
        </p>
    </div>
    
    <div class="report-categories-grid">
        <!-- Academic Reports -->
        <div class="report-category-card">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-graduation-cap"></i>
        </div>
                <div class="category-info">
                    <h4>Academic Reports</h4>
                    <p>Student performance and academic analytics</p>
                </div>
            </div>
            <div class="category-reports">
                <button class="report-item" onclick="generateReport('student-performance')">
                    <i class="fas fa-chart-line"></i>
                    <span>Student Performance</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('grade-analysis')">
                    <i class="fas fa-chart-pie"></i>
                    <span>Grade Analysis</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('subject-statistics')">
                    <i class="fas fa-book"></i>
                    <span>Subject Statistics</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('exam-results')">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Exam Results Summary</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Attendance Reports -->
        <div class="report-category-card">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="category-info">
                    <h4>Attendance Reports</h4>
                    <p>Student and staff attendance tracking</p>
                </div>
            </div>
            <div class="category-reports">
                <button class="report-item" onclick="generateReport('student-attendance')">
                    <i class="fas fa-users"></i>
                    <span>Student Attendance</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('teacher-attendance')">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Teacher Attendance</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('attendance-trends')">
                    <i class="fas fa-chart-area"></i>
                    <span>Attendance Trends</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('absentee-analysis')">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Absentee Analysis</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Financial Reports -->
        <div class="report-category-card">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="category-info">
                    <h4>Financial Reports</h4>
                    <p>Fee collection and financial analytics</p>
                </div>
            </div>
            <div class="category-reports">
                <button class="report-item" onclick="generateReport('fee-collection')">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Fee Collection Report</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('payment-analysis')">
                    <i class="fas fa-chart-bar"></i>
                    <span>Payment Analysis</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('outstanding-fees')">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Outstanding Fees</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('revenue-summary')">
                    <i class="fas fa-chart-line"></i>
                    <span>Revenue Summary</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Administrative Reports -->
        <div class="report-category-card">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="category-info">
                    <h4>Administrative Reports</h4>
                    <p>School operations and management reports</p>
                </div>
            </div>
            <div class="category-reports">
                <button class="report-item" onclick="generateReport('staff-directory')">
                    <i class="fas fa-address-book"></i>
                    <span>Staff Directory</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('student-directory')">
                    <i class="fas fa-user-graduate"></i>
                    <span>Student Directory</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('class-schedules')">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Class Schedules</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="report-item" onclick="generateReport('facility-usage')">
                    <i class="fas fa-building"></i>
                    <span>Facility Usage</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            </div>
        </div>
    </div>

<!-- Report Generation History -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-history"></i> Recent Reports</h3>
        <div style="display: flex; gap: 12px;">
            <button class="simple-btn secondary" onclick="clearReportHistory()">
                <i class="fas fa-trash"></i> Clear History
            </button>
            <button class="simple-btn" onclick="viewAllReports()">
                <i class="fas fa-list"></i> View All Reports
            </button>
    </div>
    </div>

    <div class="simple-table-container" style="margin-top: 16px;">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Report Name</th>
                    <th>Type</th>
                    <th>Generated By</th>
                    <th>Date Generated</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="recentReportsBody">
                <tr>
                    <td><strong>Student Performance Q1 2025</strong></td>
                    <td><span class="badge-type academic">Academic</span></td>
                    <td>Admin User</td>
                    <td>2025-01-15 14:30</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewReport('RPT001')" title="View">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT001')" title="Download">
                            <i class="fas fa-download"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="shareReport('RPT001')" title="Share">
                            <i class="fas fa-share"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Fee Collection January 2025</strong></td>
                    <td><span class="badge-type financial">Financial</span></td>
                    <td>Finance Manager</td>
                    <td>2025-01-14 10:15</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewReport('RPT002')" title="View">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT002')" title="Download">
                            <i class="fas fa-download"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="shareReport('RPT002')" title="Share">
                            <i class="fas fa-share"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>Attendance Summary December 2024</strong></td>
                    <td><span class="badge-type attendance">Attendance</span></td>
                    <td>Admin User</td>
                    <td>2024-12-31 16:45</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewReport('RPT003')" title="View">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="downloadReport('RPT003')" title="Download">
                            <i class="fas fa-download"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="shareReport('RPT003')" title="Share">
                            <i class="fas fa-share"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Report Generation Modal -->
<div id="reportGenerationModal" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-chart-line"></i> <span id="reportModalTitle">Generate Report</span></h3>
            <button class="receipt-close" onclick="closeReportModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <div id="reportGenerationContent">
                <!-- Dynamic content based on report type -->
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeReportModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="generateReportNow()">
                <i class="fas fa-chart-line"></i> Generate Report
            </button>
        </div>
    </div>
</div>

<!-- Include Shared Styles -->
<link rel="stylesheet" href="/css/shared/fee-management.css">

<style>
/* Report Centre Specific Styles */
.report-categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 16px;
}

.report-category-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 20px;
    transition: all 0.2s ease;
}

.report-category-card:hover {
    border-color: #3b82f6;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.1);
}

.category-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}

.category-icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #3b82f6;
    background: #eff6ff;
}

.category-info h4 {
    margin: 0 0 4px 0;
    font-size: 16px;
    font-weight: 600;
    color: #1e293b;
}

.category-info p {
    margin: 0;
    font-size: 14px;
    color: #64748b;
}

.category-reports {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.report-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    background: #fff;
    color: #374151;
    text-decoration: none;
    transition: all 0.2s ease;
    cursor: pointer;
    font-size: 14px;
}

.report-item:hover {
    border-color: #3b82f6;
    background: #f8fafc;
    color: #1d4ed8;
}

.report-item i:first-child {
    color: #6b7280;
    width: 16px;
    text-align: center;
}

.report-item span {
    flex: 1;
    font-weight: 500;
}

.report-item i:last-child {
    color: #9ca3af;
    font-size: 12px;
}

/* Badge Types */
.badge-type.academic {
    background: #e0f2f1;
    color: #00695c;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.badge-type.financial {
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.badge-type.attendance {
    background: #fff3e0;
    color: #ef6c00;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.badge-type.administrative {
    background: #f3e5f5;
    color: #7b1fa2;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

/* Status Badges */
.status-badge.completed {
    background: #d1fae5;
    color: #059669;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.status-badge.processing {
    background: #fef3c7;
    color: #d97706;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

.status-badge.failed {
    background: #fee2e2;
    color: #dc2626;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
}

/* Action Buttons */
.actions-cell {
    white-space: nowrap;
}

.simple-btn-icon {
    padding: 6px 8px;
    margin: 0 2px;
    border-radius: 4px;
    border: 1px solid #e2e8f0;
    background: #fff;
    color: #64748b;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 12px;
}

.simple-btn-icon:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
    color: #475569;
}

.simple-btn-icon:hover i {
    color: #3b82f6;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .report-categories-grid {
        grid-template-columns: 1fr;
    }
    
    .category-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .report-item {
        padding: 10px 12px;
    }
}
</style>

<script>
// Report Centre JavaScript
let currentReportType = null;
let reportGenerationInProgress = false;

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadRecentReports();
    updateReportStats();
});

// Generate report function
function generateReport(reportType) {
    currentReportType = reportType;
    const modal = document.getElementById('reportGenerationModal');
    const title = document.getElementById('reportModalTitle');
    const content = document.getElementById('reportGenerationContent');
    
    // Set modal title
    title.textContent = getReportTitle(reportType);
    
    // Generate form content based on report type
    content.innerHTML = generateReportForm(reportType);
    
    modal.style.display = 'flex';
}

// Get report title
function getReportTitle(reportType) {
    const titles = {
        'student-performance': 'Student Performance Report',
        'grade-analysis': 'Grade Analysis Report',
        'subject-statistics': 'Subject Statistics Report',
        'exam-results': 'Exam Results Summary',
        'student-attendance': 'Student Attendance Report',
        'teacher-attendance': 'Teacher Attendance Report',
        'attendance-trends': 'Attendance Trends Report',
        'absentee-analysis': 'Absentee Analysis Report',
        'fee-collection': 'Fee Collection Report',
        'payment-analysis': 'Payment Analysis Report',
        'outstanding-fees': 'Outstanding Fees Report',
        'revenue-summary': 'Revenue Summary Report',
        'staff-directory': 'Staff Directory Report',
        'student-directory': 'Student Directory Report',
        'class-schedules': 'Class Schedules Report',
        'facility-usage': 'Facility Usage Report'
    };
    return titles[reportType] || 'Generate Report';
}

// Generate report form
function generateReportForm(reportType) {
    const commonFields = `
        <div class="form-row">
            <div class="form-group">
                <label>Date Range</label>
                <select class="form-input" id="dateRange">
                    <option value="current-month">Current Month</option>
                    <option value="last-month">Last Month</option>
                    <option value="current-quarter">Current Quarter</option>
                    <option value="last-quarter">Last Quarter</option>
                    <option value="current-year">Current Year</option>
                    <option value="custom">Custom Range</option>
                </select>
            </div>
            <div class="form-group">
                <label>Format</label>
                <select class="form-input" id="reportFormat">
                    <option value="pdf">PDF</option>
                    <option value="excel">Excel</option>
                    <option value="csv">CSV</option>
                </select>
            </div>
            </div>
        `;

    let specificFields = '';
    
    if (reportType.includes('student') || reportType.includes('grade')) {
        specificFields = `
            <div class="form-row">
                <div class="form-group">
                    <label>Grade Level</label>
                    <select class="form-input" id="gradeLevel">
                        <option value="all">All Grades</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>
                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <select class="form-input" id="classFilter">
                        <option value="all">All Classes</option>
                        <option value="A">Class A</option>
                        <option value="B">Class B</option>
                        <option value="C">Class C</option>
                    </select>
                </div>
                </div>
        `;
    }
    
    if (reportType.includes('attendance')) {
        specificFields += `
            <div class="form-row">
                <div class="form-group">
                    <label>Include Details</label>
                    <div style="display: flex; gap: 16px; margin-top: 8px;">
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" id="includeCharts" checked style="margin-right: 6px;"> Include Charts
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" id="includeTrends" checked style="margin-right: 6px;"> Include Trends
                        </label>
                    </div>
                </div>
            </div>
        `;
    }
    
    return commonFields + specificFields;
}

// Generate report now
function generateReportNow() {
    if (reportGenerationInProgress) return;
    
    reportGenerationInProgress = true;
    const generateBtn = document.querySelector('#reportGenerationModal .simple-btn.primary');
    const originalText = generateBtn.innerHTML;
    
    generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
    generateBtn.disabled = true;
    
    // Simulate report generation
    setTimeout(() => {
        const reportId = 'RPT' + Date.now();
        const reportName = getReportTitle(currentReportType);
        const reportType = getReportType(currentReportType);
        
        // Add to recent reports
        addToRecentReports({
            id: reportId,
            name: reportName,
            type: reportType,
            generatedBy: 'Admin User',
            date: new Date().toLocaleString(),
            status: 'completed'
        });
        
        showToast(`Report "${reportName}" generated successfully`, 'success');
        closeReportModal();
        
        generateBtn.innerHTML = originalText;
        generateBtn.disabled = false;
        reportGenerationInProgress = false;
        
        // Refresh recent reports
        loadRecentReports();
    }, 2000);
}

// Get report type for badge
function getReportType(reportType) {
    if (reportType.includes('attendance')) return 'attendance';
    if (reportType.includes('fee') || reportType.includes('payment') || reportType.includes('revenue')) return 'financial';
    if (reportType.includes('staff') || reportType.includes('student-directory') || reportType.includes('class') || reportType.includes('facility')) return 'administrative';
    return 'academic';
}

// Close report modal
function closeReportModal() {
    document.getElementById('reportGenerationModal').style.display = 'none';
    currentReportType = null;
}

// Load recent reports
function loadRecentReports() {
    // This would typically load from localStorage or API
    console.log('Loading recent reports...');
}

// Update report stats
function updateReportStats() {
    // This would typically load from API
    console.log('Updating report stats...');
}

// Add to recent reports
function addToRecentReports(report) {
    // This would typically save to localStorage or API
    console.log('Adding report to history:', report);
}

// View report
function viewReport(reportId) {
    window.location.href = `/admin/report-details?id=${reportId}`;
}

// Download report
function downloadReport(reportId) {
    showToast(`Downloading report ${reportId}`, 'success');
    // Simulate download
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = '#';
        link.download = `report-${reportId}.pdf`;
        link.click();
    }, 500);
}

// Share report
function shareReport(reportId) {
    if (navigator.share) {
        navigator.share({
            title: `Report ${reportId}`,
            text: 'Check out this school report',
            url: window.location.href
        }).catch(err => console.log('Error sharing:', err));
    } else {
        // Fallback for browsers that don't support Web Share API
        const shareUrl = `${window.location.origin}/admin/report-details?id=${reportId}`;
        navigator.clipboard.writeText(shareUrl).then(() => {
            showToast('Report link copied to clipboard', 'success');
        }).catch(() => {
            showToast('Unable to share report', 'warning');
        });
    }
}

// Refresh report data
function refreshReportData() {
    showToast('Refreshing report data...', 'info');
    setTimeout(() => {
        showToast('Report data refreshed successfully', 'success');
    }, 1000);
}

// Export all reports
function exportAllReports() {
    showToast('Exporting all reports...', 'info');
}

// Clear report history
function clearReportHistory() {
    if (confirm('Are you sure you want to clear all report history?')) {
        showToast('Report history cleared', 'success');
    }
}

// View all reports
function viewAllReports() {
    showToast('Opening all reports view...', 'info');
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>