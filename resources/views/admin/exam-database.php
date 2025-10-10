<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Database';
$pageIcon = 'fas fa-database';
$pageHeading = 'Exam Database';
$activePage = 'exams';

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

<!-- Exam Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Upcoming Exams</h3>
        <a href="/admin/create-exam" class="simple-btn"><i class="fas fa-plus"></i> Create New Exam</a>
    </div>

    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th data-label="Exam ID">Exam ID</th>
                    <th data-label="Exam Name">Exam Name</th>
                    <th data-label="Type">Type</th>
                    <th data-label="Class">Class</th>
                    <th data-label="Subject(s)">Subject(s)</th>
                    <th data-label="Date">Exam Date</th>
                    <th data-label="Status">Status</th>
                    <th data-label="Actions">Actions</th>
                </tr>
            </thead>
            <tbody id="upcomingExamsBody">
                <tr>
                    <td data-label="Exam ID"><strong>EX001</strong></td>
                    <td data-label="Exam Name">Mathematics Tutorial 1</td>
                    <td data-label="Type"><span class="badge-type tutorial">Tutorial</span></td>
                    <td data-label="Class">Grade 9-A</td>
                    <td data-label="Subject(s)">Mathematics</td>
                    <td data-label="Date">2025-01-20</td>
                    <td data-label="Status"><span class="status-badge pending">Upcoming</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX001')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editExam('EX001')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Exam ID"><strong>EX002</strong></td>
                    <td data-label="Exam Name">Mid-term Exam</td>
                    <td data-label="Type"><span class="badge-type monthly">Monthly</span></td>
                    <td data-label="Class">Grade 10-B</td>
                    <td data-label="Subject(s)">6 subjects</td>
                    <td data-label="Date">2025-02-05</td>
                    <td data-label="Status"><span class="status-badge pending">Upcoming</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX002')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editExam('EX002')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Exam ID"><strong>EX003</strong></td>
                    <td data-label="Exam Name">Science Tutorial</td>
                    <td data-label="Type"><span class="badge-type tutorial">Tutorial</span></td>
                    <td data-label="Class">Grade 9-B</td>
                    <td data-label="Subject(s)">Science</td>
                    <td data-label="Date">2025-01-25</td>
                    <td data-label="Status"><span class="status-badge pending">Upcoming</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX003')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="editExam('EX003')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Active Exams -->
    <div class="simple-header" style="margin-top:24px;">
        <h3>Active Exams</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th data-label="Exam ID">Exam ID</th>
                    <th data-label="Exam Name">Exam Name</th>
                    <th data-label="Type">Type</th>
                    <th data-label="Class">Class</th>
                    <th data-label="Subject(s)">Subject(s)</th>
                    <th data-label="Date">Exam Date</th>
                    <th data-label="Status">Status</th>
                    <th data-label="Actions">Actions</th>
                </tr>
            </thead>
            <tbody id="activeExamsBody">
                <tr>
                    <td data-label="Exam ID"><strong>EX008</strong></td>
                    <td data-label="Exam Name">English Monthly Test</td>
                    <td data-label="Type"><span class="badge-type monthly">Monthly</span></td>
                    <td data-label="Class">Grade 11-A</td>
                    <td data-label="Subject(s)">English</td>
                    <td data-label="Date">2025-01-15</td>
                    <td data-label="Status"><span class="status-badge paid">Active</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX008')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon disabled" onclick="alert('Cannot edit active exams')" title="Edit Disabled" disabled>
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Exam ID"><strong>EX009</strong></td>
                    <td data-label="Exam Name">Physics Semester Exam</td>
                    <td data-label="Type"><span class="badge-type semester">Semester</span></td>
                    <td data-label="Class">Grade 12-A</td>
                    <td data-label="Subject(s)">5 subjects</td>
                    <td data-label="Date">2025-01-18</td>
                    <td data-label="Status"><span class="status-badge paid">Active</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX009')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon disabled" onclick="alert('Cannot edit active exams')" title="Edit Disabled" disabled>
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Completed Exams -->
    <div class="simple-header" style="margin-top:24px;">
        <h3>Completed Exams</h3>
    </div>
    <div class="simple-table-container">
        <table class="basic-table responsive-table">
            <thead>
                <tr>
                    <th data-label="Exam ID">Exam ID</th>
                    <th data-label="Exam Name">Exam Name</th>
                    <th data-label="Type">Type</th>
                    <th data-label="Class">Class</th>
                    <th data-label="Subject(s)">Subject(s)</th>
                    <th data-label="Marks">Marks</th>
                    <th data-label="Status">Status</th>
                    <th data-label="Actions">Actions</th>
                </tr>
            </thead>
            <tbody id="completedExamsBody">
                <tr>
                    <td data-label="Exam ID"><strong>EX005</strong></td>
                    <td data-label="Exam Name">Final Exam - Science</td>
                    <td data-label="Type"><span class="badge-type final">Final</span></td>
                    <td data-label="Class">Grade 12-A</td>
                    <td data-label="Subject(s)">7 subjects</td>
                    <td data-label="Marks">100</td>
                    <td data-label="Status"><span class="status-badge completed">Completed</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX005')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="viewResults('EX005')" title="View Results">
                            <i class="fas fa-chart-bar"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Exam ID"><strong>EX006</strong></td>
                    <td data-label="Exam Name">Mid-Semester Assessment</td>
                    <td data-label="Type"><span class="badge-type semester">Semester</span></td>
                    <td data-label="Class">Grade 11-B</td>
                    <td data-label="Subject(s)">6 subjects</td>
                    <td data-label="Marks">100</td>
                    <td data-label="Status"><span class="status-badge completed">Completed</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX006')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="viewResults('EX006')" title="View Results">
                            <i class="fas fa-chart-bar"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Exam ID"><strong>EX007</strong></td>
                    <td data-label="Exam Name">Monthly Test - Math</td>
                    <td data-label="Type"><span class="badge-type monthly">Monthly</span></td>
                    <td data-label="Class">Grade 9-A</td>
                    <td data-label="Subject(s)">Mathematics</td>
                    <td data-label="Marks">100</td>
                    <td data-label="Status"><span class="status-badge completed">Completed</span></td>
                    <td data-label="Actions" class="actions-cell">
                        <button class="simple-btn-icon" onclick="viewExam('EX007')" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="simple-btn-icon" onclick="viewResults('EX007')" title="View Results">
                            <i class="fas fa-chart-bar"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
