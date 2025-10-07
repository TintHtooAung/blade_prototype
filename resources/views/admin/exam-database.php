<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Database';
$pageIcon = 'fas fa-database';
$pageHeading = 'Exam Database';
$activePage = 'exam-database';

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

<!-- Exam Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Active Exams</h3>
        <a href="/admin/create-exam" class="simple-btn">Create New Exam</a>
    </div>

    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Type</th>
                    <th>Grade</th>
                    <th>Class</th>
                    <th>Subject(s)</th>
                    <th>Total Marks</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>EX001</strong></td>
                    <td>Mathematics Tutorial 1</td>
                    <td>Tutorial</td>
                    <td>Grade 9</td>
                    <td>Class A</td>
                    <td>Mathematics</td>
                    <td>25</td>
                    <td>45 min</td>
                    <td>Active</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><strong>EX002</strong></td>
                    <td>Science Monthly Test</td>
                    <td>Monthly</td>
                    <td>Grade 10</td>
                    <td>Class B</td>
                    <td>All 6 subjects</td>
                    <td>100</td>
                    <td>120 min</td>
                    <td>Active</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </td>
                </tr>
                
                <tr>
                    <td><strong>EX005</strong></td>
                    <td>Mathematics Tutorial 2</td>
                    <td>Tutorial</td>
                    <td>Grade 9</td>
                    <td>Class B</td>
                    <td>Mathematics</td>
                    <td>25</td>
                    <td>45 min</td>
                    <td>Active</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><strong>EX007</strong></td>
                    <td>Language Skills Test</td>
                    <td>Tutorial</td>
                    <td>Grade 7</td>
                    <td>Class D</td>
                    <td>English, Myanmar</td>
                    <td>25</td>
                    <td>60 min</td>
                    <td>Active</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><strong>EX010</strong></td>
                    <td>Comprehensive Semester</td>
                    <td>Semester</td>
                    <td>Grade 12</td>
                    <td>Class B</td>
                    <td>All 6 subjects</td>
                    <td>100</td>
                    <td>240 min</td>
                    <td>Active</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Completed Exams -->
    <div class="simple-header" style="margin-top:16px;">
        <h3>Completed Exams</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Type</th>
                    <th>Grade</th>
                    <th>Class</th>
                    <th>Subject(s)</th>
                    <th>Total Marks</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>EX004</strong></td>
                    <td>History Semester Exam</td>
                    <td>Semester</td>
                    <td>Grade 11</td>
                    <td>Class A</td>
                    <td>All 6 subjects</td>
                    <td>100</td>
                    <td>180 min</td>
                    <td>Completed</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details"><i class="fas fa-eye"></i> View Details</a>
                    </td>
                </tr>
                <tr>
                    <td><strong>EX006</strong></td>
                    <td>Science Final Exam</td>
                    <td>Final</td>
                    <td>Grade 12</td>
                    <td>Class A</td>
                    <td>All 6 subjects</td>
                    <td>100</td>
                    <td>180 min</td>
                    <td>Completed</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details"><i class="fas fa-eye"></i> View Details</a>
                    </td>
                </tr>
                <tr>
                    <td><strong>EX009</strong></td>
                    <td>Mathematics Final Exam</td>
                    <td>Final</td>
                    <td>Grade 9</td>
                    <td>Class A</td>
                    <td>Mathematics</td>
                    <td>100</td>
                    <td>180 min</td>
                    <td>Completed</td>
                    <td class="actions">
                        <a href="/admin/exam-details" class="action-btn view-details"><i class="fas fa-eye"></i> View Details</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>