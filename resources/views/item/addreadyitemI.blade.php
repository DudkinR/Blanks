@extends('layouts.app')
@section('title', __("Add ready 2 Items"))
@section('type', "items")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('item.index')}}" class='btn'>Back to item</a>
        <!-- form to create new category -->
        <form action="{{route('item.addreadyitemsI')}}" method="post">
            @csrf
            @isset($item) 
             <input type="hidden" name="item" id="item" value="{{$item}}" class="form-control">
            @endif
            @isset($ready_items) 
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="ready_items">Ready items</label>
                    <select name="items[]" id="items" class="form-control" multiple>
                        @foreach($ready_items as $item)
                            <option value="{{$item->id}}">{{$item->name}} -  {{$item->content}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Add to blank</button>
        </form>
    </div>
</div>
@endsection