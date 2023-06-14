
        <h2>{!!__('blanks.start')!!}: 
        <a href="{{route('addstart',$blank->id)}}" class="btn">
               <x-icon.main :name="'drawing-tablet'" :size=1 :color="'blue'"/> 
            </a>
        </h2>
        @foreach($blank->startconditions as $condition)
        <div class="row" id="startcondition_{!!$condition->id!!}">
            <div class="col-md-10 border">
                {!!str_replace($stms,$stmsM,$condition->content)!!}
                <input type="checkbox" onclick="AddformStartCondition({!!$condition->id!!})" id="startcondition_{!!$condition->id!!}_checkbox" name="startcondition_{!!$condition->id!!}_checkbox" value="1">

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
        <div class="row">
            <div class="col-md-12">
                 <form  action = "{{route('start.trashSelect')}}" method="post" id="formStartCondition">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="blank" value="{!!$blank->id!!}">
                    <button type="submit" class="btn btn-light"   title="blank dell">
                       <x-icon.main :name="'trash'" :size=1 :color="'#111'" />
                   </button>
                </form>          
            </div>
        </div>
