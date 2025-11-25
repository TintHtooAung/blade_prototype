/**
 * Student Fee Management Page JavaScript
 * Complete functionality with all original data and features
 */

// Global variables
let invoiceData = [];
let currentPaymentId = null;

// Students database
const studentsDatabase = [
    {id: 'S001', name: 'Alice Johnson', grade: 10, class: 'A', amount: 500, paymentType: 'Bank Transfer'},
    {id: 'S002', name: 'Michael Brown', grade: 12, class: 'B', amount: 500, paymentType: 'Bank Transfer'},
    {id: 'S003', name: 'Sarah Wilson', grade: 9, class: 'C', amount: 500, paymentType: 'Cash'},
    {id: 'S004', name: 'David Lee', grade: 11, class: 'A', amount: 500, paymentType: 'K-Pay'},
    {id: 'S005', name: 'Emma Davis', grade: 8, class: 'B', amount: 500, paymentType: 'Bank Transfer'},
    {id: 'S006', name: 'James Wilson', grade: 10, class: 'B', amount: 500, paymentType: 'Cash'},
    {id: 'S007', name: 'Olivia Taylor', grade: 9, class: 'A', amount: 500, paymentType: 'K-Pay'},
    {id: 'S008', name: 'Noah Anderson', grade: 12, class: 'C', amount: 500, paymentType: 'Bank Transfer'},
];

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadData();
    populateMonthFilter();
    renderInvoiceTable();
    updateStats();
});

// Load all data from localStorage
function loadData() {
    // Load main invoices
    const savedInvoices = localStorage.getItem('invoiceData');
    if (savedInvoices) {
        invoiceData = JSON.parse(savedInvoices);
        // Add missing fields to existing invoices if missing (backward compatibility)
        invoiceData.forEach(invoice => {
            if (!invoice.month) {
                const monthMatch = invoice.id.match(/INV-\d{4}-(\d{2})/);
                if (monthMatch) {
                    invoice.month = monthMatch[1];
                    invoice.year = parseInt(invoice.id.match(/INV-(\d{4})/)[1]);
                }
            }
            // Add academicYear if missing
            if (!invoice.academicYear && invoice.year) {
                invoice.academicYear = `${invoice.year}-${invoice.year + 1}`;
            }
            // Add paidAmount if missing
            if (invoice.paidAmount === undefined) {
                invoice.paidAmount = invoice.status === 'paid' ? (invoice.amount || 0) : 0;
            }
            // Add paymentDate if missing but paidTime exists
            if (!invoice.paymentDate && invoice.paidTime) {
                invoice.paymentDate = invoice.paidTime.split(' ')[0];
            }
            // Add remark if missing
            if (!invoice.remark) {
                invoice.remark = invoice.paymentNotes || '';
            }
        });
        // Save updated data back to localStorage
        localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
        document.getElementById('generateBtn').style.display = 'none';
    }
}

// Populate month filter with available months from invoice data
function populateMonthFilter() {
    const monthFilter = document.getElementById('monthFilter');
    if (!monthFilter) return;
    
    // Get unique months from invoice data
    const monthSet = new Set();
    invoiceData.forEach(invoice => {
        const month = invoice.month || (invoice.id.match(/INV-\d{4}-(\d{2})/) ? invoice.id.match(/INV-\d{4}-(\d{2})/)[1] : null);
        const year = invoice.year || (invoice.id.match(/INV-(\d{4})/) ? parseInt(invoice.id.match(/INV-(\d{4})/)[1]) : null);
        if (month && year) {
            monthSet.add(`${year}-${month}`);
        }
    });
    
    // Sort months (newest first)
    const sortedMonths = Array.from(monthSet).sort((a, b) => b.localeCompare(a));
    
    // Month names for display
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
    
    // Clear existing options except "All Months"
    monthFilter.innerHTML = '<option value="all">All Months</option>';
    
    // Add month options
    sortedMonths.forEach(monthKey => {
        const [year, month] = monthKey.split('-');
        const monthIndex = parseInt(month) - 1;
        const monthName = monthNames[monthIndex];
        const option = document.createElement('option');
        option.value = monthKey; // Use YYYY-MM format for value
        option.textContent = `${monthName} ${year}`;
        monthFilter.appendChild(option);
    });
}

