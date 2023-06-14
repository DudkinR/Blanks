@extends('layouts.app')
@section('title', __("Show blank"))
@section('type', "blanks")
@section('content')
<div class="container" id="blank_body">
    
    <!-- insert blanks/show_menu.blade.php -->
   @include('blanks.show_menu')


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
 @include( 'blanks.show_start')
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
   @include( 'blanks.show_items') 
    <div class="row">
    <div class="col-md-12 bg-light">
      <a class="btn mx-auto"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        <x-icon.main :name="'ruler-pencil'" :size=3 :color="'grey'"/>
        </a>
        </div>
    </div>
     </div> 
    @include( 'blanks.show_finish')
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
@include( 'blanks.show_js')

@endsection