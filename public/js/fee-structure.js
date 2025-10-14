/**
 * Fee Structure Page JavaScript
 * Complete functionality with all original data and features
 */

// Global variables
let schoolFees = {};
let academicYearConfig = {};
let additionalFees = [];
let currentEditingFeeId = null;

// Month names for display
const monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

// Grade configuration
const grades = [
    { name: 'Grade 7', value: 'Grade 7' },
    { name: 'Grade 8', value: 'Grade 8' },
    { name: 'Grade 9', value: 'Grade 9' },
    { name: 'Grade 10', value: 'Grade 10' },
    { name: 'Grade 11', value: 'Grade 11' },
    { name: 'Grade 12', value: 'Grade 12' }
];

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    initializeFeeStructures();
    renderAll();
});

// Initialize fee structures with sample data
function initializeFeeStructures() {
    // Load school fees
    const savedSchoolFees = localStorage.getItem('schoolFees');
    if (savedSchoolFees) {
        schoolFees = JSON.parse(savedSchoolFees);
    } else {
        // Default school fees
        schoolFees = {
            'Grade 7': 400,
            'Grade 8': 450,
            'Grade 9': 500,
            'Grade 10': 500,
            'Grade 11': 550,
            'Grade 12': 550
        };
        localStorage.setItem('schoolFees', JSON.stringify(schoolFees));
    }
    
    // Load academic year config
    const savedAcademicYear = localStorage.getItem('academicYearConfig');
    if (savedAcademicYear) {
        academicYearConfig = JSON.parse(savedAcademicYear);
    } else {
        // Default academic year
        academicYearConfig = {
            year: '2024-2025',
            startMonth: '6',
            startYear: '2024',
            endMonth: '5',
            endYear: '2025'
        };
        localStorage.setItem('academicYearConfig', JSON.stringify(academicYearConfig));
    }
    
    // Load additional fees
    const savedAdditionalFees = localStorage.getItem('additionalFees');
    if (savedAdditionalFees) {
        additionalFees = JSON.parse(savedAdditionalFees);
    } else {
        // Sample additional fees data
        additionalFees = [
            {
                id: 'FEE-001',
                type: 'onetime',
                name: 'Registration & Onboarding Fee',
                amount: 250.00,
                chargeDate: '2024-06-01',
                description: 'New student registration, orientation, and ID card',
                targetType: 'all',
                targets: [],
                collectionPercentage: 85
            },
            {
                id: 'FEE-002',
                type: 'onetime',
                name: 'Annual Exam Fee',
                amount: 100.00,
                chargeDate: '2025-02-01',
                description: 'Final examination and certificate processing',
                targetType: 'all',
                targets: [],
                collectionPercentage: 92
            },
            {
                id: 'FEE-003',
                type: 'onetime',
                name: 'Uniform Fee',
                amount: 150.00,
                chargeDate: '2024-06-15',
                description: 'School uniform set (2 sets)',
                targetType: 'grades',
                targets: ['Grade 7', 'Grade 8', 'Grade 9'],
                collectionPercentage: 78
            },
            {
                id: 'FEE-004',
                type: 'special',
                name: 'Sports Day Participation',
                amount: 30.00,
                chargeDate: '2024-11-15',
                description: 'Annual sports day event, uniform, and refreshments',
                targetType: 'classes',
                targets: ['7A', '7B', '8A', '8B'],
                collectionPercentage: 100
            },
            {
                id: 'FEE-005',
                type: 'special',
                name: 'Science Fair Project Fee',
                amount: 25.00,
                chargeDate: '2024-10-01',
                description: 'Materials for science fair projects',
                targetType: 'students',
                targets: ['STU001', 'STU002', 'STU003'],
                collectionPercentage: 95
            },
            {
                id: 'FEE-006',
                type: 'onetime',
                name: 'Library Membership',
                amount: 50.00,
                chargeDate: '2025-01-10',
                description: 'Annual library membership and digital resources access',
                targetType: 'all',
                targets: [],
                collectionPercentage: 88
            },
            {
                id: 'FEE-007',
                type: 'special',
                name: 'Graduation Ceremony',
                amount: 75.00,
                chargeDate: '2025-05-15',
                description: 'Graduation ceremony participation, gown rental, and certificate',
                targetType: 'grades',
                targets: ['Grade 12'],
                collectionPercentage: 100
            },
            {
                id: 'FEE-008',
                type: 'onetime',
                name: 'Laboratory Equipment',
                amount: 100.00,
                chargeDate: '2025-01-20',
                description: 'Science laboratory equipment and safety gear',
                targetType: 'classes',
                targets: ['10A', '10B', '11A', '11B', '12A', '12B'],
                collectionPercentage: 82
            },
            {
                id: 'FEE-009',
                type: 'special',
                name: 'Field Trip - Museum Visit',
                amount: 40.00,
                chargeDate: '2025-02-10',
                description: 'Educational field trip to national museum including transportation',
                targetType: 'grades',
                targets: ['Grade 7', 'Grade 8'],
                collectionPercentage: 90
            },
            {
                id: 'FEE-010',
                type: 'onetime',
                name: 'Technology Fee',
                amount: 80.00,
                chargeDate: '2025-01-05',
                description: 'Computer lab access, software licenses, and digital learning tools',
                targetType: 'all',
                targets: [],
                collectionPercentage: 95
            }
        ];
        
        localStorage.setItem('additionalFees', JSON.stringify(additionalFees));
    }
}

