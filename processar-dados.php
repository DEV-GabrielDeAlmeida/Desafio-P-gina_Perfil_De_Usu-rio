<?php

require_once 'config.php';

date_default_timezone_set('America/Sao_Paulo');

//PEGANDO OS DADOS DO FORMULÁRIO
$nome = $_POST['nomeInput'];
$idade = $_POST['idadeInput'];
$rua = $_POST['ruaInput'];
$bairro = $_POST['bairroInput'];
$estado = $_POST['estadoInput'];
$biografia = $_POST['biografiaInput'];
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');

//VERIFICAR SE OS CAMPOS FORAM PREENCHIDOS
if (empty($nome) || empty($idade) || empty($rua) || empty($bairro) || empty($estado) || empty($biografia)) {
    echo "Por favor, preencha todos os campos antes de enviar o formulário.";
    exit;
}

//INSERIR DADOS NO BANCO
$smtp = $conn->prepare("INSERT INTO usuario (nome, idade, rua, bairro, estado, biografia, data, hora) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$smtp->bind_param("sissssss", $nome, $idade, $rua, $bairro, $estado, $biografia, $data_atual, $hora_atual);

//VERIFICAR INSERCAO
if ($smtp->execute()) {
    echo "Dados inseridos com sucesso!";
}else{
    echo "Erro ao inserir dados: ".$smtp->error;
}

// header("Location: index.html");
// exit;

//FECHAR CONEXÃO
$smtp->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="perfil-atualizado.php"><button>Acessar Perfil</button></a>
</body>
</html>

