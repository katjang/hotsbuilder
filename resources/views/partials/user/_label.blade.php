<div class="d-flex align-items-center">
    <strong class="">By: <a href="{{route('user.show', $user)}}">{{$user->name}}</a></strong>
    @if($user->role == \App\UserRole::MODERATOR)
        <img src="{{asset('img/moderator.png')}}" alt="MOD" class="moderator-icon">
    @endif
</div>
