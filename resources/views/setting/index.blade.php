@extends('layouts.app')
@section('title', __("Setting"))
@section('type', "settings"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if ($errors->has('image'))
    <div class="alert alert-danger">
        {{ $errors->first('image') }}
    </div>
@endif

    <form action="{{route("profile.update",$user->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-md-3">
            <x-icon.main :name="'user'" :size=3 :color="'blue'"/>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{__("mainf.name")}}</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
        </div>
        <div class="col-md-3">
            @if($user->profile->image)
                    <img src="{{ asset($user->profile->image) }}" alt="Profile Image" width="200">
                @else
                <x-icon.main :name="'user'" :size=6 :color="'blue'"/>
            @endif
            <div class="form-group">
                <label for="image">{{__("mainf.image")}}</label>
                <input type="file" class="form-control" name="profile_image">
            </div>
        </div>  
       
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-icon.main :name="'money'" :size=3 :color="'green'"/>  
        </div>
        <div class="col-md-6">
            <H1>{{$user->profile->money}} $</H1>
        </div>
        <div class="col-md-3">
            <a href="{{route("addmoney")}}">
                <x-icon.main :name="'plus'" :size=3 :color="'green'"/>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-icon.main :name="'font'" :size=3 :color="'green'"/>  
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="size">{{__("mainf.size")}}</label>
                <input type="number" class="form-control" name="size" value="{{$user->profile->size}}">

            </div>
        </div>
    </div>
    <!-- color -->
    <div class="row">
        <div class="col-md-3">
            <x-icon.main :name="'color-picker'" :size=3 :color="'green'"/>
        </div>
        <div class="clo-md-9">
            <div class="form-group">
                <label for="color">{{__("mainf.color")}}</label>
                <input type="color" class="form-control" name="color" value="{{$user->profile->color}}">
            </div>
        </div>
    </div>  
    <!-- background -->
    <div class="row">
        <div class="col-md-3">
            <x-icon.main :name="'color-bucket'" :size=3 :color="'green'"/>
        </div>
        <div class="clo-md-9">
            <div class="form-group">
                <label for="color">{{__("mainf.background")}}</label>
                <input type="color" class="form-control" name="background" value="{{$user->profile->background}}">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-3 mx-auto">
            <button type="submit" class="btn">
                <x-icon.main :name="'save'" :size=3 :color="'blue'"/>
            </button>
        </div>
    </div>
</form>
    </div>
</div>
@endsection