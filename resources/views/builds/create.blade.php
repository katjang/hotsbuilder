@extends('layouts.app')

@section('content')
    <div>
        <form action="{{route('build.store')}}">
            @csrf
            <span>test text</span>
        </form>
    </div>
@endsection