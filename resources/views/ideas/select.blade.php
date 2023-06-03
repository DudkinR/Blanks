@extends('layouts.app')
@section('title', __("Select start conditions"))
@section('type', "startconditions"))
@section('content')
<!--form with select to choose start condition-->
<div class="container">
    <div class="row justify-content-center">
        <a href="{{route('blanks.show', $blank)}}" class='btn'>
            <x-icon.main :name="'back'" :size=3 :color="'yellow'"/>
        </a>
        <form action="{{route('poststartsB')}}" method="post">
            @csrf
            <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            <div class="form-group">
                <label for="start">
                    {{__('mainf.start')}}
                </label>
                <select name="strts[]" id="strts"  multiple   class="form-control" size=10 >
                    @foreach($starts as $start)
                    <option value="{{$start->id}}">
                         {{Str::limit(strip_tags($start->content), 150)}}    
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'save'" :size=3 :color="'yellow'"/>
                {{__('mainf.save')}}
            </button>
        </form>
    </div>
@endsection