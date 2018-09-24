@foreach($builds as $build)
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
    </div>
@endforeach