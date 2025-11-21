<?php
$pageTitle = 'Smart Campus Nova Hub - Student Attendance';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Attendance';
$activePage = 'attendance-student';

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

<!-- Main Content -->
<div style="margin-top: 16px;">
    <!-- View Toggle Tabs -->
    <div class="attendance-view-tabs">
        <button type="button" class="view-tab active" data-view="class">
            <i class="fas fa-users"></i> Class Attendance
        </button>
        <button type="button" class="view-tab" data-view="individual">
            <i class="fas fa-user"></i> Individual Student Attendance
        </button>
        <button type="button" class="view-tab" data-view="collect">
            <i class="fas fa-clipboard-check"></i> Attendance Register
        </button>
    </div>

    <!-- Class Attendance View -->
    <div id="class-attendance-view" class="attendance-view-content">
        <!-- Summary Cards -->
        <div class="stats-grid-secondary vertical-stats" style="margin-bottom: 24px;">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Attendance %</h3>
                    <div class="stat-number" id="totalAttendancePercentage">0%</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Absent</h3>
                    <div class="stat-number" id="totalAbsentCount">0</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon yellow">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Leave</h3>
                    <div class="stat-number" id="totalLeaveCount">0</div>
                </div>
            </div>
        </div>
        
        <!-- Date Filter and Table -->
        <div class="simple-section">
            <div class="simple-header">
                <h3 id="attendanceDateTitle">Today's Student Attendance - <?php echo date('F d, Y'); ?></h3>
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
            <div class="simple-table-container" style="overflow-x: auto;">
                <table class="basic-table" id="attendanceTable">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Total Students</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>Today %</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="attendanceTableBody">
                        <!-- Attendance data will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Individual Student Attendance View -->
    <div id="individual-attendance-view" class="attendance-view-content" style="display: none;">
        <!-- Students List with Filters -->
        <div class="simple-section">
            <div class="simple-header">
                <h3>Individual Student Attendance</h3>
                <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <div style="position: relative;">
                        <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6b7280; pointer-events: none; z-index: 1;"></i>
                        <input type="text" id="studentSearchInput" class="form-input" placeholder="Search by name, ID..." oninput="filterStudents()" style="padding-left: 36px;">
                    </div>
                    <select id="gradeFilter" class="filter-select" onchange="filterStudents()">
                        <option value="">All Grades</option>
                        <option value="9">Grade 9</option>
                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                    </select>
                    <select id="classFilter" class="filter-select" onchange="filterStudents()">
                        <option value="">All Classes</option>
                        <option value="A">Class A</option>
                        <option value="B">Class B</option>
                        <option value="C">Class C</option>
                    </select>
                </div>
            </div>
            <div class="simple-table-container">
                <table class="basic-table" id="individualStudentTable">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Class</th>
                            <th>This Month Attendance %</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="individualStudentBody">
                        <!-- Students will be dynamically loaded -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Collect Attendance View -->
    <div id="collect-attendance-view" class="attendance-view-content" style="display: none;">
        <!-- Class Selection Section -->
        <div class="simple-section">
            <div class="simple-header">
                <h3><i class="fas fa-search"></i> Select Class</h3>
            </div>
            
            <div class="form-section">
                <div class="form-row">
                    <div class="form-group">
                        <label for="classSelect">Select Class:</label>
                        <select id="classSelect" class="form-select" onchange="loadClassSchedule()">
                            <option value="">Select a class...</option>
                            <option value="Grade-9-A">Grade 9-A</option>
                            <option value="Grade-9-B">Grade 9-B</option>
                            <option value="Grade-10-A">Grade 10-A</option>
                            <option value="Grade-10-B">Grade 10-B</option>
                            <option value="Grade-11-A">Grade 11-A</option>
                            <option value="Grade-11-B">Grade 11-B</option>
                            <option value="Grade-12-A">Grade 12-A</option>
                            <option value="Grade-12-B">Grade 12-B</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Time-table Section -->
        <div class="simple-section" id="scheduleSection" style="display: none;">
            <div class="simple-header">
                <h3><i class="fas fa-calendar-week"></i> Class Time-table - <span id="selectedClassName"></span></h3>
            </div>
            
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Room</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTableBody">
                        <!-- Schedule rows will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Attendance Collector Details Page -->
    <div id="attendanceCollectorDetails" class="attendance-collector-details" style="display: none;">
        <div class="attendance-collector-container">
            <!-- Header Section -->
            <div class="collector-header">
                <div class="collector-header-content">
                    <div class="collector-back-btn" onclick="closeAttendanceCollector()" title="Close">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="collector-title-section">
                        <h1 id="collectorTitle">Take Attendance</h1>
                        <div class="collector-class-info">
                            <span id="collectorClassName"></span> • <span id="collectorSubject"></span>
                        </div>
                    </div>
                    <div class="collector-actions-header">
                        <button class="collector-action-btn secondary" onclick="markAllPresent()">
                            <i class="fas fa-check-double"></i> Mark All Present
                        </button>
                        <button class="collector-action-btn secondary" onclick="markAllAbsent()">
                            <i class="fas fa-times"></i> Mark All Absent
                        </button>
                        <button class="collector-action-btn secondary" onclick="markAllLeave()">
                            <i class="fas fa-calendar-times"></i> Mark All Leave
                        </button>
                        <button class="collector-action-btn primary" onclick="saveAttendance()">
                            <i class="fas fa-save"></i> Save Attendance
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Content Section -->
            <div class="collector-content">
                <!-- Info Cards -->
                <div class="collector-info-cards">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="info-card-content">
                            <div class="info-card-label">Date</div>
                            <div class="info-card-value" id="collectorDate"></div>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-card-content">
                            <div class="info-card-label">Time</div>
                            <div class="info-card-value" id="collectorTime"></div>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="info-card-content">
                            <div class="info-card-label">Room</div>
                            <div class="info-card-value" id="collectorRoom"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Attendance Summary -->
                <div class="attendance-summary-cards">
                    <div class="summary-card present">
                        <div class="summary-card-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="summary-card-content">
                            <div class="summary-card-number" id="presentCount">0</div>
                            <div class="summary-card-label">Present</div>
                        </div>
                    </div>
                    <div class="summary-card absent">
                        <div class="summary-card-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="summary-card-content">
                            <div class="summary-card-number" id="absentCount">0</div>
                            <div class="summary-card-label">Absent</div>
                        </div>
                    </div>
                    <div class="summary-card leave">
                        <div class="summary-card-icon">
                            <i class="fas fa-calendar-times"></i>
                        </div>
                        <div class="summary-card-content">
                            <div class="summary-card-number" id="leaveCount">0</div>
                            <div class="summary-card-label">Leave</div>
                        </div>
                    </div>
                    <div class="summary-card total">
                        <div class="summary-card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="summary-card-content">
                            <div class="summary-card-number" id="totalCount">0</div>
                            <div class="summary-card-label">Total Students</div>
                        </div>
                    </div>
                </div>
                
                <!-- Student Grid -->
                <div class="student-grid-container">
                    <div class="student-grid-header">
                        <h3>Student Attendance</h3>
                    </div>
                    <div class="student-grid" id="studentList">
                        <!-- Student list will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Student data
