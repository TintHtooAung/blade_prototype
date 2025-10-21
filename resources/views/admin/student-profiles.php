<?php
$pageTitle = 'Smart Campus Nova Hub - Student Profiles';
$pageIcon = 'fas fa-user-graduate';
$pageHeading = 'Student Profiles';
$activePage = 'students';

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

<!-- Student Profiles Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Students</h3>
        <button class="simple-btn" id="toggleStudentForm"><i class="fas fa-plus"></i> Add New Student</button>
    </div>

    <!-- Inline Create Student Form (hidden by default) -->
    <div id="studentForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-user-plus"></i> Create Student (Draft)</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="sName">Full Name</label>
                    <input type="text" id="sName" class="form-input" placeholder="Enter full name">
                </div>
                <div class="form-group">
                    <label for="sDOB">Date of Birth</label>
                    <input type="date" id="sDOB" class="form-input">
                </div>
                <div class="form-group">
                    <label for="sClass">Class</label>
                    <input type="text" id="sClass" class="form-input" placeholder="e.g., Grade 9-A">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="sGender">Gender</label>
                    <select id="sGender" class="form-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sNRC">NRC Number</label>
                    <input type="text" id="sNRC" class="form-input" placeholder="e.g., 12/STU(N)345678">
                </div>
                <div class="form-group" style="flex:2;">
                    <label for="sAddress">Address</label>
                    <input type="text" id="sAddress" class="form-input" placeholder="Street, City, State">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="sParent">Parent/Guardian</label>
                    <input type="text" id="sParent" class="form-input" placeholder="Parent name">
                </div>
                <div class="form-group">
                    <label for="sPhone">Phone</label>
                    <input type="text" id="sPhone" class="form-input" placeholder="+1-555-...">
                </div>
                <div class="form-group">
                    <label for="sEmail">Email</label>
                    <input type="email" id="sEmail" class="form-input" placeholder="parent@email.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="sBlood">Blood Type</label>
                    <select id="sBlood" class="form-select">
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
                    <label for="sEmergency">Emergency Contact</label>
                    <input type="text" id="sEmergency" class="form-input" placeholder="Name - Phone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="sEnroll">Enrollment Date</label>
                    <input type="date" id="sEnroll" class="form-input">
                </div>
                <div class="form-group">
                    <label for="sStatus">Status</label>
                    <select id="sStatus" class="form-select">
                        <option value="Active">Active</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelStudent" class="simple-btn secondary">Cancel</button>
                <button id="saveStudent" class="simple-btn primary"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>
    </div>
    
    <div class="simple-search">
        <input type="text" placeholder="Search student by name, ID, or class..." class="simple-input">
        <button class="simple-btn">Search</button>
    </div>

    <script>
    // Inline student create form interactions
    document.addEventListener('DOMContentLoaded', function(){
        const toggleBtn=document.getElementById('toggleStudentForm');
        const formCard=document.getElementById('studentForm');
        const cancelBtn=document.getElementById('cancelStudent');
        const saveBtn=document.getElementById('saveStudent');
        const tableBody=document.querySelector('.simple-table-container table tbody');

        function toggle(){ formCard.style.display = formCard.style.display==='none' ? 'block' : 'none'; }
        if (toggleBtn) toggleBtn.addEventListener('click', function(e){ e.preventDefault(); toggle(); });
        if (cancelBtn) cancelBtn.addEventListener('click', function(e){ e.preventDefault(); formCard.style.display='none'; });

        function prependRow(s){
            const tr=document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${s.id}</strong></td>
                <td>${s.name}</td>
                <td>${s.klass}</td>
                <td>${s.age||''}</td>
                <td>${s.parent||''}</td>
                <td>${s.phone||''}</td>
                <td>${s.email||''}</td>
                <td>${s.enroll||''}</td>
                <td>${s.status||'Active'}</td>
                <td><button class="view-btn">View Details</button></td>`;
            tableBody.prepend(tr);
        }

        if (saveBtn) saveBtn.addEventListener('click', function(e){
            e.preventDefault();
            const name=(document.getElementById('sName').value||'').trim();
            if(!name){ alert('Please enter full name'); return; }
            const obj={
                id:'S'+Date.now(),
                name,
                dob: document.getElementById('sDOB').value||'',
                gender: document.getElementById('sGender') ? document.getElementById('sGender').value : '',
                nrc: (document.getElementById('sNRC').value||'').trim(),
                address: (document.getElementById('sAddress').value||'').trim(),
                klass:(document.getElementById('sClass').value||'').trim(),
                parent:(document.getElementById('sParent').value||'').trim(),
                phone:(document.getElementById('sPhone').value||'').trim(),
                email:(document.getElementById('sEmail').value||'').trim(),
                bloodType: document.getElementById('sBlood') ? document.getElementById('sBlood').value : '',
                emergencyContact: (document.getElementById('sEmergency').value||'').trim(),
                enroll:document.getElementById('sEnroll').value||'',
                status:document.getElementById('sStatus').value||'Active'
            };
            let list=[]; try{ list=JSON.parse(localStorage.getItem('students')||'[]'); }catch(e){ list=[]; }
            list.unshift(obj); localStorage.setItem('students', JSON.stringify(list));
            prependRow(obj);
            formCard.style.display='none';
            alert('Student added (draft). Final fields to be decided after onboarding.');
        });
    });
    </script>

    <script>
    // Minimal placeholder add flow for students
    document.addEventListener('DOMContentLoaded', function(){
        const btn=document.getElementById('addStudentBtn');
        if(!btn) return;
        btn.addEventListener('click', function(){
            const name=prompt('Enter student full name (placeholder)');
            if(!name) return;
            const klass=prompt('Enter class (placeholder)')||'Grade 9-A';
            const item={ id:'S'+Date.now(), name, klass };
            let items=[]; try{ items=JSON.parse(localStorage.getItem('students')||'[]'); }catch(e){ items=[]; }
            items.unshift(item);
            localStorage.setItem('students', JSON.stringify(items));
            alert('Student placeholder added. Details to be finalized after onboarding.');
            location.reload();
        });
    });
    </script>
    
    <div class="simple-filters">
        <div class="filter-group">
            <label>Filter by Class:</label>
            <select class="filter-select">
                <option value="">All Classes</option>
                <option value="Grade 9-A">Grade 9-A</option>
                <option value="Grade 9-B">Grade 9-B</option>
                <option value="Grade 10-A">Grade 10-A</option>
                <option value="Grade 10-B">Grade 10-B</option>
                <option value="Grade 11-A">Grade 11-A</option>
                <option value="Grade 11-B">Grade 11-B</option>
                <option value="Grade 12-A">Grade 12-A</option>
                <option value="Grade 12-B">Grade 12-B</option>
            </select>
        </div>
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
        <button class="simple-btn">Apply Filters</button>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Class</th>
                    <th>Age</th>
                    <th>Parent Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Enrollment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>S001</strong></td>
                    <td>John Smith</td>
                    <td>Grade 9-A</td>
                    <td>15</td>
                    <td>Robert Smith</td>
                    <td>+1-555-1001</td>
                    <td>rsmith@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S001">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S002</strong></td>
                    <td>Sarah Johnson</td>
                    <td>Grade 9-A</td>
                    <td>14</td>
                    <td>Mary Johnson</td>
                    <td>+1-555-1002</td>
                    <td>mjohnson@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S002">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S003</strong></td>
                    <td>Mike Davis</td>
                    <td>Grade 10-B</td>
                    <td>16</td>
                    <td>James Davis</td>
                    <td>+1-555-1003</td>
                    <td>jdavis@email.com</td>
                    <td>2022-09-05</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S003">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S004</strong></td>
                    <td>Emma Wilson</td>
                    <td>Grade 11-A</td>
                    <td>17</td>
                    <td>Lisa Wilson</td>
                    <td>+1-555-1004</td>
                    <td>lwilson@email.com</td>
                    <td>2021-09-10</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S004">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S005</strong></td>
                    <td>Alex Brown</td>
                    <td>Grade 12-A</td>
                    <td>18</td>
                    <td>Michael Brown</td>
                    <td>+1-555-1005</td>
                    <td>mbrown@email.com</td>
                    <td>2020-09-15</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S005">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S006</strong></td>
                    <td>Jessica Lee</td>
                    <td>Grade 9-B</td>
                    <td>15</td>
                    <td>Susan Lee</td>
                    <td>+1-555-1006</td>
                    <td>slee@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S006">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S007</strong></td>
                    <td>David Garcia</td>
                    <td>Grade 10-A</td>
                    <td>16</td>
                    <td>Carlos Garcia</td>
                    <td>+1-555-1007</td>
                    <td>cgarcia@email.com</td>
                    <td>2022-09-08</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S007">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S008</strong></td>
                    <td>Anna Taylor</td>
                    <td>Grade 11-B</td>
                    <td>17</td>
                    <td>Jennifer Taylor</td>
                    <td>+1-555-1008</td>
                    <td>jtaylor@email.com</td>
                    <td>2021-09-12</td>
                    <td>Transfer</td>
                    <td><a class="view-btn" href="/admin/student-profile/S008">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S009</strong></td>
                    <td>Chris Martinez</td>
                    <td>Grade 12-B</td>
                    <td>18</td>
                    <td>Rosa Martinez</td>
                    <td>+1-555-1009</td>
                    <td>rmartinez@email.com</td>
                    <td>2020-09-20</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S009">View Details</a></td>
                </tr>
                <tr>
                    <td><strong>S010</strong></td>
                    <td>Mia Anderson</td>
                    <td>Grade 9-A</td>
                    <td>14</td>
                    <td>Patricia Anderson</td>
                    <td>+1-555-1010</td>
                    <td>panderson@email.com</td>
                    <td>2023-09-01</td>
                    <td>Active</td>
                    <td><a class="view-btn" href="/admin/student-profile/S010">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>