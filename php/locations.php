<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function getRandomLatviaCoordinates($count) {

    $minLat = 55.6156;
    $maxLat = 58.0822;
    $minLng = 21.0461;
    $maxLng = 28.1761;

    $coordinates = [];

    for ($i = 0; $i < $count; $i++) {
        $latitude = mt_rand($minLat * 1000000, $maxLat * 1000000) / 1000000;
        $longitude = mt_rand($minLng * 1000000, $maxLng * 1000000) / 1000000;

            $coordinates[] = [
            'lat' => $latitude,
            'long' => $longitude,
        ]; 
    }
    return $coordinates;

}


