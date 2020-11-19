@extends('layouts.share')

@section('content')

    @include('users.users', ['users' => $users])

@endsection