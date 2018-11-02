@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.user._detail', $user)
            <h3>Most popular builds:</h3>
            @include('partials.build._list', $builds)
        </div>
    </div>
@endsection
