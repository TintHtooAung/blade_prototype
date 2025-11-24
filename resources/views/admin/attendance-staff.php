<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Attendance';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Attendance';
$activePage = 'attendance-staff';

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
<div style="margin-top: 24px;">
    <!-- View Toggle Tabs -->
    <div class="attendance-view-tabs">
        <button class="view-tab active" data-view="daily" onclick="switchAttendanceView('daily')">
            <i class="fas fa-calendar-day"></i> Daily Attd Register
        </button>
        <button class="view-tab" data-view="monthly" onclick="switchAttendanceView('monthly')">
            <i class="fas fa-calendar-alt"></i> Monthly Attendance
        </button>
        <button class="view-tab" data-view="summer" onclick="switchAttendanceView('summer')">
            <i class="fas fa-sun"></i> Summer Attendance
        </button>
        <button class="view-tab" data-view="annual" onclick="switchAttendanceView('annual')">
            <i class="fas fa-calendar-check"></i> Annual Attendance
        </button>
    </div>

    <!-- Daily Attendance View -->
    <div id="daily-attendance-view" class="attendance-view-content">
        <!-- Attendance Summary Cards -->
        <div class="stats-grid-secondary vertical-stats" style="margin-bottom: 24px;">
            <div class="stat-card">
                <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>Present</h3>
                    <div class="stat-number" id="presentCount">0</div>
                    <div class="stat-change">Today</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #ffebee; color: #d32f2f;">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>Absent</h3>
                    <div class="stat-number" id="absentCount">0</div>
                    <div class="stat-change">Today</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #e3f2fd; color: #1976d2;">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <div class="stat-content">
                    <h3>Leave</h3>
                    <div class="stat-number" id="leaveCount">0</div>
                    <div class="stat-change">Today</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #e3f2fd; color: #1976d2;">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Staff</h3>
                    <div class="stat-number" id="totalCount">0</div>
                    <div class="stat-change">All Staff</div>
                </div>
            </div>
        </div>

        <!-- Staff Attendance History Table -->
        <div id="attendanceHistoryTable" class="simple-section">
            <div class="simple-header">
                <h3>Daily Staff Attendance</h3>
                <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <div style="position: relative;">
                        <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6b7280; pointer-events: none; z-index: 1;"></i>
                        <input type="text" id="staffSearchInput" class="form-input" placeholder="Search by name, ID, department..." oninput="filterStaffAttendance()" style="padding-left: 36px; width: 300px;">
                    </div>
                </div>
            </div>
            <div class="simple-table-container">
                <table class="basic-table" id="attendanceTable">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Total Hours</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="attendanceTableBody">
                        <!-- Attendance table will be dynamically generated -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Monthly Attendance View -->
    <div id="monthly-attendance-view" class="attendance-view-content" style="display: none;">
        <!-- Monthly Header -->
        <div class="monthly-attendance-header">
            <div class="header-info">
                <h3>Employee Monthly Attendance</h3>
                <div class="monthly-meta">
                    <div class="meta-item">
                        <span class="meta-label">Academic Year:</span>
                        <span class="meta-value" id="academicYear">2024 - 2025</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Month:</span>
                        <select id="monthSelector" class="month-select" onchange="loadMonthlyAttendance()" style="height: 36px; padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                            <option value="01" <?php echo date('m') === '01' ? 'selected' : ''; ?>>January</option>
                            <option value="02" <?php echo date('m') === '02' ? 'selected' : ''; ?>>February</option>
                            <option value="03" <?php echo date('m') === '03' ? 'selected' : ''; ?>>March</option>
                            <option value="04" <?php echo date('m') === '04' ? 'selected' : ''; ?>>April</option>
                            <option value="05" <?php echo date('m') === '05' ? 'selected' : ''; ?>>May</option>
                            <option value="06" <?php echo date('m') === '06' ? 'selected' : ''; ?>>June</option>
                            <option value="07" <?php echo date('m') === '07' ? 'selected' : ''; ?>>July</option>
                            <option value="08" <?php echo date('m') === '08' ? 'selected' : ''; ?>>August</option>
                            <option value="09" <?php echo date('m') === '09' ? 'selected' : ''; ?>>September</option>
                            <option value="10" <?php echo date('m') === '10' ? 'selected' : ''; ?>>October</option>
                            <option value="11" <?php echo date('m') === '11' ? 'selected' : ''; ?>>November</option>
                            <option value="12" <?php echo date('m') === '12' ? 'selected' : ''; ?>>December</option>
                        </select>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Total Days:</span>
                        <span class="meta-value" id="totalDays"><?php echo date('t'); ?> days</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Attendance Table -->
        <div class="monthly-attendance-section">
            <div class="simple-table-container">
                <table class="monthly-attendance-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Employee ID</th>
                            <th>Position</th>
                            <th>Working Day</th>
                            <th>Leave Days</th>
                            <th>Annual Leave</th>
                            <th>Days Absent</th>
                            <th>Days Present</th>
                            <th>Days Late</th>
                            <th>Percentage</th>
                            <th>Total Hours</th>
                            <th>Total Overtime</th>
                        </tr>
                    </thead>
                    <tbody id="monthlyAttendanceBody">
                        <tr>
                            <td>1</td>
                            <td><strong>Daw Hnin Hnin</strong></td>
                            <td>ST001</td>
                            <td>HR</td>
                            <td>21</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>21</td>
                            <td>0</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>126</td>
                            <td>01:00:00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>U Aung Myint</strong></td>
                            <td>ST002</td>
                            <td>Finance</td>
                            <td>21</td>
                            <td>1</td>
                            <td>0</td>
                            <td>0</td>
                            <td>20</td>
                            <td>0</td>
                            <td><span class="percentage-badge medium">95%</span></td>
                            <td>120</td>
                            <td>00:00:00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Ms. Sarah Chen</strong></td>
                            <td>ST003</td>
                            <td>Admin</td>
                            <td>21</td>
                            <td>1</td>
                            <td>0</td>
                            <td>0</td>
                            <td>20</td>
                            <td>1</td>
                            <td><span class="percentage-badge medium">95%</span></td>
                            <td>120</td>
                            <td>00:30:00</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>Daw Thuzar</strong></td>
                            <td>ST005</td>
                            <td>Finance</td>
                            <td>21</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                            <td>18</td>
                            <td>1</td>
                            <td><span class="percentage-badge low">86%</span></td>
                            <td>108</td>
                            <td>00:00:00</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><strong>Dr. Emily Parker</strong></td>
                            <td>ST008</td>
                            <td>Finance</td>
                            <td>21</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>21</td>
                            <td>0</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>126</td>
                            <td>00:00:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><strong>Mr. David Lee</strong></td>
                            <td>ST004</td>
                            <td>HR</td>
                            <td>21</td>
                            <td>1</td>
                            <td>0</td>
                            <td>0</td>
                            <td>20</td>
                            <td>0</td>
                            <td><span class="percentage-badge medium">95%</span></td>
                            <td>120</td>
                            <td>01:30:00</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><strong>Mr. Michael Brown</strong></td>
                            <td>ST006</td>
                            <td>Admin</td>
                            <td>21</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>21</td>
                            <td>2</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>126</td>
                            <td>00:00:00</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><strong>Ms. Lisa Wong</strong></td>
                            <td>ST007</td>
                            <td>HR</td>
                            <td>21</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                            <td>19</td>
                            <td>0</td>
                            <td><span class="percentage-badge medium">90%</span></td>
                            <td>114</td>
                            <td>00:00:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Summer Attendance View -->
    <div id="summer-attendance-view" class="attendance-view-content" style="display: none;">
        <!-- Summer Header -->
        <div class="summer-attendance-header">
            <div class="header-info">
                <h3>Summer Employee Attendance</h3>
                <div class="summer-meta">
                    <div class="meta-item">
                        <span class="meta-label">Academic Year:</span>
                        <span class="meta-value" id="summerAcademicYear">2024 - 2025</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summer Attendance Table -->
        <div class="summer-attendance-section">
            <div class="simple-table-container">
                <table class="summer-attendance-table">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Name</th>
                            <th rowspan="2">Employee ID</th>
                            <th rowspan="2">Position</th>
                            <th colspan="3" class="month-header">မတ် (March)</th>
                            <th colspan="3" class="month-header">ဧပြီ (April)</th>
                            <th colspan="3" class="month-header">မေ (May)</th>
                        </tr>
                        <tr>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                        </tr>
                    </thead>
                    <tbody id="summerAttendanceBody">
                        <tr>
                            <td>1</td>
                            <td><strong>Daw Hnin Hnin</strong></td>
                            <td>ST001</td>
                            <td>HR</td>
                            <td>44</td>
                            <td>44</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>U Aung Myint</strong></td>
                            <td>ST002</td>
                            <td>Finance</td>
                            <td>44</td>
                            <td>42</td>
                            <td><span class="percentage-badge medium">95%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Ms. Sarah Chen</strong></td>
                            <td>ST003</td>
                            <td>Admin</td>
                            <td>44</td>
                            <td>44</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>Daw Thuzar</strong></td>
                            <td>ST005</td>
                            <td>Finance</td>
                            <td>44</td>
                            <td>41</td>
                            <td><span class="percentage-badge medium">93%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Annual Attendance View -->
    <div id="annual-attendance-view" class="attendance-view-content" style="display: none;">
        <!-- Annual Header -->
        <div class="annual-attendance-header">
            <div class="header-info">
                <h3>Employee Attendance by Education Year</h3>
                <div class="annual-meta">
                    <div class="meta-item">
                        <span class="meta-label">Academic Year:</span>
                        <span class="meta-value" id="annualAcademicYear">2024 - 2025</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annual Attendance Table -->
        <div class="annual-attendance-section">
            <div class="simple-table-container" style="overflow-x: auto;">
                <table class="annual-attendance-table">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Name</th>
                            <th rowspan="2">Employee ID</th>
                            <th rowspan="2">Position</th>
                            <th colspan="3" class="month-header">ဇွန် (June)</th>
                            <th colspan="3" class="month-header">ဇူလိုင် (July)</th>
                            <th colspan="3" class="month-header">ဩဂုတ် (August)</th>
                            <th colspan="3" class="month-header">စက်တင်ဘာ (September)</th>
                            <th colspan="3" class="month-header">အောက်တိုဘာ (October)</th>
                            <th colspan="3" class="month-header">နိုဝင်ဘာ (November)</th>
                            <th colspan="3" class="month-header">ဒီဇင်ဘာ (December)</th>
                            <th colspan="3" class="month-header">ဇန်နဝါရီ (January)</th>
                            <th colspan="3" class="month-header">ဖေဖော်ဝါရီ (February)</th>
                        </tr>
                        <tr>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                            <th>ရှိ</th>
                            <th>တက်</th>
                            <th>ရာခိုင်နှုန်း</th>
                        </tr>
                    </thead>
                    <tbody id="annualAttendanceBody">
                        <tr>
                            <td>1</td>
                            <td><strong>Daw Hnin Hnin</strong></td>
                            <td>ST001</td>
                            <td>HR</td>
                            <td>44</td>
                            <td>44</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>U Aung Myint</strong></td>
                            <td>ST002</td>
                            <td>Finance</td>
                            <td>44</td>
                            <td>42</td>
                            <td><span class="percentage-badge medium">95%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Ms. Sarah Chen</strong></td>
                            <td>ST003</td>
                            <td>Admin</td>
                            <td>44</td>
                            <td>44</td>
                            <td><span class="percentage-badge high">100%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>Daw Thuzar</strong></td>
                            <td>ST005</td>
                            <td>Finance</td>
                            <td>44</td>
                            <td>41</td>
                            <td><span class="percentage-badge medium">93%</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Attendance Collector Modal -->
