<?php
session_start();
// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red;'>Você não está logado.</p>";
    echo "<a href='index.html'>Voltar ao login</a>";
    exit();
}
?>

<h1>Bem-vindo ao Dashboard!</h1>
<p>Você está logado.</p>