@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._heroDetail', compact('hero'))
        <form action="{{route('user.build.store')}}" method="POST">
            @csrf
            <input type="hidden" name="hero_id" value="{{$hero->id}}">
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
                            <h3>Level {{$level}}:</h3>
                        </div>
                        <div class="form-group d-flex flex-column">
                            @foreach($talents as $talent)
                                <div class="talent" data-id="{{$talent->id}}">
                                    <div class="content">
                                        <div class="d-flex">
                                            <h4><img class="d-inline-block" src="{{$talent->image}}" alt="{{$talent->name}}"> {{$talent->name}} {{$talent->sort}}</h4>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                {{$talent->description}}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            <input type="hidden" name="talent_{{$loop->iteration}}" class="form-control {{$errors->has('talent_'.$loop->iteration)?'is-invalid' : ''}}">

                            <div class="invalid-feedback">{{ $errors->first('talent_'.$loop->iteration) }}</div>
                        </div>
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