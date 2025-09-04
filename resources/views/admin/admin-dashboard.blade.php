@extends('admin-layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Booking Calendar</h5>
        <div id="calendar"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css" rel="stylesheet">

  <style>
    #calendar {
      max-width: 400px;   /* lebih kecil lagi */
      margin: 0 auto;
      font-size: 0.75rem; /* teks kecil */
    }
    .fc-toolbar-title {
      font-size: 1rem; 
    }
    .fc-daygrid-day-number {
      font-size: 0.7rem; 
    }

    /* styling event */
    .fc-event {
      font-size: 0.7rem;
      padding: 2px 4px;
      border-radius: 6px;
      background-color: #198754; /* hijau bootstrap */
      color: white;
      border: none;
    }
    .fc-event:hover {
      opacity: 0.8;
    }
  </style>
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 450, // kecil
        events: @json($events),
        eventClick: function(info) {
          info.jsEvent.preventDefault();
          if (info.event.url) {
            window.location.href = info.event.url;
          }
        }
      });
      calendar.render();
    });
  </script>
@endpush
