@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.filter._default')
        <div class="builds">
            @include('partials.build._list', ['builds' => $builds])
            @include('partials.pagination._default', ['links' => $builds->links()])
        </div>
    </div>
@endsection
