@component('mail::message')
# Here is your Account Information

This is your email address:dsd
@component('mail::table')
| User Email    | Password    |
| :-------------:  |:-------------:|
|{{ users->name }}       | ff|


Thanks,<br>
{{ config('app.name') }}
@endcomponent
