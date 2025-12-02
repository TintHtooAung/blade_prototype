<?php
$pageTitle = 'Smart Campus Guardian - Attendance';
$pageIcon = 'fas fa-user-check';
$activePage = 'guardian-attendance';

ob_start();
?>

<div class="page-header-compact">
    <div class="page-icon-compact"><i class="<?php echo $pageIcon; ?>"></i></div>
    <div class="page-title-compact"><h2>Attendance</h2></div>
</div>

<div class="simple-section">
    <div class="simple-header"><h3>October 2025</h3></div>
    <div style="display:grid; grid-template-columns: repeat(7,1fr); gap:8px;">
        <?php
        $days = [
            ['d'=>1,'s'=>'P'],['d'=>2,'s'=>'P'],['d'=>3,'s'=>'P'],['d'=>4,'s'=>'P'],['d'=>5,'s'=>'A'],['d'=>6,'s'=>'-'],['d'=>7,'s'=>'-'],
            ['d'=>8,'s'=>'P'],['d'=>9,'s'=>'P'],['d'=>10,'s'=>'L'],['d'=>11,'s'=>'P'],['d'=>12,'s'=>'P'],['d'=>13,'s'=>'-'],['d'=>14,'s'=>'-'],
            ['d'=>15,'s'=>'P'],['d'=>16,'s'=>'P'],['d'=>17,'s'=>'P'],['d'=>18,'s'=>'A'],['d'=>19,'s'=>'P'],['d'=>20,'s'=>'-'],['d'=>21,'s'=>'-'],
            ['d'=>22,'s'=>'P'],['d'=>23,'s'=>'P'],['d'=>24,'s'=>'P'],['d'=>25,'s'=>'P'],['d'=>26,'s'=>'P'],['d'=>27,'s'=>'-'],['d'=>28,'s'=>'-'],
            ['d'=>29,'s'=>'P'],['d'=>30,'s'=>'P'],['d'=>31,'s'=>'P']
        ];
        foreach ($days as $i=>$day) {
            $status = $day['s'];
            $bg = $status==='P'?'#e8f5e8':($status==='A'?'#ffebee':($status==='L'?'#fff8e1':'#f1f5f9'));
            $color = $status==='P'?'#2e7d32':($status==='A'?'#d32f2f':($status==='L'?'#f59e0b':'#64748b'));
            echo '<div style="background:'.$bg.'; border:1px solid #e2e8f0; border-radius:8px; padding:10px; text-align:center;">';
            echo '<div style="font-size:12px; color:#666;">'.$day['d'].'</div>';
            echo '<div style="font-weight:600; color:'.$color.'; margin-top:4px;">'.$status.'</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="simple-section">
    <div class="simple-header"><h3>Summary</h3></div>
    <div class="stats-grid">
        <div class="stat-card"><div class="stat-icon green"><i class="fas fa-check"></i></div><div class="stat-content"><h3>20</h3><p>Present</p></div></div>
        <div class="stat-card"><div class="stat-icon yellow"><i class="fas fa-clock"></i></div><div class="stat-content"><h3>1</h3><p>Late</p></div></div>
        <div class="stat-card"><div class="stat-icon red"><i class="fas fa-times"></i></div><div class="stat-content"><h3>2</h3><p>Absent</p></div></div>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/guardian-layout.php';
?>














