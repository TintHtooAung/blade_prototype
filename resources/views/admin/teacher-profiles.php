<?php
$pageTitle = 'Smart Campus Nova Hub - Teacher Profiles';
$pageIcon = 'fas fa-chalkboard-teacher';
$pageHeading = 'Teacher Profiles';
$activePage = 'teachers';

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

<!-- Teacher Stats Cards -->
<div class="stats-grid-horizontal" style="margin-bottom: 24px;">
    <!-- Total Teachers -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal yellow">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">111</div>
            <div class="stat-label">Total Teachers</div>
            <div class="stat-today">All faculty</div>
        </div>
    </div>

    <!-- Active Teachers -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal green">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">108</div>
            <div class="stat-label">Active Teachers</div>
            <div class="stat-today">97.3% present</div>
        </div>
    </div>

    <!-- On Leave -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal blue">
            <i class="fas fa-calendar-times"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">3</div>
            <div class="stat-label">On Leave</div>
            <div class="stat-today">Currently</div>
        </div>
    </div>

    <!-- Teacher-Student Ratio -->
    <div class="stat-card-horizontal">
        <div class="stat-icon-horizontal purple">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-content-horizontal">
            <div class="stat-value">1:9</div>
            <div class="stat-label">Student Ratio</div>
            <div class="stat-today">Per teacher</div>
        </div>
    </div>
</div>

