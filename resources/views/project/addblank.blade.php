@extends('layouts.app')
@section('title', __("Add blank to Project"))
@section('type', "projects")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('item.index')}}" class='btn'>Back to item</a>
        <!-- form to create new category -->
        <form action="{{route('position.addblankposition')}}" method="post">
            @csrf
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
            <button type="submit" class="btn btn-primary">Add to positions</button>
        </form>
    </div>
</div>
@endsection