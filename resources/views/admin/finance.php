<?php
$pageTitle = 'Smart Campus Nova Hub - Finance Management';
$pageIcon = 'fas fa-dollar-sign';
$pageHeading = 'Finance Management';
$activePage = 'finance';

ob_start();
?>

<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="fas fa-dollar-sign"></i>
    </div>
    <div class="page-title-compact">
        <h2>Finance Management</h2>
        <p style="font-size: 14px; color: #666; margin: 4px 0 0 0;">Track income from school fees and manage monthly expenses</p>
    </div>
</div>

<!-- Finance Summary Stats -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-arrow-up" style="color: #10b981;"></i>
        </div>
        <div class="stat-content">
            <h3>Total Income</h3>
            <div class="stat-number" id="totalIncome">$0.00</div>
            <div class="stat-change" id="incomePeriod">This Month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-arrow-down" style="color: #ef4444;"></i>
        </div>
        <div class="stat-content">
            <h3>Total Expenses</h3>
            <div class="stat-number" id="totalExpenses">$0.00</div>
            <div class="stat-change" id="expensePeriod">This Month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chart-line" style="color: #3b82f6;"></i>
        </div>
        <div class="stat-content">
            <h3>Net Balance</h3>
            <div class="stat-number" id="netBalance" style="color: #3b82f6;">$0.00</div>
            <div class="stat-change" id="balancePeriod">This Month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-content">
            <h3>Selected Month</h3>
            <div class="stat-number" id="selectedMonthDisplay">January 2025</div>
            <div class="stat-change">Current view</div>
        </div>
    </div>
</div>

<!-- Finance Tabs Navigation -->
<div style="margin-top: 24px;">
    <div class="attendance-view-tabs">
        <button class="view-tab active" data-view="income" onclick="switchFinanceView('income')">
            <i class="fas fa-arrow-up"></i> Income
        </button>
        <button class="view-tab" data-view="expenses" onclick="switchFinanceView('expenses')">
            <i class="fas fa-arrow-down"></i> Expenses
        </button>
        <button class="view-tab" data-view="profit-loss" onclick="switchFinanceView('profit-loss')">
            <i class="fas fa-chart-line"></i> Profit & Loss
        </button>
    </div>

    <!-- Income View -->
    <div id="income-finance-view" class="attendance-view-content">
        <!-- Daily Income Section -->
        <div class="simple-section" style="margin-top: 20px;">
            <!-- Daily Income Table (Invoice List) -->
            <div class="income-table-view">
                <div class="simple-header" style="margin-top: 16px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <h4 style="margin: 0; font-size: 16px; font-weight: 600; color: #374151;">Daily Income - Invoice List</h4>
                    <button class="simple-btn primary" onclick="openIncomeForm()">
                        <i class="fas fa-plus"></i> Add Income
                    </button>
                </div>
                <div class="simple-table-container" style="margin-top: 16px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice/ID #</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Grade/Class</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                            </tr>
                        </thead>
                        <tbody id="dailyIncomeTableBody">
                            <tr>
                                <td colspan="7" style="text-align: center; color: #999; padding: 40px;">
                                    <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                    No invoice data for selected month
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Monthly Income Section -->
        <div class="simple-section" style="margin-top: 24px;">
            <!-- Monthly Income Table (Combined Income - No Invoices) -->
            <div class="income-table-view">
                <div class="simple-header" style="margin-top: 16px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <h4 style="margin: 0; font-size: 16px; font-weight: 600; color: #374151;">Monthly Income - Combined Income</h4>
                    <select class="filter-select" id="monthYearFilter" onchange="loadFinanceData()" style="min-width: 200px;">
                        <option value="2025-01">January 2025</option>
                        <option value="2024-12">December 2024</option>
                        <option value="2024-11">November 2024</option>
                        <option value="2024-10">October 2024</option>
                        <option value="2024-09">September 2024</option>
                        <option value="2024-08">August 2024</option>
                    </select>
                </div>
                <div class="simple-table-container" style="margin-top: 16px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="monthlyIncomeTableBody">
                            <tr>
                                <td colspan="4" style="text-align: center; color: #999; padding: 40px;">
                                    <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                    No combined income data for selected month
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Expenses View -->
    <div id="expenses-finance-view" class="attendance-view-content" style="display: none;">
        <!-- Daily Expenses Section -->
        <div class="simple-section" style="margin-top: 20px;">
            <!-- Daily Expenses Table (Expense List) -->
            <div class="expense-table-view">
                <div class="simple-header" style="margin-top: 16px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <h4 style="margin: 0; font-size: 16px; font-weight: 600; color: #374151;">Daily Expenses - Expense List</h4>
                    <button class="simple-btn primary" onclick="openExpenseForm()">
                        <i class="fas fa-plus"></i> Add Expense
                    </button>
                </div>
                <div class="simple-table-container" style="margin-top: 16px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice ID</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody id="dailyExpenseTableBody">
                            <tr>
                                <td colspan="6" style="text-align: center; color: #999; padding: 40px;">
                                    <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                    No expenses recorded for selected month. Click "Add Expense" to add one.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Monthly Expenses Section -->
        <div class="simple-section" style="margin-top: 24px;">
            <!-- Monthly Expenses Table (Combined Expenses) -->
            <div class="expense-table-view">
                <div class="simple-header" style="margin-top: 16px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <h4 style="margin: 0; font-size: 16px; font-weight: 600; color: #374151;">Monthly Expenses - Combined Expenses</h4>
                    <select class="filter-select" id="monthYearFilterExpenses" onchange="loadFinanceData()" style="min-width: 200px;">
                        <option value="2025-01">January 2025</option>
                        <option value="2024-12">December 2024</option>
                        <option value="2024-11">November 2024</option>
                        <option value="2024-10">October 2024</option>
                        <option value="2024-09">September 2024</option>
                        <option value="2024-08">August 2024</option>
                    </select>
                </div>
                <div class="simple-table-container" style="margin-top: 16px;">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice ID</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody id="monthlyExpenseTableBody">
                            <tr>
                                <td colspan="6" style="text-align: center; color: #999; padding: 40px;">
                                    <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                    No combined expense data for selected month
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Profit & Loss View -->
    <div id="profit-loss-finance-view" class="attendance-view-content" style="display: none;">
        <div class="simple-section" style="margin-top: 20px;">
            <div class="simple-header">
                <h3><i class="fas fa-chart-line" style="color: #3b82f6; margin-right: 8px;"></i> Profit & Loss Summary</h3>
                <div style="color: #666; font-size: 14px;">
                    <i class="fas fa-info-circle"></i> Calculated from Income and Expenses
                </div>
            </div>
            
            <!-- Profit & Loss Summary Cards -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin-top: 20px;">
                <div style="background: #ecfdf5; border: 1px solid #10b981; border-radius: 8px; padding: 20px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color: #065f46; font-weight: 600; font-size: 14px;">Total Income</span>
                        <i class="fas fa-arrow-up" style="color: #10b981;"></i>
                    </div>
                    <div id="profitLossIncome" style="color: #065f46; font-size: 24px; font-weight: 700;">$0.00</div>
                </div>
                <div style="background: #fef2f2; border: 1px solid #ef4444; border-radius: 8px; padding: 20px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color: #991b1b; font-weight: 600; font-size: 14px;">Total Expenses</span>
                        <i class="fas fa-arrow-down" style="color: #ef4444;"></i>
                    </div>
                    <div id="profitLossExpenses" style="color: #991b1b; font-size: 24px; font-weight: 700;">$0.00</div>
                </div>
                <div id="profitLossNetCard" style="background: #eff6ff; border: 1px solid #3b82f6; border-radius: 8px; padding: 20px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color: #1e40af; font-weight: 600; font-size: 14px;">Net Profit/Loss</span>
                        <i class="fas fa-chart-line" style="color: #3b82f6;"></i>
                    </div>
                    <div id="profitLossNet" style="color: #1e40af; font-size: 24px; font-weight: 700;">$0.00</div>
                </div>
            </div>

            <!-- Monthly Profit & Loss Table -->
            <div class="simple-header" style="margin-top: 24px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="margin: 0; font-size: 16px; font-weight: 600; color: #374151;">Monthly Profit & Loss</h4>
                <select class="filter-select" id="monthYearFilterProfitLoss" onchange="updateMonthlyProfitLossTable()" style="min-width: 200px;">
                    <option value="2025-01">January 2025</option>
                    <option value="2024-12">December 2024</option>
                    <option value="2024-11">November 2024</option>
                    <option value="2024-10">October 2024</option>
                    <option value="2024-09">September 2024</option>
                    <option value="2024-08">August 2024</option>
                </select>
            </div>
            <div class="simple-table-container" style="margin-top: 16px;">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Income</th>
                            <th>Expenses</th>
                            <th>Net</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody id="monthlyProfitLossTableBody">
                        <tr>
                            <td colspan="5" style="text-align: center; color: #999; padding: 40px;">
                                <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                No data available for selected month
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Annual Profit & Loss Table -->
            <div class="simple-header" style="margin-top: 24px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="margin: 0; font-size: 16px; font-weight: 600; color: #374151;">Annual Profit & Loss</h4>
                <select class="filter-select" id="yearFilterProfitLoss" onchange="updateAnnualProfitLossTable()" style="min-width: 200px;">
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="simple-table-container" style="margin-top: 16px;">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Income</th>
                            <th>Expenses</th>
                            <th>Net</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody id="annualProfitLossTableBody">
                        <tr>
                            <td colspan="5" style="text-align: center; color: #999; padding: 40px;">
                                <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                No annual data available
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Income Form Modal -->
<div id="incomeModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 500px;">
        <div class="confirm-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-plus-circle"></i> <span id="incomeModalTitle">Add Income</span></h4>
            <button class="icon-btn" onclick="closeIncomeForm()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Date <span style="color: #ef4444;">*</span></label>
                        <input type="date" class="form-input" id="incomeDate" required>
                    </div>
                    <div class="form-group">
                        <label>Category <span style="color: #ef4444;">*</span></label>
                        <select class="form-input" id="incomeCategory" required onchange="handleOtherSelect(this, 'incomeCategoryOther')">
                            <option value="">Select Category</option>
                            <option value="School Fees">School Fees</option>
                            <option value="Additional Fees">Additional Fees</option>
                            <option value="Donations">Donations</option>
                            <option value="Grants">Grants</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" class="form-input" id="incomeCategoryOther" placeholder="Specify category" style="display: none; margin-top: 8px;" oninput="updateOtherSelectValue('incomeCategory', this.value)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Description <span style="color: #ef4444;">*</span></label>
                        <input type="text" class="form-input" id="incomeDescription" placeholder="Enter income description" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Invoice ID</label>
                        <input type="text" class="form-input" id="incomeInvoiceId" placeholder="Enter invoice ID (optional)">
                    </div>
                    <div class="form-group">
                        <label>Grade/Class</label>
                        <input type="text" class="form-input" id="incomeGradeClass" placeholder="e.g., Grade 1-A (optional)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Amount ($) <span style="color: #ef4444;">*</span></label>
                        <input type="number" class="form-input" id="incomeAmount" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Payment Type</label>
                        <select class="form-input" id="incomePaymentType">
                            <option value="">Select Payment Type</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Check">Check</option>
                            <option value="K-Pay">K-Pay</option>
                            <option value="KBZ Pay">KBZ Pay</option>
                            <option value="Wave Pay">Wave Pay</option>
                            <option value="Mobile Payment">Mobile Payment</option>
                            <option value="Online Payment">Online Payment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeIncomeForm()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveIncome()">
                <i class="fas fa-check"></i> Save Income
            </button>
        </div>
    </div>
