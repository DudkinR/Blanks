@extends('layouts.appsq')
@section('title', __('mainf.mainworkpage'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("project.index")}}" class="btn btn-success" >{{__("mainf.projects")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("blanks.index")}}" class="btn btn-success" >{{__("mainf.blanks")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("blanks.index")}}" class="btn btn-success" >{{__("mainf.blanks")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("categories.index")}}" class="btn btn-success" >{{__("mainf.categories")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>{{__("mainf.infoblok")}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("item.index")}}" class="btn btn-success" >{{__("mainf.items")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("start.index")}}" class="btn btn-success" >{{__("mainf.starts")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><a href="{{route("position.index")}}" class="btn btn-success" >{{__("mainf.position")}}</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
            
        </div>
    </div>
</div>



@endsection