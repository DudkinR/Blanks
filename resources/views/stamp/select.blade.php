@extends('layouts.app')
@section('title', __("Select stamp conditions"))
@section('type', "startconditions"))
@section('content')
<!--form with select to choose stamp condition-->
<div class="container">
    <div class="row justify-content-center">
        <a href="{{route('blanks.show', $blank)}}" class='btn'>
            <x-icon.main :name="'back'" :size=3 :color="'yellow'"/>
        </a>
        <form action="{{route('poststampsB')}}" method="post">
            @csrf
            <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            <div class="form-group">
                <label for="stamp">
                    {{__('mainf.stamp')}}
                </label>
                <select name="strts[]" id="strts"  multiple   class="form-control" size=10 >
                    @foreach($stamps as $stamp)
                    <option value="{{$stamp->id}}">
                         {{Str::limit(strip_tags($stamp->content), 150)}}    
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