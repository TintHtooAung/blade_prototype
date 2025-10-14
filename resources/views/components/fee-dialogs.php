<!-- Academic Year Configuration Dialog -->
<div id="academicYearDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-calendar-alt"></i> Configure Default Academic Year</h3>
            <button class="receipt-close" onclick="closeAcademicYearDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="academicYearForm">
                <div class="form-group">
                    <label for="academicYear">Academic Year *</label>
                    <input type="text" id="academicYear" class="form-control" placeholder="2024-2025" required>
                </div>
                
                <div class="form-group">
                    <label for="startMonth">Start Month *</label>
                    <select id="startMonth" class="form-control" required>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="startYear">Start Year *</label>
                    <input type="number" id="startYear" class="form-control" placeholder="2024" min="2020" max="2030" required>
                </div>
                
                <div class="form-group">
                    <label for="endMonth">End Month *</label>
                    <select id="endMonth" class="form-control" required>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="endYear">End Year *</label>
                    <input type="number" id="endYear" class="form-control" placeholder="2025" min="2020" max="2030" required>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeAcademicYearDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveAcademicYear()">
                <i class="fas fa-save"></i> Save Configuration
            </button>
        </div>
    </div>
</div>

<!-- School Fees Configuration Dialog -->
<div id="schoolFeesDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 900px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-dollar-sign"></i> Configure School Fees & Academic Periods</h3>
            <button class="receipt-close" onclick="closeSchoolFeesDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <div id="schoolFeesFormContainer">
                <!-- Dynamic form fields will be generated here -->
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeSchoolFeesDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveSchoolFees()">
                <i class="fas fa-save"></i> Save Configuration
            </button>
        </div>
    </div>
</div>

<!-- Add/Edit Additional Fee Dialog -->
<div id="feeDialog" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 600px;">
        <div class="receipt-dialog-header">
            <h3><i class="fas fa-file-invoice-dollar"></i> <span id="feeDialogTitle">Add Fee</span></h3>
            <button class="receipt-close" onclick="closeFeeDialog()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="receipt-dialog-body">
            <form id="feeForm">
                <input type="hidden" id="feeId">
                
                <div class="form-group">
                    <label for="feeType">Fee Type *</label>
                    <select id="feeType" class="form-control" required>
                        <option value="onetime">One-Time Fee</option>
                        <option value="special">Special Event</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="feeName">Fee Name *</label>
                    <input type="text" id="feeName" class="form-control" placeholder="e.g., Registration Fee, Sports Day" required>
                </div>
                
                <div class="form-group">
                    <label for="feeAmount">Amount (USD) *</label>
                    <input type="number" id="feeAmount" class="form-control" placeholder="50.00" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="chargeDate">Date *</label>
                    <input type="date" id="chargeDate" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="feeDescription">Description</label>
                    <textarea id="feeDescription" class="form-control" rows="3" placeholder="Describe what this fee covers"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="feeTargetType">Target Type *</label>
                    <select id="feeTargetType" class="form-control" required onchange="updateTargetOptions()">
                        <option value="all">All Students</option>
                        <option value="grades">Specific Grades</option>
                        <option value="classes">Specific Classes</option>
                        <option value="students">Specific Students</option>
                    </select>
                </div>
                
                <div id="targetGradesSection" class="form-group" style="display: none;">
                    <label>Select Grades</label>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 8px;">
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="Grade 7" style="margin-right: 6px;"> Grade 7
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="Grade 8" style="margin-right: 6px;"> Grade 8
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="Grade 9" style="margin-right: 6px;"> Grade 9
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="Grade 10" style="margin-right: 6px;"> Grade 10
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="Grade 11" style="margin-right: 6px;"> Grade 11
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="Grade 12" style="margin-right: 6px;"> Grade 12
                        </label>
                    </div>
                </div>
                
                <div id="targetClassesSection" class="form-group" style="display: none;">
                    <label>Select Classes</label>
                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-top: 8px;">
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="7A" style="margin-right: 6px;"> 7A
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="7B" style="margin-right: 6px;"> 7B
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="8A" style="margin-right: 6px;"> 8A
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="8B" style="margin-right: 6px;"> 8B
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="9A" style="margin-right: 6px;"> 9A
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="9B" style="margin-right: 6px;"> 9B
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="10A" style="margin-right: 6px;"> 10A
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="10B" style="margin-right: 6px;"> 10B
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="11A" style="margin-right: 6px;"> 11A
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="11B" style="margin-right: 6px;"> 11B
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="12A" style="margin-right: 6px;"> 12A
                        </label>
                        <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" value="12B" style="margin-right: 6px;"> 12B
                        </label>
                    </div>
                </div>
                
                <div id="targetStudentsSection" class="form-group" style="display: none;">
                    <label>Select Students</label>
                    <div style="max-height: 200px; overflow-y: auto; border: 1px solid #d1d5db; border-radius: 6px; padding: 12px; margin-top: 8px;">
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;">
                            <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                                <input type="checkbox" value="STU001" style="margin-right: 6px;"> John Smith (7A)
                            </label>
                            <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                                <input type="checkbox" value="STU002" style="margin-right: 6px;"> Sarah Johnson (7A)
                            </label>
                            <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                                <input type="checkbox" value="STU003" style="margin-right: 6px;"> Mike Chen (7B)
                            </label>
                            <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                                <input type="checkbox" value="STU004" style="margin-right: 6px;"> Emma Davis (8A)
                            </label>
                            <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                                <input type="checkbox" value="STU005" style="margin-right: 6px;"> Alex Wilson (8B)
                            </label>
                            <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                                <input type="checkbox" value="STU006" style="margin-right: 6px;"> Lisa Brown (9A)
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closeFeeDialog()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveFee()">
                <i class="fas fa-save"></i> Save Fee
            </button>
        </div>
    </div>
</div>
