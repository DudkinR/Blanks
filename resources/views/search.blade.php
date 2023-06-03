@extends('layouts.app')
@section('title', 'Название страницы')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('search')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="desition">Words</label>
                <input type="text" name="words" id="words" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>
@endsection