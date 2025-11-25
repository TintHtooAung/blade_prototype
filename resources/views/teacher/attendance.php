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

<!-- Attendance History Full Page -->
<div id="attendanceHistoryPage" class="attendance-collector-overlay" style="display: none;">
    <div class="attendance-collector-container">
        <!-- Header Section -->
        <div class="collector-header">
            <div class="collector-header-content">
                <div class="collector-back-btn" onclick="closeAttendanceHistory()">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Attendance</span>
                </div>
                <div class="collector-title-section">
                    <h1 id="historyPageTitle">Attendance History</h1>
                    <div class="collector-class-info">
                        <span id="historyClassName"></span> • <span id="historySubject"></span> • <span id="historyTime"></span>
                    </div>
                </div>
                <div class="collector-actions-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <label style="font-weight: 600; color: #374151; white-space: nowrap; font-size: 14px;">Filter by:</label>
                        <select class="filter-select" id="historyFilterType" onchange="switchHistoryFilterType()" style="min-width: 120px; height: 40px;">
                            <option value="month">Month</option>
                            <option value="week">Week</option>
                        </select>
                        <select class="filter-select" id="historyMonthFilter" onchange="filterAttendanceHistory()" style="min-width: 200px; height: 40px; display: block;">
                            <option value="">All Months</option>
                        </select>
                        <select class="filter-select" id="historyWeekFilter" onchange="filterAttendanceHistory()" style="min-width: 250px; height: 40px; display: none;">
                            <option value="">All Weeks</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="collector-content" style="display: flex; flex-direction: column; gap: 20px;">
            <!-- Attendance History Table Container -->
            <div style="flex: 1; overflow: hidden; display: flex; flex-direction: column; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <div style="flex: 1; overflow: auto; padding: 20px;">
                    <table class="attendance-history-table" id="attendanceHistoryTable">
                        <thead id="attendanceHistoryTableHead">
                            <!-- Headers will be populated by JavaScript -->
                        </thead>
                        <tbody id="attendanceHistoryTableBody">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Monthly Attendance Summary Table -->
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 20px;">
                <div style="margin-bottom: 16px;">
                    <h3 style="margin: 0; font-size: 18px; font-weight: 600; color: #374151;">
                        <i class="fas fa-chart-bar" style="color: #4A90E2; margin-right: 8px;"></i>
                        Monthly Attendance Summary (Academic Year: June - February)
                    </h3>
                </div>
                <div style="overflow-x: auto;">
                    <table class="attendance-monthly-summary-table" id="attendanceMonthlySummaryTable">
                        <thead id="attendanceMonthlySummaryTableHead">
                            <!-- Headers will be populated by JavaScript -->
                        </thead>
                        <tbody id="attendanceMonthlySummaryTableBody">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
/* Attendance History Table Styles */
.attendance-history-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 13px;
}

.attendance-history-table thead {
    position: sticky;
    top: 0;
    z-index: 20;
    background: #f9fafb;
}

.attendance-history-table th {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    padding: 12px 8px;
    text-align: center;
    font-weight: 600;
    color: #374151;
    white-space: nowrap;
    min-width: 80px;
}

.attendance-history-table .fixed-col {
    background: #f9fafb !important;
    border-right: 2px solid #e5e7eb !important;
}

.attendance-history-table tbody .fixed-col {
    background: #fff !important;
}

.attendance-history-table td {
    border: 1px solid #e5e7eb;
    padding: 10px 8px;
    text-align: center;
    background: #fff;
}

.attendance-history-table tbody tr:hover {
    background: #f9fafb;
}

.attendance-history-table tbody tr:hover .fixed-col {
    background: #f3f4f6 !important;
}

.attendance-history-table .date-col {
    min-width: 70px;
    max-width: 70px;
    width: 70px;
}

/* Ensure proper scrolling for history table */
#attendanceHistoryPage .collector-content > div {
    overflow-x: auto;
    overflow-y: auto;
}

#attendanceHistoryPage .collector-content > div::-webkit-scrollbar {
    height: 8px;
    width: 8px;
}

#attendanceHistoryPage .collector-content > div::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

#attendanceHistoryPage .collector-content > div::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

#attendanceHistoryPage .collector-content > div::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.status-present {
    color: #10b981;
    background: #ecfdf5 !important;
}

