@component('mail::message')
User, {{$senderName}} have just send you a feedback:
<p>{{$feedback}}</p>

@endcomponent