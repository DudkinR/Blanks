<div class="accordion accordion-flush" id="accordionFlushExample">
 @isset($items)
    <?php $n=0;?>
      @foreach($items as $item)

      <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading{!!$n!!}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{!!$n!!}" aria-expanded="false" aria-controls="flush-collapse{!!$n!!}">
        {!!$item["name"]!!}
        </button>
      </h2>
      <div id="flush-collapse{!!$n!!}" class="accordion-collapse collapse
        @if(isset($show)&&$n==$show) 
            show 
        @endif
      " aria-labelledby="flush-heading{!!$n!!}" data-bs-parent="#accordionFlushExample">
      {!!$item["content"]!!}
      </div>
    </div>
      <?php $n++;?>
      @endforeach 
 @endisset



</div>