<?php
$pageTitle = 'Smart Campus Nova Hub - Finance Setup';
$pageIcon = 'fas fa-dollar-sign';
$pageHeading = 'Finance Setup';
$activePage = 'finance-setup';

ob_start();
?>
<!-- Welcome Header for First-Time Setup -->
<div class="setup-welcome-header" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border-radius: 12px; padding: 32px; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.2);">
    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="width: 64px; height: 64px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px;">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div style="flex: 1;">
            <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color: #fff;">Welcome to Finance Setup</h2>
            <p style="margin: 0; font-size: 16px; color: rgba(255, 255, 255, 0.9);">Configure fee structures and expense categories for your finance management system.</p>
        </div>
    </div>
</div>

<!-- Finance Setup Wizard -->
<div class="wizard-container" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid #e5e7eb;">
    <!-- Wizard Progress Bar -->
    <div class="wizard-progress-bar">
        <div class="wizard-steps-container">
            <div class="wizard-step-item active" data-step="1" onclick="goToSetupStep(1)">
                <div class="step-indicator">1</div>
                <span class="step-label">Fee Structure</span>
            </div>
            <div class="wizard-step-item" data-step="2" onclick="goToSetupStep(2)">
                <div class="step-indicator">2</div>
                <span class="step-label">Expense Categories</span>
            </div>
        </div>
    </div>

    <div class="wizard-content-wrapper" style="display: flex; min-height: 600px;">
        <div class="wizard-main-content" style="flex: 1; overflow-y: auto; padding: 32px;">
            <div style="margin-bottom: 24px;">
                <h2 style="margin: 0; font-size: 28px; font-weight: 700; color: #111827;">Finance Setup Wizard</h2>
                <p style="margin: 8px 0 0 0; color: #6b7280; font-size: 14px;">Configure your finance management system step by step</p>
            </div>
            <div class="form-section" style="padding:0;">
                <!-- Step 1: Fee Structure -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-graduation-cap" style="color:#8b5cf6; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#7c3aed;">Tuition Fee by Grade</h4>
                    </div>
                    
                    <!-- Tuition Fee by Grade Configuration -->
                    <div style="padding: 20px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <p style="margin: 0 0 16px 0; color: #6b7280; font-size: 13px;">
                            Configure monthly tuition fees for each grade level
                        </p>
                        
                        <div id="tuitionFeeGradeList" style="display: flex; flex-direction: column; gap: 12px;">
                            <!-- Tuition fee grade items will be added here -->
                        </div>
                    </div>
                    
                    <div style="background: #f5f3ff; border-left: 4px solid #8b5cf6; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #7c3aed; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Set the monthly tuition fee for each grade. These fees will be used when generating invoices.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Expense Categories -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-list" style="color:#8b5cf6; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#7c3aed;">Expense Categories</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Default Expense Categories</label>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="salaries" checked>
                                    <span>Salaries</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="utilities" checked>
                                    <span>Utilities</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="maintenance" checked>
                                    <span>Maintenance</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="supplies" checked>
                                    <span>Supplies</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="equipment" checked>
                                    <span>Equipment</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="transport" checked>
                                    <span>Transport</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="marketing">
                                    <span>Marketing</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="expense-category-checkbox" value="training">
                                    <span>Training</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top: 16px;">
                        <div class="form-group" style="flex:1;">
                            <label for="customExpenseCategories">Custom Categories (comma-separated)</label>
                            <input type="text" id="customExpenseCategories" class="form-input" placeholder="e.g., Insurance, Legal, Consulting">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Add additional expense categories if needed</small>
                        </div>
                    </div>
                    <div style="background: #f5f3ff; border-left: 4px solid #8b5cf6; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #7c3aed; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Select the expense categories that will be available when recording expenses. You can add custom categories as needed.
                        </p>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- Sidebar with Tips -->
        <div class="wizard-sidebar">
            <div class="wizard-sidebar-content">
                <h3 class="sidebar-title">Setup Guide</h3>
                <ul class="sidebar-tips">
                    <li>Complete each step to configure your finance management system</li>
                    <li>You can modify these settings later from the settings page</li>
                    <li>All configurations can be edited after setup</li>
                    <li>Return to this page anytime to reconfigure</li>
                </ul>
                <div class="sidebar-help">
                    <i class="fas fa-info-circle"></i>
                    <span>Need help? Contact the admin support team</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 20px 32px; background: #f9fafb; display: flex; justify-content: flex-end; align-items: center; border-radius: 0 0 12px 12px;">
        <div style="display: flex; gap: 12px;">
            <button id="setupBackBtn" class="wizard-btn-secondary" onclick="goToPreviousSetupStep()" style="display:none;">
                <i class="fas fa-arrow-left"></i> Previous
            </button>
            <button id="setupNextBtn" class="wizard-btn-primary" onclick="handleNextSetupStep()">
                Next <i class="fas fa-arrow-right"></i>
            </button>
            <button id="setupCompleteBtn" class="wizard-btn-primary" onclick="completeSetup()" style="display:none;">
                <i class="fas fa-check"></i> Complete Setup
            </button>
        </div>
    </div>
