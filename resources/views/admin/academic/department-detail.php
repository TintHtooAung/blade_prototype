<?php
$deptCode = $_GET['dept'] ?? 'PRIMARY';
$pageTitle = 'Smart Campus Nova Hub - Department Details: ' . $deptCode;
$pageIcon = 'fas fa-building';
$pageHeading = 'Department Details';
$activePage = 'academic';

// Department data mapping
$deptData = [
    'PRIMARY' => ['name' => 'Primary Teachers', 'building' => 'Building A', 'count' => '15'],
    'LANG' => ['name' => 'Language Teachers', 'building' => 'Building B', 'count' => '8'],
    'ICT' => ['name' => 'ICT Staff', 'building' => 'Building C', 'count' => '5'],
    'ADMIN' => ['name' => 'Administrative Staff', 'building' => 'Main Building', 'count' => '12'],
    'MAINT' => ['name' => 'Maintenance & Security', 'building' => 'Service Building', 'count' => '10'],
];
$dept = $deptData[$deptCode] ?? $deptData['PRIMARY'];

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

<!-- Department Header -->
<div class="batch-detail-header">
    <div class="batch-header-info">
        <div class="batch-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="batch-info">
            <h1><?php echo htmlspecialchars($deptCode); ?> - <?php echo htmlspecialchars($dept['name']); ?></h1>
            <div class="batch-meta">
                <span class="status-badge active">Active</span>
            </div>
        </div>
    </div>
    <div class="batch-actions">
        <button class="action-btn-header edit">
            <i class="fas fa-edit"></i> Edit Department
        </button>
        <button class="action-btn-header delete">
            <i class="fas fa-trash"></i> Delete Department
        </button>
    </div>
</div>

<!-- Department Statistics -->
<div class="detail-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Department Code',
        'value' => $deptCode,
        'icon' => 'fas fa-building',
        'iconColor' => 'blue'
    ]); ?>
    <?php echo renderStatCard([
        'title' => 'Staff Members',
        'value' => $dept['count'],
        'icon' => 'fas fa-users',
        'iconColor' => 'purple'
    ]); ?>
    
</div>