// Render all components
function renderAll() {
    renderAcademicYear();
    renderSchoolFeesTable();
    renderAdditionalFeesTable();
}

// Academic Year Functions
function renderAcademicYear() {
    document.getElementById('academicYearDisplay').textContent = academicYearConfig.year;
    document.getElementById('startMonthDisplay').textContent = `${monthNames[parseInt(academicYearConfig.startMonth) - 1]} ${academicYearConfig.startYear}`;
    document.getElementById('endMonthDisplay').textContent = `${monthNames[parseInt(academicYearConfig.endMonth) - 1]} ${academicYearConfig.endYear}`;
    
    // Count active grades
    document.getElementById('activeGradesDisplay').textContent = `${grades.length} Active`;
}

function editDefaultAcademicYear() {
    document.getElementById('academicYear').value = academicYearConfig.year;
    document.getElementById('startMonth').value = academicYearConfig.startMonth;
    document.getElementById('startYear').value = academicYearConfig.startYear;
    document.getElementById('endMonth').value = academicYearConfig.endMonth;
    document.getElementById('endYear').value = academicYearConfig.endYear;
    document.getElementById('academicYearDialog').style.display = 'flex';
}

function closeAcademicYearDialog() {
    document.getElementById('academicYearDialog').style.display = 'none';
}

function saveAcademicYear() {
    academicYearConfig = {
        year: document.getElementById('academicYear').value,
        startMonth: document.getElementById('startMonth').value,
        startYear: document.getElementById('startYear').value,
        endMonth: document.getElementById('endMonth').value,
        endYear: document.getElementById('endYear').value
    };
    
    localStorage.setItem('academicYearConfig', JSON.stringify(academicYearConfig));
    closeAcademicYearDialog();
    renderAcademicYear();
    showActionStatus('Academic year configuration saved successfully', 'success');
}

// School Fees Functions
function renderSchoolFeesTable() {
    const tbody = document.getElementById('schoolFeesTableBody');
    
    if (Object.keys(schoolFees).length === 0) {
        tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #999; padding: 2rem;">No school fees configured. Click "Configure" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = grades.map(grade => {
        const monthlyFee = schoolFees[grade.value] || 0;
        const collectionPercentage = Math.floor(Math.random() * 100); // Simulated data
        
        return `
            <tr>
                <td><strong>${grade.name}</strong></td>
                <td><strong>$${monthlyFee.toFixed(2)}</strong></td>
                <td>${monthNames[parseInt(academicYearConfig.startMonth) - 1]} ${academicYearConfig.startYear} - ${monthNames[parseInt(academicYearConfig.endMonth) - 1]} ${academicYearConfig.endYear}</td>
                <td>${generateCollectionBar(collectionPercentage)}</td>
            </tr>
        `;
    }).join('');
}

