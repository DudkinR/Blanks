@extends('layouts.app')
@section('title', __("Edit work blank"))
@section('type', "blanks")

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <!-- link back to blanks route -->
    <a href="{{route('blanks.index')}}">
    <x-icon.main :name="'arrow-left'" :size=3 :color="'blue'"/>
    </a>
    <!-- show blank -->
    <div class="card">     
        <p>
            <h1>{{__("mainf.categories")}}:</h1>
            @foreach($blank->categories as $category)
                {!!$category->name!!} <br>  
            @endforeach
        </p>
        <h1>{!!$blank->name!!}</h1> 
        <p>{!!$blank->tcheme!!}</p>
        <h2>{{__("mainf.starts")}}:</h2>
        @foreach($blank->startconditions as $condition)
                {!!$condition->content!!} <br>  
            @endforeach
   
    </div>
    </div>
    <div class="row"  style="background-color:{{$blank->color}}">
        <div class="col-md-6">
            <form action="{{route('blanks.work',$blank->id)}}" method="post">
                @csrf
                <input type="hidden" name="order" value="0">
                <input type="hidden" name="withootproject" value="1">
                <button type="submit" class="btn btn-success">
                <x-icon.main :name="'check-circled'" :size=3 :color="'blue'"/>
                    {{__("mainf.checkstart")}}
                </button>
            </form>
        </div>
    </div>
    <?php $itms = $blank->items; ?>
    <x-items.item :items="$itms" :num=1/>


    <div class="row"  style="background-color:{{$blank->color}}">
        <div class="col-md-6">
            <a href="{{route('blanks.show',$blank->id)}}" class="btn btn-info">
                <x-icon.main :name="'stylish-left'" :size=3 :color="'blue'"/>
                {{__("mainf.backeb")}}
            </a>
        </div>
    </div><h2>{{__("mainf.finish")}}:</h2>
    @foreach($blank->finishconditions as $condition)
        <div class="row"  style="background-color:{{$blank->color}}">
            <div class="col-md-1">
                {{$loop->iteration}}
            </div>
            <div class="col-md-11">
                
                <p>{!!$condition->content!!}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection