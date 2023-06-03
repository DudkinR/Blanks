@extends('layouts.app')
@section('title', __('mainf.mainworkpage'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h1>{{__("text.Main")}}</h1>
      <div class="col-md-4 border projects" >
        <a href="{{route('project.index')}}" class="btn">
          <x-icon.main :name="'repair'"  :size=7 :color="'grey'"/>
        </a>
        <H1>{{__("text.Work_with_projects")}}</H1>
      </div>
      <div class="col-md-4 border blanks">
        
      <a href="{{route('blanks.index')}}" class="btn">
          <x-icon.main :name="'architecture-alt'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__("text.Work_with_blanks")}}</H1>
     
      </div>
      <div class="col-md-4 border categories">
        <a href="{{route('categories.index')}}" class="btn">
          <x-icon.main :name="'chart-flow'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__('text.Work_with_categories')}}</H1>
      </div>
      <div class="col-md-4 border items">
        <a href="{{route('item.index')}}" class="btn">
          <x-icon.main :name="'tools-bag'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__("text.Work_with_items")}}</H1>
     </div>
      <div class="col-md-4 border startconditions">
        <a href="{{route('start.index')}}" class="btn">
          <x-icon.main :name="'ui-pointer'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__("text.Work_with_start_categories")}}</H1>
     </div>
      <div class="col-md-4 border positions">
        <a href="{{route('position.index')}}" class="btn">
          <x-icon.main :name="'workers-group'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__("text.Work_with_positions")}}</H1>
     </div>

     <div class="col-md-4 border profiles">
        <a href="{{route('profile.index')}}" class="btn">
          <x-icon.main :name="'user-alt-3'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__("text.Work_with_profile")}}</H1>
     </div>
     <div class="col-md-4 border settings">
        <a href="{{route('set.index')}}" class="btn">
          <x-icon.main :name="'gears'"  :size=7 :color="'grey'"/>
        </a>
        
        <H1>{{__("text.Work_with_settings")}}</H1>
     </div>
     <div class="col-md-4 border settings">

          <x-icon.main :name="'z777'"  :size=7 :color="'grey'"/>
      
        <H1>{{__("text.Work_with_settings")}}</H1>
     </div>
    </div>
</div>
@endsection