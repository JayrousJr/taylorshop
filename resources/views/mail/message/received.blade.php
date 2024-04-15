<x-mail::message>
# Message from {{$name}}.

<x-mail::panel>
    <strong>Subject</strong><br>{{$subject}}
</x-mail::panel>

<x-mail::panel>
    <strong>Message body</strong><br>{{$msg}}
</x-mail::panel>
This message is sent from email: {{$email}}<br>
Phone Number: {{$phone}} <br>
From Sender Name: {{$name}}
<x-mail::button :url="'https://tnafricanstore.com'" color='success'>
Visit Our Website
</x-mail::button>

Nimenya Francine, Manager<br>
{{ config('app.name') }}
</x-mail::message>
