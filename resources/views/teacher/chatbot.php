<?php
$pageTitle = 'Smart Campus Nova Hub - Teaching Assistant';
$pageIcon = 'fas fa-robot';
$pageHeading = 'Teaching Assistant';
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
        <div class="sample-question-card" onclick="sendQuickMessage('Show my classes today')">
            <i class="fas fa-chalkboard"></i>
            <span>Today's Classes</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show attendance for G9-A')">
            <i class="fas fa-user-check"></i>
            <span>Class Attendance</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show pending homework')">
            <i class="fas fa-tasks"></i>
            <span>Pending Homework</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show my teaching schedule')">
            <i class="fas fa-clock"></i>
            <span>My Schedule</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show student performance in G9-A Math')">
            <i class="fas fa-chart-line"></i>
            <span>Student Performance</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show recent announcements')">
            <i class="fas fa-bullhorn"></i>
            <span>Announcements</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Submit leave request')">
            <i class="fas fa-calendar-times"></i>
            <span>Leave Request</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show exam schedule')">
            <i class="fas fa-file-alt"></i>
            <span>Exam Schedule</span>
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
                    <strong>Hello, Ms. Sarah Johnson! Welcome to your Teaching Assistant.</strong>
                    <p style="margin-top: 8px;">I can help you with:</p>
                    <ul style="margin: 8px 0 0 20px; padding: 0;">
                        <li>👥 <strong>Class Management:</strong> View classes, students, attendance</li>
                        <li>📝 <strong>Homework:</strong> Assign, collect, track assignments</li>
                        <li>📊 <strong>Grades:</strong> Enter marks, view performance analytics</li>
                        <li>📅 <strong>Schedule:</strong> View teaching schedule and events</li>
                        <li>📢 <strong>Communication:</strong> Announcements, student/parent contact</li>
                        <li>🎯 <strong>Exams:</strong> View results, enter marks, schedule</li>
                    </ul>
                    <p style="margin-top: 12px;">How can I assist you today?</p>
                </div>
                <div class="message-time"><?php echo date('H:i'); ?></div>
            </div>
        </div>
    </div>
    
    <!-- Quick Action Buttons -->
    <div class="quick-actions" id="quickActions">
        <button class="quick-btn" onclick="sendQuickMessage('Show my classes')">
            <i class="fas fa-chalkboard"></i> My Classes
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Mark attendance')">
            <i class="fas fa-user-check"></i> Attendance
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('View homework')">
            <i class="fas fa-tasks"></i> Homework
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Enter grades')">
            <i class="fas fa-edit"></i> Enter Marks
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
        <input type="file" id="fileInput" style="display: none;" accept="image/*,.pdf,.doc,.docx">
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
    
    // My Classes
    if (lowerMessage.includes('my class') || lowerMessage.includes('show classes')) {
        return {
            text: `I've retrieved your current teaching assignments. You're teaching 3 mathematics classes this semester with a total of 120 students.
            
            <p style="margin: 12px 0;"><strong>Here's your class overview:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Students</th>
                        <th>Room</th>
                        <th>Time</th>
                        <th>Current Topic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grade 9-A</strong><br>Mathematics</td>
                        <td>45</td>
                        <td>Math Lab 101</td>
                        <td>Mon-Fri<br>8:00-9:00 AM</td>
                        <td>Quadratic Equations</td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-B</strong><br>Mathematics</td>
                        <td>40</td>
                        <td>Math Lab 102</td>
                        <td>Mon-Fri<br>9:15-10:15 AM</td>
                        <td>Trigonometry</td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-A</strong><br>Advanced Math</td>
                        <td>35</td>
                        <td>Math Lab 103</td>
                        <td>Mon-Fri<br>10:30-11:30 AM</td>
                        <td>Calculus</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 12px;">Your largest class is Grade 9-A with 45 students. Would you like to see detailed information about any specific class or view student performance data?</p>`,
            actions: [
                {
                    label: 'View Details',
                    icon: 'fas fa-eye',
                    onclick: 'window.location.href="/teacher/class-profiles"'
                }
            ]
        };
    }
    
    // Today's Classes
    if (lowerMessage.includes('today') && lowerMessage.includes('class')) {
        const today = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        return {
            text: `Let me pull up your schedule for today, ${today}.
            
            <p style="margin: 12px 0;">You have 3 teaching sessions and 1 meeting scheduled. Here's your complete agenda:</p>
            
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Class</th>
                        <th>Location</th>
                        <th>Students</th>
                        <th>Topic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8:00-9:00 AM</td>
                        <td><strong>Grade 9-A</strong><br>Mathematics</td>
                        <td>Math Lab 101</td>
                        <td>45</td>
                        <td>Quadratic Equations Practice</td>
                    </tr>
                    <tr>
                        <td>9:15-10:15 AM</td>
                        <td><strong>Grade 10-B</strong><br>Mathematics</td>
                        <td>Math Lab 102</td>
                        <td>40</td>
                        <td>Trigonometric Functions</td>
                    </tr>
                    <tr>
                        <td>10:30-11:30 AM</td>
                        <td><strong>Grade 11-A</strong><br>Advanced Math</td>
                        <td>Math Lab 103</td>
                        <td>35</td>
                        <td>Introduction to Derivatives</td>
                    </tr>
                    <tr>
                        <td>2:00-3:00 PM</td>
                        <td><strong>Teacher Meeting</strong></td>
                        <td>Conference Room</td>
                        <td>-</td>
                        <td>Monthly Academic Review</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 12px;"><span class="status-badge info">⏰ Next class starts in 30 minutes</span></p>
            <p style="margin-top: 8px;">You have your lunch break from 11:30 AM to 12:45 PM. Would you like me to help you prepare any materials for today's classes?</p>`
        };
    }
    
    // Attendance
    if (lowerMessage.includes('attendance') && lowerMessage.includes('g9-a')) {
        return {
            text: `I've retrieved the attendance data for Grade 9-A Mathematics. The class is showing strong attendance today with 96% present.
            
            <p style="margin: 12px 0;"><strong>Today's Status:</strong> 45 total students | <span class="status-badge success">43 Present (96%)</span> | <span class="status-badge danger">2 Absent (4%)</span></p>
            
            <p style="margin: 12px 0;">Here are the absent students with documented reasons:</p>
            
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Emma Wilson</td>
                        <td>Medical Leave</td>
                        <td><span class="status-badge warning">Excused</span></td>
                    </tr>
                    <tr>
                        <td>James Brown</td>
                        <td>Family Emergency</td>
                        <td><span class="status-badge warning">Excused</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>Looking at the bigger picture - Monthly Attendance Breakdown:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Students</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Excellent (>95%)</td>
                        <td>38 students</td>
                        <td><span class="status-badge success">84%</span></td>
                    </tr>
                    <tr>
                        <td>Good (85-95%)</td>
                        <td>5 students</td>
                        <td><span class="status-badge info">11%</span></td>
                    </tr>
                    <tr>
                        <td>Needs Attention (<85%)</td>
                        <td>2 students</td>
                        <td><span class="status-badge warning">4%</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 16px;">Excellent news: 84% of your class maintains excellent attendance! Three students have perfect attendance this month: <strong>Sarah Chen, Michael Lee, and David Kim</strong>. The 2 students in the "Needs Attention" category may benefit from a check-in.</p>
            
            <p style="margin-top: 8px;">Would you like me to help you generate a report for the students requiring attendance follow-up?</p>`,
            actions: [
                {
                    label: 'Mark Attendance',
                    icon: 'fas fa-check',
                    onclick: 'window.location.href="/teacher/attendance"'
                },
                {
                    label: 'View Details',
                    icon: 'fas fa-eye',
                    onclick: 'addMessage("Opening detailed attendance report...", "bot")'
                }
            ]
        };
    }
    
    if (lowerMessage.includes('attendance') || lowerMessage.includes('mark attendance')) {
        return {
            text: `**Quick Attendance Summary:**\n\n**Today's Overview:**\n• Grade 9-A: 43/45 present (96%)\n• Grade 10-B: 38/40 present (95%)\n• Grade 11-A: 34/35 present (97%)\n\n**Overall:** 115/120 students present (96%)\n\nWhich class would you like to mark attendance for?`,
            actions: [
                {
                    label: 'Grade 9-A',
                    icon: 'fas fa-check',
                    onclick: 'sendQuickMessage("Mark attendance for G9-A")'
                },
                {
                    label: 'Grade 10-B',
                    icon: 'fas fa-check',
                    onclick: 'sendQuickMessage("Mark attendance for G10-B")'
                },
                {
                    label: 'View All',
                    icon: 'fas fa-eye',
                    class: 'secondary',
                    onclick: 'window.location.href="/teacher/attendance"'
                }
            ]
        };
    }
    
    // Homework
    if (lowerMessage.includes('homework') || lowerMessage.includes('assignment')) {
        return {
            text: `I've analyzed your homework assignments across all your classes. Let me give you a summary of what needs your attention.
            
            <p style="margin: 12px 0;"><strong>📝 Current Assignments Awaiting Collection:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Assignment</th>
                        <th>Due Date</th>
                        <th>Submitted</th>
                        <th>Pending</th>
                        <th>Completion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grade 9-A</strong></td>
                        <td>Quadratic Equations Practice</td>
                        <td>Nov 5</td>
                        <td>38/45</td>
                        <td>7</td>
                        <td><span class="status-badge warning">84%</span></td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-B</strong></td>
                        <td>Trigonometry Problems</td>
                        <td>Nov 3</td>
                        <td>35/40</td>
                        <td>5</td>
                        <td><span class="status-badge success">88%</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>📊 Recently Completed Assignments:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Assignment</th>
                        <th>Completion</th>
                        <th>Avg Score</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grade 11-A</strong></td>
                        <td>Calculus Worksheet</td>
                        <td>33/35 (95%)</td>
                        <td>87%</td>
                        <td><span class="status-badge success">Collected ✅</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 16px;">Here's what requires your action:</p>
            <ul style="margin: 8px 0 0 20px;">
                <li><span class="status-badge warning">12 students</span> haven't submitted pending homework - may need reminders</li>
                <li><span class="status-badge info">3 late submissions</span> are waiting to be graded</li>
            </ul>
            
            <p style="margin-top: 8px;">The Grade 11-A Calculus assignment showed excellent results with an 87% average. Would you like me to help you send reminders to students with pending homework?</p>`,
            actions: [
                {
                    label: 'Assign Homework',
                    icon: 'fas fa-plus',
                    onclick: 'window.location.href="/teacher/homework"'
                },
                {
                    label: 'Collect Homework',
                    icon: 'fas fa-check',
                    onclick: 'window.location.href="/teacher/homework"'
                },
                {
                    label: 'View History',
                    icon: 'fas fa-history',
                    class: 'secondary',
                    onclick: 'window.location.href="/teacher/homework"'
                }
            ]
        };
    }
    
    // Schedule
    if (lowerMessage.includes('schedule') || lowerMessage.includes('timetable')) {
        return {
            text: `I've pulled up your complete weekly teaching schedule. You have a consistent routine Monday through Friday with office hours and preparation time built in.
            
            <p style="margin: 12px 0;"><strong>Your Daily Teaching Schedule (Mon-Fri):</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8:00-9:00 AM</td>
                        <td><strong>Grade 9-A Mathematics</strong></td>
                        <td>Math Lab 101</td>
                        <td>45 students</td>
                    </tr>
                    <tr>
                        <td>9:15-10:15 AM</td>
                        <td><strong>Grade 10-B Mathematics</strong></td>
                        <td>Math Lab 102</td>
                        <td>40 students</td>
                    </tr>
                    <tr>
                        <td>10:30-11:30 AM</td>
                        <td><strong>Grade 11-A Advanced Math</strong></td>
                        <td>Math Lab 103</td>
                        <td>35 students</td>
                    </tr>
                    <tr>
                        <td>11:30 AM-12:45 PM</td>
                        <td><strong>Lunch Break</strong></td>
                        <td>-</td>
                        <td>Free time</td>
                    </tr>
                    <tr>
                        <td>12:45-1:45 PM</td>
                        <td><strong>Office Hours</strong></td>
                        <td>Room 101</td>
                        <td>Student consultations</td>
                    </tr>
                    <tr>
                        <td>2:00-3:00 PM</td>
                        <td><strong>Preparation / Meetings</strong></td>
                        <td>Staff Room</td>
                        <td>Lesson planning</td>
                    </tr>
                    <tr>
                        <td>3:00-4:00 PM</td>
                        <td><strong>Extra Classes</strong></td>
                        <td>Math Lab 101</td>
                        <td>Wed & Thu only</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>📅 Special Events This Week:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Event</th>
                        <th>Time</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tuesday</td>
                        <td>Department Meeting</td>
                        <td>2:00 PM</td>
                        <td>Conference Room</td>
                    </tr>
                    <tr>
                        <td>Thursday</td>
                        <td>Parent-Teacher Conference</td>
                        <td>3:00 PM</td>
                        <td>Main Hall</td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>Mid-Term Review Session</td>
                        <td>2:00 PM</td>
                        <td>Math Lab 101</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 12px;">Your office hours are available every weekday from 12:45-1:45 PM in Room 101 for student consultations. Would you like me to show your upcoming appointments or block specific time slots?</p>`,
            actions: [
                {
                    label: 'View Full Calendar',
                    icon: 'fas fa-calendar',
                    onclick: 'window.location.href="/teacher/event-calendar"'
                }
            ]
        };
    }
    
    // Student Performance
    if (lowerMessage.includes('performance') || lowerMessage.includes('grade')) {
        return {
            text: `I've compiled the performance analytics for Grade 9-A Mathematics. Overall, your class is performing very well with a strong pass rate.
            
            <p style="margin: 12px 0;"><strong>📊 Key Metrics:</strong> Class Average: <strong>85%</strong> | Median: <strong>87%</strong> | Pass Rate: <span class="status-badge success">96% (43/45)</span></p>
            
            <p style="margin: 12px 0;">Here's how your students are distributed across grade levels:</p>
            
            <table>
                <thead>
                    <tr>
                        <th>Grade</th>
                        <th>Students</th>
                        <th>Percentage</th>
                        <th>Performance Level</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>A</strong></td>
                        <td>28</td>
                        <td>62%</td>
                        <td><span class="status-badge success">Excellent</span></td>
                    </tr>
                    <tr>
                        <td><strong>B</strong></td>
                        <td>12</td>
                        <td>27%</td>
                        <td><span class="status-badge success">Good</span></td>
                    </tr>
                    <tr>
                        <td><strong>C</strong></td>
                        <td>3</td>
                        <td>7%</td>
                        <td><span class="status-badge info">Average</span></td>
                    </tr>
                    <tr>
                        <td><strong>Below C</strong></td>
                        <td>2</td>
                        <td>4%</td>
                        <td><span class="status-badge danger">Needs Support</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>🌟 Your top performers this term:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Student Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1st</td>
                        <td>Sarah Chen</td>
                        <td><span class="status-badge success">98%</span></td>
                    </tr>
                    <tr>
                        <td>2nd</td>
                        <td>Michael Lee</td>
                        <td><span class="status-badge success">96%</span></td>
                    </tr>
                    <tr>
                        <td>3rd</td>
                        <td>David Kim</td>
                        <td><span class="status-badge success">95%</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>⚠️ Students requiring intervention:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Current Score</th>
                        <th>Recommended Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Emily Brown</td>
                        <td><span class="status-badge danger">58%</span></td>
                        <td>Needs extra support sessions</td>
                    </tr>
                    <tr>
                        <td>John Smith</td>
                        <td><span class="status-badge warning">62%</span></td>
                        <td>Monitor closely, additional practice</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 16px;"><span class="status-badge success">📈 Great news!</span> Your class average has improved by 5% compared to last month. With 62% of students achieving A grades, your teaching methods are clearly effective.</p>
            
            <p style="margin-top: 8px;">I'd recommend scheduling one-on-one sessions with Emily and John to address their specific challenges. Would you like me to help you schedule these interventions?</p>`,
            actions: [
                {
                    label: 'Enter Marks',
                    icon: 'fas fa-edit',
                    onclick: 'window.location.href="/teacher/enter-marks"'
                },
                {
                    label: 'View Details',
                    icon: 'fas fa-chart-bar',
                    onclick: 'window.location.href="/teacher/exam-results"'
                }
            ]
        };
    }
    
    // Announcements
    if (lowerMessage.includes('announcement')) {
        return {
            text: `I've gathered the latest announcements from the school administration. You have 2 high-priority items that require your attention.
            
            <p style="margin: 12px 0;"><strong>Recent School Announcements:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Posted Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Parent-Teacher Meeting</strong></td>
                        <td><span class="status-badge danger">HIGH</span></td>
                        <td>Today</td>
                        <td>Scheduled for November 5th. Please prepare student progress reports and be available for consultations.</td>
                    </tr>
                    <tr>
                        <td><strong>Mid-Term Exam Schedule Released</strong></td>
                        <td><span class="status-badge danger">HIGH</span></td>
                        <td>Oct 30</td>
                        <td>Exam dates finalized. Please submit question papers by November 2nd.</td>
                    </tr>
                    <tr>
                        <td><strong>Teacher Development Workshop</strong></td>
                        <td><span class="status-badge warning">MEDIUM</span></td>
                        <td>Oct 28</td>
                        <td>Professional development session on November 10th. Registration required.</td>
                    </tr>
                    <tr>
                        <td><strong>School Sports Day</strong></td>
                        <td><span class="status-badge info">LOW</span></td>
                        <td>Oct 25</td>
                        <td>Volunteer teachers needed for supervision on November 15th.</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 12px;"><span class="status-badge danger">⚠️ Action Required:</span> You need to submit question papers for the mid-term exams by November 2nd. The Parent-Teacher Meeting on November 5th also requires preparation of student progress reports.</p>
            
            <p style="margin-top: 8px;">Would you like me to help you prepare materials for these upcoming events?</p>`,
            actions: [
                {
                    label: 'View All',
                    icon: 'fas fa-bullhorn',
                    onclick: 'window.location.href="/teacher/announcements"'
                }
            ]
        };
    }
    
    // Leave Request
    if (lowerMessage.includes('leave') || lowerMessage.includes('submit leave')) {
        return {
            text: `I've retrieved your leave management information. You have a healthy leave balance with 17 days remaining for this academic year.
            
            <p style="margin: 12px 0;"><strong>📅 Your Leave Balance Summary:</strong></p>
            
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
                        <td><strong>Total Allowed (Annual)</strong></td>
                        <td>20 days</td>
                        <td><span class="status-badge info">Full Allocation</span></td>
                    </tr>
                    <tr>
                        <td><strong>Used</strong></td>
                        <td>3 days</td>
                        <td><span class="status-badge success">15%</span></td>
                    </tr>
                    <tr>
                        <td><strong>Remaining</strong></td>
                        <td>17 days</td>
                        <td><span class="status-badge success">85%</span></td>
                    </tr>
                    <tr>
                        <td><strong>Pending Requests</strong></td>
                        <td>0</td>
                        <td><span class="status-badge info">None</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>📋 Your Recent Leave History:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Leave Type</th>
                        <th>Duration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Oct 15-16, 2025</td>
                        <td>Personal Leave</td>
                        <td>2 days</td>
                        <td><span class="status-badge success">Approved</span></td>
                    </tr>
                    <tr>
                        <td>Sep 5, 2025</td>
                        <td>Medical Leave</td>
                        <td>1 day</td>
                        <td><span class="status-badge success">Approved</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>Available Leave Types:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Leave Type</th>
                        <th>Requirements</th>
                        <th>Approval Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Sick Leave</strong></td>
                        <td>Medical certificate required</td>
                        <td>24-48 hours</td>
                    </tr>
                    <tr>
                        <td><strong>Personal Leave</strong></td>
                        <td>Advance notice required (2+ days)</td>
                        <td>48 hours</td>
                    </tr>
                    <tr>
                        <td><strong>Emergency Leave</strong></td>
                        <td>Justification required</td>
                        <td>Same day</td>
                    </tr>
                    <tr>
                        <td><strong>Professional Leave</strong></td>
                        <td>Conference/Training documentation</td>
                        <td>72 hours</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 12px;">Your leave usage is well within normal limits. Would you like to submit a new leave request for upcoming dates?</p>`,
            actions: [
                {
                    label: 'Submit Leave Request',
                    icon: 'fas fa-paper-plane',
                    onclick: 'window.location.href="/teacher/leave-request"'
                },
                {
                    label: 'View History',
                    icon: 'fas fa-history',
                    class: 'secondary',
                    onclick: 'addMessage("Opening leave history...", "bot")'
                }
            ]
        };
    }
    
    // Exam Schedule
    if (lowerMessage.includes('exam')) {
        return {
            text: `I've compiled your exam schedule and management details. The mid-term exams are coming up in November, and you have some pending submissions.
            
            <p style="margin: 12px 0;"><strong>📝 Upcoming Examination Periods:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Exam Period</th>
                        <th>Date Range</th>
                        <th>Status</th>
                        <th>Your Involvement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Mid-Term Exam</strong></td>
                        <td>November 10-15, 2025</td>
                        <td><span class="status-badge warning">Approaching</span></td>
                        <td>3 classes scheduled</td>
                    </tr>
                    <tr>
                        <td><strong>Final Exam</strong></td>
                        <td>February 15-22, 2026</td>
                        <td><span class="status-badge info">Future</span></td>
                        <td>TBD</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>Your Exam Schedule (Mid-Term):</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grade 9-A Math</strong></td>
                        <td>November 12</td>
                        <td>9:00 AM</td>
                        <td>Exam Hall A</td>
                        <td>2 hours</td>
                    </tr>
                    <tr>
                        <td><strong>Grade 10-B Math</strong></td>
                        <td>November 13</td>
                        <td>10:00 AM</td>
                        <td>Exam Hall B</td>
                        <td>2 hours</td>
                    </tr>
                    <tr>
                        <td><strong>Grade 11-A Math</strong></td>
                        <td>November 14</td>
                        <td>8:00 AM</td>
                        <td>Exam Hall A</td>
                        <td>3 hours</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>📊 Your Action Items:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Question Paper Submission</td>
                        <td>Grade 9-A</td>
                        <td><span class="status-badge success">✅ Completed</span></td>
                        <td>Nov 2</td>
                    </tr>
                    <tr>
                        <td>Question Paper Submission</td>
                        <td>Grade 10-B</td>
                        <td><span class="status-badge danger">⏳ Pending</span></td>
                        <td>Nov 2</td>
                    </tr>
                    <tr>
                        <td>Question Paper Submission</td>
                        <td>Grade 11-A</td>
                        <td><span class="status-badge danger">⏳ Pending</span></td>
                        <td>Nov 2</td>
                    </tr>
                    <tr>
                        <td>Invigilation Duty</td>
                        <td>All classes</td>
                        <td><span class="status-badge success">Assigned</span></td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin: 16px 0 6px 0;"><strong>Previous Exam Performance:</strong></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Result</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Last Exam Average</td>
                        <td>85%</td>
                        <td><span class="status-badge success">Excellent</span></td>
                    </tr>
                    <tr>
                        <td>Paper Correction</td>
                        <td>All papers</td>
                        <td><span class="status-badge success">✅ Completed</span></td>
                    </tr>
                    <tr>
                        <td>Marks Entry</td>
                        <td>All classes</td>
                        <td><span class="status-badge success">✅ Done</span></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="margin-top: 16px;"><span class="status-badge danger">⚠️ Urgent:</span> You have 2 question papers pending submission (Grade 10-B and Grade 11-A) with a deadline of November 2nd. Would you like me to help you prepare or upload these question papers?</p>`,
            actions: [
                {
                    label: 'View Exam Results',
                    icon: 'fas fa-chart-bar',
                    onclick: 'window.location.href="/teacher/exam-results"'
                },
                {
                    label: 'Enter Marks',
                    icon: 'fas fa-edit',
                    onclick: 'window.location.href="/teacher/enter-marks"'
                }
            ]
        };
    }
    
    // Default response
    return {
        text: `I understand you're asking about "${userMessage}".\n\nI can help you with:\n\n• 👥 **Classes:** View your classes, students, and schedules\n• ✅ **Attendance:** Mark and track student attendance\n• 📝 **Homework:** Assign, collect, and track assignments\n• 📊 **Grades:** Enter marks and view performance analytics\n• 📅 **Schedule:** View your teaching schedule and events\n• 📢 **Announcements:** View school announcements\n• 📝 **Leave:** Submit and track leave requests\n• 🎯 **Exams:** View schedule, enter marks, manage exams\n\nPlease ask a specific question, or use the quick actions above!`
    };
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/teacher-layout.php';
?>

