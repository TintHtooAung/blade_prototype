/**
 * Student Fee Management Page JavaScript
 * Complete functionality with all original data and features
 */

// Global variables
let invoiceData = [];
let additionalFeesInvoiceData = [];
let currentPaymentId = null;
let currentAdditionalFeePaymentId = null;

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
    renderInvoiceTable();
    renderAdditionalFeesInvoiceTable();
    updateStats();
});

// Load all data from localStorage
function loadData() {
    // Load main invoices
    const savedInvoices = localStorage.getItem('invoiceData');
    if (savedInvoices) {
        invoiceData = JSON.parse(savedInvoices);
        document.getElementById('generateBtn').style.display = 'none';
        document.getElementById('clearAllBtn').style.display = 'inline-flex';
        document.getElementById('invoiceStatus').textContent = 'Generated';
    }
    
    // Load additional fees invoices
    const savedAdditionalFeesInvoices = localStorage.getItem('additionalFeesInvoiceData');
    if (savedAdditionalFeesInvoices) {
        additionalFeesInvoiceData = JSON.parse(savedAdditionalFeesInvoices);
    }
}

// Main Invoice Functions
function generateInvoices() {
    if (!confirm('Generate invoices for all students for January 2025?\n\nThis will create invoice entries based on configured fee structures for all active students.')) {
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
            id: 'INV-2025-01-' + String(idCounter++).padStart(3, '0'),
            studentId: student.id,
            name: student.name,
            grade: student.grade,
            class: student.class,
            amount: totalAmount,
            feeBreakdown: feeBreakdown,
            paymentType: null,
            status: 'draft',
            paidBy: null,
            paidTime: null
        });
    });
    
    document.getElementById('generateBtn').style.display = 'none';
    document.getElementById('clearAllBtn').style.display = 'inline-flex';
    document.getElementById('invoiceStatus').textContent = 'Generated';
    
    // Save to localStorage
    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    
    renderInvoiceTable();
    updateStats();
    showActionStatus(`${invoiceData.length} invoices generated successfully for January 2025 based on configured fee structures`, 'success');
}

function renderInvoiceTable() {
    const tbody = document.getElementById('invoiceTableBody');
    
    if (invoiceData.length === 0) {
        tbody.innerHTML = '<tr class="no-data-row"><td colspan="9" style="text-align:center; padding:40px; color:#999;"><i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>No invoices generated yet. Click "Generate Invoices" to create invoices for all students this month.</td></tr>';
        return;
    }

    let filteredData = applyDataFilters();
    
    tbody.innerHTML = filteredData.map(invoice => {
        const isDraft = invoice.status === 'draft';
        const baseActions = `
            <button class="simple-btn-icon" onclick="viewInvoiceDetails('${invoice.id}')" title="View Details">
                <i class="fas fa-eye"></i>
            </button>
        `;

        const actions = isDraft ? baseActions + `
            <button class="simple-btn-icon" onclick="editInvoiceDetails('${invoice.id}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="simple-btn-icon" onclick="processPayment('${invoice.id}')" title="Process Payment">
                <i class="fas fa-money-check-alt"></i>
            </button>
        ` : baseActions + `
            <button class="simple-btn-icon" onclick="viewPaymentReceipt('${invoice.id}')" title="View Payment Receipt">
                <i class="fas fa-receipt"></i>
            </button>
        `;

        return `
            <tr>
                <td><strong><a href="/admin/invoice-details?id=${invoice.id}" class="invoice-link">${invoice.id}</a></strong></td>
                <td>${invoice.studentId}</td>
                <td>${invoice.name}</td>
                <td>Grade ${invoice.grade}-${invoice.class}</td>
                <td><strong>$${invoice.amount.toFixed(2)}</strong></td>
                <td><span class="payment-type-badge" data-type="${invoice.paymentType || 'Not Set'}">${invoice.paymentType || 'Not Set'}</span></td>
                <td>${generateStatusBadge(invoice.status)}</td>
                <td>${invoice.paidBy ? `${invoice.paidBy}<br><small style="color:#999;">${invoice.paidTime}</small>` : '-'}</td>
                <td>${actions}</td>
            </tr>
        `;
    }).join('');
}

