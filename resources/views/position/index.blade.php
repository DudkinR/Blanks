@extends('layouts.app')
@section('title', __("All avalable positions"))
@section('type', "positions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <H1>{{__("Positions")}}</H1>
        <!-- create link to create new category -->
        <?php $string_title =
            __("mainf.create") . " " . mb_strtolower(__("mainf.position")); ?>
        <a href="{{route('position.create')}}" class='btn' title='{{$string_title}}'>
            <x-icon.main :name="'plus'" :size=3 :color="'blue'"/>
        </a>
        @foreach ($positions as $position)
            <div class="row border bg-light">
                <div class="col-md-2   @if($position->status==0) 
                bg-danger 
                @elseif($position->status==1) 
                bg-primary 
                @elseif($position->status==2) 
                bg-success
                @endif
                "> <mark>{!!$position->abv!!}</mark>
                <br>
                @if($position->status==0) 
               ( {{__("mainf.draft")}} )
                @elseif($position->status==1) 
                ( {{__("mainf.onlymy")}} )
                @elseif($position->status==2) 
                ( {{__("mainf.free")}} )
                @endif
                </div>
                <div class="col-md-3">
                    {!!$position->name!!}
                  </div>
                <div class="col-md-5">
                   {!!$position->description!!}
                </div>
                <div class="col-md-2">
                <div class="row">
                            <div class="col-md-4"><a href="{{route('position.show', $position->id)}}" class='btn' title='{{__("mainf.show")}}'>
                            <x-icon.main :name="'eye'" :size=1 :color="'black'"/>    
                        </a></div>
                        @if($position->author_id == Auth::id())
                            <div class="col-md-4"><a href="{{route('position.edit', $position->id)}}" class='btn'  title='{{__("mainf.edit")}}'>
                            <x-icon.main :name="'pencil'" :size=1 :color="'black'"/>
                        </a></div>
                            <div class="col-md-4"><form action="{{route('position.destroy', $position->id)}}" method="post">
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