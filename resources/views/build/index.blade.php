@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.filter._default')
        @include('partials.build._list', ['builds' => $builds])
        @include('partials.pagination._default', ['links' => $builds->links()])
    </div>
@endsection
