<?php
$pageTitle = 'Smart Campus Nova Hub - School Assistant';
$pageIcon = 'fas fa-robot';
$pageHeading = 'School Assistant';
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
        <h3>Sample Questions to Test</h3>
    </div>
    <div class="sample-questions-grid">
        <div class="sample-question-card" onclick="sendQuickMessage('How many leave days does Sarah have left?')">
            <i class="fas fa-calendar-times"></i>
            <span>Leave Days</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('What are the upcoming exams?')">
            <i class="fas fa-file-alt"></i>
            <span>Upcoming Exams</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('What is today\\'s attendance?')">
            <i class="fas fa-user-check"></i>
            <span>Today's Attendance</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show me the class schedule')">
            <i class="fas fa-clock"></i>
            <span>Class Schedule</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Give me teacher contact information')">
            <i class="fas fa-address-book"></i>
            <span>Teacher Contacts</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show recent announcements')">
            <i class="fas fa-bullhorn"></i>
            <span>Announcements</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show report card')">
            <i class="fas fa-graduation-cap"></i>
            <span>Report Card</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('What is the school fee structure?')">
            <i class="fas fa-dollar-sign"></i>
            <span>Fee Structure</span>
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
                    <strong>Hello! I'm your Smart Campus Assistant.</strong>
                    <p style="margin-top: 8px;">I can help you with:</p>
                    <ul style="margin: 8px 0 0 20px; padding: 0;">
                        <li>📊 <strong>Student Data:</strong> Attendance, grades, homework, exams</li>
                        <li>📋 <strong>Policies:</strong> School rules, procedures, requirements</li>
                        <li>📝 <strong>Actions:</strong> Submit leave forms, request documents</li>
                        <li>💬 <strong>Communication:</strong> Contact school administrators</li>
                        <li>📅 <strong>Information:</strong> Events, schedules, announcements</li>
                    </ul>
                    <p style="margin-top: 12px;">Try asking me anything or use the sample questions above!</p>
                </div>
                <div class="message-time"><?php echo date('H:i'); ?></div>
            </div>
        </div>
    </div>
    
    <!-- Quick Action Buttons -->
    <div class="quick-actions" id="quickActions">
        <button class="quick-btn" onclick="sendQuickMessage('What is my child\\'s attendance rate?')">
            <i class="fas fa-calendar-check"></i> Attendance
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('What is my child\\'s current grade?')">
            <i class="fas fa-chart-line"></i> Grades
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('What homework is due?')">
            <i class="fas fa-tasks"></i> Homework
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('What are the school policies?')">
            <i class="fas fa-book"></i> Policies
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Submit leave form')">
            <i class="fas fa-file-medical"></i> Leave Form
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Contact admin')">
            <i class="fas fa-headset"></i> Contact Admin
        </button>
    </div>
    
    <!-- Chat Input Area -->
    <div class="chat-input-container">
        <div class="chat-input-wrapper">
            <button class="chat-attach-btn" onclick="toggleFileUpload()" title="Attach File">
                <i class="fas fa-paperclip"></i>
            </button>
            <input 
                type="file" 
                id="fileInput" 
                style="display: none;" 
                accept="image/*,.pdf,.doc,.docx"
                onchange="handleFileSelect(event)"
            >
            <input 
                type="text" 
                id="chatInput" 
                class="chat-input" 
                placeholder="Ask me anything about your child's school..."
                onkeypress="handleKeyPress(event)"
            >
            <button class="chat-send-btn" onclick="sendMessage()">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
        <div id="filePreview" class="file-preview" style="display: none;"></div>
        <div class="chat-footer">
            <small style="color: #6b7280;">
                <i class="fas fa-shield-alt"></i> Your conversations are secure and private
                <span style="margin-left: 1rem;">
                    <i class="fas fa-info-circle"></i> I can submit forms and contact admins for you
                </span>
            </small>
        </div>
    </div>
</div>

<style>
.sample-questions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 0.75rem;
    padding: 1rem 0;
}

.sample-question-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.sample-question-card:hover {
    background: #f8fafc;
    border-color: #667eea;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(102, 126, 234, 0.15);
}

.sample-question-card i {
    font-size: 1.5rem;
    color: #667eea;
}

.sample-question-card span {
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
}

.chatbot-container {
    display: flex;
    flex-direction: column;
    height: calc(100vh - 350px);
    max-height: 800px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    background: #f8fafc;
}

.message {
    display: flex;
    gap: 0.75rem;
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

.message.user-message {
    flex-direction: row-reverse;
}

.message-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}

