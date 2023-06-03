@extends('layouts.app')
@section('title', __("All Items"))
@section('type', "items")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @isset($_GET['message'])
        <div class="row">
            <div class="col-md-12 bg-danger">
                <h1>{{$_GET['message']}}</h1>
            </div>
        </div>

        @endisset
        <div class="">

            <h1>{{__("mainf.mycat")}}
                <a href="{{route('categories.index')}}" class="btn" title="{{__('mainf.lookcategory')}}">
                <x-icon.main :name="'search-2'" :size="'2'" :color="'grey'" /></a>
                <a href="{{route('categories.create')}}" class="btn" title="{{__('mainf.addkcategory')}}">
                <x-icon.main :name="'plus'" :size="'2'" :color="'grey'" /></a>
            </h1>
             @foreach ($categories as $category)
             <?php
             $color = "black";
             if ($category->status == 0) {
                 $color = "yellow";
                 $ctext = "danger";
             } elseif ($category->status == 1) {
                 $color = "yellow";
                 $ctext = "info";
             } elseif ($category->status == 2) {
                 $color = "yellow";
                 $ctext = "success";
             } else {
                 $color = "black";
             }
             ?>
             
             <a href="{{route('item.index')}}?cat={{$category->id}}" class="btn btn-{{$ctext}}" title="{{$category->name}}">
             @if(isset($category->image_own)&&$category->image_own!==null)
                    <x-icon.myicon :data="$category->image_own" :size=3/>
                @else
                    @isset($category->icon->name)
                        <x-icon.main :name="$category->icon->name" :size=2 :color="$color"/>
                    @endif
                @endif	
                
             </a>
             @endforeach
             @if($categories->count()>0)
             
             <a href="{{route('item.index')}}?cat=0" class="btn btn-{{$ctext}}" title="{{__("mainf.all")}}">
                 <x-icon.main :name="'justify-all'" :size=2 :color="$color"/>
                
             </a>
             @endif
        </div>
        <!-- create link to create new item -->
        <a href="{{route('item.create')}}" class='btn'>
            <x-icon.main :name="'plus'" :size=2 :color="'black'"/>
        </a>
        <form action="{{route('item.index')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="searchwords" class="form-label">{{__("Search words")}}</label>
                    <div class="input-group">
                        <input type="text" name="searchwords" id="searchwords" @if(session('searchW')!==null) value="{{session('searchW')}}" @endif aria-describedby="basic-addon2" placeholder="{!!__("Search")!!}" class="form-control">
                        <span class="input-group-text" id="searchwords">
                            <button type="submit" class="btn" id="getCatButton">
                                <x-icon.main :name="'search-2'" :size=1 :color="'blue'"/>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row" id="asi_search">
                @isset($alreadySelectItems)
                    @foreach($alreadySelectItems as $asi)
                        <input type="hidden" name="asi_{{$asi}}" id="asi_{{$asi}}" value="{{$asi}}">
                    @endforeach
                @endif
            </div>
        </form>
        <form action="{{route('blanks.readyitemsform')}}" method="POST">
            @csrf
        @foreach ($items as $item)
            <div class="row">
                <div class="col-md-1">
                <div class="form-check">
                     <input class="form-check-input" name="form_blank_item_{!!$item->id!!}" type="checkbox" value="{!!$item->id!!}">
                </div>
                </div>
                <div class="col-md-2">
                    <p>{!!$item->name!!}</p>
                </div>
                <div class="col-md-5">
                    <p>{!!$item->content!!}</p>
                </div>
                <div class="col-md-2
                @if($item->blanks->count()==0)
                bg-light
                @elseif($item->blanks->count()==1)
                bg-primary
                @else
                bg-warning
                @endif
                ">
                <button type="button"  class='btn'  onclick="AddToForm()">
             <x-icon.main :name="'plus'" :size=1 :color="'red'"/> 
            </button>
                    @if($item->blanks->count()==0)
                        {{__("mainf.notused")}}
                    @else
                        @foreach($item->blanks as $blank)
                        <div class="border">
                            <a href="{{route('blanks.show', $blank->id)}}" class='btn' title="{!!$blank->name!!}">
                            <x-icon.main :name="'eye'" :size=1 :color="'#111'"/>
                            {!!$blank->name!!}
                            </a>  
                        </div>
                        
                        @endforeach
                    @endif
                </div>
                <div class="col-md-1">   
                    <a href="{{route('item.show', $item->id)}}" class='btn'>
                <x-icon.main :name="'eye'" :size=1 :color="'#111'"/>
                </a>
                <a href="{{route('item.edit', $item->id)}}" class='btn'>
                    <x-icon.main :name="'ui-edit'" :size=1 :color="'#111'"/>
                </a>
                <a href="{{route('item.destroy', $item->id)}}"><x-icon.main :name="'ui-delete'" :size=1 :color="'#111'"/></a>
                </div>
            </div>
            <br>
            <hr>
            <br>
        @endforeach
        <div class="row" id="asi_blank">
                @isset($alreadySelectItems)
                    @foreach($alreadySelectItems as $asi)
                        <input type="hidden" name="form_blank_item_{{$asi}}" id="form_blank_item_{{$asi}}" value="{{$asi}}">
                    @endforeach
                @endif
        </div>
      
       

        <div class="row">
            <button type="button"  class='btn'  onclick="AddToForm()">
             <x-icon.main :name="'plus'" :size=5 :color="'red'"/> 
            </button>
        </div> 
        <div class="row">
            <button type="submit"  class='btn'>
             <x-icon.main :name="'book-alt '" :size=5 :color="'green'"/> 
            </button>
        </div>
    </form>

    </div>
</div>
<script>
  function AddToForm(){
    const asi_blank=document.getElementById('asi_blank');
    const asi_search=document.getElementById('asi_search');
    var words = document.querySelectorAll('input[type="checkbox"]');
    words.forEach( function(val){
        if(val.checked==true){
            console.log(val.value);
           var inp_api_blank= document.createElement("input");
            inp_api_blank.value=val.value;
            inp_api_blank.name="asi_"+val.value;
            inp_api_blank.type="hidden";
           var inp_api_search= document.createElement("input");
            inp_api_search.value=val.value;
            inp_api_search.name="asi_"+val.value;
            inp_api_search.type="hidden";

           asi_blank.appendChild(inp_api_blank);
           asi_search.appendChild(inp_api_search);
        }
    });
  }  
</script>
@endsection