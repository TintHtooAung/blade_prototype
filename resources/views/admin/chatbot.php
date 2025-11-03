<?php
$pageTitle = 'Smart Campus Nova Hub - Admin Assistant';
$pageIcon = 'fas fa-robot';
$pageHeading = 'Admin Assistant';
$activePage = 'chatbot';

// Include UI components
include __DIR__ . '/../components/ui/card.php';

ob_start();
?>
<!-- Compact Page Header -->
<div class="page-header-compact">
    <div class="page-icon-compact">
        <i class="<?php echo $pageIcon; ?>"></i>
    </div>
    <div class="page-title-compact">
        <h2><?php echo $pageHeading; ?></h2>
    </div>
</div>

<!-- Sample Questions Section -->
<div class="simple-section" style="margin-bottom: 1.5rem;">
    <div class="simple-header">
        <h3>Quick Actions</h3>
    </div>
    <div class="sample-questions-grid">
        <div class="sample-question-card" onclick="sendQuickMessage('Show system dashboard')">
            <i class="fas fa-tachometer-alt"></i>
            <span>System Dashboard</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show pending leave requests')">
            <i class="fas fa-file-medical"></i>
            <span>Leave Requests</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show financial overview')">
            <i class="fas fa-dollar-sign"></i>
            <span>Financial Stats</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show user statistics')">
            <i class="fas fa-users"></i>
            <span>User Stats</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show attendance overview')">
            <i class="fas fa-user-check"></i>
            <span>Attendance</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show academic performance')">
            <i class="fas fa-chart-line"></i>
            <span>Performance</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show system logs')">
            <i class="fas fa-history"></i>
            <span>Activity Logs</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Generate reports')">
            <i class="fas fa-file-alt"></i>
            <span>Reports</span>
        </div>
    </div>
</div>

<!-- Chatbot Container -->
<div class="chatbot-container">
    <!-- Chat Messages Area -->
    <div class="chat-messages" id="chatMessages">
        <!-- Welcome Message -->
        <div class="message bot-message">
            <div class="message-avatar">
                <i class="fas fa-robot"></i>
            </div>
            <div class="message-content">
                <div class="message-text">
                    <strong>Hello, Administrator! Welcome to your Admin Assistant.</strong>
                    <p style="margin-top: 8px;">I can help you with:</p>
                    <ul style="margin: 8px 0 0 20px; padding: 0;">
                        <li>👥 <strong>User Management:</strong> Manage all users and access control</li>
                        <li>🏫 <strong>Academic Management:</strong> Full control over academics</li>
                        <li>💰 <strong>Financial Management:</strong> Fees, payroll, invoices</li>
                        <li>✅ <strong>Approvals:</strong> Leave requests, enrollments, documents</li>
                        <li>📊 <strong>Analytics:</strong> Comprehensive system insights</li>
                        <li>⚙️ <strong>System Settings:</strong> Configuration and settings</li>
                    </ul>
                    <p style="margin-top: 12px;">How can I assist you today?</p>
                </div>
                <div class="message-time"><?php echo date('H:i'); ?></div>
            </div>
        </div>
    </div>
    
    <!-- Quick Action Buttons -->
    <div class="quick-actions" id="quickActions">
        <button class="quick-btn" onclick="sendQuickMessage('System overview')">
            <i class="fas fa-chart-pie"></i> Overview
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Pending approvals')">
            <i class="fas fa-tasks"></i> Approvals
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Financial summary')">
            <i class="fas fa-dollar-sign"></i> Finance
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('User management')">
            <i class="fas fa-users-cog"></i> Users
        </button>
    </div>
    
    <!-- Typing Indicator -->
    <div class="typing-indicator" id="typingIndicator" style="display: none;">
        <div class="message bot-message">
            <div class="message-avatar">
                <i class="fas fa-robot"></i>
            </div>
            <div class="message-content">
                <div class="typing-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chat Input Area -->
    <div class="chat-input-area">
        <button class="attach-btn" onclick="document.getElementById('fileInput').click()">
            <i class="fas fa-paperclip"></i>
        </button>
        <input type="file" id="fileInput" style="display: none;" accept="*/*">
        <input type="text" id="chatInput" class="chat-input" placeholder="Type your message...">
        <button class="send-btn" onclick="sendMessage()">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>

<style>
/* Chatbot Styles */
.chatbot-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    height: 600px;
    overflow: hidden;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.message {
    display: flex;
    gap: 0.75rem;
    align-items: flex-start;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 18px;
}