const students = [
    { id: 'S001', name: 'John Doe', grade: '9', class: 'A', attendance: 96.7 },
    { id: 'S002', name: 'Jane Smith', grade: '9', class: 'A', attendance: 98.5 },
    { id: 'S003', name: 'Mike Johnson', grade: '9', class: 'A', attendance: 95.2 },
    { id: 'S004', name: 'Sarah Williams', grade: '9', class: 'B', attendance: 92.9 },
    { id: 'S005', name: 'Alex Brown', grade: '9', class: 'B', attendance: 94.3 },
    { id: 'S006', name: 'Emily Davis', grade: '10', class: 'A', attendance: 100 },
    { id: 'S007', name: 'David Wilson', grade: '10', class: 'A', attendance: 99.1 },
    { id: 'S008', name: 'Lisa Anderson', grade: '10', class: 'B', attendance: 86.2 },
    { id: 'S009', name: 'Tom Martinez', grade: '10', class: 'B', attendance: 88.5 },
    { id: 'S010', name: 'Amy Taylor', grade: '11', class: 'A', attendance: 100 },
    { id: 'S011', name: 'Chris Lee', grade: '11', class: 'A', attendance: 97.8 },
    { id: 'S012', name: 'Jessica White', grade: '11', class: 'B', attendance: 96.8 },
    { id: 'S013', name: 'Ryan Harris', grade: '12', class: 'A', attendance: 100 },
    { id: 'S014', name: 'Olivia Clark', grade: '12', class: 'A', attendance: 98.2 },
    { id: 'S015', name: 'Daniel Lewis', grade: '12', class: 'B', attendance: 96 },
    { id: 'S016', name: 'Sophia Walker', grade: '12', class: 'B', attendance: 94.5 }
];

