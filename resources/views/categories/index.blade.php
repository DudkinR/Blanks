@extends('layouts.app')
@section('title', __("Avable category"))
@section('type', "categories")

@section('content')
<?php if (!isset($_GET["cat"])) {
    $_GET["cat"] = 0;
} elseif ($_GET["cat"] !== 0) {
    if ($parent = \App\Models\Category::find($_GET["cat"])) {
        $parent_id = $parent->parent_id;
    } else {
        $parent_id = 0;
    }
} ?>
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new category -->
        <div class="row ">
        @if(isset($_GET['cat'])&&$_GET['cat']!==null)
        <div class="col-md-1">
            <a href="{{route('categories.create')}}?parent_id={{$_GET['cat']}}" class='btn' title="{!!__("mainf.create")!!} {!!mb_strtolower(__("mainf.category"))!!}"> 
            <x-icon.main :name="'plus'" :size=3 :color="'black'"/>
        </a> 
        </div>
        <div class="col-md-1">
        <a href="{{route('categories.index')}}" class='btn' title="{!!__("mainf.create")!!} {!!mb_strtolower(__("mainf.category"))!!}"> 
            <x-icon.main :name="'stylish-up'" :size=3 :color="'black'"/>
        </a></div>
            @isset($parent_id)
            <div class="col-md-1">
            <a href="{{route('categories.index')}}?cat={{$parent_id}}" class='btn' title="{!!__("mainf.create")!!} {!!mb_strtolower(__("mainf.category"))!!}"> 
                <x-icon.main :name="'rounded-up'" :size=3 :color="'black'"/>
            </a></div>
            @endif
        @endif

        <div class="col-md-1">
        <a href="{{route('categories.create')}}" class='btn' title="{!!__("mainf.create")!!} {!!mb_strtolower(__("mainf.category"))!!}"> 
            <x-icon.main :name="'plus'" :size=3 :color="'black'"/>
        </a></div>
        </div>
        <form action="{{route('categories.index')}}" method="GET">
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
        </form>

          <div class="row" id="catsContainer1" >
              <!-- Place for the cats -->
              <!-- Create a container element for the cats -->
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row"> 
                            <div class="col-md-2">
                                <a href="{{route('categories.create')}}?parent_id={{$_GET['cat']}}" class='btn' title="{!!__("mainf.create")!!} {!!mb_strtolower(__("mainf.category"))!!}"> 
                                <x-icon.main :name="'plus'" :size=3 :color="'black'"/>
                            </a> 
                            </div>
                            <div class="col-md-10">
                               <h1> {{__("Add")}}</h1>
                            </div>    
                     </div> 
                </div>    
            </div>     
        </div>

        @foreach ($categories as $category)
        <?php
        $color = "black";
        if ($category->status == 0) {
            $color = "grey";
            $ctext = "success";
        } elseif ($category->status == 1) {
            $color = "blue";
        } elseif ($category->status == 2) {
            $color = "green";
        } else {
            $color = "black";
        }
        ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-md-2"> 
                                @if(isset($category->image_own)&&$category->image_own!==null)
                                    <x-icon.myicon :data="$category->image_own" :size=10/>
                                @else
                                    @isset($category->icon->name)
                                        <x-icon.main :name="$category->icon->name" :size=5 :color="$color"/>
                                    @endif
                                @endif	
                               
                            </div>
                            <div class="col-md-10">{!!$category->name!!}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{!! $category->description !!}</p>
                    <div class="row">
                        <div class="col-md-2"><a href="{{route('categories.show', $category->id)}}" class='btn' title="{!!__("mainf.show")!!}">
                            <x-icon.main :name="'eye'" :size=3 :color="'blue'"/>
                        </a></div>
                         @if($category->categories->count()>0)
                        <div class="col-md-2">
                        <a href="{{route('categories.index')}}?cat={{$category->id}}" class='btn' title="{!!__("mainf.under")!!}">
                            <x-icon.main :name="'layers'" :size=3 :color="'blue'"/>
                            {!!__("mainf.under")!!} {{$category->categories->count()}} 
                        </a></div>
                        @endif
                        
                        @if($category->author_id==Auth::user()->id)
                        <div class="col-md-2">    
                            <a href="{{route('categories.create')}}?parent_id={!!$category->id!!}" class='btn' title="{!!__("mainf.create_under")!!}">
                            <x-icon.main :name="'plus'" :size=3 :color="'green'"/>
                        </a>     </div>   
                         <div class="col-md-2">           
                        <a href="{{route('categories.edit', $category->id)}}" class='btn' title="{!!__("mainf.edit")!!}">
                            <x-icon.main :name="'pencil'" :size=3 :color="'red'"/>    
                        </a></div>
                        <div class="col-md-2"> 
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class='btn'  title="{!!__("mainf.delete")!!}">
                                <x-icon.main :name="'trash'" :size=3 :color="'red'"/>
                            </button>
                        </form></div>
                      @endif 
               
                    </div>
                     
                    </div>
                </div>
            </div>
        @endforeach     
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row"> 
                            <div class="col-md-2">
                                <a href="{{route('categories.create')}}?parent_id={{$_GET['cat']}}" class='btn' title="{!!__("mainf.create")!!} {!!mb_strtolower(__("mainf.category"))!!}"> 
                                <x-icon.main :name="'plus'" :size=3 :color="'black'"/>
                            </a> 
                            </div>
                            <div class="col-md-10">
                               <h1> {{__("Add")}}</h1>
                            </div>    
                     </div> 
                </div>    
            </div>     
        </div>

    </div>
