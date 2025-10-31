<?php
$pageTitle = 'Smart Campus Nova Hub - Homework Management';
$pageIcon = 'fas fa-tasks';
$pageHeading = 'Homework Management';
$activePage = 'homework';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

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

<!-- Create Homework Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Assign New Homework</h3>
        <button class="simple-btn" id="toggleHomeworkForm"><i class="fas fa-plus"></i> Add Homework</button>
    </div>

    <!-- Inline Homework Form -->
    <div id="homeworkForm" class="simple-section" style="display:none; margin-top:12px;">
        <div class="simple-header">
            <h4><i class="fas fa-tasks"></i> Homework Assignment</h4>
        </div>
        <div class="form-section">
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label>Class <span style="color: #ef4444;">*</span></label>
                    <select id="homeworkClass" class="form-select" required>
                        <option value="">Select Class</option>
                        <option value="G9-A Math">G9-A Math (Algebra)</option>
                        <option value="G9-B Math">G9-B Math (Geometry)</option>
                        <option value="G10-A Physics">G10-A Physics (Mechanics)</option>
                        <option value="G10-B Chemistry">G10-B Chemistry (Organic)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Due Date <span style="color: #ef4444;">*</span></label>
                    <input type="date" id="homeworkDueDate" class="form-input" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label>Topic/Title <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="homeworkTopic" class="form-input" 
                           placeholder="E.g., Quadratic Equations Practice" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label>Description</label>
                    <textarea id="homeworkDescription" class="form-input" rows="4" 
                              placeholder="Enter homework details, instructions, or references..."></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button id="cancelHomework" class="simple-btn secondary"><i class="fas fa-times"></i> Cancel</button>
                <button id="saveHomework" class="simple-btn primary"><i class="fas fa-check"></i> Assign Homework</button>
            </div>
        </div>
    </div>
</div>

<!-- Homework Statistics -->
<div style="display: flex; gap: 16px; margin-bottom: 24px; flex-wrap: wrap;">
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon purple">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="stat-content">
            <p>Total Assigned</p>
            <h3 id="totalAssigned">12</h3>
        </div>
    </div>
    
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon yellow">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <p>Pending Collection</p>
            <h3 id="pendingCollection">5</h3>
        </div>
    </div>
    
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <p>Completed</p>
            <h3 id="completedHomework">7</h3>
        </div>
    </div>
    
    <div class="stat-card" style="flex: 1; min-width: 200px;">
        <div class="stat-icon blue">
            <i class="fas fa-percentage"></i>
        </div>
        <div class="stat-content">
            <p>Avg Completion</p>
            <h3 id="avgCompletion">87%</h3>
        </div>
    </div>
</div>

