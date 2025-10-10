<?php
$pageTitle = 'Smart Campus Nova Hub - Academic Management';
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Academic Management';
$activePage = 'academic';


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


<!-- Academic Structure Management Tabs -->
<div class="academic-structure-section">
    
    <div class="academic-tabs">
        <button class="academic-tab active" data-tab="batches">Batches</button>
        <button class="academic-tab" data-tab="grades">Grades</button>
        <button class="academic-tab" data-tab="classes">Classes</button>
        <button class="academic-tab" data-tab="rooms">Rooms</button>
        <button class="academic-tab" data-tab="subjects">Subjects</button>
        <button class="academic-tab" data-tab="departments">Departments</button>
    </div>
</div>

<!-- Tab Content Container -->
<div class="tab-content-container">
    <!-- Batches Tab Content -->
    <div class="tab-content active" id="batches-content">
        <div class="batch-management-section">
            <div class="section-header">
                <h3 class="section-title">Batch Management</h3>
                <button class="simple-btn" id="toggleBatchForm"><i class="fas fa-plus"></i> Add Batch</button>
            </div>

            <!-- Inline Create Batch Form (hidden by default) -->
            <div id="batchForm" class="simple-section" style="display:none; margin-top:12px;">
                <div class="simple-header">
                    <h4><i class="fas fa-folder-plus"></i> Create Batch</h4>
                </div>
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group" style="flex:2;">
                            <label for="batchName">Batch Name</label>
                            <input type="text" id="batchName" class="form-input" placeholder="e.g., 2025-2026">
                        </div>
                        <div class="form-group">
                            <label for="batchStart">Start Date</label>
                            <input type="date" id="batchStart" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="batchEnd">End Date</label>
                            <input type="date" id="batchEnd" class="form-input">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="batchStatus">Status</label>
                            <select id="batchStatus" class="form-select">
                                <option value="Active">Active</option>
                                <option value="Upcoming">Upcoming</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button id="cancelBatch" class="simple-btn secondary">Cancel</button>
                        <button id="saveBatch" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
            
            <div class="batch-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Batch Name</th>
                            <th>Status</th>
                            <th>Students</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/batch-detail/2024-2025" class="batch-link" onclick="event.stopPropagation()">2024-2025</a>
                            </td>
                            <td>
                                <span class="status-badge active">Active</span>
                            </td>
                            <td class="student-count">450</td>
                            <td class="date-cell">2024-04-01</td>
                            <td class="date-cell">2025-03-31</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expand-content">
                                    <h4>Grades in 2024-2025 Batch</h4>
                                    <div class="grade-cards">
                                        <div class="grade-card">
                                            <div class="grade-header">
                                                <a href="/admin/academic/grade-detail/1" class="grade-link">Grade 1</a>
                                                <span class="category-badge primary">Primary</span>
                                            </div>
                                            <div class="grade-stats">
                                                <span>8 subjects</span>
                                                <span>4 classes</span>
                                                <span>120 students</span>
                                            </div>
                                        </div>
                                        <div class="grade-card">
                                            <div class="grade-header">
                                                <a href="/admin/academic/grade-detail/2" class="grade-link">Grade 2</a>
                                                <span class="category-badge primary">Primary</span>
                                            </div>
                                            <div class="grade-stats">
                                                <span>8 subjects</span>
                                                <span>4 classes</span>
                                                <span>115 students</span>
                                            </div>
                                        </div>
                                        <div class="grade-card">
                                            <div class="grade-header">
                                                <a href="/admin/academic/grade-detail/6" class="grade-link">Grade 6</a>
                                                <span class="category-badge secondary">Middle</span>
                                            </div>
                                            <div class="grade-stats">
                                                <span>12 subjects</span>
                                                <span>3 classes</span>
                                                <span>90 students</span>
                                            </div>
                                        </div>
                                        <div class="grade-card">
                                            <div class="grade-header">
                                                <a href="/admin/academic/grade-detail/10" class="grade-link">Grade 10</a>
                                                <span class="category-badge upcoming">High</span>
                                            </div>
                                            <div class="grade-stats">
                                                <span>15 subjects</span>
                                                <span>2 classes</span>
                                                <span>125 students</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="expandable-row">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/batches/2023-2024" class="batch-link">2023-2024</a>
                            </td>
                            <td>
                                <span class="status-badge completed">Completed</span>
                            </td>
                            <td class="student-count">420</td>
                            <td class="date-cell">2023-04-01</td>
                            <td class="date-cell">2024-03-31</td>
                            <td class="actions-cell">
                                <button class="action-icon view" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <tr class="expandable-row">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/batches/2025-2026" class="batch-link">2025-2026</a>
                            </td>
                            <td>
                                <span class="status-badge upcoming">Upcoming</span>
                            </td>
                            <td class="student-count">0</td>
                            <td class="date-cell">2025-04-01</td>
                            <td class="date-cell">2026-03-31</td>
                            <td class="actions-cell">
                                <button class="action-icon view" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Grades Tab Content -->
    <div class="tab-content" id="grades-content">
        <div class="detail-management-section">
            <div class="section-header">
                <h3 class="section-title">Grade Management</h3>
                <button class="simple-btn" id="toggleGradeForm"><i class="fas fa-plus"></i> Add Grade</button>
            </div>

            <!-- Inline Create Grade Form -->
            <div id="gradeForm" class="simple-section" style="display:none; margin-top:12px;">
                <div class="simple-header">
                    <h4><i class="fas fa-layer-group"></i> Create Grade</h4>
                </div>
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="gradeLevel">Grade Level</label>
                            <input type="number" id="gradeLevel" class="form-input" placeholder="e.g., 10">
                        </div>
                        <div class="form-group" style="flex:2;">
                            <label for="gradeName">Grade Name</label>
                            <input type="text" id="gradeName" class="form-input" placeholder="e.g., Grade 10">
                        </div>
                        <div class="form-group">
                            <label for="gradeCategory">Category</label>
                            <select id="gradeCategory" class="form-select">
                                <option value="Primary">Primary</option>
                                <option value="Middle">Middle</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button id="cancelGrade" class="simple-btn secondary">Cancel</button>
                        <button id="saveGrade" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Grade Level</th>
                            <th>Grade Name</th>
                            <th>Category</th>
                            <th>Classes</th>
                            <th>Students</th>
                            <th>Age Range</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="grade-level">
                                <a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 1</strong></a>
                            </td>
                            <td>First Grade</td>
                            <td><span class="category-badge primary">Primary</span></td>
                            <td class="class-count">3</td>
                            <td class="student-count">90</td>
                            <td class="age-range">6-7 years</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Grade">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Grade">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Classes in Grade 1</h4>
                                    <div class="class-cards">
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/1A" class="class-link">Class 1A</a>
                                                <span class="room-info">Room 101</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Ms. Sarah Johnson</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/1B" class="class-link">Class 1B</a>
                                                <span class="room-info">Room 102</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Mr. David Chen</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/1C" class="class-link">Class 1C</a>
                                                <span class="room-info">Room 103</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Ms. Emily Rodriguez</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="grade-level">
                                <a href="/admin/academic/grade-detail/2" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 2</strong></a>
                            </td>
                            <td>Second Grade</td>
                            <td><span class="category-badge primary">Primary</span></td>
                            <td class="class-count">3</td>
                            <td class="student-count">85</td>
                            <td class="age-range">7-8 years</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Grade">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Grade">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Classes in Grade 2</h4>
                                    <div class="class-cards">
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/2A" class="class-link">Class 2A</a>
                                                <span class="room-info">Room 201</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>28 students</span>
                                                <span>Dr. James Wilson</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/2B" class="class-link">Class 2B</a>
                                                <span class="room-info">Room 202</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>27 students</span>
                                                <span>Ms. Jennifer Lee</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Classes Tab Content -->
    <div class="tab-content" id="classes-content">
        <div class="detail-management-section">
            <div class="section-header">
                <h3 class="section-title">Class Management</h3>
                <button class="simple-btn" id="toggleClassForm"><i class="fas fa-plus"></i> Add Class</button>
            </div>

            <!-- Inline Create Class Form -->
            <div id="classForm" class="simple-section" style="display:none; margin-top:12px;">
                <div class="simple-header">
                    <h4><i class="fas fa-door-open"></i> Create Class</h4>
                </div>
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="className">Class Name</label>
                            <input type="text" id="className" class="form-input" placeholder="e.g., 10-A">
                        </div>
                        <div class="form-group">
                            <label for="classGrade">Grade</label>
                            <input type="text" id="classGrade" class="form-input" placeholder="e.g., Grade 10">
                        </div>
                        <div class="form-group">
                            <label for="classRoom">Room</label>
                            <input type="text" id="classRoom" class="form-input" placeholder="e.g., Room 201">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:2;">
                            <label for="classTeacher">Class Teacher</label>
                            <input type="text" id="classTeacher" class="form-input" placeholder="e.g., Ms. Smith">
                        </div>
                        <div class="form-group">
                            <label for="classSchedule">Schedule</label>
                            <input type="text" id="classSchedule" class="form-input" placeholder="e.g., 8:00 AM - 2:00 PM">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button id="cancelClass" class="simple-btn secondary">Cancel</button>
                        <button id="saveClass" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Class Name</th>
                            <th>Grade</th>
                            <th>Room</th>
                            <th>Students</th>
                            <th>Class Teacher</th>
                            <th>Schedule</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="class-name">
                                <a href="/admin/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()"><strong>1A</strong></a>
                            </td>
                            <td><a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()">Grade 1</a></td>
                            <td><a href="/admin/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()">Room 101</a></td>
                            <td class="student-count">30</td>
                            <td>Ms. Sarah Johnson</td>
                            <td class="schedule">8:00 AM - 2:00 PM</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Class">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Class">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Subjects in Class 1A</h4>
                                    <div class="subject-cards">
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/MATH" class="subject-link">Mathematics</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>5 hours/week</span>
                                                <span>Mr. John Smith</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/ENG" class="subject-link">English</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>4 hours/week</span>
                                                <span>Ms. Sarah Johnson</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/SCI" class="subject-link">Science</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>3 hours/week</span>
                                                <span>Dr. Wilson</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="class-name">
                                <a href="/admin/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()"><strong>1B</strong></a>
                            </td>
                            <td><a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()">Grade 1</a></td>
                            <td><a href="/admin/academic/room-detail/102" class="room-link" onclick="event.stopPropagation()">Room 102</a></td>
                            <td class="student-count">30</td>
                            <td>Mr. David Chen</td>
                            <td class="schedule">8:00 AM - 2:00 PM</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Class">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Class">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Subjects in Class 1B</h4>
                                    <div class="subject-cards">
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/MATH" class="subject-link">Mathematics</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>5 hours/week</span>
                                                <span>Mr. David Chen</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/ENG" class="subject-link">English</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>4 hours/week</span>
                                                <span>Ms. Jennifer Lee</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Rooms Tab Content -->
    <div class="tab-content" id="rooms-content">
        <div class="detail-management-section">
            <div class="section-header">
                <h3 class="section-title">Room Management</h3>
                <button class="simple-btn" id="toggleRoomForm"><i class="fas fa-plus"></i> Add Room</button>
            </div>

            <!-- Inline Create Room Form -->
            <div id="roomForm" class="simple-section" style="display:none; margin-top:12px;">
                <div class="simple-header">
                    <h4><i class="fas fa-door-closed"></i> Create Room</h4>
                </div>
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="roomNumber">Room Number</label>
                            <input type="text" id="roomNumber" class="form-input" placeholder="e.g., 101">
                        </div>
                        <div class="form-group" style="flex:2;">
                            <label for="roomName">Room Name</label>
                            <input type="text" id="roomName" class="form-input" placeholder="e.g., Classroom A">
                        </div>
                        <div class="form-group">
                            <label for="roomFloor">Floor</label>
                            <input type="text" id="roomFloor" class="form-input" placeholder="e.g., 1st Floor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="roomCap">Capacity</label>
                            <input type="number" id="roomCap" class="form-input" placeholder="e.g., 35">
                        </div>
                        <div class="form-group">
                            <label for="roomStatus">Status</label>
                            <select id="roomStatus" class="form-select">
                                <option value="Occupied">Occupied</option>
                                <option value="Available">Available</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button id="cancelRoom" class="simple-btn secondary">Cancel</button>
                        <button id="saveRoom" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Room Number</th>
                            <th>Room Name</th>
                            <th>Floor</th>
                            <th>Capacity</th>
                            <th>Current Class</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="room-number">
                                <a href="/admin/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()"><strong>101</strong></a>
                            </td>
                            <td>Classroom A</td>
                            <td>1st Floor</td>
                            <td class="capacity">35</td>
                            <td><a href="/admin/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()">Class 1A</a></td>
                            <td><span class="status-badge active">Occupied</span></td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Room">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Room">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Schedule for Room 101</h4>
                                    <div class="schedule-cards">
                                        <div class="schedule-card">
                                            <div class="schedule-header">
                                                <a href="/admin/academic/class-detail/1A" class="class-link">Class 1A</a>
                                                <span class="time-slot">8:00 AM - 2:00 PM</span>
                                            </div>
                                            <div class="schedule-stats">
                                                <span>30 students</span>
                                                <span>Ms. Sarah Johnson</span>
                                                <span>Grade 1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="room-number">
                                <a href="/admin/academic/room-detail/102" class="room-link" onclick="event.stopPropagation()"><strong>102</strong></a>
                            </td>
                            <td>Classroom B</td>
                            <td>1st Floor</td>
                            <td class="capacity">35</td>
                            <td><a href="/admin/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()">Class 1B</a></td>
                            <td><span class="status-badge active">Occupied</span></td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Room">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Room">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Schedule for Room 102</h4>
                                    <div class="schedule-cards">
                                        <div class="schedule-card">
                                            <div class="schedule-header">
                                                <a href="/admin/academic/class-detail/1B" class="class-link">Class 1B</a>
                                                <span class="time-slot">8:00 AM - 2:00 PM</span>
                                            </div>
                                            <div class="schedule-stats">
                                                <span>30 students</span>
                                                <span>Mr. David Chen</span>
                                                <span>Grade 1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Subjects Tab Content -->
    <div class="tab-content" id="subjects-content">
        <div class="detail-management-section">
            <div class="section-header">
                <h3 class="section-title">Subject Management</h3>
                <button class="simple-btn" id="toggleSubjectForm"><i class="fas fa-plus"></i> Add Subject</button>
            </div>

            <!-- Inline Create Subject Form -->
            <div id="subjectForm" class="simple-section" style="display:none; margin-top:12px;">
                <div class="simple-header">
                    <h4><i class="fas fa-book"></i> Create Subject</h4>
                </div>
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="subCode">Subject Code</label>
                            <input type="text" id="subCode" class="form-input" placeholder="e.g., MATH">
                        </div>
                        <div class="form-group" style="flex:2;">
                            <label for="subName">Subject Name</label>
                            <input type="text" id="subName" class="form-input" placeholder="e.g., Mathematics">
                        </div>
                        <div class="form-group">
                            <label for="subCat">Category</label>
                            <select id="subCat" class="form-select">
                                <option value="Core">Core</option>
                                <option value="Elective">Elective</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="subHours">Hours / Week</label>
                            <input type="number" id="subHours" class="form-input" placeholder="e.g., 5">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button id="cancelSubject" class="simple-btn secondary">Cancel</button>
                        <button id="saveSubject" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Category</th>
                            <th>Grades</th>
                            <th>Teachers</th>
                            <th>Hours/Week</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="subject-code">
                                <a href="/admin/academic/subject-detail/MATH" class="subject-link" onclick="event.stopPropagation()"><strong>MATH</strong></a>
                            </td>
                            <td><a href="/admin/academic/subject-detail/MATH" class="subject-link" onclick="event.stopPropagation()">Mathematics</a></td>
                            <td><span class="category-badge core">Core</span></td>
                            <td>1, 2, 9, 10</td>
                            <td class="teacher-count">2</td>
                            <td class="hours">5</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Subject">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Subject">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Classes Teaching Mathematics</h4>
                                    <div class="teaching-cards">
                                        <div class="teaching-card">
                                            <div class="teaching-header">
                                                <a href="/admin/academic/class-detail/1A" class="class-link">Class 1A</a>
                                                <span class="grade-info">Grade 1</span>
                                            </div>
                                            <div class="teaching-stats">
                                                <span>5 hours/week</span>
                                                <span>Mr. John Smith</span>
                                                <span>Room 101</span>
                                            </div>
                                        </div>
                                        <div class="teaching-card">
                                            <div class="teaching-header">
                                                <a href="/admin/academic/class-detail/1B" class="class-link">Class 1B</a>
                                                <span class="grade-info">Grade 1</span>
                                            </div>
                                            <div class="teaching-stats">
                                                <span>5 hours/week</span>
                                                <span>Mr. David Chen</span>
                                                <span>Room 102</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="subject-code">
                                <a href="/admin/academic/subject-detail/ENG" class="subject-link" onclick="event.stopPropagation()"><strong>ENG</strong></a>
                            </td>
                            <td><a href="/admin/academic/subject-detail/ENG" class="subject-link" onclick="event.stopPropagation()">English Language</a></td>
                            <td><span class="category-badge core">Core</span></td>
                            <td>1, 2, 9, 10</td>
                            <td class="teacher-count">2</td>
                            <td class="hours">4</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon edit" title="Edit Subject">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Subject">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="8">
                                <div class="expand-content">
                                    <h4>Classes Teaching English Language</h4>
                                    <div class="teaching-cards">
                                        <div class="teaching-card">
                                            <div class="teaching-header">
                                                <a href="/admin/academic/class-detail/1A" class="class-link">Class 1A</a>
                                                <span class="grade-info">Grade 1</span>
                                            </div>
                                            <div class="teaching-stats">
                                                <span>4 hours/week</span>
                                                <span>Ms. Sarah Johnson</span>
                                                <span>Room 101</span>
                                            </div>
                                        </div>
                                        <div class="teaching-card">
                                            <div class="teaching-header">
                                                <a href="/admin/academic/class-detail/1B" class="class-link">Class 1B</a>
                                                <span class="grade-info">Grade 1</span>
                                            </div>
                                            <div class="teaching-stats">
                                                <span>4 hours/week</span>
                                                <span>Ms. Jennifer Lee</span>
                                                <span>Room 102</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Departments Tab Content -->
    <div class="tab-content" id="departments-content">
        <div class="detail-management-section">
            <div class="section-header">
                <h3 class="section-title">Department Management</h3>
                <button class="simple-btn" id="toggleDepartmentForm"><i class="fas fa-plus"></i> Add Department</button>
            </div>

            <!-- Inline Create Department Form -->
            <div id="departmentForm" class="simple-section" style="display:none; margin-top:12px;">
                <div class="simple-header">
                    <h4><i class="fas fa-building"></i> Create Department</h4>
                </div>
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="deptCode">Department Code</label>
                            <input type="text" id="deptCode" class="form-input" placeholder="e.g., MATH">
                        </div>
                        <div class="form-group" style="flex:2;">
                            <label for="deptName">Department Name</label>
                            <input type="text" id="deptName" class="form-input" placeholder="e.g., Mathematics Department">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:2;">
                            <label for="deptHead">Department Head</label>
                            <input type="text" id="deptHead" class="form-input" placeholder="e.g., Dr. John Smith">
                        </div>
                        <div class="form-group">
                            <label for="deptBuilding">Building/Location</label>
                            <input type="text" id="deptBuilding" class="form-input" placeholder="e.g., Building A">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button id="cancelDepartment" class="simple-btn secondary">Cancel</button>
                        <button id="saveDepartment" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Department Code</th>
                            <th>Department Name</th>
                            <th>Department Head</th>
                            <th>Staff Count</th>
                            <th>Building</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/department-detail/PRIMARY" class="batch-link" onclick="event.stopPropagation()">PRIMARY</a>
                            </td>
                            <td>Primary Teachers</td>
                            <td>Ms. Sarah Johnson</td>
                            <td class="student-count">15</td>
                            <td>Building A</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expanded-section">
                                    <div class="expanded-info">
                                        <div class="info-card">
                                            <div class="info-label">Contact</div>
                                            <div class="info-value">primary@school.edu</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Extension</div>
                                            <div class="info-value">ext. 101</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Office Room</div>
                                            <div class="info-value">A-105</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/department-detail/LANG" class="batch-link" onclick="event.stopPropagation()">LANG</a>
                            </td>
                            <td>Language Teachers</td>
                            <td>Dr. Emily Chen</td>
                            <td class="student-count">8</td>
                            <td>Building B</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expanded-section">
                                    <div class="expanded-info">
                                        <div class="info-card">
                                            <div class="info-label">Contact</div>
                                            <div class="info-value">language@school.edu</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Extension</div>
                                            <div class="info-value">ext. 102</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Office Room</div>
                                            <div class="info-value">B-201</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/department-detail/ICT" class="batch-link" onclick="event.stopPropagation()">ICT</a>
                            </td>
                            <td>ICT Staff</td>
                            <td>Mr. David Kumar</td>
                            <td class="student-count">5</td>
                            <td>Building C</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expanded-section">
                                    <div class="expanded-info">
                                        <div class="info-card">
                                            <div class="info-label">Contact</div>
                                            <div class="info-value">ict@school.edu</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Extension</div>
                                            <div class="info-value">ext. 301</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Office Room</div>
                                            <div class="info-value">C-105</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/department-detail/ADMIN" class="batch-link" onclick="event.stopPropagation()">ADMIN</a>
                            </td>
                            <td>Administrative Staff</td>
                            <td>Ms. Lisa Park</td>
                            <td class="student-count">12</td>
                            <td>Main Building</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expanded-section">
                                    <div class="expanded-info">
                                        <div class="info-card">
                                            <div class="info-label">Contact</div>
                                            <div class="info-value">admin@school.edu</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Extension</div>
                                            <div class="info-value">ext. 100</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Office Room</div>
                                            <div class="info-value">Main-201</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/admin/academic/department-detail/MAINT" class="batch-link" onclick="event.stopPropagation()">MAINT</a>
                            </td>
                            <td>Maintenance & Security</td>
                            <td>Mr. Robert Jones</td>
                            <td class="student-count">10</td>
                            <td>Service Building</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expanded-section">
                                    <div class="expanded-info">
                                        <div class="info-card">
                                            <div class="info-label">Contact</div>
                                            <div class="info-value">maintenance@school.edu</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Extension</div>
                                            <div class="info-value">ext. 500</div>
                                        </div>
                                        <div class="info-card">
                                            <div class="info-label">Office Room</div>
                                            <div class="info-value">Service-01</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Simple Tab Management
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.academic-tab');
    const contents = document.querySelectorAll('.tab-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(targetTab + '-content').classList.add('active');
        });
    });
});