</div>

<!-- Expense Form Modal -->
<div id="expenseModal" class="confirm-dialog-overlay" style="display:none;">
    <div class="confirm-dialog-content" style="max-width: 500px;">
        <div class="confirm-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-plus-circle"></i> <span id="expenseModalTitle">Add Expense</span></h4>
            <button class="icon-btn" onclick="closeExpenseForm()"><i class="fas fa-times"></i></button>
        </div>
        <div class="confirm-dialog-body" style="padding: 20px;">
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Date <span style="color: #ef4444;">*</span></label>
                        <input type="date" class="form-input" id="expenseDate" required>
                    </div>
                    <div class="form-group">
                        <label>Category <span style="color: #ef4444;">*</span></label>
                        <select class="form-input" id="expenseCategory" required onchange="handleOtherSelect(this, 'expenseCategoryOther')">
                            <option value="">Select Category</option>
                            <option value="Salaries">Salaries</option>
                            <option value="Utilities">Utilities</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Supplies">Supplies</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" class="form-input" id="expenseCategoryOther" placeholder="Specify category" style="display: none; margin-top: 8px;" oninput="updateOtherSelectValue('expenseCategory', this.value)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Description <span style="color: #ef4444;">*</span></label>
                        <input type="text" class="form-input" id="expenseDescription" placeholder="Enter expense description" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Invoice ID</label>
                        <input type="text" class="form-input" id="expenseInvoiceId" placeholder="Enter invoice ID (optional)">
                    </div>
                    <div class="form-group">
                        <label>Amount ($) <span style="color: #ef4444;">*</span></label>
                        <input type="number" class="form-input" id="expenseAmount" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Method</label>
                        <select class="form-input" id="expensePaymentMethod">
                            <option value="">Select Payment Method</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Check">Check</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm-dialog-actions">
            <button class="simple-btn secondary" onclick="closeExpenseForm()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="saveExpense()">
                <i class="fas fa-check"></i> Save Expense
            </button>
        </div>
    </div>
</div>

<script>
let expenses = [];
let customIncome = [];
let currentEditingExpenseId = null;
let currentEditingIncomeId = null;
let selectedMonth = '2025-01';

