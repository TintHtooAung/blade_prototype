<?php
$pageTitle = 'Smart Campus Nova Hub - School Info';
$pageIcon = 'fas fa-school';
$pageHeading = 'School Info';
$activePage = 'school';

include __DIR__ . '/../components/blank-page.php';
$content = renderBlankPage(
    'fas fa-school',
    'School Info',
    'Manage school details, contact information, policies, and institutional settings.'
);

include __DIR__ . '/../components/admin-layout.php';
?>