<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Se for necessário, você pode verificar o setor aqui, por exemplo:
if ($_SESSION['user_setor'] !== 'ADMIN' && $_SESSION['user_setor'] !== 'COLABORADOR') {
    echo "<p style='color:red;'>Você não tem permissão para acessar esta página.</p>";
    exit();
}
