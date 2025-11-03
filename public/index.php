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
    case '/admin/department-management':
        include __DIR__ . '/../resources/views/admin/department-management.php';
        break;
    case '/admin/announcements':
        include __DIR__ . '/../resources/views/admin/announcements.php';
        break;
    case '/admin/announcement-details':
        include __DIR__ . '/../resources/views/admin/announcement-details.php';
        break;
    case '/admin/create-announcement':
        include __DIR__ . '/../resources/views/admin/create-announcement.php';
        break;
    case '/admin/event-planner':
        include __DIR__ . '/../resources/views/admin/event-planner.php';
        break;
    case '/admin/event-details':
        include __DIR__ . '/../resources/views/admin/event-details.php';
        break;
    case '/admin/event-edit':
        include __DIR__ . '/../resources/views/admin/event-edit.php';
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
    case '/admin/leave-requests':
        include __DIR__ . '/../resources/views/admin/leave-requests.php';
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
    case '/admin/exam-edit':
        include __DIR__ . '/../resources/views/admin/exam-edit.php';
        break;
    case '/admin/exam-results':
        include __DIR__ . '/../resources/views/admin/exam-results.php';
        break;
    case '/admin/create-exam':
        include __DIR__ . '/../resources/views/admin/create-exam.php';
        break;

    case '/admin/finance':
    case '/admin/student-fee-management':
        include __DIR__ . '/../resources/views/admin/student-fee-management.php';
        break;
    case '/admin/fee-structure':
        include __DIR__ . '/../resources/views/admin/fee-structure.php';
        break;
    case '/admin/payment-history':
        include __DIR__ . '/../resources/views/admin/payment-history.php';
        break;
    case '/admin/payroll-history':
        include __DIR__ . '/../resources/views/admin/payroll-history.php';
        break;
    case '/admin/invoice-details':
        include __DIR__ . '/../resources/views/admin/invoice-details.php';
        break;
    case '/admin/invoice-edit':
        include __DIR__ . '/../resources/views/admin/invoice-edit.php';
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
    case '/admin/report-details':
        include __DIR__ . '/../resources/views/admin/report-details.php';
        break;
    case '/admin/report-edit':
        include __DIR__ . '/../resources/views/admin/report-edit.php';
        break;
    
    // Attendance details
    case (preg_match('/^\/admin\/attendance\/class\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['class'] = urldecode($matches[1]);
        include __DIR__ . '/../resources/views/admin/attendance-class.php';
        break;
    case '/admin/attendance/staff/mark':
        include __DIR__ . '/../resources/views/admin/attendance-staff-mark.php';
        break;
    case (preg_match('/^\/admin\/attendance\/leave-detail\/([^\/?#]+)$/', $uri, $matches) ? true : false):
        $leaveId = urldecode($matches[1]);
        include __DIR__ . '/../resources/views/admin/leave-request-detail.php';
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
    case '/admin/staff-profile':
        include __DIR__ . '/../resources/views/admin/staff-profile.php';
        break;
    
    // Profile edit pages
    case '/admin/teacher-profile-edit':
        include __DIR__ . '/../resources/views/admin/teacher-profile-edit.php';
        break;
    case '/admin/student-profile-edit':
        include __DIR__ . '/../resources/views/admin/student-profile-edit.php';
        break;
    case '/admin/staff-profile-edit':
        include __DIR__ . '/../resources/views/admin/staff-profile-edit.php';
        break;
    
    // Teacher Pages
    case '/teacher/teacher-profile':
        include __DIR__ . '/../resources/views/teacher/teacher-profile.php';
        break;
    case '/teacher/teacher-profile-edit':
        include __DIR__ . '/../resources/views/teacher/teacher-profile-edit.php';
        break;
    
    // Staff Pages
    case '/staff/staff-profile':
        include __DIR__ . '/../resources/views/staff/staff-profile.php';
        break;
    case '/staff/staff-profile-edit':
        include __DIR__ . '/../resources/views/staff/staff-profile-edit.php';
        break;
    case '/staff/event-planner':
        include __DIR__ . '/../resources/views/staff/event-planner.php';
        break;
    case '/staff/event-calendar':
        include __DIR__ . '/../resources/views/staff/event-calendar.php';
        break;
    case '/staff/teacher-profiles':
        include __DIR__ . '/../resources/views/staff/teacher-profiles.php';
        break;
    case (preg_match('/^\/staff\/teacher-profile\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['id'] = $matches[1];
        $_GET['portal'] = 'staff'; // Flag to indicate staff portal
        include __DIR__ . '/../resources/views/admin/teacher-profile.php';
        break;
    case '/staff/announcements':
        include __DIR__ . '/../resources/views/staff/announcements.php';
        break;
    case '/staff/announcement-details':
        include __DIR__ . '/../resources/views/staff/announcement-details.php';
        break;
    case '/staff/schedule-planner':
        include __DIR__ . '/../resources/views/staff/schedule-planner.php';
        break;
    case '/staff/attendance':
        include __DIR__ . '/../resources/views/admin/attendance.php';
        break;
    case '/staff/collect-attendance':
        include __DIR__ . '/../resources/views/staff/collect-attendance.php';
        break;
    case '/staff/student-profiles':
        include __DIR__ . '/../resources/views/staff/student-profiles.php';
        break;
    case '/staff/student-profile':
        include __DIR__ . '/../resources/views/staff/student-profile.php';
        break;
    case (preg_match('/^\/staff\/student-profile\/([^\/?#]+)$/', $uri, $matches) ? true : false):
        $_GET['id'] = $matches[1];
        include __DIR__ . '/../resources/views/staff/student-profile.php';
        break;
    case '/staff/academic-management':
        include __DIR__ . '/../resources/views/staff/academic-management.php';
        break;
    // Staff academic listings (reuse admin pages or staff versions if exist)
    case '/staff/academic/batches':
        include __DIR__ . '/../resources/views/admin/academic/batches.php';
        break;
    case '/staff/academic/grades':
        include __DIR__ . '/../resources/views/admin/academic/grades.php';
        break;
    case '/staff/academic/classes':
        include __DIR__ . '/../resources/views/admin/academic/classes.php';
        break;
    case '/staff/academic/rooms':
        include __DIR__ . '/../resources/views/admin/academic/rooms.php';
        break;
    case '/staff/academic/subjects':
        include __DIR__ . '/../resources/views/admin/academic/subjects.php';
        break;

    // Staff academic detail pages (route to admin detail views)
    case (preg_match('/^\/staff\/academic\/batch-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['batch'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/batch-detail.php';
        break;
    case (preg_match('/^\/staff\/academic\/grade-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['grade'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/grade-detail.php';
        break;
    case (preg_match('/^\/staff\/academic\/class-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['class'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/class-detail.php';
        break;
    case (preg_match('/^\/staff\/academic\/room-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['room'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/room-detail.php';
        break;
    case (preg_match('/^\/staff\/academic\/subject-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['subject'] = $matches[1];
        include __DIR__ . '/../resources/views/admin/academic/subject-detail.php';
        break;
    case '/staff/exam-database':
        include __DIR__ . '/../resources/views/admin/exam-database.php';
        break;
    case '/staff/create-exam':
        include __DIR__ . '/../resources/views/admin/create-exam.php';
        break;
    case '/staff/exam-details':
        include __DIR__ . '/../resources/views/admin/exam-details.php';
        break;
    case '/staff/exam-edit':
        include __DIR__ . '/../resources/views/admin/exam-edit.php';
        break;
    case '/staff/exam-results':
        include __DIR__ . '/../resources/views/admin/exam-results.php';
        break;
    case '/staff/student-fee-management':
        include __DIR__ . '/../resources/views/admin/student-fee-management.php';
        break;
    case '/staff/salary-payroll':
        include __DIR__ . '/../resources/views/admin/salary-payroll.php';
        break;
    case '/staff/report-centre':
        include __DIR__ . '/../resources/views/staff/report-centre.php';
        break;
    case '/staff/leave-request':
        include __DIR__ . '/../resources/views/staff/leave-request.php';
        break;
    
    // Teacher Pages
    case '/teacher/event-calendar':
        include __DIR__ . '/../resources/views/teacher/event-calendar.php';
        break;
    case '/teacher/announcements':
        include __DIR__ . '/../resources/views/teacher/announcements.php';
        break;
    case '/teacher/announcement-details':
        include __DIR__ . '/../resources/views/teacher/announcement-details.php';
        break;
    case '/teacher/schedule-view':
        include __DIR__ . '/../resources/views/teacher/schedule-view.php';
        break;
    case '/teacher/attendance':
        include __DIR__ . '/../resources/views/teacher/attendance.php';
        break;
    case '/teacher/student-profiles':
        include __DIR__ . '/../resources/views/teacher/student-profiles.php';
        break;
    case '/teacher/student-profile':
        include __DIR__ . '/../resources/views/teacher/student-profile.php';
        break;
    case (preg_match('/^\/teacher\/student-profile\/([^\/?#]+)$/', $uri, $matches) ? true : false):
        $_GET['id'] = $matches[1];
        include __DIR__ . '/../resources/views/teacher/student-profile.php';
        break;
    case '/teacher/subject-profiles':
        include __DIR__ . '/../resources/views/teacher/subject-profiles.php';
        break;
    case (preg_match('/^\/teacher\/subject-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['subject'] = urldecode($matches[1]);
        include __DIR__ . '/../resources/views/teacher/subject-detail.php';
        break;
    case '/teacher/class-profiles':
        include __DIR__ . '/../resources/views/teacher/class-profiles.php';
        break;
    case (preg_match('/^\/teacher\/class-detail\/(.+)$/', $uri, $matches) ? true : false):
        $_GET['class'] = urldecode($matches[1]);
        include __DIR__ . '/../resources/views/teacher/class-detail.php';
        break;
    case '/teacher/exam-results':
        include __DIR__ . '/../resources/views/teacher/exam-results.php';
        break;
    case '/teacher/exam-details':
        include __DIR__ . '/../resources/views/teacher/exam-details.php';
        break;
    case '/teacher/class-schedules':
        include __DIR__ . '/../resources/views/teacher/class-schedules.php';
        break;
    case '/teacher/class-schedule/Grade-10A':
        include __DIR__ . '/../resources/views/teacher/class-schedule-detail.php';
        break;
    case '/teacher/class-schedule/Grade-10B':
        include __DIR__ . '/../resources/views/teacher/class-schedule-detail.php';
        break;
    case '/teacher/class-schedule/Grade-11A':
        include __DIR__ . '/../resources/views/teacher/class-schedule-detail.php';
        break;
    case '/teacher/class-schedule/Grade-11B':
        include __DIR__ . '/../resources/views/teacher/class-schedule-detail.php';
        break;
    case '/teacher/class-schedule/Grade-12A':
        include __DIR__ . '/../resources/views/teacher/class-schedule-detail.php';
        break;
    case '/teacher/class-schedule/Grade-12B':
        include __DIR__ . '/../resources/views/teacher/class-schedule-detail.php';
        break;
    case '/teacher/enter-marks':
        include __DIR__ . '/../resources/views/teacher/enter-marks.php';
        break;
    case '/teacher/leave-request':
        include __DIR__ . '/../resources/views/teacher/leave-request.php';
        break;
    case '/teacher/homework':
        include __DIR__ . '/../resources/views/teacher/homework.php';
        break;
    
    // Parent/Guardian Pages
    case '/parent/dashboard':
        include __DIR__ . '/../resources/views/parent/dashboard.php';
        break;
    case '/parent/my-children':
        include __DIR__ . '/../resources/views/parent/my-children.php';
        break;
    case '/parent/attendance':
        include __DIR__ . '/../resources/views/parent/attendance.php';
        break;
    case '/parent/academic-reports':
        include __DIR__ . '/../resources/views/parent/academic-reports.php';
        break;
    case '/parent/exam-results':
        include __DIR__ . '/../resources/views/parent/exam-results.php';
        break;
    case '/parent/announcements':
        include __DIR__ . '/../resources/views/parent/announcements.php';
        break;
    case '/parent/announcement-details':
        include __DIR__ . '/../resources/views/parent/announcement-details.php';
        break;
    case '/parent/event-calendar':
        include __DIR__ . '/../resources/views/parent/event-calendar.php';
        break;
    case '/parent/homework':
        include __DIR__ . '/../resources/views/parent/homework.php';
        break;
    case '/parent/leave-request':
        include __DIR__ . '/../resources/views/parent/leave-request.php';
        break;
    case '/parent/fee-payment':
        include __DIR__ . '/../resources/views/parent/fee-payment.php';
        break;
    case '/parent/payment-history':
        include __DIR__ . '/../resources/views/parent/payment-history.php';
        break;
        
    default:
        http_response_code(404);
        echo '<h1>404 - Page Not Found</h1>';
        echo '<p><a href="/">Go back to home</a></p>';
        break;
}