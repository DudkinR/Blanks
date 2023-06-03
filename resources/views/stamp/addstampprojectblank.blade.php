@extends('layouts.app')
@section('title', __("Add avalable stamps to blank"))
@section('type', "stamps"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('project.show',$project_id)}}" class='btn'>Back to project</a>
        <!-- form to create new category -->
        <form action="{{route('addprojectblankstamp_R')}}" method="post">
            @csrf
            
             <input type="hidden" name="blank_id" id="blank" value="{{$blank_id}}" class="form-control">
             <input type="hidden" name="project_id" id="project" value="{{$project_id}}" class="form-control">
            <input type="hidden" name="order" id="order" value="{{$order}}" class="form-control">
            @foreach($stamps as $key=>$stamp)
            <div class="row">
                <div class="form-group col-md-5">

                    <input type="hidden" name="stamp_{{$key}}" value = "{{$stamp}}" >
                    <h1>{{$stamp}}</h1>
                </div>
                <div class="form-group col-md-1">
                    
                    = <a onclick="cpstamp('newstamp_{{$key}}','{{$stamp}}')" class="btn btn-info">>>>></a>
                </div>
                <div class="form-group col-md-6">

                    <input type="text" id="newstamp_{{$key}}"  name="newstamp_{{$key}}" value = "@if($stamp!==$stampsN[$key]){{$stampsN[$key]}}@endif" class="form-control">
                </div>
            </div>
            <hr>
            @endforeach
            
            <button type="submit" class="btn btn-primary">Add to stamps</button>
        </form>
    </div>
</div>
<script>
    function cpstamp(id,word){
        var inputtext= document.getElementById(id);
        inputtext.value=word;
    }
</script>
@endsection