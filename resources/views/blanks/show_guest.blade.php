@extends('layouts.app')
@section('title', __("Show guest blank"))
@section('type', "blanks")
@section('content')
<div class="container" id="blank_body">
    <div class="row justify-content-center">
        
        <!-- show blank -->
        <?php
         $project_current=\App\Http\Controllers\ProjectController::current_project();
        ?>
        <div class="row">
            <div class="col-md-10">
                <a   class="btn  btn-light"  onclick="if (confirm('{{__('mainf.addblanktoproject')}} : {{$project_current->name}}')) {fetchwork({{$blank->id}}); }">
            <x-icon.main :name="'plus'" :size=2 :color="'black'" />
        </a></div>
            <div class="col-md-2"> 
                посмотреть если есть потомок данного бланка в колекции то переход на купленный бланк либо принудительно покупать с блок =1
                <form action="{{route('blanks.buy_blank',$blank->id)}}" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="blank_id" value="{{$blank->id}}">
                <button type="submit"  class="btn  btn-light"  title="buy blank 1$" onclick="if (confirm('{{__('Attation')}} : {{__(' minus  1 $ ')}}')) {submit(); }">
                <x-icon.main :name="'dollar-plus'" :size=1 :color="'#111'"/>
                </button>
                </form> 
            </div>
        </div>
        
       
        <div class="card">
            <div class="row">
    
                    <?php
                    $stms = [];
                    $stmsM = [];
                    foreach ($blank->stamps as $stamp) {
                        $stms[] = $stamp->content;
                        $stmsM[] = "<mark>" . $stamp->content . "</mark>";
                    }
                    ?>
                    <div class="col-md-8">
                    <h1>{!!str_replace($stms,$stmsM,$blank->name)!!}</h1> 
                    <p>{!!str_replace($stms,$stmsM,$blank->tcheme)!!}</p>
                
                </div>    
                <div class="col-md-4 border">
                    <h1>{{__("Stamps")}}</h1>
                    <div id="blank_stamps">
                    @foreach ($stmsM as $sm)
                {!!$sm!!},
                @endforeach
                </div>
                </div>
            </div>
            <h2>{!!__('blanks.start')!!}
            </h2>
            @foreach($blank->startconditions as $condition)
            <div class="row">
                <div class="col-md-10 border">
                    {!!str_replace($stms,$stmsM,$condition->content)!!}
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
                            
                            </div>",
                ];
            }
            ?>
                <div class="row border">
                    <div class="col-md-1"><a href="#" title="{!!$item->name!!}">{{$item->pivot->order}}</a></div>
                    <div class="col-md-9 "> 
                
                        {!!str_replace($stms,$stmsM,$item->content)!!}
                    
                    </div>
                    <div class="col-md-2 border">
                        @foreach($item->positions as $position)   
                            {!!$position->abv!!}
                        @endforeach
                    
                    </div>
                </div>
            @if(count($items)>0)
            <h3>Under items </h3>
            <x-accordion.main :items="$items" />
            @endif
            @endforeach
        </div>

        </div> 
        <div class="container bg-light">
            <a name="finish"></a>
            <h2>{!!__('blanks.finish')!!}:
            </h2>
            @foreach($blank->finishconditions as $condition)
            <div class="row">
                <div class="col-md-10 border">
                    {!!str_replace($stms,$stmsM,$condition->content)!!}
                </div>
            </div>
            @endforeach
        </div>

    </div>
 </div>
<script>
  

</script>

@endsection