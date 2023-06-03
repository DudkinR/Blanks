@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<style>
#intor{
  background-color: #555554;
  width: 200px;
  height: 200px;
}
#drp{
  background-color: #FA5212;
  width: 200px;
  height: 200px;
}
</style>
<div class="container">
<!-- Define a draggable element -->
<div id="intor" draggable="true" ondragstart="event.dataTransfer.setData('text', event.target.innerText)">
  Drag this text into the region
</div>

<!-- Define the drop region and form -->
<div id="drp" ondrop="dropHandler(event)" ondragover="dragOverHandler(event)">
  Drop the text here to submit the form:
  <form action="{{route('see')}}" method="post"  id="my-form">
  @csrf
  @method('PUT')
    <input type="hidden" name="text" id="text-input">
    <button type="submit">Submit</button>
  </form>
</div>

<script>
  // Define the drag and drop handlers
  function dragOverHandler(event) {
    event.preventDefault(); // Prevent default behavior to enable dropping
  }
  
  function dropHandler(event) {
    event.preventDefault(); // Prevent default behavior
    const text = event.dataTransfer.getData('text'); // Get the dragged text
    const input = document.getElementById('text-input'); // Get the input element
    input.value = text; // Set the input value
    document.getElementById('my-form').submit(); // Submit the form
  }
</script>

@endsection