<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Results';
$pageIcon = 'fas fa-chart-bar';
$pageHeading = 'Exam Results';
$activePage = 'exams';

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

<!-- Exam Results Section -->
<div class="simple-section">
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3>Final Exam - Science</h3>
                <span class="exam-id">EX005</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Final</span>
                <span class="badge completed-badge">Completed</span>
                <span class="badge grade-badge">Grade 12-A</span>
            </div>
        </div>
    </div>

    <!-- Statistics Overview -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-line"></i> Statistics Overview</h4>
            <button class="simple-btn" onclick="window.print()"><i class="fas fa-print"></i> Print Report</button>
        </div>
        <div class="exam-detail-content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #e3f2fd;">
                        <i class="fas fa-users" style="color: #1976d2;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">28</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #e8f5e9;">
                        <i class="fas fa-check-circle" style="color: #2e7d32;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">26</div>
                        <div class="stat-label">Passed</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #ffebee;">
                        <i class="fas fa-times-circle" style="color: #c62828;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">2</div>
                        <div class="stat-label">Failed</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fff3e0;">
                        <i class="fas fa-percentage" style="color: #ef6c00;"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">92.8%</div>
                        <div class="stat-label">Pass Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Metrics -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-calculator"></i> Performance Metrics</h4>
        </div>
        <div class="exam-detail-content">
            <div class="metrics-grid">
                <div class="metric-item">
                    <label>Highest Score</label>
                    <span class="metric-value success">98 / 100</span>
                </div>
                <div class="metric-item">
                    <label>Lowest Score</label>
                    <span class="metric-value danger">32 / 100</span>
                </div>
                <div class="metric-item">
                    <label>Average Score</label>
                    <span class="metric-value primary">76.5 / 100</span>
                </div>
                <div class="metric-item">
                    <label>Median Score</label>
                    <span class="metric-value">78 / 100</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Grade Distribution -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-chart-pie"></i> Grade Distribution</h4>
        </div>
        <div class="exam-detail-content">
            <div class="grade-distribution">
                <div class="grade-bar-item">
                    <div class="grade-label">
                        <span class="grade-name">Distinction (80+)</span>
                        <span class="grade-count">12 students</span>
                    </div>
                    <div class="grade-bar-container">
                        <div class="grade-bar" style="width: 42.8%; background: #4caf50;"></div>
                        <span class="grade-percentage">42.8%</span>
                    </div>
                </div>
                <div class="grade-bar-item">
                    <div class="grade-label">
                        <span class="grade-name">Merit (60-79)</span>
                        <span class="grade-count">10 students</span>
                    </div>
                    <div class="grade-bar-container">
                        <div class="grade-bar" style="width: 35.7%; background: #2196f3;"></div>
                        <span class="grade-percentage">35.7%</span>
                    </div>
                </div>
                <div class="grade-bar-item">
                    <div class="grade-label">
                        <span class="grade-name">Pass (40-59)</span>
                        <span class="grade-count">4 students</span>
                    </div>
                    <div class="grade-bar-container">
                        <div class="grade-bar" style="width: 14.3%; background: #ff9800;"></div>
                        <span class="grade-percentage">14.3%</span>
                    </div>
                </div>
                <div class="grade-bar-item">
                    <div class="grade-label">
                        <span class="grade-name">Fail (Below 40)</span>
                        <span class="grade-count">2 students</span>
                    </div>
                    <div class="grade-bar-container">
                        <div class="grade-bar" style="width: 7.1%; background: #f44336;"></div>
                        <span class="grade-percentage">7.1%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subject-wise Performance -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-book"></i> Subject-wise Performance</h4>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Max Marks</th>
                            <th>Highest</th>
                            <th>Average</th>
                            <th>Lowest</th>
                            <th>Pass Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Mathematics</strong></td>
                            <td>100</td>
                            <td>98</td>
                            <td>78.5</td>
                            <td>42</td>
                            <td><span class="status-badge paid">92.8%</span></td>
                        </tr>
                        <tr>
                            <td><strong>English</strong></td>
                            <td>100</td>
                            <td>95</td>
                            <td>76.2</td>
                            <td>38</td>
                            <td><span class="status-badge paid">89.3%</span></td>
                        </tr>
                        <tr>
                            <td><strong>Physics</strong></td>
                            <td>100</td>
                            <td>96</td>
                            <td>74.8</td>
                            <td>32</td>
                            <td><span class="status-badge paid">85.7%</span></td>
                        </tr>
                        <tr>
                            <td><strong>Chemistry</strong></td>
                            <td>100</td>
                            <td>94</td>
                            <td>77.3</td>
                            <td>45</td>
                            <td><span class="status-badge paid">96.4%</span></td>
                        </tr>
                        <tr>
                            <td><strong>Biology</strong></td>
                            <td>100</td>
                            <td>97</td>
                            <td>79.1</td>
                            <td>48</td>
                            <td><span class="status-badge paid">96.4%</span></td>
                        </tr>
                        <tr>
                            <td><strong>Economics</strong></td>
                            <td>100</td>
                            <td>92</td>
                            <td>75.4</td>
                            <td>40</td>
                            <td><span class="status-badge paid">92.8%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Individual Student Results -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-users"></i> Individual Student Results</h4>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="exportResults()"><i class="fas fa-file-excel"></i> Export Excel</button>
                <button class="simple-btn" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table responsive-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Total Marks</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Rank"><span class="rank-badge gold">1</span></td>
                            <td data-label="Student ID"><strong>S001</strong></td>
                            <td data-label="Student Name">Aung Kyaw Min</td>
                            <td data-label="Total Marks">588 / 600</td>
                            <td data-label="Percentage">98.0%</td>
                            <td data-label="Grade"><span class="grade-badge distinction">Distinction</span></td>
                            <td data-label="Status"><span class="status-badge paid">Pass</span></td>
                            <td data-label="Actions">
                                <button class="simple-btn-icon" onclick="viewDetailedReport('S001')" title="View Report">
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Rank"><span class="rank-badge silver">2</span></td>
                            <td data-label="Student ID"><strong>S007</strong></td>
                            <td data-label="Student Name">Su Myat Noe</td>
                            <td data-label="Total Marks">570 / 600</td>
                            <td data-label="Percentage">95.0%</td>
                            <td data-label="Grade"><span class="grade-badge distinction">Distinction</span></td>
                            <td data-label="Status"><span class="status-badge paid">Pass</span></td>
                            <td data-label="Actions">
                                <button class="simple-btn-icon" onclick="viewDetailedReport('S007')" title="View Report">
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Rank"><span class="rank-badge bronze">3</span></td>
                            <td data-label="Student ID"><strong>S015</strong></td>
                            <td data-label="Student Name">Thant Zin Oo</td>
                            <td data-label="Total Marks">558 / 600</td>
                            <td data-label="Percentage">93.0%</td>
                            <td data-label="Grade"><span class="grade-badge distinction">Distinction</span></td>
                            <td data-label="Status"><span class="status-badge paid">Pass</span></td>
                            <td data-label="Actions">
                                <button class="simple-btn-icon" onclick="viewDetailedReport('S015')" title="View Report">
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Rank">4</td>
                            <td data-label="Student ID"><strong>S012</strong></td>
                            <td data-label="Student Name">Aye Chan Myae</td>
                            <td data-label="Total Marks">540 / 600</td>
                            <td data-label="Percentage">90.0%</td>
                            <td data-label="Grade"><span class="grade-badge distinction">Distinction</span></td>
                            <td data-label="Status"><span class="status-badge paid">Pass</span></td>
                            <td data-label="Actions">
                                <button class="simple-btn-icon" onclick="viewDetailedReport('S012')" title="View Report">
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Rank">5</td>
                            <td data-label="Student ID"><strong>S003</strong></td>
                            <td data-label="Student Name">Zaw Myo Htun</td>
                            <td data-label="Total Marks">522 / 600</td>
                            <td data-label="Percentage">87.0%</td>
                            <td data-label="Grade"><span class="grade-badge distinction">Distinction</span></td>
                            <td data-label="Status"><span class="status-badge paid">Pass</span></td>
                            <td data-label="Actions">
                                <button class="simple-btn-icon" onclick="viewDetailedReport('S003')" title="View Report">
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stat-content {
    flex: 1;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #333;
    line-height: 1.2;
}

