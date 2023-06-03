@extends('layouts.app')
@section('title', __("Edit Project"))
@section('type', "projects")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back project -->
        <a href="{{route('project.index')}}" class='btn'>
            <x-icon.main :name="'arrow-left'" :size=3 :color="'yellow'"/>
        </a>
    
        <form action="{{route('project.update',$project->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">
                    {{__("mainf.name")}}
                </label>
                <input type="text" name="name" value="{{$project->name}}" id="name" class="form-control">
            </div>
            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0" @if($project->status==0) checked @endif class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" @if($project->status==1) checked @endif  class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status"  onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2" @if($project->status==2) checked @endif  class="form-check-input">
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