<!-- Pending Homework Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3><i class="fas fa-clock"></i> Pending Homework</h3>
        <div style="display: flex; gap: 12px; align-items: center;">
            <select class="filter-select" id="pendingClassFilter" onchange="filterPendingHomework()">
                <option value="all">All Classes</option>
                <option value="G9-A Math">G9-A Math</option>
                <option value="G9-B Math">G9-B Math</option>
                <option value="G10-A Physics">G10-A Physics</option>
                <option value="G10-B Chemistry">G10-B Chemistry</option>
            </select>
            <input type="text" class="simple-search" id="pendingSearchInput" 
                   placeholder="Search homework..." 
                   onkeyup="filterPendingHomework()">
        </div>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Topic</th>
                    <th>Assigned Date</th>
                    <th>Due Date</th>
                    <th>Students</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody id="pendingHomeworkBody">
                <tr data-class="G9-A Math" data-id="HW001">
                    <td><strong>#HW001</strong></td>
                    <td>
                        <strong>G9-A Math</strong><br>
                        <small style="color: #6b7280;">Algebra</small>
                    </td>
                    <td>Quadratic Equations Practice</td>
                    <td>Oct 25, 2025</td>
                    <td>Nov 1, 2025</td>
                    <td>35</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td style="text-align: center;">
                        <button class="simple-btn primary" onclick="openCollectDialog('HW001', 'G9-A Math', 'Quadratic Equations Practice')">
                            <i class="fas fa-clipboard-check"></i> Collect
                        </button>
                    </td>
                </tr>
                <tr data-class="G9-B Math" data-id="HW002">
                    <td><strong>#HW002</strong></td>
                    <td>
                        <strong>G9-B Math</strong><br>
                        <small style="color: #6b7280;">Geometry</small>
                    </td>
                    <td>Circle Theorems Worksheet</td>
                    <td>Oct 26, 2025</td>
                    <td>Nov 2, 2025</td>
                    <td>32</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td style="text-align: center;">
                        <button class="simple-btn primary" onclick="openCollectDialog('HW002', 'G9-B Math', 'Circle Theorems Worksheet')">
                            <i class="fas fa-clipboard-check"></i> Collect
                        </button>
                    </td>
                </tr>
                <tr data-class="G10-A Physics" data-id="HW003">
                    <td><strong>#HW003</strong></td>
                    <td>
                        <strong>G10-A Physics</strong><br>
                        <small style="color: #6b7280;">Mechanics</small>
                    </td>
                    <td>Newton's Laws Lab Report</td>
                    <td>Oct 27, 2025</td>
                    <td>Nov 3, 2025</td>
                    <td>38</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td style="text-align: center;">
                        <button class="simple-btn primary" onclick="openCollectDialog('HW003', 'G10-A Physics', 'Newton\\'s Laws Lab Report')">
                            <i class="fas fa-clipboard-check"></i> Collect
                        </button>
                    </td>
                </tr>
                <tr data-class="G10-B Chemistry" data-id="HW004">
                    <td><strong>#HW004</strong></td>
                    <td>
                        <strong>G10-B Chemistry</strong><br>
                        <small style="color: #6b7280;">Organic Chemistry</small>
                    </td>
                    <td>Hydrocarbon Nomenclature</td>
                    <td>Oct 28, 2025</td>
                    <td>Nov 4, 2025</td>
                    <td>30</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td style="text-align: center;">
                        <button class="simple-btn primary" onclick="openCollectDialog('HW004', 'G10-B Chemistry', 'Hydrocarbon Nomenclature')">
                            <i class="fas fa-clipboard-check"></i> Collect
                        </button>
                    </td>
                </tr>
                <tr data-class="G9-A Math" data-id="HW005">
                    <td><strong>#HW005</strong></td>
                    <td>
                        <strong>G9-A Math</strong><br>
                        <small style="color: #6b7280;">Statistics</small>
                    </td>
                    <td>Mean, Median, Mode Problems</td>
                    <td>Oct 29, 2025</td>
                    <td>Nov 5, 2025</td>
                    <td>35</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td style="text-align: center;">
                        <button class="simple-btn primary" onclick="openCollectDialog('HW005', 'G9-A Math', 'Mean, Median, Mode Problems')">
                            <i class="fas fa-clipboard-check"></i> Collect
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Homework History Section -->
<div class="simple-section" style="margin-top: 24px;">
    <div class="simple-header">
        <h3><i class="fas fa-history"></i> Homework History</h3>
        <div style="display: flex; gap: 12px; align-items: center;">
            <select class="filter-select" id="historyClassFilter" onchange="filterHomeworkHistory()">
                <option value="all">All Classes</option>
                <option value="G9-A Math">G9-A Math</option>
                <option value="G9-B Math">G9-B Math</option>
                <option value="G10-A Physics">G10-A Physics</option>
                <option value="G10-B Chemistry">G10-B Chemistry</option>
            </select>
            <input type="text" class="simple-search" id="historySearchInput" 
                   placeholder="Search history..." 
                   onkeyup="filterHomeworkHistory()">
        </div>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Topic</th>
                    <th>Assigned Date</th>
                    <th>Due Date</th>
                    <th>Collected Date</th>
                    <th>Completion</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody id="historyBody">
                <tr data-class="G9-A Math" data-id="HW100">
                    <td><strong>#HW100</strong></td>
                    <td>
                        <strong>G9-A Math</strong><br>
                        <small style="color: #6b7280;">Algebra</small>
                    </td>
                    <td>Linear Equations Assignment</td>
                    <td>Oct 18, 2025</td>
                    <td>Oct 25, 2025</td>
                    <td>Oct 25, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 94%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #10b981;">94%</span>
                            <small style="color: #6b7280;">(33/35)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW100')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr data-class="G9-B Math" data-id="HW101">
                    <td><strong>#HW101</strong></td>
                    <td>
                        <strong>G9-B Math</strong><br>
                        <small style="color: #6b7280;">Trigonometry</small>
                    </td>
                    <td>Sin, Cos, Tan Practice</td>
                    <td>Oct 19, 2025</td>
                    <td>Oct 26, 2025</td>
                    <td>Oct 26, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 88%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #10b981;">88%</span>
                            <small style="color: #6b7280;">(28/32)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW101')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr data-class="G10-A Physics" data-id="HW102">
                    <td><strong>#HW102</strong></td>
                    <td>
                        <strong>G10-A Physics</strong><br>
                        <small style="color: #6b7280;">Kinematics</small>
                    </td>
                    <td>Motion Graphs Analysis</td>
                    <td>Oct 20, 2025</td>
                    <td>Oct 27, 2025</td>
                    <td>Oct 27, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 92%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #10b981;">92%</span>
                            <small style="color: #6b7280;">(35/38)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW102')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr data-class="G10-B Chemistry" data-id="HW103">
                    <td><strong>#HW103</strong></td>
                    <td>
                        <strong>G10-B Chemistry</strong><br>
                        <small style="color: #6b7280;">Inorganic</small>
                    </td>
                    <td>Periodic Table Trends</td>
                    <td>Oct 21, 2025</td>
                    <td>Oct 28, 2025</td>
                    <td>Oct 28, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 80%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #f59e0b;">80%</span>
                            <small style="color: #6b7280;">(24/30)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW103')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr data-class="G9-A Math" data-id="HW104">
                    <td><strong>#HW104</strong></td>
                    <td>
                        <strong>G9-A Math</strong><br>
                        <small style="color: #6b7280;">Probability</small>
                    </td>
                    <td>Probability Word Problems</td>
                    <td>Oct 22, 2025</td>
                    <td>Oct 29, 2025</td>
                    <td>Oct 29, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 86%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #10b981;">86%</span>
                            <small style="color: #6b7280;">(30/35)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW104')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr data-class="G9-B Math" data-id="HW105">
                    <td><strong>#HW105</strong></td>
                    <td>
                        <strong>G9-B Math</strong><br>
                        <small style="color: #6b7280;">Algebra</small>
                    </td>
                    <td>Factorization Exercises</td>
                    <td>Oct 23, 2025</td>
                    <td>Oct 30, 2025</td>
                    <td>Oct 30, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 75%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #f59e0b;">75%</span>
                            <small style="color: #6b7280;">(24/32)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW105')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr data-class="G10-A Physics" data-id="HW106">
                    <td><strong>#HW106</strong></td>
                    <td>
                        <strong>G10-A Physics</strong><br>
                        <small style="color: #6b7280;">Energy</small>
                    </td>
                    <td>Conservation of Energy Problems</td>
                    <td>Oct 24, 2025</td>
                    <td>Oct 31, 2025</td>
                    <td>Oct 31, 2025</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="completion-bar">
                                <div class="completion-fill" style="width: 97%;"></div>
                            </div>
                            <span style="font-weight: 600; color: #10b981;">97%</span>
                            <small style="color: #6b7280;">(37/38)</small>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <button class="simple-btn secondary" onclick="viewHomeworkDetails('HW106')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Collect Homework Dialog -->
