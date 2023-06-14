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
                <input type="checkbox" id="finishcondition_{{$condition->id}}_checkbox" name="finishcondition_{{$condition->id}}_checkbox" value="{{$condition->id}}" onchange="AddformFinishCondition({{$condition->id}})">
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
        <div class="row">
        <div class="col-md-12 bg-light">
        <form action="{{route('finish.trashall')}}" method="post" id="formFinishCondition">
            @csrf
            @method('PUT')
            <input type="hidden" name="blank" value="{!!$blank->id!!}">
                    <button type="submit" class="btn btn-light"   title="blank dell">
                        <x-icon.main :name="'trash'" :size=1 :color="'#111'" />
                    </button>
               
      </form>
    </div>