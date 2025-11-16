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
            <p style="margin: 0; font-size: 16px; color: rgba(255, 255, 255, 0.9);">Configure currency settings, payment methods, fee structures, expense categories, and financial year settings for your finance management system.</p>
        </div>
    </div>
</div>

<!-- Finance Setup Wizard -->
<div class="wizard-container" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid #e5e7eb;">
    <!-- Wizard Progress Bar -->
    <div class="wizard-progress-bar">
        <div class="wizard-steps-container">
            <div class="wizard-step-item active" data-step="1" onclick="goToSetupStep(1)">
                <div class="step-indicator">
                    <i class="fas fa-coins"></i>
                </div>
                <span class="step-label">Currency & Payment</span>
            </div>
            <div class="wizard-step-item" data-step="2" onclick="goToSetupStep(2)">
                <div class="step-indicator">2</div>
                <span class="step-label">Fee Structure</span>
            </div>
            <div class="wizard-step-item" data-step="3" onclick="goToSetupStep(3)">
                <div class="step-indicator">3</div>
                <span class="step-label">Expense Categories</span>
            </div>
            <div class="wizard-step-item" data-step="4" onclick="goToSetupStep(4)">
                <div class="step-indicator">4</div>
                <span class="step-label">Financial Year</span>
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
                <!-- Step 1: Currency & Payment -->
                <div class="wizard-step" id="setup-step-1" style="display:block;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-coins" style="color:#8b5cf6; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#7c3aed;">Currency & Payment Methods</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="currency">Currency <span style="color:red;">*</span></label>
                            <select id="currency" class="form-select" required>
                                <option value="USD">USD - US Dollar ($)</option>
                                <option value="MMK" selected>MMK - Myanmar Kyat (K)</option>
                                <option value="EUR">EUR - Euro (€)</option>
                                <option value="GBP">GBP - British Pound (£)</option>
                                <option value="SGD">SGD - Singapore Dollar (S$)</option>
                                <option value="THB">THB - Thai Baht (฿)</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="currencySymbol">Currency Symbol</label>
                            <input type="text" id="currencySymbol" class="form-input" placeholder="e.g., $" value="$" maxlength="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="currencyPosition">Currency Position</label>
                            <select id="currencyPosition" class="form-select">
                                <option value="before" selected>Before amount ($100)</option>
                                <option value="after">After amount (100$)</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="decimalPlaces">Decimal Places</label>
                            <select id="decimalPlaces" class="form-select">
                                <option value="0">0 (No decimals)</option>
                                <option value="2" selected>2 (e.g., 100.00)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Payment Methods</label>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="payment-method-checkbox" value="cash" checked>
                                    <span>Cash</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="payment-method-checkbox" value="bank-transfer" checked>
                                    <span>Bank Transfer</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="payment-method-checkbox" value="check" checked>
                                    <span>Check</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="payment-method-checkbox" value="card">
                                    <span>Card Payment</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="payment-method-checkbox" value="mobile-payment">
                                    <span>Mobile Payment</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; transition: all 0.2s;">
                                    <input type="checkbox" class="payment-method-checkbox" value="online">
                                    <span>Online Payment</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="background: #f5f3ff; border-left: 4px solid #8b5cf6; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #7c3aed; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure the currency and payment methods that will be used for all financial transactions.
                        </p>
                    </div>
                </div>

                <!-- Step 2: Fee Structure -->
                <div class="wizard-step" id="setup-step-2" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-file-invoice-dollar" style="color:#8b5cf6; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#7c3aed;">Tuition Fee Structure</h4>
                    </div>
                    
                    <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 6px; margin-bottom: 24px;">
                        <p style="margin: 0; color: #92400e; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            <strong>Note:</strong> Only tuition fees repeat over semesters. Other fees (registration, library, lab, sports, transport) are optional and can be added from manual expense.
                        </p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="feePaymentFrequency">Payment Frequency <span style="color:red;">*</span></label>
                            <select id="feePaymentFrequency" class="form-select" required>
                                <option value="monthly" selected>Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="semester">Semester</option>
                                <option value="annual">Annual</option>
                            </select>
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">How often tuition fees are collected</small>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="lateFeePercentage">Late Fee Percentage (%)</label>
                            <input type="number" id="lateFeePercentage" class="form-input" placeholder="e.g., 5" value="5" min="0" max="100" step="0.1">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Percentage charged for late payments</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="lateFeeGracePeriod">Late Fee Grace Period (days)</label>
                            <input type="number" id="lateFeeGracePeriod" class="form-input" placeholder="e.g., 7" value="7" min="0" max="30">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Days after due date before late fee applies</small>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="discountPercentage">Default Discount Percentage (%)</label>
                            <input type="number" id="discountPercentage" class="form-input" placeholder="e.g., 0" value="0" min="0" max="100" step="0.1">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Default discount for early payments or scholarships</small>
                        </div>
                    </div>
                    
                    <!-- Tuition Fee Timeline Configuration -->
                    <div style="margin-top: 32px; padding: 20px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <h5 style="margin: 0; font-size: 16px; font-weight: 600; color: #111827;">
                                <i class="fas fa-calendar-alt" style="margin-right: 8px; color: #8b5cf6;"></i>Tuition Fee Timeline
                            </h5>
                            <button type="button" class="wizard-btn-secondary" onclick="addTuitionFeeTimeline()" style="padding: 6px 12px; font-size: 13px;">
                                <i class="fas fa-plus"></i> Add Tuition Fee
                            </button>
                        </div>
                        <p style="margin: 0 0 16px 0; color: #6b7280; font-size: 13px;">
                            Configure different tuition fees with their active periods (e.g., Main Tuition: June - May, Summer Tuition: June - August)
                        </p>
                        
                        <div id="tuitionFeeTimelineList" style="display: flex; flex-direction: column; gap: 12px;">
                            <!-- Tuition fee timeline items will be added here -->
                        </div>
                    </div>
                    
                    <div style="background: #f5f3ff; border-left: 4px solid #8b5cf6; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #7c3aed; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure tuition fee payment frequency and timeline. Each tuition fee type can have different active periods throughout the year.
                        </p>
                    </div>
                </div>

                <!-- Step 3: Expense Categories -->
                <div class="wizard-step" id="setup-step-3" style="display:none;">
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

                <!-- Step 4: Financial Year -->
                <div class="wizard-step" id="setup-step-4" style="display:none;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <i class="fas fa-calendar-alt" style="color:#8b5cf6; margin-right:8px; font-size:18px;"></i>
                        <h4 style="margin:0; font-size:18px; font-weight:600; color:#7c3aed;">Financial Year Settings</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="financialYearStart">Financial Year Start Month <span style="color:red;">*</span></label>
                            <select id="financialYearStart" class="form-select" required>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="financialYearEnd">Financial Year End Month</label>
                            <select id="financialYearEnd" class="form-select">
                                <option value="12">December</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                            </select>
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Usually 11 months after start month</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label for="currentFinancialYear">Current Financial Year</label>
                            <input type="text" id="currentFinancialYear" class="form-input" placeholder="e.g., 2024-2025" value="<?php echo date('Y') . '-' . (date('Y') + 1); ?>">
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="taxRate">Tax Rate (%)</label>
                            <input type="number" id="taxRate" class="form-input" placeholder="e.g., 0" value="0" min="0" max="100" step="0.1">
                            <small style="color: #666; font-size: 12px; margin-top: 4px; display: block;">Default tax rate for transactions (if applicable)</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex:1;">
                            <label>Budget Approval Required</label>
                            <div style="margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px; margin-bottom: 8px;">
                                    <input type="radio" name="budgetApproval" value="yes" checked>
                                    <span>Yes, require approval for expenses</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 12px; border: 2px solid #e5e7eb; border-radius: 8px;">
                                    <input type="radio" name="budgetApproval" value="no">
                                    <span>No, auto-approve expenses</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="background: #f5f3ff; border-left: 4px solid #8b5cf6; padding: 16px; border-radius: 6px; margin-top: 16px;">
                        <p style="margin: 0; color: #7c3aed; font-size: 14px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                            Configure financial year settings and budget approval workflow for expense management.
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
    
    <div class="wizard-footer" style="border-top: 1px solid #e5e7eb; padding: 20px 32px; background: #f9fafb; display: flex; justify-content: space-between; align-items: center; border-radius: 0 0 12px 12px;">
        <a href="/admin/dashboard" class="wizard-btn-secondary" style="text-decoration: none;">
            <i class="fas fa-home"></i> Skip for Now
        </a>
        <div style="display: flex; gap: 12px; margin-left: auto;">
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
const totalSetupSteps = 4;