/* Exam Type Badges */
.badge-type {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
    text-transform: capitalize;
}

.badge-type.tutorial {
    background: #e3f2fd;
    color: #1976d2;
}

.badge-type.monthly {
    background: #f3e5f5;
    color: #7b1fa2;
}

.badge-type.semester {
    background: #fff3e0;
    color: #ef6c00;
}

.badge-type.final {
    background: #ffebee;
    color: #c62828;
}

.status-badge.completed {
    background: #e8f5e9;
    color: #2e7d32;
}

.status-badge.pending {
    background: #fff3e0;
    color: #ef6c00;
}

/* Disabled Button */
.simple-btn-icon.disabled,
.simple-btn-icon:disabled {
    opacity: 0.4;
    cursor: not-allowed;
    pointer-events: none;
}

.simple-btn-icon.disabled:hover,
.simple-btn-icon:disabled:hover {
    background: transparent;
}

/* Responsive Table */
@media screen and (max-width: 768px) {
    .responsive-table thead {
        display: none;
    }
    
    .responsive-table tbody tr {
        display: block;
        margin-bottom: 16px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .responsive-table tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 16px;
        border: none;
        border-bottom: 1px solid #f5f5f5;
    }
    
    .responsive-table tbody td:last-child {
        border-bottom: none;
    }
    
    .responsive-table tbody td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #666;
        margin-right: 12px;
    }
    
    .actions-cell {
        justify-content: flex-end;
    }
    
    .actions-cell::before {
        flex: 1;
    }
}

@media screen and (max-width: 480px) {
    .simple-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .simple-header .simple-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
// Exam Database Functions - Ready for Backend Integration

/**
 * View exam details
 * Backend: GET /api/exams/{examId}
 */
function viewExam(examId) {
    // Navigate to exam details page
    window.location.href = `/admin/exam-details?id=${examId}`;
}

/**
 * Edit exam
 * Backend: GET /api/exams/{examId}/edit
 */
function editExam(examId) {
    // Navigate to edit exam page
    window.location.href = `/admin/exam-edit?id=${examId}`;
}

/**
 * View exam results
 * Backend: GET /api/exams/{examId}/results
 */
function viewResults(examId) {
    // Navigate to results page
    window.location.href = `/admin/exam-results?id=${examId}`;
}

/**
 * Load exams from backend
 * Backend: GET /api/exams?status={active|completed}
 */
async function loadExams() {
    try {
        // Example backend integration:
        // const activeResponse = await fetch('/api/exams?status=active');
        // const activeExams = await activeResponse.json();
        // renderExams(activeExams, 'activeExamsBody');
        
        // const completedResponse = await fetch('/api/exams?status=completed');
        // const completedExams = await completedResponse.json();
        // renderExams(completedExams, 'completedExamsBody');
        
        console.log('Exam database ready for backend integration');
    } catch (error) {
        console.error('Error loading exams:', error);
    }
}

/**
 * Render exams to table
 * @param {Array} exams - Array of exam objects
 * @param {string} tableBodyId - Table body element ID
 */
function renderExams(exams, tableBodyId) {
    const tbody = document.getElementById(tableBodyId);
    if (!tbody) return;
    
    tbody.innerHTML = exams.map(exam => `
        <tr>
            <td data-label="Exam ID"><strong>${exam.id}</strong></td>
            <td data-label="Exam Name">${exam.name}</td>
            <td data-label="Type"><span class="badge-type ${exam.type.toLowerCase()}">${exam.type}</span></td>
            <td data-label="Class">${exam.class}</td>
            <td data-label="Subject(s)">${exam.subjects}</td>
            <td data-label="Date">${exam.date || '-'}</td>
            <td data-label="Status"><span class="status-badge ${exam.status.toLowerCase()}">${exam.status}</span></td>
            <td data-label="Actions" class="actions-cell">
                <button class="simple-btn-icon" onclick="viewExam('${exam.id}')" title="View Details">
                    <i class="fas fa-eye"></i>
                </button>
                ${exam.status === 'Upcoming' ? 
                    `<button class="simple-btn-icon" onclick="editExam('${exam.id}')" title="Edit"><i class="fas fa-edit"></i></button>` :
                    exam.status === 'Active' ?
                    `<button class="simple-btn-icon disabled" onclick="alert('Cannot edit active exams')" title="Edit Disabled" disabled><i class="fas fa-edit"></i></button>` :
                    `<button class="simple-btn-icon" onclick="viewResults('${exam.id}')" title="View Results"><i class="fas fa-chart-bar"></i></button>`
                }
            </td>
        </tr>
    `).join('');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', loadExams);
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