<div id="collectHomeworkDialog" class="modal-overlay" style="display: none;">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h3><i class="fas fa-clipboard-check"></i> Collect Homework</h3>
            <button class="modal-close" onclick="closeCollectDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div style="background: #f9fafb; padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
                    <div>
                        <div style="font-weight: 600; font-size: 16px; color: #111827;" id="collectHomeworkId">#HW001</div>
                        <div style="color: #6b7280; font-size: 14px; margin-top: 4px;" id="collectHomeworkTopic">Quadratic Equations Practice</div>
                    </div>
                    <div style="text-align: right;">
                        <div style="font-weight: 600; color: #4f46e5;" id="collectHomeworkClass">G9-A Math</div>
                        <div style="color: #6b7280; font-size: 14px; margin-top: 4px;">35 Students</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px; padding-top: 12px; border-top: 1px solid #e5e7eb;">
                    <span style="color: #6b7280;">Completion Progress:</span>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-weight: 600; color: #10b981;" id="collectCompletionRate">0%</span>
                        <span style="color: #6b7280;" id="collectCompletionCount">(0/35)</span>
                    </div>
                </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                <h4 style="margin: 0; font-size: 15px; color: #374151;">Student Completion List</h4>
                <div style="display: flex; gap: 8px;">
                    <button class="simple-btn secondary" style="font-size: 13px; padding: 6px 12px;" onclick="markAllComplete()">
                        <i class="fas fa-check-double"></i> Mark All
                    </button>
                    <button class="simple-btn secondary" style="font-size: 13px; padding: 6px 12px;" onclick="clearAllComplete()">
                        <i class="fas fa-times"></i> Clear All
                    </button>
                </div>
            </div>
            
            <div style="max-height: 400px; overflow-y: auto; border: 1px solid #e5e7eb; border-radius: 8px;">
                <table class="basic-table" style="margin: 0;">
                    <thead style="position: sticky; top: 0; background: #fff; z-index: 10;">
                        <tr>
                            <th style="width: 60px; text-align: center;">
                                <input type="checkbox" id="selectAllStudents" onchange="toggleAllStudents(this)">
                            </th>
                            <th>Roll No.</th>
                            <th>Student Name</th>
                            <th style="text-align: center;">Completed</th>
                        </tr>
                    </thead>
                    <tbody id="studentChecklistBody">
                        <!-- Students will be populated dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button class="simple-btn secondary" onclick="closeCollectDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn success" onclick="submitCollectHomework()">
                <i class="fas fa-save"></i> Save Collection
            </button>
        </div>
    </div>
