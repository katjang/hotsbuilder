<div class="hero-detail">
    <div class="d-flex align-items-center">
        <img src="{{$hero->image}}" align="{{$hero->name}}">
        <div class="flex-fill">
            <div class="col-12">
                <h1>{{$hero->name}}</h1>
                <h3>{{$hero->type}} {{$hero->role}} <img src="{{asset('img/hero/role/'.strtolower($hero->role).'_active.png')}}" alt=""></h3>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap">
        @foreach($hero->abilities as $ability)
            <div class="d-flex align-items-center col-6">
                <div class="ability flex-shrink-0">
                    <span>{{$ability->name}}</span>
                </div>
                <div class="flex-fill">
                    <span>{{$ability->description}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>