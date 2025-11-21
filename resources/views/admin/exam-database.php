<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Database';
$pageIcon = 'fas fa-database';
$pageHeading = 'Exam Database';
$activePage = 'exams';

// Detect portal from URL to set appropriate routes
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$portalPrefix = strpos($currentUri, '/staff/') !== false ? '/staff' : '/admin';

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

<!-- Exam Overview -->
<div class="exam-dashboard-overview">
    <div class="stats-grid-secondary vertical-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-bolt"></i>
            </div>
            <div class="stat-content">
                <h3>Active Exams</h3>
                <div class="stat-number" id="activeExamCount">0</div>
                <div class="stat-change">Currently running assessments</div>
        </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-content">
                <h3>Upcoming Exams</h3>
                <div class="stat-number" id="upcomingExamCount">0</div>
                <div class="stat-change">Scheduled for the next 60 days</div>
        </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <h3>Completed Exams</h3>
                <div class="stat-number" id="completedExamCount">0</div>
                <div class="stat-change">Finished and archived</div>
            </div>
        </div>
    </div>

    <div class="exam-filter-bar">
        <div class="filter-group">
            <label for="filterExamType">Exam Type</label>
            <select id="filterExamType" class="form-select">
                <option value="all">All Types</option>
                <option value="tutorial">Tutorial</option>
                <option value="monthly">Monthly</option>
                <option value="semester">Semester</option>
                <option value="final">Final</option>
            </select>
        </div>
        <div class="filter-group">
            <label for="filterExamClass">Class</label>
            <select id="filterExamClass" class="form-select">
                <option value="all">All Classes</option>
            </select>
        </div>
        <div class="filter-group">
            <label for="filterExamStatus">Status</label>
            <select id="filterExamStatus" class="form-select">
                <option value="all">All Statuses</option>
                <option value="Active">Active</option>
                <option value="Upcoming">Upcoming</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <div class="filter-group">
            <label for="filterExamMonth">Month</label>
            <select id="filterExamMonth" class="form-select">
                <option value="all">All Months</option>
            </select>
        </div>
    </div>
</div>

<!-- Exam Management Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>All Exams</h3>
        <div class="exam-creation-controls">
            <button class="simple-btn" onclick="openExamCreationModal()" id="createExamBtnMain">
                <i class="fas fa-plus"></i> Create New Exam
            </button>
        </div>
    </div>

    <div class="simple-table-container">
        <table class="basic-table responsive-table" id="examDatabaseTable">
            <thead>
                <tr>
                    <th data-label="Exam ID">Exam ID</th>
                    <th data-label="Exam Name">Exam Name</th>
                    <th data-label="Type">Type</th>
                    <th data-label="Class">Class</th>
                    <th data-label="Subject(s)">Subject(s)</th>
                    <th data-label="Status">Status</th>
                    <th data-label="Actions">Actions</th>
                </tr>
            </thead>
            <tbody id="allExamsBody">
                <!-- Exams will be populated and sorted by status here -->
            </tbody>
        </table>
    </div>
</div>

<!-- Persistent Exam Creation Modal -->
<div id="examCreationModal" class="exam-creation-modal" style="display:none;">
    <div class="exam-modal-overlay" onclick="closeExamCreationModal()"></div>
    <div class="exam-modal-content" id="examModalContent">
        <div class="exam-modal-header">
            <div class="exam-modal-header-left">
                <h3><i class="fas fa-calendar-plus"></i> <span id="modalTitle">Create New Exam</span></h3>
                <span class="exam-modal-subtitle" id="examModalSubtitle">Select exam details to get started</span>
            </div>
            <div class="exam-modal-header-right">
                <button class="icon-btn" onclick="event.stopPropagation(); closeExamCreationModal()" title="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="exam-modal-body" id="examModalBody" onclick="event.stopPropagation();">
            <!-- Exam Selection and Schedule Combined -->
            <div class="exam-creation-content">
                <!-- Selection Section -->
                <div class="exam-selection-section">
                    <h4 style="margin: 0 0 16px 0; color: #333; font-size: 1.1rem;">Exam Details</h4>
                    <div class="exam-selection-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Grade</label>
                                <select id="modalGradeSelect" class="form-select" onchange="updateExamSchedule()">
                            <option value="">Select Grade</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <select id="modalClassSelect" class="form-select" onchange="updateExamSchedule()">
                            <option value="">Select Class</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                            </div>
                            <div class="form-group">
                                <label>Exam Type</label>
                                <select id="modalExamTypeSelect" class="form-select" onchange="updateExamSchedule()">
                                    <option value="">Select Exam Type</option>
                            <option value="Tutorial">Tutorial (25 marks, 1 subject)</option>
                            <option value="Monthly">Monthly (100 marks, 6 subjects)</option>
                            <option value="Semester">Semester (100 marks, 6 subjects)</option>
                            <option value="Final">Final (100 marks, 6 subjects)</option>
                        </select>
                            </div>
                    </div>
                </div>
            </div>

                <!-- Schedule Section -->
                <div id="examScheduleSection" class="exam-schedule-section" style="display:none;">
                    <div id="examScheduleContainer"></div>
                </div>
                </div>
        </div>
    </div>
    
    <!-- Minimized State Bar -->
    <div class="exam-modal-minimized" id="examModalMinimized" style="display:none;" onclick="event.stopPropagation();">
        <div class="minimized-content" onclick="toggleExamModalMinimize()" style="cursor: pointer;">
            <i class="fas fa-calendar-plus"></i>
            <span id="minimizedTitle">Exam Creation</span>
        </div>
        <div class="minimized-actions">
            <button class="icon-btn" onclick="event.stopPropagation(); toggleExamModalMinimize()" title="Expand">
                <i class="fas fa-window-maximize"></i>
            </button>
            <button class="icon-btn" onclick="event.stopPropagation(); closeExamCreationModal()" title="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<!-- Exam Edit Modal -->
