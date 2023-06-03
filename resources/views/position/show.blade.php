@extends('layouts.app')
@section('title', __("Show position"))
@section('type', "positions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('position.index')}}" class='btn'>
            <x-icon.main :name="'arrow-left'" :size=3 :color="'grey'"/>
        </a>
        <!-- show position -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{!!$position->abv!!}</div>
                <div class="card-body">

                  
                    <H1>{!!$position->name!!}</H1>
                     <p>{!!$position->description!!}</p>
                        <a href="{{route('position.edit', $position->id)}}" class='btn'>
                            <x-icon.main :name="'pencil'" :size=1 :color="'black'"/>
                        </a>
                        <form action="{{route('position.destroy', $position->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"> 
                                <x-icon.main :name="'trash'" :size=1 :color="'black'"/>
                            </button>
                        </form>
                  
                </div>
            </div>
        </div> 
      
        

    </div>
</div>
@endsection