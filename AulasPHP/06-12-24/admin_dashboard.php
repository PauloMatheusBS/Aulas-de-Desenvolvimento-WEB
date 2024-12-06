<?php
session_start();

// Verifica se o usuário está logado e se é do setor ADMIN
if (!isset($_SESSION['user_id']) || $_SESSION['user_setor'] !== 'ADMIN') {
    header("Location: acesso_negado.php"); // Redireciona para uma página de erro ou login
    exit();
}

echo "<h1>Bem-vindo ao Dashboard do Administrador!</h1>";
echo "<p>Você está logado como " . htmlspecialchars($_SESSION['user_nome']) . ".</p>";
?>
<a href="logout.php">Sair</a>
