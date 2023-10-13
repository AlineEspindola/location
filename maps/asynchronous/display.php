<?php
require 'connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * FROM device WHERE $id=id ORDER BY id DESC LIMIT 1";
$coordinates = $connection->query($sql);
$data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
$data = array_reverse($data);
echo json_encode($data);

?>

