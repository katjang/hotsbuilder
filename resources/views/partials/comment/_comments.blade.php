<div>
    @foreach($comments as $comment)
        <div>
            {{$comment->body}}
        </div>
    @endforeach

</div>
<div>
    {{Form::open(['route' => 'comment.store'])}}
        {{Form::textarea('body')}}
        {{Form::submit('Comment', ['class' => 'btn btn-success'])}}
    {{Form::close()}}
</div>