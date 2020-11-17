@extends('layouts.share')

@section('content')

    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Twitter Clone</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-primary btn-lg']) !!}
        </div>
    </div>

@endsection