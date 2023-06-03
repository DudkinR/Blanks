@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
    <div id="app">
<div class="container">
  <h1>All posible x - </h1>   
  <?php $content = "Некоторый текст "; ?>  
    <br>

<br>
<hr>
<h3>x-icon.main :name="'file-audio'" :size=4 :color="'#555555'"</h3>
name look ----->>>>>> <a href="{{route('icons')}}"> Icons collections</a>
<x-icon.main :name="'file-audio'" :size=4 :color="'#555555'"/>
<hr>
<!-- Block level -->
<div class="row">
  <div class="col-2 text-truncate">
   Очень длинный текстттттттттттттттттттттттттттттттттттттттттттттттттттт.
  </div>
</div>
<span class="d-inline-block text-truncate" style="max-width: 150px;">
  This text is quite long, and will be truncated once displayed.
</span>
<hr>
<h3>text.h :h=2 :display=4 :content="$content"</h3>
<x-text.h :h=6 :display=3 :content="$content"/>

<?php $leftM = [
    "home" => route("home"),
    "first" => [
        "blanks" => route("blanks.index"),
        "category" => route("categories.index"),
    ],
]; ?>

<?php $items = [
    0 => [
        "name" => "Accordion Item #1",
        "content" =>
            " <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
    ],
    1 => [
        "name" => "Accordion Item #2",
        "content" =>
            " <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
    ],
]; ?>
<h3>accordion.main :items="$items"</h3>
<x-accordion.main :items="$items" />
<h3>accordion.flush :items="$items" :show="1"</h3>
<x-accordion.flush :items="$items" :show="1"/>
<h3>alert.icon :icon="'warning'" :message="'Dorr soon opens'"</h3>
 <x-alert.icon :icon="'warning'" :message="'Dorr soon opens'"/>
 <h3>button.number :content="'Item'" :numtext="985" :span="'danger'"</h3>
 <x-button.number :content="'Item'" :numtext="985" :span="'danger'"/>
 <h3>button.simplenum :content="'Pers'" :numtext="2" :type="'warning'"</h3>
 <x-button.simplenum :content="'Pers'" :numtext="2" :type="'warning'"/>
 <h3>button.main :content="'Spite lisa'"  :type="'success'"</h3>
  <x-button.main :content="'Spite lisa'"  :type="'success'"/>
 <h3>lert.main :type="'danger'" :message="'<strong>This is the first item`s accordion body.</strong> ...... </h3>
<x-alert.main :type="'danger'" :message="'<strong>This is the first item`s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It`s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.'"/>
 <h3>form.creditor :redactorname="'dict'" :lable="'ROOT'" :content="'<strong>This is the first item`s accordion body.</strong> '"</h3>
<x-form.creditor :redactorname="'dict'" :lable="'ROOT'" :content="'<strong>This is the first item`s accordion body.</strong> '"/>


</div>
</div>
@endsection
