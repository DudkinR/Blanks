@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<style type="text/css">
			body {
				margin: 0;
				padding: 0;
				background: #F6F6F9;
			}
			.header {
				border-bottom: 1px solid #DCDCE1;
				padding: 10px 0;
				margin-bottom: 10px;
			}
			.container {
				width: 980px;
				margin: 0 auto;
			}
			.ico-title {
				font-size: 2em;
			}
			.iconlist {
				margin: 0;
				padding: 0;
				list-style: none;
				text-align: center;
				width: 100%;
				display: flex;
				flex-wrap: wrap;
				flex-direction: row;
			}
			.iconlist li {
				position: relative;
				margin: 5px;
				width: 150px;
				cursor: pointer;
			}
			.iconlist li .icon-holder {
				position: relative;
				text-align: center;
				border-radius: 3px;
				overflow: hidden;
				padding-bottom: 5px;
				background: #ffffff;
				border: 1px solid #E4E5EA;
				transition: all 0.2s linear 0s;
			}
			.iconlist li .icon-holder:hover {
				background: #00C3DA;
				color: #ffffff;
			}
			.iconlist li .icon-holder:hover .icon i {
				color: #ffffff;
			}
			.iconlist li .icon-holder .icon {
				padding: 20px;
				text-align: center;
			}
			.iconlist li .icon-holder .icon i {
				font-size: 3em;
				color: #1F1142;
			}
			.iconlist li .icon-holder span {
				font-size: 14px;
				display: block;
				margin-top: 5px;
				border-radius: 3px;
			}
		</style>
<div class="container">
    
	<div class="header">
		<div class="container">
			<h1 class="ico-title"> IcoFont Icons </h1>
		</div>
	</div>
	<div class="container">
		<ul class="iconlist">
			<?php $icons = \App\Models\Icon::all(); ?>
		@foreach($icons as $icon)
			<li>
				<div class="icon-holder">
					<div class="icon"> 
						<i class="icofont-{{$icon->name}}"></i>
					</div> 
					<span> {{$icon->name}} </span>
				</div>
			</li>
		@endforeach
		
		
		
		</ul>
	</div>	

	
</div>
@endsection
