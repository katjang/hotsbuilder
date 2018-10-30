@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($maps as $map)
            <div class="map">
                <div class="content">
                    <a href="{{route('builds', ['map' => $map->id])}}">
                        <img src="{{$map->image}}" alt="{{$map->name}}">
                        <div class="d-flex justify-content-center align-items-center">
                            <h2>{{$map->name}}</h2>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
