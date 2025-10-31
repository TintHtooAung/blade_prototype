<?php
$pageTitle = 'Smart Campus Nova Hub - Homework';
$pageIcon = 'fas fa-tasks';
$pageHeading = 'Homework Tracking';
$activePage = 'homework';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

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

<!-- Homework Summary -->
<div class="detail-stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <p>Sarah's Completion</p>
            <h3>92%</h3>
        </div>
        <div class="stat-icon yellow">
            <i class="fas fa-tasks"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Pending</p>
            <h3>2</h3>
        </div>
        <div class="stat-icon orange">
            <i class="fas fa-clock"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Michael's Completion</p>
            <h3>88%</h3>
        </div>
        <div class="stat-icon yellow">
            <i class="fas fa-tasks"></i>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <p>Pending</p>
            <h3>3</h3>
        </div>
        <div class="stat-icon orange">
            <i class="fas fa-clock"></i>
        </div>
    </div>
</div>

<!-- Sarah's Homework -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Sarah Johnson - Grade 9-A</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Assignment</th>
                    <th>Assigned Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>Quadratic Equations - Practice Set</td>
                    <td>Oct 28, 2025</td>
                    <td>Nov 01, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                </tr>
                <tr>
                    <td><strong>Physics</strong></td>
                    <td>Newton's Laws Lab Report</td>
                    <td>Oct 25, 2025</td>
                    <td>Oct 31, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                </tr>
                <tr>
                    <td><strong>Chemistry</strong></td>
                    <td>Chemical Bonding Worksheet</td>
                    <td>Oct 23, 2025</td>
                    <td>Oct 30, 2025</td>
                    <td><span class="status-badge active">Completed</span></td>
                </tr>
                <tr>
                    <td><strong>Biology</strong></td>
                    <td>Cell Structure Diagrams</td>
                    <td>Oct 22, 2025</td>
                    <td>Oct 29, 2025</td>
                    <td><span class="status-badge active">Completed</span></td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>Essay - My Summer Vacation</td>
                    <td>Oct 20, 2025</td>
                    <td>Oct 27, 2025</td>
                    <td><span class="status-badge active">Completed</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Michael's Homework -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Michael Johnson - Grade 7-B</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Assignment</th>
                    <th>Assigned Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>Fractions Practice</td>
                    <td>Oct 29, 2025</td>
                    <td>Nov 02, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                </tr>
                <tr>
                    <td><strong>Science</strong></td>
                    <td>Solar System Project</td>
                    <td>Oct 27, 2025</td>
                    <td>Nov 01, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>Book Report - Harry Potter</td>
                    <td>Oct 26, 2025</td>
                    <td>Oct 31, 2025</td>
                    <td><span class="status-badge pending">Pending</span></td>
                </tr>
                <tr>
                    <td><strong>History</strong></td>
                    <td>World War II Timeline</td>
                    <td>Oct 24, 2025</td>
                    <td>Oct 30, 2025</td>
                    <td><span class="status-badge active">Completed</span></td>
                </tr>
                <tr>
                    <td><strong>Arts</strong></td>
                    <td>Watercolor Painting</td>
                    <td>Oct 21, 2025</td>
                    <td>Oct 28, 2025</td>
                    <td><span class="status-badge active">Completed</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>