function applyDataFilters() {
    const gradeFilter = document.getElementById('gradeFilter').value;
    const classFilter = document.getElementById('classFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchStudent').value.toLowerCase();
    
    return invoiceData.filter(invoice => {
        if (gradeFilter !== 'all' && invoice.grade != gradeFilter) return false;
        if (classFilter !== 'all' && invoice.class !== classFilter) return false;
        if (statusFilter !== 'all' && invoice.status !== statusFilter) return false;
        if (searchTerm && !invoice.name.toLowerCase().includes(searchTerm) && !invoice.studentId.toLowerCase().includes(searchTerm)) return false;
        return true;
    });
}

function applyFilters() {
    renderInvoiceTable();
}

function refreshInvoices() {
    showActionStatus('Refreshing invoices from fee structure...', 'info');
    
    setTimeout(() => {
        // Load updated fee structures
        const schoolFees = JSON.parse(localStorage.getItem('schoolFees') || '{}');
        
        // Update existing invoices with new fee data
        if (invoiceData.length > 0) {
            invoiceData.forEach(invoice => {
                const gradeName = `Grade ${invoice.grade}`;
                const monthlyFee = schoolFees[gradeName] || 500.00;
                
                // Update amount if school fee has changed
                invoice.amount = monthlyFee;
                invoice.feeBreakdown = [
                    { name: 'Monthly Tuition', amount: monthlyFee, category: 'recurring' }
                ];
            });
            
            // Save updated invoices
            localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
            renderInvoiceTable();
            updateStats();
        }
        
        showActionStatus('Invoices refreshed successfully with updated fee structures', 'success');
    }, 1500);
}

// Additional Fees Invoices Functions
function generateAdditionalFeesInvoices() {
    if (!confirm('Generate individual invoices for all additional fees?\n\nThis will create separate invoices for each participant based on fees created in Fee Structure.')) {
        return;
    }
    
    // Load additional fees from fee structure
    const additionalFees = JSON.parse(localStorage.getItem('additionalFees') || '[]');
    
    if (additionalFees.length === 0) {
        showActionStatus('No additional fees found. Please create fees in Fee Structure first.', 'warning');
        return;
    }
    
    additionalFeesInvoiceData = [];
    let idCounter = 1;
    
    // Generate invoices for each additional fee
    additionalFees.forEach(fee => {
        // Get applicable students based on target criteria
        const applicableStudents = getApplicableStudents(fee);
        
        // Create individual invoice for each applicable student
        applicableStudents.forEach(student => {
            additionalFeesInvoiceData.push({
                id: `AF-${fee.id}-${student.id}-${String(idCounter++).padStart(3, '0')}`,
                studentId: student.id,
                name: student.name,
                grade: student.grade,
                class: student.class,
                feeName: fee.name,
                feeType: fee.type,
                feeId: fee.id,
                amount: fee.amount,
                description: fee.description,
                chargeDate: fee.chargeDate,
                paymentType: null,
                status: 'draft',
                paidBy: null,
                paidTime: null
            });
        });
    });
    
    // Save to localStorage
    localStorage.setItem('additionalFeesInvoiceData', JSON.stringify(additionalFeesInvoiceData));
    
    renderAdditionalFeesInvoiceTable();
    showActionStatus(`${additionalFeesInvoiceData.length} additional fees invoices generated successfully`, 'success');
}

function getApplicableStudents(fee) {
    if (fee.targetType === 'all') {
        return studentsDatabase;
    } else if (fee.targetType === 'grades') {
        return studentsDatabase.filter(student => 
            fee.targets.includes(`Grade ${student.grade}`)
        );
    } else if (fee.targetType === 'classes') {
        return studentsDatabase.filter(student => 
            fee.targets.includes(`${student.grade}${student.class}`)
        );
    } else if (fee.targetType === 'students') {
        return studentsDatabase.filter(student => 
            fee.targets.includes(student.id)
        );
    }
    return [];
}

