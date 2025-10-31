<?php
// Expect $pageTitle, $pageIcon, $content, $activePage
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Smart Campus Guardian'; ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .guardian-topbar { display:flex; align-items:center; justify-content:space-between; padding:12px 16px; background:#174B8F; color:#fff; }
        .guardian-topbar .brand { display:flex; align-items:center; gap:10px; font-weight:600; }
        .lang-toggle { background:#ffffff22; border:1px solid #ffffff33; color:#fff; padding:6px 10px; border-radius:8px; cursor:pointer; }
        .guardian-container { display:flex; }
        .guardian-main { flex:1; padding:16px; background:#F6F7FB; min-height:100vh; }
        .kid-switch { display:flex; gap:8px; }
        .kid-chip { background:#fff; border:1px solid #e0e0e0; padding:6px 10px; border-radius:16px; cursor:pointer; }
        .kid-chip.active { background:#e3f2fd; border-color:#1976d2; color:#1976d2; }
    </style>
</head>
<body>
    <div class="guardian-topbar">
        <div class="brand"><i class="fas fa-shield-alt"></i> SmartCampus Guardian</div>
        <div class="kid-switch" id="kidSwitch">
            <div class="kid-chip active" data-kid="1">Aung Min</div>
            <div class="kid-chip" data-kid="2">Mya Thazin</div>
        </div>
        <button class="lang-toggle" id="langToggle">English</button>
    </div>
    <div class="guardian-container">
        <?php include __DIR__ . '/guardian-sidebar.php'; ?>
        <main class="guardian-main">
            <?php echo $content ?? ''; ?>
        </main>
    </div>

    <script>
    // Simple bilingual toggle (label only for prototype)
    document.getElementById('langToggle')?.addEventListener('click', function(){
        this.textContent = this.textContent === 'English' ? 'မြန်မာ' : 'English';
    });
    // Multi-child switch visual
    document.getElementById('kidSwitch')?.addEventListener('click', function(e){
        const chip = e.target.closest('.kid-chip'); if(!chip) return;
        Array.from(this.children).forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
    });
    </script>
</body>
</html>



