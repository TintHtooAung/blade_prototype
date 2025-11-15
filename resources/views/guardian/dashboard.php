<?php
$pageTitle = 'Smart Campus Guardian - Dashboard';
$pageIcon = 'fas fa-home';
$activePage = 'guardian-dashboard';

ob_start();
?>

<!-- Welcome Header -->
<div class="welcome-header">
    <div class="welcome-content">
        <h1 class="welcome-title">Welcome back, Guardian! 👋</h1>
        <p class="welcome-subtitle">Track your student's journey and achievements</p>
    </div>
    <div class="welcome-time">
        <div class="current-date" id="currentDate"></div>
        <div class="current-time" id="currentTime"></div>
    </div>
</div>

<style>
/* Welcome Header Styles */
.welcome-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding: 24px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    color: #fff;
    flex-wrap: wrap;
    gap: 16px;
}

.welcome-content {
    flex: 1;
    min-width: 250px;
}

.welcome-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 8px 0;
    color: #fff;
    line-height: 1.2;
}

.welcome-subtitle {
    font-size: 1rem;
    margin: 0;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 400;
}

.welcome-time {
    text-align: right;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.current-date {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #fff;
}

.current-time {
    font-size: 1.5rem;
    font-weight: 700;
    color: #fff;
}

@media (max-width: 768px) {
    .welcome-header {
        padding: 20px;
        flex-direction: column;
        align-items: flex-start;
    }
    
    .welcome-title {
        font-size: 1.5rem;
    }
    
    .welcome-subtitle {
        font-size: 0.9375rem;
    }
    
    .welcome-time {
        width: 100%;
        text-align: left;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    
    .current-time {
        font-size: 1.25rem;
    }
}
</style>

<script>
// Update time and date
function updateDateTime() {
    const now = new Date();
    
    // Update date
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateStr = now.toLocaleDateString('en-US', dateOptions);
    document.getElementById('currentDate').textContent = dateStr;
    
    // Update time
    const timeStr = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
    document.getElementById('currentTime').textContent = timeStr;
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateDateTime();
    // Update time every minute
    setInterval(updateDateTime, 60000);
});
</script>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-user-graduate"></i></div>
        <div class="stat-content">
            <h3>92%</h3>
            <p>Attendance (This Term)</p>
            <div class="stat-badge"><i class="fas fa-arrow-up"></i> Week +2%</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-chart-line"></i></div>
        <div class="stat-content">
            <h3>78%</h3>
            <p>Average Marks</p>
            <div class="stat-badge"><i class="fas fa-equals"></i> Stable</div>
        </div>
    </div>
    <div class="stat-card">
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





