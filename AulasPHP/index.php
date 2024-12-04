<?php
// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $idade = $_POST['idade'];
    $data_nascimento = $_POST['data_nascimento'];
    $epoca = isset($_POST['epoca']) ? implode(", ", $_POST['epoca']) : "Não selecionado";
    $sexo = $_POST['sexo'];
    $cor = $_POST['cor'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $estado_civil = $_POST['estado_civil'];
    $profissao = $_POST['profissao'];
    $hobby = $_POST['hobby'];

    // Cria um array com os dados do formulário
    $dados = [
        'nome' => $nome,
        'rg' => $rg,
        'cpf' => $cpf,
        'endereco' => $endereco,
        'idade' => $idade,
        'data_nascimento' => $data_nascimento,
        'epoca' => $epoca,
        'sexo' => $sexo,
        'cor' => $cor,
        'telefone' => $telefone,
        'email' => $email,
        'estado_civil' => $estado_civil,
        'profissao' => $profissao,
        'hobby' => $hobby
    ];

    // Redireciona para a página 'exibir.php' com os dados via URL
    header("Location: exibir.php?" . http_build_query($dados));
    exit();
}
?>

<!-- O resto do código do formulário permanece igual -->
<form action="index.php" method="POST">
    <!-- Campos do formulário -->
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="rg">RG:</label><br>
    <input type="text" id="rg" name="rg" required><br><br>

    <label for="cpf">CPF:</label><br>
    <input type="text" id="cpf" name="cpf" required><br><br>

    <label for="endereco">Endereço:</label><br>
    <input type="text" id="endereco" name="endereco" required><br><br>

    <label for="idade">Idade:</label><br>
    <input type="number" id="idade" name="idade" required><br><br>

    <label for="data_nascimento">Data de Nascimento:</label><br>
    <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

    <label>Preferência de época do ano:</label><br>
    <input type="checkbox" id="primavera" name="epoca[]" value="Primavera">
    <label for="primavera">Primavera</label><br>
    <input type="checkbox" id="verao" name="epoca[]" value="Verão">
    <label for="verao">Verão</label><br>
    <input type="checkbox" id="outono" name="epoca[]" value="Outono">
    <label for="outono">Outono</label><br>
    <input type="checkbox" id="inverno" name="epoca[]" value="Inverno">
    <label for="inverno">Inverno</label><br><br>

    <label for="sexo">Sexo:</label><br>
    <input type="radio" id="masculino" name="sexo" value="Masculino" required>
    <label for="masculino">Masculino</label><br>
    <input type="radio" id="feminino" name="sexo" value="Feminino" required>
    <label for="feminino">Feminino</label><br><br>

    <label for="cor">Escolha a cor:</label><br>
    <input type="color" id="cor" name="cor"><br><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="estado_civil">Estado Civil:</label><br>
    <select id="estado_civil" name="estado_civil" required>
        <option value="solteiro">Solteiro</option>
        <option value="casado">Casado</option>
        <option value="divorciado">Divorciado</option>
        <option value="viuvo">Viúvo</option>
    </select><br><br>

    <label for="profissao">Profissão:</label><br>
    <input type="text" id="profissao" name="profissao" required><br><br>

    <label for="hobby">Hobby favorito:</label><br>
    <input type="text" id="hobby" name="hobby" required><br><br>

    <input type="submit" value="Enviar">
</form>
