<?php
$activePage = 'schedule-view';
ob_start();
?>

<div class="page-content">
    <div class="page-header">
        <div class="page-title">
            <h1><i class="fas fa-calendar-week"></i> Class Schedules</h1>
            <p>View complete schedules for all classes</p>
        </div>
        <div class="page-actions">
            <button class="simple-btn secondary" onclick="window.location.href='/teacher/schedule-view'">
                <i class="fas fa-arrow-left"></i> Back to My Schedule
            </button>
            <button class="simple-btn primary" onclick="exportAllSchedules()">
                <i class="fas fa-download"></i> Export All
            </button>
        </div>
    </div>
    
    <!-- Class Schedule Overview -->
    <div class="simple-section">
        <div class="simple-header">
            <h3><i class="fas fa-graduation-cap"></i> All Class Schedules</h3>
        </div>
        
        <div class="class-schedule-grid">
            <div class="class-schedule-card" onclick="window.location.href='/teacher/class-schedule/Grade-10A'">
                <div class="class-card-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Grade 10A</h4>
                </div>
                <div class="class-card-info">
                    <p><strong>Students:</strong> 30</p>
                    <p><strong>Subjects:</strong> 7</p>
                    <p><strong>Teachers:</strong> 6</p>
                </div>
                <div class="class-card-actions">
                    <button class="simple-btn small primary">View Schedule</button>
                </div>
            </div>
            
            <div class="class-schedule-card" onclick="window.location.href='/teacher/class-schedule/Grade-10B'">
                <div class="class-card-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Grade 10B</h4>
                </div>
                <div class="class-card-info">
                    <p><strong>Students:</strong> 28</p>
                    <p><strong>Subjects:</strong> 7</p>
                    <p><strong>Teachers:</strong> 6</p>
                </div>
                <div class="class-card-actions">
                    <button class="simple-btn small primary">View Schedule</button>
                </div>
            </div>
            
            <div class="class-schedule-card" onclick="window.location.href='/teacher/class-schedule/Grade-11A'">
                <div class="class-card-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Grade 11A</h4>
                </div>
                <div class="class-card-info">
                    <p><strong>Students:</strong> 25</p>
                    <p><strong>Subjects:</strong> 7</p>
                    <p><strong>Teachers:</strong> 6</p>
                </div>
                <div class="class-card-actions">
                    <button class="simple-btn small primary">View Schedule</button>
                </div>
            </div>
            
            <div class="class-schedule-card" onclick="window.location.href='/teacher/class-schedule/Grade-11B'">
                <div class="class-card-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Grade 11B</h4>
                </div>
                <div class="class-card-info">
                    <p><strong>Students:</strong> 28</p>
                    <p><strong>Subjects:</strong> 7</p>
                    <p><strong>Teachers:</strong> 6</p>
                </div>
                <div class="class-card-actions">
                    <button class="simple-btn small primary">View Schedule</button>
                </div>
            </div>
            
            <div class="class-schedule-card" onclick="window.location.href='/teacher/class-schedule/Grade-12A'">
                <div class="class-card-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Grade 12A</h4>
                </div>
                <div class="class-card-info">
                    <p><strong>Students:</strong> 25</p>
                    <p><strong>Subjects:</strong> 7</p>
                    <p><strong>Teachers:</strong> 6</p>
                </div>
                <div class="class-card-actions">
                    <button class="simple-btn small primary">View Schedule</button>
                </div>
            </div>
            
            <div class="class-schedule-card" onclick="window.location.href='/teacher/class-schedule/Grade-12B'">
                <div class="class-card-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Grade 12B</h4>
                </div>
                <div class="class-card-info">
                    <p><strong>Students:</strong> 27</p>
                    <p><strong>Subjects:</strong> 7</p>
                    <p><strong>Teachers:</strong> 6</p>
                </div>
                <div class="class-card-actions">
                    <button class="simple-btn small primary">View Schedule</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.class-schedule-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.class-schedule-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.class-schedule-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    border-color: #1976d2;
}

.class-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}

.class-card-header i {
    font-size: 1.5rem;
    color: #1976d2;
}

.class-card-header h4 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
}

.class-card-info {
    margin-bottom: 16px;
}

.class-card-info p {
    margin: 4px 0;
    font-size: 0.9rem;
    color: #666;
}

.class-card-actions {
    display: flex;
    justify-content: flex-end;
}

.simple-btn.small {
    padding: 6px 12px;
    font-size: 0.85rem;
}
</style>

<script>
function exportAllSchedules() {
    showActionStatus('Exporting all class schedules...', 'info');
    setTimeout(() => {
        showActionStatus('All schedules exported successfully!', 'success');
    }, 1500);
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
