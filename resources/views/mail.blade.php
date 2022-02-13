@component('mail::message')
    <h1>Hello {{ config('app.name') }},</h1>

    <p>
        {{ $data['message'] }} <br>


        Cordialment,<br>
        {{ $data['name'] }} <br>
        {{ $data['email'] }}
    </p>


@endcomponent