// Handle "Other" option in select inputs
function handleOtherSelect(selectElement, otherInputId) {
    const otherInput = document.getElementById(otherInputId);
    if (selectElement.value === 'Other' || selectElement.value === 'other') {
        otherInput.style.display = 'block';
        otherInput.required = true;
        otherInput.focus();
    } else {
        otherInput.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}

// Update select value when user types in "Other" input
function updateOtherSelectValue(selectId, value) {
    const select = document.getElementById(selectId);
    if (select && (select.value === 'Other' || select.value === 'other')) {
        // Store the custom value in a data attribute
        select.setAttribute('data-custom-value', value);
    }
}

// Get the actual value from select (handles "Other" option)
function getSelectValue(selectId) {
    const select = document.getElementById(selectId);
    if (!select) return '';
    
    if (select.value === 'Other' || select.value === 'other') {
        const otherInputId = selectId + 'Other';
        const otherInput = document.getElementById(otherInputId);
        return otherInput && otherInput.value.trim() ? otherInput.value.trim() : select.value;
    }
    return select.value;
}

// Load data on page load
document.addEventListener('DOMContentLoaded', function() {
    loadExpenses();
    loadCustomIncome();
    
    // Sync all month selectors on page load
    const monthFilter = document.getElementById('monthYearFilter');
    const monthFilterExpenses = document.getElementById('monthYearFilterExpenses');
    const monthFilterProfitLoss = document.getElementById('monthYearFilterProfitLoss');
    const yearFilterProfitLoss = document.getElementById('yearFilterProfitLoss');
    
    if (monthFilter && monthFilterExpenses) {
        monthFilterExpenses.value = monthFilter.value;
    }
    if (monthFilter && monthFilterProfitLoss) {
        monthFilterProfitLoss.value = monthFilter.value;
    }
    
    // Set default year to current year
    if (yearFilterProfitLoss) {
        const currentYear = new Date().getFullYear().toString();
        if (!yearFilterProfitLoss.value) {
            yearFilterProfitLoss.value = currentYear;
        }
    }
    
    loadFinanceData();
    
    // Initialize view from localStorage or default to income
    const savedView = localStorage.getItem('selectedFinanceView') || 'income';
    switchFinanceView(savedView);
});

// Load expenses from localStorage
function loadExpenses() {
    const savedExpenses = localStorage.getItem('expenses');
    if (savedExpenses) {
        expenses = JSON.parse(savedExpenses);
    } else {
        // Initialize with realistic sample expense data
        expenses = initializeSampleExpenses();
        saveExpenses();
    }
}

// Initialize realistic sample expenses
function initializeSampleExpenses() {
    const sampleExpenses = [];
    const months = [
        { key: '2025-01', name: 'January 2025' },
        { key: '2024-12', name: 'December 2024' },
        { key: '2024-11', name: 'November 2024' },
        { key: '2024-10', name: 'October 2024' },
        { key: '2024-09', name: 'September 2024' },
        { key: '2024-08', name: 'August 2024' }
    ];
    
    const expenseCategories = {
        'Salaries': [
            { desc: 'Teacher Salaries - January', amount: 12500 },
            { desc: 'Staff Salaries - January', amount: 8500 },
            { desc: 'Administrative Staff', amount: 4200 }
        ],
        'Utilities': [
            { desc: 'Electricity Bill', amount: 1200 },
            { desc: 'Water Bill', amount: 350 },
            { desc: 'Internet & Phone', amount: 450 },
            { desc: 'Gas Bill', amount: 280 }
        ],
        'Maintenance': [
            { desc: 'Building Maintenance', amount: 1500 },
            { desc: 'Equipment Repair', amount: 850 },
            { desc: 'Grounds Keeping', amount: 600 },
            { desc: 'Cleaning Services', amount: 1200 }
        ],
        'Supplies': [
            { desc: 'Office Supplies', amount: 450 },
            { desc: 'Teaching Materials', amount: 800 },
            { desc: 'Stationery', amount: 350 },
            { desc: 'Lab Supplies', amount: 1200 }
        ],
        'Equipment': [
            { desc: 'Computer Equipment', amount: 3500 },
            { desc: 'Lab Equipment', amount: 2800 },
            { desc: 'Furniture', amount: 1500 }
        ],
        'Transportation': [
            { desc: 'School Bus Maintenance', amount: 800 },
            { desc: 'Fuel Costs', amount: 1200 },
            { desc: 'Driver Salaries', amount: 1800 }
        ],
        'Other': [
            { desc: 'Insurance Premium', amount: 1500 },
            { desc: 'Security Services', amount: 2000 },
            { desc: 'Professional Development', amount: 1200 },
            { desc: 'Marketing & Advertising', amount: 800 }
        ]
    };
    
    let expenseIdCounter = 1;
    
    months.forEach(month => {
        Object.keys(expenseCategories).forEach(category => {
            const categoryExpenses = expenseCategories[category];
            categoryExpenses.forEach((exp, idx) => {
                // Vary the dates within the month
                const day = 1 + (idx * 5) + Math.floor(Math.random() * 3);
                const date = `${month.key}-${String(day).padStart(2, '0')}`;
                
                // Add some variation to amounts (±10%)
                const variation = 1 + (Math.random() * 0.2 - 0.1);
                const amount = Math.round(exp.amount * variation * 100) / 100;
                
                // Replace month name in description if it exists
                let description = exp.desc;
                const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                monthNames.forEach(mName => {
                    if (description.includes(mName)) {
                        description = description.replace(mName, month.name.split(' ')[0]);
                    }
                });
                
                sampleExpenses.push({
                    id: `EXP-${expenseIdCounter++}`,
                    date: date,
                    category: category,
                    description: description,
                    amount: amount
                });
            });
        });
    });
    
    return sampleExpenses;
}

// Save expenses to localStorage
function saveExpenses() {
    localStorage.setItem('expenses', JSON.stringify(expenses));
}

// Load custom income from localStorage
function loadCustomIncome() {
    const savedIncome = localStorage.getItem('customIncome');
    if (savedIncome) {
        customIncome = JSON.parse(savedIncome);
    } else {
        // Initialize with realistic sample income data
        customIncome = initializeSampleIncome();
        saveCustomIncome();
    }
}

// Initialize realistic sample custom income
function initializeSampleIncome() {
    const sampleIncome = [];
    const months = [
        { key: '2025-01', name: 'January 2025' },
        { key: '2024-12', name: 'December 2024' },
        { key: '2024-11', name: 'November 2024' },
        { key: '2024-10', name: 'October 2024' },
        { key: '2024-09', name: 'September 2024' },
        { key: '2024-08', name: 'August 2024' }
    ];
    
    const incomeCategories = {
        'Donations': [
            { desc: 'Alumni Donation - Annual Fund', amount: 5000 },
            { desc: 'Parent Association Donation', amount: 2500 },
            { desc: 'Corporate Sponsorship', amount: 8000 }
        ],
        'Grants': [
            { desc: 'Education Grant - Government', amount: 15000 },
            { desc: 'Technology Grant', amount: 10000 },
            { desc: 'Scholarship Fund Grant', amount: 7500 }
        ],
        'Additional Fees': [
            { desc: 'Library Membership Fees', amount: 1200 },
            { desc: 'Sports Equipment Fees', amount: 1800 },
            { desc: 'Lab Equipment Fees', amount: 2500 },
            { desc: 'Field Trip Fees', amount: 3200 }
        ],
        'Other': [
            { desc: 'Cafeteria Revenue', amount: 4500 },
            { desc: 'Event Ticket Sales', amount: 2800 },
            { desc: 'Bookstore Sales', amount: 1500 }
        ]
    };
    
    let incomeIdCounter = 1;
    
    months.forEach(month => {
        Object.keys(incomeCategories).forEach(category => {
            const categoryIncomes = incomeCategories[category];
            // Only add some income categories per month (not all every month)
            if (Math.random() > 0.3) { // 70% chance to add this category
                categoryIncomes.forEach((inc, idx) => {
                    // Vary the dates within the month
                    const day = 5 + (idx * 8) + Math.floor(Math.random() * 5);
                    const date = `${month.key}-${String(day).padStart(2, '0')}`;
                    
                    // Add some variation to amounts (±15%)
                    const variation = 1 + (Math.random() * 0.3 - 0.15);
                    const amount = Math.round(inc.amount * variation * 100) / 100;
                    
                    sampleIncome.push({
                        id: `INC-${incomeIdCounter++}`,
                        date: date,
                        category: category,
                        source: category, // Keep for backward compatibility
                        description: inc.desc,
                        amount: amount
                    });
                });
            }
        });
    });
    
    return sampleIncome;
}

// Save custom income to localStorage
function saveCustomIncome() {
    localStorage.setItem('customIncome', JSON.stringify(customIncome));
}

// Load finance data for selected month
function loadFinanceData() {
    // Get the value from whichever selector triggered the change
    const monthFilter = document.getElementById('monthYearFilter');
    const monthFilterExpenses = document.getElementById('monthYearFilterExpenses');
    const monthFilterProfitLoss = document.getElementById('monthYearFilterProfitLoss');
    
    // Determine which selector was used (or use the first available one)
    let selectedValue = selectedMonth;
    if (monthFilter && monthFilter.value) {
        selectedValue = monthFilter.value;
    } else if (monthFilterExpenses && monthFilterExpenses.value) {
        selectedValue = monthFilterExpenses.value;
    } else if (monthFilterProfitLoss && monthFilterProfitLoss.value) {
        selectedValue = monthFilterProfitLoss.value;
    }
    
    // Sync all selectors to the same value
    if (monthFilter) {
        monthFilter.value = selectedValue;
        selectedMonth = selectedValue;
    }
    if (monthFilterExpenses) {
        monthFilterExpenses.value = selectedValue;
    }
    if (monthFilterProfitLoss) {
        monthFilterProfitLoss.value = selectedValue;
    }
    
    // Get month name from the first selector
    const monthName = monthFilter ? monthFilter.options[monthFilter.selectedIndex].text : 'January 2025';
    
    document.getElementById('selectedMonthDisplay').textContent = monthName;
    document.getElementById('incomePeriod').textContent = monthName;
    document.getElementById('expensePeriod').textContent = monthName;
    document.getElementById('balancePeriod').textContent = monthName;
    
    loadIncomeData();
    renderExpenseTable();
    updateSummaryStats();
    
    // Update profit-loss view if it's currently active
    const currentView = localStorage.getItem('selectedFinanceView') || 'income';
    if (currentView === 'profit-loss') {
        renderProfitLossView();
    }
}

// Initialize sample paid invoices if none exist
function initializeSampleInvoices() {
    // Check if invoice history already exists
    const existingHistory = localStorage.getItem('invoiceHistory');
    if (existingHistory && JSON.parse(existingHistory).length > 0) {
        return; // Don't overwrite existing data
    }
    
    const sampleInvoices = [];
    const months = [
        { key: '2025-01', name: 'January 2025' },
        { key: '2024-12', name: 'December 2024' },
        { key: '2024-11', name: 'November 2024' },
        { key: '2024-10', name: 'October 2024' },
        { key: '2024-09', name: 'September 2024' },
        { key: '2024-08', name: 'August 2024' }
    ];
    
    const students = [
        { name: 'Sarah Johnson', grade: 9, class: 'A', studentId: 'S001' },
        { name: 'Michael Brown', grade: 10, class: 'B', studentId: 'S002' },
        { name: 'Emma Davis', grade: 11, class: 'A', studentId: 'S003' },
        { name: 'James Wilson', grade: 9, class: 'B', studentId: 'S004' },
        { name: 'Olivia Taylor', grade: 10, class: 'A', studentId: 'S005' },
        { name: 'Noah Anderson', grade: 12, class: 'C', studentId: 'S006' },
        { name: 'Ava Martinez', grade: 8, class: 'A', studentId: 'S007' },
        { name: 'Liam Thompson', grade: 11, class: 'B', studentId: 'S008' },
        { name: 'Sophia Garcia', grade: 9, class: 'C', studentId: 'S009' },
        { name: 'Mason Lee', grade: 10, class: 'B', studentId: 'S010' },
        { name: 'Isabella White', grade: 12, class: 'A', studentId: 'S011' },
        { name: 'Ethan Harris', grade: 8, class: 'B', studentId: 'S012' }
    ];
    
    const paymentTypes = ['Bank Transfer', 'Cash', 'K-Pay', 'Mobile Payment'];
    const gradeFees = {
        8: 450,
        9: 500,
        10: 550,
        11: 600,
        12: 650
    };
    
    let invoiceCounter = 1;
    
    months.forEach((month, monthIdx) => {
        // For each month, create invoices for 70-90% of students (some may not have paid yet)
        // Use a deterministic approach based on month index for consistency
        const paymentRate = 0.7 + (monthIdx % 3) * 0.1; // Varies between 0.7 and 0.9
        const numStudents = Math.floor(students.length * paymentRate);
        const studentsToInvoice = students.slice(0, numStudents);
        
        studentsToInvoice.forEach((student, idx) => {
            const feeAmount = gradeFees[student.grade] || 500;
            // Use deterministic selection based on student and month index
            const paymentTypeIdx = (monthIdx + idx) % paymentTypes.length;
            const paymentType = paymentTypes[paymentTypeIdx];
            
            // Payment date varies within the month (usually in first 2 weeks)
            // Use deterministic day based on student index
            const paymentDay = 1 + (idx % 14) + Math.floor(monthIdx / 2);
            const finalDay = Math.min(paymentDay, 28); // Ensure valid day
            const paymentDate = `${month.key}-${String(finalDay).padStart(2, '0')}`;
            
            // Payment time varies but is deterministic
            const paymentHour = 9 + (idx % 6); // Between 9 AM and 3 PM
            const paymentMinute = (idx * 5) % 60;
            const paidTime = `${paymentDate} ${String(paymentHour).padStart(2, '0')}:${String(paymentMinute).padStart(2, '0')}:00`;
            
            sampleInvoices.push({
                id: `INV-${month.key}-${String(invoiceCounter++).padStart(3, '0')}`,
                month: month.key,
                monthName: month.name,
                studentId: student.studentId,
                name: student.name,
                grade: student.grade,
                class: student.class,
                amount: feeAmount,
                paidAmount: feeAmount,
                status: 'paid',
                paymentType: paymentType,
                paidBy: 'Reception Staff',
                paidTime: paidTime,
                paymentDate: paymentDate,
                remark: 'Monthly tuition fee payment',
                feeBreakdown: [
                    { name: 'Monthly Tuition', amount: feeAmount, category: 'recurring' }
                ],
                year: parseInt(month.key.split('-')[0]),
                academicYear: `${parseInt(month.key.split('-')[0])}-${parseInt(month.key.split('-')[0]) + 1}`
            });
        });
    });
    
    // Save to invoiceHistory
    localStorage.setItem('invoiceHistory', JSON.stringify(sampleInvoices));
}

// Load income data from paid invoices and custom income
function loadIncomeData() {
    // Initialize sample invoices if needed
    initializeSampleInvoices();
    
    // Get invoice data from localStorage
    const invoiceData = JSON.parse(localStorage.getItem('invoiceData') || '[]');
    const invoiceHistory = JSON.parse(localStorage.getItem('invoiceHistory') || '[]');
    
    // Combine current and historical invoices
    const allInvoices = [...invoiceData, ...invoiceHistory];
    
    // Filter paid invoices for selected month
    const monthInvoices = allInvoices.filter(invoice => {
        // Extract month from invoice ID or use month field
        const invoiceMonth = invoice.month || extractMonthFromInvoiceId(invoice.id);
        return invoiceMonth === selectedMonth && invoice.status === 'paid';
    });
    
    // Filter custom income for selected month
    const monthCustomIncome = customIncome.filter(income => {
        const incomeMonth = income.date.substring(0, 7); // YYYY-MM format
        return incomeMonth === selectedMonth;
    });
    
    // Combine invoice income and custom income
    const allIncome = [
        ...monthInvoices.map(inv => {
            // Extract date from paidTime or paymentDate
            let paymentDate = '-';
            if (inv.paidTime) {
                paymentDate = inv.paidTime.split(' ')[0];
            } else if (inv.paymentDate) {
                paymentDate = inv.paymentDate;
            } else if (inv.date) {
                paymentDate = inv.date;
            }
            
            return {
                type: 'invoice',
                date: paymentDate,
                id: inv.id,
                name: inv.name || '-',
                description: `Invoice ${inv.id} - ${inv.name}`,
                source: 'School Fees',
                amount: inv.amount || inv.paidAmount || 0,
                paymentType: inv.paymentType || '-',
                grade: inv.grade,
                class: inv.class
            };
        }),
        ...monthCustomIncome.map(inc => ({
            type: 'custom',
            date: inc.date,
            id: inc.id,
            invoiceId: inc.invoiceId,
            description: inc.description,
            category: inc.category || inc.source,
            source: inc.source || inc.category, // Keep for backward compatibility
            amount: inc.amount,
            paymentType: inc.paymentType || '-',
            grade: inc.grade || '-',
            class: inc.class || '-',
            gradeClass: inc.gradeClass || (inc.grade && inc.class ? `Grade ${inc.grade}-${inc.class}` : '-')
        }))
    ];
    
    renderIncomeTable(allIncome);
    
    // Calculate total income
    const totalIncome = allIncome.reduce((sum, inc) => sum + (inc.amount || 0), 0);
    document.getElementById('totalIncome').textContent = '$' + totalIncome.toFixed(2);
}

// Extract month from invoice ID (format: INV-YYYY-MM-XXX)
function extractMonthFromInvoiceId(invoiceId) {
    const match = invoiceId.match(/INV-(\d{4})-(\d{2})-/);
    if (match) {
        return match[1] + '-' + match[2];
    }
    return null;
}

// Render income table
function renderIncomeTable(incomeItems) {
    const dailyTbody = document.getElementById('dailyIncomeTableBody');
    const monthlyTbody = document.getElementById('monthlyIncomeTableBody');
    
    // Separate invoices from custom income
    const invoiceItems = incomeItems.filter(item => item.type === 'invoice');
    const customIncomeItems = incomeItems.filter(item => item.type === 'custom');
    
    // Render Daily Income Table (Invoice List Only)
    if (invoiceItems.length === 0 && customIncomeItems.length === 0) {
        if (dailyTbody) {
            dailyTbody.innerHTML = `
                <tr>
                    <td colspan="7" style="text-align: center; color: #999; padding: 40px;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                        No invoice data for selected month
                    </td>
                </tr>
            `;
        }
    } else {
        // Combine invoice and custom income items for daily table
        const allDailyItems = [
            ...invoiceItems.map(item => ({ ...item, category: 'School Fees' })),
            ...customIncomeItems
        ];
        
        // Sort by date (newest first)
        allDailyItems.sort((a, b) => new Date(b.date) - new Date(a.date));
        
        const dailyRows = allDailyItems.map(item => {
            if (item.type === 'invoice') {
                return `
            <tr>
                <td>${formatDate(item.date)}</td>
                <td><strong>${item.id}</strong></td>
                        <td><span class="status-badge" style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px;">${item.category || 'School Fees'}</span></td>
                <td>${item.name}</td>
                <td>Grade ${item.grade}-${item.class}</td>
                <td><strong style="color: #10b981;">$${item.amount.toFixed(2)}</strong></td>
                <td>${item.paymentType}</td>
            </tr>
                `;
            } else {
                return `
                    <tr>
                        <td>${formatDate(item.date)}</td>
                        <td><strong>${item.invoiceId || item.id}</strong></td>
                        <td><span class="status-badge" style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px;">${item.category || item.source || '-'}</span></td>
                        <td>${item.description}</td>
                        <td>${item.gradeClass || (item.grade && item.class ? `Grade ${item.grade}-${item.class}` : '-')}</td>
                        <td><strong style="color: #10b981;">$${item.amount.toFixed(2)}</strong></td>
                        <td>${item.paymentType || '-'}</td>
                    </tr>
                `;
            }
        }).join('');
        
        if (dailyTbody) dailyTbody.innerHTML = dailyRows;
    }
    
    // Render Monthly Income Table (Combined Income - No Invoices)
    if (customIncomeItems.length === 0) {
        if (monthlyTbody) {
            monthlyTbody.innerHTML = `
                <tr>
                    <td colspan="4" style="text-align: center; color: #999; padding: 40px;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                        No combined income data for selected month
                    </td>
                </tr>
            `;
        }
    } else {
        // Sort by date (newest first)
        customIncomeItems.sort((a, b) => new Date(b.date) - new Date(a.date));
        
        const customIncomeRows = customIncomeItems.map(item => `
            <tr>
                <td>${formatDate(item.date)}</td>
                <td><span class="status-badge" style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px;">${item.category || item.source || '-'}</span></td>
                <td>${item.description}</td>
                <td><strong style="color: #10b981;">$${item.amount.toFixed(2)}</strong></td>
            </tr>
        `).join('');
        
        if (monthlyTbody) monthlyTbody.innerHTML = customIncomeRows;
    }
}

// Render expense table
function renderExpenseTable() {
    const dailyTbody = document.getElementById('dailyExpenseTableBody');
    const monthlyTbody = document.getElementById('monthlyExpenseTableBody');
    
    // Filter expenses for selected month
    const monthExpenses = expenses.filter(exp => {
        const expenseMonth = exp.date.substring(0, 7); // YYYY-MM format
        return expenseMonth === selectedMonth;
    });
    
    // Render Daily Expenses Table (Expense List)
    if (monthExpenses.length === 0) {
        if (dailyTbody) {
            dailyTbody.innerHTML = `
                <tr>
                    <td colspan="6" style="text-align: center; color: #999; padding: 40px;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                        No expenses recorded for selected month. Click "Add Expense" to add one.
                    </td>
                </tr>
            `;
        }
        if (monthlyTbody) {
            monthlyTbody.innerHTML = `
                <tr>
                    <td colspan="6" style="text-align: center; color: #999; padding: 40px;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                        No combined expense data for selected month
                    </td>
                </tr>
            `;
        }
        updateSummaryStats();
        return;
    }
    
    // Sort by date (newest first)
    monthExpenses.sort((a, b) => new Date(b.date) - new Date(a.date));
    
    // Render Daily Expenses Table
    const dailyExpenseRows = monthExpenses.map(expense => `
        <tr>
            <td>${formatDate(expense.date)}</td>
            <td><strong>${expense.invoiceId || expense.id || '-'}</strong></td>
            <td><span class="status-badge" style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px;">${expense.category}</span></td>
            <td>${expense.description}</td>
            <td><strong style="color: #ef4444;">$${expense.amount.toFixed(2)}</strong></td>
            <td>${expense.paymentMethod || '-'}</td>
        </tr>
    `).join('');
    
    if (dailyTbody) dailyTbody.innerHTML = dailyExpenseRows;
    
    // Render Monthly Expenses Table (Combined Expenses)
    const monthlyExpenseRows = monthExpenses.map(expense => `
        <tr>
            <td>${formatDate(expense.date)}</td>
            <td><strong>${expense.invoiceId || expense.id || '-'}</strong></td>
            <td><span class="status-badge" style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px;">${expense.category}</span></td>
            <td>${expense.description}</td>
            <td><strong style="color: #ef4444;">$${expense.amount.toFixed(2)}</strong></td>
            <td>${expense.paymentMethod || '-'}</td>
        </tr>
    `).join('');
    
    if (monthlyTbody) monthlyTbody.innerHTML = monthlyExpenseRows;
    
    updateSummaryStats();
}

// Format date for display
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
}

