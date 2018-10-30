@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.hero._detail', compact('hero'))
        <div class="d-flex">
            <div class="flex-fill">
                <h2>{{$build->title}}</h2>
                <p>{{$build->description}}</p>
            </div>
            <div class="d-flex">
                @auth
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
                    {{Form::open(['route' => ['user.build.delete', $build]])}}
                    <button type="submit" class="fab-button-mini delete"><i class="material-icons">delete</i></button>
                    {{Form::close()}}
                @endcan
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

        @include('partials.comment._comments', ['comments' => $build->comments])
    </div>
@endsection