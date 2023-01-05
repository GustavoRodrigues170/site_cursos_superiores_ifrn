<?php

    if (isset($_POST['submit'])) {

        include_once('conexao.php');
        
        $nomeUsuario = $_POST['nome'];
        $emailUsuario = $_POST['email'];
        $senhaUsuario = $_POST['senha'];
        $dataUsuario = $_POST['data'];
        $formacaoUsuario = $_POST['formacao'];
        $curso = $_POST['curso'];
        $conhecimento = $_POST['conhecimento'];


        $result = mysqli_query($conexao, "INSERT INTO table_usuarios(nomeUsuario, emailUsuario, senhaUsuario, dataUsuario, formacaoUsuario, curso, conhecimento) VALUES ('$nomeUsuario', '$emailUsuario', '$senhaUsuario', '$dataUsuario', '$formacaoUsuario', '$curso', '$conhecimento')");

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
        <h2> CADASTRO </h2>
        
        <form action="cadastro.php" method="POST">
            <label for="name"> Nome Completo: *</label>
            <input type="text" name="nome" id="nome" required />

            <label for="email"> Email: * </label>
            <input type="text" name="email" id="email" required/>
        
            <label for="senha"> Senha: *</label>
            <input type="password" name="senha" id="senha"required/>
        
            <label for="data"> Data de Nascimento: *</label>
            <input type="date" name="data" id="data" required/>

            <label for="formacao"> Formação Acadêmica: *</label>
            <input type="text" name="formacao" id="formacao" required/>

            <label for="curso"> Qual curso você pretende seguir? *</label>
            <input type="text" name="curso" id="curso" required/>

            <label for="conhecimento"> O que você sabe sobre esse curso? *</label>
            <input type="text" name="conhecimento" id="conhecimento" required/>

            <input type="submit" name="submit" value="CADASTRAR" class="button" id="submit">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>