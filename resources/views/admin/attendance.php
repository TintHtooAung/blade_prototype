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
<div class="simple-section">
    <div class="simple-header">
        <h3>Today's Attendance Summary - <?php echo date('F d, Y'); ?></h3>
    </div>
    
    <div class="stats-grid">
        <!-- Students -->
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-content">
                <h3>1,723</h3>
                <p>Students Present</p>
                <div class="stat-badge">
                    <i class="fas fa-users"></i> Total: 1,847 (93.3%)
                </div>
            </div>
        </div>

        <!-- Teachers -->
        <div class="stat-card">
            <div class="stat-icon yellow">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-content">
                <h3>84</h3>
                <p>Teachers Present</p>
                <div class="stat-badge">
                    <i class="fas fa-users"></i> Total: 89 (94.4%)
                </div>
            </div>
        </div>

        <!-- Staff -->
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="stat-content">
                <h3>42</h3>
                <p>Staff Present</p>
                <div class="stat-badge">
                    <i class="fas fa-users"></i> Total: 45 (93.3%)
                </div>
            </div>
        </div>

        <!-- Absent -->
        <div class="stat-card">
            <div class="stat-icon red">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="stat-content">
                <h3>129</h3>
                <p>Total Absent</p>
                <div class="stat-badge">
                    <i class="fas fa-exclamation-triangle"></i> Students: 124, Teachers: 3, Staff: 2
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Attendance Sections -->
<div class="attendance-main-grid">
    <!-- Student Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Student Attendance by Class</h3>
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
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%209-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 9-B</strong></td>
                        <td>28</td>
                        <td>26</td>
                        <td>2</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%209-B">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-A</strong></td>
                        <td>32</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%2010-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-B</strong></td>
                        <td>29</td>
                        <td>25</td>
                        <td>3</td>
                        <td>1</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%2010-B">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-A</strong></td>
                        <td>32</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%2011-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-B</strong></td>
                        <td>31</td>
                        <td>30</td>
                        <td>1</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%2011-B">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 12-A</strong></td>
                        <td>27</td>
                        <td>27</td>
                        <td>0</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%2012-A">View Details</a></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 12-B</strong></td>
                        <td>25</td>
                        <td>24</td>
                        <td>1</td>
                        <td>0</td>
                        <td><a class="view-btn" href="/admin/attendance/class/Grade%2012-B">View Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Teacher Attendance Section -->
    <div class="simple-section">
        <div class="simple-header">
            <h3>Teacher Attendance</h3>
            <
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
            <a class="simple-btn" href="/admin/attendance/staff/mark"><i class="fas fa-clipboard-check"></i> Mark Attendance</a>
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


<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>