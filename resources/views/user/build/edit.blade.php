@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.hero._detail', compact('hero'))
        @include('partials.build._edit', compact('build'))
    </div>

@endsection