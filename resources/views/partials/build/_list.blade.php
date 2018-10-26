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
                <a href="{{route('build.show', ['build' => $build])}}" class="flex-fill">
                    <div class="col-12">
                        <strong>{{$build->title}}</strong>
                    </div>
                    <div class="d-flex">
                        @foreach($build->talents as $talent)
                            @include('partials.talent._compact', compact('talent'))
                        @endforeach
                    </div>
                </a>
                @auth
                    <div>
                        @if($build->is_favorite)
                            {{Form::open(['route' => ['user.favorite.delete', $build], 'method' => 'DELETE'])}}
                            <button type="submit" class="icon-button-mini favorite"><i class="material-icons">favorite</i></button>
                            {{Form::close()}}
                        @else
                            {{Form::open(['route' => ['user.favorite.store', $build]])}}
                            <button type="submit" class="icon-button-mini favorite"><i class="material-icons">favorite_border</i></button>
                            {{Form::close()}}
                        @endif
                        @can('update', $build)
                            <a href="{{route('build.edit', compact('build'))}}" class="icon-button-mini edit"><i class="material-icons">edit</i></a>
                        @endcan
                        @can('delete', $build)
                            {{Form::open(['route' => ['user.build.delete', $build], 'method' => 'DELETE'])}}
                            <button type="submit" class="icon-button-mini delete"><i class="material-icons">delete</i></button>
                            {{Form::close()}}
                        @endcan
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endforeach