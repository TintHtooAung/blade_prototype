<?php
$pageTitle = 'Smart Campus Nova Hub - Create New Exam';
$pageIcon = 'fas fa-plus-circle';
$pageHeading = 'Create New Exam';
$activePage = 'exam-database';

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

<!-- Create Exam Form -->
<div class="simple-section">
    <div class="exam-form-container">
        <form class="exam-form" id="createExamForm">
            <!-- Exam Type Selection -->
            <div class="form-section">
                <div class="form-section-header">
                    <h3><i class="fas fa-clipboard-list"></i> Exam Type</h3>
                </div>
                <div class="form-group">
                    <label for="examType">Select Exam Type *</label>
                    <select id="examType" name="examType" required class="form-select">
                        <option value="">Choose exam type...</option>
                        <option value="tutorial">Tutorial (25 marks)</option>
                        <option value="monthly">Monthly Test (100 marks)</option>
                        <option value="semester">Semester Exam (100 marks)</option>
                        <option value="final">Final Exam (100 marks)</option>
                    </select>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="form-section">
                <div class="form-section-header">
                    <h3><i class="fas fa-info-circle"></i> Basic Information</h3>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="examName">Exam Name *</label>
                        <input type="text" id="examName" name="examName" required class="form-input" placeholder="Enter exam name">
                    </div>
                    <div class="form-group">
                        <label for="examId">Exam ID *</label>
                        <input type="text" id="examId" name="examId" required class="form-input" placeholder="e.g., EX001">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="grade">Grade *</label>
                        <select id="grade" name="grade" required class="form-select">
                            <option value="">Select grade...</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class *</label>
                        <select id="class" name="class" required class="form-select">
                            <option value="">Select class...</option>
                            <option value="Class A">Class A</option>
                            <option value="Class B">Class B</option>
                            <option value="Class C">Class C</option>
                            <option value="Class D">Class D</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Subject Selection -->
            <div class="form-section" id="subjectSection">
                <div class="form-section-header">
                    <h3><i class="fas fa-book"></i> Subject Selection</h3>
                </div>
                <div class="form-group">
                    <label>Select Subjects *</label>
                    <div class="subject-selection">
                        <div class="subject-option">
                            <input type="checkbox" id="math" name="subjects[]" value="Mathematics">
                            <label for="math">Mathematics</label>
                        </div>
                        <div class="subject-option">
                            <input type="checkbox" id="english" name="subjects[]" value="English">
                            <label for="english">English</label>
                        </div>
                        <div class="subject-option">
                            <input type="checkbox" id="science" name="subjects[]" value="Science">
                            <label for="science">Science</label>
                        </div>
                        <div class="subject-option">
                            <input type="checkbox" id="myanmar" name="subjects[]" value="Myanmar">
                            <label for="myanmar">Myanmar</label>
                        </div>
                        <div class="subject-option">
                            <input type="checkbox" id="history" name="subjects[]" value="History">
                            <label for="history">History</label>
                        </div>
                        <div class="subject-option">
                            <input type="checkbox" id="geography" name="subjects[]" value="Geography">
                            <label for="geography">Geography</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exam Details -->
            <div class="form-section">
                <div class="form-section-header">
                    <h3><i class="fas fa-cog"></i> Exam Details</h3>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="totalMarks">Total Marks *</label>
                        <input type="number" id="totalMarks" name="totalMarks" required class="form-input" placeholder="Enter total marks">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration (minutes) *</label>
                        <input type="number" id="duration" name="duration" required class="form-input" placeholder="Enter duration">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="examDate">Exam Date *</label>
                        <input type="date" id="examDate" name="examDate" required class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="startTime">Start Time *</label>
                        <input type="time" id="startTime" name="startTime" required class="form-input">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="button" class="simple-btn secondary" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="simple-btn primary">Create Exam</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const examTypeSelect = document.getElementById('examType');
    const totalMarksInput = document.getElementById('totalMarks');
    const subjectSection = document.getElementById('subjectSection');
    
    // Auto-fill total marks based on exam type
    examTypeSelect.addEventListener('change', function() {
        const selectedType = this.value;
        const subjectCheckboxes = document.querySelectorAll('input[name="subjects[]"]');
        
        // Reset form
        totalMarksInput.value = '';
        subjectCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        
        // Set default values based on exam type
        switch(selectedType) {
            case 'tutorial':
                totalMarksInput.value = '25';
                // Tutorial exams are usually single subject
                break;
            case 'monthly':
            case 'semester':
            case 'final':
                totalMarksInput.value = '100';
                // Multi-subject exams - select all subjects by default
                subjectCheckboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
                break;
        }
    });
    
    // Form submission
    document.getElementById('createExamForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const selectedSubjects = Array.from(document.querySelectorAll('input[name="subjects[]"]:checked')).map(cb => cb.value);
        
        // Validation
        if (selectedSubjects.length === 0) {
            alert('Please select at least one subject.');
            return;
        }
        
        // Show success message
        alert('Exam created successfully!');
        
        // Redirect to exam database
        window.location.href = '/admin/exam-database';
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
