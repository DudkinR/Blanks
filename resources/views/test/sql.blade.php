
@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')

<div class="container">
    
	<div class="header">
		<div class="container">
			<h1 class="ico-title"> QSQL </h1>
		</div>
	</div>
	<div class="container">
		
	<?php
 if (!isset($_GET["fild"]) || $_GET["fild"] == null) {
     $fild = "created_at";
 } else {
     $fild = $_GET["fild"];
 }
 $sqls = \App\Models\QSQL::orderBy($fild, "desc")
     ->take(1000)
     ->get();
 // rang to time created_at
 $i = 0;
 $mass = [];
 $bad_words = [
     "form",
     "as",
     "=?",
     "?",
     "*",
     "=",
     "",
     "count",
     "is",
     "id",
     "and",
     "or",
     "where",
     "select",
     "from",
     "join",
     "on",
     "where",
     "group",
     "by",
     "having",
     "order",
     "limit",
     "offset",
     "union",
     "insert",
     "into",
     "values",
     "update",
     "set",
     "delete",
     "create",
     "table",
     "drop",
     "alter",
     "grant",
     "revoke",
     "index",
     "primary",
     "key",
     "unique",
     "foreign",
     "references",
     "default",
     "null",
     "not",
     "like",
     "between",
     "case",
     "when",
     "then",
     "else",
     "end",
     "type",
     "cast",
     "collate",
     "constraint",
     "escape",
     "exists",
     "escape",
     "in",
     "escape",
     "escape",
     "esc",
 ];
 $wrds = [];
 foreach ($sqls as $sql) {
     $text = str_replace("`", " ", $sql->sql);
     $text = str_replace("(", " ", $text);
     $text = str_replace(")", " ", $text);
     $text = str_replace(",", " ", $text);
     $text = str_replace(".", " ", $text);
     $text = str_replace("  ", " ", $text);
     $text = str_replace("  ", " ", $text);
     $texm = explode(" ", $text);

     foreach ($texm as $word) {
         // !in_array and not number
         if (!is_numeric($word) && !in_array($word, $bad_words)) {
             if (
                 !isset($wrds[$sql->created_at->format("Y-m-d H:i:s")][$word])
             ) {
                 $wrds[$sql->created_at->format("Y-m-d H:i:s")][$word] = 1;
             } else {
                 $wrds[$sql->created_at->format("Y-m-d H:i:s")][$word]++;
             }
         }
     }
     $mass[$sql->created_at->format("Y-m-d H:i:s")][$i] = $sql;
     $i++;
 }
 ?>
		@foreach($mass as $key=>$time)
		@if(count($time)>1)
			<div class="row border">
            <h1 class="bg-danger">   {{ $key }}  count {{count($time)}}</h1> 
			<div class="row border">
					<div class="col-md-12">
					<ul class="list-group">
						<?php
      arsort($wrds[$key]);
      $j = 0;
      ?>
					@foreach($wrds[$key] as $k=>$count)
					@if($count>1)
						<li @if($j<1) class="list-group-item bg-danger" @elseif($j<3&&$j>=1) class="list-group-item bg-warning" @endif >{{$k}} {{$count}}</li>
					@endif
					<?php $j++; ?>
					@endforeach
					</ul>
					</div>
			</div>
                <ul>
            @foreach($time as $sql=>$sqls)
                
                <li>
                    <div class="row">
                        <div class="col-md-4">{{$sqls->file}}</div>
                        <div class="col-md-5">{{$sqls->sql}}</div>
                        <div class="col-md-1">{{$sqls->bindings}}</div>
                        <div class="col-md-2">{{$sqls->time}}</div>
                    </div>
                </li>
                
            @endforeach
            </ul>
            </div>
		@endif
		@endforeach
		
		
		
		
	</div>	

	
</div>
@endsection
