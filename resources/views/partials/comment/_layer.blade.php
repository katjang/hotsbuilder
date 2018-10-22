@foreach($comments as $comment)
    <div class="comment">
        <div class="d-flex justify-content-between col-12">
            <strong>By: <a href="{{route('user.show', $comment->user)}}">{{$comment->user->name}}</a></strong>
            <div class="d-flex">
                <small>{{$comment->updated_at->format('d/m/y H:i')}}</small>
            </div>
        </div>
        <div class="content">
            <div class="col-12 d-flex">
                <div class="flex-fill">
                    @if($comment->body == null)
                        <i>This comment has been deleted.</i>
                    @else
                        {{$comment->body}}
                    @endif
                </div>
                @if($comment->body != null)
                <div>
                    @if(Auth::id() == $comment->user->id)
                    {{Form::open(['route' => ['comment.remove', $comment], 'method' => 'PUT'])}}
                    <button type="submit" class="icon-button delete"><i class="material-icons">delete</i></button>
                    {{Form::close()}}
                    @endif
                    <button class="icon-button open-reply">
                        <i class="material-icons">reply</i>
                    </button>
                </div>
                @endif
            </div>
            <div class="replies">
                {{Form::open(['route' => ['reply.store', $comment], 'class' => 'd-none reply-form'])}}
                <div class="form-group">
                    {{Form::textarea('body', null, ['class' => ('form-control '. ($errors->has('body')?'is-invalid' : ''))])}}
                </div>
                <div class="form-group text-right">
                    {{Form::submit('Comment', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
                @if(!isset($commentLayer) || $commentLayer < 4)
                @include('partials.comment._layer', ['comments' => $comment->comments, 'commentLayer' => (!isset($commentLayer)? 1: $commentLayer+=1)])
                @elseif($comment->comments->count() > 0)
                    {{--I could safe this query by adding a "has_comment" column in the comment model--}}
                    <div class="col-12">
                        <a href="{{route('comment.show', $comment)}}">Continue this chain</a>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endforeach