// Load class attendance table
function loadClassAttendanceTable() {
    const periodHeaderRow = document.getElementById('periodHeaderRow');
    const tbody = document.getElementById('attendanceTableBody');
    
    if (!periodHeaderRow || !tbody) return;
    
    // Define periods
    const periods = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7'];
    
    // Populate period headers
    periodHeaderRow.innerHTML = periods.map(period => `<th>${period}</th>`).join('');
    
    // Sample class attendance data
    const classAttendanceData = [
        { class: 'Grade 9-A', total: 25, periods: [23, 24, 25, 24, 23, 25, 24] },
        { class: 'Grade 9-B', total: 28, periods: [26, 27, 28, 27, 26, 28, 27] },
        { class: 'Grade 10-A', total: 30, periods: [29, 30, 29, 30, 29, 30, 29] },
        { class: 'Grade 10-B', total: 27, periods: [26, 27, 26, 27, 26, 27, 26] },
        { class: 'Grade 11-A', total: 32, periods: [31, 32, 31, 32, 31, 32, 31] },
        { class: 'Grade 11-B', total: 29, periods: [28, 29, 28, 29, 28, 29, 28] },
        { class: 'Grade 12-A', total: 35, periods: [34, 35, 34, 35, 34, 35, 34] },
        { class: 'Grade 12-B', total: 33, periods: [32, 33, 32, 33, 32, 33, 32] }
    ];
    
    tbody.innerHTML = '';
    
    classAttendanceData.forEach(classData => {
        const row = document.createElement('tr');
        const periodCells = classData.periods.map(count => {
            const percentage = ((count / classData.total) * 100).toFixed(0);
            const badgeClass = percentage >= 95 ? 'high' : percentage >= 90 ? 'medium' : 'low';
            return `<td><span class="percentage-badge ${badgeClass}">${percentage}%</span></td>`;
        }).join('');
        
        row.innerHTML = `
            <td><strong>${classData.class}</strong></td>
            <td>${classData.total}</td>
            ${periodCells}
            <td>
                <a href="/admin/attendance/class?class=${encodeURIComponent(classData.class)}&date=${currentAttendanceDate.toISOString().split('T')[0]}" class="action-btn view-btn" title="View Details">
                    <i class="fas fa-eye"></i> <span>View</span>
                </a>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// View Switching - Make it globally accessible
window.switchAttendanceView = function(view) {
    if (!view) {
        console.error('switchAttendanceView called without view parameter');
        return;
    }
    
    console.log('Switching to view:', view);
    
    // Hide all views
    const allViews = document.querySelectorAll('.attendance-view-content');
    allViews.forEach(content => {
        content.style.display = 'none';
    });
    
    // Remove active class from all tabs
    document.querySelectorAll('.view-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected view
    const viewId = view + '-attendance-view';
    const selectedView = document.getElementById(viewId);
    if (selectedView) {
        selectedView.style.display = 'block';
        console.log('View shown:', viewId);
    } else {
        console.error('View not found:', viewId);
        return;
    }
    
    // Add active class to selected tab
    const selectedTab = document.querySelector(`.view-tab[data-view="${view}"]`);
    if (selectedTab) {
        selectedTab.classList.add('active');
        console.log('Tab activated:', view);
    } else {
        console.error('Tab not found for view:', view);
    }
    
    // Load individual students if switching to individual view
    if (view === 'individual') {
        renderIndividualStudents();
    }
    
    // Load class attendance if switching to class view
    if (view === 'class') {
        loadClassAttendanceTable();
    }
    
    // Hide attendance collector when switching views
    if (view !== 'collect') {
        const collectorDetails = document.getElementById('attendanceCollectorDetails');
        if (collectorDetails) {
            collectorDetails.style.display = 'none';
        }
    }
    
    // Store selected view
    localStorage.setItem('selectedStudentAttendanceView', view);
};

// Current selected date
let currentAttendanceDate = new Date();

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
        return `Today's Student Attendance - ${dateString}`;
    } else if (d < today) {
        return `Student Attendance - ${dateString}`;
    } else {
        return `Future Student Attendance - ${dateString}`;
    }
}

function filterAttendanceByDate(dateString) {
    if (!dateString) return;
    currentAttendanceDate = new Date(dateString);
    const titleElement = document.getElementById('attendanceDateTitle');
    if (titleElement) {
        titleElement.textContent = formatAttendanceDate(dateString);
    }
    loadClassAttendanceTable();
}

function setTodayDate() {
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    const dateFilter = document.getElementById('attendanceDateFilter');
    if (dateFilter) {
        dateFilter.value = dateString;
        filterAttendanceByDate(dateString);
    }
}

// Calculate and update summary statistics
function updateAttendanceSummary() {
    // Mock data for all students attendance
    const allStudentsData = [
        { total: 30, present: 29, absent: 1, leave: 0 }, // Grade 9-A
        { total: 28, present: 26, absent: 1, leave: 1 }, // Grade 9-B
        { total: 32, present: 32, absent: 0, leave: 0 }, // Grade 10-A
        { total: 29, present: 25, absent: 3, leave: 1 }, // Grade 10-B
        { total: 32, present: 32, absent: 0, leave: 0 }, // Grade 11-A
        { total: 31, present: 30, absent: 0, leave: 1 }, // Grade 11-B
        { total: 27, present: 27, absent: 0, leave: 0 }, // Grade 12-A
        { total: 25, present: 24, absent: 0, leave: 1 }  // Grade 12-B
    ];
    
    // Calculate totals
    let totalStudents = 0;
    let totalPresent = 0;
    let totalAbsent = 0;
    let totalLeave = 0;
    
    allStudentsData.forEach(classData => {
        totalStudents += classData.total;
        totalPresent += classData.present;
        totalAbsent += classData.absent;
        totalLeave += classData.leave;
    });
    
    // Calculate average attendance percentage
    const avgAttendancePercentage = totalStudents > 0 
        ? ((totalPresent / totalStudents) * 100).toFixed(1) 
        : 0;
    
    // Update summary cards
    const percentageEl = document.getElementById('totalAttendancePercentage');
    const absentEl = document.getElementById('totalAbsentCount');
    const leaveEl = document.getElementById('totalLeaveCount');
    
    if (percentageEl) percentageEl.textContent = avgAttendancePercentage + '%';
    if (absentEl) absentEl.textContent = totalAbsent;
    if (leaveEl) leaveEl.textContent = totalLeave;
}

// Load Class Attendance Table with Periods
function loadClassAttendanceTable() {
    const tbody = document.getElementById('attendanceTableBody');
    if (!tbody) return;
    
    // Get selected date
    const dateFilter = document.getElementById('attendanceDateFilter');
    const selectedDate = dateFilter ? dateFilter.value : new Date().toISOString().split('T')[0];
    
    // Maximum periods per day (typically 7)
    const maxPeriods = 7;
    
    // Class data with period attendance percentages
    // null/undefined means attendance not collected for that period
    const classData = [
        { class: 'Grade 9-A', total: 30, periods: [96.7, 95.0, 98.0, 97.5, 96.0, 95.5, null] },
        { class: 'Grade 9-B', total: 28, periods: [92.9, 94.0, 91.5, 93.0, 92.0, null, null] },
        { class: 'Grade 10-A', total: 32, periods: [100, 100, 100, 100, 100, 100, 100] },
        { class: 'Grade 10-B', total: 29, periods: [86.2, 88.0, 85.0, 87.5, 86.0, null, null] },
        { class: 'Grade 11-A', total: 32, periods: [100, 100, 100, 100, 100, 100, 100] },
        { class: 'Grade 11-B', total: 31, periods: [96.8, 97.0, 96.5, 97.5, 96.0, null, null] },
        { class: 'Grade 12-A', total: 27, periods: [100, 100, 100, 100, 100, 100, 100] },
        { class: 'Grade 12-B', total: 25, periods: [96.0, 97.0, 95.5, 96.5, 95.0, null, null] }
    ];
    
    tbody.innerHTML = '';
    
    classData.forEach(item => {
        const row = document.createElement('tr');
        let periodCells = '';
        
        // Calculate total attendance percentage for today
        // Filter out null/undefined periods and calculate average
        const validPeriods = item.periods.filter(p => p !== null && p !== undefined);
        const totalAttendancePercent = validPeriods.length > 0 
            ? (validPeriods.reduce((sum, p) => sum + p, 0) / validPeriods.length).toFixed(1)
            : null;
        
        // Generate period cells (P1 to P7) - simple horizontal columns
        for (let i = 0; i < maxPeriods; i++) {
            const attendance = item.periods[i];
            
            if (attendance === null || attendance === undefined) {
                periodCells += '<td>-</td>';
            } else {
                const attendanceClass = attendance >= 95 ? 'high' : attendance >= 90 ? 'medium' : 'low';
                periodCells += `<td><span class="percentage-badge ${attendanceClass}">${attendance.toFixed(1)}%</span></td>`;
            }
        }
        
        // Generate total attendance cell
        let totalAttendanceCell = '<td>-</td>';
        if (totalAttendancePercent !== null) {
            const totalAttendanceClass = totalAttendancePercent >= 95 ? 'high' : totalAttendancePercent >= 90 ? 'medium' : 'low';
            totalAttendanceCell = `<td><span class="percentage-badge ${totalAttendanceClass}" style="font-size: 14px; padding: 6px 14px;">${totalAttendancePercent}%</span></td>`;
        }
        
        row.innerHTML = `
            <td><strong>${item.class}</strong></td>
            <td>${item.total}</td>
            ${periodCells}
            ${totalAttendanceCell}
            <td>
                <a href="/admin/attendance/class?class=${encodeURIComponent(item.class)}" class="action-btn view-btn" title="View Details">
                    <i class="fas fa-eye"></i> <span>View Details</span>
                </a>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Render individual students table
function renderIndividualStudents() {
    const tbody = document.getElementById('individualStudentBody');
    if (!tbody) return;
    
    const searchQuery = document.getElementById('studentSearchInput')?.value.toLowerCase() || '';
    const gradeFilter = document.getElementById('gradeFilter')?.value || '';
    const classFilter = document.getElementById('classFilter')?.value || '';
    
    tbody.innerHTML = '';
    
    const filteredStudents = students.filter(student => {
        const matchesSearch = !searchQuery || 
            student.id.toLowerCase().includes(searchQuery) ||
            student.name.toLowerCase().includes(searchQuery);
        const matchesGrade = !gradeFilter || student.grade === gradeFilter;
        const matchesClass = !classFilter || student.class === classFilter;
        
        return matchesSearch && matchesGrade && matchesClass;
    });
    
    if (filteredStudents.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; padding: 40px; color: #6b7280;">No students found matching your criteria.</td></tr>';
        return;
    }
    
    filteredStudents.forEach(student => {
        const attendanceClass = student.attendance >= 95 ? 'high' : student.attendance >= 90 ? 'medium' : 'low';
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><strong>${student.id}</strong></td>
            <td>${student.name}</td>
            <td>Grade ${student.grade}</td>
            <td>${student.class}</td>
            <td><span class="percentage-badge ${attendanceClass}">${student.attendance}%</span></td>
            <td>
                <a href="/admin/attendance/student-detail?student=${student.id}" class="action-btn view-btn" title="View Details">
                    <i class="fas fa-eye"></i> <span>View Details</span>
                </a>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Filter students based on search and filters
function filterStudents() {
    renderIndividualStudents();
}

// Update class filter options based on selected grade
function updateClassFilter() {
    const gradeFilter = document.getElementById('gradeFilter')?.value || '';
    const classFilter = document.getElementById('classFilter');
    
    if (!classFilter) return;
    
    // Get unique classes for the selected grade
    const classesForGrade = [...new Set(students
        .filter(s => !gradeFilter || s.grade === gradeFilter)
        .map(s => s.class)
    )].sort();
    
    classFilter.innerHTML = '<option value="">All Classes</option>';
    classesForGrade.forEach(cls => {
        const option = document.createElement('option');
        option.value = cls;
        option.textContent = `Class ${cls}`;
        classFilter.appendChild(option);
    });
    
    // Re-filter students
    filterStudents();
}

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
        return `Today's Student Attendance - ${dateString}`;
    } else if (d < today) {
        return `Student Attendance - ${dateString}`;
    } else {
        return `Future Student Attendance - ${dateString}`;
    }
}

// Global attendance object storage for collect attendance
let currentAttendanceObj = null;

// Load class schedule for collect attendance
function loadClassSchedule() {
    const classSelect = document.getElementById('classSelect');
    const selectedClass = classSelect.value;
    
    if (!selectedClass) {
        document.getElementById('scheduleSection').style.display = 'none';
        return;
    }
    
    // Display selected class name
    const className = classSelect.options[classSelect.selectedIndex].text;
    document.getElementById('selectedClassName').textContent = className;
    
    // Show schedule section
    document.getElementById('scheduleSection').style.display = 'block';
    
    // Generate and display schedule
    generateSchedule(selectedClass);
}

// Generate schedule for selected class
function generateSchedule(classValue) {
    const scheduleData = {
        'Grade-9-A': [
            { day: 'Monday', time: '08:00 - 08:40', subject: 'Mathematics', teacher: 'Mr. Smith', room: 'Room 101' },
            { day: 'Monday', time: '09:00 - 09:40', subject: 'Science', teacher: 'Ms. Johnson', room: 'Room 102' },
            { day: 'Tuesday', time: '08:00 - 08:40', subject: 'English', teacher: 'Mrs. Williams', room: 'Room 103' },
            { day: 'Wednesday', time: '09:00 - 09:40', subject: 'Mathematics', teacher: 'Mr. Smith', room: 'Room 101' },
            { day: 'Thursday', time: '08:00 - 08:40', subject: 'Science', teacher: 'Ms. Johnson', room: 'Room 102' },
            { day: 'Friday', time: '10:00 - 10:40', subject: 'English', teacher: 'Mrs. Williams', room: 'Room 103' }
        ],
        'Grade-9-B': [
            { day: 'Monday', time: '08:00 - 08:40', subject: 'Mathematics', teacher: 'Mr. Brown', room: 'Room 104' },
            { day: 'Tuesday', time: '09:00 - 09:40', subject: 'Science', teacher: 'Ms. Davis', room: 'Room 105' },
            { day: 'Wednesday', time: '08:00 - 08:40', subject: 'English', teacher: 'Mr. Wilson', room: 'Room 106' }
        ],
        'Grade-10-A': [
            { day: 'Monday', time: '08:00 - 08:40', subject: 'Mathematics', teacher: 'Mr. Anderson', room: 'Room 201' },
            { day: 'Monday', time: '10:00 - 10:40', subject: 'Physics', teacher: 'Dr. Taylor', room: 'Room 202' },
            { day: 'Tuesday', time: '09:00 - 09:40', subject: 'Chemistry', teacher: 'Ms. Martinez', room: 'Lab 1' },
            { day: 'Wednesday', time: '08:00 - 08:40', subject: 'Biology', teacher: 'Mrs. Lee', room: 'Lab 2' },
            { day: 'Thursday', time: '10:00 - 10:40', subject: 'English', teacher: 'Mr. Clark', room: 'Room 203' }
        ],
        'Grade-10-B': [
            { day: 'Monday', time: '09:00 - 09:40', subject: 'Mathematics', teacher: 'Ms. Garcia', room: 'Room 204' },
            { day: 'Tuesday', time: '08:00 - 08:40', subject: 'Physics', teacher: 'Dr. Rodriguez', room: 'Room 205' },
            { day: 'Wednesday', time: '10:00 - 10:40', subject: 'Chemistry', teacher: 'Mr. White', room: 'Lab 1' }
        ],
        'Grade-11-A': [
            { day: 'Monday', time: '08:00 - 08:40', subject: 'Advanced Math', teacher: 'Dr. Thompson', room: 'Room 301' },
            { day: 'Tuesday', time: '09:00 - 09:40', subject: 'Physics', teacher: 'Prof. Moore', room: 'Room 302' },
            { day: 'Wednesday', time: '08:00 - 08:40', subject: 'Chemistry', teacher: 'Dr. Jackson', room: 'Lab 3' },
            { day: 'Thursday', time: '10:00 - 10:40', subject: 'Biology', teacher: 'Dr. Harris', room: 'Lab 4' }
        ],
        'Grade-11-B': [
            { day: 'Monday', time: '09:00 - 09:40', subject: 'Advanced Math', teacher: 'Dr. Young', room: 'Room 303' },
            { day: 'Tuesday', time: '08:00 - 08:40', subject: 'Physics', teacher: 'Prof. King', room: 'Room 304' },
            { day: 'Wednesday', time: '10:00 - 10:40', subject: 'Chemistry', teacher: 'Dr. Wright', room: 'Lab 3' }
        ],
        'Grade-12-A': [
            { day: 'Monday', time: '08:00 - 08:40', subject: 'Calculus', teacher: 'Prof. Adams', room: 'Room 401' },
            { day: 'Tuesday', time: '09:00 - 09:40', subject: 'Advanced Physics', teacher: 'Prof. Baker', room: 'Room 402' },
            { day: 'Wednesday', time: '08:00 - 08:40', subject: 'Organic Chemistry', teacher: 'Dr. Carter', room: 'Lab 5' },
            { day: 'Thursday', time: '10:00 - 10:40', subject: 'Biology', teacher: 'Dr. Evans', room: 'Lab 6' }
        ],
        'Grade-12-B': [
            { day: 'Monday', time: '09:00 - 09:40', subject: 'Calculus', teacher: 'Prof. Foster', room: 'Room 403' },
            { day: 'Tuesday', time: '08:00 - 08:40', subject: 'Advanced Physics', teacher: 'Prof. Green', room: 'Room 404' },
            { day: 'Wednesday', time: '10:00 - 10:40', subject: 'Organic Chemistry', teacher: 'Dr. Hall', room: 'Lab 5' }
        ]
    };
    
    const schedule = scheduleData[classValue] || [];
    const tbody = document.getElementById('scheduleTableBody');
    tbody.innerHTML = '';
    
    schedule.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.time}</td>
            <td>${item.subject}</td>
            <td>${item.teacher}</td>
            <td>${item.room}</td>
            <td>
                <button class="simple-btn primary" onclick="openCollectorForClass('${classValue}', '${item.day}', '${item.time}', '${item.subject}', '${item.teacher}', '${item.room}')">
                    <i class="fas fa-clipboard-check"></i> Collect
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Open attendance collector for selected class time
function openCollectorForClass(classValue, day, time, subject, teacher, room) {
    const classSelect = document.getElementById('classSelect');
    const className = classSelect.options[classSelect.selectedIndex].text;
    
    // Create attendance object for the collector
    const today = new Date();
    const attendanceObj = {
        id: Date.now(),
        class: className,
        subject: subject,
        time: time,
        date: today.toISOString().split('T')[0],
        room: room,
        teacher: teacher,
        day: day,
        status: 'upcoming',
        present: 0,
        total: 25, // Default student count
        students: generateStudentList(className)
    };
    
    // Store globally
    currentAttendanceObj = attendanceObj;
    
    // Open the collector
    openAttendanceCollector(attendanceObj);
}

// Open attendance collector as details page
function openAttendanceCollector(attendance) {
    const detailsPage = document.getElementById('attendanceCollectorDetails');
    const attendanceObj = typeof attendance === 'number' 
        ? currentAttendanceObj 
        : attendance;
    
    if (!attendanceObj) return;
    
    // Store globally
    currentAttendanceObj = attendanceObj;
    
    // Update details page content
    document.getElementById('collectorTitle').textContent = `Take Attendance - ${attendanceObj.class}`;
    document.getElementById('collectorClassName').textContent = attendanceObj.class;
    document.getElementById('collectorSubject').textContent = attendanceObj.subject;
    document.getElementById('collectorTime').textContent = attendanceObj.time;
    document.getElementById('collectorDate').textContent = formatCollectorDate(attendanceObj.date);
    document.getElementById('collectorRoom').textContent = attendanceObj.room;
    
    // Update counts
    updateAttendanceCounts(attendanceObj);
    
    // Render student list
    renderStudentList(attendanceObj);
    
    // Show details page
    detailsPage.style.display = 'block';
    
    // Scroll to details page
    detailsPage.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Format date for collector
function formatCollectorDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        weekday: 'long', 
        month: 'long', 
        day: 'numeric', 
        year: 'numeric' 
    });
}