.bot-message .message-avatar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.user-message {
    flex-direction: row-reverse;
}

.user-message .message-avatar {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.message-content {
    flex: 1;
    max-width: 70%;
}

.user-message .message-content {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.message-text {
    background: #f7fafc;
    padding: 0.875rem 1rem;
    border-radius: 12px;
    line-height: 1.5;
}

.user-message .message-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.message-time {
    font-size: 0.75rem;
    color: #a0aec0;
    margin-top: 0.25rem;
}

.quick-actions {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e2e8f0;
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.quick-btn {
    padding: 0.5rem 1rem;
    background: #f7fafc;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.quick-btn:hover {
    background: #edf2f7;
    border-color: #cbd5e0;
}

.quick-btn i {
    font-size: 14px;
}

.chat-input-area {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e2e8f0;
    display: flex;
    gap: 0.75rem;
    align-items: center;
}

.chat-input {
    flex: 1;
    padding: 0.75rem 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    font-size: 0.9375rem;
    outline: none;
    transition: border-color 0.2s;
}

.chat-input:focus {
    border-color: #667eea;
}

.attach-btn, .send-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.attach-btn {
    background: #f7fafc;
    color: #4a5568;
}

.attach-btn:hover {
    background: #edf2f7;
}

.send-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.send-btn:hover {
    transform: scale(1.05);
}

.typing-indicator {
    padding: 0 1.5rem;
}

.typing-dots {
    display: flex;
    gap: 4px;
    padding: 0.875rem 1rem;
    background: #f7fafc;
    border-radius: 12px;
    width: fit-content;
}

.typing-dots span {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #a0aec0;
    animation: typing 1.4s infinite;
}

.typing-dots span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-dots span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
    }
    30% {
        transform: translateY(-10px);
    }
}

.sample-questions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.sample-question-card {
    background: white;
    padding: 1.25rem;
    border-radius: 12px;
    border: 2px solid #e2e8f0;
    cursor: pointer;
    transition: all 0.2s;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
}

.sample-question-card:hover {
    border-color: #667eea;
    background: #f7fafc;
    transform: translateY(-2px);
}

.sample-question-card i {
    font-size: 2rem;
    color: #667eea;
}

.sample-question-card span {
    font-size: 0.875rem;
    font-weight: 500;
    color: #2d3748;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
    margin-top: 12px;
    flex-wrap: wrap;
}

.action-btn {
    padding: 0.5rem 1rem;
    border: 1px solid;
    border-radius: 8px;
    cursor: pointer;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
}

.action-btn.primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-color: #667eea;
    color: white;
}

.action-btn.primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
}

.action-btn.secondary {
    background: white;
    border-color: #e2e8f0;
    color: #4a5568;
}

.action-btn.secondary:hover {
    background: #f7fafc;
}

.action-btn.success {
    background: #48bb78;
    border-color: #48bb78;
    color: white;
}

.action-btn.danger {
    background: #f56565;
    border-color: #f56565;
    color: white;
}

/* Table Styles for Chat Messages */
.message-text table {
    width: 100%;
    border-collapse: collapse;
    margin: 12px 0;
    font-size: 0.875rem;
}

.message-text table thead {
    background: #edf2f7;
}

.message-text table th {
    padding: 0.75rem;
    text-align: left;
    font-weight: 600;
    border-bottom: 2px solid #cbd5e0;
}

.message-text table td {
    padding: 0.75rem;
    border-bottom: 1px solid #e2e8f0;
}

.message-text table tr:last-child td {
    border-bottom: none;
}

.message-text table tr:hover {
    background: #f7fafc;
}

.data-label {
    font-weight: 600;
    color: #2d3748;
}

.status-badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
}

.status-badge.success {
    background: #c6f6d5;
    color: #22543d;
}

.status-badge.warning {
    background: #feebc8;
    color: #7c2d12;
}

.status-badge.danger {
    background: #fed7d7;
    color: #742a2a;
}

.status-badge.info {
    background: #bee3f8;
    color: #2c5282;
}
</style>

<script>
let currentFile = null;

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    const chatInput = document.getElementById('chatInput');
    const fileInput = document.getElementById('fileInput');
    
    // Send message on Enter key
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
    
    // Handle file selection
    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            currentFile = e.target.files[0];
            addMessage(`📎 Attached: ${currentFile.name}`, 'user');
        }
    });
});

