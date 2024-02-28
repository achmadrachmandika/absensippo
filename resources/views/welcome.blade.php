@component('mail::message')
# Welcome to Our Application

Hello {{ $user->name }},

Thank you for registering with us. Your account has been successfully created.

Best regards,<br>
The Application Team
@endcomponent