@extends('layouts.app')
@section('title', __("Select start conditions"))
@section('type', "startconditions"))
@section('content')
<!--form with select to choose start condition-->
<div class="container">
    <div class="row justify-content-center">
        <a href="{{route('blanks.show', $blank->id)}}" class='btn'>
            <x-icon.main :name="'block-up'" :size=3 :color="'black'"/>
        </a>
        <form action="{{route('poststartsB')}}" method="post">
            @csrf
            <input type="hidden" name="blank" id="blank" value="{{$blank->id}}" class="form-control">
            <div class="form-group">
                <label for="start">
                    {{__('mainf.start')}}
                </label>
                <select name="strts[]" id="strts"  multiple   class="form-control" size=10  style="font-size: 20px;">
                    @foreach($starts as $start)
                    <option value="{{$start->id}}" @if($blank->startconditions->contains($start->id)) selected @endif >

                         {{Str::limit(strip_tags($start->content), 110)}}    
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