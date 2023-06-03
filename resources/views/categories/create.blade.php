@extends('layouts.app')
@section('title', __("New category"))
@section('type', "categories")
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>{!!__("mainf.createcategory")!!}</h1>
        <!--  link to  back category -->
        <a href="{{route('categories.index')}}" class='btn'>
            <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
        </a>
        <!-- form to create new category -->
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="name">
                {!!__("Name")!!} 
                </label>
                <input type="text" name="name" id="name" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">{!!__("Description")!!}</label>
                <!-- html editor wysiwyg to text area -->
               
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter the Description" class="form-control"></textarea>
            </div>
            <!-- slug form-group -->
            <div class="form-group">
                <label for="slug">
                {!!__("Slug")!!}
                </label>
                <input type="text" name="slug" id="slug" value="" class="form-control">
            </div>

            <!-- sdlect lang form-group -->
            <div class="form-group">
                <label for="lang">
                    <?php
                    if (session("work_lang") !== null) {
                        $work_lang = session("work_lang");
                    } else {
                        $work_lang = Auth::user()->profile->lang;
                    }
                    $all_lang = App\Models\Language::all();
                    ?>
                {!!__("Language")!!} {{Session::get('locale')}}
                </label>
                <select name="lang" id="lang" class="form-control">
                    @foreach($all_lang as $lang)
                        <option value="{{$lang->language_code}}" @if($lang->language_code==Session::get('locale')) selected @endif >{{$lang->language_name}}</option>
                    @endforeach
                </select>
            <!-- parent_id form-group -->
            @isset($parent_id)
                <input type="text" name="parent_id" id="parent_id" value="{!!$parent_id!!}"  class="form-control">
            @else
                <input type="text" name="parent_id" id="parent_id" value="0" class="form-control">
            @endisset

            <div class="row">

            <div class="col-md-3">
            <svg width="100" height="100" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <title>my icon</title>
                <rect width="200" height="200" id="rect_my_svg"  fill="#ffffff"/>  
                <text x=50% y=50% text-anchor="middle" id="text_my_svg" font-size=48 fill="#ffffff" >Text</text>
            </svg>
            </div>
             <div class="col-md-3">
            <label for="text_own" class="form-label">{{__("My own icons")}}</label>
                    <div class="input-group">
                    <input type="text" name="text_own" id="text_own" oninput="svg_my(event)" value=""  maxlength=5  placeholder="{!!__('mainf.abv')!!}" class="form-control">
                    </div>
            </div>
            
            <div class="col-md-3">
            <label for="text_color" class="form-label">{{__("My own color text")}}</label>
                    <div class="input-group">
                     <input type="color" name="text_color" id="text_color" value="@if(session('text_color')!==null){{session('text_color')}}@else #000000 @endif"  oninput="svg_my(event)"  placeholder="{!!__("mainf.abv")!!}" class="form-control">
                    
                    </div>
            </div>
            
            <div class="col-md-3">
            <label for="bg_color" class="form-label">{{__("My own color bg")}}</label>
                    <div class="input-group">
                         <input type="color" name="bg_color" id="bg_color" value="@if(session('bg_color')!==null){{session('bg_color')}}@else #ffffff @endif"   oninput="svg_my(event)"  placeholder="{!!__("mainf.abv")!!}" class="form-control">
                   
                    </div>
            </div>
            </div>
         
            <div class="col-md-12">
            <label for="searchwords" class="form-label">{{__("Use icons collection")}}</label>
                    <div class="input-group">
                     <input type="text" name="refresh" id="refresh" value="" aria-describedby="basic-addon2" placeholder="{!!__('search')!!}" class="form-control">
                     <span class="input-group-text" id="searchwords">
                        <a class="btn" id="getIconsButton">
                            <x-icon.main :name="'ui-rotation'" :size=1 :color="'blue'"/>
                        </a>
                    </span>
                    </div>
            </div>
            <h1> <label for="image">{!!__("mainf.image")!!}</label></h1>
            <div class="row"  >
                <div class="d-flex flex-wrap" id="iconsContainer1">
                    <!-- Place for the icons -->
                    <!-- Create a container element for the icons -->
                </div>
            </div>
            <!-- status form-group -->
       
            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0" 
                @if(session('status'))
                    @if(session('status') == 0)
                        checked
                    @endif
                @endif
                class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" 
                    @if(session('status'))
                    @if(session('status') == 1)
                        checked
                    @endif
                    @else
                        checked
                @endif
                    class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status"  onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2"  
                    @if(session('status'))
                    @if(session('status') == 2)
                        checked
                    @endif
                @endif
                    class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>
            <button type="submit" class="btn btn-primary" title="{!!__("mainf.create")!!}">
                <x-icon.main :name="'plus'" :size=3 :color="'yellow'"/>
            </button>
        </form>
    </div>

</div>
<script>
    // Get a reference to the button and container elements
        // Get a reference to the button and container elements
    var getIconsButton = document.getElementById("getIconsButton");
    var iconsContainer1 = document.getElementById("iconsContainer1");
   CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })

    
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