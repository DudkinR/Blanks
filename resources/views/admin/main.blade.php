@extends('layouts.app')
@section('title', __("Admin"))
@section('content')
@auth
<?php $cruser = \App\Models\User::with("roles")
    ->with("profile")
    ->find(\Illuminate\Support\Facades\Auth::id()); ?>
@endif
<div class="row">
@if($cruser->isAdmin())
            <div class="col-md-2"><a href="{{route('admin')}}" class="btn" target="_blank" title="{{__('menu.adm')}}">{{__('menu.adm')}}
                        <x-icon.main :name="'dog'" :size="'10'" :color="'#626262'" /></a></div> 

            <div class="col-md-2"><a href="{{route('bootstrap')}}" class="btn" target="_blank" title="{{__('menu.bootstrap')}}">{{__('menu.bootstrap')}}
                        <x-icon.main :name="'dog'" :size="'10'" :color="'#626262'" /></a></div> 
            <div class="col-md-2"><a href="{{route('test')}}" class="btn" target="_blank" title="{{__('menu.test')}}">{{__('menu.test')}}
                        <x-icon.main :name="'cat'" :size="'10'" :color="'#626262'" /></a></div> 
            <div class="col-md-2"><a href="{{route('icons')}}" class="btn" target="_blank" title="{{__('menu.icons')}}">{{__('menu.icons')}}
                        <x-icon.main :name="'bird'" :size="'10'" :color="'#626262'" /></a></div> 
            <div class="col-md-2"><a href="{{route('ajax')}}" class="btn" target="_blank" title="{{__('menu.ajax')}}">{{__('menu.ajax')}}
                        <x-icon.main :name="'pig'" :size="'10'" :color="'#626262'" /></a></div> 
            <div class="col-md-2"><a href="{{route('icons.show')}}" class="btn" target="_blank" title="{{__('menu.icons.show')}}">{{__('menu.icons.show')}}
                <x-icon.main :name="'cow'" :size="'10'" :color="'#626262'" /></a></div> 
            <div class="col-md-2"><a href="{{route('clear-cache')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.cleancache1')}}">{{__('menu.cleancache1')}}
                <x-icon.main :name="'rat'" :size="'10'" :color="'#626262'" /></a></div> 
                
            <div class="col-md-2"><a href="{{route('clear-config')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.config')}}">{{__('menu.config')}}
                <x-icon.main :name="'dolphin'" :size="'10'" :color="'#626262'" /></a></div> 
                
            <div class="col-md-2"><a href="{{route('clear-route')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.route')}}">{{__('menu.route')}}
                <x-icon.main :name="'crocodile'" :size="'10'" :color="'#626262'" /></a></div> 
                
            <div class="col-md-2"><a href="{{route('clear-view')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.view')}}">{{__('menu.view')}}
                <x-icon.main :name="'elk'" :size="'10'" :color="'#626262'" /></a></div> 
                
            <div class="col-md-2"><a href="{{route('clear-compiled')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.compiled')}}">{{__('menu.compiled')}}
                <x-icon.main :name="'elephant'" :size="'10'" :color="'#626262'" /></a></div> 

                <div class="col-md-2"><a href="{{route('clear-optimize')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.optimize')}}">{{__('menu.optimize')}}
                <x-icon.main :name="'froggy'" :size="'10'" :color="'#626262'" /></a></div> 

                <div class="col-md-2"><a href="{{route('clear-full')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.full')}}">{{__('menu.full')}}
                <x-icon.main :name="'fox'" :size="'10'" :color="'#626262'" /></a></div> 

                <div class="col-md-2"><a href="{{route('clear-all')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.all')}}">{{__('menu.all')}}
                <x-icon.main :name="'giraffe'" :size="'10'" :color="'#626262'" /></a></div> 

                <div class="col-md-2"><a href="{{route('ses')}}" target="_blank" class="btn" target="_blank" title="{{__('menu.ses')}}">{{__('menu.ses')}}
                <x-icon.main :name="'skull-danger'" :size="'10'" :color="'#626262'" /></a></div> 
            @endif
</div>
@endsection