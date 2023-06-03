@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new role -->


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$user->name}}</div>
                    <div class="card-body">
                        <p>{{$user->email}}</p>
                        @foreach ($user->roles as $role)
                            <p>{{$role->name}}</p>

                        @endforeach

                        <a href="{{route('roles.users', $user->id)}}" class='btn'>back</a>


                        <a href="{{route('role.user.edit', $user->id)}}" class='btn'>Edit</a>
                    </div>
                </div>
            </div>

        

    </div>
</div>
@endsection