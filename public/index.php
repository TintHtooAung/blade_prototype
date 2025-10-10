<?php

// Simple routing for EMS Portal
require_once __DIR__ . '/../vendor/autoload.php';

// Get the current URI
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Remove query string
$path = strtok($path, '?');

// Simple routing
switch ($path) {
    case '/':
        include __DIR__ . '/../resources/views/home.php';
        break;
    case '/teacher/dashboard':
        include __DIR__ . '/../resources/views/teacher/dashboard.php';
        break;
    case '/staff/dashboard':
        include __DIR__ . '/../resources/views/staff/dashboard.php';
        break;
    case '/admin/dashboard':
        include __DIR__ . '/../resources/views/admin/dashboard.php';
        break;
    
    // Admin Pages
    case '/admin/user-management':
        include __DIR__ . '/../resources/views/admin/user-management.php';
        break;
    case '/admin/academic-management':
        include __DIR__ . '/../resources/views/admin/academic-management.php';
        break;
    case '/admin/announcements':
        include __DIR__ . '/../resources/views/admin/announcements.php';
        break;
    case '/admin/create-announcement':
        include __DIR__ . '/../resources/views/admin/create-announcement.php';
        break;
    case '/admin/event-planner':
        include __DIR__ . '/../resources/views/admin/event-planner.php';
        break;
    case '/admin/event-calendar':
        include __DIR__ . '/../resources/views/admin/event-calendar.php';
        break;
    case '/admin/create-event':
        include __DIR__ . '/../resources/views/admin/create-event.php';
        break;
    case '/admin/schedule-planner':
        include __DIR__ . '/../resources/views/admin/schedule-planner.php';
        break;
    case '/admin/attendance':
        include __DIR__ . '/../resources/views/admin/attendance.php';
        break;
    case '/admin/teacher-profiles':
        include __DIR__ . '/../resources/views/admin/teacher-profiles.php';
        break;
    case '/admin/student-profiles':
        include __DIR__ . '/../resources/views/admin/student-profiles.php';
        break;
    case '/admin/employee-profiles':
        include __DIR__ . '/../resources/views/admin/employee-profiles.php';
        break;
    case '/admin/exam-database':
        include __DIR__ . '/../resources/views/admin/exam-database.php';
        break;
    case '/admin/exam-details':
        include __DIR__ . '/../resources/views/admin/exam-details.php';
        break;
    case '/admin/create-exam':
        include __DIR__ . '/../resources/views/admin/create-exam.php';
        break;

    case '/admin/finance':
        include __DIR__ . '/../resources/views/admin/finance.php';
        break;
    case '/admin/salary-payroll':
        include __DIR__ . '/../resources/views/admin/salary-payroll.php';
        break;
    case '/admin/school-info':
        include __DIR__ . '/../resources/views/admin/school-info.php';
        break;
    case '/admin/activity-logs':
        include __DIR__ . '/../resources/views/admin/activity-logs.php';
        break;
    case '/admin/report-centre':
        include __DIR__ . '/../resources/views/admin/report-centre.php';
        break;
    
    // Attendance details
    case (preg_match('/^\/admin\/attendance\/class\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['class'] = urldecode($matches[1]);
        include __DIR__ . '/../resources/views/admin/attendance-class.php';
        break;
    case '/admin/attendance/staff/mark':
        include __DIR__ . '/../resources/views/admin/attendance-staff-mark.php';
        break;
    
    // Academic detail pages
    case '/admin/academic/batches':
        include __DIR__ . '/../resources/views/admin/academic/batches.php';
        break;
    case '/admin/academic/grades':
        include __DIR__ . '/../resources/views/admin/academic/grades.php';
        break;
    case '/admin/academic/classes':
        include __DIR__ . '/../resources/views/admin/academic/classes.php';
        break;
    case '/admin/academic/rooms':
        include __DIR__ . '/../resources/views/admin/academic/rooms.php';
        break;
    case '/admin/academic/subjects':
        include __DIR__ . '/../resources/views/admin/academic/subjects.php';
        break;
    
    // Academic detail pages (individual items)
    case (preg_match('/^\/admin\/academic\/batch-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['batch'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/batch-detail.php';
        break;
    case (preg_match('/^\/admin\/academic\/grade-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['grade'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/grade-detail.php';
        break;
    case (preg_match('/^\/admin\/academic\/class-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['class'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/class-detail.php';
        break;
    case (preg_match('/^\/admin\/academic\/room-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['room'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/room-detail.php';
        break;
    case (preg_match('/^\/admin\/academic\/subject-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['subject'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/subject-detail.php';
        break;
    case (preg_match('/^\/admin\/academic\/department-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['dept'] = urldecode($matches[1]);
        include __DIR__ . '/../resources/views/admin/academic/department-detail.php';
        break;
    
    // Profile detail pages
    case (preg_match('/^\/admin\/teacher-profile\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['id'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/teacher-profile.php';
        break;
    case (preg_match('/^\/admin\/student-profile\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['id'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/student-profile.php';
        break;
    case (preg_match('/^\/admin\/staff-profile\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['id'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/staff-profile.php';
        break;
        
    default:
        http_response_code(404);
        echo '<h1>404 - Page Not Found</h1>';
        echo '<p><a href="/">Go back to home</a></p>';
        break;
}