<div id="attendanceCollectorModal" class="receipt-dialog-overlay" style="display: none;">
    <div class="receipt-dialog-content" style="max-width: 1200px; width: 95%; max-height: 90vh;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-user-check"></i> Collect Staff Attendance</h3>
            <button class="receipt-close" onclick="closeCollectorForm()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #374151;">Search Staff:</label>
                <div style="position: relative; max-width: 400px;">
                    <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6b7280; pointer-events: none;"></i>
                    <input type="text" id="collectorSearchInput" class="filter-select" placeholder="Search by name, ID, or department..." oninput="filterCollectorStaff(this.value)" style="width: 100%; height: 36px; padding: 8px 12px 8px 40px; margin: 0; border: 1px solid #e5e7eb; border-radius: 6px;">
                </div>
            </div>
            <div class="simple-table-container" style="max-height: 60vh; overflow-y: auto;">
                <table class="basic-table" id="collectorAttendanceTable">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Total Hours</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="collectorStaffAttendanceBody">
                        <!-- Staff will be dynamically loaded -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeCollectorForm()" style="height: 36px; padding: 8px 16px;">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveIndividualAttendance()" style="height: 36px; padding: 8px 16px;">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<script>
// Staff data
const staffMembers = [
    { id: 'ST001', name: 'Daw Hnin Hnin', department: 'HR', email: 'hninhnin@school.edu' },
    { id: 'ST002', name: 'U Aung Myint', department: 'Finance', email: 'aungmyint@school.edu' },
    { id: 'ST003', name: 'Ms. Sarah Chen', department: 'Admin', email: 'sarah.chen@school.edu' },
    { id: 'ST004', name: 'Mr. David Lee', department: 'HR', email: 'david.lee@school.edu' },
    { id: 'ST005', name: 'Daw Thuzar', department: 'Finance', email: 'thuzar@school.edu' },
    { id: 'ST006', name: 'Mr. Michael Brown', department: 'Admin', email: 'michael.brown@school.edu' },
    { id: 'ST007', name: 'Ms. Lisa Wong', department: 'HR', email: 'lisa.wong@school.edu' },
    { id: 'ST008', name: 'Dr. Emily Parker', department: 'Finance', email: 'emily.parker@school.edu' },
    { id: 'ST009', name: 'Daw Khin Khin', department: 'Admin', email: 'khinkhin@school.edu' },
    { id: 'ST010', name: 'Ms. Sarah Johnson', department: 'HR', email: 'sarah.johnson@school.edu' },
    { id: 'ST011', name: 'Mr. Robert Kim', department: 'Finance', email: 'robert.kim@school.edu' },
    { id: 'ST012', name: 'Daw Mya Mya', department: 'Admin', email: 'myamya@school.edu' }
];

