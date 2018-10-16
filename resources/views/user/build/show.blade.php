@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.hero._detail', compact('hero'))
        <h2>{{$build->title}}</h2>
        <p>{{$build->description}}</p>
        <div class="d-flex flex-wrap">
            @foreach($hero->talents as $level => $talents)
                <div class="col-12 col-lg-6">
                    <div>
                        <h3>Level {{$level}}:</h3>
                    </div>
                    <div class="form-group d-flex flex-column">
                        @foreach($talents as $talent)
                            <div class="talent static {{in_array($talent->id, $build->talents[$level]->pluck('id')->toArray())? 'selected' : ''}}" data-id="{{$talent->id}}">
                                <div class="content">
                                    <div class="d-flex">
                                        <h4><img class="d-inline-block" src="{{$talent->image}}" alt="{{$talent->name}}"> {{$talent->name}}</h4>
                                    </div>
                                    <div class="col-12">
                                        <p>
                                            {{$talent->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        @include('partials.comment._comments', ['comments' => $build->comments])
    </div>
@endsection