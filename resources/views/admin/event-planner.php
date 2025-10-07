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
    <div class="stat-card"><div class="stat-icon"><i class="fas fa-calendar-alt"></i></div><div class="stat-content"><h3>Total Events</h3><div class="stat-number">12</div></div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fas fa-calendar-day"></i></div><div class="stat-content"><h3>This Month</h3><div class="stat-number">4</div></div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fas fa-clock"></i></div><div class="stat-content"><h3>Upcoming</h3><div class="stat-number">7</div></div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fas fa-play-circle"></i></div><div class="stat-content"><h3>Active Events</h3><div class="stat-number">3</div></div></div>
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
        <select id="filterCategory" class="filter-select">
            <option value="all">All Events</option>
            <option value="academic">Academic</option>
            <option value="sports">Sports</option>
            <option value="cultural">Cultural</option>
            <option value="meeting">Meeting</option>
        </select>
        <select id="filterTime" class="filter-select">
            <option value="all-time">All Time</option>
            <option value="today">Today</option>
            <option value="this-week">This Week</option>
            <option value="this-month">This Month</option>
            <option value="upcoming">Upcoming</option>
        </select>
        <button class="clear-filters-btn"><i class="fas fa-times"></i></button>
    </div>
</div>

<!-- Event Views Container -->
<div class="event-views-container">
    <!-- List View -->
    <div class="event-view active" id="list-view">
        <div id="eventsList" class="events-list"></div>
    </div>

    <!-- Calendar View -->
    <div class="event-view" id="calendar-view">
        <div class="calendar-container">
            <div class="calendar-grid">
                <div class="calendar-header">
                    <button class="calendar-nav prev-month" id="prevMonth"><i class="fas fa-chevron-left"></i></button>
                    <h3 id="currentMonth">December 2024</h3>
                    <button class="calendar-nav next-month" id="nextMonth"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="calendar-days" id="calendarDays"></div>
            </div>
        </div>
    </div>
</div>