function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    
    if (!message && !currentFile) return;
    
    // Add user message
    if (message) {
        addMessage(message, 'user');
    }
    
    // Clear input
    input.value = '';
    
    // Show typing indicator
    showTypingIndicator();
    
    // Simulate bot response
    setTimeout(() => {
        hideTypingIndicator();
        const response = generateBotResponse(message, currentFile);
        if (response.text) {
            addMessage(response.text, 'bot', response.actions);
        }
        currentFile = null;
    }, 1000 + Math.random() * 1000);
}

function sendQuickMessage(message) {
    addMessage(message, 'user');
    showTypingIndicator();
    
    setTimeout(() => {
        hideTypingIndicator();
        const response = generateBotResponse(message);
        if (response.text) {
            addMessage(response.text, 'bot', response.actions);
        }
    }, 1000 + Math.random() * 1000);
}

function addMessage(text, type, actions = null) {
    const messagesContainer = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}-message`;
    
    const time = new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
    
    let actionsHtml = '';
    if (actions && actions.length > 0) {
        actionsHtml = '<div class="action-buttons">';
        actions.forEach(action => {
            actionsHtml += `<button class="action-btn ${action.class || 'primary'}" onclick="${action.onclick}">
                <i class="${action.icon}"></i> ${action.label}
            </button>`;
        });
        actionsHtml += '</div>';
    }
    
    messageDiv.innerHTML = `
        <div class="message-avatar">
            <i class="${type === 'bot' ? 'fas fa-robot' : 'fas fa-user'}"></i>
        </div>
        <div class="message-content">
            <div class="message-text">${text}${actionsHtml}</div>
            <div class="message-time">${time}</div>
        </div>
    `;
    
    messagesContainer.appendChild(messageDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function showTypingIndicator() {
    document.getElementById('typingIndicator').style.display = 'block';
    const messagesContainer = document.getElementById('chatMessages');
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function hideTypingIndicator() {
    document.getElementById('typingIndicator').style.display = 'none';
}

function generateBotResponse(userMessage, file) {
    const lowerMessage = userMessage.toLowerCase();
    
    // System Dashboard/Overview
    if (lowerMessage.includes('dashboard') || lowerMessage.includes('overview') || lowerMessage.includes('system')) {
        const today = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        return {
            text: `**System Dashboard Overview**\n**${today}**\n\n👥 **User Statistics:**\n• Total Users: 1,687\n  - Students: 1,520 (90%)\n  - Teachers: 82 (5%)\n  - Staff: 35 (2%)\n  - Parents: 50 active accounts (3%)\n\n📊 **Today's Activity:**\n• Active Sessions: 1,245\n• Attendance Marked: 96%\n• New Enrollments: 3\n• System Uptime: 99.8%\n\n💰 **Financial Summary:**\n• Total Revenue (This Month): $285,000\n• Outstanding Fees: $45,000\n• Collection Rate: 86%\n\n⚠️ **Alerts & Notifications:**\n• Pending Leave Requests: 8\n• Low Attendance Alerts: 12 students\n• Fee Payment Reminders: 85 students\n• System Updates Available: 2\n\n📈 **Performance Metrics:**\n• Average GPA: 3.45/4.0\n• Overall Attendance: 96%\n• Teacher Satisfaction: 4.5/5.0\n• Parent Engagement: 78%`,
            actions: [
                {
                    label: 'View Full Dashboard',
                    icon: 'fas fa-tachometer-alt',
                    onclick: 'window.location.href="/admin/dashboard"'
                },
                {
                    label: 'System Logs',
                    icon: 'fas fa-history',
                    class: 'secondary',
                    onclick: 'window.location.href="/admin/activity-logs"'
                }
            ]
        };
    }
    
    // Leave Requests
    if (lowerMessage.includes('leave request') || lowerMessage.includes('pending')) {
        return {
            text: `**Pending Leave Requests: 8**\n\n⏳ **Requires Action:**\n\n**1. Ms. Jennifer Lee (Teacher)**\n• Type: Medical Leave\n• Duration: Nov 5-7, 2025 (3 days)\n• Reason: Medical procedure\n• Submitted: Oct 30, 2025\n• Supporting Document: ✅ Medical certificate attached\n\n**2. Mr. David Kumar (Teacher)**\n• Type: Personal Leave\n• Duration: Nov 10, 2025 (1 day)\n• Reason: Family event\n• Submitted: Oct 31, 2025\n\n**3. Emily Wilson (Student - Grade 9-A)**\n• Type: Medical Leave\n• Duration: Nov 1-2, 2025 (2 days)\n• Reason: Flu\n• Submitted: Oct 31, 2025\n• Parent: Mrs. Wilson\n\n**4. Michael Brown (Staff)**\n• Type: Emergency Leave\n• Duration: Nov 3, 2025 (1 day)\n• Reason: Personal emergency\n• Submitted: Today\n\n**+4 more requests**\n\n📊 **Leave Statistics:**\n• Approved This Month: 25\n• Rejected: 2\n• Pending: 8\n• Average Response Time: 24 hours`,
            actions: [
                {
                    label: 'Review Requests',
                    icon: 'fas fa-check',
                    class: 'success',
                    onclick: 'window.location.href="/admin/leave-requests"'
                },
                {
                    label: 'View History',
                    icon: 'fas fa-history',
                    class: 'secondary',
                    onclick: 'window.location.href="/admin/leave-requests"'
                }
            ]
        };
    }
    
    // Financial Overview
    if (lowerMessage.includes('financial') || lowerMessage.includes('finance') || lowerMessage.includes('fee')) {
        return {
            text: `**Financial Overview & Management:**\n\n💰 **Student Fees (This Month):**\n• Total Expected: $330,000\n• Collected: $285,000 (86%)\n• Outstanding: $45,000 (14%)\n• Overdue: $12,500\n\n💵 **Fee Breakdown:**\n• Tuition Fees: $250,000\n• Lab Fees: $25,000\n• Library Fees: $5,000\n• Sports Fees: $3,000\n• Other Fees: $2,000\n\n👨‍💼 **Payroll Management:**\n• Total Monthly Payroll: $185,000\n  - Teachers: $145,000 (82 teachers)\n  - Staff: $40,000 (35 staff)\n• Next Payroll Date: November 5, 2025\n• Status: ✅ All processed\n\n📊 **Payment Trends:**\n• On-Time Payments: 72%\n• Late Payments: 14%\n• Payment Plan: 8%\n• Pending: 6%\n\n⚠️ **Action Required:**\n• 85 students need payment reminders\n• 23 accounts overdue >30 days\n• 5 payment plans need review`,
            actions: [
                {
                    label: 'View Student Fees',
                    icon: 'fas fa-file-invoice-dollar',
                    onclick: 'window.location.href="/admin/student-fee-management"'
                },
                {
                    label: 'Payroll Management',
                    icon: 'fas fa-money-check-alt',
                    onclick: 'window.location.href="/admin/salary-payroll"'
                },
                {
                    label: 'Generate Report',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'sendQuickMessage("Generate financial report")'
                }
            ]
        };
    }
    
    // User Management
    if (lowerMessage.includes('user') && (lowerMessage.includes('management') || lowerMessage.includes('stat'))) {
        return {
            text: `**User Management & Statistics:**\n\n👥 **Total System Users: 1,687**\n\n**By Role:**\n• **Students:** 1,520 (90%)\n  - Active: 1,498\n  - Inactive: 22\n  - New (This Month): 15\n\n• **Teachers:** 82 (5%)\n  - Full-Time: 68\n  - Part-Time: 10\n  - Contract: 4\n  - New (This Month): 2\n\n• **Staff:** 35 (2%)\n  - Administrative: 18\n  - Support: 12\n  - Maintenance: 5\n\n• **Parents:** 50 (3%)\n  - Active Accounts: 50\n  - Total Parent Records: 1,200+\n  - Registered: 4% (need improvement)\n\n**Account Activity:**\n• Daily Active Users: 1,245\n• Weekly Active: 1,580\n• Login Success Rate: 98%\n• Account Issues: 8 (password resets)\n\n**User Actions Needed:**\n• 3 new user approvals pending\n• 5 role change requests\n• 12 inactive accounts (>90 days)`,
            actions: [
                {
                    label: 'Manage Users',
                    icon: 'fas fa-users-cog',
                    onclick: 'window.location.href="/admin/user-management"'
                },
                {
                    label: 'View Activity Logs',
                    icon: 'fas fa-chart-line',
                    onclick: 'window.location.href="/admin/activity-logs"'
                },
                {
                    label: 'Generate Report',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'sendQuickMessage("Generate user report")'
                }
            ]
        };
    }
    
    // Attendance Overview
    if (lowerMessage.includes('attendance')) {
        return {
            text: `**Comprehensive Attendance Overview:**\n\n📊 **Today's Attendance:**\n\n**Students:** 1,456/1,520 (96%)\n• Grade 7: 320/335 (95%)\n• Grade 8: 298/310 (96%)\n• Grade 9: 285/295 (97%)\n• Grade 10: 275/285 (96%)\n• Grade 11: 278/295 (94%)\n\n**Staff:** 110/117 (94%)\n• Teachers: 78/82 (95%)\n• Staff: 32/35 (91%)\n\n📈 **Monthly Trends:**\n• October Average: 95%\n• September Average: 93%\n• Trend: ↗️ +2% improvement\n\n⚠️ **Alerts:**\n• 12 students below 85% attendance\n• 3 students absent >5 consecutive days\n• 2 teachers need attendance improvement plan\n\n🏆 **Perfect Attendance:**\n• Students: 456 (30%)\n• Teachers: 45 (55%)\n\n**Action Items:**\n• Review low attendance cases\n• Send automated reminders\n• Schedule parent meetings for chronic absenteeism`,
            actions: [
                {
                    label: 'View Attendance',
                    icon: 'fas fa-user-check',
                    onclick: 'window.location.href="/admin/attendance"'
                },
                {
                    label: 'Generate Report',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'sendQuickMessage("Generate attendance report")'
                }
            ]
        };
    }
    
    // Academic Performance
    if (lowerMessage.includes('academic') || lowerMessage.includes('performance')) {
        return {
            text: `**Academic Performance Analytics:**\n\n📊 **Overall School Performance:**\n• Average GPA: **3.45/4.0**\n• Overall Pass Rate: **94%**\n• Honor Roll: 456 students (30%)\n• Dean's List: 182 students (12%)\n\n**By Grade Level:**\n• Grade 7: 3.38 GPA (92% pass rate)\n• Grade 8: 3.42 GPA (93% pass rate)\n• Grade 9: 3.48 GPA (95% pass rate)\n• Grade 10: 3.52 GPA (96% pass rate)\n• Grade 11: 3.55 GPA (95% pass rate)\n\n**By Department:**\n• Mathematics: 85% avg\n• Science: 83% avg\n• Languages: 88% avg\n• Social Studies: 86% avg\n• Arts: 92% avg\n• Computer Science: 87% avg\n\n**Teacher Effectiveness:**\n• Excellent (>90% pass rate): 45 teachers\n• Good (80-90%): 28 teachers\n• Needs Support (<80%): 9 teachers\n\n📈 **Trends:**\n• Year-over-Year: +3% improvement\n• Dropout Rate: 1.2% (below target of 2%)\n• College Admission Rate: 92%\n\n⚠️ **Students Needing Support: 42**`,
            actions: [
                {
                    label: 'View Academic Data',
                    icon: 'fas fa-graduation-cap',
                    onclick: 'window.location.href="/admin/academic-management"'
                },
                {
                    label: 'View Exam Results',
                    icon: 'fas fa-clipboard-list',
                    onclick: 'window.location.href="/admin/exam-database"'
                },
                {
                    label: 'Generate Report',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'sendQuickMessage("Generate academic report")'
                }
            ]
        };
    }
    
    // System Logs
    if (lowerMessage.includes('log') || lowerMessage.includes('activity')) {
        return {
            text: `**Recent System Activity Logs:**\n\n🕐 **Today's Activity:**\n\n• **09:45 AM** - User Login: teacher@example.com (Success)\n• **09:42 AM** - Attendance Marked: Grade 9-A by Ms. Johnson\n• **09:38 AM** - Leave Request Submitted: Emily Wilson\n• **09:35 AM** - Fee Payment: $450 by John Smith (Parent)\n• **09:30 AM** - User Login: admin@example.com (Success)\n• **09:25 AM** - Announcement Posted: Parent-Teacher Meeting\n• **09:20 AM** - Grade Updated: Student #1523 - Mathematics\n• **09:15 AM** - User Login: staff@example.com (Success)\n\n📊 **Activity Summary (Last 24 Hours):**\n• Total Logins: 1,245\n• Failed Login Attempts: 28\n• Data Changes: 456\n• File Uploads: 89\n• System Errors: 0 ✅\n\n🔒 **Security Events:**\n• Suspicious Activity: None ✅\n• Password Changes: 12\n• Account Lockouts: 3\n• 2FA Activations: 5\n\n**System Health:**\n• Server Status: ✅ Online\n• Database: ✅ Healthy\n• Backup Status: ✅ Last backup 2 hours ago`,
            actions: [
                {
                    label: 'View Full Logs',
                    icon: 'fas fa-history',
                    onclick: 'window.location.href="/admin/activity-logs"'
                },
                {
                    label: 'Export Logs',
                    icon: 'fas fa-download',
                    class: 'secondary',
                    onclick: 'addMessage("Exporting activity logs... [CSV Generated]", "bot")'
                }
            ]
        };
    }
    
    // Reports
    if (lowerMessage.includes('report') || lowerMessage.includes('generate report')) {
        return {
            text: `**Comprehensive Report Generation:**\n\n📊 **Available Admin Reports:**\n\n**1. Financial Reports**\n• Fee Collection Summary\n• Outstanding Payments Report\n• Payroll Reports\n• Budget vs Actual Analysis\n• Revenue Trends\n\n**2. Academic Reports**\n• Overall Performance Report\n• Grade Distribution Analysis\n• Department Effectiveness\n• Student Progress Reports\n• Teacher Performance Metrics\n\n**3. Attendance Reports**\n• Daily/Weekly/Monthly Attendance\n• Chronic Absenteeism Report\n• Perfect Attendance List\n• Grade-wise Comparison\n\n**4. User Management Reports**\n• User Activity Report\n• New Enrollments Report\n• Staff Directory\n• Parent Engagement Report\n\n**5. System Reports**\n• Activity Logs Export\n• System Usage Statistics\n• Security Audit Report\n• Backup Status Report\n\n**Recently Generated:**\n• Monthly Financial Report (Oct 2025)\n• Attendance Summary (Oct 2025)\n• User Activity Log (Last Week)\n\nWhich report would you like to generate?`,
            actions: [
                {
                    label: 'Financial Report',
                    icon: 'fas fa-dollar-sign',
                    onclick: 'addMessage("Generating comprehensive financial report...", "bot")'
                },
                {
                    label: 'Academic Report',
                    icon: 'fas fa-graduation-cap',
                    onclick: 'addMessage("Generating academic performance report...", "bot")'
                },
                {
                    label: 'Report Centre',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'window.location.href="/admin/report-centre"'
                }
            ]
        };
    }
    
    // Approvals
    if (lowerMessage.includes('approval')) {
        return {
            text: `**Pending Approvals & Actions:**\n\n⏳ **Items Requiring Your Approval:**\n\n**Leave Requests: 8**\n• 3 Teacher leave requests\n• 4 Student leave requests\n• 1 Staff leave request\n\n**New Enrollments: 3**\n• Grade 7: 1 student\n• Grade 9: 1 student\n• Grade 10: 1 student\n\n**User Account Requests: 5**\n• 3 New parent accounts\n• 2 Role change requests\n\n**Budget Requests: 2**\n• Mathematics Dept: $2,500 (Lab equipment)\n• Sports Dept: $1,800 (New equipment)\n\n**Document Approvals: 4**\n• 2 Transcript requests\n• 1 Certificate request\n• 1 Recommendation letter\n\n📊 **Approval Statistics:**\n• Average Response Time: 24 hours\n• Approval Rate: 92%\n• Pending Items: 22\n• Overdue Reviews: 0 ✅`,
            actions: [
                {
                    label: 'Review Leave Requests',
                    icon: 'fas fa-file-medical',
                    class: 'success',
                    onclick: 'window.location.href="/admin/leave-requests"'
                },
                {
                    label: 'User Management',
                    icon: 'fas fa-users-cog',
                    onclick: 'window.location.href="/admin/user-management"'
                }
            ]
        };
    }
    
    // Default response
    return {
        text: `I understand you're asking about "${userMessage}".\n\nAs an administrator, I can help you with:\n\n• 👥 **User Management:** Manage all system users\n• 🏫 **Academic Management:** Full academic control\n• 💰 **Financial Management:** Fees, payroll, budgets\n• ✅ **Approvals:** Leave requests, enrollments, documents\n• 📊 **Analytics:** Comprehensive insights and reports\n• 📈 **Attendance:** School-wide attendance tracking\n• 📢 **Communications:** Announcements and messaging\n• ⚙️ **System Settings:** Configuration and maintenance\n• 📋 **Reports:** Generate various reports\n• 🔒 **Security:** Activity logs and security monitoring\n\nPlease ask a specific question, or use the quick actions above!`
    };
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/admin-layout.php';
?>

