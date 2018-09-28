@foreach($builds as $build)
    <div class="build-list">
        @isset($build->user)
        <div class="d-flex justify-content-between col-12">
            <strong>By: {{$build->user->name}}</strong>
            <div class="d-flex">
                <small>last updated: {{$build->updated_at->format('d/m/y')}}</small>
            </div>

        </div>
        @endisset
        <div class="content">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <img src="{{$build->hero->image}}" alt="{{$build->hero->name}}">
                </div>
                <div class="flex-fill">
                    <div class="d-flex">
                        @foreach($build->talents as $talent)
                            @include('partials/_talentCompact', compact('talent'))
                        @endforeach
                    </div>
                </div>
                <div>
                    @if(isset($build->favorite) && !$build->favorite)
                        <form action="{{route('user.favorite.store', ['build' => $build])}}" method="POST">
                            @csrf
                            <button type="submit" class="button-icon-small favorite"><i class="material-icons">favorite_border</i></button>
                        </form>
                    @else
                        <form action="{{route('user.favorite.delete', ['build' => $build])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="button-icon-small favorite"><i class="material-icons">favorite</i></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endforeach