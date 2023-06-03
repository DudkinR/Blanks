@extends('layouts.app')
@section('title', __("All blanks"))
@section('type', "blanks")
@section('content')
<?php if (isset($_GET["cat"]) && $_GET["cat"] !== null) {
    $currentcat = $_GET["cat"];
} else {
    $currentcat = 0;
} ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="">

            <h1>{{__("mainf.mycat")}}
                <a href="{{route('categories.create')}}" class="btn" title="{{__('mainf.addñategory')}}">
                <x-icon.main :name="'plus'" :size="'2'" :color="'grey'" /></a>
                <!-- show and hide elements catshow -->
                <a href="#" class="btn" 
                onclick="
                    if(document.getElementById('catshow').style.display=='none')
                        {document.getElementById('catshow').style.display='block';
						document.getElementById('catword').style.display='block';
                    
                        }
                    else
                        {document.getElementById('catshow').style.display='none';
						document.getElementById('catword').style.display='none';
						}
                ">
				<x-icon.main :name="'eye'" :size="'2'" :color="'grey'" /></a>

            </h1>
            <!-- show and hide find input text-->
        <div class="row" id="catword" style="display:none;">
    <div class="col-sm-12">
        <div class="input-group mb-12">
            <input type="text" class="form-control" id="searchcat" name="searchcat" placeholder="{{__('search')}}" aria-label="{{__('search')}}" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" id="button-addon2" onclick="selectcat_word()">
                    <x-icon.main :name="'search-2'" :size="'2'" :color="'grey'" />
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function selectcat_word() {
        var catword = document.getElementById('searchcat').value.trim();

        // separate words
        var words = catword.split(" ");
          // find categories where has any word
        for (var i = 0; i < categories.length; i++) {
           
            var iconId = 'catIcon_' + categories[i].id;
            var iconElement = document.getElementById(iconId);
            iconElement.style.display = 'inline-block';
            // find word in category name
            for (var j = 0; j < words.length; j++) {

                if (categories[i].name.toLowerCase().indexOf(words[j].toLowerCase()) !== -1) {
                    iconElement.style.display = 'inline-block';
                    break;
                }
                else {
					iconElement.style.display = 'none';
				} 
            }
        }
    }

    var categories = [];
</script>
<div class="container">

<div class="row" id="catshow" style="display:none;">
<div class="d-flex flex-wrap">
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
        <script>
            var category = {};
            category.id = '{{ $category->id }}';
            category.name = '{{ $category->name }}';
            categories.push(category);
        </script>

        <div class="col-sm-1 col-xs-4" id="catIcon_{{$category->id}}" style="display: inline-block;">
            <a href="{{route('blanks.index')}}?cat={{$category->id}}" class="btn btn-{{$ctext}}" title="{{$category->name}}">
                @if(isset($category->image_own)&&$category->image_own!==null)
                    <x-icon.myicon :data="$category->image_own" :size=3 :title="$category->name"/>
                @else
                    @isset($category->icon->name)
                        <x-icon.main :name="$category->icon->name" :size=2 :color="$color"/>
                    @endif
                @endif	
            </a>
        </div>
    @endforeach
