<h<?php if(isset($h)) echo $h; else echo 1;?> class="display-<?php if(isset($display)) echo $display; else echo 1;?>">
    @isset($content)
    {!!$content!!}
    @endisset
</h<?php if(isset($h)) echo $h; else echo 1;?>>

