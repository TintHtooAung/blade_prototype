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
    </div>
</div>

<!-- Tab Content Container -->
<div class="tab-content-container">
    <!-- Batches Tab Content -->
    <div class="tab-content active" id="batches-content">
        <div class="batch-management-section">
            <div class="section-header">
                <h3 class="section-title">Batch Management</h3>
                <button class="add-btn">
                    <i class="fas fa-plus"></i>
                    Add Batch
                </button>
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
                <button class="add-btn">
                    <i class="fas fa-plus"></i>
                    Add Grade
                </button>
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
                <button class="add-btn">
                    <i class="fas fa-plus"></i>
                    Add Class
                </button>
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
                <button class="add-btn">
                    <i class="fas fa-plus"></i>
                    Add Room
                </button>
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
                <button class="add-btn">
                    <i class="fas fa-plus"></i>
                    Add Subject
                </button>
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
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>