.status-late {
    color: #f59e0b;
    background: #fffbeb !important;
}

.status-absent {
    color: #ef4444;
    background: #fef2f2 !important;
}

.status-no-class {
    color: #9ca3af;
    background: #f9fafb !important;
}

/* Monthly Summary Table Styles */
.attendance-monthly-summary-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 13px;
}

.attendance-monthly-summary-table thead {
    position: sticky;
    top: 0;
    z-index: 20;
    background: #f9fafb;
}

.attendance-monthly-summary-table th {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    padding: 12px 8px;
    text-align: center;
    font-weight: 600;
    color: #374151;
    white-space: nowrap;
    min-width: 100px;
}

.attendance-monthly-summary-table .month-col {
    min-width: 100px;
    max-width: 100px;
    width: 100px;
}

.attendance-monthly-summary-table td {
    border: 1px solid #e5e7eb;
    padding: 10px 8px;
    text-align: center;
    background: #fff;
}

.attendance-monthly-summary-table tbody tr:hover {
    background: #f9fafb;
}

.attendance-monthly-summary-table tbody tr:hover .fixed-col {
    background: #f3f4f6 !important;
}

.percentage-excellent {
    background: #ecfdf5 !important;
}

.percentage-good {
    background: #eff6ff !important;
}

.percentage-fair {
    background: #fffbeb !important;
}

.percentage-poor {
    background: #fef2f2 !important;
}

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

.student-item.leave-requested {
    background: #f8f9fa;
    border: 1px solid #e0e0e0;
    cursor: default;
}

.student-item.leave-requested:hover {
    border-color: #e0e0e0;
    background: #f8f9fa;
    transform: none;
    box-shadow: none;
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
            { id: 2, name: 'Sarah Johnson', studentId: 'ST002', present: true, leaveRequested: true, leaveType: 'Sick Leave', leaveFrom: '2024-12-16', leaveTo: '2024-12-16' },
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
            { id: 17, name: 'Grace Hall', studentId: 'ST017', present: true, leaveRequested: true, leaveType: 'Sick Leave', leaveFrom: '2024-12-18', leaveTo: '2024-12-18' },
            { id: 18, name: 'Noah King', studentId: 'ST018', present: false },
            { id: 19, name: 'Zoe Scott', studentId: 'ST019', present: true },
            { id: 20, name: 'Ethan Young', studentId: 'ST020', present: true, leaveRequested: true, leaveType: 'Family Emergency', leaveFrom: '2024-12-18', leaveTo: '2024-12-19' }
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
        const isLeaveRequested = student.leaveRequested === true;
        studentItem.className = isLeaveRequested ? 'student-item leave-requested' : 'student-item';
        
        const initials = student.name.split(' ').map(n => n[0]).join('');
        
        studentItem.innerHTML = `
            <div class="student-avatar">${initials}</div>
            <div class="student-info">
                <div class="student-name">${student.name}</div>
                <div class="student-id">${student.studentId}</div>
            </div>
            ${isLeaveRequested ? `
                <div style="color: #666; font-size: 0.875rem;">Leave-Requested</div>
            ` : `
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
            `}
        `;
        
        container.appendChild(studentItem);
    });
}

function toggleStudentAttendance(attendanceId, studentId, isPresent) {
    const attendance = attendanceData.find(a => a.id === attendanceId);
    const student = attendance.students.find(s => s.id === studentId);
    
    if (student && !student.leaveRequested) {
        student.present = isPresent;
        updateAttendanceCounts(attendance);
        renderStudentList(attendance);
    }
}

function updateAttendanceCounts(attendance) {
    // Count only non-leave-requested students for attendance
    const studentsToCount = attendance.students.filter(s => !s.leaveRequested);
    const presentCount = studentsToCount.filter(s => s.present).length;
    const absentCount = studentsToCount.length - presentCount;
    const leaveRequestedCount = attendance.students.filter(s => s.leaveRequested).length;
    
    document.getElementById('presentCount').textContent = presentCount;
    document.getElementById('absentCount').textContent = absentCount;
    document.getElementById('totalCount').textContent = attendance.students.length;
    
    // Update attendance object (only count non-leave-requested students)
    attendance.present = presentCount;
}