// Attendance data storage
let attendanceData = {};

// Load attendance data from localStorage
function loadAttendanceData() {
    const today = getTodayDateString();
    const storageKey = `staffAttendance_${today}`;
    const saved = localStorage.getItem(storageKey);
    if (saved) {
        try {
            attendanceData = JSON.parse(saved);
            // Backward compatibility: convert old 'time' field to 'startTime'
            Object.keys(attendanceData).forEach(key => {
                if (attendanceData[key].time && !attendanceData[key].startTime) {
                    attendanceData[key].startTime = attendanceData[key].time;
                    delete attendanceData[key].time;
                }
                // Ensure endTime exists
                if (!attendanceData[key].endTime) {
                    attendanceData[key].endTime = '';
                }
            });
            // Save updated data back
            localStorage.setItem(storageKey, JSON.stringify(attendanceData));
        } catch (e) {
            console.error('Error loading attendance data:', e);
            attendanceData = {};
        }
    } else {
        // Initialize empty attendance for all staffMembers today
        attendanceData = {};
        staffMembers.forEach(staff => {
            const key = `${today}-${staff.id}`;
            attendanceData[key] = {
                status: null,
                startTime: '',
                endTime: '',
                notes: ''
            };
        });
    }
}

// Save attendance data to localStorage
function saveAttendanceDataToStorage() {
    const today = getTodayDateString();
    const storageKey = `staffAttendance_${today}`;
    localStorage.setItem(storageKey, JSON.stringify(attendanceData));
}

// Open collector form modal
function openCollectorForm() {
    const collectorModal = document.getElementById('attendanceCollectorModal');
    // Clear search when opening
    const searchInput = document.getElementById('collectorSearchInput');
    if (searchInput) {
        searchInput.value = '';
    }
    initializeCollectorAttendanceTable();
    if (collectorModal) {
        collectorModal.style.display = 'flex';
        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    }
}

// Close collector form modal
function closeCollectorForm() {
    const collectorModal = document.getElementById('attendanceCollectorModal');
    if (collectorModal) {
        collectorModal.style.display = 'none';
        // Restore body scroll
        document.body.style.overflow = '';
    }
    // Update the main table to reflect any changes
    updateAttendanceTable();
}


// Filter collector staffMembers by search query
function filterCollectorStaff(searchQuery) {
    const tbody = document.getElementById('collectorStaffAttendanceBody');
    const rows = tbody.querySelectorAll('tr');
    const query = searchQuery.toLowerCase().trim();
    
    rows.forEach(row => {
        const staffId = row.id.replace('collector-staff-row-', '');
        const staff = staffMembers.find(t => t.id === staffId);
        
        if (!staff) return;
        
        const matches = !query || 
            staff.id.toLowerCase().includes(query) ||
            staff.name.toLowerCase().includes(query) ||
            staff.department.toLowerCase().includes(query);
        
        row.style.display = matches ? '' : 'none';
    });
}

