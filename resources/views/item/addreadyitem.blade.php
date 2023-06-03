@extends('layouts.app')
@section('title', __("Add ready Items"))
@section('type', "items")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--  link to  back category -->
        <a href="{{route('item.index')}}" class='btn'>
            <x-icon.main :name="'arrow-left'" :size=2 :color="'black'"/>
        </a>
        <!-- form to create new category -->
        <div class="row">
           <div class="col-md-12">
            <label for="searchwords" class="form-label">{{__("Sort your Items")}}</label>
                    <div class="input-group">
                     <input type="text" name="refresh" id="refresh" value="" aria-describedby="basic-addon2" placeholder="{!!__("mainf.search")!!}" class="form-control">
                     <span class="input-group-text" id="searchwords">
                        <a class="btn" id="getCatButton">
                            <x-icon.main :name="'search-2'" :size=1 :color="'black'"/>
                        </a>
                    </span>
                    </div>
            </div>
        </div>
        <form action="{{route('item.addreadyitems')}}" method="post">
            @csrf
            @isset($blank) 
             <input type="hidden" name="blank_id" id="blank" value="{{$blank->id}}" class="form-control">
            @endif
            @isset($ready_items) 
                <!-- select multiple items -->
                <div class="form-group">
                    <label for="ready_items">Ready items</label>
                    <select name="items[]" id="items" size=5 class="form-control" multiple   style="font-size: 20px;">
                        @foreach($ready_items as $item)
                            <option value="{{$item->id}}" @if($blank->items->contains($item->id)) selected @endif >
                                {{$item->name}} {{$item->name}} - 
                                 {{$item->content}} {{$item->content}} 
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">{{__("Add to blank and return to blank")}}</button>
            <button type="submit" id="submitBtn">{{__("Add to blank and stay here")}}</button>
            
        </form>
    </div>
</div>
<script>
    // get $ready_items from php to js
    var ready_items = @json($ready_items);
    // get refresh.value from input  разложить по словам , найти в массиве и сделать выделеными в    select items
    var refresh = document.getElementById('refresh');
    var items = document.getElementById('items');
    var getCatButton = document.getElementById('getCatButton');
    getCatButton.addEventListener('click', function(){
        formSelect();
    });
    function formSelect(){
        // get refresh.value from input
        var refreshValue = refresh.value;
        // Привести строку к нижнему регистру и разбить на слова
        var refreshValueArray = refreshValue.toLowerCase().split(' ');

        // Фильтровать массив по заданным условиям
        var ready_items_filtered = ready_items.filter(function(item) {
        var item_name_content = (item.name + ' ' + item.content).toLowerCase();
        
        // Разбить имя и контент элемента на слова
        var item_name_content_array = item_name_content.split(' ');

        // Проверить, содержит ли элемент хотя бы одно из заданных слов
        var result = refreshValueArray.some(function(refreshValueArrayItem) {
            return item_name_content_array.some(function(item_name_content_item) {
            return item_name_content_item.includes(refreshValueArrayItem);
            });
        });

        return result;
        });

        // оставить  select items только  ready_items_filtered 
        // очистить select items
        items.innerHTML = '';
        // добавить в select items  ready_items_filtered
        ready_items_filtered.forEach(function(item){
            var option = document.createElement('option');
            option.value = item.id;
            option.innerHTML = item.name + ' - ' + item.content;
            items.appendChild(option);
        });
    }
    formSelect(); // запуск первоначальная
  $(document).ready(function() {
    $("#submitBtn").click(function(event) {
      event.preventDefault(); // предотвращаем отправку формы стандартным способом

      var formData = $("#myForm").serialize(); // сериализуем данные формы

      $.ajax({
        type: "POST",
        url: "{{ route('additemAjax') }}",
        data: formData,
        success: function(data) {
          // обработка успешного ответа от сервера
        },
        error: function(xhr, status, error) {
          // обработка ошибок при отправке запроса
        }
      });
    });
  });



            

</script>
@endsection