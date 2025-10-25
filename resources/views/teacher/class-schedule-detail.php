<?php
$activePage = 'schedule-view';

// Get class name from URL
$classNames = [
    'Grade-10A' => 'Grade 10A',
    'Grade-10B' => 'Grade 10B', 
    'Grade-11A' => 'Grade 11A',
    'Grade-11B' => 'Grade 11B',
    'Grade-12A' => 'Grade 12A',
    'Grade-12B' => 'Grade 12B'
];

$currentPath = $_SERVER['REQUEST_URI'];
$className = 'Grade 10A'; // Default

foreach ($classNames as $urlKey => $displayName) {
    if (strpos($currentPath, $urlKey) !== false) {
        $className = $displayName;
        break;
    }
}

ob_start();
?>

<div class="page-content">
    <div class="page-header">
        <div class="page-title">
            <h1><i class="fas fa-graduation-cap"></i> <?php echo $className; ?> Schedule</h1>
            <p>Complete weekly schedule for <?php echo $className; ?></p>
        </div>
        <div class="page-actions">
            <button class="simple-btn secondary" onclick="window.location.href='/teacher/class-schedules'">
                <i class="fas fa-arrow-left"></i> Back to All Classes
            </button>
            <button class="simple-btn secondary" onclick="window.location.href='/teacher/schedule-view'">
                <i class="fas fa-chalkboard-teacher"></i> My Teaching Schedule
            </button>
            <button class="simple-btn primary" onclick="exportSchedule()">
                <i class="fas fa-download"></i> Export
            </button>
            <button class="simple-btn secondary" onclick="printSchedule()">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
    </div>
    
    <!-- Class Information -->
    <div class="simple-section">
        <div class="simple-header">
            <h3><i class="fas fa-info-circle"></i> Class Information</h3>
        </div>
        <div class="class-info-grid">
            <div class="info-item">
                <strong>Class:</strong> <?php echo $className; ?>
            </div>
            <div class="info-item">
                <strong>Students:</strong> 
                <?php 
                $studentCounts = [
                    'Grade 10A' => 30,
                    'Grade 10B' => 28,
                    'Grade 11A' => 25,
                    'Grade 11B' => 28,
                    'Grade 12A' => 25,
                    'Grade 12B' => 27
                ];
                echo $studentCounts[$className] ?? 25;
                ?>
            </div>
            <div class="info-item">
                <strong>Class Teacher:</strong> Ms. Johnson
            </div>
            <div class="info-item">
                <strong>Room:</strong> Room 201
            </div>
        </div>
    </div>
    
    <!-- Weekly Schedule -->
    <div class="simple-section">
        <div class="simple-header">
            <h3><i class="fas fa-calendar-week"></i> Weekly Schedule</h3>
        </div>
        
        <div class="simple-table-container">
            <table class="basic-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Generate schedule data based on class
                    $scheduleData = [
                        'Grade 10A' => [
                            ['Monday', '8:00-9:00', 'Mathematics', 'You', 'Room 201'],
                            ['Monday', '9:00-10:00', 'English', 'Ms. Johnson', 'Room 102'],
                            ['Monday', '10:00-11:00', 'History', 'Mr. Smith', 'Room 103'],
                            ['Monday', '11:00-12:00', 'Break', '', ''],
                            ['Monday', '12:00-1:00', 'Lunch', '', ''],
                            ['Monday', '1:00-2:00', 'Science', 'Dr. Brown', 'Room 104'],
                            ['Monday', '2:00-3:00', 'Physical Education', 'Coach Wilson', 'Gym'],
                            ['Tuesday', '8:00-9:00', 'English', 'Ms. Johnson', 'Room 102'],
                            ['Tuesday', '9:00-10:00', 'Mathematics', 'You', 'Room 201'],
                            ['Tuesday', '10:00-11:00', 'Science', 'Dr. Brown', 'Room 104'],
                            ['Tuesday', '11:00-12:00', 'Break', '', ''],
                            ['Tuesday', '12:00-1:00', 'Lunch', '', ''],
                            ['Tuesday', '1:00-2:00', 'Art', 'Ms. Davis', 'Room 105'],
                            ['Tuesday', '2:00-3:00', 'History', 'Mr. Smith', 'Room 103'],
                            ['Wednesday', '8:00-9:00', 'Mathematics', 'You', 'Room 201'],
                            ['Wednesday', '9:00-10:00', 'Science', 'Dr. Brown', 'Room 104'],
                            ['Wednesday', '10:00-11:00', 'English', 'Ms. Johnson', 'Room 102'],
                            ['Wednesday', '11:00-12:00', 'Break', '', ''],
                            ['Wednesday', '12:00-1:00', 'Lunch', '', ''],
                            ['Wednesday', '1:00-2:00', 'Music', 'Mr. Taylor', 'Room 106'],
                            ['Wednesday', '2:00-3:00', 'Physical Education', 'Coach Wilson', 'Gym'],
                            ['Thursday', '8:00-9:00', 'English', 'Ms. Johnson', 'Room 102'],
                            ['Thursday', '9:00-10:00', 'History', 'Mr. Smith', 'Room 103'],
                            ['Thursday', '10:00-11:00', 'Science', 'Dr. Brown', 'Room 104'],
                            ['Thursday', '11:00-12:00', 'Break', '', ''],
                            ['Thursday', '12:00-1:00', 'Lunch', '', ''],
                            ['Thursday', '1:00-2:00', 'Mathematics', 'You', 'Room 201'],
                            ['Thursday', '2:00-3:00', 'Art', 'Ms. Davis', 'Room 105'],
                            ['Friday', '8:00-9:00', 'Mathematics', 'You', 'Room 201'],
                            ['Friday', '9:00-10:00', 'Science', 'Dr. Brown', 'Room 104'],
                            ['Friday', '10:00-11:00', 'English', 'Ms. Johnson', 'Room 102'],
                            ['Friday', '11:00-12:00', 'Break', '', ''],
                            ['Friday', '12:00-1:00', 'Lunch', '', ''],
                            ['Friday', '1:00-2:00', 'History', 'Mr. Smith', 'Room 103'],
                            ['Friday', '2:00-3:00', 'Music', 'Mr. Taylor', 'Room 106']
                        ]
                    ];
                    
                    // Use Grade 10A data for all classes (in real app, this would be dynamic)
                    $currentSchedule = $scheduleData['Grade 10A'];
                    
                    foreach ($currentSchedule as $row) {
                        echo '<tr>';
                        echo '<td>' . $row[0] . '</td>';
                        echo '<td><strong>' . $row[1] . '</strong></td>';
                        
                        // Subject with pill styling
                        if ($row[2] === 'Mathematics') {
                            echo '<td><span class="subject-pill">' . $row[2] . '</span></td>';
                        } elseif ($row[2] === 'Science') {
                            echo '<td><span class="subject-pill chemistry">' . $row[2] . '</span></td>';
                        } elseif ($row[2] === 'Physical Education') {
                            echo '<td><span class="subject-pill physics">' . $row[2] . '</span></td>';
                        } else {
                            echo '<td><span class="subject-pill">' . $row[2] . '</span></td>';
                        }
                        
                        echo '<td>' . $row[3] . '</td>';
                        echo '<td>' . $row[4] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.class-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-top: 16px;
}

.info-item {
    background: #f8f9fa;
    padding: 12px 16px;
    border-radius: 8px;
    border-left: 4px solid #1976d2;
}

.subject-pill {
    display: inline-block;
    padding: 3px 8px;
    background: #1976d2;
    color: #fff;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    margin-bottom: 2px;
}

.subject-pill.chemistry {
    background: #ec4899;
}

.subject-pill.physics {
    background: #f59e0b;
}
</style>

<script>
function exportSchedule() {
    showActionStatus('Exporting schedule...', 'info');
    setTimeout(() => {
        showActionStatus('Schedule exported successfully!', 'success');
    }, 1000);
}

function printSchedule() {
    window.print();
}
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>
