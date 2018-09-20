@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex">
            @foreach($hero->abilities as $ability)
                <div class="ability">
                    <h3>{{$ability->name}}</h3>
                </div>
            @endforeach
        </div>
        <form action="{{route('build.store')}}" method="POST">
            @csrf


            <div>
                @foreach($hero->talents as $level => $talents)
                    <div>
                        <h3>Talent at level {{$level}}:</h3>
                    </div>
                    <div>
                        @foreach($talents as $talent)
                            <img src="{{$talent->image}}" alt="{{$talent->name}}">
                        @endforeach
                    </div>

                @endforeach
            </div>

        </form>
    </div>
@endsection