@extends('layouts.share')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @include('twitters.twitters', ['twitters' => $twitters])
        </div>
    </div>

@endsection