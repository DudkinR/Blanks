@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- add form create blank -->
    <form action="{{route('categories.belongsBlank',$category->id)}}" method="post">
        @csrf
               <!-- select multiple categories -->
        <div class="form-group">
            <label for="categories">Blanks</label>
            <select name="blanks[]" id="blanks" class="form-control" multiple>
                @foreach($blanks as $blank)
                    <option value="{{$blank->id}}">{!!$blank->name!!}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        
    </form>
    </div>
</div>
@endsection