@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials._buildList', ['builds' => $builds])
        </div>
    </div>
@endsection
