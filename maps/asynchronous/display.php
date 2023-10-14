<?php
require 'connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$connection -> query("UPDATE device SET lat=$lat AND lng=$lng WHERE $id=id");

$sql = "SELECT * FROM device WHERE $id=id ORDER BY id DESC LIMIT 1";
$coordinates = $connection->query($sql);

//Transforma em array associativo, em que cada valor é acompanhado do que ele é. Ex: ao invés de 9, 45.8, 49.0 teremos id:9, lat:49.8, lng:49.0
$data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
//Para transformar em formaro json. A resposta recebbia no asynchronous é o valor que é printado, no caso, o valor embaixo
echo json_encode($data);

?>

