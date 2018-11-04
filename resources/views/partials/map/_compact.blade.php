<div class="map compact" data-id="{{$map->id}}">
    <div class="content">
        <a href="{{route('builds', ['map' => $map->id])}}">
            <img src="{{asset('img/maps/'. str_replace(' ', '-', $map->name).'.jpg')}}" alt="{{$map->name}}">
        </a>
    </div>
</div>