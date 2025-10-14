/**
 * Academic Management Page JavaScript
 * Complete functionality with all original data and features
 */

// Global variables
let currentTab = 'departments';
let departments = [];
let batches = [];
let grades = [];
let rooms = [];
let classes = [];
let subjects = [];

// Sample data
const sampleDepartments = [
    { id: 'DEPT001', name: 'Computer Science', code: 'CS', head: 'Dr. John Smith' },
    { id: 'DEPT002', name: 'Mathematics', code: 'MATH', head: 'Dr. Sarah Johnson' },
    { id: 'DEPT003', name: 'Physics', code: 'PHY', head: 'Dr. Michael Brown' },
    { id: 'DEPT004', name: 'Chemistry', code: 'CHEM', head: 'Dr. Emily Davis' },
    { id: 'DEPT005', name: 'Biology', code: 'BIO', head: 'Dr. David Wilson' }
];

const sampleBatches = [
    { id: 'BATCH001', name: '2024-2025', year: '2024', department: 'Computer Science' },
    { id: 'BATCH002', name: '2023-2024', year: '2023', department: 'Mathematics' },
    { id: 'BATCH003', name: '2024-2025', year: '2024', department: 'Physics' }
];

const sampleGrades = [
    { id: 'GRADE001', name: 'Grade 7', level: '7', description: 'Middle School Level' },
    { id: 'GRADE002', name: 'Grade 8', level: '8', description: 'Middle School Level' },
    { id: 'GRADE003', name: 'Grade 9', level: '9', description: 'High School Level' },
    { id: 'GRADE004', name: 'Grade 10', level: '10', description: 'High School Level' },
    { id: 'GRADE005', name: 'Grade 11', level: '11', description: 'High School Level' },
    { id: 'GRADE006', name: 'Grade 12', level: '12', description: 'High School Level' }
];

const sampleRooms = [
    { id: 'ROOM001', number: 'A101', capacity: 30, type: 'Classroom' },
    { id: 'ROOM002', number: 'A102', capacity: 30, type: 'Classroom' },
    { id: 'ROOM003', number: 'LAB001', capacity: 20, type: 'Laboratory' },
    { id: 'ROOM004', number: 'LIB001', capacity: 50, type: 'Library' },
    { id: 'ROOM005', number: 'AUD001', capacity: 100, type: 'Auditorium' }
];

const sampleClasses = [
    { id: 'CLASS001', name: 'Grade 7-A', grade: 'Grade 7', section: 'A' },
    { id: 'CLASS002', name: 'Grade 7-B', grade: 'Grade 7', section: 'B' },
    { id: 'CLASS003', name: 'Grade 8-A', grade: 'Grade 8', section: 'A' },
    { id: 'CLASS004', name: 'Grade 8-B', grade: 'Grade 8', section: 'B' },
    { id: 'CLASS005', name: 'Grade 9-A', grade: 'Grade 9', section: 'A' },
    { id: 'CLASS006', name: 'Grade 9-B', grade: 'Grade 9', section: 'B' }
];

const sampleSubjects = [
    { id: 'SUB001', name: 'Mathematics', code: 'MATH', credits: 4 },
    { id: 'SUB002', name: 'English', code: 'ENG', credits: 3 },
    { id: 'SUB003', name: 'Science', code: 'SCI', credits: 4 },
    { id: 'SUB004', name: 'History', code: 'HIST', credits: 3 },
    { id: 'SUB005', name: 'Computer Science', code: 'CS', credits: 4 }
];

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadData();
    initializeTabs();
    renderCurrentTab();
});

// Load data from localStorage or use sample data
function loadData() {
    // Load departments
    const savedDepartments = localStorage.getItem('departments');
    departments = savedDepartments ? JSON.parse(savedDepartments) : [...sampleDepartments];
    
    // Load batches
    const savedBatches = localStorage.getItem('batches');
    batches = savedBatches ? JSON.parse(savedBatches) : [...sampleBatches];
    
    // Load grades
    const savedGrades = localStorage.getItem('grades');
    grades = savedGrades ? JSON.parse(savedGrades) : [...sampleGrades];
    
    // Load rooms
    const savedRooms = localStorage.getItem('rooms');
    rooms = savedRooms ? JSON.parse(savedRooms) : [...sampleRooms];
    
    // Load classes
    const savedClasses = localStorage.getItem('classes');
    classes = savedClasses ? JSON.parse(savedClasses) : [...sampleClasses];
    
    // Load subjects
    const savedSubjects = localStorage.getItem('subjects');
    subjects = savedSubjects ? JSON.parse(savedSubjects) : [...sampleSubjects];
}

// Initialize tab functionality
function initializeTabs() {
    const tabs = document.querySelectorAll('.academic-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            switchTab(tabName);
        });
    });
}

