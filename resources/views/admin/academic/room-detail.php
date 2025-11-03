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
                <span class="status-badge active">Occupied</span>
                <span class="meta-info">Building A · 1st Floor</span>
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


<!-- Edit Room Form -->
<div id="editRoomForm" class="simple-section" style="display:none; margin-top:12px;">
    <div class="simple-header">
        <h4><i class="fas fa-edit"></i> Edit Room</h4>
    </div>
    <div class="form-section">
        <div class="form-row">
            <div class="form-group">
                <label for="editRoomNumber">Room Number</label>
                <input type="text" id="editRoomNumber" class="form-input" value="<?php echo htmlspecialchars($roomNumber); ?>">
            </div>
            <div class="form-group">
                <label for="editRoomBuilding">Building</label>
                <input type="text" id="editRoomBuilding" class="form-input" value="Building A">
            </div>
            <div class="form-group">
                <label for="editRoomFloor">Floor</label>
                <input type="text" id="editRoomFloor" class="form-input" value="1st Floor">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="editRoomCapacity">Seating Capacity</label>
                <input type="number" id="editRoomCapacity" class="form-input" value="35">
            </div>
            <div class="form-group">
                <label for="editRoomEquipment">Equipment</label>
                <input type="text" id="editRoomEquipment" class="form-input" value="Projector, Whiteboard">
            </div>
            <div class="form-group">
                <label for="editRoomAC">Air Conditioning</label>
                <select id="editRoomAC" class="form-input">
                    <option value="Available" selected>Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button id="cancelEditRoom" class="simple-btn secondary">Cancel</button>
            <button id="saveEditRoom" class="simple-btn primary"><i class="fas fa-check"></i> Update Room</button>
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
            <span>35 students</span>
        </div>
        <div class="stat-detail">
            <label>Equipment</label>
            <span>Projector, Whiteboard</span>
        </div>
        <div class="stat-detail">
            <label>Air Conditioning</label>
            <span>Available</span>
        </div>
    </div>
</div>

<!-- Assigned Class Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Assigned Class</h3>
        <div class="section-actions">
            <button class="add-btn" id="assignClassBtn" style="display:none;">
                <i class="fas fa-plus"></i>
                Assign Class
            </button>
            <button class="add-btn danger" id="removeClassBtn">
                <i class="fas fa-times"></i>
                Remove Assigned Class
            </button>
        </div>
    </div>
    <div class="grades-grid" id="roomScheduleGrid">
        <div class="grade-detail-card class-card" data-class-id="1" onclick="window.location.href='/admin/academic/class-detail/<?php echo substr($roomNumber, -1); ?>A'" style="cursor:pointer;">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo substr($roomNumber, -1); ?>A" class="grade-link" onclick="event.stopPropagation()">Class <?php echo substr($roomNumber, -1); ?>A</a>
                <span class="type-badge">Grade <?php echo substr($roomNumber, -1); ?></span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Sarah Johnson</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Schedule</span>
                    <span class="stat-value">8:00 AM - 2:00 PM</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Simple Class Selection Dialog -->
