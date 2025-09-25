<?php
$pageTitle = 'Smart Campus Nova Hub - User Activity Logs';
$pageIcon = 'fas fa-chart-line';
$pageHeading = 'User Activity Logs';
$activePage = 'logs';

include __DIR__ . '/../components/blank-page.php';
$content = renderBlankPage(
    'fas fa-chart-line',
    'User Activity Logs',
    'Monitor system usage, track user activities, and view detailed audit logs.'
);

include __DIR__ . '/../components/admin-layout.php';
?>