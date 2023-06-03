@extends('layouts.app')
@section('title', __("Create idea "))
@section('type', "ideaconditions"))

@section('content')
<div class="container">
<h1>{!!__("mainf.createidea")!!}</h1>
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('idea.index')}}" class='btn'>
         <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
         </a>
        <!--  link to  back page -->
        @isset($blank) 
        <a href="{{route('blanks.show', $blank)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>
        @endif
        @isset($item) 
        <a href="{{route('item.show', $item)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>            
        @endif
        @isset($uni) 
        <a href="{{route('item.show', $uni)}}" class='btn'>
        <x-icon.main :name="'back'" :size=3 :color="'blue'"/>
        </a>
        @endif
        <!-- form to create new category -->
        <form action="{{route('idea.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="content">
                    {{__('mainf.idea')}}
                </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
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
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'save'" :size=3 :color="'blue'"/>
                {{__('mainf.save')}}
            </button>
        </form>
    </div>
</div><script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endsection