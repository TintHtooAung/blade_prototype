<?php
$pageTitle = 'Smart Campus Nova Hub - Class Management';
$pageIcon = 'fas fa-chalkboard';
$pageHeading = 'Class Management';
$activePage = 'classes';

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

<!-- My Classes Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-chalkboard"></i> My Classes</h3>
        <div class="simple-actions">
            <div class="filter-group">
                <label for="gradeFilter">Filter by Grade:</label>
                <select id="gradeFilter" class="form-select compact" onchange="filterClassesByGrade()">
                    <option value="all">All Grades</option>
                    <option value="Grade 10">Grade 10</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="subjectFilter">Filter by Subject:</label>
                <select id="subjectFilter" class="form-select compact" onchange="filterClassesBySubject()">
                    <option value="all">All Subjects</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="class-cards-container" id="classCards">
        <!-- Class cards will be populated here -->
    </div>
</div>

<!-- Class Details Modal -->
<div id="classDetailsModal" class="modal-overlay" style="display: none;">
    <div class="modal-container large">
        <div class="modal-header">
            <h3 id="modalClassTitle">Class Details</h3>
            <button class="modal-close" onclick="closeClassDetailsModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="class-details-content">
                <!-- Class info will be populated here -->
            </div>
        </div>
    </div>
</div>

<style>
/* Class Cards Container */
.class-cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Class Card */
.class-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.class-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    border-color: #1976d2;
}

.class-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #1976d2, #42a5f5);
}

/* Class Header */
.class-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 16px;
}

.class-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.class-grade {
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Class Info */
.class-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    color: #666;
}

.info-item i {
    width: 16px;
    color: #1976d2;
    font-size: 0.8rem;
}

/* Class Stats */
.class-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid #f0f0f0;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1976d2;
    display: block;
}

.stat-label {
    font-size: 0.75rem;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Class Actions */
.class-actions {
    display: flex;
    gap: 8px;
    margin-top: 16px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.class-card:hover .class-actions {
    opacity: 1;
}

.action-btn {
    flex: 1;
    padding: 8px 12px;
    border: none;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.action-btn.primary {
    background: #1976d2;
    color: #fff;
}

.action-btn.secondary {
    background: #f5f5f5;
    color: #666;
    border: 1px solid #ddd;
}

.action-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
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

/* Modal Styles */
.modal-container.large {
    max-width: 800px;
    width: 90%;
}

.class-details-content {
    display: grid;
    gap: 24px;
}

.details-section {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
}

.details-section h4 {
    margin: 0 0 16px 0;
    color: #333;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.details-section h4 i {
    color: #1976d2;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.detail-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.detail-label {
    font-size: 0.8rem;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 500;
}

.detail-value {
    font-size: 0.95rem;
    color: #333;
    font-weight: 500;
}

/* Student List */
.student-list {
    display: grid;
    gap: 8px;
    max-height: 300px;
    overflow-y: auto;
}

.student-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #fff;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
}

.student-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #1976d2;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 600;
}

.student-info {
    flex: 1;
}

.student-name {
    font-weight: 500;
    color: #333;
    margin: 0;
}

.student-id {
    font-size: 0.8rem;
    color: #666;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .class-cards-container {
        grid-template-columns: 1fr;
    }
    
    .class-info {
        grid-template-columns: 1fr;
    }
    
    .class-stats {
        flex-direction: column;
        gap: 12px;
    }
    
    .filter-group {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }
    
    .simple-actions {
        flex-direction: column;
        gap: 12px;
    }
}
</style>

<script>
// Teacher's class data (connected to admin portal data)
const teacherClasses = [
    {
        id: 1,
        className: 'Grade 10A',
        subject: 'Mathematics',
        grade: 'Grade 10',
        room: 'Room 201',
        studentCount: 30,
        schedule: 'Mon, Wed, Fri - 8:00-9:00',
        teacher: 'Ms. Sarah Johnson',
        students: [
            { id: 1, name: 'John Smith', studentId: 'ST001' },
            { id: 2, name: 'Sarah Johnson', studentId: 'ST002' },
            { id: 3, name: 'Mike Wilson', studentId: 'ST003' },
            { id: 4, name: 'Emma Davis', studentId: 'ST004' },
            { id: 5, name: 'David Brown', studentId: 'ST005' },
            { id: 6, name: 'Lisa Anderson', studentId: 'ST006' },
            { id: 7, name: 'Tom Miller', studentId: 'ST007' },
            { id: 8, name: 'Anna Taylor', studentId: 'ST008' }
        ]
    },
    {
        id: 2,
        className: 'Grade 10B',
        subject: 'Mathematics',
        grade: 'Grade 10',
        room: 'Room 202',
        studentCount: 28,
        schedule: 'Tue, Thu - 9:00-10:00',
        teacher: 'Ms. Sarah Johnson',
        students: [
            { id: 9, name: 'Chris Lee', studentId: 'ST009' },
            { id: 10, name: 'Maria Garcia', studentId: 'ST010' },
            { id: 11, name: 'James Wilson', studentId: 'ST011' },
            { id: 12, name: 'Sophie Clark', studentId: 'ST012' },
            { id: 13, name: 'Ryan Murphy', studentId: 'ST013' },
            { id: 14, name: 'Olivia White', studentId: 'ST014' },
            { id: 15, name: 'Daniel Green', studentId: 'ST015' }
        ]
    },
    {
        id: 3,
        className: 'Grade 11A',
        subject: 'Physics',
        grade: 'Grade 11',
        room: 'Room 205',
        studentCount: 25,
        schedule: 'Mon, Wed, Fri - 10:00-11:00',
        teacher: 'Ms. Sarah Johnson',
        students: [
            { id: 16, name: 'Alex Turner', studentId: 'ST016' },
            { id: 17, name: 'Grace Hall', studentId: 'ST017' },
            { id: 18, name: 'Noah King', studentId: 'ST018' },
            { id: 19, name: 'Zoe Scott', studentId: 'ST019' },
            { id: 20, name: 'Ethan Young', studentId: 'ST020' },
            { id: 21, name: 'Lucas Adams', studentId: 'ST021' },
            { id: 22, name: 'Maya Patel', studentId: 'ST022' }
        ]
    },
    {
        id: 4,
        className: 'Grade 11B',
        subject: 'Physics',
        grade: 'Grade 11',
        room: 'Room 206',
        studentCount: 27,
        schedule: 'Tue, Thu - 11:00-12:00',
        teacher: 'Ms. Sarah Johnson',
        students: [
            { id: 23, name: 'Caleb Wright', studentId: 'ST023' },
            { id: 24, name: 'Lily Martinez', studentId: 'ST024' },
            { id: 25, name: 'Owen Thompson', studentId: 'ST025' },
            { id: 26, name: 'Sophia Chen', studentId: 'ST026' },
            { id: 27, name: 'Marcus Johnson', studentId: 'ST027' },
            { id: 28, name: 'Isabella Rodriguez', studentId: 'ST028' },
            { id: 29, name: 'Nathan Kim', studentId: 'ST029' },
            { id: 30, name: 'Ava Thompson', studentId: 'ST030' }
        ]
    },
    {
        id: 5,
        className: 'Grade 12A',
        subject: 'Chemistry',
        grade: 'Grade 12',
        room: 'Room 203',
        studentCount: 24,
        schedule: 'Mon, Wed, Fri - 2:00-3:00',
        teacher: 'Ms. Sarah Johnson',
        students: [
            { id: 31, name: 'Benjamin Lee', studentId: 'ST031' },
            { id: 32, name: 'Chloe Williams', studentId: 'ST032' },
            { id: 33, name: 'Samuel Brown', studentId: 'ST033' },
            { id: 34, name: 'Hannah Davis', studentId: 'ST034' },
            { id: 35, name: 'Gabriel Miller', studentId: 'ST035' },
            { id: 36, name: 'Abigail Wilson', studentId: 'ST036' }
        ]
    },
    {
        id: 6,
        className: 'Grade 12B',
        subject: 'Chemistry',
        grade: 'Grade 12',
        room: 'Room 204',
        studentCount: 26,
        schedule: 'Tue, Thu - 1:00-2:00',
        teacher: 'Ms. Sarah Johnson',
        students: [
            { id: 37, name: 'William Taylor', studentId: 'ST037' },
            { id: 38, name: 'Emily Anderson', studentId: 'ST038' },
            { id: 39, name: 'Christopher Moore', studentId: 'ST039' },
            { id: 40, name: 'Madison Jackson', studentId: 'ST040' },
            { id: 41, name: 'Andrew White', studentId: 'ST041' },
            { id: 42, name: 'Samantha Harris', studentId: 'ST042' },
            { id: 43, name: 'Joshua Martin', studentId: 'ST043' }
        ]
    }
];

