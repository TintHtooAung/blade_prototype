# EMS Portal - Educational Management System

A Laravel-based Educational Management System portal with role-based access for Teachers, Staff, and Administrators.

## Features

- **Role-based Dashboard Access**
  - Teacher Dashboard: Class management, student records, assignments
  - Staff Dashboard: Student enrollment, administrative tasks, department coordination
  - Admin Dashboard: System overview, user management, configuration

- **Modern UI/UX**
  - Bootstrap 5 responsive design
  - Font Awesome icons
  - Gradient backgrounds and hover effects
  - Mobile-friendly interface

## Installation

1. Install dependencies:
   ```bash
   composer install
   ```

2. Copy environment file:
   ```bash
   cp .env.example .env
   ```

3. Generate application key:
   ```bash
   php artisan key:generate
   ```

4. Start the development server:
   ```bash
   php artisan serve
   ```

5. Visit `http://localhost:8000` to access the portal

## Directory Structure

```
├── app/Http/Controllers/
│   └── DashboardController.php    # Main controller for navigation
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php         # Main layout template
│   ├── home.blade.php            # Role selection page
│   ├── teacher/
│   │   └── dashboard.blade.php   # Teacher dashboard
│   ├── staff/
│   │   └── dashboard.blade.php   # Staff dashboard
│   └── admin/
│       └── dashboard.blade.php   # Admin dashboard
├── public/css/
│   └── style.css                 # Custom styles
└── routes/
    └── web.php                   # Application routes
```

## Routes

- `/` - Home page with role selection
- `/teacher/dashboard` - Teacher dashboard
- `/staff/dashboard` - Staff dashboard  
- `/admin/dashboard` - Admin dashboard

## Next Steps

Each dashboard page is ready for you to add specific functionality:

1. **Teacher Dashboard**: Add class management, assignment creation, grading tools
2. **Staff Dashboard**: Add student enrollment forms, document management, reporting
3. **Admin Dashboard**: Add user management, system configuration, analytics

## Technologies Used

- Laravel PHP Framework
- Bootstrap 5
- Font Awesome Icons
- Custom CSS with gradients and animations
