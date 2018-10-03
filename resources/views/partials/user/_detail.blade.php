<div>
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