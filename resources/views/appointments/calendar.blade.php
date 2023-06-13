<x-layout>
    @include ('appointments._header')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

    <main style="min-height: 35rem;" class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6" >
        <div id='calendar'></div>
    </main>

    @push('scripts')
        <script src='fullcalendar/core/locales/es.global.js'></script>
        <script src='fullcalendar/dist/index.global.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    customButtons: {
                        myCustomButton: {
                            text: 'hoy',
                            click: function() {
                                calendar.today();
                            }
                        }
                    },
                    headerToolbar: {
                        right: 'myCustomButton prev,next'
                    },
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    today: 'hoy',
                    hiddenDays: [0],
                    events: @json($events),
                    eventClick: function(info) {
                        location.href = "/appointments/" + info.event.id + "/edit";
                    }
                });
                calendar.render();
            });
        </script>
    @endpush

</x-layout>
