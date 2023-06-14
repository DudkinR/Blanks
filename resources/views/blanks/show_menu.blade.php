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