<div id="classSelectionDialog" class="simple-dialog-overlay" style="display:none;">
    <div class="simple-dialog-content">
        <div class="simple-dialog-header">
            <h3>Select Class to Assign</h3>
            <button class="simple-dialog-close" onclick="closeClassSelectionDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-dialog-body">
            <div class="class-selection-list" id="classSelectionList">
                <!-- Classes will be populated here -->
            </div>
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
// Mock data for unassigned classes (classes without rooms)
const unassignedClasses = [
    { id: '2A', name: 'Class 2A', grade: 'Grade 2', students: 28, teacher: 'Mr. John Smith', schedule: '8:00 AM - 2:00 PM' },
    { id: '3A', name: 'Class 3A', grade: 'Grade 3', students: 32, teacher: 'Ms. Lisa Brown', schedule: '8:00 AM - 2:00 PM' },
    { id: '4A', name: 'Class 4A', grade: 'Grade 4', students: 30, teacher: 'Dr. Michael Wilson', schedule: '8:00 AM - 3:00 PM' },
    { id: '5A', name: 'Class 5A', grade: 'Grade 5', students: 29, teacher: 'Ms. Sarah Davis', schedule: '8:00 AM - 3:00 PM' },
    { id: '6A', name: 'Class 6A', grade: 'Grade 6', students: 31, teacher: 'Mr. David Lee', schedule: '8:00 AM - 3:00 PM' },
    { id: '7A', name: 'Class 7A', grade: 'Grade 7', students: 33, teacher: 'Ms. Jennifer Taylor', schedule: '8:00 AM - 3:30 PM' },
    { id: '8A', name: 'Class 8A', grade: 'Grade 8', students: 30, teacher: 'Mr. Robert Anderson', schedule: '8:00 AM - 3:30 PM' },
    { id: '10A', name: 'Class 10A', grade: 'Grade 10', students: 35, teacher: 'Dr. Emily Johnson', schedule: '8:00 AM - 4:00 PM' },
    { id: '11A', name: 'Class 11A', grade: 'Grade 11', students: 34, teacher: 'Mr. James Miller', schedule: '8:00 AM - 4:00 PM' },
    { id: '12A', name: 'Class 12A', grade: 'Grade 12', students: 32, teacher: 'Ms. Amanda White', schedule: '8:00 AM - 4:00 PM' }
];

