<div class="filter">
    {{Form::open(['url' => \Request::url(), 'method' => 'GET', 'class' => 'd-flex flex-wrap align-items-center filter-form'])}}
    <div class="col-12 align-items-center">
        <div class="form-group d-flex">
            {{Form::text('search', \Request::get('search'), ['class' => 'form-control filter-search', 'placeholder' => 'Search...'])}}
            {{Form::submit('search', ['class' => 'btn btn-success'])}}
        </div>
    </div>
    {{Form::close()}}
</div>
