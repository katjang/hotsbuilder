@foreach($builds as $build)
    <div class="build-list">
        <div class="d-flex justify-content-between col-12">
            @include('partials.user._label', ['user' => $build->user])

            <div class="d-flex">
                <div class="push-right">
                    <span>{{$build->rating_count}} votes</span>
                </div>
                @include('partials.rating._default', ['rating' => $build->avg_rating, 'extraClass' => 'compact'])

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
                        <h5>{{$build->title}}</h5>
                    </div>
                    <div class="d-flex col-12 justify-content-between flex-wrap">
                        <div class="push-right">
                            <strong>Talents</strong>
                            <div class="d-flex flex-wrap">
                                @foreach($build->talents as $talent)
                                    @include('partials.talent._compact', $talent)
                                @endforeach
                            </div>

                        </div>
                        <div>
                            @if(count($build->maps))
                            <strong>Maps</strong>
                            <div class="d-flex flex-wrap">
                                @foreach($build->maps as $map)
                                    @include('partials.map._icon', $map)
                                @endforeach
                            </div>
                            @endif
                        </div>
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
                            <a href="{{route('build.edit', $build)}}" class="icon-button-mini edit"><i class="material-icons">edit</i></a>
                        @endcan
                        @can('delete', $build)
                            {{Form::open(['route' => ['user.build.delete', \Auth::user(), $build], 'method' => 'DELETE'])}}
                            <button type="submit" class="icon-button-mini delete"><i class="material-icons">delete</i></button>
                            {{Form::close()}}
                        @endcan
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endforeach