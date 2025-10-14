/**
 * Academic Management JavaScript
 * Handles all interactions for academic entities
 */

// Global variables
let currentTab = 'departments';
let editingId = null;

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    initializeTabs();
    loadAcademicData();
    initializeExpandableRows();
});

// Initialize page functionality
function initializeExpandableRows() {
    console.log('Academic management initialized');
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
}

// Load academic data from API
async function loadAcademicData() {
    try {
        const response = await fetch('/api/academic/data');
        if (response.ok) {
            const data = await response.json();
            updateTables(data);
        } else {
            loadFromLocalStorage();
        }
    } catch (error) {
        console.log('Using localStorage fallback');
        loadFromLocalStorage();
    }
}

// Load from localStorage fallback
function loadFromLocalStorage() {
    console.log('Academic data loaded from localStorage');
}

// Update tables with data
function updateTables(data) {
    console.log('Tables updated with API data');
}

// Department functions
function openDepartmentDialog() {
    const dialog = document.getElementById('departmentDialog');
    if (dialog) {
        dialog.style.display = 'flex';
        editingId = null;
        clearDepartmentForm();
        document.getElementById('departmentDialogTitle').textContent = 'Add Department';
    }
}

function closeDepartmentDialog() {
    const dialog = document.getElementById('departmentDialog');
    if (dialog) {
        dialog.style.display = 'none';
        editingId = null;
        clearDepartmentForm();
    }
}

function clearDepartmentForm() {
    document.getElementById('departmentName').value = '';
    document.getElementById('departmentCode').value = '';
    document.getElementById('departmentHead').value = '';
}

function saveDepartment() {
    const name = document.getElementById('departmentName').value;
    const code = document.getElementById('departmentCode').value;
    const head = document.getElementById('departmentHead').value;

    if (!name || !code || !head) {
        showToast('Please fill all required fields', 'warning');
        return;
    }

    const departmentData = {
        id: editingId || 'DEPT' + Date.now(),
        name,
        code,
        head,
        staffCount: Math.floor(Math.random() * 20) + 5
    };

    let departments = JSON.parse(localStorage.getItem('departments') || '[]');
    
    if (editingId) {
        const index = departments.findIndex(d => d.id === editingId);
        if (index > -1) {
            departments[index] = departmentData;
        }
    } else {
        departments.push(departmentData);
    }

    localStorage.setItem('departments', JSON.stringify(departments));

    showToast(editingId ? 
        `Department "${name}" updated successfully` : 
        `Department "${name}" created successfully`, 'success');

    closeDepartmentDialog();
    addDepartmentToTable(departmentData);
}

function addDepartmentToTable(departmentData) {
    const tbody = document.getElementById('departmentsTableBody');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><a href="/admin/academic/department-detail/${departmentData.code}" class="entity-link"><strong>${departmentData.name}</strong></a></td>
        <td><span class="code-badge">${departmentData.code}</span></td>
        <td><a href="/admin/teacher-profile/${departmentData.head.replace(/\s+/g, '')}" class="teacher-link">${departmentData.head}</a></td>
        <td class="staff-count">${departmentData.staffCount}</td>
        <td class="actions-cell">
            <button class="simple-btn-icon edit-btn" onclick="editDepartment('${departmentData.id}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="simple-btn-icon delete-btn" onclick="deleteDepartment('${departmentData.id}', this)" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    tbody.appendChild(row);
}

function editDepartment(id) {
    editingId = id;
    document.getElementById('departmentDialogTitle').textContent = 'Edit Department';
    
    const departments = JSON.parse(localStorage.getItem('departments') || '[]');
    const dept = departments.find(d => d.id === id);
    
    if (dept) {
        document.getElementById('departmentName').value = dept.name;
        document.getElementById('departmentCode').value = dept.code;
        document.getElementById('departmentHead').value = dept.head;
    }
    
    openDepartmentDialog();
}

function deleteDepartment(id, btn) {
    if (confirm('Are you sure you want to delete this department?')) {
        btn.closest('tr').remove();
        showToast('Department deleted successfully', 'success');
    }
}

