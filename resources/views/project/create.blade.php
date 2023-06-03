@extends('layouts.app')
@section('title', __("Create projects"))
@section('type', "projects")
@section('content')
<div class="container">
<h1>{!!__("mainf.createproject")!!}</h1>
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('project.index')}}" class='btn'>
            <x-icon.main :name="'hand-drawn-alt-left'" :size=3 :color="'blue'"/>
        </a>
        <!-- form to create new category -->
        <form action="{{route('project.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">
                    {{__("mainf.name")}}
                </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>


            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0"  class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" checked  class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2"   class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'hand-drag1'" :size=3 :color="'yellow'"/>
            </button>
        </form>
    </div>
</div>

@endsection