<?php
$pageTitle = 'Smart Campus Nova Hub - Student Profiles';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Profiles';
$activePage = 'student-profiles';

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

<!-- Student Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>My Students</h3>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search student by name, ID, or class..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>

    <div class="simple-filters">
        <div class="filter-group">
            <label>Filter by Class:</label>
            <select class="filter-select">
                <option value="">All Classes</option>
                <option value="Grade 9-A">Grade 9-A</option>
                <option value="Grade 9-B">Grade 9-B</option>
                <option value="Grade 10-A">Grade 10-A</option>
                <option value="Grade 10-B">Grade 10-B</option>
                <option value="Grade 11-A">Grade 11-A</option>
                <option value="Grade 11-B">Grade 11-B</option>
                <option value="Grade 12-A">Grade 12-A</option>
                <option value="Grade 12-B">Grade 12-B</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Filter by Grade:</label>
            <select class="filter-select">
                <option value="">All Grades</option>
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Class</th>
                    <th>Age</th>
                    <th>Parent Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Enrollment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>S001</strong></td>
                    <td>John Smith</td>
                    <td>Grade 9-A</td>
                    <td>15</td>
                    <td>Robert Smith</td>
                    <td>+1-555-1001</td>
                    <td>rsmith@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S002</strong></td>
                    <td>Sarah Johnson</td>
                    <td>Grade 9-A</td>
                    <td>14</td>
                    <td>Mary Johnson</td>
                    <td>+1-555-1002</td>
                    <td>mjohnson@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S003</strong></td>
                    <td>Mike Davis</td>
                    <td>Grade 10-B</td>
                    <td>16</td>
                    <td>James Davis</td>
                    <td>+1-555-1003</td>
                    <td>jdavis@email.com</td>
                    <td>2022-09-05</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S004</strong></td>
                    <td>Emma Wilson</td>
                    <td>Grade 11-A</td>
                    <td>17</td>
                    <td>Lisa Wilson</td>
                    <td>+1-555-1004</td>
                    <td>lwilson@email.com</td>
                    <td>2021-09-10</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S005</strong></td>
                    <td>Alex Brown</td>
                    <td>Grade 12-A</td>
                    <td>18</td>
                    <td>Michael Brown</td>
                    <td>+1-555-1005</td>
                    <td>mbrown@email.com</td>
                    <td>2020-09-15</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S006</strong></td>
                    <td>Jessica Lee</td>
                    <td>Grade 9-B</td>
                    <td>15</td>
                    <td>Susan Lee</td>
                    <td>+1-555-1006</td>
                    <td>slee@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S007</strong></td>
                    <td>David Garcia</td>
                    <td>Grade 10-A</td>
                    <td>16</td>
                    <td>Carlos Garcia</td>
                    <td>+1-555-1007</td>
                    <td>cgarcia@email.com</td>
                    <td>2022-09-08</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S008</strong></td>
                    <td>Anna Taylor</td>
                    <td>Grade 11-B</td>
                    <td>17</td>
                    <td>Jennifer Taylor</td>
                    <td>+1-555-1008</td>
                    <td>jtaylor@email.com</td>
                    <td>2021-09-12</td>
                    <td>Transfer</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S009</strong></td>
                    <td>Chris Martinez</td>
                    <td>Grade 12-B</td>
                    <td>18</td>
                    <td>Rosa Martinez</td>
                    <td>+1-555-1009</td>
                    <td>rmartinez@email.com</td>
                    <td>2020-09-20</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S010</strong></td>
                    <td>Mia Anderson</td>
                    <td>Grade 9-A</td>
                    <td>14</td>
                    <td>Patricia Anderson</td>
                    <td>+1-555-1010</td>
                    <td>panderson@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/teacher/student-profile">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
