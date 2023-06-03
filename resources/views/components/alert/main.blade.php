<div class="alert 
@isset($type)
alert-{!!$type!!}
@else
alert-primary
@endisset
" role="alert">
@isset($message)
{!!$message!!} 
@endisset
</div>