.bot-message .message-avatar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.user-message .message-avatar {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.message-content {
    flex: 1;
    max-width: 70%;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.user-message .message-content {
    align-items: flex-end;
}

.message-text {
    background: #ffffff;
    padding: 0.875rem 1rem;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    line-height: 1.5;
    color: #1d1d1f;
}

.user-message .message-text {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.message-time {
    font-size: 0.75rem;
    color: #6b7280;
    padding: 0 0.5rem;
}

.user-message .message-time {
    text-align: right;
}

/* Action Buttons in Messages */
.message-action-buttons {
    display: flex;
    gap: 0.5rem;
    margin-top: 0.75rem;
    flex-wrap: wrap;
}

.action-btn {
    background: #667eea;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.action-btn:hover {
    background: #5568d3;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
}

.action-btn.secondary {
    background: #f3f4f6;
    color: #374151;
}

.action-btn.secondary:hover {
    background: #e5e7eb;
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

/* File Attachment Styles */
.file-attachment {
    background: #f3f4f6;
    border: 1px dashed #d1d5db;
    border-radius: 8px;
    padding: 0.75rem;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.file-attachment img {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 6px;
}

.file-attachment-info {
    flex: 1;
}

.file-attachment-name {
    font-weight: 600;
    font-size: 0.875rem;
    color: #1d1d1f;
}

.file-attachment-size {
    font-size: 0.75rem;
    color: #6b7280;
}

.file-attachment-remove {
    background: none;
    border: none;
    color: #ef4444;
    cursor: pointer;
    font-size: 1rem;
    padding: 0.25rem;
}

.quick-actions {
    display: flex;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    background: #ffffff;
    border-top: 1px solid #e5e7eb;
    flex-wrap: wrap;
}

.quick-btn {
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    color: #374151;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.quick-btn:hover {
    background: #e5e7eb;
    border-color: #d1d5db;
}

.quick-btn i {
    font-size: 0.75rem;
}

.chat-input-container {
    background: #ffffff;
    border-top: 1px solid #e5e7eb;
    padding: 1rem 1.5rem;
}

.chat-input-wrapper {
    display: flex;
    gap: 0.75rem;
    align-items: center;
}

.chat-attach-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
    color: #6b7280;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.chat-attach-btn:hover {
    background: #e5e7eb;
    color: #374151;
}

.chat-input {
    flex: 1;
    padding: 0.875rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 24px;
    font-size: 0.875rem;
    font-family: 'Nunito Sans', sans-serif;
    outline: none;
    transition: border-color 0.2s ease;
}

.chat-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.chat-send-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    flex-shrink: 0;
}

.chat-send-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.chat-send-btn:active {
    transform: scale(0.95);
}

.file-preview {
    margin-top: 0.75rem;
    padding-top: 0.75rem;
    border-top: 1px solid #e5e7eb;
}

.chat-footer {
    margin-top: 0.5rem;
    text-align: center;
}

.chat-footer i {
    margin-right: 0.25rem;
}

/* Typing Indicator */
.typing-indicator {
    display: flex;
    gap: 0.25rem;
    padding: 0.875rem 1rem;
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #9ca3af;
    animation: typing 1.4s infinite;
}

.typing-indicator span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
        opacity: 0.7;
    }
    30% {
        transform: translateY(-10px);
        opacity: 1;
    }
}

/* Scrollbar Styling */
.chat-messages::-webkit-scrollbar {
    width: 6px;
}

.chat-messages::-webkit-scrollbar-track {
    background: transparent;
}

.chat-messages::-webkit-scrollbar-thumb {
    background: #d1d5db;
    border-radius: 3px;
}

.chat-messages::-webkit-scrollbar-thumb:hover {
    background: #9ca3af;
}

/* Responsive */
@media (max-width: 768px) {
    .chatbot-container {
        height: calc(100vh - 400px);
    }
    
    .message-content {
        max-width: 85%;
    }
    
    .quick-actions {
        padding: 0.75rem 1rem;
    }
    
    .quick-btn {
        font-size: 0.75rem;
        padding: 0.4rem 0.75rem;
    }
    
    .sample-questions-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
let chatHistory = [];
let attachedFile = null;

function handleKeyPress(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
}

function toggleFileUpload() {
    document.getElementById('fileInput').click();
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
        attachedFile = file;
        showFilePreview(file);
    }
}

function showFilePreview(file) {
    const preview = document.getElementById('filePreview');
    const isImage = file.type.startsWith('image/');
    
    let previewHTML = '';
    if (isImage) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewHTML = `
                <div class="file-attachment">
                    <img src="${e.target.result}" alt="Preview">
                    <div class="file-attachment-info">
                        <div class="file-attachment-name">${file.name}</div>
                        <div class="file-attachment-size">${formatFileSize(file.size)}</div>
                    </div>
                    <button class="file-attachment-remove" onclick="removeAttachment()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            preview.innerHTML = previewHTML;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewHTML = `
            <div class="file-attachment">
                <div style="width: 48px; height: 48px; background: #667eea; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="fas fa-file" style="font-size: 1.5rem;"></i>
                </div>
                <div class="file-attachment-info">
                    <div class="file-attachment-name">${file.name}</div>
                    <div class="file-attachment-size">${formatFileSize(file.size)}</div>
                </div>
                <button class="file-attachment-remove" onclick="removeAttachment()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        preview.innerHTML = previewHTML;
        preview.style.display = 'block';
    }
}

