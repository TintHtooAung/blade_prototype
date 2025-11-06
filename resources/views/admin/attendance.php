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
        <h3 id="attendanceDateTitle">Today's Attendance Summary - <?php echo date('F d, Y'); ?></h3>
        <div class="simple-actions">
            <div class="filter-group" style="display: flex; align-items: center; gap: 8px; flex-direction: row;">
                <label for="attendanceDateFilter" style="margin: 0; white-space: nowrap;">Select Date:</label>
                <input type="date" id="attendanceDateFilter" class="filter-select" value="<?php echo date('Y-m-d'); ?>" onchange="filterAttendanceByDate(this.value)" style="height: 36px; padding: 8px 12px; margin: 0;">
            </div>
            <button class="simple-btn secondary" onclick="setTodayDate()" title="Today" style="height: 36px; padding: 8px 16px; margin: 0;">
                <i class="fas fa-calendar-day"></i> Today
            </button>
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

<script>
// Attendance page scripts (leave request functions removed - now in /admin/leave-requests)

// Current selected date
let currentAttendanceDate = new Date();

// Format date for display
function formatAttendanceDate(date) {
    const d = new Date(date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    d.setHours(0, 0, 0, 0);
    
    const options = { 
        weekday: 'long', 
        month: 'long', 
        day: 'numeric', 
        year: 'numeric' 
    };
    
    const dateString = d.toLocaleDateString('en-US', options);
    
    if (d.getTime() === today.getTime()) {
        return `Today's Attendance Summary - ${dateString}`;
    } else if (d < today) {
        return `Attendance Summary - ${dateString}`;
    } else {
        return `Future Attendance - ${dateString}`;
    }
}

// Filter attendance by date
function filterAttendanceByDate(dateString) {
    if (!dateString) return;
    
    currentAttendanceDate = new Date(dateString);
    
    // Update title
    const titleElement = document.getElementById('attendanceDateTitle');
    if (titleElement) {
        titleElement.textContent = formatAttendanceDate(dateString);
    }
    
    // In a real implementation, this would:
    // 1. Fetch attendance data for the selected date
    // 2. Update all statistics cards
    // 3. Update all attendance tables (students, teachers, staff)
    // 4. Update any attendance details
    
    // For now, we'll just show a message that data is being loaded
    console.log('Loading attendance for date:', dateString);
    
    // TODO: Replace with actual API call to fetch attendance data
    // Example:
    // fetch(`/api/attendance?date=${dateString}`)
    //     .then(response => response.json())
    //     .then(data => {
    //         updateAttendanceData(data);
    //     });
    
    // For demonstration, we'll update the date in the UI
    updateAttendanceDisplay();
}

// Set today's date
function setTodayDate() {
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    
    const dateFilter = document.getElementById('attendanceDateFilter');
    if (dateFilter) {
        dateFilter.value = dateString;
        filterAttendanceByDate(dateString);
    }
}

// Update attendance display based on selected date
function updateAttendanceDisplay() {
    // Update the date filter value
    const dateFilter = document.getElementById('attendanceDateFilter');
    if (dateFilter && currentAttendanceDate) {
        const dateString = currentAttendanceDate.toISOString().split('T')[0];
        dateFilter.value = dateString;
    }
    
    // In a real implementation, you would:
    // - Fetch attendance data for the selected date
    // - Update all statistics
    // - Update all tables
    // - Refresh attendance details
    
    // For now, we'll add a visual indicator
    const titleElement = document.getElementById('attendanceDateTitle');
    if (titleElement) {
        titleElement.textContent = formatAttendanceDate(currentAttendanceDate);
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set initial date to today
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    currentAttendanceDate = new Date(dateString);
    updateAttendanceDisplay();
});
</script>


<?php
$content = ob_get_clean();

// Detect portal from URL to use appropriate layout
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';

include __DIR__ . '/../components/' . $layout;
?>