// Initialize collector attendance table
function initializeCollectorAttendanceTable() {
    const dateString = getTodayDateString();
    const tbody = document.getElementById('collectorStaffAttendanceBody');
    
    tbody.innerHTML = '';
    
    staffMembers.forEach((staff) => {
        const key = `${dateString}-${staff.id}`;
        
        // Get existing record or initialize empty
        const record = attendanceData[key] || {
            status: null,
            startTime: '',
            endTime: '',
            notes: ''
        };
        
        // Calculate total hours if both times are present
        const totalHours = calculateTotalHours(record.startTime, record.endTime);
        
        const row = document.createElement('tr');
        row.id = `collector-staff-row-${staff.id}`;
        row.innerHTML = `
            <td><strong>${staff.id}</strong></td>
            <td>${staff.name}</td>
            <td>${staff.department}</td>
            <td>
                ${getStatusBadge(record.status)}
            </td>
            <td>
                <input type="time" 
                       class="time-input start-time-input" 
                       value="${record.startTime || ''}" 
                       onchange="updateAttendanceStartTime('${staff.id}', this.value)"
                       onclick="event.stopPropagation()"
                       placeholder="Start Time"
                       style="width: 100px; padding: 6px 8px; border: 1px solid #e5e7eb; border-radius: 4px;">
            </td>
            <td>
                <input type="time" 
                       class="time-input end-time-input" 
                       value="${record.endTime || ''}" 
                       onchange="updateAttendanceEndTime('${staff.id}', this.value)"
                       onclick="event.stopPropagation()"
                       placeholder="End Time"
                       style="width: 100px; padding: 6px 8px; border: 1px solid #e5e7eb; border-radius: 4px;">
            </td>
            <td>
                <span class="total-hours-display" id="total-hours-${staff.id}" style="font-weight: 600; color: #059669;">
                    ${totalHours}
                </span>
            </td>
            <td>
                <input type="text" 
                       class="notes-input" 
                       value="${record.notes || ''}" 
                       onchange="updateAttendanceNotes('${staff.id}', this.value)"
                       onclick="event.stopPropagation()"
                       placeholder="Notes (optional)"
                       style="width: 150px; padding: 6px 8px; border: 1px solid #e5e7eb; border-radius: 4px;">
            </td>
            <td>
                <div class="attendance-toggle">
                    <button type="button" class="toggle-btn ${record.status === 'present' ? 'present' : ''}" 
                            onclick="event.stopPropagation(); markAttendance('${staff.id}', 'present')"
                            title="Mark Present">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="button" class="toggle-btn ${record.status === 'absent' ? 'absent' : ''}" 
                            onclick="event.stopPropagation(); markAttendance('${staff.id}', 'absent')"
                            title="Mark Absent">
                        <i class="fas fa-times"></i>
                    </button>
                    <button type="button" class="toggle-btn ${record.status === 'leave' ? 'leave' : ''}" 
                            onclick="event.stopPropagation(); markAttendance('${staff.id}', 'leave')"
                            title="Mark Leave">
                        <i class="fas fa-calendar-times"></i>
                    </button>
                </div>
            </td>
        `;
        
        tbody.appendChild(row);
    });
}

// Get today's date string for attendance data
function getTodayDateString() {
    const today = new Date();
    return today.toISOString().split('T')[0];
}

// Mark attendance for a staff
function markAttendance(staffId, status) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    
    if (!attendanceData[key]) {
        attendanceData[key] = { status: null, startTime: '', endTime: '', notes: '' };
    }
    
    attendanceData[key].status = status;
    
    // Auto-set start time if marking present and no start time exists
    if (status === 'present' && !attendanceData[key].startTime) {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        attendanceData[key].startTime = `${hours}:${minutes}`;
        // Update the input field
        const row = document.getElementById(`attendance-row-${staffId}`);
        if (row) {
            const startInput = row.querySelector('.start-time-input');
            if (startInput) {
                startInput.value = attendanceData[key].startTime;
            }
        }
    }
    
    // Clear times if absent or leave
    if (status === 'absent' || status === 'leave') {
        attendanceData[key].startTime = '';
        attendanceData[key].endTime = '';
        // Update the input fields
        const row = document.getElementById(`attendance-row-${staffId}`);
        if (row) {
            const startInput = row.querySelector('.start-time-input');
            const endInput = row.querySelector('.end-time-input');
            if (startInput) startInput.value = '';
            if (endInput) endInput.value = '';
            updateTotalHoursDisplay(staffId);
        }
    }
    
    // Update the main table row
    updateAttendanceRow(staffId);
    // Update summary cards
    updateSummaryCardsFromData();
    // Auto-save to localStorage
    saveAttendanceDataToStorage();
    
    // Show notification
    const statusLabels = {
        'present': 'Present',
        'absent': 'Absent',
        'leave': 'Leave'
    };
    showNotification(`Marked as ${statusLabels[status]}`, 'success');
}

// Checkout attendance (set end time)
function checkoutAttendance(staffId) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    
    if (!attendanceData[key] || attendanceData[key].status !== 'present') {
        return;
    }
    
    // Set end time to current time
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    attendanceData[key].endTime = `${hours}:${minutes}`;
    
    // Update the input field
    const row = document.getElementById(`attendance-row-${staffId}`);
    if (row) {
        const endInput = row.querySelector('.end-time-input');
        if (endInput) {
            endInput.value = attendanceData[key].endTime;
        }
        updateTotalHoursDisplay(staffId);
        // Refresh the row to update checkout button visibility
        updateAttendanceRow(staffId);
    }
    
    // Auto-save to localStorage
    saveAttendanceDataToStorage();
    showNotification('Checkout time recorded successfully!', 'success');
}

// Calculate total hours from start and end time
function calculateTotalHours(startTime, endTime) {
    if (!startTime || !endTime) {
        return '-';
    }
    
    const [startHours, startMinutes] = startTime.split(':').map(Number);
    const [endHours, endMinutes] = endTime.split(':').map(Number);
    
    let startTotalMinutes = startHours * 60 + startMinutes;
    let endTotalMinutes = endHours * 60 + endMinutes;
    
    // Handle case where end time is next day (e.g., 23:00 to 01:00)
    if (endTotalMinutes < startTotalMinutes) {
        endTotalMinutes += 24 * 60; // Add 24 hours
    }
    
    const diffMinutes = endTotalMinutes - startTotalMinutes;
    const hours = Math.floor(diffMinutes / 60);
    const minutes = diffMinutes % 60;
    
    if (hours === 0 && minutes === 0) {
        return '-';
    }
    
    return `${hours}:${String(minutes).padStart(2, '0')}`;
}

// Update attendance start time
function updateAttendanceStartTime(staffId, time) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    
    if (!attendanceData[key]) {
        attendanceData[key] = { status: null, startTime: '', endTime: '', notes: '' };
    }
    
    attendanceData[key].startTime = time;
    
    // Auto-set status to present if start time is set
    if (time && !attendanceData[key].status) {
        attendanceData[key].status = 'present';
        updateAttendanceRow(staffId);
    }
    
    // Update total hours display
    updateTotalHoursDisplay(staffId);
    
    // Auto-save to localStorage
    saveAttendanceDataToStorage();
}

