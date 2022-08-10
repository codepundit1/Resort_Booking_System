@component('mail::message')
# Introduction

A new booking has been received for resort

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