// Render student list
function renderStudentList(attendance) {
    const container = document.getElementById('studentList');
    container.innerHTML = '';
    
    attendance.students.forEach(student => {
        const studentItem = document.createElement('div');
        studentItem.className = 'student-item';
        
        // Ensure status property exists (backward compatibility)
        if (!student.status) {
            student.status = student.present ? 'present' : 'absent';
        }
        
        const initials = student.name.split(' ').map(n => n[0]).join('') || student.name.charAt(0);
        
        studentItem.innerHTML = `
            <div class="student-avatar">${initials}</div>
            <div class="student-info">
                <div class="student-name">${student.name}</div>
                <div class="student-id">${student.rollNumber || student.studentId || `ID: ${student.id}`}</div>
            </div>
            <div class="attendance-toggle">
                <button class="toggle-btn ${student.status === 'present' ? 'present' : ''}" 
                        onclick="toggleStudentAttendance(${student.id}, 'present')"
                        title="Mark Present">
                    <i class="fas fa-check"></i>
                </button>
                <button class="toggle-btn ${student.status === 'absent' ? 'absent' : ''}" 
                        onclick="toggleStudentAttendance(${student.id}, 'absent')"
                        title="Mark Absent">
                    <i class="fas fa-times"></i>
                </button>
                <button class="toggle-btn ${student.status === 'leave' ? 'leave' : ''}" 
                        onclick="toggleStudentAttendance(${student.id}, 'leave')"
                        title="Mark Leave">
                    <i class="fas fa-calendar-times"></i>
                </button>
            </div>
        `;
        
        container.appendChild(studentItem);
    });
}

