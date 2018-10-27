@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.user._detail', compact($user))
            <h3>Most recently updated builds:</h3>
            @include('partials.build._list', ['builds' => $builds])
        </div>
    </div>
@endsection