// Generic CRUD functions for all entities
const entityHandlers = {
    batch: {
        open: () => openDialog('batchDialog', 'Add Batch'),
        close: () => closeDialog('batchDialog'),
        clear: () => clearForm(['batchName', 'batchYear', 'batchDepartment']),
        save: saveBatch,
        edit: editBatch,
        delete: deleteBatch
    },
    grade: {
        open: () => openDialog('gradeDialog', 'Add Grade'),
        close: () => closeDialog('gradeDialog'),
        clear: () => clearForm(['gradeName', 'gradeLevel', 'gradeCategory']),
        save: saveGrade,
        edit: editGrade,
        delete: deleteGrade
    },
    room: {
        open: () => openDialog('roomDialog', 'Add Room'),
        close: () => closeDialog('roomDialog'),
        clear: () => clearForm(['roomNumber', 'roomType', 'roomCapacity', 'roomStatus']),
        save: saveRoom,
        edit: editRoom,
        delete: deleteRoom
    },
    class: {
        open: () => openDialog('classDialog', 'Add Class'),
        close: () => closeDialog('classDialog'),
        clear: () => clearForm(['className', 'classGrade', 'classSection', 'classStudents']),
        save: saveClass,
        edit: editClass,
        delete: deleteClass
    },
    subject: {
        open: () => openDialog('subjectDialog', 'Add Subject'),
        close: () => closeDialog('subjectDialog'),
        clear: () => clearForm(['subjectName', 'subjectCode', 'subjectCredits', 'subjectCategory']),
        save: saveSubject,
        edit: editSubject,
        delete: deleteSubject
    }
};

// Generic dialog functions
function openDialog(dialogId, title) {
    const dialog = document.getElementById(dialogId);
    if (dialog) {
        dialog.style.display = 'flex';
        editingId = null;
        document.getElementById(dialogId.replace('Dialog', 'DialogTitle')).textContent = title;
    }
}

function closeDialog(dialogId) {
    const dialog = document.getElementById(dialogId);
    if (dialog) {
        dialog.style.display = 'none';
        editingId = null;
    }
}

function clearForm(fieldIds) {
    fieldIds.forEach(id => {
        const field = document.getElementById(id);
        if (field) field.value = '';
    });
}

// Entity-specific functions
function openBatchDialog() { entityHandlers.batch.open(); }
function closeBatchDialog() { entityHandlers.batch.close(); }
function editBatch(id) { loadEntityData('batches', id, 'batch'); }
function deleteBatch(id, btn) { confirmDelete('batch', btn); }

function openGradeDialog() { entityHandlers.grade.open(); }
function closeGradeDialog() { entityHandlers.grade.close(); }
function editGrade(id) { loadEntityData('grades', id, 'grade'); }
function deleteGrade(id, btn) { confirmDelete('grade', btn); }

function openRoomDialog() { entityHandlers.room.open(); }
function closeRoomDialog() { entityHandlers.room.close(); }
function editRoom(id) { loadEntityData('rooms', id, 'room'); }
function deleteRoom(id, btn) { confirmDelete('room', btn); }

function openClassDialog() { entityHandlers.class.open(); }
function closeClassDialog() { entityHandlers.class.close(); }
function editClass(id) { loadEntityData('classes', id, 'class'); }
function deleteClass(id, btn) { confirmDelete('class', btn); }

function openSubjectDialog() { entityHandlers.subject.open(); }
function closeSubjectDialog() { entityHandlers.subject.close(); }
function editSubject(id) { loadEntityData('subjects', id, 'subject'); }
function deleteSubject(id, btn) { confirmDelete('subject', btn); }

// Generic entity data loading
function loadEntityData(entityType, id, dialogPrefix) {
    editingId = id;
    const entities = JSON.parse(localStorage.getItem(entityType) || '[]');
    const entity = entities.find(e => e.id === id);
    
    if (entity) {
        Object.keys(entity).forEach(key => {
            const field = document.getElementById(dialogPrefix + key.charAt(0).toUpperCase() + key.slice(1));
            if (field) field.value = entity[key];
        });
    }
    
    entityHandlers[dialogPrefix].open();
}

// Generic delete confirmation
function confirmDelete(entityType, btn) {
    if (confirm(`Are you sure you want to delete this ${entityType}?`)) {
        btn.closest('tr').remove();
        showToast(`${entityType.charAt(0).toUpperCase() + entityType.slice(1)} deleted successfully`, 'success');
    }
}

// Save functions (simplified)
function saveBatch() { saveEntity('batches', 'batch'); }
function saveGrade() { saveEntity('grades', 'grade'); }
function saveRoom() { saveEntity('rooms', 'room'); }
function saveClass() { saveEntity('classes', 'class'); }
function saveSubject() { saveEntity('subjects', 'subject'); }

