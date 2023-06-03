@extends('layouts.app')
@section('title', __("Select finish conditions"))
@section('type', "finishconditions"))
@section('content')
<!--form with select to choose finish condition-->
<div class="container">
    <div class="row justify-content-center">
        <a href="{{route('blanks.show', $blank->id)}}" class='btn'>
            <x-icon.main :name="'block-up'" :size=3 :color="'black'"/>
        </a>
        <form action="{{route('postfinishsB')}}" method="post">
            @csrf
            <input type="hidden" name="blank" id="blank" value="{{$blank->id}}" class="form-control">
            <div class="form-group">
                <label for="finish">
                    {{__('mainf.finish')}}
                </label>
                <select name="strts[]" id="strts"  multiple   class="form-control" size=10  style="font-size: 20px;">
                    @foreach($finishs as $finish)
                    <option value="{{$finish->id}}" @if($blank->finishconditions->contains($finish->id)) selected @endif >

                         {{Str::limit(strip_tags($finish->content), 110)}}    
                    </option>
                    @endforeach
                </select>
            </div>
            <!-- radiobutton select clean or add -->
            <div class="form-group">
                <label for="clean">
                    {{__('Clean')}}
                </label>
                <input type="radio" name="clean" id="clean" value="1" >
                <label for="add">
                    {{__('Add')}}
                </label>
                <input type="radio" name="clean" id="add" value="0"  checked>  
            </div>
            <!-- button save -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <x-icon.main :name="'save'" :size=3 :color="'black'"/>
                    {{__('Save')}}
                </button>
            </div>
    </div>
@endsection