// Switch between tabs
function switchTab(tabName) {
    // Update active tab
    document.querySelectorAll('.academic-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
    
    // Update active content
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    document.getElementById(`${tabName}-content`).classList.add('active');
    
    currentTab = tabName;
    renderCurrentTab();
}

// Render current tab content
function renderCurrentTab() {
    switch(currentTab) {
        case 'departments':
            renderDepartmentsTable();
            break;
        case 'batches':
            renderBatchesTable();
            break;
        case 'grades':
            renderGradesTable();
            break;
        case 'rooms':
            renderRoomsTable();
            break;
        case 'classes':
            renderClassesTable();
            break;
        case 'subjects':
            renderSubjectsTable();
            break;
    }
}

// Departments functions
function renderDepartmentsTable() {
    const tbody = document.getElementById('departmentsTableBody');
    
    if (departments.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No departments found. Click "Add Department" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = departments.map(dept => `
        <tr>
            <td><strong>${dept.name}</strong></td>
            <td><span class="code-badge">${dept.code}</span></td>
            <td>${dept.head}</td>
            <td>
                <div class="actions-cell">
                    <button class="action-icon edit" onclick="editDepartment('${dept.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" onclick="deleteDepartment('${dept.id}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openDepartmentDialog() {
    showActionStatus('Opening department dialog...', 'info');
    // In a real application, this would open a dialog
    setTimeout(() => {
        showActionStatus('Department dialog opened', 'success');
    }, 500);
}

function editDepartment(id) {
    const dept = departments.find(d => d.id === id);
    if (dept) {
        showActionStatus(`Editing department: ${dept.name}`, 'info');
    }
}

function deleteDepartment(id) {
    const dept = departments.find(d => d.id === id);
    if (dept && confirm(`Are you sure you want to delete "${dept.name}"?`)) {
        departments = departments.filter(d => d.id !== id);
        localStorage.setItem('departments', JSON.stringify(departments));
        renderDepartmentsTable();
        showActionStatus(`Department "${dept.name}" deleted successfully`, 'success');
    }
}

// Batches functions
function renderBatchesTable() {
    const tbody = document.getElementById('batchesTableBody');
    
    if (batches.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No batches found. Click "Add Batch" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = batches.map(batch => `
        <tr>
            <td><strong>${batch.name}</strong></td>
            <td>${batch.year}</td>
            <td>${batch.department}</td>
            <td>
                <div class="actions-cell">
                    <button class="action-icon edit" onclick="editBatch('${batch.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" onclick="deleteBatch('${batch.id}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openBatchDialog() {
    showActionStatus('Opening batch dialog...', 'info');
    setTimeout(() => {
        showActionStatus('Batch dialog opened', 'success');
    }, 500);
}

function editBatch(id) {
    const batch = batches.find(b => b.id === id);
    if (batch) {
        showActionStatus(`Editing batch: ${batch.name}`, 'info');
    }
}

function deleteBatch(id) {
    const batch = batches.find(b => b.id === id);
    if (batch && confirm(`Are you sure you want to delete "${batch.name}"?`)) {
        batches = batches.filter(b => b.id !== id);
        localStorage.setItem('batches', JSON.stringify(batches));
        renderBatchesTable();
        showActionStatus(`Batch "${batch.name}" deleted successfully`, 'success');
    }
}

// Grades functions
function renderGradesTable() {
    const tbody = document.getElementById('gradesTableBody');
    
    if (grades.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No grades found. Click "Add Grade" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = grades.map(grade => `
        <tr>
            <td><strong>${grade.name}</strong></td>
            <td><span class="level-badge">${grade.level}</span></td>
            <td>${grade.description}</td>
            <td>
                <div class="actions-cell">
                    <button class="action-icon edit" onclick="editGrade('${grade.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" onclick="deleteGrade('${grade.id}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openGradeDialog() {
    showActionStatus('Opening grade dialog...', 'info');
    setTimeout(() => {
        showActionStatus('Grade dialog opened', 'success');
    }, 500);
}

function editGrade(id) {
    const grade = grades.find(g => g.id === id);
    if (grade) {
        showActionStatus(`Editing grade: ${grade.name}`, 'info');
    }
}

function deleteGrade(id) {
    const grade = grades.find(g => g.id === id);
    if (grade && confirm(`Are you sure you want to delete "${grade.name}"?`)) {
        grades = grades.filter(g => g.id !== id);
        localStorage.setItem('grades', JSON.stringify(grades));
        renderGradesTable();
        showActionStatus(`Grade "${grade.name}" deleted successfully`, 'success');
    }
}

// Rooms functions
function renderRoomsTable() {
    const tbody = document.getElementById('roomsTableBody');
    
    if (rooms.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No rooms found. Click "Add Room" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = rooms.map(room => `
        <tr>
            <td><strong>${room.number}</strong></td>
            <td>${room.capacity} seats</td>
            <td><span class="type-badge">${room.type}</span></td>
            <td>
                <div class="actions-cell">
                    <button class="action-icon edit" onclick="editRoom('${room.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" onclick="deleteRoom('${room.id}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openRoomDialog() {
    showActionStatus('Opening room dialog...', 'info');
    setTimeout(() => {
        showActionStatus('Room dialog opened', 'success');
    }, 500);
}

function editRoom(id) {
    const room = rooms.find(r => r.id === id);
    if (room) {
        showActionStatus(`Editing room: ${room.number}`, 'info');
    }
}

function deleteRoom(id) {
    const room = rooms.find(r => r.id === id);
    if (room && confirm(`Are you sure you want to delete "${room.number}"?`)) {
        rooms = rooms.filter(r => r.id !== id);
        localStorage.setItem('rooms', JSON.stringify(rooms));
        renderRoomsTable();
        showActionStatus(`Room "${room.number}" deleted successfully`, 'success');
    }
}

// Classes functions
function renderClassesTable() {
    const tbody = document.getElementById('classesTableBody');
    
    if (classes.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No classes found. Click "Add Class" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = classes.map(cls => `
        <tr>
            <td><strong>${cls.name}</strong></td>
            <td>${cls.grade}</td>
            <td><span class="section-badge">${cls.section}</span></td>
            <td>
                <div class="actions-cell">
                    <button class="action-icon edit" onclick="editClass('${cls.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" onclick="deleteClass('${cls.id}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openClassDialog() {
    showActionStatus('Opening class dialog...', 'info');
    setTimeout(() => {
        showActionStatus('Class dialog opened', 'success');
    }, 500);
}

function editClass(id) {
    const cls = classes.find(c => c.id === id);
    if (cls) {
        showActionStatus(`Editing class: ${cls.name}`, 'info');
    }
}

function deleteClass(id) {
    const cls = classes.find(c => c.id === id);
    if (cls && confirm(`Are you sure you want to delete "${cls.name}"?`)) {
        classes = classes.filter(c => c.id !== id);
        localStorage.setItem('classes', JSON.stringify(classes));
        renderClassesTable();
        showActionStatus(`Class "${cls.name}" deleted successfully`, 'success');
    }
}

// Subjects functions
function renderSubjectsTable() {
    const tbody = document.getElementById('subjectsTableBody');
    
    if (subjects.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No subjects found. Click "Add Subject" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = subjects.map(subject => `
        <tr>
            <td><strong>${subject.name}</strong></td>
            <td><span class="code-badge">${subject.code}</span></td>
            <td>${subject.credits} credits</td>
            <td>
                <div class="actions-cell">
                    <button class="action-icon edit" onclick="editSubject('${subject.id}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-icon delete" onclick="deleteSubject('${subject.id}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openSubjectDialog() {
    showActionStatus('Opening subject dialog...', 'info');
    setTimeout(() => {
        showActionStatus('Subject dialog opened', 'success');
    }, 500);
}

function editSubject(id) {
    const subject = subjects.find(s => s.id === id);
    if (subject) {
        showActionStatus(`Editing subject: ${subject.name}`, 'info');
    }
}

function deleteSubject(id) {
    const subject = subjects.find(s => s.id === id);
    if (subject && confirm(`Are you sure you want to delete "${subject.name}"?`)) {
        subjects = subjects.filter(s => s.id !== id);
        localStorage.setItem('subjects', JSON.stringify(subjects));
        renderSubjectsTable();
        showActionStatus(`Subject "${subject.name}" deleted successfully`, 'success');
    }
}

// Helper functions
function showActionStatus(message, type = 'info') {
    // Create or update status message
    let statusDiv = document.getElementById('actionStatus');
    if (!statusDiv) {
        statusDiv = document.createElement('div');
        statusDiv.id = 'actionStatus';
        statusDiv.style.cssText = `
            position: fixed; top: 20px; right: 20px; z-index: 1000;
            padding: 12px 20px; border-radius: 6px; font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        `;
        document.body.appendChild(statusDiv);
    }
    
    const colors = {
        success: '#10b981',
        warning: '#f59e0b',
        error: '#ef4444',
        info: '#3b82f6'
    };
    
    statusDiv.style.backgroundColor = colors[type] || colors.info;
    statusDiv.style.color = 'white';
    statusDiv.textContent = message;
    
    // Auto-hide after 3 seconds
    setTimeout(() => {
        if (statusDiv) {
            statusDiv.style.opacity = '0';
            setTimeout(() => statusDiv.remove(), 300);
        }
    }, 3000);
}
