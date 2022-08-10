@component('mail::message')
# Introduction

Your Booked your resort successfully!! {{ $booking->resort->date }}, from{{ $booking->checkin }} to {{ $booking->checkout }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