<script>
(function(){
    // Utility
    function escapeHtml(str){ return String(str||'').replace(/[&<>\"]/g, s=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;"}[s])); }
    function fmtDate(d){ if(!d) return ''; const dt=new Date(d); return dt.toLocaleDateString(undefined,{month:'short', day:'numeric', year:'numeric'}); }
    function timeRange(s,e){ return (s? s : '') + (e? ' - '+e : ''); }
    function pad2(n){ return n<10? '0'+n : ''+n; }

    // Samples (baseline)
    const sample = [
        { title:'Mathematics Final Exam', category:'academic', date:'2024-12-15', start:'09:00', end:'12:00', location:'Main Hall', desc:'Final examination for Grade 10 Mathematics covering all topics from the semester.', audience:'Grade 10' },
        { title:'Football Championship', category:'sports', date:'2024-12-18', start:'14:00', end:'17:00', location:'School Ground', desc:'Annual inter-school football championship featuring teams from 8 different schools.', audience:'All' },
        { title:'Cultural Festival', category:'cultural', date:'2024-12-20', start:'10:00', end:'16:00', location:'Assembly Hall', desc:'Annual cultural festival showcasing traditional music, dance, and art from different regions.', audience:'All' },
        { title:'Parent-Teacher Meeting', category:'meeting', date:'2024-12-22', start:'08:00', end:'17:00', location:'Conference Room', desc:'Scheduled parent-teacher meetings to discuss student progress.', audience:'Parents' }
    ];

    // Merge stored events
    let stored=[]; try{ stored=JSON.parse(localStorage.getItem('events')||'[]'); }catch(e){ stored=[]; }
    let events=[...stored, ...sample];

    const eventsList=document.getElementById('eventsList');
    const filterCategory=document.getElementById('filterCategory');
    const filterTime=document.getElementById('filterTime');

    function computeStatus(ev){
        const today=new Date(); today.setSeconds(0,0);
        const evDate = ev.date ? new Date(ev.date + 'T00:00:00') : null;
        if (!evDate) return { label:'Upcoming', class:'upcoming' };
        const startTime = ev.start ? ev.start : '00:00';
        const endTime = ev.end ? ev.end : '23:59';
        const start = new Date(evDate); const end = new Date(evDate);
        start.setHours(parseInt(startTime.split(':')[0]||'0',10), parseInt(startTime.split(':')[1]||'0',10), 0, 0);
        end.setHours(parseInt(endTime.split(':')[0]||'23',10), parseInt(endTime.split(':')[1]||'59',10), 59, 999);
        if (today < start) return { label:'Upcoming', class:'upcoming' };
        if (today > end) return { label:'Completed', class:'completed' };
        return { label:'Active', class:'this-month' };
    }

    function eventCard(ev){
        const status=computeStatus(ev);
        const div=document.createElement('div');
        div.className = `event-card ${escapeHtml(ev.category||'')}`;
        div.innerHTML = `
            <div class=\"event-icon\"><i class=\"${iconFor(ev.category)}\"></i></div>
            <div class=\"event-content\">
                <div class=\"event-title\">${escapeHtml(ev.title)}</div>
                <div class=\"event-meta\">
                    <span class=\"event-date\"><i class=\"fas fa-calendar\"></i> ${escapeHtml(fmtDate(ev.date))}</span>
                    <span class=\"event-time\"><i class=\"fas fa-clock\"></i> ${escapeHtml(timeRange(ev.start, ev.end))}</span>
                    <span class=\"event-location\"><i class=\"fas fa-map-marker-alt\"></i> ${escapeHtml(ev.location||'')}</span>
                    <span class=\"status-badge ${escapeHtml(status.class)}\" style=\"margin-left:8px;\">${escapeHtml(status.label)}</span>
                </div>
                <div class=\"event-description\">${escapeHtml(ev.desc||'')}</div>
                <div class=\"event-tags\">
                    <span class=\"tag ${escapeHtml(ev.category||'')}\">${capitalize(ev.category||'')}</span>
                    <span class=\"tag audience\">${escapeHtml(ev.audience||'')}</span>
                </div>
            </div>
            <div class=\"event-actions\">
                <button class=\"event-action-btn delete\" title=\"Delete\"><i class=\"fas fa-trash\"></i></button>
            </div>`;
        div.querySelector('.event-action-btn.delete').addEventListener('click', function(e){
            e.stopPropagation();
            div.remove();
            const idx = stored.findIndex(s => matchesStored(s, ev));
            if (idx>-1){ stored.splice(idx,1); localStorage.setItem('events', JSON.stringify(stored)); }
        });
        return div;
    }

    function iconFor(cat){
        switch(cat){
            case 'academic': return 'fas fa-graduation-cap';
            case 'sports': return 'fas fa-futbol';
            case 'cultural': return 'fas fa-music';
            case 'meeting': return 'fas fa-users';
            default: return 'fas fa-calendar-alt';
        }
    }
    function capitalize(s){ return s ? s.charAt(0).toUpperCase()+s.slice(1) : s; }
    function matchesStored(a,b){ return a.title===b.title && a.date===b.date && a.start===b.start && a.location===b.location; }

    function passesTimeFilter(ev){
        const v=filterTime.value;
        const today=new Date(); today.setHours(0,0,0,0);
        const ed = ev.date ? new Date(ev.date) : null;
        if (!ed) return v==='all-time';
        const diffDays = Math.floor((ed - today)/(1000*60*60*24));
        if (v==='today') return diffDays===0;
        if (v==='this-week') return diffDays>=0 && diffDays<7;
        if (v==='this-month') return ed.getMonth()===today.getMonth() && ed.getFullYear()===today.getFullYear();
        if (v==='upcoming') return ed>=today;
        return true;
    }

    function render(){
        eventsList.innerHTML='';
        events.forEach(ev => {
            if (filterCategory.value!=='all' && ev.category!==filterCategory.value) return;
            if (!passesTimeFilter(ev)) return;
            eventsList.appendChild(eventCard(ev));
        });
        renderCalendar();
    }

    function renderCalendar(){
        const calendarDaysEl=document.getElementById('calendarDays');
        if(!calendarDaysEl) return;
        calendarDaysEl.innerHTML='';
        const date=new Date();
        date.setDate(1);
        const month=date.getMonth();
        const year=date.getFullYear();
        const startDay=(new Date(year, month, 1)).getDay();
        const daysInMonth=new Date(year, month+1, 0).getDate();
        const headers=['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
        headers.forEach(h=>{ const d=document.createElement('div'); d.className='day-header'; d.textContent=h; calendarDaysEl.appendChild(d);});
        for(let i=0;i<startDay;i++){ const e=document.createElement('div'); e.className='calendar-day empty'; calendarDaysEl.appendChild(e);} 
        for(let d=1; d<=daysInMonth; d++){
            const ed=new Date(year, month, d);
            const cell=document.createElement('div');
            cell.className='calendar-day';
            const has=events.filter(ev=> ev.date && (new Date(ev.date)).toDateString()===ed.toDateString());
            if(has.length>0){ cell.classList.add('has-event'); }
            const num=document.createElement('span'); num.className='day-number'; num.textContent=String(d); cell.appendChild(num);
            if(has.length>0){
                const wrap=document.createElement('div'); wrap.className='day-events';
                has.forEach(ev=>{ const dot=document.createElement('div'); dot.className='day-event'; dot.dataset.title=ev.title; wrap.appendChild(dot); });
                cell.appendChild(wrap);
            }
            calendarDaysEl.appendChild(cell);
        }
    }

    document.querySelector('.clear-filters-btn').addEventListener('click', function(){
        filterCategory.value='all'; filterTime.value='all-time'; render();
    });
    filterCategory.addEventListener('change', render);
    filterTime.addEventListener('change', render);

    render();
})();
</script>

<?php
$content = ob_get_clean();

include __DIR__ . '/../components/admin-layout.php';
?>