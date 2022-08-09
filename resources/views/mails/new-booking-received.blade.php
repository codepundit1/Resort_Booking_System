@component('mail::message')
# Introduction

A new booking has been received for resort

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


{{-- @component('mail::message')
# Introduction

A new booking has been received for resort {{ $booking->resort->date }}, from{{ $booking->checkin }} to {{ $booking->checkout }}

@component('mail::button', ['url' => '{{ route('resort.view') }}'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