<div id="examEditModal" class="exam-creation-modal" style="display:none;">
    <div class="exam-modal-overlay" onclick="closeExamEditModal()"></div>
    <div class="exam-modal-content" id="examEditModalContent">
        <div class="exam-modal-header">
            <div class="exam-modal-header-left">
                <h3><i class="fas fa-edit"></i> <span id="editModalTitle">Edit Exam</span></h3>
                <span class="exam-modal-subtitle" id="editModalSubtitle">Update exam details and schedule</span>
            </div>
            <div class="exam-modal-header-right">
                <button class="icon-btn" onclick="event.stopPropagation(); closeExamEditModal()" title="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="exam-modal-body" id="examEditModalBody" onclick="event.stopPropagation();">
            <div id="examEditContainer"></div>
        </div>
    </div>
</div>

<style>
/* Exam Overview */
.exam-dashboard-overview {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 24px;
}


.exam-filter-bar {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
    padding: 12px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: #fff;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.filter-group label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #4b5563;
}

.filter-group .form-select {
    padding: 8px 12px;
    font-size: 0.9rem;
    height: 38px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

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

.status-badge.active {
    background: #e3f2fd;
    color: #1976d2;
}

.status-badge.upcoming {
    background: #fffbeb;
    color: #b45309;
}

.status-badge.completed {
    background: #ecfdf5;
    color: #059669;
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
    
    .exam-creation-controls {
        width: 100%;
        flex-direction: column;
    }
    
    .simple-header .simple-btn,
    .exam-creation-controls .simple-btn {
        width: 100%;
        justify-content: center;
    }
}

/* Exam Creation Modal Styles */
.exam-creation-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.exam-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(2px);
}

.exam-modal-content {
    position: relative;
    background: #fff;
    border-radius: 12px;
    width: 95vw;
    max-width: 1400px;
    max-height: 90vh;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    z-index: 1001;
}

.exam-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px 24px;
    border-bottom: 1px solid #e0e0e0;
    background: #f8f9fa;
    border-radius: 12px 12px 0 0;
    flex-shrink: 0;
}

.exam-modal-header-left h3 {
    margin: 0;
    font-size: 1.3rem;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
}

.exam-modal-subtitle {
    font-size: 0.85rem;
    color: #666;
    margin-top: 4px;
    display: block;
}

.exam-modal-header-right {
    display: flex;
    gap: 8px;
}

.exam-modal-body {
    padding: 24px;
    overflow-y: auto;
    flex: 1;
}

.exam-modal-minimized {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #fff;
    border-radius: 8px;
    padding: 12px 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-width: 300px;
    border: 2px solid #1976d2;
    z-index: 1002;
}

.minimized-content {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.minimized-content i {
    color: #1976d2;
    font-size: 1.2rem;
}

.minimized-content span {
    font-weight: 600;
    color: #333;
}

.minimized-draft-count {
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Exam Creation Controls */
.exam-creation-controls {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: nowrap;
}

.exam-select {
    width: auto;
    min-width: auto;
    height: 38px;
    background: #fff;
    border: 1px solid #ddd;
    padding: 8px 12px;
    font-size: 0.9rem;
    border-radius: 4px;
    flex-shrink: 0;
}

.exam-select option {
    padding: 4px 8px;
}

.exam-select:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.1);
}

.exam-creation-controls .simple-btn {
    flex-shrink: 0;
    white-space: nowrap;
}

/* Exam Schedule Screen */
.exam-schedule-screen {
    padding: 0;
}

.minimized-actions {
    display: flex;
    gap: 4px;
}

/* Inline Exam Form */
.exam-inline-form {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-top: 16px;
    overflow: hidden;
}

