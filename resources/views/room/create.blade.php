@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('categories.index')}}" class='btn'>Back to categories</a>
        <!-- form to create new category -->
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <!-- slug form-group -->
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>
            <!-- parent_id form-group -->
            <div class="form-group">
                <label for="parent_id">Parent_id</label>
                <input type="text" name="parent_id" id="parent_id" class="form-control">
            </div>
            <!-- image form-group -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>
            <!-- status form-group -->

            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" selected class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2"  class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status3"  class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>


        

    </div>
</div>
@endsection