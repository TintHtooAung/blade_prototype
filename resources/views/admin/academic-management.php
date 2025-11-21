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
<div class="stats-grid-secondary vertical-stats tab-aligned-stats">
    <!-- Batches -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-content">
            <h3>Active Batches</h3>
            <div class="stat-number">2</div>
            <div class="stat-change">2024-2026 cycles</div>
        </div>
    </div>

    <!-- Grades -->
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

    <!-- Classes -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chalkboard"></i>
        </div>
        <div class="stat-content">
            <h3>Total Classes</h3>
            <div class="stat-number">48</div>
            <div class="stat-change">Active schedules</div>
        </div>
    </div>

    <!-- Rooms -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-door-open"></i>
        </div>
        <div class="stat-content">
            <h3>Total Rooms</h3>
            <div class="stat-number">32</div>
            <div class="stat-change">Across all blocks</div>
        </div>
    </div>

    <!-- Subjects -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="stat-content">
            <h3>Total Subjects</h3>
            <div class="stat-number">24</div>
            <div class="stat-change">All departments</div>
        </div>
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
                            <th>Batch Name</th>
                            <th>Status</th>
                            <th>Students</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="batch-name">
                                <a href="/admin/academic/batch-detail/2024-2025" class="batch-link">2024-2025</a>
                            </td>
                            <td>
                                <span class="status-badge active">Active</span>
                            </td>
                            <td class="student-count">450</td>
                            <td class="date-cell">2024-04-01</td>
                            <td class="date-cell">2025-03-31</td>
                            <td class="actions-cell">
                                <button class="action-icon view" title="View" onclick="viewBatch('2024-2025')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-icon delete" title="Delete" onclick="deleteBatch('2024-2025')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <tr>
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
                <button class="simple-btn" id="toggleGradeForm"><i class="fas fa-plus"></i> Add Grade</button>
            </div>

            <!-- Add Grade Card Form -->
            <div id="gradeFormCard" class="add-item-card" style="display:none; margin-bottom: 20px;">
                <div class="card-form-header">
                    <h4><i class="fas fa-layer-group"></i> Create Grade</h4>
                    <button class="icon-btn" onclick="closeGradeForm()" title="Close">
                            <i class="fas fa-times"></i>
                        </button>
                </div>
                <div class="card-form-body">
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="gradeLevel">Grade</label>
                            <input type="number" id="gradeLevel" class="form-input" placeholder="e.g., 10">
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="gradeCategory">Category</label>
                            <select id="gradeCategory" class="form-select">
                                <option value="Primary">Primary</option>
                                <option value="Middle">Middle</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-form-actions">
                    <button id="cancelGrade" class="simple-btn secondary" onclick="closeGradeForm()">Cancel</button>
                        <button id="saveGrade" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th>Grade</th>
                            <th>Category</th>
                            <th>Classes</th>
                            <th>Students</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="grade-level">
                                <a href="/admin/academic/grade-detail/1" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 1</strong></a>
                            </td>
                            <td><span class="category-badge primary">Primary</span></td>
                            <td class="class-count">1A, 1B, 1C</td>
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
                        <tr>
                            <td class="grade-level">
                                <a href="/admin/academic/grade-detail/2" class="grade-link" onclick="event.stopPropagation()"><strong>Grade 2</strong></a>
                            </td>
                            <td><span class="category-badge primary">Primary</span></td>
                            <td class="class-count">2A, 2B, 2C</td>
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

            <!-- Add Class Card Form -->
            <div id="classFormCard" class="add-item-card" style="display:none; margin-bottom: 20px;">
                <div class="card-form-header">
                    <h4><i class="fas fa-door-open"></i> Create Class</h4>
                    <button class="icon-btn" onclick="closeClassForm()" title="Close">
                            <i class="fas fa-times"></i>
                        </button>
                </div>
                <div class="card-form-body">
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="className">Class Name</label>
                            <input type="text" id="className" class="form-input" placeholder="e.g., 10-A">
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="classGrade">Grade</label>
                            <select id="classGrade" class="form-select">
                                <option value="">Select Grade</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="classRoom">Room</label>
                            <select id="classRoom" class="form-select">
                                <option value="">Select Room</option>
                                <option value="Room 101">Room 101</option>
                                <option value="Room 102">Room 102</option>
                                <option value="Room 201">Room 201</option>
                                <option value="Room 202">Room 202</option>
                                <option value="Room 301">Room 301</option>
                                <option value="Room 302">Room 302</option>
                                <option value="Room 401">Room 401</option>
                                <option value="Room 402">Room 402</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="classTeacher">Class Teacher</label>
                            <div class="autocomplete-wrapper">
                                <input type="text" id="classTeacher" class="form-input" placeholder="Start typing teacher name or ID" autocomplete="off">
                                <input type="hidden" id="classTeacherId">
                                <div class="autocomplete-suggestions" id="classTeacherSuggestions"></div>
                        </div>
                            <small class="helper-text">Suggestions will appear as you type.</small>
                    </div>
                    </div>
                </div>
                <div class="card-form-actions">
                    <button id="cancelClass" class="simple-btn secondary" onclick="closeClassForm()">Cancel</button>
                    <button id="saveClass" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
                </div>
            </div>
            
            <div class="detail-table-container">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Grade</th>
                            <th>Room</th>
                            <th>Students</th>
                            <th>Class Teacher</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="class-name">
                                <a href="/admin/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()"><strong>1A</strong></a>
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
                        <tr>
                            <td class="class-name">
                                <a href="/admin/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()"><strong>1B</strong></a>
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
                            <th>Room Number</th>
                            <th>Room Name</th>
                            <th>Location</th>
                            <th>Class</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="room-number">
                                <a href="/admin/academic/room-detail/101" class="room-link" onclick="event.stopPropagation()"><strong>101</strong></a>
                            </td>
                            <td>Classroom A</td>
                            <td>Building A · 1st Floor</td>
                            <td><a href="/admin/academic/class-detail/1A" class="class-link" onclick="event.stopPropagation()">Class 1A</a></td>
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
                        <tr>
                            <td class="room-number">
                                <a href="/admin/academic/room-detail/102" class="room-link" onclick="event.stopPropagation()"><strong>102</strong></a>
                            </td>
                            <td>Classroom B</td>
                            <td>Building A · 1st Floor</td>
                            <td><a href="/admin/academic/class-detail/1B" class="class-link" onclick="event.stopPropagation()">Class 1B</a></td>
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
                            <select id="subjectGrade" class="form-select">
                                <option value="">Select Grade</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                            </select>
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
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Category</th>
                            <th>Grade</th>
                            <th>Teachers</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                        <tr>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</div>

