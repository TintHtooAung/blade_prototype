/**
 * Shared Fee Management Utilities
 * Reusable functions for fee structure and student fee management
 */

class FeeManagement {
    constructor() {
        this.studentsDatabase = [
            {id: 'S001', name: 'Alice Johnson', grade: 10, class: 'A', amount: 500, paymentType: 'Bank Transfer'},
            {id: 'S002', name: 'Michael Brown', grade: 12, class: 'B', amount: 500, paymentType: 'Bank Transfer'},
            {id: 'S003', name: 'Sarah Wilson', grade: 9, class: 'C', amount: 500, paymentType: 'Cash'},
            {id: 'S004', name: 'David Lee', grade: 11, class: 'A', amount: 500, paymentType: 'K-Pay'},
            {id: 'S005', name: 'Emma Davis', grade: 8, class: 'B', amount: 500, paymentType: 'Bank Transfer'},
            {id: 'S006', name: 'James Wilson', grade: 10, class: 'B', amount: 500, paymentType: 'Cash'},
            {id: 'S007', name: 'Olivia Taylor', grade: 9, class: 'A', amount: 500, paymentType: 'K-Pay'},
            {id: 'S008', name: 'Noah Anderson', grade: 12, class: 'C', amount: 500, paymentType: 'Bank Transfer'},
        ];
    }

    // Collection Progress Bar Generation
    generateCollectionBar(percentage) {
        const barClass = this.getCollectionBarClass(percentage);
        return `
            <div class="collection-progress-container">
                <div class="progress-bar-wrapper">
                    <div class="progress-bar-fill ${barClass}" style="width: ${percentage}%">
                        <span class="progress-text">${percentage}%</span>
                    </div>
                </div>
                <span class="progress-percentage">${percentage}%</span>
            </div>
        `;
    }

    getCollectionBarClass(percentage) {
        if (percentage >= 100) return 'complete';
        if (percentage >= 50) return 'partial';
        return 'low';
    }

    // Target Display Formatting
    formatTargetDisplay(targetType, targets) {
        if (targetType === 'all') return 'All Students';
        if (targetType === 'grades') return `Grades: ${targets.join(', ')}`;
        if (targetType === 'classes') return `Classes: ${targets.join(', ')}`;
        if (targetType === 'students') return `${targets.length} Students`;
        return 'Unknown';
    }

    // Fee Type Badge Generation
    generateFeeTypeBadge(type) {
        const typeLabel = type === 'onetime' ? 'One-Time' : 'Special Event';
        return `<span class="fee-type-badge ${type}">${typeLabel}</span>`;
    }

    // Get Applicable Students for Fee
    getApplicableStudents(fee) {
        if (fee.targetType === 'all') {
            return this.studentsDatabase;
        } else if (fee.targetType === 'grades') {
            return this.studentsDatabase.filter(student => 
                fee.targets.includes(`Grade ${student.grade}`)
            );
        } else if (fee.targetType === 'classes') {
            return this.studentsDatabase.filter(student => 
                fee.targets.includes(`${student.grade}${student.class}`)
            );
        } else if (fee.targetType === 'students') {
            return this.studentsDatabase.filter(student => 
                fee.targets.includes(student.id)
            );
        }
        return [];
    }

    // Calculate Collection Percentage
    calculateCollectionPercentage(feeId, invoiceData) {
        const feeInvoices = invoiceData.filter(inv => inv.feeId === feeId);
        const totalInvoices = feeInvoices.length;
        const paidInvoices = feeInvoices.filter(inv => inv.status === 'paid').length;
        return totalInvoices > 0 ? Math.round((paidInvoices / totalInvoices) * 100) : 0;
    }

    // Generate Invoice ID
    generateInvoiceId(prefix, feeId, studentId, counter) {
        return `${prefix}-${feeId}-${studentId}-${String(counter).padStart(3, '0')}`;
    }

    // Validate Fee Data
    validateFeeData(feeData) {
        const errors = [];
        
        if (!feeData.name || feeData.name.trim() === '') {
            errors.push('Fee name is required');
        }
        if (!feeData.amount || feeData.amount <= 0) {
            errors.push('Valid amount is required');
        }
        if (!feeData.chargeDate) {
            errors.push('Charge date is required');
        }
        if (feeData.targetType !== 'all' && (!feeData.targets || feeData.targets.length === 0)) {
            errors.push('Please select at least one target');
        }
        
        return errors;
    }

    // Show Action Status
    showActionStatus(message, type = 'info') {
        // This would integrate with your existing toast/notification system
        console.log(`${type.toUpperCase()}: ${message}`);
        // In production, replace with actual notification system
    }

    // Show Toast Notification
    showToast(message, type = 'info') {
        // This would integrate with your existing toast system
        console.log(`TOAST ${type.toUpperCase()}: ${message}`);
        // In production, replace with actual toast system
    }
}

// Export for use in other modules
window.FeeManagement = FeeManagement;
