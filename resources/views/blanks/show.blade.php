@extends('layouts.app')
@section('title', __("Show blank"))
@section('type', "blanks")
@section('content')
<div class="container" id="blank_body">
    <div class="row justify-content-center">
     <!-- work-panel blank -->
     <?php
            $icon_blanks='{"text":"B","title":"Blanks","text_color":"#626262","bg_color":"#ffffff"}';
            $icon_category='{"text":"AC","title":"Add category","text_color":"#626262","bg_color":"#ffffff"}';
            $icon_item='{"text":"I","title":"Add item","text_color":"#626262","bg_color":"#ffffff"}';
         ?>
     <div class="row"  style="background-color:{{$blank->color}}">

        <div class="col-md-1">
    <!-- link back to blanks route -->
        <a href="{{route('blanks.index')}}" title="{{__("Back")}}">
            <x-icon.myicon :data="$icon_blanks" :size=5/> 
        </a>
        </div>
        <div class="col-md-1">
            <a href="{{route('addstart',$blank->id)}}" class="btn">
               <x-icon.main :name="'racing-flag-alt'" :size=3 :color="'green'"/> 
            </a>
         </div>
        <div class="col-md-1">
        <a href="{{route('addstartsB',$blank->id)}}" class="btn" title="{!!__('mainf.showall')!!}">
               <x-icon.main :name="'racing-flag'" :size=3 :color="'green'"/>
            </a>
        </div>
        <div class="col-md-1">
        <a href="{{route('addcategory',$blank->id)}}" class="btn">
                <x-icon.myicon :data="$icon_category" :size=5/> 
            </a>
        </div>     
        <div class="col-md-1">
        <a href="{{route('position.addblankshow',$blank->id)}}" class="btn">
                <x-icon.main :name="'search-job'" :size=3 :color="'orange'"/>
            </a>
        </div>
        <div class="col-md-1">
      <a class="btn"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
             <x-icon.main :name="'plus'" :size=3 :color="'green'"/>
        </a>
        </div>
         <div class="col-md-1">
            <a href="{{route('item.addreadyitem',$blank->id)}}" class="btn">
       <x-icon.main :name="'ui-rate-add'" :size=3 :color="'green'"/>
            </a>
        </div>
        <div class="col-md-1">
        <a href="{{route('blanks.edit',$blank->id)}}" class="btn">
                    <x-icon.main :name="'pencil'" :size=3 :color="'red'"/>   
                    </a>
        </div>
        <div class="col-md-1">
        <a href="{{route('blanks.wbwp',$blank->id)}}?item=0" class="btn">
                    <x-icon.main :name="'ui-settings'" :size=3 :color="'red'"/>   
                    </a>
        </div>
        <div class="col-md-1">
            <a href="{{route('addfinish',$blank->id)}}" class="btn">
               <x-icon.main :name="'racing-flag-alt'" :size=3 :color="'blue'"/> 
            </a>
         </div>
        <div class="col-md-1">
        <a href="{{route('addfinishsB',$blank->id)}}" class="btn" title="{!!__('mainf.showall')!!}">
               <x-icon.main :name="'racing-flag'" :size=3 :color="'blue'"/>
            </a>
        </div>
        <div class="col-md-1">
        <a href="{{route('addstamps',['blank_id'=>$blank->id])}}" class="btn" title="{!!__('mainf.stamp')!!}">
               <x-icon.main :name="'tags'" :size=3 :color="'red'"/>
            </a>
        </div>
     </div>   
    <!-- show blank -->


    <div class="card">
        <div class="row">
   
                <?php
                $stms = [];
                $stmsM = [];
                foreach ($blank->stamps as $stamp) {
                    $stms[] = $stamp->content;
                    $stmsM[] = "<mark>" . $stamp->content . "</mark>";
                }
                $project_current = \App\Models\Project::find(
                    session("project")
                );
                ?>
                 <div class="col-md-8">
                <h1>{!!str_replace($stms,$stmsM,$blank->name)!!}</h1> 
                <p>
                    {!!str_replace($stms,$stmsM,$blank->tcheme)!!}
                    @if(session('project')!==null)
                    <a  class="btn  btn-light"  onclick="if (confirm('{{__('mainf.addblanktoproject')}} : {{$project_current->name}}')) {fetchwork({{$blank->id}}); }">
                        <x-icon.main :name="'plus'" :size=2 :color="'black'" />
                    </a>
                    @endif

                </p>
                <p>
                
           
                    <?php
                    $stat = new \App\Http\Controllers\StatistController();
                    $stat_blank = $stat->rating_blank($blank->id);
                    ?>
                <svg viewBox="0 0 100 100" width="200" height="200">
                        <!-- Большой шестиугольник -->
                        <polygon id="innerHexm" stroke="black" stroke-width="0.1" fill="green" opacity="0.3"/>
                        <!-- Внутренний шестиугольник -->
                        <polygon id="innerHexS" stroke="black" stroke-width="0.1" fill="red" opacity="0.3"/>   
                        <polygon id="innerHex" stroke="black" stroke-width="0.1" fill="blue" opacity="0.5" />
                        <!-- Лучи -->
                        <line id="line0" stroke="black" stroke-width="0.5" />
                        <line id="line60" stroke="black" stroke-width="0.5" />
                        <line id="line120" stroke="black" stroke-width="0.5" />
                        </svg>
                </p>
               
            </div>    
              <div class="col-md-4 border">
                <h1>{{__("Stamps")}}
                <a onclick="send_to_route('{{ route('clear_all_stamps', $blank->id) }}', 'get', {}); document.getElementById('blank_stamps').innerHTML = '';" class="btn" title="{{ __('Clear all') }} {{ __('stamps') }}">
                    <x-icon.main :name="'trash'" :size="1" :color="'blue'" />
                </a>

                
                </h1> 
                <div id="blank_stamps"><ul>
                @foreach ($stmsM as $sm)
               <li>{!!$sm!!}</li>
               @endforeach
               </ul>
               </div>
            </div>
        </div>
        <h2>{!!__('blanks.start')!!}: 
        <a href="{{route('addstart',$blank->id)}}" class="btn">
               <x-icon.main :name="'drawing-tablet'" :size=1 :color="'blue'"/> 
            </a>
        </h2>
        @foreach($blank->startconditions as $condition)
        <div class="row">
            <div class="col-md-10 border">
                {!!str_replace($stms,$stmsM,$condition->content)!!}
            </div>
            <div class="col-md-2 justify-content-between">
            <div class="row">     
           <div class="col-md-3">  
              <form action="{{route('start.shift_up', $condition->id)}}" method="post">
                @csrf
                @method('PUT') 
                <input type="hidden" name="order" value="{{$condition->pivot->order}}">
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="start" value="{!!$condition->id!!}">
                <button type="submit" class="btn btn-light"   title="blank up">
                    <x-icon.main :name="'caret-up'" :size=1 :color="'#111'" />
                </button>
            </form> 
        </div>
        <div class="col-md-3">  
            <form action="{{route('start.dell', $condition->id)}}" method="post">
                @csrf
                @method('PUT') 
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="start" value="{!!$condition->id!!}">
                <input type="hidden" name="order" value="{{$condition->pivot->order}}">
                <button type="submit" class="btn btn-light"   title="blank dell">
                    <x-icon.main :name="'trash'" :size=1 :color="'#111'" />
                </button>
            </form>
        </div>
        <div class="col-md-3">  
            <form action="{{route('start.shift_down', $condition->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="order" value="{{$condition->pivot->order}}">
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="start" value="{!!$condition->id!!}">
                <button type="submit" class="btn btn-light"   title="blank down {!!$condition->id!!} {!!$blank->id!!}">
                    <x-icon.main :name="'caret-down'" :size=1 :color="'#111'"/>
                </button>
            </form>
        </div>
        <div class="col-md-3">  
            <a href="{{route('start.edit', $condition->id)}}?blank={{$blank->id}}" class="btn btn-light" >
                <x-icon.main :name="'pencil-alt-5'" :size=1 :color="'#111'"/>
            </a>
        </div>
        </div>
            </div>
        </div>

        @endforeach
        <p>
            <h1>Categories:</h1>
            @foreach($blank->categories as $category)
                {!!str_replace($stms,$stmsM,$category->name)!!} <br>  
            @endforeach
        </p>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12 bg-light">
      <a class="btn mx-auto"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        <x-icon.main :name="'ruler-pencil'" :size=3 :color="'grey'"/>
        </a>
        </div>
    </div>
    <div class="row"  style="background-color:{{$blank->color}}">
        @foreach($blank->items as $item)
           <?php
           $items = [];
           // просмотр и отбор подпунктов
           foreach ($item->items as $underparent) {
               $items[] = [
                   "name" => $underparent->name,
                   "content" =>
                       "
                        <div class=\"row\">
                            <div class=\"col-md-11\">
                                " .
                       str_replace($stms, $stmsM, $underparent->content) .
                       "
                            </div>
                            <div class=\"col-md-1\">
                                <a href=\"" .
                       route("item.edit", $underparent->id) .
                       "?item=" .
                       $item->id .
                       "\"  
                                class=\"btn btn-light\"   
                                title=\"edit item\">
                                    <div class=\"icon\"> 
                                    <i class=\"icofont-edit\" style=\"font-size: 1em;color:black\"></i>
                                    </div>
                                </a>
                                <a href=\"" .
                       route("item.del", $underparent->id) .
                       "?item=" .
                       $underparent->id .
                       "&_token=" .
                       session("_token") .
                       "&blank=" .
                       $blank->id .
                       "\"  
                                class=\"btn btn-light\"   
                                title=\"destroy item\">
                                    <div class=\"icon\"> 
                                    <i class=\"icofont-ui-delete\" style=\"font-size: 1em;color:black\"></i>
                                    </div>
                                </a>
                            </div>
                        </div>",
               ];
           }
           ?>
             <div class="row border">
             <div class="col-md-1"><a href="#" title="{!!$item->name!!}">{{$item->pivot->order}}</a></div>
             <div class="col-md-7 "> 
             <a name="item_{{$item->id}}"></a>
                @if(count($items)>0)
                <a href="{{route('underblank.show',$item->id)}}" title="edit">
                <x-icon.main :name="'file-document '" :size=3 :color="'blue'"/></a>
                @endif
                {!!str_replace($stms,$stmsM,$item->content)!!}
               
             </div>
             <div class="col-md-1 border">
                @foreach($item->positions as $position)   
                     {!!$position->abv!!}
                @endforeach
                @if($item->positions->count()==0)
                <a href="{{route('position.additemshow',$item->id)}}?blank={{$blank->id}}" class='btn' title="Add positions">
                  <x-icon.main :name="'search-job'" :size=1 :color="'blue'"/>
                </a>
                @endif 
             </div>
             <div class="col-md-1 border">
                @foreach($item->control_positions as $position)   
                     {!!$position->abv!!}
                @endforeach
                @if($item->positions->count()==0)
                <a href="{{route('position.additemshow',$item->id)}}?blank={{$blank->id}}" class='btn' title="Add positions">
                  <x-icon.main :name="'search-job'" :size=1 :color="'blue'"/>
                </a>
                @endif 
             </div>
             <div class="col-md-1 border">
                <a href="{{route('item.edit',$item->id)}}?blank={!!$blank->id!!}"  class="btn btn-light"   title="edit item">
                <x-icon.main :name="'ui-edit'" :size=1 :color="'#111'"/>
                </a>
                <form action="{{route('item.del', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="blank" value="{!!$blank->id!!}">
                            <input type="hidden" name="order" value="{!!$item->pivot->order!!}">
                            <button type="submit"  class="btn btn-light"  title="delete item">
                                <x-icon.main :name="'ui-delete'" :size=1 :color="'#111'"/>
                            </button>
                </form>
                <form action="{{route('item.copy', )}}" method="post">
                    @csrf
                    <input type="hidden" name="blank" value="{!!$blank->id!!}">
                    <input type="hidden" name="item" value="{!!$item->id!!}">
                    <input type="hidden" name="order" value="{!!$item->pivot->order!!}">
                    <button type="submit" class="btn btn-light"   title="copy item">
                    <x-icon.main :name="'ui-copy'" :size=1 :color="'#111'"/>
                    </button>
                 </form>
             </div>
             <div class="col-md-1 justify-content-between">
            <form action="{{route('item.shift_up', )}}" method="post">
                @csrf
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="order" value="{!!$item->pivot->order!!}">
                <input type="hidden" name="item" value="{!!$item->id!!}">
                <button type="submit" class="btn btn-light"   title="item up">
                    <x-icon.main :name="'caret-up'" :size=1 :color="'#111'" />
                </button>
            </form>
            <a class="btn btn-light"  title="item here" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
            <x-icon.main :name="'contact-add'" :size=1 :color="'#111'"/>
            </a>
            <form action="{{route('item.shift_down', $item->id)}}" method="post">
                @csrf
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="order" value="{!!$item->pivot->order!!}">
                <input type="hidden" name="item" value="{!!$item->id!!}">
                <button type="submit" class="btn btn-light"   title="item down {!!$blank->id!!} {!!$item->id!!}">
                    <x-icon.main :name="'caret-down'" :size=1 :color="'#111'"/>
                </button>
            </form>
            </div>
             </div>
        @if(count($items)>0)
        <h3>Under items </h3>
        <x-accordion.main :items="$items" />
        @endif
         @endforeach
    </div>
    <div class="row">
    <div class="col-md-12 bg-light">
      <a class="btn mx-auto"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        <x-icon.main :name="'ruler-pencil'" :size=3 :color="'grey'"/>
        </a>
        </div>
    </div>
     </div> 
    <div class="container bg-light">
        <a name="finish"></a>
        <h2>{!!__('blanks.finish')!!}:
        <a href="{{route('addfinish',$blank->id)}}" class="btn">
               <x-icon.main :name="'racing-flag-alt'" :size=1 :color="'blue'"/> 
            </a>
        </h2>
        @foreach($blank->finishconditions as $condition)
        <div class="row">
            <div class="col-md-10 border">
                {!!str_replace($stms,$stmsM,$condition->content)!!}
            </div>
            <div class="col-md-2 justify-content-between">
            <div class="row">     
           <div class="col-md-3">  
              <form action="{{route('finish.shift_up', $condition->id)}}#finish" method="post">
                @csrf
                @method('PUT') 
                <input type="hidden" name="order" value="{{$condition->pivot->order}}">
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="finish" value="{!!$condition->id!!}">
                <button type="submit" class="btn btn-light"   title="blank up">
                    <x-icon.main :name="'caret-up'" :size=1 :color="'#111'" />
                </button>
            </form> 
        </div>
        <div class="col-md-3">  
            <form action="{{route('finish.dell', $condition->id)}}#finish" method="post">
                @csrf
                @method('PUT') 
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="order" value="{{$condition->pivot->order}}">
                <input type="hidden" name="finish" value="{!!$condition->id!!}">
                <button type="submit" class="btn btn-light"   title="blank dell">
                    <x-icon.main :name="'trash'" :size=1 :color="'#111'" />
                </button>
            </form>
        </div>
        <div class="col-md-3">  
            <form action="{{route('finish.shift_down', $condition->id)}}#finish" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="order" value="{{$condition->pivot->order}}">
                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                <input type="hidden" name="finish" value="{!!$condition->id!!}">
                <button type="submit" class="btn btn-light"   title="blank down {!!$condition->id!!} {!!$blank->id!!}">
                    <x-icon.main :name="'caret-down'" :size=1 :color="'#111'"/>
                </button>
            </form>
        </div>
        <div class="col-md-3">  
        <a href="{{route('finish.edit', $condition->id)}}?blank={{$blank->id}}" class="btn btn-light" >
                <x-icon.main :name="'pencil-alt-5'" :size=1 :color="'#111'"/>
            </a>
        </div>
        </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- unvisible modul blok  create item -->
        <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content col-md-12">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{__("Create")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                 <form action="{{route('item.store')}}" method="post" class="row g-3 needs-validation" novalidate>   
                         @csrf
                         <div class="row">
                            <div class="col-md-8">
                                @isset($blank->positions)
                                    <!-- select multiple items -->
                                    <div class="form-group">
                                        <label for="positions">{{__("Position")}} </label>
                                        <select name="positions[]" id="positions" class="form-control" multiple required>

                                            @foreach($blank->positions as $position)
                                                <option value="{{$position->id}}"
                                                @if(session('positions'))
                                                    @if(in_array($position->id,session('positions')))
                                                        selected
                                                    @endif
                                                @endif
                                                >{{$position->abv}} -  {{$position->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="controls">{{__("Control")}} </label>
                                        <select name="controls[]" id="controls" class="form-control" multiple required>
                                            @foreach($blank->positions as $position)
                                                <option value="{{$position->id}}"
                                                @if(session('positions'))
                                                    @if(in_array($position->id,session('controls')))
                                                        selected
                                                    @endif
                                                @endif
                                                >{{$position->abv}} -  {{$position->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                 @isset($blank->id) 
                                <input type="hidden" name="blank" id="blank" value="{{$blank->id}}" class="form-control">
                                <a href="{{route('position.addblankshow',$blank->id)}}" class='btn'>
                                <x-icon.main :name="'search-job'" :size=3 :color="'green'"/>
                                {{__("Add")}}
                                </a>
                                @endif
                            </div>
                         </div>
                        <div class="form-group">
                            <label for="content">{{__('Content')}}</label>
                            <textarea name="content" id="description" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                                        <!-- checkbox separate lines -->
		                <div class="form-check">
			              <input type="checkbox" name="separate" id="separate" value="1" class="form-check-input">
			              <label class="form-check-label" for="separate">{{__("Separate for line")}}</label>
                        </div>
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" id="nameItem" class="form-control" required>
                        </div>
                        <!-- parent_id form-group -->
                        <div class="form-group">
                            <label for="parent_id">{{__('Parent')}}</label>
                            <input type="hidden" name="parent_id" id="parent_id" value="0"  class="form-control">
                        </div>

                        <!-- status form-group -->
  
                        <legend>{{__("Status")}}</legend>

                        <div class="form-check">
                            <input type="radio" name="status" id="status1" value="0" 
                            @if(session('status'))
                                @if(session('status') == 0)
                                    checked
                                @endif
                            @endif
                            class="form-check-input">
                            <label class="form-check-label" for="status1">{{__("Draft")}}</label>
                        </div><div class="form-check">
                                <input type="radio" name="status" id="status2" value="1" 
                                @if(session('status'))
                                @if(session('status') == 1)
                                    checked
                                @endif
                                @else
                                    checked
                            @endif
                                class="form-check-input">
                                <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
                        </div><div class="form-check">
                                <input type="radio" name="status" id="status3" value="2"  
                                @if(session('status'))
                                @if(session('status') == 2)
                                    checked
                                @endif
                            @endif
                                class="form-check-input">
                                <label class="form-check-label" for="status3">{{__("Free")}}</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <x-icon.main :name="'ui-rate-add'" :size=1 :color="'#fff'"/>
                            Create
                        </button>
                     </form>
                </div>
               
                </div>
            </div>
        </div>
 </div>
 </div>
<script>
    @if(session("alert_blank_".$blank->id)==null)
    alert("{{__('Attantion!!!! After chenge blanks, All stat will be falt.')}}");
    <?php Illuminate\Support\Facades\Session::put(
        "alert_blank_" . $blank->id,
        now()
    ); ?>
    @endif
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    // dowload page and has last item navigate to last item
    @isset($newitem)
        window.onload = function() {
            window.location.hash = 'item_{{$newitem->id}}';
        };
    @endisset
    @isset($message)
        alert('{{$message}}');
    @endisset
    @isset($_GET['item_id'])
    window.onload = function() {
        window.location.hash = 'item_{{$_GET["item_id"]}}';
    };
    @endisset

    CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            })

    const inputField = document.getElementById('description');
    const outputField = document.getElementById('nameItem');

    inputField.addEventListener('input', (event) => {
    //    alert(22222);
    let inputValue = event.target.value;

    if (inputValue.length > 25) {
        inputValue = inputValue.substring(0, 25);
    }

    outputField.value = inputValue;
    });

    outputField.addEventListener('input', (event) => {
    const outputValue = event.target.value;
    });
    // Получаем значение параметра hash из запроса GET
    var hash = window.location.search.match(/hash=([^&]+)/);
    if (hash) {
        // Добавляем якорную ссылку к текущему URL-адресу
        window.location.hash = hash[1];
    }
    // Получаем ссылку на элемент, на котором будем отслеживать нажатие правой кнопки мыши
    var element = document.body;
    // #blank_body
    // Добавляем обработчик события contextmenu для отслеживания нажатия правой кнопки мыши
    element.addEventListener('contextmenu', function(event) {
        // Получаем выделенный текст на странице
        var selectedText = window.getSelection().toString();
    
        // Если текст выделен, выводим сообщение
        if (selectedText) {
            // Отменяем стандартное поведение браузера для контекстного меню
            event.preventDefault();
            // Получаем координаты клика мыши
            var x = event.clientX;
            var y = event.clientY;
            
            // Создаем div-элемент для сообщения
            var message = document.createElement('div');
            message.innerHTML = '{{__("Add stamp")}} "' + selectedText + '"';
            message.style.position = 'fixed';
            message.style.top = y + 'px';
            message.style.left = x + 'px';
            message.style.backgroundColor = 'white';
            message.style.padding = '10px';
            message.style.border = '1px solid black';
            // Добавляем элемент на страницу
            document.body.appendChild(message);
            // Добавляем обработчик события клика на сообщение
            message.addEventListener('click', function() {
            // Создаем экземпляр объекта XMLHttpRequest
            var xhr = new XMLHttpRequest();
            // Определяем функцию обратного вызова, которая будет вызываться при получении ответа от сервера
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                }
            };

            // Отправляем данные на сервер
            var formData = new FormData();  
            formData.append('selectedText', encodeURIComponent(selectedText));
            formData.append('blank', '{{$blank->id}}');
            formData.append('api_token', '{{$api_token}}');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/addstamp', true);

            // Получаем токен CSRF из мета-тега на странице
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Добавляем токен CSRF в заголовок запроса
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    var response = this.responseText;
                    var blankStamps = document.getElementById('blank_stamps');
                    blankStamps.innerHTML = response;
                }
            };

            xhr.send(formData);

            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    var response = JSON.parse(this.responseText);
                    var blankStamps = document.getElementById('blank_stamps');
                    // Очистить содержимое элемента 'blank_stamps'
                    blankStamps.innerHTML = '';
                    // Создать элемент <ul>
                    var ul = document.createElement('ul');

                    // Добавить каждый элемент массива в <li>
                    response.forEach(function(item) {
                        var li = document.createElement('li');
                        li.textContent = item.content;
                        ul.appendChild(li);
                    });

                    // Добавить <ul> к элементу с id "blank_stamps"
                    blankStamps.appendChild(ul);
                }
            };


            // Удаляем сообщение со страницы
            document.body.removeChild(message);
            //document.location();
        });

    }
    });

 // JavaScript для изменения размера внутреннего шестиугольника 

        const data2 = [100, 100, 100, 100, 100, 100]; // Массив данных
        const data3 = [50, 50, 50, 50, 50, 50]; // Массив данных
        genPoligon(data2,'innerHexm');
        genPoligon(data3,'innerHexS');
        opositeLine(data2,'line0','line60','line120');
        const  mass=[
            {{$stat_blank["full"]}},
            {{$stat_blank["dificult"]}},
            {{$stat_blank["usefull"]}},
            {{$stat_blank["understand"]}},
            {{$stat_blank["detail"]}},
            {{$stat_blank["popular"]}}
        ];
        genPoligon(mass,'innerHex');
        changePoligon(event);
    </script>
@endsection