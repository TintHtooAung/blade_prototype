<?php
$pageTitle = 'Smart Campus Nova Hub - User Management';
$pageIcon = 'fas fa-users';
$pageHeading = 'User Management';
$activePage = 'users';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- User Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Users</h3>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search user by name, email, or role..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>
    
    <div class="simple-filters">
        <div class="filter-group">
            <label>Filter by Role:</label>
            <select class="filter-select">
                <option value="">All Roles</option>
                <option value="Admin">Admin</option>
                <option value="Teacher">Teacher</option>
                <option value="Staff">Staff</option>
                <option value="Student">Student</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Filter by Status:</label>
            <select class="filter-select">
                <option value="">All Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>U001</strong></td>
                    <td>Dr. Sarah Johnson</td>
                    <td>sarah.johnson@school.edu</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>2024-01-15 10:30</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U002</strong></td>
                    <td>Ms. Emily Rodriguez</td>
                    <td>emily.rodriguez@school.edu</td>
                    <td>Staff</td>
                    <td>Active</td>
                    <td>2024-01-15 09:15</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U003</strong></td>
                    <td>Mr. David Chen</td>
                    <td>david.chen@school.edu</td>
                    <td>Staff</td>
                    <td>Active</td>
                    <td>2024-01-15 08:45</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U004</strong></td>
                    <td>Dr. James Wilson</td>
                    <td>james.wilson@school.edu</td>
                    <td>Teacher</td>
                    <td>Active</td>
                    <td>2024-01-14 16:30</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U005</strong></td>
                    <td>Ms. Lisa Thompson</td>
                    <td>lisa.thompson@school.edu</td>
                    <td>Teacher</td>
                    <td>Active</td>
                    <td>2024-01-14 14:20</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U006</strong></td>
                    <td>Mr. Michael Brown</td>
                    <td>michael.brown@school.edu</td>
                    <td>Teacher</td>
                    <td>Inactive</td>
                    <td>2024-01-10 11:00</td>
                    <td class="actions">
                        <button class="action-btn activate">
                            <i class="fas fa-user-check"></i> Activate
                        </button>
                        <button class="action-btn delete">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U007</strong></td>
                    <td>Ms. Anna Garcia</td>
                    <td>anna.garcia@school.edu</td>
                    <td>Staff</td>
                    <td>Active</td>
                    <td>2024-01-15 07:30</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U008</strong></td>
                    <td>Dr. Robert Kim</td>
                    <td>robert.kim@school.edu</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>2024-01-15 06:45</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U009</strong></td>
                    <td>Ms. Jennifer Lee</td>
                    <td>jennifer.lee@school.edu</td>
                    <td>Staff</td>
                    <td>Inactive</td>
                    <td>Never</td>
                    <td class="actions">
                        <button class="action-btn activate">
                            <i class="fas fa-user-check"></i> Activate
                        </button>
                        <button class="action-btn delete">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>U010</strong></td>
                    <td>Mr. Carlos Martinez</td>
                    <td>carlos.martinez@school.edu</td>
                    <td>Teacher</td>
                    <td>Active</td>
                    <td>2024-01-14 15:10</td>
                    <td class="actions">
                        <button class="action-btn deactivate">
                            <i class="fas fa-user-times"></i> Deactivate
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>