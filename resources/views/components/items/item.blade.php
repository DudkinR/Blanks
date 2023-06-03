@foreach($items as $item)
    <div class="row border">
            <div class="col-md-1">{!!$loop->iteration+$num!!}</div>
            <div class="col-md-9 ">{!!$item->content!!}</div>
            <div class="col-md-2 border">
                @foreach($item->positions as $position)   
                    {!!$position->abv!!}
                @endforeach
    </div>
    </div>
    <?php
    $itms=$item->items;
    $num=$loop->iteration+$num;
    ?>
    @if($itms->count()>0)
    <x-items.item :items="$itms" :num="$num" /> 
    @endif
@endforeach
