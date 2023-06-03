@extends('layouts.app')
@section('title', __("Edit start conditions"))
@section('type', "startconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back start -->
        <a href="{{route('start.index')}}" class='btn'>
        <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
        </a>
    
        <form action="{{route('start.update',$start->id)}}" method="post">
            @csrf
            @method('PUT')
            @if(isset($blank)&&$blank!==0) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$start->content}}</textarea>
            </div>
            <!-- status form-group -->
            <?php $languages = App\Models\Language::all(); ?>
            <div class="form-group">
                <label for="language">{{__("mainf.language")}}</label>
                <select name="language" id="language" class="form-control">
                    @foreach($languages as $language)
                    <option value="{{$language->language_code}}" @if($language->language_code==$start->lang) selected @endif>{{$language->language_name}}</option>
                    @endforeach
                </select>
            </div>
            <legend>{{__("mainf.status")}} {{$start->status}}</legend>

                <div class="form-check">
                    <input type="radio" name="status" id="status1" value="0" @if($start->status==0) checked @endif class="form-check-input">
                    <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
                </div><div class="form-check">
                        <input type="radio" name="status" id="status2" value="1" @if($start->status==1) checked @endif  class="form-check-input">
                        <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
                </div><div class="form-check">
                        <input type="radio" name="status" onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2" @if($start->status==2) checked @endif  class="form-check-input">
                        <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    <x-icon.main :name="'tick-boxed'" :size=3 :color="'yellow'"/>
                </button>
                </form>
                </div>
            
        </form>   
     
       
    </div>
</div>
<script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endsection