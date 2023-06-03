<?php
    $l=strlen($text);
    switch($l){
        case 0:
            $fs=110;
            break;
        case 1:
            $fs=110;
            break;
        case 2:
            $fs=90;
            break;  
        case 3:
            $fs=70;
            break; 
        case 4:
            $fs=60;
            break; 
        case 5:
            $fs=50;
            break; 
        default:  
           $fs=50;
    }
?>

<svg width="{{$size*10}}" height="{{$size*10}}" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
<title>my icon</title>
<rect width="200" height="200"  fill="{{$bg}}"/>  
<text x=50% y=50% text-anchor="middle" font-size={{$fs}} fill="{{$color}}" >{{$text}}</text>
</svg>