// Update summary statistics
function updateSummaryStats() {
    // Calculate total expenses for selected month
    const monthExpenses = expenses.filter(exp => {
        const expenseMonth = exp.date.substring(0, 7);
        return expenseMonth === selectedMonth;
    });
    const totalExpenses = monthExpenses.reduce((sum, exp) => sum + (exp.amount || 0), 0);
    
    // Get total income
    const totalIncomeText = document.getElementById('totalIncome').textContent;
    const totalIncome = parseFloat(totalIncomeText.replace('$', '').replace(',', '')) || 0;
    
    // Calculate net balance
    const netBalance = totalIncome - totalExpenses;
    
    document.getElementById('totalExpenses').textContent = '$' + totalExpenses.toFixed(2);
    document.getElementById('netBalance').textContent = '$' + netBalance.toFixed(2);
    
    // Color code net balance
    const balanceElement = document.getElementById('netBalance');
    if (netBalance >= 0) {
        balanceElement.style.color = '#10b981';
    } else {
        balanceElement.style.color = '#ef4444';
    }
}

// Open expense form
function openExpenseForm(expenseId = null) {
    currentEditingExpenseId = expenseId;
    const modal = document.getElementById('expenseModal');
    const title = document.getElementById('expenseModalTitle');
    
    if (expenseId) {
        title.textContent = 'Edit Expense';
        const expense = expenses.find(e => e.id === expenseId);
        if (expense) {
            document.getElementById('expenseDate').value = expense.date;
            const categorySelect = document.getElementById('expenseCategory');
            const categoryOtherInput = document.getElementById('expenseCategoryOther');
            
            // Check if category is in the predefined options
            const predefinedCategories = ['Salaries', 'Utilities', 'Maintenance', 'Supplies', 'Transportation'];
            if (predefinedCategories.includes(expense.category)) {
                categorySelect.value = expense.category;
                categoryOtherInput.style.display = 'none';
                categoryOtherInput.value = '';
            } else {
                categorySelect.value = 'Other';
                categoryOtherInput.style.display = 'block';
                categoryOtherInput.value = expense.category;
            }
            
            document.getElementById('expenseDescription').value = expense.description;
            document.getElementById('expenseAmount').value = expense.amount;
            document.getElementById('expensePaymentMethod').value = expense.paymentMethod || '';
            document.getElementById('expenseInvoiceId').value = expense.invoiceId || '';
        }
    } else {
        title.textContent = 'Add Expense';
        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('expenseDate').value = today;
        document.getElementById('expenseCategory').value = '';
        document.getElementById('expenseCategoryOther').style.display = 'none';
        document.getElementById('expenseCategoryOther').value = '';
        document.getElementById('expenseDescription').value = '';
        document.getElementById('expenseAmount').value = '';
        document.getElementById('expensePaymentMethod').value = '';
        document.getElementById('expenseInvoiceId').value = '';
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Close expense form
function closeExpenseForm() {
    document.getElementById('expenseModal').style.display = 'none';
    document.body.style.overflow = '';
    currentEditingExpenseId = null;
}

// Save expense
function saveExpense() {
    const date = document.getElementById('expenseDate').value;
    const category = getSelectValue('expenseCategory');
    const description = document.getElementById('expenseDescription').value.trim();
    const amount = parseFloat(document.getElementById('expenseAmount').value);
    const paymentMethod = document.getElementById('expensePaymentMethod').value.trim();
    const invoiceId = document.getElementById('expenseInvoiceId').value.trim();
    
    if (!date || !category || !description || !amount || amount <= 0) {
        showToast('Please fill all required fields with valid values', 'warning');
        return;
    }
    
    if (currentEditingExpenseId) {
        // Update existing expense
        const index = expenses.findIndex(e => e.id === currentEditingExpenseId);
        if (index > -1) {
            expenses[index] = {
                id: currentEditingExpenseId,
                date,
                category,
                description,
                amount,
                paymentMethod: paymentMethod || undefined,
                invoiceId: invoiceId || undefined
            };
        }
        showToast('Expense updated successfully', 'success');
    } else {
        // Add new expense
        const newExpense = {
            id: invoiceId || 'EXP-' + Date.now(),
            date,
            category,
            description,
            amount,
            paymentMethod: paymentMethod || undefined,
            invoiceId: invoiceId || undefined
        };
        expenses.push(newExpense);
        showToast('Expense added successfully', 'success');
    }
    
    saveExpenses();
    closeExpenseForm();
    renderExpenseTable();
    updateSummaryStats();
    
    // Update profit-loss view if it's currently active
    const currentView = localStorage.getItem('selectedFinanceView') || 'income';
    if (currentView === 'profit-loss') {
        renderProfitLossView();
    }
}

// Edit expense
function editExpense(expenseId) {
    openExpenseForm(expenseId);
}

// Delete expense
function deleteExpense(expenseId) {
    const expense = expenses.find(e => e.id === expenseId);
    if (!expense) return;
    
    showConfirmDialog({
        title: 'Delete Expense',
        message: `Are you sure you want to delete this expense: "${expense.description}"?`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        buttonStyle: 'danger',
        onConfirm: () => {
            expenses = expenses.filter(e => e.id !== expenseId);
            saveExpenses();
            renderExpenseTable();
            updateSummaryStats();
            showToast('Expense deleted successfully', 'success');
        }
    });
}

// Close modal on overlay click
document.getElementById('expenseModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeExpenseForm();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        if (document.getElementById('expenseModal').style.display === 'flex') {
            closeExpenseForm();
        }
        if (document.getElementById('incomeModal').style.display === 'flex') {
            closeIncomeForm();
        }
    }
});

