<!-- Payment Processing Modal -->
<div id="paymentModal" class="receipt-dialog-overlay" style="display:none;">
    <div class="receipt-dialog-content" style="max-width: 500px;">
        <div class="receipt-dialog-header" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 12px;">
            <h4 style="margin:0;"><i class="fas fa-money-check-alt"></i> Process Payment</h4>
            <button class="icon-btn" onclick="closePaymentModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="receipt-dialog-body" style="padding: 20px;">
            <p id="paymentStudentInfo" style="margin-bottom: 20px; font-weight: 600;"></p>
            <div class="form-section" style="padding:0;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Receptionist ID</label>
                        <input type="text" class="form-input" id="paymentReceptionistId" placeholder="e.g., R001">
                    </div>
                    <div class="form-group">
                        <label>Receptionist Name</label>
                        <input type="text" class="form-input" id="paymentReceptionistName" placeholder="Enter name">
                    </div>
                </div>
            </div>
        </div>
        <div class="receipt-dialog-actions">
            <button class="simple-btn secondary" onclick="closePaymentModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="simple-btn primary" onclick="confirmPayment()">
                <i class="fas fa-check"></i> Confirm Payment
            </button>
        </div>
    </div>
</div>
