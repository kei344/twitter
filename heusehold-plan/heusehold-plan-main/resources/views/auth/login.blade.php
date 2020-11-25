@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route'=> 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス',) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード',) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-lg btn-block mb-4 mt-4']) !!}
            {!! Form::close() !!}

            <p class="mt-2">新規作成は {!! link_to_route('signup.get', 'こちらから') !!}</p>
        </div>
    </div>
@endsection