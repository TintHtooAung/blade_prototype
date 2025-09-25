<?php
$pageTitle = 'Smart Campus Nova Hub - Event Planner';
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Event Planner';
$activePage = 'event-planner';

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
    <div class="page-actions">
        <a href="/admin/create-event" class="create-event-btn">
            <i class="fas fa-plus"></i>
            Create Event
        </a>
    </div>
</div>

<!-- Event Statistics -->
<div class="event-stats-grid">
    <?php echo renderStatCard([
        'title' => 'Total Events',
        'value' => '12',
        'icon' => 'fas fa-calendar-alt',
        'iconColor' => 'blue'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'This Month',
        'value' => '4',
        'icon' => 'fas fa-calendar-day',
        'iconColor' => 'green'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Upcoming',
        'value' => '7',
        'icon' => 'fas fa-clock',
        'iconColor' => 'yellow'
    ]); ?>
    
    <?php echo renderStatCard([
        'title' => 'Active Events',
        'value' => '3',
        'icon' => 'fas fa-play-circle',
        'iconColor' => 'purple'
    ]); ?>
</div>

<!-- Event Controls -->
<div class="event-controls">
    <div class="view-toggle">
        <div class="toggle-switch">
            <input type="radio" id="list-view-toggle" name="view-toggle" value="list" checked>
            <label for="list-view-toggle" class="toggle-option">
                <i class="fas fa-list"></i>
                <span>List View</span>
            </label>
            <input type="radio" id="calendar-view-toggle" name="view-toggle" value="calendar">
            <label for="calendar-view-toggle" class="toggle-option">
                <i class="fas fa-calendar"></i>
                <span>Calendar View</span>
            </label>
        </div>
    </div>
    
    <div class="event-filters">
        <select class="filter-select">
            <option value="all">All Events</option>
            <option value="academic">Academic</option>
            <option value="sports">Sports</option>
            <option value="cultural">Cultural</option>
            <option value="meeting">Meeting</option>
        </select>
        
        <select class="filter-select">
            <option value="all-time">All Time</option>
            <option value="today">Today</option>
            <option value="this-week">This Week</option>
            <option value="this-month">This Month</option>
            <option value="upcoming">Upcoming</option>
        </select>
        
        <button class="clear-filters-btn">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<!-- Event Views Container -->
