<!DOCTYPE html>
<html lang="en">
<?php

    session_start();

    //validação
    if (isset($_SESSION['cpf']) != true){
       header('Location: /webFinal/index.html');
    }else{
         $conn = pg_connect("host=localhost dbname=postgres user=bruno password=System.out")
                    or die("Não foi possível conectar ao banco".pg_last_error());

        $stmt = "SELECT * FROM usuario WHERE cpf = '".$_SESSION['cpf']."' ";
        echo pg_last_error();
        $query = pg_query($conn, $stmt);
        $result1 = 0;
        $result2 = 0;

        $result1 = pg_fetch_result($query, 4);
        $result2 = pg_fetch_result($query, 5);
        if ($result1 != 0){
            $stmt = "SELECT nome FROM artigo WHERE id = '".$result1."' ";
            $query = pg_query($conn, $stmt);
            $result = pg_fetch_result($query, 0);
            if ($result != NULL){
                $_SESSION['nomeArtigo1'] = $result;
            }

        }else
            $_SESSION['nomeArtigo1'] = "Sem artigo enviado.";


        if ($result2 != 0){
            $stmt = "SELECT nome FROM artigo WHERE id = '".$result2."' ";
            $query = pg_query($conn, $stmt);
            $result = pg_fetch_result($query, 0);
                if ($result != NULL){
                    $_SESSION['nomeArtigo2'] = $result;
                }

        }else
            $_SESSION['nomeArtigo2'] = "Sem artigo enviado.";
        //$result = pg_fetch_result($query, 1);

    }

?>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/jquery.flexverticalcenter.js"></script>

    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>

    <script src="main.js"></script>
</head>
<body>
    <header class="top-bar row">
        <p class="top-bar-title">Bem-vindo, <?php echo $_SESSION['nome']; ?></p>
        <a class="top-bar-right" href="#">Sair</a>
    </header>

    <section class="row text-center">

        <div class="pdf small-10 large-6 column">
            <p> <?php echo $_SESSION['nomeArtigo1']; ?> </p>
            <div class="buttons">
                <a data-open="sendPDF" href="#"><i  class="fi-upload float-center"></i></a>
                <a data-open="teste" href="#"><i  class="fi-pencil float-center"></i></a>
            </div>
        </div>

        <div class=" pdf small-10 large-6 column">
            <p class="status"> <?php echo $_SESSION['nomeArtigo2']; ?>  </p>
            <div class="buttons">
                <a href="#" data-open="sendPDF"><i class="fi-upload float-left"></i></a>
                <a href="#"><i class="fi-pencil float-left"></i></a>
            </div>
        </div>

    </section>

    <div class="toast">Utilize as duas seções abaixo para enviar e verificar seus PDFs</div>

    <div class="large reveal" id="sendPDF" data-reveal>
        <h1>Preencha os campos abaixo</h1>
        <h6>(Todos os campos são obrigatórios)</h6>
        <form method="post" action="php/enviarArtigo.php">
            <label>Nome<input type="text" name="nomeArtigo"></label>
            <label>Tipo
                <select name="tipo">
                    <option value="Oral" >Oral</option>
                    <option value="Poster" >Poster</option>
                </select>
            </label>
            <label>Orientador<input type="text" name="orientador"></label>
            <label>Co-autor 1<input type="text" name="coautor1"></label>
            <label>Co-autor 2<input type="text" name="coautor2"></label>
            <input type="file">
            <div class="row">
                <input class="button column" type="submit">
            </div>
        </form>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


</body>
<script src="js/app.js"></script>
</html>