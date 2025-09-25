<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the home page with role selection.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Display the teacher dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function teacherDashboard()
    {
        // In a real application, you would:
        // - Check if user is authenticated
        // - Verify user has teacher role
        // - Fetch teacher-specific data
        
        return view('teacher.dashboard');
    }

    /**
     * Display the staff dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function staffDashboard()
    {
        // In a real application, you would:
        // - Check if user is authenticated
        // - Verify user has staff role
        // - Fetch staff-specific data
        
        return view('staff.dashboard');
    }

    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function adminDashboard()
    {
        // In a real application, you would:
        // - Check if user is authenticated
        // - Verify user has admin role
        // - Fetch admin-specific data and system metrics
        
        return view('admin.dashboard');
    }
}
