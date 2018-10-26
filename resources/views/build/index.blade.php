@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.filter._default')
        @include('partials.build._list', ['builds' => $builds])
    </div>
@endsection
