<?php
$pageTitle = 'Smart Campus Nova Hub - Employee Profiles';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Employee Profiles';
$activePage = 'employees';

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

<!-- Employee Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Employees</h3>
        <button class="simple-btn">Add New Employee</button>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search employee by name, ID, or department..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>
    
    <div class="simple-filters">
        <div class="filter-group">
            <label>Filter by Department:</label>
            <select class="filter-select">
                <option value="">All Departments</option>
                <option value="Administration">Administration</option>
                <option value="Maintenance">Maintenance</option>
                <option value="Food Service">Food Service</option>
                <option value="Security">Security</option>
                <option value="Library">Library</option>
                <option value="IT Support">IT Support</option>
                <option value="Health Services">Health Services</option>
                <option value="Transportation">Transportation</option>
                <option value="Counseling">Counseling</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Filter by Position:</label>
            <select class="filter-select">
                <option value="">All Positions</option>
                <option value="Secretary">Secretary</option>
                <option value="Accountant">Accountant</option>
                <option value="Technician">Technician</option>
                <option value="Cook">Cook</option>
                <option value="Security Guard">Security Guard</option>
                <option value="Librarian">Librarian</option>
                <option value="IT Technician">IT Technician</option>
                <option value="Nurse">Nurse</option>
                <option value="Bus Driver">Bus Driver</option>
                <option value="Counselor">Counselor</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Hire Date</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>E001</strong></td>
                    <td>John Miller</td>
                    <td>Administration</td>
                    <td>Secretary</td>
                    <td>+1-555-2001</td>
                    <td>john.miller@school.edu</td>
                    <td>2020-03-15</td>
                    <td>$3,200</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E002</strong></td>
                    <td>Maria Santos</td>
                    <td>Administration</td>
                    <td>Accountant</td>
                    <td>+1-555-2002</td>
                    <td>maria.santos@school.edu</td>
                    <td>2019-07-22</td>
                    <td>$4,500</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E003</strong></td>
                    <td>Peter Johnson</td>
                    <td>Maintenance</td>
                    <td>Technician</td>
                    <td>+1-555-2003</td>
                    <td>peter.johnson@school.edu</td>
                    <td>2021-01-10</td>
                    <td>$2,800</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E004</strong></td>
                    <td>Anna Williams</td>
                    <td>Food Service</td>
                    <td>Cook</td>
                    <td>+1-555-2004</td>
                    <td>anna.williams@school.edu</td>
                    <td>2020-09-05</td>
                    <td>$2,500</td>
                    <td>On Leave</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E005</strong></td>
                    <td>Carlos Rodriguez</td>
                    <td>Security</td>
                    <td>Security Guard</td>
                    <td>+1-555-2005</td>
                    <td>carlos.rodriguez@school.edu</td>
                    <td>2018-11-20</td>
                    <td>$2,700</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E006</strong></td>
                    <td>Susan Davis</td>
                    <td>Library</td>
                    <td>Librarian</td>
                    <td>+1-555-2006</td>
                    <td>susan.davis@school.edu</td>
                    <td>2019-04-12</td>
                    <td>$3,800</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E007</strong></td>
                    <td>Ahmed Hassan</td>
                    <td>IT Support</td>
                    <td>IT Technician</td>
                    <td>+1-555-2007</td>
                    <td>ahmed.hassan@school.edu</td>
                    <td>2020-12-01</td>
                    <td>$4,200</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E008</strong></td>
                    <td>Linda Thompson</td>
                    <td>Health Services</td>
                    <td>Nurse</td>
                    <td>+1-555-2008</td>
                    <td>linda.thompson@school.edu</td>
                    <td>2018-08-15</td>
                    <td>$4,000</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E009</strong></td>
                    <td>Robert Wilson</td>
                    <td>Transportation</td>
                    <td>Bus Driver</td>
                    <td>+1-555-2009</td>
                    <td>robert.wilson@school.edu</td>
                    <td>2019-10-08</td>
                    <td>$3,000</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
                <tr>
                    <td><strong>E010</strong></td>
                    <td>Jennifer Martinez</td>
                    <td>Counseling</td>
                    <td>Counselor</td>
                    <td>+1-555-2010</td>
                    <td>jennifer.martinez@school.edu</td>
                    <td>2021-03-18</td>
                    <td>$4,800</td>
                    <td>Active</td>
                    <td><button class="view-btn">View Details</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>