<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Details';
$pageIcon = 'fas fa-clipboard-list';
$pageHeading = 'Exam Details';
$activePage = 'exam-database';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/exam-database" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Exam Database
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

<!-- Exam Details Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3>Mathematics Monthly Assessment</h3>
                <span class="exam-id">EX010</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Monthly</span>
                <span class="badge active-badge">Active</span>
                <span class="badge grade-badge">Grade 10</span>
                <span class="badge class-badge">Class A</span>
            </div>
        </div>
    </div>

    <!-- Core Exam Summary (aligned with creation fields) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-info-circle"></i> Exam Summary</h4>
        </div>
        <div class="exam-detail-content">
            <div class="detail-row">
                <label>Exam Name:</label>
                <span>Mathematics Monthly Assessment</span>
            </div>
            <div class="detail-row">
                <label>Exam ID:</label>
                <span>EX010</span>
            </div>
            <div class="detail-row">
                <label>Type:</label>
                <span>Monthly (100 marks)</span>
            </div>
            <div class="detail-row">
                <label>Grade:</label>
                <span>Grade 10</span>
            </div>
            <div class="detail-row">
                <label>Class:</label>
                <span>Class A</span>
            </div>
            <div class="detail-row">
                <label>Status:</label>
                <span>Active</span>
            </div>
        </div>
    </div>

    <!-- Exam Schedule (matches create-exam table) -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-calendar-alt"></i> Exam Schedule</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mathematics</td>
                            <td>100</td>
                            <td>2025-01-20</td>
                            <td>09:00</td>
                            <td>Room 201</td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>100</td>
                            <td>2025-01-22</td>
                            <td>10:30</td>
                            <td>Lab A</td>
                        </tr>
                        <tr>
                            <td>English</td>
                            <td>100</td>
                            <td>2025-01-24</td>
                            <td>08:30</td>
                            <td>Room 105</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Results Overview -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-bar"></i> Results Overview</h4>
        </div>
        <div class="exam-detail-content">
            <div class="results-summary">
                <div class="summary-item">
                    <span class="summary-number">35</span>
                    <span class="summary-label">Total Students</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">30</span>
                    <span class="summary-label">Results Available</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">5</span>
                    <span class="summary-label">Pending Results</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">85%</span>
                    <span class="summary-label">Completion Rate</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Results Table -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-table"></i> Student Results</h4>
            <button class="simple-btn">Print Results</button>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>S001</strong></td>
                            <td>Student data will be loaded from database</td>
                            <td>Results pending</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td><strong>S002</strong></td>
                            <td>Student data will be loaded from database</td>
                            <td>Results pending</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
