@extends('layouts.app')
@section('title', __("Edit Item"))
@section('type', "items"))
@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <!--  link to  back item -->
        <a href="{{route('item.index')}}" class='btn'>Back to item</a>
    
        <form action="{{route('item.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
            @if(isset($blank)&&$blank!==0) 
             <input type="hidden" name="blank" id="blank" value="{{$blank}}" class="form-control">
            @endif
            @if(isset($positions)&&count($positions)>0)
               <!-- select multiple items -->
            <div class="form-group">
                <label for="positions">{{__("Position")}}</label>
                <select name="positions[]" id="positions" class="form-control" multiple>
                <?php
                $mypositions = [];
                foreach ($item->positions as $ps) {
                    $mypositions[] = $ps->id;
                }
                ?>
                    @foreach($positions as $position)
                        <option value="{{$position->id}}"
                        @if(in_array($position->id,$mypositions))
                        selected
                        @endif
                        >{{$position->abv}} -  {{$position->name}}</option>
                    @endforeach
                </select>
            </div>
               <!-- select multiple items -->
               <div class="form-group">
                <label for="controls">{{__("Control")}}</label>
                <select name="controls[]" id="controls" class="form-control" multiple>
                <?php
                $mypositions = [];
                foreach ($item->control_positions as $ps) {
                    $mypositions[] = $ps->id;
                }
                ?>
                    @foreach($positions as $position)
                        <option value="{{$position->id}}"
                        @if(in_array($position->id,$mypositions))
                        selected
                        @endif
                        >{{$position->abv}} -  {{$position->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
                        
            @if(count($positions)==0)
                <a href="{{route('position.additemshow',$item->id)}}" class='btn'title="Add positions">
                 <x-icon.main :name="'search-job'" :size=3 :color="'blue'"/>
                </a>
            @endif    
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('position.additemshow',$item->id)}}" class='btn' title="Add positions">
                <x-icon.main :name="'search-job'" :size=3 :color="'blue'"/>
                </a>
                </div>
            </div>
            @if($item->blanks->count()>1)
               <!-- select multiple items -->
            <div class="form-group">
                <label for="avalable_blanks">{{__("mainf.avalebleblanks")}}</label>
                <select name="avalable_blanks[]" id="avalable_blanks" class="form-control" multiple>
                    @foreach($item->blanks as $bk)
                        <option value="{{$bk->id}}"
                        selected
                        >  {{$bk->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label for="name">{{__("mainf.namei")}}</label>
                <input type="text" name="name" id="name" value="{{$item->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">{{__("mainf.content")}}</label>
                <textarea name="content" id="description" cols="30" rows="10" class="form-control">{{$item->content}}</textarea>
            </div>

            <!-- parent_id form-group -->
            <div class="form-group">
                <label for="parent_id">Parent_id {{$item->parent_id}}</label>
                <input type="hidden" name="parent_id" id="parent_id"   value="{{$item->parent_id}}"  class="form-control">
            </div>
            <div class="row">
                <h1>{{__("mainf.blanksused")}}</h1>
                <div class="form-check">
                <input type="checkbox" name="blank_all" id="blank_all" value="1" class="form-check-input">
                    <label class="form-check-label" for="blank_all"> {{__("Selected all")}}</label>
                </div>
                @foreach($item->blanks as $bl)
                <div class="form-check">
                <input type="checkbox" name="blk_{{ $bl->id}}" id="blank_{{ $bl->id}}" value="{{ $bl->id}}" 
                @if($bl->id == $blank)
                        checked
                    @endif
                    class="form-check-input">
                    <label class="form-check-label" for="blk_{{ $bl->id}}"> {{ $bl->name}}</label>
                </div>
                @endforeach    
            </div>
            <!-- status form-group -->

            <legend>{{__("mainf.status")}}</legend>

            <div class="form-check">
                <input type="radio" name="status" id="status1" value="0" 
                @if($item->status == 0)
                        checked
                    @endif
                class="form-check-input">
                <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status" id="status2" value="1" 
                    @if($item->status == 1)
                        checked
                    @endif
                    class="form-check-input">
                    <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
            </div><div class="form-check">
                    <input type="radio" name="status"  onclick="confirm('{{__(" Confirm  all your data, will bee free")}}')"  id="status3" value="2"  
                    @if($item->status == 2)
                        checked
                    @endif
                    class="form-check-input">
                    <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
            </div>
            <button type="submit" class="btn btn-primary">Correct</button>
        </form>  
        <?php
        $items = [];
        foreach ($item->items as $underparent) {
            $items[] = [
                "name" => $underparent->name,
                "content" =>
                    "<div class=\"row\">
                    <div class=\"col-md-11\">" .
                    $underparent->content .
                    "</div>
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
                    "&item=" .
                    $item->id .
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

<h3>{{__("mainf.underitems")}}</h3>
<x-accordion.main :items="$items" />
        <a class="btn btn-info"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        <x-icon.main :name="'contact-add'" :size=3 :color="'green'"/>
        </a>
        <!-- unvisible modul blok  create item -->
        <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Create new item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                 <form action="{{route('item.store')}}" method="post" class="row g-3 needs-validation" novalidate>   
                         @csrf
                        @isset($blank->id) 
                        <input type="hidden" name="item" id="item" value="{{$item->id}}" class="form-control">
                        <a href="{{route('position.additemshow',$item)}}" class='btn'>Add positions</a>
                        @endif
            
                        @isset($positions)
                        
                            <!-- select multiple items -->
                            <div class="form-group">
                                <label for="positions">{{__("mainf.positionr")}}</label>
                                <select name="positions[]" id="positions" class="form-control" multiple required>

                                    @foreach($positions as $position)
                                        <option value="{{$position->id}}">{{$position->abv}} -  {{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    
                        <div class="form-group">
                            <label for="name">{{__("mainf.namei")}}</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="content">{{__("mainf.content")}}</label>
                            <textarea name="content" id="description_under" cols="30" rows="10" class="form-control" required></textarea>
                        </div>

                        <!-- parent_id form-group -->
                        <div class="form-group">
                            <label for="parent_id">Parent_id {{$item->id}} </label>
                            <input type="hidden" name="parent_id" id="parent_id" value="{{$item->id}}"  class="form-control">

                        </div>


                                <!-- status form-group -->

                                <legend>{{__("mainf.status")}}</legend>

                                <div class="form-check">
                                    <input type="radio" name="status" id="status1" value="0" 
                                    @if($item->status == 0)
                                            checked
                                        @endif
                                    class="form-check-input">
                                    <label class="form-check-label" for="status1">{{__("mainf.draft")}}</label>
                                </div><div class="form-check">
                                        <input type="radio" name="status" id="status2" value="1" 
                                        @if($item->status == 1)
                                            checked
                                        @endif
                                        class="form-check-input">
                                        <label class="form-check-label" for="status2">{{__("mainf.onlymy")}}</label>
                                </div><div class="form-check">
                                        <input type="radio" name="status" id="status3" value="2"  
                                        @if($item->status == 2)
                                            checked
                                        @endif
                                        class="form-check-input">
                                        <label class="form-check-label" for="status3">{{__("mainf.free")}}</label>
                                </div>

                               
                        <button type="submit" class="btn btn-primary"><x-icon.main name="'tick-boxed'" :size=3 :color="'blue'"/></button>
                     </form>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
        CKEDITOR.replace('description_under', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endsection