<?php
$pageTitle = 'Smart Campus Nova Hub - Staff Assistant';
$pageIcon = 'fas fa-robot';
$pageHeading = 'Staff Assistant';
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
        <div class="sample-question-card" onclick="sendQuickMessage('Show overall school attendance')">
            <i class="fas fa-user-check"></i>
            <span>School Attendance</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show teacher statistics')">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Teacher Stats</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show student enrollment')">
            <i class="fas fa-user-graduate"></i>
            <span>Student Enrollment</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show department overview')">
            <i class="fas fa-building"></i>
            <span>Departments</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show upcoming events')">
            <i class="fas fa-calendar"></i>
            <span>Events</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show exam schedule')">
            <i class="fas fa-clipboard-list"></i>
            <span>Exam Schedule</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Generate reports')">
            <i class="fas fa-file-alt"></i>
            <span>Reports</span>
        </div>
        <div class="sample-question-card" onclick="sendQuickMessage('Show announcements')">
            <i class="fas fa-bullhorn"></i>
            <span>Announcements</span>
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
                    <strong>Hello! Welcome to your Staff Assistant.</strong>
                    <p style="margin-top: 8px;">I can help you with:</p>
                    <ul style="margin: 8px 0 0 20px; padding: 0;">
                        <li>📊 <strong>School Data:</strong> View statistics, enrollment, attendance</li>
                        <li>👥 <strong>User Management:</strong> Teachers, students, staff profiles</li>
                        <li>🏫 <strong>Academic Management:</strong> Departments, classes, subjects</li>
                        <li>📅 <strong>Events & Schedules:</strong> Plan and manage school activities</li>
                        <li>📝 <strong>Exams:</strong> Manage exam database and schedules</li>
                        <li>📊 <strong>Reports:</strong> Generate various school reports</li>
                    </ul>
                    <p style="margin-top: 12px;">How can I assist you today?</p>
                </div>
                <div class="message-time"><?php echo date('H:i'); ?></div>
            </div>
        </div>
    </div>
    
    <!-- Quick Action Buttons -->
    <div class="quick-actions" id="quickActions">
        <button class="quick-btn" onclick="sendQuickMessage('Show today statistics')">
            <i class="fas fa-chart-line"></i> Today's Stats
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('View schedules')">
            <i class="fas fa-clock"></i> Schedules
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Manage events')">
            <i class="fas fa-calendar"></i> Events
        </button>
        <button class="quick-btn" onclick="sendQuickMessage('Generate report')">
            <i class="fas fa-file-alt"></i> Reports
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
        <input type="file" id="fileInput" style="display: none;" accept="image/*,.pdf,.doc,.docx,.xlsx">
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
    
    // School Statistics
    if (lowerMessage.includes('today') && lowerMessage.includes('stat')) {
        const today = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        return {
            text: `**Today's School Statistics**\n**${today}**\n\n👥 **Attendance:**\n• Students: 1,456/1,520 present (96%)\n• Teachers: 78/82 present (95%)\n• Staff: 32/35 present (91%)\n\n📚 **Classes:**\n• Total Classes: 45\n• Active Sessions: 38\n• Completed: 7\n\n📝 **Activities:**\n• Exams Today: 3 classes\n• Events Scheduled: 2\n• Pending Homework: 156 assignments\n• New Announcements: 2\n\n⚡ **Quick Stats:**\n• New Enrollments: 5 students (this week)\n• Pending Leave Requests: 8\n• Library Books Issued: 23 (today)`,
            actions: [
                {
                    label: 'View Details',
                    icon: 'fas fa-eye',
                    onclick: 'window.location.href="/staff/dashboard"'
                }
            ]
        };
    }
    
    // Attendance
    if (lowerMessage.includes('attendance') || lowerMessage.includes('school attendance')) {
        return {
            text: `**Overall School Attendance Report:**\n\n📊 **Today's Overview:**\n• **Students:** 1,456/1,520 (96%)\n  - Excellent: 1,245 students (>95%)\n  - Good: 178 students (85-95%)\n  - Needs Attention: 97 students (<85%)\n\n• **Teachers:** 78/82 (95%)\n  - On Leave: 3\n  - Absent: 1\n\n• **Staff:** 32/35 (91%)\n  - On Leave: 2\n  - Absent: 1\n\n**By Grade Level:**\n• Grade 7: 320/335 (95%)\n• Grade 8: 298/310 (96%)\n• Grade 9: 285/295 (97%)\n• Grade 10: 275/285 (96%)\n• Grade 11: 278/295 (94%)\n\n**Monthly Trend:** ↗️ Improved by 2% from last month`,
            actions: [
                {
                    label: 'Mark Attendance',
                    icon: 'fas fa-check',
                    onclick: 'window.location.href="/staff/attendance"'
                },
                {
                    label: 'Generate Report',
                    icon: 'fas fa-file-alt',
                    onclick: 'sendQuickMessage("Generate attendance report")'
                }
            ]
        };
    }
    
    // Teacher Statistics
    if (lowerMessage.includes('teacher stat')) {
        return {
            text: `**Teacher Statistics & Overview:**\n\n👨‍🏫 **Total Teachers: 82**\n\n**By Department:**\n• Mathematics: 12 teachers\n• Science: 15 teachers\n• Languages: 18 teachers\n• Social Studies: 10 teachers\n• Arts & Sports: 8 teachers\n• Computer Science: 7 teachers\n• Others: 12 teachers\n\n**Employment Status:**\n• Full-Time: 68 teachers (83%)\n• Part-Time: 10 teachers (12%)\n• Contract: 4 teachers (5%)\n\n**Experience Level:**\n• Senior (>10 years): 28 teachers\n• Mid-Level (5-10 years): 32 teachers\n• Junior (<5 years): 22 teachers\n\n**Performance:**\n• Average Student Rating: 4.5/5.0\n• Classes per Teacher: 3-4 average\n• Student-Teacher Ratio: 18:1`,
            actions: [
                {
                    label: 'View Profiles',
                    icon: 'fas fa-users',
                    onclick: 'window.location.href="/staff/teacher-profiles"'
                },
                {
                    label: 'Generate Report',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'sendQuickMessage("Generate teacher report")'
                }
            ]
        };
    }
    
    // Student Enrollment
    if (lowerMessage.includes('student enrollment') || lowerMessage.includes('student stat')) {
        return {
            text: `**Student Enrollment Statistics:**\n\n👨‍🎓 **Total Students: 1,520**\n\n**By Grade Level:**\n• Grade 7: 335 students (22%)\n• Grade 8: 310 students (20%)\n• Grade 9: 295 students (19%)\n• Grade 10: 285 students (19%)\n• Grade 11: 295 students (19%)\n\n**By Gender:**\n• Male: 785 students (52%)\n• Female: 735 students (48%)\n\n**Enrollment Trend:**\n• New This Month: 15 students\n• Transferred Out: 3 students\n• Net Growth: +12 students\n• Year-over-Year: +8% growth\n\n**Academic Performance:**\n• Average GPA: 3.45/4.0\n• Honor Roll: 456 students (30%)\n• Dean's List: 182 students (12%)`,
            actions: [
                {
                    label: 'View Students',
                    icon: 'fas fa-user-graduate',
                    onclick: 'window.location.href="/staff/student-profiles"'
                },
                {
                    label: 'Enrollment Report',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'sendQuickMessage("Generate enrollment report")'
                }
            ]
        };
    }
    
    // Departments
    if (lowerMessage.includes('department')) {
        return {
            text: `**Department Overview:**\n\n🏢 **Active Departments: 7**\n\n**1. Mathematics Department**\n• Head: Dr. Michael Chen\n• Teachers: 12\n• Subjects: Algebra, Geometry, Calculus, Statistics\n• Students: 1,520 (all grades)\n\n**2. Science Department**\n• Head: Dr. Emily Watson\n• Teachers: 15\n• Subjects: Physics, Chemistry, Biology\n• Students: 1,520\n\n**3. Languages Department**\n• Head: Mr. Paolo Rossi\n• Teachers: 18\n• Subjects: English, Myanmar, Chinese\n• Students: 1,520\n\n**4. Social Studies**\n• Head: Ms. Jennifer Lee\n• Teachers: 10\n• Subjects: History, Geography, Civics\n\n**5. Computer Science**\n• Head: Mr. David Kumar\n• Teachers: 7\n• Subjects: Programming, Web Dev, IT\n\n**+2 more departments**`,
            actions: [
                {
                    label: 'View All Departments',
                    icon: 'fas fa-building',
                    onclick: 'window.location.href="/staff/department-management"'
                },
                {
                    label: 'Manage Departments',
                    icon: 'fas fa-cog',
                    onclick: 'window.location.href="/staff/academic-management"'
                }
            ]
        };
    }
    
    // Events
    if (lowerMessage.includes('event')) {
        return {
            text: `**Upcoming School Events:**\n\n📅 **This Week:**\n• **November 5:** Parent-Teacher Meeting\n  Time: 2:00 PM - 5:00 PM\n  Venue: Main Hall\n  Attendees: All teachers + parents\n\n• **November 7:** Science Fair\n  Time: 10:00 AM - 4:00 PM\n  Venue: Science Block\n  Participants: Grade 9-11\n\n📅 **Next Week:**\n• **November 10:** Mid-Term Exams Begin\n• **November 12:** Teacher Development Workshop\n• **November 15:** Annual Sports Day\n  Venue: School Grounds\n  All grades participating\n\n📅 **This Month:**\n• November 20: Cultural Festival\n• November 25: Final Exam Registration\n• November 28: School Board Meeting\n\n**Total Events This Month: 12**`,
            actions: [
                {
                    label: 'View Calendar',
                    icon: 'fas fa-calendar',
                    onclick: 'window.location.href="/staff/event-planner"'
                },
                {
                    label: 'Create Event',
                    icon: 'fas fa-plus',
                    onclick: 'window.location.href="/staff/event-planner"'
                }
            ]
        };
    }
    
    // Schedules
    if (lowerMessage.includes('schedule')) {
        return {
            text: `**School Schedule Management:**\n\n⏰ **Daily Schedule:**\n• Period 1: 8:00-9:00 AM\n• Period 2: 9:15-10:15 AM\n• Period 3: 10:30-11:30 AM\n• Lunch Break: 11:30 AM-12:45 PM\n• Period 4: 12:45-1:45 PM\n• Period 5: 2:00-3:00 PM\n• Period 6: 3:15-4:00 PM\n\n📚 **Class Schedules:**\n• Total Classes: 45\n• Classes per Period: Average 38\n• Rooms Available: 50\n• Labs: 12 (fully scheduled)\n\n👨‍🏫 **Teacher Schedules:**\n• Teachers on duty: 78\n• Average classes per teacher: 3-4\n• Break supervision: Rotational\n\n**Schedule Status:**\n• All timetables finalized ✅\n• No conflicts detected ✅\n• Room allocation complete ✅`,
            actions: [
                {
                    label: 'View Schedules',
                    icon: 'fas fa-clock',
                    onclick: 'window.location.href="/staff/schedule-planner"'
                },
                {
                    label: 'Edit Schedule',
                    icon: 'fas fa-edit',
                    onclick: 'window.location.href="/staff/schedule-planner"'
                }
            ]
        };
    }
    
    // Exams
    if (lowerMessage.includes('exam')) {
        return {
            text: `**Exam Schedule & Management:**\n\n📝 **Upcoming Exams:**\n• **Mid-Term Exam:** November 10-15, 2025\n  - All grades participating\n  - 280 exam sessions scheduled\n  - 82 invigilators assigned\n\n• **Final Exam:** February 15-22, 2026\n  - Registration opens: November 25\n\n**Exam Preparation Status:**\n• Question Papers Submitted: 78% (65/83)\n• Pending Submissions: 18 papers\n• Invigilation Schedule: ✅ Complete\n• Exam Halls Booked: ✅ All 15 halls\n\n**Recent Exam Results:**\n• Previous Mid-Term Average: 82%\n• Pass Rate: 94%\n• Papers Corrected: 100%\n• Results Published: ✅\n\n**Action Required:**\n• 18 teachers need to submit question papers\n• Deadline: November 2, 2025`,
            actions: [
                {
                    label: 'View Exam Database',
                    icon: 'fas fa-clipboard-list',
                    onclick: 'window.location.href="/staff/exam-database"'
                },
                {
                    label: 'Exam Schedule',
                    icon: 'fas fa-calendar',
                    onclick: 'sendQuickMessage("Show detailed exam schedule")'
                }
            ]
        };
    }
    
    // Reports
    if (lowerMessage.includes('report') || lowerMessage.includes('generate report')) {
        return {
            text: `**Report Generation Centre:**\n\n📊 **Available Reports:**\n\n**1. Attendance Reports**\n• Daily/Weekly/Monthly attendance\n• Grade-wise breakdown\n• Individual student records\n\n**2. Academic Reports**\n• Grade distribution analysis\n• Subject-wise performance\n• Teacher effectiveness reports\n\n**3. Financial Reports**\n• Fee collection status\n• Outstanding payments\n• Payroll summaries\n\n**4. Enrollment Reports**\n• Student demographics\n• Enrollment trends\n• Retention analysis\n\n**5. Exam Reports**\n• Exam results analysis\n• Grade comparison\n• Subject performance\n\n**Recently Generated:**\n• Monthly Attendance (Oct 2025) - 2 days ago\n• Fee Collection Report - 5 days ago\n\nWhich report would you like to generate?`,
            actions: [
                {
                    label: 'Attendance Report',
                    icon: 'fas fa-user-check',
                    onclick: 'addMessage("Generating attendance report...", "bot")'
                },
                {
                    label: 'Academic Report',
                    icon: 'fas fa-graduation-cap',
                    onclick: 'addMessage("Generating academic report...", "bot")'
                },
                {
                    label: 'View Report Centre',
                    icon: 'fas fa-file-alt',
                    class: 'secondary',
                    onclick: 'window.location.href="/staff/report-centre"'
                }
            ]
        };
    }
    
    // Announcements
    if (lowerMessage.includes('announcement')) {
        return {
            text: `**Recent School Announcements:**\n\n📢 **Parent-Teacher Meeting** (Posted: Today)\nPriority: HIGH\nScheduled for November 5th, 2025. All teachers and staff must be present.\n\n📢 **Mid-Term Exam Schedule Published** (Posted: Oct 30)\nPriority: HIGH\nExams from November 10-15. All preparations must be completed by November 8th.\n\n📢 **New Staff Orientation** (Posted: Oct 28)\nPriority: MEDIUM\nOrientation for 3 new staff members on November 3rd at 10:00 AM.\n\n📢 **School Sports Day Preparation** (Posted: Oct 25)\nPriority: MEDIUM\nSports Day on November 15th. Volunteer coordinators needed.\n\n📢 **IT System Maintenance** (Posted: Oct 22)\nPriority: LOW\nScheduled maintenance on November 7th, 2:00-4:00 AM. Brief downtime expected.`,
            actions: [
                {
                    label: 'View All',
                    icon: 'fas fa-bullhorn',
                    onclick: 'window.location.href="/staff/announcements"'
                }
            ]
        };
    }
    
    // Leave Request
    if (lowerMessage.includes('leave')) {
        return {
            text: `**Leave Request Management:**\n\n📅 **Your Leave Balance:**\n• Total Allowed: 20 days per year\n• Used: 4 days\n• Remaining: 16 days\n• Pending Requests: 0\n\n📋 **Recent Leave History:**\n• Oct 10-12, 2025: Personal Leave (Approved)\n• Sep 8, 2025: Medical Leave (Approved)\n\n**Leave Types Available:**\n• Sick Leave (Medical certificate required)\n• Personal Leave (Advance notice required)\n• Emergency Leave (Same day approval)\n• Professional Leave (Conference/Training)\n\nWould you like to submit a new leave request?`,
            actions: [
                {
                    label: 'Submit Leave Request',
                    icon: 'fas fa-paper-plane',
                    onclick: 'window.location.href="/staff/leave-request"'
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
    
    // Default response
    return {
        text: `I understand you're asking about "${userMessage}".\n\nI can help you with:\n\n• 📊 **Statistics:** School attendance, enrollment, performance\n• 👥 **User Management:** Teachers, students, staff profiles\n• 🏫 **Academic:** Departments, classes, subjects\n• 📅 **Events & Schedules:** Plan and manage activities\n• 📝 **Exams:** Exam database, schedules, results\n• 📊 **Reports:** Generate various reports\n• 📢 **Announcements:** View and manage announcements\n• 📝 **Leave:** Submit and track leave requests\n\nPlease ask a specific question, or use the quick actions above!`
    };
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/staff-layout.php';
?>