</div>

<style>
/* Completion Bar Styles */
.completion-bar {
    width: 100px;
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    overflow: hidden;
}

.completion-fill {
    height: 100%;
    background: linear-gradient(90deg, #10b981 0%, #059669 100%);
    border-radius: 4px;
    transition: width 0.3s ease;
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 0.2s ease;
}

.modal-content {
    background: #fff;
    border-radius: 12px;
    width: 90%;
    max-width: 800px;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    padding: 20px 24px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
}

.modal-header h3 i {
    color: #4f46e5;
    margin-right: 8px;
}

.modal-close {
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    font-size: 20px;
    padding: 4px 8px;
    transition: color 0.2s;
}

.modal-close:hover {
    color: #111827;
}

.modal-body {
    padding: 24px;
    overflow-y: auto;
    flex: 1;
}

.modal-footer {
    padding: 16px 24px;
    border-top: 1px solid #e5e7eb;
    display: flex;
    gap: 12px;
    justify-content: flex-end;
}

/* Form Styles */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #374151;
    font-size: 14px;
}

.form-input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    color: #111827;
    transition: all 0.2s;
}

.form-input:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

textarea.form-input {
    resize: vertical;
    font-family: inherit;
}

select.form-input {
    cursor: pointer;
}

/* Success Button */
.simple-btn.success {
    background: #10b981;
    color: #fff;
    border: none;
}

.simple-btn.success:hover {
    background: #059669;
}

/* Checkbox Styling */
input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #4f46e5;
}

/* Responsive */
@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        max-height: 95vh;
    }
    
    .form-row {
        grid-template-columns: 1fr !important;
    }
}
</style>

