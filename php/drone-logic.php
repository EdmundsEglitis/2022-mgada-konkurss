<?php
include "locations.php";
include "packages.php";






function haversineDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371;

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}


$home = ["lat"=>56.6539, "long"=>23.7230];



$randomCoordinates = getRandomLatviaCoordinates(10);


foreach ($randomCoordinates as $index => $coordinate) {
    $distance = haversineDistance($home["lat"], $home["long"], $coordinate['lat'], $coordinate['long']);
    //echo "Distance from fixed point to Coordinate " . ($index + 1) . " ({$coordinate['lat']}, {$coordinate['long']}): {$distance} km\n"."<br>";
    $distanceArr[$index]=$distance;
}


sort($distanceArr);
$packageWeight = generatePackages(10);
rsort($packageWeight);

foreach ($packageWeight as $index => $weight) {
    echo "package " . ($index + 1) . " with a weight of " . $weight[0] . "g will be delivered to a location " . $distanceArr[$index] . "km" . " away." . "<br> ";
}

?>