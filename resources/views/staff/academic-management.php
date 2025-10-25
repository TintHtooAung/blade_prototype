<?php
$pageTitle = 'Smart Campus Nova Hub - Academic Management';
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Academic Management';
$activePage = 'academic-management';

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
        <button class="academic-tab active" data-tab="departments">Departments</button>
        <button class="academic-tab" data-tab="rooms">Rooms</button>
        <button class="academic-tab" data-tab="batches">Batches</button>
        <button class="academic-tab" data-tab="grades">Grades</button>
        <button class="academic-tab" data-tab="classes">Classes</button>
        <button class="academic-tab" data-tab="subjects">Subjects</button>
    </div>
</div>

<!-- Tab Content Container -->
<div class="tab-content-container">
    <!-- Batches Tab Content -->
    <div class="tab-content" id="batches-content">
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
                                <a href="/staff/academic/batch-detail/2024-2025" class="batch-link" onclick="event.stopPropagation()">2024-2025</a>
                            </td>
                            <td>
                                <span class="status-badge active">Active</span>
                            </td>
                            <td class="student-count">450</td>
                            <td class="date-cell">2024-04-01</td>
                            <td class="date-cell">2025-03-31</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View" onclick="viewBatch('2024-2025')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete" onclick="deleteBatch('2024-2025')">
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
                                                <a href="/staff/academic/grade-detail/1" class="grade-link">Grade 1</a>
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
                                                <a href="/staff/academic/grade-detail/2" class="grade-link">Grade 2</a>
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
                                                <a href="/staff/academic/grade-detail/6" class="grade-link">Grade 6</a>
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
                                                <a href="/staff/academic/grade-detail/10" class="grade-link">Grade 10</a>
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
                                <a href="/staff/academic/batches/2023-2024" class="batch-link">2023-2024</a>
                            </td>
                            <td>
                                <span class="status-badge completed">Completed</span>
                            </td>
                            <td class="student-count">420</td>
                            <td class="date-cell">2023-04-01</td>
                            <td class="date-cell">2024-03-31</td>
                            <td class="actions-cell">
                                <button class="action-icon view" title="View" onclick="viewBatch('2023-2024')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete" onclick="deleteBatch('2023-2024')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <tr class="expandable-row">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="batch-name">
                                <a href="/staff/academic/batches/2025-2026" class="batch-link">2025-2026</a>
                            </td>
                            <td>
                                <span class="status-badge upcoming">Upcoming</span>
                            </td>
                            <td class="student-count">0</td>
                            <td class="date-cell">2025-04-01</td>
                            <td class="date-cell">2026-03-31</td>
                            <td class="actions-cell">
                                <button class="action-icon view" title="View" onclick="viewBatch('2025-2026')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete" onclick="deleteBatch('2025-2026')">
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
                            <th>Category</th>
                            <th>Classes</th>
                            <th>Students</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="grade-level">
                                <a href="/staff/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 1</strong></a>
                            </td>
                            <td><span class="category-badge primary">Primary</span></td>
                            <td class="class-count">3</td>
                            <td class="student-count">90</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewGrade('1')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Grade" onclick="deleteGrade('1')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="6">
                                <div class="expand-content">
                                    <h4>Classes in Grade 1</h4>
                                    <div class="class-cards">
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/staff/academic/class-detail/1A" class="class-link">Class 1A</a>
                                                <span class="room-info">Room 101</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Ms. Sarah Johnson</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/staff/academic/class-detail/1B" class="class-link">Class 1B</a>
                                                <span class="room-info">Room 102</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Mr. David Chen</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/staff/academic/class-detail/1C" class="class-link">Class 1C</a>
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
                                <a href="/staff/academic/grade-detail/2" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 2</strong></a>
                            </td>
                            <td><span class="category-badge primary">Primary</span></td>
                            <td class="class-count">3</td>
                            <td class="student-count">85</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewGrade('2')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Grade" onclick="deleteGrade('2')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="6">
                                <div class="expand-content">
                                    <h4>Classes in Grade 2</h4>
                                    <div class="class-cards">
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/staff/academic/class-detail/2A" class="class-link">Class 2A</a>
                                                <span class="room-info">Room 201</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>28 students</span>
                                                <span>Dr. James Wilson</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/staff/academic/class-detail/2B" class="class-link">Class 2B</a>
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
                        <div class="form-group">
                            <label for="classTeacher">Class Teacher</label>
                            <input type="text" id="classTeacher" class="form-input" placeholder="e.g., Ms. Smith">
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="class-name">
                                <a href="/staff/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()"><strong>1A</strong></a>
                            </td>
                            <td><a href="/staff/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()">Grade 1</a></td>
                            <td><a href="/staff/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()">Room 101</a></td>
                            <td class="student-count">30</td>
                            <td>Ms. Sarah Johnson</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewClass('1A')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Class" onclick="deleteClass('1A')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="expandable-content" style="display: none;">
                            <td colspan="7">
                                <div class="expand-content">
                                    <h4>Subjects in Class 1A</h4>
                                    <div class="subject-cards">
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/staff/academic/subject-detail/MATH" class="subject-link">Mathematics</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>Mr. John Smith</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/staff/academic/subject-detail/ENG" class="subject-link">English</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>Ms. Sarah Johnson</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/staff/academic/subject-detail/SCI" class="subject-link">Science</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
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
                                <a href="/staff/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()"><strong>1B</strong></a>
                            </td>
                            <td><a href="/staff/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()">Grade 1</a></td>
                            <td><a href="/staff/academic/room-detail/102" class="room-link" onclick="event.stopPropagation()">Room 102</a></td>
                            <td class="student-count">30</td>
                            <td>Mr. David Chen</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewClass('1B')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Class" onclick="deleteClass('1B')">
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
                                                <a href="/staff/academic/subject-detail/MATH" class="subject-link">Mathematics</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>5 hours/week</span>
                                                <span>Mr. David Chen</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/staff/academic/subject-detail/ENG" class="subject-link">English</a>
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
                            <label for="roomEquip">Equipment</label>
                            <input type="text" id="roomEquip" class="form-input" placeholder="e.g., Projector, Whiteboard">
                        </div>
                        <div class="form-group">
                            <label for="roomAC">Air Conditioning</label>
                            <select id="roomAC" class="form-select">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="roomCap">Seating Capacity</label>
                            <input type="number" id="roomCap" class="form-input" placeholder="e.g., 35">
                        </div>
                    </div>
                    <div class="form-row">
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
                            <th>Location</th>
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
                                <a href="/staff/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()"><strong>101</strong></a>
                            </td>
                            <td>Classroom A</td>
                            <td>Building A · 1st Floor</td>
                            <td><a href="/staff/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()">Class 1A</a></td>
                            <td><span class="status-badge active">Occupied</span></td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewRoom('101')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Room" onclick="deleteRoom('101')">
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
                                                <a href="/staff/academic/class-detail/1A" class="class-link">Class 1A</a>
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
                                <a href="/staff/academic/room-detail/102" class="room-link" onclick="event.stopPropagation()"><strong>102</strong></a>
                            </td>
                            <td>Classroom B</td>
                            <td>Building A · 1st Floor</td>
                            <td><a href="/staff/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()">Class 1B</a></td>
                            <td><span class="status-badge active">Occupied</span></td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewRoom('102')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Room" onclick="deleteRoom('102')">
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
                                                <a href="/staff/academic/class-detail/1B" class="class-link">Class 1B</a>
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
                            <label for="subjectGrade">Grade</label>
                            <input type="text" id="subjectGrade" class="form-input" placeholder="e.g., Grade 1">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="subjectTeachersSearch">Assign Teachers</label>
                            <input type="text" id="subjectTeachersSearch" class="form-input" placeholder="Search by name or ID">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <div id="subjectTeachersList" style="max-height:220px; overflow:auto; border:1px solid #e2e8f0; border-radius:6px;">
                                <table class="basic-table" style="margin:0;">
                                    <thead><tr><th style="width:40px;"></th><th>Name</th><th>ID</th></tr></thead>
                                    <tbody id="subjectTeachersBody"></tbody>
                                </table>
                            </div>
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
                            <th>Grade</th>
                            <th>Teachers</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" onclick="toggleExpand(this)">
                            <td class="expand-cell">
                                <i class="fas fa-chevron-right expand-icon"></i>
                            </td>
                            <td class="subject-code">
                                <a href="/staff/academic/subject-detail/MATH" class="subject-link" onclick="event.stopPropagation()"><strong>MATH</strong></a>
                            </td>
                            <td><a href="/staff/academic/subject-detail/MATH" class="subject-link" onclick="event.stopPropagation()">Mathematics</a></td>
                            <td><span class="category-badge core">Core</span></td>
                            <td>Grade 1</td>
                            <td class="teacher-count">2</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewSubject('MATH')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Subject" onclick="deleteSubject('MATH')">
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
                                                <a href="/staff/academic/class-detail/1A" class="class-link">Class 1A</a>
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
                                                <a href="/staff/academic/class-detail/1B" class="class-link">Class 1B</a>
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
                                <a href="/staff/academic/subject-detail/ENG" class="subject-link" onclick="event.stopPropagation()"><strong>ENG</strong></a>
                            </td>
                            <td><a href="/staff/academic/subject-detail/ENG" class="subject-link" onclick="event.stopPropagation()">English Language</a></td>
                            <td><span class="category-badge core">Core</span></td>
                            <td>Grade 1</td>
                            <td class="teacher-count">2</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View Details" onclick="viewSubject('ENG')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete Subject" onclick="deleteSubject('ENG')">
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
                                                <a href="/staff/academic/class-detail/1A" class="class-link">Class 1A</a>
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
                                                <a href="/staff/academic/class-detail/1B" class="class-link">Class 1B</a>
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
    <div class="tab-content active" id="departments-content">
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
                            <th class="nowrap">Department Code</th>
                            <th>Department Name</th>
                            <th>Staff</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="expand-cell"></td>
                            <td class="department-code">
                                <a href="/staff/academic/department-detail/PRIMARY" class="department-link" onclick="event.stopPropagation()"><strong>PRIMARY</strong></a>
                            </td>
                            <td class="department-name">Primary Teachers</td>
                            <td class="student-count">15</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View" onclick="viewDepartment('PRIMARY')"><i class="fas fa-eye"></i></button>
                                <button class="action-icon delete" title="Delete" onclick="deleteDepartment('PRIMARY')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="expand-cell"></td>
                            <td class="department-code">
                                <a href="/staff/academic/department-detail/LANG" class="department-link" onclick="event.stopPropagation()"><strong>LANG</strong></a>
                            </td>
                            <td class="department-name">Language Teachers</td>
                            <td class="student-count">8</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View" onclick="viewDepartment('LANG')"><i class="fas fa-eye"></i></button>
                                <button class="action-icon delete" title="Delete" onclick="deleteDepartment('LANG')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="expand-cell"></td>
                            <td class="department-code">
                                <a href="/staff/academic/department-detail/ICT" class="department-link" onclick="event.stopPropagation()"><strong>ICT</strong></a>
                            </td>
                            <td class="department-name">ICT Staff</td>
                            <td class="student-count">5</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View" onclick="viewDepartment('ICT')"><i class="fas fa-eye"></i></button>
                                <button class="action-icon delete" title="Delete" onclick="deleteDepartment('ICT')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="expand-cell"></td>
                            <td class="department-code">
                                <a href="/staff/academic/department-detail/ADMIN" class="department-link" onclick="event.stopPropagation()"><strong>ADMIN</strong></a>
                            </td>
                            <td class="department-name">Administrative Staff</td>
                            <td class="student-count">12</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View" onclick="viewDepartment('ADMIN')"><i class="fas fa-eye"></i></button>
                                <button class="action-icon delete" title="Delete" onclick="deleteDepartment('ADMIN')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="expand-cell"></td>
                            <td class="department-code">
                                <a href="/staff/academic/department-detail/MAINT" class="department-link" onclick="event.stopPropagation()"><strong>MAINT</strong></a>
                            </td>
                            <td class="department-name">Maintenance & Security</td>
                            <td class="student-count">10</td>
                            <td class="actions-cell" onclick="event.stopPropagation()">
                                <button class="action-icon view" title="View" onclick="viewDepartment('MAINT')"><i class="fas fa-eye"></i></button>
                                <button class="action-icon delete" title="Delete" onclick="deleteDepartment('MAINT')"><i class="fas fa-trash"></i></button>
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
            <td><span class="category-badge">${(document.getElementById('gradeCategory').value||'')}</span></td>
            <td class="class-count">0</td>
            <td class="student-count">0</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
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
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
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
            <td><a href="#" class="class-link" onclick="event.stopPropagation()"></a></td>
            <td><span class="status-badge">${(document.getElementById('roomStatus').value||'')}</span></td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon delete" title="Delete Room"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleSubjectForm','subjectForm','cancelSubject','saveSubject', function(){
        const code=(document.getElementById('subCode').value||'').trim(); if(!code){ alert('Enter subject code'); return; }
        const teacherIds = Array.from(document.querySelectorAll('#subjectTeachersBody input[type="checkbox"]:checked')).map(cb => cb.getAttribute('data-id'));
        const tbody=document.querySelector('#subjects-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row'; tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="subject-code"><a href="#" class="subject-link" onclick="event.stopPropagation()"><strong>${code}</strong></a></td>
            <td><a href="#" class="subject-link" onclick="event.stopPropagation()">${(document.getElementById('subName').value||'')}</a></td>
            <td><span class="category-badge">${(document.getElementById('subCat').value||'')}</span></td>
            <td>${(document.getElementById('subjectGrade').value||'')}</td>
            <td class="teacher-count">${teacherIds.length}</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon delete" title="Delete Subject"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });

    bindToggle('toggleDepartmentForm','departmentForm','cancelDepartment','saveDepartment', function(){
        const code=(document.getElementById('deptCode').value||'').trim(); if(!code){ alert('Enter department code'); return; }
        const name=(document.getElementById('deptName').value||'').trim(); if(!name){ alert('Enter department name'); return; }
        const tbody=document.querySelector('#departments-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.innerHTML=`
            <td class="expand-cell"></td>
            <td class="department-code"><a href="#" class="department-link" onclick="event.stopPropagation()"><strong>${code}</strong></a></td>
            <td class="department-name">${name}</td>
            <td class="student-count">0</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
    });
});

