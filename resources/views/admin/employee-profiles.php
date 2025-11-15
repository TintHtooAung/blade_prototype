<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Profiles';
$pageIcon = 'fas fa-users-cog';
$pageHeading = 'Staff Profiles';
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

<!-- Staff Stats Cards -->
<div class="stats-grid-secondary vertical-stats">
    <!-- Total Staff -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="stat-content">
            <h3>Total Staff</h3>
            <div class="stat-number">45</div>
            <div class="stat-change">All employees</div>
        </div>
    </div>

    <!-- Active Staff -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-content">
            <h3>Active Staff</h3>
            <div class="stat-number">43</div>
            <div class="stat-change positive">95.6% present</div>
        </div>
    </div>

    <!-- On Leave -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-times"></i>
        </div>
        <div class="stat-content">
            <h3>On Leave</h3>
            <div class="stat-number">2</div>
            <div class="stat-change">Currently</div>
        </div>
    </div>

    <!-- Departments -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="stat-content">
            <h3>Departments</h3>
            <div class="stat-number">9</div>
            <div class="stat-change">Active</div>
        </div>
    </div>
</div>

<!-- Employee Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Staff</h3>
        <button class="simple-btn" id="toggleStaffForm"><i class="fas fa-plus"></i> Add New Staff</button>
    </div>

    <!-- Inline Create Staff Form (hidden by default) -->
    <div id="staffForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-user-plus"></i> Create Staff (Draft)</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="eName">Full Name</label>
                    <input type="text" id="eName" class="form-input" placeholder="Enter full name">
                </div>
                <div class="form-group">
                    <label for="eDOB">Date of Birth</label>
                    <input type="date" id="eDOB" class="form-input">
                </div>
                <div class="form-group">
                    <label for="eDept">Department</label>
                    <input type="text" id="eDept" class="form-input" placeholder="e.g., Administration">
                </div>
                <div class="form-group">
                    <label for="ePos">Position</label>
                    <input type="text" id="ePos" class="form-input" placeholder="e.g., Secretary">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="eGender">Gender</label>
                    <select id="eGender" class="form-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="eNRC">NRC Number</label>
                    <input type="text" id="eNRC" class="form-input" placeholder="e.g., 12/EMP(N)654321">
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="eAddress">Address</label>
                    <input type="text" id="eAddress" class="form-input" placeholder="Street, City, State">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="ePhone">Phone</label>
                    <input type="text" id="ePhone" class="form-input" placeholder="+1-555-...">
                </div>
                <div class="form-group">
                    <label for="eEmail">Email</label>
                    <input type="email" id="eEmail" class="form-input" placeholder="name@school.edu">
                </div>
                <div class="form-group">
                    <label for="eHire">Join Date</label>
                    <input type="date" id="eHire" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="eBlood">Blood Type</label>
                    <select id="eBlood" class="form-select">
                        <option value="">Select</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="eEmergency">Emergency Contact</label>
                    <input type="text" id="eEmergency" class="form-input" placeholder="Name - Phone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="eSalary">Salary</label>
                    <input type="text" id="eSalary" class="form-input" placeholder="$0.00">
                </div>
                <div class="form-group">
                    <label for="eStatus">Status</label>
                    <select id="eStatus" class="form-select">
                        <option value="Active">Active</option>
                        <option value="On Leave">On Leave</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelStaff" class="simple-btn secondary">Cancel</button>
                <button id="saveStaff" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search employee by name, ID, or department..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>

    <script>
    // Inline staff create form interactions
    document.addEventListener('DOMContentLoaded', function(){
        const toggleBtn=document.getElementById('toggleStaffForm');
        const formCard=document.getElementById('staffForm');
        const cancelBtn=document.getElementById('cancelStaff');
        const saveBtn=document.getElementById('saveStaff');
        const tableBody=document.querySelector('.simple-table-container table tbody');

        function toggle(){ formCard.style.display = formCard.style.display==='none' ? 'block' : 'none'; }
        if (toggleBtn) toggleBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
        if (cancelBtn) cancelBtn.addEventListener('click', function(e){ e.preventDefault(); formCard.style.display='none'; });

        function prependRow(x){
            const tr=document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${x.id}</strong></td>
                <td>${x.name}</td>
                <td>${x.dept}</td>
                <td>${x.pos}</td>
                <td>${x.phone||''}</td>
                <td>${x.email||''}</td>
                <td>${x.hire||''}</td>
                <td>${x.salary||''}</td>
                <td>${x.status||'Active'}</td>
                <td><button class="view-btn">View Details</button></td>`;
            tableBody.prepend(tr);
        }

        if (saveBtn) saveBtn.addEventListener('click', function(e){
            e.preventDefault();
            const name=(document.getElementById('eName').value||'').trim();
            if(!name){ alert('Please enter full name'); return; }
            const obj={
                id:'E'+Date.now(),
                name,
                dob: document.getElementById('eDOB').value||'',
                gender: document.getElementById('eGender') ? document.getElementById('eGender').value : '',
                nrc: (document.getElementById('eNRC').value||'').trim(),
                address: (document.getElementById('eAddress').value||'').trim(),
                bloodType: document.getElementById('eBlood') ? document.getElementById('eBlood').value : '',
                emergencyContact: (document.getElementById('eEmergency').value||'').trim(),
                dept:(document.getElementById('eDept').value||'').trim(),
                pos:(document.getElementById('ePos').value||'').trim(),
                phone:(document.getElementById('ePhone').value||'').trim(),
                email:(document.getElementById('eEmail').value||'').trim(),
                hire:document.getElementById('eHire').value||'',
                salary:(document.getElementById('eSalary').value||'').trim(),
                status:document.getElementById('eStatus').value||'Active'
            };
            let list=[]; try{ list=JSON.parse(localStorage.getItem('staff')||'[]'); }catch(e){ list=[]; }
            list.unshift(obj); localStorage.setItem('staff', JSON.stringify(list));
            prependRow(obj);
            formCard.style.display='none';
            alert('Staff added (draft). Final fields to be decided after onboarding.');
        });
    });
    </script>
    
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
                    <th>Join Date</th>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E001">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E002">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E003">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E004">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E005">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E006">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E007">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E008">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E009">View Details</a></td>
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
                    <td><a class="view-btn" href="/admin/staff-profile/E010">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>