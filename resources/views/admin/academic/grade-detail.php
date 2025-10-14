<?php
$gradeId = $_GET['grade'] ?? '1';
$gradeName = 'Grade ' . $gradeId;
$pageTitle = 'Smart Campus Nova Hub - Grade Details: ' . $gradeName;
$pageIcon = 'fas fa-graduation-cap';
$pageHeading = 'Grade Details';
$activePage = 'academic';

// Include UI components
include __DIR__ . '/../../components/ui/card.php';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/academic-management" class="breadcrumb-link">
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
            <h1><?php echo htmlspecialchars($gradeName); ?></h1>
            <div class="batch-meta">
                <span class="status-badge primary">Primary</span>
                <span class="meta-info">Academic Level</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Grade
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Grade
        </button>
    </div>
</div>

<!-- Grade Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Grade Level',
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

<!-- Grade Information Section removed per updated model -->

<!-- Academic Statistics Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Academic Statistics</h3>
    </div>
    
    <div class="stats-info">
        <div class="stat-detail">
            <label>Total Subjects</label>
            <span>8</span>
        </div>
        <div class="stat-detail">
            <label>Core Subjects</label>
            <span>6</span>
        </div>
        <div class="stat-detail">
            <label>Elective Subjects</label>
            <span>2</span>
        </div>
    </div>
</div>

<!-- Classes in Grade Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Classes in <?php echo htmlspecialchars($gradeName); ?></h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add Class
        </button>
    </div>
    
    <!-- Inline Add Class Form (placed directly under header) -->
    <div id="addClassForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-door-open"></i> Create Class</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group">
                    <label for="className">Class Name</label>
                    <input type="text" id="className" class="form-input" placeholder="e.g., 10-A">
                </div>
                <div class="form-group">
                    <label for="classGrade">Grade</label>
                    <input type="text" id="classGrade" class="form-input" placeholder="e.g., Grade 10">
                </div>
                <div class="form-group">
                    <label for="classRoom">Room</label>
                    <input type="text" id="classRoom" class="form-input" placeholder="e.g., Room 201">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="classTeacher">Class Teacher</label>
                    <input type="text" id="classTeacher" class="form-input" placeholder="e.g., Ms. Smith">
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelAddClass" class="simple-btn secondary">Cancel</button>
                <button id="saveAddClass" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>

    <div class="grades-grid" id="classesGrid">
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>A" class="grade-link">Class <?php echo $gradeId; ?>A</a>
                <span class="room-info">Room 101</span>
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
        
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>B" class="grade-link">Class <?php echo $gradeId; ?>B</a>
                <span class="room-info">Room 102</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Mr. David Chen</span>
                </div>
        
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>C" class="grade-link">Class <?php echo $gradeId; ?>C</a>
                <span class="room-info">Room 103</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Ms. Emily Rodriguez</span>
                </div>
        
            </div>
        </div>
        
        <div class="grade-detail-card">
            <div class="grade-card-header">
                <a href="/admin/academic/class-detail/<?php echo $gradeId; ?>D" class="grade-link">Class <?php echo $gradeId; ?>D</a>
                <span class="room-info">Room 104</span>
            </div>
            <div class="grade-card-body">
                <div class="grade-stat">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">30 students</span>
                </div>
                <div class="grade-stat">
                    <span class="stat-label">Teacher</span>
                    <span class="stat-value">Dr. James Wilson</span>
                </div>
        
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../../components/admin-layout.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const addBtn = document.querySelector('.detail-section .add-btn');
    const form = document.getElementById('addClassForm');
    const cancelBtn = document.getElementById('cancelAddClass');
    const saveBtn = document.getElementById('saveAddClass');
    const grid = document.getElementById('classesGrid');

    function toggle(){ if(form) form.style.display = (form.style.display==='none' || !form.style.display) ? 'block' : 'none'; }
    addBtn && addBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
    cancelBtn && cancelBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
    saveBtn && saveBtn.addEventListener('click', function(e){
        e.preventDefault();
        const name = (document.getElementById('newClassName').value||'').trim();
        if (!name) { alert('Enter class name'); return; }
        const room = document.getElementById('newClassRoom').value || '';
        const card = document.createElement('div');
        card.className = 'grade-detail-card';
        card.innerHTML = `
            <div class="grade-card-header">
                <a href="#" class="grade-link">Class ${name}</a>
                ${room ? `<span class=\"room-info\">${room}</span>` : ''}
            </div>
            <div class="grade-card-body">
                <div class="grade-stat"><span class="stat-label">Students</span><span class="stat-value">0 students</span></div>
                <div class="grade-stat"><span class="stat-label">Teacher</span><span class="stat-value">-</span></div>
            </div>`;
        grid && grid.prepend(card);
        toggle();
        alert('Saved (draft).');
    });
});
</script>
