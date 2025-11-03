<?php
$pageTitle = 'Smart Campus Nova Hub - Announcements';
$pageIcon = 'fas fa-bullhorn';
$pageHeading = 'Announcements';
$activePage = 'announcements';

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

<!-- Announcements List -->
<div class="simple-section">
    <div class="simple-header">
        <h3>School Announcements</h3>
    </div>
    
    <div class="simple-table-container">
        <table class="basic-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Priority</th>
                    <th style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr onclick="window.location.href='/parent/announcement-details?id=ANN001'" style="cursor: pointer;">
                    <td>Oct 30, 2025</td>
                    <td><strong>Parent-Teacher Meeting</strong><br>
                        <small style="color: #6b7280;">Meeting scheduled for November 5th, 2025. All parents are requested to attend.</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td><span class="status-badge inactive">High</span></td>
                    <td><button class="simple-btn secondary small" onclick="event.stopPropagation(); window.location.href='/parent/announcement-details?id=ANN001'">View</button></td>
                </tr>
                <tr onclick="window.location.href='/parent/announcement-details?id=ANN002'" style="cursor: pointer;">
                    <td>Oct 28, 2025</td>
                    <td><strong>Annual Sports Day</strong><br>
                        <small style="color: #6b7280;">Sports Day will be held on November 15th. Registration forms available in office.</small>
                    </td>
                    <td><span class="type-badge">Event</span></td>
                    <td><span class="status-badge pending">Medium</span></td>
                    <td><button class="simple-btn secondary small" onclick="event.stopPropagation(); window.location.href='/parent/announcement-details?id=ANN002'">View</button></td>
                </tr>
                <tr onclick="window.location.href='/parent/announcement-details?id=ANN003'" style="cursor: pointer;">
                    <td>Oct 25, 2025</td>
                    <td><strong>Mid-Term Results Published</strong><br>
                        <small style="color: #6b7280;">Mid-term examination results are now available in the portal.</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td><span class="status-badge inactive">High</span></td>
                    <td><button class="simple-btn secondary small" onclick="event.stopPropagation(); window.location.href='/parent/announcement-details?id=ANN003'">View</button></td>
                </tr>
                <tr onclick="window.location.href='/parent/announcement-details?id=ANN004'" style="cursor: pointer;">
                    <td>Oct 22, 2025</td>
                    <td><strong>School Closure - Public Holiday</strong><br>
                        <small style="color: #6b7280;">School will remain closed on October 26th for National Holiday.</small>
                    </td>
                    <td><span class="type-badge">General</span></td>
                    <td><span class="status-badge pending">Medium</span></td>
                    <td><button class="simple-btn secondary small" onclick="event.stopPropagation(); window.location.href='/parent/announcement-details?id=ANN004'">View</button></td>
                </tr>
                <tr onclick="window.location.href='/parent/announcement-details?id=ANN005'" style="cursor: pointer;">
                    <td>Oct 20, 2025</td>
                    <td><strong>Library Book Fair</strong><br>
                        <small style="color: #6b7280;">Annual book fair from October 28-30 in the school library.</small>
                    </td>
                    <td><span class="type-badge">Event</span></td>
                    <td><span class="status-badge active">Low</span></td>
                    <td><button class="simple-btn secondary small" onclick="event.stopPropagation(); window.location.href='/parent/announcement-details?id=ANN005'">View</button></td>
                </tr>
                <tr onclick="window.location.href='/parent/announcement-details?id=ANN006'" style="cursor: pointer;">
                    <td>Oct 18, 2025</td>
                    <td><strong>Science Exhibition</strong><br>
                        <small style="color: #6b7280;">Students are encouraged to participate in the upcoming science exhibition.</small>
                    </td>
                    <td><span class="type-badge">Academic</span></td>
                    <td><span class="status-badge pending">Medium</span></td>
                    <td><button class="simple-btn secondary small" onclick="event.stopPropagation(); window.location.href='/parent/announcement-details?id=ANN006'">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/parent-layout.php';
?>
