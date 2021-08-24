@component('mail::message')
# Hello {{$user->name}}

Your account has been created!

Your credentials
<br>  
Email: {{ $user->email }}
<br>
Password: {{ $user->pwd }}

@component('mail::button', ['url' => $user->url])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent