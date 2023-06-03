@extends('layouts.app')
@section('title', __("Edit stamp conditions"))
@section('type', "startconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back stamp -->
        <a href="{{route('stamp.index')}}" class='btn'>
        <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
        </a>
    
        <form action="{{route('stamp.update',$stamp->id)}}" method="post">
            @csrf
            @method('PUT')
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="content">Content</label>
                <input type="string" name="content" value="{{$stamp->content}}" id="content" class="form-control"/>
              </div>
                <button type="submit" class="btn btn-primary">
                    <x-icon.main :name="'tick-boxed'" :size=3 :color="'yellow'"/>
                </button>
                </form>
                </div>
            
        </form>   
     
       
    </div>
</div>
@endsection