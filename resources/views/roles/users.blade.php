@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new role -->

        @foreach ($users as $user)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$user->name}}</div>
                    <div class="card-body">
                        <p>{{$user->email}}</p>
                        <a href="{{route('role.user.show', $user->id)}}" class='btn'>Show</a>
                        <a href="{{route('role.user.edit', $user->id)}}" class='btn'>Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
        

    </div>
</div>
@endsection