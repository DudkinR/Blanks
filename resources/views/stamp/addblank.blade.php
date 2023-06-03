@extends('layouts.app')
@section('title', __("Add avalable stamps to blank"))
@section('type', "stamps"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('blanks.show',$blank->id)}}" class='btn'>Back to blank</a>
        <!-- form to create new category -->
        <form action="{{route('stamp.addblankstamp')}}" method="post">
            @csrf
            @isset($blank) 
             <input type="hidden" name="blank_id" id="blank" value="{{$blank->id}}" class="form-control">
            @endif
            @isset($words) 
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="stamps">{{__("Posible var")}}</label>
                    <select name="stamps[]" id="stamps" class="form-control" size=20 multiple>
                        @foreach($words as $stamp)
                            <option value="{{$stamp}}" @if(in_array($stamp,$stamps)) selected @endif > {{$stamp}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Add to stamps</button>
        </form>
    </div>
</div>
@endsection