@extends('layouts.app')

@section('content')
    @include('partials.filter._default')
    <div class="d-flex flex-wrap justify-content-between">
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
@endsection
