@extends('layouts.app')
@section('title', __("Edit idea conditions"))
@section('type', "ideaconditions"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back idea -->
        <a href="{{route('idea.index')}}" class='btn'>
        <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
        </a>
    
        <form action="{{route('idea.update',$idea->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">
                    {{__('mainf.idea')}}
                </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$idea->content}}</textarea>
            </div>
            <?php $my_categories = App\Models\Category::where(
                "author_id",
                Auth::user()->id
            )->get(); ?>
            <div class="form-group">
                <label for="category_id">
                    {{__('mainf.category')}}
                </label>
                <select name="category" id="category_id" class="form-control">
                    @foreach($my_categories as $category)
                    <option value="{{$category->id}}" @if($idea->category==$category->id)  selected @endif >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <!--  status radio button 0 не просмотрен 1 просмотрен 2 в работе 3 закрыт 4 забыт -->
            <div class="form-group">
                <label for="status">
                    {{__('mainf.status')}}
                </label>
                <select name="status" id="status" class="form-control">
                    <option value="0" @if($idea->status==0)  selected @endif >{{__('mainf.notviewed')}}</option>
                    <option value="1" @if($idea->status==1)  selected @endif >{{__('mainf.viewed')}}</option>
                    <option value="2" @if($idea->status==2)  selected @endif >{{__('mainf.inwork')}}</option>
                    <option value="3" @if($idea->status==3)  selected @endif >{{__('mainf.closed')}}</option>
                    <option value="4" @if($idea->status==4)  selected @endif >{{__('mainf.forget')}}</option>
                </select>
            </div>
            
                <button type="submit" class="btn btn-primary">
                    <x-icon.main :name="'tick-boxed'" :size=3 :color="'yellow'"/>
                </button>
                </form>
                </div>
            
        </form>   
     
       
    </div>
</div>
<script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endsection