@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @include('partials.build._list', ['builds' => $builds])
        </div>
    </div>
@endsection
