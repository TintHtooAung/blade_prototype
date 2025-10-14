/**
 * Dialog Manager
 * Handles all dialog operations for consistent UX
 */

class DialogManager {
    constructor() {
        this.uiComponents = new UIComponents();
    }

    // Show Payment Modal
    showPaymentModal(invoice, isAdditionalFee = false) {
        const modal = document.getElementById('paymentModal');
        const studentInfo = document.getElementById('paymentStudentInfo');
        
        if (isAdditionalFee) {
            studentInfo.textContent = `Processing payment for: ${invoice.name} (${invoice.studentId}) - ${invoice.feeName} - $${invoice.amount.toFixed(2)}`;
        } else {
            studentInfo.textContent = `Processing payment for: ${invoice.name} (${invoice.studentId}) - $${invoice.amount.toFixed(2)}`;
        }
        
        // Clear form
        document.getElementById('paymentReceptionistId').value = '';
        document.getElementById('paymentReceptionistName').value = '';
        
        modal.style.display = 'flex';
    }

    // Close Payment Modal
    closePaymentModal() {
        document.getElementById('paymentModal').style.display = 'none';
        // Reset payment IDs
        if (window.currentPaymentId) window.currentPaymentId = null;
        if (window.currentAdditionalFeePaymentId) window.currentAdditionalFeePaymentId = null;
    }

    // Show Fee Dialog
    showFeeDialog(fee = null) {
        const dialog = document.getElementById('feeDialog');
        const title = document.getElementById('feeDialogTitle');
        const form = document.getElementById('feeForm');
        
        if (fee) {
            title.textContent = 'Edit Fee';
            this.populateFeeForm(fee);
        } else {
            title.textContent = 'Add Fee';
            form.reset();
            document.getElementById('feeId').value = '';
            
            // Set default date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('chargeDate').value = today;
        }
        
        // Hide all target sections initially
        this.hideAllTargetSections();
        
        dialog.style.display = 'flex';
    }

    // Close Fee Dialog
    closeFeeDialog() {
        document.getElementById('feeDialog').style.display = 'none';
        if (window.currentEditingFeeId) window.currentEditingFeeId = null;
    }

    // Populate Fee Form
    populateFeeForm(fee) {
        document.getElementById('feeId').value = fee.id;
        document.getElementById('feeType').value = fee.type;
        document.getElementById('feeName').value = fee.name;
        document.getElementById('feeAmount').value = fee.amount;
        document.getElementById('chargeDate').value = fee.chargeDate;
        document.getElementById('feeDescription').value = fee.description || '';
        document.getElementById('feeTargetType').value = fee.targetType;
        
        // Update target options
        this.updateTargetOptions();
        
        // Pre-select existing targets
        this.preSelectTargets(fee);
    }

    // Hide All Target Sections
    hideAllTargetSections() {
        document.getElementById('targetGradesSection').style.display = 'none';
        document.getElementById('targetClassesSection').style.display = 'none';
        document.getElementById('targetStudentsSection').style.display = 'none';
    }

    // Update Target Options
    updateTargetOptions() {
        const targetType = document.getElementById('feeTargetType').value;
        this.hideAllTargetSections();
        
        if (targetType === 'grades') {
            document.getElementById('targetGradesSection').style.display = 'block';
        } else if (targetType === 'classes') {
            document.getElementById('targetClassesSection').style.display = 'block';
        } else if (targetType === 'students') {
            document.getElementById('targetStudentsSection').style.display = 'block';
        }
    }

    // Pre-select Targets
    preSelectTargets(fee) {
        if (fee.targetType === 'grades') {
            fee.targets.forEach(target => {
                const checkbox = document.querySelector(`#targetGradesSection input[value="${target}"]`);
                if (checkbox) checkbox.checked = true;
            });
        } else if (fee.targetType === 'classes') {
            fee.targets.forEach(target => {
                const checkbox = document.querySelector(`#targetClassesSection input[value="${target}"]`);
                if (checkbox) checkbox.checked = true;
            });
        } else if (fee.targetType === 'students') {
            fee.targets.forEach(target => {
                const checkbox = document.querySelector(`#targetStudentsSection input[value="${target}"]`);
                if (checkbox) checkbox.checked = true;
            });
        }
    }

    // Get Selected Targets
    getSelectedTargets() {
        const targetType = document.getElementById('feeTargetType').value;
        
        if (targetType === 'all') return [];
        
        let checkboxes = [];
        if (targetType === 'grades') {
            checkboxes = document.querySelectorAll('#targetGradesSection input[type="checkbox"]:checked');
        } else if (targetType === 'classes') {
            checkboxes = document.querySelectorAll('#targetClassesSection input[type="checkbox"]:checked');
        } else if (targetType === 'students') {
            checkboxes = document.querySelectorAll('#targetStudentsSection input[type="checkbox"]:checked');
        }
        
        return Array.from(checkboxes).map(cb => cb.value);
    }

    // Show Payment Receipt
    showPaymentReceipt(invoice, isAdditionalFee = false) {
        const receiptDialog = document.createElement('div');
        receiptDialog.className = 'receipt-dialog-overlay';
        receiptDialog.style.display = 'flex';
        receiptDialog.innerHTML = this.uiComponents.generatePaymentReceiptDialog(invoice, isAdditionalFee);
        
        document.body.appendChild(receiptDialog);
        
        // Close on overlay click
        receiptDialog.addEventListener('click', function(e) {
            if (e.target === receiptDialog) {
                receiptDialog.remove();
            }
        });
    }

    // Show Confirm Dialog
    showConfirmDialog(options) {
        // This would integrate with your existing confirm dialog system
        if (confirm(options.message)) {
            options.onConfirm();
        }
    }
}

// Export for use in other modules
window.DialogManager = DialogManager;