// Update attendance end time
function updateAttendanceEndTime(staffId, time) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    
    if (!attendanceData[key]) {
        attendanceData[key] = { status: null, startTime: '', endTime: '', notes: '' };
    }
    
    attendanceData[key].endTime = time;
    
    // Update total hours display
    updateTotalHoursDisplay(staffId);
    
    // Refresh row to update checkout button visibility
    if (time) {
        updateAttendanceRow(staffId);
    }
    
    // Auto-save to localStorage
    saveAttendanceDataToStorage();
}

// Update total hours display
function updateTotalHoursDisplay(staffId) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    const record = attendanceData[key] || { startTime: '', endTime: '' };
    
    const totalHours = calculateTotalHours(record.startTime, record.endTime);
    const displayElement = document.getElementById(`total-hours-${staffId}`);
    if (displayElement) {
        displayElement.textContent = totalHours;
    }
}

// Update attendance notes
function updateAttendanceNotes(staffId, notes) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    
    if (!attendanceData[key]) {
        attendanceData[key] = { status: null, startTime: '', endTime: '', notes: '' };
    }
    
    attendanceData[key].notes = notes;
    // Auto-save to localStorage
    saveAttendanceDataToStorage();
}

// Update attendance row display
function updateAttendanceRow(staffId) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    const record = attendanceData[key] || { status: null, startTime: '', endTime: '', notes: '' };
    const row = document.getElementById(`attendance-row-${staffId}`);
    
    if (!row) return;
    
    // Update status badge
    let statusBadge = '<span class="stat-badge">-</span>';
    if (record.status) {
        if (record.status === 'present') {
            statusBadge = '<span class="stat-badge present">Present</span>';
        } else if (record.status === 'absent') {
            statusBadge = '<span class="stat-badge absent">Absent</span>';
        } else if (record.status === 'leave') {
            statusBadge = '<span class="stat-badge leave">Leave</span>';
        }
    }
    const statusCell = row.querySelector('td:nth-child(4)');
    if (statusCell) {
        statusCell.innerHTML = statusBadge;
    }
    
    // Update time inputs
    const startTimeInput = row.querySelector('.start-time-input');
    const endTimeInput = row.querySelector('.end-time-input');
    if (startTimeInput) {
        startTimeInput.value = record.startTime || '';
    }
    if (endTimeInput) {
        endTimeInput.value = record.endTime || '';
    }
    
    // Update total hours display
    updateTotalHoursDisplay(staffId);
    
    // Update button states
    const presentBtn = row.querySelector('.toggle-btn-main:nth-child(1)');
    const absentBtn = row.querySelector('.toggle-btn-main:nth-child(2)');
    const leaveBtn = row.querySelector('.toggle-btn-main:nth-child(3)');
    
    if (presentBtn) {
        presentBtn.classList.toggle('present', record.status === 'present');
        presentBtn.classList.remove('absent', 'leave');
    }
    if (absentBtn) {
        absentBtn.classList.toggle('absent', record.status === 'absent');
        absentBtn.classList.remove('present', 'leave');
    }
    if (leaveBtn) {
        leaveBtn.classList.toggle('leave', record.status === 'leave');
        leaveBtn.classList.remove('present', 'absent');
    }
    
    // Update checkout button visibility
    const showCheckout = record.status === 'present' && record.startTime && !record.endTime;
    const actionsCell = row.querySelector('td:last-child');
    if (actionsCell) {
        const checkoutBtn = actionsCell.querySelector('.checkout-btn');
        if (showCheckout && !checkoutBtn) {
            // Add checkout button
            const checkoutBtnHtml = `
                <button type="button" class="toggle-btn-main checkout-btn" 
                        onclick="event.stopPropagation(); checkoutAttendance('${staffId}')"
                        title="Checkout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            `;
            const leaveBtn = actionsCell.querySelector('.toggle-btn-main:nth-child(3)');
            if (leaveBtn && leaveBtn.nextSibling) {
                leaveBtn.insertAdjacentHTML('afterend', checkoutBtnHtml);
            } else {
                leaveBtn.insertAdjacentHTML('afterend', checkoutBtnHtml);
            }
        } else if (!showCheckout && checkoutBtn) {
            // Remove checkout button
            checkoutBtn.remove();
        }
    }
}

// Update summary cards from current data
function updateSummaryCardsFromData() {
    const dateString = getTodayDateString();
    let presentCount = 0;
    let absentCount = 0;
    let leaveCount = 0;
    
    staffMembers.forEach(staff => {
        const key = `${dateString}-${staff.id}`;
        const record = attendanceData[key] || { status: null };
        
        if (record.status === 'present') {
            presentCount++;
        } else if (record.status === 'absent') {
            absentCount++;
        } else if (record.status === 'leave') {
            leaveCount++;
        } else {
            absentCount++; // Count null as absent
        }
    });
    
    updateSummaryCards(presentCount, absentCount, leaveCount, staffMembers.length);
}

// Save all attendance
function saveAllAttendance() {
    saveAttendanceDataToStorage();
    showNotification('All attendance records saved successfully!', 'success');
}

// Get status badge HTML
function getStatusBadge(status) {
    if (!status) return '<span class="status-badge">-</span>';
    
    const badges = {
        'present': '<span class="status-badge paid">Present</span>',
        'absent': '<span class="status-badge overdue">Absent</span>',
        'leave': '<span class="status-badge draft">Leave</span>'
    };
    return badges[status] || '<span class="status-badge">-</span>';
}

// Save individual attendance changes
function saveIndividualAttendance() {
    const dateString = getTodayDateString();
    
    // Save to localStorage
    saveAttendanceDataToStorage();
    
    // Update the main attendance table
    updateAttendanceTable();
    
    // Show success notification
    showNotification('Attendance changes saved successfully!', 'success');
    
    // Note: Form stays open so collector can continue marking attendance
}

// Filter staff attendance based on search
function filterStaffAttendance() {
    updateAttendanceTable();
}

