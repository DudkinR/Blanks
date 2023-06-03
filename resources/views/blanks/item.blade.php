
@extends('layouts.app')
@section('title', __("Work blank"))
@section('type', "blanks")
@section('content')
<?php
function my_str_replace( $mass_old,$mass_need,$string){
    $mass_prom=[];
    foreach($mass_need as $val){
        $mass_prom[]= Str::random(32);
    }
    $string=str_replace( $mass_old,$mass_prom,$string);
    return str_replace( $mass_prom,$mass_need,$string);
}
if ($without_project == 0) {
    if (session("work_now") !== null) {
        $work_now = session("work_now");
        $blank = $work_now["blank"];
        $project = $work_now["project"];
        $project_order = $work_now["project_order"];
    }
    $stmps = \App\Http\Controllers\StampController::stamps(
        $project->id,
        $blank->id,
        $project_order
    );
    $stamps = $stmps["stamps"];
    $stampsN = $stmps["stampsN"];
} else {
    $stamps = [];
    $stampsN = [];
} ?>
<div class="container">
    <div class="row justify-content-center">
        <h1> {!!my_str_replace($stamps,$stampsN,$blank->name)!!}</h1> 
      
     <div class="row">
        <div class="col-md-12">
             @if($without_project==0)
                <a href="{{route('blanks.wbp',$project->id)}}?item={{$order}}"><x-icon.main :name="'undo'" :size=3 :color="'black'"/> </a>
                @else
                <a href="{{route('blanks.wbwp',$blank->id)}}?item={{$order}}"><x-icon.main :name="'undo'" :size=3 :color="'black'"/> </a>
                @endif   </div>
     </div>
    <div class="row alert alert-info"  style="background-color: {{$blank->color}} ">
             <div class="col-md-11 border"><h1>
                {!!my_str_replace($stamps,$stampsN,str_replace('<code>','<code contenteditable="true" readonly>',$content->content))!!}
               
            </h1>   </div>
             <div class="col-md-1">
             @if($without_project==0)
                <a href="{{route('blanks.wbp',$project->id)}}?item={{$order+1}}"><x-icon.main :name="'check-circled'" :size=3 :color="'green'"/> </a>
                @else
                <a href="{{route('blanks.wbwp',$blank->id)}}?item={{$order+1}}"><x-icon.main :name="'check-circled'" :size=3 :color="'green'"/> </a>
                @endif
            </div>
          
   </div>
 </div>
 </div>
@endsection