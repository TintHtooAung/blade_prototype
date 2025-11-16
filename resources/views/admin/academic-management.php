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

<!-- Academic Stats Cards -->
<div class="stats-grid-secondary vertical-stats">
    <!-- Active Batch -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-content">
            <h3>Active Batch</h3>
            <div class="stat-number">2024-2025</div>
            <div class="stat-change">Current Year</div>
        </div>
    </div>

    <!-- Total Grades -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="stat-content">
            <h3>Total Grades</h3>
            <div class="stat-number">12</div>
            <div class="stat-change">Grade 1-12</div>
        </div>
    </div>

    <!-- Total Classes -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chalkboard"></i>
        </div>
        <div class="stat-content">
            <h3>Total Classes</h3>
            <div class="stat-number">48</div>
            <div class="stat-change">Active</div>
        </div>
    </div>

    <!-- Total Subjects -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="stat-content">
            <h3>Total Subjects</h3>
            <div class="stat-number">24</div>
            <div class="stat-change">All Grades</div>
        </div>
    </div>
</div>

<!-- Academic Structure Management Tabs -->
<div class="academic-structure-section">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <div class="academic-tabs" style="flex: 1;">
        <button class="academic-tab active" data-tab="batches">Batches</button>
        <button class="academic-tab" data-tab="grades">Grades</button>
        <button class="academic-tab" data-tab="classes">Classes</button>
        <button class="academic-tab" data-tab="rooms">Rooms</button>
        <button class="academic-tab" data-tab="subjects">Subjects</button>
        </div>
    </div>
</div>

