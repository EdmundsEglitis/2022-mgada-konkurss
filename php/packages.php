<?php
function generatePackages($count){
    $rand = [];

    for ($i = 0; $i < $count; $i++) {
        $rand[$i] = [rand(10, 1000)];
    }

    return $rand;
}

$packageWeight = generatePackages(10);
