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
            <div class="col-md-9 bg-info">
            <h1> {!!$project->name!!}</h1>
            </div>
            <div class="col-md-1">
                <a href="{{route('project.edit', $project->id)}}" class='btn'>
                    <x-icon.main :name="'pencil'" :size=2 :color="'grey'"/>
                </a>
            </div>
            <div class="col-md-1">
                <form action="{{route('project.destroy', $project->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> 
                        <x-icon.main :name="'trash'" :size=2 :color="'grey'"/>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
    $project_time = 0;
    $project_price_dayly = 0;
    $project_price_buy = 0;
    $project_price_production = 0;
    $mass_blanks = [];
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <?php
//  $work_do= $project->blanks->where('pivot.type','>',0)->count();
?>
                    @if($project->blanks->where('pivot.type','=',0)->count()!==0)
                        <a href="{{route('blanks.wbp',$project->id)}}?item=0" class="btn btn-light" title=" {{__('mainf.startworkproject')}} ">
                            <x-icon.main :name="'runner-alt-1'" :size=2 :color="'grey'"/>
                        </a>
                    @endif
                    @if(session("project")!==$project->id)
                    <a href="{{route('project.head',$project->id)}}" class="btn btn-light" title=" {{__('mainf.MakeMain')}} ">
                        <x-icon.main :name="'lion-head-1'" :size=2 :color="'grey'"/>
                    </a>
                    @endif
                    @if($project->blanks->count()>0)
                    <a href="{{route('project.replay',$project->id)}}" class="btn btn-light" title=" {{__('mainf.replay')}} ">
                        <x-icon.main :name="'ui-reply'" :size=2 :color="'grey'"/>
                    </a>
                    @endif
                    <a href="{{route('blanks.index')}}" class="btn btn-light" title=" {{__('mainf.blanks')}} ">
                        <x-icon.main :name="'list'" :size=2 :color="'grey'"/>
                    </a>
                    <a href="{{route('looks')}}?blanks" class="btn btn-light"  title="{{__('mainf.look')}}">
                            <x-icon.main :name="'search-2'" :size=2 :color="'grey'" /></a>
                </div>
            </div>
            <div class="row">
                <?php $bl_start = 0; ?>
                @if($project->blanks->count() > 0)
                    @foreach($project->blanks as $blank)
                        <?php
                        $bg = "info";
                        if (
                            $blank->pivot->type == 0 ||
                            $blank->pivot->type == null
                        ) {
                            $bg = "light";
                            $bl_start++;
                        } elseif ($blank->pivot->type == 1) {
                            $bg = "success";
                        }
                        ?>
                        <div class="row border bg-{{$bg}}">
                        <div class="col-md-1">
                            <a href="#" title="{!!$blank->name!!}"> {!!$blank->pivot->order !!}</a>
                        </div>
                        <div class="col-md-4 "> 
                        <a name="blank_{{$blank->id}}"></a>
                            {!!$blank->name!!}
                        </div>
                        <div class="col-md-3 border"> 
                        <?php
                        $PBOS = new App\Models\ProjectBlankOrderStamp();
                        $stmps = $PBOS->stamps(
                            $project->id,
                            $blank->id,
                            $blank->pivot->order
                        );
                        $stamps = $stmps["stamps"];
                        $stampsN = $stmps["stampsN"];
                        ?>
                        <form action="{{route('add_stamp_project_blank')}}" method="post">
                            @csrf
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <input type="hidden" name="blank_id" value="{{$blank->id}}">
                            <input type="hidden" name="order" value="{{$blank->pivot->order}}">
                            <button type="submit" class="btn btn-light" title=" {{__('mainf.addstamp')}} ">
                                <x-icon.main :name="'pencil'" :size=1 :color="'#111'"/>
                            </button>
                        </form>
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
                        @if($bg !== "success")
                            <div class="col-md-1 border">
                                <a href="{{route('blanks.edit',$blank->id)}}?project={!!$project->id!!}"  class="btn  btn-light"   title="edit blank">
                                <x-icon.main :name="'ui-edit'" :size=1 :color="'#111'"/>
                                </a>
                                <form action="{{route('projectblank.destroy', $project->id)}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="project" value="{!!$project->id!!}">
                                            <input type="hidden" name="blank" value="{!!$blank->id!!}">
                                            <input type="hidden" name="order" value="{{$blank->pivot->order}}">
                                            <button type="submit"  class="btn  btn-light"  title="delete blank">
                                                <x-icon.main :name="'ui-delete'" :size=1 :color="'#111'"/>
                                            </button>
                                </form>
                                <form action="{{route('projectblank.copy', $project->id)}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="project" value="{!!$project->id!!}">
                                            <input type="hidden" name="blank" value="{!!$blank->id!!}">
                                            <input type="hidden" name="order" value="{{$blank->pivot->order}}">
                                            <button type="submit"  class="btn  btn-light"  title="copy blank">
                                            <x-icon.main :name="'ui-copy'" :size=1 :color="'#111'"/>
                                            </button>
                                </form>
                            </div>
                            <div class="col-md-1 justify-content-between">
                            <form action="{{route('project.shift_up', $project->id)}}" method="post">
                                @csrf
                                @method('PUT') 
                                <input type="hidden" name="order" value="{{$blank->pivot->order}}">
                                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                                <input type="hidden" name="project" value="{!!$project->id!!}">
                                <button type="submit" class="btn  btn-light"   title="blank up">
                                    <x-icon.main :name="'caret-up'" :size=1 :color="'#111'" />
                                </button>
                            </form>
                            <form action="{{route('project.shift_down', $project->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="order" value="{{$blank->pivot->order}}">
                                <input type="hidden" name="blank" value="{!!$blank->id!!}">
                                <input type="hidden" name="project" value="{!!$project->id!!}">
                                <button type="submit" class="btn  btn-light"   title="blank down {!!$project->id!!} {!!$blank->id!!}">
                                    <x-icon.main :name="'caret-down'" :size=1 :color="'#111'"/>
                                </button>
                            </form>
                            </div>
                        @else
                            <div class="col-md-2">
                                <x-icon.main :name="'hand-power'" :size=2 :color="'yellow'"/>
                            </div>
                        @endif
                        @if($bl_start==1)
                            <div class="col-md-1">
                                <a href="{{route('blanks.wbp',$project->id)}}?item=0" class="btn btn-light" title=" {{__('mainf.startworkproject')}} ">
                                    <x-icon.main :name="'runner-alt-1'" :size=2 :color="'grey'"/>
                                </a>
                            </div>
                        @endif
                            </div>
                            <?php
                            $project_time +=
                                $blank->items->sum("avoid_time") + 60;
                            // надо учитывать количество использований
                            if (!in_array($blank->id, $mass_blanks)) {
                                if ($blank->author_id !== Auth::id()) {
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