// Open income form
function openIncomeForm(incomeId = null) {
    currentEditingIncomeId = incomeId;
    const modal = document.getElementById('incomeModal');
    const title = document.getElementById('incomeModalTitle');
    
    if (incomeId) {
        title.textContent = 'Edit Income';
        const income = customIncome.find(i => i.id === incomeId);
        if (income) {
            document.getElementById('incomeDate').value = income.date;
            const categorySelect = document.getElementById('incomeCategory');
            const categoryOtherInput = document.getElementById('incomeCategoryOther');
            
            // Check if category is in the predefined options (support both category and source for backward compatibility)
            const category = income.category || income.source;
            const predefinedCategories = ['School Fees', 'Additional Fees', 'Donations', 'Grants'];
            if (predefinedCategories.includes(category)) {
                categorySelect.value = category;
                categoryOtherInput.style.display = 'none';
                categoryOtherInput.value = '';
            } else {
                categorySelect.value = 'Other';
                categoryOtherInput.style.display = 'block';
                categoryOtherInput.value = category || '';
            }
            
            document.getElementById('incomeDescription').value = income.description;
            document.getElementById('incomeAmount').value = income.amount;
            document.getElementById('incomeInvoiceId').value = income.invoiceId || '';
            document.getElementById('incomeGradeClass').value = income.gradeClass || (income.grade && income.class ? `Grade ${income.grade}-${income.class}` : '');
            document.getElementById('incomePaymentType').value = income.paymentType || '';
        }
    } else {
        title.textContent = 'Add Income';
        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('incomeDate').value = today;
        document.getElementById('incomeCategory').value = '';
        document.getElementById('incomeCategoryOther').style.display = 'none';
        document.getElementById('incomeCategoryOther').value = '';
        document.getElementById('incomeDescription').value = '';
        document.getElementById('incomeAmount').value = '';
        document.getElementById('incomeInvoiceId').value = '';
        document.getElementById('incomeGradeClass').value = '';
        document.getElementById('incomePaymentType').value = '';
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Close income form
function closeIncomeForm() {
    document.getElementById('incomeModal').style.display = 'none';
    document.body.style.overflow = '';
    currentEditingIncomeId = null;
}

// Save income
function saveIncome() {
    const date = document.getElementById('incomeDate').value;
    const category = getSelectValue('incomeCategory');
    const description = document.getElementById('incomeDescription').value.trim();
    const amount = parseFloat(document.getElementById('incomeAmount').value);
    const invoiceId = document.getElementById('incomeInvoiceId').value.trim();
    const gradeClass = document.getElementById('incomeGradeClass').value.trim();
    const paymentType = document.getElementById('incomePaymentType').value.trim();
    
    if (!date || !category || !description || !amount || amount <= 0) {
        showToast('Please fill all required fields with valid values', 'warning');
        return;
    }
    
    // Parse grade and class from gradeClass input if provided
    let grade = '';
    let classValue = '';
    if (gradeClass) {
        const match = gradeClass.match(/Grade\s*(\d+)[-\s]+([A-Z0-9]+)/i);
        if (match) {
            grade = match[1];
            classValue = match[2];
        }
    }
    
    if (currentEditingIncomeId) {
        // Update existing income
        const index = customIncome.findIndex(i => i.id === currentEditingIncomeId);
        if (index > -1) {
            customIncome[index] = {
                id: currentEditingIncomeId,
                date,
                category,
                source: category, // Keep source for backward compatibility
                description,
                amount,
                invoiceId: invoiceId || undefined,
                gradeClass: gradeClass || undefined,
                grade: grade || undefined,
                class: classValue || undefined,
                paymentType: paymentType || undefined
            };
        }
        showToast('Income updated successfully', 'success');
    } else {
        // Add new income
        const newIncome = {
            id: invoiceId || 'INC-' + Date.now(),
            date,
            category,
            source: category, // Keep source for backward compatibility
            description,
            amount,
            invoiceId: invoiceId || undefined,
            gradeClass: gradeClass || undefined,
            grade: grade || undefined,
            class: classValue || undefined,
            paymentType: paymentType || undefined
        };
        customIncome.push(newIncome);
        showToast('Income added successfully', 'success');
    }
    
    saveCustomIncome();
    closeIncomeForm();
    loadIncomeData();
    updateSummaryStats();
    
    // Update profit-loss view if it's currently active
    const currentView = localStorage.getItem('selectedFinanceView') || 'income';
    if (currentView === 'profit-loss') {
        renderProfitLossView();
    }
}

// Edit income
function editIncome(incomeId) {
    openIncomeForm(incomeId);
}

// Delete income
function deleteIncome(incomeId) {
    const income = customIncome.find(i => i.id === incomeId);
    if (!income) return;
    
    showConfirmDialog({
        title: 'Delete Income',
        message: `Are you sure you want to delete this income: "${income.description}"?`,
        confirmText: 'Delete',
        confirmIcon: 'fas fa-trash',
        buttonStyle: 'danger',
        onConfirm: () => {
            customIncome = customIncome.filter(i => i.id !== incomeId);
            saveCustomIncome();
            loadIncomeData();
            updateSummaryStats();
            showToast('Income deleted successfully', 'success');
        }
    });
}

// Close income modal on overlay click
document.getElementById('incomeModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeIncomeForm();
    }
});

