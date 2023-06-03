@extends('layouts.app')
@section('title', __("Show Item"))
@section('type', "items"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('item.index')}}" class='btn'>Back to item</a>
        <!-- show item -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!!$item->name!!}</div>
                <div class="card-body">
                    <p>{!!$item->content!!}</p>
                    <p>{!!$item->parent_id!!}</p>
                    <p>{!!$item->status!!}</p>
                    <p>RT : {!!$item->real_time!!}</p>
                    <p>AT : {!!$item->avoid_time!!}</p>
                    <p>
                        <a href="{{route('item.edit', $item->id)}}" class='btn'>Edit</a>
                        <form action="{{route('item.destroy', $item->id)}}" method="post">
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