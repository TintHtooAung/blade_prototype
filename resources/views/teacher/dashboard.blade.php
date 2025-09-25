@extends('layouts.app')

@section('title', 'Teacher Dashboard - EMS Portal')

@section('content')
<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 mb-3">
                    <i class="fas fa-chalkboard-teacher me-3"></i>
                    Teacher Dashboard
                </h1>
                <p class="lead mb-0">Welcome back! Manage your classes and students effectively.</p>
            </div>
            <div class="col-md-4 text-end">
                <div class="bg-white bg-opacity-20 rounded p-3">
                    <h5 class="mb-1">Today's Date</h5>
                    <p class="mb-0">{{ date('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <h4>152</h4>
                    <p class="mb-0">Total Students</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-2x mb-2"></i>
                    <h4>8</h4>
                    <p class="mb-0">Active Classes</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="fas fa-clipboard-list fa-2x mb-2"></i>
                    <h4>24</h4>
                    <p class="mb-0">Pending Assignments</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-check fa-2x mb-2"></i>
                    <h4>3</h4>
                    <p class="mb-0">Today's Classes</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Areas -->
    <div class="row">
        <!-- My Classes -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard me-2"></i>
                        My Classes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Mathematics Grade 10</h6>
                                <small class="text-muted">Room 205 • 9:00 AM - 10:30 AM</small>
                            </div>
                            <span class="badge bg-success rounded-pill">28 students</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Algebra Grade 11</h6>
                                <small class="text-muted">Room 205 • 11:00 AM - 12:30 PM</small>
                            </div>
                            <span class="badge bg-success rounded-pill">25 students</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Calculus Grade 12</h6>
                                <small class="text-muted">Room 205 • 2:00 PM - 3:30 PM</small>
                            </div>
                            <span class="badge bg-success rounded-pill">22 students</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm">View All Classes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-clock me-2"></i>
                        Recent Activities
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Assignment graded</h6>
                                <small class="text-muted">Mathematics Quiz #3 - 2 hours ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">New assignment created</h6>
                                <small class="text-muted">Algebra Homework #5 - 4 hours ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Student attendance updated</h6>
                                <small class="text-muted">Grade 10 Mathematics - Yesterday</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success btn-sm">View All Activities</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-plus-circle d-block mb-1"></i>
                                Create Assignment
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-success w-100">
                                <i class="fas fa-check-circle d-block mb-1"></i>
                                Take Attendance
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-warning w-100">
                                <i class="fas fa-star d-block mb-1"></i>
                                Grade Assignments
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-chart-bar d-block mb-1"></i>
                                View Reports
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-secondary w-100">
                                <i class="fas fa-calendar d-block mb-1"></i>
                                Schedule
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-dark w-100">
                                <i class="fas fa-cog d-block mb-1"></i>
                                Settings
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -30px;
    top: 17px;
    width: 2px;
    height: calc(100% + 8px);
    background-color: #e9ecef;
}
</style>
@endpush
