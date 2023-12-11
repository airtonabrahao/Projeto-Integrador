<?php

//Conectar ao banco de dados

function connectDatabase(){
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'banco_de_dados_l'; // substitua pelo nome real do seu banco de dados

    $connection = mysqli_connect($server, $user, $password, $database);

    if(!$connection){
        die('Conexão falhou:'.mysqli_connect_error());
    }
    return $connection;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $estado = $_POST["estado"];
    $password = $_POST["password"];

    $connection = connectDatabase();

    //Proteger contra sql injection
    $name = mysqli_real_escape_string($connection, $name);
    $cpf = mysqli_real_escape_string($connection, $cpf);
    $email = mysqli_real_escape_string($connection, $email);
    $endereco = mysqli_real_escape_string($connection, $endereco);
    $bairro = mysqli_real_escape_string($connection, $bairro);
    $estado = mysqli_real_escape_string($connection, $estado);
    $password = mysqli_real_escape_string($connection, $password);

    // Hash da senha
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Usar prepared statement para evitar SQL injection
    $query = "INSERT INTO banco_de_dados_l (name, cpf, email, endereco, bairro, estado, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connection, $query);
    
    // Associar parâmetros
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $cpf, $email, $endereco, $bairro, $estado, $password_hashed);
    
    // Executar a instrução preparada
    if(mysqli_stmt_execute($stmt)){
        echo "Usuário cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($connection);
    }

    // Fechar a instrução e a conexão
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} 


$connection->close();


?>
