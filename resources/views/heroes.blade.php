@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($heroes as $hero)
            <div class="hero">
                <a href="{{route('hero.builds', ['hero' => $hero->id])}}">
                    <img src="{{$hero->image}}" alt="{{$hero->name}}">
                </a>
            </div>
        @endforeach
    </div>
@endsection
