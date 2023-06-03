@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new problem -->
        <a href="{{route('problem.create')}}" class='btn'>Create problem</a>
        @foreach ($problems as $problem)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$problem->name}}</div>
                    <div class="card-body">
                        <p>{{$problem->content}}</p>
                        <a href="{{route('problem.show', $problem->id)}}" class='btn'>Show</a>
                        <a href="{{route('problem.edit', $problem->id)}}" class='btn'>Edit</a>
                        <form action="{{route('problem.destroy', $problem->id)}}" method="post">
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