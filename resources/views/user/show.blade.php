@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="white-text">
            @include('partials.user._detail', $user)
            <div class="builds">
                <h3>Most popular builds:</h3>
                @include('partials.build._list', $builds)
            </div>

        </div>
    </div>
@endsection
