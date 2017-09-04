@component('mail::message')
Hello, <b>{{$receiverName}}</b>!

Welcome to {{ config('app.name') }}!

@component('mail::button', ['url' => $confirmUrl])
Continue Registration
@endcomponent

@endcomponent