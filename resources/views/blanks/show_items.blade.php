 <div class="row"  style="background-color:{{$blank->color}}">
    <?php $next_item=  0;?>
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
             <div class="row border" id="itemIdBlank_{!!$item->id!!}_{{$item->pivot->order}}">
             <div class="col-md-1"><a href="#" title="{!!$item->name!!}">{{$item->pivot->order}}</a>
             <input type="checkbox"   id="item_{!!$item->id!!}_{{$item->pivot->order}}_checkbox" onclick="TrashAllSelectItem({!!$item->id!!},{{$item->pivot->order}})">
             
             </div>
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
                <a href="{{route('position.additemshow',$item->id)}}?blank={{$blank->id}}#item_{{$item->id}}" class='btn' title="Add positions">
                  <x-icon.main :name="'search-job'" :size=1 :color="'blue'"/>
                </a>
                @endif 
             </div>
             <div class="col-md-1 border">
                @foreach($item->control_positions as $position)   
                     {!!$position->abv!!}
                @endforeach
                @if($item->positions->count()==0)
                <a href="{{route('position.additemshow',$item->id)}}?blank={{$blank->id}}#item_{{$item->id}}" class='btn' title="Add positions">
                  <x-icon.main :name="'search-job'" :size=1 :color="'blue'"/>
                </a>
                @endif 
             </div>
             <div class="col-md-1 border">
                <a href="{{route('item.edit',$item->id)}}?blank={!!$blank->id!!}#item_{{$item->id}}"  class="btn btn-light"   title="edit item">
                <x-icon.main :name="'ui-edit'" :size=1 :color="'#111'"/>
                </a>
                <form action="{{route('item.del', $item->id)}}#item_{{$next_item}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="blank" value="{!!$blank->id!!}">
                            <input type="hidden" name="order" value="{!!$item->pivot->order!!}">
                            <button type="submit"  class="btn btn-light"  title="delete item">
                                <x-icon.main :name="'ui-delete'" :size=1 :color="'#111'"/>
                            </button>
                </form>
                <form action="{{route('item.copy', )}}#item_{{$item->id}}" method="post">
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
            <form action="{{route('item.shift_up', )}}#item_{{$item->id}}" method="post">
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
            <form action="{{route('item.shift_down', $item->id)}}#item_{{$item->id}}" method="post">
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
        <?php $next_item=   $item->id;?>
      @endforeach
       <div class="row">
         <form action="{{route('item.trashall')}}" method="POST" id="selectItems">
          @csrf
          <input type="hidden" name="blank" value="{!!$blank->id!!}">
          <button type="submit" class="btn btn-light"   title="trash all items">
              <x-icon.main :name="'trash'" :size=1 :color="'#111'"/>
          </button>
       </form>
        </div>
          
    </div>