// Main Invoice Functions
function generateInvoices() {
    const now = new Date();
    const currentYear = now.getFullYear();
    const currentMonth = String(now.getMonth() + 1).padStart(2, '0');
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthName = monthNames[now.getMonth()];
    
    if (!confirm(`Generate invoices for all students for ${monthName} ${currentYear}?\n\nThis will create invoice entries based on configured fee structures for all active students.`)) {
        return;
    }
    
    // Load fee structures
    const schoolFees = JSON.parse(localStorage.getItem('schoolFees') || '{}');
    
    invoiceData = [];
    let idCounter = 1;
    
    studentsDatabase.forEach(student => {
        const gradeName = `Grade ${student.grade}`;
        const monthlyFee = schoolFees[gradeName] || 500.00;
        
        // Build fee breakdown (only school fees)
        let feeBreakdown = [
            { name: 'Monthly Tuition', amount: monthlyFee, category: 'recurring' }
        ];
        
        // Calculate total amount
        const totalAmount = feeBreakdown.reduce((sum, fee) => sum + fee.amount, 0);
        
        invoiceData.push({
            id: `INV-${currentYear}-${currentMonth}-` + String(idCounter++).padStart(3, '0'),
            studentId: student.id,
            name: student.name,
            grade: student.grade,
            class: student.class,
            amount: totalAmount,
            paidAmount: 0,
            feeBreakdown: feeBreakdown,
            month: currentMonth,
            year: currentYear,
            academicYear: `${currentYear}-${currentYear + 1}`,
            paymentType: null,
            status: 'draft',
            paidBy: null,
            paidTime: null,
            paymentDate: null,
            remark: ''
        });
    });
    
    document.getElementById('generateBtn').style.display = 'none';
    
    // Save to localStorage
    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    
    populateMonthFilter();
    renderInvoiceTable();
    updateStats();
    showActionStatus(`${invoiceData.length} invoices generated successfully for ${monthName} ${currentYear} based on configured fee structures`, 'success');
}

// Column group expand/collapse state - must be defined before renderInvoiceTable
const feeColumnGroups = {
    student: true,    // true = expanded, false = collapsed
    invoice: true,
    payment: true,
    additional: true
};

