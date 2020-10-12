@component('mail::message')
<p>
    Hi {{$event->report->profile->first_name}},
    check out the attached report.
</p>

All the best,<br>
{{ config('app.name') }}
@endcomponent
