@extends('layouts.app')
@section('title', __("Show position"))
@section('type', "positions"))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('profile.index')}}" class='btn'>
            <x-icon.main :name="'arrow-left'" :size=3 :color="'grey'"/>
        </a>
        <!-- show position -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>
                {{__('Select options for your work ')}}
            </h1>
            <p>
                Look session data:
            </p>
        </div>
    </div>
    <form action="{{route('profile.formwork')}}" method="POST">
    @csrf
    <div class="row">
            <!-- select multiple items -->
            <div class="form-group">
                <label for="categories">{{__("blanks.Categories")}}</label>
                <select name="categories[]" id="categories" class="form-control"  multiple >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        @if(session()->has('work_categories') && in_array($category->id, session("work_categories")))
                            selected="selected"
                        @endif
                        >{{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>
    </div>

    <div class="row">
            <!-- select multiple items -->
            <div class="form-group">
                <label for="positions">{{__("blanks.Positions")}}</label>
                <select name="positions[]" id="positions" class="form-control"  multiple >
                    @foreach($positions as $position)
                        <option value="{{$position->id}}"
                        @if(session()->has('work_positions') && in_array($position->id, session("work_positions")))
                            selected="selected"
                        @endif
                        >{{$position->name}}
                    </option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">{{__("blanks.Save")}}</button>
        </div>
    </div>
    </form>
</div>
@endsection