<?php
session_start();

$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);
$texto = $_SESSION['id'].'#'. $titulo.'#'.$categoria.'#'.$descricao. PHP_EOL;

$chamado = fopen('chamado.txt', 'a');
fwrite($chamado, $texto);
fclose($chamado);

header('Location: abrir_chamado.php');
?>
