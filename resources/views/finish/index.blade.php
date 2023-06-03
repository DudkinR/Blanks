@extends('layouts.app')
@section('title', __("All finish conditions"))
@section('type', "finishconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new finish -->
        {{__("Work with finish conditions")}}
        <a href="{{route('finish.create')}}" class='btn'>
        <x-icon.main :name="'plus'" :size=3 :color="'blue'"/>
        </a>
        @foreach ($finishs as $finish)
        <div class="row border bg-light">
                <div class="col-md-2   @if($finish->status==0) 
                bg-danger 
                @elseif($finish->status==1) 
                bg-primary 
                @elseif($finish->status==2) 
                bg-success
                @endif
                "> 
                <br>
                @if($finish->status==0) 
               ( {{__("mainf.draft")}} )
                @elseif($finish->status==1) 
                ( {{__("mainf.onlymy")}} )
                @elseif($finish->status==2) 
                ( {{__("mainf.free")}} )
                @endif
                </div>
                <div class="col-md-7">
                    <h2>
                       {!!$finish->content!!} 
                    </h2>
                    
                
                </div>
                <div class="col-md-2">
                <div class="row">
                            <div class="col-md-4"><a href="{{route('finish.show', $finish->id)}}" class='btn' title='{{__("mainf.show")}}'>
                            <x-icon.main :name="'eye'" :size=1 :color="'black'"/>    
                        </a></div>
                        @if($finish->author_id == Auth::id())
                            <div class="col-md-4"><a href="{{route('finish.edit', $finish->id)}}" class='btn'  title='{{__("mainf.edit")}}'>
                            <x-icon.main :name="'pencil'" :size=1 :color="'black'"/>
                        </a></div>
                            <div class="col-md-4"><form action="{{route('finish.destroy', $finish->id)}}" method="post">
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