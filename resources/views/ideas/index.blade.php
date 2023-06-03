@extends('layouts.app')
@section('title', __("All idea conditions"))
@section('type', "ideaconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new idea -->
        <a href="{{route('idea.create')}}" class='btn'>
        <x-icon.main :name="'plus'" :size=3 :color="'blue'"/>
        </a>
        {{$ideas->count()}}
        <?php
       $idea_before=0;
        ?>
        @foreach ($ideas as $idea)
            <div class="col-md-12">
                <div class="card">
                <div class="card-header 
                @if($idea->status==0) 
                bg-warning 
                @elseif($idea->status==1) 
                bg-primary 
                @elseif($idea->status==2) 
                bg-success
                @endif
                ">
                <h3 class="card-title">
                @if($idea->status==0) 
               ( {{__("mainf.draft")}} )
                @elseif($idea->status==1) 
                ( {{__("mainf.view")}} )
                @elseif($idea->status==2) 
                ( {{__("mainf.work")}} )
                @elseif($idea->status==3) 
                ( {{__("mainf.do")}} )
                @elseif($idea->status==4) 
                ( {{__("mainf.done")}} )
                @endif
                </h3>
            </div>
                    <div class="card-body">
                        <a name="idea_{{$idea_before}}"></a>
                        <?php
                             $idea_before=$idea->id;
                        ?>
                        <h1>{!!$idea->content!!}</h1>
                        <div class="row">
                            <div class="col-md-4"><a href="{{route('idea.show', $idea->id)}}" class='btn'>
                        <x-icon.main :name="'eye'" :size=1 :color="'black'"/>
                        </a></div>
                        @if($idea->author_id==Auth::id())
                            <div class="col-md-4"><a href="{{route('idea.edit', $idea->id)}}" class='btn'>
                        <x-icon.main :name="'pencil'" :size=1 :color="'black'"/>
                        </a></div>
                            <div class="col-md-4"><form action="{{route('idea.destroy', $idea->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class='btn'>
                            <x-icon.main :name="'trash'" :size=1 :color="'black'"/>
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