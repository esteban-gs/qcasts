@component('mail::message')

# Thank you for your mesage

<strong>Name</strong> {{ $data['name'] }} <br>
<strong>Email</strong> {{ $data['email'] }}

<strong>Message</strong>

{{ $data['message'] }}
@endcomponent
