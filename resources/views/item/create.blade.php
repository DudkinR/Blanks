@extends('layouts.app')
@section('title', __("Create new Item"))
@section('type', "items")

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('item.index')}}" class='btn'>Back to item</a>
        <!-- form to create new category -->
        <form action="{{route('item.store')}}" method="post">
            @csrf
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
             <a href="{{route('position.addblankshow',$blank)}}" class='btn'>Add positions</a>
            @endif
            @isset($ready_items) 
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="ready_items">{{__("Ready items")}}</label>
                    <select name="items[]" id="ready_items" class="form-control" multiple>
                        @foreach($ready_items as $item)
                            <option value="{{$item->id}}">{{$item->name}} -  {{$item->content}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @isset($positions)
            
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="positions">{{__("Positions response")}}</label>
                    <select name="positions[]" id="positions" class="form-control" multiple>

                        @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->abv}} -  {{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="controls">{{__("Positions control")}}</label>
                    <select name="controls[]" id="controls" class="form-control" multiple>

                        @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->abv}} -  {{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            @endif
           
            <div class="form-group">
                <label for="name">{{__("Name")}}</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">{{__("Content")}}</label>
                <textarea name="content" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- parent_id form-group -->
            <div class="form-group">
                <label for="parent_id">{{__("Parent")}}</label>
                <input type="text" name="parent_id" id="parent_id" value="0"  class="form-control">
            </div>

         <!-- status form-group -->
  
         <legend>{{__("Status")}}</legend>

        <div class="form-check">
            <input type="radio" name="status" id="status1" value="0" 
            @if(session('status'))
                @if(session('status') == 0)
                    checked
                @endif
            @endif
            class="form-check-input">
            <label class="form-check-label" for="status1">{{__("Draft")}}</label>
        </div><div class="form-check">
                <input type="radio" name="status" id="status2" value="1" 
                @if(session('status'))
                @if(session('status') == 1)
                    checked
                @endif
                @else
                    checked
            @endif
                class="form-check-input">
                <label class="form-check-label" for="status2">{{__("Personal")}}</label>
        </div><div class="form-check">
                <input type="radio" name="status" onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2"  
                @if(session('status'))
                @if(session('status') == 2)
                    checked
                @endif
            @endif
                class="form-check-input">
                <label class="form-check-label" for="status3">{{__("Free")}}</label>
        </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
<script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>

@endsection