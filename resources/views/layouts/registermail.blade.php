@component('mail::message')
    Klik link verifikasi dibawah ini untuk melakukan aktivasi email pada web literasiku.

    {{ env('APP_URL') . '/verify?code=' . base64_encode($code) }}
@endcomponent
