@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.hero._detail', compact('hero'))
        </div>
        <div class="d-flex justify-content-between push-ends">
            <a href="{{route('build.create', compact('hero'))}}" class="btn btn-success">Create new build</a>
            <a href="{{route('builds', ['hero' => $hero->id])}}" class="btn btn-success">See all builds</a>
        </div>
        <div>
            <h3>Popular builds:</h3>
            <div>
                @include('partials.build._list', ['builds' => $builds])
            </div>
        </div>
    </div>
@endsection