// Toggle student attendance
function toggleStudentAttendance(studentId, status) {
    if (!currentAttendanceObj) return;
    
    const student = currentAttendanceObj.students.find(s => s.id === studentId);
    
    if (student) {
        student.status = status;
        // Keep backward compatibility
        student.present = (status === 'present');
        updateAttendanceCounts(currentAttendanceObj);
        renderStudentList(currentAttendanceObj);
    }
}

// Update attendance counts
function updateAttendanceCounts(attendance) {
    // Ensure all students have status property (backward compatibility)
    attendance.students.forEach(student => {
        if (!student.status) {
            student.status = student.present ? 'present' : 'absent';
        }
    });
    
    const presentCount = attendance.students.filter(s => s.status === 'present').length;
    const absentCount = attendance.students.filter(s => s.status === 'absent').length;
    const leaveCount = attendance.students.filter(s => s.status === 'leave').length;
    
    document.getElementById('presentCount').textContent = presentCount;
    document.getElementById('absentCount').textContent = absentCount;
    document.getElementById('leaveCount').textContent = leaveCount;
    document.getElementById('totalCount').textContent = attendance.students.length;
    
    // Update attendance object
    attendance.present = presentCount;
    attendance.absent = absentCount;
    attendance.leave = leaveCount;
}

