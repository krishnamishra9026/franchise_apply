<?php

if (!function_exists('checkTime')) {
    function checkTime($currentDateTime){
        if ($currentDateTime->isToday()) {
            return  $currentDateTime->format('h:i');
        } elseif ($currentDateTime->isYesterday()) {
            return "yesterday";
        } elseif($currentDateTime->isLastWeek()){
            return  $currentDateTime->format('D');
        }else {
            return  $currentDateTime->format('d-m-Y');
        }
    }
}