</div>
</div>
</div>

             </div>
             @if($categories->count()>0)
             
             <a href="{{route('blanks.index')}}?cat=0" class="btn btn-{{$ctext}}" title="{{__("mainf.all")}}">
                 <x-icon.main :name="'justify-all'" :size=2 :color="$color"/>
                
             </a>
             @endif
        </div>
        <!-- create link to create new category -->
        <h1>Blanks 
        @if(isset($_GET['blank']))

        <a href="{{route('blanks.create')}}?blank={{$_GET['blank']}}" class='btn' 
        title="{{__('mainf.create')!!} {!!mb_strtolower(__('mainf.category'))!!}"> 
            <x-icon.main :name="'plus'" :size=2 :color="'grey'"/>
        </a>
        @else
        <a href="{{route('blanks.create')}}@if($currentcat!==0)?category={{$currentcat}}@endif" class='btn'>
        <x-icon.main :name="'plus'" :size=2 :color="'grey'"/>
         </a>
        @endif
        </h1>

        <div class="row">
            <form action="{{route('blanks.index')}}" id="formsearchwords" method="get">
                <div class="col-md-12">
                    <label for="searchwords" class="form-label">{{__("mainf.search")}}</label>
                    <div class="input-group">
                        <input type="hidden" name="cat" value="{{$currentcat}}">
                    <input type="text" class="form-control" id="searchwords" @if(session('searchW')!==null) value="{{session('searchW')}}" @endif name="searchwords" >
                    <span class="input-group-text" id="searchwords">
                        <a onclick="event.preventDefault(); document.getElementById('formsearchwords').submit();">
                            <x-icon.main :name="'search-2'" :size=2 :color="'grey'"/> 
                        </a>
                    </span>
                    </div>
                </div>
            </form>
         </div>
        @FOREACH($blanks as $blank)
             <?php $bl_id = $blank->id; ?>
            <div class="col-md-12">
                <div class="card">
                <div class=" card-header 
                @if($blank->status==0) 
                bg-danger 
                @elseif($blank->status==1) 
                bg-primary 
                @elseif($blank->status==2) 
                bg-success
                @endif
                ">
                <div class="row" style="background-color:{{$blank->color}}">
                <div class="col-md-10">
                       <h3> {{$blank->name}} </h3>
                        <h5> {{$blank->items->count()}} {{__("Items")}}</h5>

                    @if($blank->status==0) 
                    ( {{__("mainf.draft")}} )
                    <a href="{{route('blanks.edit',$bl_id)}}"  class="btn  btn-light" >
                        <x-icon.main :name="'pencil'" :size=2 :color="'black'" />
                    </a>

                    @elseif($blank->status==1&&$blank->items->count()>0) 
                    ( {{__("mainf.onlymy")}} )
                    <a  class="btn  btn-light"  onclick="if (confirm('{{__('mainf.addblanktoproject')}} : {{$project_current->name}}')) {fetchwork({{$bl_id}}); }">
                        <x-icon.main :name="'plus'" :size=2 :color="'black'" />
                    </a>
                    
                    @elseif($blank->status==2&&$blank->items->count()>0) 
                    ( {{__("mainf.free")}} )
                    <a   class="btn  btn-light"  onclick="if (confirm('{{__('mainf.addblanktoproject')}} : {{$project_current->name}}')) {fetchwork({{$bl_id}}); }">
                        <x-icon.main :name="'plus'" :size=2 :color="'black'" />
                    </a>
                    @elseif($blank->author_id == Auth::id()&&$blank->items->count()==0) 
                    ( {{__("Need to feel blank")}} )
                    <a href="{{route('blanks.show',$bl_id)}}" class="btn">
                            <x-icon.main :name="'ui-settings'" :size=2 :color="'black'"/>   
                        </a>
                    @endif
                    @if($blank->author_id == Auth::id())
                    <form action="{{route('blanks.copy')}}" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="blank_id" value="{{$bl_id}}">
                            <button type="submit"  class="btn  btn-light"  title="copy blank">
                            <x-icon.main :name="'ui-copy'" :size=1 :color="'#111'"/>
                            </button>
                    </form> 
                    @else
            
                    <form action="{{route('blanks.buy_blank',$blank->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="blank_id" value="{{$bl_id}}">
                    <button type="submit"  class="btn  btn-light"  title="buy blank 1$" onclick="if (confirm('{{__('Attation')}} : {{__(' minus  1 $ ')}}')) {submit(); }">
                    <x-icon.main :name="'dollar-plus'" :size=1 :color="'#111'"/>
                    </button>
                    </form> 
                    @endif
                </div>
                @if($blank->author_id == Auth::id())
                <div class="col-md-1"><a href="{{route('blanks.edit', $bl_id)}}" class='btn'>
                    <x-icon.main :name="'pencil'" :size=1 :color="'black'"/>
                </a></div>

                <div class="col-md-1"><form action="{{route('blanks.destroy', $bl_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">
                    <x-icon.main :name="'trash'" :size=1 :color="'black'"/>    
                    </button>
                </form>
            </div>
                @else
                    <div class="col-md-2">
                    
                    <a href="{{route('blanks.addexample', $bl_id)}}" class='btn'>
                        <x-icon.main :name="'database-add'" :size=1 :color="'black'"/>
                        Author : {{$blank->author->name}}
                    </a>
                 </div>
                @endif
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-10">
                        <p class="card-text">{{$blank->tcheme}} </p>
                    </div>
                    <div class="col-md-1">
                    @if($blank->author_id == Auth::id())
                        <a href="{{route('blanks.show', $bl_id)}}" class='btn'>
                            <x-icon.main :name="'ruler-pencil'" :size=1 :color="'black'"/>
                        </a>
                      @else  
                       <a href="{{route('blanks.show', $bl_id)}}" class='btn'>
                            <x-icon.main :name="'eye'" :size=1 :color="'black'"/>
                        </a>
                     @endif
                    </div>
                    <div class="col-md-1">
                        <a href="{{route('blanks.wb',$bl_id)}}" class="btn">
                            <x-icon.main :name="'ui-settings'" :size=1 :color="'black'"/>   
                        </a>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <br>
            <hr>
            <br>
        @endforeach
       

     </div>
    </div>
@endsection