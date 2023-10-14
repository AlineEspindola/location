<?php
require 'connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$connection -> query("UPDATE device SET lat=$lat AND lng=$lng WHERE $id=id");

$sql = "SELECT * FROM device WHERE $id=id ORDER BY id DESC LIMIT 1";
$coordinates = $connection->query($sql);

$data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

?>

