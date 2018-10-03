@foreach($builds as $build)
    <div class="build-list">
        <div class="d-flex justify-content-between col-12">
            <strong>By: <a href="{{route('user.show', $build->user)}}">{{$build->user->name}}</a></strong>
            <div class="d-flex">

                <small>last updated: {{$build->updated_at->format('d/m/y')}}</small>
            </div>
        </div>
        <div class="content">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <img src="{{$build->hero->image}}" alt="{{$build->hero->name}}">
                </div>
                <div class="flex-fill">
                    <div class="col-12">
                        <strong>{{$build->title}}</strong>
                    </div>
                    <div class="d-flex">
                        @foreach($build->talents as $talent)
                            @include('partials.talent._compact', compact('talent'))
                        @endforeach
                    </div>
                </div>
                @auth
                    <div>
                        @if(isset($build->favorite) && !$build->favorite)
                            {{Form::open(['route' => ['user.favorite.store', $build]])}}
                                <button type="submit" class="icon-button favorite"><i class="material-icons">favorite_border</i></button>
                            {{Form::close()}}
                        @else
                            {{Form::open(['route' => ['user.favorite.delete', $build], 'method' => 'DELETE'])}}
                                <button type="submit" class="icon-button favorite"><i class="material-icons">favorite</i></button>
                            {{Form::close()}}
                        @endif
                        @if($build->user->id == Auth::id())
                            <a href="{{route('build.edit', compact('build'))}}" class="icon-button edit"><i class="material-icons">edit</i></a>
                            {{Form::open(['route' => ['user.build.delete', $build], 'method' => 'DELETE'])}}
                            <button type="submit" class="icon-button delete"><i class="material-icons">delete</i></button>
                            {{Form::close()}}
                        @endif
                    </div>
                @endauth
            </div>
        </div>

    </div>
@endforeach