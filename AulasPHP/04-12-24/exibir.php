<?php
// Recebe os dados via GET
$nome = $_GET['nome'];
$rg = $_GET['rg'];
$cpf = $_GET['cpf'];
$endereco = $_GET['endereco'];
$idade = $_GET['idade'];
$data_nascimento = $_GET['data_nascimento'];
$epoca = $_GET['epoca'];  // Preferências de época
$sexo = $_GET['sexo'];
$cor = $_GET['cor'];
$telefone = $_GET['telefone'];
$email = $_GET['email'];
$estado_civil = $_GET['estado_civil'];
$profissao = $_GET['profissao'];
$hobby = $_GET['hobby'];

// Se o valor de $epoca for uma string (seleção única), transforme-o em um array para usar o implode
if (!is_array($epoca)) {
    $epoca = array($epoca);
}

// Exibe os dados em uma tabela formatada
echo "<h2>Dados Enviados:</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Campo</th><th>Valor</th></tr>";
echo "<tr><td><strong>Nome</strong></td><td>$nome</td></tr>";
echo "<tr><td><strong>RG</strong></td><td>$rg</td></tr>";
echo "<tr><td><strong>CPF</strong></td><td>$cpf</td></tr>";
echo "<tr><td><strong>Endereço</strong></td><td>$endereco</td></tr>";
echo "<tr><td><strong>Idade</strong></td><td>$idade</td></tr>";
echo "<tr><td><strong>Data de Nascimento</strong></td><td>$data_nascimento</td></tr>";
echo "<tr><td><strong>Preferência de Época do Ano</strong></td><td>" . implode(", ", $epoca) . "</td></tr>";
echo "<tr><td><strong>Sexo</strong></td><td>$sexo</td></tr>";
echo "<tr><td><strong>Cor</strong></td><td><div style='width: 50px; height: 30px; background-color: $cor;'></div></td></tr>";
echo "<tr><td><strong>Telefone</strong></td><td>$telefone</td></tr>";
echo "<tr><td><strong>Email</strong></td><td>$email</td></tr>";
echo "<tr><td><strong>Estado Civil</strong></td><td>$estado_civil</td></tr>";
echo "<tr><td><strong>Profissão</strong></td><td>$profissao</td></tr>";
echo "<tr><td><strong>Hobby</strong></td><td>$hobby</td></tr>";
echo "</table>";
?>
