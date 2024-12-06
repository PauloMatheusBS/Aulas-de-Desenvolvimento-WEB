<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Verificação do setor - exemplo de controle para ADMIN
if ($_SESSION['user_setor'] !== 'ADMIN') {
    // Mensagem genérica ou redirecionamento para uma página de erro
    header("Location: acesso_negado.php");
    exit();
}
?>
