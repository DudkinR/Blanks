@extends('layouts.app')
@section('title', __("Create new blank"))
@section('type', "blanks")
<?php
if(isset($_GET['category']))
$cat=$_GET['category'];
else
$cat=0;
?>
@section('content')
<div class="container">
<h1>{!!__("mainf.createblank")!!}</h1>
    <div class="row justify-content-center">
    <!-- add form create blank -->
    <form action="{{route('blanks.store')}}" method="post" class="" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">{{__("blanks.Name")}}</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <!-- add description -->
        <div class="form-group">
            <label for="description">{{__("Description")}}</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter the Description" class="form-control"></textarea>
        </div>


        <!-- add tcheme -->
        <div class="form-group">
            <label for="tcheme">{{__("blanks.Tcheme")}}</label>
            <input type="text" name="tcheme" id="tcheme" class="form-control" required>
        </div>
        <!-- add start -->
                <div class="form-group">
            <label for="tcheme">{{__("Start number")}}</label>
            <input type="number" name="start" id="start" class="form-control" value=100 required>
        </div>
        <!-- add цвета -->
        <div class="row">
            <div class="form-group col-md-11">
                <label for="color_blank">{{__("blanks.Color")}}</label>
                <input type="color" name="color" id="color_blank" value="#ffffff" class="form-control" required>
            </div>
            <div class="col-md-1">
            <a href="{{route('help',['color'])}}"><x-icon.main :name="'ui-text-chat'" :size=3 :color="'blue'"/></a>
            </div>
        </div>
        

        <!-- select multiple categories -->
        <div class="form-group">

            <label for="categories">{{__("blanks.Categories")}}</label>
            <select name="categories[]" id="categories" class="form-control" multiple required>
                
                @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        @if($category->id==$cat) 
                            selected="selected"
                        @endif
                        >{{$category->name}}
                        </option>
                @endforeach
            </select>
        </div>
        <!-- select multiple position -->
        <div class="form-group">
            <label for="positions">
               
                <a href="{{route('position.create')}}">
                  {{__("blanks.Position")}}     <x-icon.main :name="'plus'" :size=1 :color="'blue'"/>
                </a>
            </label>
           
            <select name="positions[]" id="positions" class="form-control" multiple required>
                @foreach($positions as $posn)
                   <option value="{{$posn->id}}"
                        @if(in_array($posn->id,$position)) 
                            selected="selected"
                        @endif
                        >{{$posn->abv}} -  {{$posn->name}}
                        </option>
                @endforeach
            </select>
        </div>
        <!-- status form-group -->
        
        <legend>{{__("mainf.status")}}</legend>

        <div class="form-check">
            <input type="radio" name="status" id="status1" value="0" 
            @if(session('status'))
                @if(session('status') == 0)
                    checked
                @endif
            @endif
            class="form-check-input">
            <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
        </div>
        <div class="form-check">
                <input type="radio" name="status" id="status2" value="1" 
                @if(session('status'))
                @if(session('status') == 1)
                    checked
                @endif
                @else
                    checked
            @endif
                class="form-check-input">
                <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
        </div>
        <div class="form-check">
                <input type="radio" name="status" onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')" id="status3" value="2"  
                @if(session('status'))
                @if(session('status') == 2)
                    checked
                @endif
            @endif
                class="form-check-input">
                <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
        </div>
        @if(isset($items)&&count($items)>0)
                <!-- select multiple items -->
                <div class="form-group">
            <label for="items">{{__("blanks.Categories")}}</label>
            <select name="items[]" id="items" class="form-control"  multiple >
                @foreach($items as $item)
                    <option value="{{$item->id}}"
                        selected="selected"
                    >{{$item->name}}
                </option>
                @endforeach
            </select>
        </div>
        @endif
        <button type="submit" class="btn btn-primary btn-blok">
            <x-icon.main :name="'tick-boxed'" :size=3 :color="'yellow'"/>
        </button>

    </form>
    </div>
</div>
<script>
    const inputField = document.getElementById('name');
    const outputField = document.getElementById('tcheme');

    inputField.addEventListener('input', (event) => {
    let inputValue = event.target.value;

    if (inputValue.length > 10) {
        inputValue = inputValue.substring(0, 10);
    }

    outputField.value = inputValue;
    });

    outputField.addEventListener('input', (event) => {
    const outputValue = event.target.value;

    // if output value is changed, do something
    });
</script>
@endsection