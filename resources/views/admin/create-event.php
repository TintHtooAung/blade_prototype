<?php
$pageTitle = 'Smart Campus Nova Hub - Create Event';
$pageIcon = 'fas fa-plus';
$pageHeading = 'Create New Event';
$activePage = 'event-planner';

ob_start();
?>
<!-- Back Navigation -->
<div class="navigation-breadcrumb">
    <a href="/admin/event-planner" class="breadcrumb-link">
        <i class="fas fa-arrow-left"></i> Back to Event Planner
    </a>
</div>

<!-- Create Event Form -->
<div class="create-event-form">
    <form id="eventCreateForm" class="announcement-form">
        <div class="form-section">
            <h3 class="section-title">Details</h3>
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label for="evTitle">Title</label>
                    <input type="text" id="evTitle" class="form-input" placeholder="Event title">
                </div>
                <div class="form-group">
                    <label for="evCategory">Category</label>
                    <select id="evCategory" class="form-select">
                        <option value="academic">Academic</option>
                        <option value="sports">Sports</option>
                        <option value="cultural">Cultural</option>
                        <option value="meeting">Meeting</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="evDate">Date</label>
                    <input type="date" id="evDate" class="form-input">
                </div>
                <div class="form-group">
                    <label for="evStart">Start Time</label>
                    <input type="time" id="evStart" class="form-input">
                </div>
                <div class="form-group">
                    <label for="evEnd">End Time</label>
                    <input type="time" id="evEnd" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="evLocation">Location</label>
                    <input type="text" id="evLocation" class="form-input" placeholder="e.g., Main Hall">
                </div>
                <div class="form-group">
                    <label for="evAudience">Audience</label>
                    <input type="text" id="evAudience" class="form-input" placeholder="e.g., Grade 10, Parents, All">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label for="evDesc">Description</label>
                    <textarea id="evDesc" class="form-input" rows="4" placeholder="Short description..."></textarea>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.location.href='/admin/event-planner'">Cancel</button>
            <button type="submit" class="btn-send"><i class="fas fa-check"></i> Save Event</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const form=document.getElementById('eventCreateForm');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        const ev={
            title: (document.getElementById('evTitle').value||'').trim(),
            category: document.getElementById('evCategory').value,
            date: document.getElementById('evDate').value,
            start: document.getElementById('evStart').value,
            end: document.getElementById('evEnd').value,
            location: (document.getElementById('evLocation').value||'').trim(),
            audience: (document.getElementById('evAudience').value||'').trim(),
            desc: (document.getElementById('evDesc').value||'').trim()
        };
        if(!ev.title || !ev.date){ alert('Please provide Title and Date.'); return; }
        let items=[]; try{ items=JSON.parse(localStorage.getItem('events')||'[]'); }catch(e){ items=[]; }
        items.unshift(ev);
        localStorage.setItem('events', JSON.stringify(items));
        alert('Event created');
        window.location.href='/admin/event-planner';
    });
});
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>
