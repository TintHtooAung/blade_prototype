<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Results';
$pageIcon = 'fas fa-file-alt';
$pageHeading = 'Exam Results';
$activePage = 'exam-results';

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

<!-- Sarah's Exam Results -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Sarah Johnson - Grade 9-A (Mid-Term Exam 2025)</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Full Marks</th>
                    <th>Obtained Marks</th>
                    <th>Percentage</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>100</td>
                    <td>95</td>
                    <td>95%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td><strong>Physics</strong></td>
                    <td>100</td>
                    <td>92</td>
                    <td>92%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Very Good</td>
                </tr>
                <tr>
                    <td><strong>Chemistry</strong></td>
                    <td>100</td>
                    <td>88</td>
                    <td>88%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td><strong>Biology</strong></td>
                    <td>100</td>
                    <td>94</td>
                    <td>94%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>100</td>
                    <td>86</td>
                    <td>86%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td><strong>Myanmar</strong></td>
                    <td>100</td>
                    <td>90</td>
                    <td>90%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Very Good</td>
                </tr>
                <tr style="background: #f8fafc; font-weight: 600;">
                    <td colspan="2"><strong>Overall</strong></td>
                    <td><strong>545/600</strong></td>
                    <td><strong>90.8%</strong></td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Michael's Exam Results -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Michael Johnson - Grade 7-B (Mid-Term Exam 2025)</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Full Marks</th>
                    <th>Obtained Marks</th>
                    <th>Percentage</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>100</td>
                    <td>85</td>
                    <td>85%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td><strong>Science</strong></td>
                    <td>100</td>
                    <td>82</td>
                    <td>82%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>100</td>
                    <td>92</td>
                    <td>92%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td><strong>History</strong></td>
                    <td>100</td>
                    <td>80</td>
                    <td>80%</td>
                    <td><span class="status-badge active">A</span></td>
                    <td>Satisfactory</td>
                </tr>
                <tr>
                    <td><strong>Arts</strong></td>
                    <td>100</td>
                    <td>95</td>
                    <td>95%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td><strong>P.E.</strong></td>
                    <td>100</td>
                    <td>98</td>
                    <td>98%</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td>Outstanding</td>
                </tr>
                <tr style="background: #f8fafc; font-weight: 600;">
                    <td colspan="2"><strong>Overall</strong></td>
                    <td><strong>532/600</strong></td>
                    <td><strong>88.7%</strong></td>
                    <td><span class="status-badge active">A</span></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