function openConfigureSchoolFees() {
    const container = document.getElementById('schoolFeesFormContainer');
    container.innerHTML = grades.map(grade => `
        <div class="form-group">
            <label for="fee_${grade.value.replace(' ', '_')}">${grade.name} Monthly Fee *</label>
            <input type="number" id="fee_${grade.value.replace(' ', '_')}" class="form-control" 
                   value="${schoolFees[grade.value] || 0}" step="0.01" min="0" required>
        </div>
    `).join('');
    
    document.getElementById('schoolFeesDialog').style.display = 'flex';
}

function closeSchoolFeesDialog() {
    document.getElementById('schoolFeesDialog').style.display = 'none';
}

function saveSchoolFees() {
    grades.forEach(grade => {
        const input = document.getElementById(`fee_${grade.value.replace(' ', '_')}`);
        if (input) {
            schoolFees[grade.value] = parseFloat(input.value) || 0;
        }
    });
    
    localStorage.setItem('schoolFees', JSON.stringify(schoolFees));
    closeSchoolFeesDialog();
    renderSchoolFeesTable();
    showActionStatus('School fees configuration saved successfully', 'success');
}

// Additional Fees Functions
function renderAdditionalFeesTable() {
    const tbody = document.getElementById('additionalFeesTableBody');
    
    if (additionalFees.length === 0) {
        tbody.innerHTML = '<tr><td colspan="7" style="text-align: center; color: #999; padding: 2rem;">No additional fees configured. Click "Add Fee" to add.</td></tr>';
        return;
    }
    
    tbody.innerHTML = additionalFees.map(fee => {
        const formattedDate = new Date(fee.chargeDate).toLocaleDateString();
        
        return `
            <tr>
                <td>
                    <span class="fee-name">${fee.name}</span>
                    <div class="target-info">
                        <span class="target-count">${formatTargetDisplay(fee.targetType, fee.targets)}</span>
                    </div>
                </td>
                <td>${generateFeeTypeBadge(fee.type)}</td>
                <td><span class="fee-amount">$${fee.amount.toFixed(2)}</span></td>
                <td>${formattedDate}</td>
                <td><span class="fee-description">${fee.description || '<span style="color: #999;">No description</span>'}</span></td>
                <td>${generateCollectionBar(fee.collectionPercentage)}</td>
                <td>
                    <div class="actions-cell">
                        <button class="action-icon edit" onclick="editFee('${fee.id}')" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-icon delete" onclick="deleteFee('${fee.id}')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
    }).join('');
}

function openAddFeeDialog() {
    currentEditingFeeId = null;
    document.getElementById('feeDialogTitle').textContent = 'Add Fee';
    document.getElementById('feeForm').reset();
    document.getElementById('feeId').value = '';
    
    // Set default date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('chargeDate').value = today;
    
    // Hide all target sections initially
    hideAllTargetSections();
    
    document.getElementById('feeDialog').style.display = 'flex';
}

function editFee(feeId) {
    const fee = additionalFees.find(f => f.id === feeId);
    if (!fee) return;
    
    currentEditingFeeId = feeId;
    document.getElementById('feeDialogTitle').textContent = 'Edit Fee';
    
    // Populate form
    document.getElementById('feeId').value = fee.id;
    document.getElementById('feeType').value = fee.type;
    document.getElementById('feeName').value = fee.name;
    document.getElementById('feeAmount').value = fee.amount;
    document.getElementById('chargeDate').value = fee.chargeDate;
    document.getElementById('feeDescription').value = fee.description || '';
    document.getElementById('feeTargetType').value = fee.targetType;
    
    // Update target options
    updateTargetOptions();
    
    // Pre-select existing targets
    preSelectTargets(fee);
    
    document.getElementById('feeDialog').style.display = 'flex';
}

function updateTargetOptions() {
    const targetType = document.getElementById('feeTargetType').value;
    hideAllTargetSections();
    
    if (targetType === 'grades') {
        document.getElementById('targetGradesSection').style.display = 'block';
    } else if (targetType === 'classes') {
        document.getElementById('targetClassesSection').style.display = 'block';
    } else if (targetType === 'students') {
        document.getElementById('targetStudentsSection').style.display = 'block';
    }
}

function hideAllTargetSections() {
    document.getElementById('targetGradesSection').style.display = 'none';
    document.getElementById('targetClassesSection').style.display = 'none';
    document.getElementById('targetStudentsSection').style.display = 'none';
}

function preSelectTargets(fee) {
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

function getSelectedTargets() {
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

function saveFee() {
    const feeData = {
        id: document.getElementById('feeId').value || 'fee_' + Date.now(),
        type: document.getElementById('feeType').value,
        name: document.getElementById('feeName').value.trim(),
        amount: parseFloat(document.getElementById('feeAmount').value),
        chargeDate: document.getElementById('chargeDate').value,
        description: document.getElementById('feeDescription').value.trim(),
        targetType: document.getElementById('feeTargetType').value,
        targets: getSelectedTargets(),
        collectionPercentage: 0
    };
    
    // Validate fee data
    if (!feeData.name || feeData.amount <= 0 || !feeData.chargeDate) {
        showActionStatus('Please fill in all required fields with valid data', 'warning');
        return;
    }
    
    if (feeData.targetType !== 'all' && feeData.targets.length === 0) {
        showActionStatus('Please select at least one target', 'warning');
        return;
    }
    
    if (currentEditingFeeId) {
        // Update existing fee
        const index = additionalFees.findIndex(f => f.id === currentEditingFeeId);
        if (index !== -1) {
            additionalFees[index] = feeData;
        }
    } else {
        // Add new fee
        additionalFees.push(feeData);
    }
    
    localStorage.setItem('additionalFees', JSON.stringify(additionalFees));
    closeFeeDialog();
    renderAdditionalFeesTable();
    showActionStatus(`Fee "${feeData.name}" ${currentEditingFeeId ? 'updated' : 'added'} successfully`, 'success');
}

function deleteFee(feeId) {
    const fee = additionalFees.find(f => f.id === feeId);
    if (!fee) return;
    
    if (confirm(`Are you sure you want to delete "${fee.name}"? This action cannot be undone.`)) {
        additionalFees = additionalFees.filter(f => f.id !== feeId);
        localStorage.setItem('additionalFees', JSON.stringify(additionalFees));
        renderAdditionalFeesTable();
        showActionStatus(`Fee "${fee.name}" deleted successfully`, 'success');
    }
}

function closeFeeDialog() {
    document.getElementById('feeDialog').style.display = 'none';
    currentEditingFeeId = null;
}

function refreshCollectionStatus() {
    showActionStatus('Refreshing collection status...', 'info');
    
    setTimeout(() => {
        // Load additional fees invoices data to calculate real collection percentages
        const additionalFeesInvoiceData = JSON.parse(localStorage.getItem('additionalFeesInvoiceData') || '[]');
        
        // Update collection percentages for all fees
        additionalFees.forEach(fee => {
            const feeInvoices = additionalFeesInvoiceData.filter(inv => inv.feeId === fee.id);
            const totalInvoices = feeInvoices.length;
            const paidInvoices = feeInvoices.filter(inv => inv.status === 'paid').length;
            const collectionPercentage = totalInvoices > 0 ? Math.round((paidInvoices / totalInvoices) * 100) : 0;
            
            fee.collectionPercentage = collectionPercentage;
        });
        
        // Save updated fees
        localStorage.setItem('additionalFees', JSON.stringify(additionalFees));
        
        // Re-render the table to show updated collection percentages
        renderAdditionalFeesTable();
        
        showActionStatus('Collection status refreshed successfully', 'success');
    }, 1500);
}

// Helper functions
function generateCollectionBar(percentage) {
    const barClass = percentage >= 100 ? 'complete' : percentage >= 50 ? 'partial' : 'low';
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

function generateFeeTypeBadge(type) {
    const typeLabel = type === 'onetime' ? 'One-Time' : 'Special Event';
    return `<span class="fee-type-badge ${type}">${typeLabel}</span>`;
}

function formatTargetDisplay(targetType, targets) {
    if (targetType === 'all') return 'All Students';
    if (targetType === 'grades') return `Grades: ${targets.join(', ')}`;
    if (targetType === 'classes') return `Classes: ${targets.join(', ')}`;
    if (targetType === 'students') return `${targets.length} Students`;
    return 'Unknown';
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