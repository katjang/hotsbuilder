@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            @foreach($hero->abilities as $ability)
                <div class="ability">
                    <h3>{{$ability->name}}</h3>
                </div>
            @endforeach
        </div>
        <form action="{{route('build.store')}}" method="POST">
            <input type="hidden" name="hero_id" value="{{$hero->id}}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" name="description" class="form-control"></textarea>
            </div>
            <div class="d-flex flex-wrap">
                @foreach($hero->talents as $level => $talents)
                    <div class="col-6">
                        <div>
                            <h3>Talent at level {{$level}}:</h3>
                        </div>
                        <div class="d-flex">
                            @foreach($talents as $talent)
                                <div class="talent" data-id="{{$talent->id}}">
                                    <img src="{{$talent->image}}" alt="{{$talent->name}}">
                                    <div class="tooltip-description">
                                        <p>
                                            {{$talent->description}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <input type="hidden" name="talent_{{$loop->iteration}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="note_{{$loop->iteration}}">Note</label>
                            <textarea type="text" name="note_{{$loop->iteration}}" class="form-control"></textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/createBuild.js')}}"></script>
@endsection