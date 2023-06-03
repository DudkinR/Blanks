@extends('layouts.appguest')
@section('title', __("help.index"))
@section('content')
<!-- corusel -->
<div class="row">
        <div id="carouselCaptions" class="carousel slide col-md-12 mx-auto" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="3" aria-label="Slide 4" class=""></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="4" aria-label="Slide 5" class=""></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="5" aria-label="Slide 6" class=""></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="6" aria-label="Slide 7" class=""></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="7" aria-label="Slide 8" class=""></button>

          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{ asset('img/corusel/8.jpg') }}"  >
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('img/corusel/2.png') }}"  >
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('img/corusel/3.jpg') }}"  >
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('img/corusel/4.jpg') }}" >
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('img/corusel/5.jpg') }}"  >
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('img/corusel/6.jpg') }}"  >
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('img/corusel/7.jpg') }}"  >
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </div> 
        <!--end slider-->  
        <section class="col-md-12  mx-auto">

          <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/5.jpg") }}" alt="{!!__("guest.about.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                    
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.about.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.about.short")!!} 
                      <a href="{{route('guest.about')}}">... {{__("Detail")}}</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

          </section>
          <section class="col-md-12  mx-auto">
            <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/6.jpg") }}" alt="{!!__("guest.politics.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.politics.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.politics.short")!!} 
                      <a href="{{route('guest.politics')}}">... {{__("Detail")}}</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section class="col-md-12  mx-auto">
            <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/7.jpg") }}" alt="{!!__("guest.faq.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.faq.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.faq.short")!!} 
                      <a href="{{route('guest.faq')}}">... {{__("Detail")}}</a>
                      </p>
                      <h2>{{__("FAQ")}}</h2>
                      <ul>
                          <li>{!!__("guest.faq.qw.1")!!}</li>
                          <li>{!!__("guest.faq.qw.2")!!}</li>
                          <li>{!!__("guest.faq.qw.3")!!}</li>
                      </ul>
                       <a href="{{route('guest.faq')}}">... {{__("Detail")}}</a>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section class="col-md-12  mx-auto">
            <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/8.jpg") }}" alt="{!!__("guest.doc.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.doc.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.doc.short")!!} 
                      <a href="{{route('guest.doc')}}">... {{__("Detail")}}</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section class="col-md-12  mx-auto">
            <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/9.jpg") }}" alt="{!!__("guest.instr.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.instr.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.instr.short")!!} 
                      <a href="{{route('guest.doc')}}">... {{__("Detail")}}</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section class="col-md-12  mx-auto">
            <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/10.jpg") }}" alt="{!!__("guest.service.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.service.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.service.short")!!} 
                      <a href="{{route('guest.doc')}}">... {{__("Detail")}}</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section class="col-md-12  mx-auto">
            <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset("img/11.jpg") }}" alt="{!!__("guest.contacts.title")!!}" width="100%" height="250" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{!!__("guest.contacts.title")!!}</h5>
                      <p class="card-text">
                      {!!__("guest.contacts.short")!!} 
                      <a href="{{route('guest.doc')}}">... {{__("Detail")}}</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
          </section>
       
@endsection