@extends('layouts.app')
@section('title', __("Show Project"))
@section('type', "projects")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-1">
                <a href="{{route('project.index')}}" class='btn'>
                    <x-icon.main :name="'arrow-left'" :size=2 :color="'grey'"/>
                </a>
            </div>
            <div class="col-md-11 bg-info">
            <h1> {!!$project->name!!}</h1>
            </div>


        </div>
    </div>
    <?php
    $project_time = 0;
    $project_price_dayly = 0;
    $project_price_buy = 0;
    $project_price_production = 0;
    $mass_blanks = [];
    $blanks=\Illuminate\Support\Facades\DB::table("project_blank")
    ->where("project_id",$project->id)
    ->where("author_id",$project->author_id)
    ->get();

    ?>
    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                <?php 
                $bl_start = 0;  
                $order_blank=1;
                $refresh=0;
                ?>
                @if($blanks->count() > 0)
                    @foreach($blanks as $key=>$bl_id)
                    <?php
                        $blank=\App\Models\Blank::find($bl_id->blank_id);
                        $bg="bg-light";
                       if(\App\Models\Blank::where('author_id',Auth::id())->where('parent_id',$blank->id)->count()>0||$blank->Author_id==Auth::id())
                        $bg="bg-success";
                         $pbo = \Illuminate\Support\Facades\DB::table("project_blank")
                        ->where("project_id",$project->id)
                        ->where("blank_id",$blank->id)
                        ->where("order",$bl_id->order)
                        ->where("author_id",Auth::id())
                        ->get();
                      
                      if($pbo->count()==1&&$pbo[0]->type==1){
                        $bgw="bg-success"; $refresh=1;
                    }
                      else
                        $bgw="bg-light";
                     $order_blank++;
                        ?>
                       <div class="row border">
                        <div class="col-md-1 {{$bg}}">
                            
                            <a href="#" title="{!!$blank->name!!}">{{$bl_id->order}}  </a>
                        </div>
                        <div class="col-md-6 {{$bgw}}"> 
                        <a name="blank_{{$blank->id}}" href="{{route('blanks.show',$blank->id)}}"> 
                            {!!$blank->name!!}
                        </a> 
                            @if($bg=="bg-success")
                           ( {{__('Already yours')}})
                            @endif
                        </div>
                        <div class="col-md-5 border"> 
                        <?php
                        $PBOS = new App\Models\ProjectBlankOrderStamp();
                        $stmps = $PBOS->stamps(
                            $project->id,
                            $blank->id,
                            $bl_id->order
                        );
                        $stamps = $stmps["stamps"];
                        $stampsN = $stmps["stampsN"];
                        ?>
                           <ul>
                                @foreach($stamps as $key=>$stamp)
                                <li>
                                    @if($stampsN[$key] ==$stamp)
                                    {{$stamp}} ----------------
                                    @else
                                    {{$stamp}} - {{$stampsN[$key]}}
                                    @endif
                                </li>
                                @endforeach         
                            </ul>
                        </div>

  
                            </div>
                            <?php
                            $project_time +=
                                $blank->items->sum("avoid_time") + 60;
                            // надо учитывать количество использований
                            if (!in_array($blank->id, $mass_blanks)) {
                                if ($blank->author_id !== Auth::id()&&$bg!=="bg-success") {
                                    if (
                                        \App\Models\StatBlank::countUnicAuthor(
                                            $blank->id
                                        ) > $blank->start
                                    ) {
                                        $project_price_dayly += 0.01;
                                    }
                                    $project_price_buy += 1;
                                } else {
                                    $project_price_production += 1;
                                }
                                $mass_blanks[] = $blank->id;
                            }
                            ?>
                    @endforeach
                @endif

                    </div>
                    <?php $stat_project = \App\Http\Controllers\StatistController::stat_project(
                    $project->id,
                    new \App\Http\Controllers\StatistController()
                ); ?>
                <div class="row">
                    <h1>{{__('mainf.statistproject')}}</h1>
                <div class="col-md-6">
                    <div class="row border">
                        <div class="col-md-10">{{__('mainf.statistprojecttime')}}</div>
                        <div class="col-md-2">{{ceil($project_time/60)}} {{__('mainf.min')}}</div>
                    </div>
                    <div class="row border">
                        <div class="col-md-10">{{__('Price dayly')}}</div>
                        <div class="col-md-2">{{ $project_price_dayly}} $</div>
                    </div>
                    <div class="row border">
                        <div class="col-md-10">{{__('Price for buy')}}</div>
                        <div class="col-md-2">{{ $project_price_buy}} $</div>
                    </div>
                    <div class="row border">
                        <div class="col-md-10">{{__('Price for other')}} + {{__('Your part')}}</div>
                        <div class="col-md-2">{{ $project_price_buy}}$ + {{ $project_price_production}} $</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('project.buy',$project->id)}}" class="btn btn-light" title=" {{__('Buy')}} ">
                                <x-icon.main :name="'dollar'" :size=6 :color="'green'"/>
                            </a>
                        </div>
                        <div class="col-md-4">
                        <a href="{{route('blanks.wbp',$project->id)}}?item=0" class="btn btn-light" title=" {{__('mainf.startworkproject')}} ">
                            <x-icon.main :name="'runner-alt-1'" :size=6 :color="'green'"/>
                        </a></div>
                        <div class="col-md-4">
                            @if( $refresh == 1 )
                            <a href="{{route('project.replayg',$project->id)}}" class="btn btn-light" title=" {{__('mainf.startworkproject')}} ">
                                <x-icon.main :name="'ui-reply'" :size=6 :color="'green'"/>
                            </a>
                            @endif
                    
                    </div>
                    </div>
               </div>
        
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        @isset($stat_project["reiting"])
                        <div class="col-md-6">
                        <ul>
                            <li>reiting {{number_format($stat_project["reiting"],2)}},  </li>
                            <li>finish {{number_format($stat_project["finish"],2)}},  </li>
                            <li>full {{number_format($stat_project["full"],2)}},  </li>
                            <li>dificult  {{number_format($stat_project["dificult"],2)}},</li>
                            <li>usefull {{number_format($stat_project["usefull"],2)}},</li>
                            <li>understand  {{number_format($stat_project["understand"],2)}},</li>
                            <li>detail {{number_format($stat_project["detail"],2)}},</li>
                            <li>popular  {{number_format($stat_project["popular"],2)}}</li> 
                            <li>potential_ideas  {{number_format($stat_project["potential_ideas"],2)}}</li> 
                            <li>timer  {{number_format($stat_project["timer"],2)}}</li> 
                            <li>min_timer  {{number_format($stat_project["min_timer"],2)}}</li> 
                            <li>max_timer  {{number_format($stat_project["max_timer"],2)}}</li> 
                            <li>count_blanks  {{$stat_project["count_blanks"]}}</li> 
                            
                        </ul>
                        @endif
                        </div>
                    </div>
                    
                    <div class="row border">
                        <h3>{{__('mainf.projectrecomends')}}</h3>
                        <ul>
                        
                        </ul>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12">
                    <a href="" >{{__('mainf.startworkproject')}}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript для изменения размера внутреннего шестиугольника -->
    <script>
        const data2 = [100, 100, 100, 100, 100, 100]; // Массив данных
        const data3 = [50, 50, 50, 50, 50, 50]; // Массив данных
        genPoligon(data2,'innerHexm');
        genPoligon(data3,'innerHexS');
        opositeLine(data2,'line0','line60','line120');
        const  mass=[
            {{$stat_project["full"]}},
            {{$stat_project["dificult"]}},
            {{$stat_project["usefull"]}},
            {{$stat_project["understand"]}},
            {{$stat_project["detail"]}},
            {{$stat_project["popular"]}}
        ];
        genPoligon(mass,'innerHex');
        changePoligon(event);
    </script>
@endsection