<!-- Tab Content Container -->
<div class="tab-content-container">
    <!-- Batches Tab Content -->
    <div class="tab-content active" id="batches-content">
        <div class="batch-management-section">
            <div class="section-header">
                <h3 class="section-title">Batch Management</h3>
                <button class="simple-btn" id="toggleBatchForm" onclick="openModal('batchModal')"><i class="fas fa-plus"></i> Add Batch</button>
            </div>

            <!-- Add Batch Modal -->
            <div id="batchModal" class="simple-modal-overlay" style="display:none;">
                <div class="simple-modal-content">
                    <div class="simple-modal-header">
                        <h3><i class="fas fa-folder-plus"></i> Create Batch</h3>
                        <button class="simple-modal-close" onclick="closeModal('batchModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="simple-modal-body">
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="batchStatus">Status</label>
                            <select id="batchStatus" class="form-select">
                                <option value="Active">Active</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="simple-modal-actions">
                        <button id="cancelBatch" class="simple-btn secondary" onclick="closeModal('batchModal')">Cancel</button>
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
                                <button class="action-icon view" title="View" onclick="viewBatch('2023-2024')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete" onclick="deleteBatch('2023-2024')">
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
                <button class="simple-btn" id="toggleGradeForm" onclick="openModal('gradeModal')"><i class="fas fa-plus"></i> Add Grade</button>
            </div>

            <!-- Add Grade Modal -->
            <div id="gradeModal" class="simple-modal-overlay" style="display:none;">
                <div class="simple-modal-content">
                    <div class="simple-modal-header">
                        <h3><i class="fas fa-layer-group"></i> Create Grade</h3>
                        <button class="simple-modal-close" onclick="closeModal('gradeModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="simple-modal-body">
                        <div class="form-group">
                            <label for="gradeLevel">Grade Level</label>
                            <input type="number" id="gradeLevel" class="form-input" placeholder="e.g., 10">
                        </div>
                        <div class="form-group">
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
                    <div class="simple-modal-actions">
                        <button id="cancelGrade" class="simple-btn secondary" onclick="closeModal('gradeModal')">Cancel</button>
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
                                <a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 1</strong></a>
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
                                                <a href="/admin/academic/class-detail/1A" class="class-link">A</a>
                                                <span class="room-info">Room 101</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Ms. Sarah Johnson</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/1B" class="class-link">B</a>
                                                <span class="room-info">Room 102</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>30 students</span>
                                                <span>Mr. David Chen</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/1C" class="class-link">C</a>
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
                                                <a href="/admin/academic/class-detail/2A" class="class-link">A</a>
                                                <span class="room-info">Room 201</span>
                                            </div>
                                            <div class="class-stats">
                                                <span>28 students</span>
                                                <span>Dr. James Wilson</span>
                                            </div>
                                        </div>
                                        <div class="class-card">
                                            <div class="class-header">
                                                <a href="/admin/academic/class-detail/2B" class="class-link">B</a>
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
                <button class="simple-btn" id="toggleClassForm" onclick="openModal('classModal')"><i class="fas fa-plus"></i> Add Class</button>
            </div>

            <!-- Add Class Modal -->
            <div id="classModal" class="simple-modal-overlay" style="display:none;">
                <div class="simple-modal-content">
                    <div class="simple-modal-header">
                        <h3><i class="fas fa-door-open"></i> Create Class</h3>
                        <button class="simple-modal-close" onclick="closeModal('classModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="simple-modal-body">
                        <div class="form-group">
                            <label for="className">Class Name</label>
                            <input type="text" id="className" class="form-input" placeholder="e.g., A">
                        </div>
                        <div class="form-group">
                            <label for="classGrade">Grade</label>
                            <input type="text" id="classGrade" class="form-input" placeholder="e.g., Grade 10">
                        </div>
                        <div class="form-group">
                            <label for="classRoom">Room</label>
                            <input type="text" id="classRoom" class="form-input" placeholder="e.g., Room 201">
                        </div>
                        <div class="form-group">
                            <label for="classTeacher">Class Teacher</label>
                            <input type="text" id="classTeacher" class="form-input" placeholder="e.g., Ms. Smith">
                        </div>
                    </div>
                    <div class="simple-modal-actions">
                        <button id="cancelClass" class="simple-btn secondary" onclick="closeModal('classModal')">Cancel</button>
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
                                <a href="/admin/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()"><strong>A</strong></a>
                            </td>
                            <td><a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()">Grade 1</a></td>
                            <td><a href="/admin/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()">Room 101</a></td>
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
                                    <h4>Subjects in Class A (Grade 1)</h4>
                                    <div class="subject-cards">
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/MATH" class="subject-link">Mathematics</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>Mr. John Smith</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/ENG" class="subject-link">English</a>
                                                <span class="category-badge core">Core</span>
                                            </div>
                                            <div class="subject-stats">
                                                <span>Ms. Sarah Johnson</span>
                                            </div>
                                        </div>
                                        <div class="subject-card">
                                            <div class="subject-header">
                                                <a href="/admin/academic/subject-detail/SCI" class="subject-link">Science</a>
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
                                <a href="/admin/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()"><strong>B</strong></a>
                            </td>
                            <td><a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()">Grade 1</a></td>
                            <td><a href="/admin/academic/room-detail/102" class="room-link" onclick="event.stopPropagation()">Room 102</a></td>
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
                                    <h4>Subjects in Class B (Grade 1)</h4>
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
                <button class="simple-btn" id="toggleRoomForm" onclick="openModal('roomModal')"><i class="fas fa-plus"></i> Add Room</button>
            </div>

            <!-- Add Room Modal -->
            <div id="roomModal" class="simple-modal-overlay" style="display:none;">
                <div class="simple-modal-content">
                    <div class="simple-modal-header">
                        <h3><i class="fas fa-door-closed"></i> Create Room</h3>
                        <button class="simple-modal-close" onclick="closeModal('roomModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="simple-modal-body">
                        <div class="form-group">
                            <label for="roomNumber">Room Number</label>
                            <input type="text" id="roomNumber" class="form-input" placeholder="e.g., 101">
                        </div>
                        <div class="form-group">
                            <label for="roomName">Room Name</label>
                            <input type="text" id="roomName" class="form-input" placeholder="e.g., Classroom A">
                        </div>
                        <div class="form-group">
                            <label for="roomFloor">Floor</label>
                            <input type="text" id="roomFloor" class="form-input" placeholder="e.g., 1st Floor">
                        </div>
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
                        <div class="form-group">
                            <label for="roomCap">Seating Capacity</label>
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
                    <div class="simple-modal-actions">
                        <button id="cancelRoom" class="simple-btn secondary" onclick="closeModal('roomModal')">Cancel</button>
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
                                <a href="/admin/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()"><strong>101</strong></a>
                            </td>
                            <td>Classroom A</td>
                            <td>Building A · 1st Floor</td>
                            <td><a href="/admin/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()">A</a></td>
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
                                                <a href="/admin/academic/class-detail/1A" class="class-link">A</a>
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
                            <td>Building A · 1st Floor</td>
                            <td><a href="/admin/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()">B</a></td>
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
                                                <a href="/admin/academic/class-detail/1B" class="class-link">B</a>
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
                <button class="simple-btn" id="toggleSubjectForm" onclick="openModal('subjectModal')"><i class="fas fa-plus"></i> Add Subject</button>
            </div>

            <!-- Add Subject Modal -->
            <div id="subjectModal" class="simple-modal-overlay" style="display:none;">
                <div class="simple-modal-content">
                    <div class="simple-modal-header">
                        <h3><i class="fas fa-book"></i> Create Subject</h3>
                        <button class="simple-modal-close" onclick="closeModal('subjectModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="simple-modal-body">
                        <div class="form-group">
                            <label for="subCode">Subject Code</label>
                            <input type="text" id="subCode" class="form-input" placeholder="e.g., MATH">
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="subjectGrade">Grade</label>
                            <input type="text" id="subjectGrade" class="form-input" placeholder="e.g., Grade 1">
                        </div>
                        <div class="form-group">
                            <label for="subjectTeachersSearch">Assign Teachers</label>
                            <input type="text" id="subjectTeachersSearch" class="form-input" placeholder="Search by name or ID">
                        </div>
                        <div class="form-group">
                            <div id="subjectTeachersList" style="max-height:220px; overflow:auto; border:1px solid #e2e8f0; border-radius:6px;">
                                <table class="basic-table" style="margin:0;">
                                    <thead><tr><th style="width:40px;"></th><th>Name</th><th>ID</th></tr></thead>
                                    <tbody id="subjectTeachersBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="simple-modal-actions">
                        <button id="cancelSubject" class="simple-btn secondary" onclick="closeModal('subjectModal')">Cancel</button>
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
                                <a href="/admin/academic/subject-detail/MATH" class="subject-link" onclick="event.stopPropagation()"><strong>MATH</strong></a>
                            </td>
                            <td><a href="/admin/academic/subject-detail/MATH" class="subject-link" onclick="event.stopPropagation()">Mathematics</a></td>
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
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                        <h4 style="margin: 0;">Teachers Teaching Mathematics</h4>
                                    </div>
                                    <div class="teachers-cards-grid" id="teachersCardsContainer-MATH">
                                        <div class="teacher-card">
                                            <div class="teacher-card-avatar">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="teacher-card-info">
                                                <a href="/admin/teacher-profile/Mr-John-Smith" class="teacher-card-name">Mr. John Smith</a>
                                                <div class="teacher-card-id">T001</div>
                                            </div>
                                        </div>
                                        <div class="teacher-card">
                                            <div class="teacher-card-avatar">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="teacher-card-info">
                                                <a href="/admin/teacher-profile/Mr-David-Chen" class="teacher-card-name">Mr. David Chen</a>
                                                <div class="teacher-card-id">T002</div>
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
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                        <h4 style="margin: 0;">Teachers Teaching English Language</h4>
                                    </div>
                                    <div class="teachers-cards-grid" id="teachersCardsContainer-ENG">
                                        <div class="teacher-card">
                                            <div class="teacher-card-avatar">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="teacher-card-info">
                                                <a href="/admin/teacher-profile/Ms-Sarah-Johnson" class="teacher-card-name">Ms. Sarah Johnson</a>
                                                <div class="teacher-card-id">T003</div>
                                            </div>
                                        </div>
                                        <div class="teacher-card">
                                            <div class="teacher-card-avatar">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="teacher-card-info">
                                                <a href="/admin/teacher-profile/Ms-Jennifer-Lee" class="teacher-card-name">Ms. Jennifer Lee</a>
                                                <div class="teacher-card-id">T004</div>
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

    
</div>

