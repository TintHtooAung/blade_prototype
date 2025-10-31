<?php
$pageTitle = 'Smart Campus Nova Hub - Event Calendar';
$pageIcon = 'fas fa-calendar-alt';
$pageHeading = 'Event Calendar';
$activePage = 'event-calendar';

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

<!-- Upcoming Events -->
<div class="simple-section">
    <div class="simple-header">
        <h3>Upcoming Events</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Nov 05, 2025</strong></td>
                    <td><strong>Parent-Teacher Meeting</strong><br>
                        <small style="color: #6b7280;">Discuss student progress and development</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td>Main Hall</td>
                    <td>2:00 PM - 5:00 PM</td>
                </tr>
                <tr>
                    <td><strong>Nov 10, 2025</strong></td>
                    <td><strong>Final Exam Registration</strong><br>
                        <small style="color: #6b7280;">Last date for final exam registration</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td>Admin Office</td>
                    <td>9:00 AM - 4:00 PM</td>
                </tr>
                <tr>
                    <td><strong>Nov 15, 2025</strong></td>
                    <td><strong>Annual Sports Day</strong><br>
                        <small style="color: #6b7280;">Annual inter-school sports competition</small>
                    </td>
                    <td><span class="type-badge">Sports</span></td>
                    <td>Sports Ground</td>
                    <td>8:00 AM - 4:00 PM</td>
                </tr>
                <tr>
                    <td><strong>Nov 20, 2025</strong></td>
                    <td><strong>Science Fair</strong><br>
                        <small style="color: #6b7280;">Student science project exhibition</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td>Science Block</td>
                    <td>10:00 AM - 3:00 PM</td>
                </tr>
                <tr>
                    <td><strong>Nov 25, 2025</strong></td>
                    <td><strong>Cultural Festival</strong><br>
                        <small style="color: #6b7280;">Annual cultural program and performances</small>
                    </td>
                    <td><span class="type-badge">Cultural</span></td>
                    <td>Auditorium</td>
                    <td>5:00 PM - 8:00 PM</td>
                </tr>
                <tr>
                    <td><strong>Dec 01, 2025</strong></td>
                    <td><strong>Winter Break Begins</strong><br>
                        <small style="color: #6b7280;">School closes for winter vacation</small>
                    </td>
                    <td><span class="type-badge">Holiday</span></td>
                    <td>-</td>
                    <td>All Day</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