<?php
// Build staff lists per department (demo data)
$staffLists = [
    'PRIMARY' => [
        ['name' => 'Ms. Sarah Johnson', 'role' => 'Department Head', 'url' => '/admin/teacher-profile?id=T001'],
        ['name' => 'Mr. Alan Brown', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T010'],
        ['name' => 'Ms. Jennifer Lee', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T011'],
    ],
    'LANG' => [
        ['name' => 'Dr. Emily Chen', 'role' => 'Department Head', 'url' => '/admin/teacher-profile?id=T002'],
        ['name' => 'Mr. Paolo Rossi', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T012'],
        ['name' => 'Ms. Ayesha Khan', 'role' => 'Teacher', 'url' => '/admin/teacher-profile?id=T013'],
    ],
    'ICT' => [
        ['name' => 'Mr. David Kumar', 'role' => 'IT Manager', 'url' => '/admin/staff-profile?id=E001'],
        ['name' => 'Ms. Priya Singh', 'role' => 'Sysadmin', 'url' => '/admin/staff-profile?id=E010'],
        ['name' => 'Mr. Wei Zhang', 'role' => 'Support Engineer', 'url' => '/admin/staff-profile?id=E011'],
    ],
    'ADMIN' => [
        ['name' => 'Ms. Lisa Park', 'role' => 'Office Manager', 'url' => '/admin/staff-profile?id=E002'],
        ['name' => 'Mr. Omar Ali', 'role' => 'Clerk', 'url' => '/admin/staff-profile?id=E012'],
        ['name' => 'Ms. Nina Patel', 'role' => 'Receptionist', 'url' => '/admin/staff-profile?id=E013'],
    ],
    'MAINT' => [
        ['name' => 'Mr. Robert Jones', 'role' => 'Facilities Manager', 'url' => '/admin/staff-profile?id=E003'],
        ['name' => 'Mr. John Doe', 'role' => 'Security Lead', 'url' => '/admin/staff-profile?id=E014'],
        ['name' => 'Ms. Maria Lopez', 'role' => 'Custodian', 'url' => '/admin/staff-profile?id=E015'],
    ],
];
$staff = $staffLists[$deptCode] ?? [];
?>

<!-- Department Staff Section -->
<div class="detail-section">
    <div class="section-header">
        <h3 class="section-title">Department Staff</h3>
        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Add Staff
        </button>
    </div>
    <div class="grades-grid">
        <?php foreach ($staff as $member): ?>
        <div class="grade-detail-card" onclick="window.location.href='<?php echo htmlspecialchars($member['url']); ?>'" style="cursor:pointer;">
            <div class="grade-card-header">
                <a href="<?php echo htmlspecialchars($member['url']); ?>" class="grade-link" onclick="event.stopPropagation()"><?php echo htmlspecialchars($member['name']); ?></a>
                <span class="type-badge"><?php echo htmlspecialchars($member['role']); ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Add Staff Modal -->
    <div id="addStaffModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; width:780px; max-width:94vw; border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow:hidden;">
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; border-bottom:1px solid #e2e8f0;">
                <h3 style="margin:0; font-size:16px;">Add Staff to Department</h3>
                <button id="closeAddStaff" class="simple-btn" style="padding:6px 10px;">Close</button>
            </div>
            <div style="padding:12px 16px;">
                <div style="display:flex; gap:8px; margin-bottom:12px; align-items:center;">
                    <button id="tabTeachers" class="simple-btn primary" style="padding:6px 10px;">Teachers</button>
                    <button id="tabStaff" class="simple-btn" style="padding:6px 10px;">Staff</button>
                    <div style="margin-left:auto; display:flex; align-items:center; gap:8px;">
                        <input id="addStaffSearch" type="text" class="form-input" placeholder="Search by name or ID" style="width:280px;">
                    </div>
                </div>
                <div style="display:flex; gap:16px; align-items:flex-start;">
                    <div style="flex:1;">
                        <div id="listTeachers" style="max-height:340px; overflow:auto; border:1px solid #e2e8f0; border-radius:6px;">
                            <table class="basic-table" style="margin:0;">
                                <thead><tr><th style="width:40px;"></th><th>Name</th><th>ID</th></tr></thead>
                                <tbody id="teachersBody"></tbody>
                            </table>
                        </div>
                        <div id="listStaff" style="display:none; max-height:340px; overflow:auto; border:1px solid #e2e8f0; border-radius:6px;">
                            <table class="basic-table" style="margin:0;">
                                <thead><tr><th style="width:40px;"></th><th>Name</th><th>ID</th></tr></thead>
                                <tbody id="staffBody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="margin-top:12px; text-align:right;">
                    <button id="addSelectedBtn" class="simple-btn primary"><i class="fas fa-plus"></i> Add Selected</button>
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
// Demo directory sources; in a real app these would be fetched from API
const demoTeachers = [
    { id: 'T001', name: 'Ms. Sarah Johnson', url: '/admin/teacher-profile?id=T001' },
    { id: 'T002', name: 'Dr. Emily Chen', url: '/admin/teacher-profile?id=T002' },
    { id: 'T010', name: 'Mr. Alan Brown', url: '/admin/teacher-profile?id=T010' },
    { id: 'T011', name: 'Ms. Jennifer Lee', url: '/admin/teacher-profile?id=T011' }
];
const demoStaff = [
    { id: 'E001', name: 'Mr. David Kumar', url: '/admin/staff-profile?id=E001' },
    { id: 'E002', name: 'Ms. Lisa Park', url: '/admin/staff-profile?id=E002' },
    { id: 'E010', name: 'Ms. Priya Singh', url: '/admin/staff-profile?id=E010' },
    { id: 'E011', name: 'Mr. Wei Zhang', url: '/admin/staff-profile?id=E011' }
];

document.addEventListener('DOMContentLoaded', function(){
    const addBtn = document.querySelector('.detail-section .add-btn');
    const modal = document.getElementById('addStaffModal');
    const closeBtn = document.getElementById('closeAddStaff');
    const tabTeachers = document.getElementById('tabTeachers');
    const tabStaff = document.getElementById('tabStaff');
    const listTeachers = document.getElementById('listTeachers');
    const listStaff = document.getElementById('listStaff');
    const teachersBody = document.getElementById('teachersBody');
    const staffBody = document.getElementById('staffBody');
    const addSelectedBtn = document.getElementById('addSelectedBtn');
    const cardsContainer = document.querySelector('.detail-section .grades-grid');
    const staffCountBadge = document.querySelector('.detail-stats-grid .stat-card:nth-child(2) .stat-value');

    function renderList(targetBody, items) {
        targetBody.innerHTML = '';
        items.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td><input type=\"checkbox\" data-id=\"${item.id}\" data-name=\"${item.name}\" data-url=\"${item.url}\"></td>
                            <td>${item.name}</td>
                            <td>${item.id}</td>`;
            targetBody.appendChild(tr);
        });
    }
    renderList(teachersBody, demoTeachers);
    renderList(staffBody, demoStaff);

    // Search/filter
    const searchInput = document.getElementById('addStaffSearch');
    function filterLists() {
        const q = (searchInput.value || '').toLowerCase();
        const filter = arr => arr.filter(x => x.name.toLowerCase().includes(q) || x.id.toLowerCase().includes(q));
        renderList(teachersBody, filter(demoTeachers));
        renderList(staffBody, filter(demoStaff));
    }
    searchInput && searchInput.addEventListener('input', filterLists);

    function openModal(){ modal.style.display = 'flex'; }
    function closeModal(){ modal.style.display = 'none'; }
    addBtn && addBtn.addEventListener('click', openModal);
    closeBtn && closeBtn.addEventListener('click', closeModal);
    modal && modal.addEventListener('click', function(e){ if(e.target === modal) closeModal(); });

    tabTeachers && tabTeachers.addEventListener('click', function(){
        tabTeachers.classList.add('primary'); tabStaff.classList.remove('primary');
        listTeachers.style.display = 'block'; listStaff.style.display = 'none';
    });
    tabStaff && tabStaff.addEventListener('click', function(){
        tabStaff.classList.add('primary'); tabTeachers.classList.remove('primary');
        listTeachers.style.display = 'none'; listStaff.style.display = 'block';
    });

    addSelectedBtn && addSelectedBtn.addEventListener('click', function(){
        const checked = modal.querySelectorAll('input[type="checkbox"]:checked');
        checked.forEach(cb => {
            const name = cb.getAttribute('data-name');
            const url = cb.getAttribute('data-url');
            const card = document.createElement('div');
            card.className = 'grade-detail-card';
            card.setAttribute('onclick', `window.location.href='${url}'`);
            card.style.cursor = 'pointer';
            card.innerHTML = `
                <div class=\"grade-card-header\"> 
                    <a href=\"${url}\" class=\"grade-link\" onclick=\"event.stopPropagation()\">${name}</a>
                </div>`;
            cardsContainer.prepend(card);
        });
        try {
            const current = parseInt((staffCountBadge && staffCountBadge.textContent || '0').replace(/[^0-9]/g,'')) || 0;
            const added = checked.length;
            if (staffCountBadge && added > 0) staffCountBadge.textContent = String(current + added);
        } catch(e) {}
        closeModal();
    });
});
</script>

