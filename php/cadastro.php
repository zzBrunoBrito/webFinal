<?php
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $csenha = $_POST['csenha'];

    $conn = pg_connect("host=localhost dbname=postgres user=bruno password=System.out")
        	or die("Não foi possível conectar ao banco".pg_last_error());

    $stmt = "INSERT INTO usuario (cpf, nome, email, senha) VALUES ($1, $2, $3, $4)";
    pg_prepare($conn, "query", $stmt);
    pg_execute($conn, "query", array($cpf, $nome, $email, $senha));
    pg_close($conn);
    echo "foi ";

    header('Location: /webFinal/index.html');
?>