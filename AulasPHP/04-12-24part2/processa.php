<!-- <?php
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

// $nome = mysqli_real_escape_string($con,$_POST["nome"]);
// $senha = mysqli_real_escape_string($con,$_POST["senha"]);

$query = "SELECT * FROM user WHERE nome = '{$nome}' AND senha = '{$senha}'";

?> -->

<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
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

// Verificando se os campos nome e senha foram preenchidos
if (empty($_POST["nome"]) || empty($_POST["senha"])) {
    echo "<p style='color:red;'>Por favor, preencha ambos os campos (nome e senha).</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
    exit();
}

// Sanitize inputs
$nome = trim($_POST["nome"]);
$senha = trim($_POST["senha"]);

// Validação básica dos dados
if(strlen($nome) < 3 || strlen($senha) < 6) {
    echo "<p style='color:red;'>Nome de usuário ou senha inválidos (mínimo de 3 caracteres para nome e 6 para senha).</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
    exit();
}

// Usando prepared statements para evitar SQL Injection
$query = "SELECT id, nome, senha FROM user WHERE nome = ?";
$stmt = $con->prepare($query);

// Verifica se a preparação do statement foi bem-sucedida
if ($stmt === false) {
    echo "Erro ao preparar a consulta: " . $con->error;
    exit();
}

// Bind dos parâmetros
$stmt->bind_param("s", $nome);

// Executa a consulta
$stmt->execute();

// Verifica se foi encontrado o usuário
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p style='color:red;'>Usuário ou senha inválidos.</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
    exit();
}

// Recupera o usuário encontrado
$user = $result->fetch_assoc();

// Verifica a senha (comparando o hash)
if (password_verify($senha, $user['senha'])) {
    // Login bem-sucedido
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nome'] = $user['nome'];
    echo "<p>Bem-vindo, " . htmlspecialchars($user['nome']) . "!</p>";
    // Redireciona para a página protegida
    header("Location: dashboard.php");
    exit();
} else {
    echo "<p style='color:red;'>Usuário ou senha inválidos.</p>";
    echo "<a href='index.html'>Voltar ao formulário</a>";
}

// Fechar a conexão
$stmt->close();
$con->close();
?>