</div>

<script>
let currentSetupStep = 1;
const totalSetupSteps = 2;

// Load existing setup data from localStorage
function loadExistingSetupData() {
    try {
        const setupDataStr = localStorage.getItem('financeSetup');
        if (!setupDataStr) {
            return false;
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Load fee structure
        if (setupData.feeStructure) {
            // Tuition fee grades will be loaded when step 1 is shown
        }
        
        // Load expense categories
        if (setupData.expenseCategories && Array.isArray(setupData.expenseCategories)) {
            document.querySelectorAll('.expense-category-checkbox').forEach(cb => {
                cb.checked = setupData.expenseCategories.includes(cb.value);
            });
        }
        
        if (setupData.customExpenseCategories) {
            document.getElementById('customExpenseCategories').value = setupData.customExpenseCategories;
        }
        
        return true;
    } catch (e) {
        console.error('Error loading existing setup data:', e);
        return false;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    loadExistingSetupData();
    goToSetupStep(1);
});

function goToSetupStep(step) {
    currentSetupStep = step;
    
    for (let i = 1; i <= totalSetupSteps; i++) {
        const stepEl = document.getElementById('setup-step-' + i);
        if (stepEl) {
            stepEl.style.display = 'none';
        }
    }
    
    const currentStepEl = document.getElementById('setup-step-' + step);
    if (currentStepEl) {
        currentStepEl.style.display = 'block';
    }
    
    // Initialize tuition fee grades when step 1 (Fee Structure) is shown
    if (step === 1) {
        const container = document.getElementById('tuitionFeeGradeList');
        if (container) {
            // Clear existing items first
            container.innerHTML = '';
            
            // Check if we have saved data, otherwise add default grades
            const setupDataStr = localStorage.getItem('financeSetup');
            if (setupDataStr) {
                try {
                    const setupData = JSON.parse(setupDataStr);
                    if (setupData.feeStructure && setupData.feeStructure.tuitionFeeGrades && setupData.feeStructure.tuitionFeeGrades.length > 0) {
                        setupData.feeStructure.tuitionFeeGrades.forEach(grade => {
                            addTuitionFeeGradeItem(grade);
                        });
                    } else {
                        // Add default grades if no saved data
                        const defaultGrades = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
                        defaultGrades.forEach(gradeName => {
                            addTuitionFeeGradeItem({
                                gradeName: gradeName,
                                pricePerMonth: '',
                                id: 'grade-' + Date.now() + '-' + Math.random()
                            });
                        });
                    }
                } catch (e) {
                    // Add default grades on error
                    const defaultGrades = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
                    defaultGrades.forEach(gradeName => {
                        addTuitionFeeGradeItem({
                            gradeName: gradeName,
                            pricePerMonth: '',
                            id: 'grade-' + Date.now() + '-' + Math.random()
                        });
                    });
                }
            } else {
                // Add default grades if no saved data
                const defaultGrades = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
                defaultGrades.forEach(gradeName => {
                    addTuitionFeeGradeItem({
                        gradeName: gradeName,
                        pricePerMonth: '',
                        id: 'grade-' + Date.now() + '-' + Math.random()
                    });
                });
            }
        }
    }
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    const stepItems = document.querySelectorAll('.wizard-step-item');
    stepItems.forEach((item, index) => {
        if (index + 1 <= step) {
            item.classList.add('active');
            if (index + 1 < step) {
                item.classList.add('completed');
            } else {
                item.classList.remove('completed');
            }
        } else {
            item.classList.remove('active', 'completed');
        }
    });
    
    const backBtn = document.getElementById('setupBackBtn');
    const nextBtn = document.getElementById('setupNextBtn');
    const completeBtn = document.getElementById('setupCompleteBtn');
    
    if (backBtn) backBtn.style.display = step > 1 ? 'inline-flex' : 'none';
    if (nextBtn) nextBtn.style.display = step < totalSetupSteps ? 'inline-flex' : 'none';
    if (completeBtn) completeBtn.style.display = step === totalSetupSteps ? 'inline-flex' : 'none';
}

function goToPreviousSetupStep() {
    if (currentSetupStep > 1) {
        saveCurrentStepData();
        goToSetupStep(currentSetupStep - 1);
    }
}

function saveCurrentStepData() {
    try {
        let setupData = {};
        try {
            const existing = localStorage.getItem('financeSetup');
            if (existing) {
                setupData = JSON.parse(existing);
            }
        } catch (e) {
            setupData = {};
        }
        
        if (currentSetupStep === 1) {
            // Collect tuition fee grades
            const tuitionFeeGrades = [];
            document.querySelectorAll('.tuition-fee-grade-item').forEach(item => {
                const gradeName = item.querySelector('.tuition-fee-grade-name').value;
                const pricePerMonth = item.querySelector('.tuition-fee-price').value;
                const id = item.dataset.gradeId;
                if (gradeName && pricePerMonth) {
                    tuitionFeeGrades.push({
                        id: id,
                        gradeName: gradeName,
                        pricePerMonth: parseFloat(pricePerMonth) || 0
                    });
                }
            });
            
            setupData.feeStructure = {
                tuitionFeeGrades: tuitionFeeGrades
            };
        } else if (currentSetupStep === 2) {
            const expenseCategories = Array.from(document.querySelectorAll('.expense-category-checkbox:checked')).map(cb => cb.value);
            setupData.expenseCategories = expenseCategories;
            setupData.customExpenseCategories = document.getElementById('customExpenseCategories').value;
        }
        
        localStorage.setItem('financeSetup', JSON.stringify(setupData));
    } catch (e) {
        console.error('Error saving step data:', e);
    }
}

function handleNextSetupStep() {
    if (currentSetupStep === 1) {
        // Validate tuition fee grades
        const gradeItems = document.querySelectorAll('.tuition-fee-grade-item');
        if (gradeItems.length === 0) {
            alert('Please add at least one grade fee');
            return;
        }
        let hasError = false;
        gradeItems.forEach(item => {
            const gradeName = item.querySelector('.tuition-fee-grade-name').value.trim();
            const pricePerMonth = item.querySelector('.tuition-fee-price').value.trim();
            if (!gradeName || !pricePerMonth) {
                hasError = true;
            }
        });
        if (hasError) {
            alert('Please fill in all grade names and prices');
            return;
        }
    }
    
    saveCurrentStepData();
    
    if (currentSetupStep < totalSetupSteps) {
        goToSetupStep(currentSetupStep + 1);
    }
}

function completeSetup() {
    saveCurrentStepData();
    
    try {
        const setupDataStr = localStorage.getItem('financeSetup');
        const setupData = setupDataStr ? JSON.parse(setupDataStr) : {};
        setupData.completed = true;
        setupData.completedDate = new Date().toISOString();
        localStorage.setItem('financeSetup', JSON.stringify(setupData));
        localStorage.setItem('financeSetupCompleted', 'true');
    } catch (e) {
        console.error('Error saving setup data:', e);
    }
    
    if (typeof showToast === 'function') {
        showToast('Finance setup completed successfully!', 'success');
    } else {
        alert('Finance setup completed successfully!');
    }
    
    setTimeout(() => {
        window.location.href = '/admin/dashboard?setup=completed';
    }, 2000);
}

// Tuition Fee by Grade Functions
let tuitionFeeGradeCounter = 0;

function addTuitionFeeGrade() {
    addTuitionFeeGradeItem({
        gradeName: '',
        pricePerMonth: '',
        id: 'grade-' + Date.now() + '-' + (++tuitionFeeGradeCounter)
    });
}

function addTuitionFeeGradeItem(data) {
    const container = document.getElementById('tuitionFeeGradeList');
    if (!container) return;
    
    const item = document.createElement('div');
    item.className = 'tuition-fee-grade-item';
    item.dataset.gradeId = data.id || 'grade-' + Date.now() + '-' + (++tuitionFeeGradeCounter);
    
    const gradeOptions = [
        { value: 'Grade 1', label: 'Grade 1' },
        { value: 'Grade 2', label: 'Grade 2' },
        { value: 'Grade 3', label: 'Grade 3' },
        { value: 'Grade 4', label: 'Grade 4' },
        { value: 'Grade 5', label: 'Grade 5' },
        { value: 'Grade 6', label: 'Grade 6' },
        { value: 'Grade 7', label: 'Grade 7' },
        { value: 'Grade 8', label: 'Grade 8' },
        { value: 'Grade 9', label: 'Grade 9' },
        { value: 'Grade 10', label: 'Grade 10' },
        { value: 'Grade 11', label: 'Grade 11' },
        { value: 'Grade 12', label: 'Grade 12' }
    ];
    
    const gradeSelectOptions = gradeOptions.map(g => 
        `<option value="${g.value}" ${g.value === data.gradeName ? 'selected' : ''}>${g.label}</option>`
    ).join('');
    
    item.innerHTML = `
        <div style="display: flex; gap: 12px; align-items: flex-start; padding: 16px; background: #fff; border: 1px solid #e5e7eb; border-radius: 8px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151; font-size: 13px;">Grade Name</label>
                <select class="tuition-fee-grade-name form-select" style="width: 100%;">
                    <option value="">Select Grade</option>
                    ${gradeSelectOptions}
                </select>
            </div>
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151; font-size: 13px;">Price/Month</label>
                <input type="number" class="tuition-fee-price form-input" placeholder="e.g., 50000" value="${data.pricePerMonth || ''}" min="0" step="0.01" style="width: 100%;">
            </div>
            <div style="flex: 0 0 auto; padding-top: 24px;">
                <button type="button" class="wizard-btn-secondary" onclick="removeTuitionFeeGrade(this)" style="padding: 6px 10px; font-size: 13px; background: #fee2e2; color: #dc2626; border-color: #fca5a5;">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.appendChild(item);
    
    // Add change listener to auto-save
    item.querySelectorAll('input, select').forEach(field => {
        field.addEventListener('change', () => {
            saveCurrentStepData();
        });
    });
}

function removeTuitionFeeGrade(btn) {
    const item = btn.closest('.tuition-fee-grade-item');
    if (item) {
        const container = document.getElementById('tuitionFeeGradeList');
        const items = container.querySelectorAll('.tuition-fee-grade-item');
        if (items.length <= 1) {
            alert('At least one grade fee is required');
            return;
        }
        item.remove();
        saveCurrentStepData();
    }
}
</script>

<style>
/* Wizard Styles - Reuse from academic setup with purple theme */
.wizard-container {
    display: flex;
    flex-direction: column;
    background: #fff;
}

.wizard-progress-bar {
    background: #fff;
    border-bottom: 1px solid #e5e7eb;
    padding: 24px 32px;
}

.wizard-steps-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    max-width: 100%;
    overflow-x: auto;
    padding: 0;
}

.wizard-steps-container::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    height: 3px;
    background: #e5e7eb;
    z-index: 0;
}

.wizard-step-item {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 100px;
    flex: 1;
}

.wizard-step-item:hover {
    transform: translateY(-2px);
}

.step-indicator {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #fff;
    border: 3px solid #d1d5db;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 14px;
    color: #6b7280;
    transition: all 0.3s ease;
    margin-bottom: 8px;
    position: relative;
}

.wizard-step-item.active .step-indicator {
    background: #8b5cf6;
    border-color: #8b5cf6;
    color: #fff;
    box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
}

.wizard-step-item.active .step-indicator i {
    font-size: 16px;
}

.wizard-step-item.completed .step-indicator {
    background: #8b5cf6;
    border-color: #8b5cf6;
    color: #fff;
}

.step-label {
    font-size: 13px;
    font-weight: 500;
    color: #6b7280;
    text-align: center;
}

.wizard-step-item.active .step-label {
    color: #8b5cf6;
    font-weight: 600;
}

.wizard-step-item.completed::after,
.wizard-step-item.active::after {
    content: '';
    position: absolute;
    top: 20px;
    left: 50%;
    width: 100%;
    height: 3px;
    background: #8b5cf6;
    z-index: 0;
    transform: translateX(-50%);
}

.wizard-step-item:last-child::after {
    display: none;
}

.wizard-content-wrapper {
    display: flex;
    min-height: 600px;
}

.wizard-main-content {
    flex: 1;
    overflow-y: auto;
    padding: 32px;
}

.wizard-sidebar {
    width: 280px;
    background: #f9fafb;
    border-left: 1px solid #e5e7eb;
    padding: 24px;
    flex-shrink: 0;
}

.wizard-sidebar-content {
    position: sticky;
    top: 24px;
}

.sidebar-title {
    font-size: 16px;
    font-weight: 600;
    color: #111827;
    margin: 0 0 16px 0;
}

.sidebar-tips {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
}

.sidebar-tips li {
    padding: 8px 0;
    font-size: 14px;
    color: #6b7280;
    position: relative;
    padding-left: 20px;
}

.sidebar-tips li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: #8b5cf6;
    font-weight: bold;
}

.sidebar-help {
    background: #f5f3ff;
    border: 1px solid #8b5cf6;
    border-radius: 8px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #7c3aed;
}

.sidebar-help i {
    color: #8b5cf6;
}

.wizard-footer {
    border-top: 1px solid #e5e7eb;
    padding: 20px 32px;
    background: #f9fafb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 0 0 12px 12px;
}

.wizard-btn-primary {
    background: #8b5cf6;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.wizard-btn-primary:hover {
    background: #7c3aed;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
}

.wizard-btn-secondary {
    background: #fff;
    color: #6b7280;
    border: 1px solid #e5e7eb;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.wizard-btn-secondary:hover {
    background: #f9fafb;
    border-color: #d1d5db;
}

.wizard-step {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

label:has(input[type="checkbox"]:checked),
label:has(input[type="radio"]:checked) {
    border-color: #8b5cf6;
    background: #f5f3ff;
}

@media (max-width: 1024px) {
    .wizard-content-wrapper {
        flex-direction: column;
    }
    
    .wizard-sidebar {
        width: 100%;
        border-left: none;
        border-top: 1px solid #e5e7eb;
    }
    
    .wizard-footer {
        flex-direction: column;
        gap: 12px;
    }
    
    .wizard-footer > div {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    
    .wizard-footer .wizard-btn-secondary,
    .wizard-footer .wizard-btn-primary {
        flex: 1;
    }
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

