@extends('layouts.app')
@section('title', 'Название страницы')
@section('content')
<style>
  .icon.flag {
  width: 24px; /* set a fixed width for the flag icon */
  height: 16px; /* set a fixed height for the flag icon */
  vertical-align: middle; /* align the icon vertically with text */
  margin-right: 8px; /* add some margin to the right of the icon */
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
</div>
<div class="row">
<h1>My Diagram</h1>
<div class="form-group">
    <label for="country">{{__("mainf.countryi")}}</label>
    <?php $countries = App\Models\Country::all(); ?>
   <style>


    @foreach ($countries as $country)
      #country option[value="{{ $country->id }}"][data-image] {
        background-image: url('{{ asset("/countries/flag_SVG/" . $country->code2l . ".svg") }}');
      }
     #country option[data-image] {
      background-repeat: no-repeat;
      background-position: 0 50%;
      padding-left: 20px;
    }  
    @endforeach

    </style> 
    <select name="country" id="country" class="form-control" size=5 required>
    @foreach ($countries as $country)
        <option value="{{$country->id}}" data-image="" style="width: 50px; height: 50px; padding-left: 20px;">
        &nbsp &nbsp &nbsp &nbsp &nbsp

         {{$country->name}}
        </option>
    @endforeach
</select>
</div>
<div class="form-group">
    <label for="name">{{__("mainf.namei")}}</label>
    <textarea name="creditorResult" id="creditorResult" cols="30" rows="10" class="form-control" required></textarea>
</div>
<div class="form-group">
    <label for="content">{{__("mainf.contenti")}}</label>
    <textarea name="creditorInput" id="creditorInput" cols="30" rows="10" class="form-control" required></textarea>
</div>







</div>
</div>

<script>
  CKEDITOR.replace('description');
/* 
const inputField = document.getElementById('description');
const outputField = document.getElementById('nameItem');


inputField.addEventListener('input', (event) => {
    
  const inputValue = CKEDITOR.instances.description.getData();

  if (inputValue.length > 25) {
    outputField.value = inputValue.substring(0, 25) + '...';
  } else {
    outputField.value = inputValue;
  }
}); */
// get references to the input field and result container
const inputField = document.getElementById('creditorInput');
const resultContainer = document.getElementById('creditorResult');

// add event listener for input event
inputField.addEventListener('input', () => {
  // get user input
  const userInput = inputField.value;

  // make AJAX request to API endpoint
  $.ajax({
    url: '/api/search',
    data: {
      q: userInput
    },
    success: (results) => {
      // clear previous results
      resultContainer.innerHTML = '';

      // loop through results and create HTML for each option
      results.forEach((result) => {
        const optionEl = document.createElement('div');
        optionEl.innerHTML = result.name;
        resultContainer.appendChild(optionEl);
      });

      // show result container
      resultContainer.style.display = 'block';
    },
    error: (error) => {
      console.error(error);
    }
  });
});

// add event listener to hide result container when user clicks outside of it
document.addEventListener('click', (event) => {
  if (!event.target.matches('#creditorResult *')) {
    resultContainer.style.display = 'none';
  }
});

 </script>

</div>
@endsection