<script>
// Sample student data for different classes
const classStudents = {
    'G9-A Math': [
        { rollNo: '001', name: 'Alice Johnson' },
        { rollNo: '002', name: 'Bob Smith' },
        { rollNo: '003', name: 'Charlie Brown' },
        { rollNo: '004', name: 'Diana Prince' },
        { rollNo: '005', name: 'Edward Norton' },
        { rollNo: '006', name: 'Fiona Apple' },
        { rollNo: '007', name: 'George Martin' },
        { rollNo: '008', name: 'Hannah Montana' },
        { rollNo: '009', name: 'Isaac Newton' },
        { rollNo: '010', name: 'Julia Roberts' },
        { rollNo: '011', name: 'Kevin Hart' },
        { rollNo: '012', name: 'Lisa Simpson' },
        { rollNo: '013', name: 'Michael Scott' },
        { rollNo: '014', name: 'Nancy Drew' },
        { rollNo: '015', name: 'Oscar Wilde' },
        { rollNo: '016', name: 'Pam Beesly' },
        { rollNo: '017', name: 'Quinn Fabray' },
        { rollNo: '018', name: 'Rachel Green' },
        { rollNo: '019', name: 'Steve Jobs' },
        { rollNo: '020', name: 'Tina Fey' },
        { rollNo: '021', name: 'Uma Thurman' },
        { rollNo: '022', name: 'Victor Hugo' },
        { rollNo: '023', name: 'Wendy Williams' },
        { rollNo: '024', name: 'Xavier Woods' },
        { rollNo: '025', name: 'Yara Shahidi' },
        { rollNo: '026', name: 'Zack Morris' },
        { rollNo: '027', name: 'Amy Adams' },
        { rollNo: '028', name: 'Ben Affleck' },
        { rollNo: '029', name: 'Chloe Grace' },
        { rollNo: '030', name: 'David Beckham' },
        { rollNo: '031', name: 'Emma Watson' },
        { rollNo: '032', name: 'Frank Ocean' },
        { rollNo: '033', name: 'Gina Rodriguez' },
        { rollNo: '034', name: 'Harry Potter' },
        { rollNo: '035', name: 'Iris West' }
    ],
    'G9-B Math': Array.from({ length: 32 }, (_, i) => ({
        rollNo: String(i + 1).padStart(3, '0'),
        name: `Student ${i + 1}`
    })),
    'G10-A Physics': Array.from({ length: 38 }, (_, i) => ({
        rollNo: String(i + 1).padStart(3, '0'),
        name: `Student ${i + 1}`
    })),
    'G10-B Chemistry': Array.from({ length: 30 }, (_, i) => ({
        rollNo: String(i + 1).padStart(3, '0'),
        name: `Student ${i + 1}`
    }))
};

let currentHomeworkId = '';
let currentClass = '';

// Submit Assign Homework
function submitAssignHomework() {
    const homeworkClass = document.getElementById('homeworkClass').value;
    const topic = document.getElementById('homeworkTopic').value;
    const dueDate = document.getElementById('homeworkDueDate').value;
    
    // Validation
    if (!homeworkClass || !topic || !dueDate) {
        showActionStatus('Please fill in all required fields', 'error');
        return;
    }
    
    const assignDate = new Date().toISOString().split('T')[0];
    
    // Generate new homework ID
    const newId = 'HW' + String(Math.floor(Math.random() * 1000)).padStart(3, '0');
    
    // Get class details
    const classOption = document.getElementById('homeworkClass').selectedOptions[0].text;
    const classMatch = classOption.match(/^([^(]+)\(([^)]+)\)/);
    const className = classMatch ? classMatch[1].trim() : homeworkClass;
    const subject = classMatch ? classMatch[2].trim() : '';
    
    // Get student count
    const studentCount = classStudents[homeworkClass]?.length || 0;
    
    // Format dates
    const formatDate = (dateStr) => {
        const d = new Date(dateStr);
        return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    };
    
    // Create new row
    const newRow = document.createElement('tr');
    newRow.setAttribute('data-class', homeworkClass);
    newRow.setAttribute('data-id', newId);
    newRow.innerHTML = `
        <td><strong>#${newId}</strong></td>
        <td>
            <strong>${className}</strong><br>
            <small style="color: #6b7280;">${subject}</small>
        </td>
        <td>${topic}</td>
        <td>${formatDate(assignDate)}</td>
        <td>${formatDate(dueDate)}</td>
        <td>${studentCount}</td>
        <td><span class="status-badge pending">Pending</span></td>
        <td style="text-align: center;">
            <button class="simple-btn primary" onclick="openCollectDialog('${newId}', '${homeworkClass}', '${topic.replace(/'/g, "\\'")}')">
                <i class="fas fa-clipboard-check"></i> Collect
            </button>
        </td>
    `;
    
    // Add to table
    const tbody = document.getElementById('pendingHomeworkBody');
    tbody.insertBefore(newRow, tbody.firstChild);
    
    // Update stats
    updateStats();
    
    // Show success message
    showActionStatus(`Homework "${topic}" assigned successfully to ${className}!`, 'success');
    
    // Hide form and reset
    document.getElementById('homeworkForm').style.display = 'none';
    document.getElementById('homeworkClass').value = '';
    document.getElementById('homeworkTopic').value = '';
    document.getElementById('homeworkDueDate').value = '';
    document.getElementById('homeworkDescription').value = '';
}

