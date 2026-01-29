@component('mail::message')
# Informasi Penting

{!! nl2br(e($content)) !!}

@component('mail::button', ['url' => route('dashboard')])
Cek Dashboard
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
