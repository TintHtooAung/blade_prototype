<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Results';
$pageIcon = 'fas fa-chart-line';
$pageHeading = 'Exam Results';
$activePage = 'exam-results';

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

<!-- Exam Results Section -->
<div class="simple-section">
    <div class="simple-header">
        <h3>My Exam Results</h3>
    </div>

    <div class="simple-table-container">
        <table class="basic-table responsive-table" id="examResultsTable">
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

.status-badge.ended {
    background: #e8f5e9;
    color: #2e7d32;
}

.status-badge.active {
    background: #e3f2fd;
    color: #1976d2;
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
// Exam Results Functions - Teacher View Only

/**
 * View exam details
 * Backend: GET /api/exams/{examId}
 */
function viewExam(examId) {
    // Navigate to exam details page
    window.location.href = `/teacher/exam-details?id=${examId}`;
}

/**
 * Load and combine all exams from backend, sorted by status
 * Backend: GET /api/exams
 */
async function loadExams() {
    // For now, use mock data - in real app this would come from backend
    const allExams = [
        // Active Exams
        {
            id: 'EX001',
            name: 'Mathematics Tutorial 1',
            type: 'tutorial',
            class: 'Grade 9-A',
            subjects: 'Mathematics',
            status: 'Active'
        },
        {
            id: 'EX002',
            name: 'Mid-term Exam',
            type: 'monthly',
            class: 'Grade 10-B',
            subjects: '6 subjects',
            status: 'Active'
        },
        {
            id: 'EX003',
            name: 'Science Tutorial',
            type: 'tutorial',
            class: 'Grade 9-B',
            subjects: 'Science',
            status: 'Active'
        },
        {
            id: 'EX004',
            name: 'Chemistry Lab Test',
            type: 'tutorial',
            class: 'Grade 11-A',
            subjects: 'Chemistry',
            status: 'Active'
        },
        {
            id: 'EX008',
            name: 'English Monthly Test',
            type: 'monthly',
            class: 'Grade 11-A',
            subjects: 'English',
            status: 'Active'
        },
        {
            id: 'EX009',
            name: 'Physics Semester Exam',
            type: 'semester',
            class: 'Grade 12-A',
            subjects: '5 subjects',
            status: 'Active'
        },

        // Ended Exams
        {
            id: 'EX005',
            name: 'Final Exam - Science',
            type: 'final',
            class: 'Grade 12-A',
            subjects: '7 subjects',
            status: 'Ended'
        },
        {
            id: 'EX006',
            name: 'Mathematics Monthly Test',
            type: 'monthly',
            class: 'Grade 10-A',
            subjects: 'Mathematics',
            status: 'Ended'
        },
        {
            id: 'EX007',
            name: 'Physics Tutorial 2',
            type: 'tutorial',
            class: 'Grade 11-B',
            subjects: 'Physics',
            status: 'Ended'
        },
        {
            id: 'EX010',
            name: 'Chemistry Semester Exam',
            type: 'semester',
            class: 'Grade 11-A',
            subjects: 'Chemistry',
            status: 'Ended'
        }
    ];

    // Sort exams: Active first, then Ended
    const sortedExams = allExams.sort((a, b) => {
        if (a.status === 'Active' && b.status === 'Ended') return -1;
        if (a.status === 'Ended' && b.status === 'Active') return 1;
        return 0;
    });

    renderAllExams(sortedExams);
}

/**
 * Render all exams in the table
 * @param {Array} exams - Array of all exam objects
 */
function renderAllExams(exams) {
    const tbody = document.getElementById('allExamsBody');
    if (!tbody) return;
    
    tbody.innerHTML = exams.map(exam => `
        <tr>
            <td data-label="Exam ID"><strong>${exam.id}</strong></td>
            <td data-label="Exam Name">${exam.name}</td>
            <td data-label="Type"><span class="badge-type ${exam.type}">${exam.type.charAt(0).toUpperCase() + exam.type.slice(1)}</span></td>
            <td data-label="Class">${exam.class}</td>
            <td data-label="Subject(s)">${exam.subjects}</td>
            <td data-label="Status"><span class="status-badge ${exam.status.toLowerCase()}">${exam.status}</span></td>
            <td data-label="Actions" class="actions-cell">
                <button class="simple-btn-icon" onclick="viewExam('${exam.id}')" title="View Results">
                    <i class="fas fa-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', loadExams);
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/teacher-layout.php';
?>