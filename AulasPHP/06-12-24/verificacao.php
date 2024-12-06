<?php 
session_start();

// Verifica se a variável de sessão 'user_nome' está definida
if (!isset($_SESSION['user_nome'])) {
    header("Location: index.php");
    exit();
}
?>