.exam-form-header {
    background: #f8f9fa;
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.exam-form-header h3 {
    margin: 0;
    font-size: 1.1rem;
    color: #333;
}

.exam-form-actions {
    display: flex;
    gap: 8px;
}

.exam-form-body {
    padding: 20px;
}

/* Exam Creation Content */
.exam-creation-content {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.exam-selection-section {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
}

.exam-selection-form {
    text-align: left;
}

.exam-selection-form .form-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 0;
}

.exam-selection-form .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.exam-selection-form .form-group label {
    font-weight: 600;
    color: #333;
    font-size: 0.9rem;
}

.exam-selection-form .form-select {
    width: 100%;
    padding: 10px 12px;
    font-size: 0.95rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: #fff;
}

.exam-schedule-section {
    margin-top: 8px;
}

@media screen and (max-width: 768px) {
    .exam-selection-form .form-row {
        grid-template-columns: 1fr;
    }
}

/* Exam Schedule Screen */
.exam-schedule-screen {
    width: 100%;
}
</style>

<script>
// Portal prefix for navigation
const portalPrefix = '<?php echo $portalPrefix; ?>';
const statusOrder = { 'Active': 1, 'Upcoming': 2, 'Completed': 3 };
const monthSequence = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const filterState = { type: 'all', class: 'all', status: 'all', month: 'all' };
let cachedExams = [];

// Exam Database Functions - Ready for Backend Integration

function initializeFilterListeners() {
    const mappings = [
        { id: 'filterExamType', key: 'type' },
        { id: 'filterExamClass', key: 'class' },
        { id: 'filterExamStatus', key: 'status' },
        { id: 'filterExamMonth', key: 'month' }
    ];

    mappings.forEach(({ id, key }) => {
        const element = document.getElementById(id);
        if (!element) return;

        element.addEventListener('change', (event) => {
            filterState[key] = event.target.value;
            applyFilters();
        });
    });
}

/**
 * View exam details
 * Backend: GET /api/exams/{examId}
 */
function viewExam(examId) {
    window.location.href = `${portalPrefix}/exam-details?id=${examId}`;
}

/**
 * Edit exam - Opens modal with exam data
 * Backend: GET /api/exams/{examId}
 */
function editExam(examId) {
    // Find exam in cached exams
    const exam = cachedExams.find(e => e.id === examId);
    if (!exam) {
        showToast('Exam not found', 'error');
        return;
    }
    
    openExamEditModal(exam);
}

/**
 * Delete exam (with confirmation)
 * Backend: DELETE /api/exams/{examId}
 */
function deleteExam(examId, examName) {
    showConfirmDialog({
        title: 'Delete Exam',
        message: `Are you sure you want to delete "${examName}" (ID: ${examId})? This action cannot be undone.`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            showActionStatus('Exam deleted successfully.', 'success');
            cachedExams = cachedExams.filter(exam => exam.id !== examId);
            updateStatusCards(cachedExams);
            populateDynamicFilters(cachedExams);
            applyFilters();
        }
    });
}

/**
 * Load and combine all exams from backend, sorted by status
 * Backend: GET /api/exams
 */
async function loadExams() {
    try {
        const allExams = [
            // Active Exams
            { id: 'EX001', name: 'Mathematics Tutorial 1', type: 'tutorial', class: 'Grade 9-A', subjects: 'Mathematics', status: 'Active', month: 'September' },
            { id: 'EX002', name: 'Mid-term Exam', type: 'monthly', class: 'Grade 10-B', subjects: '6 subjects', status: 'Active', month: 'September' },
            { id: 'EX003', name: 'Science Tutorial', type: 'tutorial', class: 'Grade 9-B', subjects: 'Science', status: 'Active', month: 'October' },
            { id: 'EX004', name: 'Chemistry Lab Test', type: 'tutorial', class: 'Grade 11-A', subjects: 'Chemistry', status: 'Active', month: 'October' },
            { id: 'EX008', name: 'English Monthly Test', type: 'monthly', class: 'Grade 11-A', subjects: 'English', status: 'Active', month: 'November' },
            { id: 'EX009', name: 'Physics Semester Exam', type: 'semester', class: 'Grade 12-A', subjects: '5 subjects', status: 'Active', month: 'December' },

            // Upcoming Exams
            { id: 'EX010', name: 'Quarterly Assessment', type: 'semester', class: 'Grade 8-A', subjects: '5 subjects', status: 'Upcoming', month: 'December' },
            { id: 'EX011', name: 'Computer Science Practical', type: 'tutorial', class: 'Grade 12-B', subjects: 'Computer Science', status: 'Upcoming', month: 'January' },

            // Completed Exams
            { id: 'EX005', name: 'Final Exam - Science', type: 'final', class: 'Grade 12-A', subjects: '7 subjects', status: 'Completed', month: 'March' },
            { id: 'EX006', name: 'Mid-Semester Assessment', type: 'semester', class: 'Grade 11-B', subjects: '6 subjects', status: 'Completed', month: 'May' },
            { id: 'EX007', name: 'Monthly Test - Math', type: 'monthly', class: 'Grade 9-A', subjects: 'Mathematics', status: 'Completed', month: 'August' }
        ];

        cachedExams = sortExams(allExams);
        populateDynamicFilters(cachedExams);
        updateStatusCards(cachedExams);
        applyFilters();

        console.log('Exam database loaded and sorted by status');
    } catch (error) {
        console.error('Error loading exams:', error);
    }
}

function populateDynamicFilters(exams) {
    const classSelect = document.getElementById('filterExamClass');
    const monthSelect = document.getElementById('filterExamMonth');

    if (classSelect) {
        const classValues = Array.from(new Set(exams.map(exam => exam.class))).sort();
        populateSelectOptions(classSelect, classValues, 'All Classes', filterState.class, 'class');
    }

    if (monthSelect) {
        const monthValues = Array.from(new Set(exams.map(exam => exam.month))).sort((a, b) => {
            const indexA = monthSequence.indexOf(a);
            const indexB = monthSequence.indexOf(b);
            return (indexA === -1 ? 99 : indexA) - (indexB === -1 ? 99 : indexB);
        });
        populateSelectOptions(monthSelect, monthValues, 'All Months', filterState.month, 'month');
    }
}

function populateSelectOptions(selectElement, values, defaultLabel, currentValue, filterKey) {
    const options = [`<option value="all">${defaultLabel}</option>`];
    values.forEach(value => options.push(`<option value="${value}">${value}</option>`));
    selectElement.innerHTML = options.join('');

    if (values.includes(currentValue)) {
        selectElement.value = currentValue;
    } else {
        filterState[filterKey] = 'all';
        selectElement.value = 'all';
    }
}

