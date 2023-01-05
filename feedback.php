<?php

    if (isset($_POST['submit'])) {

        include_once('conexao.php');
        
        $cursoFeedback = $_POST['cursoFeedback'];
        $conhecimentoFeedback = $_POST['conhecimentoFeedback'];



        $result = mysqli_query($conexao, "INSERT INTO table_feedback(cursoFeedback, conhecimentoFeedback) VALUES ('$cursoFeedback', '$conhecimentoFeedback')");

        header('Location: login.php');

    }
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
        }
    </style>
</head>
<body>
    <div id="form-container">
        <h2> FEEDBACK </h2>
        
        <form action="feedback.php" method="POST">
            <label for="cursoFeedback"> Você pretende continuar no curso optado anteriormente? *</label>
            <input type="cursoFeedback" name="cursoFeedback" id="cursoFeedback" required />

            <label for="conhecimentoFeedback"> O que mais você descobriu sobre o curso? * </label>
            <input type="text" name="conhecimentoFeedback" id="conhecimentoFeedback" required/>
    
            <input type="submit" name="submit" value="ENVIAR" class="button" id="submit">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>