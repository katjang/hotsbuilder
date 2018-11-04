@isset($build)
    {{Form::model($build, ['route' => ['user.build.update', $build], 'method' => 'PUT'])}}
@else
    {{Form::open(['url' => route('user.build.store', \Auth::user())])}}
@endisset
    <div class="build">
        {{Form::hidden('hero_id', $hero->id)}}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', null, ['class' => ('form-control '. ($errors->has('title')?'is-invalid' : ''))])}}
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', null, ['class' => ('form-control '. ($errors->has('description')?'is-invalid' : ''))])}}
            <div class="invalid-feedback">{{ $errors->first('description')}}</div>
        </div>
        <div class="d-flex flex-wrap">
            @foreach($hero->talents as $level => $talents)
                <div class="col-12 col-lg-6">
                    <div>
                        <h3>Level {{$level}}:</h3>
                    </div>
                    <div class="form-group d-flex flex-column">
                        @foreach($talents as $talent)
                            <div class="talent" data-id="{{$talent->id}}">
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
                        {{Form::hidden('talent_'.$loop->iteration, isset($build)?$build->talents[$level][0]->id:null, ['class' => ('talent_select form-control '. ($errors->has('talent_'.$loop->iteration)?'is-invalid' : ''))])}}
                        <div class="invalid-feedback">{{ $errors->first('talent_'.$loop->iteration) }}</div>
                    </div>
                    <div class="form-group">
                        {{Form::label('note_'.$loop->iteration, 'Note')}}
                        {{Form::textarea('note_'.$loop->iteration, null, ['class' => 'form-control'])}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12">
            <h2>Good maps for this build</h2>
            <div class="d-flex flex-wrap">
                @foreach($maps as $map)
                    @include('partials.map._compact', $map)
                @endforeach
                <div class="selectedMaps">
                    @isset($build)
                    @foreach($build->maps as $map)
                        {{Form::hidden('maps['.$map->id.']', $map->id)}}
                    @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{Form::submit('Save', ['class' => 'btn btn-success'])}}
    </div>
{{Form::close()}}

@section('scripts')
    <script src="{{asset('js/editBuild.js')}}" defer></script>
@endsection