@extends('layouts.app')
@section('title', __("Looks"))
@section('content')
<?php
    if(session("project")!==null)
        $project_current = \App\Models\Project::find(session("project"));
    else
     $project_current->name ="new project";
?>
<div class="container">
    <div class="row justify-content-center">
     <H1>{{__("Looks")}}</H1>
           
    <form action="{{route('looks.search')}}" method="post">
            @csrf
            <div class="row">
            <div class="col-1">
            <div class="form-switch ">
                <input type="checkbox" name="cats" id="cats" value="1" @if((isset($sw['cats'])&&$sw['cats']==1)||isset($_GET['cats'])) checked  @endif class="form-check-input">
                <label class="form-check-label" for="cats">{{__("Category")}}</label>
            </div>
            </div>
            <div class="col-1">
            <div class="form-switch ">
                <input type="checkbox" name="projects" id="projects" value="1"   @if((isset($sw['projects'])&&$sw['projects']==1)||isset($_GET['projects'])) checked  @endif   class="form-check-input">
                <label class="form-check-label" for="projects">{{__("Projects")}}</label>
            </div>
            </div>
            <div class="col-1">
            <div class="form-switch ">
                <input type="checkbox" name="blanks" id="blanks" value="1"   @if((isset($sw['blanks'])&&$sw['blanks']==1)||isset($_GET['blanks'])) checked  @endif   class="form-check-input">
                <label class="form-check-label" for="blanks">{{__(" Blanks")}}</label>
            </div>
            </div>
            <div class="col-1">
            <div class="form-switch ">
                <input type="checkbox" name="items" id="items" value="1"   @if((isset($sw['items'])&&$sw['items']==1)||isset($_GET['items'])) checked  @endif   class="form-check-input">
                <label class="form-check-label" for="items">{{__("Items")}}</label>
            </div>
            </div>
            
            <div class="col-1">
            <div class="form-switch ">
                <input type="checkbox" name="positions" id="positions" value="1"   @if((isset($sw['positions'])&&$sw['positions']==1)||isset($_GET['positions'])) checked  @endif   class="form-check-input">
                <label class="form-check-label" for="positions">{{__("Positions")}}</label>
            </div>
            </div>

            <div class="col-1">
            <div class="form-switch ">
                <input type="checkbox" name="all" id="all" class="form-check-input">
                <label class="form-check-label" for="all">{{__("All")}}</label>
            </div>
            </div>
        </div>
            <div class="row">
               
            <div class="form-group col-md-10">
                <label for="name">
                {!!__("mainf.search")!!} 
                </label>
                <input type="text" name="search" id="search" value="@isset($words){{$words}}@endif" class="form-control">
            </div>  
            <div class="col-md-2">
                <button type="submit" class="btn">
                <x-icon.main :name="'search'" :size=3 :color="'black'" />
                </button>
            </div>
            </div>
    </form>
     @isset($search)
     @foreach($search as $result)
    <div class="row border">
        @if($result[0]==0)
        <div class="col-md-12">
            <h1>{{__('Category')}} - {{$result[4]}} </h1>
            <a href="{{route('categories.show',$result[1])}}" title=" {{$result[3]}} ">{{$result[2]}} </a>
        </div>
        @elseif($result[0]==1)
        <div class="col-md-12">
            <h1>{{__('Project')}} - {{$result[4]}} </h1>
            <a href="{{route('project.show',$result[1])}}" title=" {{$result[3]}} ">{{$result[2]}} </a>
        </div>
        @elseif($result[0]==2)
        <div class="col-md-12">
            <h1>{{__('Position')}} - {{$result[4]}} </h1>
            <a href="{{route('position.show',$result[1])}}" title=" {{$result[3]}} ">{{$result[2]}} </a>
        </div>
        @elseif($result[0]==3)
        <div class="col-md-12">
            <h1>{{__('Blank')}} - {{$result[4]}} </h1>
            <a href="{{route('blanks.show',$result[1])}}" title=" {{$result[3]}} ">{{$result[2]}} </a>
            <?php
            $blank=\App\Models\Blank::find( $result[1]);
            $bl_id=$blank->id;

            ?>
            @if($blank->status==0) 
                    ( {{__("mainf.draft")}} )
                    <a href="{{route('blanks.edit',$bl_id)}}">
                        <x-icon.main :name="'pencil'" :size=2 :color="'black'" />
                    </a>

                    @elseif($blank->status==1&&$blank->items->count()>0) 
                    ( {{__("mainf.onlymy")}} )
                    <a  onclick="if (confirm('{{__('mainf.addblanktoproject')}} : {{$project_current->name}}')) {fetchwork({{$bl_id}}); }">
                        <x-icon.main :name="'plus'" :size=2 :color="'black'" />
                    </a>
                    
                    @elseif($blank->status==2&&$blank->items->count()>0) 
                    ( {{__("mainf.free")}} )
                    <a  onclick="if (confirm('{{__('mainf.addblanktoproject')}} : {{$project_current->name}}')) {fetchwork({{$bl_id}}); }">
                        <x-icon.main :name="'plus'" :size=2 :color="'black'" />
                    </a>
                    @elseif($blank->author_id == Auth::id()&&$blank->items->count()==0) 
                    ( {{__("Need to feel blank")}} )
                    <a href="{{route('blanks.show',$bl_id)}}" class="btn">
                            <x-icon.main :name="'ui-settings'" :size=2 :color="'black'"/>   
                        </a>
            @endif

        </div>
        @elseif($result[0]==4)
        <div class="col-md-12">
            <h1>{{__('Item')}} - {{$result[4]}} </h1>
            <a href="{{route('item.show',$result[1])}}" title=" {{$result[3]}} ">{{$result[2]}} </a>
        </div>
        @endif
    </div> 
    @endforeach
    @endif
    </div>
</div>
@endsection