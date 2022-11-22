<?php
// ------ Dados para conexão com o servidor MySQL ---------------------------
$servidor = 'localhost'; // Endereço do servidor (DNS ou IP direto)
$usuario = 'root'; // Nome do usuário de acesso ao servidor
$senha = ''; // Senha do usuário de acesso ao servidor
$banco = 'tcc'; // Nome do banco de dados que será manipulado
// ------ Executa a conexão com o servidor ----------------------------------
$conexao = new mysqli($servidor,$usuario,$senha,$banco)


?>