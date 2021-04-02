<?php


function TimeConversion($time) {
    // Use the class DateTime to use to compare the values correctly
    $current_time=new \DateTime($time);
    $today = new \DateTime();
    $today->setTimezone(new DateTimeZone('UTC'));

    $difference = ($today->format('U')-$current_time->format('U'));

    $min = ($difference / 60);

    if ($difference < 3600) {
        if ($difference < 120) {
            return "<i class='fas fa-circle green'></i>" . "Online Now";
        }
        return sprintf("%02d", $min) . " min ago...";
    }

    if ($difference > 3600) {
        return "<i class='fas fa-circle red'></i>" . "Offline";
    }

}