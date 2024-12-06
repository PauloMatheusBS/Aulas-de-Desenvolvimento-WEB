<?php

$host = "10.28.2.59";
$usuario = "suporte";
$senha = "suporte";
$bd = "Biblioteca";

$con = new mysqli($host, $usuario, $senha, $bd);

if ($con->connect_errno) {
    echo "Falha na Conexão: (" . $con->connect_errno . ") " . $con->connect_error;
    exit(); 
}

session_start(); 


if (empty($_POST["nome"]) || empty($_POST["senha"])) {
    header("location:index.php"); 
    exit(); 
}
?>