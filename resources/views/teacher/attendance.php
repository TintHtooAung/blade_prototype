<?php
$pageTitle = 'Smart Campus Nova Hub - Attendance';
$pageIcon = 'fas fa-clipboard-check';
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

<!-- Attendance Cards Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-clipboard-check"></i> Class Attendance</h3>
        <div class="simple-actions">
            <div class="calendar-navigation">
                <button class="nav-btn" onclick="navigateAttendanceDate(-1)" title="Previous Day">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="current-date-display">
                    <div class="date-main" id="attendanceCurrentDateDisplay">Wednesday, Dec 18</div>
                    <div class="date-sub" id="attendanceCurrentDateSub">Today</div>
                </div>
                <button class="nav-btn" onclick="navigateAttendanceDate(1)" title="Next Day">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
    
    <div class="attendance-cards-container" id="attendanceCards">
        <!-- Attendance cards will be populated here -->
    </div>
</div>

<!-- Attendance Collector Full Page -->
<div id="attendanceCollectorModal" class="attendance-collector-overlay" style="display: none;">
    <div class="attendance-collector-container">
        <!-- Header Section -->
        <div class="collector-header">
            <div class="collector-header-content">
                <div class="collector-back-btn" onclick="closeAttendanceCollector()">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Attendance</span>
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
                    <div class="student-grid-actions">
                        <button class="grid-action-btn" onclick="toggleGridView('list')">
                            <i class="fas fa-list"></i> List View
                        </button>
                        <button class="grid-action-btn" onclick="toggleGridView('grid')">
                            <i class="fas fa-th"></i> Grid View
                        </button>
                    </div>
                </div>
                <div class="student-grid" id="studentList">
                    <!-- Student list will be populated here -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Attendance Cards - Compact Design */
.attendance-cards-container {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 20px;
}

.attendance-card {
    background: #fff;
    border-radius: 16px;
    padding: 16px 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    position: relative;
    overflow: hidden;
    width: 100%;
}

.attendance-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
}

