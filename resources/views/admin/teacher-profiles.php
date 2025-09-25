<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profiles';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Profiles';
$activePage = 'teachers';

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

<!-- Teacher Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Teachers</h3>
        <button class="simple-btn">Add New Teacher</button>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search teacher by name, ID, or department..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>
    
    <div class="simple-filters">
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
        <div class="filter-group">
            <label>Filter by Subject:</label>
            <select class="filter-select">
                <option value="">All Subjects</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Art">Art</option>
                <option value="Physical Education">Physical Education</option>
                <option value="Music">Music</option>
                <option value="Spanish">Spanish</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Chemistry">Chemistry</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>T001</strong></td>
                    <td>Dr. Emily Parker</td>
                    <td>Mathematics</td>
                    <td>Algebra, Calculus</td>
                    <td>+1-555-0101</td>
                    <td>emily.parker@school.edu</td>
                    <td>2020-08-15</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T002</strong></td>
                    <td>Prof. James Wilson</td>
                    <td>Science</td>
                    <td>Physics, Chemistry</td>
                    <td>+1-555-0102</td>
                    <td>james.wilson@school.edu</td>
                    <td>2019-09-01</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T003</strong></td>
                    <td>Ms. Sarah Chen</td>
                    <td>English</td>
                    <td>Literature, Grammar</td>
                    <td>+1-555-0103</td>
                    <td>sarah.chen@school.edu</td>
                    <td>2021-01-10</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T004</strong></td>
                    <td>Mr. David Lee</td>
                    <td>History</td>
                    <td>World History, Geography</td>
                    <td>+1-555-0104</td>
                    <td>david.lee@school.edu</td>
                    <td>2018-03-20</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T005</strong></td>
                    <td>Ms. Lisa Wong</td>
                    <td>Art</td>
                    <td>Drawing, Painting</td>
                    <td>+1-555-0105</td>
                    <td>lisa.wong@school.edu</td>
                    <td>2020-11-05</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T006</strong></td>
                    <td>Mr. Michael Brown</td>
                    <td>Physical Education</td>
                    <td>Sports, Health</td>
                    <td>+1-555-0106</td>
                    <td>michael.brown@school.edu</td>
                    <td>2019-06-12</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T007</strong></td>
                    <td>Dr. Helen Thompson</td>
                    <td>Chemistry</td>
                    <td>Organic Chemistry</td>
                    <td>+1-555-0107</td>
                    <td>helen.thompson@school.edu</td>
                    <td>2017-02-28</td>
                    <td>On Leave</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T008</strong></td>
                    <td>Mr. Robert Kim</td>
                    <td>Music</td>
                    <td>Piano, Theory</td>
                    <td>+1-555-0108</td>
                    <td>robert.kim@school.edu</td>
                    <td>2020-09-14</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T009</strong></td>
                    <td>Ms. Amanda Garcia</td>
                    <td>Spanish</td>
                    <td>Spanish Language</td>
                    <td>+1-555-0109</td>
                    <td>amanda.garcia@school.edu</td>
                    <td>2021-08-30</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>T010</strong></td>
                    <td>Dr. Thomas Anderson</td>
                    <td>Computer Science</td>
                    <td>Programming, Database</td>
                    <td>+1-555-0110</td>
                    <td>thomas.anderson@school.edu</td>
                    <td>2019-01-15</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>