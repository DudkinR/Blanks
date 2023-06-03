@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new category -->
        <a href="{{route('categories.create')}}" class='btn'>Create category</a>
        @foreach ($categories as $category)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$category->name}}</div>
                    <div class="card-body">
                        <p>{{$category->description}}</p>
                        <a href="{{route('categories.show', $category->id)}}" class='btn'>Show</a>
                        <a href="{{route('categories.edit', $category->id)}}" class='btn'>Edit</a>
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
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