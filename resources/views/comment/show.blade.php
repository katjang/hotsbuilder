@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.comment._layer', $comments)
    </div>
@endsection
