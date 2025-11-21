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
        <a href="/staff/create-exam" class="simple-btn"><i class="fas fa-plus"></i> Create New Exam</a>
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
    
    .simple-header .simple-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
const portalPrefix = '/staff';
const statusOrder = { 'Active': 1, 'Upcoming': 2, 'Completed': 3 };
const monthSequence = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const filterState = { type: 'all', class: 'all', status: 'all', month: 'all' };
let cachedExams = [];

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

function viewExam(examId) {
    window.location.href = `${portalPrefix}/exam-details?id=${examId}`;
}

function editExam(examId) {
    window.location.href = `${portalPrefix}/exam-edit?id=${examId}`;
}

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

async function loadExams() {
    try {
        const allExams = [
            { id: 'EX001', name: 'Mathematics Tutorial 1', type: 'tutorial', class: 'Grade 9-A', subjects: 'Mathematics', status: 'Active', month: 'September' },
            { id: 'EX002', name: 'Mid-term Exam', type: 'monthly', class: 'Grade 10-B', subjects: '6 subjects', status: 'Active', month: 'September' },
            { id: 'EX003', name: 'Science Tutorial', type: 'tutorial', class: 'Grade 9-B', subjects: 'Science', status: 'Active', month: 'October' },
            { id: 'EX004', name: 'Chemistry Lab Test', type: 'tutorial', class: 'Grade 11-A', subjects: 'Chemistry', status: 'Active', month: 'October' },
            { id: 'EX008', name: 'English Monthly Test', type: 'monthly', class: 'Grade 11-A', subjects: 'English', status: 'Active', month: 'November' },
            { id: 'EX009', name: 'Physics Semester Exam', type: 'semester', class: 'Grade 12-A', subjects: '5 subjects', status: 'Active', month: 'December' },
            { id: 'EX010', name: 'Quarterly Assessment', type: 'semester', class: 'Grade 8-A', subjects: '5 subjects', status: 'Upcoming', month: 'December' },
            { id: 'EX011', name: 'Computer Science Practical', type: 'tutorial', class: 'Grade 12-B', subjects: 'Computer Science', status: 'Upcoming', month: 'January' },
            { id: 'EX005', name: 'Final Exam - Science', type: 'final', class: 'Grade 12-A', subjects: '7 subjects', status: 'Completed', month: 'March' },
            { id: 'EX006', name: 'Mid-Semester Assessment', type: 'semester', class: 'Grade 11-B', subjects: '6 subjects', status: 'Completed', month: 'May' },
            { id: 'EX007', name: 'Monthly Test - Math', type: 'monthly', class: 'Grade 9-A', subjects: 'Mathematics', status: 'Completed', month: 'August' }
        ];

        cachedExams = sortExams(allExams);
        populateDynamicFilters(cachedExams);
        updateStatusCards(cachedExams);
        applyFilters();
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
});
</script>
<?php
$content = ob_get_clean();

include __DIR__ . '/../components/staff-layout.php';
?>