function renderInvoiceTable() {
    const tbody = document.getElementById('invoiceTableBody');
    
    if (invoiceData.length === 0) {
        // Calculate colspan based on collapsed state
        let colspan = 1; // No.
        colspan += feeColumnGroups.student ? 3 : 1;
        colspan += feeColumnGroups.invoice ? 2 : 1;
        colspan += feeColumnGroups.payment ? 2 : 1;
        colspan += feeColumnGroups.additional ? 2 : 1;
        colspan += 2; // Status, Actions
        
        tbody.innerHTML = `<tr class="no-data-row"><td colspan="${colspan}" style="text-align:center; padding:40px; color:#999;"><i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>No invoices generated yet. Click "Generate Invoices" to create invoices for all students this month.</td></tr>`;
        return;
    }

    let filteredData = applyDataFilters();
    
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
    
    tbody.innerHTML = filteredData.map((invoice, index) => {
        const isDraft = invoice.status === 'draft';
        const statusText = invoice.status === 'draft' ? 'Draft' : invoice.status === 'paid' ? 'Paid' : invoice.status;
        const statusClass = invoice.status === 'draft' ? 'warning' : invoice.status === 'paid' ? 'active' : '';
        let monthName = '-';
        if (invoice.month) {
            const monthParts = invoice.month.split('-');
            if (monthParts.length >= 2) {
                const monthNum = parseInt(monthParts[1]);
                monthName = monthNames[monthNum - 1] || '-';
            }
        }
        const academicYear = invoice.academicYear || (invoice.year ? `${invoice.year}-${invoice.year + 1}` : '-');
        const paidAmount = invoice.paidAmount || (invoice.status === 'paid' ? invoice.amount : 0);
        const paymentDate = invoice.paymentDate || (invoice.paidTime ? invoice.paidTime.split(' ')[0] : '-');
        const paymentMethod = invoice.paymentType || '-';
        
        // Determine display state for expandable cells
        const studentExpanded = feeColumnGroups.student;
        const invoiceExpanded = feeColumnGroups.invoice;
        const paymentExpanded = feeColumnGroups.payment;
        const additionalExpanded = feeColumnGroups.additional;
        
        const actions = isDraft ? `
            <div style="display: flex; gap: 6px; justify-content: center;">
                <button class="fee-action-btn process-btn" onclick="processPayment('${invoice.id}')" title="Process Payment">
                    <i class="fas fa-money-check-alt"></i> Pay
                </button>
            </div>
        ` : `
            <div style="display: flex; gap: 6px; justify-content: center;">
                <button class="fee-action-btn view-btn" onclick="viewInvoiceReceipt('${invoice.id}')" title="View Receipt">
                    <i class="fas fa-eye"></i> View
                </button>
            </div>
        `;

        return `
            <tr class="fee-row" data-invoice-id="${invoice.id}">
                <td>${index + 1}</td>
                <!-- Student Info Group Columns -->
                <td class="col-student expandable" data-group="student" style="display: ${studentExpanded ? '' : 'none'};">
                    <div style="display: flex; flex-direction: column;">
                        <strong style="font-size: 14px; color: #111827; margin-bottom: 2px;">${invoice.name}</strong>
                    </div>
                </td>
                <td class="col-student expandable" data-group="student" style="display: ${studentExpanded ? '' : 'none'};">
                    <small style="color: #6b7280; font-size: 12px;">${invoice.studentId}</small>
                </td>
                <td class="col-student summary-col" data-group="student">
                    Grade ${invoice.grade}-${invoice.class}
                    ${!studentExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px; font-weight: normal;">${invoice.name}</small>` : ''}
                </td>
                <!-- Invoice Info Group Columns -->
                <td class="col-invoice expandable" data-group="invoice" style="display: ${invoiceExpanded ? '' : 'none'};">${monthName}</td>
                <td class="col-invoice summary-col" data-group="invoice">
                    ${academicYear}
                    ${!invoiceExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px;">${monthName}</small>` : ''}
                </td>
                <!-- Payment Info Group Columns -->
                <td class="col-payment expandable" data-group="payment" style="display: ${paymentExpanded ? '' : 'none'};">
                    <strong>$${(invoice.amount || 0).toFixed(2)}</strong>
                </td>
                <td class="col-payment summary-col" data-group="payment">
                    <strong style="color: ${paidAmount > 0 ? '#10b981' : '#999'}">$${paidAmount.toFixed(2)}</strong>
                    ${!paymentExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px; font-weight: normal;">Fee: $${(invoice.amount || 0).toFixed(2)}</small>` : ''}
                </td>
                <!-- Additional Info Group Columns -->
                <td class="col-additional expandable" data-group="additional" style="display: ${additionalExpanded ? '' : 'none'};">${paymentDate}</td>
                <td class="col-additional summary-col" data-group="additional">
                    ${paymentMethod !== '-' ? `<span class="payment-type-badge" data-type="${paymentMethod}">${paymentMethod}</span>` : '<span style="color: #999;">-</span>'}
                    ${!additionalExpanded ? `<small style="display: block; color: #6b7280; font-size: 11px; margin-top: 2px;">${paymentDate}</small>` : ''}
                </td>
                <td>
                    <span class="status-badge ${statusClass}">${statusText}</span>
                </td>
                <td onclick="event.stopPropagation();">${actions}</td>
            </tr>
        `;
    }).join('');
    
    // Apply current collapse state after rendering
    Object.keys(feeColumnGroups).forEach(groupName => {
        if (!feeColumnGroups[groupName]) {
            toggleColumnGroup(groupName);
        }
    });
}

function toggleColumnGroup(groupName) {
    // Toggle state
    feeColumnGroups[groupName] = !feeColumnGroups[groupName];
    
    const isExpanded = feeColumnGroups[groupName];
    const icon = document.getElementById(`icon-${groupName}`);
    
    // Update icon (no animation)
    if (icon) {
        if (isExpanded) {
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down');
        } else {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right');
        }
    }
    
    // Toggle expandable header columns (no animation)
    const expandableCols = document.querySelectorAll(`#invoiceTable thead .expandable[data-group="${groupName}"]`);
    expandableCols.forEach((col) => {
        col.style.display = isExpanded ? '' : 'none';
    });
    
    // Toggle expandable body cells (no animation)
    const expandableCells = document.querySelectorAll(`#invoiceTable tbody td.expandable[data-group="${groupName}"]`);
    expandableCells.forEach((cell) => {
        cell.style.display = isExpanded ? '' : 'none';
    });
    
    // Update group header colspan (no animation)
    const groupHeader = document.getElementById(`group-header-${groupName}`);
    if (groupHeader) {
        if (groupName === 'student') {
            groupHeader.colSpan = isExpanded ? 3 : 1;
        } else if (groupName === 'invoice') {
            groupHeader.colSpan = isExpanded ? 2 : 1;
        } else if (groupName === 'payment') {
            groupHeader.colSpan = isExpanded ? 2 : 1;
        } else if (groupName === 'additional') {
            groupHeader.colSpan = isExpanded ? 2 : 1;
        }
    }
}

function applyDataFilters() {
    const monthFilter = document.getElementById('monthFilter').value;
    const gradeFilter = document.getElementById('gradeFilter').value;
    const classFilter = document.getElementById('classFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchStudent').value.toLowerCase();
    
    return invoiceData.filter(invoice => {
        // Extract month from invoice - handle both YYYY-MM format and MM format
        if (monthFilter !== 'all') {
            const invoiceMonth = invoice.month || (invoice.id.match(/INV-\d{4}-(\d{2})/) ? invoice.id.match(/INV-\d{4}-(\d{2})/)[1] : null);
            const invoiceYear = invoice.year || (invoice.id.match(/INV-(\d{4})/) ? parseInt(invoice.id.match(/INV-(\d{4})/)[1]) : null);
            
            // Check if monthFilter is in YYYY-MM format or just MM format
            if (monthFilter.includes('-')) {
                // YYYY-MM format
                const [filterYear, filterMonth] = monthFilter.split('-');
                if (invoiceYear != filterYear || invoiceMonth != filterMonth) return false;
            } else {
                // Just MM format (backward compatibility)
                if (invoiceMonth !== monthFilter) return false;
            }
        }
        if (gradeFilter !== 'all' && invoice.grade != gradeFilter) return false;
        if (classFilter !== 'all' && invoice.class !== classFilter) return false;
        if (statusFilter !== 'all' && invoice.status !== statusFilter) return false;
        if (searchTerm && !invoice.name.toLowerCase().includes(searchTerm) && !invoice.studentId.toLowerCase().includes(searchTerm)) return false;
        return true;
    });
}

function applyFilters() {
    renderInvoiceTable();
    updateStats();
}

// Payment Processing Functions
function processPayment(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice || invoice.status !== 'draft') {
        showActionStatus('Can only process payment for draft invoices', 'warning');
        return;
    }
    
    currentPaymentId = invoiceId;
    document.getElementById('paymentStudentInfo').textContent = `Processing payment for: ${invoice.name} (${invoice.studentId}) - $${invoice.amount.toFixed(2)}`;
    
    // Clear form
    document.getElementById('paymentReceptionistId').value = '';
    document.getElementById('paymentReceptionistName').value = '';
    document.getElementById('paymentType').value = '';
    document.getElementById('paymentReference').value = '';
    document.getElementById('paymentNotes').value = '';
    
    document.getElementById('paymentModal').style.display = 'flex';
}

function confirmPayment() {
    const receptionistId = document.getElementById('paymentReceptionistId').value.trim();
    const receptionistName = document.getElementById('paymentReceptionistName').value.trim();
    const paymentType = document.getElementById('paymentType').value;
    const paymentReference = document.getElementById('paymentReference').value.trim();
    const paymentNotes = document.getElementById('paymentNotes').value.trim();
    
    if (!receptionistId || !receptionistName || !paymentType) {
        showActionStatus('Please enter Receptionist ID, Name, and select Payment Type', 'warning');
        return;
    }
    
    // Process invoice payment
    const invoice = invoiceData.find(inv => inv.id === currentPaymentId);
    if (!invoice) return;
    
    const now = new Date();
    const paymentDateStr = now.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit'
    });
    const paidTimeStr = now.toLocaleString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit',
        hour12: false 
    });
    
    invoice.status = 'paid';
    invoice.paymentType = paymentType;
    invoice.paymentReference = paymentReference;
    invoice.paymentNotes = paymentNotes;
    invoice.paidBy = `${receptionistId} - ${receptionistName}`;
    invoice.paidTime = paidTimeStr;
    invoice.paidAmount = invoice.amount; // Set paid amount to full fee amount
    invoice.paymentDate = paymentDateStr;
    invoice.remark = paymentNotes || '';
    invoice.receptionistId = receptionistId;
    invoice.receptionistName = receptionistName;
    
    // Save to localStorage
    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    
    closePaymentModal();
    renderInvoiceTable();
    updateStats();
    showActionStatus(`Payment for Invoice ${invoice.id} (${invoice.name}) recorded successfully`, 'success');
    
    // Show receipt dialog after payment confirmation
    showPaymentReceiptDialog(invoice);
}

