@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials._heroDetail', compact('hero'))
        </div>
        <div>
            <a href="{{route('build.create', compact('hero'))}}" class="btn btn-success">Create new build</a>
        </div>
        <div>
            @include('partials._buildList', ['builds' => $builds])
        </div>
    </div>
@endsection
