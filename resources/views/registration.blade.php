@extends('layouts.app')

@section('content')

<div class="links">
    <p>
        User <b>{{$name}}</b> have just registered. Activation link has been send to
            <b>{{$email}}</b> address
    </p>
</div>

@endsection
