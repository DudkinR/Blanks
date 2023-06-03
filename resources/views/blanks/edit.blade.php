@extends('layouts.app')
@section('title', __("Edit blank"))
@section('type', "blanks")

@section('content')
<div class="container">
<h1>{!!__("mainf.editblank")!!}</h1>
    <div class="row justify-content-center">
        <!-- return errors --> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- add form edit blank -->
    <form action="{{route('blanks.update',$blank->id)}}" method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">{{__("blanks.Name")}}</label>
            <input type="text" value="{{$blank->name}}" name="name" id="name" class="form-control">
        </div>
        <!-- add description -->
        <div class="form-group">
            <label for="description">{{__("Description")}}</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter the Description" class="form-control">{{$blank->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="tcheme">{{__("blanks.Tcheme")}}</label>
            <input type="text" name="tcheme" id="tcheme"  value="{{$blank->tcheme}}" class="form-control">
        </div>
        <!-- add start -->
        <div class="form-group">
            <label for="tcheme">{{__("Start number")}}</label>
            <input type="number" name="start" id="start" class="form-control" value="{{$blank->start}}" required>
        </div>
                <!-- add цвета -->
        <div class="row">
            <div class="form-group col-md-11">
                <label for="color_blank">{{__("blanks.Color")}}</label>
                <input type="color" name="color" id="color_blank" value="{{$blank->color}}" class="form-control" required>
            </div>
            <div class="col-md-1">
            <a href="{{route('help',['color'])}}"><x-icon.main :name="'ui-text-chat'" :size=3 :color="'blue'"/></a>
            </div>
        </div>
        <!-- select multiple categories -->
        <h1>How categories :</h1>
        <?php $myc = []; ?>
        @foreach($blank->categories as $category)
            <p>{{$category->id}} - {{$category->name}}</p>
            <?php $myc[] = $category->id; ?>
        @endforeach

        <div class="form-group">
            <label for="categories">{{__("blanks.Categories")}}</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach($categories as $category)
                    @if(session("work_categories")!==null&&in_array($category->id,session("work_categories")))
                        <option value="{{$category->id}}"
                        @if($category->id==$category_id) 
                            selected="selected"
                        @endif
                        >{{$category->name}}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <?php $myp = []; ?>
        @foreach($blank->positions as $position)
            <p>{{$position->id}} - {{$position->abv}}</p>
            <?php $myp[] = $position->id; ?>
        @endforeach
        <div class="form-group">
            <label for="positions">{{__("blanks.Position")}}</label>
            <select name="positions[]" id="positions" class="form-control" multiple>
                @foreach($positions as $posn)
                    @if(session("work_positions")!==null&&in_array($posn->id,session("work_positions")))
                        <option value="{{$posn->id}}"
                        @if(in_array($posn->id,$position)) 
                            selected="selected"
                        @endif
                        >{{$posn->abv}} -  {{$posn->name}}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
            <legend>{{__("mainf.status")}}</legend>

        <div class="form-check">
            <input type="radio" name="status" id="status1" value="0" @if($blank->status==0) checked @endif class="form-check-input">
            <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
        </div><div class="form-check">
                <input type="radio" name="status" id="status2" value="1" @if($blank->status==1) checked @endif  class="form-check-input">
                <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
        </div><div class="form-check">
                <input type="radio" name="status" id="status3"  onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  value="2" @if($blank->status==2) checked @endif  class="form-check-input">
                <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
        </div>
        <div class="btn-group w-100 align-items-center justify-content-between flex-wrap">
        <button type="submit" class="btn btn-primary"><x-icon.main :name="'ui-edit'" :size=3 :color="'blue'"/></button>
        </div>
    </form>
    </div>
</div>
@endsection