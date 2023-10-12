<?php
require 'connection.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$lat = filter_input(INPUT_GET, 'lat', FILTER_SANITIZE_SPECIAL_CHARS);
$lgn = filter_input(INPUT_GET, 'lgn', FILTER_SANITIZE_SPECIAL_CHARS);

if ($id && $lat && $lgn){
    $conexao -> query("INSERT INTO device (id, lat, lgn) VALUES ('$id', '$lat', '$lgn')");
}

#redireciona
header('Location: asynchronous.html');

?>