<div class="event-views-container">
    <!-- List View -->
    <div class="event-view active" id="list-view">
        <div class="events-list">
            <div class="event-card academic">
                <div class="event-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="event-content">
                    <div class="event-title">Mathematics Final Exam</div>
                    <div class="event-meta">
                        <span class="event-date"><i class="fas fa-calendar"></i> Dec 15, 2024</span>
                        <span class="event-time"><i class="fas fa-clock"></i> 09:00 AM - 12:00 PM</span>
                        <span class="event-location"><i class="fas fa-map-marker-alt"></i> Main Hall</span>
                    </div>
                    <div class="event-description">Final examination for Grade 10 Mathematics covering all topics from the semester.</div>
                    <div class="event-tags">
                        <span class="tag academic">Academic</span>
                        <span class="tag grade-10">Grade 10</span>
                    </div>
                </div>
                <div class="event-actions">
                    <button class="event-action-btn edit"><i class="fas fa-edit"></i></button>
                    <button class="event-action-btn delete"><i class="fas fa-trash"></i></button>
                </div>
            </div>

            <div class="event-card sports">
                <div class="event-icon">
                    <i class="fas fa-futbol"></i>
                </div>
                <div class="event-content">
                    <div class="event-title">Football Championship</div>
                    <div class="event-meta">
                        <span class="event-date"><i class="fas fa-calendar"></i> Dec 18, 2024</span>
                        <span class="event-time"><i class="fas fa-clock"></i> 02:00 PM - 05:00 PM</span>
                        <span class="event-location"><i class="fas fa-map-marker-alt"></i> School Ground</span>
                    </div>
                    <div class="event-description">Annual inter-school football championship featuring teams from 8 different schools.</div>
                    <div class="event-tags">
                        <span class="tag sports">Sports</span>
                        <span class="tag championship">Championship</span>
                    </div>
                </div>
                <div class="event-actions">
                    <button class="event-action-btn edit"><i class="fas fa-edit"></i></button>
                    <button class="event-action-btn delete"><i class="fas fa-trash"></i></button>
                </div>
            </div>

            <div class="event-card cultural">
                <div class="event-icon">
                    <i class="fas fa-music"></i>
                </div>
                <div class="event-content">
                    <div class="event-title">Cultural Festival</div>
                    <div class="event-meta">
                        <span class="event-date"><i class="fas fa-calendar"></i> Dec 20, 2024</span>
                        <span class="event-time"><i class="fas fa-clock"></i> 10:00 AM - 04:00 PM</span>
                        <span class="event-location"><i class="fas fa-map-marker-alt"></i> Assembly Hall</span>
                    </div>
                    <div class="event-description">Annual cultural festival showcasing traditional music, dance, and art from different regions.</div>
                    <div class="event-tags">
                        <span class="tag cultural">Cultural</span>
                        <span class="tag festival">Festival</span>
                    </div>
                </div>
                <div class="event-actions">
                    <button class="event-action-btn edit"><i class="fas fa-edit"></i></button>
                    <button class="event-action-btn delete"><i class="fas fa-trash"></i></button>
                </div>
            </div>

            <div class="event-card meeting">
                <div class="event-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="event-content">
                    <div class="event-title">Parent-Teacher Meeting</div>
                    <div class="event-meta">
                        <span class="event-date"><i class="fas fa-calendar"></i> Dec 22, 2024</span>
                        <span class="event-time"><i class="fas fa-clock"></i> 08:00 AM - 05:00 PM</span>
                        <span class="event-location"><i class="fas fa-map-marker-alt"></i> Conference Room</span>
                    </div>
                    <div class="event-description">Scheduled parent-teacher meetings to discuss student progress and academic performance.</div>
                    <div class="event-tags">
                        <span class="tag meeting">Meeting</span>
                        <span class="tag parents">Parents</span>
                    </div>
                </div>
                <div class="event-actions">
                    <button class="event-action-btn edit"><i class="fas fa-edit"></i></button>
                    <button class="event-action-btn delete"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar View -->
    <div class="event-view" id="calendar-view">
        <div class="calendar-container">
            <div class="calendar-grid">
                <!-- Calendar Header -->
                <div class="calendar-header">
                    <button class="calendar-nav prev-month" id="prevMonth">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 id="currentMonth">December 2024</h3>
                    <button class="calendar-nav next-month" id="nextMonth">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Calendar Days -->
                <div class="calendar-days">
                    <div class="day-header">Sun</div>
                    <div class="day-header">Mon</div>
                    <div class="day-header">Tue</div>
                    <div class="day-header">Wed</div>
                    <div class="day-header">Thu</div>
                    <div class="day-header">Fri</div>
                    <div class="day-header">Sat</div>

                    <!-- Empty days for November -->
                    <div class="calendar-day empty"></div>
                    <div class="calendar-day empty"></div>
                    <div class="calendar-day empty"></div>
                    <div class="calendar-day empty"></div>
                    <div class="calendar-day empty"></div>
                    <div class="calendar-day empty"></div>

                    <!-- December 1-7 -->
                    <div class="calendar-day">
                        <span class="day-number">1</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">2</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">3</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">4</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">5</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">6</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">7</span>
                    </div>

                    <!-- December 8-14 -->
                    <div class="calendar-day">
                        <span class="day-number">8</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">9</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">10</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">11</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">12</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">13</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">14</span>
                    </div>

                    <!-- December 15-21 -->
                    <div class="calendar-day has-event academic">
                        <span class="day-number">15</span>
                        <div class="day-events">
                            <div class="day-event" data-title="Mathematics Final Exam"></div>
                        </div>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">16</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">17</span>
                    </div>
                    <div class="calendar-day has-event sports">
                        <span class="day-number">18</span>
                        <div class="day-events">
                            <div class="day-event" data-title="Football Championship"></div>
                        </div>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">19</span>
                    </div>
                    <div class="calendar-day has-event cultural">
                        <span class="day-number">20</span>
                        <div class="day-events">
                            <div class="day-event" data-title="Cultural Festival"></div>
                        </div>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">21</span>
                    </div>

                    <!-- December 22-28 -->
                    <div class="calendar-day has-event meeting">
                        <span class="day-number">22</span>
                        <div class="day-events">
                            <div class="day-event" data-title="Parent-Teacher Meeting"></div>
                        </div>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">23</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">24</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">25</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">26</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">27</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">28</span>
                    </div>

                    <!-- December 29-31 -->
                    <div class="calendar-day">
                        <span class="day-number">29</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">30</span>
                    </div>
                    <div class="calendar-day">
                        <span class="day-number">31</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// View Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.view-btn');
    const eventViews = document.querySelectorAll('.event-view');
    const calendarDays = document.querySelectorAll('.calendar-day.has-event');

    // View Toggle - Radio Button State Management
    const viewToggles = document.querySelectorAll('input[name="view-toggle"]');
    
    function switchView(viewType) {
        // Hide all views
        eventViews.forEach(view => {
            view.classList.remove('active');
            view.style.display = 'none';
        });

        // Show the selected view
        const targetView = document.getElementById(viewType + '-view');
        if (targetView) {
            targetView.classList.add('active');
            targetView.style.display = 'block';
            console.log('Switched to view:', viewType);
        }
    }
    
    viewToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                switchView(this.value);
            }
        });
    });
    
    // Initialize with list view
    switchView('list');

    // Calendar Navigation
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const currentMonthEl = document.getElementById('currentMonth');

    let currentDate = new Date();

    function updateCalendarHeader() {
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                           'July', 'August', 'September', 'October', 'November', 'December'];
        currentMonthEl.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
    }

    prevMonthBtn.addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendarHeader();
        // In a real app, you would reload the calendar data for the new month
    });

    nextMonthBtn.addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendarHeader();
        // In a real app, you would reload the calendar data for the new month
    });

    // Event Card Interactions
    const eventCards = document.querySelectorAll('.event-card');
    eventCards.forEach(card => {
        card.addEventListener('click', function() {
            // In a real app, this would open an event details modal
            console.log('Event clicked:', this.querySelector('.event-title').textContent);
        });
    });

    // Event Action Buttons
    const editButtons = document.querySelectorAll('.event-action-btn.edit');
    const deleteButtons = document.querySelectorAll('.event-action-btn.delete');

    editButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent card click
            const eventCard = this.closest('.event-card');
            const eventTitle = eventCard.querySelector('.event-title').textContent;
            alert(`Edit event: ${eventTitle}`);
            // In a real app, this would open an edit form
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent card click
            const eventCard = this.closest('.event-card');
            const eventTitle = eventCard.querySelector('.event-title').textContent;

            if (confirm(`Are you sure you want to delete "${eventTitle}"?`)) {
                eventCard.style.opacity = '0.5';
                eventCard.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    eventCard.remove();
                }, 300);
            }
        });
    });

    // Filter functionality
    const filterSelects = document.querySelectorAll('.filter-select');
    const clearFiltersBtn = document.querySelector('.clear-filters-btn');

    filterSelects.forEach(filter => {
        filter.addEventListener('change', function() {
            const filterValue = this.value;
            const eventCards = document.querySelectorAll('.event-card');

            eventCards.forEach(card => {
                if (filterValue === 'all' || card.classList.contains(filterValue)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    clearFiltersBtn.addEventListener('click', function() {
        filterSelects.forEach(filter => {
            filter.value = 'all';
        });

        const eventCards = document.querySelectorAll('.event-card');
        eventCards.forEach(card => {
            card.style.display = 'flex';
        });
    });

    // Calendar day click
    calendarDays.forEach(day => {
        day.addEventListener('click', function() {
            const dayNumber = this.querySelector('.day-number').textContent;
            const events = this.querySelectorAll('.day-event');

            if (events.length > 0) {
                const eventTitles = Array.from(events).map(e => e.dataset.title).join(', ');
                alert(`Events on ${dayNumber}: ${eventTitles}`);
            }
        });
    });

    // Add some dynamic effects
    const eventCards = document.querySelectorAll('.event-card');
    eventCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>