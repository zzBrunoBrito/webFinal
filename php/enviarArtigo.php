<?php
    session_start();

    $nomeArtigo = $_POST['nomeArtigo'];
    $orientador = $_POST['orientador'];
    $tipo = $_POST['tipo'];
    $coautor1 = $_POST['coautor1'];
    $coautor2 = $_POST['coautor2'];

    $conn = pg_connect("host=localhost dbname=postgres user=bruno password=System.out")
            	or die("Não foi possível conectar ao banco".pg_last_error());

    $stmt = "INSERT INTO artigo (nome, tipo, orientador, coautor1, coautor2) VALUES ($1, $2, $3, $4, $5)";
    pg_prepare($conn, "query", $stmt);
    pg_execute($conn, "query", array($nomeArtigo, $tipo, $orientador, $coautor1, $coautor2));


    $stmt = "SELECT id FROM artigo WHERE nome = '".$nomeArtigo."'";
    $query = pg_query($conn, $stmt);
    $result = pg_fetch_result($query, 0);

    $stmt = "SELECT id_artigo1 FROM usuario WHERE cpf = '".$_SESSION['cpf']."' ";
    $query = pg_query($conn, $stmt);

    if (pg_fetch_result($query, 0) == NULL){
        $stmt = "UPDATE usuario SET id_artigo1 = '".$result."' WHERE cpf = '".$_SESSION['cpf']."' ";
        $query = pg_query($conn, $stmt);

        //$result = pg_fetch_result($query, 0);
    }
    else{
        $stmt = "SELECT id_artigo2 FROM usuario WHERE cpf = '".$_SESSION['cpf']."' ";
        $query = pg_query($conn, $stmt);
        if (pg_fetch_result($query, 0) == NULL){
            $stmt = "UPDATE usuario SET id_artigo2 = '".$result."' WHERE cpf = '".$_SESSION['cpf']."' ";
            $query = pg_query($conn, $stmt);
            // $result = pg_fetch_result($query, 0);
        }
    }





    //pg_close($conn);

    //header('Location: /webFinal/main.php');

?>