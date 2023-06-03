@extends('layouts.app')
@section('title', __("Edit position"))
@section('type', "positions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back position -->
        <a href="{{route('position.index')}}" class='btn'>
            <x-icon.main :name="'arrow-left'" :size=3 :color="'yellow'"/>
        </a>
    
        <form action="{{route('position.update',$position->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">
                    {{__("mainf.name")}}
                </label>
                <input type="text" name="name" value="{{$position->name}}" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">
                {{__("mainf.description")}}
                </label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$position->description}}</textarea>
            </div>

            <!-- slug form-group -->
            <div class="form-group">
                <label for="abv">
                {{__("mainf.abv")}}
                </label>
                <input type="text" name="abv" id="abv" value="{{$position->abv}}" class="form-control">
            </div>
            <?php $languages = App\Models\Language::all(); ?>
            <div class="form-group">
                <label for="language">{{__("mainf.language")}}</label>
                <select name="language" id="language" class="form-control">
                    @foreach($languages as $language)
                    <option value="{{$language->language_code}}" @if($language->language_code==$position->lang) selected @endif>{{$language->language_name}}</option>
                    @endforeach
                </select>
            </div>
            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0" @if($position->status==0) checked @endif class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" @if($position->status==1) checked @endif  class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2" @if($position->status==2) checked @endif  class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'pencil'" :size=3 :color="'yellow'"/>
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