// Update the main attendance table with current data
function updateAttendanceTable() {
    const dateString = getTodayDateString();
    const tbody = document.getElementById('attendanceTableBody');
    
    if (!tbody) return;
    
    tbody.innerHTML = '';
    
    // Get search query
    const searchInput = document.getElementById('staffSearchInput');
    const searchQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';
    
    // Calculate counts for all staffMembers (not filtered)
    let presentCount = 0;
    let absentCount = 0;
    let leaveCount = 0;
    
    staffMembers.forEach(staff => {
        const key = `${dateString}-${staff.id}`;
        const record = attendanceData[key] || { status: null, startTime: '', endTime: '', notes: '' };
        
        // Count statuses for all staffMembers
        if (record.status === 'present') {
            presentCount++;
        } else if (record.status === 'absent') {
            absentCount++;
        } else if (record.status === 'leave') {
            leaveCount++;
        } else {
            absentCount++; // Count null as absent
        }
    });
    
    // Filter staffMembers based on search query for display
    const filteredStaff = staffMembers.filter(staff => {
        if (!searchQuery) return true;
        
        const searchLower = searchQuery.toLowerCase();
        return staff.id.toLowerCase().includes(searchLower) ||
               staff.name.toLowerCase().includes(searchLower) ||
               staff.department.toLowerCase().includes(searchLower);
    });
    
    // Display only filtered staffMembers
    filteredStaff.forEach(staff => {
        const key = `${dateString}-${staff.id}`;
        const record = attendanceData[key] || { status: null, startTime: '', endTime: '', notes: '' };
        
        // Get status badge
        let statusBadge = '<span class="stat-badge">-</span>';
        
        if (record.status) {
            if (record.status === 'present') {
                statusBadge = '<span class="stat-badge present">Present</span>';
            } else if (record.status === 'absent') {
                statusBadge = '<span class="stat-badge absent">Absent</span>';
            } else if (record.status === 'leave') {
                statusBadge = '<span class="stat-badge leave">Leave</span>';
            }
        }
        
        // Calculate total hours
        const totalHours = calculateTotalHours(record.startTime, record.endTime);
        
        // Show checkout button if present and has start time but no end time
        const showCheckout = record.status === 'present' && record.startTime && !record.endTime;
        
        const row = document.createElement('tr');
        row.id = `attendance-row-${staff.id}`;
        row.innerHTML = `
            <td><strong>${staff.id}</strong></td>
            <td>${staff.name}</td>
            <td>${staff.department}</td>
            <td>${statusBadge}</td>
            <td>
                <input type="time" 
                       class="time-input start-time-input" 
                       value="${record.startTime || ''}" 
                       onchange="updateAttendanceStartTime('${staff.id}', this.value)"
                       onclick="event.stopPropagation()"
                       placeholder="Start Time"
                       style="width: 120px; padding: 6px 8px; border: 1px solid #e5e7eb; border-radius: 4px; font-size: 13px;">
            </td>
            <td>
                <input type="time" 
                       class="time-input end-time-input" 
                       value="${record.endTime || ''}" 
                       onchange="updateAttendanceEndTime('${staff.id}', this.value)"
                       onclick="event.stopPropagation()"
                       placeholder="End Time"
                       style="width: 120px; padding: 6px 8px; border: 1px solid #e5e7eb; border-radius: 4px; font-size: 13px;">
            </td>
            <td>
                <span class="total-hours-display" id="total-hours-${staff.id}" style="font-weight: 600; color: #059669;">
                    ${totalHours}
                </span>
            </td>
            <td>
                <div class="attendance-actions-main">
                    <button type="button" class="toggle-btn-main ${record.status === 'present' ? 'present' : ''}" 
                            onclick="event.stopPropagation(); markAttendance('${staff.id}', 'present')"
                            title="Mark Present">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="button" class="toggle-btn-main ${record.status === 'absent' ? 'absent' : ''}" 
                            onclick="event.stopPropagation(); markAttendance('${staff.id}', 'absent')"
                            title="Mark Absent">
                        <i class="fas fa-times"></i>
                    </button>
                    <button type="button" class="toggle-btn-main ${record.status === 'leave' ? 'leave' : ''}" 
                            onclick="event.stopPropagation(); markAttendance('${staff.id}', 'leave')"
                            title="Mark Leave">
                        <i class="fas fa-calendar-times"></i>
                    </button>
                    ${showCheckout ? `
                    <button type="button" class="toggle-btn-main checkout-btn" 
                            onclick="event.stopPropagation(); checkoutAttendance('${staff.id}')"
                            title="Checkout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                    ` : ''}
                    <button type="button" class="action-icon view" title="View Details" onclick="window.location.href='/admin/attendance/staff-detail?staff=${staff.id}'" style="margin-left: 8px;">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </td>
        `;
        
        tbody.appendChild(row);
    });
    
    // Update summary cards
    updateSummaryCards(presentCount, absentCount, leaveCount, staffMembers.length);
}

// Update collector staff row display (kept for backward compatibility if modal is still used)
function updateCollectorStaffRow(staffId) {
    const dateString = getTodayDateString();
    const key = `${dateString}-${staffId}`;
    const record = attendanceData[key] || { status: null, startTime: '', endTime: '', notes: '' };
    const row = document.getElementById(`collector-staff-row-${staffId}`);
    
    if (!row) return;
    
    // Update status badge
    const statusCell = row.querySelector('td:nth-child(4)');
    if (statusCell) {
        statusCell.innerHTML = getStatusBadge(record.status);
    }
    
    // Update time inputs
    const startTimeInput = row.querySelector('.start-time-input');
    const endTimeInput = row.querySelector('.end-time-input');
    if (startTimeInput) {
        startTimeInput.value = record.startTime || '';
    }
    if (endTimeInput) {
        endTimeInput.value = record.endTime || '';
    }
    
    // Update total hours display
    updateTotalHoursDisplay(staffId);
    
    // Update button states
    const presentBtn = row.querySelector('.toggle-btn:nth-child(1)');
    const absentBtn = row.querySelector('.toggle-btn:nth-child(2)');
    const leaveBtn = row.querySelector('.toggle-btn:nth-child(3)');
    
    if (presentBtn) {
        presentBtn.classList.toggle('present', record.status === 'present');
        presentBtn.classList.remove('absent', 'leave');
    }
    if (absentBtn) {
        absentBtn.classList.toggle('absent', record.status === 'absent');
        absentBtn.classList.remove('present', 'leave');
    }
    if (leaveBtn) {
        leaveBtn.classList.toggle('leave', record.status === 'leave');
        leaveBtn.classList.remove('present', 'absent');
    }
}

// Update summary cards
function updateSummaryCards(present, absent, leave, total) {
    const presentEl = document.getElementById('presentCount');
    const absentEl = document.getElementById('absentCount');
    const leaveEl = document.getElementById('leaveCount');
    const totalEl = document.getElementById('totalCount');
    
    if (presentEl) presentEl.textContent = present;
    if (absentEl) absentEl.textContent = absent;
    if (leaveEl) leaveEl.textContent = leave;
    if (totalEl) totalEl.textContent = total;
}

// Show notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

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
        return `Staff Attendance History - ${dateString}`;
    } else if (d < today) {
        return `Staff Attendance History - ${dateString}`;
    } else {
        return `Future Staff Attendance - ${dateString}`;
    }
}

function filterAttendanceByDate(dateString) {
    if (!dateString) return;
    currentAttendanceDate = new Date(dateString);
    const titleElement = document.getElementById('attendanceDateTitle');
    if (titleElement) {
        titleElement.textContent = formatAttendanceDate(dateString);
    }
    console.log('Loading attendance history for date:', dateString);
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

// View Switching
function switchAttendanceView(view) {
    // Hide all views
    document.querySelectorAll('.attendance-view-content').forEach(content => {
        content.style.display = 'none';
    });
    
    // Remove active class from all tabs
    document.querySelectorAll('.view-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected view
    const selectedView = document.getElementById(view + '-attendance-view');
    if (selectedView) {
        selectedView.style.display = 'block';
    }
    
    // Add active class to selected tab
    const selectedTab = document.querySelector(`.view-tab[data-view="${view}"]`);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Load data if switching to specific views
    if (view === 'monthly') {
        loadMonthlyAttendance();
    } else if (view === 'summer') {
        loadSummerAttendance();
    } else if (view === 'annual') {
        loadAnnualAttendance();
    }
    
    // Store selected view
    localStorage.setItem('selectedAttendanceView', view);
}

// Load monthly attendance data
function loadMonthlyAttendance() {
    const monthSelector = document.getElementById('monthSelector');
    const selectedMonth = monthSelector ? monthSelector.value : '<?php echo date('m'); ?>';
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthName = monthNames[parseInt(selectedMonth) - 1];
    
    // Update total days based on selected month
    const currentYear = new Date().getFullYear();
    const daysInMonth = new Date(currentYear, parseInt(selectedMonth), 0).getDate();
    const totalDaysElement = document.getElementById('totalDays');
    if (totalDaysElement) {
        totalDaysElement.textContent = daysInMonth + ' days';
    }
    
    // In a real implementation, this would fetch data from the server
    console.log('Loading monthly attendance for:', monthName, selectedMonth);
}

// Load summer attendance data
function loadSummerAttendance() {
    console.log('Loading summer attendance data...');
    // TODO: Fetch summer attendance data from API
}

// Load annual attendance data
function loadAnnualAttendance() {
    console.log('Loading annual attendance data...');
    // TODO: Fetch annual attendance data from API
}

document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    currentAttendanceDate = new Date(dateString);
    
    // Initialize view from localStorage or default to daily
    const savedView = localStorage.getItem('selectedAttendanceView') || 'daily';
    switchAttendanceView(savedView);
    
    // Load attendance data from localStorage
    loadAttendanceData();
    
    // Initialize and render the attendance table
    updateAttendanceTable();
    
    // Close modal when clicking on overlay
    const collectorModal = document.getElementById('attendanceCollectorModal');
    if (collectorModal) {
        collectorModal.addEventListener('click', function(e) {
            if (e.target === collectorModal) {
                closeCollectorForm();
            }
        });
    }
    
    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const collectorModal = document.getElementById('attendanceCollectorModal');
            if (collectorModal && collectorModal.style.display === 'flex') {
                closeCollectorForm();
            }
        }
    });
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
    min-width: 60px;
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

.action-btn.view-btn-icon {
    background: #4A90E2;
    color: #fff;
    padding: 8px 12px;
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.action-btn.view-btn-icon:hover {
    background: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
}

.action-btn i {
    font-size: 12px;
}

/* Action Icon Styles - Matching Academic Management */
.action-icon {
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.8rem;
}

.action-icon.view {
    background: #E3F2FD;
    color: #1976D2;
}

.action-icon.view:hover {
    background: #BBDEFB;
}

.action-icon.delete {
    background: #FFEBEE;
    color: #F44336;
}

.action-icon.delete:hover {
    background: #FFCDD2;
}

.status-badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.status-badge.paid {
    background: #ecfdf5;
    color: #10b981;
}

.status-badge.overdue {
    background: #fef2f2;
    color: #ef4444;
}

.status-badge.draft {
    background: #eff6ff;
    color: #3b82f6;
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
    color: #666;
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
    border-color: #1976d2;
    background: #e3f2fd;
    color: #1976d2;
}

.toggle-btn:hover {
    transform: scale(1.1);
}

/* Main table action buttons */
.attendance-actions-main {
    display: flex;
    gap: 6px;
    align-items: center;
    flex-wrap: wrap;
}

.toggle-btn-main {
    width: 36px;
    height: 36px;
    border: 2px solid #e0e0e0;
    border-radius: 50%;
    background: #fff;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    font-size: 14px;
    color: #666;
    padding: 0;
}

.toggle-btn-main.present {
    border-color: #2e7d32;
    background: #e8f5e8;
    color: #2e7d32;
}

.toggle-btn-main.absent {
    border-color: #d32f2f;
    background: #ffebee;
    color: #d32f2f;
}

.toggle-btn-main.leave {
    border-color: #1976d2;
    background: #e3f2fd;
    color: #1976d2;
}

.toggle-btn-main.checkout-btn {
    border-color: #f59e0b;
    background: #fffbeb;
    color: #f59e0b;
}

.toggle-btn-main.checkout-btn:hover {
    border-color: #d97706;
    background: #fef3c7;
    color: #d97706;
    transform: scale(1.1);
}

.toggle-btn-main:hover {
    transform: scale(1.1);
}

.time-input, .notes-input {
    font-size: 12px;
    transition: border-color 0.2s ease;
}

.time-input:focus, .notes-input:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 16px 24px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 10001;
    opacity: 0;
    transform: translateX(400px);
    transition: all 0.3s ease;
}

.notification.show {
    opacity: 1;
    transform: translateX(0);
}

.notification-success {
    border-left: 4px solid #10b981;
}

.notification-error {
    border-left: 4px solid #ef4444;
}

/* Attendance View Tabs */
.attendance-view-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
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
}

/* Monthly Attendance Styles */
.monthly-attendance-header {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 24px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 24px;
}

.monthly-attendance-header h3 {
    margin: 0 0 16px 0;
    font-size: 24px;
    font-weight: 700;
    color: #111827;
}

.monthly-meta {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.meta-label {
    font-size: 14px;
    color: #6b7280;
    font-weight: 500;
}

.meta-value {
    font-size: 14px;
    color: #111827;
    font-weight: 600;
}

.month-select {
    min-width: 150px;
}

.monthly-attendance-section {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    overflow-x: auto;
}

.monthly-attendance-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    min-width: 1000px;
}

.monthly-attendance-table thead {
    background: #f9fafb;
    position: sticky;
    top: 0;
    z-index: 10;
}

.monthly-attendance-table th {
    padding: 12px 16px;
    text-align: center;
    font-weight: 600;
    color: #374151;
    border: 1px solid #e5e7eb;
    white-space: nowrap;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.monthly-attendance-table td {
    padding: 12px 16px;
    border: 1px solid #e5e7eb;
    color: #374151;
    text-align: center;
}

.monthly-attendance-table tbody tr:hover {
    background: #f9fafb;
}

.monthly-attendance-table tbody tr:last-child td {
    border-bottom: 1px solid #e5e7eb;
}

.monthly-attendance-table td:first-child,
.monthly-attendance-table td:nth-child(2),
.monthly-attendance-table td:nth-child(3),
.monthly-attendance-table td:nth-child(4) {
    text-align: left;
    font-weight: 500;
}

/* Summer Attendance Styles */
.summer-attendance-header,
.annual-attendance-header {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 24px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 24px;
}

.summer-attendance-header h3,
.annual-attendance-header h3 {
    margin: 0 0 16px 0;
    font-size: 24px;
    font-weight: 700;
    color: #111827;
}

.summer-meta,
.annual-meta {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
}

.summer-attendance-section,
.annual-attendance-section {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    overflow-x: auto;
}

.summer-attendance-table,
.annual-attendance-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    min-width: 800px;
}

.annual-attendance-table {
    min-width: 2000px;
}

.summer-attendance-table thead,
.annual-attendance-table thead {
    background: #f9fafb;
    position: sticky;
    top: 0;
    z-index: 10;
}

.summer-attendance-table th,
.annual-attendance-table th {
    padding: 12px 16px;
    text-align: center;
    font-weight: 600;
    color: #374151;
    border: 1px solid #e5e7eb;
    white-space: nowrap;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.summer-attendance-table th.month-header,
.annual-attendance-table th.month-header {
    background: #e0e7ff;
    color: #3730a3;
    font-weight: 700;
}

.summer-attendance-table td,
.annual-attendance-table td {
    padding: 12px 16px;
    border: 1px solid #e5e7eb;
    color: #374151;
    text-align: center;
}

.summer-attendance-table tbody tr:hover,
.annual-attendance-table tbody tr:hover {
    background: #f9fafb;
}

.summer-attendance-table tbody tr:last-child td,
.annual-attendance-table tbody tr:last-child td {
    border-bottom: 1px solid #e5e7eb;
}

.summer-attendance-table td:first-child,
.summer-attendance-table td:nth-child(2),
.summer-attendance-table td:nth-child(3),
.summer-attendance-table td:nth-child(4),
.annual-attendance-table td:first-child,
.annual-attendance-table td:nth-child(2),
.annual-attendance-table td:nth-child(3),
.annual-attendance-table td:nth-child(4) {
    text-align: left;
    font-weight: 500;
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
    
    .staff-attendance-header {
        flex-direction: column;
    }
    
    .quick-stats {
        width: 100%;
        justify-content: space-around;
    }
    
    .timeline-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .monthly-attendance-header {
        flex-direction: column;
    }
    
    .monthly-meta {
        flex-direction: column;
        gap: 12px;
    }
    
    .monthly-attendance-table {
        font-size: 12px;
    }
    
    .monthly-attendance-table th,
    .monthly-attendance-table td {
        padding: 8px 12px;
    }
    
    .summer-attendance-header,
    .annual-attendance-header {
        flex-direction: column;
    }
    
    .summer-meta,
    .annual-meta {
        flex-direction: column;
        gap: 12px;
    }
    
    .summer-attendance-table,
    .annual-attendance-table {
        font-size: 11px;
        min-width: 600px;
    }
    
    .annual-attendance-table {
        min-width: 1500px;
    }
    
    .summer-attendance-table th,
    .summer-attendance-table td,
    .annual-attendance-table th,
    .annual-attendance-table td {
        padding: 6px 8px;
    }
}

/* Attendance Collector Modal Styles */
#attendanceCollectorModal .receipt-dialog-content {
    display: flex;
    flex-direction: column;
}

#attendanceCollectorModal .receipt-dialog-body {
    flex: 1;
    overflow-y: auto;
    min-height: 0;
}

#attendanceCollectorModal .simple-table-container {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
}

#attendanceCollectorModal .basic-table {
    margin: 0;
}

#attendanceCollectorModal .basic-table thead {
    position: sticky;
    top: 0;
    background: #f9fafb;
    z-index: 5;
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
