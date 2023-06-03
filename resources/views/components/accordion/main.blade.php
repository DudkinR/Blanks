<div class="accordion" id="accordionExample">
    @isset($items)
    <?php $n=0;?>
    @foreach($items as $item)

    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{!!$n!!}">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{!!$n!!}" aria-expanded="true" aria-controls="collapse{!!$n!!}">
            {!!$item["name"]!!}
        </button>
        </h2>
        <div id="collapse{!!$n!!}" class="accordion-collapse collapse
        @if(isset($show)&&$n==$show) 
        show 
        @endif
        " aria-labelledby="heading{!!$n!!}" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        {!!$item["content"]!!}
         </div>
        </div>
    </div>
    <?php $n++;?>
    @endforeach 
    @endisset
</div>