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
    </div>
</div>

<!-- Compact Finance Stats -->
<div class="stats-grid-secondary vertical-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <h3>Collection Rate</h3>
            <div class="stat-number">78.5%</div>
            <div class="stat-change positive">+5% this month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-file-invoice"></i>
        </div>
        <div class="stat-content">
            <h3>Total Invoices</h3>
            <div class="stat-number">124</div>
            <div class="stat-change">98 paid</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="stat-content">
            <h3>Collected</h3>
            <div class="stat-number">$98,750</div>
            <div class="stat-change positive">+12% this month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3>Pending</h3>
            <div class="stat-number">$26,250</div>
            <div class="stat-change negative">22% remaining</div>
        </div>
    </div>
</div>

<!-- Finance Navigation Tabs -->
<div class="finance-tabs">
    <div class="tab-nav">
        <button class="tab-btn active" data-tab="generate" title="Generate Invoice">
            <i class="fas fa-plus-circle"></i>
        </button>
        <button class="tab-btn" data-tab="invoices" title="Check Invoice List">
            <i class="fas fa-list"></i>
        </button>
        <button class="tab-btn" data-tab="collection" title="Fee Collection Status">
            <i class="fas fa-chart-bar"></i>
        </button>
    </div>
    
    <!-- Generate Invoice Tab -->
    <div class="tab-content active" id="generate">
        <div class="simple-section">
            <div class="simple-header">
                <h3>Generate Invoice</h3>
                <div class="simple-actions">
                    <button class="simple-btn"><i class="fas fa-plus-circle"></i> Quick Invoice</button>
                    <button class="simple-btn"><i class="fas fa-file-import"></i> Bulk Generate</button>
                </div>
            </div>
            <div class="invoice-form-card">
                <div class="form-header">
                    <i class="fas fa-dollar-sign"></i>
                    <h4>Invoice Generation</h4>
                </div>

                <form class="invoice-form">
                    <div class="form-group">
                        <label>Student ID / Name</label>
                        <input type="text" placeholder="Enter student ID or search by name" class="form-input">
                    </div>

                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" class="form-input">
                    </div>

                    <div class="form-group">
                        <label>Invoice Items</label>
                        <button type="button" class="add-item-btn">+ Add Item</button>
                        <div class="invoice-items">
                            <div class="item-row">
                                <input type="text" placeholder="Item description" class="form-input">
                                <input type="number" placeholder="0" class="form-input amount-input">
                            </div>
                        </div>
                    </div>

                    <div class="total-section">
                        <label>Total Amount:</label>
                        <span class="total-amount">$0.00</span>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            Generate & Send
                        </button>
                        <button type="button" class="btn-secondary">
                            Save as Draft
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Invoice List Tab -->
    <div class="tab-content" id="invoices">
        <div class="simple-section">
            <div class="simple-header">
                <h3>Invoice List</h3>
                <div class="simple-actions">
                    <select class="filter-select">
                        <option value="all">All Status</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                        <option value="overdue">Overdue</option>
                        <option value="draft">Draft</option>
                    </select>
                    <input type="text" class="simple-search" placeholder="Search invoices...">
                </div>
            </div>
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Student Name</th>
                            <th>Grade</th>
                            <th>Amount</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#" class="invoice-link">INV-001</a></td>
                            <td>Alice Johnson</td>
                            <td>Grade 10A</td>
                            <td>$2,500.00</td>
                            <td>2024-12-15</td>
                            <td>2025-01-15</td>
                            <td><span class="status-badge paid">Paid</span></td>
                            <td>
                                <button class="simple-btn-icon"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#" class="invoice-link">INV-002</a></td>
                            <td>Michael Brown</td>
                            <td>Grade 12B</td>
                            <td>$2,750.00</td>
                            <td>2024-12-15</td>
                            <td>2025-01-15</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <button class="simple-btn-icon"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#" class="invoice-link">INV-003</a></td>
                            <td>Sarah Wilson</td>
                            <td>Grade 9C</td>
                            <td>$2,300.00</td>
                            <td>2024-12-20</td>
                            <td>2025-01-20</td>
                            <td><span class="status-badge overdue">Overdue</span></td>
                            <td>
                                <button class="simple-btn-icon"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#" class="invoice-link">INV-004</a></td>
                            <td>David Lee</td>
                            <td>Grade 11A</td>
                            <td>$2,600.00</td>
                            <td>2024-12-25</td>
                            <td>2025-01-25</td>
                            <td><span class="status-badge draft">Draft</span></td>
                            <td>
                                <button class="simple-btn-icon"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#" class="invoice-link">INV-005</a></td>
                            <td>Emma Davis</td>
                            <td>Grade 8B</td>
                            <td>$2,200.00</td>
                            <td>2024-12-28</td>
                            <td>2025-01-28</td>
                            <td><span class="status-badge paid">Paid</span></td>
                            <td>
                                <button class="simple-btn-icon"><i class="fas fa-eye"></i></button>
                                <button class="simple-btn-icon"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Fee Collection Status Tab -->
    <div class="tab-content" id="collection">
        <div class="simple-section">
            <div class="simple-header">
                <h3>Fee Collection Status</h3>
                <div class="simple-actions">
                    <select class="filter-select">
                        <option value="all">All Months</option>
                        <option value="2025-01">January 2025</option>
                        <option value="2025-02">February 2025</option>
                        <option value="2024-12">December 2024</option>
                        <option value="2024-11">November 2024</option>
                        <option value="2025-03">March 2025</option>
                    </select>
                    <input type="text" class="simple-search" placeholder="Search months...">
                </div>
            </div>
            <div class="simple-table-container">
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>Academic Month</th>
                            <th>Total Amount</th>
                            <th>Collected</th>
                            <th>Collection %</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>January 2025</td>
                            <td>$125,000.00</td>
                            <td class="collected-amount">$98,750.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 79%"></div>
                                    <span class="progress-text">79%</span>
                                </div>
                            </td>
                            <td><span class="status-badge this-month">This Month</span></td>
                        </tr>
                        <tr>
                            <td>February 2025</td>
                            <td>$130,000.00</td>
                            <td class="collected-amount">$0.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 0%"></div>
                                    <span class="progress-text">0%</span>
                                </div>
                            </td>
                            <td><span class="status-badge upcoming">Upcoming</span></td>
                        </tr>
                        <tr>
                            <td>December 2024</td>
                            <td>$120,000.00</td>
                            <td class="collected-amount">$120,000.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar completed" style="width: 100%"></div>
                                    <span class="progress-text">100%</span>
                                </div>
                            </td>
                            <td><span class="status-badge completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>November 2024</td>
                            <td>$118,000.00</td>
                            <td class="collected-amount">$118,000.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar completed" style="width: 100%"></div>
                                    <span class="progress-text">100%</span>
                                </div>
                            </td>
                            <td><span class="status-badge completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>March 2025</td>
                            <td>$135,000.00</td>
                            <td class="collected-amount">$0.00</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 0%"></div>
                                    <span class="progress-text">0%</span>
                                </div>
                            </td>
                            <td><span class="status-badge upcoming">Upcoming</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab Management
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>