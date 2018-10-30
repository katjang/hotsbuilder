@foreach($builds as $build)
    <div class="build-list">
        <div class="d-flex justify-content-between col-12">
            <strong>By: <a href="{{route('user.show', $build->user)}}">{{$build->user->name}}</a></strong>
            <div class="rating d-flex">
                <?php $rating = 4.78; ?>

                @for($i = 1; $i < 6; $i++)
                    <div class="rating-star-container d-flex position-relative">
                        <img src="{{asset('img/star_empty.png')}}" alt="star">
                        @if($i < $rating)
                            <img src="{{asset('img/star.png')}}" alt="star" class="position-absolute">
                        @elseif($i == ceil($rating))
                            <img src="{{asset('img/star.png')}}" alt="star" class="position-absolute" style="clip-path: polygon(0 0, {{($rating-floor($rating))*100}}% 0, {{($rating-floor($rating))*100}}% 100%, 0 100%);">
                        @endif
                    </div>
                @endfor
            </div>
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