function markAllPresent() {
    const attendance = getCurrentAttendance();
    if (!attendance) return;
    
    attendance.students.forEach(student => {
        // Only mark present if not on leave
        if (!student.leaveRequested) {
            student.present = true;
        }
    });
    
    updateAttendanceCounts(attendance);
    renderStudentList(attendance);
}

function markAllAbsent() {
    const attendance = getCurrentAttendance();
    if (!attendance) return;
    
    attendance.students.forEach(student => {
        // Only mark absent if not on leave
        if (!student.leaveRequested) {
            student.present = false;
        }
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
    const attendance = attendanceData.find(a => a.id === attendanceId);
    if (!attendance) return;
    
    // Store attendance ID in page for filtering
    document.getElementById('attendanceHistoryPage').dataset.attendanceId = attendanceId;
    
    // Set page title
    document.getElementById('historyPageTitle').textContent = `Attendance History - ${attendance.class}`;
    document.getElementById('historyClassName').textContent = attendance.class;
    document.getElementById('historySubject').textContent = attendance.subject;
    document.getElementById('historyTime').textContent = attendance.time;
    
    // Generate and populate filter options
    populateHistoryMonthFilter();
    populateHistoryWeekFilter(attendance);
    
    // Load and render attendance history
    loadAttendanceHistory(attendance);
    
    // Show full page
    document.getElementById('attendanceHistoryPage').style.display = 'block';
}

function closeAttendanceHistory() {
    document.getElementById('attendanceHistoryPage').style.display = 'none';
}

// Close history page on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const historyPage = document.getElementById('attendanceHistoryPage');
        if (historyPage && historyPage.style.display === 'block') {
            closeAttendanceHistory();
        }
    }
});

function populateHistoryMonthFilter() {
    const monthFilter = document.getElementById('historyMonthFilter');
    const currentDate = new Date();
    const months = [];
    
    // Generate last 6 months
    for (let i = 5; i >= 0; i--) {
        const date = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1);
        const monthValue = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
        const monthName = date.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
        months.push({ value: monthValue, name: monthName });
    }
    
    // Clear existing options except "All Months"
    monthFilter.innerHTML = '<option value="">All Months</option>';
    months.forEach(month => {
        const option = document.createElement('option');
        option.value = month.value;
        option.textContent = month.name;
        monthFilter.appendChild(option);
    });
    
    // Set current month as default
    const currentMonth = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
    monthFilter.value = currentMonth;
}

function populateHistoryWeekFilter(attendance) {
    const weekFilter = document.getElementById('historyWeekFilter');
    const historyData = generateAttendanceHistoryData(attendance);
    
    // Group dates by week
    const weeks = [];
    const weekMap = new Map();
    
    historyData.forEach(record => {
        const date = new Date(record.date);
        const weekStart = getWeekStart(date);
        const weekKey = weekStart.toISOString().split('T')[0];
        
        if (!weekMap.has(weekKey)) {
            const weekEnd = new Date(weekStart);
            weekEnd.setDate(weekEnd.getDate() + 6);
            
            const weekLabel = `${weekStart.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${weekEnd.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}`;
            
            weekMap.set(weekKey, {
                start: weekKey,
                end: weekEnd.toISOString().split('T')[0],
                label: weekLabel
            });
        }
    });
    
    // Convert to array and sort by date (newest first)
    const weeksArray = Array.from(weekMap.values()).sort((a, b) => new Date(b.start) - new Date(a.start));
    
    // Clear existing options
    weekFilter.innerHTML = '<option value="">All Weeks</option>';
    weeksArray.forEach(week => {
        const option = document.createElement('option');
        option.value = `${week.start}|${week.end}`;
        option.textContent = week.label;
        weekFilter.appendChild(option);
    });
    
    // Set current week as default
    if (weeksArray.length > 0) {
        const currentWeek = weeksArray[0];
        weekFilter.value = `${currentWeek.start}|${currentWeek.end}`;
    }
}

function getWeekStart(date) {
    const d = new Date(date);
    const day = d.getDay();
    const diff = d.getDate() - day + (day === 0 ? -6 : 1); // Adjust when day is Sunday
    return new Date(d.setDate(diff));
}