// Expandable Row Functionality
function toggleExpand(row) {
    const expandContent = row.nextElementSibling;
    const expandIcon = row.querySelector('.expand-icon');
    
    if (expandContent && expandContent.classList.contains('expandable-content')) {
        if (expandContent.style.display === 'none' || !expandContent.style.display) {
            expandContent.style.display = 'table-row';
            expandIcon.style.transform = 'rotate(90deg)';
        } else {
            expandContent.style.display = 'none';
            expandIcon.style.transform = 'rotate(0deg)';
        }
    }
}

// Toggle and Save handlers for inline forms
document.addEventListener('DOMContentLoaded', function(){
    function bindToggle(toggleId, formId, cancelId, saveId, onSave){
        const t=document.getElementById(toggleId);
        const f=document.getElementById(formId);
        const c=document.getElementById(cancelId);
        const s=document.getElementById(saveId);
        if(t&&f) t.addEventListener('click', function(e){ e.preventDefault(); f.style.display = (f.style.display==='none')?'block':'none'; });
        if(c&&f) c.addEventListener('click', function(e){ e.preventDefault(); f.style.display='none'; });
        if(s&&onSave) s.addEventListener('click', function(e){ e.preventDefault(); onSave(); f.style.display='none'; alert('Saved (draft). Final fields after onboarding.'); });
    }

    bindToggle('toggleBatchForm','batchForm','cancelBatch','saveBatch', function(){
        const name=(document.getElementById('batchName').value||'').trim(); if(!name){ alert('Enter batch name'); return; }
        const tbody=document.querySelector('#batches-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row';
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="batch-name"><a href="#" class="batch-link" onclick="event.stopPropagation()">${name}</a></td>
            <td><span class="status-badge active">${(document.getElementById('batchStatus').value||'Active')}</span></td>
            <td class="student-count">0</td>
            <td class="date-cell">${document.getElementById('batchStart').value||''}</td>
            <td class="date-cell">${document.getElementById('batchEnd').value||''}</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleGradeForm','gradeForm','cancelGrade','saveGrade', function(){
        const name=(document.getElementById('gradeName').value||'').trim(); if(!name){ alert('Enter grade name'); return; }
        const tbody=document.querySelector('#grades-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row';
        tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="grade-level"><a href="#" class="grade-link" onclick="event.stopPropagation()"><strong>${(document.getElementById('gradeLevel').value||'')}</strong></a></td>
            <td>${name}</td>
            <td><span class="category-badge">${(document.getElementById('gradeCategory').value||'')}</span></td>
            <td class="class-count">0</td>
            <td class="student-count">0</td>
            <td class="age-range">-</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon edit" title="Edit Grade"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete Grade"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleClassForm','classForm','cancelClass','saveClass', function(){
        const name=(document.getElementById('className').value||'').trim(); if(!name){ alert('Enter class name'); return; }
        const tbody=document.querySelector('#classes-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row';
        tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="class-name"><a href="#" class="class-link" onclick="event.stopPropagation()"><strong>${name}</strong></a></td>
            <td>${(document.getElementById('classGrade').value||'')}</td>
            <td>${(document.getElementById('classRoom').value||'')}</td>
            <td class="student-count">0</td>
            <td>${(document.getElementById('classTeacher').value||'')}</td>
            <td class="schedule">${(document.getElementById('classSchedule').value||'')}</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon edit" title="Edit Class"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete Class"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleRoomForm','roomForm','cancelRoom','saveRoom', function(){
        const num=(document.getElementById('roomNumber').value||'').trim(); if(!num){ alert('Enter room number'); return; }
        const tbody=document.querySelector('#rooms-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row'; tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="room-number"><a href="#" class="room-link" onclick="event.stopPropagation()"><strong>${num}</strong></a></td>
            <td>${(document.getElementById('roomName').value||'')}</td>
            <td>${(document.getElementById('roomFloor').value||'')}</td>
            <td class="capacity">${(document.getElementById('roomCap').value||'')}</td>
            <td><a href="#" class="class-link" onclick="event.stopPropagation()"></a></td>
            <td><span class="status-badge">${(document.getElementById('roomStatus').value||'')}</span></td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon edit" title="Edit Room"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete Room"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleSubjectForm','subjectForm','cancelSubject','saveSubject', function(){
        const code=(document.getElementById('subCode').value||'').trim(); if(!code){ alert('Enter subject code'); return; }
        const tbody=document.querySelector('#subjects-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row'; tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="subject-code"><a href="#" class="subject-link" onclick="event.stopPropagation()"><strong>${code}</strong></a></td>
            <td><a href="#" class="subject-link" onclick="event.stopPropagation()">${(document.getElementById('subName').value||'')}</a></td>
            <td><span class="category-badge">${(document.getElementById('subCat').value||'')}</span></td>
            <td> </td>
            <td class="teacher-count">0</td>
            <td class="hours">${(document.getElementById('subHours').value||'')}</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon edit" title="Edit Subject"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete Subject"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleDepartmentForm','departmentForm','cancelDepartment','saveDepartment', function(){
        const code=(document.getElementById('deptCode').value||'').trim(); if(!code){ alert('Enter department code'); return; }
        const tbody=document.querySelector('#departments-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row'; tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="batch-name"><a href="/admin/academic/department-detail/${code}" class="batch-link" onclick="event.stopPropagation()">${code}</a></td>
            <td>${(document.getElementById('deptName').value||'')}</td>
            <td>${(document.getElementById('deptHead').value||'')}</td>
            <td class="student-count">0</td>
            <td>${(document.getElementById('deptBuilding').value||'')}</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                <button class="action-icon edit" title="Edit"><i class="fas fa-edit"></i></button>
                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>