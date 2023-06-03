@extends('layouts.appguest')
@section('title', __("guest.examples.title"))
@section('content')
<section class="col-md-12  mx-auto">
  <div class="card">
      <div class="row g-0">
        <div class="col-md-12">
          <div class="card-body">
            <h5 class="card-title">{!!__("guest.examples.title")!!}</h5>
            <p class="card-text">
              {!!__("guest.examples.content")!!}
            </p>
          </div>
        </div>
      </div>
    </div>

</section>

@endsection