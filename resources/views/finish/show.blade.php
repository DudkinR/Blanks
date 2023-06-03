@extends('layouts.app')
@section('title', __("Show finish condition"))
@section('type', "finishconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('finish.index')}}" class='btn'>Back to finish</a>
        <!-- show finish -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>{{$finish->content}}</p>
                    <p>
                        <a href="{{route('finish.edit', $finish->id)}}" class='btn'>Edit</a>
                        <form action="{{route('finish.destroy', $finish->id)}}" method="post">
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