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

function renderInvoiceTable() {
    const tbody = document.getElementById('invoiceTableBody');
    
    if (invoiceData.length === 0) {
        tbody.innerHTML = '<tr class="no-data-row"><td colspan="12" style="text-align:center; padding:40px; color:#999;"><i class="fas fa-inbox" style="font-size:48px; margin-bottom:12px; display:block;"></i>No invoices generated yet. Click "Generate Invoices" to create invoices for all students this month.</td></tr>';
        return;
    }

    let filteredData = applyDataFilters();
    
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
    
    tbody.innerHTML = filteredData.map((invoice, index) => {
        const isDraft = invoice.status === 'draft';
        const monthName = invoice.month ? monthNames[parseInt(invoice.month) - 1] : '-';
        const academicYear = invoice.academicYear || (invoice.year ? `${invoice.year}-${invoice.year + 1}` : '-');
        const paidAmount = invoice.paidAmount || (invoice.status === 'paid' ? invoice.amount : 0);
        const paymentDate = invoice.paymentDate || (invoice.paidTime ? invoice.paidTime.split(' ')[0] : '-');
        const remark = invoice.remark || '-';
        
        const actions = `
            <button class="simple-btn-icon" onclick="viewInvoiceDetails('${invoice.id}')" title="View Details">
                <i class="fas fa-eye"></i>
            </button>
            ${isDraft ? `
            <button class="simple-btn-icon" onclick="processPayment('${invoice.id}')" title="Process Payment">
                <i class="fas fa-money-check-alt"></i>
            </button>
            ` : ''}
        `;

        return `
            <tr>
                <td>${index + 1}</td>
                <td>${invoice.name}</td>
                <td>${invoice.studentId}</td>
                <td>Grade ${invoice.grade}-${invoice.class}</td>
                <td>${monthName}</td>
                <td>${academicYear}</td>
                <td><strong>$${(invoice.amount || 0).toFixed(2)}</strong></td>
                <td><strong style="color: ${paidAmount > 0 ? '#10b981' : '#999'}">$${paidAmount.toFixed(2)}</strong></td>
                <td>${paymentDate}</td>
                <td><span class="payment-type-badge" data-type="${invoice.paymentType || 'Not Set'}">${invoice.paymentType || 'Not Set'}</span></td>
                <td>${remark}</td>
                <td>${actions}</td>
            </tr>
        `;
    }).join('');
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
    
    // Save to localStorage
    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    
    closePaymentModal();
    renderInvoiceTable();
    updateStats();
    showActionStatus(`Payment for Invoice ${invoice.id} (${invoice.name}) recorded successfully`, 'success');
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