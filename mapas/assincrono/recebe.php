<?php
require 'conexao.php';
$lat = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$lon = filter_input(INPUT_GET, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);

if ($lat && $lon){
    $conexao->query("INSERT INTO comentario (texto, nome) VALUES ('$texto', '$nome')");
}

#redireciona
header('Location: assincrono.html');

?>