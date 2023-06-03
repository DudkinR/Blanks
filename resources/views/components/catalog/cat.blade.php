<?php 
    if(!isset($bgc))
    $bgc=16777;
    if(!isset($columns))
    $columns=12;
    elseif($columns<2)
    $columns=2;
?>
    @foreach($categories as $cat)
        <?php 
        $bgc-=50;
        $color=base_convert($bgc,10,16);
        for($i=6-strlen($color);$i>0;$i--){
            $color = '0'.$color;
        } 

        ?>
        <div class="row border">
            <div class="col-md-{{$columns}}">
                <div class="row">
                    <div class="col-md-12"  style="background-color: #{{$color}};">
                    <?php 
                        $clbg='yellow';
                        if($cat->status==0)
                        {
                            $clbg='grey';
                            $ctext='success';
                        }
                        elseif($cat->status==1)
                        {
                            $clbg='blue';
                        }
                        
                        elseif($cat->status==2)
                        {
                            $clbg='green';
                        }
                        else{
                            $clbg='black';
                        };
                    ?>
                    <div class="col-md-1">
                    <a href="{{route('item.index')}}?cat={{$cat->id}}" class="btn btn-info" title="{{$cat->name}}">
                        <x-icon.main :name="$cat->icon->name" :size=5 :color="$clbg"/>
                        {{$cat->name}}
                    </a></div>
                    </div>
                </div>
               

                <x-catalog.cat :categories="$cat->categories" :bgc="$bgc" :columns="$columns-1"/>
            </div>
        </div>
    @endforeach