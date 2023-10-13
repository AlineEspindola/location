<?php
require 'connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * FROM device WHERE $id=id ORDER BY id DESC LIMIT 1";
$coordinates = $connection->query($sql);
//Para transformar em formato json
$data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

?>