function removeAttachment() {
    attachedFile = null;
    document.getElementById('fileInput').value = '';
    document.getElementById('filePreview').style.display = 'none';
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

function sendQuickMessage(message) {
    document.getElementById('chatInput').value = message;
    sendMessage();
}

function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    
    if (!message && !attachedFile) return;
    
    // Add user message
    let messageText = message;
    if (attachedFile) {
        messageText += `\n[Attached: ${attachedFile.name}]`;
    }
    addMessage(messageText, 'user');
    input.value = '';
    
    // Hide quick actions after first message
    const quickActions = document.getElementById('quickActions');
    if (quickActions) {
        quickActions.style.display = 'none';
    }
    
    // Clear attachment
    if (attachedFile) {
        removeAttachment();
    }
    
    // Show typing indicator
    showTypingIndicator();
    
    // Simulate bot response (In production, this would be an API call)
    setTimeout(() => {
        hideTypingIndicator();
        const response = generateBotResponse(message, attachedFile);
        addMessage(response.text, 'bot', response.actions);
        attachedFile = null;
    }, 1000 + Math.random() * 1000);
}

function addMessage(text, type, actions = null) {
    const messagesContainer = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}-message`;
    
    const avatar = type === 'bot' 
        ? '<div class="message-avatar"><i class="fas fa-robot"></i></div>'
        : '<div class="message-avatar"><i class="fas fa-user"></i></div>';
    
    const currentTime = new Date().toLocaleTimeString('en-US', { 
        hour: '2-digit', 
        minute: '2-digit' 
    });
    
    let actionsHTML = '';
    if (actions && actions.length > 0) {
        actionsHTML = '<div class="message-action-buttons">' + 
            actions.map(action => 
                `<button class="action-btn ${action.class || ''}" onclick="${action.onclick}">
                    ${action.icon ? `<i class="${action.icon}"></i>` : ''}
                    ${action.label}
                </button>`
            ).join('') + 
            '</div>';
    }
    
    messageDiv.innerHTML = `
        ${avatar}
        <div class="message-content">
            <div class="message-text">${formatMessage(text)}${actionsHTML}</div>
            <div class="message-time">${currentTime}</div>
        </div>
    `;
    
    messagesContainer.appendChild(messageDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
    
    // Save to history
    chatHistory.push({ type, text, time: currentTime });
}

function formatMessage(text) {
    // Convert line breaks to HTML
    return text.replace(/\n/g, '<br>');
}

function showTypingIndicator() {
    const messagesContainer = document.getElementById('chatMessages');
    const typingDiv = document.createElement('div');
    typingDiv.className = 'message bot-message';
    typingDiv.id = 'typingIndicator';
    typingDiv.innerHTML = `
        <div class="message-avatar">
            <i class="fas fa-robot"></i>
        </div>
        <div class="message-content">
            <div class="message-text">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    `;
    messagesContainer.appendChild(typingDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function hideTypingIndicator() {
    const typingIndicator = document.getElementById('typingIndicator');
    if (typingIndicator) {
        typingIndicator.remove();
    }
}

function generateBotResponse(userMessage, file) {
    const lowerMessage = userMessage.toLowerCase();
    
    // Leave Form Submission
    if (lowerMessage.includes('submit leave') || lowerMessage.includes('leave form')) {
        const studentName = lowerMessage.includes('sarah') ? 'Sarah Johnson' : 
                          lowerMessage.includes('michael') ? 'Michael Johnson' : 
                          'your child';
        
        return {
            text: `I can help you submit a leave form for ${studentName}.\n\nPlease provide:\n\n1. **Student Name:** ${studentName}\n2. **Leave Type:** (Sick Leave / Family Emergency / Personal / Other)\n3. **From Date:**\n4. **To Date:**\n5. **Reason:**\n\n${file ? '✅ Medical certificate/document attached!' : '📎 You can attach a medical certificate or supporting document.'}\n\nWould you like me to submit this leave form now?`,
            actions: [
                {
                    label: 'Submit Leave Form',
                    icon: 'fas fa-paper-plane',
                    onclick: `submitLeaveForm('${studentName}')`
                },
                {
                    label: 'Cancel',
                    icon: 'fas fa-times',
                    class: 'secondary',
                    onclick: 'addMessage("Leave form submission cancelled.", "bot")'
                }
            ]
        };
    }
    
    // Contact Admin
    if (lowerMessage.includes('contact admin') || lowerMessage.includes('contact school') || lowerMessage.includes('speak with admin')) {
        return {
            text: `I can help you contact the school administration.\n\n**Available Options:**\n\n• 📧 **Email:** Send message to admin@novahub.edu\n• 💬 **Direct Message:** Send instant message to admin office\n• 📞 **Request Callback:** Schedule a phone call\n• 📅 **Schedule Meeting:** Book an appointment\n\nHow would you like to proceed?`,
            actions: [
                {
                    label: 'Send Message',
                    icon: 'fas fa-envelope',
                    onclick: 'openAdminMessaging()'
                },
                {
                    label: 'Request Callback',
                    icon: 'fas fa-phone',
                    onclick: 'requestCallback()'
                },
                {
                    label: 'Schedule Meeting',
                    icon: 'fas fa-calendar',
                    onclick: 'scheduleMeeting()'
                }
            ]
        };
    }
    
    // Leave Days Available
    if (lowerMessage.includes('leave day') || lowerMessage.includes('leave left') || lowerMessage.includes('remaining leave')) {
        const studentName = lowerMessage.includes('sarah') ? 'Sarah Johnson' : 
                          lowerMessage.includes('michael') ? 'Michael Johnson' : null;
        
        if (studentName) {
            const leaves = studentName === 'Sarah Johnson' ? 
                { used: 1, total: 15, remaining: 14, last: 'Oct 29, 2025 (Sick Leave)' } :
                { used: 1, total: 15, remaining: 14, last: 'Oct 28, 2025 (Family Emergency)' };
            
            return {
                text: `I've checked the leave balance for ${studentName}. They're in ${leaves.remaining > 10 ? 'excellent standing with plenty of leave days available' : 'good standing'}.
                
                <p style="margin: 12px 0;"><strong>Leave Balance Overview:</strong></p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Days</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Total Allowed</strong></td>
                            <td>${leaves.total} days per year</td>
                            <td><span class="status-badge info">Full Allocation</span></td>
                        </tr>
                        <tr>
                            <td><strong>Used</strong></td>
                            <td>${leaves.used} day${leaves.used > 1 ? 's' : ''}</td>
                            <td><span class="status-badge success">${Math.round((leaves.used/leaves.total)*100)}%</span></td>
                        </tr>
                        <tr>
                            <td><strong>Remaining</strong></td>
                            <td>${leaves.remaining} days</td>
                            <td><span class="status-badge success">${Math.round((leaves.remaining/leaves.total)*100)}%</span></td>
                        </tr>
                        <tr>
                            <td><strong>Last Leave Taken</strong></td>
                            <td colspan="2">${leaves.last}</td>
                        </tr>
                    </tbody>
                </table>
                
                <p style="margin: 16px 0 6px 0;"><strong>Available Leave Categories:</strong></p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Leave Type</th>
                            <th>Allocation</th>
                            <th>Requirements</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Sick Leave</strong></td>
                            <td>Unlimited</td>
                            <td>Medical certificate required</td>
                        </tr>
                        <tr>
                            <td><strong>Casual Leave</strong></td>
                            <td>10 days</td>
                            <td>Advance notice (2+ days)</td>
                        </tr>
                        <tr>
                            <td><strong>Emergency Leave</strong></td>
                            <td>5 days</td>
                            <td>Justification required</td>
                        </tr>
                    </tbody>
                </table>
                
                <p style="margin-top: 12px;">Would you like to submit a new leave request for ${studentName}?</p>`,
                actions: [
                    {
                        label: 'Submit Leave Request',
                        icon: 'fas fa-paper-plane',
                        onclick: `sendQuickMessage('Submit leave form for ${studentName}')`
                    }
                ]
            };
        } else {
            return {
                text: `I've retrieved the leave balance information for both of your children. Both are in excellent standing with minimal leave usage.
                
                <p style="margin: 12px 0;"><strong>Leave Days Summary - Both Children:</strong></p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Grade</th>
                            <th>Total Allowed</th>
                            <th>Used</th>
                            <th>Remaining</th>
                            <th>Last Leave</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Sarah Johnson</strong></td>
                            <td>Grade 9-A</td>
                            <td>15 days</td>
                            <td>1</td>
                            <td><span class="status-badge success">14 days (93%)</span></td>
                            <td>Oct 29, 2025<br><small>Sick Leave</small></td>
                        </tr>
                        <tr>
                            <td><strong>Michael Johnson</strong></td>
                            <td>Grade 7-B</td>
                            <td>15 days</td>
                            <td>1</td>
                            <td><span class="status-badge success">14 days (93%)</span></td>
                            <td>Oct 28, 2025<br><small>Family Emergency</small></td>
                        </tr>
                    </tbody>
                </table>
                
                <p style="margin-top: 12px;">Both students have used only 1 day each this academic year, which is excellent. They each have 14 days remaining.</p>`
            };
        }
    }
    
    // Today's Attendance
    if (lowerMessage.includes('today') && lowerMessage.includes('attendance')) {
        const today = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        return {
            text: `I've checked today's attendance status for both of your children. Great news - both are present and actively participating in classes!
            
            <p style="margin: 12px 0; color: #667eea;"><strong>Date: ${today}</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Check-in Time</th>
                        <th>Classes Progress</th>
                        <th>Current Location</th>
                        <th>Next Class</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Sarah Johnson</strong></td>
                        <td>9-A</td>
                        <td><span class="status-badge success">✅ Present</span></td>
                        <td>7:45 AM</td>
                        <td>4/6 (ongoing)</td>
                        <td>Chemistry Lab</td>
                        <td>Biology<br><small>2:00 PM</small></td>
                    </tr>
                    <tr>
                        <td><strong>Michael Johnson</strong></td>
                        <td>7-B</td>
                        <td><span class="status-badge success">✅ Present</span></td>
                        <td>7:52 AM</td>
                        <td>3/5 (ongoing)</td>
                        <td>Arts Room</td>
                        <td>P.E.<br><small>2:30 PM</small></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 12px;">Both students arrived on time and are progressing well through their class schedules. You'll receive alerts if their status changes.</p>`
        };
    }
    
    // Schedule/Timetable queries
    if (lowerMessage.includes('schedule') || lowerMessage.includes('timetable') || lowerMessage.includes('class time')) {
        const studentName = lowerMessage.includes('sarah') ? 'Sarah Johnson' : 
                          lowerMessage.includes('michael') ? 'Michael Johnson' : null;
        
        if (studentName === 'Sarah Johnson') {
            return {
                text: `**Class Schedule - Sarah Johnson (Grade 9-A)**\n\n**Monday:**\n• 8:00-9:00 AM: Mathematics (Ms. Sarah Johnson)\n• 9:15-10:15 AM: Physics (Dr. Emily Chen)\n• 10:30-11:30 AM: Chemistry (Mr. David Kumar)\n• 12:45-1:45 PM: Biology (Ms. Lisa Park)\n• 2:00-3:00 PM: English (Mr. Paolo Rossi)\n• 3:15-4:00 PM: Myanmar (Ms. Ayesha Khan)\n\n**Tuesday:**\n• 8:00-9:00 AM: Physics Lab\n• 9:15-10:15 AM: Mathematics\n• 10:30-11:30 AM: English\n• 12:45-1:45 PM: Chemistry Lab\n• 2:00-3:00 PM: Biology\n• 3:15-4:00 PM: P.E.\n\n**Complete weekly schedule available in dashboard.**`
            };
        } else if (studentName === 'Michael Johnson') {
            return {
                text: `**Class Schedule - Michael Johnson (Grade 7-B)**\n\n**Monday:**\n• 8:00-9:00 AM: Mathematics (Mr. Alan Brown)\n• 9:15-10:15 AM: Science (Ms. Jennifer Lee)\n• 10:30-11:30 AM: English (Mr. Paolo Rossi)\n• 12:45-1:45 PM: History (Mr. Omar Ali)\n• 2:00-3:00 PM: Arts (Ms. Nina Patel)\n\n**Tuesday:**\n• 8:00-9:00 AM: Science Lab\n• 9:15-10:15 AM: Mathematics\n• 10:30-11:30 AM: P.E. (Mr. Robert Jones)\n• 12:45-1:45 PM: English\n• 2:00-3:00 PM: History\n\n**Complete weekly schedule available in dashboard.**`
            };
        } else {
            return {
                text: `**Class Schedules Available:**\n\n📅 **Sarah Johnson** (Grade 9-A)\n• Monday-Friday: 8:00 AM - 4:00 PM\n• 6 subjects daily\n• Break: 11:30 AM - 12:45 PM\n\n📅 **Michael Johnson** (Grade 7-B)\n• Monday-Friday: 8:00 AM - 3:00 PM\n• 5 subjects daily\n• Break: 11:30 AM - 12:45 PM\n\nWhich child's schedule would you like to see in detail?`,
                actions: [
                    {
                        label: 'Sarah\'s Schedule',
                        icon: 'fas fa-calendar',
                        onclick: 'sendQuickMessage("Show Sarah\'s class schedule")'
                    },
                    {
                        label: 'Michael\'s Schedule',
                        icon: 'fas fa-calendar',
                        onclick: 'sendQuickMessage("Show Michael\'s class schedule")'
                    }
                ]
            };
        }
    }
    
    // Teacher Contact Information
    if (lowerMessage.includes('teacher contact') || lowerMessage.includes('teacher information') || lowerMessage.includes('contact teacher')) {
        return {
            text: `**Teacher Contact Information**\n\n**Sarah's Teachers (Grade 9-A):**\n\n• **Ms. Sarah Johnson** (Mathematics)\n  📧 s.johnson@novahub.edu\n  📞 +1 (555) 0123\n  Office Hours: Mon-Fri 4:00-5:00 PM\n\n• **Dr. Emily Chen** (Physics)\n  📧 e.chen@novahub.edu\n  📞 +1 (555) 0124\n  Office Hours: Tue-Thu 3:30-4:30 PM\n\n• **Mr. David Kumar** (Chemistry)\n  📧 d.kumar@novahub.edu\n  📞 +1 (555) 0125\n  Office Hours: Mon-Wed 4:00-5:00 PM\n\n**Michael's Teachers (Grade 7-B):**\n\n• **Mr. Alan Brown** (Mathematics)\n  📧 a.brown@novahub.edu\n  📞 +1 (555) 0126\n  Office Hours: Mon-Fri 3:00-4:00 PM\n\n• **Ms. Jennifer Lee** (Science)\n  📧 j.lee@novahub.edu\n  📞 +1 (555) 0127\n  Office Hours: Tue-Thu 3:00-4:00 PM\n\n• **Mr. Paolo Rossi** (English)\n  📧 p.rossi@novahub.edu\n  📞 +1 (555) 0128\n  Office Hours: Mon-Fri 4:00-5:00 PM\n\n**Note:** You can contact teachers via email or schedule a meeting during office hours.`
        };
    }
    
    // Announcements
    if (lowerMessage.includes('announcement') || lowerMessage.includes('notice')) {
        return {
            text: `**Recent School Announcements**\n\n📢 **Parent-Teacher Meeting** (Posted: Oct 30, 2025)\nPriority: HIGH\nMeeting scheduled for November 5th, 2025. All parents are requested to attend to discuss student progress.\n\n📢 **Annual Sports Day** (Posted: Oct 28, 2025)\nPriority: MEDIUM\nSports Day will be held on November 15th. Registration forms available in office. Students can participate in various events.\n\n📢 **Mid-Term Results Published** (Posted: Oct 25, 2025)\nPriority: HIGH\nMid-term examination results are now available in the portal. Parents can view detailed reports in the Exam Results section.\n\n📢 **School Closure - Public Holiday** (Posted: Oct 22, 2025)\nPriority: MEDIUM\nSchool will remain closed on October 26th for National Holiday. Regular classes resume on October 27th.\n\n📢 **Library Book Fair** (Posted: Oct 20, 2025)\nPriority: LOW\nAnnual book fair from October 28-30 in the school library. Special discounts available for students.\n\nView all announcements in the Announcements section.`
        };
    }
    
    // Report Card
    if (lowerMessage.includes('report card') || lowerMessage.includes('progress report') || lowerMessage.includes('transcript')) {
        return {
            text: `**Report Cards Available**\n\n📊 **Sarah Johnson (Grade 9-A) - Mid-Term Report**\n\n**Academic Performance:**\n• Mathematics: A+ (95%)\n• Physics: A+ (92%)\n• Chemistry: A (88%)\n• Biology: A+ (94%)\n• English: A (86%)\n• Myanmar: A+ (90%)\n\n**Overall Grade: A+ (90.8%)**\n**Class Rank: 3rd out of 45 students**\n\n**Teacher Comments:**\n"Sarah demonstrates excellent understanding of concepts and participates actively in class. Her performance in STEM subjects is particularly commendable."\n\n---\n\n📊 **Michael Johnson (Grade 7-B) - Mid-Term Report**\n\n**Academic Performance:**\n• Mathematics: A (85%)\n• Science: A (82%)\n• English: A+ (92%)\n• History: A (80%)\n• Arts: A+ (95%)\n• P.E.: A+ (98%)\n\n**Overall Grade: A (88.7%)**\n**Class Rank: 7th out of 40 students**\n\n**Teacher Comments:**\n"Michael shows excellent creativity and physical coordination. His performance in Arts and P.E. is outstanding. Continued improvement in STEM subjects."\n\n**Full detailed reports available in Academic Reports section.**`,
            actions: [
                {
                    label: 'Download Sarah\'s Report',
                    icon: 'fas fa-download',
                    onclick: 'addMessage("Downloading Sarah\'s report card... [PDF Generated]", "bot")'
                },
                {
                    label: 'Download Michael\'s Report',
                    icon: 'fas fa-download',
                    onclick: 'addMessage("Downloading Michael\'s report card... [PDF Generated]", "bot")'
                }
            ]
        };
    }
    
    // Fee Structure
    if (lowerMessage.includes('fee structure') || lowerMessage.includes('tuition fee') || lowerMessage.includes('fee breakdown')) {
        return {
            text: `**School Fee Structure (2025-2026)**\n\n**📝 Tuition Fees (Per Quarter):**\n\n**Grade 9-A (Sarah Johnson):**\n• Tuition Fee: $400\n• Lab Fee (Science): $30\n• Library Fee: $10\n• Sports Fee: $15\n• Technology Fee: $20\n• **Total: $475 per quarter**\n\n**Grade 7-B (Michael Johnson):**\n• Tuition Fee: $350\n• Lab Fee: $20\n• Library Fee: $10\n• Sports Fee: $15\n• Arts Materials Fee: $10\n• **Total: $405 per quarter**\n\n**💰 Annual Fee Structure:**\n• **Sarah:** $1,900 per year (4 quarters)\n• **Michael:** $1,620 per year (4 quarters)\n• **Family Total:** $3,520 per year\n\n**📅 Payment Schedule:**\n• Quarter 1: June - August\n• Quarter 2: September - November (Current)\n• Quarter 3: December - February\n• Quarter 4: March - May\n\n**💳 Payment Methods:**\n• Online Payment (Credit/Debit Card)\n• Bank Transfer\n• Mobile Banking\n• Cash/Check at Office\n\n**🎁 Discounts Available:**\n• Early Payment: 5% discount\n• Multiple Children: 10% discount on 2nd child\n• Annual Payment: 10% discount\n\n**📊 Current Status:**\n• Sarah: $250 pending (Lab & Tech fees)\n• Michael: $200 pending (Materials fee)\n• Due Date: November 10, 2025\n\nYou can make payments online through the Fee Payment section.`,
            actions: [
                {
                    label: 'Pay Now',
                    icon: 'fas fa-credit-card',
                    onclick: 'window.location.href="/parent/fee-payment"'
                },
                {
                    label: 'Download Invoice',
                    icon: 'fas fa-file-invoice',
                    onclick: 'addMessage("Downloading current invoice... [PDF Generated]", "bot")'
                }
            ]
        };
    }
    
    // Attendance queries
    if (lowerMessage.includes('attendance') && !lowerMessage.includes('today')) {
        return {
            text: `**Attendance Summary:**\n\n• **Sarah Johnson** (Grade 9-A): **96%** attendance\n  - Present Days: 138/144\n  - Status: Excellent ✅\n\n• **Michael Johnson** (Grade 7-B): **94%** attendance\n  - Present Days: 135/144\n  - Status: Excellent ✅\n\nBoth children have excellent attendance records. You can view detailed attendance reports in the Attendance section.`
        };
    }
    
    // Grade queries
    if (lowerMessage.includes('grade') || lowerMessage.includes('performance') || lowerMessage.includes('academic')) {
        return {
            text: `**Academic Performance Summary:**\n\n**Sarah Johnson** (Grade 9-A):\n• Overall Grade: **A+**\n• Average: **90.8%**\n• Best Subject: Mathematics (95%)\n• Subjects: Math (A+), Physics (A+), Chemistry (A), Biology (A+), English (A), Myanmar (A+)\n\n**Michael Johnson** (Grade 7-B):\n• Overall Grade: **A**\n• Average: **88.7%**\n• Best Subject: Arts (95%)\n• Subjects: Math (A), Science (A), English (A+), History (A), Arts (A+), P.E. (A+)\n\nBoth children are performing excellently! Check the Academic Reports section for detailed breakdowns.`
        };
    }
    
    // Homework queries
    if (lowerMessage.includes('homework') || lowerMessage.includes('assignment')) {
        return {
            text: `**Homework Status:**\n\n**Sarah Johnson:**\n• Pending: **2 assignments**\n• Completion Rate: **92%**\n• Due Soon:\n  - Math: Quadratic Equations (Due: Nov 1)\n  - Physics: Lab Report (Due: Oct 31)\n\n**Michael Johnson:**\n• Pending: **3 assignments**\n• Completion Rate: **88%**\n• Due Soon:\n  - Math: Fractions Practice (Due: Nov 2)\n  - Science: Solar System Project (Due: Nov 1)\n  - English: Book Report (Due: Oct 31)\n\nVisit the Homework section to see specific assignments and due dates.`
        };
    }
    
    // Policy queries
    if (lowerMessage.includes('policy') || lowerMessage.includes('procedure') || lowerMessage.includes('rule')) {
        return {
            text: `**School Policies & Procedures:**\n\n**Attendance Policy:**\n• Students must maintain at least 80% attendance\n• Absences require parent notification\n• Medical certificates required for extended absences\n\n**Grading System:**\n• A+ (90-100%): Excellent\n• A (80-89%): Very Good\n• B (70-79%): Good\n• C (60-69%): Satisfactory\n\n**Homework Policy:**\n• Assignments must be submitted before due date\n• Late submissions may result in grade reduction\n• Incomplete homework affects overall grade\n\n**Leave Policy:**\n• Parents must submit leave requests at least 2 days in advance\n• Medical certificates required for sick leave\n• Emergency leaves can be submitted same day\n\n**Fee Payment:**\n• Fees are due quarterly\n• Payments can be made online\n• Late fees apply after due date\n\nFor detailed policies, please contact the school administration.`
        };
    }
    
    // Fee queries
    if (lowerMessage.includes('fee') || lowerMessage.includes('payment') || lowerMessage.includes('billing')) {
        return {
            text: `**Fee Status:**\n\n• Total Outstanding: **$450**\n  - Sarah Johnson: **$250**\n  - Michael Johnson: **$200**\n\n• Due Date: **November 10, 2025**\n• Days Remaining: **10 days**\n\n**Payment Methods:**\n• Credit/Debit Card\n• Bank Transfer\n• Mobile Banking\n• Cash at Office\n\nYou can make payments online through the Fee Payment section.`
        };
    }
    
    // Exam queries
    if (lowerMessage.includes('exam') || lowerMessage.includes('test')) {
        return {
            text: `**Exam Information:**\n\n**Recent Results:**\n• Mid-Term Exam Results: ✅ Available\n• Sarah: Overall A+ (90.8%)\n• Michael: Overall A (88.7%)\n\n**Upcoming:**\n• Final Exam Registration: Opens November 10, 2025\n• Final Exam Schedule: Will be published 2 weeks before exams\n\nCheck the Exam Results section for detailed scores and performance analysis.`
        };
    }
    
    // Event queries
    if (lowerMessage.includes('event') || lowerMessage.includes('calendar')) {
        return {
            text: `**Upcoming School Events:**\n\n• **November 5:** Parent-Teacher Meeting\n• **November 10:** Final Exam Registration\n• **November 15:** Annual Sports Day\n• **November 20:** Science Fair\n• **November 25:** Cultural Festival\n\nView the Event Calendar for complete details and times.`
        };
    }
    
    // Default response
    return {
        text: `I understand you're asking about "${userMessage}".\n\nI can help you with:\n\n• 📊 **Student Data:** Attendance, grades, homework, exams\n• 📋 **Policies:** School rules, procedures, requirements\n• 📝 **Actions:** Submit leave forms, request documents\n• 💬 **Communication:** Contact school administrators\n• 📅 **Information:** Events, schedules, announcements\n\nPlease ask a specific question, or use the sample questions above!`
    };
}

