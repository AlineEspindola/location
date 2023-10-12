<?php
require 'conexao.php';

$sql = "SELECT * FROM comentario WHERE tema='$tema' AND id>$id ORDER BY id DESC LIMIT 1";
$coordenadas = $conexao->query($sql);
$dados = $coordenadas->fetchAll(PDO::FETCH_ASSOC);
$dados = array_reverse($dados);
echo json_encode($dados);

?>

