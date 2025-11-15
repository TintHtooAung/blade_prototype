<?php
$pageTitle = 'Smart Campus Guardian - Reports';
$pageIcon = 'fas fa-chart-line';
$activePage = 'guardian-reports';

ob_start();
?>

<div class="page-header-compact">
    <div class="page-icon-compact"><i class="<?php echo $pageIcon; ?>"></i></div>
    <div class="page-title-compact"><h2>Academic Reports</h2></div>
</div>

<div class="simple-section">
    <div class="simple-header"><h3>Term Summary</h3></div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead><tr><th>Subject</th><th>Marks</th><th>Rank</th><th>Teacher</th></tr></thead>
            <tbody>
                <tr><td>Mathematics</td><td>84%</td><td>Top 20%</td><td>Mr. John Smith</td></tr>
                <tr><td>English</td><td>74%</td><td>Top 40%</td><td>Ms. Sarah Johnson</td></tr>
                <tr><td>Science</td><td>76%</td><td>Top 35%</td><td>Dr. James Wilson</td></tr>
                <tr><td>History</td><td>80%</td><td>Top 25%</td><td>Mr. David Lee</td></tr>
            </tbody>
        </table>
    </div>
    <div style="margin-top:12px;">
        <a href="#" class="simple-btn" onclick="downloadReport(); return false;"><i class="fas fa-download"></i> Download Report Card (PDF)</a>
    </div>
    <script>
    function downloadReport(){
        const a=document.createElement('a');
        a.href='#'; a.download='ReportCard.pdf';
        alert('Demo: PDF download will be available in production.');
    }
    </script>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/guardian-layout.php';
?>









