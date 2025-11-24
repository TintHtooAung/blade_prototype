/**
 * Shared UI Components
 * Reusable UI components for consistent design
 */

class UIComponents {
    constructor() {
        this.feeManagement = new FeeManagement();
    }

    // Generate Status Badge
    generateStatusBadge(status) {
        const statusText = status === 'draft' ? 'Draft' : 
                          status === 'paid' ? 'Paid' : 'Pending';
        return `<span class="status-badge ${status}">${statusText}</span>`;
    }

    // Generate Action Buttons
    generateActionButtons(invoice, type = 'main') {
        const isDraft = invoice.status === 'draft';
        const baseActions = `
            <button class="simple-btn-icon" onclick="viewInvoiceDetails('${invoice.id}')" title="View Details">
                <i class="fas fa-eye"></i>
            </button>
        `;

        if (isDraft) {
            return baseActions + `
                <button class="simple-btn-icon" onclick="editInvoiceDetails('${invoice.id}')" title="Edit">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="simple-btn-icon" onclick="processPayment('${invoice.id}')" title="Process Payment">
                    <i class="fas fa-money-check-alt"></i>
                </button>
            `;
        } else {
            return baseActions + `
                <button class="simple-btn-icon" onclick="viewPaymentReceipt('${invoice.id}')" title="View Payment Receipt">
                    <i class="fas fa-receipt"></i>
                </button>
            `;
        }
    }

    // Generate Additional Fee Action Buttons
    generateAdditionalFeeActionButtons(invoice) {
        const isDraft = invoice.status === 'draft';
        const baseActions = `
            <button class="simple-btn-icon" onclick="viewAdditionalFeeInvoiceDetails('${invoice.id}')" title="View Details">
                <i class="fas fa-eye"></i>
            </button>
        `;

        if (isDraft) {
            return baseActions + `
                <button class="simple-btn-icon" onclick="editAdditionalFeeInvoice('${invoice.id}')" title="Edit">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="simple-btn-icon" onclick="processAdditionalFeePayment('${invoice.id}')" title="Process Payment">
                    <i class="fas fa-money-check-alt"></i>
                </button>
            `;
        } else {
            return baseActions + `
                <button class="simple-btn-icon" onclick="viewAdditionalFeePaymentReceipt('${invoice.id}')" title="View Payment Receipt">
                    <i class="fas fa-receipt"></i>
                </button>
            `;
        }
    }

    // Generate Table Row for Main Invoices
    generateMainInvoiceRow(invoice) {
        return `
            <tr>
                <td><strong><a href="/admin/invoice-details?id=${invoice.id}" class="invoice-link">${invoice.id}</a></strong></td>
                <td>${invoice.studentId}</td>
                <td>${invoice.name}</td>
                <td>Grade ${invoice.grade}-${invoice.class}</td>
                <td><strong>$${invoice.amount.toFixed(2)}</strong></td>
                <td>${invoice.paymentType}</td>
                <td>${this.generateStatusBadge(invoice.status)}</td>
                <td>${invoice.paidBy ? `${invoice.paidBy}<br><small style="color:#999;">${invoice.paidTime}</small>` : '-'}</td>
                <td>${this.generateActionButtons(invoice)}</td>
            </tr>
        `;
    }

    // Generate Table Row for Additional Fee Invoices
    generateAdditionalFeeInvoiceRow(invoice) {
        return `
            <tr>
                <td><strong><a href="/admin/invoice-details?id=${invoice.id}" class="invoice-link">${invoice.id}</a></strong></td>
                <td>${invoice.studentId}</td>
                <td>${invoice.name}</td>
                <td>Grade ${invoice.grade}-${invoice.class}</td>
                <td><strong>${invoice.feeName}</strong></td>
                <td>${this.feeManagement.generateFeeTypeBadge(invoice.feeType)}</td>
                <td><strong>$${invoice.amount.toFixed(2)}</strong></td>
                <td>${this.generateStatusBadge(invoice.status)}</td>
                <td>${invoice.paidBy ? `${invoice.paidBy}<br><small style="color:#999;">${invoice.paidTime}</small>` : '-'}</td>
                <td>${this.generateAdditionalFeeActionButtons(invoice)}</td>
            </tr>
        `;
    }

    // Generate Empty State Row
    generateEmptyStateRow(colspan, message, icon = 'fas fa-inbox') {
        return `
            <tr class="no-data-row">
                <td colspan="${colspan}" style="text-align: center; color: #999; padding: 40px;">
                    <i class="${icon}" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                    ${message}
                </td>
            </tr>
        `;
    }

