@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back role -->
        <a href="{{route('roles.index')}}" class='btn'>Back to roles</a>
    
        <form action="{{route('roles.update',$role->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$role->name}}" id="name" class="form-control">
            </div>
           
            <button type="submit" class="btn btn-primary">Create</button>
        </form>   

       
    </div>
</div>
@endsection