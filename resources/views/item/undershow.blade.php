@extends('layouts.app')
@section('title', __("Under Items"))
@section('type', "items"))

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- link back to blanks route -->
    <a href="{{route('blanks.index')}}">Back to blanks !!!!!!!!!!!!!!!!!!!!!!!</a>
    <!-- show blank -->
    <div class="card">
        <div class="col-md-6">
            @foreach($item->blanks as $blank)
            <a href="{{route('blanks.show',$blank->id)}}" class="btn btn-info">
              <x-icon.main :name="'ui-settings'" :size=3 :color="'blue'"/>   
            </a>
            @endforeach
        </div>
        <h1>{!!$item->name!!}</h1> 
        <p>{!!$item->content!!}</p>
        <h2>{!!__('blanks.start')!!}:</h2>
        @foreach($item->startconditions as $condition)
                {!!$condition->content!!} <br>  
            @endforeach
        <div class="col-md-6">
            <a href="{{route('addstartI',$item->id)}}?uni={{$item->id}}" class="btn btn-info">
               <x-icon.main :name="'drawing-tablet'" :size=3 :color="'blue'"/> 
            </a>
        </div>
    </div>
    </div>
    <div class="row">
        @foreach($item->items as $itm)
           <?php
           $items = [];
           // просмотр и отбор подпунктов
           foreach ($itm->items as $underparent) {
               $items[] = [
                   "name" => $underparent->name,
                   "content" =>
                       "
                        <div class=\"row\">
                            <div class=\"col-md-11\">
                                " .
                       $underparent->content .
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
             <div class="col-md-1"><a href="#" title="{!!$item->name!!}">{!!$loop->iteration!!}</a></div>
             <div class="col-md-7 "> 
                @if(count($items)>0)
                <a href="{{route('underblank.show',$item->id)}}" title="edit">
                <x-icon.main :name="'file-document '" :size=3 :color="'blue'"/></a>
                @endif
                {!!$itm->content!!}
               
             </div>
             <div class="col-md-2 border"> 
                @foreach($itm->positions as $position)   
                     {!!$position->abv!!}
                @endforeach
            
                @if($itm->positions->count()==0)
                <a href="{{route('position.additemshow',$itm->id)}}?uni={{$item->id}}" class='btn'title="Add positions">
                 <x-icon.main :name="'search-job'" :size=3 :color="'blue'"/>
                </a>
                @endif
             </div>
             <div class="col-md-1 border">
                <a href="{{route('item.edit',$itm->id)}}?item={!!$item->id!!}"  class="btn btn-light"   title="edit item">
                <x-icon.main :name="'ui-edit'" :size=1 :color="'#111'"/>
                </a>
                <form action="{{route('item.destroy', $itm->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="item" value="{!!$itm->id!!}">
                            <input type="hidden" name="uni" value="{!!$item->id!!}">
                            <button type="submit"  class="btn btn-light"  title="delete item"><x-icon.main :name="'ui-delete'" :size=1 :color="'#111'"/></button>
                </form>
             </div>
             <div class="col-md-1 justify-content-between">
            <form action="{{route('item.shift_up', )}}" method="post">
                @csrf
                <input type="hidden" name="blank" value="{!!$item->id!!}">
                <input type="hidden" name="item" value="{!!$itm->id!!}">
                <button type="submit" class="btn btn-light"   title="item up"><x-icon.main :name="'caret-up'" :size=1 :color="'#111'" /></button>
            </form>
            <a class="btn btn-light"  title="item here" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
            <x-icon.main :name="'contact-add'" :size=1 :color="'#111'"/>
            </a>
            <form action="{{route('item.shift_down', $itm->id)}}" method="post">
                @csrf
                <input type="hidden" name="blank" value="{!!$item->id!!}">
                <input type="hidden" name="item" value="{!!$itm->id!!}">
                <button type="submit" class="btn btn-light"   title="item down"><x-icon.main :name="'caret-down'" :size=1 :color="'#111'"/></button>
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
        <div class="col-md-6">
            <a class="btn btn-info"  title="item in the end" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        <x-icon.main :name="'contact-add'" :size=3 :color="'green'"/>
        </a>
            @isset($itm)
            <a name="last_item"></a>
            @endisset

        </div>
        <div class="col-md-6">
            <a href="{{route('item.addreadyitemI',$item->id)}}" class="btn btn-info">
       <x-icon.main :name="'ui-rate-add'" :size=3 :color="'green'"/>
            </a>
        </div>
    </div>
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
                        @isset($item->id) 
                        <input type="hidden" name="item" id="item" value="{{$item->id}}" class="form-control">
                        <a href="{{route('position.additemshow',$item->id)}}?uni={{$item->id}}" class='btn'title="Add positions">
                        <x-icon.main name="'search-job'" :size=3 :color="'blue'"/>
                         </a>
                        @endif
            
                        @if(isset($item->positions)&&$item->positions->count()>0)
                        
                            <!-- select multiple items -->
                            <div class="form-group">
                                <label for="positions">Positions response</label>
                                <select name="positions[]" id="positions" class="form-control" multiple required>
                              
                                    @foreach($item->positions as $position)
                                        <option value="{{$position->id}}">{{$position->abv}} -  {{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="description" cols="30" rows="10" class="form-control" required></textarea>
                        </div>

                        <!-- parent_id form-group -->
                        <div class="form-group">
                            <label for="parent_id">Parent_id</label>
                            <input type="text" name="parent_id" id="parent_id" value="{{$item->id}}"  class="form-control">
                        </div>

                        <!-- status form-group -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="number" name="status" id="status" value="0" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"><x-icon.main name="'tick-boxed'" :size=3 :color="'blue'"/></button>
                     </form>
                </div>
               
                </div>
            </div>
        </div>



<script>

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
window.onload = function() {
    window.location.hash = 'last_item';
};
CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
</script>
@endsection