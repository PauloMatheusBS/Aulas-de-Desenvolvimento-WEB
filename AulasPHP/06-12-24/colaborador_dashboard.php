<?php
session_start();

// Verifica se o usuário está logado e se é do setor COLABORADOR
if (!isset($_SESSION['user_id']) || $_SESSION['user_setor'] !== 'COLABORADOR') {
    echo "<p style='color:red;'>Você não tem permissão para acessar esta página.</p>";
    exit();
}

echo "<h1>Bem-vindo ao Dashboard do Colaborador!</h1>";
echo "<p>Você está logado como " . htmlspecialchars($_SESSION['user_nome']) . ".</p>";
?>
<a href="logout.php">Sair</a>
