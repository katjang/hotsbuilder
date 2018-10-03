@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.hero._detail', compact('hero'))
        </div>
        <div>
            <a href="{{route('build.create', compact('hero'))}}" class="btn btn-success">Create new build</a>
        </div>
        <div>
            @include('partials.build._list', ['builds' => $builds])
        </div>
    </div>
@endsection