function switchHistoryFilterType() {
    const filterType = document.getElementById('historyFilterType').value;
    const monthFilter = document.getElementById('historyMonthFilter');
    const weekFilter = document.getElementById('historyWeekFilter');
    
    if (filterType === 'week') {
        monthFilter.style.display = 'none';
        weekFilter.style.display = 'block';
    } else {
        monthFilter.style.display = 'block';
        weekFilter.style.display = 'none';
    }
    
    // Reload history with new filter
    const attendanceId = parseInt(document.getElementById('attendanceHistoryPage').dataset.attendanceId);
    if (attendanceId) {
        const attendance = attendanceData.find(a => a.id === attendanceId);
        if (attendance) {
            loadAttendanceHistory(attendance);
        }
    }
}

function loadAttendanceHistory(attendance) {
    // Generate sample attendance history data for this class
    const historyData = generateAttendanceHistoryData(attendance);
    
    // Get filter type
    const filterType = document.getElementById('historyFilterType').value;
    let filteredData = historyData;
    
    if (filterType === 'week') {
        // Filter by selected week
        const selectedWeek = document.getElementById('historyWeekFilter').value;
        if (selectedWeek) {
            const [weekStart, weekEnd] = selectedWeek.split('|');
            filteredData = historyData.filter(record => {
                const recordDate = record.date;
                return recordDate >= weekStart && recordDate <= weekEnd;
            });
        }
    } else {
        // Filter by selected month
        const selectedMonth = document.getElementById('historyMonthFilter').value;
        if (selectedMonth) {
            filteredData = historyData.filter(record => {
                const recordMonth = record.date.substring(0, 7); // YYYY-MM
                return recordMonth === selectedMonth;
            });
        }
    }
    
    renderAttendanceHistoryTable(attendance, filteredData);
    renderMonthlyAttendanceSummary(attendance, historyData);
}

function filterAttendanceHistory() {
    const attendanceId = parseInt(document.getElementById('attendanceHistoryPage').dataset.attendanceId);
    if (!attendanceId) return;
    
    const attendance = attendanceData.find(a => a.id === attendanceId);
    if (!attendance) return;
    
    loadAttendanceHistory(attendance);
}

function generateAttendanceHistoryData(attendance) {
    // Get all unique dates from attendanceData for this class
    const classRecords = attendanceData.filter(a => a.class === attendance.class && a.subject === attendance.subject);
    const historyRecords = [];
    
    // Generate history for the full academic year (June to February)
    const today = new Date();
    const currentYear = today.getFullYear();
    const currentMonth = today.getMonth() + 1; // 1-12
    
    // Determine academic year start date (June of previous or current year)
    let academicYearStart;
    if (currentMonth >= 1 && currentMonth <= 2) {
        // If we're in Jan-Feb, academic year started in June of previous year
        academicYearStart = new Date(currentYear - 1, 5, 1); // June (month 5)
    } else {
        // If we're in June-Dec, academic year started in June of current year
        academicYearStart = new Date(currentYear, 5, 1); // June (month 5)
    }
    
    // Get all class dates based on schedule pattern
    const classDates = [];
    const currentDate = new Date(academicYearStart);
    
    // Determine class days based on existing records (e.g., if class is on Mon/Wed/Fri)
    const existingDates = classRecords.map(r => new Date(r.date));
    const dayOfWeekPattern = existingDates.length > 0 ? [...new Set(existingDates.map(d => d.getDay()))] : [1, 3, 5]; // Default to Mon, Wed, Fri
    
    // Generate dates from academic year start to today (or end of February if we're past that)
    const academicYearEnd = new Date(academicYearStart.getFullYear() + 1, 1, 28); // End of February
    const endDate = today < academicYearEnd ? today : academicYearEnd;
    
    while (currentDate <= endDate) {
        const dateStr = currentDate.toISOString().split('T')[0];
        const dayOfWeek = currentDate.getDay();
        
        // Check if this day matches the class schedule pattern
        const matchesPattern = dayOfWeekPattern.length > 0 ? dayOfWeekPattern.includes(dayOfWeek) : true;
        
        // Check if this date has actual attendance data
        const hasRecord = classRecords.some(r => r.date === dateStr);
        
        // Include if it matches pattern or has actual record
        if (matchesPattern || hasRecord) {
            classDates.push(dateStr);
        }
        
        currentDate.setDate(currentDate.getDate() + 1);
    }
    
    // For each date, create a record with student attendance
    classDates.forEach(dateStr => {
        const record = classRecords.find(r => r.date === dateStr);
        const studentAttendance = {};
        
        attendance.students.forEach(student => {
            let status = 'P'; // Default to Present
            
            if (record) {
                // Use actual data if available
                const studentRecord = record.students.find(s => s.studentId === student.studentId);
                if (studentRecord) {
                    if (studentRecord.leaveRequested) {
                        status = 'L'; // Leave = Late/Excused
                    } else if (!studentRecord.present) {
                        status = 'A'; // Absent
                    } else {
                        // Randomly assign some as Late (5% chance)
                        status = Math.random() < 0.05 ? 'L' : 'P';
                    }
                }
            } else {
                // Generate realistic attendance pattern for historical data
                // Most students are present (85%), some absent (10%), some late (5%)
                const rand = Math.random();
                if (rand < 0.85) {
                    status = 'P';
                } else if (rand < 0.95) {
                    status = 'A';
                } else {
                    status = 'L';
                }
            }
            
            studentAttendance[student.studentId] = status;
        });
        
        historyRecords.push({
            date: dateStr,
            students: studentAttendance
        });
    });
    
    return historyRecords;
}

