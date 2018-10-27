<div class="d-flex">
    <div class="flex-fill">
        <div>
            <span>Username: {{$user->name}}</span>
        </div>
        <div>
            <span>Joined at: {{$user->created_at->format('d/m/y')}}</span>
        </div>
        <div>
            <span>Builds made: {{count($user->builds)}}</span>
        </div>
    </div>
    <div class="flex-fill">
        <a href="{{route('user.builds', $user)}}" class="btn btn-success">All Builds</a>
    </div>
</div>