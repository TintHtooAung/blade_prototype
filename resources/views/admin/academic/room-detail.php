<?php
$roomNumber = $_GET['room'] ?? '101';
$pageTitle = 'Smart Campus Nova Hub - Room Details: Room ' . $roomNumber;
$pageIcon = 'fas fa-door-open';
$pageHeading = 'Room Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

// Determine portal and prefix
$uri = $_SERVER['REQUEST_URI'] ?? '';
$isStaffPortal = strpos($uri, '/staff/') === 0;
$portalPrefix = $isStaffPortal ? '/staff' : '/admin';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="<?php echo $portalPrefix; ?>/academic-management" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Academic Management
    </a>
</div>

<!-- Room Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-door-open"></i>
        </div>
        <div class="batch-info">
            <h1 id="roomTitle">Room <?php echo htmlspecialchars($roomNumber); ?></h1>
    <div class="batch-meta">
        <span class="status-badge active" id="roomStatusBadge">Occupied</span>
        <span class="meta-info" id="roomMetaInfo">Building A · 1st Floor</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editRoomBtn">
            <i class="fas fa-edit"></i> Edit Room
        </button>
        <button class="action-btn-header delete" id="deleteRoomBtn">
            <i class="fas fa-trash"></i> Delete Room
        </button>
    </div>
</div>


<!-- Edit Room Modal -->
<div id="editRoomModal" class="simple-modal-overlay" style="display:none;">
    <div class="simple-modal-content" style="max-width: 600px;">
        <div class="simple-modal-header">
            <h3><i class="fas fa-edit"></i> Edit Room</h3>
            <button class="simple-modal-close" onclick="closeEditRoomModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-modal-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalRoomNumber">Room Number</label>
                        <input type="text" id="modalRoomNumber" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalRoomBuilding">Building</label>
                        <input type="text" id="modalRoomBuilding" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalRoomFloor">Floor</label>
                        <input type="text" id="modalRoomFloor" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalRoomCapacity">Seating Capacity</label>
                        <input type="number" id="modalRoomCapacity" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalRoomEquipment">Equipment</label>
                        <input type="text" id="modalRoomEquipment" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="modalRoomAC">Air Conditioning</label>
                        <select id="modalRoomAC" class="form-select">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="simple-modal-actions">
            <button class="simple-btn secondary" onclick="closeEditRoomModal()">Cancel</button>
            <button id="saveEditRoomModal" class="simple-btn primary"><i class="fas fa-check"></i> Update Room</button>
        </div>
    </div>
</div>

<!-- Room Information Section removed per model simplification -->

<!-- Facilities Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Room Facilities</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Seating Capacity</label>
            <span id="roomCapacityValue">35 students</span>
        </div>
        <div class="stat-detail">
            <label>Equipment</label>
            <span id="roomEquipmentValue">Projector, Whiteboard</span>
        </div>
        <div class="stat-detail">
            <label>Air Conditioning</label>
            <span id="roomACValue">Available</span>
        </div>
    </div>
</div>

<!-- Assigned Classes Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Assigned Classes</h3>
    </div>
    
    <div class="assigned-classes-container">
        <div class="detail-table-container">
            <table class="academic-table">
                <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Grade</th>
                        <th>Students</th>
                        <th>Teacher</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="assignedClassesTableBody">
                    <!-- Assigned classes will be populated here -->
                </tbody>
            </table>
            <div class="no-classes-message" id="noAssignedClassesMessage" style="display:none;">
                <i class="fas fa-chalkboard"></i>
                <p>No classes assigned to this room yet.</p>
            </div>
        </div>
    </div>
</div>

<!-- Time-table Dialog -->
<div id="scheduleDialog" class="simple-dialog-overlay" style="display:none;">
    <div class="simple-dialog-content" style="max-width: 500px;">
        <div class="simple-dialog-header">
            <h3><i class="fas fa-calendar-alt"></i> Class Time-table</h3>
            <button class="simple-dialog-close" onclick="closeScheduleDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-dialog-body">
            <div id="scheduleDialogContent">
                <!-- Time-table content will be populated here -->
            </div>
        </div>
        <div class="simple-dialog-actions" style="padding: 20px 24px; border-top: 1px solid #e0e0e0; display: flex; justify-content: flex-end; gap: 12px;">
            <button class="simple-btn secondary" onclick="closeScheduleDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" id="saveScheduleBtn">
                <i class="fas fa-save"></i> Save Time-table
            </button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