// Standard Action Functions for Academic Management
function viewBatch(batchId) {
    window.location.href = `/staff/academic/batch-detail/${batchId}`;
}

function editBatch(batchId) {
    window.location.href = `/staff/academic/batch-detail.php?batch=${batchId}&edit=true`;
}

function deleteBatch(batchId) {
    showConfirmDialog({
        title: 'Delete Batch',
        message: `Are you sure you want to delete batch ${batchId}? This action cannot be undone.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: function() {
            showActionStatus(`Batch ${batchId} deleted successfully!`, 'success');
        }
    });
}

function viewGrade(gradeId) {
    window.location.href = `/staff/academic/grade-detail/${gradeId}`;
}

function editGrade(gradeId) {
    window.location.href = `/staff/academic/grade-detail.php?grade=${gradeId}&edit=true`;
}

function deleteGrade(gradeId) {
    showConfirmDialog({
        title: 'Delete Grade',
        message: `Are you sure you want to delete grade ${gradeId}? This will also delete all associated classes and students.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-graduation-cap',
        onConfirm: function() {
            showActionStatus(`Grade ${gradeId} deleted successfully!`, 'success');
        }
    });
}

function viewClass(classId) {
    window.location.href = `/staff/academic/class-detail/${classId}`;
}

function editClass(classId) {
    window.location.href = `/staff/academic/class-detail.php?class=${classId}&edit=true`;
}

