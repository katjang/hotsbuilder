@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.filter._search')

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                {{Form::model($user, ['route' => ['admin.user.update', $user], 'method' => 'PUT'])}}
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{Form::text('name', null, ['class' => 'form-control'])}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{Form::select('role', $roles, $user->role, ['class' => 'form-control'])}}</td>
                    <td>
                        {{Form::submit('update', ['class' => 'btn btn-success'])}}
                    </td>
                </tr>
                {{Form::close()}}
            @endforeach
            </tbody>
        </table>
        @include('partials.pagination._default', ['links' => $users->links()])
    </div>
@endsection
