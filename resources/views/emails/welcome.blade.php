@component('mail::message')
# Halo, {{ $user->name }}!

Selamat datang di Membership App. Terima kasih telah bergabung dengan komunitas kami.

Anda telah terdaftar sebagai member **Tipe {{ $user->membership_type }}**.

@component('mail::button', ['url' => route('dashboard')])
Akses Dashboard
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