.stat-label {
    font-size: 0.85rem;
    color: #666;
    margin-top: 4px;
}

/* Metrics Grid */
.metrics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.metric-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding: 16px;
    background: #f8f9fa;
    border-radius: 6px;
}

.metric-item label {
    font-size: 0.85rem;
    color: #666;
    font-weight: 500;
}

.metric-value {
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
}

.metric-value.success {
    color: #2e7d32;
}

.metric-value.danger {
    color: #c62828;
}

.metric-value.primary {
    color: #1976d2;
}

/* Grade Distribution */
.grade-distribution {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.grade-bar-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.grade-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9rem;
}

.grade-name {
    font-weight: 600;
    color: #333;
}

.grade-count {
    color: #666;
}

.grade-bar-container {
    position: relative;
    background: #f0f0f0;
    border-radius: 8px;
    height: 32px;
    overflow: hidden;
}

.grade-bar {
    height: 100%;
    border-radius: 8px;
    transition: width 0.3s ease;
    display: flex;
    align-items: center;
    padding: 0 12px;
}

.grade-percentage {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-weight: 600;
    font-size: 0.85rem;
    color: #333;
}

/* Rank Badges */
.rank-badge {
    display: inline-block;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    text-align: center;
    line-height: 32px;
    font-weight: 700;
    font-size: 0.85rem;
}

.rank-badge.gold {
    background: #ffd700;
    color: #fff;
}

.rank-badge.silver {
    background: #c0c0c0;
    color: #fff;
}

.rank-badge.bronze {
    background: #cd7f32;
    color: #fff;
}

/* Grade Badges */
.grade-badge.distinction {
    background: #e8f5e9;
    color: #2e7d32;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
}

.completed-badge {
    background: #e8f5e9;
    color: #2e7d32;
}

@media screen and (max-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .metrics-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
function viewDetailedReport(studentId) {
    // Navigate to detailed student report
    window.location.href = `/admin/student-report?examId=EX005&studentId=${studentId}`;
}

function exportResults() {
    // Export results to Excel
    // Backend: GET /api/exams/{examId}/export
    alert('Exporting results to Excel...');
}

/**
 * Load exam results from backend
 * Backend: GET /api/exams/{examId}/results
 */
async function loadResults() {
    try {
        // const response = await fetch('/api/exams/EX005/results');
        // const data = await response.json();
        // renderResults(data);
        console.log('Results page ready for backend integration');
    } catch (error) {
        console.error('Error loading results:', error);
    }
}

document.addEventListener('DOMContentLoaded', loadResults);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