let currentGradeFilter = 'all';
let currentSubjectFilter = 'all';

// Initialize class management page
document.addEventListener('DOMContentLoaded', function() {
    renderClassCards();
});

function renderClassCards() {
    const container = document.getElementById('classCards');
    container.innerHTML = '';
    
    let filteredClasses = teacherClasses;
    
    // Apply grade filter
    if (currentGradeFilter !== 'all') {
        filteredClasses = filteredClasses.filter(cls => cls.grade === currentGradeFilter);
    }
    
    // Apply subject filter
    if (currentSubjectFilter !== 'all') {
        filteredClasses = filteredClasses.filter(cls => cls.subject === currentSubjectFilter);
    }
    
    filteredClasses.forEach(classData => {
        const card = createClassCard(classData);
        container.appendChild(card);
    });
}

function createClassCard(classData) {
    const card = document.createElement('div');
    card.className = 'class-card';
    card.onclick = () => openClassDetails(classData);
    
    card.innerHTML = `
        <div class="class-header">
            <h3 class="class-title">${classData.className}</h3>
            <span class="class-grade">${classData.grade}</span>
        </div>
        
        <div class="class-info">
            <div class="info-item">
                <i class="fas fa-book"></i>
                <span>${classData.subject}</span>
            </div>
            <div class="info-item">
                <i class="fas fa-door-open"></i>
                <span>${classData.room}</span>
            </div>
            <div class="info-item">
                <i class="fas fa-clock"></i>
                <span>${classData.schedule}</span>
            </div>
            <div class="info-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>${classData.teacher}</span>
            </div>
        </div>
        
        <div class="class-stats">
            <div class="stat-item">
                <span class="stat-number">${classData.studentCount}</span>
                <span class="stat-label">Students</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">${classData.students.length}</span>
                <span class="stat-label">Active</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">${Math.floor(Math.random() * 5) + 1}</span>
                <span class="stat-label">Subjects</span>
            </div>
        </div>
        
        <div class="class-actions">
            <button class="action-btn primary" onclick="event.stopPropagation(); openClassDetails(${classData.id})">
                <i class="fas fa-eye"></i> View Details
            </button>
            <button class="action-btn secondary" onclick="event.stopPropagation(); viewStudents(${classData.id})">
                <i class="fas fa-users"></i> Students
            </button>
        </div>
    `;
    
    return card;
}

function filterClassesByGrade() {
    currentGradeFilter = document.getElementById('gradeFilter').value;
    renderClassCards();
}

function filterClassesBySubject() {
    currentSubjectFilter = document.getElementById('subjectFilter').value;
    renderClassCards();
}

function openClassDetails(classData) {
    const modal = document.getElementById('classDetailsModal');
    const classObj = typeof classData === 'number' 
        ? teacherClasses.find(c => c.id === classData)
        : classData;
    
    if (!classObj) return;
    
    // Update modal title
    document.getElementById('modalClassTitle').textContent = `${classObj.className} - ${classObj.subject}`;
    
    // Populate class details
    const content = document.querySelector('.class-details-content');
    content.innerHTML = `
        <div class="details-section">
            <h4><i class="fas fa-info-circle"></i> Class Information</h4>
            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-label">Class Name</div>
                    <div class="detail-value">${classObj.className}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Subject</div>
                    <div class="detail-value">${classObj.subject}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Grade</div>
                    <div class="detail-value">${classObj.grade}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Room</div>
                    <div class="detail-value">${classObj.room}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Schedule</div>
                    <div class="detail-value">${classObj.schedule}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Teacher</div>
                    <div class="detail-value">${classObj.teacher}</div>
                </div>
            </div>
        </div>
        
        <div class="details-section">
            <h4><i class="fas fa-users"></i> Students (${classObj.students.length})</h4>
            <div class="student-list">
                ${classObj.students.map(student => `
                    <div class="student-item">
                        <div class="student-avatar">${student.name.split(' ').map(n => n[0]).join('')}</div>
                        <div class="student-info">
                            <div class="student-name">${student.name}</div>
                            <div class="student-id">${student.studentId}</div>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;
    
    modal.style.display = 'block';
}

function closeClassDetailsModal() {
    document.getElementById('classDetailsModal').style.display = 'none';
}

function viewStudents(classId) {
    const classData = teacherClasses.find(c => c.id === classId);
    if (classData) {
        openClassDetails(classData);
    }
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('classDetailsModal');
    if (event.target === modal) {
        closeClassDetailsModal();
    }
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
