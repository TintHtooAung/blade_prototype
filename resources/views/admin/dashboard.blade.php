@extends('layouts.app')

@section('title', 'Admin Dashboard - EMS Portal')

@section('content')
<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 mb-3">
                    <i class="fas fa-user-shield me-3"></i>
                    Administrator Dashboard
                </h1>
                <p class="lead mb-0">Complete system overview and administrative controls.</p>
            </div>
            <div class="col-md-4 text-end">
                <div class="bg-white bg-opacity-20 rounded p-3">
                    <h5 class="mb-1">System Status</h5>
                    <p class="mb-0"><span class="badge bg-success">Online</span> All Services Running</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- System Overview Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <h4>1,248</h4>
                    <p class="mb-0">Total Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>
                    <h4>89</h4>
                    <p class="mb-0">Teachers</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="fas fa-users-cog fa-2x mb-2"></i>
                    <h4>24</h4>
                    <p class="mb-0">Staff Members</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <i class="fas fa-user-graduate fa-2x mb-2"></i>
                    <h4>1,135</h4>
                    <p class="mb-0">Students</p>
                </div>
            </div>
        </div>
    </div>

    <!-- System Metrics -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>
                        System Analytics
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="border rounded p-3 text-center">
                                <h6 class="text-muted mb-1">Daily Active Users</h6>
                                <h3 class="text-primary">892</h3>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> +12% from yesterday
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3 text-center">
                                <h6 class="text-muted mb-1">System Uptime</h6>
                                <h3 class="text-success">99.9%</h3>
                                <small class="text-muted">Last 30 days</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border rounded p-3 text-center">
                                <h6 class="text-muted mb-1">Database Size</h6>
                                <h3 class="text-info">2.4 GB</h3>
                                <small class="text-warning">
                                    <i class="fas fa-exclamation-triangle"></i> 75% capacity
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3 text-center">
                                <h6 class="text-muted mb-1">Active Sessions</h6>
                                <h3 class="text-warning">156</h3>
                                <small class="text-muted">Current online users</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent System Events -->
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-bell me-2"></i>
                        System Alerts
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-sm" role="alert">
                        <strong>Storage Warning:</strong> Database approaching capacity limit.
                    </div>
                    <div class="alert alert-info alert-sm" role="alert">
                        <strong>Update Available:</strong> Security patch v2.1.3 ready.
                    </div>
                    <div class="alert alert-success alert-sm" role="alert">
                        <strong>Backup Complete:</strong> Daily backup finished successfully.
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-danger btn-sm">View All Alerts</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Management -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-users-cog me-2"></i>
                        User Management
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search users...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-success btn-sm me-2">
                                <i class="fas fa-user-plus me-1"></i>
                                Add User
                            </button>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download me-1"></i>
                                Export Data
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>USR001</td>
                                    <td>Dr. Sarah Wilson</td>
                                    <td><span class="badge bg-success">Teacher</span></td>
                                    <td>2 hours ago</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger">Suspend</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR002</td>
                                    <td>Mark Johnson</td>
                                    <td><span class="badge bg-warning">Staff</span></td>
                                    <td>30 minutes ago</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger">Suspend</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR003</td>
                                    <td>Emily Davis</td>
                                    <td><span class="badge bg-danger">Admin</span></td>
                                    <td>1 hour ago</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button class="btn btn-sm btn-outline-secondary">View Logs</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Configuration -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-cogs me-2"></i>
                        System Configuration
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Academic Year Settings</span>
                            <button class="btn btn-sm btn-outline-primary">Configure</button>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Grading System</span>
                            <button class="btn btn-sm btn-outline-primary">Configure</button>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Email Templates</span>
                            <button class="btn btn-sm btn-outline-primary">Configure</button>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Security Policies</span>
                            <button class="btn btn-sm btn-outline-primary">Configure</button>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Backup Settings</span>
                            <button class="btn btn-sm btn-outline-primary">Configure</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports & Analytics -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie me-2"></i>
                        Reports & Analytics
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-chart-line d-block mb-1"></i>
                                User Activity Report
                            </button>
                        </div>
                        <div class="col-6 mb-3">
                            <button class="btn btn-outline-success w-100">
                                <i class="fas fa-graduation-cap d-block mb-1"></i>
                                Academic Performance
                            </button>
                        </div>
                        <div class="col-6 mb-3">
                            <button class="btn btn-outline-warning w-100">
                                <i class="fas fa-dollar-sign d-block mb-1"></i>
                                Financial Report
                            </button>
                        </div>
                        <div class="col-6 mb-3">
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-calendar-check d-block mb-1"></i>
                                Attendance Report
                            </button>
                        </div>
                        <div class="col-6 mb-3">
                            <button class="btn btn-outline-danger w-100">
                                <i class="fas fa-shield-alt d-block mb-1"></i>
                                Security Audit
                            </button>
                        </div>
                        <div class="col-6 mb-3">
                            <button class="btn btn-outline-dark w-100">
                                <i class="fas fa-database d-block mb-1"></i>
                                System Usage
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Administrative Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-database d-block mb-1"></i>
                                Backup System
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-success w-100">
                                <i class="fas fa-sync-alt d-block mb-1"></i>
                                System Update
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-warning w-100">
                                <i class="fas fa-exclamation-triangle d-block mb-1"></i>
                                Maintenance Mode
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-envelope d-block mb-1"></i>
                                Send Notification
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-secondary w-100">
                                <i class="fas fa-file-export d-block mb-1"></i>
                                Export Data
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-dark w-100">
                                <i class="fas fa-cog d-block mb-1"></i>
                                System Settings
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
.alert-sm {
    padding: 0.375rem 0.75rem;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}
</style>
@endpush
