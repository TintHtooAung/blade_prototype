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
