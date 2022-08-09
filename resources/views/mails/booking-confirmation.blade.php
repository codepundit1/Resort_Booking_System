@component('mail::message')
# Introduction

Your Booked your resort successfully!!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
