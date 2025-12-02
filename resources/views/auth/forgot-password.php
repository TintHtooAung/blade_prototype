<?php
$pageTitle = 'Smart Campus Nova Hub - Forgot Password';
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            padding: 3rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
        }

        .auth-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #9ca3af;
            transition: all 0.3s ease;
        }

        .step.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .step.completed {
            background: #10b981;
            color: white;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .input-group .form-input {
            padding-left: 3rem;
        }

        .form-help {
            font-size: 0.875rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }

        .btn {
            width: 100%;
            padding: 0.875rem 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            margin-top: 0.5rem;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .otp-inputs {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .otp-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .resend-link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .resend-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e5e7eb;
        }

        .auth-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }

        .alert.show {
            display: block;
        }

        .alert-error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .alert-success {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        @media (max-width: 768px) {
            .auth-container {
                padding: 2rem;
            }

            .otp-input {
                width: 45px;
                height: 45px;
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-key"></i>
            </div>
            <h1>Reset Password</h1>
            <p>Follow the steps below to reset your password</p>
        </div>

        <div class="step-indicator">
            <div class="step active" id="step1-indicator">1</div>
            <div class="step" id="step2-indicator">2</div>
            <div class="step" id="step3-indicator">3</div>
        </div>

        <div id="alertBox" class="alert"></div>

        <!-- Step 1: NRC Verification -->
        <div class="form-step active" id="step1">
            <form id="nrcForm">
                <div class="form-group">
                    <label for="nrc" class="form-label">National Registration Card (NRC)</label>
                    <div class="input-group">
                        <i class="fas fa-id-card"></i>
                        <input type="text" id="nrc" name="nrc" class="form-input" placeholder="e.g., 12/ABCDEF(N)123456" required>
                    </div>
                    <div class="form-help">Enter your NRC number for account verification</div>
                </div>
                <button type="submit" class="btn btn-primary">Verify NRC</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/auth/login'">Back to Login</button>
            </form>
        </div>

        <!-- Step 2: Contact Method & OTP -->
        <div class="form-step" id="step2">
            <form id="contactForm">
                <div class="form-group">
                    <label class="form-label">Choose verification method</label>
                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <label style="flex: 1; cursor: pointer;">
                            <input type="radio" name="contactMethod" value="email" checked style="margin-right: 0.5rem;">
                            Email
                        </label>
                        <label style="flex: 1; cursor: pointer;">
                            <input type="radio" name="contactMethod" value="phone" style="margin-right: 0.5rem;">
                            Phone
                        </label>
                    </div>
                </div>

                <div class="form-group" id="emailGroup">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email">
                    </div>
                </div>

                <div class="form-group" id="phoneGroup" style="display: none;">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="Enter your phone number">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Send OTP</button>
                <button type="button" class="btn btn-secondary" onclick="goToStep(1)">Back</button>
            </form>
        </div>

        <!-- Step 3: OTP Verification & New Password -->
        <div class="form-step" id="step3">
            <form id="otpForm">
                <div class="form-group">
                    <label class="form-label">Enter OTP Code</label>
                    <div class="otp-inputs">
                        <input type="text" class="otp-input" maxlength="1" data-index="0">
                        <input type="text" class="otp-input" maxlength="1" data-index="1">
                        <input type="text" class="otp-input" maxlength="1" data-index="2">
                        <input type="text" class="otp-input" maxlength="1" data-index="3">
                        <input type="text" class="otp-input" maxlength="1" data-index="4">
                        <input type="text" class="otp-input" maxlength="1" data-index="5">
                    </div>
                    <div class="resend-link">
                        Didn't receive code? <a href="#" id="resendOtp">Resend OTP</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="newPassword" class="form-label">New Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="newPassword" name="newPassword" class="form-input" placeholder="Enter new password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-input" placeholder="Confirm new password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Reset Password</button>
                <button type="button" class="btn btn-secondary" onclick="goToStep(2)">Back</button>
            </form>
        </div>

        <div class="auth-footer">
            <a href="/auth/login">
                <i class="fas fa-arrow-left"></i>
                Back to Login
            </a>
        </div>
    </div>

    <script>
        let currentStep = 1;
        let verifiedNRC = '';
        let selectedMethod = 'email';

        // Step navigation
        function goToStep(step) {
            document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.step').forEach(s => {
                s.classList.remove('active', 'completed');
            });

            document.getElementById(`step${step}`).classList.add('active');
            
            for (let i = 1; i <= 3; i++) {
                if (i < step) {
                    document.getElementById(`step${i}-indicator`).classList.add('completed');
                } else if (i === step) {
                    document.getElementById(`step${i}-indicator`).classList.add('active');
                }
            }
            
            currentStep = step;
            hideAlert();
        }

        // Alert functions
        function showAlert(message, type = 'error') {
            const alertBox = document.getElementById('alertBox');
            alertBox.textContent = message;
            alertBox.className = `alert alert-${type} show`;
        }

        function hideAlert() {
            document.getElementById('alertBox').classList.remove('show');
        }

        // Step 1: NRC Verification
        document.getElementById('nrcForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const nrc = document.getElementById('nrc').value.trim();
            
            if (!nrc) {
                showAlert('Please enter your NRC number');
                return;
            }

            const btn = this.querySelector('button[type="submit"]');
            btn.textContent = 'Verifying...';
            btn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                verifiedNRC = nrc;
                btn.textContent = 'Verify NRC';
                btn.disabled = false;
                goToStep(2);
            }, 1500);
        });

        // Contact method toggle
        document.querySelectorAll('input[name="contactMethod"]').forEach(radio => {
            radio.addEventListener('change', function() {
                selectedMethod = this.value;
                if (this.value === 'email') {
                    document.getElementById('emailGroup').style.display = 'block';
                    document.getElementById('phoneGroup').style.display = 'none';
                    document.getElementById('email').required = true;
                    document.getElementById('phone').required = false;
                } else {
                    document.getElementById('emailGroup').style.display = 'none';
                    document.getElementById('phoneGroup').style.display = 'block';
                    document.getElementById('email').required = false;
                    document.getElementById('phone').required = true;
                }
            });
        });

        // Step 2: Send OTP
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const contact = selectedMethod === 'email' 
                ? document.getElementById('email').value 
                : document.getElementById('phone').value;
            
            if (!contact) {
                showAlert(`Please enter your ${selectedMethod}`);
                return;
            }

            const btn = this.querySelector('button[type="submit"]');
            btn.textContent = 'Sending OTP...';
            btn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                btn.textContent = 'Send OTP';
                btn.disabled = false;
                showAlert(`OTP sent to your ${selectedMethod}`, 'success');
                setTimeout(() => goToStep(3), 1000);
            }, 1500);
        });

        // OTP Input handling
        const otpInputs = document.querySelectorAll('.otp-input');
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (this.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !this.value && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').slice(0, 6);
                pastedData.split('').forEach((char, i) => {
                    if (otpInputs[i]) {
                        otpInputs[i].value = char;
                    }
                });
                if (pastedData.length === 6) {
                    otpInputs[5].focus();
                }
            });
        });

        // Resend OTP
        document.getElementById('resendOtp').addEventListener('click', function(e) {
            e.preventDefault();
            showAlert('OTP resent successfully', 'success');
        });

        // Step 3: Reset Password
        document.getElementById('otpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const otp = Array.from(otpInputs).map(input => input.value).join('');
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (otp.length !== 6) {
                showAlert('Please enter the complete OTP code');
                return;
            }

            if (newPassword.length < 8) {
                showAlert('Password must be at least 8 characters long');
                return;
            }

            if (newPassword !== confirmPassword) {
                showAlert('Passwords do not match');
                return;
            }

            const btn = this.querySelector('button[type="submit"]');
            btn.textContent = 'Resetting Password...';
            btn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                showAlert('Password reset successfully! Redirecting to login...', 'success');
                setTimeout(() => {
                    window.location.href = '/auth/login';
                }, 2000);
            }, 1500);
        });
    </script>
</body>
</html>

<?php
$content = ob_get_clean();
echo $content;
?>