<script>
// Academic Setup - Data Application Functions

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
    
    // Check if academic data is empty and show wizard
    checkAndShowSetupWizard();
    
    // Check if setup data is pending and apply it
    applyPendingSetupData();
});

function checkAndShowSetupWizard() {
    // Check if setup has been completed
    const setupCompleted = localStorage.getItem('academicSetupCompleted');
    
    // Check if tables have data
    const batchesTable = document.querySelector('#batches-content .academic-table tbody');
    const gradesTable = document.querySelector('#grades-content .academic-table tbody');
    const classesTable = document.querySelector('#classes-content .academic-table tbody');
    const roomsTable = document.querySelector('#rooms-content .academic-table tbody');
    const subjectsTable = document.querySelector('#subjects-content .academic-table tbody');
    
    const hasBatches = batchesTable && batchesTable.querySelectorAll('tr.expandable-row').length > 0;
    const hasGrades = gradesTable && gradesTable.querySelectorAll('tr.expandable-row').length > 0;
    const hasClasses = classesTable && classesTable.querySelectorAll('tr.expandable-row').length > 0;
    const hasRooms = roomsTable && roomsTable.querySelectorAll('tr.expandable-row').length > 0;
    const hasSubjects = subjectsTable && subjectsTable.querySelectorAll('tr.expandable-row').length > 0;
    
    // If no data exists and setup hasn't been completed, redirect to setup page
    if (!setupCompleted && !hasBatches && !hasGrades && !hasClasses && !hasRooms && !hasSubjects) {
        // Redirect to setup page after a short delay
        setTimeout(() => {
            if (confirm('No academic data found. Would you like to set up your academic structure now?')) {
                window.location.href = '/admin/academic-setup';
            }
        }, 500);
    }
}

