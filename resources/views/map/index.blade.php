@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($maps as $map)
            <div class="map">
                <img src="{{$map->image}}" alt="{{$map->name}}">
                <div class="d-flex justify-content-center align-items-center">
                    <strong>{{$map->name}}</strong>
                </div>
            </div>
        @endforeach
    </div>
@endsection
