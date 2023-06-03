@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back start -->
        <a href="{{route('start.index')}}" class='btn'>Back to start</a>
    
        <form action="{{route('start.update',$start->id)}}" method="post">
            @csrf
            @method('PUT')
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$start->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>   

       
    </div>
</div>
@endsection