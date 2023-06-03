
@extends('layouts.app')
@section('title', __("Finish blank"))
@section('type', "blanks")
@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="row">
            <div class="col-md-10">
                <h1>{{__('mainf.wfinish')}}</h1>
                @isset($project)
                <h1>{!!$project->name!!}</h1> 
                @endif
                <h1>{!!$blank->name!!}</h1> 
                <h2>{{__('mainf.finishval')}}:</h2>
            </div>
            <div class="col-md-2">
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
        </div>  
        <x-form.tickmarks/>      
        <form action="{{route('blanks.stat',$blank->id)}}" method="post">
        @csrf
        <input type="hidden" name="blank" value="{{$blank->id}}">
        @isset($project)
        <input type="hidden" name="project" value="{{$project->id}}">
        @endif
        <div class="row">
            <div class="col-4">
            <div class="form-switch ">
                <input type="checkbox" name="wf" id="wf" value="1"  checked  class="form-check-input">
                <label class="form-check-label" for="wf">{{__('mainf.wfinish')}}</label>
            </div>
        </div>
            <div class="col-4">

            </div>
        </div>
        <div class="container">
                <div class="row">
                <h2>{{__('mainf.finishfull')}}</h2>
                    <div class="col-12">
                        <input type="range" name="ffull" id="perform" class="form-range" min="0" max="100" value="100" oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>
                <div class="row">
                   <h2>{{__('mainf.finishdificult')}}</h2>
                    <div class="col-12">
                        <input type="range" name="fdificult"  id="dificult" class="form-range" min="0" max="100" value="100"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>
                <h2>{{__('mainf.finishuseful')}}</h2> 
                <div class="row">
                    <div class="col-12">
                        <input type="range" name="fuseful" id="usefull"  class="form-range" min="0" max="100" value="100"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row"><h2>{{__('mainf.finishunderstand')}}</h2>
                    <div class="col-12">
                        <input type="range" name="funderstand" id="understand" class="form-range" min="0" max="100" value="100"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row">    <h2>{{__('mainf.finishdetail')}}</h2>
                    <div class="col-12">
                        <input type="range" name="fdetail" id="detail" class="form-range" min="0" max="100" value="100"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row"> <h2>{{__('mainf.popular')}}</h2>
                    <div class="col-12">
                        
                        <input type="range" name="fpopular" id="popular" class="form-range" min="0" max="100" value="100"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-3">{{__('mainf.finishstat')}}</div>
            <div class="col-md-1">{{__('mainf.real')}}</div>
            <div class="col-md-1">{{__('mainf.avoid')}}</div>
            <div class="col-md-2"> {{__('mainf.finishtimer')}}</div>
            <div class="col-md-5">{{__('mainf.finishideas')}}</div>
        </div>
        <?php
        $i = 1;
        $timer = 1;
        $prb = 0;
        ?>
        @foreach($itemsdata as $itemd)
            <div class="row
            @if($itemd[3]<=50)
            bg-light
            @elseif($itemd[3]>50&&$itemd[3]<105)
             bg-success
            @elseif($itemd[3]>105&&$itemd[3]<120)
             bg-warning
             @else
              bg-danger
            @endif
            ">
                <div class="col-md-3">{{$itemd[0]}}</div>
                <div class="col-md-1">{{$itemd[1]}} {{__('mainf.sec')}}</div>
                <div class="col-md-1">{{$itemd[2]}}  {{__('mainf.sec')}}</div>
                <div class="col-md-2">{{ceil($itemd[3])}} %</div>
                <div class="col-md-5">
                    
                    @foreach($itemd[4] as $problem)
                        <div class="row">
                            <div class="col-md-12">
                                {{$problem->content}}
                            </div>
                        </div>
                    <?php $prb++; ?>
                    @endforeach
                </div>
            </div>
            <?php
            $timer = $timer + $itemd[3];
            $i++;
            ?>
        @endforeach
            <?php if (!isset($timer)) {
                $timer = 1;
            } ?>
            <input type="hidden" value="{{ceil($timer/$i)}}" id="timer" name="timer">

            <div class="row">

            <input type="hidden" value="{{$prb}}" id="ideas" name="ideas">
        </div>
        
        <button type="submit" class="btn btn-primary">
                <x-icon.main :name="'hand-drag1'" :size=3 :color="'yellow'"/>
        </button>
    </form>   
    </div>