function renderAdditionalFeesInvoiceTable() {
    const tbody = document.getElementById('additionalFeesInvoiceTableBody');
    
    if (additionalFeesInvoiceData.length === 0) {
        tbody.innerHTML = '<tr class="no-data-row"><td colspan="11" style="text-align:center; padding:40px; color:#999;"><i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>No additional fees invoices generated yet. Click "Generate Additional Fees Invoices" to create individual invoices for each participant.</td></tr>';
        return;
    }
    
    tbody.innerHTML = additionalFeesInvoiceData.map(invoice => {
        const isDraft = invoice.status === 'draft';
        const baseActions = `
            <button class="simple-btn-icon" onclick="viewAdditionalFeeInvoiceDetails('${invoice.id}')" title="View Details">
                <i class="fas fa-eye"></i>
            </button>
        `;

        const actions = isDraft ? baseActions + `
            <button class="simple-btn-icon" onclick="editAdditionalFeeInvoice('${invoice.id}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="simple-btn-icon" onclick="processAdditionalFeePayment('${invoice.id}')" title="Process Payment">
                <i class="fas fa-money-check-alt"></i>
            </button>
        ` : baseActions + `
            <button class="simple-btn-icon" onclick="viewAdditionalFeePaymentReceipt('${invoice.id}')" title="View Payment Receipt">
                <i class="fas fa-receipt"></i>
            </button>
        `;

        return `
            <tr>
                <td><strong><a href="/admin/invoice-details?id=${invoice.id}" class="invoice-link">${invoice.id}</a></strong></td>
                <td>${invoice.studentId}</td>
                <td>${invoice.name}</td>
                <td>Grade ${invoice.grade}-${invoice.class}</td>
                <td><strong>${invoice.feeName}</strong></td>
                <td>${generateFeeTypeBadge(invoice.feeType)}</td>
                <td><strong>$${invoice.amount.toFixed(2)}</strong></td>
                <td><span class="payment-type-badge" data-type="${invoice.paymentType || 'Not Set'}">${invoice.paymentType || 'Not Set'}</span></td>
                <td>${generateStatusBadge(invoice.status)}</td>
                <td>${invoice.paidBy ? `${invoice.paidBy}<br><small style="color:#999;">${invoice.paidTime}</small>` : '-'}</td>
                <td>${actions}</td>
            </tr>
        `;
    }).join('');
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

function processAdditionalFeePayment(invoiceId) {
    const invoice = additionalFeesInvoiceData.find(inv => inv.id === invoiceId);
    if (!invoice || invoice.status !== 'draft') {
        showActionStatus('Can only process payment for draft invoices', 'warning');
        return;
    }
    
    currentAdditionalFeePaymentId = invoiceId;
    document.getElementById('paymentStudentInfo').textContent = `Processing payment for: ${invoice.name} (${invoice.studentId}) - ${invoice.feeName} - $${invoice.amount.toFixed(2)}`;
    
    // Clear form
    document.getElementById('paymentReceptionistId').value = '';
    document.getElementById('paymentReceptionistName').value = '';
    
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
    
    // Check if this is an additional fee payment
    if (currentAdditionalFeePaymentId) {
        confirmAdditionalFeePayment();
        return;
    }
    
    // Regular invoice payment
    const invoice = invoiceData.find(inv => inv.id === currentPaymentId);
    if (!invoice) return;
    
    invoice.status = 'paid';
    invoice.paymentType = paymentType;
    invoice.paymentReference = paymentReference;
    invoice.paymentNotes = paymentNotes;
    invoice.paidBy = `${receptionistId} - ${receptionistName}`;
    invoice.paidTime = new Date().toLocaleString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit',
        hour12: false 
    });
    
    // Save to localStorage
    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    
    closePaymentModal();
    renderInvoiceTable();
    updateStats();
    showActionStatus(`Payment for Invoice ${invoice.id} (${invoice.name}) recorded successfully`, 'success');
}

