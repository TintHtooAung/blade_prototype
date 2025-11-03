<?php
$pageTitle = 'Smart Campus Nova Hub - Collect Attendance';
$pageIcon = 'fas fa-clipboard-check';
$pageHeading = 'Collect Attendance';
$activePage = 'collect-attendance';

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

<!-- Class Schedule Section -->
<div class="simple-section" id="scheduleSection" style="display: none;">
    <div class="simple-header">
        <h3><i class="fas fa-calendar-week"></i> Class Schedule - <span id="selectedClassName"></span></h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Day</th>
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

<!-- Attendance Collector Details Page - Reused from Teacher Portal -->
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

<style>
/* Attendance Collector Details Page Styles - Reused from Teacher Portal */
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

.toggle-btn:hover {
    transform: scale(1.1);
}

/* Responsive Design */
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

<script>
// Global attendance object storage
let currentAttendanceObj = null;

// Load class schedule
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
            <td>${item.day}</td>
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
    document.getElementById('collectorDate').textContent = formatDate(attendanceObj.date);
    document.getElementById('collectorRoom').textContent = attendanceObj.room;
    
    // Update counts
    updateAttendanceCounts(attendanceObj);
    
    // Render student list
    renderStudentList(attendanceObj);
    
    // Show details page (keep schedule table visible)
    detailsPage.style.display = 'block';
    
    // Scroll to details page
    detailsPage.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Format date
function formatDate(dateString) {
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
        
        const initials = student.name.split(' ').map(n => n[0]).join('') || student.name.charAt(0);
        
        studentItem.innerHTML = `
            <div class="student-avatar">${initials}</div>
            <div class="student-info">
                <div class="student-name">${student.name}</div>
                <div class="student-id">${student.rollNumber || student.studentId || `ID: ${student.id}`}</div>
            </div>
            <div class="attendance-toggle">
                <button class="toggle-btn ${student.present ? 'present' : ''}" 
                        onclick="toggleStudentAttendance(${student.id}, true)"
                        title="Mark Present">
                    <i class="fas fa-check"></i>
                </button>
                <button class="toggle-btn ${!student.present ? 'absent' : ''}" 
                        onclick="toggleStudentAttendance(${student.id}, false)"
                        title="Mark Absent">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        container.appendChild(studentItem);
    });
}

// Toggle student attendance
function toggleStudentAttendance(studentId, isPresent) {
    if (!currentAttendanceObj) return;
    
    const student = currentAttendanceObj.students.find(s => s.id === studentId);
    
    if (student) {
        student.present = isPresent;
        updateAttendanceCounts(currentAttendanceObj);
        renderStudentList(currentAttendanceObj);
    }
}

// Update attendance counts
function updateAttendanceCounts(attendance) {
    const presentCount = attendance.students.filter(s => s.present).length;
    const absentCount = attendance.students.length - presentCount;
    
    document.getElementById('presentCount').textContent = presentCount;
    document.getElementById('absentCount').textContent = absentCount;
    document.getElementById('totalCount').textContent = attendance.students.length;
    
    // Update attendance object
    attendance.present = presentCount;
}

// Mark all present
function markAllPresent() {
    if (!currentAttendanceObj) return;
    
    currentAttendanceObj.students.forEach(student => {
        student.present = true;
    });
    
    updateAttendanceCounts(currentAttendanceObj);
    renderStudentList(currentAttendanceObj);
}

// Mark all absent
function markAllAbsent() {
    if (!currentAttendanceObj) return;
    
    currentAttendanceObj.students.forEach(student => {
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

// Close attendance collector (keep schedule visible)
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
            present: false
        });
    }
    
    return students;
}
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

