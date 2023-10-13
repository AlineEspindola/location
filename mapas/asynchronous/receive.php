<?php
require 'connection.php';

$lat = filter_input(INPUT_GET, 'lat', FILTER_SANITIZE_SPECIAL_CHARS);
$lng = filter_input(INPUT_GET, 'lgn', FILTER_SANITIZE_SPECIAL_CHARS);


//Transforma a String em Número Decimal
//Indo por número direto, não pega o .
$lat = floatval($lat);
$lng = floatval($lng);

if ($lat && $lng){
    $connection -> query("INSERT INTO device (lat, lng) VALUES ($lat, $lng)");
}

header('Location: asynchronous.html');

?>