// Finance View Switching
function switchFinanceView(view) {
    // Hide all views
    document.querySelectorAll('.attendance-view-content').forEach(content => {
        content.style.display = 'none';
    });
    
    // Remove active class from all tabs
    document.querySelectorAll('.view-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected view
    const selectedView = document.getElementById(view + '-finance-view');
    if (selectedView) {
        selectedView.style.display = 'block';
    }
    
    // Add active class to selected tab
    const selectedTab = document.querySelector(`.view-tab[data-view="${view}"]`);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Sync all month selectors when switching views
    const monthFilter = document.getElementById('monthYearFilter');
    const monthFilterExpenses = document.getElementById('monthYearFilterExpenses');
    const monthFilterProfitLoss = document.getElementById('monthYearFilterProfitLoss');
    
    if (monthFilter && monthFilterExpenses) {
        monthFilterExpenses.value = monthFilter.value;
    }
    if (monthFilter && monthFilterProfitLoss) {
        monthFilterProfitLoss.value = monthFilter.value;
    }
    
    // Load profit-loss data if switching to profit-loss view
    if (view === 'profit-loss') {
        renderProfitLossView();
    }
    
    // Store selected view
    localStorage.setItem('selectedFinanceView', view);
}

// Render Profit & Loss View
function renderProfitLossView() {
    // Get totals
    const totalIncomeText = document.getElementById('totalIncome').textContent;
    const totalExpensesText = document.getElementById('totalExpenses').textContent;
    const totalIncome = parseFloat(totalIncomeText.replace('$', '').replace(',', '')) || 0;
    const totalExpenses = parseFloat(totalExpensesText.replace('$', '').replace(',', '')) || 0;
    const netProfitLoss = totalIncome - totalExpenses;
    
    // Update summary cards
    document.getElementById('profitLossIncome').textContent = '$' + totalIncome.toFixed(2);
    document.getElementById('profitLossExpenses').textContent = '$' + totalExpenses.toFixed(2);
    document.getElementById('profitLossNet').textContent = '$' + netProfitLoss.toFixed(2);
    
    // Update net card styling based on profit/loss
    const netCard = document.getElementById('profitLossNetCard');
    const netAmount = document.getElementById('profitLossNet');
    if (netProfitLoss >= 0) {
        netCard.style.background = '#ecfdf5';
        netCard.style.borderColor = '#10b981';
        netAmount.style.color = '#065f46';
    } else {
        netCard.style.background = '#fef2f2';
        netCard.style.borderColor = '#ef4444';
        netAmount.style.color = '#991b1b';
    }
    
    // Render both tables
    updateMonthlyProfitLossTable();
    updateAnnualProfitLossTable();
}

// Update Monthly Profit & Loss Table
function updateMonthlyProfitLossTable() {
    const monthFilter = document.getElementById('monthYearFilterProfitLoss');
    const selectedMonthValue = monthFilter ? monthFilter.value : selectedMonth;
    
    // Get income by source for selected month
    const invoiceData = JSON.parse(localStorage.getItem('invoiceData') || '[]');
    const invoiceHistory = JSON.parse(localStorage.getItem('invoiceHistory') || '[]');
    const allInvoices = [...invoiceData, ...invoiceHistory];
    
    const monthInvoices = allInvoices.filter(invoice => {
        const invoiceMonth = invoice.month || extractMonthFromInvoiceId(invoice.id);
        return invoiceMonth === selectedMonthValue && invoice.status === 'paid';
    });
    
    const monthCustomIncome = customIncome.filter(income => {
        const incomeMonth = income.date.substring(0, 7);
        return incomeMonth === selectedMonthValue;
    });
    
    // Group income by source
    const incomeByCategory = {};
    monthInvoices.forEach(inv => {
        const category = 'School Fees';
        if (!incomeByCategory[category]) {
            incomeByCategory[category] = 0;
        }
        incomeByCategory[category] += (inv.amount || 0);
    });
    
    monthCustomIncome.forEach(inc => {
        const category = inc.category || inc.source || 'Other';
        if (!incomeByCategory[category]) {
            incomeByCategory[category] = 0;
        }
        incomeByCategory[category] += (inc.amount || 0);
    });
    
    // Group expenses by category
    const monthExpenses = expenses.filter(exp => {
        const expenseMonth = exp.date.substring(0, 7);
        return expenseMonth === selectedMonthValue;
    });
    
    const expensesByCategory = {};
    monthExpenses.forEach(exp => {
        const category = exp.category || 'Other';
        if (!expensesByCategory[category]) {
            expensesByCategory[category] = 0;
        }
        expensesByCategory[category] += (exp.amount || 0);
    });
    
    // Calculate totals
    const totalIncome = Object.values(incomeByCategory).reduce((sum, val) => sum + val, 0);
    const totalExpenses = Object.values(expensesByCategory).reduce((sum, val) => sum + val, 0);
    const netProfitLoss = totalIncome - totalExpenses;
    
    // Combine all categories
    const allCategories = new Set([
        ...Object.keys(incomeByCategory),
        ...Object.keys(expensesByCategory)
    ]);
    
    const monthlyTbody = document.getElementById('monthlyProfitLossTableBody');
    
    if (allCategories.size === 0 && totalIncome === 0 && totalExpenses === 0) {
        if (monthlyTbody) {
            monthlyTbody.innerHTML = `
                <tr>
                    <td colspan="5" style="text-align: center; color: #999; padding: 40px;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                        No data available for selected month
                    </td>
                </tr>
            `;
        }
        return;
    }
    
    let monthlyTableRows = '';
    
    // Add overall summary row
    monthlyTableRows += `
        <tr style="background: #f9fafb; font-weight: 600;">
            <td><strong>Total</strong></td>
            <td><strong style="color: #10b981;">$${totalIncome.toFixed(2)}</strong></td>
            <td><strong style="color: #ef4444;">$${totalExpenses.toFixed(2)}</strong></td>
            <td><strong style="color: ${netProfitLoss >= 0 ? '#10b981' : '#ef4444'};">$${netProfitLoss.toFixed(2)}</strong></td>
            <td><strong>${totalIncome > 0 ? ((netProfitLoss / totalIncome) * 100).toFixed(1) : '0.0'}%</strong></td>
        </tr>
    `;
    
    // Add category rows
    Array.from(allCategories).sort().forEach(category => {
        const categoryIncome = incomeByCategory[category] || 0;
        const categoryExpenses = expensesByCategory[category] || 0;
        const categoryNet = categoryIncome - categoryExpenses;
        const percentage = totalIncome > 0 ? ((categoryNet / totalIncome) * 100).toFixed(1) : '0.0';
        
        monthlyTableRows += `
            <tr>
                <td>${category}</td>
                <td style="color: #10b981;">${categoryIncome > 0 ? '$' + categoryIncome.toFixed(2) : '-'}</td>
                <td style="color: #ef4444;">${categoryExpenses > 0 ? '$' + categoryExpenses.toFixed(2) : '-'}</td>
                <td style="color: ${categoryNet >= 0 ? '#10b981' : '#ef4444'}; font-weight: 600;">$${categoryNet.toFixed(2)}</td>
                <td>${percentage}%</td>
            </tr>
        `;
    });
    
    if (monthlyTbody) monthlyTbody.innerHTML = monthlyTableRows;
}

// Update Annual Profit & Loss Table
function updateAnnualProfitLossTable() {
    const yearFilter = document.getElementById('yearFilterProfitLoss');
    const selectedYear = yearFilter ? yearFilter.value : new Date().getFullYear().toString();
    
    // Get all invoices and income
    const invoiceData = JSON.parse(localStorage.getItem('invoiceData') || '[]');
    const invoiceHistory = JSON.parse(localStorage.getItem('invoiceHistory') || '[]');
    const allInvoices = [...invoiceData, ...invoiceHistory];
    
    // Generate all months for the selected year
    const allMonths = [];
    for (let month = 1; month <= 12; month++) {
        const monthStr = String(month).padStart(2, '0');
        allMonths.push(`${selectedYear}-${monthStr}`);
    }
    
    const annualIncomeByCategory = {};
    const annualExpensesByCategory = {};
    let annualTotalIncome = 0;
    let annualTotalExpenses = 0;
    
    allMonths.forEach(month => {
        // Get income for this month
        const monthInvoices = allInvoices.filter(invoice => {
            const invoiceMonth = invoice.month || extractMonthFromInvoiceId(invoice.id);
            return invoiceMonth === month && invoice.status === 'paid';
        });
        const monthCustomIncome = customIncome.filter(income => {
            const incomeMonth = income.date.substring(0, 7);
            return incomeMonth === month;
        });
        
        monthInvoices.forEach(inv => {
            const category = 'School Fees';
            if (!annualIncomeByCategory[category]) annualIncomeByCategory[category] = 0;
            annualIncomeByCategory[category] += (inv.amount || 0);
            annualTotalIncome += (inv.amount || 0);
        });
        
        monthCustomIncome.forEach(inc => {
            const category = inc.category || inc.source || 'Other';
            if (!annualIncomeByCategory[category]) annualIncomeByCategory[category] = 0;
            annualIncomeByCategory[category] += (inc.amount || 0);
            annualTotalIncome += (inc.amount || 0);
        });
        
        // Get expenses for this month
        const monthExpenses = expenses.filter(exp => {
            const expenseMonth = exp.date.substring(0, 7);
            return expenseMonth === month;
        });
        
        monthExpenses.forEach(exp => {
            const category = exp.category || 'Other';
            if (!annualExpensesByCategory[category]) annualExpensesByCategory[category] = 0;
            annualExpensesByCategory[category] += (exp.amount || 0);
            annualTotalExpenses += (exp.amount || 0);
        });
    });
    
    const annualAllCategories = new Set([
        ...Object.keys(annualIncomeByCategory),
        ...Object.keys(annualExpensesByCategory)
    ]);
    
    const annualNetProfitLoss = annualTotalIncome - annualTotalExpenses;
    
    const annualTbody = document.getElementById('annualProfitLossTableBody');
    
    if (annualAllCategories.size === 0 && annualTotalIncome === 0 && annualTotalExpenses === 0) {
        if (annualTbody) {
            annualTbody.innerHTML = `
                <tr>
                    <td colspan="5" style="text-align: center; color: #999; padding: 40px;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                        No annual data available for selected year
                    </td>
                </tr>
            `;
        }
        return;
    }
    
    let annualTableRows = '';
    
    // Add overall summary row
    annualTableRows += `
        <tr style="background: #f9fafb; font-weight: 600;">
            <td><strong>Total</strong></td>
            <td><strong style="color: #10b981;">$${annualTotalIncome.toFixed(2)}</strong></td>
            <td><strong style="color: #ef4444;">$${annualTotalExpenses.toFixed(2)}</strong></td>
            <td><strong style="color: ${annualNetProfitLoss >= 0 ? '#10b981' : '#ef4444'};">$${annualNetProfitLoss.toFixed(2)}</strong></td>
            <td><strong>${annualTotalIncome > 0 ? ((annualNetProfitLoss / annualTotalIncome) * 100).toFixed(1) : '0.0'}%</strong></td>
        </tr>
    `;
    
    // Add category rows
    Array.from(annualAllCategories).sort().forEach(category => {
        const categoryIncome = annualIncomeByCategory[category] || 0;
        const categoryExpenses = annualExpensesByCategory[category] || 0;
        const categoryNet = categoryIncome - categoryExpenses;
        const percentage = annualTotalIncome > 0 ? ((categoryNet / annualTotalIncome) * 100).toFixed(1) : '0.0';
        
        annualTableRows += `
            <tr>
                <td>${category}</td>
                <td style="color: #10b981;">${categoryIncome > 0 ? '$' + categoryIncome.toFixed(2) : '-'}</td>
                <td style="color: #ef4444;">${categoryExpenses > 0 ? '$' + categoryExpenses.toFixed(2) : '-'}</td>
                <td style="color: ${categoryNet >= 0 ? '#10b981' : '#ef4444'}; font-weight: 600;">$${categoryNet.toFixed(2)}</td>
                <td>${percentage}%</td>
            </tr>
        `;
    });
    
    if (annualTbody) annualTbody.innerHTML = annualTableRows;
}
</script>

<style>
/* Finance Tabs Styling */
.attendance-view-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
    border-bottom: 2px solid #e5e7eb;
}

.view-tab {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.view-tab:hover {
    color: #4A90E2;
    background: #f9fafb;
}

.view-tab.active {
    color: #4A90E2;
    border-bottom-color: #4A90E2;
}

.view-tab i {
    font-size: 16px;
}

.attendance-view-content {
    animation: fadeIn 0.3s ease-in-out;
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
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>
