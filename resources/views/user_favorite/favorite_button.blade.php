@if (Auth::user()->is_favorite($twitter->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $twitter->id], 'method' => 'delete']) !!}
        {!! Form::submit('unfavorite', ['class' => 'btn btn-success mr-2']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $twitter->id]]) !!}
        {!! Form::submit('favorite', ['class' => 'btn btn-light mr-2']) !!}
    {!! Form::close() !!}
@endif