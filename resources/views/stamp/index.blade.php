@extends('layouts.app')
@section('title', __("All stamp conditions"))
@section('type', "startconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new stamp -->
        <a href="{{route('stamp.create')}}" class='btn'>
        <x-icon.main :name="'plus'" :size=3 :color="'blue'"/>
        </a>
        @foreach ($stamps as $stamp)
            <div class="col-md-4">
                <div class="card">
                <div class="card-header 
                @if($stamp->status==0) 
                bg-danger 
                @elseif($stamp->status==1) 
                bg-primary 
                @elseif($stamp->status==2) 
                bg-success
                @endif
                ">
                <h3 class="card-title">
                @if($stamp->status==0) 
               ( {{__("mainf.draft")}} )
                @elseif($stamp->status==1) 
                ( {{__("mainf.onlymy")}} )
                @elseif($stamp->status==2) 
                ( {{__("mainf.free")}} )
                @endif
                </h3>
            </div>
                    <div class="card-body">
                        <p>{!!$stamp->content!!}</p>
                        <div class="row">
                            <div class="col-md-4"><a href="{{route('stamp.show', $stamp->id)}}" class='btn'>
                        <x-icon.main :name="'eye'" :size=3 :color="'blue'"/>
                        </a></div>
                        @if($stamp->author_id==Auth::id())
                            <div class="col-md-4"><a href="{{route('stamp.edit', $stamp->id)}}" class='btn'>
                        <x-icon.main :name="'pencil'" :size=3 :color="'blue'"/>
                        </a></div>
                            <div class="col-md-4"><form action="{{route('stamp.destroy', $stamp->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class='btn'>
                            <x-icon.main :name="'trash'" :size=3 :color="'red'"/>
                            </button>
                        </form></div>
                        @endif
                        
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        @endforeach
        

    </div>
</div>
@endsection