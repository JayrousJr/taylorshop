<x-mail::message>
# Your Message to Francine's Shop is sent 

<x-mail::panel>
Hello, Dear {{$name}}, I have received your email successiful. <br>
I am happy to receive your message and i promise you to work on this message and resolve whatever issue you have attached to with this message.
</x-mail::panel>

<x-mail::button :url="'https://tnafricanstore.com'" color='success'>
Visit Our Website
</x-mail::button>

Thanks,<br>
Nimenya Francine, Manager <br>
{{ config('app.name') }}
</x-mail::message>
