@extends('layouts.app')

@section('content')

<div class="links">
    <p>
        User <b>{{$name}}</b> have just send a feedback to sales email from
        <b>{{$email}}</b> address
    </p>
</div>

@endsection
