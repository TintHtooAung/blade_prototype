@extends('layouts.app')

@section('title', 'Staff Dashboard - EMS Portal')

@section('content')
<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 mb-3">
                    <i class="fas fa-users-cog me-3"></i>
                    Staff Dashboard
                </h1>
                <p class="lead mb-0">Administrative tools and student management at your fingertips.</p>
            </div>
            <div class="col-md-4 text-end">
                <div class="bg-white bg-opacity-20 rounded p-3">
                    <h5 class="mb-1">Active Session</h5>
                    <p class="mb-0">{{ date('H:i') }} - {{ date('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-user-graduate fa-2x mb-2"></i>
                    <h4>1,248</h4>
                    <p class="mb-0">Total Students</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-2x mb-2"></i>
                    <h4>23</h4>
                    <p class="mb-0">New Enrollments</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                    <h4>7</h4>
                    <p class="mb-0">Pending Requests</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="fas fa-building fa-2x mb-2"></i>
                    <h4>12</h4>
                    <p class="mb-0">Departments</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Areas -->
    <div class="row">
        <!-- Student Management -->
        <div class="col-lg-8 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>
                        Student Management
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search students...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-plus me-1"></i>
                                Add New Student
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>STU2024001</td>
                                    <td>John Smith</td>
                                    <td>Grade 10</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STU2024002</td>
                                    <td>Emily Johnson</td>
                                    <td>Grade 11</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STU2024003</td>
                                    <td>Michael Brown</td>
                                    <td>Grade 12</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Tasks -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="fas fa-tasks me-2"></i>
                        Pending Tasks
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Enrollment Applications</h6>
                                <small class="text-muted">Review new student applications</small>
                            </div>
                            <span class="badge bg-danger rounded-pill">5</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Document Verification</h6>
                                <small class="text-muted">Verify submitted documents</small>
                            </div>
                            <span class="badge bg-warning rounded-pill">3</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Fee Collection</h6>
                                <small class="text-muted">Process pending payments</small>
                            </div>
                            <span class="badge bg-info rounded-pill">12</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Grade Updates</h6>
                                <small class="text-muted">Process grade changes</small>
                            </div>
                            <span class="badge bg-success rounded-pill">2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Department Overview -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-sitemap me-2"></i>
                        Department Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-calculator fa-2x text-primary mb-2"></i>
                                <h6>Mathematics</h6>
                                <small class="text-muted">8 Teachers, 245 Students</small>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-flask fa-2x text-success mb-2"></i>
                                <h6>Science</h6>
                                <small class="text-muted">12 Teachers, 312 Students</small>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-book fa-2x text-warning mb-2"></i>
                                <h6>English</h6>
                                <small class="text-muted">6 Teachers, 298 Students</small>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-globe fa-2x text-info mb-2"></i>
                                <h6>Social Studies</h6>
                                <small class="text-muted">5 Teachers, 201 Students</small>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-palette fa-2x text-danger mb-2"></i>
                                <h6>Arts</h6>
                                <small class="text-muted">4 Teachers, 156 Students</small>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-running fa-2x text-secondary mb-2"></i>
                                <h6>Physical Ed</h6>
                                <small class="text-muted">3 Teachers, 187 Students</small>
                            </div>
                        </div>
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
                            <button class="btn btn-outline-success w-100">
                                <i class="fas fa-user-plus d-block mb-1"></i>
                                Enroll Student
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-file-alt d-block mb-1"></i>
                                Generate Report
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-warning w-100">
                                <i class="fas fa-dollar-sign d-block mb-1"></i>
                                Fee Management
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-calendar d-block mb-1"></i>
                                Schedule Classes
                            </button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-outline-secondary w-100">
                                <i class="fas fa-print d-block mb-1"></i>
                                Print Records
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