</div>
<!-- JavaScript для изменения размера внутреннего шестиугольника -->
<script>
    const data = [100, 100, 100, 100, 100, 100]; // Массив данных реальный шестиугольник
    const data2 = [100, 100, 100, 100, 100, 100]; // Массив данных большой мнгоугольник
    // all 50
    const data3 = [50, 50, 50, 50, 50, 50]; // Массив данных малый многоугольник


    // Установка значения атрибута points для внутреннего шестиугольника
    function genPoligon(data,polygonId){
        const maxDistance = 50; // Максимальное расстояние от центра в пикселях
        const innerHex = document.getElementById(polygonId); // Элемент внутреннего шестиугольника
        // Генерация строкового значения атрибута points для внутреннего шестиугольника
        const points = [];
        for (let i = 0; i < 6; i++) {
        const angle = i * 60; // Угол между вершиной и осью X в градусах
        const distance = maxDistance * (data[i] / 100); // Расстояние от центра
        const x = 50 + distance * Math.cos(angle * Math.PI / 180); // Координата X вершины
        const y = 50 + distance * Math.sin(angle * Math.PI / 180); // Координата Y вершины
        points.push(`${x},${y}`);
        }
        // Установка значения атрибута points для внутреннего шестиугольника
        innerHex.setAttribute('points', points.join(' '));
    }
    function opositeLine(data,line0,line60,line120){
        const maxDistance = 50; // Максимальное расстояние от центра в пикселях
        const liner0 = document.getElementById(line0); // Элемент line  angle 0
        const liner60 = document.getElementById(line60); // Элемент line  angle 60
        const liner120 = document.getElementById(line120); // Элемент line  angle 120
        const points = [];
        for (let i = 0; i < 6; i++) {
        const angle = i * 60; // Угол между вершиной и осью X в градусах
        const distance = maxDistance * (data[i] / 100); // Расстояние от центра
        const x = Math.ceil(50 + distance * Math.cos(angle * Math.PI / 180));
        const y = Math.ceil(50 + distance * Math.sin(angle * Math.PI / 180));
        points.push(x);
        points.push(y);
        }
        console.log(points);
        liner0.setAttribute('x1', points[0]);
        liner0.setAttribute('y1', points[1]);
        liner0.setAttribute('x2', points[6]);
        liner0.setAttribute('y2', points[7]);
        liner60.setAttribute('x1', points[2]);
        liner60.setAttribute('y1', points[3]);
        liner60.setAttribute('x2', points[8]);
        liner60.setAttribute('y2', points[9]);
        liner120.setAttribute('x1', points[4]);
        liner120.setAttribute('y1', points[5]);
        liner120.setAttribute('x2', points[10]);
        liner120.setAttribute('y2', points[11]);
    }
    genPoligon(data2,'innerHexm');
//    genPoligon(data,'innerHex');
    genPoligon(data3,'innerHexS');
    opositeLine(data2,'line0','line60','line120');
    genPoligon(mass,'innerHex');

    function changePoligon(event){
    const perform=document.getElementById('perform');
    const dificult=document.getElementById('dificult');
    const usefull=document.getElementById('usefull');
    const understand=document.getElementById('understand');
    const detail=document.getElementById('detail');
    const popular=document.getElementById('popular');
    const  mass=[perform.value,dificult.value,usefull.value,understand.value,detail.value,popular.value];
        console.log(mass);
        genPoligon(mass,'innerHex');
    }
    changePoligon(event);
</script>
@endsection