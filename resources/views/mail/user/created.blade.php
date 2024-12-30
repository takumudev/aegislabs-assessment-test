<x-mail::message>
# Welcome!

Dear {{ $user->name }},

Thank you for creating an account.

We're excited to have you on board! For your reference, your username is **{{ $user->email }}**.
Please remember it to login when you want to place an order.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
