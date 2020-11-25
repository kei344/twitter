<ul class="list-unstyled">
    @foreach ($twitters as $twitter)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($twitter->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $twitter->user->name, ['id' => $twitter->user->id]) !!} <span class="text-muted">posted at {{ $twitter->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($twitter->content)) !!}</p>
                </div>
                <div class="d-flex">
                    @include('user_favorite.favorite_button', ['twitter' => $twitter])
                    @if (Auth::id() == $twitter->user_id)
                        {!! Form::open(['route' => ['twitters.destroy', $twitter->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $twitters->links('pagination::bootstrap-4') }}