// Mark all present
function markAllPresent() {
    if (!currentAttendanceObj) return;
    
    currentAttendanceObj.students.forEach(student => {
        student.status = 'present';
        student.present = true;
    });
    
    updateAttendanceCounts(currentAttendanceObj);
    renderStudentList(currentAttendanceObj);
}

// Mark all absent
function markAllAbsent() {
    if (!currentAttendanceObj) return;
    
    currentAttendanceObj.students.forEach(student => {
        student.status = 'absent';
        student.present = false;
    });
    
    updateAttendanceCounts(currentAttendanceObj);
    renderStudentList(currentAttendanceObj);
}

// Mark all leave
function markAllLeave() {
    if (!currentAttendanceObj) return;
    
    currentAttendanceObj.students.forEach(student => {
        student.status = 'leave';
        student.present = false;
    });
    
    updateAttendanceCounts(currentAttendanceObj);
    renderStudentList(currentAttendanceObj);
}

// Save attendance
function saveAttendance() {
    if (!currentAttendanceObj) return;
    
    // Update status to finished
    currentAttendanceObj.status = 'finished';
    
    // Show success message (you can customize this)
    alert('Attendance saved successfully!');
    
    // Close modal
    closeAttendanceCollector();
}

// Close attendance collector
function closeAttendanceCollector() {
    const detailsPage = document.getElementById('attendanceCollectorDetails');
    
    // Hide details page only
    detailsPage.style.display = 'none';
    
    // Clear current attendance object
    currentAttendanceObj = null;
}

