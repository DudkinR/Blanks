@extends('layouts.app')
@section('title', __("All start conditions"))
@section('type', "startconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new start -->
        {{__("Work with start conditions")}}
        <a href="{{route('start.create')}}" class='btn'>
        <x-icon.main :name="'plus'" :size=3 :color="'blue'"/>
        </a>
        @foreach ($starts as $start)
        <div class="row border bg-light">
                <div class="col-md-2   @if($start->status==0) 
                bg-danger 
                @elseif($start->status==1) 
                bg-primary 
                @elseif($start->status==2) 
                bg-success
                @endif
                "> 
                <br>
                @if($start->status==0) 
               ( {{__("mainf.draft")}} )
                @elseif($start->status==1) 
                ( {{__("mainf.onlymy")}} )
                @elseif($start->status==2) 
                ( {{__("mainf.free")}} )
                @endif
                </div>
                <div class="col-md-7">
                    <h2>
                       {!!$start->content!!} 
                    </h2>
                    
                
                </div>
                <div class="col-md-2">
                <div class="row">
                            <div class="col-md-4"><a href="{{route('start.show', $start->id)}}" class='btn' title='{{__("mainf.show")}}'>
                            <x-icon.main :name="'eye'" :size=1 :color="'black'"/>    
                        </a></div>
                        @if($start->author_id == Auth::id())
                            <div class="col-md-4"><a href="{{route('start.edit', $start->id)}}" class='btn'  title='{{__("mainf.edit")}}'>
                            <x-icon.main :name="'pencil'" :size=1 :color="'black'"/>
                        </a></div>
                            <div class="col-md-4"><form action="{{route('start.destroy', $start->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class='btn' title='{{__("mainf.delete")}}'>
                            <x-icon.main :name="'trash'" :size=1 :color="'black'"/>    
                            </button>
                        </form></div>
                        @endif
                        </div>
                </div>
            </div>
        @endforeach
        

    </div>
</div>
@endsection