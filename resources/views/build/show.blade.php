@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.hero._detail', $hero)
        <div class="build">
            <div class="d-flex push-top">
                <div class="flex-fill">
                    <h2>{{$build->title}}</h2>
                    <p>{{$build->description}}</p>
                </div>
                <div class="d-flex">
                    @auth
                    <div>
                        <div class="push-right">
                            <span>{{$build->rating_count}} votes</span>
                        </div>
                        @include('partials.rating._default', ['rating' => $build->avg_rating, 'extraClass' => ''])
                    </div>
                    <div class="d-flex align-items-center">
                        @if($build->is_favorite)
                            {{Form::open(['route' => ['user.favorite.delete', $build], 'method' => 'DELETE'])}}
                            <button type="submit" class="fab-button-mini favorite"><i class="material-icons">favorite</i></button>
                            {{Form::close()}}
                        @else
                            {{Form::open(['route' => ['user.favorite.store', $build]])}}
                            <button type="submit" class="fab-button-mini favorite"><i class="material-icons">favorite_border</i></button>
                            {{Form::close()}}
                        @endif
                        @can('update', $build)
                            <a href="{{route('build.edit', $build)}}" class="fab-button-mini edit"><i class="material-icons">edit</i></a>
                        @endcan
                        @can('delete', $build)
                            {{Form::open(['route' => ['user.build.delete', Auth::user(), $build]])}}
                            <button type="submit" class="fab-button-mini delete"><i class="material-icons">delete</i></button>
                            {{Form::close()}}
                        @endcan
                    </div>
                    @endauth
                </div>
            </div>
            <div class="d-flex flex-wrap">
                @foreach($hero->talents as $level => $talents)
                    <div class="col-12 col-lg-6">
                        <div>
                            <h3>Level {{$level}}:</h3>
                        </div>
                        <div class="form-group d-flex flex-column">
                            @foreach($talents as $talent)
                                <div class="talent static {{in_array($talent->id, $build->talents[$level]->pluck('id')->toArray())? 'selected' : ''}}" data-id="{{$talent->id}}">
                                    <div class="content">
                                        <div class="d-flex">
                                            <h4><img class="d-inline-block" src="{{$talent->image}}" alt="{{$talent->name}}"> {{$talent->name}}</h4>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                {{$talent->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            @if(count($build->maps))
                <div class="col-12">
                    <h2>Good maps for this build</h2>
                    <div class="d-flex flex-wrap">
                        @foreach($build->maps as $map)
                            @include('partials.map._compact', $map)
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        @auth
        @can('create', 'App\Rating')
        <div class="col-12 push-top">
            {{Form::open(['route' => ['build.rating.store', $build]])}}
                <h2>Rate this build!</h2>
                {{Form::hidden('rating', null)}}
                @include('partials.rating._default', ['rating' => 0, 'extraClass' => 'rating-store'])
            {{Form::close()}}
        </div>
        @endcan
        @endauth
        @include('partials.comment._comments', ['comments' => $build->comments])
    </div>
@endsection