<?php
$pageTitle = 'Smart Campus Nova Hub - Exam Results';
$pageIcon = 'fas fa-chart-bar';
$pageHeading = 'Exam Results';
$activePage = 'exams';

ob_start();
?>

<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/exam-database" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Exam Database
    </a>
</div>

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
    <div class="exam-details-header">
        <div class="exam-info-card">
            <div class="exam-title-section">
                <h3>Final Exam - Science</h3>
                <span class="exam-id">EX005</span>
            </div>
            <div class="exam-badges">
                <span class="badge tutorial-badge">Final</span>
                <span class="badge completed-badge">Completed</span>
                <span class="badge grade-badge">Grade 12-A</span>
            </div>
        </div>
    </div>


    <!-- Ranked Student Results -->
    <div class="exam-detail-card">
        <div class="exam-detail-header">
            <h4><i class="fas fa-trophy"></i> Ranked Results</h4>
            <div style="display: flex; gap: 12px;">
                <button class="simple-btn" onclick="exportResults()"><i class="fas fa-file-excel"></i> Export Excel</button>
                <button class="simple-btn" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
        <div class="exam-detail-content">
            <div class="simple-table-container">
                <table class="basic-table responsive-table" id="examResultsTableEl">
                    <thead id="examResultsHead"></thead>
                    <tbody id="examResultsBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<style>
/* Rank Badges */
.rank-badge {
    display: inline-block;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    text-align: center;
    line-height: 32px;
    font-weight: 700;
    font-size: 0.85rem;
}

.rank-badge.gold {
    background: #ffd700;
    color: #fff;
}

.rank-badge.silver {
    background: #c0c0c0;
    color: #fff;
}

.rank-badge.bronze {
    background: #cd7f32;
    color: #fff;
}

/* Subject Marks */
.subject-marks {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.85rem;
    font-weight: 600;
    text-align: center;
    min-width: 40px;
}

.subject-marks.distinction {
    background: #e8f5e9;
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}

.subject-marks:not(.distinction) {
    background: #f5f5f5;
    color: #666;
    border: 1px solid #ddd;
}

/* Marks Highlighting */
.marks-highlight {
    font-weight: 600;
    font-size: 0.9rem;
    color: #333;
}

.completed-badge {
    background: #e8f5e9;
    color: #2e7d32;
}

</style>

<script>
function exportResults() {
    // Export ranked results to Excel
    // Backend: GET /api/exams/{examId}/export
    alert('Exporting ranked results to Excel...');
}


/**
 * Load exam results from backend
 * Backend: GET /api/exams/{examId}/results
 */
document.addEventListener('DOMContentLoaded', function(){
    // Determine exam type (mock): if query has type=tutorial -> single subject, else multi
    const params = new URLSearchParams(window.location.search);
    const type = (params.get('type')||'final').toLowerCase();

    // Mock dataset for demo
    const tutorialData = [
        { rank: 1, roll: '001', name: 'Aung Kyaw Min', subject: 'Mathematics', marks: 98, total: 98, grade: 'A+' },
        { rank: 2, roll: '002', name: 'Su Myat Noe', subject: 'Mathematics', marks: 95, total: 95, grade: 'A+' },
        { rank: 3, roll: '003', name: 'Thant Zin Oo', subject: 'Mathematics', marks: 92, total: 92, grade: 'A+' }
    ];
    const multiData = [
        { rank: 1, roll: '001', name: 'Aung Kyaw Min', math: 98, phys: 96, chem: 97, bio: 95, eng: 94, myan: 92, total: 572 },
        { rank: 2, roll: '002', name: 'Su Myat Noe', math: 95, phys: 93, chem: 94, bio: 0, eng: 92, myan: 90, total: 464 },
        { rank: 3, roll: '003', name: 'Thant Zin Oo', math: 93, phys: 91, chem: 92, bio: 89, eng: 90, myan: 0, total: 455 }
    ];

    const head = document.getElementById('examResultsHead');
    const body = document.getElementById('examResultsBody');

    if (type === 'tutorial') {
        head.innerHTML = `
            <tr>
                <th>Rank</th>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Total</th>
                <th>Grade</th>
            </tr>`;
        body.innerHTML = tutorialData.map(r => `
            <tr>
                <td data-label="Rank">${r.rank <= 3 ? `<span class=\"rank-badge ${r.rank===1?'gold':r.rank===2?'silver':'bronze'}\">${r.rank}</span>` : r.rank}</td>
                <td data-label="Roll No"><strong>${r.roll}</strong></td>
                <td data-label="Student Name"><strong>${r.name}</strong></td>
                <td data-label="Subject">${r.subject}</td>
                <td data-label="Marks"><span class="subject-marks ${r.marks>=80?'distinction':''}">${r.marks}</span></td>
                <td data-label="Total"><strong>${r.total}</strong></td>
                <td data-label="Grade"><span class="status-badge ${r.grade==='A+'?'paid':r.grade==='A'?'active':'draft'}">${r.grade}</span></td>
            </tr>
        `).join('');
    } else {
        head.innerHTML = `
            <tr>
                <th>Rank</th>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Math</th>
                <th>Phys</th>
                <th>Chem</th>
                <th>Bio</th>
                <th>Eng</th>
                <th>Myan</th>
                <th>Total</th>
            </tr>`;
        body.innerHTML = multiData.map(r => `
            <tr>
                <td data-label="Rank">${r.rank <= 3 ? `<span class=\"rank-badge ${r.rank===1?'gold':r.rank===2?'silver':'bronze'}\">${r.rank}</span>` : r.rank}</td>
                <td data-label="Roll No"><strong>${r.roll}</strong></td>
                <td data-label="Student Name"><strong>${r.name}</strong></td>
                <td data-label="Math">${r.math>0?`<span class=\"subject-marks ${r.math>=80?'distinction':''}\">${r.math}</span>`:'-'}</td>
                <td data-label="Phys">${r.phys>0?`<span class=\"subject-marks ${r.phys>=80?'distinction':''}\">${r.phys}</span>`:'-'}</td>
                <td data-label="Chem">${r.chem>0?`<span class=\"subject-marks ${r.chem>=80?'distinction':''}\">${r.chem}</span>`:'-'}</td>
                <td data-label="Bio">${r.bio>0?`<span class=\"subject-marks ${r.bio>=80?'distinction':''}\">${r.bio}</span>`:'-'}</td>
                <td data-label="Eng">${r.eng>0?`<span class=\"subject-marks ${r.eng>=80?'distinction':''}\">${r.eng}</span>`:'-'}</td>
                <td data-label="Myan">${r.myan>0?`<span class=\"subject-marks ${r.myan>=80?'distinction':''}\">${r.myan}</span>`:'-'}</td>
                <td data-label="Total"><span class="marks-highlight">${r.total}</span></td>
            </tr>
        `).join('');
    }
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

