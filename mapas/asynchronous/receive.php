<?php
require 'connection.php';
$lat = filter_input(INPUT_GET, 'lat', FILTER_SANITIZE_SPECIAL_CHARS);
$lgn = filter_input(INPUT_GET, 'lgn', FILTER_SANITIZE_SPECIAL_CHARS);

if ($id && $lat && $lgn){
    $conexao -> query("INSERT INTO device (lat, lgn) VALUES ($lat, $lgn)");
}

#redireciona
header('Location: asynchronous.html');

?>