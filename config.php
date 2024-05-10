<?php

//CONFIGURAÇÕES DE CREDENCIAIS
$server = 'localhost';
$user = 'root';
$passKey = '';
$db = 'projetouserprofile_formulario';

//CONEXÃO COM O BANCO
$conn = new mysqli($server, $user, $passKey, $db);

//VERIFICAR CONEXÃO
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: ".$conn->connect_error);
}

?>