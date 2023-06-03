@extends('layouts.app')
@section('title', __("Create finish conditions"))
@section('type', "finishconditions"))

@section('content')
<div class="container">
<h1>{!!__("mainf.createfinish")!!}</h1>
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('finish.index')}}" class='btn'>
         <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
         </a>
        <!--  link to  back page -->
        @isset($blank) 
        <a href="{{route('blanks.show', $blank)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>
        @endif
        @isset($item) 
        <a href="{{route('item.show', $item)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>            
        @endif
        @isset($uni) 
        <a href="{{route('item.show', $uni)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>
        @endif
        <!-- form to create new category -->
        <form action="{{route('finish.store')}}" method="post">
            @csrf
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            @isset($item) 
             <input type="hidden" name="item" id="item" value="{{$item}}" class="form-control">
            @endif
            @isset($uni) 
             <input type="hidden" name="uni" id="uni" value="{{$item}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="content">
                    {{__('mainf.finish')}}
                </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0" 
                // use Session::get('status') to get value from session
                @if(Session::get('status')==0) checked @endif
                 class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" 
                    @if(Session::get('status')==1) checked @endif 
                    @if(Session::get('status')!==null) checked @endif
                    class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status"  onclick="confirm('{{__(' Confirm  all your data, will bee free')}}')"  id="status3" value="2" @if(Session::get('status')==2) checked @endif class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'save'" :size=3 :color="'blue'"/>
                {{__('mainf.save')}}
            </button>
        </form>
    </div>
</div><script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endsection