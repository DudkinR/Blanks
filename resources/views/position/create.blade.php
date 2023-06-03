@extends('layouts.app')
@section('title', __("Create new position"))
@section('type', "positions"))
@section('content')
<div class="container">
<h1>{!!__("mainf.createposition")!!}</h1>
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('position.index')}}" class='btn'>
            <x-icon.main :name="'hand-drawn-alt-left'" :size=3 :color="'black'"/>
        </a>
        <!-- form to create new category -->
        <form action="{{route('position.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">
                    {{__("mainf.name")}}
                </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">
                {{__("mainf.description")}}    
                </label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <!-- slug form-group -->
            <div class="form-group">
                <label for="abv">
                {{__("mainf.abv")}}    
                </label>
                <input type="text" name="abv" id="abv" class="form-control">
            </div>
            <?php $languages = App\Models\Language::all(); ?>
            <div class="form-group">
                <label for="language">{{__("Language")}}</label>
                <select name="language" id="language" class="form-control">
                    @foreach($languages as $language)
                    <option value="{{$language->language_code}}" 
                        @if($language->language_code==Session::get("locale")) selected @endif
                    >{{$language->language_name}}</option>
                    @endforeach
                </select>
            </div>
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
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'hand-drag1'" :size=3 :color="'yellow'"/>
            </button>
        </form>
    </div>
</div>

<script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endsection