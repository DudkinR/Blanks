@extends('layouts.app')
@section('title', __("Show start condition"))
@section('type', "startconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('start.index')}}" class='btn'>Back to start</a>
        <!-- show start -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>{{$start->content}}</p>
                    <p>
                        <a href="{{route('start.edit', $start->id)}}" class='btn'>Edit</a>
                        <form action="{{route('start.destroy', $start->id)}}" method="post">
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