<?php
include 'conexao.php'; // Inclua o arquivo de conexão

$nome = $_POST['name'];
$cpf = $_POST['number'];
$endereco = $_POST['text'];
$bairro = $_POST['text'];
$estado = $_POST['select'];
$email = $_POST['email'];
$senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Armazenar a senha de forma segura

$sql = "INSERT INTO clientes (nome, cpf, endereco, bairro, estado, email, senha) VALUES ('$nome', '$cpf', '$endereco', '$email', '$senha', '$bairro', '$estado')";

if ($conexao->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();
?>