.attendance-card.upcoming {
    background: linear-gradient(135deg, #fff8e1 0%, #fff 100%);
    border: 1px solid #f59e0b20;
}

.attendance-card.active {
    background: linear-gradient(135deg, #e3f2fd 0%, #fff 100%);
    border: 1px solid #1976d220;
}

.attendance-card.finished {
    background: linear-gradient(135deg, #e8f5e8 0%, #fff 100%);
    border: 1px solid #2e7d3220;
    opacity: 0.9;
}

.attendance-card-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.attendance-main-info {
    display: flex;
    align-items: center;
    gap: 16px;
    flex: 1;
}

.attendance-status-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    flex-shrink: 0;
}

.attendance-status-indicator.upcoming {
    background: #f59e0b;
    box-shadow: 0 0 0 4px #f59e0b20;
}

.attendance-status-indicator.active {
    background: #1976d2;
    box-shadow: 0 0 0 4px #1976d220;
    animation: pulse 2s infinite;
}

.attendance-status-indicator.finished {
    background: #2e7d32;
    box-shadow: 0 0 0 4px #2e7d3220;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 4px #1976d220; }
    50% { box-shadow: 0 0 0 8px #1976d210; }
    100% { box-shadow: 0 0 0 4px #1976d220; }
}

.attendance-class-info {
    flex: 1;
}

.attendance-class-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin: 0 0 4px 0;
    line-height: 1.3;
}

.attendance-class-subtitle {
    font-size: 0.85rem;
    color: #666;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.attendance-class-subtitle span {
    display: flex;
    align-items: center;
    gap: 4px;
}

.attendance-class-subtitle i {
    font-size: 0.75rem;
    color: #999;
}

.attendance-stats {
    display: flex;
    align-items: center;
    gap: 20px;
}

.attendance-count {
    text-align: center;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.count-number {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1976d2;
    margin: 0;
    line-height: 1;
}

.count-label {
    font-size: 0.7rem;
    color: #666;
    margin: 0;
    text-transform: uppercase;
    font-weight: 500;
}

.attendance-status-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.attendance-status-badge.upcoming {
    background: #fff3e0;
    color: #f59e0b;
}

.attendance-status-badge.active {
    background: #e3f2fd;
    color: #1976d2;
}

.attendance-status-badge.finished {
    background: #e8f5e8;
    color: #2e7d32;
}

.attendance-actions {
    display: flex;
    gap: 8px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.attendance-card:hover .attendance-actions {
    opacity: 1;
}

.action-btn {
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    font-size: 0.9rem;
    color: #666;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.action-btn:hover {
    background: #1976d2;
    color: #fff;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(25, 118, 210, 0.3);
}

/* Filter Groups */
.filter-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-group label {
    font-size: 0.9rem;
    font-weight: 500;
    color: #666;
    margin: 0;
    white-space: nowrap;
}

.form-select.compact {
    padding: 6px 10px;
    font-size: 0.85rem;
    min-width: 120px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background: #fff;
    cursor: pointer;
    transition: all 0.2s ease;
}

.form-select.compact:hover {
    border-color: #1976d2;
}

.form-select.compact:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.2);
}

/* Calendar Navigation */
.calendar-navigation {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #f8f9fa;
    border-radius: 12px;
    padding: 8px 16px;
    border: 1px solid #e0e0e0;
}

.nav-btn {
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 8px;
    background: #fff;
    color: #666;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-btn:hover {
    background: #1976d2;
    color: #fff;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(25, 118, 210, 0.3);
}

.nav-btn:active {
    transform: scale(0.95);
}

.current-date-display {
    text-align: center;
    min-width: 140px;
}

.date-main {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
    line-height: 1.2;
}

.date-sub {
    font-size: 0.75rem;
    color: #1976d2;
    font-weight: 500;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.date-sub.today {
    color: #2e7d32;
}

.date-sub.past {
    color: #666;
}

.date-sub.future {
    color: #f59e0b;
}

/* Full Page Attendance Collector */
.attendance-collector-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #f8f9fa;
    z-index: 1000;
    overflow-y: auto;
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
    gap: 8px;
    padding: 8px 16px;
    background: #f8f9fa;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #666;
    font-size: 0.9rem;
    font-weight: 500;
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

.student-grid-actions {
    display: flex;
    gap: 8px;
}

.grid-action-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    background: #fff;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.85rem;
    color: #666;
}

.grid-action-btn:hover {
    border-color: #1976d2;
    color: #1976d2;
    background: #f8f9fa;
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
    cursor: pointer;
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

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .attendance-card-header {
        flex-direction: column;
        gap: 12px;
    }
    
    .attendance-card-body {
        flex-direction: column;
        gap: 16px;
    }
    
    .attendance-summary {
        flex-direction: column;
    }
    
    .collector-actions {
        flex-direction: column;
    }
}
</style>

<script>
// Attendance data - Every day has 1-2 classes for attendance collection
const attendanceData = [
    // Monday Classes
    {
        id: 1,
        class: 'Grade 10A',
        subject: 'Mathematics',
        time: '8:00-9:00',
        date: '2024-12-16', // Monday
        status: 'active',
        present: 28,
        total: 30,
        room: 'Room 201',
        students: [
            { id: 1, name: 'John Smith', studentId: 'ST001', present: true },
            { id: 2, name: 'Sarah Johnson', studentId: 'ST002', present: true },
            { id: 3, name: 'Mike Wilson', studentId: 'ST003', present: false },
            { id: 4, name: 'Emma Davis', studentId: 'ST004', present: true },
            { id: 5, name: 'David Brown', studentId: 'ST005', present: true }
        ]
    },
    {
        id: 2,
        class: 'Grade 11A',
        subject: 'Physics',
        time: '10:00-11:00',
        date: '2024-12-16', // Monday
        status: 'upcoming',
        present: 0,
        total: 25,
        room: 'Room 205',
        students: [
            { id: 11, name: 'James Wilson', studentId: 'ST011', present: false },
            { id: 12, name: 'Sophie Clark', studentId: 'ST012', present: false },
            { id: 13, name: 'Ryan Murphy', studentId: 'ST013', present: false },
            { id: 14, name: 'Olivia White', studentId: 'ST014', present: false },
            { id: 15, name: 'Daniel Green', studentId: 'ST015', present: false }
        ]
    },
    
    // Tuesday Classes
    {
        id: 3,
        class: 'Grade 10B',
        subject: 'Chemistry',
        time: '9:00-10:00',
        date: '2024-12-17', // Tuesday
        status: 'upcoming',
        present: 0,
        total: 28,
        room: 'Room 203',
        students: [
            { id: 6, name: 'Lisa Anderson', studentId: 'ST006', present: false },
            { id: 7, name: 'Tom Miller', studentId: 'ST007', present: false },
            { id: 8, name: 'Anna Taylor', studentId: 'ST008', present: false },
            { id: 9, name: 'Chris Lee', studentId: 'ST009', present: false },
            { id: 10, name: 'Maria Garcia', studentId: 'ST010', present: false }
        ]
    },
    {
        id: 4,
        class: 'Grade 12A',
        subject: 'Mathematics',
        time: '2:00-3:00',
        date: '2024-12-17', // Tuesday
        status: 'upcoming',
        present: 0,
        total: 25,
        room: 'Room 201',
        students: [
            { id: 21, name: 'Lucas Adams', studentId: 'ST021', present: false },
            { id: 22, name: 'Maya Patel', studentId: 'ST022', present: false },
            { id: 23, name: 'Caleb Wright', studentId: 'ST023', present: false },
            { id: 24, name: 'Lily Martinez', studentId: 'ST024', present: false },
            { id: 25, name: 'Owen Thompson', studentId: 'ST025', present: false }
        ]
    },
    
    // Wednesday Classes (Today)
    {
        id: 5,
        class: 'Grade 11B',
        subject: 'Physics',
        time: '8:00-9:00',
        date: '2024-12-18', // Wednesday
        status: 'active',
        present: 26,
        total: 28,
        room: 'Room 205',
        students: [
            { id: 16, name: 'Alex Turner', studentId: 'ST016', present: true },
            { id: 17, name: 'Grace Hall', studentId: 'ST017', present: true },
            { id: 18, name: 'Noah King', studentId: 'ST018', present: false },
            { id: 19, name: 'Zoe Scott', studentId: 'ST019', present: true },
            { id: 20, name: 'Ethan Young', studentId: 'ST020', present: true }
        ]
    },
    {
        id: 6,
        class: 'Grade 12B',
        subject: 'Chemistry',
        time: '11:00-12:00',
        date: '2024-12-18', // Wednesday
        status: 'upcoming',
        present: 0,
        total: 27,
        room: 'Room 203',
        students: [
            { id: 26, name: 'Sophia Chen', studentId: 'ST026', present: false },
            { id: 27, name: 'Marcus Johnson', studentId: 'ST027', present: false },
            { id: 28, name: 'Isabella Rodriguez', studentId: 'ST028', present: false },
            { id: 29, name: 'Nathan Kim', studentId: 'ST029', present: false },
            { id: 30, name: 'Ava Thompson', studentId: 'ST030', present: false }
        ]
    },
    
    // Thursday Classes
    {
        id: 7,
        class: 'Grade 10A',
        subject: 'Mathematics',
        time: '9:00-10:00',
        date: '2024-12-19', // Thursday
        status: 'upcoming',
        present: 0,
        total: 30,
        room: 'Room 201',
        students: [
            { id: 1, name: 'John Smith', studentId: 'ST001', present: false },
            { id: 2, name: 'Sarah Johnson', studentId: 'ST002', present: false },
            { id: 3, name: 'Mike Wilson', studentId: 'ST003', present: false },
            { id: 4, name: 'Emma Davis', studentId: 'ST004', present: false },
            { id: 5, name: 'David Brown', studentId: 'ST005', present: false }
        ]
    },
    {
        id: 8,
        class: 'Grade 11A',
        subject: 'Mathematics',
        time: '1:00-2:00',
        date: '2024-12-19', // Thursday
        status: 'upcoming',
        present: 0,
        total: 25,
        room: 'Room 201',
        students: [
            { id: 11, name: 'James Wilson', studentId: 'ST011', present: false },
            { id: 12, name: 'Sophie Clark', studentId: 'ST012', present: false },
            { id: 13, name: 'Ryan Murphy', studentId: 'ST013', present: false },
            { id: 14, name: 'Olivia White', studentId: 'ST014', present: false },
            { id: 15, name: 'Daniel Green', studentId: 'ST015', present: false }
        ]
    },
    
    // Friday Classes
    {
        id: 9,
        class: 'Grade 10B',
        subject: 'Physics',
        time: '8:30-9:30',
        date: '2024-12-20', // Friday
        status: 'upcoming',
        present: 0,
        total: 28,
        room: 'Room 205',
        students: [
            { id: 6, name: 'Lisa Anderson', studentId: 'ST006', present: false },
            { id: 7, name: 'Tom Miller', studentId: 'ST007', present: false },
            { id: 8, name: 'Anna Taylor', studentId: 'ST008', present: false },
            { id: 9, name: 'Chris Lee', studentId: 'ST009', present: false },
            { id: 10, name: 'Maria Garcia', studentId: 'ST010', present: false }
        ]
    },
    {
        id: 10,
        class: 'Grade 12A',
        subject: 'Chemistry',
        time: '10:30-11:30',
        date: '2024-12-20', // Friday
        status: 'upcoming',
        present: 0,
        total: 25,
        room: 'Room 203',
        students: [
            { id: 21, name: 'Lucas Adams', studentId: 'ST021', present: false },
            { id: 22, name: 'Maya Patel', studentId: 'ST022', present: false },
            { id: 23, name: 'Caleb Wright', studentId: 'ST023', present: false },
            { id: 24, name: 'Lily Martinez', studentId: 'ST024', present: false },
            { id: 25, name: 'Owen Thompson', studentId: 'ST025', present: false }
        ]
    }
];

let attendanceCurrentDate = new Date('2024-12-18'); // Start with today (Wednesday)

// Initialize attendance page
document.addEventListener('DOMContentLoaded', function() {
    // Initialize date display and render cards
    updateAttendanceDateDisplay();
    renderAttendanceCards();
});

// Calendar navigation functions
function navigateAttendanceDate(direction) {
    attendanceCurrentDate.setDate(attendanceCurrentDate.getDate() + direction);
    updateAttendanceDateDisplay();
    renderAttendanceCards();
}

function updateAttendanceDateDisplay() {
    const today = new Date();
    const isToday = attendanceCurrentDate.toDateString() === today.toDateString();
    
    const dateMain = document.getElementById('attendanceCurrentDateDisplay');
    const dateSub = document.getElementById('attendanceCurrentDateSub');
    
    // Format the date display
    const options = { 
        weekday: 'long', 
        month: 'short', 
        day: 'numeric' 
    };
    dateMain.textContent = attendanceCurrentDate.toLocaleDateString('en-US', options);
    
    // Update subtitle - only show "Today" or hide it
    if (isToday) {
        dateSub.textContent = 'Today';
        dateSub.className = 'date-sub today';
        dateSub.style.display = 'block';
    } else {
        dateSub.style.display = 'none';
    }
}

function renderAttendanceCards() {
    const container = document.getElementById('attendanceCards');
    container.innerHTML = '';
    
    let filteredData = attendanceData;
    
    // Apply date filter based on current selected date
    const targetDate = attendanceCurrentDate.toISOString().split('T')[0];
    filteredData = filteredData.filter(item => item.date === targetDate);
    
    filteredData.forEach(attendance => {
        const card = createAttendanceCard(attendance);
        container.appendChild(card);
    });
}


function createAttendanceCard(attendance) {
    const card = document.createElement('div');
    card.className = `attendance-card ${attendance.status}`;
    card.onclick = () => openAttendanceCollector(attendance);
    
    const statusText = attendance.status.charAt(0).toUpperCase() + attendance.status.slice(1);
    const countText = `${attendance.present}/${attendance.total}`;
    
    card.innerHTML = `
        <div class="attendance-card-content">
            <div class="attendance-main-info">
                <div class="attendance-status-indicator ${attendance.status}"></div>
                <div class="attendance-class-info">
                    <h4 class="attendance-class-title">${attendance.class} - ${attendance.subject}</h4>
                    <div class="attendance-class-subtitle">
                        <span><i class="fas fa-clock"></i> ${attendance.time}</span>
                        <span><i class="fas fa-door-open"></i> ${attendance.room}</span>
                        <span><i class="fas fa-calendar"></i> ${formatDateShort(attendance.date)}</span>
                    </div>
                </div>
            </div>
            
            <div class="attendance-stats">
                <div class="attendance-count">
                    <div class="count-number">${countText}</div>
                    <div class="count-label">Collected</div>
                </div>
                <div class="attendance-status-badge ${attendance.status}">
                    <i class="fas fa-${getStatusIcon(attendance.status)}"></i>
                    ${statusText}
                </div>
            </div>
            
            <div class="attendance-actions">
                <button class="action-btn" onclick="event.stopPropagation(); openAttendanceCollector(${attendance.id})" title="Take Attendance">
                    <i class="fas fa-clipboard-check"></i>
                </button>
                <button class="action-btn" onclick="event.stopPropagation(); viewAttendanceHistory(${attendance.id})" title="View History">
                    <i class="fas fa-history"></i>
                </button>
            </div>
        </div>
    `;
    
    return card;
}

function getStatusIcon(status) {
    const icons = {
        'upcoming': 'clock',
        'active': 'play-circle',
        'finished': 'check-circle'
    };
    return icons[status] || 'clock';
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        weekday: 'long', 
        month: 'long', 
        day: 'numeric', 
        year: 'numeric' 
    });
}

function formatDateShort(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        month: 'short', 
        day: 'numeric' 
    });
}


