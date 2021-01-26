@component('mail::message')
<p>Hi, This is {{ $data['fname']}}</p>

<p>{{ $data['message']}}</p>

Thanks,<br>
<h5>{{ $data['fname']}} {{ $data['lname'] ?? ''}}</h5>
<h5>Email:{{ $data['email']}}</h5>
<h5>Phone:{{ $data['phone']}}</h5>
{{ config('app.name') }}
@endcomponent
