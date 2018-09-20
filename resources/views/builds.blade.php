@extends('layouts.app')

@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($hero->builds as $build)

        @endforeach
    </div>
@endsection
