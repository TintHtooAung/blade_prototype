<?php
$pageTitle = 'Smart Campus Nova Hub - Report Centre';
$pageIcon = 'fas fa-file-alt';
$pageHeading = 'Report Centre';
$activePage = 'reports';

include __DIR__ . '/../components/blank-page.php';
$content = renderBlankPage(
    'fas fa-file-alt',
    'Report Centre',
    'Generate and view comprehensive reports on academics, attendance, finances, and more.'
);

include __DIR__ . '/../components/admin-layout.php';
?>