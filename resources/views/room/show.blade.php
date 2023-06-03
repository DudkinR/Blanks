@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('categories.index')}}" class='btn'>Back to categories</a>
        <!-- show category -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$category->name}}</div>
                <div class="card-body">
                    <p>{{$category->description}}</p>
                    <p>{{$category->slug}}</p>
                    <p>{{$category->parent_id}}</p>
                    <p>{{$category->image}}</p>
                    <p>{{$category->status}}</p>
                    <p>
                        <a href="{{route('categories.edit', $category->id)}}" class='btn'>Edit</a>
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
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