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

</button>