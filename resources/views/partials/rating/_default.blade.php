<div class="rating d-flex push-right {{$extraClass}}"}} >
    @for($i = 1; $i < 6; $i++)
        <div class="rating-star-container d-flex position-relative" data-index="{{$i}}">
            <img src="{{asset('img/star_empty.png')}}" alt="star">
            @if(!($i == ceil($rating)) || $i == $rating)
                <img src="{{asset('img/star.png')}}" alt="star" class="position-absolute  {{!($i <= $rating)? 'd-none': ''}}">
            @else
                <img src="{{asset('img/star.png')}}" alt="star" class="position-absolute" style="clip-path: polygon(0 0, {{($rating-floor($rating))*100}}% 0, {{($rating-floor($rating))*100}}% 100%, 0 100%);">
            @endif
        </div>
    @endfor
</div>