
@extends('layouts.app')
@section('title', __("Work blank"))
@section('type', "blanks")
@section('content')
<?php
if($without_project==0){
    if (session("work_now") !== null) {
        $work_now = session("work_now");
        $blank = $work_now["blank"];
        $project = $work_now["project"];
        $order = $work_now["project_order"];
    }
    $stmps = \App\Http\Controllers\StampController::stamps(
        $project,
        $blank->id,
        $order
    );
    $stamps = $stmps["stamps"];
    $stampsN = $stmps["stampsN"];
}
?>
<div class="container">
    <div class="row justify-content-center">
   <?php 
   if($without_project==0){
    if (!isset($progressPR)) {
        if (session("work_now") !== null) {
            $progressPR = ceil(
                \App\Http\Controllers\ProjectController::progress(
                    session("work_now")["project"]
                )
            );
        } else {
            $progressPR = 0;
            }
        } else {
            $progressPR = ceil($progressPR);
        } 
    }
    ?>
        <h1>{!!$blank->name!!} </h1> 
    <div class="row">
        <div class="col-md-12">
            <div class="progress">
            <div class="progress-bar bg-info " role="progressbar" style="width: {{$progressPR}}%" aria-valuenow="{{$progressPR}}" aria-valuemin="0" aria-valuemax="100">{{$progressPR}}%</div>
            </div>
            <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{$progress['pr']}}%" aria-valuenow="{{$progress['pr']}}" aria-valuemin="0" aria-valuemax="100">{{$progress['pr']}}%</div>
            </div>
        </div>
      
    </div>     
 
    @if($items->currentPage() >1)
    <div class="accordion" id="accordionPrivItem">
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv" aria-expanded="false" aria-controls="collapsePriv">
                {{__("Show privious item")}}
            
              </button>
            </h4>
            <div id="collapsePriv" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionPrivItem" style="">
              <div class="accordion-body">
                <div class="col">
                    $prevItem->content
                </div>
                <div class="col">
                    <form action="{{$items->previousPageUrl()}}" method="post">
                        @csrf
                                              <button type="submit" class="btn">
                            <x-icon.main :name="'undo'" :size=3 :color="'green'"/>  
                        </button>
                    </form>
                </div>
                
                
               </div>
            </div>
          </div>
        </div>           
    @endif
  
    <div class="row alert alert-info"  style="background-color:{{$blank->color}}">
             <div class="col-md-9 border"><h1>{!!$item->content!!}</h1>   </div>
             <div class="col-md-2 ">
                @foreach($item->positions as $position)   
                     {!!$position->abv!!}
                @endforeach
             </div>
             <div class="col-md-1">
                <form action="@if($items ->NextPageUrl())
                {{$items ->NextPageUrl()}}
                @else
                ?finish={!!$order!!}
                @endif
                " method="post">
                            @csrf
                            <input type="hidden" name="order" value="{!!$order!!}">
                                <button type="submit" class="btn">
                               <x-icon.main :name="'check-circled'" :size=3 :color="'green'"/> 
                            </button>
                </form>
            </div>
          
   </div>
@if($item->problems->count()>0)
<div class="row alert alert-danger">
        <div class="col-md-12 border">
            <h1>Problems:</h1>   
        </div>
    </div>
@endif
    @foreach($item->problems as $problem)
    <div class="row alert alert-danger">
        <div class="row">
            <div class="card  col-md-2">what</div>
        </div>
        <div class="row">
            <div class="col-md-12 border">
                <h2>{!!$problem->content!!}</h2>   
            </div>
        </div>
        
    </div>
    <div class="row alert alert-warning">
    <div class="row">
            <div class="card col-md-2">how</div>
        </div>
        <div class="row">
            <div class="col-md-12 border">
                <h3>{!!$problem->desition!!}</h3>   
            </div>
        </div>
     </div>
    @endforeach
    <div class="row">
<a class="btn btn-info"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        <x-icon.main :name="'unique-idea'" :size=3 :color="'green'"/>
        {{__("mainf.newidea")}}
        </a>
</div>
    <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{__("mainf.createitem")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
                
                <div class="modal-body">
            <form action="{{route('problem.store')}}" name="problemF" id="problemF" method="post">
                @csrf
                @isset($blank) 
                <input type="hidden" name="blank" id="blank" value="{{$blank->id}}">
                @endif
                @isset($item->id) 
                <input type="hidden" name="item_id" id="blank" value="{{$item->id}}">
                @endif
                <input type="hidden" name="order" value="{!!$order-1!!}">
                    <div class="form-group">
                    <label for="desition">{{__("mainf.nameprobl")}}</label>
                    <input type="text" name="desition" id="desition" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">{{__("mainf.contentp")}}</label>
                    <textarea name="content" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <legend>{{__("mainf.status")}}</legend>

                <div class="form-check">
                    <input type="radio" name="status" id="status1" value="0"  class="form-check-input">
                    <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
                </div><div class="form-check">
                        <input type="radio" name="status" id="status2" value="1" checked  class="form-check-input">
                        <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
                </div><div class="form-check">
                        <input type="radio" name="status" id="status3" value="2"   class="form-check-input">
                        <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
                </div>
                <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'unique-idea'" :size=3 :color="'yellow'"/>
                </button>
            </form>

               </div>
               
                </div>
            </div>
     </div>
     <div class="row">
         <div class="col-md-12 small">
               <h3>{{__("mainf.nextitem")}}</h3>
            
            </div> 
     </div>
     @if ($items->nextPageUrl())
    <div class="accordion" id="accordionNextItem">
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNext" aria-expanded="false" aria-controls="collapseNext">
                {{__("Show next item")}}
              </button>
            </h4>
            <div id="collapseNext" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionNextItem" style="">
              <div class="accordion-body">
                <div class="col">
                {{ $items->nextPageUrl() }}
               $nextItem ->content
                </div>
               </div>
            </div>
          </div>
        </div>           
    @endif
 </div>
 </div>

<script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
   
    </script>
@endsection