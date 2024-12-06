LOGIN.PHP
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
<?php

include("conn.php");
$nome = mysqli_real_escape_string($con, $_POST["nome"]);

$senha = mysqli_real_escape_string($con, $_POST["senha"]);


echo $nome."nome".$senha;
if (empty($nome) || empty($senha)) {
echo $row;

?>