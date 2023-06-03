@extends('layouts.app')
@section('title', __("Select language"))
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-2">
        <h1><a href="{{route('lang','ru')}}" class="btn @if(session('locale')=='ru') btn-warning @endif">RU</a></h1>
    </div>
    <div class="col-md-2">
        <h1><a href="{{route('lang','en')}}" class="btn @if(session('locale')=='en') btn-warning @endif">EN</a></h1>
        </div>
    <div class="col-md-2">
        <h1><a href="{{route('lang','de')}}" class="btn @if(session('locale')=='de') btn-warning @endif">DE</a></h1>
        </div>

</div>
</div>
@endsection