// Stats and Utility Functions
function updateStats() {
    // Get filtered data for stats
    const filteredData = applyDataFilters();
    const monthFilter = document.getElementById('monthFilter');
    const selectedMonth = monthFilter ? monthFilter.value : 'all';
    
    // Calculate stats from filtered data
    const total = filteredData.reduce((sum, inv) => sum + inv.amount, 0);
    const paid = filteredData.filter(inv => inv.status === 'paid').length;
    
    document.getElementById('totalReceivable').textContent = '$' + total.toFixed(2);
    document.getElementById('totalStudents').textContent = filteredData.length;
    document.getElementById('paidCount').textContent = `${paid} / ${filteredData.length}`;
    
    const percentage = filteredData.length > 0 ? Math.round((paid / filteredData.length) * 100) : 0;
    document.querySelector('#paidCount').nextElementSibling.textContent = `${percentage}% collected`;
    
    // Update month display in stats
    const statMonthEl = document.getElementById('statMonth');
    if (statMonthEl) {
        if (selectedMonth === 'all') {
            statMonthEl.textContent = 'All Months';
        } else {
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                               'July', 'August', 'September', 'October', 'November', 'December'];
            const monthIndex = parseInt(selectedMonth) - 1;
            const monthName = monthNames[monthIndex];
            // Get year from first invoice with this month
            const invoiceWithMonth = invoiceData.find(inv => {
                const invMonth = inv.month || (inv.id.match(/INV-\d{4}-(\d{2})/) ? inv.id.match(/INV-\d{4}-(\d{2})/)[1] : null);
                return invMonth === selectedMonth;
            });
            const year = invoiceWithMonth ? (invoiceWithMonth.year || (invoiceWithMonth.id.match(/INV-(\d{4})/) ? parseInt(invoiceWithMonth.id.match(/INV-(\d{4})/)[1]) : new Date().getFullYear())) : new Date().getFullYear();
            statMonthEl.textContent = `${monthName} ${year}`;
        }
    }
}

