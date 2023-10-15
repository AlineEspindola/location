<?php
require 'connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$lat = filter_input(INPUT_GET, 'lat', FILTER_SANITIZE_SPECIAL_CHARS);
$lng = filter_input(INPUT_GET, 'lng', FILTER_SANITIZE_SPECIAL_CHARS);

//Transforma a String em Número Decimal. Indo por número direto, não pega o .   Ex: 28.9 vira 289
$lat = floatval($lat);
$lng = floatval($lng);


$sql = "SELECT * FROM device ORDER BY id DESC LIMIT 1";
//Crio 2 arrays com os mesmos valores, um para utilizar no foreachm e outro para usar fetchAll no else
$c = $connection->query($sql);
$coordinates = $connection->query($sql);

foreach ($c as $c){
    if ($c["id"] == $id){
        $connection -> query("UPDATE device SET lat=$lat, lng=$lng WHERE $id=id");
    
        $sql = "SELECT * FROM device ORDER BY id DESC LIMIT 1";
        $coordinates = $connection->query($sql);
        $data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
    else{
        //Transforma em array associativo, em que cada valor é acompanhado do que ele é. Ex: ao invés de 9, 45.8, 49.0 teremos id:9, lat:49.8, lng:49.0
        $data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
        //Para transformar em formaro json. A resposta recebbia no asynchronous é o valor que é printado, no caso, o valor embaixo
        echo json_encode($data);
    }
    
}




?>

