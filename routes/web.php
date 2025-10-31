<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page with role selection
Route::get('/', [DashboardController::class, 'home'])->name('home');

// Teacher routes
Route::prefix('teacher')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
    // Additional teacher routes can be added here later
    // Route::get('/classes', [TeacherController::class, 'classes'])->name('teacher.classes');
    // Route::get('/assignments', [TeacherController::class, 'assignments'])->name('teacher.assignments');
    // Route::get('/students', [TeacherController::class, 'students'])->name('teacher.students');
});

// Staff routes
Route::prefix('staff')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'staffDashboard'])->name('staff.dashboard');
    Route::get('/department-management', function() {
        include resource_path('views/staff/department-management.php');
    })->name('staff.department-management');
    // Additional staff routes can be added here later
    // Route::get('/students', [StaffController::class, 'students'])->name('staff.students');
    // Route::get('/enrollment', [StaffController::class, 'enrollment'])->name('staff.enrollment');
    // Route::get('/reports', [StaffController::class, 'reports'])->name('staff.reports');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    
    // Admin Pages - All using simple includes for now
    Route::get('/user-management', function() { 
        include resource_path('views/admin/user-management.php'); 
    })->name('admin.user-management');
    
    Route::get('/academic-management', function() { 
        include resource_path('views/admin/academic-management.php'); 
    })->name('admin.academic-management');
    
    Route::get('/department-management', function() {
        include resource_path('views/admin/department-management.php');
    })->name('admin.department-management');
    
    Route::get('/announcements', function() { 
        include resource_path('views/admin/announcements.php'); 
    })->name('admin.announcements');
    
    Route::get('/event-planner', function() { 
        include resource_path('views/admin/event-planner.php'); 
    })->name('admin.event-planner');
    
    Route::get('/schedule-planner', function() { 
        include resource_path('views/admin/schedule-planner.php'); 
    })->name('admin.schedule-planner');
    
    Route::get('/attendance', function() { 
        include resource_path('views/admin/attendance.php'); 
    })->name('admin.attendance');
    Route::get('/attendance/leave-detail/{id}', function($id) {
        // Make $id available in included page
        $leaveId = $id;
        include resource_path('views/admin/leave-request-detail.php');
    })->name('admin.attendance.leave-detail');
    
    Route::get('/teacher-profiles', function() { 
        include resource_path('views/admin/teacher-profiles.php'); 
    })->name('admin.teacher-profiles');
    
    Route::get('/student-profiles', function() { 
        include resource_path('views/admin/student-profiles.php'); 
    })->name('admin.student-profiles');
    
    Route::get('/employee-profiles', function() { 
        include resource_path('views/admin/employee-profiles.php'); 
    })->name('admin.employee-profiles');
    
    Route::get('/exam-database', function() { 
        include resource_path('views/admin/exam-database.php'); 
    })->name('admin.exam-database');
    
    Route::get('/finance', function() { 
        include resource_path('views/admin/finance.php'); 
    })->name('admin.finance');
    
    Route::get('/salary-payroll', function() { 
        include resource_path('views/admin/salary-payroll.php'); 
    })->name('admin.salary-payroll');
    
    Route::get('/school-info', function() { 
        include resource_path('views/admin/school-info.php'); 
    })->name('admin.school-info');
    
    Route::get('/activity-logs', function() { 
        include resource_path('views/admin/activity-logs.php'); 
    })->name('admin.activity-logs');
    
    Route::get('/report-centre', function() { 
        include resource_path('views/admin/report-centre.php'); 
    })->name('admin.report-centre');
});

// API Routes for Academic Management
Route::prefix('api')->group(function () {
    Route::get('/academic/data', function() {
        include public_path('api/academic.php');
    })->name('api.academic.data');
});

// Guardian (Parent) portal routes
Route::prefix('guardian')->group(function () {
    Route::get('/dashboard', function () {
        include resource_path('views/guardian/dashboard.php');
    })->name('guardian.dashboard');
    Route::get('/attendance', function () {
        include resource_path('views/guardian/attendance.php');
    })->name('guardian.attendance');
    Route::get('/reports', function () {
        include resource_path('views/guardian/reports.php');
    })->name('guardian.reports');
    Route::get('/announcements', function () {
        include resource_path('views/guardian/announcements.php');
    })->name('guardian.announcements');
    Route::get('/profile', function () {
        include resource_path('views/guardian/profile.php');
    })->name('guardian.profile');
});
