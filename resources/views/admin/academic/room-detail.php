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
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Seating Capacity</td>
                    <td>35 students</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Equipment</td>
                    <td>Projector, Whiteboard</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Air Conditioning</td>
                    <td>Available</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Assigned Class Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Assigned Class</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Grade</th>
                    <th>Students</th>
                    <th>Teacher</th>
                    <th>Schedule</th>
                </tr>
            </thead>
            <tbody>
                <tr style="cursor:pointer;" onclick="window.location.href='/admin/academic/class-detail/<?php echo substr($roomNumber, -1); ?>A'">
                    <td><a href="/admin/academic/class-detail/<?php echo substr($roomNumber, -1); ?>A" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo substr($roomNumber, -1); ?>A</a></td>
                    <td><span class="type-badge">Grade <?php echo substr($roomNumber, -1); ?></span></td>
                    <td>30 students</td>
                    <td>Ms. Sarah Johnson</td>
                    <td>8:00 AM - 2:00 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

// Include appropriate layout based on portal
$layoutPath = __DIR__ . '/../../components/' . ($isStaffPortal ? 'staff-layout.php' : 'admin-layout.php');
include $layoutPath;
?>

<script>
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
</script>

