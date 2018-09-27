@foreach($builds as $build)
    <div class="build-list">
        @isset($build->user)
        <div class="d-flex justify-content-between col-12">
            <span>By: {{$build->user->name}}</span>
            <small>last updated: {{$build->updated_at->format('d/m/y')}}</small>
        </div>
        @endisset
        <div class="content">
            <div class="d-flex align-items-center">
                <div>
                    <img src="{{$build->hero->image}}" alt="{{$build->hero->name}}">
                </div>
                <div>
                    <div class="d-flex">
                        @foreach($build->talents as $talent)
                            @include('partials/_talentCompact', compact('talent'))
                        @endforeach
                    </div>
                </div>
                @auth
                <div>
                    <form action="{{route('user.favorite.store', ['build' => $build])}}" method="POST">
                        @csrf
                        <input class="btn btn-success" type="submit" value="Add to favorites">
                    </form>
                </div>
                @endauth
            </div>
        </div>

    </div>
@endforeach