// Dialog functions
function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
    currentPaymentId = null;
}

// Placeholder functions for invoice actions
function viewInvoiceDetails(invoiceId) {
    window.location.href = `/admin/invoice-details?id=${invoiceId}`;
}

function showPaymentReceiptDialog(invoice) {
    const paidAmount = invoice.paidAmount || invoice.amount || 0;
    const paymentDate = invoice.paymentDate || (invoice.paidTime ? invoice.paidTime.split(' ')[0] : '-');
    const paymentTime = invoice.paidTime || '-';
    const paidBy = invoice.paidBy || '-';
    const receptionistId = invoice.receptionistId || (invoice.paidBy ? invoice.paidBy.split(' - ')[0] : '-');
    const receptionistName = invoice.receptionistName || (invoice.paidBy ? invoice.paidBy.split(' - ')[1] : '-');
    
    // Create receipt dialog
    const dialog = document.createElement('div');
    dialog.className = 'receipt-dialog-overlay';
    dialog.style.display = 'flex';
    
    dialog.innerHTML = `
        <div class="receipt-dialog-content" style="max-width: 600px;">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-receipt"></i> Payment Receipt</h3>
                <button class="receipt-close" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="receipt-dialog-body">
                <div style="background: #f0f9ff; border-left: 4px solid #3b82f6; padding: 16px; border-radius: 6px; margin-bottom: 20px;">
                    <p style="margin: 0; color: #1e40af; font-weight: 600; font-size: 16px;">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i>Payment Confirmed Successfully
                    </p>
                </div>
                <div class="receipt-info">
                    <h4 style="margin: 0 0 16px 0; color: #111827; font-size: 16px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                        <i class="fas fa-file-invoice" style="margin-right: 8px; color: #3b82f6;"></i>Invoice Information
                    </h4>
                    <div class="receipt-row">
                        <span class="receipt-label">Invoice Number:</span>
                        <span class="receipt-value"><strong>${invoice.id}</strong></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Student Name:</span>
                        <span class="receipt-value">${invoice.name}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Student ID:</span>
                        <span class="receipt-value">${invoice.studentId}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Grade/Class:</span>
                        <span class="receipt-value">Grade ${invoice.grade}-${invoice.class}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Amount Paid:</span>
                        <span class="receipt-value" style="color: #10b981; font-size: 18px; font-weight: 700;">$${paidAmount.toFixed(2)}</span>
                    </div>
                    
                    <h4 style="margin: 24px 0 16px 0; color: #111827; font-size: 16px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                        <i class="fas fa-credit-card" style="margin-right: 8px; color: #3b82f6;"></i>Payment Information
                    </h4>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Type:</span>
                        <span class="receipt-value"><span class="payment-type-badge" data-type="${invoice.paymentType || ''}">${invoice.paymentType || '-'}</span></span>
                    </div>
                    ${invoice.paymentReference ? `
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Reference:</span>
                        <span class="receipt-value">${invoice.paymentReference}</span>
                    </div>
                    ` : ''}
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Date:</span>
                        <span class="receipt-value">${paymentDate}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Time:</span>
                        <span class="receipt-value">${paymentTime}</span>
                    </div>
                    ${invoice.paymentNotes ? `
                    <div class="receipt-row">
                        <span class="receipt-label">Payment Notes:</span>
                        <span class="receipt-value">${invoice.paymentNotes}</span>
                    </div>
                    ` : ''}
                    
                    <h4 style="margin: 24px 0 16px 0; color: #111827; font-size: 16px; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                        <i class="fas fa-user-tie" style="margin-right: 8px; color: #3b82f6;"></i>Receptionist Information
                    </h4>
                    <div class="receipt-row">
                        <span class="receipt-label">Receptionist ID:</span>
                        <span class="receipt-value">${receptionistId}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Receptionist Name:</span>
                        <span class="receipt-value"><strong>${receptionistName}</strong></span>
                    </div>
                </div>
            </div>
            <div class="receipt-dialog-actions">
                <button class="simple-btn secondary" onclick="this.closest('.receipt-dialog-overlay').remove()">
                    <i class="fas fa-times"></i> Close
                </button>
                <button class="simple-btn primary" onclick="printInvoiceReceipt('${invoice.id}'); this.closest('.receipt-dialog-overlay').remove();">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(dialog);
    dialog.addEventListener('click', function(e) {
        if (e.target === dialog) dialog.remove();
    });
}

function viewInvoiceReceipt(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice || invoice.status !== 'paid') {
        showActionStatus('Receipt is only available for paid invoices', 'warning');
        return;
    }
    
    showPaymentReceiptDialog(invoice);
}

function printInvoiceReceipt(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    const paidAmount = invoice.paidAmount || invoice.amount || 0;
    const paymentDate = invoice.paymentDate || (invoice.paidTime ? invoice.paidTime.split(' ')[0] : '-');
    const paymentTime = invoice.paidTime || '-';
    const paidBy = invoice.paidBy || '-';
    const receptionistId = invoice.receptionistId || (invoice.paidBy ? invoice.paidBy.split(' - ')[0] : '-');
    const receptionistName = invoice.receptionistName || (invoice.paidBy ? invoice.paidBy.split(' - ')[1] : '-');
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Payment Receipt - ${invoice.id}</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .receipt-header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
                .receipt-header h2 { margin: 0; color: #111827; }
                .receipt-header p { margin: 5px 0 0 0; color: #6b7280; }
                .receipt-section { margin: 25px 0; }
                .receipt-section h3 { margin: 0 0 15px 0; color: #111827; font-size: 16px; border-bottom: 1px solid #e5e7eb; padding-bottom: 8px; }
                .receipt-row { display: flex; justify-content: space-between; margin: 10px 0; padding: 8px 0; border-bottom: 1px solid #eee; }
                .receipt-label { font-weight: 600; color: #374151; }
                .receipt-value { color: #111827; }
                .amount-highlight { color: #10b981; font-size: 18px; font-weight: 700; }
            </style>
        </head>
        <body>
            <div class="receipt-header">
                <h2>Payment Receipt</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            
            <div class="receipt-section">
                <h3>Invoice Information</h3>
                <div class="receipt-row">
                    <span class="receipt-label">Invoice Number:</span>
                    <span class="receipt-value"><strong>${invoice.id}</strong></span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Student Name:</span>
                    <span class="receipt-value">${invoice.name}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Student ID:</span>
                    <span class="receipt-value">${invoice.studentId}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Grade/Class:</span>
                    <span class="receipt-value">Grade ${invoice.grade}-${invoice.class}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Amount Paid:</span>
                    <span class="receipt-value amount-highlight">$${paidAmount.toFixed(2)}</span>
                </div>
            </div>
            
            <div class="receipt-section">
                <h3>Payment Information</h3>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Type:</span>
                    <span class="receipt-value">${invoice.paymentType || '-'}</span>
                </div>
                ${invoice.paymentReference ? `
                <div class="receipt-row">
                    <span class="receipt-label">Payment Reference:</span>
                    <span class="receipt-value">${invoice.paymentReference}</span>
                </div>
                ` : ''}
                <div class="receipt-row">
                    <span class="receipt-label">Payment Date:</span>
                    <span class="receipt-value">${paymentDate}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Payment Time:</span>
                    <span class="receipt-value">${paymentTime}</span>
                </div>
                ${invoice.paymentNotes ? `
                <div class="receipt-row">
                    <span class="receipt-label">Payment Notes:</span>
                    <span class="receipt-value">${invoice.paymentNotes}</span>
                </div>
                ` : ''}
            </div>
            
            <div class="receipt-section">
                <h3>Receptionist Information</h3>
                <div class="receipt-row">
                    <span class="receipt-label">Receptionist ID:</span>
                    <span class="receipt-value">${receptionistId}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Receptionist Name:</span>
                    <span class="receipt-value"><strong>${receptionistName}</strong></span>
                </div>
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Helper functions
function generateStatusBadge(status) {
    const statusText = status === 'draft' ? 'Draft' : 
                      status === 'paid' ? 'Paid' : 'Pending';
    return `<span class="status-badge ${status}">${statusText}</span>`;
}

function generateFeeTypeBadge(type) {
    const typeLabel = type === 'onetime' ? 'One-Time' : 'Special Event';
    return `<span class="fee-type-badge ${type}">${typeLabel}</span>`;
}

function showActionStatus(message, type = 'info') {
    // Create or update status message
    let statusDiv = document.getElementById('actionStatus');
    if (!statusDiv) {
        statusDiv = document.createElement('div');
        statusDiv.id = 'actionStatus';
        statusDiv.style.cssText = `
            position: fixed; top: 20px; right: 20px; z-index: 1000;
            padding: 12px 20px; border-radius: 6px; font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        `;
        document.body.appendChild(statusDiv);
    }
    
    const colors = {
        success: '#10b981',
        warning: '#f59e0b',
        error: '#ef4444',
        info: '#3b82f6'
    };
    
    statusDiv.style.backgroundColor = colors[type] || colors.info;
    statusDiv.style.color = 'white';
    statusDiv.textContent = message;
    
    // Auto-hide after 3 seconds
    setTimeout(() => {
        if (statusDiv) {
            statusDiv.style.opacity = '0';
            setTimeout(() => statusDiv.remove(), 300);
        }
    }, 3000);
}