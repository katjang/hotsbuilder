@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.filter._default')
        <div class="d-flex flex-wrap justify-content-around">
            @foreach($heroes as $hero)
                <div class="hero">
                    <div class="content">
                        <a href="{{route('hero.show', ['hero' => $hero->id])}}">
                            <img src="{{$hero->image}}" alt="{{$hero->name}}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
