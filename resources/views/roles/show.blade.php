@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('roles.index')}}" class='btn'>Back to roles</a>
        <!-- show role -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$role->name}}</div>
                <div class="card-body">
                   <p>
                        <a href="{{route('roles.edit', $role->id)}}" class='btn'>Edit</a>
                        <form action="{{route('roles.destroy', $role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </p>
                </div>
            </div>
        </div> 
      
        

    </div>
</div>
@endsection