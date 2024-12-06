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
// session_start();

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
$query = "SELECT id, nome, senha FROM user WHERE nome = ?";
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

// Dados do usuário (nome e senha) que você quer cadastrar
$nome = 'paulom';  // Exemplo de nome
$senha_usuario = '1234567';  // Exemplo de senha

// Gerar o hash da senha
$senha_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);

// Preparar a query para inserir o usuário com a senha hash
$query = "INSERT INTO user (nome, senha) VALUES (?, ?)";

// Preparar a declaração SQL
$stmt = $con->prepare($query);

// Verifica se a preparação da query foi bem-sucedida
if ($stmt === false) {
    echo "Erro ao preparar a consulta: " . $con->error;
    exit();
}

// Vincula os parâmetros (nome e senha com hash) à declaração
$stmt->bind_param("ss", $nome, $senha_hash);

// Executa a consulta
if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o usuário: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$con->close();
?>