// Agentic Functions
function submitLeaveForm(studentName) {
    addMessage(`Submitting leave form for ${studentName}...`, 'bot');
    showTypingIndicator();
    
    setTimeout(() => {
        hideTypingIndicator();
        addMessage(`✅ **Leave Form Submitted Successfully!**\n\n**Details:**\n• Student: ${studentName}\n• Status: Pending Review\n• Reference ID: LR-2025-00123\n• Submitted: ${new Date().toLocaleString()}\n\nYou will receive a notification once the request is reviewed. You can track the status in the Leave Request section.`, 'bot');
    }, 1500);
}

function openAdminMessaging() {
    addMessage(`Opening direct messaging with school administration...`, 'bot');
    showTypingIndicator();
    
    setTimeout(() => {
        hideTypingIndicator();
        addMessage(`📧 **Admin Messaging Opened**\n\n**Recipients:**\n• Principal Office\n• Academic Coordinator\n• Student Affairs Office\n\n**Your Message:**\n[Type your message here]\n\nYou can send a message directly to the school administration. They typically respond within 24 hours.`, 'bot', [
            {
                label: 'Send Message',
                icon: 'fas fa-paper-plane',
                onclick: 'addMessage("Message sent successfully! Admin will respond within 24 hours.", "bot")'
            }
        ]);
    }, 1000);
}

