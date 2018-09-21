@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @foreach($user->builds as $build)
                <div class="d-flex">
                    <div>
                        <img src="{{$build->hero->image}}" alt="{{$build->hero->name}}">
                    </div>
                    <div>
                        @foreach($build->talents as $talent)
                            <img src="{{$talent->image}}" alt="{{$talent->name}}">
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
