@component('mail::message')
    <h1>Hello {{ config('app.name') }},</h1>

    {{ $data['message'] }}

    Cordialment,<br>
    {{ $data['name'] }}
    {{ $data['email'] }}
@endcomponent
