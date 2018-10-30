<div class="filter">
    {{Form::open(['url' => \Request::url(), 'method' => 'GET', 'class' => 'd-flex flex-wrap align-items-center filter-form'])}}
    <div class="col-12 col-md-6">
        <div class="form-group d-flex justify-content-between">
            <div data-role="assassin" class="icon-button filter-role"><img src="{{asset('img/hero/role/assassin'.(\Request::has('assassin')?'_active':'').'.png')}}"></div>
            {{Form::hidden('assassin', \Request::has('assassin')?1:0)}}

            <div data-role="specialist" class="icon-button filter-role"><img src="{{asset('img/hero/role/specialist'.(\Request::has('specialist')?'_active':'').'.png')}}"></div>
            {{Form::hidden('specialist', \Request::has('specialist')?1:0)}}

            <div data-role="support" class="icon-button filter-role"><img src="{{asset('img/hero/role/support'.(\Request::has('support')?'_active':'').'.png')}}"></div>
            {{Form::hidden('support', \Request::has('support')?1:0)}}

            <div data-role="warrior" class="icon-button filter-role"><img src="{{asset('img/hero/role/warrior'.(\Request::has('warrior')?'_active':'').'.png')}}"></div>
            {{Form::hidden('warrior', \Request::has('warrior')?1:0)}}
        </div>
    </div>
    <div class="col-12 col-md-6 align-items-center">
        <div class="form-group">
            {{Form::text('search', \Request::get('search'), ['class' => 'form-control filter-search', 'placeholder' => 'Search...'])}}
        </div>
    </div>
    @isset($heroArray)
    <div class="col-12 col-md-6">
        <div class="form-group row">
            <div class="col-12 col-md-2">
                {{Form::label('hero', 'Hero:', ['class' => 'col-form-label'])}}
            </div>
            <div class="col-12 col-md-10">
                {{Form::select('hero', $heroArray, \Request::has('hero')? \Request::get('hero'):null, ['class' => 'form-control filter-hero'])}}
            </div>
        </div>
    </div>
    @endisset
    @isset($mapArray)
    <div class="col-12 col-md-6">
        <div class="form-group row">
            <div class="col-12 col-md-2">
                {{Form::label('map', 'Map:', ['class' => 'col-form-label'])}}
            </div>
            <div class="col-12 col-md-10">
                {{Form::select('map', $mapArray, \Request::has('map')? \Request::get('map'):null, ['class' => 'form-control filter-map'])}}
            </div>
        </div>
    </div>
    @endisset
    {{Form::close()}}
</div>
