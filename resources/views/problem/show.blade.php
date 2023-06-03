@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('problem.index')}}" class='btn'>Back to problem</a>
        <!-- show problem -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>{{$problem->content}}</p>
                    <p>{{$problem->desition}}</p>

                    <p>
                        <a href="{{route('problem.edit', $problem->id)}}" class='btn'>Edit</a>
                        <form action="{{route('problem.destroy', $problem->id)}}" method="post">
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