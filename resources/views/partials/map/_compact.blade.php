<div class="map compact" data-id="{{$map->id}}">
    <div class="content">
        <a href="{{route('builds', ['map' => $map->id])}}">
            <img src="{{$map->image}}" alt="{{$map->name}}">
        </a>
    </div>
</div>