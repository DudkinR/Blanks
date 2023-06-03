@extends('layouts.app')
@section('title', __("Profole edit"))
@section('type', "profiles"))

@section('content')
<div class="container bg-light">
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
        <x-icon.main :name="'business'.$user->profile->sex" :size="'5'" :color="'blue'" />
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
        <div class="col-md-9">
            <H1>{{$user->profile->money}} $</H1>
             <a href="{{route("addmoney")}}" target="_blank">
                <x-icon.main :name="'plus'" :size=3 :color="'green'"/>
            </a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
        <x-icon.mytext :text="$user->profile->lang" :bg="'red'" :color="'white'" :size=8 />
        </div>
        <div class="col-md-9">
            <div class="form-group">
            <label for="lang">
                    <?php $all_lang = App\Models\Language::all(); ?>
                {!!__("mainf.lang")!!}
                </label>
                <select name="lang" id="lang" class="form-control">
                    @foreach($all_lang as $lang)
                        <option value="{{$lang->language_code}}" @if($lang->language_code==$user->profile->lang) selected @endif >{{$lang->language_name}}</option>
                    @endforeach
                </select>

            </div>
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
    <div class="row">
        <div class="col-md-3">
            <h1>{{__("Sex")}}</h1>
        </div>
        <div class="col-md-9">
            <div class="col-md-4">
                <div class="form-switch ">
                    <input type="radio" name="sex" id="sexm" value="man" 
                    @if($user->profile->sex=='man') 
                    checked
                     @endif
                     class="form-check-input">
                    <label class="form-check-label" for="sexm">
                    <x-icon.main :name="'businessman'" :size="'2'" :color="'red'" />
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-switch ">
                    <input type="radio" name="sex" id="sexw" value="woman"   @if($user->profile->sex=='woman') checked @endif   class="form-check-input">
                    <label class="form-check-label" for="sexw">
                    <x-icon.main :name="'businesswoman'" :size="'2'" :color="'green'" />
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-icon.main :name="'question-circle'" :size=3 :color="'green'"/>
        </div>
        <div class="col-md-9">
            <div class="form-switch ">
            <input type="checkbox" name="help" id="help0"  value="1"   @if($user->profile->help) checked @endif    class="form-check-input">
                  <label class="form-check-label" for="help0">
                <x-icon.main :name="'eye-alt'" :size="'2'" :color="'green'" />
                </label>
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