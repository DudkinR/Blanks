<button type="button" class="btn position-relative
@isset($type)
btn-{!!$type!!}
@else
 btn-primary
@endisset
">
    @isset($content)
    {!!$content!!}
    @endisset
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill 
    @isset($span)
    bg-{!!$span!!}
    @else
    bg-danger
    @endisset
    ">
    @isset($numtext)
    {!!$numtext!!}
    @endisset
    <span class="visually-hidden"> 
    @isset($comment)
    {!!$comment!!}
    @endisset
    </span>
  </span>
</button>