// Apply pending setup data from localStorage
function applyPendingSetupData() {
    const setupPending = localStorage.getItem('academicSetupPending');
    if (!setupPending || setupPending !== 'true') {
        return; // No pending setup data
    }
    
    try {
        const setupDataStr = localStorage.getItem('academicSetup');
        if (!setupDataStr) {
            localStorage.removeItem('academicSetupPending');
            return;
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Get table bodies
        const batchTbody = document.querySelector('#batches-content .academic-table tbody');
        const gradeTbody = document.querySelector('#grades-content .academic-table tbody');
        const classTbody = document.querySelector('#classes-content .academic-table tbody');
        const roomTbody = document.querySelector('#rooms-content .academic-table tbody');
        const subjectTbody = document.querySelector('#subjects-content .academic-table tbody');
        
        // Check if data already exists
        const hasExistingData = (batchTbody && batchTbody.querySelectorAll('tr.expandable-row').length > 0) ||
                               (gradeTbody && gradeTbody.querySelectorAll('tr.expandable-row').length > 0) ||
                               (classTbody && classTbody.querySelectorAll('tr.expandable-row').length > 0) ||
                               (roomTbody && roomTbody.querySelectorAll('tr.expandable-row').length > 0) ||
                               (subjectTbody && subjectTbody.querySelectorAll('tr.expandable-row').length > 0);
        
        if (hasExistingData) {
            // Ask user if they want to clear existing data
            if (!confirm('Setup data found. This will clear existing academic data and create new entries. Do you want to continue?')) {
                localStorage.removeItem('academicSetupPending');
                return;
            }
            
            // Clear existing data
            if (batchTbody) {
                batchTbody.querySelectorAll('tr.expandable-row, tr.expandable-content').forEach(row => row.remove());
            }
            if (gradeTbody) {
                gradeTbody.querySelectorAll('tr.expandable-row, tr.expandable-content').forEach(row => row.remove());
            }
            if (classTbody) {
                classTbody.querySelectorAll('tr.expandable-row, tr.expandable-content').forEach(row => row.remove());
            }
            if (roomTbody) {
                roomTbody.querySelectorAll('tr.expandable-row, tr.expandable-content').forEach(row => row.remove());
            }
            if (subjectTbody) {
                subjectTbody.querySelectorAll('tr.expandable-row, tr.expandable-content').forEach(row => row.remove());
            }
        }
        
        // Create batch
        if (setupData.batch && setupData.batch.name && batchTbody) {
            const batchTr = document.createElement('tr');
            batchTr.className = 'expandable-row';
            batchTr.setAttribute('onclick', 'toggleExpand(this)');
            batchTr.innerHTML = `
                <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
                <td class="batch-name"><a href="#" class="batch-link" onclick="event.stopPropagation()">${setupData.batch.name}</a></td>
                <td><span class="status-badge active">Active</span></td>
                <td class="student-count">0</td>
                <td class="date-cell">${setupData.batch.start || ''}</td>
                <td class="date-cell">${setupData.batch.end || ''}</td>
                <td class="actions-cell" onclick="event.stopPropagation()">
                    <button class="action-icon view" title="View"><i class="fas fa-eye"></i></button>
                    <button class="action-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                </td>`;
            batchTbody.prepend(batchTr);
        }
        
        // Create grades
        if (setupData.grades && Array.isArray(setupData.grades) && gradeTbody) {
            setupData.grades.forEach(gradeNum => {
                const category = gradeNum <= 5 ? 'Primary' : gradeNum <= 8 ? 'Middle' : 'High';
                const gradeTr = document.createElement('tr');
                gradeTr.className = 'expandable-row';
                gradeTr.setAttribute('onclick', 'toggleExpand(this)');
                gradeTr.innerHTML = `
                    <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
                    <td class="grade-level"><a href="#" class="grade-link" onclick="event.stopPropagation()"><strong>Grade ${gradeNum}</strong></a></td>
                    <td><span class="category-badge ${category.toLowerCase()}">${category}</span></td>
                    <td class="class-count">0</td>
                    <td class="student-count">0</td>
                    <td class="actions-cell" onclick="event.stopPropagation()">
                        <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                        <button class="action-icon delete" title="Delete Grade"><i class="fas fa-trash"></i></button>
                    </td>`;
                gradeTbody.prepend(gradeTr);
            });
        }
        
        // Create classes
        if (setupData.classes && setupData.grades && Array.isArray(setupData.grades) && classTbody) {
            const classNames = setupData.classes.naming || ['1', '2', '3'];
            setupData.grades.forEach(gradeNum => {
                const perGrade = setupData.classes.perGrade || 3;
                for (let i = 0; i < perGrade; i++) {
                    const className = classNames[i] || String.fromCharCode(65 + i); // Fallback to A, B, C
                    const classTr = document.createElement('tr');
                    classTr.className = 'expandable-row';
                    classTr.setAttribute('onclick', 'toggleExpand(this)');
                    classTr.innerHTML = `
                        <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
                        <td class="class-name"><a href="#" class="class-link" onclick="event.stopPropagation()"><strong>${className}</strong></a></td>
                        <td><a href="#" class="grade-link" onclick="event.stopPropagation()">Grade ${gradeNum}</a></td>
                        <td></td>
                        <td class="student-count">0</td>
                        <td></td>
                        <td class="actions-cell" onclick="event.stopPropagation()">
                            <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                            <button class="action-icon delete" title="Delete Class"><i class="fas fa-trash"></i></button>
                        </td>`;
                    classTbody.prepend(classTr);
                }
            });
        }
        
        // Create rooms
        if (setupData.rooms && roomTbody) {
            const startRoomNum = parseInt(setupData.rooms.start) || 101;
            const totalRooms = parseInt(setupData.rooms.total) || 20;
            for (let i = 0; i < totalRooms; i++) {
                const roomNum = startRoomNum + i;
                const roomTr = document.createElement('tr');
                roomTr.className = 'expandable-row';
                roomTr.setAttribute('onclick', 'toggleExpand(this)');
                roomTr.innerHTML = `
                    <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
                    <td class="room-number"><a href="#" class="room-link" onclick="event.stopPropagation()"><strong>${roomNum}</strong></a></td>
                    <td>Classroom ${roomNum}</td>
                    <td>Building A · 1st Floor</td>
                    <td><a href="#" class="class-link" onclick="event.stopPropagation()"></a></td>
                    <td><span class="status-badge active">Available</span></td>
                    <td class="actions-cell" onclick="event.stopPropagation()">
                        <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                        <button class="action-icon delete" title="Delete Room"><i class="fas fa-trash"></i></button>
                    </td>`;
                roomTbody.prepend(roomTr);
            }
        }
        
        // Create subjects
        if (setupData.subjects && Array.isArray(setupData.subjects) && subjectTbody) {
            setupData.subjects.forEach(subject => {
                const subjectTr = document.createElement('tr');
                subjectTr.className = 'expandable-row';
                subjectTr.setAttribute('onclick', 'toggleExpand(this)');
                subjectTr.innerHTML = `
                    <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
                    <td class="subject-code"><a href="#" class="subject-link" onclick="event.stopPropagation()"><strong>${subject.code || ''}</strong></a></td>
                    <td><a href="#" class="subject-link" onclick="event.stopPropagation()">${subject.name || ''}</a></td>
                    <td><span class="category-badge core">Core</span></td>
                    <td>All Grades</td>
                    <td class="teacher-count">0</td>
                    <td class="actions-cell" onclick="event.stopPropagation()">
                        <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                        <button class="action-icon delete" title="Delete Subject"><i class="fas fa-trash"></i></button>
                    </td>`;
                subjectTbody.prepend(subjectTr);
            });
        }
        
        // Clear the pending flag
        localStorage.removeItem('academicSetupPending');
        
        console.log('Academic setup data applied successfully');
    } catch (e) {
        console.error('Error applying setup data:', e);
        localStorage.removeItem('academicSetupPending');
    }
}

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

    // Modal functions
    window.openModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    };
    
    window.closeModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    };
    
    // Close modal when clicking overlay
    document.querySelectorAll('.simple-modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                overlay.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    });
    
    // Save batch handler
    document.getElementById('saveBatch') && document.getElementById('saveBatch').addEventListener('click', function(){
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
        closeModal('batchModal');
        alert('Saved (draft). Final fields after onboarding.');
    });

    // Save grade handler
    document.getElementById('saveGrade') && document.getElementById('saveGrade').addEventListener('click', function(){
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
        closeModal('gradeModal');
        alert('Saved (draft). Final fields after onboarding.');
    });

    // Save class handler
    document.getElementById('saveClass') && document.getElementById('saveClass').addEventListener('click', function(){
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
        closeModal('classModal');
        alert('Saved (draft). Final fields after onboarding.');
    });

    // Save room handler
    document.getElementById('saveRoom') && document.getElementById('saveRoom').addEventListener('click', function(){
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
        closeModal('roomModal');
        alert('Saved (draft). Final fields after onboarding.');
    });

    // Save subject handler
    document.getElementById('saveSubject') && document.getElementById('saveSubject').addEventListener('click', function(){
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
        closeModal('subjectModal');
        alert('Saved (draft). Final fields after onboarding.');
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
    window.location.href = `/admin/academic/batch-detail/${batchId}`;
}

function editBatch(batchId) {
    window.location.href = `/admin/academic/batch-detail.php?batch=${batchId}&edit=true`;
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
    window.location.href = `/admin/academic/grade-detail/${gradeId}`;
}

function editGrade(gradeId) {
    window.location.href = `/admin/academic/grade-detail.php?grade=${gradeId}&edit=true`;
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
    window.location.href = `/admin/academic/class-detail/${classId}`;
}

function editClass(classId) {
    window.location.href = `/admin/academic/class-detail.php?class=${classId}&edit=true`;
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
    window.location.href = `/admin/academic/room-detail/${roomId}`;
}

function editRoom(roomId) {
    window.location.href = `/admin/academic/room-detail.php?room=${roomId}&edit=true`;
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
    window.location.href = `/admin/academic/subject-detail/${subjectId}`;
}

function editSubject(subjectId) {
    window.location.href = `/admin/academic/subject-detail.php?subject=${subjectId}&edit=true`;
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
    window.location.href = `/admin/academic/department-detail/${deptId}`;
}

function editDepartment(deptId) {
    window.location.href = `/admin/academic/department-detail.php?dept=${deptId}&edit=true`;
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

<style>

/* Simple Modal Styles */
.simple-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 0.2s ease;
}

.simple-modal-content {
    background: #ffffff;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    max-height: 90vh;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    animation: slideUp 0.3s ease;
    overflow: hidden;
}

.simple-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid #e0e7ff;
}

.simple-modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1d1d1f;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.simple-modal-header h3 i {
    color: #4A90E2;
}

.simple-modal-close {
    background: none;
    border: none;
    font-size: 1.25rem;
    color: #86868b;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.simple-modal-close:hover {
    background: #f8fafc;
    color: #1d1d1f;
}

.simple-modal-body {
    padding: 1.5rem;
    overflow-y: auto;
    flex: 1;
}

.simple-modal-body .form-group {
    margin-bottom: 1.25rem;
}

.simple-modal-body .form-group:last-child {
    margin-bottom: 0;
}

.simple-modal-body .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #1d1d1f;
    font-size: 0.9rem;
}

