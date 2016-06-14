<?php
    session_start();
    $cpf = $_POST['cpf'];
    $pass = $_POST['pass'];

    $conn = pg_connect("host=localhost dbname=postgres user=bruno password=System.out")
            	or die("Não foi possível conectar ao banco".pg_last_error());

    $stmt = "SELECT * FROM usuario WHERE cpf = '".$cpf."'";
    $query = pg_query($conn, $stmt);
    $infoUser = pg_fetch_array($query, 0);


    if ($pass == $infoUser[3]){
       $_SESSION['cpf'] = $cpf;
       $_SESSION['pass'] = pass;
       $_SESSION['nome'] = $infoUser[1];

       //redireciona a pagina
       header('Location: /webFinal/main.php');
    }else
       //volta pra index
       header('Location: /webFinal/index.html');

    pg_close($conn);
?>