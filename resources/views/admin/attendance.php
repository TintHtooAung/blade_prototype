<?php
$pageTitle = 'Smart Campus Nova Hub - Attendance Management';
$pageIcon = 'fas fa-user-check';
$pageHeading = 'Attendance Management';
$activePage = 'attendance';

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

<!-- Today's Summary -->
<div class="simple-summary">
    <div class="summary-header">
        <h3>Today's Attendance Summary - <?php echo date('F d, Y'); ?></h3>
    </div>
    <div class="summary-table">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Total</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Late</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Students</strong></td>
                    <td>1,847</td>
                    <td>1,723</td>
                    <td>124</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><strong>Teachers</strong></td>
                    <td>89</td>
                    <td>84</td>
                    <td>3</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td><strong>Staff</strong></td>
                    <td>45</td>
                    <td>42</td>
                    <td>2</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Main Attendance Sections -->
<div class="attendance-main-grid">
    <!-- Student Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Student Attendance by Class</h3>
            <button class="simple-btn">Mark Attendance</button>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Total Students</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Late</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grade 9-A</strong></td>
                        <td>30</td>
                        <td>29</td>
                        <td>1</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 9-B</strong></td>
                        <td>28</td>
                        <td>26</td>
                        <td>2</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-A</strong></td>
                        <td>32</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-B</strong></td>
                        <td>29</td>
                        <td>25</td>
                        <td>3</td>
                        <td>1</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-A</strong></td>
                        <td>32</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-B</strong></td>
                        <td>31</td>
                        <td>30</td>
                        <td>1</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 12-A</strong></td>
                        <td>27</td>
                        <td>27</td>
                        <td>0</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 12-B</strong></td>
                        <td>25</td>
                        <td>24</td>
                        <td>1</td>
                        <td>0</td>
                        <td><button class="view-btn">View Details</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Teacher Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Teacher Attendance</h3>
            <button class="simple-btn">Mark Attendance</button>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Dr. Emily Parker</strong></td>
                        <td>Mathematics</td>
                        <td>Present</td>
                        <td>08:15 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Prof. James Wilson</strong></td>
                        <td>Science</td>
                        <td>Absent</td>
                        <td>-</td>
                        <td>Sick Leave</td>
                    </tr>
                    <tr>
                        <td><strong>Ms. Sarah Chen</strong></td>
                        <td>English</td>
                        <td>Late</td>
                        <td>08:45 AM</td>
                        <td>Traffic</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. David Lee</strong></td>
                        <td>History</td>
                        <td>Present</td>
                        <td>08:10 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Ms. Lisa Wong</strong></td>
                        <td>Art</td>
                        <td>Present</td>
                        <td>08:20 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. Michael Brown</strong></td>
                        <td>PE</td>
                        <td>Present</td>
                        <td>08:05 AM</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Dr. Helen Thompson</strong></td>
                        <td>Chemistry</td>
                        <td>Absent</td>
                        <td>-</td>
                        <td>Family Emergency</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. Robert Kim</strong></td>
                        <td>Music</td>
                        <td>Present</td>
                        <td>08:25 AM</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Staff Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Staff Attendance</h3>
            <button class="simple-btn">Mark Attendance</button>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>John Miller</strong></td>
                        <td>Administration</td>
                        <td>Secretary</td>
                        <td>Present</td>
                        <td>08:00 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Maria Santos</strong></td>
                        <td>Administration</td>
                        <td>Accountant</td>
                        <td>Present</td>
                        <td>08:10 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Peter Johnson</strong></td>
                        <td>Maintenance</td>
                        <td>Technician</td>
                        <td>Present</td>
                        <td>07:45 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Anna Williams</strong></td>
                        <td>Food Service</td>
                        <td>Cook</td>
                        <td>Absent</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><strong>Carlos Rodriguez</strong></td>
                        <td>Security</td>
                        <td>Guard</td>
                        <td>Present</td>
                        <td>06:00 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Susan Davis</strong></td>
                        <td>Library</td>
                        <td>Librarian</td>
                        <td>Present</td>
                        <td>08:15 AM</td>
                    </tr>
                    <tr>
                        <td><strong>Ahmed Hassan</strong></td>
                        <td>IT Support</td>
                        <td>Technician</td>
                        <td>Late</td>
                        <td>08:30 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Search Individual Student -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Search Individual Student</h3>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Enter student name or ID..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Class</th>
                    <th>Today's Status</th>
                    <th>This Week</th>
                    <th>This Month</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6" style="text-align: center; color: #86868b; padding: 2rem;">
                        Enter student name or ID above to search attendance records
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