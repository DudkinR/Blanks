@extends('layouts.app')
@section('title', __("Show idea condition"))
@section('type', "ideaconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('idea.index')}}" class='btn'>Back to idea</a>
        <!-- show idea -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>{{$idea->content}}</p>
                    <p>
                        <a href="{{route('idea.edit', $idea->id)}}" class='btn'>Edit</a>
                        <form action="{{route('idea.destroy', $idea->id)}}" method="post">
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