document.addEventListener('DOMContentLoaded', function(){
    // Edit Room functionality
    const editRoomBtn = document.getElementById('editRoomBtn');
    const editRoomForm = document.getElementById('editRoomForm');
    const cancelEditRoomBtn = document.getElementById('cancelEditRoom');
    const saveEditRoomBtn = document.getElementById('saveEditRoom');
    const roomTitle = document.getElementById('roomTitle');
    
    editRoomBtn.addEventListener('click', function() {
        editRoomForm.style.display = 'block';
    });
    
    // Check if edit parameter is present in URL and clean it up immediately
    if (window.location.search.includes('edit=true')) {
        editRoomForm.style.display = 'block';
        // Remove edit parameter from URL immediately
        const cleanUrl = window.location.pathname + window.location.search.replace(/[?&]edit=true/, '').replace(/[?&]$/, '');
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    cancelEditRoomBtn.addEventListener('click', function() {
        editRoomForm.style.display = 'none';
    });
    
    saveEditRoomBtn.addEventListener('click', function() {
        const newNumber = document.getElementById('editRoomNumber').value.trim();
        const newBuilding = document.getElementById('editRoomBuilding').value.trim();
        const newFloor = document.getElementById('editRoomFloor').value.trim();
        const newCapacity = document.getElementById('editRoomCapacity').value.trim();
        const newEquipment = document.getElementById('editRoomEquipment').value.trim();
        const newAC = document.getElementById('editRoomAC').value.trim();
        
        if (!newNumber || !newBuilding || !newFloor || !newCapacity) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Update page title
        roomTitle.textContent = 'Room ' + newNumber;
        
        // Hide form
        editRoomForm.style.display = 'none';
        
        showActionStatus('Room updated successfully!', 'success');
    });
    
    // Remove Class functionality
    const removeClassBtn = document.getElementById('removeClassBtn');
    const assignClassBtn = document.getElementById('assignClassBtn');
    const classCard = document.querySelector('.class-card');
    
    removeClassBtn.addEventListener('click', function() {
        const className = classCard.querySelector('.grade-link').textContent;
        
        showConfirmDialog({
            title: 'Remove Class Assignment',
            message: `Are you sure you want to remove ${className} from this room?`,
            confirmText: 'Remove',
            confirmIcon: 'fas fa-door-open',
            onConfirm: function() {
                // Hide the class card
                classCard.style.display = 'none';
                
                // Show assign class button, hide remove button
                assignClassBtn.style.display = 'inline-block';
                removeClassBtn.style.display = 'none';
                
                // Update room status to available
                const statusBadge = document.querySelector('.status-badge');
                if (statusBadge) {
                    statusBadge.textContent = 'Available';
                    statusBadge.className = 'status-badge available';
                }
                
                showActionStatus('Class removed from room successfully!', 'success');
            }
        });
    });
    
    // Assign Class functionality
    assignClassBtn.addEventListener('click', function() {
        openClassSelectionDialog();
    });
    
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
});

// Simple dialog functions
function openClassSelectionDialog() {
    populateClassSelection();
    document.getElementById('classSelectionDialog').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeClassSelectionDialog() {
    document.getElementById('classSelectionDialog').style.display = 'none';
    document.body.style.overflow = '';
}

function populateClassSelection() {
    const classesList = document.getElementById('classSelectionList');
    classesList.innerHTML = '';
    
    if (unassignedClasses.length === 0) {
        classesList.innerHTML = '<div class="no-classes">No unassigned classes available</div>';
        return;
    }
    
    unassignedClasses.forEach(cls => {
        const classItem = document.createElement('div');
        classItem.className = 'class-selection-item';
        classItem.innerHTML = `
            <div class="class-info">
                <strong>${cls.name}</strong> - ${cls.grade}
                <div class="class-details">${cls.students} students • ${cls.teacher}</div>
            </div>
            <button class="select-class-btn" onclick="selectClass('${cls.id}')">
                Select
            </button>
        `;
        classesList.appendChild(classItem);
    });
}

function selectClass(classId) {
    const selectedClass = unassignedClasses.find(cls => cls.id === classId);
    if (!selectedClass) return;
    
    // Update the class card with selected class data
    const classCard = document.querySelector('.class-card');
    const gradeLink = classCard.querySelector('.grade-link');
    const typeBadge = classCard.querySelector('.type-badge');
    const statValues = classCard.querySelectorAll('.stat-value');
    
    gradeLink.textContent = selectedClass.name;
    gradeLink.href = `/admin/academic/class-detail/${selectedClass.id}`;
    typeBadge.textContent = selectedClass.grade;
    statValues[0].textContent = `${selectedClass.students} students`;
    statValues[1].textContent = selectedClass.teacher;
    statValues[2].textContent = selectedClass.schedule;
    
    // Show the class card
    classCard.style.display = 'block';
    
    // Hide assign class button, show remove button
    document.getElementById('assignClassBtn').style.display = 'none';
    document.getElementById('removeClassBtn').style.display = 'inline-block';
    
    // Update room status to occupied
    const statusBadge = document.querySelector('.status-badge');
    if (statusBadge) {
        statusBadge.textContent = 'Occupied';
        statusBadge.className = 'status-badge active';
    }
    
    // Remove the assigned class from unassigned list
    const classIndex = unassignedClasses.findIndex(cls => cls.id === classId);
    if (classIndex > -1) {
        unassignedClasses.splice(classIndex, 1);
    }
    
    closeClassSelectionDialog();
    showActionStatus(`${selectedClass.name} assigned to room successfully!`, 'success');
}
</script>

<style>
/* Section Actions Styles */
.section-actions {
    display: flex;
    gap: 8px;
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

/* Simple Class Selection Dialog Styles */
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
    max-width: 450px;
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

.class-selection-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.class-selection-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.class-selection-item:hover {
    border-color: #4A90E2;
    box-shadow: 0 2px 8px rgba(74, 144, 226, 0.1);
}

.class-selection-item .class-info {
    flex: 1;
}

.class-selection-item .class-info strong {
    color: #333;
    font-size: 1rem;
}

.class-selection-item .class-details {
    color: #666;
    font-size: 0.9rem;
    margin-top: 4px;
}

.select-class-btn {
    background: #4A90E2;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.select-class-btn:hover {
    background: #3A7BD5;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(74, 144, 226, 0.3);
}

.no-classes {
    text-align: center;
    padding: 40px 20px;
    color: #666;
    font-style: italic;
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
