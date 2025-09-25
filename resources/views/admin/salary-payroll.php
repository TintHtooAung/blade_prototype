<?php
$pageTitle = 'Smart Campus Nova Hub - Salary & Payroll';
$pageIcon = 'fas fa-money-check-alt';
$pageHeading = 'Salary & Payroll';
$activePage = 'payroll';

include __DIR__ . '/../components/blank-page.php';
$content = renderBlankPage(
    'fas fa-money-check-alt',
    'Salary & Payroll',
    'Manage employee salaries, payroll processing, and compensation records.'
);

include __DIR__ . '/../components/admin-layout.php';
?>