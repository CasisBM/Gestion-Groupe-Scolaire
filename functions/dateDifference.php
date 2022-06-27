<?php 

function dateDifference($date_1, $date_2):int
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format("%d");
}