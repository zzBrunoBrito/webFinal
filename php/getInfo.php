<?php
    session_start();

    //if (isset($_SESSION['cpf'])){
        $cpf = "my";
        $conn = pg_connect("host=localhost dbname=postgres user=bruno password=System.out")
                or die("Não foi possível conectar ao banco".pg_last_error());

        $stmt = "SELECT * FROM usuario WHERE cpf = '".$cpf."'";
        echo pg_last_error();
        $query = pg_query($conn, $stmt);
        $result = pg_fetch_array($query, 0);
        echo json_encode($result);
/*
        $stmt = "SELECT * FROM usuario WHERE cpf = ($1)";
        pg_prepare($conn, "query", $stmt);
        $x = pg_execute($conn, "query", array($cpf));
        y = pg_fetch_result($x, 0);
        echo $y;
    }*/

//    echo json_encode($x);
    pg_close($conn);

?>