function renderAttendanceHistoryTable(attendance, historyData) {
    const thead = document.getElementById('attendanceHistoryTableHead');
    const tbody = document.getElementById('attendanceHistoryTableBody');
    
    // Check filter type
    const filterType = document.getElementById('historyFilterType').value;
    let dates = [];
    
    if (filterType === 'week') {
        // For week view: Show all 5 school days (Monday-Friday) of the selected week
        const selectedWeek = document.getElementById('historyWeekFilter').value;
        if (selectedWeek) {
            const [weekStart, weekEnd] = selectedWeek.split('|');
            const startDate = new Date(weekStart);
            const endDate = new Date(weekEnd);
            const currentDate = new Date(startDate);
            
            // Generate all weekdays (Monday=1 to Friday=5) for the week
            while (currentDate <= endDate) {
                const dayOfWeek = currentDate.getDay();
                // Only include weekdays (Monday=1 to Friday=5)
                if (dayOfWeek >= 1 && dayOfWeek <= 5) {
                    dates.push(currentDate.toISOString().split('T')[0]);
                }
                currentDate.setDate(currentDate.getDate() + 1);
            }
        } else {
            // If no week selected, show empty
            dates = [];
        }
    } else {
        // For month view: Show only teaching days (class meeting days), limit to 20 days
        // Get class schedule pattern
        const classRecords = attendanceData.filter(a => a.class === attendance.class && a.subject === attendance.subject);
        const existingDates = classRecords.map(r => new Date(r.date));
        const dayOfWeekPattern = existingDates.length > 0 ? [...new Set(existingDates.map(d => d.getDay()))] : [1, 3, 5];
        
        // Filter to only teaching days (days that match the class schedule pattern)
        const allDates = [...new Set(historyData.map(r => r.date))].sort();
        dates = allDates.filter(dateStr => {
            const date = new Date(dateStr);
            const dayOfWeek = date.getDay();
            return dayOfWeekPattern.includes(dayOfWeek);
        });
        
        // Limit to 20 teaching days
        dates = dates.slice(0, 20);
    }
    
    if (dates.length === 0) {
        tbody.innerHTML = '<tr><td colspan="2" style="text-align: center; padding: 40px; color: #999;">No attendance history available for the selected period.</td></tr>';
        thead.innerHTML = '<tr><th class="fixed-col">Student ID</th><th class="fixed-col">Student Name</th></tr>';
        return;
    }
    
    // Build header row
    let headerHTML = '<tr>';
    headerHTML += '<th class="fixed-col" style="position: sticky; left: 0; z-index: 10; background: #f9fafb; border-right: 2px solid #e5e7eb; min-width: 100px;">Student ID</th>';
    headerHTML += '<th class="fixed-col" style="position: sticky; left: 100px; z-index: 10; background: #f9fafb; border-right: 2px solid #e5e7eb; min-width: 200px;">Student Name</th>';
    
    dates.forEach(dateStr => {
        const date = new Date(dateStr);
        const dayName = date.toLocaleDateString('en-US', { weekday: 'short' });
        const dateLabel = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        headerHTML += `<th class="date-col" title="${date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}">${dayName}<br>${dateLabel}</th>`;
    });
    
    headerHTML += '</tr>';
    thead.innerHTML = headerHTML;
    
    // Build body rows
    tbody.innerHTML = '';
    
    attendance.students.forEach((student, index) => {
        let rowHTML = '<tr>';
        rowHTML += `<td class="fixed-col" style="position: sticky; left: 0; z-index: 5; background: #fff; border-right: 2px solid #e5e7eb; font-weight: 600; min-width: 100px;">${student.studentId}</td>`;
        rowHTML += `<td class="fixed-col" style="position: sticky; left: 100px; z-index: 5; background: #fff; border-right: 2px solid #e5e7eb; min-width: 200px;">${student.name}</td>`;
        
        dates.forEach(dateStr => {
            const date = new Date(dateStr);
            const dayOfWeek = date.getDay();
            
            // Get class schedule pattern
            const classRecords = attendanceData.filter(a => a.class === attendance.class && a.subject === attendance.subject);
            const existingDates = classRecords.map(r => new Date(r.date));
            const dayOfWeekPattern = existingDates.length > 0 ? [...new Set(existingDates.map(d => d.getDay()))] : [1, 3, 5];
            const isClassDay = dayOfWeekPattern.includes(dayOfWeek);
            
            const record = historyData.find(r => r.date === dateStr);
            let status = '-';
            
            if (filterType === 'week') {
                // For week view: Show attendance if it's a class day, otherwise show "No Class"
                if (isClassDay && record) {
                    status = record.students[student.studentId] ? record.students[student.studentId] : '-';
                } else if (!isClassDay) {
                    status = 'NC'; // No Class
                }
            } else {
                // For month view: All dates shown are teaching days, so show attendance
                if (record) {
                    status = record.students[student.studentId] ? record.students[student.studentId] : '-';
                }
            }
            
            let statusClass = '';
            let statusText = status;
            if (status === 'P') {
                statusClass = 'status-present';
                statusText = 'P';
            } else if (status === 'L') {
                statusClass = 'status-late';
                statusText = 'L';
            } else if (status === 'A') {
                statusClass = 'status-absent';
                statusText = 'A';
            } else if (status === 'NC') {
                statusClass = 'status-no-class';
                statusText = '-';
            } else {
                statusClass = '';
                statusText = '-';
            }
            
            rowHTML += `<td class="date-col ${statusClass}" style="text-align: center; font-weight: 600; min-width: 70px;">${statusText}</td>`;
        });
        
        rowHTML += '</tr>';
        tbody.innerHTML += rowHTML;
    });
}

