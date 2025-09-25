@extends('layouts.app')

@section('title', 'EMS Portal - Home')

@section('content')
<!-- Welcome Section -->
<section class="welcome-section">
    <div class="container text-center">
        <h1 class="display-4 mb-4">Welcome to EMS Portal</h1>
        <p class="lead">Choose your access level to continue to your dashboard</p>
    </div>
</section>

<!-- Role Selection -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="text-center mb-5">Select Your Role</h2>
            
            <div class="row g-4">
                <!-- Teacher Card -->
                <div class="col-md-4">
                    <div class="card role-card h-100" onclick="location.href='{{ route('teacher.dashboard') }}'">
                        <div class="card-body">
                            <div class="role-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h3 class="role-title">Teacher</h3>
                            <p class="role-description">
                                Access student records, manage classes, create assignments, 
                                and track academic progress.
                            </p>
                            <a href="{{ route('teacher.dashboard') }}" class="btn btn-primary btn-role">
                                Enter as Teacher
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Staff Card -->
                <div class="col-md-4">
                    <div class="card role-card h-100" onclick="location.href='{{ route('staff.dashboard') }}'">
                        <div class="card-body">
                            <div class="role-icon">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <h3 class="role-title">Staff</h3>
                            <p class="role-description">
                                Manage student enrollment, handle administrative tasks, 
                                and coordinate with departments.
                            </p>
                            <a href="{{ route('staff.dashboard') }}" class="btn btn-success btn-role">
                                Enter as Staff
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Admin Card -->
                <div class="col-md-4">
                    <div class="card role-card h-100" onclick="location.href='{{ route('admin.dashboard') }}'">
                        <div class="card-body">
                            <div class="role-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h3 class="role-title">Administrator</h3>
                            <p class="role-description">
                                Full system access, user management, system configuration, 
                                and comprehensive reporting.
                            </p>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-role">
                                Enter as Admin
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Overview -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">System Features</h3>
        </div>
        
        <div class="col-md-3">
            <div class="feature-card text-center">
                <div class="feature-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h5>Student Management</h5>
                <p class="text-muted">Comprehensive student information system</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="feature-card text-center">
                <div class="feature-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h5>Schedule Management</h5>
                <p class="text-muted">Automated scheduling and timetable management</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="feature-card text-center">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h5>Performance Analytics</h5>
                <p class="text-muted">Real-time performance tracking and reporting</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="feature-card text-center">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h5>Communication</h5>
                <p class="text-muted">Integrated messaging and notification system</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects for role cards
    const roleCards = document.querySelectorAll('.role-card');
    
    roleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush
