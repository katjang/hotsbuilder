@foreach($builds as $build)
    <div class="build-list">
        <div class="d-flex align-items-center">
            <div>
                <img src="{{$build->hero->image}}" alt="{{$build->hero->name}}">
            </div>
            <div>
                <div class="d-flex">
                    @foreach($build->talents as $talent)
                        @include('partials/_talent', compact('talent'))
                    @endforeach
                </div>
            </div>
            @auth
            <div>
                <form action="{{route('favorite.store', ['build' => $build])}}" method="POST">
                    <input class="btn btn-success" type="submit" value="Add to favorites">
                </form>
            </div>
            @endauth
        </div>
    </div>
@endforeach