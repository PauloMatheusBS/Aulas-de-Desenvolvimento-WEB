<!-- 1. Manipulação de Variáveis e Tipos de Dados
Crie um programa que leia dois números inteiros fornecidos pelo usuário e calcule a soma, a 
subtração, a multiplicação e a divisão desses números. Exiba os resultados de forma legível, 
incluindo o tipo de dado de cada resultado. -->
<?php
$n1 = (int)readline("Digite o primeiro número inteiro: ");
$n2 = (int)readline("Digite o segundo número inteiro: ");


$soma = $n1 + $n2;
$subtracao = $n1 - $n2;
$multiplicacao = $n1 * $n2;
$divisao = ($n2 != 0) ? $n1 / $n2 : "Erro: divisão por zero";  


echo "Resultado da soma: " . $soma . " (Tipo: " . gettype($soma) . ")\n";
echo "Resultado da subtração: " . $subtracao . " (Tipo: " . gettype($subtracao) . ")\n";
echo "Resultado da multiplicação: " . $multiplicacao . " (Tipo: " . gettype($multiplicacao) . ")\n";
echo "Resultado da divisão: " . $divisao . " (Tipo: " . gettype($divisao) . ")\n";
?>


<!-- 2. Estruturas Condicionais
Crie um programa que leia a idade de uma pessoa e informe se ela é maior de idade (18 anos 
ou mais) ou menor de idade (menos de 18 anos). Caso a pessoa tenha 60 anos ou mais, exiba 
uma mensagem adicional dizendo que ela é idosa. -->

<?php
$idade = (int)readline("Digite a sua idade: ");

if ($idade > 18) {
    if ($idade > 60) {
        echo "Vc é idoso/idosa";
    } else {
        echo "Vc é maior de idade";
    }
} else {
    echo "Vc é menor de idade";
}
?>


<!-- 3. Laços de Repetição
Crie um programa que exiba todos os números de 1 a 100, mas substitua:
"A" para números divisíveis por 3,
"B" para números divisíveis por 5,
"AB" para números divisíveis por ambos (3 e 5). -->

<?php
$i = 0;

for ($i; $i <= 100; $i++) {
    echo "$i\n"; 
}
?>

<!-- 4. Funções
Crie uma função chamada calcular_area que receba dois parâmetros: o comprimento e a 
largura de um retângulo. A função deve calcular a área do retângulo e retornar o valor. No 
programa principal, leia os valores de comprimento e largura e exiba a área calculada. -->




<!-- 5. Arrays
Crie um programa que armazene em um array os 10 primeiros números da sequência de 
Fibonacci e, em seguida, exiba esses números na tela. -->

<!-- 6. Manipulação de Strings
Crie uma função que receba uma string como parâmetro e retorne a mesma string, mas com 
as vogais removidas. Exemplo: "programação" deve retornar "prgrmc". -->

<!-- 7. Data e Hora
Crie um programa que exiba a data atual no formato "Dia da semana, DD de Mês de AAAA". 
Exemplo: "Segunda-feira, 19 de Fevereiro de 2025". -->

<!-- 8. Leitura e Escrita em Arquivos
Crie um programa que leia o conteúdo de um arquivo de texto (por exemplo, "notas.txt") e 
exiba o conteúdo na tela. Em seguida, escreva no final do arquivo o texto "Final do conteúdo". -->

<!-- 9. Validação de Dados
Crie uma função que valide se um e-mail fornecido pelo usuário é válido, verificando se ele 
contém um "@" e um ".". Retorne uma mensagem dizendo se o e-mail é válido ou não. -->

<!-- 10. Interação com o Usuário via Formulário
Crie um formulário HTML que permita ao usuário inserir seu nome e idade. Após o envio, um 
script PHP deve processar os dados e exibir uma mensagem personalizada: "Olá, [nome]! Você 
tem [idade] anos". -->