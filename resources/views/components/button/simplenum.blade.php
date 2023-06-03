<button type="button" class="btn
@isset($type)
btn-{!!$type!!}
@else
 btn-primary
@endisset
">
@isset($content)
    {!!$content!!}
    @endisset
    <span class="badge 
    @isset($span)
    bb-{!!$span!!}
    @else
    bg-secondary
    @endisset
    ">
  @isset($numtext)
    {!!$numtext!!}
    @endisset
  </span>
</button>