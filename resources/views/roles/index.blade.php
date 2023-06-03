@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new role -->
        <a href="{{route('roles.create')}}" class='btn'>Create role</a>
        @foreach ($roles as $role)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$role->name}}</div>
                    <div class="card-body">
                        <p>{{$role->description}}</p>
                        <a href="{{route('roles.show', $role->id)}}" class='btn'>Show</a>
                        <a href="{{route('roles.edit', $role->id)}}" class='btn'>Edit</a>
                        <form action="{{route('roles.destroy', $role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        

    </div>
</div>
@endsection