<script>
const teacherDirectory = [
    { id: 'T-001', name: 'Ms. Sarah Johnson', subject: 'Mathematics' },
    { id: 'T-002', name: 'Mr. David Chen', subject: 'Science' },
    { id: 'T-003', name: 'Ms. Priya Patel', subject: 'English' },
    { id: 'T-004', name: 'Mr. Liam O\'Connor', subject: 'Social Studies' },
    { id: 'T-005', name: 'Ms. Sophia Martinez', subject: 'Physics' },
    { id: 'T-006', name: 'Mr. Ethan Williams', subject: 'Chemistry' },
    { id: 'T-007', name: 'Ms. Chloe Kim', subject: 'Biology' },
    { id: 'T-008', name: 'Mr. Noah Thompson', subject: 'Computer Science' },
    { id: 'T-009', name: 'Ms. Isabella Rossi', subject: 'History' },
    { id: 'T-010', name: 'Mr. Lucas Silva', subject: 'Geography' }
];

function initTeacherAutocomplete() {
    const teacherInput = document.getElementById('classTeacher');
    const teacherIdInput = document.getElementById('classTeacherId');
    const suggestionsEl = document.getElementById('classTeacherSuggestions');
    if (!teacherInput || !suggestionsEl) return;

    let matches = [];
    let activeIndex = -1;

    const hideSuggestions = () => {
        suggestionsEl.classList.remove('visible');
        suggestionsEl.innerHTML = '';
        activeIndex = -1;
    };

    const renderSuggestions = (query = '') => {
        const normalized = query.trim().toLowerCase();
        matches = normalized
            ? teacherDirectory.filter(t =>
                t.name.toLowerCase().includes(normalized) ||
                t.id.toLowerCase().includes(normalized)
            )
            : teacherDirectory.slice(0, 5);

        if (!matches.length) {
            hideSuggestions();
            return;
        }

        suggestionsEl.innerHTML = matches.map((teacher, index) => `
            <div class="suggestion-item" data-index="${index}">
                <strong>${teacher.name}</strong>
                <span class="suggestion-meta">ID: ${teacher.id}${teacher.subject ? ' • ' + teacher.subject : ''}</span>
            </div>
        `).join('');

        suggestionsEl.classList.add('visible');
        activeIndex = -1;
    };

    const selectTeacher = (teacher) => {
        teacherInput.value = teacher.name;
        if (teacherIdInput) teacherIdInput.value = teacher.id;
        hideSuggestions();
    };

    const setActive = (index) => {
        const items = suggestionsEl.querySelectorAll('.suggestion-item');
        items.forEach(item => item.classList.remove('active'));
        if (index >= 0 && items[index]) {
            items[index].classList.add('active');
        }
        activeIndex = index;
    };

    teacherInput.addEventListener('input', (e) => {
        if (teacherIdInput) teacherIdInput.value = '';
        renderSuggestions(e.target.value);
    });

    teacherInput.addEventListener('focus', () => {
        renderSuggestions(teacherInput.value);
    });

    teacherInput.addEventListener('keydown', (e) => {
        if (!suggestionsEl.classList.contains('visible')) return;

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            const nextIndex = activeIndex + 1 >= matches.length ? 0 : activeIndex + 1;
            setActive(nextIndex);
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            const prevIndex = activeIndex - 1 < 0 ? matches.length - 1 : activeIndex - 1;
            setActive(prevIndex);
        } else if (e.key === 'Enter') {
            if (activeIndex >= 0 && matches[activeIndex]) {
                e.preventDefault();
                selectTeacher(matches[activeIndex]);
            }
        } else if (e.key === 'Escape') {
            hideSuggestions();
        }
    });

    suggestionsEl.addEventListener('click', (e) => {
        const item = e.target.closest('.suggestion-item');
        if (!item) return;
        const index = Number(item.dataset.index);
        if (!Number.isNaN(index) && matches[index]) {
            selectTeacher(matches[index]);
        }
    });

    document.addEventListener('click', (e) => {
        if (!suggestionsEl.contains(e.target) && e.target !== teacherInput) {
            hideSuggestions();
        }
    });
}

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
        tr.innerHTML=`
            <td class="batch-name"><a href="#" class="batch-link">${name}</a></td>
            <td><span class="status-badge active">Active</span></td>
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

    // Grade form toggle
    const toggleGradeForm = document.getElementById('toggleGradeForm');
    const gradeFormCard = document.getElementById('gradeFormCard');
    if (toggleGradeForm && gradeFormCard) {
        toggleGradeForm.addEventListener('click', function() {
            gradeFormCard.style.display = gradeFormCard.style.display === 'none' ? 'block' : 'none';
        });
    }
    
    window.closeGradeForm = function() {
        if (gradeFormCard) {
            gradeFormCard.style.display = 'none';
            document.getElementById('gradeLevel').value = '';
            document.getElementById('gradeCategory').value = 'Primary';
        }
    };

    // Save grade handler
    document.getElementById('saveGrade') && document.getElementById('saveGrade').addEventListener('click', function(){
        const gradeLevel=(document.getElementById('gradeLevel').value||'').trim(); if(!gradeLevel){ alert('Enter grade'); return; }
        const tbody=document.querySelector('#grades-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.innerHTML=`
            <td class="grade-level"><a href="#" class="grade-link"><strong>Grade ${gradeLevel}</strong></a></td>
            <td><span class="category-badge">${(document.getElementById('gradeCategory').value||'')}</span></td>
            <td class="class-count">—</td>
            <td class="student-count">0</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon delete" title="Delete Grade"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
        closeGradeForm();
        showActionStatus('Grade saved successfully!', 'success');
    });

    // Class form toggle
    const toggleClassForm = document.getElementById('toggleClassForm');
    const classFormCard = document.getElementById('classFormCard');
    if (toggleClassForm && classFormCard) {
        toggleClassForm.addEventListener('click', function() {
            classFormCard.style.display = classFormCard.style.display === 'none' ? 'block' : 'none';
        });
    }
    
    window.closeClassForm = function() {
        if (classFormCard) {
            classFormCard.style.display = 'none';
            document.getElementById('className').value = '';
            document.getElementById('classGrade').value = '';
            document.getElementById('classRoom').value = '';
            document.getElementById('classTeacher').value = '';
            document.getElementById('classTeacherId').value = '';
        }
    };

    // Save class handler
    document.getElementById('saveClass') && document.getElementById('saveClass').addEventListener('click', function(){
        const name=(document.getElementById('className').value||'').trim(); if(!name){ alert('Enter class name'); return; }
        const teacherName=(document.getElementById('classTeacher').value||'').trim();
        const teacherId=(document.getElementById('classTeacherId').value||'').trim();
        const teacherDisplay = teacherName ? (teacherId ? `${teacherName} (${teacherId})` : teacherName) : '—';
        const tbody=document.querySelector('#classes-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.innerHTML=`
            <td class="class-name"><a href="#" class="class-link"><strong>${name}</strong></a></td>
            <td>${(document.getElementById('classGrade').value||'')}</td>
            <td>${(document.getElementById('classRoom').value||'')}</td>
            <td class="student-count">0</td>
            <td>${teacherDisplay}</td>
            <td class="actions-cell" onclick="event.stopPropagation()">
                <button class="action-icon view" title="View Details"><i class="fas fa-eye"></i></button>
                <button class="action-icon delete" title="Delete Class"><i class="fas fa-trash"></i></button>
            </td>`;
        tbody.prepend(tr);
        closeClassForm();
        showActionStatus('Class saved successfully!', 'success');
    });
    
    initTeacherAutocomplete();

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
        const tbody=document.querySelector('#subjects-content .academic-table tbody');
        const tr=document.createElement('tr');
        tr.className='expandable-row'; tr.setAttribute('onclick','toggleExpand(this)');
        tr.innerHTML=`
            <td class="expand-cell"><i class="fas fa-chevron-right expand-icon"></i></td>
            <td class="subject-code"><a href="#" class="subject-link" onclick="event.stopPropagation()"><strong>${code}</strong></a></td>
            <td><a href="#" class="subject-link" onclick="event.stopPropagation()">${(document.getElementById('subName').value||'')}</a></td>
            <td><span class="category-badge">${(document.getElementById('subCat').value||'')}</span></td>
            <td>${(document.getElementById('subjectGrade').value||'')}</td>
            <td class="teacher-count">0</td>
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

.academic-table .teacher-count {
    text-align: center;
}

.autocomplete-wrapper {
    position: relative;
}

.autocomplete-suggestions {
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    max-height: 210px;
    overflow-y: auto;
    z-index: 10000;
    display: none;
}

.autocomplete-suggestions.visible {
    display: block;
}

.suggestion-item {
    padding: 0.65rem 0.85rem;
    border-bottom: 1px solid #f1f3ff;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.suggestion-item strong {
    color: #1d1d1f;
    font-size: 0.95rem;
}

.suggestion-meta {
    font-size: 0.8rem;
    color: #555;
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:hover,
.suggestion-item.active {
    background: #f5f8ff;
}

.helper-text {
    display: block;
    margin-top: 0.35rem;
    color: #6b6f80;
    font-size: 0.82rem;
}

.tab-aligned-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.25rem;
    width: 100%;
    margin-bottom: 2rem;
}

.class-modal-content {
    max-width: 580px;
    min-height: 520px;
}

.class-modal-content {
    max-width: 580px;
    min-height: 520px;
}

.class-modal-content .simple-modal-body {
    max-height: none;
}

/* Add Item Card Styles */
.add-item-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.card-form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    background: #f9fafb;
}

.card-form-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1d1d1f;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-form-header h4 i {
    color: #4A90E2;
}

.card-form-header .icon-btn {
    background: none;
    border: none;
    font-size: 1.1rem;
    color: #86868b;
    cursor: pointer;
    padding: 0.4rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-form-header .icon-btn:hover {
    background: #e5e7eb;
    color: #1d1d1f;
}

.card-form-body {
    padding: 1.5rem;
}

.card-form-body .form-row {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.card-form-body .form-row:last-child {
    margin-bottom: 0;
}

.card-form-body .form-group {
    flex: 1;
}

.card-form-body .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #1d1d1f;
    font-size: 0.9rem;
}

.card-form-body .form-input,
.card-form-body .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    font-size: 0.9rem;
    color: #1d1d1f;
    transition: all 0.2s ease;
}

.card-form-body .form-input:focus,
.card-form-body .form-select:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.card-form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    padding: 1.25rem 1.5rem;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
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
</style>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>