// Load existing setup data from localStorage
function loadExistingSetupData() {
    try {
        const setupDataStr = localStorage.getItem('financeSetup');
        if (!setupDataStr) {
            return false;
        }
        
        const setupData = JSON.parse(setupDataStr);
        
        // Load currency settings
        if (setupData.currency) {
            if (setupData.currency.code) {
                document.getElementById('currency').value = setupData.currency.code;
            }
            if (setupData.currency.symbol) {
                document.getElementById('currencySymbol').value = setupData.currency.symbol;
            }
            if (setupData.currency.position) {
                document.getElementById('currencyPosition').value = setupData.currency.position;
            }
            if (setupData.currency.decimalPlaces) {
                document.getElementById('decimalPlaces').value = setupData.currency.decimalPlaces;
            }
        }
        
        // Load payment methods
        if (setupData.paymentMethods && Array.isArray(setupData.paymentMethods)) {
            document.querySelectorAll('.payment-method-checkbox').forEach(cb => {
                cb.checked = setupData.paymentMethods.includes(cb.value);
            });
        }
        
        // Load fee structure
        if (setupData.feeStructure) {
            if (setupData.feeStructure.paymentFrequency) {
                document.getElementById('feePaymentFrequency').value = setupData.feeStructure.paymentFrequency;
            }
            if (setupData.feeStructure.lateFeePercentage) {
                document.getElementById('lateFeePercentage').value = setupData.feeStructure.lateFeePercentage;
            }
            if (setupData.feeStructure.lateFeeGracePeriod) {
                document.getElementById('lateFeeGracePeriod').value = setupData.feeStructure.lateFeeGracePeriod;
            }
            if (setupData.feeStructure.discountPercentage) {
                document.getElementById('discountPercentage').value = setupData.feeStructure.discountPercentage;
            }
            // Tuition fee timelines will be loaded when step 2 is shown
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
        
        // Load financial year
        if (setupData.financialYear) {
            if (setupData.financialYear.startMonth) {
                document.getElementById('financialYearStart').value = setupData.financialYear.startMonth;
            }
            if (setupData.financialYear.endMonth) {
                document.getElementById('financialYearEnd').value = setupData.financialYear.endMonth;
            }
            if (setupData.financialYear.currentYear) {
                document.getElementById('currentFinancialYear').value = setupData.financialYear.currentYear;
            }
            if (setupData.financialYear.taxRate) {
                document.getElementById('taxRate').value = setupData.financialYear.taxRate;
            }
            if (setupData.financialYear.budgetApproval) {
                const radio = document.querySelector(`input[name="budgetApproval"][value="${setupData.financialYear.budgetApproval}"]`);
                if (radio) radio.checked = true;
            }
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
    
    // Initialize tuition fee timelines when step 2 is shown
    if (step === 2) {
        const container = document.getElementById('tuitionFeeTimelineList');
        if (container) {
            // Clear existing items first
            container.innerHTML = '';
            
            // Check if we have saved data, otherwise add default
            const setupDataStr = localStorage.getItem('financeSetup');
            if (setupDataStr) {
                try {
                    const setupData = JSON.parse(setupDataStr);
                    if (setupData.feeStructure && setupData.feeStructure.tuitionFeeTimelines && setupData.feeStructure.tuitionFeeTimelines.length > 0) {
                        setupData.feeStructure.tuitionFeeTimelines.forEach(timeline => {
                            addTuitionFeeTimelineItem(timeline);
                        });
                    } else {
                        addTuitionFeeTimelineItem({
                            name: 'Main Tuition Fee',
                            startMonth: '6',
                            endMonth: '5',
                            id: 'tuition-' + Date.now()
                        });
                    }
                } catch (e) {
                    addTuitionFeeTimelineItem({
                        name: 'Main Tuition Fee',
                        startMonth: '6',
                        endMonth: '5',
                        id: 'tuition-' + Date.now()
                    });
                }
            } else {
                addTuitionFeeTimelineItem({
                    name: 'Main Tuition Fee',
                    startMonth: '6',
                    endMonth: '5',
                    id: 'tuition-' + Date.now()
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
            const paymentMethods = Array.from(document.querySelectorAll('.payment-method-checkbox:checked')).map(cb => cb.value);
            setupData.currency = {
                code: document.getElementById('currency').value,
                symbol: document.getElementById('currencySymbol').value || '$',
                position: document.getElementById('currencyPosition').value || 'before',
                decimalPlaces: parseInt(document.getElementById('decimalPlaces').value) || 2
            };
            setupData.paymentMethods = paymentMethods;
        } else if (currentSetupStep === 2) {
            // Collect tuition fee timelines
            const tuitionFeeTimelines = [];
            document.querySelectorAll('.tuition-fee-timeline-item').forEach(item => {
                const name = item.querySelector('.tuition-fee-name').value;
                const startMonth = item.querySelector('.tuition-fee-start-month').value;
                const endMonth = item.querySelector('.tuition-fee-end-month').value;
                const id = item.dataset.timelineId;
                if (name && startMonth && endMonth) {
                    tuitionFeeTimelines.push({
                        id: id,
                        name: name,
                        startMonth: startMonth,
                        endMonth: endMonth
                    });
                }
            });
            
            setupData.feeStructure = {
                paymentFrequency: document.getElementById('feePaymentFrequency').value || 'monthly',
                lateFeePercentage: parseFloat(document.getElementById('lateFeePercentage').value) || 5,
                lateFeeGracePeriod: parseInt(document.getElementById('lateFeeGracePeriod').value) || 7,
                discountPercentage: parseFloat(document.getElementById('discountPercentage').value) || 0,
                tuitionFeeTimelines: tuitionFeeTimelines
            };
        } else if (currentSetupStep === 3) {
            const expenseCategories = Array.from(document.querySelectorAll('.expense-category-checkbox:checked')).map(cb => cb.value);
            setupData.expenseCategories = expenseCategories;
            setupData.customExpenseCategories = document.getElementById('customExpenseCategories').value;
        } else if (currentSetupStep === 4) {
            const budgetApproval = document.querySelector('input[name="budgetApproval"]:checked')?.value || 'yes';
            setupData.financialYear = {
                startMonth: document.getElementById('financialYearStart').value || '01',
                endMonth: document.getElementById('financialYearEnd').value || '12',
                currentYear: document.getElementById('currentFinancialYear').value || '',
                taxRate: parseFloat(document.getElementById('taxRate').value) || 0,
                budgetApproval: budgetApproval
            };
        }
        
        localStorage.setItem('financeSetup', JSON.stringify(setupData));
    } catch (e) {
        console.error('Error saving step data:', e);
    }
}

function handleNextSetupStep() {
    if (currentSetupStep === 1) {
        const currency = document.getElementById('currency').value;
        const paymentMethods = Array.from(document.querySelectorAll('.payment-method-checkbox:checked'));
        if (!currency || paymentMethods.length === 0) {
            alert('Please select currency and at least one payment method');
            return;
        }
    } else if (currentSetupStep === 2) {
        const paymentFrequency = document.getElementById('feePaymentFrequency').value;
        if (!paymentFrequency) {
            alert('Please select payment frequency');
            return;
        }
        // Validate tuition fee timelines
        const timelineItems = document.querySelectorAll('.tuition-fee-timeline-item');
        if (timelineItems.length === 0) {
            alert('Please add at least one tuition fee timeline');
            return;
        }
        let hasError = false;
        timelineItems.forEach(item => {
            const name = item.querySelector('.tuition-fee-name').value.trim();
            if (!name) {
                hasError = true;
            }
        });
        if (hasError) {
            alert('Please fill in all tuition fee names');
            return;
        }
    } else if (currentSetupStep === 4) {
        const startMonth = document.getElementById('financialYearStart').value;
        if (!startMonth) {
            alert('Please select financial year start month');
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

// Tuition Fee Timeline Functions
let tuitionFeeTimelineCounter = 0;

function addTuitionFeeTimeline() {
    addTuitionFeeTimelineItem({
        name: '',
        startMonth: '1',
        endMonth: '12',
        id: 'tuition-' + Date.now() + '-' + (++tuitionFeeTimelineCounter)
    });
}

function addTuitionFeeTimelineItem(data) {
    const container = document.getElementById('tuitionFeeTimelineList');
    if (!container) return;
    
    const item = document.createElement('div');
    item.className = 'tuition-fee-timeline-item';
    item.dataset.timelineId = data.id || 'tuition-' + Date.now() + '-' + (++tuitionFeeTimelineCounter);
    
    const monthOptions = [
        { value: '1', label: 'January' },
        { value: '2', label: 'February' },
        { value: '3', label: 'March' },
        { value: '4', label: 'April' },
        { value: '5', label: 'May' },
        { value: '6', label: 'June' },
        { value: '7', label: 'July' },
        { value: '8', label: 'August' },
        { value: '9', label: 'September' },
        { value: '10', label: 'October' },
        { value: '11', label: 'November' },
        { value: '12', label: 'December' }
    ];
    
    const startMonthOptions = monthOptions.map(m => 
        `<option value="${m.value}" ${m.value === data.startMonth ? 'selected' : ''}>${m.label}</option>`
    ).join('');
    
    const endMonthOptions = monthOptions.map(m => 
        `<option value="${m.value}" ${m.value === data.endMonth ? 'selected' : ''}>${m.label}</option>`
    ).join('');
    
    item.innerHTML = `
        <div style="display: flex; gap: 12px; align-items: flex-start; padding: 16px; background: #fff; border: 1px solid #e5e7eb; border-radius: 8px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151; font-size: 13px;">Tuition Fee Name</label>
                <input type="text" class="tuition-fee-name form-input" placeholder="e.g., Main Tuition Fee, Summer Tuition" value="${data.name || ''}" style="width: 100%;">
            </div>
            <div style="flex: 0 0 140px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151; font-size: 13px;">Start Month</label>
                <select class="tuition-fee-start-month form-select" style="width: 100%;">
                    ${startMonthOptions}
                </select>
            </div>
            <div style="flex: 0 0 140px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 500; color: #374151; font-size: 13px;">End Month</label>
                <select class="tuition-fee-end-month form-select" style="width: 100%;">
                    ${endMonthOptions}
                </select>
            </div>
            <div style="flex: 0 0 auto; padding-top: 24px;">
                <button type="button" class="wizard-btn-secondary" onclick="removeTuitionFeeTimeline(this)" style="padding: 6px 10px; font-size: 13px; background: #fee2e2; color: #dc2626; border-color: #fca5a5;">
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

function removeTuitionFeeTimeline(btn) {
    const item = btn.closest('.tuition-fee-timeline-item');
    if (item) {
        const container = document.getElementById('tuitionFeeTimelineList');
        const items = container.querySelectorAll('.tuition-fee-timeline-item');
        if (items.length <= 1) {
            alert('At least one tuition fee timeline is required');
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

