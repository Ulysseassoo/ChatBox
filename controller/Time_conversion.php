<?php


function TimeConversion($time) {
    $h1=strtotime(date('H:i:s'));

    $h2=strtotime($time);

    $h3 = ($h2-$h1);

    var_dump(date("H:i:s",$h3));


}