function updateStatusCards(exams) {
    const counts = { Active: 0, Upcoming: 0, Completed: 0 };
    exams.forEach(exam => {
        if (counts[exam.status] !== undefined) {
            counts[exam.status]++;
        }
    });

    const activeCard = document.getElementById('activeExamCount');
    const upcomingCard = document.getElementById('upcomingExamCount');
    const completedCard = document.getElementById('completedExamCount');

    if (activeCard) activeCard.textContent = counts.Active;
    if (upcomingCard) upcomingCard.textContent = counts.Upcoming;
    if (completedCard) completedCard.textContent = counts.Completed;
}

function applyFilters() {
    if (!cachedExams.length) {
        renderAllExams([]);
        return;
    }

    const filtered = cachedExams.filter(exam => {
        if (filterState.type !== 'all' && exam.type !== filterState.type) return false;
        if (filterState.class !== 'all' && exam.class !== filterState.class) return false;
        if (filterState.status !== 'all' && exam.status !== filterState.status) return false;
        if (filterState.month !== 'all' && exam.month !== filterState.month) return false;
        return true;
    });

    renderAllExams(sortExams(filtered));
}

/**
 * Render all exams to combined table, sorted by status
 * @param {Array} exams - Array of all exam objects
 */
function renderAllExams(exams) {
    const tbody = document.getElementById('allExamsBody');
    if (!tbody) return;

    if (!exams.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="7" style="text-align:center; padding: 24px; color: #6b7280;">
                    No exams match the selected filters.
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = exams.map(exam => `
        <tr>
            <td data-label="Exam ID"><strong>${exam.id}</strong></td>
            <td data-label="Exam Name">${exam.name}</td>
            <td data-label="Type"><span class="badge-type ${exam.type}">${exam.type.charAt(0).toUpperCase() + exam.type.slice(1)}</span></td>
            <td data-label="Class">${exam.class}</td>
            <td data-label="Subject(s)">${exam.subjects}</td>
            <td data-label="Status"><span class="status-badge ${exam.status.toLowerCase()}">${exam.status}</span></td>
            <td data-label="Actions" class="actions-cell">
                <button class="simple-btn-icon" onclick="viewExam('${exam.id}')" title="View Details">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="simple-btn-icon" onclick="deleteExam('${exam.id}','${exam.name}')" title="Delete Exam">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    `).join('');
}

function sortExams(exams) {
    return exams.slice().sort((a, b) => {
        const statusDiff = (statusOrder[a.status] || 99) - (statusOrder[b.status] || 99);
        if (statusDiff !== 0) return statusDiff;
        return a.name.localeCompare(b.name);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initializeFilterListeners();
    loadExams();
    initializeExamCreation();
    restoreExamModalState();
});

// Exam Creation Modal Functions
let examCounter = 1;
let examModalMinimized = false;

const subjectsByGrade = {
    'Grade 7': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography'],
    'Grade 8': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics'],
    'Grade 9': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics', 'Chemistry'],
    'Grade 10': ['Mathematics', 'English', 'Science', 'Myanmar', 'History', 'Geography', 'Physics', 'Chemistry', 'Biology'],
    'Grade 11': ['Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'Economics'],
    'Grade 12': ['Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'Economics', 'Computer Science']
};

// Mock data for rooms
const availableRooms = [
    'A101', 'A102', 'A103', 'A104', 'A105',
    'B201', 'B202', 'B203', 'B204', 'B205',
    'LAB001', 'LAB002', 'LAB003', 'LAB004',
    'C301', 'C302', 'C303', 'C304'
];

// Mock data for teachers/examiners
const availableTeachers = [
    { id: 'T001', name: 'Dr. Emily Parker', department: 'Mathematics' },
    { id: 'T002', name: 'Mr. David Lee', department: 'History' },
    { id: 'T003', name: 'Ms. Sarah Chen', department: 'English' },
    { id: 'T004', name: 'Prof. James Wilson', department: 'Science' },
    { id: 'T005', name: 'Ms. Lisa Wong', department: 'Art' },
    { id: 'T006', name: 'Mr. Michael Brown', department: 'Physical Education' },
    { id: 'T007', name: 'Dr. Helen Thompson', department: 'Chemistry' },
    { id: 'T008', name: 'Mr. Robert Kim', department: 'Music' },
    { id: 'T009', name: 'Daw Khin Khin', department: 'Mathematics' },
    { id: 'T010', name: 'Ms. Sarah Johnson', department: 'English' },
    { id: 'T011', name: 'U Aung Myint', department: 'Physics' },
    { id: 'T012', name: 'Daw Mya Mya', department: 'Chemistry' },
    { id: 'T013', name: 'U Zaw Win', department: 'Biology' },
    { id: 'T014', name: 'Daw Aye Aye', department: 'Myanmar' },
    { id: 'T015', name: 'U Kyaw Soe', department: 'History' },
    { id: 'T016', name: 'Daw Nu Nu', department: 'Geography' }
];

function initializeExamCreation() {
    // No initialization needed - selections are in modal
}

function openExamCreationModal() {
    const modal = document.getElementById('examCreationModal');
    const content = document.getElementById('examModalContent');
    const minimized = document.getElementById('examModalMinimized');
    const scheduleSection = document.getElementById('examScheduleSection');
    const scheduleContainer = document.getElementById('examScheduleContainer');
    
    if (modal && content && minimized && scheduleSection && scheduleContainer) {
        examModalMinimized = false;
        content.style.display = 'flex';
        minimized.style.display = 'none';
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // Reset form values
        document.getElementById('modalGradeSelect').value = '';
        document.getElementById('modalClassSelect').value = '';
        document.getElementById('modalExamTypeSelect').value = '';
        
        // Hide schedule section initially
        scheduleSection.style.display = 'none';
        scheduleContainer.innerHTML = '';
        
        // Update modal title
        updateModalTitle('Create New Exam', 'Select exam details and configure schedule');
        
        saveExamModalState();
    }
}

function updateExamSchedule() {
    // Get values from modal selects
    const grade = document.getElementById('modalGradeSelect').value;
    const classLetter = document.getElementById('modalClassSelect').value;
    const examType = document.getElementById('modalExamTypeSelect').value;

    const scheduleSection = document.getElementById('examScheduleSection');
    const scheduleContainer = document.getElementById('examScheduleContainer');
    
    if (!scheduleSection || !scheduleContainer) return;
    
    // Only show schedule if all selections are made
    if (grade && classLetter && examType) {
        const className = `${grade}-${classLetter}`;
        
        // Update modal title
        updateModalTitle(`${className} - ${examType} Exam`, 'Configure exam schedule and timing');
        
        // Create or update exam schedule form
        createExamScheduleForm(grade, className, examType, scheduleContainer);
        
        // Show schedule section
        scheduleSection.style.display = 'block';
        
        // Smooth scroll to schedule section
        setTimeout(() => {
            scheduleSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
    } else {
        // Hide schedule section if selections are incomplete
        scheduleSection.style.display = 'none';
        scheduleContainer.innerHTML = '';
        updateModalTitle('Create New Exam', 'Select exam details and configure schedule');
    }
    
    saveExamModalState();
}

function closeExamCreationModal() {
    const modal = document.getElementById('examCreationModal');
    const minimized = document.getElementById('examModalMinimized');
    const scheduleSection = document.getElementById('examScheduleSection');
    const scheduleContainer = document.getElementById('examScheduleContainer');
    
    if (modal) {
        if (examModalMinimized) {
            // If minimized, close completely
            minimized.style.display = 'none';
            examModalMinimized = false;
        }
        modal.style.display = 'none';
        document.body.style.overflow = '';
        
        // Hide schedule section
        if (scheduleSection) {
            scheduleSection.style.display = 'none';
        }
        if (scheduleContainer) {
            scheduleContainer.innerHTML = '';
        }
        
        // Reset form values
        if (document.getElementById('modalGradeSelect')) {
            document.getElementById('modalGradeSelect').value = '';
        }
        if (document.getElementById('modalClassSelect')) {
            document.getElementById('modalClassSelect').value = '';
        }
        if (document.getElementById('modalExamTypeSelect')) {
            document.getElementById('modalExamTypeSelect').value = '';
        }
        
        saveExamModalState();
    }
}

function toggleExamModalMinimize() {
    const modal = document.getElementById('examCreationModal');
    const content = document.getElementById('examModalContent');
    const minimized = document.getElementById('examModalMinimized');
    const scheduleSection = document.getElementById('examScheduleSection');
    
    if (!content || !minimized || !modal) return;
    
    examModalMinimized = !examModalMinimized;
    
    if (examModalMinimized) {
        // Minimize: hide overlay and content, show minimized bar
        modal.style.display = 'none';
        minimized.style.display = 'flex';
        document.body.style.overflow = '';
    } else {
        // Expand: show modal again, preserve current state
        modal.style.display = 'flex';
        content.style.display = 'flex';
        minimized.style.display = 'none';
        document.body.style.overflow = 'hidden';
        
        // Restore schedule section state if it was visible
        if (scheduleSection) {
            const grade = document.getElementById('modalGradeSelect')?.value;
            const classLetter = document.getElementById('modalClassSelect')?.value;
            const examType = document.getElementById('modalExamTypeSelect')?.value;
            
            if (grade && classLetter && examType) {
                scheduleSection.style.display = 'block';
            }
        }
    }
    
    saveExamModalState();
}

function updateModalTitle(title, subtitle) {
    const titleEl = document.getElementById('modalTitle');
    const subtitleEl = document.getElementById('examModalSubtitle');
    const minimizedTitleEl = document.querySelector('#minimizedTitle');
    
    if (titleEl) titleEl.textContent = title;
    if (subtitleEl) subtitleEl.textContent = subtitle;
    if (minimizedTitleEl) minimizedTitleEl.textContent = title;
}

function saveExamModalState() {
    const state = {
        minimized: examModalMinimized,
        visible: document.getElementById('examCreationModal')?.style.display !== 'none'
    };
    localStorage.setItem('examModalState', JSON.stringify(state));
}

function restoreExamModalState() {
    // Don't restore modal state - always start fresh
    // Modal should be closed by default
}

function getSubjectsForExamType(allSubjects, examType) {
    if (examType === 'Tutorial') {
        return allSubjects.slice(0, 1);
    } else {
        return allSubjects.slice(0, 6);
    }
}

function createExamScheduleForm(grade, className, examType, container) {
    const examId = 'exam-' + Date.now();
    const allSubjects = subjectsByGrade[grade] || [];
    const subjects = getSubjectsForExamType(allSubjects, examType);

    const roomOptions = availableRooms.map(room => `<option value="${room}">${room}</option>`).join('');
    const teacherOptions = availableTeachers.map(teacher => `<option value="${teacher.id}">${teacher.name}</option>`).join('');
    
    const subjectRows = subjects.map(subject => `
        <tr class="subject-row" data-subject="${subject}">
            <td><strong>${subject}</strong></td>
            <td><input type="number" class="form-input marks-input" value="${examType === 'Tutorial' ? 25 : 100}"></td>
            <td><input type="date" class="form-input"></td>
            <td><input type="time" class="form-input"></td>
            <td><input type="time" class="form-input"></td>
            <td>
                <select class="form-select room-select" style="width: 100%;">
                    <option value="">Select Room</option>
                    ${roomOptions}
                </select>
            </td>
            <td>
                <select class="form-select examiner-select" style="width: 100%;">
                    <option value="">Select Examiner</option>
                    ${teacherOptions}
                </select>
            </td>
        </tr>
    `).join('');

    const formHTML = `
        <div class="exam-inline-form" id="${examId}" data-grade="${grade}">
            <div class="exam-form-header">
                <div>
                    <h3>${className}</h3>
                    <p style="margin: 4px 0 0 0; color: #666; font-size: 0.9rem;">${examType} Exam - ${examType === 'Tutorial' ? '25 marks, 1 subject' : '100 marks, 6 subjects'}</p>
                </div>
                <div class="exam-form-actions">
                    <button class="simple-btn primary" onclick="saveExamSchedule('${examId}')"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
            <div class="exam-form-body">
                <div class="form-section" style="padding:0;">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Exam Name</label>
                            <input type="text" class="form-input" id="name-${examId}" placeholder="e.g., Mid-term Exam">
                        </div>
                        <div class="form-group">
                            <label>Exam ID</label>
                            <input type="text" class="form-input" id="id-${examId}" placeholder="e.g., EX${String(examCounter).padStart(3, '0')}" value="EX${String(examCounter).padStart(3, '0')}">
                        </div>
                    </div>
                </div>
                
                <div class="simple-table-container" style="margin-top:24px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th style="width:20%;">Subject</th>
                                <th style="width:10%;">Marks</th>
                                <th style="width:12%;">Date</th>
                                <th style="width:12%;">Start Time</th>
                                <th style="width:12%;">End Time</th>
                                <th style="width:15%;">Room</th>
                                <th style="width:19%;">Examiner</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${subjectRows}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    `;
    
    container.innerHTML = formHTML;
    examCounter++;

    // Add subject selector for tutorial exams
    if (examType === 'Tutorial') {
        const form = document.getElementById(examId);
        const firstRow = form.querySelector('.subject-row');
        if (firstRow) {
            const subjectCell = firstRow.querySelector('td:first-child');
            const select = document.createElement('select');
            select.className = 'form-select';
            select.style.maxWidth = '150px';

            allSubjects.forEach(subject => {
                const option = document.createElement('option');
                option.value = subject;
                option.textContent = subject;
                select.appendChild(option);
            });

            select.addEventListener('change', function() {
                const selectedSubject = this.value;
                firstRow.setAttribute('data-subject', selectedSubject);
            });

            subjectCell.innerHTML = '';
            subjectCell.appendChild(select);
        }
    }
}

function saveExamSchedule(examId) {
    const form = document.getElementById(examId);
    if (!form) return;
    
    const examName = document.getElementById(`name-${examId}`).value.trim();
    const examIdValue = document.getElementById(`id-${examId}`).value.trim();
    
    if (!examName || !examIdValue) {
        showToast('Please enter Exam Name and Exam ID', 'warning');
        return;
    }
    
    // Validate all date, time, room, and examiner fields are filled
    const dateInputs = form.querySelectorAll('input[type="date"]');
    const startTimeInputs = form.querySelectorAll('input[type="time"]:nth-of-type(1)');
    const endTimeInputs = form.querySelectorAll('input[type="time"]:nth-of-type(2)');
    const roomSelects = form.querySelectorAll('.room-select');
    const examinerSelects = form.querySelectorAll('.examiner-select');
    
    let allFilled = true;
    
    dateInputs.forEach((input) => {
        if (!input.value) allFilled = false;
    });
    
    startTimeInputs.forEach((input) => {
        if (!input.value) allFilled = false;
    });
    
    endTimeInputs.forEach((input) => {
        if (!input.value) allFilled = false;
    });
    
    roomSelects.forEach((select) => {
        if (!select.value) allFilled = false;
    });
    
    examinerSelects.forEach((select) => {
        if (!select.value) allFilled = false;
    });
    
    if (!allFilled) {
        showToast('Please fill in all date, time, room, and examiner fields for all subjects', 'warning');
        return;
    }
    
    showToast(`Exam "${examName}" (${examIdValue}) saved successfully`, 'success');
    closeExamCreationModal();
    // Reload exams list
    loadExams();
}

// Exam Edit Modal Functions
function openExamEditModal(exam) {
    const modal = document.getElementById('examEditModal');
    const content = document.getElementById('examEditModalContent');
    const container = document.getElementById('examEditContainer');
    
    if (!modal || !content || !container) return;
    
    // Update modal title
    const titleEl = document.getElementById('editModalTitle');
    const subtitleEl = document.getElementById('editModalSubtitle');
    if (titleEl) titleEl.textContent = `Edit: ${exam.name}`;
    if (subtitleEl) subtitleEl.textContent = `Update exam details and schedule`;
    
    // Parse grade and class from exam.class (format: "Grade 10-B")
    const classParts = exam.class.split('-');
    const grade = classParts[0] || '';
    const classLetter = classParts[1] || '';
    
    // Mock exam schedule data (in real app, this would come from API)
    const mockSchedule = [
        { subject: 'Mathematics', marks: 100, date: '2025-01-20', startTime: '09:00', endTime: '11:00', room: 'A101', examiner: 'T001' },
        { subject: 'English', marks: 100, date: '2025-01-22', startTime: '10:30', endTime: '12:30', room: 'A102', examiner: 'T003' },
        { subject: 'Science', marks: 100, date: '2025-01-24', startTime: '08:30', endTime: '10:30', room: 'LAB001', examiner: 'T004' }
    ];
    
    // Create edit form
    createExamEditForm(exam, grade, classLetter, mockSchedule, container);
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeExamEditModal() {
    const modal = document.getElementById('examEditModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

function createExamEditForm(exam, grade, classLetter, schedule, container) {
    const examId = exam.id;
    const roomOptions = availableRooms.map(room => `<option value="${room}">${room}</option>`).join('');
    const teacherOptions = availableTeachers.map(teacher => `<option value="${teacher.id}">${teacher.name}</option>`).join('');
    
    // Create schedule rows
    const scheduleRows = schedule.map((item, index) => {
        const selectedRoom = item.room ? `<option value="${item.room}" selected>${item.room}</option>` : '';
        const roomOptionsWithSelected = availableRooms.map(room => 
            room === item.room ? `<option value="${room}" selected>${room}</option>` : `<option value="${room}">${room}</option>`
        ).join('');
        
        const selectedExaminer = item.examiner ? `<option value="${item.examiner}" selected>${availableTeachers.find(t => t.id === item.examiner)?.name || ''}</option>` : '';
        const teacherOptionsWithSelected = availableTeachers.map(teacher => 
            teacher.id === item.examiner ? `<option value="${teacher.id}" selected>${teacher.name}</option>` : `<option value="${teacher.id}">${teacher.name}</option>`
        ).join('');
        
        return `
            <tr class="subject-row" data-index="${index}">
                <td><input type="text" class="form-input" value="${item.subject}" placeholder="Subject name"></td>
                <td><input type="number" class="form-input marks-input" value="${item.marks}"></td>
                <td><input type="date" class="form-input" value="${item.date}"></td>
                <td><input type="time" class="form-input" value="${item.startTime}"></td>
                <td><input type="time" class="form-input" value="${item.endTime}"></td>
                <td>
                    <select class="form-select room-select" style="width: 100%;">
                        <option value="">Select Room</option>
                        ${roomOptionsWithSelected}
                    </select>
                </td>
                <td>
                    <select class="form-select examiner-select" style="width: 100%;">
                        <option value="">Select Examiner</option>
                        ${teacherOptionsWithSelected}
                    </select>
                </td>
                <td>
                    <button class="simple-btn-icon" onclick="removeEditRow(this)" title="Remove">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    }).join('');
    
    const formHTML = `
        <div class="exam-inline-form" id="editExamForm-${examId}">
            <div class="exam-form-header">
                <div>
                    <h3>${exam.class}</h3>
                    <p style="margin: 4px 0 0 0; color: #666; font-size: 0.9rem;">${exam.type} Exam</p>
                </div>
                <div class="exam-form-actions">
                    <button class="simple-btn primary" onclick="saveEditedExam('${examId}')"><i class="fas fa-save"></i> Save Changes</button>
                </div>
            </div>
            <div class="exam-form-body">
                <div class="form-section" style="padding:0;">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Exam Name</label>
                            <input type="text" class="form-input" id="editName-${examId}" value="${exam.name}">
                        </div>
                        <div class="form-group">
                            <label>Exam ID</label>
                            <input type="text" class="form-input" id="editId-${examId}" value="${examId}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Exam Type</label>
                            <select class="form-select" id="editType-${examId}">
                                <option value="Tutorial" ${exam.type === 'tutorial' ? 'selected' : ''}>Tutorial</option>
                                <option value="Monthly" ${exam.type === 'monthly' ? 'selected' : ''}>Monthly</option>
                                <option value="Semester" ${exam.type === 'semester' ? 'selected' : ''}>Semester</option>
                                <option value="Final" ${exam.type === 'final' ? 'selected' : ''}>Final</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Grade</label>
                            <select class="form-select" id="editGrade-${examId}">
                                <option value="Grade 7" ${grade === 'Grade 7' ? 'selected' : ''}>Grade 7</option>
                                <option value="Grade 8" ${grade === 'Grade 8' ? 'selected' : ''}>Grade 8</option>
                                <option value="Grade 9" ${grade === 'Grade 9' ? 'selected' : ''}>Grade 9</option>
                                <option value="Grade 10" ${grade === 'Grade 10' ? 'selected' : ''}>Grade 10</option>
                                <option value="Grade 11" ${grade === 'Grade 11' ? 'selected' : ''}>Grade 11</option>
                                <option value="Grade 12" ${grade === 'Grade 12' ? 'selected' : ''}>Grade 12</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-select" id="editClass-${examId}">
                                <option value="A" ${classLetter === 'A' ? 'selected' : ''}>A</option>
                                <option value="B" ${classLetter === 'B' ? 'selected' : ''}>B</option>
                                <option value="C" ${classLetter === 'C' ? 'selected' : ''}>C</option>
                                <option value="D" ${classLetter === 'D' ? 'selected' : ''}>D</option>
                                <option value="E" ${classLetter === 'E' ? 'selected' : ''}>E</option>
                                <option value="F" ${classLetter === 'F' ? 'selected' : ''}>F</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="simple-table-container" style="margin-top:24px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th style="width:18%;">Subject</th>
                                <th style="width:10%;">Marks</th>
                                <th style="width:12%;">Date</th>
                                <th style="width:12%;">Start Time</th>
                                <th style="width:12%;">End Time</th>
                                <th style="width:13%;">Room</th>
                                <th style="width:15%;">Examiner</th>
                                <th style="width:8%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="editScheduleBody-${examId}">
                            ${scheduleRows}
                        </tbody>
                    </table>
                    <div style="margin-top: 12px;">
                        <button class="simple-btn secondary" onclick="addEditSubjectRow('${examId}')">
                            <i class="fas fa-plus"></i> Add Subject
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    container.innerHTML = formHTML;
}

function addEditSubjectRow(examId) {
    const tbody = document.getElementById(`editScheduleBody-${examId}`);
    if (!tbody) return;
    
    const roomOptions = availableRooms.map(room => `<option value="${room}">${room}</option>`).join('');
    const teacherOptions = availableTeachers.map(teacher => `<option value="${teacher.id}">${teacher.name}</option>`).join('');
    
    const rowIndex = tbody.querySelectorAll('tr').length;
    const row = document.createElement('tr');
    row.className = 'subject-row';
    row.dataset.index = rowIndex;
    row.innerHTML = `
        <td><input type="text" class="form-input" placeholder="Subject name"></td>
        <td><input type="number" class="form-input marks-input" value="100"></td>
        <td><input type="date" class="form-input"></td>
        <td><input type="time" class="form-input"></td>
        <td><input type="time" class="form-input"></td>
        <td>
            <select class="form-select room-select" style="width: 100%;">
                <option value="">Select Room</option>
                ${roomOptions}
            </select>
        </td>
        <td>
            <select class="form-select examiner-select" style="width: 100%;">
                <option value="">Select Examiner</option>
                ${teacherOptions}
            </select>
        </td>
        <td>
            <button class="simple-btn-icon" onclick="removeEditRow(this)" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    tbody.appendChild(row);
}

function removeEditRow(btn) {
    showConfirmDialog({
        title: 'Remove Subject',
        message: 'Are you sure you want to remove this subject from the exam?',
        confirmText: 'Remove',
        confirmIcon: 'fas fa-trash',
        onConfirm: () => {
            btn.closest('tr').remove();
        }
    });
}

function saveEditedExam(examId) {
    const form = document.getElementById(`editExamForm-${examId}`);
    if (!form) return;
    
    const examName = document.getElementById(`editName-${examId}`).value.trim();
    const examType = document.getElementById(`editType-${examId}`).value;
    const grade = document.getElementById(`editGrade-${examId}`).value;
    const classLetter = document.getElementById(`editClass-${examId}`).value;
    
    if (!examName) {
        showToast('Please enter Exam Name', 'warning');
        return;
    }
    
    // Validate all schedule fields
    const rows = form.querySelectorAll('#editScheduleBody-' + examId + ' tr');
    let allFilled = true;
    
    rows.forEach(row => {
        const subjectInput = row.querySelector('input[type="text"]');
        const dateInput = row.querySelector('input[type="date"]');
        const startTimeInput = row.querySelector('input[type="time"]:nth-of-type(1)');
        const endTimeInput = row.querySelector('input[type="time"]:nth-of-type(2)');
        const roomSelect = row.querySelector('.room-select');
        const examinerSelect = row.querySelector('.examiner-select');
        
        if (!subjectInput?.value || !dateInput?.value || !startTimeInput?.value || !endTimeInput?.value || !roomSelect?.value || !examinerSelect?.value) {
            allFilled = false;
        }
    });
    
    if (!allFilled) {
        showToast('Please fill in all fields for all subjects (Subject, Date, Times, Room, Examiner)', 'warning');
        return;
    }
    
    // Collect schedule data
    const schedule = [];
    rows.forEach(row => {
        const subjectInput = row.querySelector('input[type="text"]');
        const marksInput = row.querySelector('input[type="number"]');
        const dateInput = row.querySelector('input[type="date"]');
        const startTimeInput = row.querySelector('input[type="time"]:nth-of-type(1)');
        const endTimeInput = row.querySelector('input[type="time"]:nth-of-type(2)');
        const roomSelect = row.querySelector('.room-select');
        const examinerSelect = row.querySelector('.examiner-select');
        
        schedule.push({
            subject: subjectInput.value,
            marks: marksInput.value,
            date: dateInput.value,
            startTime: startTimeInput.value,
            endTime: endTimeInput.value,
            room: roomSelect.value,
            examiner: examinerSelect.value
        });
    });
    
    // Update exam in cached exams
    const examIndex = cachedExams.findIndex(e => e.id === examId);
    if (examIndex >= 0) {
        cachedExams[examIndex].name = examName;
        cachedExams[examIndex].type = examType.toLowerCase();
        cachedExams[examIndex].class = `${grade}-${classLetter}`;
    }
    
    showToast(`Exam "${examName}" (${examId}) updated successfully`, 'success');
    closeExamEditModal();
    loadExams();
}


</script>

<?php
$content = ob_get_clean();

// Detect portal from URL to use appropriate layout
$currentUri = $_SERVER['REQUEST_URI'] ?? '';
$layout = strpos($currentUri, '/staff/') !== false 
    ? 'staff-layout.php' 
    : 'admin-layout.php';

include __DIR__ . '/../components/' . $layout;
?>
