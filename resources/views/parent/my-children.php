<?php
$pageTitle = 'Smart Campus Nova Hub - My Children';
$pageIcon = 'fas fa-child';
$pageHeading = 'My Children';
$activePage = 'my-children';

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

<!-- My Children List -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Student Profiles</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Class</th>
                    <th>Stream</th>
                    <th>Attendance</th>
                    <th>Avg Grade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>001</strong></td>
                    <td><strong>Sarah Johnson</strong></td>
                    <td>Grade 9</td>
                    <td>A</td>
                    <td>Science</td>
                    <td><span style="color: #10b981; font-weight: 600;">96%</span></td>
                    <td><span style="color: #4f46e5; font-weight: 600;">A+</span></td>
                    <td><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                    <td><strong>015</strong></td>
                    <td><strong>Michael Johnson</strong></td>
                    <td>Grade 7</td>
                    <td>B</td>
                    <td>Arts</td>
                    <td><span style="color: #10b981; font-weight: 600;">94%</span></td>
                    <td><span style="color: #4f46e5; font-weight: 600;">A</span></td>
                    <td><span class="status-badge active">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Sarah's Details -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Sarah Johnson - Grade 9-A</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Current Grade</th>
                    <th>Homework Completion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>Ms. Sarah Johnson</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">95%</span></td>
                </tr>
                <tr>
                    <td><strong>Physics</strong></td>
                    <td>Dr. Emily Chen</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">92%</span></td>
                </tr>
                <tr>
                    <td><strong>Chemistry</strong></td>
                    <td>Mr. David Kumar</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b; font-weight: 600;">88%</span></td>
                </tr>
                <tr>
                    <td><strong>Biology</strong></td>
                    <td>Ms. Lisa Park</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">94%</span></td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>Mr. Paolo Rossi</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b; font-weight: 600;">90%</span></td>
                </tr>
                <tr>
                    <td><strong>Myanmar</strong></td>
                    <td>Ms. Ayesha Khan</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">96%</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Michael's Details -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3>Michael Johnson - Grade 7-B</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Current Grade</th>
                    <th>Homework Completion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Mathematics</strong></td>
                    <td>Mr. Alan Brown</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b; font-weight: 600;">90%</span></td>
                </tr>
                <tr>
                    <td><strong>Science</strong></td>
                    <td>Ms. Jennifer Lee</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b; font-weight: 600;">86%</span></td>
                </tr>
                <tr>
                    <td><strong>English</strong></td>
                    <td>Mr. Paolo Rossi</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">92%</span></td>
                </tr>
                <tr>
                    <td><strong>History</strong></td>
                    <td>Mr. Omar Ali</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #f59e0b; font-weight: 600;">88%</span></td>
                </tr>
                <tr>
                    <td><strong>Arts</strong></td>
                    <td>Ms. Nina Patel</td>
                    <td><span class="status-badge active">A+</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">95%</span></td>
                </tr>
                <tr>
                    <td><strong>P.E.</strong></td>
                    <td>Mr. Robert Jones</td>
                    <td><span class="status-badge active">A</span></td>
                    <td><span style="color: #10b981; font-weight: 600;">100%</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
