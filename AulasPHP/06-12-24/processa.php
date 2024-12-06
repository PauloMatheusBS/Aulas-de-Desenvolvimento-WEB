<!-- LOGIN.PHP
__________________________________________________________


    echo "<script>
            alert('Por favor, preencha todos os campos.');
            setTimeout(function(){
                window.location.href = 'login.php';
            }, 2000); // Espera 2 segundos antes de redirecionar
          </script>";
    exit(); 
}

$query = "select * from user where nome = '{$nome}' and senha = '{$senha}' ";

$result= mysqli_query($con, $query);


$row = mysqli_num_rows($result);
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="validacaoForms.php">

<input type="text" name="nome">Nome
<input type="password" name="senha">senha
<input type="submit">
</form>

</body>
</html>



validacaoForms.php
_________________________________________________________


include("conn.php");
$nome = mysqli_real_escape_string($con, $_POST["nome"]);

$senha = mysqli_real_escape_string($con, $_POST["senha"]);


echo $nome."nome".$senha;
if (empty($nome) || empty($senha)) {
echo $row;

?> -->

<?php
// Definindo as variáveis para conexão com o banco
$host = "10.28.2.59";
$usuario = "suporte";
$senha = "suporte";
$bd = "bancophp";

// Estabelecendo a conexão com o banco de dados
$con = new mysqli($host, $usuario, $senha, $bd);

// Verificando se houve erro na conexão
if ($con->connect_errno) {
    echo "Falha na Conexão: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}

// Iniciando a sessão
session_start();
include("verificacao.php");

// Verificando se os campos nome e senha foram preenchidos
if (empty($_POST["nome"]) || empty($_POST["senha"])) {
    echo "<p style='color:red;'>Por favor, preencha ambos os campos (nome e senha).</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
    exit();
}

// Recebe os dados enviados pelo formulário
$nome = $_POST["nome"];
$senha = $_POST["senha"];

// Preparar a consulta para buscar o usuário com o nome fornecido
$query = "SELECT id, nome, senha, setor FROM user WHERE nome = ?";
$stmt = $con->prepare($query);

// Verifica se a preparação da query foi bem-sucedida
if ($stmt === false) {
    echo "Erro ao preparar a consulta: " . $con->error;
    exit();
}

// Vincula o parâmetro (nome do usuário) à declaração
$stmt->bind_param("s", $nome);

// Executa a consulta
$stmt->execute();

// Verifica se o usuário foi encontrado
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p style='color:red;'>Usuário ou senha inválidos.</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
    exit();
}

// Recupera o usuário encontrado
$user = $result->fetch_assoc();

// Verifica se a senha fornecida corresponde à senha armazenada no banco
if ($senha === $user['senha']) {
    // Login bem-sucedido
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nome'] = $user['nome'];
    $_SESSION['user_setor'] = $user['setor'];  // Armazena o setor na sessão

    // Redireciona para a página correta de acordo com o setor
    if ($_SESSION['user_setor'] === 'ADMIN') {
        header("Location: admin_dashboard.php");
    } else if ($_SESSION['user_setor'] === 'COLABORADOR') {
        header("Location: colaborador_dashboard.php");
    }
    exit();
} else {
    echo "<p style='color:red;'>Usuário ou senha inválidos.</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
}



// Fechar a conexão
$stmt->close();
$con->close();
?>


