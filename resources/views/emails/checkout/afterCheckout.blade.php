<x-mail::message>
# Register camp : {{ $checkout->camp->title }}

Hi, {{ $checkout->user->name }}
<br>
Thank you for register on <b>{{ $checkout->camp->title }}</b>, please see payment instruction by click the button below.

<x-mail::button :url="route('user.dashboard')">
My Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
