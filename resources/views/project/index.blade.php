@extends('layouts.app')
@section('title', __("Avable Projects"))
@section('type', "projects")

@section('content')
<?php if (isset($_GET["cat"]) && $_GET["cat"] !== null) {
    $currentcat = $_GET["cat"];
} else {
    $currentcat = 0;
} ?>
<div class="container">
   
    <div class="row">
        <form action="{{route('project.index')}}" id="formsearchwords" method="get">
            <div class="col-md-12">
                <label for="searchwords" class="form-label">{{__("mainf.search")}}</label>
                <div class="input-group">
                    <input type="hidden" name="cat" value="{{$currentcat}}">
                <input type="text" class="form-control" id="searchwords" @if(session('searchW')!==null) value="{{session('searchW')}}" @endif name="searchwords" >
                <span class="input-group-text" id="searchwords">
                    <a onclick="event.preventDefault(); document.getElementById('formsearchwords').submit();">
                        <x-icon.main :name="'search-2'" :size=2 :color="'grey'"/> 
                    </a>
                </span>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">

        <!-- create link to create new category -->
        <?php $string_title =
            __("mainf.create") . " " . mb_strtolower(__("mainf.project")); ?>
        <a href="{{route('project.create')}}" class='btn' title='{{$string_title}}'>
            <x-icon.main :name="'plus'" :size=3 :color="'blue'"/>
        </a>
        @foreach ($projects as $project)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header
                @if($project->status==0) 
                bg-danger 
                @elseif($project->status==1) 
                bg-primary 
                @elseif($project->status==2) 
                bg-success
                @endif
                ">{!!$project->name!!}
                @if($project->status==0) 
               ( {{__("mainf.draft")}} )
                @elseif($project->status==1) 
                ( {{__("mainf.onlymy")}} )
                @elseif($project->status==2) 
                ( {{__("mainf.free")}} )
                @endif
                <?php
                $work_do= $project->blanks->where('pivot.type','>',0)->count();
                $work_not_do= $project->blanks->where('pivot.type','=',0)->count();
                ?>
            </div>
                    <div class="card-header">
                        {!!$project->name!!}
                        @if($work_do>0)
                        <x-icon.mytext :text="'MAKE'" :bg="'green'" :color="'yellow'" :size=1 />
                        @endif
                        @if($work_not_do>0)
                        <x-icon.mytext :text="'NEW'" :bg="'red'" :color="'yellow'" :size=1 />
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                        
                        @if($project->author_id == Auth::id())
                            <div class="col-md-4"><a href="{{route('project.show', $project->id)}}" class='btn' title='{{__("mainf.show")}}'>
                            <x-icon.main :name="'eye'" :size=3 :color="'blue'"/>    
                        </a></div>
                            <div class="col-md-4"><a href="{{route('project.edit', $project->id)}}" class='btn'  title='{{__("mainf.edit")}}'>
                            <x-icon.main :name="'pencil'" :size=3 :color="'green'"/>
                        </a></div>
                            <div class="col-md-4"><form action="{{route('project.destroy', $project->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class='btn' title='{{__("mainf.delete")}}'>
                            <x-icon.main :name="'trash'" :size=3 :color="'red'"/>    
                            </button>
                        </form></div>
                        @else
                        <div class="col-md-4"><a href="{{route('project.show_guest', $project->id)}}" class='btn' title='{{__("mainf.show")}}'>
                            <x-icon.main :name="'eye'" :size=3 :color="'blue'"/>    
                        </a></div>
                        @endif
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        @endforeach
        

    </div>
</div>
@endsection