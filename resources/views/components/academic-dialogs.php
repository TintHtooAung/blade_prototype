<?php
/**
 * Academic Management Dialogs Component
 * Contains all dialog HTML for academic entities
 */
?>

<!-- Department Dialog -->
<div id="departmentDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-building"></i> <span id="departmentDialogTitle">Add Department</span></h3>
            <button class="receipt-close" onclick="closeDepartmentDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="departmentForm">
                <input type="hidden" id="departmentId">
                <div class="form-row">
                    <div class="form-group">
                        <label>Department Name *</label>
                        <input type="text" class="form-input" id="departmentName" placeholder="e.g., Computer Science" required>
                    </div>
                    <div class="form-group">
                        <label>Department Code *</label>
                        <input type="text" class="form-input" id="departmentCode" placeholder="e.g., CS" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Department Head *</label>
                        <input type="text" class="form-input" id="departmentHead" placeholder="e.g., Dr. John Smith" required>
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeDepartmentDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveDepartment()">
                <i class="fas fa-save"></i> Save Department
            </button>
        </div>
    </div>
</div>

<!-- Batch Dialog -->
<div id="batchDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-folder"></i> <span id="batchDialogTitle">Add Batch</span></h3>
            <button class="receipt-close" onclick="closeBatchDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="batchForm">
                <input type="hidden" id="batchId">
                <div class="form-row">
                    <div class="form-group">
                        <label>Batch Name *</label>
                        <input type="text" class="form-input" id="batchName" placeholder="e.g., 2024-2025" required>
                    </div>
                    <div class="form-group">
                        <label>Year *</label>
                        <input type="number" class="form-input" id="batchYear" placeholder="e.g., 2024" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Department *</label>
                        <select class="form-select" id="batchDepartment" required>
                            <option value="">Select Department</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="ICT">ICT</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeBatchDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveBatch()">
                <i class="fas fa-save"></i> Save Batch
            </button>
        </div>
    </div>
</div>

<!-- Grade Dialog -->
<div id="gradeDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-layer-group"></i> <span id="gradeDialogTitle">Add Grade</span></h3>
            <button class="receipt-close" onclick="closeGradeDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="gradeForm">
                <input type="hidden" id="gradeId">
                <div class="form-row">
                    <div class="form-group">
                        <label>Grade Name *</label>
                        <input type="text" class="form-input" id="gradeName" placeholder="e.g., Grade 7" required>
                    </div>
                    <div class="form-group">
                        <label>Level *</label>
                        <input type="number" class="form-input" id="gradeLevel" placeholder="e.g., 7" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Category *</label>
                        <select class="form-select" id="gradeCategory" required>
                            <option value="">Select Category</option>
                            <option value="Primary">Primary</option>
                            <option value="Middle">Middle</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeGradeDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveGrade()">
                <i class="fas fa-save"></i> Save Grade
            </button>
        </div>
    </div>
</div>

<!-- Room Dialog -->
<div id="roomDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-door-closed"></i> <span id="roomDialogTitle">Add Room</span></h3>
            <button class="receipt-close" onclick="closeRoomDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="roomForm">
                <input type="hidden" id="roomId">
                <div class="form-row">
                    <div class="form-group">
                        <label>Room Number *</label>
                        <input type="text" class="form-input" id="roomNumber" placeholder="e.g., A101" required>
                    </div>
                    <div class="form-group">
                        <label>Type *</label>
                        <select class="form-select" id="roomType" required>
                            <option value="">Select Type</option>
                            <option value="Classroom">Classroom</option>
                            <option value="Laboratory">Laboratory</option>
                            <option value="Library">Library</option>
                            <option value="Auditorium">Auditorium</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Capacity *</label>
                        <input type="number" class="form-input" id="roomCapacity" placeholder="e.g., 30" required>
                    </div>
                    <div class="form-group">
                        <label>Status *</label>
                        <select class="form-select" id="roomStatus" required>
                            <option value="Available">Available</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeRoomDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveRoom()">
                <i class="fas fa-save"></i> Save Room
            </button>
        </div>
    </div>
</div>

<!-- Class Dialog -->
<div id="classDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-door-open"></i> <span id="classDialogTitle">Add Class</span></h3>
            <button class="receipt-close" onclick="closeClassDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="classForm">
                <input type="hidden" id="classId">
                <div class="form-row">
                    <div class="form-group">
                        <label>Class Name *</label>
                        <input type="text" class="form-input" id="className" placeholder="e.g., Grade 7-A" required>
                    </div>
                    <div class="form-group">
                        <label>Grade *</label>
                        <select class="form-select" id="classGrade" required>
                            <option value="">Select Grade</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Section *</label>
                        <input type="text" class="form-input" id="classSection" placeholder="e.g., A" required>
                    </div>
                    <div class="form-group">
                        <label>Students Count</label>
                        <input type="number" class="form-input" id="classStudents" placeholder="e.g., 30">
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeClassDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveClass()">
                <i class="fas fa-save"></i> Save Class
            </button>
        </div>
    </div>
</div>

<!-- Subject Dialog -->
<div id="subjectDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-book"></i> <span id="subjectDialogTitle">Add Subject</span></h3>
            <button class="receipt-close" onclick="closeSubjectDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="subjectForm">
                <input type="hidden" id="subjectId">
                <div class="form-row">
                    <div class="form-group">
                        <label>Subject Name *</label>
                        <input type="text" class="form-input" id="subjectName" placeholder="e.g., Mathematics" required>
                    </div>
                    <div class="form-group">
                        <label>Subject Code *</label>
                        <input type="text" class="form-input" id="subjectCode" placeholder="e.g., MATH" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Credits *</label>
                        <input type="number" class="form-input" id="subjectCredits" placeholder="e.g., 4" required>
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select class="form-select" id="subjectCategory" required>
                            <option value="">Select Category</option>
                            <option value="Core">Core</option>
                            <option value="Elective">Elective</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeSubjectDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveSubject()">
                <i class="fas fa-save"></i> Save Subject
            </button>
        </div>
    </div>
</div>