// Generate student list for attendance
function generateStudentList(className) {
    // This is mock data - in real implementation, fetch from database
    const studentCount = 25;
    const students = [];
    
    for (let i = 1; i <= studentCount; i++) {
        students.push({
            id: i,
            name: `Student ${i}`,
            rollNumber: `${className}-${i.toString().padStart(2, '0')}`,
            status: 'absent',
            present: false
        });
    }
    
    return students;
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded - Initializing attendance page');
    
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    currentAttendanceDate = new Date(dateString);
    
    // Add event listeners to tabs
    const tabs = document.querySelectorAll('.view-tab');
    console.log('Found tabs:', tabs.length);
    
    tabs.forEach(tab => {
        const view = tab.getAttribute('data-view');
        console.log('Setting up tab:', view);
        
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const viewValue = this.getAttribute('data-view');
            console.log('Tab clicked:', viewValue);
            if (viewValue) {
                switchAttendanceView(viewValue);
            } else {
                console.error('Tab has no data-view attribute');
            }
        });
    });
    
    // Initialize view from localStorage or default to class
    const savedView = localStorage.getItem('selectedStudentAttendanceView') || 'class';
    console.log('Initializing with view:', savedView);
    switchAttendanceView(savedView);
    
    // Update class filter when grade changes
    const gradeFilter = document.getElementById('gradeFilter');
    if (gradeFilter) {
        gradeFilter.addEventListener('change', updateClassFilter);
    }
    
    // Initialize class attendance table
    loadClassAttendanceTable();
    
    // Update summary statistics on page load
    updateAttendanceSummary();
});
</script>

<style>
/* Attendance Table Styles */
#attendanceTable {
    width: 100%;
}

#attendanceTable tbody tr:hover {
    background-color: #f9fafb;
}

.stat-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    min-width: 40px;
    text-align: center;
}

.stat-badge.present {
    background: #ecfdf5;
    color: #10b981;
}

.stat-badge.absent {
    background: #fef2f2;
    color: #ef4444;
}

.stat-badge.leave {
    background: #eff6ff;
    color: #3b82f6;
}

.percentage-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    min-width: 60px;
    text-align: center;
}

.percentage-badge.high {
    background: #ecfdf5;
    color: #10b981;
}

.percentage-badge.medium {
    background: #fffbeb;
    color: #f59e0b;
}

.percentage-badge.low {
    background: #fef2f2;
    color: #ef4444;
}

/* Simple table styling - periods as horizontal columns */
#attendanceTable th,
#attendanceTable td {
    text-align: center;
    padding: 12px 8px;
}

#attendanceTable th:first-child,
#attendanceTable td:first-child {
    text-align: left;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.action-btn.view-btn {
    background: #4A90E2;
    color: #fff;
}

.action-btn.view-btn:hover {
    background: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
}

.action-btn i {
    font-size: 12px;
}

/* Attendance View Tabs */
.attendance-view-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 16px;
    border-bottom: 2px solid #e5e7eb;
}

