@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back room -->
        <a href="{{route('room.index')}}" class='btn'>Back to categories</a>
    
        <form action="{{route('room.update',$room->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$room->name}}" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$room->description}}</textarea>
            </div>
            <!-- slug form-group -->
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" value="{{$room->slug}}" class="form-control">
            </div>
            <!-- parent_id form-group -->
            <div class="form-group">
                <label for="parent_id">Parent_id</label>
                <input type="text" name="parent_id" id="parent_id" value="{{$room->parent_id}}" class="form-control">
            </div>
            <!-- image form-group -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image" value="{{$room->image}}" class="form-control">
            </div>
            <!-- status form-group -->
            <div class="form-group">
                <label for="status">{{__("mainf.status")}}</label>
                <input type="radio" name="status" id="status1" value="0" @if($room->status==0) selected @endif class="form-control">{{__("mainf.draft")}}
                <input type="radio" name="status" id="status2" value="1" @if($room->status==1) selected @endif class="form-control" >{{__("mainf.onlymy")}}
                <input type="radio" name="status" id="status3" value="2" @if($room->status==2) selected @endif class="form-control" >{{__("mainf.free")}}

            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>   

       
    </div>
</div>
@endsection