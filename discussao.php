<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title> InForma </title>
    <link rel="stylesheet" type="text/css" href="style/decoracao.css" media="screen" />
    <style>
        body {
            background-image: url(img/tela_login.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

<!-- FORMULARIO DE LOGIN -->
    <div id="form-container">
        <h2> DISCUSSÃO </h2>

        <form method="POST" action="addpergunta.php">
            <label for="tituloPergunta"> Assunto: * </label> 
            <input type="text" name="tituloPergunta" id="tituloPergunta" placeholder="Escreva o assunto da discussão" required />

            <label for="conteudoPergunta"> Conteúdo: * </label> 
            <textarea class="pergunta-discussao" name="conteudoPergunta" id="conteudoPergunta" rows="5" cols="45" required > </textarea>

            <input type="submit" name="submit" id="submit" value="Enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>