function renderMonthlyAttendanceSummary(attendance, historyData) {
    const thead = document.getElementById('attendanceMonthlySummaryTableHead');
    const tbody = document.getElementById('attendanceMonthlySummaryTableBody');
    
    // Get current date to determine academic year
    const today = new Date();
    const currentYear = today.getFullYear();
    const currentMonth = today.getMonth() + 1; // 1-12
    
    // Determine academic year: June to February
    // If current month is Jan-Feb, academic year is previous year to current year
    // If current month is June-Dec, academic year is current year to next year
    let academicYearStart, academicYearEnd;
    if (currentMonth >= 1 && currentMonth <= 2) {
        academicYearStart = currentYear - 1;
        academicYearEnd = currentYear;
    } else {
        academicYearStart = currentYear;
        academicYearEnd = currentYear + 1;
    }
    
    // Academic year months: June (year1) to February (year2)
    const academicMonths = [
        { month: 6, year: academicYearStart, name: 'June' },
        { month: 7, year: academicYearStart, name: 'July' },
        { month: 8, year: academicYearStart, name: 'August' },
        { month: 9, year: academicYearStart, name: 'September' },
        { month: 10, year: academicYearStart, name: 'October' },
        { month: 11, year: academicYearStart, name: 'November' },
        { month: 12, year: academicYearStart, name: 'December' },
        { month: 1, year: academicYearEnd, name: 'January' },
        { month: 2, year: academicYearEnd, name: 'February' }
    ];
    
    // Build header row
    let headerHTML = '<tr>';
    headerHTML += '<th class="fixed-col" style="position: sticky; left: 0; z-index: 10; background: #f9fafb; border-right: 2px solid #e5e7eb; min-width: 100px;">Student ID</th>';
    headerHTML += '<th class="fixed-col" style="position: sticky; left: 100px; z-index: 10; background: #f9fafb; border-right: 2px solid #e5e7eb; min-width: 200px;">Student Name</th>';
    
    academicMonths.forEach(monthInfo => {
        const monthKey = `${monthInfo.year}-${String(monthInfo.month).padStart(2, '0')}`;
        headerHTML += `<th class="month-col" title="${monthInfo.name} ${monthInfo.year}">${monthInfo.name}</th>`;
    });
    
    headerHTML += '<th style="background: #f3f4f6; font-weight: 700; color: #1f2937;">Overall</th>';
    headerHTML += '</tr>';
    thead.innerHTML = headerHTML;
    
    // Calculate monthly percentages for each student
    tbody.innerHTML = '';
    
    attendance.students.forEach(student => {
        let rowHTML = '<tr>';
        rowHTML += `<td class="fixed-col" style="position: sticky; left: 0; z-index: 5; background: #fff; border-right: 2px solid #e5e7eb; font-weight: 600; min-width: 100px;">${student.studentId}</td>`;
        rowHTML += `<td class="fixed-col" style="position: sticky; left: 100px; z-index: 5; background: #fff; border-right: 2px solid #e5e7eb; min-width: 200px;">${student.name}</td>`;
        
        let totalPresent = 0;
        let totalDays = 0;
        let monthlyPercentages = [];
        
        academicMonths.forEach(monthInfo => {
            const monthKey = `${monthInfo.year}-${String(monthInfo.month).padStart(2, '0')}`;
            
            // Filter records for this month
            const monthRecords = historyData.filter(record => {
                const recordMonth = record.date.substring(0, 7);
                return recordMonth === monthKey;
            });
            
            if (monthRecords.length === 0) {
                rowHTML += '<td class="month-col" style="text-align: center; color: #9ca3af;">-</td>';
                monthlyPercentages.push(null);
            } else {
                let presentCount = 0;
                let totalMonthDays = 0;
                
                monthRecords.forEach(record => {
                    const status = record.students[student.studentId];
                    if (status) {
                        totalMonthDays++;
                        if (status === 'P' || status === 'L') {
                            presentCount++;
                        }
                    }
                });
                
                const percentage = totalMonthDays > 0 ? (presentCount / totalMonthDays * 100) : 0;
                totalPresent += presentCount;
                totalDays += totalMonthDays;
                monthlyPercentages.push(percentage);
                
                // Color code based on percentage
                let percentageClass = '';
                let percentageColor = '#374151';
                if (percentage >= 90) {
                    percentageClass = 'percentage-excellent';
                    percentageColor = '#10b981';
                } else if (percentage >= 75) {
                    percentageClass = 'percentage-good';
                    percentageColor = '#3b82f6';
                } else if (percentage >= 60) {
                    percentageClass = 'percentage-fair';
                    percentageColor = '#f59e0b';
                } else {
                    percentageClass = 'percentage-poor';
                    percentageColor = '#ef4444';
                }
                
                rowHTML += `<td class="month-col ${percentageClass}" style="text-align: center; font-weight: 600; color: ${percentageColor};">${percentage.toFixed(1)}%</td>`;
            }
        });
        
        // Calculate overall percentage
        const overallPercentage = totalDays > 0 ? (totalPresent / totalDays * 100) : 0;
        let overallColor = '#374151';
        if (overallPercentage >= 90) {
            overallColor = '#10b981';
        } else if (overallPercentage >= 75) {
            overallColor = '#3b82f6';
        } else if (overallPercentage >= 60) {
            overallColor = '#f59e0b';
        } else {
            overallColor = '#ef4444';
        }
        
        rowHTML += `<td style="background: #f3f4f6; text-align: center; font-weight: 700; color: ${overallColor};">${overallPercentage.toFixed(1)}%</td>`;
        rowHTML += '</tr>';
        tbody.innerHTML += rowHTML;
    });
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
