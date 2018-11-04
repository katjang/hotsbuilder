@if(session('message'))
    <div class="flash-message alert alert-success show">
        {{session('message')}}
    </div>
@endif