@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.hero._detail', $hero)
        </div>
        <div class="d-flex justify-content-between push-ends">
            @auth
            @can('create', 'App\Build')
            <a href="{{route('build.create', $hero)}}" class="btn btn-success">Create new build</a>
                @else
                <button class="btn btn-info disabled">
                    Rate 5 builds to create your own!
                </button>
            @endcan
            @endauth
            <a href="{{route('builds', ['hero' => $hero->id])}}" class="btn btn-success">All {{$hero->name}} builds</a>
        </div>
        <div class="white-text builds">
            <h3>Popular builds:</h3>
            <div>
                @include('partials.build._list', ['builds' => $builds])
            </div>
        </div>
    </div>
@endsection
