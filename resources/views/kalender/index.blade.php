@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kalender Jadwal</h1>
    <div id="calendar"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: {
            url: '{{ route("kalender.events", ["role" => $role, "user_id" => $userId]) }}',
            method: 'GET'
        },
        eventClick: function(info) {
            alert('Event: ' + info.event.title + '\nDescription: ' + info.event.extendedProps.description + '\nLocation: ' + info.event.extendedProps.location + '\nStatus: ' + info.event.extendedProps.status);
        },
        eventDidMount: function(info) {
            // Reminder: Check for events 1 day before
            var eventDate = new Date(info.event.start);
            var today = new Date();
            var diffTime = eventDate - today;
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            if (diffDays === 1) {
                alert('Reminder: ' + info.event.title + ' besok!');
            }
        }
    });
    calendar.render();
});
</script>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
@endsection
