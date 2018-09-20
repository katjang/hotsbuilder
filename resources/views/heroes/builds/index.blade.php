@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($user->builds as $build)

        @endforeach
    </div>
@endsection
