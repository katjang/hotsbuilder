@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('build.create', ['hero' => $hero])}}" class="btn btn-success">Create new</a>
        </div>
        <div>
            @foreach($hero->builds as $build)
                <div class="d-flex">
                    <div>
                        <img src="{{$hero->image}}" alt="{{$hero->name}}">
                    </div>
                    <div>
                        @for($i = 0; $i<7; $i++)

                            <img src="{{$build->{"talent_".$i}->image}}">
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
