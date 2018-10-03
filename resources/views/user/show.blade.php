@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.user._detail', compact($user))
            @include('partials.build._list', ['builds' => $user->builds])
        </div>
    </div>
@endsection