<!-- Teacher Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Teachers</h3>
        <button class="simple-btn" id="toggleTeacherForm"><i class="fas fa-plus"></i> Add New Teacher</button>
    </div>

    <!-- Inline Create Teacher Form (hidden by default) -->
    <div id="teacherForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-user-plus"></i> Create Teacher (Draft)</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="tName">Full Name</label>
                    <input type="text" id="tName" class="form-input" placeholder="Enter full name">
                </div>
                <div class="form-group">
                    <label for="tDOB">Date of Birth</label>
                    <input type="date" id="tDOB" class="form-input">
                </div>
                <div class="form-group">
                    <label for="tDept">Department</label>
                    <input type="text" id="tDept" class="form-input" placeholder="e.g., Mathematics">
                </div>
                <div class="form-group">
                    <label for="tSubjects">Subjects</label>
                    <input type="text" id="tSubjects" class="form-input" placeholder="e.g., Algebra, Calculus">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tGender">Gender</label>
                    <select id="tGender" class="form-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tNRC">NRC Number</label>
                    <input type="text" id="tNRC" class="form-input" placeholder="e.g., 12/TEA(N)123456">
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="tAddress">Address</label>
                    <input type="text" id="tAddress" class="form-input" placeholder="Street, City, State">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tPhone">Phone</label>
                    <input type="text" id="tPhone" class="form-input" placeholder="+1-555-...">
                </div>
                <div class="form-group">
                    <label for="tEmail">Email</label>
                    <input type="email" id="tEmail" class="form-input" placeholder="name@school.edu">
                </div>
                <div class="form-group">
                    <label for="tJoin">Join Date</label>
                    <input type="date" id="tJoin" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tBlood">Blood Type</label>
                    <select id="tBlood" class="form-select">
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
                    <label for="tEmergency">Emergency Contact</label>
                    <input type="text" id="tEmergency" class="form-input" placeholder="Name - Phone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tStatus">Status</label>
                    <select id="tStatus" class="form-select">
                        <option value="Active">Active</option>
                        <option value="On Leave">On Leave</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelTeacher" class="simple-btn secondary">Cancel</button>
                <button id="saveTeacher" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search teacher by name, ID, or department..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>

    <script>
    // Inline teacher create form interactions (no popup)
    document.addEventListener('DOMContentLoaded', function(){
        const toggleBtn=document.getElementById('toggleTeacherForm');
        const formCard=document.getElementById('teacherForm');
        const cancelBtn=document.getElementById('cancelTeacher');
        const saveBtn=document.getElementById('saveTeacher');
        const tableBody=document.querySelector('.simple-table-container table tbody');

        function toggle(){ formCard.style.display = formCard.style.display==='none' ? 'block' : 'none'; }
        if (toggleBtn) toggleBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
        if (cancelBtn) cancelBtn.addEventListener('click', function(e){ e.preventDefault(); formCard.style.display='none'; });

        function prependRow(t){
            const tr=document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${t.id}</strong></td>
                <td>${t.name}</td>
                <td>${t.dept}</td>
                <td>${t.subjects}</td>
                <td>${t.phone||''}</td>
                <td>${t.email||''}</td>
                <td>${t.join||''}</td>
                <td>${t.status||'Active'}</td>
                <td><button class="view-btn">View Details</button></td>`;
            tableBody.prepend(tr);
        }

        if (saveBtn) saveBtn.addEventListener('click', function(e){
            e.preventDefault();
            const name=(document.getElementById('tName').value||'').trim();
            if(!name){ alert('Please enter full name'); return; }
            const obj={
                id:'T'+Date.now(),
                name,
                dob: document.getElementById('tDOB').value||'',
                gender: document.getElementById('tGender') ? document.getElementById('tGender').value : '',
                nrc: (document.getElementById('tNRC').value||'').trim(),
                address: (document.getElementById('tAddress').value||'').trim(),
                bloodType: document.getElementById('tBlood') ? document.getElementById('tBlood').value : '',
                emergencyContact: (document.getElementById('tEmergency').value||'').trim(),
                dept:(document.getElementById('tDept').value||'').trim(),
                subjects:(document.getElementById('tSubjects').value||'').trim(),
                phone:(document.getElementById('tPhone').value||'').trim(),
                email:(document.getElementById('tEmail').value||'').trim(),
                join:document.getElementById('tJoin').value||'',
                status:document.getElementById('tStatus').value||'Active'
            };
            let list=[]; try{ list=JSON.parse(localStorage.getItem('teachers')||'[]'); }catch(e){ list=[]; }
            list.unshift(obj); localStorage.setItem('teachers', JSON.stringify(list));
            prependRow(obj);
            formCard.style.display='none';
            alert('Teacher added (draft). Final fields to be decided after onboarding.');
        });
    });
    </script>

    <script>
    // Minimal placeholder add flow for teachers
    document.addEventListener('DOMContentLoaded', function(){
        const btn=document.getElementById('addTeacherBtn');
        if(!btn) return;
        btn.addEventListener('click', function(){
            const name=prompt('Enter teacher full name (placeholder)');
            if(!name) return;
            const dept=prompt('Enter department (placeholder)')||'General';
            const item={ id:'T'+Date.now(), name, dept };
            let items=[]; try{ items=JSON.parse(localStorage.getItem('teachers')||'[]'); }catch(e){ items=[]; }
            items.unshift(item);
            localStorage.setItem('teachers', JSON.stringify(items));
            alert('Teacher placeholder added. Details to be finalized after onboarding.');
            location.reload();
        });
    });
    </script>
    
    <div class="simple-filters">
        <div class="filter-group">
            <label>Filter by Grade:</label>
            <select class="filter-select">
                <option value="">All Grades</option>
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Filter by Subject:</label>
            <select class="filter-select">
                <option value="">All Subjects</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Art">Art</option>
                <option value="Physical Education">Physical Education</option>
                <option value="Music">Music</option>
                <option value="Spanish">Spanish</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Chemistry">Chemistry</option>
            </select>
        </div>
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>T001</strong></td>
                    <td>Dr. Emily Parker</td>
                    <td>Mathematics</td>
                    <td>Algebra, Calculus</td>
                    <td>+1-555-0101</td>
                    <td>emily.parker@school.edu</td>
                    <td>2020-08-15</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T001">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T002</strong></td>
                    <td>Prof. James Wilson</td>
                    <td>Science</td>
                    <td>Physics, Chemistry</td>
                    <td>+1-555-0102</td>
                    <td>james.wilson@school.edu</td>
                    <td>2019-09-01</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T002">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T003</strong></td>
                    <td>Ms. Sarah Chen</td>
                    <td>English</td>
                    <td>Literature, Grammar</td>
                    <td>+1-555-0103</td>
                    <td>sarah.chen@school.edu</td>
                    <td>2021-01-10</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T003">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T004</strong></td>
                    <td>Mr. David Lee</td>
                    <td>History</td>
                    <td>World History, Geography</td>
                    <td>+1-555-0104</td>
                    <td>david.lee@school.edu</td>
                    <td>2018-03-20</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T004">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T005</strong></td>
                    <td>Ms. Lisa Wong</td>
                    <td>Art</td>
                    <td>Drawing, Painting</td>
                    <td>+1-555-0105</td>
                    <td>lisa.wong@school.edu</td>
                    <td>2020-11-05</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T005">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T006</strong></td>
                    <td>Mr. Michael Brown</td>
                    <td>Physical Education</td>
                    <td>Sports, Health</td>
                    <td>+1-555-0106</td>
                    <td>michael.brown@school.edu</td>
                    <td>2019-06-12</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T006">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T007</strong></td>
                    <td>Dr. Helen Thompson</td>
                    <td>Chemistry</td>
                    <td>Organic Chemistry</td>
                    <td>+1-555-0107</td>
                    <td>helen.thompson@school.edu</td>
                    <td>2017-02-28</td>
                    <td>On Leave</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T007">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T008</strong></td>
                    <td>Mr. Robert Kim</td>
                    <td>Music</td>
                    <td>Piano, Theory</td>
                    <td>+1-555-0108</td>
                    <td>robert.kim@school.edu</td>
                    <td>2020-09-14</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T008">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T009</strong></td>
                    <td>Ms. Amanda Garcia</td>
                    <td>Spanish</td>
                    <td>Spanish Language</td>
                    <td>+1-555-0109</td>
                    <td>amanda.garcia@school.edu</td>
                    <td>2021-08-30</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T009">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>T010</strong></td>
                    <td>Dr. Thomas Anderson</td>
                    <td>Computer Science</td>
                    <td>Programming, Database</td>
                    <td>+1-555-0110</td>
                    <td>thomas.anderson@school.edu</td>
                    <td>2019-01-15</td>
                    <td>Active</td>
                <td><a class="view-btn" href="/admin/teacher-profile/T010">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>