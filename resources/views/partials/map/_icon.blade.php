<div class="map icon" data-id="{{$map->id}}">
    <div class="content">
        <img src="{{asset('img/maps/'. str_replace(' ', '-', $map->name).'.jpg')}}" alt="{{$map->name}}">
        <div class="tooltip-description">
            <h4>{{$map->name}}</h4>
        </div>
    </div>
</div>