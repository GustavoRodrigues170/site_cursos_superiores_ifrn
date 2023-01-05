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
        <h2> LOGIN </h2>

        <form method="POST" action="verificar_login.php">
            <label for="email"> E-mail: </label> 
            <input type="email" name="emailUsuario" id="emailUsuario" placeholder="Digite seu e-mail"/>

            <label for="senha"> Senha: </label> 
            <input type="password" name="senhaUsuario" id="senhaUsuario" placeholder="Digite sua senha"/>
    
            <a href="#" id="forgot-pass"> Esqueceu a senha? </a>
            <input type="submit" name="submit" id="submit" value="Login">
        </form>

        <div id="register-container">
            <p> Ainda não tem uma conta? <a href="cadastro.php"> Cadastre-se agora </a></p>
        </div>
    </div>

<!-- RODAPÉ 
<footer class="container-fluid">
    <div class="row rodape-area">
            <div class="col-4">
                <p> INÍCIO </p>
                <p> Cursos </p>
                <p> Campus </p>
            </div>

            <div class="col-4">
                <p> SUPORTE </p>
                <p> Telefone </p>
                <p> Chat </p>
            </div>

            <div class="col-4">
                <i class="bi bi-facebook"></i> </li>
                <i class="bi bi-instagram"></i> </li>
                <i class="bi bi-twitter"></i> </li>
            </div>
        </div>

    <div class="row copyright">
        <p> © 2021 Copyright - Projeto IFRN </p>
    </div>
</footer>
-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>