.view-tab {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.view-tab:hover {
    color: #4A90E2;
    background: #f9fafb;
}

.view-tab.active {
    color: #4A90E2;
    border-bottom-color: #4A90E2;
}

.view-tab i {
    font-size: 16px;
}

.attendance-view-content {
    animation: fadeIn 0.3s ease-in-out;
    margin-top: 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    #attendanceTable {
        font-size: 14px;
    }
    
    .action-btn {
        padding: 5px 10px;
        font-size: 12px;
    }
    
    .action-btn span {
        display: none;
    }
    
    .attendance-view-tabs {
        flex-wrap: wrap;
    }
    
    .view-tab {
        padding: 10px 16px;
        font-size: 13px;
    }
}


/* Attendance Collector Details Page Styles */
.attendance-collector-details {
    width: 100%;
    background: #f8f9fa;
    margin-top: 24px;
}

.attendance-collector-container {
    min-height: 100vh;
    background: #f8f9fa;
}

.collector-header {
    background: #fff;
    border-bottom: 1px solid #e0e0e0;
    padding: 20px 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.collector-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}

.collector-back-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #666;
    font-size: 1rem;
    flex-shrink: 0;
}

.collector-back-btn:hover {
    background: #e9ecef;
    color: #333;
}

.collector-title-section {
    flex: 1;
}

.collector-title-section h1 {
    margin: 0 0 4px 0;
    font-size: 1.8rem;
    font-weight: 700;
    color: #333;
}

.collector-class-info {
    font-size: 1rem;
    color: #666;
    font-weight: 500;
}

.collector-actions-header {
    display: flex;
    gap: 12px;
}

.collector-action-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.9rem;
    font-weight: 500;
}

.collector-action-btn.secondary {
    color: #666;
}

.collector-action-btn.secondary:hover {
    border-color: #1976d2;
    color: #1976d2;
    background: #f8f9fa;
}

.collector-action-btn.primary {
    background: #1976d2;
    color: #fff;
    border-color: #1976d2;
}

.collector-action-btn.primary:hover {
    background: #1565c0;
    border-color: #1565c0;
}

.collector-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 24px;
}

.collector-info-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.info-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
}

.info-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.info-card-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: #e3f2fd;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1976d2;
    font-size: 1.2rem;
}

.info-card-content {
    flex: 1;
}

.info-card-label {
    font-size: 0.8rem;
    color: #666;
    text-transform: uppercase;
    font-weight: 500;
    margin-bottom: 4px;
}

.info-card-value {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

.attendance-summary-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 32px;
}

.summary-card {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.summary-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
}

.summary-card.present {
    background: linear-gradient(135deg, #e8f5e8 0%, #fff 100%);
    border: 1px solid #2e7d3220;
}

.summary-card.absent {
    background: linear-gradient(135deg, #ffebee 0%, #fff 100%);
    border: 1px solid #d32f2f20;
}

.summary-card.leave {
    background: linear-gradient(135deg, #eff6ff 0%, #fff 100%);
    border: 1px solid #3b82f620;
}

.summary-card.total {
    background: linear-gradient(135deg, #e3f2fd 0%, #fff 100%);
    border: 1px solid #1976d220;
}

.summary-card-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.summary-card.present .summary-card-icon {
    background: #2e7d32;
    color: #fff;
}

.summary-card.absent .summary-card-icon {
    background: #d32f2f;
    color: #fff;
}

.summary-card.leave .summary-card-icon {
    background: #3b82f6;
    color: #fff;
}

.summary-card.total .summary-card-icon {
    background: #1976d2;
    color: #fff;
}

.summary-card-content {
    flex: 1;
}

.summary-card-number {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    margin: 0;
    line-height: 1;
}

.summary-card-label {
    font-size: 0.9rem;
    color: #666;
    font-weight: 500;
    margin: 0;
}

.student-grid-container {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.student-grid-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #e0e0e0;
}

.student-grid-header h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
}

.student-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 16px;
}

.student-item {
    background: #f8f9fa;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.2s ease;
}

.student-item:hover {
    border-color: #1976d2;
    background: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.student-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #e3f2fd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #1976d2;
    font-size: 1rem;
    flex-shrink: 0;
}

.student-info {
    flex: 1;
}

.student-name {
    font-weight: 600;
    color: #333;
    margin: 0 0 4px 0;
    font-size: 1rem;
}

.student-id {
    font-size: 0.8rem;
    color: #666;
    margin: 0;
}

.attendance-toggle {
    display: flex;
    gap: 8px;
}

.toggle-btn {
    width: 40px;
    height: 40px;
    border: 2px solid #e0e0e0;
    border-radius: 50%;
    background: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    font-size: 1rem;
}

.toggle-btn.present {
    border-color: #2e7d32;
    background: #e8f5e8;
    color: #2e7d32;
}

.toggle-btn.absent {
    border-color: #d32f2f;
    background: #ffebee;
    color: #d32f2f;
}

.toggle-btn.leave {
    border-color: #3b82f6;
    background: #eff6ff;
    color: #3b82f6;
}

.toggle-btn:hover {
    transform: scale(1.1);
}

/* Responsive Design for Collector */
@media (max-width: 768px) {
    .collector-header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .collector-actions-header {
        flex-direction: column;
        width: 100%;
    }
    
    .collector-action-btn {
        width: 100%;
        justify-content: center;
    }
    
    .student-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
$content = ob_get_clean();
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';
include __DIR__ . '/../components/' . $layout;
?>