.simple-modal-body .form-group .form-input,
.simple-modal-body .form-group .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1d1d1f;
    transition: all 0.2s ease;
}

.simple-modal-body .form-group .form-input:focus,
.simple-modal-body .form-group .form-select:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.simple-modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    padding: 1.5rem;
    border-top: 1px solid #e0e7ff;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Teacher Cards Grid */
.teachers-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 16px;
    margin-top: 16px;
}

/* Teacher Card */
.teacher-card {
    background: #ffffff;
    border: 1px solid #e0e7ff;
    border-radius: 12px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.2s ease;
    cursor: pointer;
}

.teacher-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-color: #4A90E2;
}

/* Teacher Avatar */
.teacher-card-avatar {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #4A90E2 0%, #42a5f5 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 1.25rem;
    flex-shrink: 0;
}

/* Teacher Info */
.teacher-card-info {
    flex: 1;
    min-width: 0;
}

.teacher-card-name {
    display: block;
    font-size: 0.95rem;
    font-weight: 600;
    color: #1d1d1f;
    text-decoration: none;
    margin-bottom: 4px;
    transition: color 0.2s ease;
        }
        
.teacher-card-name:hover {
    color: #4A90E2;
}

.teacher-card-id {
    font-size: 0.85rem;
    color: #86868b;
    font-weight: 500;
        }
        
/* Responsive adjustments */
@media (max-width: 768px) {
    .teachers-cards-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px;
    }
    
    .teacher-card {
        padding: 12px;
    }
    
    .teacher-card-avatar {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
}
</style>


<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>