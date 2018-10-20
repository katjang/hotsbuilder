<div class="col-12">
    <h2>Comments</h2>
    <div class="comments">
        @include('partials.comment._layer', $comments)
    </div>
</div>
<div class="col-12">
    {{Form::open(['route' => ['comment.store', $build]])}}
    <div class="form-group">
        {{Form::textarea('body', null, ['class' => ('form-control '. ($errors->has('body')?'is-invalid' : ''))])}}
    </div>
    <div class="form-group text-right">
        {{Form::submit('Comment', ['class' => 'btn btn-success'])}}
    </div>
    {{Form::close()}}
</div>