function openAttendanceCollector(attendance) {
    const modal = document.getElementById('attendanceCollectorModal');
    const attendanceObj = typeof attendance === 'number' 
        ? attendanceData.find(a => a.id === attendance)
        : attendance;
    
    if (!attendanceObj) return;
    
    // Update modal content
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
    
    modal.style.display = 'block';
}

function renderStudentList(attendance) {
    const container = document.getElementById('studentList');
    container.innerHTML = '';
    
    attendance.students.forEach(student => {
        const studentItem = document.createElement('div');
        studentItem.className = 'student-item';
        
        const initials = student.name.split(' ').map(n => n[0]).join('');
        
        studentItem.innerHTML = `
            <div class="student-avatar">${initials}</div>
            <div class="student-info">
                <div class="student-name">${student.name}</div>
                <div class="student-id">${student.studentId}</div>
            </div>
            <div class="attendance-toggle">
                <button class="toggle-btn ${student.present ? 'present' : ''}" 
                        onclick="toggleStudentAttendance(${attendance.id}, ${student.id}, true)"
                        title="Mark Present">
                    <i class="fas fa-check"></i>
                </button>
                <button class="toggle-btn ${!student.present ? 'absent' : ''}" 
                        onclick="toggleStudentAttendance(${attendance.id}, ${student.id}, false)"
                        title="Mark Absent">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        container.appendChild(studentItem);
    });
}

function toggleStudentAttendance(attendanceId, studentId, isPresent) {
    const attendance = attendanceData.find(a => a.id === attendanceId);
    const student = attendance.students.find(s => s.id === studentId);
    
    if (student) {
        student.present = isPresent;
        updateAttendanceCounts(attendance);
        renderStudentList(attendance);
    }
}

function updateAttendanceCounts(attendance) {
    const presentCount = attendance.students.filter(s => s.present).length;
    const absentCount = attendance.students.length - presentCount;
    
    document.getElementById('presentCount').textContent = presentCount;
    document.getElementById('absentCount').textContent = absentCount;
    document.getElementById('totalCount').textContent = attendance.students.length;
    
    // Update attendance object
    attendance.present = presentCount;
}

function markAllPresent() {
    const attendance = getCurrentAttendance();
    if (!attendance) return;
    
    attendance.students.forEach(student => {
        student.present = true;
    });
    
    updateAttendanceCounts(attendance);
    renderStudentList(attendance);
}

function markAllAbsent() {
    const attendance = getCurrentAttendance();
    if (!attendance) return;
    
    attendance.students.forEach(student => {
        student.present = false;
    });
    
    updateAttendanceCounts(attendance);
    renderStudentList(attendance);
}

function getCurrentAttendance() {
    const title = document.getElementById('collectorTitle').textContent;
    const className = title.split(' - ')[1];
    return attendanceData.find(a => a.class === className);
}

function saveAttendance() {
    const attendance = getCurrentAttendance();
    if (!attendance) return;
    
    // Update status to finished
    attendance.status = 'finished';
    
    // Show success message
    showActionStatus('Attendance saved successfully!', 'success');
    
    // Close modal
    closeAttendanceCollector();
    
    // Refresh cards
    renderAttendanceCards();
}

function closeAttendanceCollector() {
    document.getElementById('attendanceCollectorModal').style.display = 'none';
}

function toggleGridView(view) {
    const studentGrid = document.getElementById('studentList');
    if (view === 'list') {
        studentGrid.style.gridTemplateColumns = '1fr';
        studentGrid.style.gap = '8px';
    } else {
        studentGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(300px, 1fr))';
        studentGrid.style.gap = '16px';
    }
}

function viewAttendanceHistory(attendanceId) {
    showActionStatus('Opening attendance history...', 'info');
    // This would open a history modal or page
}

function showActionStatus(message, type) {
    // Simple status display - in real app, this would be more sophisticated
    const statusDiv = document.createElement('div');
    statusDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 12px 20px;
        background: ${type === 'success' ? '#2e7d32' : type === 'info' ? '#1976d2' : '#d32f2f'};
        color: white;
        border-radius: 8px;
        z-index: 1001;
        font-size: 0.9rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    `;
    statusDiv.textContent = message;
    document.body.appendChild(statusDiv);
    
    setTimeout(() => {
        document.body.removeChild(statusDiv);
    }, 3000);
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
