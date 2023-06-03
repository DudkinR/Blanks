@extends('layouts.app')
@section('title', __("Edit category"))
@section('type', "categories")

@section('content')

<div class="container">
<h1>{!!__("mainf.editcategory")!!}</h1>
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('categories.index')}}" class='btn'>
        <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
        </a>
    
        <form action="{{route('categories.update',$category->id)}}" method="post">
            @csrf
            @method('PUT')
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$category->name}}" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">{{__("Description")}}</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$category->description}}</textarea>
            </div>
            <!-- slug form-group -->
            <div class="form-group">
                <label for="slug">{{__("Slug")}}</label>
                <input type="text" name="slug" id="slug" value="{{$category->slug}}" class="form-control">
            </div>

            <!-- sdlect lang form-group -->
            <div class="form-group">
                <label for="lang">
                    <?php $all_lang = App\Models\Language::all(); ?>
                {!!__("Language")!!}
                </label>
                <select name="lang" id="lang" class="form-control">
                    @foreach($all_lang as $lang)
                        <option value="{{$lang->language_code}}" @if($lang->language_code==$category->lang) selected @endif >{{$lang->language_name}}</option>
                    @endforeach
                </select>
            <!-- parent_id form-group -->
            <div class="form-group">
                <label for="parent_id">{{__("Parent")}} {{$category->parent_id}}</label>
                <select name="parent_id" id="parent_id" size=1 class="form-control" >
                     <option value="0" @if($category->parent_id==0) selected @endif  >{{__("under category")}}</option>
                    <?php $my_cats = \App\Models\Category::where(
                        "author_id",
                        "=",
                        \Illuminate\Support\Facades\Auth::id()
                    )->get(); ?>
                    @foreach($my_cats as $cat)
                        @if($cat->id!==$category->id)
                        <option value="{{$cat->id}}" @if($cat->id==$category->parent_id) selected @endif  >{{$cat->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- image form-group -->
            <div class="row">
            <div class="col-md-3">
            <?php
            if ($category->image_own) {
                $icondata = json_decode($category->image_own);
                $texticon = $icondata->text;
                $text_color = $icondata->text_color;
                $bg_color = $icondata->bg_color;
            } else {
                $texticon = "text";
                $text_color = "#OOOOOO";
                $bg_color = "#FFFFFF";
            }
            $l = strlen($texticon);
            switch ($l) {
                case 0:
                    $fs = 110;
                    break;
                case 1:
                    $fs = 110;
                    break;
                case 2:
                    $fs = 90;
                    break;
                case 3:
                    $fs = 70;
                    break;
                case 4:
                    $fs = 60;
                    break;
                case 5:
                    $fs = 50;
                    break;
                default:
                    $fs = 50;
            }
            ?>
            <svg width="100" height="100" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <title>my icon</title>
                <rect width="200" height="200" id="rect_my_svg"  fill=" {{$bg_color}}"/>  
                <text x=50% y=50% text-anchor="middle" id="text_my_svg" font-size={{$fs}} fill="{{$text_color}}" >{{$texticon}}</text>
            </svg>
            </div>
             <div class="col-md-3">
            <label for="text_own" class="form-label">{{__("My own icons")}}</label>
                    <div class="input-group">
                    <input type="text" name="text_own" id="text_own" oninput="svg_my(event)" value="@if($texticon!=='text'){{$texticon}}@endif"  maxlength=5  placeholder="{!!__("mainf.abv")!!}" class="form-control">
                    </div>
            </div>
            
            <div class="col-md-3">
            <label for="text_color" class="form-label">{{__("My own color text")}}</label>
                    <div class="input-group">
                     <input type="color" name="text_color" id="text_color" value="@if($texticon!=='text'){{$text_color}}@endif"  oninput="svg_my(event)"  placeholder="{!!__("mainf.abv")!!}" class="form-control">
                    
                    </div>
            </div>
            
            <div class="col-md-3">
            <label for="bg_color" class="form-label">{{__("My own color bg")}}</label>
                    <div class="input-group">
                         <input type="color" name="bg_color" id="bg_color" value="@if($texticon!=='text'){{$bg_color}}@endif"   oninput="svg_my(event)"  placeholder="{!!__("mainf.abv")!!}" class="form-control">
                   
                    </div>
            </div>
            </div>
         
            <div class="col-md-12">
            <label for="searchwords" class="form-label">{{__("Use icons collection")}}</label>
                    <div class="input-group">
                     <input type="text" name="refresh" id="refresh" value="" aria-describedby="basic-addon2" placeholder="{!!__("mainf.search")!!}" class="form-control">
                     <span class="input-group-text" id="searchwords">
                        <a class="btn" id="getIconsButton">
                            <x-icon.main :name="'ui-rotation'" :size=1 :color="'blue'"/>
                        </a>
                    </span>
                    </div>
            </div>
            <h1> <label for="image">{!!__("Image")!!}</label></h1>
            <div class="row">
                <div class="col-md-4">
                    <x-icon.main :name="$category->icon->name" :size=5 :color="'blue'"/>
                    <input type="radio" name="image" id="image_{{$category->icon->id}}" value="{{$category->icon->id}}" checked class="form-check-input">
                </div>
            </div>
            <div class="row" id="iconsContainer1" >
                <!-- Place for the icons -->
                <!-- Create a container element for the icons -->
            </div>
            <!-- status form-group -->
        
            <legend>{{__("Status")}} {{$category->status}}</legend>

        <div class="form-check">
            <input type="radio" name="status" id="status1" value="0" @if($category->status==0) checked @endif class="form-check-input">
            <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
        </div><div class="form-check">
                <input type="radio" name="status" id="status2" value="1" @if($category->status==1) checked @endif  class="form-check-input">
                <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
        </div><div class="form-check">
                <input type="radio" name="status"  onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2" @if($category->status==2) checked @endif  class="form-check-input">
                <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
        </div>
        <button type="submit" class="btn btn-primary"><x-icon.main :name="'ui-edit'" :size=3 :color="'yellow'"/></button>
       
        </form>   

       
    </div>
</div>
<script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    var getIconsButton = document.getElementById("getIconsButton");
    var iconsContainer1 = document.getElementById("iconsContainer1");

    getIconsButton.addEventListener("click", function() {
 
    fetchIcons();
    });

    const inputField = document.getElementById('name');
    const outputField = document.getElementById('slug');

    inputField.addEventListener('input', (event) => {
    let inputValue = event.target.value;

    if (inputValue.length > 10) {
        inputValue = inputValue.substring(0, 10);
    }

    outputField.value = inputValue;
    });

    outputField.addEventListener('input', (event) => {
    const outputValue = event.target.value;

    // if output value is changed, do something
    });
    </script>
    
    
@endsection