@extends('layouts.app')
@section('title', __("Create stamp conditions"))
@section('type', "startconditions"))

@section('content')
<div class="container">
<h1>{!!__("mainf.createstamp")!!}</h1>
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('stamp.index')}}" class='btn'>
         <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
         </a>
        <!--  link to  back page -->
        @isset($blank) 
        <a href="{{route('blanks.show', $blank)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>
        @endif
        <!-- form to create new category -->
        <form action="{{route('stamp.store')}}" method="post">
            @csrf
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            <div class="form-group">
                <label for="content">
                    {{__('mainf.stamp')}}
                </label>
                <input type="string" name="content" id="content" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'save'" :size=3 :color="'blue'"/>
                {{__('mainf.save')}}
            </button>
        </form>
    </div>
</div>
@endsection