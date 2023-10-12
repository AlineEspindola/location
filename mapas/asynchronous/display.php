<?php
require 'connection.php';

$sql = "SELECT * FROM device WHERE tema='$tema' AND id>$id ORDER BY id DESC LIMIT 1";
$coordinates = $connection->query($sql);
$data = $coordinates->fetchAll(PDO::FETCH_ASSOC);
$data = array_reverse($data);
echo json_encode($data);

?>