// Include appropriate layout based on portal
$layoutPath = __DIR__ . '/../../components/' . ($isStaffPortal ? 'staff-layout.php' : 'admin-layout.php');
include $layoutPath;
?>

<script>
const roomData = <?php echo json_encode([
    'number' => $roomNumber,
    'building' => 'Building A',
    'floor' => '1st Floor',
    'capacity' => 35,
    'equipment' => 'Projector, Whiteboard',
    'ac' => 'Available',
    'status' => 'Occupied'
]); ?>;

// Mock data for unassigned classes (classes without rooms)
const unassignedClasses = [
    { id: '2A', name: 'Class 2A', grade: 'Grade 2', students: 28, teacher: 'Mr. John Smith', timetable: '8:00 AM - 2:00 PM' },
    { id: '3A', name: 'Class 3A', grade: 'Grade 3', students: 32, teacher: 'Ms. Lisa Brown', timetable: '8:00 AM - 2:00 PM' },
    { id: '4A', name: 'Class 4A', grade: 'Grade 4', students: 30, teacher: 'Dr. Michael Wilson', timetable: '8:00 AM - 3:00 PM' },
    { id: '5A', name: 'Class 5A', grade: 'Grade 5', students: 29, teacher: 'Ms. Sarah Davis', timetable: '8:00 AM - 3:00 PM' },
    { id: '6A', name: 'Class 6A', grade: 'Grade 6', students: 31, teacher: 'Mr. David Lee', timetable: '8:00 AM - 3:00 PM' },
    { id: '7A', name: 'Class 7A', grade: 'Grade 7', students: 33, teacher: 'Ms. Jennifer Taylor', timetable: '8:00 AM - 3:30 PM' },
    { id: '8A', name: 'Class 8A', grade: 'Grade 8', students: 30, teacher: 'Mr. Robert Anderson', timetable: '8:00 AM - 3:30 PM' },
    { id: '10A', name: 'Class 10A', grade: 'Grade 10', students: 35, teacher: 'Dr. Emily Johnson', timetable: '8:00 AM - 4:00 PM' },
    { id: '11A', name: 'Class 11A', grade: 'Grade 11', students: 34, teacher: 'Mr. James Miller', timetable: '8:00 AM - 4:00 PM' },
    { id: '12A', name: 'Class 12A', grade: 'Grade 12', students: 32, teacher: 'Ms. Amanda White', timetable: '8:00 AM - 4:00 PM' }
];

let assignedClasses = [
    { id: '1A', name: 'Class 1A', grade: 'Grade 1', students: 30, teacher: 'Ms. Sarah Johnson', timetable: '8:00 AM - 2:00 PM' }
];

let assignedClassesTableBody;
let noAssignedClassesMessage;