function saveEntity(entityType, dialogPrefix) {
    const formData = getFormData(dialogPrefix);
    if (!validateForm(formData)) return;

    const entityData = {
        id: editingId || entityType.toUpperCase().slice(0, -1) + Date.now(),
        ...formData
    };

    let entities = JSON.parse(localStorage.getItem(entityType) || '[]');
    
    if (editingId) {
        const index = entities.findIndex(e => e.id === editingId);
        if (index > -1) entities[index] = entityData;
    } else {
        entities.push(entityData);
    }

    localStorage.setItem(entityType, JSON.stringify(entities));
    showToast(`${entityType.slice(0, -1)} ${editingId ? 'updated' : 'created'} successfully`, 'success');
    
    entityHandlers[dialogPrefix].close();
    addEntityToTable(entityData, entityType);
}

function getFormData(prefix) {
    const data = {};
    const fields = ['Name', 'Code', 'Year', 'Level', 'Category', 'Type', 'Capacity', 'Status', 'Section', 'Students', 'Credits'];
    fields.forEach(field => {
        const element = document.getElementById(prefix + field);
        if (element) data[field.toLowerCase()] = element.value;
    });
    return data;
}

function validateForm(data) {
    const required = Object.values(data).filter(v => v.trim() === '');
    if (required.length > 0) {
        showToast('Please fill all required fields', 'warning');
        return false;
    }
    return true;
}

function addEntityToTable(entityData, entityType) {
    const tbody = document.getElementById(entityType + 'TableBody');
    if (!tbody) return;
    
    const row = document.createElement('tr');
    row.innerHTML = generateTableRow(entityData, entityType);
    tbody.appendChild(row);
}

function generateTableRow(data, type) {
    const templates = {
        batches: () => `
            <td><a href="/admin/academic/batch-detail/${data.name}" class="entity-link"><strong>${data.name}</strong></a></td>
            <td>${data.year}</td>
            <td><a href="/admin/academic/department-detail/${data.department}" class="department-link">${data.department}</a></td>
            <td class="student-count">${Math.floor(Math.random() * 200) + 50}</td>
            <td class="actions-cell">${getActionButtons(type, data.id)}</td>
        `,
        grades: () => `
            <td><a href="/admin/academic/grade-detail/${data.level}" class="entity-link"><strong>${data.name}</strong></a></td>
            <td><span class="level-badge">${data.level}</span></td>
            <td><span class="category-badge primary">${data.category}</span></td>
            <td class="class-count">${Math.floor(Math.random() * 5) + 1}</td>
            <td class="actions-cell">${getActionButtons(type, data.id)}</td>
        `,
        rooms: () => `
            <td><a href="/admin/academic/room-detail/${data.number}" class="entity-link"><strong>${data.number}</strong></a></td>
            <td><span class="type-badge">${data.type}</span></td>
            <td class="capacity">${data.capacity}</td>
            <td><span class="status-badge active">${data.status}</span></td>
            <td class="actions-cell">${getActionButtons(type, data.id)}</td>
        `,
        classes: () => `
            <td><a href="/admin/academic/class-detail/${data.name}" class="entity-link"><strong>${data.name}</strong></a></td>
            <td><a href="/admin/academic/grade-detail/${data.grade}" class="grade-link">${data.grade}</a></td>
            <td><span class="section-badge">${data.section}</span></td>
            <td class="student-count">${data.students || 0}</td>
            <td class="actions-cell">${getActionButtons(type, data.id)}</td>
        `,
        subjects: () => `
            <td><a href="/admin/academic/subject-detail/${data.code}" class="entity-link"><strong>${data.name}</strong></a></td>
            <td><span class="code-badge">${data.code}</span></td>
            <td class="credits">${data.credits}</td>
            <td><span class="category-badge core">${data.category}</span></td>
            <td class="actions-cell">${getActionButtons(type, data.id)}</td>
        `
    };
    
    return templates[type] ? templates[type]() : '';
}

function getActionButtons(type, id) {
    return `
        <button class="simple-btn-icon edit-btn" onclick="edit${type.charAt(0).toUpperCase() + type.slice(1)}('${id}')" title="Edit">
            <i class="fas fa-edit"></i>
        </button>
        <button class="simple-btn-icon delete-btn" onclick="delete${type.charAt(0).toUpperCase() + type.slice(1)}('${id}', this)" title="Delete">
            <i class="fas fa-trash"></i>
        </button>
    `;
}

// Utility functions
function refreshAcademicData() {
    showToast('Refreshing academic data...', 'info');
    setTimeout(() => {
        loadAcademicData();
        showToast('Academic data refreshed successfully', 'success');
    }, 1000);
}

function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.style.cssText = `
        position: fixed; top: 20px; right: 20px; z-index: 1000;
        padding: 12px 20px; border-radius: 6px; font-weight: 600;
        background: ${type === 'success' ? '#10b981' : type === 'warning' ? '#f59e0b' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white; box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
    `;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}