function requestCallback() {
    addMessage(`Requesting callback from school administration...`, 'bot');
    showTypingIndicator();
    
    setTimeout(() => {
        hideTypingIndicator();
        addMessage(`📞 **Callback Request Submitted**\n\n**Details:**\n• Status: Pending\n• Preferred Time: [You can specify]\n• Phone: [Your registered number]\n• Reference ID: CB-2025-00456\n\nA school administrator will call you within 24 hours.`, 'bot');
    }, 1500);
}

function scheduleMeeting() {
    addMessage(`Opening meeting scheduler...`, 'bot');
    showTypingIndicator();
    
    setTimeout(() => {
        hideTypingIndicator();
        addMessage(`📅 **Schedule Meeting**\n\n**Available Slots:**\n• November 5: 2:00 PM - 3:00 PM\n• November 6: 10:00 AM - 11:00 AM\n• November 7: 2:00 PM - 3:00 PM\n\n**Meeting Purpose:**\n[Academic Discussion / General Inquiry / Other]\n\nSelect a time slot or request a custom time.`, 'bot', [
            {
                label: 'Book Slot',
                icon: 'fas fa-calendar-check',
                onclick: 'addMessage("Meeting scheduled successfully! Confirmation sent to your email.", "bot")'
            }
        ]);
    }, 1000);
}

// Focus input on load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('chatInput').focus();
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
