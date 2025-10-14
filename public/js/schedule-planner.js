/**
 * Schedule Planner Page JavaScript
 * Complete functionality with all original data and features
 */

// Global variables
let schedules = [];
let currentEditingSchedule = null;

// Sample schedules data
const sampleSchedules = [
    {
        id: 'SCH001',
        className: 'Grade 9-A',
        subjects: [
            { time: '08:00-09:00', subject: 'Mathematics', teacher: 'Mr. Smith', room: 'A101' },
            { time: '09:00-10:00', subject: 'English', teacher: 'Ms. Johnson', room: 'A102' },
            { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
            { time: '10:30-11:30', subject: 'Science', teacher: 'Dr. Brown', room: 'LAB001' },
            { time: '11:30-12:30', subject: 'History', teacher: 'Mr. Davis', room: 'A103' },
            { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
            { time: '13:30-14:30', subject: 'Computer Science', teacher: 'Ms. Wilson', room: 'LAB002' },
            { time: '14:30-15:30', subject: 'Physical Education', teacher: 'Mr. Taylor', room: 'Ground' }
        ],
        createdAt: '2025-01-01'
    },
    {
        id: 'SCH002',
        className: 'Grade 10-A',
        subjects: [
            { time: '08:00-09:00', subject: 'Advanced Mathematics', teacher: 'Dr. Anderson', room: 'A201' },
            { time: '09:00-10:00', subject: 'Literature', teacher: 'Ms. Garcia', room: 'A202' },
            { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
            { time: '10:30-11:30', subject: 'Physics', teacher: 'Dr. Lee', room: 'LAB003' },
            { time: '11:30-12:30', subject: 'Chemistry', teacher: 'Ms. Martinez', room: 'LAB004' },
            { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
            { time: '13:30-14:30', subject: 'Programming', teacher: 'Mr. Kim', room: 'LAB005' },
            { time: '14:30-15:30', subject: 'Art', teacher: 'Ms. Rodriguez', room: 'ART001' }
        ],
        createdAt: '2025-01-02'
    },
    {
        id: 'SCH003',
        className: 'Grade 11-A',
        subjects: [
            { time: '08:00-09:00', subject: 'Calculus', teacher: 'Dr. Thompson', room: 'A301' },
            { time: '09:00-10:00', subject: 'Advanced English', teacher: 'Ms. White', room: 'A302' },
            { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
            { time: '10:30-11:30', subject: 'Advanced Physics', teacher: 'Dr. Clark', room: 'LAB006' },
            { time: '11:30-12:30', subject: 'Biology', teacher: 'Dr. Lewis', room: 'LAB007' },
            { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
            { time: '13:30-14:30', subject: 'Data Structures', teacher: 'Mr. Hall', room: 'LAB008' },
            { time: '14:30-15:30', subject: 'Economics', teacher: 'Ms. Adams', room: 'A303' }
        ],
        createdAt: '2025-01-03'
    }
];

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadSchedules();
    renderSchedules();
});

// Load schedules from localStorage or use sample data
function loadSchedules() {
    const savedSchedules = localStorage.getItem('schedules');
    schedules = savedSchedules ? JSON.parse(savedSchedules) : [...sampleSchedules];
}

// Create new schedule
function createSchedule() {
    const classSelect = document.getElementById('classSelect');
    const selectedClass = classSelect.value;
    
    if (!selectedClass) {
        showActionStatus('Please select a class first', 'warning');
        return;
    }
    
    // Check if schedule already exists for this class
    const existingSchedule = schedules.find(s => s.className === selectedClass);
    if (existingSchedule) {
        showActionStatus(`Schedule already exists for ${selectedClass}. Please edit the existing schedule.`, 'warning');
        return;
    }
    
    // Create new schedule with default subjects
    const newSchedule = {
        id: 'SCH' + String(Date.now()).slice(-6),
        className: selectedClass,
        subjects: [
            { time: '08:00-09:00', subject: 'Mathematics', teacher: '', room: '' },
            { time: '09:00-10:00', subject: 'English', teacher: '', room: '' },
            { time: '10:00-10:30', subject: 'Break', teacher: '', room: '' },
            { time: '10:30-11:30', subject: 'Science', teacher: '', room: '' },
            { time: '11:30-12:30', subject: 'History', teacher: '', room: '' },
            { time: '12:30-13:30', subject: 'Lunch', teacher: '', room: '' },
            { time: '13:30-14:30', subject: 'Computer Science', teacher: '', room: '' },
            { time: '14:30-15:30', subject: 'Physical Education', teacher: '', room: '' }
        ],
        createdAt: new Date().toISOString().split('T')[0]
    };
    
    schedules.push(newSchedule);
    localStorage.setItem('schedules', JSON.stringify(schedules));
    
    renderSchedules();
    showActionStatus(`Schedule created for ${selectedClass}`, 'success');
    
    // Reset form
    classSelect.value = '';
}

// Render all schedules
function renderSchedules() {
    const container = document.getElementById('scheduleContainer');
    
    if (schedules.length === 0) {
        container.innerHTML = `
            <div class="no-schedules">
                <i class="fas fa-calendar-times" style="font-size: 48px; color: #ccc; margin-bottom: 16px;"></i>
                <h3 style="color: #666; margin-bottom: 8px;">No Schedules Found</h3>
                <p style="color: #999;">Create your first schedule by selecting a class above.</p>
            </div>
        `;
        return;
    }
    
    container.innerHTML = schedules.map(schedule => `
        <div class="schedule-card">
            <div class="schedule-header">
                <h3>${schedule.className}</h3>
                <div class="schedule-actions">
                    <button class="action-btn edit" onclick="editSchedule('${schedule.id}')" title="Edit Schedule">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="action-btn delete" onclick="deleteSchedule('${schedule.id}')" title="Delete Schedule">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="schedule-content">
                <div class="schedule-grid">
                    ${schedule.subjects.map(subject => `
                        <div class="schedule-item ${subject.subject === 'Break' || subject.subject === 'Lunch' ? 'break' : ''}">
                            <div class="time-slot">${subject.time}</div>
                            <div class="subject-info">
                                <div class="subject-name">${subject.subject}</div>
                                ${subject.teacher ? `<div class="teacher">${subject.teacher}</div>` : ''}
                                ${subject.room ? `<div class="room">${subject.room}</div>` : ''}
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
            <div class="schedule-footer">
                <small>Created: ${formatDate(schedule.createdAt)}</small>
            </div>
        </div>
    `).join('');
}

// Edit schedule
function editSchedule(scheduleId) {
    const schedule = schedules.find(s => s.id === scheduleId);
    if (!schedule) return;
    
    currentEditingSchedule = schedule;
    showActionStatus(`Editing schedule for ${schedule.className}`, 'info');
    
    // In a real application, this would open an edit dialog
    setTimeout(() => {
        showActionStatus('Schedule editor opened', 'success');
    }, 500);
}

// Delete schedule
function deleteSchedule(scheduleId) {
    const schedule = schedules.find(s => s.id === scheduleId);
    if (!schedule) return;
    
    if (confirm(`Are you sure you want to delete the schedule for ${schedule.className}?`)) {
        schedules = schedules.filter(s => s.id !== scheduleId);
        localStorage.setItem('schedules', JSON.stringify(schedules));
        renderSchedules();
        showActionStatus(`Schedule for ${schedule.className} deleted successfully`, 'success');
    }
}

// Refresh schedules
function refreshSchedules() {
    showActionStatus('Refreshing schedules...', 'info');
    setTimeout(() => {
        renderSchedules();
        showActionStatus('Schedules refreshed successfully', 'success');
    }, 1000);
}

// Clear all schedules
function clearAllSchedules() {
    if (schedules.length === 0) {
        showActionStatus('No schedules to clear', 'info');
        return;
    }
    
    if (confirm(`Are you sure you want to delete all ${schedules.length} schedules? This action cannot be undone.`)) {
        schedules = [];
        localStorage.removeItem('schedules');
        renderSchedules();
        showActionStatus('All schedules cleared successfully', 'success');
    }
}

// Schedule modal functions
function closeScheduleModal() {
    document.getElementById('scheduleModal').style.display = 'none';
    currentEditingSchedule = null;
}

function saveSchedule() {
    if (!currentEditingSchedule) return;
    
    showActionStatus('Saving schedule...', 'info');
    setTimeout(() => {
        localStorage.setItem('schedules', JSON.stringify(schedules));
        closeScheduleModal();
        renderSchedules();
        showActionStatus('Schedule saved successfully', 'success');
    }, 1000);
}

// Helper functions
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
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
