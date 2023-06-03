<?php
    $icondata=json_decode($data);
    $texticon=$icondata->text;
    $text_color=$icondata->text_color;
    $bg_color=$icondata->bg_color;
    $l=strlen($texticon);
    if(isset($icondata->title)){
        $title=$icondata->title;
    }
    elseif(isset($title)){
        $title=$title;
    }
    else{
        $title="My Icon";
    }
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
<title>{{$title}}</title>
<rect width="200" height="200"  fill="{{$bg_color}}"/>  
<text x=50% y=50% text-anchor="middle" font-size={{$fs}} fill="{{$text_color}}" >{{$texticon}}</text>
</svg>