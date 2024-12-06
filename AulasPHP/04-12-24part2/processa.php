<?php
// Definindo as variáveis para conexão com o banco
$host = "10.28.2.59";
$usuario = "suporte";
$senha = "suporte";
$bd = "Biblioteca";

// Estabelecendo a conexão com o banco de dados
$con = new mysqli($host, $usuario, $senha, $bd);

// Verificando se houve erro na conexão
if ($con->connect_errno) {
    echo "Falha na Conexão: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}

// Iniciando a sessão
session_start();

// Verificando se os campos nome e senha foram preenchidos
if (empty($_POST["nome"]) || empty($_POST["senha"])) {
    echo "<p style='color:red;'>Por favor, preencha ambos os campos (nome e senha).</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
    exit();
}

// Caso os campos estejam preenchidos, você pode processar a lógica de login aqui

// Exemplo de exibição dos dados (não recomendado para produção, apenas para teste)
$nome = $_POST["nome"];
$senha = $_POST["senha"];
echo "<h2>Dados Recebidos:</h2>";
echo "<p>Nome: " . htmlspecialchars($nome) . "</p>";
echo "<p>Senha: " . htmlspecialchars($senha) . "</p>";

// Para testes, você pode inserir a lógica de verificação do banco de dados ou qualquer outro processamento desejado.
?>