function deleteClass(classId) {
    showConfirmDialog({
        title: 'Delete Class',
        message: `Are you sure you want to delete class ${classId}? This will also remove all students from this class.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-door-open',
        onConfirm: function() {
            showActionStatus(`Class ${classId} deleted successfully!`, 'success');
        }
    });
}

function viewRoom(roomId) {
    window.location.href = `/staff/academic/room-detail/${roomId}`;
}

function editRoom(roomId) {
    window.location.href = `/staff/academic/room-detail.php?room=${roomId}&edit=true`;
}

function deleteRoom(roomId) {
    showConfirmDialog({
        title: 'Delete Room',
        message: `Are you sure you want to delete room ${roomId}? This will unassign any classes currently using this room.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-door-closed',
        onConfirm: function() {
            showActionStatus(`Room ${roomId} deleted successfully!`, 'success');
        }
    });
}

function viewSubject(subjectId) {
    window.location.href = `/staff/academic/subject-detail/${subjectId}`;
}

function editSubject(subjectId) {
    window.location.href = `/staff/academic/subject-detail.php?subject=${subjectId}&edit=true`;
}

function deleteSubject(subjectId) {
    showConfirmDialog({
        title: 'Delete Subject',
        message: `Are you sure you want to delete subject ${subjectId}? This will remove it from all classes and schedules.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-book',
        onConfirm: function() {
            showActionStatus(`Subject ${subjectId} deleted successfully!`, 'success');
        }
    });
}

function viewDepartment(deptId) {
    window.location.href = `/staff/academic/department-detail/${deptId}`;
}

function editDepartment(deptId) {
    window.location.href = `/staff/academic/department-detail.php?dept=${deptId}&edit=true`;
}

function deleteDepartment(deptId) {
    showConfirmDialog({
        title: 'Delete Department',
        message: `Are you sure you want to delete department ${deptId}? This will remove all staff from this department.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-building',
        onConfirm: function() {
            showActionStatus(`Department ${deptId} deleted successfully!`, 'success');
        }
    });
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>