</div>
<script>
    // Get a reference to the button and container elements
                // Get a reference to the button and container elements
            var getCatButton = document.getElementById("getCatButton");
            var catsContainer1 = document.getElementById("catsContainer1");
            function fetchcats() {
            // Get the input value
            var words = document.querySelector('input[name="refresh"]').value;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();
            // Set the HTTP method and URL for the request
            xhr.open("GET", "/api/categories/index?parent_id={{$_GET['cat']}}&words=" + encodeURIComponent(words), true);
            // Set the response type to JSON
            xhr.responseType = "json";
            // Add an event listener for when the response is received
            xhr.addEventListener("load", function() {
                // Handle the response
                if (xhr.status === 200) {
                displaycats(xhr.response);
                }
            });
            // Send the request
            xhr.send();
            }

            function displaycats(cats) {

            catsContainer1.innerHTML = "";
            cats.forEach(function(cat) {
                var maincol = document.createElement("div");
                maincol.className = "col-md-6";
                    var card = document.createElement("div");
                    card.className = "card";
                        var cardheader = document.createElement("div");
                        cardheader.className = "card-header";
                            var rowheader = document.createElement("div");
                            rowheader.className = "row";
                                var rowheadercol2 = document.createElement("div");
                                rowheadercol2.className = "col-md-2";
                                    var rowheadercolicon = document.createElement("x-cat.main");
                                    rowheadercolicon.className='icofont-'+cat.icon_name;
                                    rowheadercolicon.style.fontSize = "3rem";
                                    if(cat.status==0)
                                    rowheadercolicon.style.color = "grey";
                                    if(cat.status==1)
                                    rowheadercolicon.style.color = "blue";
                                    if(cat.status==2)
                                    rowheadercolicon.style.color = "green";
                                var rowheadercol4 = document.createElement("div");
                                rowheadercol4.className = "col-md-4";
                                rowheadercol4.textContent = cat.name;
                        var cardbody = document.createElement("div");
                        cardbody.className = "card-body";
                            var cardbodyp = document.createElement("p");
                            cardbodyp.textContent = cat.description;
                        var rowbuttons = document.createElement("div");
                        rowbuttons.className = "row";
                            var rowbuttonscol2 = document.createElement("div");
                            rowbuttonscol2.className = "col-md-2";
                                var rowbuttonscol2a = document.createElement("a");
                                rowbuttonscol2a.className = "btn";
                                var eye = document.createElement("x-cat.main");
                                eye.className='icofont-eye';
                                eye.style.fontSize = "3rem";
                                eye.style.color = "blue";
                          
                catsContainer1.appendChild(maincol);
                maincol.appendChild(card);
                card.appendChild(cardheader);
                    cardheader.appendChild(rowheader);
                        rowheader.appendChild(rowheadercol2);
                            rowheadercol2.appendChild(rowheadercolicon);
                        rowheader.appendChild(rowheadercol4);
                card.appendChild(cardbody);
                    cardbody.appendChild(cardbodyp);
                card.appendChild(rowbuttons);
                    rowbuttons.appendChild(rowbuttonscol2);
                     rowbuttonscol2.appendChild(rowbuttonscol2a);
                     rowbuttonscol2a.appendChild(eye);

                if(cat.undercat>0) {
                    var layers_col = document.createElement("div");
                    layers_col.className = "col-md-2";
                                var layers_cola = document.createElement("a");
                                layers_cola.className = "btn";
                                var layer = document.createElement("x-cat.main");
                                layer.className='icofont-layers';
                                layer.style.fontSize = "3rem";
                                layer.style.color = "blue";  
                                rowbuttons.appendChild(layers_col);
                                layers_col.appendChild(layers_cola);
                                layers_cola.appendChild(layer);
                            }
                if(cat.author==true) {
                    var add_col = document.createElement("div");
                    add_col.className = "col-md-2";
                        var add_cola = document.createElement("a");
                        add_cola.className = "btn";
                        var addicon = document.createElement("x-cat.main");
                        addicon.className='icofont-plus';
                        addicon.style.fontSize = "3rem";
                        addicon.style.color = "blue";  
                        rowbuttons.appendChild(add_col);
                        add_col.appendChild(add_cola);
                        add_cola.appendChild(addicon);
                    var pencil_col = document.createElement("div");
                    pencil_col.className = "col-md-2";
                        var pencil_cola = document.createElement("a");
                        pencil_cola.className = "btn";
                        var pencilicon = document.createElement("x-cat.main");
                        pencilicon.className='icofont-pencil';
                        pencilicon.style.fontSize = "3rem";
                        pencilicon.style.color = "blue";  
                        rowbuttons.appendChild(pencil_col);
                        pencil_col.appendChild(pencil_cola);
                        pencil_cola.appendChild(pencilicon);
                    var del_col = document.createElement("div");
                    del_col.className = "col-md-2";
                        var del_cola = document.createElement("a");
                        del_cola.className = "btn";
                        var delicon = document.createElement("x-cat.main");
                        delicon.className='icofont-trash';
                        delicon.style.fontSize = "3rem";
                        delicon.style.color = "blue";  
                        rowbuttons.appendChild(del_col);
                        del_col.appendChild(del_cola);
                        del_cola.appendChild(delicon);
  
                    }            
            });
            }

            getCatButton.addEventListener("click", function() {
            fetchcats();
            });
</script>
@endsection