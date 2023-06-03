@extends('layouts.app')
@section('title', 'Название страницы')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        
            <datalist id="tickmarks">
            <option value="0" label="0%">
            <option value="1" label="1%">
            <option value="2" label="2%">
            <option value="3" label="3%">
            <option value="4" label="4%">
            <option value="5" label="5%">
            <option value="6" label="6%">
            <option value="7" label="7%">
            <option value="8" label="8%">
            <option value="9" label="9%">
            <option value="10" label="10%">
            <option value="11" label="11%">
            <option value="12" label="12%">
            <option value="13" label="13%">
            <option value="14" label="14%">
            <option value="15" label="15%">
            <option value="16" label="16%">
            <option value="17" label="17%">
            <option value="18" label="18%">
            <option value="19" label="19%">
            <option value="20" label="20%">
            <option value="21" label="21%">
            <option value="22" label="22%">
            <option value="23" label="23%">
            <option value="24" label="24%">
            <option value="25" label="25%">
            <option value="26" label="26%">
            <option value="27" label="27%">
            <option value="28" label="28%">
            <option value="29" label="29%">
            <option value="30" label="30%">
            <option value="31" label="31%">
            <option value="32" label="32%">
            <option value="33" label="33%">
            <option value="34" label="34%">
            <option value="35" label="35%">
            <option value="36" label="36%">
            <option value="37" label="37%">
            <option value="38" label="38%">
            <option value="39" label="39%">
            <option value="40" label="40%">
            <option value="41" label="41%">
            <option value="42" label="42%">
            <option value="43" label="43%">
            <option value="44" label="44%">
            <option value="45" label="45%">
            <option value="46" label="46%">
            <option value="47" label="47%">
            <option value="48" label="48%">
            <option value="49" label="49%">                
            <option value="50" label="50%">
            <option value="51" label="51%">
            <option value="52" label="52%">
            <option value="53" label="53%">
            <option value="54" label="54%">
            <option value="55" label="55%">
            <option value="56" label="56%">
            <option value="57" label="57%">
            <option value="58" label="58%">
            <option value="59" label="59%">
            <option value="60" label="60%">
            <option value="61" label="61%">
            <option value="62" label="62%">
            <option value="63" label="63%">
            <option value="64" label="64%">
            <option value="65" label="65%">
            <option value="66" label="66%">
            <option value="67" label="67%">
            <option value="68" label="68%">
            <option value="69" label="69%">
            <option value="70" label="70%">
            <option value="71" label="71%">
            <option value="72" label="72%">
            <option value="73" label="73%">
            <option value="74" label="74%">
            <option value="75" label="75%">
            <option value="76" label="76%">
            <option value="77" label="77%">
            <option value="78" label="78%">
            <option value="79" label="79%">
            <option value="80" label="80%">
            <option value="81" label="81%">
            <option value="82" label="82%">
            <option value="83" label="83%">
            <option value="84" label="84%">
            <option value="85" label="85%">
            <option value="86" label="86%">
            <option value="87" label="87%">
            <option value="88" label="88%">
            <option value="89" label="89%">
            <option value="90" label="90%">
            <option value="91" label="91%">
            <option value="92" label="92%">
            <option value="93" label="93%">
            <option value="94" label="94%">
            <option value="95" label="95%">
            <option value="96" label="96%">
            <option value="97" label="97%">
            <option value="98" label="98%">
            <option value="99" label="99%">
            <option value="100" label="100%">
            </datalist>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <input type="range" name="perform" id="perform" class="form-range" min="0" max="100" value="50" oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="range" name="dificult"  id="dificult" class="form-range" min="0" max="100" value="50"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="range" name="usefull" id="usefull"  class="form-range" min="0" max="100" value="50"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="range" name="understand" id="understand" class="form-range" min="0" max="100" value="50"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="range" name="detail" id="detail" class="form-range" min="0" max="100" value="50"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="range" name="popular" id="popular" class="form-range" min="0" max="100" value="50"  oninput="changePoligon(event)" list="tickmarks">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
        <svg viewBox="0 0 100 100" width="350" height="350">
            <!-- Большой шестиугольник -->
            <polygon id="innerHexm" stroke="black" stroke-width="0.1" fill="green" opacity="0.3"/>
            <!-- Внутренний шестиугольник -->
            <polygon id="innerHexS" stroke="black" stroke-width="0.1" fill="red" opacity="0.3"/>   
             <polygon id="innerHex" stroke="black" stroke-width="0.1" fill="blue" opacity="0.5" />
            <!-- Лучи -->
            <line id="line0" stroke="black" stroke-width="0.5" />
            <line id="line60" stroke="black" stroke-width="0.5" />
            <line id="line120" stroke="black" stroke-width="0.5" />
            <a xlink:href="{{route('help.dificult')}}" title="{{__("help.dificult")}}">
                <rect x="90" y="60" width="10" height="10" fill="transparent"  />
            </a>
            
            </svg>



        </div>
    </div>
</div>
<!-- JavaScript для изменения размера внутреннего шестиугольника -->
<script>
    const data = [50, 70, 60, 2, 50, 50]; // Массив данных
    const data2 = [100, 100, 100, 100, 100, 100]; // Массив данных
    // all 50
    const data3 = [50, 50, 50, 50, 50, 50]; // Массив данных


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
</script>
@endsection