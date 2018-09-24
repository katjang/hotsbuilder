<div>
    <div class="d-flex align-items-center">
        <img src="{{$hero->image}}" align="{{$hero->name}}">
        <div>
            <h1>{{$hero->name}}</h1>
            <h3>{{$hero->type}} {{$hero->role}}</h3>
        </div>
    </div>
    <div>
        @foreach($hero->abilities as $ability)
            <div class="d-flex align-items-center">
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