document.addEventListener('DOMContentLoaded', function(){
    const editRoomBtn = document.getElementById('editRoomBtn');
    const editRoomModal = document.getElementById('editRoomModal');
    const modalRoomNumber = document.getElementById('modalRoomNumber');
    const modalRoomBuilding = document.getElementById('modalRoomBuilding');
    const modalRoomFloor = document.getElementById('modalRoomFloor');
    const modalRoomCapacity = document.getElementById('modalRoomCapacity');
    const modalRoomEquipment = document.getElementById('modalRoomEquipment');
    const modalRoomAC = document.getElementById('modalRoomAC');
    const roomTitle = document.getElementById('roomTitle');
    const roomMetaInfo = document.getElementById('roomMetaInfo');
    const roomCapacityValue = document.getElementById('roomCapacityValue');
    const roomEquipmentValue = document.getElementById('roomEquipmentValue');
    const roomACValue = document.getElementById('roomACValue');
    const roomStatusBadge = document.getElementById('roomStatusBadge');
    const saveEditRoomBtn = document.getElementById('saveEditRoomModal');
    
    function fillRoomModal() {
        modalRoomNumber.value = roomData.number;
        modalRoomBuilding.value = roomData.building;
        modalRoomFloor.value = roomData.floor;
        modalRoomCapacity.value = roomData.capacity;
        modalRoomEquipment.value = roomData.equipment;
        modalRoomAC.value = roomData.ac;
    }
    
    function openEditRoomModal() {
        fillRoomModal();
        editRoomModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    window.closeEditRoomModal = function() {
        editRoomModal.style.display = 'none';
        document.body.style.overflow = '';
    };
    
    editRoomModal.addEventListener('click', function(e) {
        if (e.target === editRoomModal) {
            closeEditRoomModal();
        }
    });
    
    editRoomBtn.addEventListener('click', openEditRoomModal);
    
    saveEditRoomBtn.addEventListener('click', function() {
        const newNumber = modalRoomNumber.value.trim();
        const newBuilding = modalRoomBuilding.value.trim();
        const newFloor = modalRoomFloor.value.trim();
        const newCapacity = modalRoomCapacity.value.trim();
        const newEquipment = modalRoomEquipment.value.trim();
        const newAC = modalRoomAC.value.trim();
        
        if (!newNumber || !newBuilding || !newFloor || !newCapacity) {
            alert('Please fill in all required fields');
            return;
        }
        
        roomData.number = newNumber;
        roomData.building = newBuilding;
        roomData.floor = newFloor;
        roomData.capacity = newCapacity;
        roomData.equipment = newEquipment;
        roomData.ac = newAC;
        
        roomTitle.textContent = 'Room ' + roomData.number;
        if (roomMetaInfo) {
            roomMetaInfo.textContent = `${roomData.building} · ${roomData.floor}`;
        }
        if (roomCapacityValue) roomCapacityValue.textContent = `${roomData.capacity} students`;
        if (roomEquipmentValue) roomEquipmentValue.textContent = roomData.equipment;
        if (roomACValue) roomACValue.textContent = roomData.ac;
        if (roomStatusBadge && roomData.status) {
            roomStatusBadge.textContent = roomData.status;
        }
        
        closeEditRoomModal();
        showActionStatus('Room updated successfully!', 'success');
    });
    
    // Assigned classes table references
    assignedClassesTableBody = document.getElementById('assignedClassesTableBody');
    noAssignedClassesMessage = document.getElementById('noAssignedClassesMessage');
    
    // Delete Room functionality
    const deleteRoomBtn = document.getElementById('deleteRoomBtn');
    deleteRoomBtn.addEventListener('click', function() {
        const roomName = roomTitle.textContent;
        showConfirmDialog({
            title: 'Delete Room',
            message: `Are you sure you want to delete ${roomName}? This will unassign any classes currently using this room and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-door-closed',
            onConfirm: function() {
                showActionStatus('Room deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '/admin/academic-management';
                }, 1500);
            }
        });
    });
    
    renderAssignedClassesTable();
    
    // Time-table Dialog functionality
    const saveScheduleBtn = document.getElementById('saveScheduleBtn');
    if (saveScheduleBtn) {
        saveScheduleBtn.addEventListener('click', function() {
            const dialog = document.getElementById('scheduleDialog');
            const classId = dialog.dataset.classId;
            const scheduleTime = document.getElementById('scheduleTime').value.trim();
            
            if (!scheduleTime) {
                alert('Please enter a time-table time');
                return;
            }
            
            // Update the timetable for the class
            const cls = assignedClasses.find(c => c.id === classId);
            if (cls) {
                cls.timetable = scheduleTime;
                renderAssignedClassesTable();
                showActionStatus('Time-table updated successfully!', 'success');
            }
            
            closeScheduleDialog();
        });
    }
    
    // Close time-table dialog when clicking outside
    const scheduleDialog = document.getElementById('scheduleDialog');
    if (scheduleDialog) {
        scheduleDialog.addEventListener('click', function(e) {
            if (e.target === scheduleDialog) {
                closeScheduleDialog();
            }
        });
    }
});

function toggleNoClassMessage() {
    if (!noAssignedClassesMessage) return;
    noAssignedClassesMessage.style.display = assignedClasses.length ? 'none' : 'flex';
}

function renderAssignedClassesTable() {
    if (!assignedClassesTableBody) return;
    assignedClassesTableBody.innerHTML = '';
    
    if (!assignedClasses.length) {
        toggleNoClassMessage();
        return;
    }
    
    assignedClasses.forEach(cls => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <a href="/admin/academic/class-detail/${cls.id}" class="grade-link" style="font-weight:600; color:#007AFF;">
                    ${cls.name}
                </a>
            </td>
            <td>${cls.grade}</td>
            <td>${cls.students} students</td>
            <td>${cls.teacher}</td>
            <td>
                <button class="icon-btn delete-icon" data-remove-class="${cls.id}" title="Remove class">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        
        const removeBtn = row.querySelector('[data-remove-class]');
        removeBtn.addEventListener('click', () => confirmRemoveClass(cls.id));
        assignedClassesTableBody.appendChild(row);
    });
    
    toggleNoClassMessage();
}

function confirmRemoveClass(classId) {
    const cls = assignedClasses.find(item => item.id === classId);
    if (!cls) return;
    
    showConfirmDialog({
        title: 'Remove Class Assignment',
        message: `Remove ${cls.name} from this room?`,
        confirmText: 'Remove',
        confirmIcon: 'fas fa-door-open',
        onConfirm: function() {
            assignedClasses = assignedClasses.filter(item => item.id !== classId);
            unassignedClasses.push(cls);
            renderAssignedClassesTable();
            showActionStatus(`${cls.name} removed from room successfully!`, 'success');
        }
    });
}

// Time-table Dialog functions
function openScheduleDialog(classId, className, currentTimetable) {
    const dialog = document.getElementById('scheduleDialog');
    const content = document.getElementById('scheduleDialogContent');
    
    content.innerHTML = `
        <div class="form-group" style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #333;">Class</label>
            <div style="padding: 0.75rem; background: #f5f5f5; border-radius: 6px; color: #666;">
                ${className}
            </div>
        </div>
        <div class="form-group">
            <label for="scheduleTime" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #333;">Time-table Time *</label>
            <input type="text" id="scheduleTime" class="form-input" value="${currentTimetable}" placeholder="e.g., 8:00 AM - 2:00 PM" required>
        </div>
    `;
    
    dialog.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    // Store current class ID for saving
    dialog.dataset.classId = classId;
}

function closeScheduleDialog() {
    const dialog = document.getElementById('scheduleDialog');
    dialog.style.display = 'none';
    document.body.style.overflow = '';
    delete dialog.dataset.classId;
}
</script>

<style>
/* Section Actions Styles */
.section-actions {
    display: flex;
    gap: 8px;
}

/* Delete Icon Button */
.icon-btn.delete-icon {
    background: none;
    border: none;
    color: #d32f2f;
    cursor: pointer;
    padding: 8px;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.icon-btn.delete-icon:hover {
    background: #ffebee;
    color: #b71c1c;
    transform: scale(1.1);
}

/* Danger Button Style */
.add-btn.danger {
    background: #d32f2f;
    color: white;
    border: 1px solid #d32f2f;
}

.add-btn.danger:hover {
    background: #b71c1c;
    border-color: #b71c1c;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(211, 47, 47, 0.3);
}

/* Status Badge Styles */
.status-badge.available {
    background: #e8f5e8;
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}

.timetable-link {
    transition: color 0.2s ease;
}

.timetable-link:hover {
    color: #0056b3;
}

.simple-dialog-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 0.2s ease;
}

.simple-dialog-content {
    background: #fff;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: slideUp 0.3s ease;
}

.simple-dialog-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #e0e0e0;
}

.simple-dialog-header h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
}

.simple-dialog-close {
    background: none;
    border: none;
    font-size: 1.2rem;
    color: #666;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.simple-dialog-close:hover {
    background: #f5f5f5;
    color: #333;
}

.simple-dialog-body {
    padding: 20px 24px;
    max-height: 400px;
    overflow-y: auto;
}

.simple-dialog-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    padding: 20px 24px;
    border-top: 1px solid #e0e0e0;
}

.simple-btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    border: 1px solid transparent;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.simple-btn.secondary {
    background: #f5f5f5;
    color: #333;
    border-color: #e0e0e0;
}

.simple-btn.secondary:hover {
    background: #e8e8e8;
    border-color: #d0d0d0;
}

.simple-btn.primary {
    background: #4A90E2;
    color: white;
    border-color: #4A90E2;
}

.simple-btn.primary:hover {
    background: #3A7BD5;
    border-color: #3A7BD5;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(74, 144, 226, 0.3);
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
</style>