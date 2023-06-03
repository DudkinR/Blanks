@extends('layouts.app')
@section('title', __("Add items"))
@section('type', "projects")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('item.index')}}" class='btn'>Back to item</a>
        <!-- form to create new category -->
        <form action="{{route('position.additemposition')}}" method="post">
            @csrf
            @isset($item) 
             <input type="hidden" name="item" id="item" value="{{$item}}" class="form-control">
            @endif
            @isset($uni) 
             <input type="hidden" name="uni" id="uni" value="{{$uni}}" class="form-control">
            @endif
            @isset($blank) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            @isset($positions) 
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="positions">Positions</label>
                    <select name="positions[]" id="positions" class="form-control" multiple>
                        @foreach($positions as $position)
                            <option value="{{$position->id}}"> {{$position->abv}} - {{$position->name}}  </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-primary" title="Add to positions">
            <x-icon.main :name="'labour'" :size=3 :color="'green'"/>
            </button>
        </form>
    </div>
</div>
@endsection