<ul class="media-list">
    @foreach ($individualtasks as $individualtask)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('users.show', $individualtask->user->name, ['id' => $individualtask->user->id]) !!} <span class="text-muted">posted at {{ $individualtask->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($individualtask->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $individualtask->user_id)
                        {!! Form::open(['route' => ['individualtasks.destroy', $individualtask->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $individualtasks->render('pagination::bootstrap-4') }}