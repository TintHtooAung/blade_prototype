<?php
$gradeId = $_GET['grade'] ?? '1';
$gradeName = 'Grade ' . $gradeId;
$pageTitle = 'Smart Campus Nova Hub - Grade Details: ' . $gradeName;
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Grade Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

// Determine portal (admin or staff) from URL
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

<!-- Grade Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="batch-info">
            <h1 id="gradeTitle"><?php echo htmlspecialchars($gradeName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge primary" id="gradeCategoryBadge">Primary</span>
                <span class="meta-info" id="gradeMetaInfo">Academic Level</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit" id="editGradeBtn">
            <i class="fas fa-edit"></i> Edit Grade
        </button>
        <button class="action-btn-header delete" id="deleteGradeBtn">
            <i class="fas fa-trash"></i> Delete Grade
        </button>
    </div>
</div>

<!-- Grade Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Grade',
        'value' => $gradeName,
        'icon' => 'fas fa-graduation-cap',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Classes',
        'value' => '4',
        'icon' => 'fas fa-users',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Total Students',
        'value' => '120',
        'icon' => 'fas fa-user-graduate',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Edit Grade Modal -->
<div id="editGradeModal" class="simple-modal-overlay" style="display:none;">
    <div class="simple-modal-content" style="max-width: 520px;">
        <div class="simple-modal-header">
            <h3><i class="fas fa-edit"></i> Edit Grade</h3>
            <button class="simple-modal-close" onclick="closeEditGradeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="simple-modal-body">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalGradeLevel">Grade Level</label>
                        <input type="text" id="modalGradeLevel" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="modalGradeCategory">Category</label>
                        <select id="modalGradeCategory" class="form-select">
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="High School">High School</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modalGradeDescription">Description</label>
                        <input type="text" id="modalGradeDescription" class="form-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="simple-modal-actions">
            <button class="simple-btn secondary" onclick="closeEditGradeModal()">Cancel</button>
            <button id="saveEditGradeModal" class="simple-btn primary"><i class="fas fa-check"></i> Update Grade</button>
        </div>
    </div>
</div>

<!-- Grade Information Section removed per updated model -->

<!-- Academic Statistics Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Academic Statistics</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <tbody>
                <tr>
                    <td style="width: 200px; font-weight: 600; color: #86868b;">Total Subjects</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Core Subjects</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td style="font-weight: 600; color: #86868b;">Elective Subjects</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Classes in Grade Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes in <span id="gradeClassesLabel"><?php echo htmlspecialchars($gradeName); ?></span></h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Room</th>
                    <th>Students</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>A'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>A" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>A</a></td>
                    <td>Room 101</td>
                    <td>30 students</td>
                    <td>Ms. Sarah Johnson</td>
                </tr>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>B'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>B" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>B</a></td>
                    <td>Room 102</td>
                    <td>30 students</td>
                    <td>Mr. David Chen</td>
                </tr>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>C'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>C" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>C</a></td>
                    <td>Room 103</td>
                    <td>30 students</td>
                    <td>Ms. Emily Rodriguez</td>
                </tr>
                <tr style="cursor:pointer;" onclick="window.location.href='<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>D'">
                    <td><a href="<?php echo $portalPrefix; ?>/academic/class-detail/<?php echo $gradeId; ?>D" class="grade-link" onclick="event.stopPropagation()" style="font-weight: 600; color: #007AFF;">Class <?php echo $gradeId; ?>D</a></td>
                    <td>Room 104</td>
                    <td>30 students</td>
                    <td>Dr. James Wilson</td>
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
const gradeData = <?php echo json_encode([
    'level' => $gradeName,
    'category' => 'Primary',
    'description' => 'Academic Level'
]); ?>;

document.addEventListener('DOMContentLoaded', function(){
    const editGradeBtn = document.getElementById('editGradeBtn');
    const editGradeModal = document.getElementById('editGradeModal');
    const modalGradeLevel = document.getElementById('modalGradeLevel');
    const modalGradeCategory = document.getElementById('modalGradeCategory');
    const modalGradeDescription = document.getElementById('modalGradeDescription');
    const gradeTitle = document.getElementById('gradeTitle');
    const gradeCategoryBadge = document.getElementById('gradeCategoryBadge');
    const gradeMetaInfo = document.getElementById('gradeMetaInfo');
    const gradeClassesLabel = document.getElementById('gradeClassesLabel');
    const saveEditGradeBtn = document.getElementById('saveEditGradeModal');
    
    function fillGradeModal() {
        modalGradeLevel.value = gradeData.level;
        modalGradeCategory.value = gradeData.category;
        modalGradeDescription.value = gradeData.description;
    }
    
    function openEditGradeModal() {
        fillGradeModal();
        editGradeModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    window.closeEditGradeModal = function() {
        editGradeModal.style.display = 'none';
        document.body.style.overflow = '';
    };
    
    editGradeModal.addEventListener('click', function(e) {
        if (e.target === editGradeModal) {
            closeEditGradeModal();
        }
    });
    
    editGradeBtn.addEventListener('click', openEditGradeModal);
    
    saveEditGradeBtn.addEventListener('click', function() {
        const newLevel = modalGradeLevel.value.trim();
        const newCategory = modalGradeCategory.value.trim();
        const newDescription = modalGradeDescription.value.trim();
        
        if (!newLevel || !newCategory || !newDescription) {
            alert('Please fill in all fields');
            return;
        }
        
        gradeData.level = newLevel;
        gradeData.category = newCategory;
        gradeData.description = newDescription;
        
        gradeTitle.textContent = gradeData.level;
        if (gradeCategoryBadge) {
            const categoryClassMap = {
                'Primary': 'primary',
                'Secondary': 'secondary',
                'High School': 'upcoming'
            };
            const badgeClass = categoryClassMap[gradeData.category] || 'primary';
            gradeCategoryBadge.textContent = gradeData.category;
            gradeCategoryBadge.className = `status-badge ${badgeClass}`;
        }
        if (gradeMetaInfo) gradeMetaInfo.textContent = gradeData.description;
        if (gradeClassesLabel) gradeClassesLabel.textContent = gradeData.level;
        const statCard = document.querySelector('.detail-stats-grid .stat-card:first-child .stat-number');
        if (statCard) statCard.textContent = gradeData.level;
        
        closeEditGradeModal();
        showActionStatus('Grade updated successfully!', 'success');
    });
    
    // Delete Grade functionality
    const deleteGradeBtn = document.getElementById('deleteGradeBtn');
    deleteGradeBtn.addEventListener('click', function() {
        const gradeName = gradeTitle.textContent;
        showConfirmDialog({
            title: 'Delete Grade',
            message: `Are you sure you want to delete ${gradeName}? This will also delete all associated classes and students and cannot be undone.`,
            confirmText: 'Delete',
            confirmIcon: 'fas fa-graduation-cap',
            onConfirm: function() {
                showActionStatus('Grade deleted successfully!', 'success');
                // In a real application, this would redirect or update the UI
                setTimeout(() => {
                    window.location.href = '<?php echo $portalPrefix; ?>/academic-management';
                }, 1500);
            }
        });
    });
});
</script>

<style>
/* Section Actions Styles */
.section-actions {
    display: flex;
    gap: 8px;
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

