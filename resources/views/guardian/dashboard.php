<?php
$pageTitle = 'Smart Campus Guardian - Dashboard';
$pageIcon = 'fas fa-home';
$activePage = 'guardian-dashboard';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2>Guardian Dashboard</h2>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card" onclick="window.location.href='/guardian/attendance'" style="cursor: pointer;">
        <div class="stat-icon blue"><i class="fas fa-user-graduate"></i></div>
        <div class="stat-content">
            <h3>92%</h3>
            <p>Attendance (This Term)</p>
            <div class="stat-badge"><i class="fas fa-arrow-up"></i> Week +2%</div>
        </div>
    </div>
    <div class="stat-card" onclick="window.location.href='/guardian/reports'" style="cursor: pointer;">
        <div class="stat-icon green"><i class="fas fa-chart-line"></i></div>
        <div class="stat-content">
            <h3>78%</h3>
            <p>Average Marks</p>
            <div class="stat-badge"><i class="fas fa-equals"></i> Stable</div>
        </div>
    </div>
    <div class="stat-card" onclick="window.location.href='/guardian/reports'" style="cursor: pointer;">
        <div class="stat-icon yellow"><i class="fas fa-book"></i></div>
        <div class="stat-content">
            <h3>3</h3>
            <p>Upcoming Assessments</p>
            <div class="stat-badge"><i class="fas fa-calendar"></i> Next: Fri</div>
        </div>
    </div>
</div>

<div class="simple-section" style="margin-top:16px;">
    <div class="simple-header"><h3>AI Insights (Prototype)</h3></div>
    <div class="simple-table-container">
        <ul style="margin:0; padding-left:18px;">
            <li>Math improved 10% vs. last month — keep up momentum.</li>
            <li>Attendance dipped early this month, but recovered this week.</li>
            <li>English reading score is slightly below class average; consider extra practice.</li>
        </ul>
    </div>
    <div style="font-size:12px; color:#666; margin-top:6px;">Rule-based summary for demo; no ML used.</div>
    
</div>

<div class="simple-section" style="margin-top:16px;">
    <div class="simple-header"><h3>Recent Activity</h3></div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead><tr><th>Date</th><th>Type</th><th>Details</th></tr></thead>
            <tbody>
                <tr><td>Oct 29, 2025</td><td>Attendance</td><td>Present</td></tr>
                <tr><td>Oct 28, 2025</td><td>Assessment</td><td>Math Quiz: 18/20</td></tr>
                <tr><td>Oct 27, 2025</td><td>Announcement</td><td>PTA meeting reminder</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/guardian-layout.php';
?>





