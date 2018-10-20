@foreach($comments as $comment)
    <div class="comment">
        <div class="d-flex justify-content-between col-12">
            <strong>By: <a href="{{route('user.show', $comment->user)}}">{{$comment->user->name}}</a></strong>
            <div class="d-flex">
                <small>{{$comment->updated_at->format('d/m/y H:s')}}</small>
            </div>
        </div>
        <div class="content">
            <div class="col-12">
                {{$comment->body}}
            </div>
            <div class="replies">
                @include('partials.comment._layer', ['comments' => $comment->comments])
            </div>
        </div>
    </div>
@endforeach