<div>
    @foreach($comments as $comment)
        <div>
            {{$comment->body}}
        </div>
    @endforeach

</div>
<div>
    {{Form::open(['route' => ['comment.store', $build]])}}
    <div class="form-group">
        {{Form::textarea('body', null, ['class' => ('form-control '. ($errors->has('body')?'is-invalid' : ''))])}}
    </div>
    <div class="form-group text-right">
        {{Form::submit('Comment', ['class' => 'btn btn-success'])}}
    </div>
    {{Form::close()}}
</div>