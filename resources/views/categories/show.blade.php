@extends('layouts.app')
@section('title', __("Show category"))
@section('type', "categories")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link index-->
        <a href="{{route('categories.index')}}" class='btn'>
            <x-icon.main :name="'list'" :size=3 :color="'blue'"/>
        </a>
        <!-- show category -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><H1>{!!$category->name!!}</H1></div>
                <div class="card-body">
                    <h3>{!! $category->description !!}</h3>
                    <p>slug : {!!$category->slug!!}</p>
                    <div class="row">
                        @if($category->author_id == Auth::user()->id)
                        <div class="col-md-4"><a href="{{route('blanks.create')}}?category={!!$category->id!!}">
                        <x-icon.main :name="'newspaper'" :size=3 :color="'blue'"/>    
                        </a></div>
                        <div class="col-md-4"><a href="{{route('categories.edit', $category->id)}}" class='btn'>
                        <x-icon.main :name="'pencil'" :size=3 :color="'green'"/>
                        </a></div>
                        <div class="col-md-4"><form action="{{route('categories.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">
                            <x-icon.main :name="'trash'" :size=3 :color="'red'"/>
                            </button>
                        </form></div>
                         @else
                         <div class="col-md-12">
                             <p class="bg-warning">{{__("mainf.not_your_category")}}</p>
                            <p>{{__("mainf.author")}}: {{$category->author->name}}</p>
                            <a href="{{route('categories.addexamplecategory', $category->id)}}" class='btn'>
                                <x-icon.main :name="'database-add'" :size=3 :color="'green'"/>  
                            </a>
                         </div>
                           
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blanks as $blank)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{!!$blank->name!!}
                        <a href="{{route('blanks.show',$blank->id)}}">
                    <x-icon.main :name="'hand-drawn-alt-right'" :size=3 :color="'blue'"/>
                    </a>
                        </div>
                        <div class="card-body">
                            <p>{!!$blank->tcheme!!}</p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('categories.addblanks', $category->id)}}" class='btn'>
                    <x-icon.main :name="'sub-listing'" :size=5 :color="'blue'"/>
                    Add blank (exist)
                </a>
                </div>
            </div>
        </div> 
      
        

    </div>
</div>

@endsection