function confirmAdditionalFeePayment() {
    const receptionistId = document.getElementById('paymentReceptionistId').value.trim();
    const receptionistName = document.getElementById('paymentReceptionistName').value.trim();
    
    if (!receptionistId || !receptionistName) {
        showActionStatus('Please enter both Receptionist ID and Name', 'warning');
        return;
    }
    
    const invoice = additionalFeesInvoiceData.find(inv => inv.id === currentAdditionalFeePaymentId);
    if (!invoice) return;
    
    invoice.status = 'paid';
    invoice.paidBy = `${receptionistId} - ${receptionistName}`;
    invoice.paidTime = new Date().toLocaleString('en-US', { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit',
        hour12: false 
    });
    
    // Save to localStorage
    localStorage.setItem('additionalFeesInvoiceData', JSON.stringify(additionalFeesInvoiceData));
    
    // Update collection percentage in fee structure
    updateFeeCollectionPercentage(invoice.feeId);
    
    closePaymentModal();
    renderAdditionalFeesInvoiceTable();
    showActionStatus(`Payment for Invoice ${invoice.id} (${invoice.name}) recorded successfully`, 'success');
}

function updateFeeCollectionPercentage(feeId) {
    // Load additional fees from fee structure
    const additionalFees = JSON.parse(localStorage.getItem('additionalFees') || '[]');
    const fee = additionalFees.find(f => f.id === feeId);
    
    if (!fee) return;
    
    // Calculate collection percentage
    const feeInvoices = additionalFeesInvoiceData.filter(inv => inv.feeId === feeId);
    const totalInvoices = feeInvoices.length;
    const paidInvoices = feeInvoices.filter(inv => inv.status === 'paid').length;
    const collectionPercentage = totalInvoices > 0 ? Math.round((paidInvoices / totalInvoices) * 100) : 0;
    
    // Update fee collection percentage
    fee.collectionPercentage = collectionPercentage;
    
    // Save back to localStorage
    localStorage.setItem('additionalFees', JSON.stringify(additionalFees));
    
    // Show success message
    showActionStatus(`Collection percentage updated for ${fee.name}: ${collectionPercentage}%`, 'success');
}

// Stats and Utility Functions
function updateStats() {
    const total = invoiceData.reduce((sum, inv) => sum + inv.amount, 0);
    const paid = invoiceData.filter(inv => inv.status === 'paid').length;
    
    document.getElementById('totalReceivable').textContent = '$' + total.toFixed(2);
    document.getElementById('totalStudents').textContent = invoiceData.length;
    document.getElementById('paidCount').textContent = `${paid} / ${invoiceData.length}`;
    
    const percentage = invoiceData.length > 0 ? Math.round((paid / invoiceData.length) * 100) : 0;
    document.querySelector('#paidCount').nextElementSibling.textContent = `${percentage}% collected`;
    
    // Enable/disable clear button based on completion
    const clearBtn = document.getElementById('clearAllBtn');
    if (invoiceData.length > 0 && paid === invoiceData.length) {
        clearBtn.disabled = false;
        clearBtn.title = 'All payments received - Ready to clear';
    } else {
        clearBtn.disabled = true;
        clearBtn.title = `Cannot clear - ${invoiceData.length - paid} payments pending`;
    }
}

function clearInvoicesForNextMonth() {
    const paid = invoiceData.filter(inv => inv.status === 'paid').length;
    if (paid !== invoiceData.length) {
        showActionStatus(`Cannot clear invoices. ${invoiceData.length - paid} payments are still pending.`, 'warning');
        return;
    }
    
    if (confirm('All payments have been received. This will archive all records and prepare for next month. Continue?')) {
        const clearedCount = invoiceData.length;
        invoiceData = [];
        // Clear from localStorage
        localStorage.removeItem('invoiceData');
        
        document.getElementById('generateBtn').style.display = 'inline-flex';
        document.getElementById('clearAllBtn').style.display = 'none';
        renderInvoiceTable();
        updateStats();
        showActionStatus(`${clearedCount} invoices cleared successfully for next month`, 'success');
    }
}

// Dialog functions
function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
    currentPaymentId = null;
    currentAdditionalFeePaymentId = null;
}

// Placeholder functions for invoice actions
function viewInvoiceDetails(invoiceId) {
    window.location.href = `/admin/invoice-details?id=${invoiceId}`;
}