    // Generate Payment Receipt Dialog
    generatePaymentReceiptDialog(invoice, isAdditionalFee = false) {
        const title = isAdditionalFee ? 'Payment Receipt - Additional Fee' : 'Payment Receipt';
        const feeNameRow = isAdditionalFee ? `
            <div class="receipt-row">
                <span class="receipt-label">Fee Name:</span>
                <span class="receipt-value">${invoice.feeName}</span>
            </div>
        ` : '';

        return `
            <div class="receipt-dialog-overlay">
                <div class="receipt-dialog-content">
                    <div class="receipt-dialog-header">
                        <h3><i class="fas fa-receipt"></i> ${title}</h3>
                        <button class="receipt-close" onclick="this.closest('.receipt-dialog-overlay').remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="receipt-dialog-body">
                        <div class="receipt-info">
                            <div class="receipt-row">
                                <span class="receipt-label">Invoice Number:</span>
                                <span class="receipt-value">${invoice.id}</span>
                            </div>
                            <div class="receipt-row">
                                <span class="receipt-label">Student Name:</span>
                                <span class="receipt-value">${invoice.name}</span>
                            </div>
                            ${feeNameRow}
                            <div class="receipt-row">
                                <span class="receipt-label">Amount:</span>
                                <span class="receipt-value">$${invoice.amount.toFixed(2)}</span>
                            </div>
                            <div class="receipt-row">
                                <span class="receipt-label">Payment Type:</span>
                                <span class="receipt-value">${invoice.paymentType}</span>
                            </div>
                            <div class="receipt-row">
                                <span class="receipt-label">Processed By:</span>
                                <span class="receipt-value">${invoice.paidBy}</span>
                            </div>
                            <div class="receipt-row">
                                <span class="receipt-label">Payment Time:</span>
                                <span class="receipt-value">${invoice.paidTime}</span>
                            </div>
                        </div>
                    </div>
                    <div class="receipt-dialog-actions">
                        <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                            <i class="fas fa-times"></i> Close
                        </button>
                        <button class="simple-btn primary" onclick="printReceipt('${invoice.id}', ${isAdditionalFee})">
                            <i class="fas fa-print"></i> Print Receipt
                        </button>
                    </div>
                </div>
            </div>
        `;
    }
}

// Export for use in other modules
window.UIComponents = UIComponents;

/**
 * Handle "Other" option in select inputs
 * Shows/hides a text input when "Other" is selected
 * @param {HTMLElement} selectElement - The select element
 * @param {string} otherInputId - The ID of the text input for "Other" option
 */
function handleOtherSelect(selectElement, otherInputId) {
    const otherInput = document.getElementById(otherInputId);
    if (!otherInput) return;
    
    const value = selectElement.value.toLowerCase();
    if (value === 'other') {
        otherInput.style.display = 'block';
        otherInput.required = true;
        otherInput.focus();
    } else {
        otherInput.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}

/**
 * Update select value when user types in "Other" input
 * @param {string} selectId - The ID of the select element
 * @param {string} value - The value typed by the user
 */
function updateOtherSelectValue(selectId, value) {
    const select = document.getElementById(selectId);
    if (select) {
        const selectValue = select.value.toLowerCase();
        if (selectValue === 'other') {
            select.setAttribute('data-custom-value', value);
        }
    }
}

/**
 * Get the actual value from select (handles "Other" option)
 * @param {string} selectId - The ID of the select element
 * @returns {string} The actual value (custom value if "Other" is selected)
 */
function getSelectValue(selectId) {
    const select = document.getElementById(selectId);
    if (!select) return '';
    
    const value = select.value.toLowerCase();
    if (value === 'other') {
        const otherInputId = selectId + 'Other';
        const otherInput = document.getElementById(otherInputId);
        return otherInput && otherInput.value.trim() ? otherInput.value.trim() : select.value;
    }
    return select.value;
}

/**
 * Initialize "Other" select functionality for all selects with "Other" option
 * Call this function on page load to automatically set up all selects
 */
function initializeOtherSelects() {
    document.querySelectorAll('select').forEach(select => {
        const options = Array.from(select.options);
        const hasOtherOption = options.some(opt => {
            const val = opt.value.toLowerCase();
            return val === 'other';
        });
        
        if (hasOtherOption) {
            const selectId = select.id;
            if (!selectId) return; // Skip selects without IDs
            
            const otherInputId = selectId + 'Other';
            
            // Check if other input already exists
            if (!document.getElementById(otherInputId)) {
                // Create the other input element
                const otherInput = document.createElement('input');
                otherInput.type = 'text';
                otherInput.id = otherInputId;
                otherInput.className = select.className.replace('form-select', 'form-input').replace('form-input', 'form-input');
                otherInput.style.display = 'none';
                otherInput.style.marginTop = '8px';
                otherInput.placeholder = 'Specify ' + (select.previousElementSibling?.textContent?.replace('*', '').trim() || 'value');
                
                // Insert after the select
                select.parentNode.insertBefore(otherInput, select.nextSibling);
            }
            
            // Add change event listener
            select.addEventListener('change', function() {
                handleOtherSelect(this, otherInputId);
            });
            
            // Add input event listener to other input
            const otherInput = document.getElementById(otherInputId);
            if (otherInput) {
                otherInput.addEventListener('input', function() {
                    updateOtherSelectValue(selectId, this.value);
                });
            }
        }
    });
}

// Auto-initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeOtherSelects);
} else {
    initializeOtherSelects();
}