// Open Collect Dialog
function openCollectDialog(hwId, className, topic) {
    currentHomeworkId = hwId;
    currentClass = className;
    
    document.getElementById('collectHomeworkId').textContent = '#' + hwId;
    document.getElementById('collectHomeworkTopic').textContent = topic;
    document.getElementById('collectHomeworkClass').textContent = className;
    
    // Populate student list
    const students = classStudents[className] || [];
    const tbody = document.getElementById('studentChecklistBody');
    tbody.innerHTML = '';
    
    students.forEach(student => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td style="text-align: center;">
                <input type="checkbox" class="student-checkbox" onchange="updateCompletionCount()">
            </td>
            <td>${student.rollNo}</td>
            <td>${student.name}</td>
            <td style="text-align: center;">
                <span class="completion-status">
                    <i class="fas fa-times" style="color: #ef4444;"></i>
                </span>
            </td>
        `;
        tbody.appendChild(row);
    });
    
    // Reset completion count
    updateCompletionCount();
    
    document.getElementById('collectHomeworkDialog').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Close Collect Dialog
function closeCollectDialog() {
    document.getElementById('collectHomeworkDialog').style.display = 'none';
    document.body.style.overflow = 'auto';
    document.getElementById('selectAllStudents').checked = false;
}

// Toggle All Students
function toggleAllStudents(checkbox) {
    const checkboxes = document.querySelectorAll('.student-checkbox');
    checkboxes.forEach(cb => {
        cb.checked = checkbox.checked;
    });
    updateCompletionCount();
}

// Mark All Complete
function markAllComplete() {
    document.getElementById('selectAllStudents').checked = true;
    toggleAllStudents(document.getElementById('selectAllStudents'));
}

// Clear All Complete
function clearAllComplete() {
    document.getElementById('selectAllStudents').checked = false;
    toggleAllStudents(document.getElementById('selectAllStudents'));
}

// Update Completion Count
function updateCompletionCount() {
    const checkboxes = document.querySelectorAll('.student-checkbox');
    const totalStudents = checkboxes.length;
    const completedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
    const percentage = totalStudents > 0 ? Math.round((completedCount / totalStudents) * 100) : 0;
    
    document.getElementById('collectCompletionRate').textContent = percentage + '%';
    document.getElementById('collectCompletionCount').textContent = `(${completedCount}/${totalStudents})`;
    
    // Update visual indicators
    checkboxes.forEach((cb, index) => {
        const row = cb.closest('tr');
        const statusIcon = row.querySelector('.completion-status i');
        
        if (cb.checked) {
            statusIcon.className = 'fas fa-check';
            statusIcon.style.color = '#10b981';
        } else {
            statusIcon.className = 'fas fa-times';
            statusIcon.style.color = '#ef4444';
        }
    });
}

// Submit Collect Homework
function submitCollectHomework() {
    const checkboxes = document.querySelectorAll('.student-checkbox');
    const totalStudents = checkboxes.length;
    const completedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
    const percentage = totalStudents > 0 ? Math.round((completedCount / totalStudents) * 100) : 0;
    
    // Find the pending homework row
    const pendingRow = document.querySelector(`#pendingHomeworkBody tr[data-id="${currentHomeworkId}"]`);
    
    if (pendingRow) {
        const cells = pendingRow.querySelectorAll('td');
        const hwId = currentHomeworkId;
        const classInfo = cells[1].innerHTML;
        const topic = cells[2].textContent;
        const assignedDate = cells[3].textContent;
        const dueDate = cells[4].textContent;
        const today = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        
        // Determine completion color
        let completionColor = '#10b981'; // green
        if (percentage < 70) completionColor = '#ef4444'; // red
        else if (percentage < 85) completionColor = '#f59e0b'; // yellow
        
        // Create history row
        const historyRow = document.createElement('tr');
        historyRow.setAttribute('data-class', currentClass);
        historyRow.setAttribute('data-id', hwId);
        historyRow.innerHTML = `
            <td><strong>#${hwId}</strong></td>
            <td>${classInfo}</td>
            <td>${topic}</td>
            <td>${assignedDate}</td>
            <td>${dueDate}</td>
            <td>${today}</td>
            <td>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div class="completion-bar">
                        <div class="completion-fill" style="width: ${percentage}%;"></div>
                    </div>
                    <span style="font-weight: 600; color: ${completionColor};">${percentage}%</span>
                    <small style="color: #6b7280;">(${completedCount}/${totalStudents})</small>
                </div>
            </td>
            <td style="text-align: center;">
                <button class="simple-btn secondary" onclick="viewHomeworkDetails('${hwId}')">
                    <i class="fas fa-eye"></i> View
                </button>
            </td>
        `;
        
        // Add to history table
        const historyBody = document.getElementById('historyBody');
        historyBody.insertBefore(historyRow, historyBody.firstChild);
        
        // Remove from pending table
        pendingRow.remove();
        
        // Update stats
        updateStats();
        
        // Show success message
        showActionStatus(`Homework collected successfully! Completion: ${percentage}%`, 'success');
        
        // Close dialog
        closeCollectDialog();
    }
}

// View Homework Details
function viewHomeworkDetails(hwId) {
    showActionStatus(`Viewing details for homework ${hwId}`, 'info');
}

// Filter Pending Homework
function filterPendingHomework() {
    const classFilter = document.getElementById('pendingClassFilter').value.toLowerCase();
    const searchInput = document.getElementById('pendingSearchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#pendingHomeworkBody tr');
    
    rows.forEach(row => {
        const classValue = row.getAttribute('data-class').toLowerCase();
        const text = row.textContent.toLowerCase();
        
        const classMatch = classFilter === 'all' || classValue === classFilter;
        const searchMatch = text.includes(searchInput);
        
        row.style.display = (classMatch && searchMatch) ? '' : 'none';
    });
}

// Filter Homework History
function filterHomeworkHistory() {
    const classFilter = document.getElementById('historyClassFilter').value.toLowerCase();
    const searchInput = document.getElementById('historySearchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#historyBody tr');
    
    rows.forEach(row => {
        const classValue = row.getAttribute('data-class').toLowerCase();
        const text = row.textContent.toLowerCase();
        
        const classMatch = classFilter === 'all' || classValue === classFilter;
        const searchMatch = text.includes(searchInput);
        
        row.style.display = (classMatch && searchMatch) ? '' : 'none';
    });
}

// Update Stats
function updateStats() {
    const pendingCount = document.querySelectorAll('#pendingHomeworkBody tr').length;
    const historyCount = document.querySelectorAll('#historyBody tr').length;
    const totalCount = pendingCount + historyCount;
    
    document.getElementById('totalAssigned').textContent = totalCount;
    document.getElementById('pendingCollection').textContent = pendingCount;
    document.getElementById('completedHomework').textContent = historyCount;
    
    // Calculate average completion from history
    const historyRows = document.querySelectorAll('#historyBody tr');
    let totalCompletion = 0;
    historyRows.forEach(row => {
        const completionText = row.querySelector('td:nth-child(7) span[style*="font-weight"]').textContent;
        const percentage = parseInt(completionText);
        totalCompletion += percentage;
    });
    const avgCompletion = historyRows.length > 0 ? Math.round(totalCompletion / historyRows.length) : 0;
    document.getElementById('avgCompletion').textContent = avgCompletion + '%';
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateStats();
    
    // Toggle homework form
    const toggleBtn = document.getElementById('toggleHomeworkForm');
    const form = document.getElementById('homeworkForm');
    const cancelBtn = document.getElementById('cancelHomework');
    const saveBtn = document.getElementById('saveHomework');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                toggleBtn.innerHTML = '<i class="fas fa-minus"></i> Hide Form';
            } else {
                form.style.display = 'none';
                toggleBtn.innerHTML = '<i class="fas fa-plus"></i> Add Homework';
            }
        });
    }
    
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            form.style.display = 'none';
            toggleBtn.innerHTML = '<i class="fas fa-plus"></i> Add Homework';
            // Reset form
            document.getElementById('homeworkClass').value = '';
            document.getElementById('homeworkTopic').value = '';
            document.getElementById('homeworkDueDate').value = '';
            document.getElementById('homeworkDescription').value = '';
        });
    }
    
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            submitAssignHomework();
        });
    }
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/teacher-layout.php';
?>

