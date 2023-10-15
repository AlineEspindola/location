<?php
require 'connection.php';

$lat = filter_input(INPUT_GET, 'lat', FILTER_SANITIZE_SPECIAL_CHARS);
$lng = filter_input(INPUT_GET, 'lgn', FILTER_SANITIZE_SPECIAL_CHARS);

//Transforma a String em Número Decimal. Indo por número direto, não pega o .   Ex: 28.9 vira 289
$lat = floatval($lat);
$lng = floatval($lng);


if ($lat && $lng){
    $connection -> query("INSERT INTO device (lat, lng) VALUES ($lat, $lng)");
}

$id = $connection->query("SELECT id FROM device ORDER BY id DESC LIMIT 1");

$data = $id->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

?>