function editInvoiceDetails(invoiceId) {
    window.location.href = `/admin/invoice-edit?id=${invoiceId}`;
}

function viewPaymentReceipt(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    const receiptDialog = document.createElement('div');
    receiptDialog.className = 'receipt-dialog-overlay';
    receiptDialog.style.display = 'flex';
    receiptDialog.innerHTML = `
        <div class="receipt-dialog-content">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-receipt"></i> Payment Receipt</h3>
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
                <button class="simple-btn primary" onclick="printReceipt('${invoice.id}')">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(receiptDialog);
    
    // Close on overlay click
    receiptDialog.addEventListener('click', function(e) {
        if (e.target === receiptDialog) {
            receiptDialog.remove();
        }
    });
}

function printReceipt(invoiceId) {
    const invoice = invoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Payment Receipt - ${invoice.id}</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .receipt-header { text-align: center; margin-bottom: 30px; }
                .receipt-details { margin: 20px 0; }
                .receipt-row { display: flex; justify-content: space-between; margin: 10px 0; padding: 5px 0; border-bottom: 1px solid #eee; }
                .receipt-label { font-weight: bold; }
                .receipt-value { color: #333; }
            </style>
        </head>
        <body>
            <div class="receipt-header">
                <h2>Payment Receipt</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            <div class="receipt-details">
                <div class="receipt-row">
                    <span class="receipt-label">Invoice Number:</span>
                    <span class="receipt-value">${invoice.id}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Student Name:</span>
                    <span class="receipt-value">${invoice.name}</span>
                </div>
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
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Additional fee invoice actions
function viewAdditionalFeeInvoiceDetails(invoiceId) {
    window.location.href = `/admin/invoice-details?id=${invoiceId}`;
}

function editAdditionalFeeInvoice(invoiceId) {
    window.location.href = `/admin/invoice-edit?id=${invoiceId}`;
}

function viewAdditionalFeePaymentReceipt(invoiceId) {
    const invoice = additionalFeesInvoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    const receiptDialog = document.createElement('div');
    receiptDialog.className = 'receipt-dialog-overlay';
    receiptDialog.style.display = 'flex';
    receiptDialog.innerHTML = `
        <div class="receipt-dialog-content">
            <div class="receipt-dialog-header">
                <h3><i class="fas fa-receipt"></i> Payment Receipt - Additional Fee</h3>
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
                    <div class="receipt-row">
                        <span class="receipt-label">Fee Name:</span>
                        <span class="receipt-value">${invoice.feeName}</span>
                    </div>
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
                <button class="simple-btn primary" onclick="printAdditionalFeeReceipt('${invoice.id}')">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(receiptDialog);
    
    // Close on overlay click
    receiptDialog.addEventListener('click', function(e) {
        if (e.target === receiptDialog) {
            receiptDialog.remove();
        }
    });
}

function printAdditionalFeeReceipt(invoiceId) {
    const invoice = additionalFeesInvoiceData.find(inv => inv.id === invoiceId);
    if (!invoice) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Payment Receipt - ${invoice.id}</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .receipt-header { text-align: center; margin-bottom: 30px; }
                .receipt-details { margin: 20px 0; }
                .receipt-row { display: flex; justify-content: space-between; margin: 10px 0; padding: 5px 0; border-bottom: 1px solid #eee; }
                .receipt-label { font-weight: bold; }
                .receipt-value { color: #333; }
            </style>
        </head>
        <body>
            <div class="receipt-header">
                <h2>Payment Receipt - Additional Fee</h2>
                <p>Smart Campus Nova Hub</p>
            </div>
            <div class="receipt-details">
                <div class="receipt-row">
                    <span class="receipt-label">Invoice Number:</span>
                    <span class="receipt-value">${invoice.id}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Student Name:</span>
                    <span class="receipt-value">${invoice.name}</span>
                </div>
                <div class="receipt-row">
                    <span class="receipt-label">Fee Name:</span>
                    <span class="receipt-value">${invoice.feeName}</span>
                </div>
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