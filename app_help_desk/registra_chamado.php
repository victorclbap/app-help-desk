<?php

session_start();

$titulo = str_replace("/","-",$_POST['titulo']);
$categoria = str_replace("/","-",$_POST['categoria']);
$descricao = str_replace("/","-",$_POST['descricao']);



$chamado = $_SESSION['id'] . '/' . $titulo . '/' . $categoria . '/' . $descricao . PHP_EOL;


$arquivo = fopen('registro.hd','a');
fwrite($arquivo,$chamado);
fclose($arquivo);

header('location: abrir_chamado.php');
