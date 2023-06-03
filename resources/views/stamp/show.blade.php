@extends('layouts.app')
@section('title', __("Show stamp condition"))
@section('type', "startconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('stamp.index')}}" class='btn'>Back to stamp</a>
        <!-- show stamp -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>{{$stamp->content}}</p>
                    <p>
                        <a href="{{route('stamp.edit', $stamp->id)}}" class='btn'>Edit</a>
                        <form action="{{route('stamp.destroy', $stamp->id)}}" method="post">
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