<?php
$pageTitle = 'Smart Campus Nova Hub - Academic Reports';
$pageIcon = 'fas fa-chart-line';
$pageHeading = 'Academic Reports';
$activePage = 'academic-reports';

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

<!-- Sarah's Academic Performance -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Sarah Johnson - Grade 9-A (Academic Performance)</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Mid-Term</th>
                    <th>Assignments</th>
                    <th>Attendance</th>
                    <th>Current Grade</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>Ms. Sarah Johnson</td>
                    <td>95%</td>
                    <td>93%</td>
                    <td>98%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Excellent</span></td>
                </tr>
                <tr>
                    <td><strong>Physics</strong></td>
                    <td>Dr. Emily Chen</td>
                    <td>92%</td>
                    <td>90%</td>
                    <td>96%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Very Good</span></td>
                </tr>
                <tr>
                    <td><strong>Chemistry</strong></td>
                    <td>Mr. David Kumar</td>
                    <td>88%</td>
                    <td>85%</td>
                    <td>96%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b;">● Good</span></td>
                </tr>
                <tr>
                    <td><strong>Biology</strong></td>
                    <td>Ms. Lisa Park</td>
                    <td>94%</td>
                    <td>92%</td>
                    <td>98%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Excellent</span></td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>Mr. Paolo Rossi</td>
                    <td>86%</td>
                    <td>88%</td>
                    <td>96%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b;">● Good</span></td>
                </tr>
                <tr>
                    <td><strong>Myanmar</strong></td>
                    <td>Ms. Ayesha Khan</td>
                    <td>90%</td>
                    <td>94%</td>
                    <td>98%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Very Good</span></td>
                </tr>
                <tr style="background: #f8fafc; font-weight: 600;">
                    <td colspan="2"><strong>Overall Performance</strong></td>
                    <td><strong>90.8%</strong></td>
                    <td><strong>90.3%</strong></td>
                    <td><strong>96%</strong></td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;"><strong>▲ Excellent</strong></span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Michael's Academic Performance -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Michael Johnson - Grade 7-B (Academic Performance)</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Mid-Term</th>
                    <th>Assignments</th>
                    <th>Attendance</th>
                    <th>Current Grade</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>Mr. Alan Brown</td>
                    <td>85%</td>
                    <td>88%</td>
                    <td>94%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b;">● Good</span></td>
                </tr>
                <tr>
                    <td><strong>Science</strong></td>
                    <td>Ms. Jennifer Lee</td>
                    <td>82%</td>
                    <td>84%</td>
                    <td>94%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b;">● Good</span></td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>Mr. Paolo Rossi</td>
                    <td>92%</td>
                    <td>90%</td>
                    <td>96%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Excellent</span></td>
                </tr>
                <tr>
                    <td><strong>History</strong></td>
                    <td>Mr. Omar Ali</td>
                    <td>80%</td>
                    <td>85%</td>
                    <td>94%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b;">● Satisfactory</span></td>
                </tr>
                <tr>
                    <td><strong>Arts</strong></td>
                    <td>Ms. Nina Patel</td>
                    <td>95%</td>
                    <td>94%</td>
                    <td>96%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Excellent</span></td>
                </tr>
                <tr>
                    <td><strong>P.E.</strong></td>
                    <td>Mr. Robert Jones</td>
                    <td>98%</td>
                    <td>100%</td>
                    <td>96%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981;">▲ Outstanding</span></td>
                </tr>
                <tr style="background: #f8fafc; font-weight: 600;">
                    <td colspan="2"><strong>Overall Performance</strong></td>
                    <td><strong>88.7%</strong></td>
                    <td><strong>90.2%</strong></td>
                    <td><strong>94%</strong></td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #10b981;"><strong>▲ Very Good</strong></span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
