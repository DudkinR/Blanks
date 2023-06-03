@extends('layouts.app')
@section('title', __("mainf.editproblem"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back problem -->
        <a href="{{route('problem.index')}}" class='btn'>Back to problem</a>
    
        <form action="{{route('problem.update',$problem->id)}}" method="post">
            @csrf
            @method('PUT')
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="desition">desition</label>
                <input type="text" name="desition" id="desition"  value="{{$problem->desition}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$problem->content}}</textarea>
            </div>
            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0" @if($blank->status==0) checked @endif class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" @if($blank->status==1) checked @endif  class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status"  onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2" @if($blank->status==2) checked @endif  class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>

            <button type="submit" class="btn btn-primary">Edit  problems</button>
        </form>   

       
    </div>
</div>
@endsection