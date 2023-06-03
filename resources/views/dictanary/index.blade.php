@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new start -->
        <a href="{{route('start.create')}}" class='btn'>Create start</a>
        @foreach ($starts as $start)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$start->name}}</div>
                    <div class="card-body">
                        <p>{{$start->content}}</p>
                        <a href="{{route('start.show', $start->id)}}" class='btn'>Show</a>
                        <a href="{{route('start.edit', $start->id)}}" class='btn'>Edit</a>
                        <form action="{{route('start.destroy', $start->id)}}" method="post">
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